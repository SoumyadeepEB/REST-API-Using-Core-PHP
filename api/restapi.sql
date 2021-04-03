-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 12:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`) VALUES
(1, 'Soumyadeep Ghosh', 24),
(2, 'Souvik Karmakar', 23),
(3, 'Rahul Das', 25),
(4, 'Denis Richi', 72),
(5, 'Raju Kayal', 25),
(6, 'Subhasis Ghosh', 55),
(7, 'Raj Majumder', 21),
(8, 'Kamal Saha', 50),
(9, 'Subho Pal', 35),
(10, 'Bikash Saha', 28),
(11, 'Elon Musk', 39),
(13, 'Salman Khan', 54),
(14, 'Sahruk Khan', 52),
(15, 'Sachin Tendulkar', 42),
(16, 'Guido Van Rossam', 57),
(21, 'Sannati Singha', 22),
(22, 'Gopa Ghosh', 49),
(23, 'Subhasis Ghosh', 55),
(24, 'John Doe', 43),
(26, 'Bimal Kar', 52),
(27, 'Gautam Das', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
