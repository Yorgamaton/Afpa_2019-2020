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


-- Listage de la structure de la base pour first_data_base
CREATE DATABASE IF NOT EXISTS `MPD` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `MPD`;

-- Listage de la structure de la table first_data_base. appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `per_num` int(11) DEFAULT NULL,
  `gro_num` int(11) DEFAULT NULL,
  KEY `per_num` (`per_num`),
  KEY `gro_num` (`gro_num`),
  CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  CONSTRAINT `appartient_ibfk_2` FOREIGN KEY (`gro_num`) REFERENCES `groupe` (`gro_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table first_data_base.appartient : ~0 rows (environ)
/*!40000 ALTER TABLE `appartient` DISABLE KEYS */;
/*!40000 ALTER TABLE `appartient` ENABLE KEYS */;

-- Listage de la structure de la table first_data_base. groupe
CREATE TABLE IF NOT EXISTS `groupe` (
  `gro_num` int(11) NOT NULL AUTO_INCREMENT,
  `gro_libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gro_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table first_data_base.groupe : ~0 rows (environ)
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;

-- Listage de la structure de la table first_data_base. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `per_num` int(11) NOT NULL AUTO_INCREMENT,
  `per_nom` varchar(50) DEFAULT NULL,
  `per_prenom` varchar(50) DEFAULT NULL,
  `per_adresse` varchar(50) DEFAULT NULL,
  `par_ville` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table first_data_base.personne : ~0 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
