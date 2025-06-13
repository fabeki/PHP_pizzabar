<?php

declare(strict_types=1);

session_start();

if (!isset($_SESSION["gebruiker"])) {
    header("Location:ctrlLogin.php");
    exit;
} else {
    header("Location:ctrlOverzichtBestelling.php");
    exit;
}
