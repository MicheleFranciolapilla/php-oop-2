<?php
    // File contenente tutte le funzioni di generazione (per lo più randomica) e manipolazione dei dati del progetto

    // Funzione che determina il numero di elementi che comporranno l'array degli articoli dello shop
    function set_total_items()
    {
        return mt_rand($GLOBALS['min_items_nr'], $GLOBALS['max_items_nr']);
    }

    // Funzione che consente di stabilire la categoria pet di ciascun articolo. E' stata implementata una semplice logica che agevola (rendendo più probabili), in ordine, le categorie dog / cat / fish / turtle
    function randomize_pet() : int
    {
        $easing_bool = false;
        $pet_keys = array_keys($GLOBALS['categories']);
        do
        {
            $index = mt_rand(0, count($GLOBALS['categories']) - 1);
            $easing_rand = mt_rand(0,10);
            if
                (($index == 0) ||
                (($index == 1) && ($easing_rand <= 8)) ||
                (($index == 2) && ($easing_rand <= 5)) ||
                (($index == 3) && ($easing_rand < 3)))
                    $easing_bool = true;
        } while (!$easing_bool);
        return $index;
    }

    // Funzione atta a riconoscere se un particolare articolo sia già presente nell'array, evitando così la sua duplicazione
    function check_if_repeated(array $item_to_check)
    {
        $repeated = false;
        for ($j = 0; $j < count($_SESSION['data_collection']); $j++)
        {
            if ($item_to_check == $_SESSION['data_collection'][$j])
            {
                $repeated = true;
                break;
            }
        }
        return $repeated;
    }

    // Funzione che azzera tutti i contatori delle categorie pet
    function init_counters()
    {
        for ($i = 0; $i < count($GLOBALS['categories']); $i++)
            $_SESSION['category_counters'][$i] = 0;
    }

    // Funzione che popola l'array (di sessione, dunque permanente) dei dati (solo dati, senza oggetti) degli articoli dello shop
    function create_collection()
    {
        $total_items = set_total_items();
        init_counters();
        for ($i = 0; $i < $total_items; $i++)
        {
            $pet = randomize_pet();
            $keys = array_keys($GLOBALS['products'][$pet]);
            $key = mt_rand(0, count($keys) - 1);
            $inner_array_index = mt_rand(0,count($GLOBALS['products'][$pet][$keys[$key]]) - 1);
            $inner_array = $GLOBALS['products'][$pet][$keys[$key]][$inner_array_index];
            $single_item =  [
                                "category"      => $pet,
                                "brand"         => $keys[$key],
                                "product"       => $inner_array[0],
                                "description"   => $inner_array[1],
                                "price"         => $inner_array[2],
                                "img_url"       => $inner_array[3],
                            ];
            if (!check_if_repeated($single_item))
            {
                array_push($_SESSION['data_collection'], $single_item);
                array_push($_SESSION['amounts'], mt_rand(1, $GLOBALS['max_amount']));
                $_SESSION['category_counters'][$pet]++;
            }
            else
                $i--;
        }
    }

    // Funzione che, ad ogni cambio di pagina, popola l'array (dati + oggetti) degli articoli dello shop
    function create_items_collection()
    {
        $pet_keys = array_keys($GLOBALS['categories']);
        foreach($_SESSION['data_collection'] as $index => $data)
        {
            $pet_item = new Pet_Item( $data["product"], $data["price"], new Features( $data["brand"], $data["description"], $data["img_url"]), $data["category"]);
            $pet_str = $pet_keys[$data["category"]];
            $pet_item->set_pet_str($pet_str);
            $pet_item->set_classes(["fa-solid", $GLOBALS['categories'][$pet_str]]);
            $pet_item->set_amount($_SESSION['amounts'][$index]);
            array_push($GLOBALS['items_collection'], $pet_item);
        }
    }

    // Funzione che, a seconda della pagina corrente, popola l'array con le relative voci di menù
    function set_menu_items()
    {
        if ($_SESSION['page'] === 'main')
        {
            $GLOBALS['menu_items'] = array_keys($GLOBALS['categories']);
        }
        else
        {
            $GLOBALS['menu_items'] = ['<i class="fa-solid fa-backward"></i> Indietro alla pagina principale'];
        }
    }

    // Funzione usata per filtrare l'array degli articoli a seguito dell'input nella search bar
    // Il filtraggio viene effettuato su "categoria pet", "nome prodotto", "marca del prodotto" e "descrizione"
    function search_text(Pet_Item $item)
    {
        $text = strtolower($_SESSION['text_to_search']);
        return  (str_contains(strtolower($item->get_pet_str()), $text) ||
                str_contains(strtolower($item->get_product()), $text) ||
                str_contains(strtolower($item->features->brand), $text) ||
                str_contains(strtolower($item->features->description), $text));
    }

    // Funzione che stabilisce la validità del testo digitato nella search bar. Nel caso di testo non valido genera una eccezione (Exception)
    function check_text($text)
    {
        if ((strlen($text) - substr_count($text, " ", 0)) <= 2)
        {
            throw new Exception("Testo non conforme o troppo breve!<br>Verrai reindirizzato alla pagina principale!");
            return false;
        }
        else
        {
            $_SESSION['text_to_search'] = $text;
            return true;
        }
    }

?>