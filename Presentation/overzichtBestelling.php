<?php require_once("header.php"); ?>

<h2>Overzicht bestelling</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Aantal</th>
        <th>Prijs/Stuk</th>
        <th>TotaalPrijs</th>
    </tr>
    <?php foreach ($mandje as $artikel):
    ?>
        <tr>
            <td><?= $artikel["naam"] ?></td>
            <td><?= $artikel["aantal"] ?></td>
            <td>€<?= $artikel["prijs"] ?></td>
            <td>€<?= $artikel["subTot"] ?></td>
        </tr>
    <?php endforeach;
    ?>
    <tr>
        <td colspan="3">Totaal</td>
        <td>€ <?= $tot ?></td>
    </tr>
</table>

<section>
    <h3>Zoek gemeente voor levering</h3>

    <form action="verwerkBestelling.php" method="post">

        <label for="gemeente">Kies gemeente:</label>

        <select name="plaatsId" id="gemeente" required>
            <option value="">Kies</option>
            <?php foreach ($leveringsPlaatsen as $plaats): ?>
                <option value="<?= $plaats->getPlaatsId() ?>">
                    <?= $plaats->getPostcode() ?><?= $plaats->getWoonplaats() ?>
                </option>
            <?php endforeach; ?>
        </select>

        <h3>Tijdstip levering</h3>
        <div>
            <input type="datetime-local" name="leveringsDatum" min="<?= $minTijd; ?>" required>
        </div>

        <h3>Extra bemerkingen</h3>
        <div>
            <textarea name="bemerking" cols="30" rows="3" place placeholder="Eventuele wensen voor de levering."></textarea>
        </div>

        <div>
            <input type="submit" value="Bestellen">
        </div>

    </form>
</section>

<?php require_once("footer.php"); ?>