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

-- Listage des données de la table papyrusse.entcom : ~6 rows (environ)
/*!40000 ALTER TABLE `entcom` DISABLE KEYS */;
INSERT INTO `entcom` (`numcom`, `obscom`, `datcom`, `numfou`) VALUES
	(70010, NULL, '2007-02-10', 120),
	(70011, 'Commande urgente', '2007-03-01', 540),
	(70020, NULL, '2007-04-25', 9180),
	(70025, 'Commande urgente', '2007-04-30', 9150),
	(70210, 'Commande cadencée', '2007-05-05', 120),
	(70250, 'Commande cadencée', '2007-10-02', 8700),
	(70300, NULL, '2007-06-06', 9120),
	(70620, NULL, '2007-10-02', 540),
	(70625, NULL, '2007-10-09', 120),
	(70629, NULL, '2007-10-12', 9180);
/*!40000 ALTER TABLE `entcom` ENABLE KEYS */;

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

-- Listage des données de la table papyrusse.fournis : ~6 rows (environ)
/*!40000 ALTER TABLE `fournis` DISABLE KEYS */;
INSERT INTO `fournis` (`numfou`, `nomfou`, `ruefou`, `posfou`, `vilfou`, `confou`, `satisf`) VALUES
	(120, 'Georges', '20 rue du papier', 92200, 'Papercity', 'GROBRIGAN', 8),
	(540, 'Nestor', '53 rue laisse flotter les rubans', 78250, 'Bugbugville', 'ECLIPSE', 7),
	(8700, 'Lison', '120 rue des plantes', 75014, 'Paris', 'MEDICIS', NULL),
	(9120, 'Hercule', '11 rue des sports', 85100, 'La Roche sur Yon', 'DISCOBOL', 8),
	(9150, 'Pollux', '26 avenue des locomotives', 59987, 'Coroncountry', 'DEPANPAP', 5),
	(9180, 'Track', '68 boulevard des octets', 4044, 'Dumpville', 'HURRYTAPE', NULL);
/*!40000 ALTER TABLE `fournis` ENABLE KEYS */;

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

-- Listage des données de la table papyrusse.ligcom : ~21 rows (environ)
/*!40000 ALTER TABLE `ligcom` DISABLE KEYS */;
INSERT INTO `ligcom` (`numcom`, `codart`, `numlig`, `qtecde`, `priuni`, `qteliv`, `derliv`) VALUES
	(70010, 'I100', 1, 3000, 470, 3000, '2007-03-15'),
	(70010, 'I105', 2, 2000, 485, 2000, '2007-07-05'),
	(70010, 'I108', 3, 1000, 680, 1000, '2007-08-20'),
	(70010, 'D035', 4, 200, 40, 250, '2007-02-20'),
	(70010, 'P220', 5, 6000, 3500, 6000, '2007-03-31'),
	(70010, 'P240', 6, 6000, 2000, 2000, '2007-03-31'),
	(70010, 'P220', 7, 10000, 3500, 10000, '2007-08-31'),
	(70011, 'I105', 1, 1000, 600, 1000, '2007-05-16'),
	(70020, 'B001', 1, 200, 140, NULL, '2007-12-31'),
	(70020, 'B002', 2, 200, 140, NULL, '2007-12-31'),
	(70025, 'I100', 1, 1000, 590, 1000, '2007-05-15'),
	(70025, 'I105', 2, 500, 590, 500, '2007-05-15'),
	(70210, 'I100', 1, 1000, 470, 1000, '2007-07-15'),
	(70300, 'I110', 1, 50, 790, 50, '2007-10-31'),
	(70250, 'P230', 1, 15000, 4900, 12000, '2007-12-15'),
	(70250, 'P220', 2, 10000, 3350, 10000, '2007-11-10'),
	(70620, 'I105', 1, 200, 600, 200, '2007-11-01'),
	(70625, 'I100', 1, 1000, 470, 1000, '2007-10-15'),
	(70625, 'P220', 2, 10000, 3500, 10000, '2007-10-31'),
	(70629, 'B001', 1, 200, 140, NULL, '2007-12-31'),
	(70629, 'B002', 2, 200, 140, NULL, '2007-12-31');
/*!40000 ALTER TABLE `ligcom` ENABLE KEYS */;

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

