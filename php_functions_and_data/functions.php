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
            $GLOBALS['total_items'] = mt_rand(0, $GLOBALS['max_items_nr']);
        } while ($GLOBALS['total_items'] < ($GLOBALS['max_items_nr'] / 2));
    }

    function create_category() : Pet_Category
    {
        $easing_bool = false;
        $keys = array_keys($GLOBALS['categories']);
        do
        {
            $index = mt_rand(0,count($GLOBALS['categories']) - 1);
            $easing_rand = mt_rand(0,10);
            if ($index == 0)
                $easing_bool = true;
            else
            {
                if (($index == 1) && ($easing_rand <= 8))
                    $easing_bool = true;
                elseif (($index == 2) && ($easing_rand <= 5))
                    $easing_bool = true;
                elseif (($index == 3) && ($easing_rand < 3))
                    $easing_bool = true;
            }
        } while (!$easing_bool);
        $GLOBALS['single_item']["category"] = $index;
        return new Pet_Category($keys[$index], $index, ["fa-solid",$GLOBALS['categories'][$keys[$index]]]);
    }

    function create_database()
    {
        for ($i = 0; $i < $GLOBALS['total_items']; $i++)
        {
            $category = create_category();
            $keys = array_keys($GLOBALS['products'][$category->get_int_category()]);
            $key = mt_rand(0, count($keys) - 1);
            $inner_array_index = mt_rand(0,count($GLOBALS['products'][$category->get_int_category()][$keys[$key]]) - 1);
            $inner_array = $GLOBALS['products'][$category->get_int_category()][$keys[$key]][$inner_array_index];
            $item_to_add = new Pet_Item($inner_array[0], $inner_array[2], new Features($keys[$key], $inner_array[1], $inner_array[3]), $category);
            $GLOBALS['single_item']["brand"] = $keys[$key];
            $GLOBALS['single_item']["product"] = $inner_array[0];
            $GLOBALS['single_item']["description"] = $inner_array[1];
            $GLOBALS['single_item']["price"] = $inner_array[2];
            $GLOBALS['single_item']["img_url"] = $inner_array[3];
            $_SESSION['my_array'][] = $GLOBALS['single_item'];
            $found = false;
            for ($j = 0; $j < $i; $j++)
            {
                if ($item_to_add->is_it_you($_SESSION['items_collection'][$j]))
                    {
                        $found = true;
                        break;
                    }
            }
            if (!$found)
            {
                array_push($_SESSION['items_collection'], $item_to_add);
            }
            else
            {
                $i--;
            }
        }
    }

    function set_amounts()
    {
        foreach($_SESSION['items_collection'] as $item)
        {
            $item->set_amount(mt_rand(1, $GLOBALS['max_amount']));
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