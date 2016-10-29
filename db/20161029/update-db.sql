CREATE TABLE IF NOT EXISTS `fitie2016t21dev`.`suppliers` (
  `id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `fitie2016t21dev`.`brands` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `fitie2016t21dev`.`sale` (
  `id` INT NOT NULL,
  `products_id` INT NOT NULL,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  `rate` DOUBLE NOT NULL,
  PRIMARY KEY (`id`, `products_id`),
  INDEX `fk_sales_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_sales_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `ruby`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `fitie2016t21dev`.`enquires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
ALTER TABLE `enquires`
  ADD CONSTRAINT `enquires_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  

ALTER TABLE `fitie2016t21dev`.`products`
  ADD `suppliers_id` INT NOT NULL,
  ADD `brands_id` INT NOT NULL,
  ADD `status` INT NOT NULL,
  ADD `sku` INT NOT NULL,
  ADD `short_desc` TEXT(100) NULL,
  ADD `long_desc` TEXT(2000) NULL,
  ADD `retail_price` DECIMAL(7,2) NULL,
  ADD `cost_price` DECIMAL(7,2) NULL,
  ADD `sale_price` DECIMAL(7,2) NULL,
  ADD `size` VARCHAR(45) NULL,
  ADD `sizeunit` VARCHAR(45) NULL,
  ADD `weight` VARCHAR(45) NULL,
  ADD `weightunit` VARCHAR(45) NULL,
  ADD `height` VARCHAR(45) NULL,
  ADD `heightunit` VARCHAR(45) NULL COMMENT '	',
  ADD `width` VARCHAR(45) NULL,
  ADD `widthunit` VARCHAR(45) NULL,
  ADD `length` VARCHAR(45) NULL,
  ADD `lengthunit` VARCHAR(45) NULL,
  ADD `image2` VARCHAR(100) NULL,
  ADD `image3` VARCHAR(100) NULL,
  ADD `image4` VARCHAR(100) NULL,
  ADD `image5` VARCHAR(100) NULL,
  ADD `created` DATETIME NOT NULL ;

ALTER TABLE `products` ADD INDEX(`suppliers_id`);
ALTER TABLE `products` ADD INDEX(`brands_id`);
ALTER TABLE `products` ADD FOREIGN KEY (`suppliers_id`) REFERENCES `fitie2016t21dev`.`suppliers`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; ALTER TABLE `products` ADD FOREIGN KEY (`brands_id`) REFERENCES `fitie2016t21dev`.`brands`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
