<?php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\KlantService;
use Exceptions\GebruikerBestaatNietException;
use Exceptions\WachtwoordIncorrectException;

$error = "";

if (isset($_POST["btnLogin"])) {
    $email = $_POST["txtEmail"];
    $ww = $_POST["txtWachtwoord"];

    $klantSVC = new KlantService();

    try {
        $klant = $klantSVC->controleerLogin($email, $ww);
        $_SESSION["gebruiker"] = serialize($klant);
        header("Location: /Pizzabar/ctrlOverzichtBestelling.php");
        exit(0);
    } catch (GebruikerBestaatNietException $e) {
        $error .= "E-mailadres bestaat niet.";
    } catch (WachtwoordIncorrectException $e) {
        $error .= "Wachtwoord incorrect.";
    }
}

include("Presentation/loginForm.php");
