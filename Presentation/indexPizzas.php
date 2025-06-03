<?php require_once("header.php"); ?>

<h2>Aanbod Pizza's</h2>

<?php if (empty($pizzaLijst)) { ?>
    <p>Geen pizza's gevonden</p>
    <?php } else {
    foreach ($pizzaLijst as $pizza) : ?>
        <div class="product-container">

            <div class="afbeelding-container">
                <img src="img/<?= $pizza->getPizzaNaam(); ?>.avif" alt="<?= $pizza->getPizzaNaam(); ?>">
            </div>

            <div class="omschrijving-container">
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
<?php endforeach;
} ?>

<?php require_once("footer.php"); ?>