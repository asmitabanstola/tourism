-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 03:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helitour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_type` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `current_location` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_type`, `date`, `user_id`, `current_location`, `package_id`) VALUES
(1, 0, '2021-03-27 00:00:00', 1, 'chitwan', 15),
(2, 0, '2021-03-31 00:00:00', 1, 'pokhara', 9),
(3, 0, '2021-04-10 00:00:00', 1, 'kathmandu', 17),
(4, 0, '2021-05-12 00:00:00', 1, 'Muktinath', 16);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `price`, `quantity`, `image`, `description`) VALUES
(9, 'Gosainkunda', 50000, 5, 'gosainkunda.jpg', 'Enjoy the view of Holy Gosainkunda Lake by Helicopter ride. Gosaikunda Helicopter Tour is a religious mountain view flight from Kathmandu within a half hour.'),
(14, 'Rara', 10000, 5, 'rara.jpg', 'Enjoy the view of Rara Lake by Helicopter ride. Rara Helicopter Tour is a religious mountain view flight from Kathmandu within a half hour.'),
(15, 'Muktinath', 150000, 5, 'muktinath.jpg', 'Muktinath tour is the popular heli ride tour to visit the holy Muktinath temple. This helicopter tour to Muktinath is just 60 minutes flight in luxury way'),
(16, 'Everest Tour', 150000, 4, 'everest-base-camp-helicopter-tour64.jpeg', 'Everest Base Camp Helicopter tour with landing at Kalapathar or the EBC is a one day helicopter ride tour to see Everest closely'),
(17, 'Mardi Himal Tour', 100000, 5, 'mardi-himal-helicopter-tour82.jpg', 'Mardi Himal Helicopter tour is newly introduced helicopter ride . The helicopter tour is running daily basis based on the helicopter flight sharing.');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_mode` tinyint(1) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cust_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `cust_name`, `cust_email`, `card_number`, `card_cvc`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'Asmita', 'asmita@gmail.com', 4242424242424242, 123, '09', '2022', '', '', 0.00, 'usd', '50', 'usd', 'txn_1IX2nQJSIOj84Y4AoCATs1Av', 'succeeded', '2021-03-20 12:16:45', '2021-03-20 12:16:45'),
(2, 'Asmita', 'asmita@gmail.com', 4242424242424242, 321, '3', '2022', '', '', 0.00, 'usd', '50', 'usd', 'txn_1IXeV4JSIOj84Y4AA3pDGwfq', 'succeeded', '2021-03-22 04:32:19', '2021-03-22 04:32:19'),
(3, 'Asmita', 'asmita@gmail.com', 4242424242424242, 321, '4', '2022', '', '', 0.00, 'usd', '500', 'usd', 'txn_1IXeWWJSIOj84Y4AGfnPZZHV', 'succeeded', '2021-03-22 04:33:49', '2021-03-22 04:33:49'),
(4, 'Asmita', 'asmita@gmail.com', 4242424242424242, 678, '09', '2022', '', '', 0.00, 'usd', '10000', 'usd', 'txn_1IXlFOJSIOj84Y4AdycpPQRz', 'succeeded', '2021-03-22 11:44:36', '2021-03-22 11:44:36'),
(5, 'Asmita', 'asmita@gmail.com', 4242424242424242, 654, '03', '2022', '', '', 0.00, 'usd', '150000', 'usd', 'txn_1IXnBrJSIOj84Y4AOJo4OnLx', 'succeeded', '2021-03-22 13:49:05', '2021-03-22 13:49:05'),
(6, 'Asmita', 'asmita@gmail.com', 4242424242424242, 987, '02', '2022', '', '', 0.00, 'usd', '150000', 'usd', 'txn_1IXnDfJSIOj84Y4A1UGmDRhQ', 'succeeded', '2021-03-22 13:50:57', '2021-03-22 13:50:57'),
(7, 'Asmita', 'asmita@gmail.com', 4242424242424242, 876, '09', '2022', '', '', 0.00, 'usd', '150000', 'usd', 'txn_1IXnMDJSIOj84Y4ATV2aezWl', 'succeeded', '2021-03-22 13:59:47', '2021-03-22 13:59:47'),
(8, 'Asmita', 'asmita@gmail.com', 4242424242424242, 987, '09', '2022', '', '', 0.00, 'usd', '150000', 'usd', 'txn_1IXna6JSIOj84Y4AyQ7O4CIn', 'succeeded', '2021-03-22 14:14:08', '2021-03-22 14:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_email`, `username`, `password`, `address`, `phone`) VALUES
(1, 'asmita banstola', 'asmita@gmail.com', 'asmita', '81dc9bdb52d04dc20036dbd8313ed055', 'gaushala', 1234567),
(2, 'Anjana thapa', 'anjana@gmail.com', 'Anjana', '81dc9bdb52d04dc20036dbd8313ed055', 'kalimati', 1234567892);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`username`),
  ADD UNIQUE KEY `admin_email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
