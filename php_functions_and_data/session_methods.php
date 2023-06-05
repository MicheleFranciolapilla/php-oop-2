<?php

    function session_destroy_all()
    {
        if (session_status() === PHP_SESSION_ACTIVE)
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

    function session_check_and_set()
    {
        if (!isset($_SESSION['step']))
        {
            $_SESSION['step'] = "started";
        }
    }

?>