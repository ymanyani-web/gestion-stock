-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 09 sep. 2021 à 15:36
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_piece`
--

CREATE TABLE `categorie_piece` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_piece`
--

INSERT INTO `categorie_piece` (`id`, `nom`) VALUES
(1, 'cat1'),
(2, 'yui');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `cin` text NOT NULL,
  `numero` text NOT NULL,
  `adresse` text NOT NULL,
  `rib` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `cin`, `numero`, `adresse`, `rib`, `date`) VALUES
(1, 'Invite', '-', '0', '', '0', '2021-08-20 04:19:42'),
(2, 'tesstt21', 'we2222', '0', '', '1.234567891234568e23', '2021-09-05 15:52:46'),
(4, 'wewe', 'we2222', '0', '', '123456789123456789123456', '2021-09-05 15:52:37'),
(5, 'test333', 'we2222', '0', '', '123456789123456789123456', '2021-09-05 15:52:29'),
(6, 'yahya el bahi', 'WA286647', '0661407967', 'zoubida', '123456789012345678901234', '2021-08-31 12:44:28'),
(8, 'yazid manyani', 'WA275300', '0604038177', '12332 wfdkjnwef ', '123456789012345678901234', '2021-08-31 12:44:36'),
(9, 'test', 'we2323', '23232', 'qwewf', '123456789012345678901234', '2021-07-26 14:46:52'),
(10, 'test', 'we2323', '23232', 'qwewf', '123456789012345678901234', '2021-07-26 14:48:42'),
(12, 'bouchaib manyani', 'WB7064', '0668445410', 'tissir2', '1232', '2021-08-31 12:44:51'),
(13, 'yassine manyani', 'WA275299', '0603308733', '', '', '2021-09-05 13:41:40');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `telephone` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `telephone`, `adresse`, `ville`, `email`) VALUES
(1, 'fr1ee', '05448833777', 'wsefuh wefuh wef', 'berrechid', 'wfwef@22.22'),
(2, 'uyg ', '657657', 'htf ', 'berrechid', 'yr@yt.m'),
(3, 'wdwfef', '23232', 'wfef ewf wef', 'fewvf', 'frc@ef.d');

-- --------------------------------------------------------

--
-- Structure de la table `marque_piece`
--

CREATE TABLE `marque_piece` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque_piece`
--

INSERT INTO `marque_piece` (`id`, `nom`) VALUES
(1, 'marq1'),
(2, 'yuip'),
(3, 'testtt'),
(4, 'marq33');

-- --------------------------------------------------------

--
-- Structure de la table `marque_vehicule`
--

CREATE TABLE `marque_vehicule` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque_vehicule`
--

INSERT INTO `marque_vehicule` (`id`, `nom`) VALUES
(1, 'sam'),
(2, 'nnn'),
(3, 'teest');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `numero_facture` text NOT NULL,
  `clientId` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `montant` float NOT NULL,
  `sellerId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id`, `numero_facture`, `clientId`, `idProduit`, `quantite`, `montant`, `sellerId`, `date`) VALUES
