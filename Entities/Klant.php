<?php

declare(strict_types=1);

namespace Entities;

use Entities\Plaats;
use Exceptions\OngeldigEmailadresException;
use Exceptions\WachtwoordenKomenNietOvereenException;

class Klant
{
    private int $klantId;
    private string $voornaam;
    private string $familienaam;
    private string $straat;
    private int $huisnummer;
    private Plaats $plaats;
    private ?string $telefoon;
    private string $email;
    private string $wachtwoord;

    public function __construct(int $klantId, $voornaam, string $familienaam, string $straat, int $huisnummer, Plaats $plaats, string $telefoon, string $email, string $wachtwoord)
    {
        $this->klantId = $klantId;
        $this->voornaam = $voornaam;
        $this->familienaam = $familienaam;
        $this->straat = $straat;
        $this->huisnummer = $huisnummer;
        $this->plaats = $plaats;
        $this->telefoon = $telefoon;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }

    public function getKlantId(): int
    {
        return $this->klantId;
    }

    public function getVoornaam(): string
    {
        return $this->voornaam;
    }

    public function getFamilienaam(): string
    {
        return $this->familienaam;
    }

    public function getStraat(): string
    {
        return $this->straat;
    }

    public function getHuisnummer(): int
    {
        return $this->huisnummer;
    }

    public function getPlaats(): Plaats
    {
        return $this->plaats;
    }
    public function getTelefoon(): ?string
    {
        return $this->telefoon;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }

    //setters

    public function setKlantId(int $klantId)
    {
        $this->klantId = $klantId;
    }

    public function setVoornaam(string $voornaam)
    {
        $this->voornaam = $voornaam;
    }

    public function setFamilienaam(string $familienaam)
    {
        $this->familienaam = $familienaam;
    }

    public function setStraat(string $straat)
    {
        $this->straat = $straat;
    }

    public function setHuisnummer(int $huisnummer)
    {
        $this->huisnummer = $huisnummer;
    }

    public function setPlaats(Plaats $plaats)
    {
        $this->plaats = $plaats;
    }

    public function setTelefoon(?string $telefoon)
    {
        $this->telefoon = $telefoon;
    }

    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }

        $this->email = $email;
    }

    public function setWachtwoord(string $wachtwoord, string $wachtwoordHerhaal)
    {
        if ($wachtwoord !== $wachtwoordHerhaal) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }
}
