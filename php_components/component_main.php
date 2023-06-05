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
        <div class="card">
                <!-- var_dump($item->features->get_img_url()); -->
                <!-- var_dump(set_item_image($item->features->get_img_url())); -->
                <!-- echo '<img src"' . set_item_image($item->features->get_img_url()) . '">'; -->
                <img src="<?php echo $item->features->get_img_url() ?>" alt="">
        </div>
        <?php
            endforeach;
        ?>
    </section>
    <aside id="right">></aside>
</main>