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

        function setPriceRange($new_range)
        {
            $this->range = (string) $new_range;
        }

        function getPriceRange()
        {
            return $this->range;
        }

        function setId($new_id)
        {
            $this->id = (string) $new_id;
        }

        function getId()
        {
            return $this->id;
        }
    }
?>
