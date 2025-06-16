<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Bestelling;

class BestellingenDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }

    public function create(Bestelling $bestelling): Bestelling
    {
        $sql = "INSERT INTO bestellingen (klant_id, besteldatum, korting, bemerking)
                VALUES (:klant_id, :besteldatum, :korting, :bemerking)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':klant_id'  => $bestelling->getKlant()->getKlantId(),
            ':besteldatum' => $bestelling->getBesteldatum(),
            ':korting' => $bestelling->getKorting(),
            ':bemerking' => $bestelling->getBemerking()
        ]);
        $bestellingId = (int)$dbh->lastInsertId();
        $bestelling->setBestellingId($bestellingId);
        return $bestelling;
    }
}
