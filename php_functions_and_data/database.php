<?php

    require_once __DIR__ . './session_methods.php';
    session_check_and_start();

    require_once __DIR__ . '/../classes/primitives/pet_category.php';
    require_once __DIR__ . '/../classes/primitives/pet_trait.php';
    require_once __DIR__ . '/../classes/primitives/base_item.php';
    require_once __DIR__ . '/../classes/primitives/features.php';
    require_once __DIR__ . '/../classes/extended/pet_item.php';
    require_once __DIR__ . './functions.php';

    $products       =   [
                            // Cani
                            [
                                'Julius-K9'     =>  [
                                                        ["Pettorina", "Pettorina per cani di piccola taglia", 10.33, 
                                                        "https://cdn.manomano.com/images/images_products/5095106/P/42727644_1.jpg"],
                                                        ["Pettorina", "Pettorina per cani di taglia media", 20.00, 
                                                        "https://soyouz2.deindeal.ch/api/img?p=products/2023/4/F1893854-32EA-46D4-B7B9-3E6E7F0580ED/14602327_1&st=11&v=1681752324"],
                                                        ["Pettorina", "Pettorina per cani di taglia grande", 30.60 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzwwtTSyXJCPmbs8HHVercO3wRfX3uaj6SSg&usqp=CAU"],
                                                        ["Collare", "Collare tradizionale", 7.18 ,
                                                        "https://www.aquazoomaniashop.it/4117-home_default/julius-k9-collare-in-pelle-nero-16mm-x-45cm.jpg"],
                                                        ["Collare", "Collare rinforzato", 15.30 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTheG9af2_a-UfUFYYryOozOyKqz868zj8H36uIcfWzEjDBda_Eumm6JANkS6SvZHimS_g&usqp=CAU"],
                                                        ["Guinzaglio", "Guinzaglio fisso", 5.15 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTllUB8RudyzXP4lq28pvuhbtN6QivvNp1CYQ&usqp=CAU"],
                                                        ["Guinzaglio", "Guinzaglio fisso in dacron", 10.80 ,
                                                        "https://www.aquazoomaniashop.it/34928-home_default/guinzaglio-in-pelle-con-maniglia-13mm-x-120m.jpg"],
                                                        ["Guinzaglio", "Guinzaglio estensibile", 15.30 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTJ4z43CJupkU4gYpCPXgm04HR6d48FyzdSg&usqp=CAU"]
                                                    ],
                                'Trixie'        =>  [
                                                        ["Pettorina", "Pettorina power", 25.65 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYgyV5vgXjaKWL9pd9HH1Dm8_R3W3A0bQlBQ&usqp=CAU"],
                                                        ["Pettorina", "Pettorina super power", 45.85 ,
                                                        "https://m.media-amazon.com/images/I/51gWXhuu2QL._AC_.jpg"]
                                                    ],
                                'Bravecto'      =>  [
                                                        ["Antiparassitari", "Bocconcini masticabili", 20.25 ,
                                                        "https://cdn.shopify.com/s/files/1/0583/3605/1358/products/BRAVECTO_-Tableta-Masticable-Contra-Pulgas-y-Garrapatas-para-Perros-de-4.5-A-10-Kg.jpg?v=1659639382"],
                                                        ["Antiparassitari", "Bocconcini masticabili - dose trimestrale", 55.00 ,
                                                        "https://gopet.vtexassets.com/arquivos/ids/158964/20190241_1.jpg?v=638108610027200000"]
                                                    ],
                                'Advantix'      =>  [
                                                        ["Antizecche", "Pipetta cutanea", 10.8 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNSdMP2qkeqJeSMxfUEBcp6yWqP9S2ecnUBA&usqp=CAU"],
                                                        ["Antizecche", "Masticabile", 12.15 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5OuS--zdNnLk_CHUDryX9Pm6_0xWbKayNLA&usqp=CAU"]
                                                    ],
                                'Monge'         =>  [
                                                        ["Cibo secco", "Crocchette piccole, pollo & riso", 15.25 ,
                                                        "https://www.monge.it/wp-content/uploads/2016/04/monge_cane_secco_all_breeds_adult_monoprotein_pollo_con_riso_e_patate.jpg"],
                                                        ["Cibo secco", "Crocchette piccole, agnello & patate", 18.30 ,
                                                        "https://tcdn.storeden.com/product/19107978/20691240"],
                                                        ["Cibo secco", "Crocchette grandi, salmone & riso", 20.30 ,
                                                        "https://www.quattrozampeshop.it/monge_cane_secco_mini_adult_salmone_e_riso.jpeg"],
                                                        ["Cibo umido", "Scatoletta, manzo", 5 ,
                                                        "https://www.monge.it/wp-content/uploads/2017/09/monge_cane_umido_monoproteico_solo_manzo.jpg"],
                                                        ["Cibo umido", "Scatoletta, pollo", 3.5 ,
                                                        "https://alandog.com/wp-content/uploads/2020/07/monge_monoprotein_pollo_scatoletta.png"]
                                                    ],
                                'Dogbauer'      =>  [
                                                        ["Ciotola piccola", "Plastica", 7 ,
                                                        "https://www.isoladeitesori.it/dw/image/v2/BGRZ_PRD/on/demandware.static/-/Sites-it-master-catalog/default/dwce29a328/idt/172198.jpg?sw=400&sh=400"],
                                                        ["Ciotola piccola", "Acciaio", 9.30 ,
                                                        "https://www.dogbauer.it/874/ciotola-acciaio-grande.jpg"],
                                                        ["Ciotola grande", "Acciaio", 13.20 ,
                                                        "https://www.tescomaonline.com/media/images/catalog/item/zoom/gc19_428600__4.jpg"]
                                                    ],
                            ],
                            // Gatti
                            [
                                'Seresto'       =>  [
                                                        ["Antiparassitari", "Collare antiparassitario - trimestrale", 35.45 ,
                                                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDv3EX69pFpKX2ZoVNeFS0Le_6xjhUT5cs5d6Ulq12xYLzdxJ1kksLgnyTAIw8vIY48Pw&usqp=CAU"],
                                                        ["Antiparassitari", "Collare antiparassitario - otto mesi", 65.85 ,
                                                        "https://quattrozampecatania.it/2054-thickbox_default/seresto-per-gatti.jpg"]
                                                    ],
                                'Canagan'       =>  [
                                                        ["Croccantini", "Gusto tacchino", 27.00 ,
                                                        "https://www.naturepetshop.it/wp-content/uploads/canagan-umido-gatto-pollo-e-tacchino.jpg"],
                                                        ["Croccantini", "Gusto salmone", 30.5 ,
                                                        "https://www.cucciolandia.eu/17160-home_default/canagan-cat-softies-salmone-50g.jpg"],
                                                        ["Cibo umido", "Gusto pollo", 25.3 ,
                                                        "https://www.naturepetshop.it/wp-content/uploads/canagan-umido-pollo-e-verdure.jpg"]
                                                    ],
                                'Lindocat'      =>  [
                                                        ["Lettiera", "Lettiera agglomerante", 7.10 ,
                                                        "https://www.villaggionatura.com/shop/7720-large_default/lindocat-charme-lettiera-agglomerante-10-litri.jpg"],
                                                        ["Lettiera", "Lettiera non agglomerante", 7 ,
                                                        "https://cdn.shopify.com/s/files/1/0615/2159/2563/products/lettiera-micro-agglomerante-con-bicarbonato-advanced-multicat-lindocat-lt-12-lindocat-8006455001151-37713674764531_grande.png?v=1657796765"]
                                                    ],
                            ],
                            // Pesci
                            [
                                'Tetra'         =>  [
                                                        ["Mangime in granuli", "Mangime completo per pesci rossi", 17.30 ,
                                                        "https://arcaplanet.vtexassets.com/arquivos/ids/265786/tetramin-granules-mangime-per-pesci.jpg?v=1771342114"],
                                                        ["Mangime in fiocchi", "Mangime per pesci gatto", 15 ,
                                                        "https://m.media-amazon.com/images/I/51KGK9HNdYL._AC_UF894,1000_QL80_.jpg"]
                                                    ],
                                'Nicrew'        =>  [
                                                        ["Ossigenatore", "Ossigenatore per acquario", 18.35 ,
                                                        "https://m.media-amazon.com/images/I/81dSzK83LcL._AC_UF350,350_QL80_.jpg"]
                                                    ],
                                'Flintronic'    =>  [
                                                        ["Ossigenatore", "Ossigenatore ultra power", 42.60 ,
                                                        "https://m.media-amazon.com/images/I/61uwen8DWdL._AC_UF1000,1000_QL80_.jpg"]
                                                    ],
                            ],
                            // Tartarughe
                            [
                                'Omem'          =>  [
                                                        ["Riparo habitat", "Nascondiglio per tartarughe di terra", 58 ,
                                                        "https://m.media-amazon.com/images/I/61cJY7FWGwL._AC_UF350,350_QL80_.jpg"]
                                                    ],
                                'Aqua-in'       =>  [
                                                        ["Mangime", "Mangime in pellets per tartarughe di acqua", 23.35 ,
                                                        "https://www.agrozootecnica.com/images/products/AQUALITAR0008.jpg"],
                                                        ["Mangime", "Mangime pro in pellets", 28.46 ,
                                                        "https://happy4pets.b-cdn.net/pub/media/catalog/product/cache/8cd6d6aedab6715f945a7b14f0374f5a/a/q/aquapet-mangime-tartarughe-acqua-dolce-sticks_1.jpg"]
                                                    ],
                                'GeorPlast'     =>  [
                                                        ["Tartarughiera", "Tartarughiera in plastica", 11.30 ,
                                                        "https://m.media-amazon.com/images/I/71HGgvA6clL.jpg"]
                                                    ]
                            ]
                        ];       
    
    // $single_item    =   [
    //                         "category"      =>  0,
    //                         "brand"         =>  "",
    //                         "product"       =>  "",
    //                         "description"   =>  "",
    //                         "price"         =>  0,
    //                         "img_url"       =>  ""
    //                     ]; 

    $categories     =   [
                            "Dog"       =>  "fa-dog",
                            "Cat"       =>  "fa-cat",
                            "Fish"      =>  "fa-fish-fins",
                            "Turtle"    =>  "fa-turtle"
                        ];
    $max_items_nr   =   37;
    $max_amount     =   25;
    $backup_img     =   '';
    $menu_items     =   [];

    if ($_SESSION['step'] === 'started')
    {
        $_SESSION['step'] = 'created';
        $_SESSION['data_collection'] = [];
        $_SESSION['amounts'] = [];
        create_collection();
    }

    $items_collection = [];
    create_items_collection();
?>