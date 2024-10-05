-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 06:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `cart_system`

-- Table structure for table `users`
CREATE TABLE users (
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    District varchar(200),
    Street varchar(200),
    Password varchar(200)
);

INSERT INTO `users` (`ID`, `Username`, `Email`, `District`, `Street`, `Password`) VALUES
(1, 'suhan', 'suhan@gmail.com', 'Bhaktapur', 'Thimi', 'suhan'), 
(2, 'rasik', 'rasik@gmail.com', 'Bhaktapur', 'Bode', 'rasik');

-- Table structure for table `admin`
CREATE TABLE admin (
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Password varchar(200)
);

INSERT INTO `admin` (`ID`, `Username`, `Email`, `Password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- Table structure for table `cart`
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `product`
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code_2` (`product_code`),
  KEY `product_code` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `product`
INSERT INTO `product` (`product_name`, `product_price`, `product_qty`, `product_image`, `product_code`) VALUES
('Aloo Chop', '200', 1, 'assets/aloo_chop.jpg', 'p1000'),
('Chicken Chili', '300', 1, 'assets/chicekn_chili.jpg', 'p1001'),
('Chicken Pakora', '400', 1, 'assets/chicken_pakora.jpg', 'p1002'),
('Duck Choila', '500', 1, 'assets/duck_choila.jpg', 'p1003'),
('Rice Pudding', '200', 1, 'assets/rice_pudding.jpg', 'p1004'),
('Nepali Doughnuts', '100', 1, 'assets/nepali_doughnuts.jpg', 'p1005');

-- AUTO_INCREMENT for dumped tables
ALTER TABLE `cart` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
ALTER TABLE `orders` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
ALTER TABLE `product` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7; -- Set this to your desired starting point

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
