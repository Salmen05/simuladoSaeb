-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema saep_db
--

CREATE DATABASE IF NOT EXISTS saep_db;
USE saep_db;

--
-- Definition of table `tbatividade`
--

DROP TABLE IF EXISTS `tbatividade`;
CREATE TABLE `tbatividade` (
  `idatividade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idturma` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descriçao` text NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idatividade`,`idturma`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbatividade`
--

/*!40000 ALTER TABLE `tbatividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbatividade` ENABLE KEYS */;


--
-- Definition of table `tbprofessor`
--

DROP TABLE IF EXISTS `tbprofessor`;
CREATE TABLE `tbprofessor` (
  `idprofessor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idprofessor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbprofessor`
--

/*!40000 ALTER TABLE `tbprofessor` DISABLE KEYS */;
INSERT INTO `tbprofessor` (`idprofessor`,`nome`,`email`,`senha`,`registro`,`alteraçao`,`status`) VALUES 
 (1,'Miguel Salmen','fiemg@gmail.com','$2y$12$k3bDfs/ocjBuc64fjnBHiulGcjQhH89nkeDQsJqEQ.3/EAGkvopd6','2024-06-20 21:55:12','2024-06-20 21:55:21','A');
/*!40000 ALTER TABLE `tbprofessor` ENABLE KEYS */;


--
-- Definition of table `tbturma`
--

DROP TABLE IF EXISTS `tbturma`;
CREATE TABLE `tbturma` (
  `idturma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprofessor` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idturma`,`idprofessor`) USING BTREE,
  KEY `FK_tbturma_tbprofessor` (`idprofessor`),
  CONSTRAINT `FK_tbturma_tbprofessor` FOREIGN KEY (`idprofessor`) REFERENCES `tbprofessor` (`idprofessor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbturma`
--

/*!40000 ALTER TABLE `tbturma` DISABLE KEYS */;
INSERT INTO `tbturma` (`idturma`,`idprofessor`,`nome`,`registro`,`alteraçao`,`status`) VALUES 
 (1,1,'Desenvolvimento de sistemas','2024-06-21 11:51:50','2024-06-21 11:51:50','A');
/*!40000 ALTER TABLE `tbturma` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
