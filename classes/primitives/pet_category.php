<?php

    class Pet_Category
    {
        public      string  $category_str;
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

        public  function get_str_category() : string
        {
            return $this->category_str;
        }

        public  function get_icon_tag() : string
        {
            return '<i class="' . implode(" ", $this->f_a_classes) . '"></i>';
        }
    }
    
?>