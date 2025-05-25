<?php

declare(strict_types=1);

namespace Entities;

use Entities\Voedingswaarde;

class Pizza
{
    private int $id;
    private string $pizzaNaam;
    private float $prijs;
    private string $samenstelling;
    private Voedingswaarde $voedingswaarde;
    private bool $beschikbaarheid;
    private bool $promo;

    public function __construct(int $id, string $pizzaNaam, float $prijs, string $samenstelling, Voedingswaarde $voedingswaarde, bool $beschikbaarheid, bool $promo)
    {
        $this->id = $id;
        $this->pizzaNaam = $pizzaNaam;
        $this->prijs = $prijs;
        $this->samenstelling = $samenstelling;
        $this->voedingswaarde = $voedingswaarde;
        $this->beschikbaarheid = $beschikbaarheid;
        $this->promo = $promo;
    }

    public function getId(): int
    {
        return $this->id;
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
