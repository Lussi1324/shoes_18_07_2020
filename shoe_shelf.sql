-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for shoe_shelf
CREATE DATABASE IF NOT EXISTS `shoe_shelf` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `shoe_shelf`;

-- Dumping structure for table shoe_shelf.brands
CREATE TABLE IF NOT EXISTS `offers` (
                                        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                        `name` varchar(255) NOT NULL,
                                        `price` DECIMAL(20) NOT NULL,
                                        `image_url` varchar(255) NOT NULL,
                                        `description` text NOT NULL,
                                        `brand_id` int(10) unsigned NOT NULL,
                                        `user_id` int(10) unsigned NOT NULL,
                                        PRIMARY KEY (`id`),
                                        KEY `FK__offers_brand_id__brands_id` (`brand_id`),
                                        KEY `FK__offers_user_id__users_id` (`user_id`),
                                        CONSTRAINT `FK__offers_brand_id__brands_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
                                        CONSTRAINT `FK__offers_user_id__users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table shoe_shelf.brands
CREATE TABLE IF NOT EXISTS `brands` (
                                        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                        `brand` varchar(50) NOT NULL DEFAULT '0',
                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table shoe_shelf.users
CREATE TABLE IF NOT EXISTS `users` (
                                       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                       `email` varchar(255) NOT NULL,
                                       `full_name` varchar(167) NOT NULL,
                                       `password` varchar(255) NOT NULL,
                                       PRIMARY KEY (`id`),
                                       UNIQUE KEY `email` (`email`),
                                       UNIQUE KEY `full_name` (`full_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

INSERT INTO `shoe_shelf`.`brands` (`brand`) VALUES ('Nike');
INSERT INTO `shoe_shelf`.`brands` (`brand`) VALUES ('Adidas');
INSERT INTO `shoe_shelf`.`brands` (`brand`) VALUES ('Reebok');
INSERT INTO `shoe_shelf`.`brands` (`brand`) VALUES ('Asics');
INSERT INTO `shoe_shelf`.`brands` (`brand`) VALUES ('Under Amour');