(1, '1', 1, 1, 1, 100, 1, '2021-08-15 21:51:35'),
(2, '2', 1, 1, 1, 200, 1, '2021-08-15 21:59:46'),
(3, '3', 1, 9, 10, 3330, 1, '2021-08-15 22:09:59'),
(4, '4', 1, 9, 10, 3330, 1, '2021-08-15 22:10:27'),
(5, '4', 1, 10, 2, 888, 1, '2021-08-15 22:10:27'),
(6, '5', 1, 9, 10, 2997, 1, '2021-08-15 22:11:35'),
(7, '5', 1, 10, 2, 799.2, 1, '2021-08-15 22:11:35'),
(8, '6', 1, 9, 10, 2997, 1, '2021-08-15 22:12:31'),
(9, '6', 1, 10, 2, 799.2, 1, '2021-08-15 22:12:31'),
(10, '7', 1, 2, 1, 325, 1, '2021-08-18 04:05:48'),
(11, '7', 1, 3, 1, 344, 1, '2021-08-18 04:05:48'),
(12, '7', 1, 5, 1, 444, 1, '2021-08-18 04:05:48'),
(13, '7', 1, 9, 1, 293.04, 1, '2021-08-18 04:05:48'),
(14, '7', 1, 26, 10, 1760, 1, '2021-08-18 04:05:48'),
(15, '8', 1, 9, 2, 586.08, 1, '2021-08-20 04:17:52'),
(16, '8', 1, 12, 3, 1275, 1, '2021-08-20 04:17:52'),
(17, '8', 1, 18, 5, 1243.2, 1, '2021-08-20 04:17:52'),
(18, '9', 6, 9, 3, 979.02, 1, '2021-08-20 07:11:57'),
(19, '9', 6, 10, 2, 870.24, 1, '2021-08-20 07:11:57'),
(20, '10', 6, 9, 3, 979.02, 1, '2021-08-20 07:15:05'),
(21, '10', 6, 10, 2, 870.24, 1, '2021-08-20 07:15:05'),
(22, '11', 2, 3, 2, 688, 1, '2021-08-20 07:27:50'),
(23, '11', 2, 5, 1, 444, 1, '2021-08-20 07:27:50'),
(24, '11', 2, 15, 1, 344, 1, '2021-08-20 07:27:50'),
(25, '11', 2, 18, 5, 1998, 1, '2021-08-20 07:27:50'),
(26, '12', 2, 2, 1, 325, 1, '2021-08-20 07:31:14'),
(27, '13', 2, 2, 1, 325, 1, '2021-08-20 07:32:34'),
(28, '14', 7, 2, 1, 325, 2, '2021-08-20 07:36:39'),
(29, '15', 2, 2, 5, 1625, 1, '2021-08-20 19:44:34'),
(30, '16', 2, 2, 2, 650, 1, '2021-08-20 19:58:40'),
(31, '17', 2, 2, 2, 650, 1, '2021-08-20 20:00:42'),
(32, '18', 6, 2, 4, 1300, 1, '2021-08-20 20:40:16'),
(33, '18', 6, 5, 3, 1332, 1, '2021-08-20 20:40:16'),
(34, '19', 6, 2, 2, 650, 1, '2021-08-20 21:04:14'),
(35, '19', 6, 3, 1, 344, 1, '2021-08-20 21:04:14'),
(36, '20', 6, 3, 10, 3440, 1, '2021-08-20 22:30:37'),
(37, '21', 6, 13, 1, 44, 1, '2021-08-20 22:32:09'),
(38, '22', 12, 17, 5, 1498.5, 1, '2021-08-20 22:55:09'),
(39, '23', 6, 17, 5, 1498.5, 1, '2021-08-20 23:06:11'),
(40, '23', 6, 18, 3, 1318.68, 1, '2021-08-20 23:06:11'),
(41, '24', 7, 18, 5, 2175.6, 1, '2021-08-21 06:27:08'),
(42, '2021-25', 1, 2, 3, 877.5, 1, '2021-09-01 11:58:11'),
(44, '2021-26', 2, 2, 2, 643.5, 1, '2021-09-01 12:09:15'),
(45, '2021-27', 4, 3, 4, 1376, 1, '2021-09-04 00:00:32'),
(46, '2021-28', 13, 2, 5, 1462.5, 1, '2021-09-05 16:21:34'),
(47, '2021-28', 13, 15, 3, 1032, 1, '2021-09-05 16:21:34');

-- --------------------------------------------------------

--
-- Structure de la table `operation_tt`
--

CREATE TABLE `operation_tt` (
  `id` int(11) NOT NULL,
  `id_facture` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operation_tt`
--

INSERT INTO `operation_tt` (`id`, `id_facture`, `id_client`, `total`, `date`) VALUES
(1, '16', 2, 650, '2021-08-20 19:59:23'),
(2, '16', 2, 650, '2021-08-20 20:00:42'),
(3, '18', 6, 2632, '2021-08-20 20:40:16'),
(4, '19', 6, 994, '2021-08-20 21:04:14'),
(6, '21', 6, 44, '2021-08-20 22:32:09'),
(7, '22', 12, 1499, '2021-08-20 22:55:09'),
(8, '23', 6, 2817, '2021-08-20 23:06:11'),
(9, '24', 7, 2175.6, '2021-08-21 06:27:08'),
(10, '25', 1, 877.5, '2021-08-27 18:01:58'),
(11, '25', 1, 585, '2021-09-01 12:05:46'),
(12, '2021-26', 2, 643.5, '2021-09-01 12:09:15'),
(13, '2021-27', 4, 1376, '2021-09-04 00:00:32'),
(14, '2021-28', 13, 2494, '2021-09-05 16:21:34');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ref` text NOT NULL,
  `designation` text NOT NULL,
  `categorie_pieceId` int(11) NOT NULL,
  `marque_pieceId` int(11) NOT NULL,
  `marque_vehiculeId` int(11) NOT NULL,
  `image` text NOT NULL,
  `casier` text NOT NULL,
  `fournisseurId` int(11) NOT NULL,
  `pu_fournisseur` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `taux_remise` int(11) NOT NULL,
  `description` text NOT NULL,
  `seuil-min` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `ref`, `designation`, `categorie_pieceId`, `marque_pieceId`, `marque_vehiculeId`, `image`, `casier`, `fournisseurId`, `pu_fournisseur`, `pu`, `taux_remise`, `description`, `seuil-min`, `quantite`, `date`) VALUES
