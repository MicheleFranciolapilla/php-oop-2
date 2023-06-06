<?php
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    session_check_and_set();
    $_SESSION['page'] = 'main';
    var_dump($_SESSION);
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
?>
    <div id="main_page">
<?php
    require_once __DIR__ . '/../php_components/component_header.php';
    require_once __DIR__ . '/../php_components/component_nav_menu.php';
    require_once __DIR__ . '/../php_components/component_main.php';
?>
    </div>
<?php
    require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
?>