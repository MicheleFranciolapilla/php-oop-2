<?php

    include_once __DIR__ . '/../classes/primitives/pet_category.php';
    include_once __DIR__ . '/../classes/primitives/base_item.php';
    include_once __DIR__ . '/../classes/primitives/features.php';
    include_once __DIR__ . '/../classes/extended/pet_item.php';
    include_once __DIR__ . './functions.php';


    $products       =   [
                            // Cani
                            [
                                'Julius-K9'     =>  [
                                                        ["Pettorina", "Pettorina per cani di piccola taglia", 10.33],
                                                        ["Pettorina", "Pettorina per cani di taglia media", 20.00],
                                                        ["Pettorina", "Pettorina per cani di taglia grande", 30.60],
                                                        ["Collare", "Collare tradizionale", 7.18],
                                                        ["Collare", "Collare rinforzato", 15.30],
                                                        ["Guinzaglio", "Guinzaglio fisso", 5.15],
                                                        ["Guinzaglio", "Guinzaglio fisso in dacron", 10.80],
                                                        ["Guinzaglio", "Guinzaglio estensibile", 15.30]
                                                    ],
                                'Trixie'        =>  [
                                                        ["Pettorina", "Pettorina power", 25.65],
                                                        ["Pettorina", "Pettorina super power", 45.85]
                                                    ],
                                'Bravecto'      =>  [
                                                        ["Antiparassitari", "Bocconcini masticabili", 20.25],
                                                        ["Antiparassitari", "Bocconcini masticabili - dose trimestrale", 55.00]
                                                    ],
                                'Advantix'      =>  [
                                                        ["Antizecche", "Pipetta cutanea", 10.8],
                                                        ["Antizecche", "Masticabile", 12.15]
                                                    ],
                                'Monge'         =>  [
                                                        ["Cibo secco", "Crocchette piccole, pollo & riso", 15.25],
                                                        ["Cibo secco", "Crocchette piccole, agnello & patate", 18.30],
                                                        ["Cibo secco", "Crocchette grandi, agnello & riso", 20.30],
                                                        ["Cibo umido", "Scatoletta, manzo", 5],
                                                        ["Cibo umido", "Scatoletta, pollo", 3.5]
                                                    ],
                                'Dogbauer'      =>  [
                                                        ["Ciotola piccola", "Plastica", 7],
                                                        ["Ciotola piccola", "Alluminio", 9.30],
                                                        ["Ciotola grande", "Alluminio", 13.20]
                                                    ],
                            ],
                            // Gatti
                            [
                                'Seresto'       =>  [
                                                        ["Antiparassitari", "Collare antiparassitario - trimestrale", 35.45],
                                                        ["Antiparassitari", "Collare antiparassitario - semestrale", 65.85]
                                                    ],
                                'Canagan'       =>  [
                                                        ["Croccantini", "Gusto tacchino", 27.00],
                                                        ["Croccantini", "Gusto salmone", 30.5],
                                                        ["Cibo umido", "Gusto pollo", 25.3]
                                                    ],
                                'Lindocat'      =>  [
                                                        ["Lettiera", "Lettiera agglomerante", 7.10],
                                                        ["Lettiera", "Lettiera non agglomerante", 7]
                                                    ],
                            ],
                            // Pesci
                            [
                                'Tetra'         =>  [
                                                        ["Mangime in granuli", "Mangime completo per pesci rossi", 17.30],
                                                        ["Mangime in fiocchi", "Mangime per pesci gatto", 15]
                                                    ],
                                'Nicrew'        =>  [
                                                        ["Ossigenatore", "Ossigenatore per acquario", 18.35]
                                                    ],
                                'Flintronic'    =>  [
                                                        ["Ossigenatore", "Ossigenatore ultra power", 42.60]
                                                    ],
                            ],
                            // Tartarughe
                            [
                                'Omem'          =>  [
                                                        ["Riparo habitat", "Nascondiglio per tartarughe di terra", 58]
                                                    ],
                                'Aqua-in'       =>  [
                                                        ["Mangime", "Mangime in pellets per tartarughe di acqua", 23.35],
                                                        ["Mangime", "Mangime pro in pellets", 28.46]
                                                    ],
                                'GeorPlast'     =>  [
                                                        ["Tartarughiera", "Tartarughiera in plastica", 11.30]
                                                    ]
                            ]
                        ];       
    
    $categories     =   [
                            "Dog"       =>  "fa-dog",
                            "Cat"       =>  "fa-cat",
                            "Fish"      =>  "fa-fish-fins",
                            "Turtle"    =>  "fa-turtle"
                        ];

    $backup_img = __DIR__ . '/../img/error-404.jpg';
    $max_items_nr = 37;
    $total_items = 0;
    set_total_items();
    $items_collection = [];
    create_database();
    $max_amount = 25;
    set_amounts();
    $current_array = [];
    $menu_items = [];
    // for ($i = 0; $i < $total_items; $i++)
    // {
    //     echo "<br>";
    //     echo "Elemento nr " . $i +1 . "<br>";
    //     echo "Pet: " . strval($items_collection[$i]->get_category()->get_int_category()) . " " . $items_collection[$i]->get_category()->get_str_category() . "<br>";
    //     echo "Prodotto: " . strval($items_collection[$i]->get_product()) . "<br>";
    //     echo "Marca: " . $items_collection[$i]->features->brand . "<br>";
    //     echo "Descrizione: " . $items_collection[$i]->features->description . "<br>";
    //     echo "Quantitàà " . strval($items_collection[$i]->get_amount()) . "<br>";
    //     echo "Prezzo in euro: " . strval($items_collection[$i]->get_price()) . "<br>";
    //     echo "_______________________________________________________________________ <br>";
    // }
?>