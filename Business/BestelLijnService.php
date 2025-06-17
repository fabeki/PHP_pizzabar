<?php

declare(strict_types=1);

namespace Business;

use Data\BestelLijnenDAO;
use Business\PizzaService;


class BestelLijnService
{

    private BestelLijnenDAO $bestelLijnenDAO;

    public function __construct()
    {
        $this->bestelLijnenDAO = new BestelLijnenDAO;
    }

    public function createBestelLijnen(array $mandje, $bestellingId)
    {
        $pizzaSVC = new PizzaService();
        foreach ($mandje as $pizzaId => $aantal) {

            $pizza = $pizzaSVC->getPizzaById((int)$pizzaId);

            $this->bestelLijnenDAO->create(
                bestellingId: $bestellingId,
                pizzaId: (int) $pizzaId,
                aantal: (int) $aantal,
                prijs: (float) $pizza->getPrijs(),
                opmerking: $opmerking ?? null
            );
        }
    }
}
