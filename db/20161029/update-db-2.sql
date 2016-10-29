ALTER TABLE `products` DROP FOREIGN KEY `products_ibfk_3`;
ALTER TABLE `suppliers` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `products` ADD FOREIGN KEY (`suppliers_id`) REFERENCES `fitie2016t21dev`.`suppliers`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `users`
ADD `country` VARCHAR(255) NULL DEFAULT 'AUSTRALIA',
ADD  `dob` DATE NULL,
ADD  `gender` VARCHAR(45) NULL;

ALTER TABLE `users`
  DROP `username`;

ALTER TABLE `products`
  DROP `descript`,
  DROP `ship`,
  DROP `price`;

  ALTER TABLE `products` CHANGE `image` `image` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
