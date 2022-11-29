-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2022 at 01:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(12) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'Corporate'),
(2, 'Minister'),
(3, 'IT'),
(4, 'Financial');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_register`
--

CREATE TABLE `staff_register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_register`
--

INSERT INTO `staff_register` (`id`, `first_name`, `last_name`, `department_name`, `position`, `status`) VALUES
(1, 'ishimwe', 'Deborah', 'Corporate', 'It', '1'),
(3, 'sdjfhds', 'sdfjs', 'Minister', 'sdfd', '1'),
(4, 'sdjfhds', 'sdfjs', 'Minister', 'sdfd', '0'),
(5, 'nnn', 'nnnn', 'Minister', 'nnn', '1'),
(6, 'eeee', 'eee', 'Corporate', 'eee', '1'),
(7, 'ook', 'HJJ', 'Corporate', 'sd', NULL),
(8, 'fdf', 'fdfd', 'Minister', 'dfd', '1'),
(9, 'kabera', 'marie @gmail.com', 'Corporate', 'it', NULL),
(10, 'kabera', 'marie @gmail.com', 'Corporate', 'it', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'uwase', 'uwase@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'niyonkuru', 'niyonkuru@gmail.com', '202cb962ac59075b964b07152d234b70', 'HR'),
(3, 'fifi', 'fifi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Financial'),
(4, 'uwineza ', 'uwineza@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(5, 'john', 'john@gmail.com', '6d40e095b7f43848dc76ec017592da29', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `staff_register`
--
ALTER TABLE `staff_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_register`
--
ALTER TABLE `staff_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
