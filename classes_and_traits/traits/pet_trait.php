<?php
    // Trait con la funzione di conservazione e restituzione dei dati (stringa, indice numerico e classi font awesome) della categoria del pet.
    trait Pet_Trait
    {
        public  string  $pet_str;
        public  int     $pet_int;
        public  array   $pet_classes;

        public  function set_pet_str($_pet_str)
        {
            $this->pet_str = $_pet_str;
        }

        public  function get_pet_str()
        {
            return $this->pet_str;
        }

        public  function set_pet_int($_pet_int)
        {
            $this->pet_int = $_pet_int;
        }

        public  function get_pet_int()
        {
            return $this->pet_int;
        }

        public  function set_classes(array $_pet_classes)
        {
            $this->pet_classes = $_pet_classes;
        }

        public  function get_classes_tag()
        {
            return '<i class="' . implode(" ", $this->pet_classes) . '"></i>';
        }
    } 
?>