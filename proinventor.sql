-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 02:54 PM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'Samsung', '1'),
(2, 'Sony', '1'),
(4, 'Lenovo', '1'),
(5, 'HP', '1'),
(6, 'Huawei', '1'),
(7, 'Adobe', '1');

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
(7, 0, 'Laptop', '1'),
(8, 0, 'Modem', '1'),
(9, 0, 'Software', '1'),
(10, 0, 'Flash Disk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `product_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_price`, `product_stock`, `added_date`, `product_status`) VALUES
(1, 2, 1, 'Samsung Galaxy S9', 12000000, 200, '2018-03-17', '1');

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
(1, 'Rachman', 'rachmanforniandi@gmail.com', '$2y$08$ZFtVrnybBMDUgX41wUtEnuf5FphQ69bPNdOiQuUZw5thGQvvLSQVa', 'admin', '2018-03-05', '2018-03-17 11:03:31', ''),
(2, 'Test', 'rachmanforniandi1st@gmail.com', '$2y$08$td1YoP4IJx/jvUFCV6O1uOXgvZrBeoRK9ONrZK0tLeOcM7Kij.kt2', 'admin', '2018-03-05', '2018-03-05 05:03:33', ''),
(3, 'Rachman Ridwan', 'rachmanridwan@gmail.com', '$2y$08$h3/stLWz7LQxRW1CEPeWS.YU06vSN1HCd2DsNV4OVLwzE9ihGPB7W', 'admin', '2018-03-06', '2018-03-08 08:03:15', ''),
(4, 'Firda Ayuwima', 'firdaayuwima@gmail.com', '$2y$08$Sewkz4Lt.RXk4rG4b7qTeutzoDTMp53/AvWfm1fvquUXSCUZY8Sa6', 'admin', '2018-03-08', '2018-03-08 09:03:37', ''),
(5, 'Yanto Kurniawan', 'yantokurniawan@gmail.com', '$2y$08$GgDOK4cAxN751Titpc8VaeNL94rer2GS7lRaVK10X./vOoDlG1gom', 'user', '2018-03-08', '2018-03-08 09:03:26', ''),
(6, 'Erina Michella', 'erinamichella@gmail.com', '$2y$08$d90srUpvLltmePtb0CM2WOFwUd5TMZehsuIRpcLCko0Wzs3BHCrp.', 'admin', '2018-03-14', '2018-03-14 08:03:48', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
