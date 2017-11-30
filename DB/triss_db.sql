-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 30, 2017 alle 12:34
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triss_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `mail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE `customer` (
  `mail` varchar(30) NOT NULL,
  `token` varchar(8) DEFAULT NULL,
  `data_reg` date NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`mail`, `token`, `data_reg`, `password`, `id`) VALUES
('orteip_94@live.it', NULL, '2017-11-10', 'pietro123', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `dealer`
--

CREATE TABLE `dealer` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` varchar(8) NOT NULL,
  `id` int(11) NOT NULL,
  `nome_negozio` varchar(30) NOT NULL,
  `p_iva` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dealer`
--

INSERT INTO `dealer` (`nome`, `cognome`, `mail`, `password`, `token`, `id`, `nome_negozio`, `p_iva`) VALUES
('Paolo', 'Rossi', 'paolo_rossi@gmail.com', 'paolo123', '', 1, 'Ciccionissimo', 123456),
('Mario', 'Verdi', 'mario@gmail.com', 'mario123', '', 2, 'Marione', 345678);

-- --------------------------------------------------------

--
-- Struttura della tabella `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `list`
--

INSERT INTO `list` (`id`, `role`, `mail`) VALUES
(1, 'dealer', 'paolo_rossi@gmail.com'),
(1, 'customer', 'orteip_94@live.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `receipt`
--

CREATE TABLE `receipt` (
  `id_customer` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `data_acquisto` date NOT NULL,
  `id_scontrino` int(11) NOT NULL,
  `prodotto` varchar(30) NOT NULL,
  `prezzo` double NOT NULL,
  `sf_numero` int(11) NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `receipt`
--

INSERT INTO `receipt` (`id_customer`, `id_dealer`, `data_acquisto`, `id_scontrino`, `prodotto`, `prezzo`, `sf_numero`, `ora`) VALUES
(1, 1, '2017-11-30', 1, 'Lavatrice', 100, 1, '12:20:00'),
(1, 1, '2017-11-30', 2, 'TV', 250, 1, '12:20:00'),
(1, 2, '2017-11-25', 3, 'Playstation 4', 230, 3, '17:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `staff`
--

CREATE TABLE `staff` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `data_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id_scontrino`);

--
-- Indici per le tabelle `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_scontrino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
