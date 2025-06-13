<?php

declare(strict_types=1);

spl_autoload_register();

session_start();

use Business\KlantService;

if (isset($_POST["btnLogin"])) {
    $email = $_POST["txtEmail"];
    $ww = $_POST["txtWachtwoord"];

    $klantSVC = new KlantService();
    $klant = $klantSVC->controleerLogin($email, $ww);

    if ($klant === null) {
        include("Presentation/loginForm.php");
        exit();
    } else {
        $_SESSION["gebruiker"] = $klant;
        header("Location: Presentation/overzichtBestelling.php");
        exit();
    }
}

include("Presentation/loginForm.php");
