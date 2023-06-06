<?php 
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    // set_current_array(); 
?>
<main>
    <section id="card_set" class="d-flex border border-3 border-secondary rounded-3">
        <?php
        var_dump($_SESSION['my_array']);
            $page = $_SESSION['page'];
            $counter = 0;
            foreach($_SESSION['items_collection'] as $index => $item):
            // foreach($current_array as $index => $item):
        ?>
                <?php
                    if (($page == 'main') || ($page == $item->category->get_str_category())):
                ?>
                        <div class="card position-relative py-2 d-flex flex-column justify-content-between align-items-center">
                            <div class="f_a_icon p-2 border border-2 rounded-circle">
                                <?php echo $item->category->get_icon_tag() ?>
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