<?php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\PizzaService;
use Business\PlaatsService;

//overzicht bestelling
$pizzaSVC = new PizzaService();
$tot = 0;
$mandje = [];
$aantalPizzas = 0;
$kortingTot = 0;

if (isset($_SESSION["mandje"])) {
    foreach ($_SESSION["mandje"] as $pizzaId => $aantal) {
        $pizza = $pizzaSVC->getPizzaById((int)$pizzaId);
        $prijs = $pizza->getPrijs();
        $subTot = $prijs * $aantal;
        $tot += $subTot;
        $aantalPizzas += $aantal;

        $mandje[] = [
            'naam' => $pizza->getPizzaNaam(),
            'aantal' => $aantal,
            'prijs' => $prijs,
            'subTot' => $subTot
        ];
    }
    if ($tot > 50) {
        $kortingTot += 5;
    }
    if ($aantalPizzas >= 10) {
        $kortingTot += 10;
    }
    $_SESSION["korting"] = $kortingTot;
}

//leveringplaats 
$plaatsSVC = new PlaatsService();
$leveringsPlaatsen = $plaatsSVC->getPlaatsenByPostcodes([3580, 3581, 3582]);

//tijd
$tijd = new DateTime();
$tijd->add(new DateInterval('PT30M'));
$minTijd = $tijd->format('Y-m-d\TH:i');

include("Presentation/overzichtBestelling.php");
