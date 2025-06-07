<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Plaats;

class PlaatsenDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }
    // gebruik functies later voor controle om dubbele records te vermijden
    public function getByWoonplaats(string $woonplaats): ?Plaats
    {
        $sql = "SELECT * FROM plaatsen WHERE woonplaats=:woonplaats";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':woonplaats' => $woonplaats]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($record)) return null;

        return new Plaats(
            (int)$record['id'],
            (int)$record['postcode'],
            $record['woonplaats']
        );
    }

    public function create(int $postcode, string $woonplaats): int
    {
        $sql = "INSERT INTO plaatsen (postcode, woonplaats)
                VALUES (:postcode,:woonplaats)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute(
            [
                ':postcode' => $postcode,
                ':woonplaats' => $woonplaats
            ]
        );
        return (int)$dbh->lastInsertId();
    }
}
