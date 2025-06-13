<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Klant;
use Entities\Plaats;
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
        $sql = "INSERT INTO klanten (voornaam, familienaam, straat, huisnummer, plaats_id, telefoon, email, wachtwoord)
                VALUES (:voornaam, :familienaam, :straat, :huisnummer, :plaats_id, :telefoon, :email,:wachtwoord)";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute(
            [
                ':voornaam' => $klant->getVoornaam(),
                ':familienaam' => $klant->getFamilienaam(),
                ':straat' => $klant->getStraat(),
                ':huisnummer' => $klant->getHuisnummer(),
                ':plaats_id' => $klant->getPlaats()->getPlaatsId(),
                ':telefoon' => $klant->getTelefoon(),
                ':email' => $klant->getEmail(),
                ':wachtwoord' => $klant->getWachtwoord()
            ]
        );
        $laatsteId = $dbh->lastInsertId();
        $klant->setKlantId((int)$laatsteId);
        return $klant;
    }

    public function getByEmail(string $email)
    {
        $sql = "SELECT K.*, P.plaatsId, P.postcode, P.woonplaats 
                FROM klanten K 
                INNER JOIN plaatsen P ON P.plaatsId=K.plaats_id 
                WHERE email=:email";
        $dbh = $this->connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute([":email" => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return null;
        }
        $plaats = new Plaats(
            (int) $result["plaatsId"],
            (int) $result["postcode"],
            $result["woonplaats"]
        );

        return new Klant(
            (int) $result["klantId"],
            $result["voornaam"],
            $result["familienaam"],
            $result["straat"],
            (int) $result["huisnummer"],
            $plaats,
            $result["telefoon"],
            $result["email"],
            $result["wachtwoord"]
        );
    }
}
