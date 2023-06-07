<?php

    function set_total_items()
    {
        return mt_rand($GLOBALS['min_items_nr'], $GLOBALS['max_items_nr']);
    }

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

    function init_counters()
    {
        for ($i = 0; $i < count($GLOBALS['categories']); $i++)
            $_SESSION['category_counters'][$i] = 0;
    }

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

    function set_menu_items()
    {
        if ($_SESSION['page'] === 'main')
        {
            $GLOBALS['menu_items'] = array_keys($GLOBALS['categories']);
        }
        else
        {
            $GLOBALS['menu_items'] = ['<i class="fa-solid fa-backward"></i> Indietro'];
        }
    }

    function set_current_array()
    {
        var_dump($_SESSION['items_collection'][0]);
        echo "<br>-----------------------------------------<br>";
        if ($_SESSION['page'] === 'main')
        {
            $GLOBALS['current_array'] = $_SESSION['items_collection'];
        }
        else
        {
            $temporary_array = [];
            $collection = $_SESSION['items_collection'];
            foreach($collection as $index => $item)
            {
                $pet = $item;
                var_dump($item);
                if ($pet->category->get_str_category() == $_SESSION['page'])
                $temporary_array[] = $item;
            }
            $GLOBALS['current_array'] = $temporary_array;
        }
    }

?>