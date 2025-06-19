<?php

declare(strict_types=1);

namespace Business;

use Data\KlantenDAO;
use Data\PlaatsenDAO;
use Entities\Klant;
use Entities\Plaats;
use Exceptions\OngeldigEmailadresException;
use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\WachtwoordIncorrectException;
use Exceptions\GebruikerBestaatNietException;

class KlantService
{

    private KlantenDAO $klantenDAO;

    public function __construct()
    {
        $this->klantenDAO = new KlantenDAO;
    }

    public function controleerLogin(string $email, string $ww): ?Klant
    {
        $klant = $this->klantenDAO->getByEmail($email);

        if ($klant === null) {
            throw new GebruikerBestaatNietException;
        }

        if (!password_verify($ww, $klant->getWachtwoord())) {
            throw new WachtwoordIncorrectException;
        }
        return $klant;
    }

    public function createKlant(
        string $voornaam,
        string $familienaam,
        string $straat,
        int $huisnr,
        int $postcode,
        string $woonplaats,
        ?string $tel,
        string $email,
        string $ww,
        string $wwHerhaal
    ) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException;
        }

        if ($ww !== $wwHerhaal) {
            throw new WachtwoordenKomenNietOvereenException;
        }

        $plaatsenDAO = new PlaatsenDAO();
        $plaats = $plaatsenDAO->getByWoonplaats($woonplaats);
        if (!$plaats) {
            $plaatsId = $plaatsenDAO->create($postcode, $woonplaats);
            $plaats = new Plaats($plaatsId, $postcode, $woonplaats);
        }

        $klant = new Klant(
            0,
            $voornaam,
            $familienaam,
            $straat,
            (int)$huisnr,
            $plaats,
            (string)$tel,
            $email,
            password_hash($ww, PASSWORD_DEFAULT)
        );

        return $this->klantenDAO->create($klant);
    }
}
