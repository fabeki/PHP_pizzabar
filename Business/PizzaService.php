<?php

declare(strict_types=1);

namespace Business;

use Data\PizzasDAO;
use Entities\Pizza;

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

    public function getPizzaById(int $id): ?Pizza
    {
        $pizza_id = $this->pizzasDAO->getById($id);
        return $pizza_id;
    }
}
