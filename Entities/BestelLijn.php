<?php

declare(strict_types=1);

namespace Entities;

use Entities\Bestelling;
use Entities\Pizza;

class BestelLijn
{
    private Bestelling $bestelling;
    private Pizza $pizza;
    private int $aantal;
    private float $prijs;

    public function __construct(Bestelling $bestelling, Pizza $pizza, int $aantal, float $prijs)
    {
        $this->bestelling = $bestelling;
        $this->pizza = $pizza;
        $this->aantal = $aantal;
        $this->prijs = $prijs;
    }

    public function getBestelling(): Bestelling
    {
        return $this->bestelling;
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }

    public function getAantal(): int
    {
        return $this->aantal;
    }

    public function getPrijs(): float
    {
        return $this->prijs;
    }
}
