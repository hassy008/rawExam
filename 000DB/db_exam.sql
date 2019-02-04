-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 08:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(55) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `qusNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `qusNo`, `rightAns`, `ans`) VALUES
(3, 1, 0, 'Abstract'),
(4, 1, 0, 'Protected '),
(5, 1, 1, 'Final Static'),
(6, 1, 0, 'Static'),
(7, 2, 0, 'classname() '),
(8, 2, 0, ' B. _construct() '),
(9, 2, 0, 'C. function _construct() '),
(10, 2, 1, 'D. function __construct()'),
(11, 3, 0, 'A. PHP 4 '),
(12, 3, 1, 'B. PHP 5 '),
(13, 3, 0, 'C. PHP 5.3'),
(14, 3, 0, ' D. PHP 6'),
(15, 4, 0, 'a) E[attr^=value] '),
(16, 4, 1, 'b) E[attr$=value] '),
(17, 4, 0, 'c) E[attr*=value] '),
(18, 4, 0, 'd) none of the mentioned'),
(31, 5, 0, 'qwe'),
(32, 5, 0, 'asd'),
(33, 5, 0, 'qqq'),
(34, 5, 1, 'd) none of the mentioned');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qus`
--

CREATE TABLE `tbl_qus` (
  `id` int(11) NOT NULL,
  `qusNo` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qus`
--

INSERT INTO `tbl_qus` (`id`, `qusNo`, `question`) VALUES
(1, 1, 'Which method scope prevents a method from being overridden by a subclass?'),
(2, 2, 'PHP recognizes constructors by the name.\r\n'),
(3, 3, 'Which version of PHP introduced the instanceof keyword?'),
(6, 4, 'Which of the following selector selects all elements of E that have the attribute attr that end with the given value?'),
(9, 5, 'asdThe DELETE statement is used to delete existing records in a table.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(55) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(2, 'Rahul Abdullah', 'rahul', '202cb962ac59075b964b07152d234b70', 'rahul@gmail.com', 1),
(3, 'Arron Finch', 'Arron', '123', 'arron@gmail.com', 0),
(4, 'ALex Sanchez', 'ALex ', '123', 'alex@gmail.com', 0),
(9, 'abu', 'hassy', '202cb962ac59075b964b07152d234b70', 'hasnathrumman12345@gmail.com', 1),
(10, 'Abu Hasnath Rumman', 'Hassy', '202cb962ac59075b964b07152d234b70', 'hasnathrumman@gmail.com', 0),
(11, 'Abu Hasnath Rumman', 'hassy', '202cb962ac59075b964b07152d234b70', 'hasnathrumman12@gmail.com', 0),
(16, 'Abu Hasnath Rumman', 'asc', '202cb962ac59075b964b07152d234b70', 'hasnathrumman1234@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qus`
--
ALTER TABLE `tbl_qus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_qus`
--
ALTER TABLE `tbl_qus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
