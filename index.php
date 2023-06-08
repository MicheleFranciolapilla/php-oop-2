<?php
    // Pagina di ingresso, con la sola funzione di settaggio della variabile di sessione "new".
    // Il valore di "new" consente alla pagina principale di riconoscere se è in prima istanza ("new" = true), nel qual caso setta opportunamente la variabile di sessione "step", comunicando così al file del database di generare randomicamente l'array dei dati oppure ("new" = false) se si tratta di un'istanza di ritorno da pagine secondarie, caso in cui il file dei database non dovrà generare randomicamente i dati, bensì mantenere quelli già esistenti, fino alla conclusione della sessione in corso.
    require_once __DIR__ . './php_functions_and_data/session_methods.php';
    session_destroy_all();
    session_check_and_start();
    $_SESSION['new'] = true;
    // Redirect alla main page
    header("Location: ./pages/main_page.php");
?>