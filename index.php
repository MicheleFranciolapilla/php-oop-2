<?php
    session_start();
    $_SESSION['page'] = 'main';
    require_once __DIR__ . './php_functions_and_data/database.php';
    require_once __DIR__ . './php_fragments_and_partials/fragment_top.php';
?>
    <!-- Link a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link a Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link al foglio di stile -->
    <link rel="stylesheet" href="./css/style.css">
<?php
    require_once __DIR__ . './php_fragments_and_partials/fragment_mid_top.php';
    require_once __DIR__ . './php_components/component_header.php';
    require_once __DIR__ . './php_components/component_nav_menu.php';
    require_once __DIR__ . './php_components/component_main.php';
?>
    <!-- CDN per Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
    require_once __DIR__ . './php_fragments_and_partials/partial_bottom.php';
?>