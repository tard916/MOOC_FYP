-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 04:53 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help-mooc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `starting_date` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `pre_requirments` varchar(255) NOT NULL,
  `Learning_outcomes` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_cirriculum`
--

CREATE TABLE `course_cirriculum` (
  `id` int(11) NOT NULL,
  `week_number` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `ins_uniquID` varchar(50) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `ins_uniquID`, `instructor_name`, `email`, `password`) VALUES
(1, 'INS_5bdbe6b61428f9.96761451', 'Thierno Abdoul Rahimi Diallo', 'tard916@gmail.com', '$2y$10$v84aawFqKmdQjk0WZxMk0e0uiuU1oplexqVuaK.tXZyhbjYieDjuK'),
(2, 'INS_5be28fe1492a74.88822101', 'Mamadou Cellou Diallo', 'c@c.com', '$2y$10$vKtMMzFI18w0VZ5EjSRt2uu7uMh9I1hcu79qZJ2UWD.0M76lMI1MC');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(1, 'bbea9eb7b7c9696a489dc8c8642b8b74e7e1b919', 'std0000001'),
(2, 'afbb438e6f525012a9809423668185704875c1e8', 'STD_5bdbd6c50e20d3.65807706'),
(3, 'b55d51e44100d8f98a8a27bcf7fde71f3f2acc10', 'INS_5bdbe6b61428f9.96761451'),
(4, '7995ec1e115179d9308184ebd8000fde683af5ec', 'INS_5bdbe6b61428f9.96761451'),
(5, '3cfadcfa1d4b1655e5e2097c973730ff3b6d7c2a', 'INS_5bdbe778153f40.94600672'),
(6, '7f98fe5493e87084d043e07b4a932be3c60dd6ff', 'std0000001'),
(7, '2c9c12acd4cd1bbdb916ccc487850593edf8c904', 'INS_5bdbe6b61428f9.96761451');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `std_uniquID` varchar(50) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_uniquID`, `student_name`, `email`, `password`) VALUES
(1, 'STD0000001', 'Thierno Abdoul Rahimi Diallo', 'rahimi.diallo@outlook.com', '$2y$10$5IRrS5OzhtXV4onQCVGWKOrpBo8AF5EYIG2QXV3aSmcyxyHJPSZ.K'),
(2, 'STD_5bdba499dcd753.58083666', 'thierno', 't@t.t', '$2y$10$9S88UNVkeMPt7JKaSozRDO4tpFE8LeZg0nac4V1oGO/pxJg0eUQ6S'),
(3, 'STD_5bdbd6c50e20d3.65807706', 'jfnonvskm', 'ng@ng.ng', '$2y$10$DmmI9mGUyt34Sz8PFj4mm.mmY0d1ItjPxvsD2X4remksJETJq3Tdi'),
(4, 'STD_5bdbd77ecab113.21600311', 'Mehrab', 'b@b.b', '$2y$10$zSb4wsChZLk/9/FRQP5ZZ.kBJaHLeMGSo8YCU4kcBPQl2HTmorcAO'),
(5, 'STD_5bdbe4ded307b6.80670940', 'sdfcnbnlands', 'h@h.h', '$2y$10$2Hal1G5lgsUuuWp94cWU7uTG2lUNZ0kHxuAn7oJ5jjBCl73z/QXlO'),
(6, 'STD_5bdbe778153f40.94600672', 'Hassan', 'h1@h.h', '$2y$10$JFX/L5tHTWANarZoClv9r.9rwXbcSPgS7eVSRi7sZA0e4wjC.szNe'),
(7, 'STD_5bdbfc006984e0.62219977', 'Ehab Nabiel', 'ehab@help.com.my', '$2y$10$62y77imV94J8kr.x2UuJ9ueOANwbyN3UGQFU4e803GxuI/1Lze3Dy'),
(8, 'STD_5be2917f3abae1.66661482', 'Hassan Saleem', 'hs@hs.hs', '$2y$10$03T384aPqcxFVwKeN96RJetrGMkoB/eOvDFPfVK7pdKqvSfajEUtG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ins_uniquID` (`ins_uniquID`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `std_uniquID` (`std_uniquID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  ADD CONSTRAINT `course_cirriculum_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
