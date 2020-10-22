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


-- Listage de la structure de la base pour hotel
CREATE DATABASE IF NOT EXISTS `hotel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hotel`;

-- Listage de la structure de la table hotel. chambre
CREATE TABLE IF NOT EXISTS `chambre` (
  `capacite_chambre` int(11) DEFAULT NULL,
  `degre_confort` tinyint(4) DEFAULT NULL,
  `exposition` varchar(50) DEFAULT NULL,
  `type_chambre` varchar(50) DEFAULT NULL,
  `num_chambre` int(11) NOT NULL,
  `num_hotel` int(11) NOT NULL,
  PRIMARY KEY (`num_chambre`),
  KEY `num_hotel` (`num_hotel`),
  CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`num_hotel`) REFERENCES `hotel` (`num_hotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage de la structure de la table hotel. client_table
CREATE TABLE IF NOT EXISTS `client_table` (
  `adresse_client` varchar(50) DEFAULT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `num_client` int(11) NOT NULL,
  PRIMARY KEY (`num_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table hotel.client_table : ~0 rows (environ)
/*!40000 ALTER TABLE `client_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_table` ENABLE KEYS */;

-- Listage de la structure de la table hotel. hotel
CREATE TABLE IF NOT EXISTS `hotel` (
  `capacite_hotel` int(11) NOT NULL,
  `categorie_hotel` varchar(50) DEFAULT NULL,
  `nom_hotel` varchar(50) DEFAULT NULL,
  `adresse_hotel` varchar(50) DEFAULT NULL,
  `num_hotel` int(11) NOT NULL,
  `num_station` int(11) NOT NULL,
  PRIMARY KEY (`num_hotel`),
  KEY `num_station` (`num_station`),
  CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`num_station`) REFERENCES `station` (`num_station`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage de la structure de la table hotel. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `num_chambre` int(11) NOT NULL,
  `num_client` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `montant_arrhes` int(11) NOT NULL,
  `prix_tota` int(11) NOT NULL,
  KEY `num_chambre` (`num_chambre`),
  KEY `num_client` (`num_client`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`num_client`) REFERENCES `client_table` (`num_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table hotel.reservation : ~0 rows (environ)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;

-- Listage de la structure de la table hotel. station
CREATE TABLE IF NOT EXISTS `station` (
  `num_station` int(11) NOT NULL,
  `nom_station` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`num_station`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
