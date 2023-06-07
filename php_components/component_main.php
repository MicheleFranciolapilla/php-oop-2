<?php 
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
?>
<main>
    <section id="card_set" class="d-flex border border-3 border-secondary rounded-3">
        <?php
            $page = $_SESSION['page'];
            $counter = 0;
            foreach($GLOBALS['items_collection'] as $index => $item):
        ?>
                <?php
                    if (($page == 'main') || ($page == $item->get_pet_str()) || (($page == 'direct_search') && (search_text($item)))):
                ?>
                        <div class="card position-relative py-2 d-flex flex-column justify-content-between align-items-center">
                            <div class="f_a_icon p-2 border border-2 rounded-circle">
                                <?php echo $item->get_classes_tag() ?>
                            </div>
                            <div class="extra_info">
                                <h6>Descrizione: <span><?= $item->features->description ?></span>
                                </h6>
                                <h5>Disponibilità: <?= $item->get_amount() ?></h5>
                            </div>
                            <img src="<?php echo $item->features->get_img_url() ?>" alt="<?php echo $item->features->description ?>">
                            <div class="info border border-2 border-dark rounded-3 bg-info">
                                <span><?php echo $item->features->brand ?></span>
                                <div class="d-flex justify-content-between">
                                    <span><?php echo $item->get_product() ?></span>
                                    <span><?php echo 'Prezzo: ' . $item->get_price() . ' &euro;' ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    $counter++;
                    endif;
                ?>
        <?php
            endforeach;
        ?>
    </section>
</main>