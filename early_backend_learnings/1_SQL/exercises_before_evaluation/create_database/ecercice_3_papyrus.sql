-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour papyrusse
CREATE DATABASE IF NOT EXISTS `papyrusse` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `papyrusse`;

-- Listage de la structure de la table papyrusse. entcom
CREATE TABLE IF NOT EXISTS `entcom` (
  `numcom` int(10) NOT NULL AUTO_INCREMENT,
  `obscom` varchar(50) DEFAULT NULL,
  `datcom` date DEFAULT NULL,
  `numfou` int(11) DEFAULT NULL,
  PRIMARY KEY (`numcom`),
  KEY `num_fou` (`numfou`),
  CONSTRAINT `ent_com_ibfk_1` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`)
) ENGINE=InnoDB AUTO_INCREMENT=70630 DEFAULT CHARSET=latin1;

-- Listage de la structure de la table papyrusse. fournis
CREATE TABLE IF NOT EXISTS `fournis` (
  `numfou` int(11) NOT NULL DEFAULT '0',
  `nomfou` varchar(25) NOT NULL,
  `ruefou` varchar(50) NOT NULL,
  `posfou` int(11) NOT NULL DEFAULT '0',
  `vilfou` varchar(50) NOT NULL,
  `confou` varchar(15) NOT NULL,
  `satisf` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`numfou`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage de la structure de la table papyrusse. ligcom
CREATE TABLE IF NOT EXISTS `ligcom` (
  `numcom` int(10) NOT NULL,
  `codart` char(4) NOT NULL,
  `numlig` int(11) NOT NULL,
  `qtecde` int(11) NOT NULL DEFAULT '0',
  `priuni` int(11) NOT NULL DEFAULT '0',
  `qteliv` int(10) DEFAULT NULL,
  `derliv` date NOT NULL,
  KEY `numcom` (`numcom`),
  KEY `codart` (`codart`),
  CONSTRAINT `ligcom_ibfk_1` FOREIGN KEY (`numcom`) REFERENCES `entcom` (`numcom`),
  CONSTRAINT `ligcom_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage de la structure de la table papyrusse. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `codart` char(4) NOT NULL,
  `libart` varchar(30) NOT NULL,
  `unimes` char(5) NOT NULL,
  `stkale` int(10) NOT NULL,
  `stkphy` int(10) NOT NULL,
  `qteann` int(10) NOT NULL,
  PRIMARY KEY (`codart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage de la structure de la table papyrusse. vente
CREATE TABLE IF NOT EXISTS `vente` (
  `codart` char(4) NOT NULL,
  `numfou` int(11) NOT NULL DEFAULT '0',
  `delliv` smallint(5) NOT NULL,
  `qte1` int(10) NOT NULL,
  `prix1` int(11) NOT NULL DEFAULT '0',
  `qte2` int(10) DEFAULT NULL,
  `prix2` int(11) DEFAULT NULL,
  `qte3` int(10) DEFAULT NULL,
  `prix3` int(11) DEFAULT NULL,
  KEY `codart` (`codart`),
  KEY `vent_ibfk_1` (`numfou`),
  CONSTRAINT `vent_ibfk_1` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`),
  CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
