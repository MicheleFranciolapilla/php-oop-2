<?php

    require_once __DIR__ . '/../classes/primitives/base_item.php';
    require_once __DIR__ . '/../classes/primitives/features.php';
    require_once __DIR__ . '/../classes/primitives/pet_category.php';
    require_once __DIR__ . '/../classes/extended/pet_item.php';
    require_once __DIR__ . '/../classes/primitives/pet_trait.php';

    function set_total_items()
    {
        do
        {
            $total_items = mt_rand(0, $GLOBALS['max_items_nr']);
        } while ($total_items < ($GLOBALS['max_items_nr'] / 2));
        return $total_items;
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
        for ($j = 0; $j < count($_SESSION['items_collection']); $j++)
        {
            if ($item_to_check == $_SESSION['items_collection'][$j])
            {
                $repeated = true;
                break;
            }
        }
        return $repeated;
    }

    function create_collection()
    {
        $total_items = set_total_items();
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
                array_push($_SESSION['items_collection'], $single_item);
            else
                $i--;
        }
    }

    // function set_amounts()
    // {
    //     foreach($_SESSION['items_collection'] as $item)
    //     {
    //         $item->set_amount(mt_rand(1, $GLOBALS['max_amount']));
    //     }
    // }

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
                // $pet = new Pet_Item("",0,new Features("","",""),new Pet_Category("",0,[]));
                $pet = $item;
                var_dump($item);
                if ($pet->category->get_str_category() == $_SESSION['page'])
                $temporary_array[] = $item;
            }
            $GLOBALS['current_array'] = $temporary_array;
        }
    }

    function set_item_image(string $img_url) : string
    {
        $response = $img_url;
        if ($response == "")
            $response = $GLOBALS['backup_img'];
        return $response;
    }

?>