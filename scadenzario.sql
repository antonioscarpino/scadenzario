-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.1.29-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win32
-- HeidiSQL Versione:            9.5.0.5253
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dump della struttura del database scadenzario
DROP DATABASE IF EXISTS `scadenzario`;
CREATE DATABASE IF NOT EXISTS `scadenzario` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `scadenzario`;

-- Dump della struttura di tabella scadenzario.scadenzario
DROP TABLE IF EXISTS `scadenzario`;
CREATE TABLE IF NOT EXISTS `scadenzario` (
  `idscadenzario` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `anno` varchar(4) NOT NULL,
  `mese` varchar(2) NOT NULL,
  `giorno` varchar(2) NOT NULL,
  `className` varchar(15) NOT NULL,
  PRIMARY KEY (`idscadenzario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- L’esportazione dei dati non era selezionata.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
