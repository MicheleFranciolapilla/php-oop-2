<?php
    require_once __DIR__ . './php_functions_and_data/session_methods.php';
    session_destroy_all();
    require_once __DIR__ . './php_fragments_and_partials/fragment_top.php';
    require_once __DIR__ . './php_fragments_and_partials/fragment_mid_top.php';
?>
    <a href="./pages/main_page.php"#start>Vai</a>
<?php
    require_once __DIR__ . './php_fragments_and_partials/fragment_bottom.php';
?>