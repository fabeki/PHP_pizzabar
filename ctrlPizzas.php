<?php

declare(strict_types=1);

spl_autoload_register();

use Business\PizzaService;

$pizzaSVC = new PizzaService;
$pizzaLijst = $pizzaSVC->getAllPizzas();
