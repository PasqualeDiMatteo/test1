-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 07, 2024 alle 09:50
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_acquisto`
--

CREATE TABLE `dati_acquisto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `codice_fiscale` varchar(16) DEFAULT NULL,
  `partita_iva` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `opzioni_prodotto`
--

CREATE TABLE `opzioni_prodotto` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `nome_opzione` varchar(255) DEFAULT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `opzioni_prodotto`
--

INSERT INTO `opzioni_prodotto` (`id`, `categoria`, `nome_opzione`, `prezzo`) VALUES
(1, 'Numero sedi', '1 Sede', 100),
(2, 'Numero sedi', '2 Sedi', 200),
(3, 'Numero di utenti', 'Fino a 10 utenti', 50),
(4, 'Numero di utenti', 'Fino a 50 utenti', 100),
(5, 'Numero di movimenti', 'Fino a 1000 movimenti', 30),
(6, 'Numero di movimenti', 'Illimitati', 70);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dati_acquisto`
--
ALTER TABLE `dati_acquisto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `opzioni_prodotto`
--
ALTER TABLE `opzioni_prodotto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dati_acquisto`
--
ALTER TABLE `dati_acquisto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `opzioni_prodotto`
--
ALTER TABLE `opzioni_prodotto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
