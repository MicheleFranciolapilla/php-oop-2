<?php set_menu_items(); ?>
<nav class="d-flex bg-success">
    <ul id="menu_items" class="d-flex px-5">
        <?php
            foreach($menu_items as $item):
        ?>
            <li>
                <a href="<?php echo strtolower($item) . 's.php' ?>">
                    <?php echo $item ?>
                </a>
            </li>
        <?php
            endforeach;
        ?>
    </ul>
</nav>