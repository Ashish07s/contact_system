-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:34 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contacts` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contacts`, `companyname`, `date`) VALUES
(1, 'Demilade', 'Ayo', 'Hassan', 'demify@gmail.com', '08012839483', 'Apex Limited', 1542116925),
(2, 'Peter', 'Saint', 'Obi', 'peterobi@yahoo.com', '09012394852', 'PDP Limited', 1542116929),
(3, 'Muhammed', '', 'Buhari', 'mbuhari@ymail.com', '08012345698', 'APC PLC.', 1542116990),
(4, 'Yusuf', 'Babatunde', 'Fashola', 'yfashola@gmail.com', '07098506950', 'BRT Enterprises', NULL),
(5, 'Inyene', '', 'Okorocha', 'oinyene@yahoo.com', '08012323459', 'Statue Base Limited.', NULL),
(6, 'Abdulxxx', 'Idris', 'Melaye', 'iammelaye@hotmail.com', '09038472819', 'God is Good Ventures', NULL),
(7, 'Ajayi', ' ', 'Crowther', 'ajayic@gmail.com', '09097858568', 'Ajayi Corps.', NULL),
(8, 'Raji', '', 'Fashola', 'rajifasho@outlook.com', '09089854586', 'BRT Motors', NULL),
(19, 'xx', ' xx', 'xx', 'x@gmail.com', '', '!!!!!!!!!!!!!ll', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
