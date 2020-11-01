-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 06:12 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmentone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'Long'),
(3, 'admin2', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `mob_phone` varchar(15) NOT NULL,
  `first_name` char(15) DEFAULT NULL,
  `last_name` char(15) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`mob_phone`, `first_name`, `last_name`, `password`, `date_of_birth`, `message`) VALUES
('00 7103 3559', 'Frances', 'Rasmussen', 'bbbbbb', '2020-04-30', ''),
('0420971607', 'Sam', 'Morris', 'aaaaa', '2020-10-15', ''),
('06 8783 7512', 'Mufutau', 'Estes', 'BAP56CQG1KC', '2019-09-15', ''),
('07 0230 4598', 'Raphael', 'Wilkins', 'FHC33KGA0OP', '1990-06-13', ''),
('09 3381 3461', 'Olympia', 'Bentley', 'LUD30EMA2GE', '2019-09-23', ''),
('09 3599 0303', 'Amanda', 'Holder', 'CZW35BGI4QI', '2019-10-07', ''),
('11 8768 0624', 'Ali', 'Michael', 'BWZ85RGE7PE', '2019-09-26', ''),
('11 8983 9148', 'Lucy', 'Sanchez', 'ZII44ELM4YJ', '2020-09-21', ''),
('15 2639 6138', 'Tobias', 'Owen', 'IFG15IHZ6JJ', '1995-12-17', ''),
('21 5038 6453', 'Indigo', 'Glover', 'BZC51ISR0FF', '2020-11-28', ''),
('23 2052 6684', 'Abel', 'Warner', 'UGU69WOA8WS', '2021-04-07', ''),
('24 5036 7869', 'Cally', 'Mason', 'HJP74UDS6RQ', '2019-11-29', ''),
('30 1974 2049', 'Donna', 'Mccormick', 'UGJ19CEX1HB', '2019-10-15', ''),
('31 5906 4361', 'Gretchen', 'Robles', 'LLY82TRR1BK', '2020-02-26', ''),
('31 7745 6904', 'Kane', 'Douglas', 'PDD34ATS9CJ', '2020-11-02', ''),
('33 5694 1267', 'Victor', 'Bolton', 'HIW70JFG4XG', '2021-05-01', ''),
('34 1516 0911', 'Elaine', 'Hodge', 'GTJ39HTB2CK', '2021-05-14', ''),
('34 5691 3501', 'Fatima', 'Maynard', 'VLO09BRX1LL', '2019-12-23', ''),
('41 2932 7159', 'Jarrod', 'Hall', 'ZTL19HIK5FD', '2020-01-02', ''),
('41 5125 9706', 'Ulric', 'Franco', 'OYL82HQY2SO', '2020-08-13', ''),
('43 3846 4615', 'Nelle', 'Chase', 'JFV47FEE4GJ', '2020-01-02', ''),
('44 9564 4725', 'Robert', 'Black', 'LLL75VWQ6ZG', '2021-04-16', ''),
('45 5526 8509', 'Sigourney', 'Mcpherson', 'IFL75WYC0SF', '2020-12-05', ''),
('46 1424 4345', 'Hop', 'Joyce', 'YRB21XHM5QA', '2019-10-10', ''),
('51 3208 5185', 'Ora', 'Byrd', 'XOK61ESO4FO', '2021-07-22', ''),
('54 0803 2083', 'Marcia', 'Woods', 'KTV45EFC7XB', '2021-07-22', ''),
('56 2085 7455', 'Mercedes', 'Burris', 'SPV95BWH5GX', '2020-07-19', ''),
('59 7615 0363', 'Thane', 'Levy', 'TTO75KMW7GY', '2020-09-08', ''),
('66 5922 9878', 'MacKenzie', 'Parks', 'INQ74BBW6JR', '2020-07-28', ''),
('71 2128 7281', 'Igor', 'Estes', 'DOI82ZGD1YF', '2020-05-20', ''),
('73 4346 9058', 'Inez', 'Snyder', 'KMF09HUS3JY', '2019-12-06', ''),
('78 1088 1502', 'Thaddeus', 'Castro', 'VCP57CZT8VL', '2019-09-26', ''),
('79 4799 9874', 'Genevieve', 'Reyes', 'CII16PGF2CG', '2021-02-11', ''),
('80 6828 9232', 'Zachary', 'Leblanc', 'WGE58LTD1DL', '2019-09-13', ''),
('81 5719 2307', 'Philip', 'Eaton', 'ZFP00EWB0JJ', '2021-03-10', ''),
('83 5731 9813', 'Kessie', 'Huffman', 'KQK46TET4WN', '2021-05-03', ''),
('84 6999 1960', 'Minerva', 'Richmond', 'TCY93QSH5OF', '2019-11-25', ''),
('90 0781 5209', 'Sydney', 'Gordon', 'YES88INB5YD', '2021-01-07', ''),
('91 3188 5756', 'Tad', 'Lester', 'DKO41LAV8EL', '2019-11-12', ''),
('91 5191 5989', 'Malcolm', 'Cochran', 'LMP40CAW3KR', '2020-05-15', ''),
('96 4555 9945', 'Walter', 'Mcbride', 'CPX24WQR9TZ', '2021-04-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `band_id` int(11) UNSIGNED NOT NULL,
  `band_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`band_id`, `band_name`) VALUES
(12414, 'DeadDancers'),
(12417, 'Elephant Stranglers'),
(12415, 'Grunge Around The Clock'),
(12498, 'submit'),
(12507, 'THE BAND'),
(12451, 'The Green Bangers'),
(12464, 'The Old Timers'),
(12463, 'We won\'t rock you '),
(12491, 'Yeeeehaw'),
(12468, 'Yes OKay and THankyou');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(12) UNSIGNED NOT NULL,
  `mob_phone` varchar(15) NOT NULL,
  `concert_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `mob_phone`, `concert_id`) VALUES
