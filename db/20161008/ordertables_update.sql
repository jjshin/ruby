ALTER TABLE `orderdetails` CHANGE `created` `created` DATETIME NOT NULL;
ALTER TABLE `orderdetails` ADD `order_status` INT NOT NULL ;
ALTER TABLE `orderdetails` ADD `order_total` DOUBLE NOT NULL ;
ALTER TABLE `orderproducts` DROP `orderdate`, DROP `status`;
