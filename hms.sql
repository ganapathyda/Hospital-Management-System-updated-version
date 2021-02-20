-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 05:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `sno` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `docid` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL,
  `consultancyfees` varchar(50) NOT NULL,
  `userstatus` varchar(255) NOT NULL,
  `doctorstatus` varchar(50) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`sno`, `userid`, `docid`, `specialization`, `disease`, `appointmentdate`, `appointmenttime`, `consultancyfees`, `userstatus`, `doctorstatus`, `action`) VALUES
(1, 'ganapathyda', 'vengadesh', 'Dermatology', 'fever(10days)', '2020-10-05', '16:00:00', 'Rs 1000/-', '1', '1', 1),
(2, 'sharmila', 'vengadesh', 'Dermatology', 'headache(5days)', '2020-10-20', '10:00:00', 'Rs 1000/-', '0', '1', 0),
(3, 'rahul', 'vengadesh', 'Dermatology', 'stomachpain(4days)', '2020-10-04', '16:00:00', 'Rs 1000/-', '1', '0', 0),
(4, 'rahul', 'Dean Thomas', 'Cardiology', 'fever(2days)', '2020-10-05', '08:00:00', 'Rs 2000/-', '0', '1', 0),
(5, 'rahul', 'Dean Thomas', 'Cardiology', 'fever(8days)', '2020-10-05', '16:00:00', 'Rs 2000/-', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` bigint(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`firstname`, `lastname`, `email`, `phoneno`, `message`) VALUES
('ganapathy', 'subramanian', '123@gmail.com', 6385470031, 'hi hello'),
('ganapathy', 'subramanian', 'ganapathy2000subramanian@gmail.com', 8098108869, 'Hi I have a doubt'),
('Ganapathisubramanian', 'Sankaranarayanan', 'ganapathy@gmail.com', 8098108869, 'hi hello'),
('vengadesh', 'K S', 'venky777@gmail.com', 6385470031, 'hi gana'),
('Ganapathisubramanian', 'Sankaranarayanan', 'w3@gmail.com', 12345678, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `doctable`
--

CREATE TABLE `doctable` (
  `docid` varchar(50) NOT NULL,
  `docname` varchar(50) NOT NULL,
  `specilaization` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL,
  `consultancyfees` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctable`
--

INSERT INTO `doctable` (`docid`, `docname`, `specilaization`, `password`, `confirmpassword`, `consultancyfees`) VALUES
('Dean Thomas', 'Dr.Dean Thomas', 'Cardiology', '123', '123', 'Rs 2000/-'),
('dharma', 'Dharma Devan', 'Neurology', '123', '123', 'Rs 1500/-'),
('jagadesan', 'Jagadesan', 'Neurology', '123', '123', 'Rs 1500/-'),
('Jerry McStanton', 'Dr.Jerry McStanton', 'Emergency', '123', '123', 'Rs 500/-'),
('Lewis Parole', 'Dr.Lewis Parole', 'Orthopedic', '123', '123', 'Rs 1200/-'),
('Mary Edwards Walker', 'Dr.Mary Edwards Walker', 'Physiotheraphy', '123', '123', 'Rs 2000/-'),
('Tom Neville', 'Dr.Tom Neville', 'Emergency', '123', '123', 'Rs 500/-'),
('vengadesh', 'vengadesh K S', 'Dermatology', '123', '123', 'Rs 1000/-');

-- --------------------------------------------------------

--
-- Table structure for table `pattable`
--

CREATE TABLE `pattable` (
  `fullname` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pattable`
--

INSERT INTO `pattable` (`fullname`, `userid`, `email`, `phoneno`, `password`, `gender`) VALUES
('Ganapathy Subramanian', 'ganapathyda', 'ganapathy5@gmail.com', 6385470031, '123', 'male'),
('Kamesh Babu', 'kamesh', 'kamesh212@gmail.com', 8097654320, '123', 'Male'),
('Rahul', 'Rahul', 'Rahul@gmail.com', 8098108869, '123', 'Male'),
('Sharmila', 'sharmila', 'sharmaila@gmail.com', 123457890, '123', 'female'),
('vengadesh', 'venky', 'venky@gmail.com', 8098108869, '123', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `sno` int(11) NOT NULL,
  `docid` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cfees` varchar(50) NOT NULL,
  `disease` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `meet` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`sno`, `docid`, `userid`, `fullname`, `mailid`, `mobile`, `adate`, `atime`, `gender`, `cfees`, `disease`, `medicine`, `meet`, `message`, `status`) VALUES
(1, 'vengadesh', 'ganapathyda', 'Ganapathy Subramanian', 'ganapathy5@gmail.com', 6385470031, '2020-10-05', '16:00:00', 'male', 'Rs 1000/-', 'fever(10days)', 'Aspirin', 'Not need', 'Do not drink cool drinks', 1),
(2, 'Dean Thomas', 'rahul', 'Rahul', 'Rahul@gmail.com', 8098108869, '2020-10-05', '16:00:00', 'Male', 'Rs 2000/-', 'fever(8days)', 'aspirine', 'not need', 'drink more hot waters', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `doctable`
--
ALTER TABLE `doctable`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `pattable`
--
ALTER TABLE `pattable`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
