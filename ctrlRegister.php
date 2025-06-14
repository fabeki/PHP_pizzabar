<?php

declare(strict_types=1);

spl_autoload_register();

session_start();

use Exceptions\GebruikerBestaatAlException;
use Exceptions\OngeldigEmailadresException;
use Exceptions\WachtwoordenKomenNietOvereenException;
use Business\KlantService;

$error = "";
$klantSVC = new KlantService();
// 1. controle of alle velden ingevuld zijn
if (isset($_POST["btnRegistreer"])) {
    $voornaam = "";
    $familienaam = "";
    $straat = "";
    $huisnr = "";
    $postcode = "";
    $woonplaats = "";
    $tel = $_POST["txtTel"] ?? "";
    $email = "";
    $ww = "";
    $wwHerhaal = "";

    if (!empty($_POST["txtVoornaam"])) {
        $voornaam = $_POST["txtVoornaam"];
    } else {
        $error .= "Voornaam moet ingevuld worden.";
    }

    if (!empty($_POST["txtFamilienaam"])) {
        $familienaam = $_POST["txtFamilienaam"];
    } else {
        $error .= "Familienaam moet ingevuld worden.";
    }

    if (!empty($_POST["txtStraat"])) {
        $straat = $_POST["txtStraat"];
    } else {
        $error .= "Straat moet ingevuld worden.";
    }

    if (!empty($_POST["txtHuisnummer"])) {
        $huisnr = $_POST["txtHuisnummer"];
    } else {
        $error .= "Huisnummer moet ingevuld worden.";
    }

    if (!empty($_POST["txtPostcode"])) {
        $postcode = $_POST["txtPostcode"];
    } else {
        $error .= "Postcode moet ingevuld worden.";
    }

    if (!empty($_POST["txtWoonplaats"])) {
        $woonplaats = $_POST["txtWoonplaats"];
    } else {
        $error .= "Woonplaats moet ingevuld worden.";
    }

    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "E-mailadres moet ingevuld worden.";
    }

    if (!empty($_POST["txtWachtwoord"]) && !empty($_POST["txtWachtwoordHerhaal"])) {
        $ww = $_POST["txtWachtwoord"];
        $wwHerhaal = $_POST["txtWachtwoordHerhaal"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.";
    }

    if ($error == "") {
        try {
            $klant = $klantSVC->createKlant(
                $voornaam,
                $familienaam,
                $straat,
                (int) $huisnr,
                (int) $postcode,
                $woonplaats,
                (string) $tel,
                $email,
                $ww,
                $wwHerhaal
            );
            $_SESSION["gebruiker"] = serialize($klant);
            header("Location: ctrlOverzichtBestelling.php");
            exit(0);
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is niet geldig.";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit e-mailadres.";
        }
    }
}

include("Presentation/registerForm.php");