-- Listage des données de la table papyrusse.produit : ~15 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`codart`, `libart`, `unimes`, `stkale`, `stkphy`, `qteann`) VALUES
	('B001', 'Bande magnétique 1200', 'unité', 20, 87, 240),
	('B002', 'Bande magnétique 6250', 'unite', 20, 12, 410),
	('D035', 'CD R slim 80 mm', 'B010', 40, 42, 150),
	('D050', 'CD R-W 80mm', 'B010', 50, 4, 0),
	('I100', 'Papier 1 ex continu', 'B1000', 100, 557, 3500),
	('I105', 'Papier 2 ex continu', 'B1000', 75, 5, 2300),
	('I108', 'Papier 3 ex continu', 'B500', 200, 557, 3500),
	('I110', 'Papier 4 ex continu', 'B400', 10, 12, 63),
	('P220', 'Pré-imprimé commande', 'B500', 500, 2500, 24500),
	('P230', 'Pré-imprimé facture', 'B500', 500, 250, 12500),
	('P240', 'Pré-imprimé bulletin paie', 'B500', 500, 3000, 6250),
	('P250', 'Pré-imprimé bon livraison', 'B500', 500, 2500, 24500),
	('P270', 'Pré-imprimé bon fabrication', 'B500', 500, 2500, 24500),
	('R080', 'ruban Epson 850', 'unite', 10, 2, 120),
	('R132', 'ruban impl 1200 lignes', 'unite', 25, 200, 182);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

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

-- Listage des données de la table papyrusse.vente : ~0 rows (environ)
/*!40000 ALTER TABLE `vente` DISABLE KEYS */;
INSERT INTO `vente` (`codart`, `numfou`, `delliv`, `qte1`, `prix1`, `qte2`, `prix2`, `qte3`, `prix3`) VALUES
	('I100', 120, 90, 0, 700, 50, 600, 120, 500),
	('I100', 540, 70, 0, 710, 60, 630, 100, 600),
	('I100', 9120, 60, 0, 800, 70, 600, 90, 500),
	('I100', 9150, 90, 0, 650, 90, 600, 200, 590),
	('I100', 9180, 30, 0, 720, 50, 670, 100, 490),
	('I105', 120, 90, 10, 705, 50, 630, 120, 500),
	('I105', 540, 70, 0, 810, 60, 645, 100, 600),
	('I105', 9120, 60, 0, 920, 70, 800, 90, 700),
	('I105', 9150, 90, 0, 685, 90, 600, 200, 590),
	('I105', 8700, 30, 0, 720, 50, 670, 100, 510),
	('I108', 120, 90, 5, 795, 30, 720, 100, 680),
	('I108', 9120, 60, 0, 920, 70, 820, 100, 780),
	('I110', 9180, 90, 0, 9000, 70, 870, 90, 835),
	('I110', 9120, 60, 0, 950, 70, 850, 90, 790),
	('D035', 120, 0, 0, 40, NULL, NULL, NULL, NULL),
	('D035', 9120, 5, 0, 40, 100, 30, NULL, NULL),
	('I105', 9120, 8, 0, 37, NULL, NULL, NULL, NULL),
	('D035', 120, 0, 0, 40, NULL, NULL, NULL, NULL),
	('D035', 9120, 5, 0, 40, 100, 30, 5, 0),
	('I105', 9120, 8, 0, 37, NULL, NULL, NULL, NULL),
	('P220', 120, 15, 0, 3700, 100, 3500, NULL, NULL),
	('P230', 120, 30, 0, 5200, 100, 5000, NULL, NULL),
	('P240', 120, 15, 0, 2200, 100, 2000, NULL, NULL),
	('P250', 9120, 30, 0, 1500, 100, 1400, 500, 1200),
	('P220', 8700, 20, 50, 3500, 100, 3350, NULL, NULL),
	('P230', 8700, 60, 0, 5000, 50, 4900, NULL, NULL),
	('R080', 9120, 10, 0, 120, 100, 100, NULL, NULL),
	('R132', 9120, 5, 0, 275, NULL, NULL, NULL, NULL),
	('B001', 8700, 15, 0, 150, 50, 145, 100, 140),
	('B002', 8700, 15, 0, 210, 50, 200, 100, 185);
/*!40000 ALTER TABLE `vente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