(2, '1223214', 'dfefdswq', 2, 1, 1, 'images/1223213-', '', 1, 0, 325, 10, '', 0, 10, '2021-07-08 00:02:12'),
(3, '123', 'tessst', 2, 0, 0, 'images/123-', '', 1, 0, 344, 0, '', 0, 30, '2021-08-08 00:41:56'),
(5, '321', 'weee', 1, 1, 1, 'images/321-', '', 1, 0, 500, 10, '', 0, 6, '2021-07-08 00:02:22'),
(6, '1234', 'yeee', 2, 0, 0, 'images/1234-Unknown.png', '', 1, 0, 345, 0, '', 0, 10, '2021-07-08 00:02:28'),
(7, '1234', '', 2, 0, 0, 'images/1234-Unknown.png', '', 1, 0, 345, 0, '', 0, 0, '2021-07-08 00:02:30'),
(8, '123456', 'wsgreb\r\nerg\r\nerg\r\nerg', 3, 0, 0, 'images/123456-1280px-PHP-logo.png', '', 1, 0, 444, 0, 'wsgreb\r\nerg\r\nerg\r\nerg', 0, 0, '2021-07-08 00:02:34'),
(9, 'ert333', 'ewfe wef', 1, 1, 1, 'er', 'reee', 1, 233, 333, 12, 'wrer\r\nwefef\r\neg', 0, -14, '2021-08-08 00:42:34'),
(10, '12ff', 'wewe', 1, 1, 1, 'sdf', 'sewe', 1, 233, 444, 12, 'wefwef', 0, -4, '2021-07-08 00:05:24'),
(12, 'wert234', 'dgf gf', 1, 1, 1, 'images/-Unknown.png', '23', 1, 200, 500, 15, 'wef\r\newrg\r\nergt\r\negr', 0, -12, '2021-07-08 00:10:52'),
(13, 'sefv', 'tesdui', 1, 1, 1, 'images/-JavaScript-Logo.png', '34', 1, 344, 44, 23, 'wer\r\newf\r\nefg\r\n', 0, 0, '2021-07-08 01:22:38'),
(14, 'jyg', 'yjnb', 2, 2, 2, 'images/-CSS3_logo_and_wordmark.png', '7', 2, 67, 99, 10, 'iohouh', 0, 0, '2021-07-08 06:04:27'),
(15, '123', 'tessst', 2, 0, 0, 'images/123-', '', 2, 0, 344, 0, '', 0, 13, '2021-08-08 00:41:56'),
(16, '12333', '123213', 1, 1, 1, 'images/-Unknown.png', '123', 1, 1233, 333, 12, '1232w', 0, 0, '2021-07-18 02:30:30'),
(17, '12333', '123213', 1, 1, 1, 'images/-Unknown.png', '123', 2, 1222, 333, 12, '1232w', 0, 10, '2021-07-18 02:30:30'),
(18, '4444', '4444', 1, 1, 1, 'images/-JavaScript-Logo.png', '44', 2, 444, 444, 44, '4444', 0, 82, '2021-07-18 02:38:44'),
(19, '2134', 'ewfew', 1, 2, 2, 'images/-thumb-1920-194702.jpg', 'wer', 1, 123, 1222, 21, 'wef\r\nwef\r\n', 0, 0, '2021-07-18 05:21:35'),
(20, '2134', 'ewfew', 1, 2, 2, 'images/-thumb-1920-194702.jpg', 'wer', 2, 32, 1222, 21, 'wef\r\nwef\r\n', 0, 0, '2021-07-18 05:21:35'),
(21, '324', 'tttt', 1, 1, 1, 'images/-1280px-PHP-logo.png', '214', 2, 24, 23, 23, '23', 0, 0, '2021-07-18 05:22:54'),
(22, 'etete', 'wefef', 1, 1, 1, 'images/-thumb-1920-194702.jpg', 'eee', 1, 33, 444, 12, 'wef\r\nwef\r\nfwf', 0, 0, '2021-07-30 13:59:37'),
(23, 'teeest', 'wdhwjf', 1, 1, 1, 'images/-thumb-1920-194702.jpg', 'w2', 1, 45, 44, 34, '34\r\n34', 0, 0, '2021-07-30 14:13:18'),
(24, 'AB2003', 'join', 2, 2, 1, 'images/-membres-ynov.jpg', 'AB02', 1, 100, 220, 28, 'tyut ', 0, 0, '2021-08-17 19:43:46'),
(25, 'AB2003', 'join', 2, 2, 2, 'images/-membres-ynov.jpg', 'AB02', 1, 100, 220, 25, 'tyut ', 0, 0, '2021-08-17 19:43:46'),
(26, 'AB2003', 'join', 2, 2, 3, 'images/-membres-ynov.jpg', 'AB02', 1, 100, 220, 25, 'tyut ', 0, 0, '2021-08-17 19:43:46'),
(27, 'WE222', 'vidange', 1, 1, 3, 'images/-1280px-PHP-logo.png', 'Z112', 3, 250, 500, 10, '-4', 0, 0, '2021-08-21 05:29:42'),
(28, 'RA68334', 'carwa', 1, 1, 2, 'images/-35-358536_html-css-js-bootstrap-hd-png-download-removebg-preview.png', 'G22', 2, 700, 1000, 15, 'ertcompatible a: -1-2', 0, 0, '2021-08-21 05:32:26'),
(29, 'er565', 'ergre', 1, 1, 1, 'images/-thumb-1920-194702.jpg', 'rty', 1, 77, 99, 2, '\nrytyu compatible a: -sam-nnn-teest', 0, 0, '2021-08-21 05:37:47'),
(30, 'ytu', 'jyg', 1, 1, 1, 'images/-JavaScript-Logo.png', 'tyui', 1, 6789, 7800, 20, '\ncompatible a: -sam-nnn-teest', 0, 0, '2021-08-21 05:38:41'),
(31, 'ER12', 'TEST sd', 1, 2, 2, 'images/-Sans titre.png', 'ET44', 4, 345, 44, 5, 'fyfhgjhk', 0, 0, '2021-08-22 08:03:14'),
(32, '2020', '2020', 2, 2, 1, 'images/-', '', 1, 234, 12345, 2344, '', 0, 0, '2021-08-22 08:03:51'),
(34, '2021', 'teas', 1, 2, 2, 'images/-', '', 2, 234, 24, 5, '', 0, 0, '2021-08-22 08:05:37'),
(38, 'ewr', 'sdf', 1, 1, 1, 'images/-', '122', 1, 22, 21, 2, '', 3, 0, '2021-08-31 13:00:51'),
(39, 'test', 'test', 1, 1, 1, 'images/-1280px-PHP-logo.png', 'Z', 1, 100, 250, 10, 'une descriprtion', 2, 0, '2021-09-01 12:20:41');

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

