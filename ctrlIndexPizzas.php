<?php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\PizzaService;

$pizzaSVC = new PizzaService;
$pizzaLijst = $pizzaSVC->getAllPizzas();

if (isset($_POST["pizzaId"])) {
    $pizzaId = (int)$_POST["pizzaId"];

    if (!isset($_SESSION["mandje"])) {
        $_SESSION['mandje'] = [];
    }

    if (!isset($_SESSION["mandje"][$pizzaId])) {
        $_SESSION["mandje"][$pizzaId] = 1; // waarde=$aantal
    } else {
        $_SESSION["mandje"][$pizzaId]++;
    }
}

if (isset($_GET["remove"])) {
    $id = $_GET["remove"];
    unset($_SESSION["mandje"][$id]);
}

include("Presentation/indexPizzas.php");
