<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\BestelLijn;

class BestelLijnenDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }

    public function create(int $bestellingId, int $pizzaId, int $aantal, float $prijs, ?string $opmerking)
    {
        $sql = "INSERT INTO bestellijnen (bestelling_id, pizza_id, aantal, prijs, opmerking)
                VALUES(:bestelling_id, :pizza_id, :aantal, :prijs, :opmerking)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute(
            [
                ':bestelling_id'  => $bestellingId,
                ':pizza_id'  => $pizzaId,
                ':aantal' => $aantal,
                ':prijs' => $prijs,
                ':opmerking' => $opmerking
            ]
        );
    }
}
