-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 27 mars 2020 à 08:18
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `entreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE `agences` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `restauration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom`, `adresse`, `cp`, `ville`, `restauration`) VALUES
(1, 'Tous risques', '4 avenue de la dernière chance du dernier moment', 59200, 'Tourcoing', 'restaurant'),
(2, 'Et', '25 rue de héééééééééé', 60170, 'Hay', 'tickets'),
(3, 'WOOHP', '25 rue des totally spies', 80000, 'Amiens', 'restaurant'),
(4, '148', '2 Rue du Dahomey', 75011, 'Paris', 'restaurant');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `salaire` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `numeroAgence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `dateEmbauche`, `fonction`, `salaire`, `service`, `numeroAgence`) VALUES
(1, 'L\'ÉPONGE', 'Bob', '1997-01-02', 'hacker junior', 40, 'informatique', 1),
(2, 'LE LOUCHE', 'Jean', '1990-08-30', 'hacker sénior', 85, 'informatique', 1),
(3, 'BOQUET', 'William', '1944-06-18', 'Directeur', 125, 'Bureau', 2),
(4, 'KINGUE', 'Claude', '1989-08-06', 'Vice-Directeur', 126, 'Commercial', 3),
(5, 'MUHAMMAD', 'Salma', '2020-03-24', 'Secrétaire', 220, 'Secrétariat', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numeroAgence` (`numeroAgence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agences`
--
ALTER TABLE `agences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`numeroAgence`) REFERENCES `agences` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
