-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zedaid_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_services`
--

CREATE TABLE `wp_services` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `service_status` varchar(255) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `enable_map` tinyint(4) NOT NULL DEFAULT 1,
  `enable_category_filter` tinyint(4) NOT NULL DEFAULT 1,
  `enable_search_bar` tinyint(4) NOT NULL DEFAULT 1,
  `enable_statistics` tinyint(4) NOT NULL DEFAULT 1,
  `status_label1` varchar(255) DEFAULT NULL,
  `status_label2` varchar(255) DEFAULT NULL,
  `status_label3` varchar(255) DEFAULT NULL,
  `status_label4` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive, 2 = Deleted',
  `admin_approved` tinyint(4) NOT NULL DEFAULT 0,
  `zed_verified` tinyint(4) NOT NULL DEFAULT 0,
  `is_draft` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = draft',
  `added_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_services`
--
ALTER TABLE `wp_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_services`
--
ALTER TABLE `wp_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
