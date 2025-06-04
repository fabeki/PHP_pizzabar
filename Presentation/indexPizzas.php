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
                                <p>Energie: <?= $pizza->getVoedingswaarde()->getEnergie(); ?> Kcal</p>
                                <p>Vetten: <?= $pizza->getVoedingswaarde()->getVet(); ?> g</p>
                                <p>Koolhydraten: <?= $pizza->getVoedingswaarde()->getKoolhydraat(); ?> g</p>
                                <p>Eiwitten: <?= $pizza->getVoedingswaarde()->getEiwit(); ?> g</p>
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
                    <h3>Bestelling</h3>
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
                                        <div> <?= $aantal ?>x <?= $pizza->getPizzaNaam(); ?> €<?= number_format($subTot, 2); ?></div>
                                        <div><a href="ctrlIndexPizzas.php?remove=<?= $pizzaId ?>">Verwijder</a></div>
                                    </div>
                        <?php endif;
                            endforeach;
                        endforeach; ?>

                        <div>Totaal €<?= number_format($tot, 2); ?></div>
                        <div><input type="submit" value="Afrekenen"></div>
                    </div>

                <?php else: ?>
                    <div>Mandje is leeg, kies een pizza.</div>
                <?php endif; ?>
            </form>
        </section>


    <?php } ?>

    <?php require_once("footer.php"); ?>