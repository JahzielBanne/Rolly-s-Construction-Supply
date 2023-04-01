-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rolly_db
CREATE DATABASE IF NOT EXISTS `rolly_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `rolly_db`;

-- Dumping structure for table rolly_db.tbl_client
CREATE TABLE IF NOT EXISTS `tbl_client` (
  `client_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(180) NOT NULL DEFAULT '',
  `client_address` varchar(180) NOT NULL DEFAULT '',
  `client_number` varchar(180) NOT NULL DEFAULT '',
  `client_date_added` date NOT NULL,
  `client_time_added` time NOT NULL,
  `client_date_updated` date NOT NULL,
  `client_time_updated` time NOT NULL,
  `client_status` int(1) NOT NULL,
  `client_token` varchar(255) NOT NULL,
  `client_access` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rolly_db.tbl_client: 4 rows
/*!40000 ALTER TABLE `tbl_client` DISABLE KEYS */;
INSERT INTO `tbl_client` (`client_id`, `client_name`, `client_address`, `client_number`, `client_date_added`, `client_time_added`, `client_date_updated`, `client_time_updated`, `client_status`, `client_token`, `client_access`) VALUES
	(101, 'ESTEBAN GABAYOYO LIBO-ON', 'PRK. PARAISO, BRGY. PUNTA TAYTAY, BACOLOD CITY', '09430327728', '2023-03-08', '22:02:10', '2023-03-22', '15:21:05', 1, '', ''),
	(104, 'HANNAH SOPHIA BELLEZA', 'PRK. KATILINGBAN, BRGY. PUNTA TAYTAY, BACOLOD CITY', '09392290011', '2023-03-09', '10:10:19', '0000-00-00', '00:00:00', 1, '', ''),
	(105, 'SHUTO VELASCO FUKUSHIMA', 'BLK 46 LOT 4, DC 1, REGENT PEARL HOMES SUBDIVISION, BRGY. ALIJIS, BACOLOD CITY', '09278244553', '2023-03-09', '14:00:50', '0000-00-00', '00:00:00', 1, '', ''),
	(106, 'CHARLEN CORNEL MAGALLONES', 'PRK. KATILINGBAN, BRGY. PUNTA TAYTAY, BACOLOD CITY', '09451303921', '2023-03-14', '21:39:34', '0000-00-00', '00:00:00', 1, '', '');
/*!40000 ALTER TABLE `tbl_client` ENABLE KEYS */;

-- Dumping structure for table rolly_db.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `quantity` int(8) NOT NULL,
  `amount` int(8) NOT NULL,
  `order_status` int(1) NOT NULL,
  `order_save` int(1) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rolly_db.tbl_order: ~10 rows (approximately)
INSERT INTO `tbl_order` (`order_id`, `product_id`, `quantity`, `amount`, `order_status`, `order_save`) VALUES
	(10037, 1001, 2, 2000, 0, 0),
	(10038, 1001, 35, 35000, 0, 0),
	(10038, 1001, 35, 35000, 0, 0),
	(10038, 1001, 45, 45000, 0, 0),
	(10037, 1004, 15456, 7728000, 0, 0),
	(10038, 1002, 12, 24000, 0, 0),
	(10037, 1003, 13, 19500, 0, 0),
	(10039, 1002, 3, 6000, 1, 0),
	(10040, 1006, 4, 2000, 0, 0),
	(10041, 1002, 3, 6000, 0, 0),
	(10039, 1003, 3, 4500, 1, 0),
	(10043, 1005, 5, 15000, 1, 0);

