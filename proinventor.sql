-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 08:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proinventor`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `parent_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_category`, `category_name`, `status`) VALUES
(1, 0, 'Electronics', '1'),
(2, 1, 'Mobile Phone', '1'),
(3, 0, 'Watch Gear', '1'),
(5, 0, 'Gadgets', '1'),
(6, 0, 'Garments', '1'),
(7, 0, 'Laptop', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_level` enum('admin','user') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `user_level`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Rachman', 'rachmanforniandi@gmail.com', '$2y$08$ZFtVrnybBMDUgX41wUtEnuf5FphQ69bPNdOiQuUZw5thGQvvLSQVa', 'admin', '2018-03-05', '2018-03-14 06:03:17', ''),
(2, 'Test', 'rachmanforniandi1st@gmail.com', '$2y$08$td1YoP4IJx/jvUFCV6O1uOXgvZrBeoRK9ONrZK0tLeOcM7Kij.kt2', 'admin', '2018-03-05', '2018-03-05 05:03:33', ''),
(3, 'Rachman Ridwan', 'rachmanridwan@gmail.com', '$2y$08$h3/stLWz7LQxRW1CEPeWS.YU06vSN1HCd2DsNV4OVLwzE9ihGPB7W', 'admin', '2018-03-06', '2018-03-08 08:03:15', ''),
(4, 'Firda Ayuwima', 'firdaayuwima@gmail.com', '$2y$08$Sewkz4Lt.RXk4rG4b7qTeutzoDTMp53/AvWfm1fvquUXSCUZY8Sa6', 'admin', '2018-03-08', '2018-03-08 09:03:37', ''),
(5, 'Yanto Kurniawan', 'yantokurniawan@gmail.com', '$2y$08$GgDOK4cAxN751Titpc8VaeNL94rer2GS7lRaVK10X./vOoDlG1gom', 'user', '2018-03-08', '2018-03-08 09:03:26', ''),
(6, 'Erina Michella', 'erinamichella@gmail.com', '$2y$08$d90srUpvLltmePtb0CM2WOFwUd5TMZehsuIRpcLCko0Wzs3BHCrp.', 'admin', '2018-03-14', '2018-03-14 08:03:48', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
