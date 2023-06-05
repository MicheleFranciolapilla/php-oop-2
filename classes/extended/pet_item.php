<?php

    include_once __DIR__ . '/../primitives/base_item.php';
    include_once __DIR__ . '/../primitives/pet_category.php';
    include_once __DIR__ . '/../primitives/features.php';

    class Pet_Item extends Base_Item
    {
        protected   Pet_Category    $category;
        protected                   $amount;
        protected   bool            $is_selected;

        public  function __construct($_product, $_price, Features $_features, Pet_Category $_category)
        {
            parent::__construct($_product, $_price, $_features);
            $this->category = $_category;
            $this->amount = 1;
            $this->is_selected = false;
        }

        public  function get_category() : Pet_Category
        {
            return $this->category;
        }

        public  function set_amount($_amount)
        {
            $this->amount = $_amount;
        }

        public  function get_amount()
        {
            return $this->amount;
        }

        public  function get_selection()
        {
            return $this->is_selected;
        }

        public  function set_selection(bool $_is_selected = true)
        {
            $this->is_selected = $_is_selected;
        }

        public  function is_it_you( Pet_Item $_item) : bool
        {
            $response = false;
            if ($this->category->get_int_category() == $_item->category->get_int_category())
                if ($this->get_product() == $_item->get_product())
                    if ($this->get_price() == $_item->get_price())
                        if ($this->features->brand == $_item->features->brand)
                            $response = true;
            return $response;
        }
    }
    
?>