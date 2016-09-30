<?php

    class Store
    {
        private $name;
        private $phone;
        private $address;
        private $id;

        function __construct($name, $phone, $address, $id=null)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
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

        function getPhone()
        {
            return $this->phone;
        }

        function setPhone($new_phone)
        {
            $this->phone = (string) $new_phone;
        }

        function getAddress()
        {
            return $this->address;
        }

        function setAddress($new_address)
        {
            $this->address = (string) $new_address;
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
          $GLOBALS['DB']->exec("INSERT INTO stores (name, phone, address) VALUES ('{$this->getName()}', '{$this->getPhone()}', '{$this->getAddress()}');");
          $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE store_id = {$this->getId()};");
        }

        function updateName($new_name)
        {
            $GLOVALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
        }

        function addBrand($new_brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$new_brand->getId()}, {$this->getId()});");
        }

        function getBrands()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
                JOIN brands_stores ON (brands_stores.store_id = stores.id)
                JOIN brands ON (brands.id = brands_stores.brand_id)
                WHERE stores.id = {$this->getId()};");
            $brands = array();
            foreach($returned_brands as $brand){
              $name = $brand['name'];
              $price_range = $brand['price_range'];
              $id = $brand['id'];
              $new_brand = new Brand($name, $price_range, $id);
              array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $phone = $store['phone'];
                $address = $store['address'];
                $id = $store['id'];
                $new_store = new Store($name, $phone, $address, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
            // $GLOBALS['DB']->exec("DELETE FROM brands_stores");
        }

        static function find($search_id)
        {
            $found_store = null;
            $stores = Store::getAll();
            foreach($stores as $store) {
                $store_id = $store->getId();
                if($store_id == $search_id) {
                    $found_store = $store;
                }
            }
            return $found_store;
        }
    }
?>
