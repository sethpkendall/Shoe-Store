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

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            // Store::deleteAll();
        }

        function test_getBrandName()
        {
            //Arrange
            $name = "Nike";
            $price_range = "Medium";
            $id = 1;
            $test_brand = new Brand($name, $price_range, $id);

            //Act
            $result = $test_brand->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setBrandId()
        {
            //Arrange
            $name = "Nike";
            $price_range = "Medium";
            $id = 1;
            $test_brand = new Brand($name, $price_range, $id);

            //Act
            $new_id = 2;
            $test_brand->setId($new_id);
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals($new_id, $result);
        }

        function test_save()
        {
          //Arrange
          $name = "Nike";
          $price_range = "Medium";
          $test_brand = new Brand($name, $price_range);

          //Act
          $test_brand->save();
          $result = Brand::getAll();

          //Assert
          $this->assertEquals([$test_brand], $result);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Nike";
            $price_range = "Medium";
            $test_brand = new Brand($name, $price_range);

            $name2 = "Adidas";
            $price_range2 = "Medium";
            $test_brand2 = new Brand($name2, $price_range2);

            //Act
            $test_brand->save();
            $test_brand2->save();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Nike";
            $price_range = "Medium";
            $test_brand = new Brand($name, $price_range);
            $test_brand->save();

            $name2 = "Adidas";
            $price_range2 = "Medium";
            $test_brand2 = new Brand($name2, $price_range2);
            $test_brand2->save();

            //Act
            $id = $test_brand->getId();
            $result = Brand::find($id);

            //Assert
            $this->assertEquals($test_brand, $result);
        }
    }
?>
