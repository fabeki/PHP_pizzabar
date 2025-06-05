<?php

declare(strict_types=1);

session_start();

if (!isset($_SESSION["gebruiker"])) {
    header("Location:Presentation/loginForm.php");
    exit;
} else {
    header("Location:Presentation/overzichtBestelling.php");
    exit;
}
