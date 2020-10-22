-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2020 at 09:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

CREATE TABLE `chambre` (
  `cha_id` int(11) NOT NULL,
  `cha_hot_id` int(11) NOT NULL,
  `cha_numero` int(11) NOT NULL,
  `cha_capacite` int(11) NOT NULL,
  `cha_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`cha_id`, `cha_hot_id`, `cha_numero`, `cha_capacite`, `cha_type`) VALUES
(1, 1, 1, 2, 1),
(2, 1, 2, 3, 1),
(3, 1, 3, 2, 1),
(4, 1, 101, 1, 1),
(5, 1, 102, 2, 1),
(6, 1, 103, 3, 1),
(7, 1, 201, 2, 1),
(8, 1, 202, 7, 1),
(9, 1, 203, 1, 1),
(10, 2, 1, 2, 1),
(11, 2, 2, 2, 1),
(12, 2, 3, 1, 1),
(13, 2, 101, 2, 1),
(14, 2, 102, 1, 1),
(15, 2, 103, 3, 1),
(16, 2, 201, 2, 1),
(17, 2, 202, 4, 1),
(18, 2, 203, 4, 1),
(19, 3, 1, 3, 1),
(20, 3, 2, 1, 1),
(21, 3, 3, 2, 1),
(22, 3, 101, 2, 1),
(23, 3, 102, 2, 1),
(24, 3, 103, 2, 1),
(25, 3, 201, 2, 1),
(26, 3, 202, 4, 1),
(27, 3, 203, 4, 1),
(28, 4, 1, 4, 1),
(29, 4, 2, 2, 1),
(30, 4, 3, 4, 1),
(31, 4, 101, 1, 1),
(32, 4, 102, 2, 1),
(33, 4, 103, 2, 1),
(34, 4, 201, 2, 1),
(35, 4, 202, 2, 1),
(36, 4, 203, 3, 1),
(37, 5, 1, 3, 1),
(38, 5, 2, 2, 1),
(39, 5, 3, 2, 1),
(40, 5, 101, 1, 1),
(41, 5, 102, 4, 1),
(42, 5, 103, 1, 1),
(43, 5, 201, 2, 1),
(44, 5, 202, 4, 1),
(45, 5, 203, 4, 1),
(46, 6, 1, 1, 1),
(47, 6, 2, 1, 1),
(48, 6, 3, 1, 1),
(49, 6, 101, 1, 1),
(50, 6, 102, 1, 1),
(51, 6, 103, 1, 1),
(52, 6, 201, 1, 1),
(53, 6, 202, 1, 1),
(54, 6, 203, 1, 1),
(55, 7, 1, 1, 1),
(56, 7, 2, 5, 1),
(57, 7, 3, 5, 1),
(58, 7, 101, 5, 1),
(59, 7, 102, 5, 1),
(60, 7, 103, 5, 1),
(61, 7, 201, 5, 1),
(62, 7, 202, 5, 1),
(63, 7, 203, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cli_id` int(11) NOT NULL,
  `cli_nom` varchar(50) DEFAULT NULL,
  `cli_prenom` varchar(50) DEFAULT NULL,
  `cli_adresse` varchar(50) DEFAULT NULL,
  `cli_ville` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cli_id`, `cli_nom`, `cli_prenom`, `cli_adresse`, `cli_ville`) VALUES
(1, 'Doe', 'John', '', 'LA'),
(2, 'Homme', 'Josh', '', 'Palm Desert'),
(3, 'Paul', 'Weller', '', 'Londre'),
(4, 'White', 'Jack', '', 'Detroit'),
(5, 'Claypool', 'Les', '', 'San Francisco'),
(6, 'Squire', 'Chris', '', 'Londre'),
(7, 'Wood', 'Ronnie', '', 'Londre');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hot_id` int(11) NOT NULL,
  `hot_sta_id` int(11) NOT NULL,
  `hot_nom` varchar(50) NOT NULL,
  `hot_categorie` int(11) NOT NULL,
  `hot_adresse` varchar(50) NOT NULL,
  `hot_ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hot_id`, `hot_sta_id`, `hot_nom`, `hot_categorie`, `hot_adresse`, `hot_ville`) VALUES
(1, 1, 'Le Magnifique', 3, 'rue du bas', 'Pralo'),
(2, 1, 'Hotel du haut', 1, 'rue du haut', 'Pralo'),
(3, 2, 'Le Narval', 3, 'place de la liberation', 'Vonten'),
(4, 2, 'Les Pissenlis', 4, 'place du 14 juillet', 'Bretou'),
(5, 2, 'RR Hotel', 5, 'place du bas', 'Bretou'),
(6, 2, 'La Brique', 2, 'place du haut', 'Bretou'),
(7, 3, 'Le Beau Rivage', 3, 'place du centre', 'Toras');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_cha_id` int(11) NOT NULL,
  `res_cli_id` int(11) NOT NULL,
  `res_date` datetime NOT NULL,
  `res_date_debut` datetime NOT NULL,
  `res_date_fin` datetime NOT NULL,
  `res_prix` decimal(6,2) NOT NULL,
  `res_arrhes` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_cha_id`, `res_cli_id`, `res_date`, `res_date_debut`, `res_date_fin`, `res_prix`, `res_arrhes`) VALUES
