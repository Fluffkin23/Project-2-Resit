-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `CONTRACT_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `EMAIL` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`CONTRACT_ID`, `CUSTOMER_ID`, `SERVICE_NAME`, `EMAIL`) VALUES
(1, 1, 'PS 4 cleaning', 'ccostache.a'),
(2, 1, 'Phone repairing', 'ccostache.a'),
(3, 3, 'PS 4 cleaning', 'alin.ccosta');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE_NUMBER` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `NAME`, `EMAIL`, `PHONE_NUMBER`) VALUES
(1, 'Costache Alin', 'ccostache.alin@gmail.com', 771695722),
(2, 'Costache Florian', 'alin.ccostache@gmail.com', 733830000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `USERTYPE` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `EMAIL`, `PASSWORD`, `USERTYPE`) VALUES
(1, 'ccostache.alin@gmail.com', '$2y$10$p9f4bbbhIZRXZkV7yknt7ezJIIQ2ELyDDl0.yZiJ8B2XlXkbNWbMG', 'user'),
(2, 'admin@gmail.com', '$2y$10$IWpCUP1yPIDpH1uaKrUqeO9QLgyz1JbM1i5C25yxQDCbrAimek5nO', 'admin'),
(3, 'alin.ccostache@gmail.com', '$2y$10$duhp9oUaDTaEMxsd7rMPMueqxHd7mAgPWlsJgx40AYtmW0G/g8jaG', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reqeust_services`
--

CREATE TABLE `reqeust_services` (
  `id` int(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `customer_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reqeust_services`
--

INSERT INTO `reqeust_services` (`id`, `customer_id`, `service_name`, `customer_name`, `email`, `status`) VALUES
(1, 1, 'PS 4 cleaning', 'Costache Alin', 'ccostache.alin@gmail.com', 'DONE'),
(2, 1, 'Phone repairing', 'Costache Alin', 'ccostache.alin@gmail.com', 'NEW'),
(3, 3, 'PS 4 cleaning', 'Costache Florian', 'alin.ccostache@gmail.com', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `SERVICE_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `SERVICE_DESCRIPTION` text NOT NULL,
  `SERVICE_PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `SERVICE_PRICE`) VALUES
(1, 'Phone repairing', 'We are making your phone new.', 30),
(2, 'PS 4 cleaning', 'We will clean your PS4 from dust', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_table`
--

CREATE TABLE `ticket_table` (
  `TICKET_ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` varchar(100) NOT NULL,
  `SERVICE_DESCRIPTION` varchar(100) NOT NULL,
  `RECEIVE_DATE` datetime NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_table`
--

INSERT INTO `ticket_table` (`TICKET_ID`, `EMAIL`, `SERVICE_ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `RECEIVE_DATE`, `STATUS`) VALUES
(3, 'ccostache.alin@gmail.com', 0, 'Phone repairing', 'The ps4 is overheating since you clean it. Please solve the problem.', '2023-01-17 02:37:55', 'IN PROGRESS'),
(4, 'ccostache.alin@gmail.com', 0, 'Phone repairing', 'The volume button is not working anymore since tou repaired my phone', '2023-01-17 02:38:18', 'NEW'),
(5, 'alin.ccostache@gmail.com', 0, 'PS 4 cleaning', 'You broke it', '2023-01-17 02:43:00', 'NEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`CONTRACT_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reqeust_services`
--
ALTER TABLE `reqeust_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ticket_table`
--
ALTER TABLE `ticket_table`
  ADD PRIMARY KEY (`TICKET_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `CONTRACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reqeust_services`
--
ALTER TABLE `reqeust_services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_table`
--
ALTER TABLE `ticket_table`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
