-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mrt 2020 om 13:16
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewall`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afbeeldingen`
--

CREATE TABLE `afbeeldingen` (
  `id` int(11) NOT NULL,
  `titel` varchar(128) NOT NULL,
  `bijschrift` varchar(280) NOT NULL,
  `auteur` varchar(128) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `afbeelding` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `afbeeldingen`
--

INSERT INTO `afbeeldingen` (`id`, `titel`, `bijschrift`, `auteur`, `datum`, `afbeelding`) VALUES
(1, 'efteling', 'ingang van de efteling', 'vrijdag', '2020-03-10', 'eftelingingang.png'),
(2, 'disneyland parijs', 'het kasteel van disneyland ', 'vrijdag', '2020-03-15', 'disneylandkasteel.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `email`, `wachtwoord`, `gebruikersnaam`) VALUES
(1, 'teun@teun.nl', '123456', 'vrijdag'),
(3, 'rommer@rommer.nl', 'wachtwoord123', 'meffu');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
