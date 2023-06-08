<?php
    // Pagina principale, dentro la quale vengono visualizzati tutti gli elementi del database (generati randomicamente) e contenente, all'interno della nav, anche la barra di ricerca
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    // Con l'invocazione seguente, la main page riconosce se si tratta di prima istanza o di un'istanza di ritorno e, a seconda dei casi, comunica al database se si dovrà generare randomicamente l'array dei dati o se esso già esista.
    session_check_if_new();
    $_SESSION['page'] = 'main';
    $_SESSION['page_index'] = -1;
    require_once __DIR__ . '/../php_functions_and_data/functions.php';
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
?>
    <div id="main_page" class="page">
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