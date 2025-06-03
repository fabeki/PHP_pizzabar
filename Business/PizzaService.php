<?php

declare(strict_types=1);

namespace Business;

use Data\PizzasDAO;

class PizzaService
{

    private PizzasDAO $pizzasDAO;

    public function __construct()
    {
        $this->pizzasDAO = new PizzasDAO;
    }

    public function getAllPizzas(): array
    {
        $pizzaLijst = $this->pizzasDAO->getAll();
        return $pizzaLijst;
    }
}
