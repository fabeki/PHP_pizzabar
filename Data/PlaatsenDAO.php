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
            (int)$record['plaatsId'],
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

    public function getPlaatsenByPostcodes(array $postcodes): array
    {
        //array_fill(index, 3, '?') => ['?', '?', '?'] (maak string met implode (?,?,?) )
        $inQuery = implode(',', array_fill(0, count($postcodes), '?'));
        $sql = "SELECT * FROM plaatsen WHERE postcode IN ($inQuery)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute($postcodes);
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $plaatsen = [];
        foreach ($resultSet as $result) {
            $plaatsen[] =  new Plaats(
                (int)$result['plaatsId'],
                (int)$result['postcode'],
                $result['woonplaats']
            );
        }
        return $plaatsen;
    }
}
