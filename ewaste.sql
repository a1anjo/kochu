-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `adname` varchar(100) NOT NULL,
  `adrole` varchar(150) NOT NULL,
  `ademail` varchar(150) NOT NULL,
  `adpass` varchar(100) NOT NULL,
  `adpic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `adname`, `adrole`, `ademail`, `adpass`, `adpic`) VALUES
(1, 'Alan Joseph', 'Site Administrator', 'aj@gmail.com', '123', 'team1.jpg'),
(2, 'Steffy Somy', 'Content Administrator', 'ss@gmail.com', '123', 'team2.jpg'),
(3, 'Elna Saji', 'Marketing Manager', 'es@gmail.com', '123', 'team3.jpg'),
(4, 'Noel Xavier', 'Financial Administrator', 'nx@gmail.com', '123', 'team4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(11) NOT NULL,
  `company` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `isodoc` varchar(100) NOT NULL,
  `r2doc` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `company`, `email`, `password`, `phone`, `profilepic`, `isodoc`, `r2doc`, `status`) VALUES
(27, 'Infosys', 'buyer1@gmail.com', '123', '123456789', 'elias (1).jpg', 'iso.jpg', 'r2.png', 'APPROVED'),
(29, 'Safran', 'buyer3@gmail.com', '123', '1234567890', 'team1.jpg', 'iso.jpg', 'r2.png', 'APPROVED'),
(30, 'Wipro', 'buyer2@gmail.com', '123', '1234567890', 'Profile_pic_398822.jpeg', 'iso.jpg', 'r2.png', 'APPROVED'),
(31, 'TCS', 'buyer4@gmail.com', '123', '123', 'elias.jpg', 'iso.jpg', 'r2.png', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `communication_requests`
--

CREATE TABLE `communication_requests` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `approval_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communication_requests`
--

INSERT INTO `communication_requests` (`rid`, `pid`, `bid`, `approval_status`, `created_at`, `updated_at`, `sid`) VALUES
(12, 17, 27, 'approved', '2023-10-01 12:13:58', '2023-10-01 12:14:56', 5),
(13, 18, 27, 'approved', '2023-10-01 12:28:48', '2023-10-01 12:58:49', 6),
(14, 17, 30, 'approved', '2023-10-01 12:55:31', '2023-10-01 13:01:13', 5),
(15, 18, 30, 'rejected', '2023-10-01 12:57:03', '2023-10-01 12:58:50', 6),
(18, 17, 30, 'approved', '2023-10-01 12:59:47', '2023-10-01 13:01:14', 5),
(19, 19, 27, 'rejected', '2023-10-01 13:08:45', '2023-10-01 13:16:53', 6),
(22, 16, 27, 'pending', '2023-10-01 13:14:12', '2023-10-01 13:14:12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `sid` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descp` varchar(250) NOT NULL,
  `client` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `sid`, `title`, `descp`, `client`, `address`, `phone`, `email`, `category`, `image1`, `status`) VALUES
(16, 5, 'Mobile Processors', 'this is acollection of mobile waste', 'UST', 'Xy,\r\nhhg,\r\nkk road,\r\n898876', '98755788888', 'seller1@gmail.com', 'Mobile Waste', 'slide1.jpg', 'APPROVED'),
(17, 5, 'Computer Chip', ' this is a collection of  pc chips', 'UST', 'cd,\r\nkkl,\r\nloo,\r\n787887', '287654332', 'seller1@gmail.com', 'Computer Waste', 'slide2.jpg', 'APPROVED'),
(18, 6, 'Iphone Chip ', 'this is a collection of apples chip', 'Mitsogo', 'cc,\r\nkk,\r\nllo,\r\n887676', '9876543', 'seller2@gmail.com', 'Mobile Waste', 'mobile.jpg', 'APPROVED'),
(19, 6, 'Mac chip', 'this is a collection of  mac chips', 'Mitsogo', 'cd,\r\nkk,\r\noo,\r\n0897', '4567890', 'seller2@gmail.com', 'Computer Waste', 'ee.jpg', 'APPROVED'),
(20, 8, 'Test Waste', 'this is an example', 'Canon', 'vsd,\r\nvsv,\r\nsv,\r\n908', '34567890', 'seller3@gmail.com', 'Computer Waste', 'p1.webp', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sid` int(11) NOT NULL,
  `scompany` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `sprofilepic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `scompany`, `email`, `password`, `sprofilepic`) VALUES
(5, 'UST', 'seller1@gmail.com', '123', 'OIG.jpg'),
(6, 'Mitsogo', 'seller2@gmail.com', '123', 'team1.jpg'),
(8, 'Canon', 'seller3@gmail.com', '123', 'team4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `communication_requests`
--
ALTER TABLE `communication_requests`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `communication_requests`
--
ALTER TABLE `communication_requests`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communication_requests`
--
ALTER TABLE `communication_requests`
  ADD CONSTRAINT `communication_requests_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
  ADD CONSTRAINT `communication_requests_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `buyer` (`bid`),
  ADD CONSTRAINT `communication_requests_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `seller` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
