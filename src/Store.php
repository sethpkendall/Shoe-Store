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

        // function 
    }
?>
