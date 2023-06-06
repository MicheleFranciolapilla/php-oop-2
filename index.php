<?php
    require_once __DIR__ . './php_functions_and_data/session_methods.php';
    session_destroy_all();
    session_check_and_start();
    $_SESSION['new'] = true;
    require_once __DIR__ . './php_fragments_and_partials/fragment_top.php';
    require_once __DIR__ . './php_fragments_and_partials/fragment_mid_top.php';
?>
    <a href="./pages/main_page.php"#main_page>Vai</a>
<?php
    require_once __DIR__ . './php_fragments_and_partials/fragment_bottom.php';
?>