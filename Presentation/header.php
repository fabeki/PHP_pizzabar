<?php

declare(strict_types=1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikerstoegang</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .menu-container {
            padding: 1em;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1em;
        }

        .product-container {
            background-color: rgb(187, 213, 234);
            margin: 10px;
            padding: 20px;
            border-radius: 15px;

        }

        img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid LightSteelBlue;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
        }

        .omschrijving-container {
            margin: 1em;
            text-align: left;
        }

        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bolder;
            color: rgb(27, 52, 92);
        }

        h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bolder;
            font-size: 25px;
            color: rgb(25, 45, 77);
        }

        details {
            cursor: pointer;
        }

        input[type=submit] {
            cursor: pointer;
            color: rgba(46, 94, 34, 0.89);
            background-color: rgba(163, 241, 143, 0.89);
            font-weight: 600;
            font-size: large;
            border-radius: 10px;
            border: none;
            padding: 10px;
        }

        input[type=submit]:hover {
            background-color: rgb(26, 106, 26);
            color: #ffffff;
        }

        h3 {
            font-size: 22px;
            font-weight: 600;
        }

        .mand-container {
            background-color: rgb(235, 242, 249);
            margin: 10px;
            padding: 20px;
            border-radius: 15px;
            flex: 1;
        }

        .plusMin {
            display: flex;
            gap: 16px;
        }

        .plusMin a {
            text-decoration: none;
            font-size: 16px;
            padding: 5px 10px;
        }

        .minus {
            color: red;
        }

        .plus {
            color: blue;
        }

        .minus:hover,
        .plus:hover,
        nav li a:hover {
            background-color: rgb(187, 213, 234);
            color: white;
        }

        .mand-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid lightblue;
            padding: 10px;
        }

        .totaal {
            text-align: right;
            font-weight: bold;
            font-size: large;
            margin-top: 15px;
            padding-top: 10px;
            padding-bottom: 15px;
        }

        #cart-icon {
            font-size: 600;
        }

        .mand-titel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            margin: 16px 32px;
        }

        .wrapper {
            max-width: 1200px;
            width: 100%;
            margin: 5em auto;
            padding: 0 1em;
            box-sizing: border-box;
            flex: 1;
        }

        footer {
            text-align: center;
            padding: 1em;
            font-size: small;
        }

        nav ul {
            list-style: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 25px;
        }

        nav li {
            width: 100%;
            text-align: center;
        }

        nav li a {
            display: block;
            width: 100%;
            text-decoration: none;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: rgb(27, 52, 92);
            padding: 10px;
        }

        .error {
            background-color: rgb(245, 209, 209);
            color: red;
        }

        label {
            display: flex;
            flex-direction: column;
        }

        input[type=email],
        input[type=password] {
            padding: 8px;
            border: 1px solid rgb(189, 182, 182);
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: rgb(38, 58, 66);
        }

        table {
            width: 100%;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: rgb(219, 231, 251);
            text-align: left;
        }

        td {
            border-bottom: 1px solid rgb(187, 213, 234);
        }

        tr:last-child {
            font-size: larger;
            font-weight: bold;
            background-color: rgb(219, 231, 251);
        }

        select,
        input[type="datetime-local"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid lightgray;
        }

        section {
            background-color: #ffffff;
            padding: 15px 30px;
            margin: 20px auto;
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        }

        input:not([type="submit"]) {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            margin: 10px;
        }
    </style>
</head>

<body style="background-color:rgb(219, 231, 251);">
    <div class="wrapper">
        <header>
            <h1>FaBeKi Pizzeria</h1>
            <nav>
                <ul class="menu-item">
                    <li><a href="ctrlIndexPizzas.php">Overzicht pizza's</a></li>
                    <?php if (!isset($_SESSION["gebruiker"])) { ?>
                        <li><a href="ctrlLogin.php">Login</a></li>
                        <li><a href="ctrlRegister.php">Registreer</a></li>
                    <?php } else { ?>
                        <li><a href="ctrlOverzichtBestelling.php">Mijn bestelling</a></li>
                    <?php } ?>
                    <li><a href="ctrlInfo.php">Algemeen info</a></li>
                </ul>
            </nav>
        </header>