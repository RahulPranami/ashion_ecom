CREATE TABLE
    `cart` (
        `id` int NOT NULL,
        `userId` int NOT NULL,
        `product_id` int NOT NULL,
        `product_price` int NOT NULL,
        `qty` int NOT NULL,
        `product_name` varchar(255) NOT NULL,
        `product_image` varchar(255) NOT NULL,
        `subTotal` int NOT NULL
    ) ENGINE = InnoDB;


INSERT INTO `cart` (`id`,`userId`,`product_id`,`product_price`,`qty`,`product_name`,`product_image`,`subTotal`)
  VALUES (17,1,3,321,1,'another','../assets/images/shop-9.jpg',321), 
          (18,1,9,423,1,'something','../assets/images/shop-8.jpg',423);

CREATE TABLE
    `category` (
        `id` int NOT NULL,
        `name` varchar(255) NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `category` (`id`, `name`) VALUES (1, 'shirt'), (2, 'dress'), (4, 'formals'), (5, 'blazer');


CREATE TABLE `orders` (
        `id` int NOT NULL,
        `userId` varchar(255) NOT NULL,
        `FirstName` varchar(255) NOT NULL,
        `LastName` varchar(255) NOT NULL,
        `Address` varchar(255) NOT NULL,
        `Postcode` decimal(6, 0) NOT NULL,
        `Phone` decimal(10, 0) NOT NULL,
        `Email` varchar(255) NOT NULL,
        `products` int NOT NULL,
        `total` int NOT NULL
    ) ENGINE = InnoDB;

CREATE TABLE
    `order_details` (
        `id` int NOT NULL,
        `order_id` int NOT NULL,
        `product_id` int NOT NULL,
        `product_qty` int NOT NULL,
        `product_price` int NOT NULL,
        `subTotal` int NOT NULL
    ) ENGINE = InnoDB;

CREATE TABLE
    `product` (
        `id` int NOT NULL,
        `name` varchar(255) NOT NULL,
        `categoryId` int NOT NULL,
        `image` varchar(255) DEFAULT NULL,
        `description` varchar(255) DEFAULT NULL,
        `price` decimal(6, 2) DEFAULT NULL,
        `status` varchar(20) DEFAULT NULL,
        `quantity` int NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `product` (`id`,`name`,`categoryId`,`image`,`description`,`price`,`status`,`quantity`)
  VALUES (1,'some',1,'../assets/images/shop-3.jpg','something','123.00',NULL,42), 
          (2,'another',1,'../assets/images/shop-4.jpg','another','342.00',NULL,22), 
          (3,'another',1,'../assets/images/shop-9.jpg','another','321.00',NULL,42), 
          (8,'some',1,'../assets/images/shop-7.jpg','something','223.00',NULL,0), 
          (9,'something',2,'../assets/images/shop-8.jpg','some desc','423.00',NULL,13), 
          (14,'some',4,'../assets/images/shop-5.jpg','some Prod','141.00',NULL,0), 
          (17,'feafea',2,'../assets/images/shop-3.jpg','feafea','1341.00',NULL,0), 
          (18,'Furry Hooded Parkha',5,'../assets/images/shop-1.jpg','some desc','59.00',NULL,0), 
          (19,'Furry Hooded Parkha',5,'../assets/images/shop-1.jpg','some desc','59.00',NULL,0), 
          (20,'Furry ',5,'../assets/images/shop-6.jpg','some desc','49.00',NULL,0);


CREATE TABLE `user` (
        `id` int NOT NULL,
        `name` varchar(250) DEFAULT NULL,
        `contactNumber` varchar(20) DEFAULT NULL,
        `email` varchar(50) DEFAULT NULL,
        `password` varchar(250) DEFAULT NULL,
        `status` varchar(20) DEFAULT NULL,
        `role` varchar(20) DEFAULT 'user',
        `address` varchar(255) DEFAULT NULL
    ) ENGINE = InnoDB;

INSERT INTO `user` (`id`,`name`,`contactNumber`,`email`,`password`,`status`,`role`,`address`) 
  VALUES (1,'admin123','1234567890','admin@gmail.com','root','true','admin','Some , address, for Home'), 
          (3,'feagfeag22','1234567890','some@some.com','some',NULL,'user','some'), 
          (4,'someone','1234567890','something@some.com','some',NULL,'user','someaddress'), 
          (5,'Rahul','3214569870','rahul.p@biztechcs.com','321654',NULL,'user','Some , Address');


ALTER TABLE `cart` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userId` (`userId`, `product_id`);
ALTER TABLE `category` ADD PRIMARY KEY (`id`);
ALTER TABLE `orders` ADD PRIMARY KEY (`id`),ADD KEY `userId` (`userId`),ADD KEY `products` (`products`);
ALTER TABLE `order_details` ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`);
ALTER TABLE `product` ADD PRIMARY KEY (`id`), ADD KEY `categoryId` (`categoryId`);
ALTER TABLE `user` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `cart` MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 19;
ALTER TABLE `category` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 6;
ALTER TABLE `orders` MODIFY `id` int NOT NULL AUTO_INCREMENT;
ALTER TABLE `order_details` MODIFY `id` int NOT NULL AUTO_INCREMENT;
ALTER TABLE `product` MODIFY `id` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT = 21;
ALTER TABLE `user` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 6;
ALTER TABLE `orders` ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT, ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`products`) REFERENCES `order_details` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `order_details` ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT, ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `product` ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`); 
