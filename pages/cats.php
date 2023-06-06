<?php
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    $_SESSION['page'] = 'cats';
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
?>
    <div id="cats_page">
        <h2>Ciao amici dei gatti</h2>
<?php
    require_once __DIR__ . '/../php_components/component_header.php';
    require_once __DIR__ . '/../php_components/component_nav_menu.php';
    require_once __DIR__ . '/../php_components/component_main.php'
?>
    </div>
<?php
    require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
?>