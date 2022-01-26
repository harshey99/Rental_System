-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2019 at 11:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(20) NOT NULL,
  `job_id` varchar(20) DEFAULT 'NULL',
  `s_mail` varchar(50) DEFAULT '''NULL''',
  `c_mail` varchar(50) DEFAULT 'NULL',
  `status` varchar(20) DEFAULT '''''''NULL'''''''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `job_id`, `s_mail`, `c_mail`, `status`) VALUES
(1, '1', 'meeku@gmail.com', 'meekuprashant@gmail.com', '0'),
(2, '2', 'meeku@gmail.com', 'meekuprashant@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `adress` varchar(100) NOT NULL DEFAULT '''NULL''',
  `city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`name`, `email`, `pwd`, `phone`, `location`, `adress`, `city`) VALUES
('Meeku', 'meekuprashant@gmail.com', 'meekuprashant', '7209822149', 'delhi', 'delhi CP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `frrom` varchar(50) DEFAULT '''''''''''''''NULL''''''''''''''',
  `adress` varchar(100) DEFAULT 'NULL',
  `status` varchar(50) DEFAULT '''NULL''',
  `pwd` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`name`, `email`, `frrom`, `adress`, `status`, `pwd`, `phone`) VALUES
('Meeku', 'meeku@gmail.com', 'Ranchi', 'kokar chowk, lalpur Ranchi', 'single', 'meekumeeku', '1234567890'),
('yogi', 'yogi@gmail.com', 'mumbai', 'mumbai near beach side', 'Family', 'yogiyogi', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `job_id` int(4) NOT NULL,
  `company_name` varchar(50) DEFAULT 'NULL',
  `owner_name` varchar(50) DEFAULT '''NULL''',
  `city` varchar(50) DEFAULT '''''''NULL''''''',
  `state` varchar(50) DEFAULT '''NULL''',
  `address` varchar(200) DEFAULT '''NULL''',
  `pin_code` varchar(10) DEFAULT '''NULL''',
  `property_type` varchar(10) DEFAULT '''NULL''',
  `building_name` varchar(50) DEFAULT '''NULL''',
  `flor` varchar(20) DEFAULT '''NULL''',
  `deposit` varchar(20) DEFAULT '''NULL''',
  `rent` varchar(20) DEFAULT '''NULL''',
  `status` varchar(20) DEFAULT '''NULL''',
  `picsource` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`job_id`, `company_name`, `owner_name`, `city`, `state`, `address`, `pin_code`, `property_type`, `building_name`, `flor`, `deposit`, `rent`, `status`, `picsource`) VALUES
(1, 'Meeku', 'edw', 'advav', 'arevf', 'erfdbs', '2342334', 'ee', 'sfdbgbdrt', '3', '2323', '3e22', 'Family', NULL),
(2, 'Meeku', 'abc', 'delhi', 'delhi', 'meekusinha', '123456', '1bhk', 'abcdef', '2', '82398', '9823', 'Bachelor', 'property_image/abc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `job_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
