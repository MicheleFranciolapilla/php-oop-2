<?php

    require_once __DIR__ . './bool_array.php';

    class Features
    {
        public                  $brand;
        public                  $description;
        protected   array       $features_array = [];
        protected   string      $img_url;
        private     Bool_Array  $results;

        public  function __construct($_brand, $_description, $_img_url)
        {
            $this->brand = $_brand;
            $this->description = $_description;
            $this->img_url = $_img_url;
            $this->results = new Bool_Array();
        }

        public  function get_img_url() : string
        {
            return $this->img_url;
        }

        private function check_feature($_key)
        {
            return array_key_exists($_key, $this->features_array);
        }

        private function fail()
        {
            $this->results->set_success(false);
            $this->results->set_array([]);
        }

        public  function add_feature($_key, $_value) : Bool_Array
        {
            if (isset($_key) && isset($_value))
            {
                $this->features_array[$_key] = $_value;
                $this->results->set_success();
                $this->results->set_array([$_key => $_value]);
            }
            else
                $this->fail();
            return $this->results;
        }

        public  function get_single_feature($_key) : Bool_Array
        {
            if (!isset($_key))
                $this->fail();
            elseif ($this->check_feature($_key))
            {
                $this->results->set_success();
                $this->results->set_array([$_key => $this->features_array[$_key]]);
            }
            else
                $this->fail();
            return $this->results;
        }

        public  function get_all_features() : Bool_Array
        {
            $this->results->set_success(count($this->features_array) !== 0);
            $this->results->set_array($this->features_array);
            return $this->results;
        }
    }
    
?>