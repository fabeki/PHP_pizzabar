<?php

declare(strict_types=1);

namespace Entities;

class Plaats
{
    private int $plaatsId;
    private int $postcode;
    private string $woonplaats;

    public function __construct(int $plaatsId, int $postcode, string $woonplaats)
    {
        $this->plaatsId = $plaatsId;
        $this->postcode = $postcode;
        $this->woonplaats = $woonplaats;
    }

    public function getId(): int
    {
        return $this->plaatsId;
    }

    public function getPostcode(): int
    {
        return $this->postcode;
    }

    public function getWoonplaats(): string
    {
        return $this->woonplaats;
    }
}
