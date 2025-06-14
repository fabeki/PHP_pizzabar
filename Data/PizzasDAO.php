<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Pizza;
use Entities\Voedingswaarde;

class PizzasDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }

    public function getAll(): array
    {
        $sql = "SELECT pizzas.*, V.voedingswaardeId,V.energie, V.vet, V.koolhydraat, V.eiwit FROM pizzas
                INNER JOIN voedingswaarden V ON V.voedingswaardeId = pizzas.voedingswaarde_id";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pizzas = [];
        if (!empty($resultSet)) {
            foreach ($resultSet as $row) {

                $voedingswaarde = new Voedingswaarde(
                    (int)$row["voedingswaardeId"],
                    (float)$row["energie"],
                    (float)$row["vet"],
                    (float)$row["koolhydraat"],
                    (float)$row["eiwit"]
                );

                $pizza = new Pizza(
                    (int)$row["pizzaId"],
                    $row["pizzaNaam"],
                    (float)$row["prijs"],
                    $row["samenstelling"],
                    $voedingswaarde,
                    (bool)$row["beschikbaarheid"],
                    (bool)$row["promo"]
                );
                $pizzas[] = $pizza;
            }
        }
        return $pizzas;
    }

    public function getById(int $id): ?Pizza
    {
        $sql = "SELECT pizzas.*, V.voedingswaardeId,V.energie, V.vet, V.koolhydraat, V.eiwit FROM pizzas
                INNER JOIN voedingswaarden V ON V.voedingswaardeId = pizzas.voedingswaarde_id
                WHERE pizzaId = :id";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pizza = [];
        if (empty($row)) {
            return null;
        }

        $voedingswaarde = new Voedingswaarde(
            (int)$row["voedingswaardeId"],
            (float)$row["energie"],
            (float)$row["vet"],
            (float)$row["koolhydraat"],
            (float)$row["eiwit"]
        );

        $pizza = new Pizza(
            (int)$row["pizzaId"],
            $row["pizzaNaam"],
            (float)$row["prijs"],
            $row["samenstelling"],
            $voedingswaarde,
            (bool)$row["beschikbaarheid"],
            (bool)$row["promo"]
        );

        return $pizza;
    }
}
