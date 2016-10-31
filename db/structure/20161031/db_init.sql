-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 11:09 AM
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

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Glasshouse '),
(2, 'Fendel'),
(3, 'Allen Design'),
(4, 'Jennifer'),
(5, 'Pasticle '),
(6, 'Bianc'),
(7, 'Dumet '),
(8, 'Carrol Boyes'),
(9, 'Laguiole '),
(10, 'Cenzoni'),
(11, 'Chateau '),
(12, 'Cocco '),
(13, 'Liberte '),
(14, 'Cote Noir'),
(15, 'Mukul Goyal'),
(16, 'Ecoya '),
(17, 'Nicole');

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`) VALUES
(1, 'For Her'),
(2, 'For Him'),
(3, 'For Home'),
(4, 'Special Occasions');

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
(26, 'Xmas', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
