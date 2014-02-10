CREATE DATABASE  IF NOT EXISTS `ujamaa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ujamaa`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: ujamaa
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agentlinks`
--

DROP TABLE IF EXISTS `agentlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agentlinks` (
  `agent` int(10) unsigned NOT NULL,
  `marketer` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agentlinks`
--

LOCK TABLES `agentlinks` WRITE;
/*!40000 ALTER TABLE `agentlinks` DISABLE KEYS */;
INSERT INTO `agentlinks` VALUES (2,2,1),(3,3,2),(4,3,3),(5,3,4),(6,3,5),(7,3,6),(1,1,7),(8,8,8),(9,9,9),(10,9,10),(11,9,11);
/*!40000 ALTER TABLE `agentlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Location` varchar(45) NOT NULL,
  `Creator` int(10) unsigned NOT NULL,
  `CurrentAgent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Creator_idx` (`Creator`),
  KEY `FK_Current_idx` (`CurrentAgent`),
  CONSTRAINT `FK_Creator` FOREIGN KEY (`Creator`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Current` FOREIGN KEY (`CurrentAgent`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Andrew','Omondi','725255212','andrueastman@gmail.com','Nairobi',1,1),(2,'Samuel','Sam','0723456789','','',1,1),(3,'Kamau','Makau','0756453434','kams@gmail.com','',4,4),(4,'Chris','Bart','01244','','',4,4),(5,'Kamau','Kamau','23423424','kamau@gmail.com','',10,10),(6,'dan','kamau','0723455234','','',3,3);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coments`
--

DROP TABLE IF EXISTS `coments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coments` (
  `id` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Orders_idx` (`OrderID`),
  CONSTRAINT `FK_Orders` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coments`
--

LOCK TABLES `coments` WRITE;
/*!40000 ALTER TABLE `coments` DISABLE KEYS */;
INSERT INTO `coments` VALUES (1,1,'Authorize');
/*!40000 ALTER TABLE `coments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentlist`
--

DROP TABLE IF EXISTS `commentlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentid` int(11) NOT NULL,
  `UserId` int(10) unsigned NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Order_idx` (`commentid`),
  KEY `FK_User_idx` (`UserId`),
  CONSTRAINT `FK_Comments` FOREIGN KEY (`commentid`) REFERENCES `coments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Username` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentlist`
--

LOCK TABLES `commentlist` WRITE;
/*!40000 ALTER TABLE `commentlist` DISABLE KEYS */;
INSERT INTO `commentlist` VALUES (1,1,1,'hjgcjhgckjhkh','2014-01-23 09:07:22',1),(2,1,1,'xfgnxjjfdjg','2014-01-23 09:07:26',1),(3,1,1,'srtsusustu','2014-01-23 09:07:33',1),(4,1,1,'sfjdjgfjfdgj','2014-01-23 09:07:48',1),(5,1,1,'dfhdfhdfdfh','2014-01-23 09:07:59',1),(6,1,1,'asdf','2014-02-07 17:06:10',1),(7,1,1,'sdfe','2014-02-07 17:13:27',1),(8,1,1,'this should be good\r\n','2014-02-07 17:14:26',1),(9,1,1,'kögdmkdfhdfh','2014-02-07 17:22:00',1),(10,1,1,'sdmpfkhmndf\r\ndfhmdohknd\r\ndhndnh\r\ndfhndlnhfh','2014-02-07 17:22:21',1),(11,1,1,'oeihrarhahr','2014-02-07 17:23:54',1),(12,1,1,'hehehehehee','2014-02-07 17:24:01',1),(15,1,1,'this is ','2014-02-07 17:44:02',2),(16,1,1,'this should happen','2014-02-07 17:44:13',2),(17,1,1,'why has he paid that much?','2014-02-07 19:17:51',2),(18,1,10,'the client says hell pay for transport','2014-02-08 09:55:59',11),(19,1,9,'Thats ok. No problem','2014-02-08 09:56:44',11),(20,1,1,'So eric accept the order. I too will accept the order','2014-02-08 09:57:57',11),(21,1,1,'then it has been agreed','2014-02-08 10:01:47',11),(22,1,1,'can he iowe','2014-02-08 14:54:02',11),(23,1,3,'the client says he\'ll pay for transport','2014-02-08 15:00:49',13),(24,1,1,'Thats ok. Ill accep the order','2014-02-08 15:01:21',13);
/*!40000 ALTER TABLE `commentlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'marketer','Marketer'),(3,'agent','Agent');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `client_informed` tinyint(4) DEFAULT '0',
  `informer` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_idx` (`order_id`),
  CONSTRAINT `FK_invoice_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,2,'2014-01-24 15:30:01',400.00,1,NULL),(2,7,'2014-01-25 05:42:30',200.00,1,NULL),(3,11,'2014-02-08 07:21:37',0.00,1,NULL),(4,13,'2014-02-08 15:01:41',200.00,1,NULL);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_particulars`
--

DROP TABLE IF EXISTS `order_particulars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_particulars` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `FK_products_idx` (`product_id`),
  CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_particulars`
--

LOCK TABLES `order_particulars` WRITE;
/*!40000 ALTER TABLE `order_particulars` DISABLE KEYS */;
INSERT INTO `order_particulars` VALUES (1,1,200.00,2),(2,2,200.00,2),(3,2,150.00,1),(4,2,150.00,1),(5,2,150.00,1),(6,2,200.00,1),(7,2,200.00,1),(8,2,200.00,1),(9,2,200.00,1),(10,1,0.00,0),(10,2,200.00,3),(11,1,0.00,1),(12,2,200.00,2),(13,1,0.00,0),(13,2,200.00,1);
/*!40000 ALTER TABLE `order_particulars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `client_id` int(11) DEFAULT NULL,
  `marketer_id` int(10) unsigned DEFAULT NULL,
  `date_marketer` datetime DEFAULT NULL,
  `admin_id` int(10) unsigned DEFAULT NULL,
  `date_admin` datetime DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `agent` int(10) unsigned DEFAULT NULL,
  `cancelled` tinyint(4) DEFAULT '0',
  `completed` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_client_idx` (`client_id`),
  KEY `FK_marketer_idx` (`marketer_id`),
  KEY `FK_admin_idx` (`admin_id`),
  KEY `FK_agent_idx` (`agent`),
  CONSTRAINT `FK_admin` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_agent` FOREIGN KEY (`agent`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_marketer` FOREIGN KEY (`marketer_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,0,0,1,1,'2014-01-23 08:18:15',1,'2014-01-23 08:18:15','2014-01-23 08:18:15',1,0,0),(2,0,1,2,1,'2014-01-24 15:30:01',1,'2014-01-24 15:18:55','2014-01-24 12:10:34',1,0,0),(3,0,0,2,NULL,NULL,NULL,'2014-01-24 15:03:55','2014-01-24 12:11:23',1,1,0),(4,0,0,2,NULL,NULL,NULL,NULL,'2014-01-24 12:14:29',1,0,0),(5,0,0,2,NULL,NULL,NULL,NULL,'2014-01-24 12:16:40',1,0,0),(6,1,0,2,NULL,NULL,NULL,NULL,'2014-01-24 12:17:02',1,0,0),(7,1,0,3,3,'2014-01-25 05:40:57',1,'2014-01-25 05:42:30','2014-01-25 05:40:36',4,0,0),(8,1,0,4,NULL,NULL,NULL,NULL,'2014-01-25 12:54:41',4,1,0),(9,1,0,4,3,'2014-02-08 14:58:36',NULL,NULL,'2014-01-25 12:55:05',4,0,0),(10,1,0,1,NULL,NULL,NULL,NULL,'2014-02-04 14:25:57',1,0,0),(11,1,0,5,9,'2014-02-08 07:20:33',1,'2014-02-08 14:54:14','2014-02-08 07:14:06',10,0,0),(12,1,0,5,NULL,NULL,NULL,NULL,'2014-02-08 07:19:38',10,1,0),(13,1,0,6,3,'2014-02-08 15:01:41',1,'2014-02-08 15:01:22','2014-02-08 15:00:33',3,0,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_options` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_options`
--

LOCK TABLES `payment_options` WRITE;
/*!40000 ALTER TABLE `payment_options` DISABLE KEYS */;
INSERT INTO `payment_options` VALUES ('cash'),('cheque'),('deposit_slip');
/*!40000 ALTER TABLE `payment_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `MinPrice` decimal(10,2) NOT NULL,
  `MaxPrice` decimal(10,2) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'8X15','business best',100.00,150.00,1),(2,'windows','',100.00,200.00,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `ref_no` varchar(45) DEFAULT NULL,
  `receipient_id` int(10) unsigned DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT '0',
  `date_paid` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_payment_type_idx` (`type`),
  KEY `FK_receipient_idx` (`receipient_id`),
  KEY `FK_invoice_idx` (`invoice_id`),
  CONSTRAINT `FK_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_payment_type` FOREIGN KEY (`type`) REFERENCES `payment_options` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_receipient` FOREIGN KEY (`receipient_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` VALUES (15,1,100.00,'cash',NULL,NULL,1,'2014-01-28 13:30:20'),(16,1,100.00,'cash',NULL,NULL,1,'2014-01-28 13:30:34'),(17,1,100.00,'cash',NULL,NULL,1,'2014-01-28 13:30:40');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1391945733,1,'Admin','istrator','ADMIN','0'),(2,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','a s','dbd4a6d9fa971758968dcf87d53566097f63b8fe',NULL,'a@a',NULL,NULL,NULL,NULL,1390390527,1390390527,1,'a','s','0','98345'),(3,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','tom sam','9baaf2d18df9dc95ec92f7d6582246148961e45b',NULL,'tomsam@gmail.com',NULL,NULL,NULL,NULL,1390613250,1391860895,1,'tom','sam','0','0712123123'),(4,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','sam tom','9cf3c491207d5d7f0b75e36094058c78a6e03375',NULL,'samtom@gmail.com',NULL,NULL,NULL,NULL,1390614180,1391924839,1,'sam','tom','0','0712343434'),(5,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','dan sam','76ea320859cb42880f849fcde79470fed9fa959a',NULL,'dam@d.com',NULL,NULL,NULL,NULL,1390614326,1391790048,1,'dan','sam','0','12313132'),(6,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','fun kam','9c62f90b36e3f77d50a7ce921fab02df3d0dbe39',NULL,'fun@g.com',NULL,NULL,NULL,NULL,1390614420,1390614420,1,'fun','kam','0','124131'),(7,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','dan fun','9a6dba78999f51aea94ce1d2978b0266fcd9bcc0',NULL,'fuds@assd.com',NULL,NULL,NULL,NULL,1390614448,1390614448,1,'dan','fun','0','1231413'),(8,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','david kamau','980f3f99e22a3bfcbee75fc7ec8165c7fdf89a19',NULL,'davidkamau@gmail.com',NULL,NULL,NULL,NULL,1391830619,1391830754,1,'David','Kamau','0','023432123'),(9,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','eric omondi','3d50eee49bbd07197271f6830da84ed73ba1b357',NULL,'eric@gmail.com',NULL,NULL,NULL,NULL,1391830978,1391842269,1,'eric','omondi','0','123423'),(10,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','harry oondi','07a5301fe49df3f6be729a497aedf80c6f70e711',NULL,'harry@gmail.com',NULL,NULL,NULL,NULL,1391831074,1391842518,1,'harry','oondi','0','234232'),(11,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','phil kamau','6137a72b759c7fe3279a8de09de8edef81c864e7',NULL,'phil@gmail.com',NULL,NULL,NULL,NULL,1391832697,1391832697,1,'phil','kamau','0','121423');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,2),(5,2,3),(6,3,2),(7,3,3),(8,4,3),(9,5,3),(10,6,3),(11,7,3),(12,8,1),(13,8,2),(14,8,3),(15,9,2),(16,9,3),(17,10,3),(18,11,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-10 14:59:33
