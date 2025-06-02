<?php

declare(strict_types=1);

namespace Entities;

use Entities\Klant;

class Bestelling
{
    private int $bestellingId;
    private Klant $klant;
    private string $bestelDatum;
    private float $korting;
    private ?string $bemerking;

    public function __construct(int $bestellingId, Klant $klant, string $bestelDatum, float $korting, string $bemerking)
    {
        $this->bestellingId = $bestellingId;
        $this->klant = $klant;
        $this->bestelDatum = $bestelDatum;
        $this->korting = $korting;
        $this->bemerking = $bemerking;
    }

    public function getBestellingId(): int
    {
        return $this->bestellingId;
    }

    public function getKlant(): Klant
    {
        return $this->klant;
    }

    public function getBestelDatum(): string
    {
        return $this->bestelDatum;
    }

    public function getKorting(): float
    {
        return $this->korting;
    }

    public function getBemerking(): ?string
    {
        return $this->bemerking;
    }
}