-- Dumping structure for table rolly_db.tbl_orderdetails
CREATE TABLE IF NOT EXISTS `tbl_orderdetails` (
  `order_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(8) NOT NULL,
  `orderdetails_date_added` date NOT NULL,
  `orderdetails_time_added` time NOT NULL,
  `orderdetails_date_updated` date NOT NULL,
  `orderdetails_time_updated` time NOT NULL,
  `orderdetails_status` int(1) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10044 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rolly_db.tbl_orderdetails: 7 rows
/*!40000 ALTER TABLE `tbl_orderdetails` DISABLE KEYS */;
INSERT INTO `tbl_orderdetails` (`order_id`, `client_id`, `orderdetails_date_added`, `orderdetails_time_added`, `orderdetails_date_updated`, `orderdetails_time_updated`, `orderdetails_status`) VALUES
	(10039, 105, '2023-03-23', '09:45:58', '0000-00-00', '00:00:00', 1),
	(10043, 101, '2023-03-31', '23:41:53', '0000-00-00', '00:00:00', 1),
	(10042, 101, '2023-03-29', '22:30:21', '0000-00-00', '00:00:00', 1),
	(10041, 101, '2023-03-29', '22:28:10', '0000-00-00', '00:00:00', 1),
	(10040, 105, '2023-03-29', '22:24:42', '0000-00-00', '00:00:00', 1),
	(10038, 105, '2023-03-22', '09:14:26', '0000-00-00', '00:00:00', 1),
	(10037, 101, '2023-03-22', '09:10:34', '0000-00-00', '00:00:00', 1);
/*!40000 ALTER TABLE `tbl_orderdetails` ENABLE KEYS */;

-- Dumping structure for table rolly_db.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(180) NOT NULL DEFAULT '',
  `category_name` varchar(180) NOT NULL DEFAULT '',
  `product_price` int(180) NOT NULL DEFAULT 0,
  `product_date_added` date NOT NULL,
  `product_time_added` time NOT NULL,
  `product_date_updated` date NOT NULL,
  `product_time_updated` time NOT NULL,
  `product_status` int(1) NOT NULL DEFAULT 0,
  `product_token` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rolly_db.tbl_product: 6 rows
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_name`, `product_price`, `product_date_added`, `product_time_added`, `product_date_updated`, `product_time_updated`, `product_status`, `product_token`) VALUES
	(1001, 'Gravel', 'Sand', 1000, '2023-02-20', '21:12:17', '0000-00-00', '00:00:00', 1, ''),
	(1002, 'White Stone', 'Stone', 2000, '2023-02-20', '21:37:54', '0000-00-00', '00:00:00', 1, ''),
	(1003, 'Hollowblocks', 'Stone', 1500, '2023-02-22', '22:06:36', '0000-00-00', '00:00:00', 1, ''),
	(1004, 'Wire', 'Metal', 500, '2023-03-08', '22:00:15', '0000-00-00', '00:00:00', 1, ''),
	(1005, 'Rocks', 'Stone', 3000, '2023-03-12', '22:52:49', '0000-00-00', '00:00:00', 1, ''),
	(1006, 'Bamboo', 'Wood', 500, '2023-03-22', '15:23:24', '0000-00-00', '00:00:00', 1, '');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table rolly_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date NOT NULL,
  `user_time_added` time NOT NULL,
  `user_date_updated` date NOT NULL,
  `user_time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000010 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rolly_db.tbl_users: 5 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`) VALUES
	(10000002, 'Bryant', 'Kobe', 'kobe@gmail.com', 'kobe', '2023-02-15', '20:36:59', '2023-03-22', '15:25:30', 1, '', 'Staff'),
	(10000006, 'Callupez', 'Rolen John', 'rjcallupez@gmail.com', 'callupez', '2023-02-22', '21:52:09', '2023-03-09', '10:11:57', 1, '', 'Supervisor'),
	(10000007, 'Callupez', 'Rolando', 'rolly@gmail.com', 'rolly', '2023-02-22', '21:53:03', '2023-03-22', '15:25:19', 1, '', 'Owner'),
	(10000008, 'Callupez', 'Kristina', 'kristinacallupez@gmail.com', 'kristina', '2023-02-22', '22:07:08', '2023-03-22', '15:25:11', 1, '', 'Supervisor'),
	(10000009, 'Callupez', 'Encarnita', 'encarcallupez@gmail.com', 'encarnita', '2023-03-22', '15:24:47', '0000-00-00', '00:00:00', 1, '', 'Owner');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
