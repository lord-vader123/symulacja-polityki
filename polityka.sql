-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 14, 2024 at 03:08 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polityka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komitet`
--

CREATE TABLE `komitet` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `partia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `partia`
--

CREATE TABLE `partia` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `skrot` varchar(6) NOT NULL,
  `logo_src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polityk`
--

CREATE TABLE `polityk` (
  `id` int(11) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `partia_id` int(11) NOT NULL,
  `poparcie` int(11) NOT NULL,
  `zdjecie_src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', '!QAZ2wsx');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komitet`
--
ALTER TABLE `komitet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partia_id` (`partia_id`);

--
-- Indeksy dla tabeli `partia`
--
ALTER TABLE `partia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `polityk`
--
ALTER TABLE `polityk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partia_id` (`partia_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komitet`
--
ALTER TABLE `komitet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partia`
--
ALTER TABLE `partia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polityk`
--
ALTER TABLE `polityk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komitet`
--
ALTER TABLE `komitet`
  ADD CONSTRAINT `komitet_ibfk_1` FOREIGN KEY (`partia_id`) REFERENCES `partia` (`id`);

--
-- Constraints for table `polityk`
--
ALTER TABLE `polityk`
  ADD CONSTRAINT `polityk_ibfk_1` FOREIGN KEY (`partia_id`) REFERENCES `partia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
