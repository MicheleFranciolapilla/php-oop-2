<?php 
    // Componente main, comune a tutte le pagine
    require_once __DIR__ . '/../php_functions_and_data/session_methods.php';
    session_check_and_start();
?>
<main>
    <section id="card_set" class="d-flex border border-3 border-secondary rounded-3">
        <?php
            $page = $_SESSION['page'];
            $counter = 0;
            // Ciclo "foreach" eseguito su tutto l'array degli articoli
            foreach($GLOBALS['items_collection'] as $index => $item):
        ?>
                <?php
                    // Nel seguente "if" si vagliano le condizioni che, a seconda della pagina corrente, consentono la visualizzazione di un determinato articolo
                    if (($page == 'main') || ($page == $item->get_pet_str()) || (($page == 'direct_search') && (search_text($item)))):
                ?>
                        <!-- Nella pagina main vengono visualizzati tutti gli articoli dell'array -->
                        <!-- Nelle pagine secondarie specifiche dei vari pet, vengono selezionati e visualizzati solo gli articoli specifici per il pet della pagina -->
                        <!-- Nella pagina "direct_search" vengono selezionati e visualizzati solo gli articoli per i quali la funzione "search_text" fornisce un responso "true" -->
                        <div class="card position-relative py-2 d-flex flex-column justify-content-between align-items-center">
                            <div class="f_a_icon p-2 border border-2 rounded-circle">
                                <?php echo $item->get_classes_tag() ?>
                            </div>
                            <!-- Il seguente "div" consente, al passaggio del mouse, di visualizzare i dettagli secondari dell'articolo -->
                            <div class="extra_info">
                                <h6>Descrizione: <span><?= $item->features->description ?></span>
                                </h6>
                                <h5>Disponibilità: <?= $item->get_amount() ?></h5>
                            </div>
                            <!-- Seguono i tag per la visualizzazione delle card (immagine + dettagli primari) -->
                            <img src="<?php echo $item->features->get_img_url() ?>" alt="<?php echo $item->features->description ?>">
                            <div class="info border border-2 border-dark rounded-3 bg-info">
                                <span><?php echo $item->features->brand ?></span>
                                <div class="d-flex justify-content-between">
                                    <span><?php echo $item->get_product() ?></span>
                                    <span><?php echo 'Prezzo: ' . $item->get_price() . ' &euro;' ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    $counter++;
                    endif;
                ?>
        <?php
            endforeach;
            if (($page == 'direct_search') && ($counter == 0)):
        ?>
                <!-- Messaggio visualizzato solo in caso di ricerca infruttuosa -->
                <h2 class="mx-auto mt-5 text-warning">La ricerca non ha prodotto risultati</h2>
        <?php
            endif;
        ?>
    </section>
</main>