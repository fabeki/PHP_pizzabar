<?php require_once("header.php"); ?>

<h2>Aanbod Pizza's</h2>

<?php if (empty($pizzaLijst)) { ?>
    <p>Geen pizza's gevonden</p>
<?php } else { ?>
    <div class="menu-container">

        <?php foreach ($pizzaLijst as $pizza) : ?>

            <div class="product-container">


                <form method="post" action="ctrlIndexPizzas.php">

                    <div class="afbeelding-omschrijving-container">

                        <div class="afbeelding-container">
                            <img src="img/<?= $pizza->getPizzaNaam(); ?>.avif" alt="<?= $pizza->getPizzaNaam(); ?>">
                        </div>

                        <div class="omschrijving-container">
                            <input type="hidden" name="pizzaId" value="<?= $pizza->getPizzaId(); ?>">
                            <p><?= $pizza->getPizzaNaam(); ?></p>
                            <p>€<?= $pizza->getPrijs(); ?></p>
                            <p><?= $pizza->getSamenstelling(); ?></p>
                            <div class="voedingswaarden">
                                <details>
                                    <summary>Voedingswaarden</summary>
                                    <p>Energie: <?= $pizza->getVoedingswaarde()->getEnergie(); ?> Kcal</p>
                                    <p>Vetten: <?= $pizza->getVoedingswaarde()->getVet(); ?> g</p>
                                    <p>Koolhydraten: <?= $pizza->getVoedingswaarde()->getKoolhydraat(); ?> g</p>
                                    <p>Eiwitten: <?= $pizza->getVoedingswaarde()->getEiwit(); ?> g</p>
                                </details>
                            </div>

                        </div>

                    </div>

                    <div class="button-container">
                        <input type="submit" value="Toevoegen">
                    </div>

                </form>

            </div>

        <?php endforeach; ?>

        <section class="mand-container">
            <form action="ctrlMandjeAfrekenen.php" method="post">
                <header>
                    <h3>Bestelling</h3><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                    </svg>

                </header>

                <?php $subTot = 0;
                $tot = 0;
                if (isset($_SESSION["mandje"]) && !empty($_SESSION["mandje"])): ?>
                    <div class="bestelling-container">
                        <?php foreach ($_SESSION["mandje"] as $pizzaId => $aantal): // '=>' sleutels/waarden uit array halen
                            foreach ($pizzaLijst as $pizza):
                                if ($pizza->getPizzaId() === (int)$pizzaId):
                                    $subTot = $pizza->getPrijs() * $aantal;
                                    $tot += $subTot;
                        ?>
                                    <div>
                                        <div><?= $aantal ?>x <?= $pizza->getPizzaNaam(); ?> €<?= number_format($subTot, 2); ?></div>
                                        <div><a href="ctrlIndexPizzas.php?remove=<?= $pizzaId ?>" class="fa fa-minus"></a></div>
                                        <div><a href="ctrlIndexPizzas.php?add=<?= $pizzaId ?>" class="fa fa-plus"></a></div>
                                    </div>
                        <?php endif;
                            endforeach;
                        endforeach; ?>

                        <div>Totaal €<?= number_format($tot, 2); ?></div>
                        <div><input type="submit" value="Afrekenen" name="afrekenen"></div>
                    </div>

                <?php else: ?>
                    <div>Mandje is leeg, kies een pizza.</div>
                <?php endif; ?>
            </form>
        </section>


    <?php } ?>

    <?php require_once("footer.php"); ?>