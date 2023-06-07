<?php
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    set_menu_items(); 
?>
<div class="header_nav">
    <header class="position-relative border border-3 border-black-50 bg-light">
        <h1 class="text-center text-black-50">Happy Pet - online shop</h1>
        <?php
            if ($_SESSION['page'] !== 'main'):
        ?>
                <div class="pages_top_area">
                    <h6>Pagina <?php echo "   < " . $_SESSION['page'] . " > "?></h6>
                </div>
        <?php
            endif;
        ?>
    </header>
    <nav class="d-flex bg-success">
        <ul id="menu_items" class="d-flex px-5">
            <?php
                foreach($menu_items as $index => $item):
            ?>
                    <li>
                        <?php
                            if ($_SESSION['page'] === 'main'):
                        ?>
                                <a href="<?php echo strtolower($item) . 's.php' ?>">
                                    <?php echo $item ?>
                                </a>
                                <span class="counter"><?= $_SESSION['category_counters'][$index] ?></span>
                        <?php
                            else:
                        ?>
                                <a href="main_page.php">
                                    <?php echo $item ?>
                                </a>
                                <span class="counter"><?= count($GLOBALS['items_collection']) ?></span>
                        <?php
                            endif;
                        ?>
                    </li>
            <?php
                endforeach;
            ?>
        </ul>
    </nav>
</div>
