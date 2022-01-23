-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 jan. 2022 à 14:37
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shopnow`
--

-- --------------------------------------------------------

--
-- Structure de la table `shopnowdb`
--

CREATE TABLE `shopnowdb` (
  `Ref` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` enum('','rings','bracelets','necklaces') NOT NULL,
  `Material` enum('------------','silver','gold','platinum','diamond') NOT NULL,
  `Size` enum('------------','4','5','7') NOT NULL,
  `Price` int(20) NOT NULL,
  `Stock` int(10) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `shopnowdb`
--

INSERT INTO `shopnowdb` (`Ref`, `Name`, `Category`, `Material`, `Size`, `Price`, `Stock`, `img`) VALUES
(1, 'hello', 'rings', 'gold', '5', 20, 13, ''),
(2, 'channel', 'rings', 'platinum', '5', 30, 53, ''),
(3, 'blue diamond', 'necklaces', 'diamond', '', 400, 5, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `shopnowdb`
--
ALTER TABLE `shopnowdb`
  ADD PRIMARY KEY (`Ref`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `shopnowdb`
--
ALTER TABLE `shopnowdb`
  MODIFY `Ref` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
