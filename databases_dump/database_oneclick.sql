# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.7.28)
# Схема: oneclick
# Время создания: 2020-07-07 15:50:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `city` varchar(45) NOT NULL,
  `street` varchar(100) NOT NULL,
  `house` varchar(10) NOT NULL,
  `flat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_addresses_users1_idx` (`user_id`),
  CONSTRAINT `fk_addresses_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(32) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_UNIQUE` (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(75) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`, `link`)
VALUES
	(1,'ASUS','asus'),
	(4,'Acer','acer'),
	(5,'Microsoft','microsoft');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `image` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link_UNIQUE` (`link`),
  UNIQUE KEY `image_UNIQUE` (`image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `link`, `image`)
VALUES
	(1,'Мышки','mouses','a0efb100b2c4f7b3d9779d77a70bf8a4'),
	(2,'Клавиатуры','keyboards','3406b685a57a0319a97b77973af42b3c'),
	(3,'Наушники','earphones','685a6f621fb9b2979547038301535b19'),
	(4,'Микрофоны','microphones','96f5683f1ae042789ccf4a67cc144f2d'),
	(7,'Ковры','carpets','59c2c2a5918673fb794939f57042873b');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы favourite_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favourite_products`;

CREATE TABLE `favourite_products` (
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `fk_products_has_users_users1_idx` (`user_id`),
  KEY `fk_products_has_users_products1_idx` (`product_id`),
  CONSTRAINT `fk_products_has_users_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `favourite_products` WRITE;
/*!40000 ALTER TABLE `favourite_products` DISABLE KEYS */;

INSERT INTO `favourite_products` (`product_id`, `user_id`)
VALUES
	(8,1);

/*!40000 ALTER TABLE `favourite_products` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`product_id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_images_products1_idx` (`product_id`),
  CONSTRAINT `fk_images_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `name`, `product_id`)
VALUES
	(30,'0f1c2ca9ac42b57e9cc130eccce1700d',6),
	(29,'1ff56fe37c8249224dca9125f4c003df',5),
	(32,'21f005a65b51032096de146ca557cc4f',7),
	(21,'3af19860792474bc6743f65410918316',4),
	(27,'428f5534d1c4964293a92117f1170134',5),
	(34,'5b17c1b885798b6f25eb233aa42d38b3',7),
	(22,'663d34847be12bfc8271ce6063988832',4),
	(41,'6abfd330f14fba43ef9ed4df96615d23',9),
	(23,'7296b165ba549e8e7314f1ab1c15b900',4),
	(36,'7e512b52c0642c6d9f34053f00353416',8),
	(38,'8295675948b4489f45964a6e4ed0572b',8),
	(40,'8bb0cc3ea5cf735490149de195483307',9),
	(28,'ac400d9e92993e00eca988a0ec16a8e5',5),
	(24,'bc633044c9a2412524a76cee7833a4c0',4),
	(25,'d07f1c67792b941e61c703075e9657d7',4),
	(33,'dbfb51b782d44d65c105f3bc0a409cd9',7),
	(37,'e0440178bb26c0f480ac43340bbbc8b6',8),
	(31,'e2a1a01b9c6c3e519aaa66e5b0b811d3',6),
	(39,'e3cd4c9fe2cfd5910abdda905fba77bf',8),
	(26,'ef4e742eb80e8aa8981b63831f680c92',5),
	(35,'fb95823810edb9f6639e545a3b9aad4c',8);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы order_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_products`;

CREATE TABLE `order_products` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_orders_has_products_products1_idx` (`product_id`),
  KEY `fk_orders_has_products_orders1_idx` (`order_id`),
  CONSTRAINT `fk_orders_has_products_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;

INSERT INTO `order_products` (`order_id`, `product_id`, `count`)
VALUES
	(1,8,1),
	(2,7,1);

/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы order_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_status`;

CREATE TABLE `order_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `runame` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;

INSERT INTO `order_status` (`id`, `name`, `runame`)
VALUES
	(1,'Waiting for payment','Ожидается оплата'),
	(2,'Paid','Оплачен'),
	(3,'Shipped','Отправлен'),
	(4,'Delivered','Доставлен');

/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `address` varchar(150) NOT NULL,
  `sum` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`user_id`,`status_id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  KEY `fk_orders_order_status1_idx` (`status_id`),
  CONSTRAINT `fk_orders_order_status1` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `date`, `user_id`, `address`, `sum`, `status_id`, `name`, `email`, `phone`)
VALUES
	(1,'2020-07-07 08:53:07',3,'Московская обл, г Люберцы, ул Весенняя',4900,3,'Test','admin@admin.ru','89152232323'),
	(2,'2020-07-07 08:54:24',1,'Московская обл, г Люберцы, Проектируемый проезд',4990,1,'Test','rina.runet@gmail.com','89152232323');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `article` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`category_id`,`brand_id`),
  UNIQUE KEY `article_UNIQUE` (`article`),
  KEY `fk_products_categories_idx` (`category_id`),
  KEY `fk_products_brand1_idx` (`brand_id`),
  CONSTRAINT `fk_products_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `article`, `name`, `description`, `price`)
VALUES
	(4,1,5,'00131','Беспроводная мышь Microsoft Precision','Новая **Microsoft Precision Mouse** — это еще больше возможностей для персонализации. Ее хозяин сам решит, работать ей в проводном режиме с подключением через USB или беспроводном (Bluetooth® Low Energy) до трех месяцев без подзарядки. К тому же у мыши целых 6 программируемых кнопок, с которыми все необходимые функции будут буквально под рукой.',7590),
	(5,1,5,'00132','Беспроводная лазерная мышь Microsoft ARC','**Тонкая, легкая, готовая к путешествиям**\r\n\r\nМышь Microsoft Arc Mouse создана для комфортного размещения в руке; более того, в сложенном виде ее удобно носить. Подключается через Bluetooth®',6490),
	(6,1,1,'00121','Мышь беспроводная Asus WT300','**Беспроводная оптическая мышь с эргономичным корпусом**\r\n\r\n- Компактный, эргономичный корпус обеспечивает комфорт при длительном использовании\r\n- Симметричная форма одинаково хорошо подходит и для правшей, и для левшей\r\n- Оптический сенсор с двумя уровням чувствительности (1000 и 1600 точек на дюйм; для переключения меду ними достаточно одновременно нажать на колесико и правую кнопку мыши)\r\n- Время работы от одной батарейки – до 15 месяцев*\r\n- Устройство доступно в матово-черном и глянцево-белом вариантах\r\n\r\n* Рассчитано при условии использования 8 часов в день. Действительный срок службы от одной батарейки может быть другим.',1400),
	(7,3,1,'00122','ASUS HS-W1 Беспроводные наушники RF 2.4 гГц','- ASUS HS-W1 Беспроводные наушники RF \r\n- 2.4 гГц, 40 мм неодимовые магниты \r\n- 32 Ом\r\n- 20 ~ 20000 Гц\r\n- микрофон\r\n- USB\r\n- 90YAHI6130-UA00',4990),
	(8,3,1,'00123','Беспроводные Bluetooth наушники Asus EB50N','Беспроводные Bluetooth наушники Asus EB50N',4900),
	(9,1,1,'00124','Мышь проводная Asus UT200','Прекрасная эргономика и высокая точность позиционирования\r\n\r\n- Высокое разрешение сенсора (1000 точек на дюйм)\r\n- Эргономичная конструкция для максимального комфорта\r\n- Длинный кабель (1,5 м)',800);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sponsors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sponsors`;

