<?php

    class Brand
    {
        private $name;
        private $price_range;
        private $id;

        function __construct($name, $price_range, $id=null)
        {
            $this->name = $name;
            $this->price_range = $price_range;
            $this->id = $id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setPriceRange($new_price_range)
        {
            $this->price_range = (string) $new_price_range;
        }

        function getPriceRange()
        {
            return $this->price_range;
        }

        function setId($new_id)
        {
            $this->id = (string) $new_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
          $GLOBALS['DB']->exec("INSERT INTO brands (name, price_range) VALUES ('{$this->getName()}', '{$this->getPriceRange()}');");
          $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function addStore($new_store)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$this->getId()}, {$new_store->getId()});");
        }

        function getStores()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands
                JOIN brands_stores ON (brands_stores.brand_id = brands.id)
                JOIN stores ON (stores.id = brands_stores.store_id)
                WHERE brands.id = {$this->getId()};");
            $stores = array();
            foreach($returned_stores as $store){
              $name = $store['name'];
              $phone = $store['phone'];
              $address = $store['address'];
              $id = $store['id'];
              $new_store = new Store($name, $phone, $address, $id);
              array_push($stores, $new_store);
            }
            return $stores;
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach($returned_brands as $brand) {
                $name = $brand['name'];
                $price_range = $brand['price_range'];
                $id = $brand['id'];
                $new_brand = new Brand($name, $price_range, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
        }

        static function find($search_id)
        {
            $found_brand = null;
            $brands = Brand::getAll();
            foreach($brands as $brand) {
                $brand_id = $brand->getId();
                if($brand_id == $search_id) {
                    $found_brand = $brand;
                }
            }
            return $found_brand;
        }
    }
?>