(53, '06 8783 7512', 12),
(55, '07 0230 4598', 12),
(61, '00 7103 3559', 38),
(63, '00 7103 3559', 12),
(64, '00 7103 3559', 18);

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `concert_id` int(11) UNSIGNED NOT NULL,
  `band_id` int(11) UNSIGNED NOT NULL,
  `venue_id` int(11) UNSIGNED NOT NULL,
  `concert_date` datetime DEFAULT NULL,
  `over_18` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`concert_id`, `band_id`, `venue_id`, `concert_date`, `over_18`) VALUES
(12, 12464, 621, '2021-10-18 18:18:00', 0),
(18, 12451, 143, '2021-10-30 13:05:00', 0),
(19, 12451, 143, '2020-10-30 13:05:00', 0),
(20, 12451, 143, '2020-10-25 13:59:00', 0),
(21, 12451, 143, '2020-10-25 14:05:00', 1),
(23, 12451, 143, '2020-10-30 18:10:00', 1),
(24, 12415, 143, '2020-10-29 06:13:00', 1),
(38, 12414, 143, '2020-10-20 14:41:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(5) UNSIGNED NOT NULL,
  `user` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(4) UNSIGNED NOT NULL,
  `venue_name` varchar(50) NOT NULL,
  `capacity` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue_name`, `capacity`) VALUES
(143, 'RecogneZ', 12),
(147, 'Rae Bareli', 8),
(621, 'Old Westminster', 3),
(658, 'Hi there', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`mob_phone`),
  ADD KEY `mob_phone` (`mob_phone`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`band_id`),
  ADD UNIQUE KEY `band_name` (`band_name`),
  ADD KEY `band_id` (`band_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `mob_phone` (`mob_phone`),
  ADD KEY `concert` (`concert_id`);

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `concert_id` (`concert_id`),
  ADD KEY `band` (`band_id`),
  ADD KEY `venue` (`venue_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`),
  ADD UNIQUE KEY `venue_name` (`venue_name`),
  ADD KEY `venue_id` (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `band_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12508;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `concert_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `concert` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`concert_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mob` FOREIGN KEY (`mob_phone`) REFERENCES `attendee` (`mob_phone`);

--
-- Constraints for table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `Band` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
