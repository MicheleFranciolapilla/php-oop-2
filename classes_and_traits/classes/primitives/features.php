<?php
    require_once __DIR__ . './bool_array.php';

    // Classe utilizzata per la conservazione, gestione e restituzione delle caratteristiche ulteriori degli articoli dello shop.
    // Gli attributi della classe si dividono in semplici e compositi (quelli compositi possono essere anche ulteriori array, nei quali si possano memorizzare caratteristiche quali colore/peso/lunghezza/...... e sono tutti contenuti in "$features_array").
    // L'attributo di classe "Bool_Array" viene utilizzato per la gestione e lo scambio delle informazioni con doppia componente (booleana e vettoriale).
    class Features
    {
        public                  $brand;
        public                  $description;
        protected   array       $features_array;
        protected   string      $img_url;
        private     Bool_Array  $results;

        public  function __construct($_brand, $_description, $_img_url)
        {
            $this->brand = $_brand;
            $this->description = $_description;
            $this->features_array = [];
            $this->img_url = $_img_url;
            $this->results = new Bool_Array();
        }

        public  function get_img_url() : string
        {
            return $this->img_url;
        }

        // Metodo deputato a riscontrare l'esistenza della chiave di un attributo composito
        private function check_feature($_key)
        {
            return array_key_exists($_key, $this->features_array);
        }

        // Metodo invocato nel caso di esito infruttuoso nella manipolazione/ricerca di un attributo composito
        private function fail()
        {
            $this->results->set_success(false);
            $this->results->set_array([]);
        }

        // Metodo deputato all'aggiunta di un attributo composito
        public  function add_feature($_key, array $_value) : Bool_Array
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

        // Metodo deputato alla restituzione (get) dell'attributo composito richiesto
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

        // Metodo deputato alla restituzione (get) dell'insieme di tutti gli attributi compositi
        public  function get_all_features() : Bool_Array
        {
            $this->results->set_success(count($this->features_array) !== 0);
            $this->results->set_array($this->features_array);
            return $this->results;
        }
    }
    
?>