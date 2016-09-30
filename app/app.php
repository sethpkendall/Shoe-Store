<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Brand.php";
    require_once __DIR__."/../src/Store.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->post('/home', function() use ($app) {
        return $app->redirect('/');
    });

    $app->get('/stores', function() use($app) {
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->get('/brands', function() use($app) {
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    $app->post("/new_brand", function() use ($app) {
        $name = $_POST['b-name'];
        $price_range = $_POST['price_range'];
        $new_brand = new Brand($name, $price_range);
        $new_brand->save();
        return $app['twig']->render("brands.html.twig", array('brands' => Brand::getAll()));
    });

    $app->post("/new_store", function() use ($app) {
        $name = $_POST['s-name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $new_store = new Store($name, $phone, $address);
        $new_store->save();
        return $app['twig']->render("stores.html.twig", array('stores' => Store::getAll()));
    });

    $app->get('/brand_page/{id}', function($id) use ($app) {
        $brand = Brand::find($id);
        return $app['twig']->render("brand.html.twig", array('brand' => $brand, 'stores' => Store::getAll(), 'current_stores' => $brand->getStores()));
    });

    $app->get('/store_page/{id}', function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render("store.html.twig", array('store' => $store, 'brands' => Brand::getAll(), 'current_brands' => $store->getBrands()));
    });

    $app->post('/add_brand_store/{id}', function($id) use ($app) {
        $store_id = $_POST['store'];
        $new_store = Store::find($store_id);
        $brand = Brand::find($id);
        $brand->addStore($new_store);
        return $app['twig']->render("brand.html.twig", array('brand' => $brand, 'stores' => Store::getAll(), 'current_stores' => $brand->getStores()));
    });

    $app->post('/add_store_brand/{id}', function($id) use ($app) {
        $brand_id = $_POST['brand'];
        $new_brand = Brand::find($brand_id);
        $store = Store::find($id);
        $store->addBrand($new_brand);
        return $app['twig']->render("store.html.twig", array('store' => $store, 'brands' => Brand::getAll(), 'current_brands' => $store->getBrands()));
    });

    $app->post('/update_store_name/{id}', function($id) use ($app){
        $store = Store::find($id);
        $new_name = $_POST['name'];
        $store->updateName($new_name);
        return $app['twig']->render("store.html.twig", array('store' => $store, 'brands' => Brand::getAll(), 'current_brands' => $store->getBrands()));
    });

    $app->post('/update_store_phone/{id}', function($id) use ($app){
        $store = Store::find($id);
        $new_phone = $_POST['phone'];
        $store->updatePhone($new_phone);
        return $app['twig']->render("store.html.twig", array('store' => $store, 'brands' => Brand::getAll(), 'current_brands' => $store->getBrands()));
    });

    $app->post('/update_store_address/{id}', function($id) use ($app){
        $store = Store::find($id);
        $new_address = $_POST['address'];
        $store->updateAddress($new_address);
        return $app['twig']->render("store.html.twig", array('store' => $store, 'brands' => Brand::getAll(), 'current_brands' => $store->getBrands()));
    });

    $app->post('/delete_store/{id}', function($id) use ($app){
        $store = Store::find($id);
        $store->delete();
        return $app->redirect("/stores");
    });

    $app->post('/delete_all_stores', function() use ($app){
        Store::deleteAll();
        return $app->redirect("/stores");
    });


    return $app;
?>
