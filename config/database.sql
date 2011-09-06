-- MySQL dump 10.13  Distrib 5.5.9, for osx10.4 (i386)
--
-- Host: localhost    Database: personal_finanzas
-- ------------------------------------------------------
-- Server version	5.5.9

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
-- Table structure for table `finanzas_accounts`
--

DROP TABLE IF EXISTS `finanzas_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `bank_id` int(3) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_accounts`
--

LOCK TABLES `finanzas_accounts` WRITE;
/*!40000 ALTER TABLE `finanzas_accounts` DISABLE KEYS */;
INSERT INTO `finanzas_accounts` VALUES (1,'Cuenta corriente (BANCO DE CHILE)','002252230105',1,'2011-08-07','2011-08-07',1),(2,'Tarjeta de crédito VISA  (BANCO DE CHILE)','0000000386',1,'2011-08-10','2011-08-10',1);
/*!40000 ALTER TABLE `finanzas_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_banks`
--

DROP TABLE IF EXISTS `finanzas_banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_banks`
--

LOCK TABLES `finanzas_banks` WRITE;
/*!40000 ALTER TABLE `finanzas_banks` DISABLE KEYS */;
INSERT INTO `finanzas_banks` VALUES (1,'BANCO DE CHILE','2011-08-05','2011-08-05'),(2,'BANCO ESTADO','2011-08-05','2011-08-05'),(3,'BCI','2011-08-05','2011-08-05'),(4,'BANCO SANTANDER','2011-08-07','2011-08-07'),(5,'BANCO BBVA','2011-08-07','2011-08-07');
/*!40000 ALTER TABLE `finanzas_banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_categories`
--

DROP TABLE IF EXISTS `finanzas_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `type` enum('0','1') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_categories`
--

LOCK TABLES `finanzas_categories` WRITE;
/*!40000 ALTER TABLE `finanzas_categories` DISABLE KEYS */;
INSERT INTO `finanzas_categories` VALUES (1,'PASAJES','2011-08-07','2011-08-07','1',1),(2,'COMIDA','2011-08-07','2011-08-07','1',1),(3,'METRO','2011-08-07','2011-08-07','1',1),(4,'VARIOS','2011-08-10','2011-08-10','1',1),(5,'GIMNASIO','2011-08-10','2011-08-10','1',1),(6,'ROPA','2011-08-10','2011-08-10','1',1),(7,'REMEDIOS','2011-08-10','2011-08-10','1',1),(8,'GRUPON','2011-08-10','2011-08-10','1',1),(9,'COMIDA','2011-08-10','2011-08-10','1',1),(10,'CELULAR','2011-08-10','2011-08-10','1',1);
/*!40000 ALTER TABLE `finanzas_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_histories`
--

DROP TABLE IF EXISTS `finanzas_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_histories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_histories`
--

LOCK TABLES `finanzas_histories` WRITE;
/*!40000 ALTER TABLE `finanzas_histories` DISABLE KEYS */;
INSERT INTO `finanzas_histories` VALUES (1,1,'2011-08-07'),(2,1,'2011-08-07');
/*!40000 ALTER TABLE `finanzas_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_i18n`
--

DROP TABLE IF EXISTS `finanzas_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_i18n` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `locale` (`locale`),
  KEY `model` (`model`),
  KEY `row_id` (`foreign_key`),
  KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_i18n`
--

LOCK TABLES `finanzas_i18n` WRITE;
/*!40000 ALTER TABLE `finanzas_i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `finanzas_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_transactions`
--

DROP TABLE IF EXISTS `finanzas_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `date_realized` date DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_transactions`
--

LOCK TABLES `finanzas_transactions` WRITE;
/*!40000 ALTER TABLE `finanzas_transactions` DISABLE KEYS */;
INSERT INTO `finanzas_transactions` VALUES (1,'Fin de semana 6 de agosto',14000,1,1,'2011-08-07','2011-08-07','2011-08-01','SCL -> CCP -> SCL\r\n\r\n',1),(2,'Fin de semana 12 de agosto',28000,1,1,'2011-08-07','2011-08-07','2011-08-07','SCL -> CCP -> SCL (Fin de semana largo)',1),(3,'Bebida ',1000,1,2,'2011-08-07','2011-08-07','2011-08-07','Bebida en conce para el almuerzo',1),(4,'recarga bip',5000,1,3,'2011-08-07','2011-08-07','2011-08-01','',1),(5,'recarga bip',10000,1,1,'2011-08-10','2011-08-10','2011-08-09','',1),(6,'Copia llaves depto',600,1,4,'2011-08-10','2011-08-10','2011-08-09','',1),(7,'Cuota cumple secretaria',1500,1,4,'2011-08-10','2011-08-10','2011-08-10','Cuota para la el cumple de la secretaria',1),(8,'SPORT LIFE LYON',99000,2,5,'2011-08-10','2011-08-10','2011-08-02','SPORT LIFE POR 3 MESE CONVENIO LAN',1),(9,'PASAJES AÑO NUEVO',43218,2,1,'2011-08-10','2011-08-10','2011-07-31','Pasajes para año nuevo',1),(10,'Pasajes NAVIDAD',61218,2,1,'2011-08-10','2011-08-10','2011-08-01','Pasajes para navidad',1),(11,'Chaleco',14990,2,1,'2011-08-10','2011-08-10','2011-07-31','Chaleco comprado en almacenes paris. ',1),(12,'Cepillo de dientes',2290,2,1,'2011-08-10','2011-08-10','2011-07-25','Cepillo de dientes para la pega',1),(13,'Productos Nutra Bien',8900,2,1,'2011-08-10','2011-08-10','2011-08-06','Productos Nutra Bien',1),(14,'Comida para el desayuno',7584,2,1,'2011-08-10','2011-08-10','2011-08-10','Leche, yogurt, cereales, pan, cerveza',1),(15,'Cepillo de dientes',2290,2,9,'2011-08-10','2011-08-10','2011-08-02','Cepillo de dientes para la casa',1),(16,'Pago de celular',25705,2,1,'2011-08-10','2011-08-10','2011-07-27','Pago de cuenta del celular mes de JULIO',1),(17,'Corte de pelo',6000,2,4,'2011-08-10','2011-08-10','2011-07-30','',1),(18,'Compras varias',8072,2,9,'2011-08-10','2011-08-10','2011-08-01','Compras varais',1),(19,'Comida y compras varias',18387,2,4,'2011-08-10','2011-08-10','2011-07-31','Comida y útiles de aseo.',1),(20,'Desodorante para fabrizio',1895,2,4,'2011-08-10','2011-08-10','2011-07-30','',1),(21,'Compras varias',5265,2,1,'2011-08-10','2011-08-10','2011-07-25','',1),(22,'Compras varias',4012,2,9,'2011-08-10','2011-08-10','2011-07-26','',1),(23,'Compras varias',3700,2,2,'2011-08-10','2011-08-10','2011-07-29','',1),(24,'Compras varias',3808,2,9,'2011-08-10','2011-08-10','2011-07-30','',1),(25,'Gatorade',1000,1,5,'2011-08-10','2011-08-10','2011-08-10','',1);
/*!40000 ALTER TABLE `finanzas_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_types`
--

DROP TABLE IF EXISTS `finanzas_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_types` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_types`
--

LOCK TABLES `finanzas_types` WRITE;
/*!40000 ALTER TABLE `finanzas_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `finanzas_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas_users`
--

DROP TABLE IF EXISTS `finanzas_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `full_name` varchar(300) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas_users`
--

LOCK TABLES `finanzas_users` WRITE;
/*!40000 ALTER TABLE `finanzas_users` DISABLE KEYS */;
INSERT INTO `finanzas_users` VALUES (1,'ssalvatori','Stefano Salvatori','0ae7e516bbbb04f284800c18445a511de6e7b31a','ssalvatori@gmail.com',1,'2011-08-07','2011-08-07');
/*!40000 ALTER TABLE `finanzas_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-08-10 22:46:20
