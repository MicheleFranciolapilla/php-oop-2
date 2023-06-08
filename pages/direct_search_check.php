<?php
    // Pagina intermedia tra il submit nella barra di ricerca e la pagina di visualizzazione dei dati filtrati dalla ricerca.
    // In questa pagina viene invocata la specifica funzione per il check sulla validità del testo da cercare e, nel caso di eccezione (Exception), invia un messaggio specifico all'utente, con conseguente ritorno alla main page; nel caso di testo valido (nessuna eccezione) indirizza alla pagina che visualizza gli articoli filtrati dalla ricerca.
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    $_SESSION['page'] = 'direct_search_check';
    $_SESSION['page_index'] = -2;
    require_once __DIR__ . '/../php_functions_and_data/functions.php';
    require_once __DIR__ . '/../php_functions_and_data/database.php';
    // Non si esegue alcun controllo sullo stato isset($_GET['text_to_search']) poichè il parametro "required" dell'input del testo da cercare presuppone che, se si è giunti fin quì è solo perchè il testo esiste
    try
    {
        if (check_text($_GET['text_to_search']))
        // Condizione di validità del testo da cercare
            header("Location: ./direct_search.php");
    }
    catch(Exception $error)
    {
        // Condizione di eccezione (testo digitato non valido)
        require_once __DIR__ . '/../php_fragments_and_partials/partial_top.php';
        echo '<h2 class="text-center text-warning mt-5">' . $error->getMessage() . '</h2>';
?>
        <form class="d-flex justify-content-center" action="./main_page.php" method="post">
            <input type="hidden" name="back_to_main_page" value="1">
            <button type="submit" class="btn btn-warning border border-3 border-dark py-1 px-3 mt-3">OK</button>
        </form>
<?php
        exit();
        require_once __DIR__ . '/../php_fragments_and_partials/partial_bottom.php';
    }
?>