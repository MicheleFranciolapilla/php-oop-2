<?php

    // session_start();
    echo " status: ";
    var_dump(session_status());
    $_SESSION['page'] = 'Dogs';
    // require_once __DIR__ . '/../php_functions_and_data/database.php';
    // require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
    // require_once __DIR__ . '/../php_components/component_header.php';
    // require_once __DIR__ . '/../php_components/component_nav_menu.php';
    // require_once __DIR__ . '/../php_components/component_main.php';
    // require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
    var_dump($_SESSION['step']);
    require_once __DIR__ . './php_functions_and_data/database.php';
    require_once __DIR__ . './php_fragments_and_partials/partial_top.php';
    require_once __DIR__ . './php_components/component_header.php';
    require_once __DIR__ . './php_components/component_nav_menu.php';
    require_once __DIR__ . './php_components/component_main.php';
    require_once __DIR__ . './php_fragments_and_partials/partial_bottom.php';

?>