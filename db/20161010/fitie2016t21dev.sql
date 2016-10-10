-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 12:32 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fitie2016t21dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`,`products_id`),
  KEY `fk_carts_users1_idx` (`users_id`),
  KEY `fk_carts_products1_idx` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`) VALUES
(1, 'For Her'),
(2, 'For Him'),
(3, 'For Home'),
(4, 'Special Occasions'),
(5, 'Brands');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_total` double NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `fk_orderdetails_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `created`, `users_id`, `order_status`, `order_total`) VALUES
(6, '2016-10-09 02:06:29', 4, 4, 10),
(7, '2016-10-09 02:06:29', 4, 4, 10),
(8, '2016-10-09 02:06:29', 4, 4, 10),
(9, '2016-10-09 02:06:29', 4, 4, 10),
(11, '2016-10-09 02:06:29', 4, 4, 10),
(12, '2016-10-09 02:06:29', 4, 4, 10),
(13, '2016-10-09 02:06:29', 4, 4, 10),
(14, '2016-10-09 02:06:29', 4, 4, 10),
(18, '2016-10-09 02:06:29', 4, 4, 10),
(19, '2016-10-09 02:06:29', 4, 4, 10),
(20, '2016-10-09 02:06:29', 4, 4, 10),
(21, '2016-10-09 02:06:29', 4, 4, 10),
(22, '2016-10-09 02:06:29', 4, 4, 10),
(23, '2016-10-09 02:06:29', 4, 4, 10),
(24, '2016-10-09 02:06:29', 4, 4, 10),
(25, '2016-10-09 02:06:29', 4, 4, 10),
(33, '2016-10-09 02:06:29', 4, 4, 10),
(34, '2016-10-09 02:06:29', 4, 4, 10),
(35, '2016-10-09 02:06:29', 4, 4, 10),
(36, '2016-10-09 02:06:29', 4, 4, 10),
(37, '2016-10-09 02:06:29', 4, 4, 10),
(38, '2016-10-09 02:06:29', 4, 4, 10),
(39, '2016-10-09 02:06:29', 4, 4, 10),
(40, '2016-10-09 02:06:29', 4, 4, 10),
(41, '2016-10-09 02:06:29', 4, 4, 10),
(42, '2016-10-09 02:06:29', 4, 4, 10),
(43, '2016-10-09 02:06:29', 4, 4, 10),
(44, '2016-10-09 02:06:29', 4, 4, 10),
(45, '2016-10-09 02:06:29', 4, 4, 10),
(46, '2016-10-09 02:06:29', 4, 4, 10),
(47, '2016-10-09 02:06:29', 4, 4, 10),
(48, '2016-10-09 02:06:29', 4, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE IF NOT EXISTS `orderproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderqty` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `orderdetails_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`orderdetails_id`,`products_id`),
  KEY `fk_orderproducts_orderdetails1_idx` (`orderdetails_id`),
  KEY `fk_orderproducts_products1_idx` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `orderqty`, `totalprice`, `orderdetails_id`, `products_id`) VALUES
(1, 1, 10, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descript` text NOT NULL,
  `ship` tinyint(1) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`subcategory_id`),
  KEY `fk_products_subcategory1_idx` (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `descript`, `ship`, `qty`, `price`, `image`, `subcategory_id`) VALUES
(11, 'acc1', 'acc1', 0, 100, 10, 'uploads/test2_1475976714.jpg', 1),
(12, 'acc2', 'acc2', 0, 100, 20, 'uploads/test4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`category_id`),
  KEY `fk_subcategory_category1_idx` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`) VALUES
(1, 'Accessories', 1),
(2, 'Body Products', 1),
(3, 'Handbags', 1),
(4, 'Jewellery', 1),
(5, 'Key rings', 1),
(6, 'Scarves', 1),
(7, 'Travel', 1),
(8, 'Wallets', 1),
(9, 'Accessories', 2),
(10, 'Cuff Links', 2),
(11, 'Key rings', 2),
(12, 'Travel', 2),
(13, 'Wallets', 2),
(14, 'Candles', 3),
(15, 'African', 3),
(16, 'Clocks', 3),
(17, 'Diffusers', 3),
(18, 'Jewellery Boxes', 3),
(19, 'Mirrors', 3),
(20, 'Ornaments', 3),
(21, 'Photo Frames', 3),
(22, 'Tableware', 3),
(23, 'Wall Art', 3),
(24, 'Judaica', 4),
(25, 'New Born', 4),
(26, 'Xmas', 4),
(27, 'Allen Design', 5),
(28, 'Bianc', 5),
(29, 'Carrol Boyes', 5),
(30, 'Cenzoni', 5),
(31, 'Cocco', 5),
(32, 'Cote Noir', 5),
(33, 'Ecoya', 5),
(34, 'Glasshouse', 5),
(35, 'Jennifer', 5),
(36, 'Dumet', 5),
(37, 'Laguiole', 5),
(38, 'Chateau', 5),
(39, 'Liberte', 5),
(40, 'Mukul Goyal', 5),
(41, 'Nicole', 5),
(42, 'Fendel', 5),
(43, 'Pasticle', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` int(10) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `role`) VALUES
(4, 'jangho', 'seo', 'admin', '$2y$10$w8yNIY3cg4jqhTj7OtvnOepVRowAQZyZRxooKTyacPEIj68DplnKS', 'admin@admin.com', 1234, 1),
(5, 'test', 'test', 'test', '$2y$10$iVq5Zlo.oL3pwNpeH8J2D.r2UdFoU.WVREdsGi95XnopFlC465oXa', 'test@test.com', 1234, 10),
(6, 'tt', 'tt', 'test2', '$2y$10$FqIFKKSkW3l7YF0fXGWk/uo5QmmX1Z/JPxtrYjQ74WA00Qx.hH/06', 'test2@test.com', 1234, 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderdetails_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD CONSTRAINT `fk_orderproducts_orderdetails1` FOREIGN KEY (`orderdetails_id`) REFERENCES `orderdetails` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderproducts_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_subcategory1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_subcategory_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
