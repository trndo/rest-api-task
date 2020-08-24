-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Aug 24, 2020 at 02:13 PM
-- Server version: 8.0.19
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
-- Database: `db_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'Classroom stub_name #0', '2020-08-24 14:10:13', 1),
(2, 'Classroom stub_name #1', '2020-08-24 14:10:13', 0),
(3, 'Classroom stub_name #2', '2020-08-24 14:10:13', 1),
(4, 'Classroom stub_name #3', '2020-08-24 14:10:13', 0),
(5, 'Classroom stub_name #4', '2020-08-24 14:10:13', 1),
(6, 'Classroom stub_name #5', '2020-08-24 14:10:13', 0),
(7, 'Classroom stub_name #6', '2020-08-24 14:10:13', 1),
(8, 'Classroom stub_name #7', '2020-08-24 14:10:13', 0),
(9, 'Classroom stub_name #8', '2020-08-24 14:10:13', 1),
(10, 'Classroom stub_name #9', '2020-08-24 14:10:13', 0),
(11, 'Classroom stub_name #10', '2020-08-24 14:10:13', 1),
(12, 'Classroom stub_name #11', '2020-08-24 14:10:13', 0),
(13, 'Classroom stub_name #12', '2020-08-24 14:10:13', 1),
(14, 'Classroom stub_name #13', '2020-08-24 14:10:13', 0),
(15, 'Classroom stub_name #14', '2020-08-24 14:10:13', 1),
(16, 'Classroom stub_name #15', '2020-08-24 14:10:13', 0),
(17, 'Classroom stub_name #16', '2020-08-24 14:10:13', 1),
(18, 'Classroom stub_name #17', '2020-08-24 14:10:13', 0),
(19, 'Classroom stub_name #18', '2020-08-24 14:10:13', 1),
(20, 'Classroom stub_name #19', '2020-08-24 14:10:13', 0),
(21, 'Classroom stub_name #20', '2020-08-24 14:10:13', 1),
(22, 'Classroom stub_name #21', '2020-08-24 14:10:13', 0),
(23, 'Classroom stub_name #22', '2020-08-24 14:10:13', 1),
(24, 'Classroom stub_name #23', '2020-08-24 14:10:13', 0),
(25, 'Classroom stub_name #24', '2020-08-24 14:10:13', 1),
(26, 'Classroom stub_name #25', '2020-08-24 14:10:13', 0),
(27, 'Classroom stub_name #26', '2020-08-24 14:10:13', 1),
(28, 'Classroom stub_name #27', '2020-08-24 14:10:13', 0),
(29, 'Classroom stub_name #28', '2020-08-24 14:10:13', 1),
(30, 'Classroom stub_name #29', '2020-08-24 14:10:13', 0),
(31, 'Classroom stub_name #30', '2020-08-24 14:10:13', 1),
(32, 'Classroom stub_name #31', '2020-08-24 14:10:13', 0),
(33, 'Classroom stub_name #32', '2020-08-24 14:10:13', 1),
(34, 'Classroom stub_name #33', '2020-08-24 14:10:13', 0),
(35, 'Classroom stub_name #34', '2020-08-24 14:10:13', 1),
(36, 'Classroom stub_name #35', '2020-08-24 14:10:13', 0),
(37, 'Classroom stub_name #36', '2020-08-24 14:10:13', 1),
(38, 'Classroom stub_name #37', '2020-08-24 14:10:13', 0),
(39, 'Classroom stub_name #38', '2020-08-24 14:10:13', 1),
(40, 'Classroom stub_name #39', '2020-08-24 14:10:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200822085940', '2020-08-24 14:09:41', 89);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
