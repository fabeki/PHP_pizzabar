-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 25 mei 2025 om 14:35
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
  `bestellingId` int(11) NOT NULL,
  `pizzaId` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `klantId` int(11) NOT NULL,
  `bestelDatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(55) NOT NULL,
  `familienaam` varchar(55) NOT NULL,
  `straat` varchar(55) NOT NULL,
  `huisnummer` int(3) NOT NULL,
  `plaatsId` int(11) NOT NULL,
  `telefoon` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `bemerking` varchar(155) DEFAULT NULL,
  `korting` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `voornaam`, `familienaam`, `straat`, `huisnummer`, `plaatsId`, `telefoon`, `email`, `wachtwoord`, `bemerking`, `korting`) VALUES
(1, 'Jan', 'Jansen', 'Steenstortstraat', 5, 2, NULL, 'Jan@hotmail.com', 'janneke', 'Niet aanbellen', NULL),
(2, 'Marie', 'Claire', 'Kruisweg', 190, 4, NULL, 'Marie@hotmail.com', 'marieke', '', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `pizzaNaam` varchar(55) NOT NULL,
  `prijs` decimal(4,0) NOT NULL,
  `samenstelling` varchar(155) NOT NULL,
  `voedingswaardeId` int(11) NOT NULL,
  `beschikbaarheid` tinyint(1) NOT NULL,
  `promo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pizzas`
--

INSERT INTO `pizzas` (`id`, `pizzaNaam`, `prijs`, `samenstelling`, `voedingswaardeId`, `beschikbaarheid`, `promo`) VALUES
(1, 'Margherita', 10, 'tomatensaus, mozzarella, extra mozzarella & pizzakruiden', 1, 1, 0),
(2, 'Pepperoni', 11, 'tomatensaus, mozzarella & pepperoni', 1, 1, 0),
(3, 'Hawaii', 13, 'tomatensaus, mozzarella, extra mozzarella, ham & ananas', 1, 1, 0),
(4, '4 Cheese', 13, 'tomatensaus, mozzarella, emmentaler, geitenkaas & gorgonzola', 1, 1, 0),
(5, 'Funghi', 10, 'tomatensaus, mozzarella, champignons & pizzakruiden', 1, 1, 0),
(6, 'Tonno', 14, 'tomatensaus, mozzarella, tonijn, verse spinazie, ui & zwarte olijven', 1, 1, 0),
(7, 'Veggi', 12, 'tomatensaus, mozzarella, champignons, verse spinazie, ui, zwarte olijven, paprika, verse tomaat & pizzakruiden', 1, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plaatsen`
--

CREATE TABLE `plaatsen` (
  `id` int(11) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `plaatsen`
--

INSERT INTO `plaatsen` (`id`, `postcode`, `woonplaats`) VALUES
(1, '3580', 'Beringen'),
(2, '3581', 'Beverlo'),
(3, '3582', 'Koersel'),
(4, '3583', 'Paal');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voedingswaarden`
--

CREATE TABLE `voedingswaarden` (
  `id` int(11) NOT NULL,
  `energie` decimal(4,1) NOT NULL,
  `vet` decimal(3,1) NOT NULL,
  `koolhydraat` decimal(3,1) NOT NULL,
  `eiwit` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `voedingswaarden`
--

INSERT INTO `voedingswaarden` (`id`, `energie`, `vet`, `koolhydraat`, `eiwit`) VALUES
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
  ADD PRIMARY KEY (`bestellingId`,`pizzaId`);

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_klantId` (`klantId`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plaatsId` (`plaatsId`);

--
-- Indexen voor tabel `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pizzaNaam_UNIQUE` (`pizzaNaam`),
  ADD KEY `fk_voedingswaardeId` (`voedingswaardeId`);

--
-- Indexen voor tabel `plaatsen`
--
ALTER TABLE `plaatsen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postcode_plaats_UNIQUE` (`postcode`,`woonplaats`);

--
-- Indexen voor tabel `voedingswaarden`
--
ALTER TABLE `voedingswaarden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `plaatsen`
--
ALTER TABLE `plaatsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `voedingswaarden`
--
ALTER TABLE `voedingswaarden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_klantId` FOREIGN KEY (`klantId`) REFERENCES `klanten` (`id`);

--
-- Beperkingen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD CONSTRAINT `fk_plaatsId` FOREIGN KEY (`plaatsId`) REFERENCES `plaatsen` (`id`);

--
-- Beperkingen voor tabel `pizzas`
--
ALTER TABLE `pizzas`
  ADD CONSTRAINT `fk_voedingswaardeId` FOREIGN KEY (`voedingswaardeId`) REFERENCES `voedingswaarden` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
