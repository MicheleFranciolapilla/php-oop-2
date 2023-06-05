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