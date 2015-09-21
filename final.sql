-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2015 at 08:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(60) NOT NULL,
  `item_image` varchar(60) NOT NULL,
  `item_description` text NOT NULL,
  `item_price` varchar(20) NOT NULL,
  `item_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`item_id`, `item_name`, `item_image`, `item_description`, `item_price`, `item_status`, `createdOn`, `updatedOn`) VALUES
(1, 'Vegetable Pakora', '', 'Assorted vegetables, such as potatoes, spinich, cauliflower, and onions dipped in chick pea batter and deep fired', '2.95', '1', '2015-09-20 06:08:18', '0000-00-00 00:00:00'),
(2, 'Vegetarian Platter', '', 'Assortment of Allo Tikki, Samosa, Vegetable Pakoras and Paneer Pakoras', '6.95', '1', '2015-09-20 06:08:18', '0000-00-00 00:00:00'),
(3, 'Non-Vegetarian Platter', '', 'assortment of Chicken Pakora, Fish Pakora, and finger rolls of lamb', '7.95', '1', '2015-09-20 06:09:08', '0000-00-00 00:00:00'),
(4, 'Samosa', '', 'fried crisp pyramid stuffed with delicately spiced mashed potatoes and peas', '3.50', '1', '2015-09-20 06:09:08', '0000-00-00 00:00:00'),
(5, 'Paneer Pakora', '', 'homemade Indian semi-soft cubes of cheese stuffed with mint sauce, then dipped in chick pea batter and deep fried', '3.95', '1', '2015-09-20 06:10:02', '0000-00-00 00:00:00'),
(6, 'Chicken Pakora', '', 'boneless, white meat chicken breast strips deep fried in chick pea batter', '4.95', '1', '2015-09-20 06:10:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
`order_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `order_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `first_name`, `last_name`, `menu_id`, `quantity`, `email`, `mobile`, `order_status`, `createdOn`) VALUES
(3, 'uday', 'kumar', 2, 2, 'uday@gmail.com', '7569508595', '1', '2015-09-20 07:04:57'),
(4, 'aneel', 'aaa', 1, 2, 'aneel@gmail.com', '7569508595', '1', '2015-09-20 07:16:16'),
(5, 'aa', 'aaa', 2, 3, 'aaa@gmail.co', '11111111111111111111', '1', '2015-09-20 07:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_payments` (
`paytment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `card_name` varchar(60) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expiry_date` varchar(20) NOT NULL,
  `payment_status` enum('0','1') NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`paytment_id`, `order_id`, `card_name`, `card_number`, `expiry_date`, `payment_status`, `createdOn`) VALUES
(2, 3, 'uday', '123456789012', '102014@gmail.cpm', '1', '2015-09-20 07:04:57'),
(3, 4, 'uday', '123456789', '/2016', '1', '2015-09-20 07:16:16'),
(4, 5, '1111111111', '11111111111', '10/', '1', '2015-09-20 07:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
 ADD PRIMARY KEY (`item_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
 ADD PRIMARY KEY (`order_id`), ADD KEY `order_id` (`order_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
 ADD PRIMARY KEY (`paytment_id`), ADD KEY `order_id` (`order_id`), ADD KEY `paytment_id` (`paytment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
MODIFY `paytment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
ADD CONSTRAINT `tbl_payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
