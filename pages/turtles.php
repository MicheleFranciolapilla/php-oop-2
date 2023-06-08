<?php
    // Pagina indirizzata per la visualizzazione dei soli articoli relativi alle tartarughe
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    $_SESSION['page'] = 'Turtle';
    $_SESSION['page_index'] = 3;
    require_once __DIR__ . '/../php_functions_and_data/functions.php';
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
?>
    <div id="turtles_page" class="page">
<?php
    require_once __DIR__ . '/../php_components/component_header_nav.php';
    require_once __DIR__ . '/../php_components/component_counter.php';
    require_once __DIR__ . '/../php_components/component_main.php';
    require_once __DIR__ . '/../php_components/component_footer.php';
?>
    </div>
<?php
    require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
?>