(1, 1, 1, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '2400.00', '800.00'),
(2, 2, 2, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '3400.00', '100.00'),
(3, 1, 3, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '400.00', '50.00'),
(4, 2, 4, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '7200.00', '1800.00'),
(5, 3, 5, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '1400.00', '450.00'),
(6, 4, 6, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '2400.00', '780.00'),
(7, 4, 6, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '500.00', '80.00'),
(8, 4, 1, '2017-01-10 00:00:00', '2017-07-01 00:00:00', '2017-07-15 00:00:00', '40.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sta_id` int(11) NOT NULL,
  `sta_nom` varchar(50) NOT NULL,
  `sta_altitude` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sta_id`, `sta_nom`, `sta_altitude`) VALUES
(1, 'La Montagne', 2500),
(2, 'Le Sud', 200),
(3, 'La Plage', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_booking_by_customer`
-- (See below for the actual view)
--
CREATE TABLE `v_booking_by_customer` (
`cli_nom` varchar(50)
,`cli_prenom` varchar(50)
,`res_id` int(11)
,`res_date` datetime
,`res_date_debut` datetime
,`res_date_fin` datetime
,`res_prix` decimal(6,2)
,`res_arrhes` decimal(6,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_booking_by_customer_and_hotel`
-- (See below for the actual view)
--
CREATE TABLE `v_booking_by_customer_and_hotel` (
`cli_nom` varchar(50)
,`hot_nom` varchar(50)
,`res_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_room_by_hotel`
-- (See below for the actual view)
--
CREATE TABLE `v_room_by_hotel` (
`hot_nom` varchar(50)
,`cha_numero` int(11)
,`cha_capacite` int(11)
,`cha_type` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_room_by_hotel_and_station`
-- (See below for the actual view)
--
CREATE TABLE `v_room_by_hotel_and_station` (
`hot_nom` varchar(50)
,`sta_nom` varchar(50)
,`cha_numero` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_station_by_hotel`
-- (See below for the actual view)
--
CREATE TABLE `v_station_by_hotel` (
`hot_nom` varchar(50)
,`sta_nom` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_booking_by_customer`
--
DROP TABLE IF EXISTS `v_booking_by_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_booking_by_customer`  AS  select `client`.`cli_nom` AS `cli_nom`,`client`.`cli_prenom` AS `cli_prenom`,`reservation`.`res_id` AS `res_id`,`reservation`.`res_date` AS `res_date`,`reservation`.`res_date_debut` AS `res_date_debut`,`reservation`.`res_date_fin` AS `res_date_fin`,`reservation`.`res_prix` AS `res_prix`,`reservation`.`res_arrhes` AS `res_arrhes` from (`client` join `reservation` on((`reservation`.`res_cli_id` = `client`.`cli_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_booking_by_customer_and_hotel`
--
DROP TABLE IF EXISTS `v_booking_by_customer_and_hotel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_booking_by_customer_and_hotel`  AS  select `client`.`cli_nom` AS `cli_nom`,`hot_nom` AS `hot_nom`,`reservation`.`res_id` AS `res_id` from (((`reservation` join `client` on((`client`.`cli_id` = `reservation`.`res_cli_id`))) join `chambre` on((`chambre`.`cha_id` = `reservation`.`res_cha_id`))) join `hotel` on((`hot_id` = `chambre`.`cha_hot_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_room_by_hotel`
--
DROP TABLE IF EXISTS `v_room_by_hotel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_room_by_hotel`  AS  select `hot_nom` AS `hot_nom`,`chambre`.`cha_numero` AS `cha_numero`,`chambre`.`cha_capacite` AS `cha_capacite`,`chambre`.`cha_type` AS `cha_type` from (`chambre` join `hotel` on((`chambre`.`cha_hot_id` = `hot_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_room_by_hotel_and_station`
--
DROP TABLE IF EXISTS `v_room_by_hotel_and_station`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_room_by_hotel_and_station`  AS  select `hot_nom` AS `hot_nom`,`station`.`sta_nom` AS `sta_nom`,`chambre`.`cha_numero` AS `cha_numero` from ((`chambre` join `hotel` on((`hot_id` = `chambre`.`cha_hot_id`))) join `station` on((`station`.`sta_id` = `hot_sta_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_station_by_hotel`
--
DROP TABLE IF EXISTS `v_station_by_hotel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_station_by_hotel`  AS  select `hot_nom` AS `hot_nom`,`station`.`sta_nom` AS `sta_nom` from (`hotel` join `station` on((`station`.`sta_id` = `hot_sta_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`cha_id`),
  ADD KEY `cha_hot_id` (`cha_hot_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hot_id`),
  ADD KEY `hot_sta_id` (`hot_sta_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_cha_id` (`res_cha_id`),
  ADD KEY `res_cli_id` (`res_cli_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `cha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`cha_hot_id`) REFERENCES `hotel` (`hot_id`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`hot_sta_id`) REFERENCES `station` (`sta_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`res_cha_id`) REFERENCES `chambre` (`cha_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`res_cli_id`) REFERENCES `client` (`cli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
