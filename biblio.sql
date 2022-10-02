-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 02 oct. 2022 à 18:33
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `codeDoc` varchar(25) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `anneePub` int(11) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isbn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`codeDoc`, `titre`, `auteur`, `anneePub`, `categorie`, `type`, `genre`, `description`, `isbn`) VALUES
('doc1', 'Une si longue lettre', 'Mariama Ba', 2001, 'Roman', 'Enfant', 'Comédie', 'un roman interessant en modif', '245678'),
('doc2', 'Une si courte lettre', 'Seydou bodjan', 2000, 'Roman', 'Enfant', 'Comédie', 'zzzhhsh', '35555');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

CREATE TABLE `pret` (
  `id` int(11) NOT NULL,
  `codeMembre` varchar(250) NOT NULL,
  `codeDoc` varchar(250) NOT NULL,
  `dateRetour` date NOT NULL,
  `datePret` date NOT NULL,
  `retour` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`id`, `codeMembre`, `codeDoc`, `dateRetour`, `datePret`, `retour`) VALUES
(2, 'ilam', 'doc1', '2022-09-22', '2022-10-09', 1),
(5, 'fall', 'doc1', '2022-10-22', '2022-11-06', 1),
(6, 'fall', 'doc2', '2022-09-27', '2022-10-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `codeMembre` varchar(90) NOT NULL,
  `codeDoc` varchar(250) NOT NULL,
  `dateReserv` date NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `codeMembre`, `codeDoc`, `dateReserv`, `statut`) VALUES
(3, 'ilam', 'doc1', '2022-09-17', 1),
(4, 'fall', 'doc2', '2022-10-15', 1),
(5, 'fall', 'doc1', '2022-10-16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `code` varchar(90) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type` varchar(250) NOT NULL,
  `courriel` varchar(250) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`code`, `prenom`, `nom`, `adresse`, `type`, `courriel`, `tel`, `mdp`, `codePostal`, `ville`, `province`) VALUES
('1234', 'Cohorte', 'Un', 'parcelles assainies', 'admin', 'lespros@gmail.com', '778348484', '1234', '00000', 'Dakar', 'SENEGAL'),
('emp1', 'alioune', 'fall', 'Cambérène 2', 'employe', 'niang@gmail.com', '0778476462', '1234', '50225', 'Dakar', 'Dakar'),
('fall', 'alioune', 'fall', 'Cambérène 2', 'membre', 'fall@gmail.com', '0778476462', '1903', '50225', 'Dakar', 'Dakar'),
('ilam', 'Ilam', 'Mbaye', 'PAU25', 'membre', 'ilam@gmail.com', '778364664', '1234', '50225', 'DAKAR', 'Dakar');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`codeDoc`);

--
-- Index pour la table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codeMembre` (`codeMembre`),
  ADD KEY `codeDoc` (`codeDoc`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codeMembre` (`codeMembre`),
  ADD KEY `codeDoc` (`codeDoc`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pret`
--
ALTER TABLE `pret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_ibfk_1` FOREIGN KEY (`codeMembre`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pret_ibfk_2` FOREIGN KEY (`codeDoc`) REFERENCES `document` (`codeDoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`codeMembre`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`codeDoc`) REFERENCES `document` (`codeDoc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
