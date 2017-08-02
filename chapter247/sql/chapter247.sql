-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2017 at 02:49 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chapter247`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL,
  `cp_code` varchar(255) NOT NULL,
  `cp_start_date` text NOT NULL,
  `cp_end_date` text NOT NULL,
  `cp_discount_method` varchar(20) NOT NULL,
  `cp_amount` varchar(255) NOT NULL,
  `cp_added_by` int(15) NOT NULL,
  `cp_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `cp_code`, `cp_start_date`, `cp_end_date`, `cp_discount_method`, `cp_amount`, `cp_added_by`, `cp_create_time`) VALUES
(2, 'dscdsfcd', '06/13/2017', '07/21/2017', 'amt', '12', 1, '2017-06-30 01:03:47'),
(3, '12345678', '06/21/2017', '07/28/2017', 'per', '20', 1, '2017-06-30 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(15) NOT NULL,
  `ordered_p_id` text NOT NULL,
  `ordered_p_name` text NOT NULL,
  `total_amt` varchar(255) NOT NULL,
  `orderd_user_id` int(15) NOT NULL,
  `ordered_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `ordered_p_id`, `ordered_p_name`, `total_amt`, `orderd_user_id`, `ordered_time`) VALUES
(1, '2,6', 'efewf,test1', '3710.4', 1, '2017-06-30 10:46:56'),
(3, '6,5', 'test1,test2', '9180', 1, '2017-06-30 11:07:30'),
(4, '2,6', 'efewf,test1', '7360.8', 1, '2017-06-30 11:08:16'),
(5, '5,6', 'test2,test1', '664.8', 1, '2017-06-30 11:11:28'),
(6, '6,5', 'test1,test2', '4635', 0, '2017-06-30 11:14:09'),
(7, '6', 'test1', '225', 0, '2017-06-30 11:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_upload_time` varchar(255) NOT NULL,
  `prdoduct_added_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_desc`, `p_price`, `p_image`, `p_upload_time`, `prdoduct_added_by`) VALUES
(2, 'efewf', 'defe', '4563', 'Schedullo.jpg', '2017-06-30 07:35:48', 1),
(6, 'test1', 'sD', '75', 'ax4lKJ.jpg', '2017-06-30 07:36:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `u_email`, `u_pwd`) VALUES
(1, 'ram', 'ram@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cp_code` (`cp_code`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
