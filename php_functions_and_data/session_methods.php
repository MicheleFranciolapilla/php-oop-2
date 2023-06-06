<?php

    function session_destroy_all()
    {
        if (session_status() !== PHP_SESSION_NONE)
        {
            session_unset();
            session_destroy();
        }
    }

    function session_check_and_start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) 
        {
            session_start();
        }
    }

    function session_check_if_new()
    {
        if ((isset($_SESSION['new'])) && ($_SESSION['new']))
        {
            $_SESSION['new'] = false;
            $_SESSION['step'] = 'started';
        }
    }

?>