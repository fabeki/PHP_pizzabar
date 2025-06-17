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
        $beschikbarePizzas = [];

        foreach ($pizzaLijst as $pizza) {
            $this->beschikbaarheidPizza($pizza);
            $this->promoPizza($pizza);

            if ($pizza->getBeschikbaarheid()) {
                $beschikbarePizzas[] = $pizza;
            }
        }
        return $beschikbarePizzas;
    }

    public function getPizzaById(int $id): ?Pizza
    {
        $pizza_id = $this->pizzasDAO->getById($id);
        return $pizza_id;
    }

    public function beschikbaarheidPizza(Pizza $pizza)
    {
        if ($pizza->getPizzaNaam() === "Hawaii" && date('n') == 7) {
            $pizza->setBeschikbaarheid(false);
        } else {
            $pizza->setBeschikbaarheid(true);
        }
    }

    public function promoPizza(Pizza $pizza)
    {
        if (date('l') === "Wednesday") {
            $pizza->setPromo(true);
        } else {
            $pizza->setPromo(false);
        }
    }
}
