<?php
    // Classe di partenza per gli articoli da visualizzare.
    // In questa classe sono mantenuti e restituiti solo gli attributi identificativi del nome del prodotto, del relativo prezzo unitario e l'oggetto "features" nel quale sono presenti altre caratteristiche del prodotto stesso.
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

        // Il metodo seguente viene utilizzato per aggiungere una caratteristica al prodotto o per richiederne il valore (della singola caratteristica o di tutte le caratteristiche dello stesso). Il metodo restituisce un oggetto con una componente booleana (esito dell'operazione) ed una componente vettoriale (caratteristica aggiunta/richiesta o insieme di tutte le caratteristiche)
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