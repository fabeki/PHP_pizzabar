<?php

declare(strict_types=1);

namespace Entities;

use Entities\Voedingswaarde;

class Pizza
{
    private int $pizzaId;
    private string $pizzaNaam;
    private float $prijs;
    private string $samenstelling;
    private Voedingswaarde $voedingswaarde;
    private bool $beschikbaarheid;
    private bool $promo;

    public function __construct(int $pizzaId, string $pizzaNaam, float $prijs, string $samenstelling, Voedingswaarde $voedingswaarde, bool $beschikbaarheid, bool $promo)
    {
        $this->pizzaId = $pizzaId;
        $this->pizzaNaam = $pizzaNaam;
        $this->prijs = $prijs;
        $this->samenstelling = $samenstelling;
        $this->voedingswaarde = $voedingswaarde;
        $this->beschikbaarheid = $beschikbaarheid;
        $this->promo = $promo;
    }

    public function getPizzaId(): int
    {
        return $this->pizzaId;
    }

    public function getpizzaNaam(): string
    {
        return $this->pizzaNaam;
    }

    public function getPrijs(): float
    {
        return $this->prijs;
    }

    public function getSamenstelling(): string
    {
        return $this->samenstelling;
    }

    public function getVoedingswaarde(): Voedingswaarde
    {
        return $this->voedingswaarde;
    }

    public function getBeschikbaarheid(): bool
    {
        return $this->beschikbaarheid;
    }

    public function getPromo(): bool
    {
        return $this->promo;
    }
}
