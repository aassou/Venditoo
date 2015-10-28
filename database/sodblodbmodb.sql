
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 09 Décembre 2013 à 06:33
-- Version du serveur: 5.1.69
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u997572439_solo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datePublication` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `prix` decimal(12,2) DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abuse` int(11) DEFAULT NULL,
  `vendu` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idutilisateur` (`idUtilisateur`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=151 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `description`, `image`, `image2`, `image3`, `datePublication`, `priority`, `prix`, `ville`, `abuse`, `vendu`, `idUtilisateur`, `idCategorie`) VALUES
(1, 'cam', 'test cam', '../view//themes/solomoimg/1.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-02', 2, '1500.00', 'nador', 1, 'non', 1, 1),
(2, 'cam', 'sony cam', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-02', 3, '850.00', '', 0, 'non', 1, 1),
(3, 'smartphone', 'galaxy s4', '../view/themes/solomoimg/3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-02', 4, '4850.00', '', 0, 'non', 2, 3),
(4, 'smartphone', 'sony xperia z', '../view/themes/solomoimg/4.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-02', 1, '7050.00', '', 0, 'non', 2, 3),
(5, 'smartphone', 'sony xperia z', '../view/themes/solomoimg/5.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '7050.00', '', 0, 'non', 2, 3),
(6, 'smartphone', 'sony xperia z', '../view/themes/solomoimg/6.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '7050.00', '', 0, 'non', 2, 3),
(7, 'smartphone', 'galaxy s2', '../view/themes/solomoimg/7.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '1500.00', '', 0, 'non', 2, 3),
(8, 'smartphone', 'htc one', '../view/themes/solomoimg/8.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '3500.00', '', 0, 'non', 2, 3),
(9, 'console game', 'playstation 4', '../view/themes/solomoimg/9.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '5500.00', '', 0, 'non', 2, 24),
(10, 'console game', 'xbox 360', '../view/themes/solomoimg/10.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 3, '6230.00', '', 0, 'non', 2, 24),
(11, 'auto', 'audi 4', '../view/themes/solomoimg/11.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '77050.00', '', 0, 'non', 3, 20),
(12, 'moto', 'ducatti', '../view/themes/solomoimg/12.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '177050.00', '', 0, 'non', 3, 21),
(13, 'immo', 'appartement', '../view/themes/solomoimg/13.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '5000000.00', '', 0, 'non', 3, 12),
(14, 'vetement', 'montau sfera', '../view/themes/solomoimg/b1.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 2, '750.00', '', 0, 'non', 3, 5),
(15, 'parfums', 'lacoste', '../view/themes/solomoimg/b2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-09-30', 1, '550.00', '', 0, 'non', 3, 17),
(16, 'gateaux', 'delicieux', '../view/themes/solomoimg/b3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-01', 2, '160.00', '', 0, 'non', 1, 1),
(17, 'testahhh', 'wkaka', '../view/themes/solomoimg/1.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-08-11', 1, '120.00', '', 0, 'non', 1, 1),
(21, 'mercedes c class', 'new car 2009 germany', '../view/themes/solomoimg/b4.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-07', 14, '7000.00', '', 0, 'non', 1, 20),
(23, 'lenovo thinkpad', 'pc ibm jdid', '../view/themes/solomoimg/b3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-07', 11, '8000.00', '', 0, 'non', 1, NULL),
(40, 'to', 'hihi', '../view/themes/solomoimg/b3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-08', 10, '150.00', '', 0, 'non', 2, 6),
(41, 'to', 'hihi', '../view/themes/solomoimg/b3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-08', 10, '150.00', '', 0, 'non', 2, 6),
(45, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:37:00', 1, '10000000.00', '', 0, 'non', 1, 23),
(46, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:51:21', 1, '10000000.00', '', 0, 'non', 1, 23),
(47, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:51:28', 1, '10000000.00', '', 0, 'non', 1, 23),
(48, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:52:07', 1, '10000000.00', '', 0, 'non', 1, 23),
(49, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:52:34', 1, '10000000.00', '', 0, 'non', 1, 23),
(50, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:52:52', 1, '10000000.00', '', 0, 'non', 1, 23),
(51, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:53:11', 1, '10000000.00', '', 0, 'non', 1, 23),
(52, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:53:46', 1, '10000000.00', '', 0, 'non', 1, 23),
(53, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:54:00', 1, '10000000.00', '', 0, 'non', 1, 23),
(54, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:54:10', 1, '10000000.00', '', 0, 'non', 1, 23),
(56, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:55:18', 1, '10000000.00', '', 0, 'non', 1, 23),
(57, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:55:29', 1, '10000000.00', '', 0, 'non', 1, 23),
(58, 'lamborghini', 'hahohi', '../view/themes/solomoimg/2.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 00:55:38', 1, '10000000.00', '', 0, 'non', 1, 23),
(59, 'hohoho', 'lalalalal', '../view/themes/solomoimg/5.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-10 01:02:03', 1, '12000.00', '', 0, 'non', 6, 23),
(61, 'tikchbila', 'tiwliwla makhlawni matal9oni', '../view/themes/solomoimg/images.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-11 15:11:43', 1, '250.00', '', 0, 'non', 1, 23),
(63, 'teston', 'themksdkjfs', '../view/themes/solomoimg/Readme.png', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 20:54:53', 1, '200.00', '', 0, 'non', 1, 23),
(66, 'frr', 'trr', '../view/themes/solomoimg/moti.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 22:11:32', 1, '200.00', '', 0, 'non', 1, 3),
(67, 'gthy', 'juhy', '../view/themes/solomoimg/companies.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 22:15:02', 1, '452.00', '', 0, 'non', 1, 3),
(68, 'gthy', 'juhy', '../view/themes/solomoimg/companies.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 22:17:46', 2, '452.00', '', 1, 'non', 1, 3),
(70, 'vrrr', 'vara', '../view/themes/solomoimg/challenge5.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 22:21:53', 1, '4900.00', '', 0, 'non', 1, 3),
(71, 'iwa ', 'iwa safi', '../view/themes/solomoimg/challenge4.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-14 22:29:16', 1, '100.00', '', 0, 'non', 1, 3),
(72, 'samsung galaxu', 'telefon jdid galaxy s4', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 14:29:02', 1, '4500.00', '', 0, 'non', 1, 3),
(73, 'xbox 360', 'console xbox wa3ra jdida ', '../view/themes/solomoimg/xbox.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 15:04:02', 2, '3600.00', '', 0, 'non', 1, 24),
(74, 'playstation 3', 'console playstation 3 neuf', '../view/themes/solomoimg/play.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 15:06:36', 1, '3000.00', '', 0, 'non', 1, 24),
(75, 'playstation 3', 'console playstation 3 neuf', '../view/themes/solomoimg/play.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 15:08:35', 1, '3000.00', '', 0, 'non', 1, 24),
(76, 'trifo', 'jalaxy', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 23:37:53', 1, '100.00', '', 0, 'non', 1, 24),
(77, 'trifo', 'console playstation 3 neuf', '../view/themes/solomoimg/play.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-15 23:41:02', 1, '100.00', '', 0, 'non', 1, 24),
(80, 'chefchaf', 'hahtitotinnn', '../view/themes/solomoimg/xbox.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-19 11:26:36', 1, '120.00', '', 0, 'non', 1, 24),
(81, 'chefchaf', 'hahtitotinnn', '../view/themes/solomoimg/xbox.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-19 11:27:08', 1, '120.00', '', 0, 'non', 1, 24),
(89, 'lol', 'mdr', '../view/themes/solomoimg/play.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-21 13:58:21', 1, '1.00', '', 0, 'non', 1, 4),
(90, 'mino', 'ra', '../view/themes/solomoimg/test.png', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-21 13:59:33', 1, '5.00', '', 0, 'non', 1, 4),
(91, 'lol', 'ra', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-21 14:06:15', 1, '5.00', '', 0, 'non', 1, 4),
(104, 'animation', 'up the movie', '../view/themes/solomoimg/thumb3.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-26 04:09:41', 1, '150.00', 'Nador', 0, 'non', 1, 4),
(106, 'testoff', 'teston', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-28 14:08:58', 1, '1200.00', '', 0, 'non', 1, 20),
(109, 'ze3ze3', 'demdem', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-28 14:14:29', 1, '20.00', '', 0, 'non', 12, 20),
(110, 'ahlan', 'wa sahlan', '../view/themes/solomoimg/galaxy.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-28 14:17:13', 1, '124.00', '', 0, 'non', 12, 20),
(111, 'lkhir', 'lkhir o lkhmir', '../view/themes/solomoimg/moti.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-28 14:48:07', 1, '1200.00', '', 0, 'non', 13, 20),
(112, 'audi a4', 'nouvelle voiture', '../view/themes/solomoimg/audi.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-10-29 11:14:42', 2, '150000.00', '', 0, 'non', 14, 20),
(123, 'moulinette', 'moulinette moulinex neuf', '../view/themes/solomoimg/moulinex.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-06 14:50:21', 1, '450.00', '', 0, 'non', 16, 27),
(134, 'ps', 'ps4', '../view/themes/solomoimg/play.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-09 15:14:44', 2, '900.00', '', 0, 'non', 26, 24),
(136, 'villa 1000m2', 'villa de luxe', '../view/themes/solomoimg/villa.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-11 23:44:51', 2, '25102510.00', 'Beni Ansar', 0, 'non', 27, 13),
(137, 'veste', 'veste zara', '../view/themes/solomoimg/veste.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-18 16:15:32', 3, '800.00', 'Nador', 0, 'non', 1, 5),
(140, 'pc', 'dell alienware', '../view/themes/solomoimg/test.jpg', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-20 15:35:59', 2, '9000.00', 'Nador', 0, 'non', 1, 2),
(141, 'pc', 'dell alienware', '../view/themes/solomoimg/test.jpg528cd730ec48a', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-11-20 15:37:20', 1, '8500.00', 'Nador', 0, 'oui', 1, 2),
(142, 'zara chaussures', 'chaussures zara neuf bleu', '../view/themes/solomoimg/Zara-Boys-Shoes.jpg529c7380da60a', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-02 11:48:16', 1, '350.00', 'Nador', NULL, NULL, 1, 7),
(143, 'chaussures', 'chaussures', '../view/themes/solomoimg/Zara-Boys-Shoes.jpg529cb0c183f55', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-02 16:09:37', 1, '200.00', 'Nador', NULL, NULL, 37, 10),
(145, 'sandales', 'sandales femme neuf', '../view/themes/solomoimg/sandales-sergio-rossi.jpg529d080b07c23', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-02 22:22:03', 1, '300.00', 'Nador', NULL, NULL, 38, 9),
(146, 'sandales', 'sandales femme neuf', '../view/themes/solomoimg/sandales-sergio-rossi.jpg529d08e42f801', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-02 22:25:40', 1, '330.00', 'Nador', 2, 'non', 38, 9),
(147, 'appartement selaoun', 'appartement neuf 3 chambres 1 salle à manger ', '../view/themes/solomoimg/1329978409-12351.jpeg529ddfa76e6e8', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-03 08:41:59', 1, '5000.00', 'Nador', 1, 'non', 39, 12),
(148, 'ducati motor', 'motor ducati jdid', '../view/themes/solomoimg/Ducati-Monster-1100-custom-.jpg529dfcee916d6', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-03 10:46:54', 3, '150000.00', 'Al Aaroui', 1, 'non', 40, 21),
(149, 'ray ben', 'neuf lunnettes de ray ben ', '../view/themes/solomoimg/jackie_2.jpg529e0dea69fd9', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-03 11:59:22', 1, '250.00', 'Nador', 0, 'non', 41, 30),
(150, 'robe', 'robe fille 12 ans', '../view/themes/solomoimg/mois-fille-hiver-robe-velour-euros-img.jpg529f30c97acc7', '../view/themes/images/logo_bootshop.png', '../view/themes/images/logo_bootshop.png', '2013-12-04 08:40:25', 1, '200.00', 'Nador', 0, 'non', 42, 7);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `detail`) VALUES
(1, 'technologie', 'camera'),
(2, 'technologie', 'informatique'),
(3, 'technologie', 'telefon'),
(4, 'technologie', 'audiovideo'),
(5, 'vetement', 'vetementhomme'),
(6, 'vetement', 'vetementfemme'),
(7, 'vetement', 'vetementenfant'),
(8, 'vetement', 'chaussurehomme'),
(9, 'vetement', 'chaussurefemme'),
(10, 'vetement', 'chaussureenfant'),
(11, 'immobilier', 'maison'),
(12, 'immobilier', 'appartement'),
(13, 'immobilier', 'villa'),
(14, 'immobilier', 'terrain'),
(15, 'immobilier', 'colocation'),
(16, 'immobilier', 'boutique'),
(17, 'santebeaute', 'parfum'),
(18, 'santebeaute', 'cosmetic'),
(19, 'santebeaute', 'paramedical'),
(20, 'automoto', 'voiture'),
(21, 'automoto', 'moto'),
(22, 'automoto', 'vehiculepro'),
(23, 'automoto', 'pieces'),
(24, 'technologie', 'jeux'),
(25, 'immobilier', 'location_vacance'),
(26, 'automoto', 'bateaux'),
(27, 'maisonjardins', 'electromenager'),
(28, 'maisonjardins', 'meubleinterieur'),
(29, 'maisonjardins', 'accessoires'),
(30, 'vetement', 'montrelunnettes'),
(31, 'vetement', 'bijouxaccessoire'),
(32, 'emploiservice', 'offreemploi'),
(33, 'emploiservice', 'demandeemploi'),
(34, 'emploiservice', 'services'),
(35, 'emploiservice', 'cours'),
(36, 'emploiservice', 'materielpro'),
(37, 'emploiservice', 'bricolage');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `date_derniere_visite` datetime DEFAULT NULL,
  `cle` varchar(32) DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telefon`, `ville`, `email`, `password`, `image`, `date_inscription`, `date_derniere_visite`, `cle`, `actif`) VALUES
