-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Host: pinkmanfwmbd.mysql.db
-- Generation Time: May 17, 2020 at 08:18 PM
-- Server version: 5.6.46-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinkmanfwmbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745fd19764367', '2020-01-11 14:27:44'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f647450e2fdf8cf5', '2020-01-11 14:27:49'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745285380db6a', '2020-01-11 14:38:05'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f647457b11a48ce2', '2020-01-11 14:39:55'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745fb40978771', '2020-01-11 15:10:33'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f647454e1e84f486', '2020-01-11 15:14:22'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745e5f2e6430d', '2020-01-17 14:47:28'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745bc1bff22a1', '2020-01-17 14:49:58'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f6474541061a98d6', '2020-01-17 14:51:40'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f647453bfdf41263', '2020-01-17 15:05:53'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f6474547802adba2', '2020-01-17 15:09:39'),
('theo.arzark@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f2a099623a', '2020-01-23 12:09:56'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647451e6795f5e0', '2020-01-28 21:56:53'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ce78246b23', '2020-01-31 12:33:31'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647456d1e8fb429', '2020-01-31 12:39:11'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474513501b31d4', '2020-01-31 12:40:10'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745608da0ba40', '2020-01-31 12:40:50'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f6b6e1835d', '2020-01-31 12:40:52'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647458839a55f25', '2020-01-31 12:41:16'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474555d6014591', '2020-01-31 12:45:43'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745490e607bd8', '2020-01-31 14:27:04'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a10c8160dc', '2020-01-31 15:59:03'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745d6f4ca4627', '2020-01-31 16:20:33'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647452364cf4b00', '2020-01-31 16:23:44'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ac581d2420', '2020-01-31 16:25:55'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474517e1c7d6b1', '2020-02-01 00:50:15'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647458fc8320239', '2020-02-01 00:50:50'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474566843a1e27', '2020-02-01 00:51:34'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647454aebc43471', '2020-02-01 00:51:38'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474552a6b2cf61', '2020-02-01 00:51:57'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f6474570b97ba1a7', '2020-02-01 00:52:05'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f647450b05a11e3b', '2020-02-01 00:52:17'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745c9aec41377', '2020-02-01 00:52:20'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f643b3f51a', '2020-02-01 00:52:28'),
('nlazou4@gmail.com', '768e78024aa8fdb9b8fe87be86f64745087d05d8f1', '2020-02-01 01:00:37'),
('p.pinto2oliveira@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a52b5497f5', '2020-02-01 12:17:44'),
('p.pinto2oliveira@gmail.com', '768e78024aa8fdb9b8fe87be86f64745c5e2730ad3', '2020-02-01 12:18:52'),
('p.pinto2oliveira@gmail.com', '768e78024aa8fdb9b8fe87be86f64745bf5dd194f5', '2020-02-01 12:24:43'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647458cd05c6914', '2020-02-01 13:42:41'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745d6bd627bc8', '2020-02-01 14:40:35'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745efbc34123f', '2020-02-04 12:26:05'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ab2d2d5963', '2020-02-06 16:50:09'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f81878fed6', '0000-00-00 00:00:00'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745c9bb8c2392', '0000-00-00 00:00:00'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745c789bf3300', '2020-03-04 22:16:51'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745258787e7f1', '2020-03-04 22:20:55'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647455bde1bb6e6', '2020-03-04 22:21:00'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745675a40832c', '2020-03-04 22:21:35'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745c85f5f2bf8', '2020-03-04 22:21:38'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745729581986b', '2020-03-04 22:26:12'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647455ecab3573a', '2020-03-04 22:27:30'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a4f5f8e804', '2020-03-04 22:27:33'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647450666e4930e', '2020-03-04 22:28:08'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745e0fcb28489', '2020-03-04 22:28:12'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474580c533a96b', '2020-03-04 22:28:17'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474512bc26f18f', '2020-03-04 22:34:54'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474533f504ec01', '2020-03-04 22:35:56'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745cf7676b95b', '2020-03-04 22:38:06'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474501df07ec0f', '2020-03-04 22:38:11'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745cb90064d90', '2020-03-04 22:42:15'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647457453a61750', '2020-03-04 22:42:22'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745582be55cb3', '2020-03-04 22:44:07'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ba9fb470fa', '2020-03-04 22:45:52'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745fd84723a13', '2020-03-04 22:46:54'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745730d4bf3f0', '2020-03-04 22:53:55'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474519a23d6450', '2020-03-04 22:53:58'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647451dd3c8ae91', '2020-03-04 22:54:30'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647451bad20077e', '2020-03-04 22:54:59'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a7358a5884', '2020-03-04 22:55:04'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ab9246af82', '2020-03-04 22:58:03'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745b59b58968f', '2020-03-04 22:58:21'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a1a9fa2202', '2020-03-04 22:59:36'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a856dde278', '2020-03-04 23:01:03'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f64745527f714ce4', '2020-03-04 23:01:11'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f647454965896e64', '2020-03-04 23:04:57'),
('vianney.meurville@gmail.com', '768e78024aa8fdb9b8fe87be86f6474584b78ab165', '2020-03-04 23:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `play_id` int(11) NOT NULL,
  `play_titre` varchar(50) NOT NULL,
  `play_desc` text,
  `play_minia` varchar(100) NOT NULL,
  `play_categorie` varchar(1000) NOT NULL,
  `play_souscat` varchar(1000) NOT NULL,
  `play_ordrecat` int(11) NOT NULL,
  `play_news` int(11) NOT NULL,
  `play_views` int(11) NOT NULL,
  `play_last_view` datetime NOT NULL,
  `play_view_hebdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`play_id`, `play_titre`, `play_desc`, `play_minia`, `play_categorie`, `play_souscat`, `play_ordrecat`, `play_news`, `play_views`, `play_last_view`, `play_view_hebdo`) VALUES
(22, 'Just Immo - Série de spots  (2016)', 'Découvrez une série de film dans le cadre d’une campagne publicitaire de l’agence immobilière Just Immo', 'justimmo-bmx.png', 'pub', '/', 5, 3, 5, '2020-05-06 12:12:47', 0),
(23, 'Dumas PARIS', 'Dumas PARIS est un concepteur et créateur de tissus d’excellence. Film publicitaire réalisé dans le cadre de la campagne publicitaire de Dumas PARIS.', 'download.png', 'corp', '/', 1, 45, 5, '2020-05-14 15:59:13', 2),
(24, 'SCBS : Admissibles 2019', 'Campagne sous forme de Mini-Série pour les admissibles 2019 de SCBS', 'yfinal.jpg', 'pub', '/', 4, 42, 0, '0000-00-00 00:00:00', 0),
(25, 'Champagne Feuillate', 'Présentation de Cuvées du Champagne Feuillate', 'feuillate-grande.jpg', 'motion', '/', 1, 41, 0, '0000-00-00 00:00:00', 0),
(26, 'Y Shcools Events', 'Série : des étudiants Yschools témoignent sur les différents Events organisés par leur Ecole.', 'mael.jpg', 'corp', 'events/portraits', 4, 43, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` varchar(20) NOT NULL,
  `last_date` varchar(7) NOT NULL,
  `most_vid_id` int(11) NOT NULL,
  `nbre_visit` int(11) NOT NULL,
  `nbre_vid` int(11) NOT NULL,
  `since_creation` int(11) NOT NULL,
  `easter_egg` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `last_date`, `most_vid_id`, `nbre_visit`, `nbre_vid`, `since_creation`, `easter_egg`, `ip`) VALUES
('hebdo', '2020-20', 28, 38, 13, 163, 0, ''),
('2020-05-06 15:24:36', '2020-20', 28, 38, 13, 57, 0, '78.195.39.46'),
('2020-05-06 15:25:52', '2020-20', 28, 38, 13, 56, 0, '78.195.39.46'),
('2020-05-06 15:28:47', '2020-20', 28, 38, 13, 55, 0, '78.195.39.46'),
('2020-05-06 16:36:42', '2020-20', 28, 38, 13, 54, 0, '185.220.100.248'),
('2020-05-06 17:42:16', '2020-20', 28, 38, 13, 53, 0, '78.195.39.46'),
('2020-05-06 20:29:44', '2020-20', 28, 38, 13, 52, 0, '82.241.184.124'),
('2020-05-07 13:36:04', '2020-20', 28, 38, 13, 51, 0, '185.220.100.246'),
('2020-05-07 16:37:49', '2020-20', 28, 38, 13, 50, 0, '78.195.39.46'),
('2020-05-08 17:08:38', '2020-20', 28, 38, 13, 49, 0, '78.195.39.46'),
('2020-05-08 19:33:34', '2020-20', 28, 38, 13, 48, 0, '31.155.200.128'),
('2020-05-09 01:30:41', '2020-20', 28, 38, 13, 47, 0, '78.195.39.46'),
('2020-05-10 03:11:16', '2020-20', 28, 38, 13, 46, 0, '78.195.39.46'),
('2020-05-10 16:01:13', '2020-20', 28, 38, 13, 45, 0, '82.241.184.124'),
('2020-05-10 17:43:00', '2020-20', 28, 38, 13, 44, 0, '78.195.39.46'),
('2020-05-10 17:46:04', '2020-20', 28, 38, 13, 43, 0, '78.195.39.46'),
('2020-05-10 19:14:05', '2020-20', 28, 38, 13, 42, 0, '78.195.39.46'),
('2020-05-10 19:46:49', '2020-20', 28, 38, 13, 41, 0, '82.241.184.124'),
('2020-05-10 20:46:57', '2020-20', 28, 38, 13, 40, 0, '90.109.1.172'),
('2020-05-10 21:33:21', '2020-20', 28, 38, 13, 39, 0, '78.195.39.46'),
('2020-05-10 22:49:36', '2020-20', 28, 38, 13, 38, 0, '78.195.39.46'),
('2020-05-11 01:35:10', '', 28, 37, 13, 37, 0, '78.195.39.46'),
('2020-05-11 02:35:59', '', 28, 36, 13, 36, 0, '78.195.39.46'),
('2020-05-11 13:35:27', '', 28, 35, 13, 35, 0, '78.195.39.46'),
('2020-05-11 16:54:44', '', 28, 34, 13, 34, 0, '78.195.39.46'),
('2020-05-11 19:18:56', '', 28, 33, 13, 33, 0, '78.195.39.46'),
('2020-05-12 00:12:36', '', 28, 32, 13, 32, 0, '78.195.39.46'),
('2020-05-12 00:25:44', '', 28, 31, 13, 31, 0, '195.176.3.20'),
('2020-05-12 10:00:56', '', 28, 30, 13, 30, 0, '34.90.167.39'),
('2020-05-12 10:39:39', '', 28, 29, 13, 29, 0, '82.241.184.124'),
('2020-05-12 13:10:43', '', 28, 28, 13, 28, 0, '82.241.184.124'),
('2020-05-12 16:27:43', '', 28, 27, 13, 27, 0, '93.29.179.86'),
('2020-05-12 17:05:15', '', 28, 26, 13, 26, 0, '89.89.73.45'),
('2020-05-12 17:54:01', '', 28, 25, 13, 25, 0, '89.89.73.45'),
('2020-05-12 18:20:07', '', 28, 24, 13, 24, 0, '87.231.72.232'),
('2020-05-12 23:08:12', '', 28, 23, 13, 23, 0, '37.164.170.81'),
('2020-05-13 00:19:47', '', 28, 22, 13, 22, 0, '78.195.39.46'),
('2020-05-13 09:21:44', '', 0, 21, 13, 21, 0, '93.31.255.230'),
('2020-05-13 09:43:06', '', 0, 20, 13, 20, 0, '107.189.11.233'),
('2020-05-13 12:36:59', '', 0, 19, 13, 19, 0, '78.195.39.46'),
('2020-05-13 19:09:03', '', 0, 18, 13, 18, 0, '77.247.17.191'),
('2020-05-14 10:23:25', '', 0, 17, 13, 17, 0, '83.201.105.214'),
('2020-05-14 11:06:37', '', 0, 16, 13, 16, 0, '92.184.112.124'),
('2020-05-14 15:16:42', '', 0, 15, 13, 15, 0, '80.13.142.154'),
('2020-05-14 17:18:10', '', 0, 14, 6, 14, 0, '82.241.184.124'),
('2020-05-14 17:19:50', '', 0, 13, 6, 13, 0, '92.167.57.156'),
('2020-05-14 18:47:09', '', 0, 12, 2, 12, 0, '82.241.184.124'),
('2020-05-14 23:25:26', '', 0, 11, 1, 11, 0, '46.193.1.212'),
('2020-05-15 10:28:22', '', 0, 10, 0, 10, 0, '81.185.172.27'),
('2020-05-15 17:59:00', '', 0, 9, 0, 9, 0, '94.231.136.50'),
('2020-05-15 18:23:39', '', 0, 8, 0, 8, 0, '40.77.189.100'),
('2020-05-16 03:15:35', '', 0, 7, 0, 7, 0, '92.184.108.75'),
('2020-05-16 06:52:51', '', 0, 6, 0, 6, 0, '95.10.48.238'),
('2020-05-16 12:19:12', '', 0, 5, 0, 5, 0, '78.195.39.46'),
('2020-05-16 18:13:30', '', 0, 4, 0, 4, 0, '77.205.117.134'),
('2020-05-16 18:40:33', '', 0, 3, 0, 3, 0, '77.132.21.63'),
('2020-05-16 18:43:10', '', 0, 2, 0, 2, 0, '77.132.21.63'),
('2020-05-16 22:48:20', '', 0, 1, 0, 1, 0, '18.222.196.9'),
('2020-05-17 17:36:40', '', 0, 0, 0, 0, 0, '91.162.171.31');

-- --------------------------------------------------------

--
-- Table structure for table `trafic`
--

CREATE TABLE `trafic` (
  `id` int(11) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `trafic_name` varchar(30) NOT NULL,
  `trafic_view` int(11) NOT NULL,
  `trafic_last_view` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trafic`
--

INSERT INTO `trafic` (`id`, `identifier`, `trafic_name`, `trafic_view`, `trafic_last_view`) VALUES
(1, 'home0', 'Page d\'accueil', 100, '2020-05-17 17:36:40'),
(2, 'pub0', 'Films Publicitaires', 18, '2020-05-14 15:18:12'),
(3, 'corp0', 'Film Corporate', 30, '2020-05-14 17:20:12'),
(4, 'clip0', 'Music videos', 7, '2020-05-14 17:18:40'),
(5, 'motion0', 'Motion Designs', 8, '2020-05-14 10:23:56'),
(6, 'contact0', 'Contact', 10, '2020-05-12 17:08:39'),
(7, 'all1', 'Catégorie “Tous les films”', 22, '2020-05-16 18:16:54'),
(8, 'pub1', 'Catégorie “Film publicitaire”', 15, '2020-05-13 12:37:47'),
(9, 'corp1', 'Catégorie “Film corporate”', 14, '2020-05-16 18:40:33'),
(10, 'clip1', 'Catégorie “Music videos”', 19, '2020-05-17 14:29:09'),
(11, 'motion1', 'Catégorie “Motion designs”', 1, '2020-05-12 13:11:17'),
(12, 'shwrl', 'Showreel', 15, '2020-05-16 18:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_mdp` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_co` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nom`, `user_mdp`, `user_email`, `last_co`) VALUES
(1, 'Pinkman', '$2y$10$iilaIoe71KdYWBaETQFW6uC1V7x.0MaU6KKHMkciifS7XDgnc6XZW', 'vianney.meurville@gmail.com', '2020-05-17 17:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid_id` int(11) NOT NULL,
  `vid_url` varchar(2000) NOT NULL,
  `vid_titre` text NOT NULL,
  `vid_categorie` varchar(50) NOT NULL,
  `vid_desc` text NOT NULL,
  `vid_minia` varchar(1000) NOT NULL,
  `vid_souscat` varchar(50) NOT NULL,
  `vid_ordrecat` int(11) NOT NULL,
  `vid_news` tinyint(1) NOT NULL,
  `vid_views` int(11) NOT NULL,
  `vid_last_view` datetime NOT NULL,
  `view_home0` int(11) NOT NULL,
  `view_home1` int(11) NOT NULL,
  `vid_view_hebdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid_id`, `vid_url`, `vid_titre`, `vid_categorie`, `vid_desc`, `vid_minia`, `vid_souscat`, `vid_ordrecat`, `vid_news`, `vid_views`, `vid_last_view`, `view_home0`, `view_home1`, `vid_view_hebdo`) VALUES
(28, 'https://youtu.be/5h7-vC5euvc', 'ESC BE ALIVE', 'pub', 'Créez, innovez, imaginez, Apprenez. ', '4.jpg', '/', 2, 1, 0, '2020-05-14 15:18:26', 3, 2, 1),
(29, 'https://youtu.be/pz3sW4y09P0', 'ACI - Soufflet Agriculture', 'corp', 'Film sur l\'offre ACI du Groupe Soufflet', 'aci.png', '/', 3, 21, 0, '2020-05-14 15:21:01', 0, 1, 1),
(30, 'https://youtu.be/8WOoLQDEc0w', 'STIHL', 'corp', 'Découvrez la performance des entrepôts de livraison Stihl.', 'stihl.png', '/', 1, 40, 3, '2020-05-14 15:58:04', 0, 0, 2),
(31, 'https://youtu.be/M2PXOKJPMC8', 'Level S3D - MyCaptR', 'corp', 'Film de présentation de la startup LevelS3D', 'level-usecase.png', '/', 2, 44, 0, '0000-00-00 00:00:00', 0, 0, 0),
(32, 'https://youtu.be/xoek4RajdxU', 'Dumas PARIS - Série de spots ', 'corp', 'Campagne de films réalisée pour Dumas PARIS.', 'dumas-usine.png', '/', 4, 69, 2, '2020-05-14 15:59:15', 0, 0, 2),
(33, 'https://youtu.be/jZyeztbwn20', 'Dumas PARIS - Série de spots ', 'corp', 'Campagne de films réalisée pour Dumas PARIS.', 'dumas-matiere.png', '/', 6, 68, 1, '2020-04-24 02:21:15', 0, 0, 0),
(34, 'https://vimeo.com/254360101', 'SiAu / Ce Soir Je sors', 'clip', 'Clip du premier single du chanteur SiAu', 'siau.png', '/', 1, 35, 1, '2020-04-24 02:21:51', 0, 0, 0),
(35, 'https://www.youtube.com/watch?v=VzhlTTfaxnI&feature=emb_title', 'Elephanz / Dust or Delight', 'clip', 'Clip du single Dust or Delight', 'elephanz.png', '/', 2, 26, 0, '0000-00-00 00:00:00', 0, 0, 0),
(36, 'https://youtu.be/VW3BVwfTfgs', 'Badet Clément- Carte de voeux', 'motion', 'Carte de voeux du Champagne Badet Clément', 'badet.png', '/', 5, 36, 0, '0000-00-00 00:00:00', 0, 0, 0),
(37, 'https://youtu.be/Q2UVcczRkSA', 'Plug and start', 'motion', 'Spot teaser de l’évènement Plug and start, évènement créateur de projets innovants.\r\n', 'pns18.png', '/', 2, 37, 0, '0000-00-00 00:00:00', 0, 0, 0),
(38, 'https://vimeo.com/166477775', 'Champagne Feuillate', 'motion', 'Animation pour la carte de vœux du Champagne Feuillate.\r\n', 'feuillate.png', '/', 3, 38, 1, '2020-04-24 02:22:15', 0, 0, 0),
(39, 'https://youtu.be/V0c0BGDbvM0', 'IDCA', 'motion', 'Film d\'animation pour ID Champagne-Ardenne.', '1.jpg', '/', 4, 39, 0, '0000-00-00 00:00:00', 0, 0, 0),
(40, 'https://youtu.be/0HQJcyl1_4c', 'Spot AUDI', 'pub', 'Ce faux spot publicitaire de marques de véhicules a été réalisé dans le cadre d’un atelier du festival du film court de Troyes.', 'pub1.png', '/', 5, 2, 3, '2020-04-24 02:32:51', 1, 1, 0),
(41, 'https://youtu.be/RaTZ0VMUV7g', 'SCBS - Success is happines', 'pub', 'Découvrez le film admissibles 2018 de SCBS', 'pub4.png', '/', 11, 27, 0, '0000-00-00 00:00:00', 0, 0, 0),
(42, 'https://youtu.be/iGFbILImwF0', 'Y Schools - Se révéler', 'pub', 'Se révéler, se découvrir : Admissibles 2016 de YSchools', 'pub5.png', '/', 12, 25, 0, '0000-00-00 00:00:00', 0, 0, 0),
(43, 'https://youtu.be/XagvlDHg2AQ', 'LEVEL S3D CORPORATE', 'pub', 'Film publicitaire présentant la startup LevelS3D', 'pub6.png', '/', 4, 28, 0, '0000-00-00 00:00:00', 0, 0, 0),
(44, 'https://vimeo.com/74013656', 'Myla London - Ad luxury brand ', 'pub', 'Much-loved iconic lingerie brand with a fresh approach and new look. Film publicitaire réalisé pour la marque de lingerie de luxe Myla London.', 'myla.png', '/', 1, 13, 0, '0000-00-00 00:00:00', 0, 0, 0),
(45, 'https://youtu.be/6asqil6TqG8', 'Y Schools - Spot pour les admissibles (2015)', 'pub', 'The choice is yours. Découvrez le spot publicitaire Admissibles 2015 de  YSchools.', 'esc-choice.png', '/', 9, 12, 0, '2020-05-04 22:34:43', 1, 0, 0),
(46, 'https://youtu.be/0SA5Fq9KFsc', 'MAKING OF PUB VOITURE', 'pub', 'Making Of de la publicité voiture', 'audi-mo.png', '/', 14, 29, 0, '0000-00-00 00:00:00', 0, 0, 0),
(47, 'https://youtu.be/_7-aVT3BfwU', 'IUT DE TROYES', 'pub', 'Film publicitaire pour l\'IUT de Troyes\r\n\r\n', 'iut.png', '/', 15, 30, 0, '0000-00-00 00:00:00', 0, 0, 0),
(48, 'https://youtu.be/XNjB4rOd854', 'MUTEX', 'pub', 'Film pour la compagnie d\'assurance Mutex', 'mutex.png', '/', 17, 31, 1, '2020-05-02 19:42:16', 0, 0, 0),
(49, 'https://youtu.be/loEHfgyFUv4', 'GROUPE ESC TROYES LISTEN/CONNECT', 'pub', 'Film promotionnel du Groupe ESC Troyes', 'esc-listen.png', '/', 18, 32, 0, '0000-00-00 00:00:00', 0, 0, 0),
(50, 'https://youtu.be/QXXYHtNcWHE', 'CHAMPAGNE CHASSENAY D\'ARCE - VINTAGE', 'pub', 'Film présentant l\'une des cuvée du Champagne Chassenay d\'Arce', 'chassenay1.png', '/', 20, 33, 1, '2020-04-27 03:15:58', 0, 0, 0),
(51, 'https://youtu.be/3QLY9wF6tL8', 'CHAMPAGNE CHASSENAY D\'ARCE - ROSÉ', 'pub', 'Film présentant l\'une des cuvée du Champagne Chassenay d\'Arce', 'chassenay2.png', '/', 21, 34, 0, '0000-00-00 00:00:00', 0, 0, 0),
(53, 'https://www.youtube.com/watch?v=zZBxq5U7H1c', 'JUST IMMO -LES FAITS- SENIOR', 'pub', 'Spot issu de la Campagne Cinéma 2016 \"Les Faits\" de Just Immo', 'justimmo-senior.png', '/', 22, 58, 0, '0000-00-00 00:00:00', 0, 0, 0),
(54, 'https://www.youtube.com/watch?v=80tStyX1n5s', 'JUST IMMO -LES FAITS- LE CHATON', 'pub', 'Spot issu de la Campagne Cinéma 2016 \"Les Faits\" de Just Immo', 'justimmo-chat.png', '/', 23, 67, 0, '0000-00-00 00:00:00', 0, 0, 0),
(55, 'https://youtu.be/9DZgggFlC0Q', 'JUST IMMO -LES FAITS- MIKE', 'pub', 'Spot issu de la Campagne Cinéma 2016 \"Les Faits\" de Just Immo', 'justimmo-mike.png', '/', 24, 62, 0, '0000-00-00 00:00:00', 0, 0, 0),
(56, 'https://youtu.be/pwak3BDglJg', 'JUST IMMO -CARLOS- SPOT A', 'pub', 'Spot issu de la Campagne Cinéma 2014 \"Carlos\" de Just Immo', 'justimmo-carlosa.png', '/', 25, 64, 0, '0000-00-00 00:00:00', 0, 0, 0),
(57, 'https://youtu.be/bya3MEA4MHc', 'JUST IMMO - LES FAITS- BMX', 'pub', 'Spot issu de la Campagne Cinéma 2016 \"Les Faits\" de Just Immo', 'justimmo-bmx.png', '/', 26, 65, 0, '0000-00-00 00:00:00', 0, 0, 0),
(58, 'https://youtu.be/6tWzlfzNh7I', 'JUST IMMO - CARLOS - SPOT C', 'pub', 'Spot issu de la Campagne Cinéma 2014 \"Carlos\" de Just Immo', 'justimmo-carlosc.png', '/', 27, 66, 0, '0000-00-00 00:00:00', 0, 0, 0),
(59, 'https://youtu.be/IZ17OSc21PQ', 'JUST IMMO -LES FAITS- FOOT US', 'pub', 'Spot issu de la Campagne Cinéma 2016 \"Les Faits\" de Just Immo', 'justimmo-foot.png', '/', 3, 15, 0, '2020-05-14 15:19:10', 0, 2, 1),
(60, 'https://youtu.be/QXXYHtNcWHE', 'CHAMPAGNE CHASSENAY D\'ARCE - VINTAGE', 'corp', 'Film présentant l\'une des cuvée du Champagne Chassenay d\'Arce', '1chassenay1.png', '/', 8, 15, 1, '2020-04-24 02:21:44', 0, 0, 0),
(61, 'https://youtu.be/3QLY9wF6tL8', 'CHAMPAGNE CHASSENAY D\'ARCE - ROSÉ', 'corp', 'Film présentant l\'une des cuvée du Champagne Chassenay d\'Arce', '1chassenay2.png', '/', 10, 16, 0, '0000-00-00 00:00:00', 0, 0, 0),
(62, 'https://youtu.be/z3SIGv7uekU', 'DUMAS PARIS - SHOOT', 'corp', 'Film sur l\'un des derniers shoot photos de Dumas Paris', 'dumas-shoot.png', '/', 11, 20, 0, '0000-00-00 00:00:00', 0, 0, 0),
(63, 'https://youtu.be/GtokbmmESdw', 'GAME OF BRAIN 2016 - TEASER', 'corp', 'Teaser promotionnel de l\'édition 2016 de Game Of Brain', 'gob-teaser.png', 'events/portraits', 14, 19, 0, '0000-00-00 00:00:00', 0, 0, 0),
(64, 'https://youtu.be/q5HKelKrv34', 'GAME OF BRAIN - CORPORATE VERSION', 'corp', 'Film retracant l\'édition 2016 de Game of Brain', 'gob-corp.png', 'events/portraits', 7, 17, 0, '0000-00-00 00:00:00', 0, 0, 0),
(65, 'https://youtu.be/kOSjkRFTjCw', 'CREATIVE MIX PARTY 2015 - GENERALII', 'corp', 'Film couvrant la Creative Mix Party 2015 organisée par la Technopole de l\'Aube et le YEC', 'cmp2015.png', 'events/portraits', 17, 18, 0, '0000-00-00 00:00:00', 0, 0, 0),
(66, 'https://youtu.be/4FDpgF48P9U', 'DUMAS PARIS - EVENT', 'corp', 'Film sur la présentation de la gamme Dumas Paris dans un lieu préstigieux de Paris', 'dumas-event.png', 'events/portraits', 15, 26, 0, '0000-00-00 00:00:00', 0, 0, 0),
(67, 'https://youtu.be/0ZUD0d9qvw0', 'SÉMINAIRE STARTER - MAYLYS', 'corp', 'Suivez Maylis lors du Séminaire Starter du Groupe ESC Troyes', 'esc-event-starter.png', 'events/portraits', 5, 25, 0, '0000-00-00 00:00:00', 0, 0, 0),
(68, 'https://youtu.be/kMBtkkQVehY', 'MUSIQUE WEEK 2015', 'corp', 'Film sur la semaine Musique Week 2015 du Groupe ESC Troyes', 'esc-event-music2015.png', 'events/portraits', 21, 20, 0, '0000-00-00 00:00:00', 0, 0, 0),
(69, 'https://youtu.be/n8pVDQW1sS0', '24H DE LA CRÉATIVITÉ - LOUIS', 'corp', 'Suivez Louis lors des 24h de la créativité du Groupe ESC Troyes', 'esc-event-24.png', 'events/portraits', 18, 29, 0, '0000-00-00 00:00:00', 0, 0, 0),
(70, 'https://youtu.be/RFYjA0g3eNs', 'GET AMAZING 2016- ANTHONY', 'corp', 'Suivez Anthony lors de la soiree Get Amazing 2016 du Groupe ESC Troyes', 'esc-antoine.png', 'events/portraits', 19, 31, 0, '0000-00-00 00:00:00', 0, 0, 0),
(71, 'https://youtu.be/wmAntsNhzYc', 'AWARDZ - EMILE', 'corp', 'Suivez Emile lors des Awardz 2015 du Groupe ESC Troyes', 'esc-event-awardz.png', 'events/portraits', 22, 33, 0, '0000-00-00 00:00:00', 0, 0, 0),
(72, 'https://youtu.be/dEeWN7DKSaQ', 'CREATIVE MIX PARTY 2014 - COYOTE', 'corp', 'Film couvrant la Creative Mix Party 2014 organisée par la Technopole de l\'Aube et le YEC', 'cmp2014.png', 'events/portraits', 24, 22, 0, '0000-00-00 00:00:00', 0, 0, 0),
(73, 'https://youtu.be/wmAntsNhzYc', 'GAME OF BRAIN - MANNEQUIN CHALLENGE', 'corp', 'Mannequin Challenge réalisé par les participants de l\'édition 2016 de Game of Brain', 'gob-mannequin.png', 'events/portraits', 25, 23, 0, '0000-00-00 00:00:00', 0, 0, 0),
(74, 'https://youtu.be/ZA2XD1zI82c', 'REMISE DES DIPLOMES - MATHILDE', 'corp', 'Suivez Mathilde lors de la remise des diplomes 2015 du Groupe ESC Troyes', 'esc-event-ceremonie.png', 'events/portraits', 26, 37, 0, '0000-00-00 00:00:00', 0, 0, 0),
(75, 'https://youtu.be/Xw-v-cVW2XE', 'FORUM DES ASSOCIATIONS - CHARLOTTE', 'corp', 'Suivez Charlotte lors du Forum des Associations du Groupe ESC Troyes', 'esc-event-forum.png', 'events/portraits', 27, 38, 0, '0000-00-00 00:00:00', 0, 0, 0),
(76, 'https://youtu.be/OqKfufMY8Vc', 'TROPHÉES DE L\'IMPRO - ANTOINE', 'corp', 'Suivez Antoine lors des Trophées de l\'Impro du Groupe ESC Troyes', 'esc-event-impro.png', 'events/portraits', 29, 41, 0, '0000-00-00 00:00:00', 0, 0, 0),
(77, 'https://youtu.be/UY_c8ds8eFs', 'MUSIC WEEK 2014 - ANNE', 'corp', 'Suivez Anne lors de la Music Week 2014 du Groupe ESC Troyes', 'esc-event-music2014.png', 'events/portraits', 31, 43, 0, '0000-00-00 00:00:00', 0, 0, 0),
(78, 'https://youtu.be/uAhtzixF0AE', 'ANCIENS ÉTUDIANTS - MARION / LONDRES', 'corp', 'Portrait de Marion, ancienne étudiante du Groupe ESC Troyes vivant à Londres', 'esc-ancien-londres.png', 'events/portraits', 32, 44, 0, '0000-00-00 00:00:00', 0, 0, 0),
(79, 'https://youtu.be/yAS1G1M1quo', 'ANCIENS ÉTUDIANTS - OLIVIA / VARSOVIE', 'corp', 'Portrait d\'Olivia, ancienne étudiante du Groupe ESC Troyes vivant à Varsovie', 'esc-ancien-varsovie.png', 'events/portraits', 33, 48, 0, '0000-00-00 00:00:00', 0, 0, 0),
(80, 'https://youtu.be/q5Nbw6PdMmE', 'ANCIENS ETUDIANTS - QUENTIN ET ALEXANDRE / LILLE', 'corp', 'Portrait de Quetin et alexandre, anciens étudiants du Groupe ESC Troyes', 'esc-ancien-lille.png', 'events/portraits', 34, 46, 0, '0000-00-00 00:00:00', 0, 0, 0),
(81, 'https://youtu.be/mwZfwk0BzxE', 'CONFÉRENCE DE FRANCOIS FILLON', 'corp', 'Interview de Francois Fillon lors de sa conférence au Groupe ESC Troyes', 'fion.png', 'interviews', 28, 14, 0, '0000-00-00 00:00:00', 0, 0, 0),
(82, 'https://youtu.be/yK4umqT1QLs', 'INTERVIEW DU PRIX NOBEL D\'ECONOMIE', 'corp', 'Interview de Jean Tirole au Groupe ESC Troyes', 'esc-itw-tirole.png', 'interviews', 30, 24, 0, '0000-00-00 00:00:00', 0, 0, 0),
(85, 'https://youtu.be/GgKITYlz7UU ', 'YEC (Young Entrepreneur Center)', 'pub', 'Film tourné sur fond vert présentant le YEC', 'Yec.jpg', '/', 6, 5, 0, '0000-00-00 00:00:00', 0, 0, 0),
(86, ' Lien vidéo https://youtu.be/IHVSzI4oC9E ', 'SCBS : Admissibles 2017 : Next Step', 'pub', 'Pub sous forme de Court Métrage pour les Admissibles SCBS de 2017', 'next.jpg', '/', 8, 6, 0, '0000-00-00 00:00:00', 0, 0, 0),
(87, 'https://youtu.be/LWxqphkNDXQ ', 'Champagne Feuillatte - Reserve exclusive Presentation', 'motion', 'Motion Design présentant la Cuvée Réserve Exclusive du Chamapgne Feuillate.', 'feuillate-exclu.jpg', '/', 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0),
(88, 'https://youtu.be/XwZmWadRaHI ', 'Champagne Feuillatte - Grande Reserve Presentation', 'motion', 'Motion Design présentant la Cuvée Grande Réserve du Champagne Feuillatte', 'feuillate-grande.jpg', '/', 4, 4, 0, '0000-00-00 00:00:00', 0, 0, 0),
(89, 'https://youtu.be/WlKVCgyif9k ', 'SCBS :  Episode 03 : POST IT GIRL', 'pub', 'Campagne sous forme de Mini Série pour les Admissibles 2019 de SCBS', 'ypost.jpg', '/', 7, 6, 0, '0000-00-00 00:00:00', 0, 0, 0),
(90, 'https://youtu.be/RtAIJ87SCGw ', 'SCBS : Episode 05 : SEASON FINAL', 'pub', 'Campagne sous forme de Mini Série pour les Admissibles 2019 de SCBS', 'yfort.jpg', '/', 10, 7, 0, '0000-00-00 00:00:00', 0, 0, 0),
(91, 'https://youtu.be/9jitDsffKoU', ' SCBS :  Episode 03 : GAMES OF THRONES', 'pub', 'Campagne sous forme de Mini Série pour les Admissibles 2019 de SCBS', 'ygame.jpg', '/', 13, 8, 0, '0000-00-00 00:00:00', 0, 0, 0),
(92, 'https://youtu.be/n9IACEMr728 ', 'SCBS :  Episode 02 : FOOT', 'pub', 'Campagne sous forme de Mini Série pour les Admissibles 2019 de SCBS', 'yfoot.jpg', '/', 16, 9, 0, '0000-00-00 00:00:00', 0, 0, 0),
(93, 'https://youtu.be/Sc9HvmZfoLA', 'SCBS : Episode 01 : FORNITE', 'pub', 'Campagne sous forme de Mini Série pour les Admissibles 2019 de SCBS', '1yfort.jpg', '/', 19, 10, 0, '0000-00-00 00:00:00', 0, 0, 0),
(94, 'https://youtu.be/rqw_r51D-QM ', 'Groupe Soufflet : L\'application Farmi', 'corp', 'Témoignage d\'un Agriculteur sur L\'appli Farmi', 'farmi02.jpg', 'events/portraits', 9, 7, 0, '0000-00-00 00:00:00', 0, 0, 0),
(95, 'https://youtu.be/5O-e3LIItyo', ' Groupe Soufflet : L\'application Farmi', 'corp', 'Témoignage d\'un Agriculteur sur L\'appli Farmi', 'farmi01.jpg', 'events/portraits', 12, 8, 0, '0000-00-00 00:00:00', 0, 0, 0),
(96, 'https://youtu.be/A9zMMzeizno', 'Groupe Soufflet : Pole Bakery', 'corp', 'Film de présentation du Pôle Bakery du Groupe Soufflet', 'pbs.jpg', '/', 13, 9, 5, '2020-05-14 23:26:54', 0, 0, 5),
(97, 'https://youtu.be/3qGHi3NufuM ', 'Romy Paris - Hylab Tutoriel', 'corp', 'Film tutoriel sur l\'utilisation de l\'Hylab par Romy Paris.', 'Hylab.jpg', '/', 16, 10, 1, '2020-05-14 18:47:09', 0, 0, 1),
(98, 'https://youtu.be/2CM-ChWTMpQ ', 'De l\'Orge à la Bière', 'corp', 'Découvrez comment le Groupe Soufflet valorise sa filière orge', 'orge.jpg', '/', 20, 4, 0, '0000-00-00 00:00:00', 0, 0, 0),
(99, 'https://youtu.be/JCTAKjQPcI0 ', 'Notre Sécurité, Nos vies', 'corp', 'Campagne de prévention du Groupe Soufflet', 'secu.jpg', '/', 23, 11, 0, '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_playlist`
--

CREATE TABLE `video_playlist` (
  `_vid_id` int(11) DEFAULT NULL,
  `_play_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_playlist`
--

INSERT INTO `video_playlist` (`_vid_id`, `_play_id`) VALUES
(NULL, 22),
(53, 22),
(54, 22),
(55, 22),
(56, 22),
(57, 22),
(58, 22),
(59, 22),
(NULL, 23),
(32, 23),
(33, 23),
(62, 23),
(66, 23),
(NULL, 24),
(89, 24),
(90, 24),
(91, 24),
(92, 24),
(93, 24),
(NULL, 25),
(87, 25),
(88, 25),
(NULL, 26),
(67, 26),
(69, 26),
(70, 26),
(71, 26),
(74, 26),
(75, 26),
(76, 26),
(77, 26),
(78, 26),
(79, 26),
(80, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`play_id`);

--
-- Indexes for table `trafic`
--
ALTER TABLE `trafic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`);

--
-- Indexes for table `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD UNIQUE KEY `_play_id_vid_id` (`_play_id`,`_vid_id`) USING BTREE,
  ADD KEY `_vid_id` (`_vid_id`),
  ADD KEY `_play_id` (`_play_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `play_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `trafic`
--
ALTER TABLE `trafic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD CONSTRAINT `video_playlist_ibfk_1` FOREIGN KEY (`_play_id`) REFERENCES `playlist` (`play_id`),
  ADD CONSTRAINT `video_playlist_ibfk_2` FOREIGN KEY (`_vid_id`) REFERENCES `video` (`vid_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