CREATE TABLE `reglements` (
  `id` int(11) NOT NULL,
  `id_facture` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `montant_d` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reglements`
--

INSERT INTO `reglements` (`id`, `id_facture`, `id_client`, `montant_d`, `date`) VALUES
(1, '18', 6, 500, '2021-08-20 20:40:16'),
(2, '19', 6, 394, '2021-08-20 21:04:14'),
(3, '18', 6, 10, '2021-08-20 22:07:14'),
(4, '18', 6, 1000, '2021-08-20 22:07:48'),
(5, '18', 6, 100, '2021-08-20 22:12:10'),
(6, '18', 6, 100, '2021-08-20 22:12:12'),
(7, '18', 6, 100, '2021-08-20 22:12:24'),
(8, '18', 6, 500, '2021-08-20 22:12:34'),
(9, '18', 6, 400, '2021-08-20 22:12:40'),
(10, '18', 6, -100, '2021-08-20 22:13:31'),
(11, '18', 6, 22, '2021-08-20 22:17:17'),
(12, '18', 6, -1300, '2021-08-20 22:18:35'),
(13, '18', 6, 1300, '2021-08-20 22:18:48'),
(15, '18', 6, -360, '2021-08-20 22:20:05'),
(16, '18', 6, 120, '2021-08-20 22:20:10'),
(17, '19', 6, 600, '2021-08-20 22:20:40'),
(18, '18', 6, 240, '2021-08-20 22:22:06'),
(19, '21', 6, 10, '2021-08-20 22:32:09'),
(20, '22', 12, 500, '2021-08-20 22:55:09'),
(21, '22', 12, 500, '2021-08-20 22:56:58'),
(22, '22', 12, 200, '2021-08-20 22:57:40'),
(23, '23', 6, 1000, '2021-08-20 23:06:11'),
(24, '23', 6, 500, '2021-08-20 23:07:04'),
(25, '23', 6, 500, '2021-08-20 23:08:00'),
(26, '24', 7, 1000, '2021-08-21 06:27:08'),
(27, '24', 7, 110, '2021-08-21 06:30:28'),
(28, '21', 6, 34, '2021-08-21 07:21:17'),
(29, '25', 1, 800, '2021-08-27 18:01:58'),
(30, '23', 6, 500, '2021-08-27 18:09:08'),
(31, '23', 6, 200, '2021-08-27 18:09:23'),
(32, '23', 6, 117, '2021-08-27 18:44:49'),
(33, '25', 1, 1000, '2021-09-01 12:05:46'),
(34, '2021-26', 2, 22, '2021-09-01 12:09:15'),
(35, '2021-26', 2, 200, '2021-09-01 14:26:46'),
(36, '2021-27', 4, 200, '2021-09-04 00:01:27'),
(37, '2021-27', 4, 300, '2021-09-04 00:01:36'),
(38, '2021-28', 13, 1000, '2021-09-05 16:21:34'),
(39, '2021-28', 13, 500, '2021-09-05 16:22:11'),
(40, '2021-28', 13, 994, '2021-09-05 16:22:41');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `productId`, `quantite`, `date`) VALUES
(1, 15, 7, '2021-07-08 07:59:48'),
(2, 15, 7, '2021-07-08 08:01:25'),
(3, 15, 3, '2021-08-08 00:41:56'),
(4, 3, 3, '2021-08-08 00:41:56'),
(5, 3, 3, '2021-08-08 00:41:56'),
(6, 9, 2, '2021-08-08 00:42:34'),
(7, 5, 11, '2021-08-08 00:44:17'),
(8, 9, 3, '2021-08-08 01:07:38'),
(9, 9, 3, '2021-08-08 01:07:38'),
(10, 9, 2, '2021-08-08 01:08:18'),
(11, 9, 1, '2021-08-08 01:09:14'),
(12, 10, 1, '2021-08-08 01:10:04'),
(13, 10, 1, '2021-08-08 01:12:06'),
(14, 12, 3, '2021-08-08 01:13:35'),
(15, 13, 1, '2021-08-08 01:15:31'),
(16, 2, 30, '2021-08-18 03:02:02'),
(17, 3, 30, '2021-08-18 03:02:02'),
(18, 2, 10, '2021-08-18 03:02:25'),
(19, 3, 1, '2021-08-18 03:02:38'),
(20, 18, 120, '2021-08-18 03:03:09'),
(21, 26, 10, '2021-08-18 03:51:34'),
(22, 9, 5, '2021-08-19 21:48:47'),
(23, 9, 5, '2021-08-19 22:20:15'),
(24, 3, 1, '2021-08-20 07:44:51'),
(25, 2, 1, '2021-08-20 07:45:00'),
(26, 3, 1, '2021-08-20 07:48:28'),
(27, 17, 20, '2021-08-20 22:53:35'),
(28, 6, 10, '2021-08-27 18:03:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `mdp` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `mdp`, `role`) VALUES
(1, 'habib', '1234', 'host'),
(2, 'simo', '4321', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_piece`
--
ALTER TABLE `categorie_piece`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque_piece`
--
ALTER TABLE `marque_piece`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque_vehicule`
--
ALTER TABLE `marque_vehicule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operation_tt`
--
ALTER TABLE `operation_tt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_piece`
--
ALTER TABLE `categorie_piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `marque_piece`
--
ALTER TABLE `marque_piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `marque_vehicule`
--
ALTER TABLE `marque_vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `operation_tt`
--
ALTER TABLE `operation_tt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
