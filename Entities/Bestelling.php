<?php

declare(strict_types=1);

namespace Entities;

use Entities\Klant;

class Bestelling
{
    private int $id;
    private Klant $klant;
    private string $bestelDatum;

    public function __construct(int $id, Klant $klant, string $bestelDatum)
    {
        $this->id = $id;
        $this->klant = $klant;
        $this->bestelDatum = $bestelDatum;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getKlant(): Klant
    {
        return $this->klant;
    }

    public function getBestelDatum(): string
    {
        return $this->bestelDatum;
    }
}
