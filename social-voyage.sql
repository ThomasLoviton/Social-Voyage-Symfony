-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 09 fév. 2019 à 19:18
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `social-voyage`
--
DROP DATABASE IF EXISTS `social-voyage`;
CREATE DATABASE IF NOT EXISTS `social-voyage` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `social-voyage`;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpost` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `postedat` datetime NOT NULL,
  `numberlike` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `idpost`, `text`, `author`, `postedat`, `numberlike`) VALUES
(1, 2, 'TestComment', 'Test', '2019-02-08 20:08:45', 0),
(2, 2, 'TestComment', 'Test', '2019-02-08 20:08:45', 1),
(3, 2, 'TestComment', 'Test', '2019-02-08 20:08:45', 0),
(4, 1, 'TestComment', 'Test', '2019-02-08 20:09:27', 0),
(5, 2, 'TestComment', 'Test', '2019-02-08 20:09:27', 1),
(6, 1, 'TestComment', 'Test', '2019-02-08 20:09:27', 0),
(7, 1, 'TestComment', 'Test', '2019-02-08 20:09:27', 0),
(8, 2, 'Testwo', 'Test1', '2019-02-08 23:51:27', 0),
(9, 1, 'Testwow', 'Test1', '2019-02-08 23:51:50', 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `shorttext` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `urlimage` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL,
  `numberlike` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `shorttext`, `text`, `author`, `urlimage`, `createdat`, `updatedat`, `numberlike`) VALUES
(1, 'Test1', 'Test1', 'Test1', 'Test1', 'Test1', '2019-02-06 15:34:15', '2019-02-06 22:22:39', 0),
(2, 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', '2019-02-06 15:34:15', '2019-02-06 15:34:15', 3),
(3, 'Test3', 'Test3', 'Test3', 'Test3', 'Test3', '2019-02-09 00:57:25', '2019-02-09 00:57:25', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
