-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2023 at 07:06 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int NOT NULL AUTO_INCREMENT,
  `adname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `adrole` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `ademail` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `adpass` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `adpic` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `adname`, `adrole`, `ademail`, `adpass`, `adpic`) VALUES
(1, 'Alan Joseph', 'Site Administrator', 'alanjosephv29@gmail.com', '123', 'team1.jpg'),
(2, 'Steffy Somy', 'Content Administrator', 'steffysomy02@gmail.com', '123', 'team2.jpg'),
(3, 'Elna Saji', 'Marketing Manager', 'elnasaji221@gmail.com', '123', 'team3.jpg'),
(4, 'Noel Xavier', 'Financial Administrator', 'noelxavier71@gmail.com', '123', 'team4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `company` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profilepic` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `isodoc` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `r2doc` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `company`, `email`, `password`, `phone`, `profilepic`, `isodoc`, `r2doc`, `status`) VALUES
(32, 'Life Line Enterprise', 'lifelineenterprises@gmail.com', 'lle@123', '8590997671', 'download.jpg', 'ISO-14001-2015.jpg', 'R2c.png', 'APPROVED'),
(33, 'Aspire Greens', 'aspiregreens@gmail.com', '123@aspire', '8590997671', 'Absolute_Reality_v16_generate_a_logo_for_a_electronic_scrap_bu_1.jpg', 'Certificate1.jpg', 'R2c .jpg', 'APPROVED'),
(34, 'B4 Solutions', 'B4s@gmail.com', '123@b4s', '8089431772', '16559855_605.jpg', 'images.jpg', 'images.jpg', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `communication_requests`
--

DROP TABLE IF EXISTS `communication_requests`;
CREATE TABLE IF NOT EXISTS `communication_requests` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `bid` int NOT NULL,
  `approval_status` enum('pending','approved','rejected') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sid` int DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `pid` (`pid`),
  KEY `bid` (`bid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descp` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `client` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image1` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `sid`, `title`, `descp`, `client`, `address`, `phone`, `email`, `category`, `image1`, `status`) VALUES
(21, 9, 'Class 2A Pcb', 'Printed Circuit Board - Bad Condition', 'Techonus', 'AR Traders,\r\nNear LFPS,Kollamula', '8075101530', 'abidhhabeeb@gmail.com', 'Computer Waste', 'class1apcb.webp', 'APPROVED'),
(22, 11, 'Computer Plugs', 'Sold as-is, with no guarantees of functionality.', 'Halfmoon Enterprises', '2nd Floor, NITS Tower, MC Road, Neelimangalam, Perumbaikkad, Kottayam - 686016 (Opposite to Federal Bank)', '8113835692', 'halfmoonentertainment616@gmail.com', 'Computer Waste', 'computer plugss.webp', 'APPROVED'),
(23, 11, 'Electronic mobile phone scrap', 'Non Resuable condition,looking for interested buyers.', 'Halfmoon Enterprises', 'Kazhakuttam Menamkulam Rd, Thiruvananthapuram, Kerala 695582', '8113835692', 'halfmoonentertainment616@gmail.com', 'Mobile Waste', 'mobile-phone-scrap-5.webp', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `scompany` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `sprofilepic` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `scompany`, `email`, `password`, `sprofilepic`) VALUES
(9, 'Techonus', 'abidhhabeeb@gmail.com', '123@', 'download (1).jpg'),
(10, 'D company', 'dionajoseph@gmail.com', 'dcompany123@', 'IMG-20230921-WA0263.jpg'),
(11, 'Halfmoon Enterprises', 'halfmoonentertainment616@gmail.com', 'hme@123', 'Screenshot_2023-10-02-00-56-12-81_1c337646f29875672b5a61192b9010f9-fotor-2023100205755.png');

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
