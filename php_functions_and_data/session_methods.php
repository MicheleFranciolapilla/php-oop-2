<?php
    // Set di funzioni utilizzate per la gestione delle variabili di sessione

    // Funzione utilizzata per chiudere la sessione eventualmente ancora aperta. Invocata all'avvio del programma, in "index.php"
    function session_destroy_all()
    {
        if (session_status() !== PHP_SESSION_NONE)
        {
            session_unset();
            session_destroy();
        }
    }

    // Funzione utilizzata per aprire una sessione, laddove non lo fosse già. Invocata all'inizio dei principali files del progetto
    function session_check_and_start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) 
        {
            session_start();
        }
    }

    // Funzione utilizzata per settare le variabili di sessione che decretano la prima istanza della pagina principale
    function session_check_if_new()
    {
        if ((isset($_SESSION['new'])) && ($_SESSION['new']))
        {
            $_SESSION['new'] = false;
            $_SESSION['step'] = 'started';
        }
    }

?>