-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 04:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebarber`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `services` int(11) NOT NULL,
  `services2` int(11) NOT NULL,
  `techid` int(11) NOT NULL,
  `date` date NOT NULL,
  `thistime` time NOT NULL,
  `time` time NOT NULL,
  `services_time` int(255) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `disapprove` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `custid`, `services`, `services2`, `techid`, `date`, `thistime`, `time`, `services_time`, `price`, `description`, `status_id`, `disapprove`, `date_create`) VALUES
(15, 4, 2, 0, 25, '2021-04-02', '20:00:00', '20:45:00', 45, '', 'รวย', 0, '', '2021-04-02 02:21:48'),
(16, 4, 1, 1, 25, '2021-04-03', '22:00:00', '23:00:00', 60, '', 'รวย', 1, '', '2021-04-02 02:23:49'),
(17, 4, 1, 0, 25, '2021-04-04', '10:00:00', '10:30:00', 30, '', 'ทดสอบ', 0, '', '2021-04-02 02:30:02'),
(19, 11, 1, 0, 27, '2021-04-02', '20:00:00', '20:30:00', 30, '', 'รวย', 0, '', '2021-04-02 02:41:01'),
(20, 11, 1, 2, 26, '2021-04-02', '20:00:00', '21:15:00', 75, '', 'ลมเข้าเครื่อง', 0, '', '2021-04-02 02:50:49'),
(21, 4, 2, 0, 25, '2021-04-06', '14:30:00', '15:15:00', 45, '', 'รวย', 0, '', '2021-04-06 01:46:20'),
(22, 4, 2, 2, 25, '2021-04-07', '10:05:00', '11:35:00', 90, '', 'รวย', 0, '', '2021-04-06 02:21:23'),
(23, 4, 2, 2, 25, '2021-04-07', '08:20:00', '09:50:00', 90, '', '', 3, '', '2022-01-20 16:42:57'),
(24, 4, 1, 0, 25, '2022-01-20', '16:00:00', '16:00:00', 0, '', '', 2, 'หหห', '2022-01-20 16:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `linetoken`
--

CREATE TABLE `linetoken` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_token` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linetoken`
--

INSERT INTO `linetoken` (`id`, `token`, `date_token`) VALUES
(1, 'pafntcF5D8ZSuPqGPwMwcd6UFJNJyLDNxgOBvcKr0CJ', '2020-11-27 11:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `s_name`, `s_price`, `s_time`) VALUES
(2, 'Undercut', '160', 45),
(12, 'รองทรง', '120', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `username`, `useremail`, `tel`, `password`, `regdate`, `role_id`) VALUES
(4, 'admin', 'admin', 'natee@gmail.com', '0898087753', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-01 08:59:53', 1),
(11, 'ทดสอบ', 'test', 'natee@gmail.com', '0884607003', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-13 08:58:19', 0),
(25, 'ช่าง 1', 'tech1', 'tech1@gmail.com', '999', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-13 08:54:57', 2),
(26, 'ช่าง 2', 'tech2', 'tech2@gmail.com', '999', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-13 08:54:57', 2),
(27, 'ช่าง 3', 'tech3', 'tech3@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-26 03:34:19', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linetoken`
--
ALTER TABLE `linetoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `linetoken`
--
ALTER TABLE `linetoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