CREATE TABLE `sponsors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image_UNIQUE` (`image`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы user_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_status`;

CREATE TABLE `user_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;

INSERT INTO `user_status` (`id`, `name`)
VALUES
	(1,'user'),
	(2,'moderator'),
	(3,'administrator');

/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `auth_token` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`,`status_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  KEY `fk_users_user_status1_idx` (`status_id`),
  CONSTRAINT `fk_users_user_status1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `salt`, `phone`, `status_id`, `auth_token`)
VALUES
	(1,'Арина',NULL,'rina.runet@gmail.com','d76a8cadf48e7dfb30f97904a79a725469b7fc509bf3ce54bc8c8d1ab084a134f8b82969b1b34eb721a23ad4b30076a256bf525e81e2f97e03840da947ec7062','VTHMGTHSBSTKDNJSGQESNKBAPFBKHMOSQUCHWZOHWDMNH',NULL,3,'3b02e71d4eeda61ded6b83f968f9d1e9e13f115daf5ceb643856c2a8bcf38897'),
	(3,'Admin',NULL,'admin@admin.ru','c45bbfbfc7013abcfcd21216847c6e7374af7cdf2c94fe32b5e6a269cd7ca0eca1490be5041bc437f4ef07792510b4b454a70309e53f93a0d168421d7624a2a4','UPYNCOAVHKMCLMPSMYUTRTENGKRQEWYZJXQLVKHKGVUDZ',NULL,3,'97e04f78eb520aa58af54b3b356a0d5f299ee53b3c58f96e4ac5910c7478ba53');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
