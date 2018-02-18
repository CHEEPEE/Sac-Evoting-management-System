-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 01:48 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `candidate_name` text NOT NULL,
  `candidate_course` text NOT NULL,
  `candidate_party_list_id` int(11) NOT NULL,
  `candidate_des` text NOT NULL,
  `position_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `candidate_course`, `candidate_party_list_id`, `candidate_des`, `position_id`, `election_id`) VALUES
(1, 'hjhhhj', 'hhjhjjh', 6, '0', 2, 4),
(2, 'kjsdgskjsgj', 'kjkjj', 6, 'kjkjkjkj', 1, 4),
(3, 'sgsgfsg', 'h', 7, 'hu', 1, 4),
(4, 'Josa Mae ysulay', 'BSit', 7, 'Tungaw', 6, 4),
(5, 'Josa Mae ysulay', 'BSIT', 3, 'Korean Lover', 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `id` int(11) NOT NULL,
  `election_name` text NOT NULL,
  `date_start` text NOT NULL,
  `date_end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `election_name`, `date_start`, `date_end`) VALUES
(2, 'test', '2018-02-06', '2018-02-05'),
(3, 'test 2', '2018-02-19', '2018-02-14'),
(4, 'josas', '2018-02-14', '2018-02-14'),
(5, 'HomeRoom Election', '2018-01-29', '2018-01-30'),
(6, 'Cyril Election', '', ''),
(7, 'test', '', ''),
(8, 'test 3', '2018-02-05', '2018-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `election_positions`
--

CREATE TABLE `election_positions` (
  `id` int(11) NOT NULL,
  `position_name` text NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_positions`
--

INSERT INTO `election_positions` (`id`, `position_name`, `election_id`) VALUES
(1, 'test', 4),
(2, 'President', 4),
(3, 'Preside', 3),
(4, 'vice preside', 3),
(5, 'president', 2),
(6, 'vice president', 4),
(7, 'senator', 3),
(8, 'secretary', 2),
(9, 'test', 3),
(10, 'Party list', 4),
(11, 'mayor', 3),
(12, 'vice mayor', 3),
(13, 'President', 5),
(14, 'test', 5),
(15, 'Presidet', 8);

-- --------------------------------------------------------

--
-- Table structure for table `party_list`
--

CREATE TABLE `party_list` (
  `party_list_id` int(11) NOT NULL,
  `party_list_name` text NOT NULL,
  `election_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_list`
--

INSERT INTO `party_list` (`party_list_id`, `party_list_name`, `election_id`) VALUES
(3, 'test 2', 5),
(4, 'Party Party', 5),
(5, 'party 2', 5),
(6, 'Pinaca party', 4),
(7, 'pinakas party', 4),
(8, 'Party List 1', 8),
(9, 'Pinaca Party List', 8);

-- --------------------------------------------------------

--
-- Table structure for table `party_list_member`
--

CREATE TABLE `party_list_member` (
  `party_list_member_id` int(11) NOT NULL,
  `party_list_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pary_list`
--

CREATE TABLE `pary_list` (
  `party_list_id` int(11) NOT NULL,
  `party_list_name` text NOT NULL,
  `election_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_positions`
--
ALTER TABLE `election_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_list`
--
ALTER TABLE `party_list`
  ADD PRIMARY KEY (`party_list_id`);

--
-- Indexes for table `party_list_member`
--
ALTER TABLE `party_list_member`
  ADD PRIMARY KEY (`party_list_member_id`);

--
-- Indexes for table `pary_list`
--
ALTER TABLE `pary_list`
  ADD PRIMARY KEY (`party_list_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `election_positions`
--
ALTER TABLE `election_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `party_list`
--
ALTER TABLE `party_list`
  MODIFY `party_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `party_list_member`
--
ALTER TABLE `party_list_member`
  MODIFY `party_list_member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pary_list`
--
ALTER TABLE `pary_list`
  MODIFY `party_list_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
