-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 05. bře 2022, 05:08
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `mediasolution-task`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `produkty`
--

CREATE TABLE `produkty` (
  `pid` int(11) NOT NULL,
  `ean` bigint(14) DEFAULT NULL,
  `product_no` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `item_id` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `manufacturer` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `url` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `imgurl` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `delivery_date` int(10) NOT NULL,
  `category_text` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `price_vat` int(10) NOT NULL,
  `extra_message` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `produkty`
--

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_no` (`product_no`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
