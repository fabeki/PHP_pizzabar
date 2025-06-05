<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Klant;
use Exceptions\GebruikerBestaatAlException;

class KlantenDAO
{
    public function connect(): PDO
    {
        return new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );
    }

    public function emailReedsInGebruik(string $email) // controle ofdat email in gebruik is
    {
        $sql = "SELECT * FROM klanten WHERE email=:email";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $aantalRijen = $stmt->rowCount();
        return $aantalRijen;
    }

    public function create(Klant $klant): Klant
    {
        $aantalRijen = $this->emailReedsInGebruik($klant->getEmail());
        if ($aantalRijen > 0) {
            throw new GebruikerBestaatAlException();
        }
        $sql = "INSERT INTO klanten (voornaam, familienaam, straat, huisnummer, plaatsId, telefoon, email, wachtwoord)
                VALUES (:voornaam, :familienaam, :straat, :huisnummer, :plaatsId, :telefoon, :email,:wachtwoord)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute(
            [
                ':voornaam' => $klant->getVoornaam(),
                ':familienaam' => $klant->getFamilienaam(),
                ':straat' => $klant->getStraat(),
                ':huisnummer' => $klant->getHuisnummer(),
                ':plaatsId' => $klant->getPlaats()->getPlaatsId(),
                ':telefoon' => $klant->getTelefoon(),
                ':email' => $klant->getEmail(),
                ':wachtwoord' => $klant->getWachtwoord()
            ]
        );
        $laatsteId = $dbh->lastInsertId();
        $klant->setKlantId((int)$laatsteId);
        return $klant;
    }
}
