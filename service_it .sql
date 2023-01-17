-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 02:01 PM
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
(2, 3, 'Phone repairing', 'alin.ccosta'),
(3, 3, 'PS 4 cleaning', 'alin.ccosta'),
(4, 5, 'Phone repairing', 'rares@gmail'),
(5, 5, 'Phone repairing', 'rares@gmail');

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
(2, 'Costache Florian', 'alin.ccostache@gmail.com', 773830000),
(3, 'Rares', 'rares@gmail.com', 774562365);

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
(1, 'ccostache.alin@gmail.com', '$2y$10$qWeRH/rf71srOa.WuEuvH.qsyBFuseXchEDaB1SIr4Ks/ElNnSlki', 'user'),
(2, 'admin@gmail.com', '$2y$10$IWpCUP1yPIDpH1uaKrUqeO9QLgyz1JbM1i5C25yxQDCbrAimek5nO', 'admin'),
(3, 'alin.ccostache@gmail.com', '$2y$10$wNUqgkUrNbM/T4dK6N/G/eVunQ27nCwJ/1mFDCc3wv3kRjz2tUhIO', 'user'),
(4, 'bilossul@gmail.com', '$2y$10$vncskltbNR7aF6yh97nJ7e816CE8dsEo04d2IWUgNKgbKxLu8JEFK', 'admin'),
(5, 'rares@gmail.com', '$2y$10$Ci6FqNKZ/aH14jFUxcU3GeXk0fx7RNINMO93gtXnJ0EDDixI1qeUK', 'user');

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
(1, 1, 'PS 4 cleaning', 'Costache Alin', 'ccostache.alin@gmail.com', 'NEW'),
(2, 3, 'Phone repairing', 'Costache Florian', 'alin.ccostache@gmail.com', 'NEW'),
(3, 3, 'PS 4 cleaning', 'Costache Florian', 'alin.ccostache@gmail.com', 'DONE'),
(4, 5, 'Phone repairing', 'Husarescu', 'rares@gmail.com', 'NEW'),
(5, 5, 'Phone repairing', 'Husi', 'rares@gmail.com', 'NEW');

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
(1, 'ccostache.alin@gmail.com', 0, 'PS 4 cleaning', 'So, 2 days ago I cleaned my ps 4 at your company and now it does not work anymore. Please contact me', '2023-01-17 01:24:50', 'IN PROGRESS'),
(2, 'alin.ccostache@gmail.com', 0, 'PS 4 cleaning', 'You repaired my phone and now the volume buttom is not working anymore.', '2023-01-17 01:31:01', 'NEW'),
(3, 'alin.ccostache@gmail.com', 0, 'PS 4 cleaning', 'The ps4 is ovverheating.', '2023-01-17 01:34:35', 'NEW');

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
  MODIFY `CONTRACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reqeust_services`
--
ALTER TABLE `reqeust_services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_table`
--
ALTER TABLE `ticket_table`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
