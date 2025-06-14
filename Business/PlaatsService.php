<?php

declare(strict_types=1);

namespace Business;

use Data\PlaatsenDAO;
use Entities\Plaats;

class PlaatsService
{

    private PlaatsenDAO $plaatsenDAO;

    public function __construct()
    {
        $this->plaatsenDAO = new PlaatsenDAO;
    }

    public function getPlaatsenByPostcodes(array $postcodes): array
    {
        return $this->plaatsenDAO->getPlaatsenByPostcodes($postcodes);
    }
}
