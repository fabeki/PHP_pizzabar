<?php

declare(strict_types=1);

namespace Business;

use Data\BestellingenDAO;
use Entities\Bestelling;
use Entities\Klant;

class BestellingService
{
    private BestellingenDAO $bestellingenDAO;

    public function __construct()
    {
        $this->bestellingenDAO = new BestellingenDAO;
    }

    public function createBestelling(
        Klant $klant,
        \DateTime $besteldatum,
        float $korting,
        ?string $bemerking,
        // array $mandje
    ): int {
        $bestelling = new Bestelling(
            0,
            $klant,
            $besteldatum->format('Y-m-d H:i:s'),
            $korting,
            $bemerking ?? ""
        );
        $this->bestellingenDAO->create($bestelling);
        return $bestelling->getBestellingId();
    }
}
