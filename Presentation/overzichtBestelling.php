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
            <td style="text-align: left;"><?= $artikel["naam"] ?></td>
            <td style="text-align: left;"><?= $artikel["aantal"] ?></td>
            <td style="text-align: left;">€<?= number_format($artikel["prijs"], 2, ','); ?></td>
            <td style="text-align: left;">€<?= number_format($artikel["subTot"], 2, ','); ?></td>
        </tr>
    <?php endforeach;
    ?>
    <tr>
        <td colspan="3" style="font-size: 15px;font-weight: 600;">Subtotaal</td>
        <td style="text-align: left;font-size: 15px;font-weight: 600;">€ <?= number_format($tot, 2, ',') ?></td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 15px;font-weight: 600;">Korting</td>
        <td style="text-align: left;font-size: 15px;font-weight: 600;">- € <?= number_format($kortingTot, 2, ','); ?></td>
    </tr>
    <tr>
        <td colspan="3">Totaal</td>
        <td style="text-align: left;">€ <?= $tot - $kortingTot ?></td>
    </tr>
</table>

<section>
    <h3>Zoek gemeente voor levering</h3>

    <form action="verwerkBestelling.php" method="post">

        <label for="gemeente"></label>

        <select name="plaatsId" id="gemeente" required style="cursor: pointer;">
            <option value="">Kies</option>
            <?php foreach ($leveringsPlaatsen as $plaats): ?>
                <option value="<?= $plaats->getPlaatsId() ?>">
                    <?= $plaats->getPostcode() ?><?= $plaats->getWoonplaats() ?>
                </option>
            <?php endforeach; ?>
        </select>

        <h3>Tijdstip levering</h3>
        <div>
            <input type="datetime-local" name="leveringsDatum" min="<?= $minTijd; ?>" required style="cursor: pointer;">
        </div>

        <h3>Extra bemerkingen</h3>
        <div>
            <textarea name="bemerking" cols="30" rows="3" place placeholder="Eventuele wensen voor de levering."></textarea>
        </div>

        <div>
            <input type="submit" value="Bestellen" style="padding:8px; background-color: rgb(68, 82, 95); color: white;">
        </div>

    </form>
</section>

<?php require_once("footer.php"); ?>