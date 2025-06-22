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
    $id = (int)$_GET["remove"];
    if (isset($_SESSION["mandje"][$id])) {
        if ($_SESSION["mandje"][$id] > 1) {
            $_SESSION["mandje"][$id]--;
        } else {
            unset($_SESSION["mandje"][$id]);
        }
    }
}
if (isset($_GET["add"])) {
    $id = (int)$_GET["add"];
    if (isset($_SESSION["mandje"][$id])) {
        $_SESSION["mandje"][$id]++;
    }
}

include("Presentation/indexPizzas.php");
