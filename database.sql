-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 02:28 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfriendsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `email1` varchar(30) NOT NULL,
  `email2` varchar(30) NOT NULL,
  KEY `email1` (`email1`),
  KEY `email2` (`email2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`email1`, `email2`) VALUES
('krishanshamod@gmail.com', 'sadeepadilharap@gmail.com'),
('hasini@gmail.com', 'issiwara@gmail.com'),
('hasini@gmail.com', 'devin@gmail.com'),
('kasun@gmail.com', 'kirana@gmail.com'),
('kasun@gmail.com', 'krishanshamod@gmail.com'),
('krishanshamod@gmail.com', 'kirana@gmail.com'),
('krishanshamod@gmail.com', 'hasini@gmail.com'),
('kirana@gmail.com', 'devin@gmail.com'),
('krishanshamod@gmail.com', 'devin@gmail.com'),
('krishanshamod@gmail.com', 'issiwara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `pass`) VALUES
('Krishan', 'krishanshamod@gmail.com', '123'),
('Sadeepa', 'sadeepadilharap@gmail.com', '123'),
('Kasun', 'kasun@gmail.com', '123'),
('Kirana', 'kirana@gmail.com', '123'),
('Devin', 'devin@gmail.com', '123'),
('Hasini', 'hasini@gmail.com', '123'),
('Issiwara', 'issiwara@gmail.com', '123'),
('Bhagya', 'bhagya@gmail.com', '123'),
('Sachithra', 'sachithra@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
