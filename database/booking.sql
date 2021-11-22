-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 01:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_admin`
--

CREATE TABLE `bus_admin` (
  `ad_id` int(10) NOT NULL,
  `ad_name` text NOT NULL,
  `ad_surname` text NOT NULL,
  `ad_staffno` int(10) NOT NULL,
  `ad_email` text NOT NULL,
  `ad_campus` text NOT NULL,
  `ad_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_admin`
--

INSERT INTO `bus_admin` (`ad_id`, `ad_name`, `ad_surname`, `ad_staffno`, `ad_email`, `ad_campus`, `ad_password`) VALUES
(3, 'Freddy', 'Nkosi', 217144638, '217144638@tut4life.ac.za', 'Sosha South', '$2y$10$g.suN9NrGacNq/Nrq5Y3BekxevIFIQ3OhF3q.yWcibX0Aejrd1mpi');

-- --------------------------------------------------------

--
-- Table structure for table `seat_reservation`
--

CREATE TABLE `seat_reservation` (
  `st_id` int(10) NOT NULL,
  `st_student_surname` text NOT NULL,
  `st_student_number` int(10) NOT NULL,
  `st_student_id` int(10) NOT NULL,
  `st_start_and_destination` text NOT NULL,
  `st_time` time NOT NULL,
  `st_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_reservation`
--

INSERT INTO `seat_reservation` (`st_id`, `st_student_surname`, `st_student_number`, `st_student_id`, `st_start_and_destination`, `st_time`, `st_date`) VALUES
(9, 'Dlamini', 217146380, 1, 'Sosha South To Arcadia Campus', '14:00:00', 'Wed 17th  Nov 2021 '),
(11, 'Dlamini', 217146380, 1, 'Arcadia Campus To Pretoria Campus', '11:30:00', 'Fri 19th  Nov 2021 '),
(12, 'Dlamini', 217146380, 1, 'Sosha South To Sosha North', '13:00:00', 'Fri 19th  Nov 2021 ');

-- --------------------------------------------------------

--
-- Table structure for table `tut_student`
--

CREATE TABLE `tut_student` (
  `stu_id` int(10) NOT NULL,
  `stu_name` text NOT NULL,
  `stu_surname` text NOT NULL,
  `stu_number` int(10) NOT NULL,
  `stu_email` text NOT NULL,
  `stu_gender` text NOT NULL,
  `stu_campus` text NOT NULL,
  `stu_faculty` text NOT NULL,
  `stu_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tut_student`
--

INSERT INTO `tut_student` (`stu_id`, `stu_name`, `stu_surname`, `stu_number`, `stu_email`, `stu_gender`, `stu_campus`, `stu_faculty`, `stu_password`) VALUES
(1, 'Michael', 'Dlamini', 217146380, '217146380@tut4life.ac.za', 'Male', 'Sosha South', ' Information and Communication Technology', '$2y$10$nYwvuwNhTqDEHKSARXeH8uOjIYNKOrdBhwTB9z82fPYWu.tsUzimO'),
(3, 'Mthokozisi', 'Hadebe', 217146313, '217146313@tut4life.ac.za', 'Male', 'Sosha South', ' Humanities', '$2y$10$Ce/yMZ4KUdhlUremeIv73uDlHsRrumsQzeQInxZvNIGUia42shvge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_admin`
--
ALTER TABLE `bus_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `seat_reservation`
--
ALTER TABLE `seat_reservation`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tut_student`
--
ALTER TABLE `tut_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_admin`
--
ALTER TABLE `bus_admin`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seat_reservation`
--
ALTER TABLE `seat_reservation`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tut_student`
--
ALTER TABLE `tut_student`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
