<?php
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
?>

<div class="collection_counter border border-2 rounded-3 py-1 px-3">
    <?php 
        if ($_SESSION['page'] == 'main'):
    ?>
            <h5>Articoli presenti in pagina: <?= count($GLOBALS['items_collection']) ?></h5>
    <?php
        else:
    ?>
            <h5>Articoli presenti in pagina: <?= $_SESSION['category_counters'][$_SESSION['page_index']] ?></h5>
    <?php
        endif;
    ?>
</div>