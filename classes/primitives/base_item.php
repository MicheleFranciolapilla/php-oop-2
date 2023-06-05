<?php

    require_once __DIR__ . './features.php';
    require_once __DIR__ . './bool_array.php';

    class Base_Item
    {
        protected   $product;
        protected   $price;
        public      $features;

        public  function __construct($_product, $_price, Features $_features)
        {
            $this->product = $_product;
            $this->price = floatval($_price);
            $this->features = $_features;
        }

        public  function get_product()
        {
            return $this->product;
        }

        public  function get_price()
        {
            return $this->price;
        }

        public  function manage_features(string $_how_to_manage, $_key = null, $_value = null) : Bool_Array
        {
            switch (strtoupper($_how_to_manage))
            {
                case "ADD"  :
                    return $this->features->add_feature($_key, $_value);
                case "GET"  :
                    return $this->features->get_single_feature($_key);
                case "ALL"  :
                    return $this->features->get_all_features();
                default     :
                    return $this->features->get_single_feature("");
            }
        }
    } 
    
?>