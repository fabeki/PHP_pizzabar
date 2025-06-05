<?php

declare(strict_types=1);

$error = "";
// 1. controle of alle velden ingevuld zijn
if (isset($_POST["btnRegistreer"])) {
    $voornaam = "";
    $familienaam = "";
    $straat = "";
    $huisnr = "";
    $postcode = "";
    $woonplaats = "";
    $tel = "";
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

    if (!empty($_POST["txtTelefoon"])) {
        $tel = $_POST["txtTelefoon"];
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
    }
}
