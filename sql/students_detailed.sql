-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 06:47 AM
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
-- Database: `colleges`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_detailed`
--

CREATE TABLE `students_detailed` (
  `name` varchar(30) NOT NULL,
  `id` int(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `grade` int(30) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_detailed`
--

INSERT INTO `students_detailed` (`name`, `id`, `course`, `grade`, `image`) VALUES
('Andre', 500002, 'CMPG', 15, NULL),
('Lucas', 84526, 'Art', 50, NULL),
('Tiago', 1005, 'Geography', 120, NULL),
('Mike', 475965, 'Oceanography', 12, NULL),
('Matheus', 40005, 'Portuguese', 87, NULL),
('Andrew', 515151, 'I.T', 20, NULL),
('Paula', 200684, 'Math', 64, NULL),
('Vitor', 10009, 'English', 41, NULL),
('Pablo', 75899, 'Chemistry', 45, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