(1, 'aassou', 'abdelilah', '0613064330', 'Sélouane', 'aassou.abdelilah@gmail.com', 'bf3f3a85146d4b4f6d497b320f9bbeff7f52e94c', '../view/themes/solomoimg/DSC00777.JPG52a1f367be38c', '0000-00-00 00:00:00', '2013-11-20 14:31:56', NULL, 1),
(2, 'aassou', 'mouaad', '0662132666', 'nador', 'aassou.mouaad@gmail.com', '5a478022f33905d2d40410e006fb1aa8564b280c', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(3, 'aassou', 'mohamed', '0668104890', 'nador', 'aassou.mohamed@gmail.com', '6c4bfb47164b256f5ffa2bc96ec2fd033914ad31', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(4, 'taril', NULL, NULL, NULL, 'taril.afandi@gmail.com', '084c9f01132d4a7c8cd3c2804ed381203843b53e', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(5, 'mohamed', NULL, NULL, NULL, 'myrmidons90210@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(6, 'lolo', NULL, NULL, NULL, 'lolo@lolo.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(7, 'android', NULL, NULL, NULL, 'and@and.com', 'e4bbe5b7a4c1eb55652965aee885dd59bd2ee7f4', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(8, 'jawad', NULL, NULL, NULL, 'jawad@gmail.com', '56a3d97d70a9e7bf1a12ca0db25191308d53b6e6', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(9, 'jalil', NULL, NULL, NULL, 'jalil@gmail.com', 'a7d2abb1004b28885e7fcb5fca0b5266628214c8', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(10, 'delal', 'delal', '0613064330', 'nador', 'delal@gmail.com', 'e7457d7767f6406ec0b8448d6a8fb59bc87a5331', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(11, 'salam', 'vide', 'vide', 'vide', 'salam@gmail.com', '18ae4dd1e3db1d49a738226169e3b099325c79a0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(12, 'vide', 'vide', 'vide', 'vide', 'talal@gmail.com', '79c43def25683041580c816b70cadfdbcea62179', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(13, 'vide', 'vide', 'vide', 'vide', 'hami@gmail.com', 'e5c4f933a178cd626655c7715ac38cde59f1efe3', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(14, 'vide', 'vide', 'vide', 'vide', 'akram@gmail.com', 'c58933beb6ab44b5308f094136fde9795ce7d652', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(16, 'vide', 'vide', 'vide', 'vide', 'sahit@gmail.com', '66f78e68948e40befe0727c43e51820e02aac5ee', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(22, 'vide', 'vide', 'vide', 'vide', 'selam@gmail.com', '529fb4f2f0682e0d73e2486bc89e2822cec79699', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(26, 'vide', 'vide', 'vide', 'vide', 'zahir@gmail.com', '198a47e3ce195b27fa2b2174b696a7fdd6dd1a61', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(27, 'hanan', 'vide', 'vide', 'vide', 'hanan@gmail.com', '1f02707a142d8d10b265d4d613efa194212c1cc8', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(31, 'mimon', 'vide', 'vide', 'vide', 'mimon@gmail.com', '29a020deedb9be105f53cf012312c2b06955091b', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(32, 'tifouri', 'vide', 'vide', 'vide', 'tifouri@gmail.com', '7ba6e0ed59f4c48e25248d2cac364e701e735658', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(33, 'zizi', 'vide', 'vide', 'vide', 'zizi', 'b3d8318435d8243ecc1976977cdc9de157200430', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(34, 'vide', 'vide', 'vide', 'vide', 'delah@gmail.com', 'c998cc2af4f38ef53cf07175c9a77d3706e1f0b2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(35, 'vide', 'vide', 'vide', 'vide', 'chihab@gmail.com', 'chihab', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(36, 'vide', 'vide', 'vide', 'vide', 'lolo@gmail.com', '8aa40001b9b39cb257fe646a561a80840c806c55', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(37, 'tahar', 'vide', 'vide', 'vide', 'tahar@gmail.com', '78003b7d68aefe217d91e40863967972b4d21db4', '../view/themes/solomoimg/test.png', '2013-12-02 13:42:30', '2013-12-02 13:42:30', NULL, 1),
(38, 'jamila', 'vide', '0613025541', 'vide', 'jamila@live.fr', 'e9c32b7771adf33118453b6d82f85b52f8b53260', '../view/themes/solomoimg/test.png', '2013-12-02 15:43:53', '0000-00-00 00:00:00', NULL, 1),
(39, 'chafik', 'vide', '0612554299', 'vide', 'chafik@hotmail.com', 'e49fd3b952107e228e2710b116b01b2d45591637', '../view/themes/solomoimg/test.png', '2013-12-03 08:24:50', '0000-00-00 00:00:00', NULL, 1),
(40, 'vide', 'vide', 'vide', 'vide', 'user@new.com', '12dea96fec20593566ab75692c9949596833adc9', '../view/themes/images/logo_bootshop.png', '2013-12-03 10:46:54', '2013-12-03 10:46:54', NULL, 1),
(41, 'salima', 'salimax', '0613065542', 'Nador', 'salima@gmail.com', 'd6ca7b1d564715fcf8515bb36ac92da95281e938', '../view/themes/solomoimg/971962_588812547846872_1309027282_n.png529e085109d4e', '2013-12-03 11:32:58', '0000-00-00 00:00:00', NULL, 1),
(42, 'vide', 'vide', 'vide', 'vide', 'amena@live.fr', 'c71579408e53b19c1995f97820d054ab0dbd0281', '../view/themes/images/logo_bootshop.png', '2013-12-04 08:40:25', '2013-12-04 08:40:25', NULL, 1),
(43, 'salsal', 'vide', '34545665', 'vide', 'salsal@live.fr', '4a86cc739cd9ac2c21b62659caa2469047cd6d2c', '/marocmart_mvc/view/themes/solomoimg/test.png', '2013-12-04 14:40:26', '0000-00-00 00:00:00', '6c72466fb22aeafbd1657448c5de7c63', 0),
(44, 'rifi', 'vide', '09890000', 'vide', 'rif_affaire@hotmail.fr', '93701c99f75cd8875b242b9a6905070fc322b0d7', '/marocmart_mvc/view/themes/solomoimg/test.png', '2013-12-04 14:45:45', '0000-00-00 00:00:00', '697d5ee8a281e22919560bf6777ee75a', 1),
(45, 'med', 'vide', '066644667', 'Nador', 'kormos90210@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '../view/themes/solomoimg/a.png529f8a0cdca8c', '2013-12-04 14:56:19', '0000-00-00 00:00:00', '9f44cefff57310ac7df7fa049c4b9cbe', 1),
(46, 'tech', 'vide', '568768099', 'vide', 'tech2esto@gmail.com', 'c95ee47689a0aaec70c3eb950244657722c69b1f', '/marocmart_mvc/view/themes/solomoimg/test.png', '2013-12-04 15:12:55', '0000-00-00 00:00:00', '7756cbdada58f3420e9770ec3dca4d22', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
