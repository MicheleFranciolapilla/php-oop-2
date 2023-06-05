<?php

    class Pet_Category
    {
        protected   string  $category_str;
        protected   int     $category_int;
        private     array   $f_a_classes = [];

        public  function __construct(string $_category_str, int $_category_int, array $_f_a_classes)
        {
            $this->category_str = $_category_str;
            $this->category_int = $_category_int;
            $this->f_a_classes = $_f_a_classes;
        }

        public  function get_int_category()
        {
            return $this->category_int;
        }

        public  function get_str_category()
        {
            return $this->category_str;
        }
    }
    
?>