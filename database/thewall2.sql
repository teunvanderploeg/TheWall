-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 mrt 2020 om 13:20
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
  `gebruiker_id` int(11) NOT NULL,
  `datum` DATETIME DEFAULT current_timestamp(),
  `afbeelding` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `afbeeldingen`
--

INSERT INTO `afbeeldingen` (`id`, `titel`, `bijschrift`, `gebruiker_id`, `datum`, `afbeelding`) VALUES
(18, 'bos', 'mooi bos', 0, '2020-03-19', 'img/b2cda2858c934e3fbb4ebbc7f3660b25efc3726f.jpg'),
(19, 'meer', 'mooi meer', 0, '2020-03-19', 'img/893cf3853efc28fcda9f17c6f8bd6ad4e34211ab.jpg'),
(20, 'vlinder', 'blouwe vlinder', 0, '2020-03-20', 'img/87cad8afe51b66a6c4bb94abaa4d5caf8a9ba6ec.jpg'),
(21, 'Herfst', 'Goud in de herfst', 20, '2020-03-23', 'img/23f914cc9a51e5127f6e00824074f43ad72feed5.jpg'),
(22, 'bos molen', 'bos molen', 1, '2020-03-24', 'img/38d519d276523627c4e64ac95e632587cd021047.jpg');

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
(1, 'teun@teun.nl', '$2y$10$E2BNlixvLrmZYmIw/HnNH.NfEyRu.Ee2W/LEBCcLtkFQZivqN7/LS', 'vrijdag'),
(3, 'rommer@rommer.nl', 'wachtwoord123', 'meffu'),
(5, 'wout', '$2y$10$/L4qOwJxp5NyoV82g2Aj5uICw3CTCBhgcy6uwZssd2YtkBerdzXey', 'supervrijdag'),
(19, 'bob@bob.com', '$2y$10$tlX4cYpZNY38G2Dgy6XIk.srLxZGLJBVoa85I5V2TzL4Np6v6i/je', 'bob'),
(20, 'Izabel@izabel.nl', '$2y$10$HQ98X/KTn1VU.vGC4UlmSOyDJW/GhFEpOAebaNsk1ZGuhzZpi/h2S', 'Izabel');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
