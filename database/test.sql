-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 12:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `avg_sal` (OUT `avg_sal` DECIMAL)  BEGIN
    select avg(`Salary`) into avg_sal from employee;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GETEMPLOYEE` ()  BEGIN
 SELECT *
 FROM employee;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmployeeByD` (IN `id` INT(11))  BEGIN
 SELECT * 
 FROM employee
 WHERE `Employee_id` = id;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pro_team`
--

CREATE TABLE `pro_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_logo` varchar(255) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pro_team`
--

INSERT INTO `pro_team` (`team_id`, `team_name`, `team_logo`, `addDate`) VALUES
(1, 'Team Delhi', 'team_delhi.jpg', '2017-08-29 00:00:00'),
(2, 'Team Banglore', 'team_banglore.jpg', '2017-08-29 00:00:00'),
(3, 'Team Gurgaon', 'team_gurgaon.jpg', '2017-08-29 00:00:00'),
(4, 'Team Mumbai', 'team_mumbai.jpg', '2017-08-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pro_team_player`
--

CREATE TABLE `pro_team_player` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pro_team_player`
--

INSERT INTO `pro_team_player` (`id`, `team_id`, `first_name`, `last_name`, `logo`) VALUES
(1, 1, 'Shobhit', 'Srivastav', 'team_banglore.jpg'),
(2, 1, 'Sachin', 'Singh', 'team_delhi.jpg'),
(3, 2, 'Akash', 'Anand', 'team_gurgaon.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pro_team`
--
ALTER TABLE `pro_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `pro_team_player`
--
ALTER TABLE `pro_team_player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pro_team`
--
ALTER TABLE `pro_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pro_team_player`
--
ALTER TABLE `pro_team_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
