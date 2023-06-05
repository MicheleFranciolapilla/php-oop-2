<?php

    class Bool_Array
    {
        private bool    $success;
        private array   $array_value;

        public  function __construct()
        {
            $this->success = false;
            $this->array_value = [];
        }

        public  function set_success(bool $_success = true)
        {
            $this->success = $_success;
        }

        public  function set_array(array $_array_value = [])
        {
            $this->array_value = $_array_value;
        }

        public  function get_success()
        {
            return $this->success;
        }

        public  function get_array()
        {
            return $this->array_value;
        }
    }

?>