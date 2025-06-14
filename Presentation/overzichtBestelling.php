<?php require_once("header.php");

$huidigeTijd = new DateTime();
$huidigeTijd->add(new DateInterval('PT30M'));
$minTijd = $huidigeTijd->format('Y-m-d\TH:i');

?>
<h2>Overzicht bestelling</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Aantal</th>
        <th>Prijs/Stuk</th>
        <th>TotaalPrijs</th>
    </tr>
    <?php // foreach ($mandje as $artikel): 
    ?>
    <tr>
        <td>//naam</td>
        <td>//aantal</td>
        <td>//prijs/stuk</td>
        <td>//totprijs</td>
    </tr>
    <?php // endforeach; 
    ?>
    <tr>
        <td colspan="3">Totaal</td>
        <td>€ </td>
    </tr>
</table>

<section>
    <h3>Zoek gemeente voor levering</h3>

    <form action="#" method="post">

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

        <div>
            <input type="submit" value="Bestellen">
        </div>

    </form>
</section>

<?php require_once("footer.php"); ?>