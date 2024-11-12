-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 12 nov. 2024 à 16:40
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `ida` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `mail` varchar(100) CHARACTER SET utf32 NOT NULL,
  `produit` varchar(200) CHARACTER SET utf8mb3 NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb3 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `categorie` varchar(50) CHARACTER SET utf8mb3 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ida`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`ida`, `idu`, `mail`, `produit`, `prix`, `description`, `photo`, `categorie`, `date`) VALUES
(1, 0, '1', 'hehe', 0, 'hehehe', '', 'Console/Jeux Video', '2023-02-04 22:00:41'),
(16, 3, 'coman@psg.but', 'Maillot du PSG ', 175, 'teste', 'maillotpsg.png', 'Sport', '2023-02-18 18:14:06'),
(6, 1, 'yakoubasow13@gmail.com', 'Maillot du Barca', 195, 'Maillot du barca porter par le grand Luuk DE JONG', 'barca.jpg', 'Sport', '2023-02-18 15:52:45'),
(7, 1, 'yakoubasow13@gmail.com', 'Maillot du REAL', 35, 'Maillot du real porter par le grand Eden HAZARD', 'real.jpg', 'Sport', '2023-02-18 15:02:25'),
(14, 1, 'yakoubasow13@gmail.com', 'Maillot du PSG ', 175, 'Maillot du psg porter par le grand Pauleta ', 'psgpauleta.jpg', 'Sport', '2023-02-18 17:30:19'),
(17, 1, 'yakoubasow13@gmail.com', 'Figurine Zamasu', 30, 'Vend figurine zamasu', 'zamasu.jpg', 'Figurine/Jouet', '2023-02-18 21:31:00'),
(15, 2, 'ansufati@barca.com', 'Lambo', 600000, 'Ca bombarde chef ', 'lambo.webp', 'Vehicule', '2023-02-18 18:09:27'),
(10, 4, 'teste', 'teste', 0, 'teste', '', 'Telephone', '2023-02-16 10:05:10'),
(12, 4, 'teste', 'teste', 4, 'teste', '', 'Informatique', '2023-02-16 10:22:58'),
(13, 1, 'yakoubasow13@gmail.com', 'Jet privÃ©', 600000, 'Un avion privÃ© pour ce dÃ©placer ou on le souhaite quand on veut ', 'jet privÃ©.jpg', 'Vehicule', '2023-02-18 15:50:54'),
(18, 1, 'yakoubasow13@gmail.com', 'PS5', 500, 'Le gaming', 'ps5.webp', 'Console/Jeux Video', '2023-02-18 21:08:41'),
(19, 1, 'yakoubasow13@gmail.com', 'PC GAMER', 750, 'Le meilleure PC du moment ', 'pc gamer.jpg', 'Informatique', '2023-02-18 21:38:13'),
(20, 1, 'yakoubasow13@gmail.com', 'Iphone', 450, 'Iphone de chez ipple tout neuf ', 'iphone.png', 'Telephone', '2023-02-18 21:43:30');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idf` int(11) NOT NULL AUTO_INCREMENT,
  `ida` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`idf`, `ida`, `idu`) VALUES
(1, 0, 0),
(7, 6, 1),
(6, 14, 1),
(11, 17, 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `message` varchar(250) CHARACTER SET utf8mb3 NOT NULL,
  `date` datetime NOT NULL,
  `destinataire` varchar(50) CHARACTER SET utf8mb3 DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idm`, `idu`, `mail`, `message`, `date`, `destinataire`) VALUES
(1, 0, 'test', 'test', '2023-02-16 10:10:07', 'yakoubasow13@gmail.com'),
(2, 1, 'yakoubasow13@gmail.com', 'bonsoir', '2023-02-16 11:24:03', 'teste'),
(3, 1, 'yakoubasow13@gmail.com', 'salam bg', '2023-02-16 11:39:53', 'coman@psg.but'),
(4, 3, 'coman@psg.but', 'salam que veut tu', '2023-02-16 11:40:30', 'yakoubasow13@gmail.com'),
(5, 1, 'yakoubasow13@gmail.com', 'bonsoir', '2023-02-18 18:00:11', 'rafale');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb3 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb3 NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb3 NOT NULL,
  `avatar` varchar(100) DEFAULT 'defaut.png',
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idu`, `nom`, `prenom`, `mail`, `mdp`, `avatar`) VALUES
(1, 'SOW', 'Yakouba', 'yakoubasow13@gmail.com', 'Mars2002', 'law.webp'),
(2, 'FATI', 'Ansu', 'ansufati@barca.com', 'fati', 'defaut.png'),
(3, 'COMAN', 'Kingsley', 'coman@psg.but', 'coman', 'coman.jpeg'),
(4, 'teste', 'teste', 'teste', 'teste', 'defaut.png'),
(5, 'BENZEMA', 'Karim', 'kb9@real.com', 'benzema', 'Karim-Benzema.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
