-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 01:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm_2021_admin`
--

CREATE TABLE `farm_2021_admin` (
  `id` int(10) NOT NULL,
  `farm_2021_admin_name` varchar(200) NOT NULL,
  `farm_2021_admin_email` varchar(200) NOT NULL,
  `farm_2021_admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_2021_admin`
--

INSERT INTO `farm_2021_admin` (`id`, `farm_2021_admin_name`, `farm_2021_admin_email`, `farm_2021_admin_password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `farm_2021_farmer`
--

CREATE TABLE `farm_2021_farmer` (
  `id` int(10) NOT NULL,
  `farm_2021_farmer_name` varchar(200) NOT NULL,
  `farm_2021_farmer_email` varchar(200) NOT NULL,
  `farm_2021_farmer_password` varchar(200) NOT NULL,
  `farm_2021_farmer_gender` varchar(200) NOT NULL,
  `farm_2021_farmer_phone` varchar(200) NOT NULL,
  `farm_2021_farmer_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_2021_farmer`
--

INSERT INTO `farm_2021_farmer` (`id`, `farm_2021_farmer_name`, `farm_2021_farmer_email`, `farm_2021_farmer_password`, `farm_2021_farmer_gender`, `farm_2021_farmer_phone`, `farm_2021_farmer_address`) VALUES
(3, 'farmer name', 'farmer@farmer.com', 'farmer', 'male', '9876543210', 'mysore');

-- --------------------------------------------------------

--
-- Table structure for table `farm_2021_order`
--

CREATE TABLE `farm_2021_order` (
  `id` int(10) NOT NULL,
  `farm_2021_order_name` varchar(200) NOT NULL,
  `farm_2021_order_price` varchar(200) NOT NULL,
  `farm_2021_order_category` varchar(200) NOT NULL,
  `farm_2021_order_quantity` varchar(200) NOT NULL,
  `farm_2021_order_farmer` varchar(200) NOT NULL,
  `farm_2021_order_user` varchar(200) NOT NULL,
  `farm_2021_order_date` varchar(200) NOT NULL,
  `farm_2021_order_address` varchar(500) NOT NULL,
  `farm_2021_order_image` varchar(200) NOT NULL,
  `farm_2021_order_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farm_2021_product`
--

CREATE TABLE `farm_2021_product` (
  `id` int(10) NOT NULL,
  `farm_2021_product_name` varchar(200) NOT NULL,
  `farm_2021_product_price` varchar(200) NOT NULL,
  `farm_2021_product_category` varchar(200) NOT NULL,
  `farm_2021_product_quantity` varchar(200) NOT NULL,
  `farm_2021_product_farmer` varchar(200) NOT NULL,
  `farm_2021_product_date` varchar(200) NOT NULL,
  `farm_2021_product_image` varchar(200) NOT NULL,
  `farm_2021_product_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_2021_product`
--

INSERT INTO `farm_2021_product` (`id`, `farm_2021_product_name`, `farm_2021_product_price`, `farm_2021_product_category`, `farm_2021_product_quantity`, `farm_2021_product_farmer`, `farm_2021_product_date`, `farm_2021_product_image`, `farm_2021_product_status`) VALUES
(8, 'Drum Stick', '50', 'vegetables', '25', 'farmer@farmer.com', '2021-07-12', 'images/drumstick.jpg', 'Available'),
(9, 'Cluster Bean', '35', 'vegetables', '40', 'farmer@farmer.com', '2021-07-12', 'images/clusterbean.jpg', 'Available'),
(10, 'Bitter Gourd', '50', 'vegetables', '30', 'farmer@farmer.com', '2021-07-12', 'images/bittergourd.jpg', 'Available'),
(11, 'Brinjal', '30', 'vegetables', '60', 'farmer@farmer.com', '2021-07-12', 'images/brinjal.jpg', 'Available'),
(12, 'Mangoes', '80', 'fruits', '40', 'farmer@farmer.com', '2021-07-12', 'images/mango.jpg', 'Available'),
(13, 'Apples', '150', 'fruits', '30', 'farmer@farmer.com', '2021-07-12', 'images/apples.jpg', 'Available'),
(14, 'Oranges', '50', 'fruits', '30', 'farmer@farmer.com', '2021-07-12', 'images/mango.jpg', 'Available'),
(15, 'Bananas', '40', 'fruits', '40', 'farmer@farmer.com', '2021-07-12', 'images/banana.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `farm_2021_user`
--

CREATE TABLE `farm_2021_user` (
  `id` int(10) NOT NULL,
  `farm_2021_user_name` varchar(200) NOT NULL,
  `farm_2021_user_email` varchar(200) NOT NULL,
  `farm_2021_user_password` varchar(200) NOT NULL,
  `farm_2021_user_gender` varchar(200) NOT NULL,
  `farm_2021_user_phone` varchar(200) NOT NULL,
  `farm_2021_user_address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_2021_user`
--

INSERT INTO `farm_2021_user` (`id`, `farm_2021_user_name`, `farm_2021_user_email`, `farm_2021_user_password`, `farm_2021_user_gender`, `farm_2021_user_phone`, `farm_2021_user_address`) VALUES
(3, 'user', 'user@user.com', 'user', 'male', '9876543211', 'mysore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farm_2021_admin`
--
ALTER TABLE `farm_2021_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_2021_farmer`
--
ALTER TABLE `farm_2021_farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_2021_order`
--
ALTER TABLE `farm_2021_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_2021_product`
--
ALTER TABLE `farm_2021_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_2021_user`
--
ALTER TABLE `farm_2021_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farm_2021_admin`
--
ALTER TABLE `farm_2021_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farm_2021_farmer`
--
ALTER TABLE `farm_2021_farmer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farm_2021_order`
--
ALTER TABLE `farm_2021_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `farm_2021_product`
--
ALTER TABLE `farm_2021_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `farm_2021_user`
--
ALTER TABLE `farm_2021_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
