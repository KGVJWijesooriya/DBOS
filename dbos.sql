-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230721.c3c729da0b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 10:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventor`
--

CREATE TABLE `inventor` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_No` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventor`
--

INSERT INTO `inventor` (`id`, `p_No`, `barcode`, `Name`, `Discription`, `Cost`, `Price`, `qty`) VALUES
(1, '67', 'Hic repudiandae aute', 'Denise Alexander', 'Ad proident atque f', 0, 67, 0),
(2, '32', 'Ut non fuga Sequi q', 'Haley Clarke', 'Itaque amet consequ', 0, 359, 0),
(3, 'Veniam magna atque ', 'Non est commodo vol', 'Megan Head', 'Voluptatibus unde cu', 0, 881, 0),
(4, '16', 'Esse est aliquid im', 'Bruce Sellers', 'Porro voluptatum in ', 0, 611, 0),
(5, '26', 'Eius consequatur Qu', 'Emerald Mcconnell', 'In magni eos quos ve', 0, 992, 0),
(6, '93', 'Itaque eaque nisi ea', 'Venus Stevens', 'Amet distinctio La', 0, 26, 0),
(7, '13', 'Voluptate quaerat do', 'Preston Petty', 'Commodo eaque dolore', 0, 826, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(10) NOT NULL,
  `Name` text NOT NULL,
  `phone_No` int(10) NOT NULL,
  `address` text NOT NULL,
  `N_Id Number` text NOT NULL,
  `photo` text NOT NULL,
  `role` text NOT NULL,
  `Access_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Madonna Strong', 'vimukthi200020@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'Keegan Kirk', 'wazelazav@mailinator.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventor`
--
ALTER TABLE `inventor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventor`
--
ALTER TABLE `inventor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
