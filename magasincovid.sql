-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 26 juin 2020 à 10:06
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magasincovid`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `contact_nom` varchar(100) NOT NULL,
  `contact_prenom` varchar(100) NOT NULL,
  `contact_textarea` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_mail` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `contact_nom`, `contact_prenom`, `contact_textarea`, `date`, `contact_mail`) VALUES
(11, 'Vincent', 'Nguyen', ' superbes articles, par contre je trouve que ça manque de rouge', '2020-06-24 06:54:22', 'vincentn@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) NOT NULL,
  `fiche_technique` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `fiche_technique`, `prix`, `image`) VALUES
(36, 'Petit manteau pour chien ', 'chapeau pour pépère', 40, 'uploads/manteau-chien-recuptex-bucas-2_1.jpg'),
(39, 'Petit manteau pour chien', ' Un petit chapeau pour pépère', 40, 'uploads/manteau-chien-recuptex-bucas-2_1.jpg'),
(40, 'Petit manteau pour chien', ' Un petit chapeau pour pépère', 40, 'uploads/manteau-chien-recuptex-bucas-2_1.jpg'),
(44, 'manteau pour chien ', 'chapeau pour pépère', 125, 'uploads/kimono-habits-vetement-chien-chiot-chat-pyjamas-po.jpg'),
(45, 'coucou', 'Un petit chapeau pour pépère', 70, 'uploads/chien_habits-fb-594787141df6a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `roll` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `mdp`, `roll`) VALUES
(13, 'Bescont', '$2y$10$uEindym5xWHpD8IeNWVgX.8Fk6AEpbwqBkNytoJu5Qr7ukMsNEv9O', 'user'),
(14, 'Gwendal', '$2y$10$k925WxHGQKOdoHbsWygvzOd0wbHOkp0HQMRZpvZ.NCYgYvkbijquq', 'admin'),
(15, 'Gwendal', '$2y$10$FcWhUYhK9KoKSpetkacUUuLPwqKDmdl9cf709oD0cx1tDiuVyqx.e', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
