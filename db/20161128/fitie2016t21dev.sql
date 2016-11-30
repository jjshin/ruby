/* Database export results for db fitie2016t21dev */

/* Preserve session variables */
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS=0;

/* Export data */

/* Table structure for brands */
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/* Table structure for carts */
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`,`products_id`),
  KEY `fk_carts_users1_idx` (`users_id`),
  KEY `fk_carts_products1_idx` (`products_id`),
  CONSTRAINT `fk_carts_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

/* Table structure for category */
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) NOT NULL,
  `maincategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `maincategory_id` (`maincategory_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`maincategory_id`) REFERENCES `maincategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/* Table structure for enquires */
CREATE TABLE `enquires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `enquires_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/* Table structure for maincategory */
CREATE TABLE `maincategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/* Table structure for orderdetails */
CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `receive_name` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `fk_orderdetails_users1_idx` (`users_id`),
  CONSTRAINT `fk_orderdetails_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

/* Table structure for orderproducts */
CREATE TABLE `orderproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderqty` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `orderdetails_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`orderdetails_id`,`products_id`),
  KEY `fk_orderproducts_orderdetails1_idx` (`orderdetails_id`),
  KEY `fk_orderproducts_products1_idx` (`products_id`),
  CONSTRAINT `fk_orderproducts_orderdetails1` FOREIGN KEY (`orderdetails_id`) REFERENCES `orderdetails` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orderproducts_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

/* Table structure for products */
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `short_desc` text,
  `long_desc` text,
  `retail_price` decimal(7,2) DEFAULT NULL,
  `cost_price` decimal(7,2) DEFAULT NULL,
  `sale_price` decimal(7,2) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `sizeunit` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `weightunit` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `heightunit` varchar(45) DEFAULT NULL COMMENT '	',
  `width` varchar(45) DEFAULT NULL,
  `widthunit` varchar(45) DEFAULT NULL,
  `length` varchar(45) DEFAULT NULL,
  `lengthunit` varchar(45) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `image5` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`,`subcategory_id`),
  KEY `fk_products_subcategory1_idx` (`subcategory_id`),
  KEY `suppliers_id` (`suppliers_id`),
  KEY `brands_id` (`brands_id`),
  CONSTRAINT `fk_products_subcategory1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/* Table structure for sale */
CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`,`products_id`),
  KEY `fk_sales_products1_idx` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Table structure for sliders */
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `img` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/* Table structure for subcategory */
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`category_id`),
  KEY `fk_subcategory_category1_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/* Table structure for suppliers */
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/* Table structure for tmpcarts */
CREATE TABLE `tmpcarts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `session_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/* Table structure for users */
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `suburb` varchar(40) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `subscribe` tinyint(1) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL,
  `country` varchar(255) DEFAULT 'AUSTRALIA',
  `dob` date DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/* Restore session variables to original values */
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
