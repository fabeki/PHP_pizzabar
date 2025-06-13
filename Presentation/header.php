<?php

declare(strict_types=1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikerstoegang</title>
    <style>
        .menu-container {
            padding: 1em;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1em;
        }

        .afbeelding-container img {
            width: 160px;
            height: 120px;
        }

        .omschrijving-container {
            margin: 1em;
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <h1>Fabeki Pizzeria</h1>
        <nav>
            <a href="ctrlIndexPizzas.php">Overzicht pizza's</a>
            <?php if (!isset($_SESSION["gebruiker"])) { ?>
                <a href="ctrlLogin.php">Login</a>
                <a href="ctrlRegister.php">Registreer</a>
            <?php } else { ?>
                <a href="ctrlOverzichtBestelling.php">Mijn bestelling</a>
            <?php } ?>
            <a href="algemeenInfo.php">Algemeen info</a>
        </nav>
    </header>