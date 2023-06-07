<?php
    require_once __DIR__ . './php_functions_and_data/session_methods.php';
    session_destroy_all();
    session_check_and_start();
    $_SESSION['new'] = true;
    header("Location: ./pages/main_page.php")
?>