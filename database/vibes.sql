-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 20, 2022 at 04:51 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vibes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `identifiant`, `password`, `created_at`, `updated_at`) VALUES
(1, 'berlin12', '2022', '2022-09-06 10:15:18', '2022-09-06 10:15:18'),
(2, 'gyver', '5885', '2022-09-06 10:15:49', '2022-09-06 10:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'ralycia', '../../public/assets/images/ralycia.jpg', '2022-09-15 17:42:14', '2022-09-15 17:42:14'),
(3, 'kanaa', '../../upload/cover-Kanaa.jpg', '2022-09-16 10:00:59', '2022-09-16 10:00:59'),
(4, 'Santrinos Raphaël', '../../upload/Santrinos_Raphael.jpg', '2022-09-16 10:22:22', '2022-09-16 10:22:22'),
(5, 'Omar B', '../../upload/b457c0017d1721e3652b5a778416af89_XL.jpg', '2022-09-16 10:25:45', '2022-09-16 10:25:45'),
(6, 'Senzaa', '../../upload/12-5.jpg', '2022-09-16 10:26:23', '2022-09-16 10:26:23'),
(7, 'Adjoa Sikaa', '../../upload/73537368_3400113816680347_5468157820723527680_n.jpg', '2022-09-16 10:27:14', '2022-09-16 10:27:14'),
(8, 'Almok', '../../upload/Almok-Nishamag.webp', '2022-09-16 10:28:17', '2022-09-16 10:28:17'),
(9, 'Black T', '../../upload/blackT.jpg', '2022-09-16 10:29:16', '2022-09-16 10:29:16'),
(10, 'Prince Mo', '../../upload/IMG_22042022_183540_1000_x_600_pixel-560x600.jpg', '2022-09-16 10:30:03', '2022-09-16 10:30:03'),
(11, 'Pewii', '../../upload/v63c56logo76a_600.jpg', '2022-09-16 10:30:43', '2022-09-16 10:30:43'),
(12, 'Lauraa', '../../upload/imag.jpg', '2022-09-16 10:33:38', '2022-09-16 10:33:38'),
(13, 'Fofo shalom', '../../upload/Fofo shalom.jpg', '2022-09-16 10:34:22', '2022-09-16 10:34:22'),
(14, 'Vika', '../../upload/Togo-Bonne-nouvelle-pour-lartiste-Vika.jpg', '2022-09-16 10:35:19', '2022-09-16 10:35:19'),
(15, 'El Miliaro', '../../upload/el.jpg', '2022-09-16 10:49:38', '2022-09-16 10:49:38'),
(16, 'Afia Mala', '../../upload/1278407.jpg', '2022-09-16 10:50:03', '2022-09-16 10:50:03'),
(17, 'Eric Mc', '../../upload/eric.jpg', '2022-09-16 10:50:43', '2022-09-16 10:50:43'),
(18, 'Kiko', '../../upload/kiko-.webp', '2022-09-16 10:51:46', '2022-09-16 10:51:46'),
(19, 'Juliano', '../../upload/artwork-copy-3.jpg', '2022-09-16 10:52:12', '2022-09-16 10:52:12'),
(20, 'Dianuella', '../../upload/dianu.jpg', '2022-09-16 10:52:34', '2022-09-16 10:52:34'),
(21, 'Mic Flamz', '../../upload/micflam.jpg', '2022-09-16 10:53:13', '2022-09-16 10:53:13'),
(22, 'Noire Velours', '../../upload/Noire-Velours.jpg', '2022-09-16 10:54:04', '2022-09-16 10:54:04'),
(23, 'Pikaluz', '../../upload/pikaluz.jpg', '2022-09-16 10:54:32', '2022-09-16 10:54:32'),
(24, 'jonh&amp;gifty', '../../upload/jonh&gifty.jpg', '2022-09-16 10:55:08', '2022-09-16 10:55:08'),
(25, 'Tony X', '../../upload/photo_2022-05-30_10-34-19-2.jpg', '2022-09-16 10:56:41', '2022-09-16 10:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Ambiances', '0', '2022-09-10 07:25:34', '2022-09-10 07:25:34'),
(2, 'Afropop', '../../upload/', '2022-09-10 07:25:34', '2022-09-10 07:25:34'),
(3, 'Classiques', '../../upload/', '2022-09-10 07:26:18', '2022-09-10 07:26:18'),
(4, 'Détentes', '0', '2022-09-10 07:26:18', '2022-09-10 07:26:18'),
(5, 'Gospels', '0', '2022-09-10 07:27:41', '2022-09-10 07:27:41'),
(6, 'Mix', '0', '2022-09-10 07:27:41', '2022-09-10 07:27:41'),
(7, 'Oldschools', '0', '2022-09-10 07:28:11', '2022-09-10 07:28:11'),
(8, 'Rap', '0', '2022-09-10 07:28:11', '2022-09-10 07:28:11'),
(9, 'Pop', '0', '2022-09-10 07:29:13', '2022-09-10 07:29:13'),
(10, 'Rnb', '0', '2022-09-10 07:29:13', '2022-09-10 07:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `song` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'happy', 'happy@gmail.com', '1225', '2022-09-13 11:09:21', '2022-09-13 11:09:21'),
(2, 'blessing', 'bless@gmail.com', '8888', '2022-09-13 11:11:38', '2022-09-13 11:11:38'),
(3, 'grace', 'gr@gmail.com', '5252', '2022-09-13 11:12:44', '2022-09-13 11:12:44'),
(12, 'lolo', 'lo@gmail.com', '2552', '2022-09-14 17:36:37', '2022-09-14 17:36:37'),
(15, 'popo', 'lo@gmail.com', '2222', '2022-09-15 09:02:17', '2022-09-15 09:02:17'),
(16, 'joujou', 'jou@gmail.com', '8778', '2022-09-15 13:22:40', '2022-09-15 13:22:40'),
(17, 'laure', 'l@gmail.com', '4444', '2022-09-15 14:17:39', '2022-09-15 14:17:39'),
(18, 'florent', 'flo@gmail.com', '2000', '2022-09-15 14:55:10', '2022-09-15 14:55:10'),
(19, 'Fleur', 'fleur@gmail.com', '6885', '2022-09-16 08:42:46', '2022-09-16 08:42:46'),
(20, 'shera', 'sher@gmail.com', '6996', '2022-09-16 13:42:16', '2022-09-16 13:42:16'),
(21, 'Leroy', 'le@gmail.com', '2112', '2022-09-16 17:40:33', '2022-09-16 17:40:33'),
(22, 'vano', 'vano@gmail.com', '0354', '2022-09-16 17:42:20', '2022-09-16 17:42:20'),
(23, 'Boris', 'boris@gmail.com', '9010', '2022-09-16 17:44:41', '2022-09-16 17:44:41'),
(24, 'flora', 'lo@gmail.com', '0000', '2022-09-16 17:53:10', '2022-09-16 17:53:10'),
(25, 'Jean', 'jean@gmail.com', '4545', '2022-09-16 18:00:28', '2022-09-16 18:00:28'),
(26, 'Bond', 'bond@gmail.com', '8888', '2022-09-16 18:23:47', '2022-09-16 18:23:47'),
(27, 'paul', 'paul@gmail.com', '8778', '2022-09-18 13:15:45', '2022-09-18 13:15:45'),
(28, 'paul', 'paul@gmail.com', '5445', '2022-09-18 13:16:27', '2022-09-18 13:16:27'),
(29, 'gloria', 'glo@gmail.com', '0000', '2022-09-19 00:22:24', '2022-09-19 00:22:24'),
(30, 'godwin', 'god@gmail.com', '6997', '2022-09-20 10:03:25', '2022-09-20 10:03:25'),
(31, 'love', 'love@gmail.com', '2331', '2022-09-20 10:05:23', '2022-09-20 10:05:23'),
(32, 'kofi', 'kof@gmail.com', '7777', '2022-09-20 10:06:59', '2022-09-20 10:06:59'),
(33, 'lucien', 'lucien25@gmail.com', '6319', '2022-09-20 10:11:08', '2022-09-20 10:11:08'),
(34, 'gros', 'gros@gmail.com', '0000', '2022-09-20 10:13:19', '2022-09-20 10:13:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_artist_id` (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
