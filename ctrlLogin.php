<?php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\KlantService;

if (isset($_POST["btnLogin"])) {
    $email = $_POST["txtEmail"];
    $ww = $_POST["txtWachtwoord"];

    $klantSVC = new KlantService();
    $klant = $klantSVC->controleerLogin($email, $ww);

    if ($klant === null) {
        include("/Pizzabar/ctrlLogin.php");
        exit();
    } else {
        $_SESSION["gebruiker"] = serialize($klant);
        header("Location: /Pizzabar/ctrlOverzichtBestelling.php");
        exit(0);
    }
}

include("Presentation/loginForm.php");
