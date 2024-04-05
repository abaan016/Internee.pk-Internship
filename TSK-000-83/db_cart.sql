-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment` varchar(50) NOT NULL,
  `Create_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `price`, `image`, `product_id`, `payment`, `Create_At`, `city`, `state`, `zipcode`) VALUES
(65, 'shoaib', '564363', 'customer@gmail.com', 'dffgfd342', '2', 'Men Sports shoes', '1499', 'Men Sports shoes.jpg', '12', 'Cash On Delivery', '2023-08-24 02:30:17', 'khi', 'sindh', '6564'),
(66, 'tauqeer', '03322161008', 'adsad@gmail.com', 'msg airport', '2', 'Men Sports shoes', '1499', 'Men Sports shoes.jpg', '12', 'Cash On Delivery', '2023-08-24 03:05:23', 'karachi', 'malir', '1540'),
(67, '', '', '', '', '2', 'Boys Trendy Slipe-On', '1299', 'Boys Trendy Slipe-Ons.jpg', '15', 'Cash On Delivery', '2024-04-05 18:13:40', '', '', ''),
(68, '', '', '', '', '2', 'Boys Trendy Slipe-On', '1299', 'Boys Trendy Slipe-Ons.jpg', '15', 'Cash On Delivery', '2024-04-05 18:21:47', '', '', ''),
(69, '', '', '', '', '2', 'Men Training Shoes', '2999', 'Men Training Shoes.jpg', '11', 'Cash On Delivery', '2024-04-05 18:21:47', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `CartId` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Pprice` int(11) NOT NULL,
  `IP_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`CartId`, `Pid`, `Pprice`, `IP_Address`) VALUES
(18, 15, 1299, '::1'),
(19, 11, 2999, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tblcat`
--

CREATE TABLE `tblcat` (
  `Cid` int(11) NOT NULL,
  `Cname` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcat`
--

INSERT INTO `tblcat` (`Cid`, `Cname`, `Status`) VALUES
(4, ' Man', 'yes'),
(5, 'kids', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`name`, `email`, `subject`, `message`) VALUES
('admin', 'admin@gmail.com', 'Contect', 'Hello'),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `Pid` int(11) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `Pprice` int(11) NOT NULL,
  `Pdescription` text NOT NULL,
  `Pimage` varchar(50) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`Pid`, `Pname`, `Pprice`, `Pdescription`, `Pimage`, `CategoryId`) VALUES
(11, 'Men Training Shoes', 2999, 'Training shoes are built with a focus on providing support to different parts of the foot. They often have reinforced midsoles and heel counters to help stabilize the foot during lateral movements, jumps, and weightlifting.', 'Men Training Shoes.jpg', 4),
(12, 'Men Sports shoes', 1499, 'Sports shoes prioritize comfort, often featuring cushioning technologies that absorb impact and reduce strain on the feet and joints during activities like running, jumping, and walking.', 'Men Sports shoes.jpg', 4),
(13, 'Comfy Slip-On Athletic Shoes', 1599, 'Comfort is a primary focus of these shoes. They often feature cushioning and padding in the insole and sometimes in the midsole to provide a plush and comfortable feel during wear.', 'Comfy Slip-On Athletic Shoes.jpg', 4),
(14, 'Men Lace-Up Performance Shoes', 1799, 'The lace-up closure system enables wearers to adjust the fit of the shoes to their individual foot shape and size. This customization helps provide a snug and supportive feel, which is crucial for activities that involve rapid movements and changes in direction.', 'Men Lace-Up Performance Shoes.jpg', 4),
(15, 'Boys Trendy Slipe-On', 1299, 'Trendy slip-on shoes are designed for quick and effortless wearing. Boys can easily slide their feet into the shoes without the need for laces or fasteners.', 'Boys Trendy Slipe-Ons.jpg', 5),
(16, 'Comfy Boys Shoes', 1399, 'Comfort is a central aspect of these shoes, often achieved through cushioned insoles or midsoles that absorb impact and reduce strain on young feet.', 'Comfy Boys Shoes.jpg', 5),
(17, 'Boys Smart Velcro Shoes', 1999, 'Smart Velcro shoes for boys often feature a refined design with clean lines and a polished finish, making them suitable for dressier events and occasions.', 'Boys Smart Velcro Shoes.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblsignup`
--

CREATE TABLE `tblsignup` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsignup`
--

INSERT INTO `tblsignup` (`Id`, `Name`, `Email`, `Password`) VALUES
(5, 'admin', 'admin@gmail.com', '12345'),
(6, 'customer', 'customer@gmail.com', '3def184ad8f4755ff269862ea77393dd'),
(7, 'shoaib', 's@gmail.com', '698d51a19d8a121ce581499d7b701668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`CartId`);

--
-- Indexes for table `tblcat`
--
ALTER TABLE `tblcat`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `tblsignup`
--
ALTER TABLE `tblsignup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcat`
--
ALTER TABLE `tblcat`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblsignup`
--
ALTER TABLE `tblsignup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `tblcat` (`Cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
