-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2020 at 08:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papyrus`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CA_Fournisseur` (IN `cod_fou` INT(11), IN `annee` INT(4))  BEGIN   
        SELECT fournis.nomfou AS founisseur, SUM(ligcom.qtecde*ligcom.priuni) AS 'CA potentiel'
        FROM fournis
        JOIN entcom ON entcom.numfou = fournis.numfou
        JOIN ligcom ON ligcom.numcom = entcom.numcom
        WHERE fournis.numfou = cod_fou
        AND YEAR(entcom.datcom) = annee
        GROUP BY fournis.nomfou ;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Lst_Commandes` (IN `libelle` VARCHAR(50))  BEGIN   
        SELECT numcom, obscom, datcom, numfou
        FROM entcom
        WHERE obscom = libelle ;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lst_fournis` ()  BEGIN
        SELECT DISTINCT numfou 
        FROM entcom ;    
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `entcom`
--

CREATE TABLE `entcom` (
  `numcom` int(10) NOT NULL,
  `obscom` varchar(50) DEFAULT NULL,
  `datcom` date DEFAULT NULL,
  `numfou` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entcom`
--

INSERT INTO `entcom` (`numcom`, `obscom`, `datcom`, `numfou`) VALUES
(70010, '', '2007-02-10', '120'),
(70011, 'commande urgente', '2007-03-01', '540'),
(70020, '', '2007-04-25', '9180'),
(70025, 'Commande urgente', '2007-04-30', '9150'),
(70210, 'Commande cadencée', '2007-05-05', '120'),
(70250, 'Commande cadencée', '2007-10-02', '8700'),
(70300, '', '2007-06-06', '9120'),
(70620, '', '2007-10-02', '540'),
(70625, '', '2007-10-09', '120'),
(70629, '', '2007-10-12', '9180');

-- --------------------------------------------------------

--
-- Table structure for table `fournis`
--

CREATE TABLE `fournis` (
  `numfou` varchar(25) NOT NULL,
  `nomfou` varchar(25) DEFAULT NULL,
  `ruefou` varchar(30) DEFAULT NULL,
  `posfou` char(5) DEFAULT NULL,
  `vilfou` varchar(30) DEFAULT NULL,
  `confou` varchar(15) DEFAULT NULL,
  `satisf` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournis`
--

INSERT INTO `fournis` (`numfou`, `nomfou`, `ruefou`, `posfou`, `vilfou`, `confou`, `satisf`) VALUES
('120', 'GROBRIGAN', '20 rue du papier', '92200', ' Papercity', 'Georges', 8),
('540', 'ECLIPSE', '53, rue laisse flotter les rub', '78250', ' Bugbugville', 'Nestor', 7),
('8700', 'MEDICIS', '120 rue des plantes ', '75014', 'Paris', 'Lison', 0),
('9120', 'DISCOBOL', '11 rue des sports', '85100', ' La Roche sur Yon', 'Hercule', 8),
('9150', 'DEPANPAP', '29 avenue des locomotives ', '59987', 'Coroncountry', 'Pollux', 5),
('9180', 'HURRYTAPE', '68, boulevard des octets ', '4044', ' Dumpville', 'Track', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ligcom`
--

CREATE TABLE `ligcom` (
  `numcom` int(10) NOT NULL,
  `codart` char(4) DEFAULT NULL,
  `numlig` tinyint(3) NOT NULL,
  `qtecde` int(10) DEFAULT NULL,
  `priuni` varchar(50) DEFAULT NULL,
  `qteliv` int(10) DEFAULT NULL,
  `derliv` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligcom`
--

INSERT INTO `ligcom` (`numcom`, `codart`, `numlig`, `qtecde`, `priuni`, `qteliv`, `derliv`) VALUES
(70010, 'I100', 1, 3000, '470', 3000, '2007-03-15 00:00:00'),
(70010, 'I105', 2, 2000, '485', 2000, '2007-07-05 00:00:00'),
(70010, 'I108', 3, 1000, '680', 1000, '2007-08-20 00:00:00'),
(70010, 'D035', 4, 200, '40', 250, '2007-02-20 00:00:00'),
(70010, 'P220', 5, 6000, '3500', 6000, '2007-03-31 00:00:00'),
(70010, 'P240', 6, 6000, '2000', 2000, '2007-03-31 00:00:00'),
(70010, 'P220', 11, 10000, '3500', 10000, '2007-08-31 00:00:00'),
(70011, 'I105', 1, 1000, '600', 1000, '2007-05-16 00:00:00'),
(70020, 'B001', 1, 200, '140', 0, '2007-12-31 00:00:00'),
(70020, 'B002', 2, 200, '140', 0, '2007-12-31 00:00:00'),
(70025, 'I100', 1, 1000, '590', 1000, '2007-05-15 00:00:00'),
(70025, 'I105', 2, 500, '590', 500, '2007-05-15 00:00:00'),
(70210, 'I100', 1, 1000, '470', 1000, '2007-07-15 00:00:00'),
(70250, 'P230', 1, 15000, '4900', 12000, '2007-12-15 00:00:00'),
(70250, 'P220', 2, 10000, '3350', 10000, '2007-11-10 00:00:00'),
(70300, 'I110', 1, 50, '790', 50, '2007-10-31 00:00:00'),
(70620, 'I105', 1, 200, '600', 200, '2007-11-01 00:00:00'),
(70625, 'I100', 1, 1000, '470', 1000, '2007-10-15 00:00:00'),
(70625, 'P220', 2, 10000, '3500', 10000, '2007-10-31 00:00:00'),
(70629, 'B001', 1, 200, '140', 0, '2007-12-31 00:00:00'),
(70629, 'B002', 2, 200, '140', 0, '2007-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `codart` char(4) NOT NULL,
  `libart` varchar(30) DEFAULT NULL,
  `unimes` char(5) DEFAULT NULL,
  `stkale` int(10) DEFAULT NULL,
  `stkphy` int(10) DEFAULT NULL,
  `qteann` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`codart`, `libart`, `unimes`, `stkale`, `stkphy`, `qteann`) VALUES
('B001', 'Bande magnétique 1200', 'unite', 20, 87, 240),
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

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `numfou` varchar(25) NOT NULL,
  `codart` char(4) NOT NULL,
  `delliv` smallint(5) DEFAULT NULL,
  `qte1` int(10) DEFAULT NULL,
  `prix1` varchar(50) DEFAULT NULL,
  `qte2` int(10) DEFAULT NULL,
  `prix2` varchar(50) DEFAULT NULL,
  `qte3` int(10) DEFAULT NULL,
  `prix3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`numfou`, `codart`, `delliv`, `qte1`, `prix1`, `qte2`, `prix2`, `qte3`, `prix3`) VALUES
('120', 'D035', 0, 0, '40', 0, '0', 0, '0'),
('120', 'I100', 90, 0, '700', 50, '600', 120, '500'),
('120', 'I105', 90, 10, '705', 50, '630', 120, '500'),
('120', 'I108', 90, 5, '795', 30, '720', 100, '680'),
('120', 'P220', 15, 0, '3700', 100, '3500', 0, '0'),
('120', 'P230', 30, 0, '5200', 100, '5000', 0, '0'),
('120', 'P240', 15, 0, '2200', 100, '2000', 0, '0'),
('120', 'P250', 30, 0, '1500', 100, '1400', 500, '1200'),
('540', 'I100', 70, 0, '710', 60, '630', 100, '600'),
('540', 'I105', 70, 0, '810', 60, '645', 100, '600'),
('8700', 'B001', 15, 0, '150', 50, '145', 100, '140'),
('8700', 'B002', 15, 0, '210', 50, '200', 100, '185'),
('8700', 'I105', 30, 0, '720', 50, '670', 100, '510'),
('8700', 'P220', 20, 50, '3500', 100, '3350', 0, '0'),
('8700', 'P230', 60, 0, '5000', 50, '4900', 0, '0'),
('9120', 'D035', 5, 0, '40', 100, '30', 0, '0'),
('9120', 'I100', 60, 0, '800', 70, '600', 90, '500'),
('9120', 'I105', 60, 0, '920', 70, '800', 90, '700'),
('9120', 'I108', 60, 0, '920', 70, '820', 100, '780'),
('9120', 'I110', 60, 0, '950', 70, '850', 90, '790'),
('9120', 'P250', 30, 0, '1500', 100, '1400', 500, '1200'),
('9120', 'R080', 10, 0, '120', 100, '100', 0, '0'),
('9120', 'R132', 5, 0, '275', 0, '0', 0, '0'),
('9150', 'I100', 90, 0, '650', 90, '600', 200, '590'),
('9150', 'I105', 90, 0, '685', 90, '600', 200, '590'),
('9180', 'I100', 30, 0, '720', 50, '670', 100, '490'),
('9180', 'I110', 90, 0, '900', 70, '870', 90, '835');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_globalcde`
-- (See below for the actual view)
--
CREATE TABLE `v_globalcde` (
`code produit` char(4)
,`QteTot` decimal(32,0)
,`PrixTot` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ventesi100`
-- (See below for the actual view)
--
CREATE TABLE `v_ventesi100` (
`codart` char(4)
,`numfou` varchar(25)
,`delliv` smallint(5)
,`qte1` int(10)
,`prix1` varchar(50)
,`qte2` int(10)
,`prix2` varchar(50)
,`qte3` int(10)
,`prix3` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ventesi100grobrigan`
-- (See below for the actual view)
--
CREATE TABLE `v_ventesi100grobrigan` (
`codart` char(4)
,`numfou` varchar(25)
,`delliv` smallint(5)
,`qte1` int(10)
,`prix1` varchar(50)
,`qte2` int(10)
,`prix2` varchar(50)
,`qte3` int(10)
,`prix3` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_globalcde`
--
DROP TABLE IF EXISTS `v_globalcde`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_globalcde`  AS  select `ligcom`.`codart` AS `code produit`,sum(`ligcom`.`qtecde`) AS `QteTot`,sum((`ligcom`.`qtecde` * `ligcom`.`priuni`)) AS `PrixTot` from `ligcom` group by `ligcom`.`codart` ;

-- --------------------------------------------------------

--
-- Structure for view `v_ventesi100`
--
DROP TABLE IF EXISTS `v_ventesi100`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ventesi100`  AS  select `vente`.`codart` AS `codart`,`vente`.`numfou` AS `numfou`,`vente`.`delliv` AS `delliv`,`vente`.`qte1` AS `qte1`,`vente`.`prix1` AS `prix1`,`vente`.`qte2` AS `qte2`,`vente`.`prix2` AS `prix2`,`vente`.`qte3` AS `qte3`,`vente`.`prix3` AS `prix3` from `vente` where (`vente`.`codart` = 'I100') ;

-- --------------------------------------------------------

--
-- Structure for view `v_ventesi100grobrigan`
--
DROP TABLE IF EXISTS `v_ventesi100grobrigan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ventesi100grobrigan`  AS  select `vente`.`codart` AS `codart`,`vente`.`numfou` AS `numfou`,`vente`.`delliv` AS `delliv`,`vente`.`qte1` AS `qte1`,`vente`.`prix1` AS `prix1`,`vente`.`qte2` AS `qte2`,`vente`.`prix2` AS `prix2`,`vente`.`qte3` AS `qte3`,`vente`.`prix3` AS `prix3` from `vente` where ((`vente`.`codart` = 'I100') and (`vente`.`numfou` = '120')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entcom`
--
ALTER TABLE `entcom`
  ADD PRIMARY KEY (`numcom`),
  ADD KEY `numfou` (`numfou`);

--
-- Indexes for table `fournis`
--
ALTER TABLE `fournis`
  ADD PRIMARY KEY (`numfou`);

--
-- Indexes for table `ligcom`
--
ALTER TABLE `ligcom`
  ADD PRIMARY KEY (`numcom`,`numlig`),
  ADD KEY `codart` (`codart`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codart`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`numfou`,`codart`),
  ADD KEY `codart` (`codart`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entcom`
--
ALTER TABLE `entcom`
  MODIFY `numcom` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70630;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entcom`
--
ALTER TABLE `entcom`
  ADD CONSTRAINT `entcom_ibfk_1` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`);

--
-- Constraints for table `ligcom`
--
ALTER TABLE `ligcom`
  ADD CONSTRAINT `ligcom_ibfk_1` FOREIGN KEY (`numcom`) REFERENCES `entcom` (`numcom`),
  ADD CONSTRAINT `ligcom_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`);

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
