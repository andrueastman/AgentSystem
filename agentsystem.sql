CREATE DATABASE  IF NOT EXISTS `agentsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `agentsystem`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: agentsystem
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `admin_memo`
--

DROP TABLE IF EXISTS `admin_memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT 'memo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_memo`
--

LOCK TABLES `admin_memo` WRITE;
/*!40000 ALTER TABLE `admin_memo` DISABLE KEYS */;
INSERT INTO `admin_memo` VALUES (1,'kjash khijhiu kjsh ihus l','memo'),(2,'ahjkh kjhkj s jhsiu hw iulh ui shl','memo'),(3,'jhas kjhiu s khiuwe jhs iuwh 3l','memo'),(4,'jhas kjhiu s khiuwe jhs iuwh 3l','memo'),(5,'thokl ksjl kjw jojs klj kljow e','memo'),(6,'your are very good. thank you for your services.','memo'),(7,'You are fired.','memo');
/*!40000 ALTER TABLE `admin_memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agentclient`
--

DROP TABLE IF EXISTS `agentclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agentclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `postal` varchar(100) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `agent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  CONSTRAINT `agentclient_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agentclient`
--

LOCK TABLES `agentclient` WRITE;
/*!40000 ALTER TABLE `agentclient` DISABLE KEYS */;
INSERT INTO `agentclient` VALUES (1,'tom','sam','tom_sam','1234567','',NULL,'',3),(2,'sam','tom','sam_tom','mdafa','',NULL,'',3),(3,'dan','brown','dan_brown','123456789','',NULL,'',3),(4,'ads','dadf','ads_dadf','dfafafsa','',NULL,'',3),(5,'john','john','john_john','john','',NULL,'',3),(6,'happy','sad','happy_sad','123456789','',NULL,'',3),(7,'ron','dan','ron_dan','07123456778','',NULL,'',3),(8,'halle','dasdsa','halle_dasdsa','121331','',NULL,'',3),(9,'dan','brown','dan_brown','12332','dan@gmail.com',NULL,'Farming',3),(10,'dan','brown','dan_brown','12332','dan@gmail.com',NULL,'Farming',3),(11,'adfas','dsfa','adfas_dsfa','adfafe','',NULL,'',3),(12,'adfas','dsfa','adfas_dsfa','adfafe','',NULL,'',3),(13,'adfaa','afafd','adfaa_afafd','afdasf','',NULL,'',3),(14,'adfa','fsafd','adfa_fsafd','asfafasf','',NULL,'',3),(15,'adfa','adfa','adfa_adfa','afafd','',NULL,'',3),(16,'asda','afa','asda_afa','asdfasf','',NULL,'',3),(17,'asda','afa','asda_afa','asdfasf','',NULL,'',3),(18,'sam','mwangin 0','sam_mwangin 0','0722123123','sam@gmail.com',NULL,'Flowers',3),(19,'sadf','asfsf','sadf_asfsf','fasdfasf','',NULL,'',3),(20,'sadf','asfsf','sadf_asfsf','fasdfasf','',NULL,'',3),(21,'fran','luiz','fran_luiz','dfsa','',NULL,'',3),(22,'Bonface','Munyoki','bonface_munyoki','0707661047','bonfacemunyoki@gmail.com',NULL,'null',3),(23,'Samul','Dan','samul_dan','kjsfoiewj','',NULL,'',3),(24,'glwagf','glawfaj','glwagf_glawfaj','jalfjlkja','ljaljfaj',NULL,'jqkgjljlkj',3),(25,'Chris','samo','chris_samo','090320','',NULL,'',3),(26,'Chris','samo','chris_samo','090320','',NULL,'',3),(27,'Chris','samo','chris_samo','090320','',NULL,'',3),(28,'Chris','Re','chris_re','lkks','',NULL,'',3),(29,'ds','as','ds_as','sdfa','',NULL,'',3),(30,'fred','Kamau','fred_kamau','0712345678','fred@gmail.com',NULL,'',3);
/*!40000 ALTER TABLE `agentclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `physical_location` varchar(100) DEFAULT NULL,
  `postal` varchar(100) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `bankname` varchar(40) DEFAULT NULL,
  `bankdetails` varchar(40) DEFAULT NULL,
  `account_no` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` VALUES (1,'GREENHOUSE LTD','Bruce House Foor 10 Room 1203','P.O. Box 123-00100 Nairobi','Nairobi','Kenya','greenhse@gmail.com','0723456789','assets/img/logo.png','Equity','Knut House','1523454546232');
/*!40000 ALTER TABLE `company_details` ENABLE KEYS */;
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
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(3,'agent','Agent');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `agent_id` int(11) unsigned DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_due` datetime NOT NULL,
  `handled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `agent_id_fk` (`agent_id`),
  CONSTRAINT `agent_id_fk` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `agentclient` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,2,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(2,3,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(3,4,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(4,5,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(5,6,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(6,7,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(7,8,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(8,9,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(9,10,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(10,11,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(11,12,100.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(12,13,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(13,14,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(14,15,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(15,16,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(16,17,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(17,18,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(18,19,1000.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(19,20,1000.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(20,21,480.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(21,22,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(22,23,1800.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(23,24,0.00,3,'2014-01-31 00:00:00','0000-00-00 00:00:00',0),(24,25,7000.00,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0),(25,26,7000.00,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0),(26,27,14500.00,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0),(27,28,350.00,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0),(28,29,600.00,NULL,'2014-01-11 08:43:40','2014-01-21 08:43:40',0),(29,30,8200.00,NULL,'2014-01-11 15:03:15','2014-01-21 15:03:15',0);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoiceproducts`
--

DROP TABLE IF EXISTS `invoiceproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoiceproducts` (
  `invoice_id` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `invoiceproducts_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  CONSTRAINT `invoiceproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoiceproducts`
--

LOCK TABLES `invoiceproducts` WRITE;
/*!40000 ALTER TABLE `invoiceproducts` DISABLE KEYS */;
INSERT INTO `invoiceproducts` VALUES (1,1,10),(2,1,10),(3,2,10),(4,6,20),(5,4,10),(6,5,10),(7,2,10),(8,10,12),(9,9,12),(12,4,12),(13,4,12),(14,4,12),(15,2,12),(16,2,12),(16,6,12),(16,8,12),(16,9,11),(17,8,1),(17,10,12),(18,1,10),(20,5,4),(21,1,1),(22,1,12),(22,5,5),(23,1,2),(24,2,10),(24,4,45),(26,1,10),(26,2,5),(26,10,10),(27,1,2),(27,3,5),(27,11,3),(28,11,12),(29,1,2),(29,12,4);
/*!40000 ALTER TABLE `invoiceproducts` ENABLE KEYS */;
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
-- Table structure for table `memo_receivers`
--

DROP TABLE IF EXISTS `memo_receivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memo_receivers` (
  `agent_id` int(10) unsigned NOT NULL,
  `memo_id` int(11) NOT NULL,
  `viewed` int(11) NOT NULL,
  PRIMARY KEY (`agent_id`,`memo_id`),
  KEY `memo_id` (`memo_id`),
  CONSTRAINT `memo_receivers_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  CONSTRAINT `memo_receivers_ibfk_2` FOREIGN KEY (`memo_id`) REFERENCES `admin_memo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memo_receivers`
--

LOCK TABLES `memo_receivers` WRITE;
/*!40000 ALTER TABLE `memo_receivers` DISABLE KEYS */;
INSERT INTO `memo_receivers` VALUES (3,5,0),(3,6,0);
/*!40000 ALTER TABLE `memo_receivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text,
  `unit_price` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'car tyre','',100.00,1),(2,'windscreen','Good quality product that will last for long',700.00,1),(3,'tersss','adfaasfd',0.00,1),(4,'asdas','adsfaasas',0.00,1),(5,'windows','nice windows',120.00,1),(6,'modem','this is a really good modem',1000.00,1),(7,'monkeys','sdkad',12.00,1),(8,'mosquito nets','the mosquito nets are good.',12.00,1),(9,'sars','fdgsf',100.00,1),(10,'lap','a good lap',1000.00,1),(11,'Compact Discs','These are high quality disks that can save 700mb worth of data.',50.00,1),(12,'Phon','Good quality phones and stuff',2000.00,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt`
--

LOCK TABLES `receipt` WRITE;
/*!40000 ALTER TABLE `receipt` DISABLE KEYS */;
INSERT INTO `receipt` VALUES (1,2,200.00,'2014-01-02 00:00:00'),(2,2,200.00,'2014-01-02 00:00:00'),(3,2,1000.00,'2014-01-02 00:00:00'),(4,21,20000.00,'2014-01-02 00:00:00'),(5,2,3.00,'2014-01-02 00:00:00'),(6,2,100.00,'2014-01-02 00:00:00'),(7,1,1000.00,'2014-01-11 09:36:49'),(8,29,8000.00,'2014-01-11 15:05:30');
/*!40000 ALTER TABLE `receipt` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1389441683,1,'Admin','istrator','ADMIN','0'),(3,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','sam tom1','1f500efc256651876cfdfa8bfc39d0709106fe5f',NULL,'samtom@gmail.com',NULL,NULL,NULL,NULL,1386409848,1389441736,1,'sam','tom','0','0721123456'),(4,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','tom sam','acfb7712eb4904e9922053a9263ca2f0f30df79e',NULL,'tomsam@gmail.com',NULL,NULL,NULL,NULL,1386764283,1386764283,1,'tom','sam','0','0722987789'),(5,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','harry mbithi','309194bbdf0eec57f9575b3b7583d35147d033a7',NULL,'harrymbithi@gmail.com',NULL,NULL,NULL,NULL,1388542898,1388542898,1,'Harry','Mbithi','0','0722123456'),(6,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','danny welbeck','1069524ce285466d8983ec45fc9c0d50cbf1e21d',NULL,'danny@gmail.com',NULL,NULL,NULL,NULL,1388543222,1388543222,1,'Danny','Welbeck','0','0722322322'),(7,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','gory h','e06ea5d131a1b42853f869cb4dfafb9a178cb8a5',NULL,'gory@gmail.com',NULL,NULL,NULL,NULL,1388543339,1388543339,1,'gory','H','0','0712343212'),(8,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','fred fe','158a4243a3d12056451dd2f54b56f2bde7572f85',NULL,'fre@gmail.com',NULL,NULL,NULL,NULL,1388543616,1388543616,1,'Fred','Fe','0','0789232232'),(9,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','asd asd','8fb2a24630ff252c6302476d49c0137bd19e3661',NULL,'asd@gmail.com',NULL,NULL,NULL,NULL,1388545090,1388545090,1,'asd','asd','0','123'),(10,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','xc xc','69867d63a3c9017909b4b598df345d5e07b58aa0',NULL,'xc@gmail.com',NULL,NULL,NULL,NULL,1388545300,1388545300,1,'xc','xc','0','334'),(11,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','he he','922b19440db804d324dc04ec9cbbcc505017813d',NULL,'he@gmia.com',NULL,NULL,NULL,NULL,1388545413,1388545413,1,'he','he','0','24234'),(12,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','harn barn','a21f122bebcd2598f7aebda07c07d72d153a32a8',NULL,'harn@gmail.com',NULL,NULL,NULL,NULL,1389377308,1389377308,1,'harn','barn','0','0789234345');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(4,3,3),(5,11,3),(6,12,3);
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

-- Dump completed on 2014-01-11 16:44:35
