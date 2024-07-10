-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema api
--

CREATE DATABASE IF NOT EXISTS api;
USE api;

--
-- Definition of table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `idendereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `numero` varchar(4) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idendereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `endereco`
--

/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


--
-- Definition of table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `idpessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(65) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(155) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`idpessoa`,`nome`,`email`,`senha`,`ativo`) VALUES 
 (1,'Alissa Princisval Amâncio Ramos','alissa@gmail.com','$2y$12$W1oIXLmf364nyYd8.aPhtOvs/KPVOvItnY9GDerjqHF8UAIqTPEDa','A');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
