<?php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\BestellingService;

$klant = unserialize($_SESSION["gebruiker"]);

$plaatsId = (int)$_POST["plaatsId"];

$leveringsDatum = new DateTime($_POST["leveringsDatum"]);

$korting = 0;

$bemerking = $_POST["bemerking"] ?? null;

$bestellingSVC = new BestellingService();
$bestellingId = $bestellingSVC->createBestelling(
    klant: $klant,
    besteldatum: $leveringsDatum,
    korting: $korting,
    bemerking: $bemerking,
    //mandje: $_SESSION["mandje"]
);

//unset($_SESSION["mandje"]);

header("Location: bevestigingBestelling.php");
exit;
