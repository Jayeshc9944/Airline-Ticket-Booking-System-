-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2019 at 08:09 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `air_plane`
--

DROP TABLE IF EXISTS `air_plane`;
CREATE TABLE IF NOT EXISTS `air_plane` (
  `p_id` varchar(10) NOT NULL,
  `p_name` varchar(35) NOT NULL,
  `tol_seats` int(10) NOT NULL,
  `tol_first_busi` int(5) NOT NULL,
  `tol_first` int(5) NOT NULL,
  `tol_busi` int(5) NOT NULL,
  `tol_eco` int(5) NOT NULL,
  `tol_book_seats` int(5) NOT NULL,
  `tol_first_busi_book` int(5) NOT NULL,
  `tol_first_book` int(5) NOT NULL,
  `tol_busi_book` int(5) NOT NULL,
  `tol_eco_book` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_plane`
--

INSERT INTO `air_plane` (`p_id`, `p_name`, `tol_seats`, `tol_first_busi`, `tol_first`, `tol_busi`, `tol_eco`, `tol_book_seats`, `tol_first_busi_book`, `tol_first_book`, `tol_busi_book`, `tol_eco_book`) VALUES
('p11', 'Gaint Eagal', 50, 5, 10, 15, 20, 0, 0, 0, 0, 0),
('p12', 'Red Sparrow', 50, 5, 10, 15, 20, 0, 0, 0, 0, 0),
('p13', 'Royal Gaint', 80, 10, 15, 20, 35, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `at_instance`
--

DROP TABLE IF EXISTS `at_instance`;
CREATE TABLE IF NOT EXISTS `at_instance` (
  `id` int(11) NOT NULL,
  `Member_id` int(11) NOT NULL,
  `login_stat` int(11) NOT NULL,
  `booking_stat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `at_instance`
--

INSERT INTO `at_instance` (`id`, `Member_id`, `login_stat`, `booking_stat`) VALUES
(15, 95624, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `ct_id` varchar(10) NOT NULL,
  `city_name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ct_id`, `city_name`) VALUES
('101', 'Mumbai,India'),
('102', 'Delhi,India'),
('103', 'Mysore,India'),
('104', 'Pune,India'),
('105', 'Bangalore,India');

-- --------------------------------------------------------

--
-- Table structure for table `class_fare`
--

DROP TABLE IF EXISTS `class_fare`;
CREATE TABLE IF NOT EXISTS `class_fare` (
  `class_id` varchar(20) NOT NULL,
  `class_name` varchar(55) NOT NULL,
  `fare` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_fare`
--

INSERT INTO `class_fare` (`class_id`, `class_name`, `fare`) VALUES
('c1', 'FIrst/Business', 8000),
('c2', 'Business/Economy', 6000),
('c3', 'FIrst', 7000),
('c4', 'Business', 5000),
('c5', 'Economy', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE IF NOT EXISTS `dates` (
  `date_id` varchar(3) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`date_id`, `date`) VALUES
('d01', '10/8/2019'),
('d02', '10/9/2019'),
('d03', '10/10/2019'),
('d04', '10/11/2019'),
('d05', '10/12/2019');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Member_id` int(5) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `Stat` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Member_id`, `Password`, `Stat`) VALUES
(95624, 'imluffy_6', 1),
(9632, 'lojk.kjo.', 0),
(45247, 'wefewsf', 1),
(1234, 'qwerty', 1),
(32434, '', 1),
(606, 'Pass@123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
CREATE TABLE IF NOT EXISTS `master` (
  `ser_id` varchar(20) NOT NULL,
  `depart_city_id` varchar(20) NOT NULL,
  `desti_city_id` varchar(20) NOT NULL,
  `depart_date_id` varchar(20) NOT NULL,
  `depart_time_id` varchar(20) NOT NULL,
  `air_plane_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`ser_id`, `depart_city_id`, `desti_city_id`, `depart_date_id`, `depart_time_id`, `air_plane_id`) VALUES
('mtd001', '101', '102', 'd03', 't01', 'p12'),
('dtm001', '102', '101', 'd04', 't03', 'p13'),
('ptb001', '104', '105', 'd03', 't03', 'p11');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `meal_id` varchar(10) NOT NULL,
  `meal_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`meal_id`, `meal_name`) VALUES
('m1', 'Vegetarian'),
('m2', 'Non-Veg'),
('m3', 'Vegan'),
('m4', 'Continental'),
('m5', ' Asian Food'),
('m6', 'Mexican Food'),
('m7', 'Indian Food');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `Member_id` int(20) NOT NULL,
  `passangerNo` int(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`Member_id`, `passangerNo`, `title`, `name`) VALUES
(95624, 1, 'Mr.', 'Roronoa Zoro'),
(95624, 2, '', ''),
(95624, 1, 'Mr.', 'Monkey D Luffy'),
(95624, 2, 'Mr.', 'Roronoa Zoro'),
(95624, 1, 'Mr.', 'Monkey D Luffy'),
(95624, 2, 'Mr.', 'Roronoa Zoro'),
(95624, 1, 'Mr.', 'pass1'),
(95624, 2, 'Mr.', 'pass2'),
(95624, 3, 'Mr.', 'pass3'),
(95624, 1, 'Mr.', 'name1'),
(95624, 2, 'Mr.', 'name2'),
(95624, 3, 'Mr.', 'anme3'),
(95624, 1, 'Miss.', 'pooja'),
(95624, 2, 'Miss.', 'kkkkk'),
(95624, 3, 'Mr.', 'jjjjj'),
(95624, 1, 'Mr.', 'q'),
(95624, 2, 'Mr.', 'w'),
(95624, 3, 'Mr.', 'e'),
(95624, 4, 'Mr.', 'r'),
(95624, 1, 'Mr.', 'z'),
(95624, 2, 'Mr.', 'x'),
(95624, 3, 'Mr.', 'c'),
(95624, 4, 'Mr.', 'v'),
(95624, 5, 'Mr.', 'b'),
(95624, 1, 'Mr.', 'a'),
(95624, 2, 'Mr.', 's'),
(95624, 3, 'Mr.', 'd'),
(95624, 4, 'Mr.', 'f'),
(95624, 5, 'Mr.', 'g'),
(95624, 6, 'Mr.', 'h'),
(95624, 1, 'Mr.', 'a'),
(95624, 2, 'Mr.', 's'),
(95624, 3, 'Mr.', 'd'),
(95624, 4, 'Mr.', 'f'),
(95624, 5, 'Mr.', 'g'),
(95624, 6, 'Mr.', 'h'),
(95624, 1, 'Mr.', 'p'),
(95624, 2, 'Mr.', 'o'),
(95624, 3, 'Mr.', 'i'),
(95624, 4, 'Mr.', 'u'),
(95624, 5, 'Mr.', 'y'),
(95624, 6, 'Mr.', 't'),
(95624, 1, 'Mr.', 'p'),
(95624, 2, 'Mr.', 'o'),
(95624, 3, 'Mr.', 'i'),
(95624, 4, 'Mr.', 'u'),
(95624, 5, 'Mr.', 'y'),
(95624, 6, 'Mr.', 't'),
(95624, 1, 'Mr.', 'l'),
(95624, 2, 'Mr.', 'k'),
(95624, 3, 'Mr.', 'k'),
(95624, 4, 'Mr.', 'k'),
(95624, 5, 'Mr.', 'k'),
(95624, 6, 'Mr.', 'k'),
(95624, 1, 'Mr.', 'uuu'),
(95624, 2, 'Mr.', 'uuu'),
(95624, 3, 'Mr.', 'uuu'),
(95624, 4, 'Mr.', 'uuu'),
(95624, 5, 'Mr.', 'uu'),
(95624, 6, 'Mr.', 'uu'),
(95624, 1, 'Mr.', 'Monkey D Luffy'),
(95624, 2, 'Mr.', 'Roronoa Zoro'),
(95624, 1, 'Mr.', 'pass1'),
(95624, 2, 'Mr.', 'x'),
(95624, 1, 'Mr.', 'pass1'),
(95624, 2, 'Mr.', 'x'),
(95624, 1, 'Mr.', 'pooja'),
(95624, 2, 'Mr.', 'w'),
(95624, 1, 'Mr.', 'pooja'),
(95624, 2, 'Mr.', 'w'),
(95624, 1, 'Mr.', 'Monkey D Luffy'),
(95624, 2, 'Mr.', 'Roronoa Zoro'),
(95624, 3, 'Mr.', 'e'),
(95624, 1, 'Mr.', 'Jayesh'),
(95624, 2, 'Mr.', 'XYTZ');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `time_id` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time`) VALUES
('t01', '9:00 am'),
('t02', '3:00 pm'),
('t03', '8:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `Name` varchar(45) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Member_id` int(5) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Name`, `Email`, `Member_id`, `Phone`, `Password`) VALUES
('Monkey D Luffy', 'Luffy@hotmail.com', 95624, 956321457, 'imluffy_6'),
('qwqw', 'wqwq@gmail.cxom', 44545, 2323, 'sasa'),
('wdaxas', 'adhikardj@gmail.com', 69366, 2323, 'wadsx'),
('Adhikar Shinde', 'adhika@gmail.com', 78955, 87578452, 'dgvbdfrgv'),
('Adhikar Shinde', 'adhikaxu@gmail.com', 9632, 23653553, 'lojk.kjo.'),
('Adhikar Shinde', 'adhikaxu@gmail.com', 9632, 23653553, 'lojk.kjo.'),
('john dove', 'adhikardj@gmail.com', 45247, 78451232, 'wefewsf'),
('jayesh', 'jayeshc414@gmail.com', 32434, 88054127, ''),
('Regina Tideamann', 'regina06@gmail.com', 606, 7894564, 'Pass@123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
