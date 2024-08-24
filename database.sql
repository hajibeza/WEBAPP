-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for music_shop
CREATE DATABASE IF NOT EXISTS `music_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `music_shop`;

-- Dumping structure for table music_shop.basket
CREATE TABLE IF NOT EXISTS `basket` (
  `username` varchar(255) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_brand` varchar(255) DEFAULT NULL,
  `p_model` varchar(255) DEFAULT NULL,
  `p_color` varchar(255) DEFAULT NULL,
  `p_quantity` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) DEFAULT NULL,
  `p_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table music_shop.basket: ~0 rows (approximately)

-- Dumping structure for table music_shop.history
CREATE TABLE IF NOT EXISTS `history` (
  `username` varchar(255) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_brand` varchar(255) DEFAULT NULL,
  `p_model` varchar(255) DEFAULT NULL,
  `p_color` varchar(255) DEFAULT NULL,
  `p_quantity` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table music_shop.history: ~4 rows (approximately)
REPLACE INTO `history` (`username`, `p_name`, `p_brand`, `p_model`, `p_color`, `p_quantity`, `p_price`) VALUES
	('', 'กีต้าโป่งไฟ', 'mazda', 'CRV', 'ดำ', NULL, '50000'),
	('admin', 'กีต้าโป่งไฟ', 'mazda', 'CRV', 'ดำ', NULL, '50000'),
	('admin', 'กีต้าโป่งไฟ', 'mazda', 'CRV', 'ดำ', NULL, '50000'),
	('admin', 'tester1', 'yamaha', 'v01', 'black', NULL, '10000');

-- Dumping structure for table music_shop.product
CREATE TABLE IF NOT EXISTS `product` (
  `p_name` varchar(255) DEFAULT NULL,
  `p_desc` varchar(255) DEFAULT NULL,
  `p_brand` varchar(255) DEFAULT NULL,
  `p_model` varchar(255) DEFAULT NULL,
  `p_color` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) DEFAULT NULL,
  `p_img` varchar(255) DEFAULT NULL,
  `p_instock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table music_shop.product: ~2 rows (approximately)
REPLACE INTO `product` (`p_name`, `p_desc`, `p_brand`, `p_model`, `p_color`, `p_price`, `p_img`, `p_instock`) VALUES
	('กีต้าโป่งไฟ', '----------------', 'mazda', 'CRV', 'ดำ', '50000', 'main.png', 50);

-- Dumping structure for table music_shop.review
CREATE TABLE IF NOT EXISTS `review` (
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `star` varchar(255) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table music_shop.review: ~3 rows (approximately)
REPLACE INTO `review` (`username`, `comment`, `star`, `p_name`) VALUES
	('admin', '', '4', 'กีต้าโป่งไฟ'),
	('admin', '', '4', 'กีต้าโป่งไฟ'),
	('admin', 'asdasd', '3', 'กีต้าโป่งไฟ');

-- Dumping structure for table music_shop.userdata
CREATE TABLE IF NOT EXISTS `userdata` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table music_shop.userdata: ~2 rows (approximately)
REPLACE INTO `userdata` (`username`, `password`, `role`) VALUES
	('hajibe', '$2y$10$VCt3lXYbGksuQeHgU4BIguv4pdttAg/NYOPns.nzGf3Lv4ALhc0wm', 'user'),
	('admin', '$2y$10$iDIkgCQKBsLzXOzZILgSdeW6U4o1ROrVGipk5zUUoF73d85.XItgO', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
