<?php
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    $_SESSION['page'] = 'direct_search_check';
    $_SESSION['page_index'] = -2;
    require_once __DIR__ . '/../php_functions_and_data/functions.php';
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
    if (isset($_GET['text_to_search']))
    {
        try
        {
            search_text($_GET['text_to_search']);
        }
        catch(Exception $error)
        {
            echo '<h2 class="text-center text-warning mt-5">' . $error->getMessage() . '</h2>';
?>
            <form class="d-flex justify-content-center" action="./main_page.php" method="post">
                <input type="hidden" name="back_to_main_page" value="1">
                <button type="submit" class="btn btn-warning border border-3 border-dark py-1 px-3 mt-3">OK</button>
            </form>
<?php
            exit();
        }
    }
    require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
?>