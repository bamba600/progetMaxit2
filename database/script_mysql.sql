-- phpMyAdmin SQL Dump -- version 5.2.1deb3
-- https://www.phpmyadmin.net/
-- Hôte : localhost:3306
-- Généré le : ven. 18 juil. 2025 à 11:22
-- Version du serveur : 8.0.42-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Encodage
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

-- Base de données : `maxit2`
-- --------------------------------------------------------

-- Structure de la table `compte`
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `solde` float DEFAULT NULL,
  `numeroCompte` varchar(30) NOT NULL,
  `type` enum('principal','secondaire') NOT NULL,
  `idUtilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=2;

-- Données pour la table `compte`
INSERT INTO `compte` (`id`, `date_creation`, `solde`, `numeroCompte`, `type`, `idUtilisateur`) VALUES
(1, '2025-07-15 19:41:23', 45837600, '777732762', 'principal', 1);

-- Structure de la table `transaction`
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('paiement','depot','retrait') NOT NULL,
  `idCompte` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCompte` (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=2;

-- Données pour la table `transaction`
INSERT INTO `transaction` (`id`, `montant`, `date`, `type`, `idCompte`) VALUES
(1, 3467440, '2025-07-15 19:41:23', 'depot', 1);

-- Structure de la table `typeUtilisateur`
CREATE TABLE IF NOT EXISTS `typeUtilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=2;

-- Données pour la table `typeUtilisateur`
INSERT INTO `typeUtilisateur` (`id`, `nom`) VALUES
(1, 'client');

-- Structure de la table `utilisateur`
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `numerotelephone` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `numeroidentite` varchar(50) NOT NULL,
  `photorecto` varchar(40) NOT NULL,
  `photoverso` varchar(40) NOT NULL,
  `idtypeutilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idTypeUtilisateur` (`idtypeutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=2;

-- Données pour la table `utilisateur`
INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `numerotelephone`, `login`, `password`, `numeroidentite`, `photorecto`, `photoverso`, `idtypeutilisateur`) VALUES
(1, 'Segnane', 'Thierno', '777732762', 'thiernosegnane316@gmail.com', 'passer', '349458284302443', 'photoRecto.jpeg', 'photoVerso.jpeg', 1);

-- Contraintes de clés étrangères
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idtypeutilisateur`) REFERENCES `typeUtilisateur` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

COMMIT;

-- Restauration des paramètres d'encodage
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
