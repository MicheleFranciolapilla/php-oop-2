<?php
    // Componente "header + nav" comune a tutte le pagine del progetto
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
    // Invocazione alla funzione che popola l'array delle voci del menù, a seconda della pagina corrente
    set_menu_items(); 
?>
<div class="header_nav">
    <header class="position-relative border border-3 border-black-50 bg-light">
        <!-- A seconda che la pagina corrente sia la main o una pagina secondaria, lo header presenta solo il titolo oppure il titolo affiancato da un box indicante la pagina in questione -->
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
    <nav class="d-flex justify-content-between bg-success">
        <!-- La nav, oltre a differire per le voci del menù, presenta anche una ulteriore differenza: la main page (e solo essa) include anche la search bar -->
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
        <?php
            if ($_SESSION['page'] === 'main'):
        ?>
        <!-- Form (metodo GET)  relativo alla search bar -->
        <form class="d-flex me-3" action="./direct_search_check.php" method="get">
            <input class="form-control me-2" type="search" name="text_to_search" placeholder="Testo da cercare..." aria-label="Search" required>
            <button class="btn btn-outline-light" type="submit">Cerca</button>
        </form>
        <?php
            endif;
        ?>
    </nav>
</div>
