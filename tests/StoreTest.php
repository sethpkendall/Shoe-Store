<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";
    require_once "src/Store.php";

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Foot Locker";
            $phone = "888-888-8888";
            $address = "123 Way Ave. Portland, OR 97204";
            $test_store = new Store($name, $phone, $address);

            //Act
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getStoreName()
        {
            //Arrange
            $name = "Foot Locker";
            $phone = "888-888-8888";
            $address = "123 Way Ave. Portland, OR 97204";
            $test_store = new Store($name, $phone, $address);

            //Act
            $new_phone = "777-777-7777";
            $test_store->setPhone($new_phone);
            $result = $test_store->getPhone();

            //Assert
            $this->assertEquals($new_phone, $result);
        }

        function test_storeSave()
        {
          //Arrange
          $name = "Foot Locker";
          $phone = "888-888-8888";
          $address = "123 Way Ave. Portland, OR 97204";
          $test_store = new Store($name, $phone, $address);

          //Act
          $test_store->save();
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store], $result);
        }

        function test_storeGetAll()
        {
            //Arrange
            $name = "Foot Locker";
            $phone = "888-888-8888";
            $address = "123 Way Ave. Portland, OR 97204";
            $test_store = new Store($name, $phone, $address);
            $test_store->save();

            $name2 = "Getcha Shoes Heah!";
            $phone2 = "888-888-8887";
            $address2 = "124 Way Ave. Portland, OR 97204";
            $test_store2 = new Store($name2, $phone2, $address2);
            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_storeFind()
        {
            //Arrange
            $name = "Foot Locker";
            $phone = "888-888-8888";
            $address = "123 Way Ave. Portland, OR 97204";
            $test_store = new Store($name, $phone, $address);
            $test_store->save();

            $name2 = "Getcha Shoes Heah!";
            $phone2 = "888-888-8887";
            $address2 = "124 Way Ave. Portland, OR 97204";
            $test_store2 = new Store($name2, $phone2, $address2);
            $test_store2->save();

            //Act
            $id = $test_store->getId();
            $result = Store::find($id);

            //Assert
            $this->assertEquals($test_store, $result);
        }


    }
?>
