-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 sep. 2020 à 04:01
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `autoverte`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `login` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`login`, `password`) VALUES
('admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structure de la table `auto`
--

CREATE TABLE `auto` (
  `noserie` varchar(30) NOT NULL,
  `marque` varchar(30) NOT NULL,
  `modele` varchar(30) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auto`
--

INSERT INTO `auto` (`noserie`, `marque`, `modele`, `disponible`, `prix`, `photo`) VALUES
('no1', 'BMWoo', 'A1', 1, '23000', 'auto7.png'),
('no2', 'Lexus', 'GT', 0, '340000', 'auto14.png'),
('no3', 'Lambo', 'Couper', 0, '3000000', 'auto15.png'),
('no4', 'BMW', 'gt55', 1, '45999', 'auto11.png'),
('no5', 'audi', 'A1', 0, '2000000', 'auto10.png'),
('no6', 'Porshe', '911', 0, '760000', 'auto8.png');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `code` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `login` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`code`, `prenom`, `nom`, `email`, `telephone`, `login`, `password`) VALUES
('FIKMb', 'Mbappe', 'FIKARA', 'jadsancoutlook.com', '514-2982455', '525298336f32b2571f53ce0a7c9bfc8b0fb4e709', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('JadSa', 'Sanchoooooo', 'Jadon', 'jadsancho@outlook.com', '438-983-2340', 'jade', '5bd60faed1f7da6d22ded94991a54cd0361e68cb'),
('kexph', 'phil', 'kexak', 'fikarabilal@outlook.com', '4385202778', '12dea96fec20593566ab75692c9949596833adc9', '02c593fd9af8254b859d426a76b6cd42847fbec1'),
('KilMb', 'Mbappeeee', 'Kilian', 'kiki@gmail.com', '514-984-3421', 'kiki', 'b803fae675b5bc3450c8050139aac4e6c0e0c717'),
('OziMe', 'Mesut', 'Ozil', 'mesut@outlook.com', '450-675-3222', 'ozil', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('TomAb', 'Abraham', 'Tommy', 'tommy@gmail.com', '438-983-2340', 'tom', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `code` varchar(40) NOT NULL,
  `noserie` varchar(30) NOT NULL,
  `datelocation` date NOT NULL,
  `dateretour` date NOT NULL,
  `prixlocation` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`code`, `noserie`, `datelocation`, `dateretour`, `prixlocation`) VALUES
('JadSa', 'no1', '2019-11-28', '0000-00-00', '120000'),
('JadSa', 'no4', '2019-11-30', '2019-12-02', '78000'),
('OziMe', 'no3', '2019-11-29', '2019-12-16', '5600000'),
('TomAb', 'no3', '2019-12-17', '2019-12-20', '500000'),
('TomAb', 'no4', '2019-11-30', '0000-00-00', '67000'),
('TomAb', 'no6', '2019-11-29', '2019-12-15', '890000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`noserie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`code`,`noserie`,`datelocation`),
  ADD KEY `fk_noserie` (`noserie`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_code` FOREIGN KEY (`code`) REFERENCES `client` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_noserie` FOREIGN KEY (`noserie`) REFERENCES `auto` (`noserie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
