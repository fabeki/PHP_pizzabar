-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 23 jun 2025 om 10:21
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzabar_eindoefening`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellijnen`
--

CREATE TABLE `bestellijnen` (
  `bestelling_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestellijnen`
--

INSERT INTO `bestellijnen` (`bestelling_id`, `pizza_id`, `aantal`, `prijs`) VALUES
(1, 2, 3, 11.00),
(1, 3, 2, 13.00),
(2, 1, 10, 10.00),
(3, 1, 2, 10.00),
(3, 2, 2, 11.00),
(3, 3, 2, 13.00),
(3, 4, 1, 13.00),
(3, 6, 1, 14.00),
(3, 7, 1, 12.00),
(4, 1, 3, 10.00),
(4, 2, 3, 11.00),
(4, 3, 4, 13.00),
(5, 2, 2, 11.00),
(5, 4, 3, 13.00),
(6, 2, 2, 11.00),
(7, 1, 1, 10.00),
(7, 3, 1, 13.00),
(7, 4, 1, 13.00),
(7, 6, 1, 14.00),
(8, 1, 1, 10.00),
(8, 2, 2, 11.00),
(8, 3, 1, 13.00),
(8, 6, 1, 14.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestellingId` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `bestelDatum` datetime NOT NULL,
  `bemerking` varchar(255) DEFAULT NULL,
  `korting` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingId`, `klant_id`, `bestelDatum`, `bemerking`, `korting`) VALUES
(1, 13, '2025-06-19 14:44:00', 'Niet aanbellen.', 0.00),
(2, 11, '2025-06-19 17:09:00', 'Snel leveren aub', 5.00),
(3, 11, '2025-06-19 15:12:00', 'testet', 5.00),
(4, 8, '2025-06-19 16:15:00', '', 15.00),
(5, 11, '2025-06-19 17:31:00', '', 5.00),
(6, 11, '2025-06-19 16:55:00', '', 0.00),
(7, 14, '2025-06-19 16:35:00', 'niet aanbellen', 0.00),
(8, 11, '2025-08-07 12:12:00', '', 5.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantId` int(11) NOT NULL,
  `voornaam` varchar(55) NOT NULL,
  `familienaam` varchar(55) NOT NULL,
  `straat` varchar(55) NOT NULL,
  `huisnummer` int(3) NOT NULL,
  `plaats_id` int(11) NOT NULL,
  `telefoon` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantId`, `voornaam`, `familienaam`, `straat`, `huisnummer`, `plaats_id`, `telefoon`, `email`, `wachtwoord`) VALUES
(8, 'Jan', 'Jansen', 'Steenstortstraat', 78, 1, '0487789654', 'jan@hotmail.com', '$2y$10$HF7ozkozFkSeQ9jCQ7wbbeT2KihZoc3q9YUrj42IINAGqikqv.wWa'),
(9, 'Marie', 'Claire', 'Buurtwijk', 89, 10, '', 'marie@hotmail.com', '$2y$10$4aZiFxEKXPhzZEGkEHC6VOLzxv7m4fdlbC3Tn3dip7Onju5MCLVw2'),
(11, 'fatima', 'kilicaslan', 'testing', 123, 10, '0456321456', 'fatima@hotmail.com', '$2y$10$n8wK7VUpSsWcfatatRkDjeT71sA2Q.ZnRFl6QKOPf0oyFK3w/1WOG'),
(12, 'test', 'test', 'testing', 7, 11, '', 'testing@hotmail.com', '$2y$10$3rhIosFLWzCsPP/wdG1IKOL/QmbuVYBP9qhOA1TnuUegCvI95aDiG'),
(13, 'fatima', 'kilic', 'fat', 7, 3, '123456789', 'fat@hotmail.com', '$2y$10$5p.VWDxX4cX8fp/G5q5YQeHUYYo.SiPxeHFw3cz59XZWr0boZB.dW'),
(14, 'Test', 'testing', 'jqnsdvv', 554, 3, '82225225', 'kil@hotmail.com', '$2y$10$zbp/.worl5.3ZOhypmZUlecdL4CK2305Et9JaJm7NyCTLGbJlantq');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizzas`
--

CREATE TABLE `pizzas` (
  `pizzaId` int(11) NOT NULL,
  `pizzaNaam` varchar(55) NOT NULL,
  `prijs` decimal(4,0) NOT NULL,
  `samenstelling` varchar(155) NOT NULL,
  `voedingswaarde_id` int(11) NOT NULL,
  `beschikbaarheid` tinyint(1) NOT NULL,
  `promo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pizzas`
--

INSERT INTO `pizzas` (`pizzaId`, `pizzaNaam`, `prijs`, `samenstelling`, `voedingswaarde_id`, `beschikbaarheid`, `promo`) VALUES
(1, 'Margherita', 10, 'tomatensaus, mozzarella, extra mozzarella & pizzakruiden', 1, 1, 0),
(2, 'Pepperoni', 11, 'tomatensaus, mozzarella & pepperoni', 2, 1, 0),
(3, 'Hawaii', 13, 'tomatensaus, mozzarella, extra mozzarella, ham & ananas', 3, 1, 0),
(4, '4 Cheese', 13, 'tomatensaus, mozzarella, emmentaler, geitenkaas & gorgonzola', 4, 1, 0),
(5, 'Funghi', 10, 'tomatensaus, mozzarella, champignons & pizzakruiden', 5, 1, 0),
(6, 'Tonno', 14, 'tomatensaus, mozzarella, tonijn, verse spinazie, ui & zwarte olijven', 6, 1, 0),
(7, 'Veggi', 12, 'tomatensaus, mozzarella, champignons, verse spinazie, ui, zwarte olijven, paprika, verse tomaat & pizzakruiden', 7, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plaatsen`
--

CREATE TABLE `plaatsen` (
  `plaatsId` int(11) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `plaatsen`
--

INSERT INTO `plaatsen` (`plaatsId`, `postcode`, `woonplaats`) VALUES
(12, '1111', 'xcw'),
(11, '1234', 'testing'),
(1, '3580', 'Beringen'),
(2, '3581', 'Beverlo'),
(3, '3582', 'Koersel'),
(4, '3583', 'Paal'),
(5, '3600', 'Genk'),
(7, '3600', 'Waterschei'),
(6, '3600', 'Zwartberg'),
(10, '3630', 'Maasmechelen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voedingswaarden`
--

CREATE TABLE `voedingswaarden` (
  `voedingswaardeId` int(11) NOT NULL,
  `energie` decimal(4,1) NOT NULL,
  `vet` decimal(3,1) NOT NULL,
  `koolhydraat` decimal(3,1) NOT NULL,
  `eiwit` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `voedingswaarden`
--

INSERT INTO `voedingswaarden` (`voedingswaardeId`, `energie`, `vet`, `koolhydraat`, `eiwit`) VALUES
(1, 235.0, 12.0, 25.0, 11.0),
(2, 253.0, 12.0, 25.0, 11.0),
(3, 201.0, 7.0, 24.0, 9.7),
(4, 246.0, 11.0, 24.0, 12.0),
(5, 187.0, 6.0, 24.0, 8.5),
(6, 205.0, 12.0, 22.0, 12.0),
(7, 171.0, 5.8, 22.0, 7.4);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellijnen`
--
ALTER TABLE `bestellijnen`
  ADD PRIMARY KEY (`bestelling_id`,`pizza_id`);

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestellingId`),
  ADD KEY `fk_klantId` (`klant_id`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantId`),
  ADD KEY `fk_plaatsId` (`plaats_id`);

--
-- Indexen voor tabel `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`pizzaId`),
  ADD UNIQUE KEY `pizzaNaam_UNIQUE` (`pizzaNaam`),
  ADD KEY `fk_voedingswaardeId` (`voedingswaarde_id`);

--
-- Indexen voor tabel `plaatsen`
--
ALTER TABLE `plaatsen`
  ADD PRIMARY KEY (`plaatsId`),
  ADD UNIQUE KEY `postcode_plaats_UNIQUE` (`postcode`,`woonplaats`);

--
-- Indexen voor tabel `voedingswaarden`
--
ALTER TABLE `voedingswaarden`
  ADD PRIMARY KEY (`voedingswaardeId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestellingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `pizzaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `plaatsen`
--
ALTER TABLE `plaatsen`
  MODIFY `plaatsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `voedingswaarden`
--
ALTER TABLE `voedingswaarden`
  MODIFY `voedingswaardeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_klantId` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`klantId`);

--
-- Beperkingen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `fk_plaatsId` FOREIGN KEY (`plaats_id`) REFERENCES `plaatsen` (`plaatsId`);

--
-- Beperkingen voor tabel `pizzas`
--
ALTER TABLE `pizzas`
  ADD CONSTRAINT `fk_voedingswaardeId` FOREIGN KEY (`voedingswaarde_id`) REFERENCES `voedingswaarden` (`voedingswaardeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
