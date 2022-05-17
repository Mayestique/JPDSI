-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Maj 2022, 18:50
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `simpledb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `person`
--

CREATE TABLE `person` (
  `idperson` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kwota` int(11) NOT NULL,
  `ile` int(11) NOT NULL,
  `procent` int(11) NOT NULL,
  `resultCredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `person`
--

INSERT INTO `person` (`idperson`, `name`, `surname`, `kwota`, `ile`, `procent`, `resultCredit`) VALUES
(5, 'Marta', 'Skowronek', 1200, 12, 10, 1310),
(6, 'Marta', 'Skowronek', 1200, 12, 10, 110),
(7, 'Kamil', 'Kwiatek', 1200, 12, 10, 110),
(8, 'Marta', 'Skowronek', 1200, 10, 10, 132),
(9, 'Marta', 'Skowronek', 1300, 12, 10, 119),
(10, 'Test', 'Test', 1200, 12, 10, 110),
(11, 'Marta', 'Skowronek', 1200, 12, 10, 110),
(12, 'Marta', 'Skowronek', 1250, 12, 10, 115),
(13, 'Marta', 'Skowronek', 1260, 12, 10, 116),
(14, 'Marta', 'Skowronek', 1270, 12, 10, 116),
(15, 'Marta', 'Skowronek', 2200, 10, 10, 242),
(16, 'Marta', 'Skowronek', 2500, 10, 10, 275),
(17, 'Marta', 'Skowronek', 2600, 10, 10, 286),
(18, 'Marta', 'Skowronek', 2700, 10, 10, 297),
(19, 'Test', 'Test', 2200, 12, 10, 202),
(20, 'Test', 'Test', 2300, 12, 10, 211);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idperson`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `person`
--
ALTER TABLE `person`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
