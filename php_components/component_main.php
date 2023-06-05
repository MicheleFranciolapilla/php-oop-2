<?php 
    require_once __DIR__ . '/../php_functions_and_data/functions.php';
    set_current_array(); 
?>
<main class="d-flex justify-content-between align-items-center mx-auto my-4">
    <aside id="left"><</aside>
    <section id="card_set" class="d-flex border border-3 border-secondary rounded-3 h-100">
        <?php
            foreach($current_array as $index => $item):
        ?>
        <div class="card py-2 d-flex flex-column justify-content-between align-items-center">
            <img src="<?php echo $item->features->get_img_url() ?>" alt="<?php echo $item->features->description ?>">
            <div class="info border border-2 border-dark rounded-3 bg-info">
                <h4><?php echo $item->features->brand ?></h4>
                <h5><?php echo $item->get_product() ?></h5>
                <h5 class="align-self-end"><?php echo 'Prezzo: ' . $item->get_price() . ' &euro;' ?></h5>
            </div>
        </div>
        <?php
            endforeach;
        ?>
    </section>
    <aside id="right">></aside>
</main>