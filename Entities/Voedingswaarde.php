<?php

declare(strict_types=1);

namespace entities;

class Voedingswaarde
{

    private int $id;
    private float $energie;
    private float $vet;
    private float $koolhydraat;
    private float $eiwit;

    public function __construct(int $id, float $energie, float $vet, float $koolhydraat, float $eiwit)
    {

        $this->id = $id;
        $this->energie = $energie;
        $this->vet = $vet;
        $this->koolhydraat = $koolhydraat;
        $this->eiwit = $eiwit;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEnergie(): float
    {
        return $this->energie;
    }

    public function getVet(): float
    {
        return $this->vet;
    }

    public function getKoolhydraat(): float
    {
        return $this->koolhydraat;
    }

    public function getEiwit(): float
    {
        return $this->eiwit;
    }
}
