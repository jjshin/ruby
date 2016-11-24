DELETE FROM orderproducts;
DELETE FROM orderdetails;
DELETE FROM carts;
DELETE FROM tmpcarts;
DELETE FROM products;
DELETE FROM subcategory;
DELETE FROM category;

CREATE TABLE IF NOT EXISTS `maincategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `category` ADD `maincategory_id` INT NOT NULL ;
ALTER TABLE `category` ADD INDEX(`maincategory_id`);
ALTER TABLE `category` ADD FOREIGN KEY (`maincategory_id`) REFERENCES `fitie2016t21dev`.`maincategory`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO `maincategory` (`id`, `name`) VALUES
(1, 'For Her'),
(2, 'For Him'),
(3, 'For Home'),
(4, 'Special Occasions');

--
-- Dumping data for table `subcategory`
--

INSERT INTO `category` (`id`, `cate_name`, `maincategory_id`) VALUES
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
