-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 05:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addin`
--

CREATE TABLE `addin` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `security` varchar(100) NOT NULL,
  `security_ans` varchar(100) NOT NULL,
  `role` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addin`
--

INSERT INTO `addin` (`username`, `password`, `security`, `security_ans`, `role`) VALUES
('nhia85', 'password01', 'Favorite game', 'Bob the Builder', 'Business'),
('amalan25', 'password01', 'answer', 'answer', 'User'),
('test123', 'password01', 'nothing', 'nothing', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `payment` int(80) NOT NULL,
  `amount` int(80) NOT NULL,
  `product` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `payment`, `amount`, `product`) VALUES
(1, 'nhia85', 0, 20, 'Guilty Crown,                             '),
(2, 'nhia85', 43, 1, 'Girl in a Dungeon,                             '),
(3, 'nhia85', 248, 6, 'Guilty Crown, Girl in a Dungeon,                             '),
(4, 'nhia85', 142, 4, 'Guilty Crown, Girl in a Dungeon, Seraph of the End, Gate!,                             ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `product_img` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_img`, `price`) VALUES
(1, 'PD1001', 'Guilty Crown', 'Action, Drama, Sci-Fi, Super Power', '01.jpg', '01a.jpg', '15.00'),
(2, 'PD1002', 'Girl in a Dungeon', 'Action, Adventure, Comedy, Fantasy, Romance', '02.jpg', '02a.jpg', '35.00'),
(3, 'PD1003', 'Seraph of the End', 'Action, Drama, Shounen, Supernatural, Vampire', '03.jpg', '01a.jpg', '35.00'),
(4, 'PD1004', 'Cloud vs. Sephiroth', 'Action, Adventure, Drama, Fantasy, Sci-Fi', '04.jpg', '01a.jpg', '35.00'),
(5, 'PD1005', 'No Game No Life', 'Adventure, Comedy, Ecchi, Fantasy, Game, Supernatural', '05.jpg', '01a.jpg', '35.00'),
(6, 'PD1006', 'Sword Art Online', 'Action, Adventure, Fantasy, Game, Romance', '06.jpg', '01a.jpg', '35.00'),
(7, 'PD1007', 'Indestructible Doll', 'Action, Ecchi, Fantasy, School, Seinen', '07.jpg', '01a.jpg', '35.00'),
(8, 'PD1008', '35 Shiken Shoutai', 'Action, Ecchi, Fantasy, Harem, Military, Romance, Supernatural', '08.jpg', '01a.jpg', '35.00'),
(9, 'PD1009', 'Gate!', 'Action, Adventure, Fantasy, Military', '09.jpg', '01a.jpg', '35.00'),
(10, 'PD1010', 'One Piece!', 'Action, Adventure, Comedy, Drama, Fantasy, Shounen, Super Power', '10.jpg', '01a.jpg', '35.00'),
(11, 'PD1011', 'One Punch', 'Action, Comedy, Parody, Sci-Fi, Seinen, Super Power, Supernatural', '11.jpg', '01a.jpg', '35.00'),
(12, 'PD1012', 'Tokyo Ghoul', 'Action, Drama, Horror, Mystery, Psychological, Seinen, Supernatural', '12.jpg', '01a.jpg', '35.00'),
(13, 'PD1013', 'Bleach', 'Action, Comedy, Shounen, Super Power, Supernatural', '13.jpg', '01a.jpg', '35.00'),
(14, 'PD1014', 'Fairy Tail', 'Action, Adventure, Comedy, Fantasy, Magic, Shounen', '14.jpg', '01a.jpg', '35.00'),
(15, 'PD1015', 'Irregular High School', 'Magic, Romance, School, Sci-Fi, Supernatural', '15.jpg', '01a.jpg', '35.00'),
(16, 'PD1016', 'Log Horizon', 'Action, Adventure, Fantasy, Game, Magic, Shounen', '16.jpg', '01a.jpg', '35.00'),
(17, 'PD1017', 'Gundam Seed', 'Action, Drama, Mecha, Military, Romance, Sci-Fi, Space', '17.jpg', '01a.jpg', '35.00'),
(18, 'PD1018', 'Zero no tsukaima', 'Action, Adventure, Comedy, Ecchi, Fantasy, Harem, Magic, Romance, School', '18.jpg', '01a.jpg', '35.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
