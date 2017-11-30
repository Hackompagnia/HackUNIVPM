-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 30, 2017 alle 13:09
-- Versione del server: 5.5.56-MariaDB
-- Versione PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`id`, `nome`, `cognome`) VALUES
(1, 'Pietro', 'Rignanese');

-- --------------------------------------------------------

--
-- Struttura della tabella `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `nome_negozio` varchar(30) NOT NULL,
  `p_iva` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dealer`
--

INSERT INTO `dealer` (`nome`, `cognome`, `id`, `nome_negozio`, `p_iva`) VALUES
('Mario', 'Verdi', 2, 'Marione', 345678),
('Paolo', 'Rossi', 3, 'Ciccionissimo', 123456);

-- --------------------------------------------------------

--
-- Struttura della tabella `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `role` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `data_reg` date NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `list`
--

INSERT INTO `list` (`role`, `mail`, `id`, `data_reg`, `password`, `token`) VALUES
('customer', 'orteip_94@live.it', 1, '2017-11-03', 'pietro123', NULL),
('dealer', 'paolo_rossi@gmail.com', 2, '2017-11-06', 'paolo123', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id_customer` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `data_acquisto` date NOT NULL,
  `id_scontrino` int(11) NOT NULL,
  `prodotto` varchar(30) NOT NULL,
  `prezzo` double NOT NULL,
  `sf_numero` int(11) NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `staff` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
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
-- Indici per le tabelle `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id_scontrino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
