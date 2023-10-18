-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2023 um 07:25
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `benutzerdaten`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `registrierung`
--

CREATE TABLE `registrierung` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Geschlecht` varchar(255) NOT NULL,
  `Telefonnummer` varchar(16) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Straße` int(11) NOT NULL,
  `Hausnummer` int(11) NOT NULL,
  `Stiege` int(11) NOT NULL,
  `Tür` int(11) NOT NULL,
  `PLZ` int(11) NOT NULL,
  `Wohnort` varchar(255) NOT NULL,
  `Benutzername` varchar(255) NOT NULL,
  `Passwort` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `registrierung`
--

INSERT INTO `registrierung` (`ID`, `Vorname`, `Nachname`, `Geschlecht`, `Telefonnummer`, `Email`, `Straße`, `Hausnummer`, `Stiege`, `Tür`, `PLZ`, `Wohnort`, `Benutzername`, `Passwort`) VALUES
(4, 'Peter', 'localhost', 'weiblich', '0', 'root@localhost', 0, 1, 1, 1, 1000, 'localhost', 'admin', '$2y$10$K/.6ydnwnvTQwCeWWHTIm.I/XzAHQUqTc9cXUOq1g91gbygpNiQbO'),
(9, 'gustav', 'wl', 'd', '1345', 'jiwef@wef', 0, 1, 1, 1, 1001, 'wef', '1', '$2y$10$kZDeRqdZUHFz3MMDd3r.rucW0TiPeqQ2vCjI9XvmnnjRXz1jOVj4S'),
(10, 'pepe', 'qeq', 'männlich', '23', 'nishzed@hotmail.com', 0, 2, 2, 2, 2222, 'dada', '111', '$2y$10$/njB918V.aH0.LJVqw2gK.OYZqB7bk9K5CfXyMxcFoQfP32TlWkUe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `pets` tinyint(1) NOT NULL,
  `status` enum('Neu','Bestätigt','Storniert') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `persons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `registrierung`
--
ALTER TABLE `registrierung`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Benutzername` (`Benutzername`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT für Tabelle `registrierung`
--
ALTER TABLE `registrierung`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registrierung` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
