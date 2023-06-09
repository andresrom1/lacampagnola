-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: 192.168.0.2    Database: avatar_sitio-la-campagnola
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `benefits`
--

DROP TABLE IF EXISTS `benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `benefits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benefits`
--

LOCK TABLES `benefits` WRITE;
/*!40000 ALTER TABLE `benefits` DISABLE KEYS */;
INSERT INTO `benefits` VALUES (1,'Omega 3','Principal fuente de EPA y DHA','uploads/benefits/b53c43394fc055f22f092b8c78f08844.jpg','2019-10-30 17:40:18','2019-10-30 17:55:08',NULL);
/*!40000 ALTER TABLE `benefits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Mermeladas y jaleas',NULL,NULL,NULL),(2,'Salsas listas',NULL,NULL,NULL),(3,'Legumbres y Hortalizas',NULL,NULL,NULL),(4,'Aderezos',NULL,NULL,NULL),(5,'Conservas de tomate',NULL,NULL,NULL),(6,'Pescados',NULL,NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_banner_tag`
--

DROP TABLE IF EXISTS `home_banner_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_banner_tag` (
  `home_banner_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`home_banner_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_banner_tag`
--

LOCK TABLES `home_banner_tag` WRITE;
/*!40000 ALTER TABLE `home_banner_tag` DISABLE KEYS */;
INSERT INTO `home_banner_tag` VALUES (1,2),(1,7);
/*!40000 ALTER TABLE `home_banner_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_banners`
--

DROP TABLE IF EXISTS `home_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `youtube_video` json DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT '1',
  `position` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_banners`
--

LOCK TABLES `home_banners` WRITE;
/*!40000 ALTER TABLE `home_banners` DISABLE KEYS */;
INSERT INTO `home_banners` VALUES (1,'Probá la receta del mes:','Ñoquis de verdura con salsa bolognesa','uploads/home_banners/0e33917008ced9bcb1f24861637232ab.jpg','uploads/home_banners/0e33917008ced9bcb1f24861637232ab.jpg',NULL,'{\"id\": \"UFcKU0-78hU\", \"url\": \"https://www.youtube.com/watch?v=UFcKU0-78hU\", \"image\": \"https://i.ytimg.com/vi/UFcKU0-78hU/maxresdefault.jpg\", \"title\": \"Bife de chorizo ?‍? | Recetas La Campagnola\", \"provider\": \"youtube\"}',1,0,'2019-10-31 12:00:20','2019-11-07 17:58:51',NULL);
/*!40000 ALTER TABLE `home_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_10_24_130010_create_tags_table',2),(4,'2019_10_30_142221_create_benefits_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_families`
--

DROP TABLE IF EXISTS `product_families`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_families` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `icon_image` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `header_video` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_families`
--

LOCK TABLES `product_families` WRITE;
/*!40000 ALTER TABLE `product_families` DISABLE KEYS */;
INSERT INTO `product_families` VALUES (1,'mermeladas-y-jaleas','Mermeladas y jaleas',NULL,'uploads/product_families/7426cad1bbe83d5a017934d989c56307.jpg','uploads/product_families/6a3aa138a769c6d3d010382ca1f6e543.jpg',NULL,0,'2019-10-31 12:49:25','2019-11-06 18:06:25',NULL),(2,'conservas-de-tomate','Conservas de tomate',NULL,'uploads/product_families/834d4be3426d1b763d70a4b763ecc6dd.jpg','uploads/product_families/6d432d50691cb1aa9806dc014b21e489.jpg',NULL,0,'2019-10-31 13:04:58','2019-11-07 18:22:20',NULL),(3,'salsas-listas','Salsas listas',NULL,'uploads/product_families/c636f88c1edec5207e9fd3ddc5e73ddd.jpg','uploads/product_families/753fb259ffbcfa05e51e28467de58ae4.jpg',NULL,0,'2019-11-01 13:48:19','2019-11-01 13:48:19',NULL),(4,'arvejas','Arvejas',NULL,'uploads/product_families/2ef0643836218efce5b24e0088dc1f28.jpg','uploads/product_families/c0ab1636be5445076560ca101a42b3dd.jpg',NULL,0,'2019-11-01 13:48:40','2019-11-07 18:21:51',NULL),(5,'jardineras','Jardineras',NULL,'uploads/product_families/6ff9a4d43e80fbb767c2d1fbaaccec88.jpg','uploads/product_families/e688f2e39287bf09ef4d8e2378536385.jpg',NULL,0,'2019-11-01 13:49:26','2019-11-01 13:49:26',NULL),(6,'lentejas','Lentejas',NULL,'uploads/product_families/71ea762acbd76e68491452a7199b0e59.jpg','uploads/product_families/7c8e31fab3f79ed7cf6904b2bf32c8d4.jpg',NULL,0,'2019-11-14 19:31:17','2019-11-14 19:31:17',NULL),(7,'porotos-alubias','Porotos Alubias',NULL,'uploads/product_families/cfcd1703e598945a37f861ea16e09444.jpg','uploads/product_families/55080961a631ab87a61306196c5473b1.jpg',NULL,0,'2019-11-14 19:31:34','2019-11-14 19:31:34',NULL),(8,'choclos','Choclos',NULL,'uploads/product_families/bf8a3173b078e645a49643963b785630.jpg','uploads/product_families/ae16476b355d3d9208a3ce53776e8737.jpg',NULL,0,'2019-11-14 19:31:47','2019-11-14 19:31:47',NULL),(9,'garbanzos','Garbanzos',NULL,'uploads/product_families/9ccb9ca8b1c925b2e90a9f2cbd43841e.jpg','uploads/product_families/1f45e011da972faa39bb2a57a558fdf9.jpg',NULL,0,'2019-11-14 19:31:58','2019-11-14 19:31:58',NULL),(10,'atun','Atún',NULL,'uploads/product_families/caf68c71f817ebd2ad78469fef34ae6b.jpg','uploads/product_families/098e8dc9cb05643d4529da92c2ea9614.jpg',NULL,0,'2019-11-14 19:32:10','2019-11-14 19:32:10',NULL),(11,'caballa','Caballa',NULL,'uploads/product_families/310fca2d6031f0d5673f12c007ae7bbc.jpg','uploads/product_families/e172a1aa15476310947df5525ce5d862.jpg',NULL,0,'2019-11-14 19:32:21','2019-11-14 19:32:21',NULL),(12,'aderezos','Aderezos',NULL,'uploads/product_families/bafe3a0d7d756806129f95db2ac93581.jpg','uploads/product_families/194dcc959dc7190f0306352f47b8eca2.jpg',NULL,0,'2019-11-14 19:32:33','2019-11-14 19:32:33',NULL),(13,'hierbas-y-especias','Hierbas y especias',NULL,'uploads/product_families/9f099e6aa00b6f7819cc97db65428d44.jpg','uploads/product_families/6b4441b6bc3394018cbecf7d0721c33b.jpg',NULL,0,'2019-11-15 15:57:09','2019-11-15 15:57:09',NULL);
/*!40000 ALTER TABLE `product_families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_family_benefit`
--

DROP TABLE IF EXISTS `product_family_benefit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_family_benefit` (
  `product_family_id` int(11) NOT NULL,
  `benefit_id` int(11) NOT NULL,
  PRIMARY KEY (`product_family_id`,`benefit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_family_benefit`
--

LOCK TABLES `product_family_benefit` WRITE;
/*!40000 ALTER TABLE `product_family_benefit` DISABLE KEYS */;
INSERT INTO `product_family_benefit` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `product_family_benefit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_subfamilies`
--

DROP TABLE IF EXISTS `product_subfamilies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_subfamilies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_family_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_subfamilies`
--

LOCK TABLES `product_subfamilies` WRITE;
/*!40000 ALTER TABLE `product_subfamilies` DISABLE KEYS */;
INSERT INTO `product_subfamilies` VALUES (1,2,'pure-de-tomates','Puré de tomates','uploads/product_subfamilies/1cec28d97c66f9943bcf10564a602973.jpg','2019-10-31 13:06:03','2019-11-01 14:15:46',NULL),(2,2,'tomate','Tomate','uploads/product_subfamilies/e1bb85556b22e1794116bf8ec73fae4a.jpg','2019-11-01 14:18:23','2019-11-01 14:18:23',NULL),(3,2,'extracto-de-tomate','Extracto de tomate','uploads/product_subfamilies/1bbae2d863a8e44fd9855105f24c1bf7.jpg','2019-11-01 14:18:38','2019-11-01 14:18:38',NULL),(4,13,'especias','Especias','uploads/product_subfamilies/f92f3f489276af78b614efa2bca3174d.jpg','2019-11-15 15:57:43','2019-11-15 15:57:43',NULL),(5,13,'condimentos','Condimentos','uploads/product_subfamilies/1720e5f38341df00737a3fb23b2e110d.jpg','2019-11-15 15:57:53','2019-11-15 15:57:53',NULL),(6,13,'mixes','Mixes','uploads/product_subfamilies/af32b94f22514845890fe0618f4ffe2f.jpg','2019-11-15 15:58:04','2019-11-15 15:58:04',NULL);
/*!40000 ALTER TABLE `product_subfamilies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_family_id` int(11) DEFAULT NULL,
  `product_subfamily_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `youtube_video` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,NULL,1,'Jalea de Membrillo',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(2,1,NULL,1,'Mermelada de Durazno',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(3,1,NULL,1,'Mermelada de Frutilla',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(4,1,NULL,1,'Mermelada de Ciruela',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(5,1,NULL,1,'Mermelada de Naranja',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(6,1,NULL,1,'Mermelada de Damazco',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(7,1,NULL,1,'Mermelada de Frambuesa',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(8,1,NULL,1,'Mermelada de Arándano',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(9,2,1,5,'Pulpa de Tomate',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(10,2,1,5,'Puré de Tomate',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(11,2,1,5,'Tomate Cubeteado',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(12,2,1,5,'Tomate Pelado Perita Entero',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(13,2,3,5,'Extracto de Tomate Triple',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(14,3,NULL,2,'Salsa Pomarola',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(15,3,NULL,2,'Salsa Portuguesa',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(16,3,NULL,2,'Salsa Pizza',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(17,3,NULL,2,'Salsa Filetto',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(18,3,NULL,2,'Salsa Italiana LC',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(19,4,NULL,3,'Arvejas Frescas',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(20,4,NULL,3,'Arvejas Secas',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(21,8,NULL,3,'Granos de Choclo Amarillo Entero',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(22,8,NULL,3,'Choclo Amarillo Cremoso',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(23,5,NULL,3,'Jardinera con Choclo',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(24,5,NULL,3,'Jardinera',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(25,6,NULL,3,'Lentejas',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(26,7,NULL,3,'Porotos Alubias',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(27,9,NULL,3,'Garbanzo',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(28,10,NULL,6,'Atún Aceite',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(29,10,NULL,6,'Atún Natural',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(30,10,NULL,6,'Atún Aceite de Oliva',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(31,10,NULL,6,'Atún Salsa de Tomate',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(32,10,NULL,6,'Atún Pouch Aceite',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(33,10,NULL,6,'Atún Pouch Natural',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(34,11,NULL,6,'Aceite y Agua',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(35,11,NULL,6,'Caballa Natural',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(36,11,NULL,6,'Caballa Tomate',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(37,12,NULL,4,'Ketchup Doy Pack',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(38,12,NULL,4,'Ketchup Picante Doy Pack',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(39,13,4,NULL,'Orégano',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(40,13,4,NULL,'Provenzal',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(41,13,4,NULL,'Tomillo',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(42,13,5,NULL,'Pimentón',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(43,13,5,NULL,'Ají Triturado',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(44,13,5,NULL,'Pimenta Negra',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(45,13,5,NULL,'Pimienta Blanca',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(46,13,5,NULL,'Ajo',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(47,13,5,NULL,'Comino',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(48,13,5,NULL,'Nuez Moscada',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(49,13,6,NULL,'Mix para Carnes',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(50,13,6,NULL,'Chimichurri',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(51,13,6,NULL,'Adobo para Pizza',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(52,13,6,NULL,'Mix para Arroz',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(53,13,6,NULL,'Pimienta Negra',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(54,13,6,NULL,'Mix de Pimienta',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(55,13,6,NULL,'Salad',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL),(56,13,6,NULL,'Wok',NULL,NULL,'2019-11-19 12:54:15','2019-11-19 12:54:15',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_product`
--

DROP TABLE IF EXISTS `recipe_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe_product` (
  `product_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_product`
--

LOCK TABLES `recipe_product` WRITE;
/*!40000 ALTER TABLE `recipe_product` DISABLE KEYS */;
INSERT INTO `recipe_product` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `recipe_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_tag`
--

DROP TABLE IF EXISTS `recipe_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe_tag` (
  `recipe_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_tag`
--

LOCK TABLES `recipe_tag` WRITE;
/*!40000 ALTER TABLE `recipe_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipe_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `ingredients` text,
  `preparation` text,
  `youtube_video` json DEFAULT NULL,
  `images` json DEFAULT NULL,
  `in_home` tinyint(1) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'title','La Campagnola',NULL,NULL),(2,'description','La Campagnola',NULL,NULL),(3,'image','uploads/settings/20.png',NULL,'2019-11-06 13:04:20');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `is_moment_tag` tinyint(1) DEFAULT '0',
  `is_difficulty_tag` tinyint(1) DEFAULT '0',
  `is_duration_tag` tinyint(1) DEFAULT '0',
  `is_special_need_tag` tinyint(1) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Porción justa','uploads/tags/72878d17126c0a6b6b4b8b44fd8fd753.jpg',0,0,0,0,0,NULL,'2019-11-07 13:06:18',NULL),(2,'Sin TACC','uploads/tags/7a00ab9427b4e9569c3943dcf4b49471.png',0,0,0,1,0,NULL,'2019-11-14 19:22:52',NULL),(3,'Vegetariano','uploads/tags/7777938dd1ff6a6a6eef506d8f923a00.jpg',0,0,0,1,1,NULL,'2019-11-14 19:26:49',NULL),(4,'Vegano','uploads/tags/00806e982d9ccce3e2a755c6e7b77d63.jpg',0,0,0,1,2,NULL,'2019-11-14 19:26:57',NULL),(5,'Sin azúcar','uploads/tags/ec4700ddd47adfac1faa1a38c612c08c.jpg',0,0,0,1,0,NULL,'2019-11-14 19:23:27','2019-11-14 19:23:27'),(6,'15\'','uploads/tags/e0db1ed00ce4ddae91fa2e52c158ced5.png',0,0,1,0,0,'2019-11-07 12:58:40','2019-11-07 20:14:03',NULL),(7,'30\'','uploads/tags/cd46e79f34d6b8ff4c43da1aed0ed7ee.png',0,0,1,0,1,'2019-11-07 12:59:01','2019-11-14 19:25:09',NULL),(8,'60\'','uploads/tags/5cb7c8b0a57e8c96690b91928614c5e8.png',0,0,1,0,2,'2019-11-07 12:59:22','2019-11-14 19:25:15',NULL),(9,'Desayuno','uploads/tags/7199689ef01d06eb52d5e8e869c48868.jpg',1,0,0,0,0,'2019-11-07 13:02:47','2019-11-07 13:02:47',NULL),(10,'Snack','uploads/tags/7652496705f9936f0f2b33cacacef86a.jpg',1,0,0,0,1,'2019-11-07 13:03:13','2019-11-07 13:08:40',NULL),(11,'Almuerzo','uploads/tags/31a843a92565311f962b50970093762a.jpg',1,0,0,0,2,'2019-11-07 13:03:24','2019-11-07 13:08:47',NULL),(12,'Merienda','uploads/tags/ad4912145c00b5d4ebc0ae49c78ddd11.jpg',1,0,0,0,3,'2019-11-07 13:03:37','2019-11-07 13:08:53',NULL),(13,'Cena','uploads/tags/6c49295527fe429e286c84554cc5dab4.jpg',1,0,0,0,4,'2019-11-07 13:03:48','2019-11-07 13:08:59',NULL),(14,'Postre','uploads/tags/7ccf55a81e5c99fd79e6af6bc2fa84a2.jpg',1,0,0,0,5,'2019-11-07 13:04:02','2019-11-07 13:09:07',NULL),(15,'Fácil','uploads/tags/d642b05f370bd6ced6334c5271b9f385.jpg',0,1,0,0,0,'2019-11-07 13:04:42','2019-11-07 13:04:42',NULL),(16,'Media','uploads/tags/5d9ba9ccb413ae636922a130accf3d75.jpg',0,1,0,0,1,'2019-11-07 13:04:52','2019-11-14 19:25:47',NULL),(17,'Difícil','uploads/tags/5baeaad7a09924526c7f630c7a0b8743.jpg',0,1,0,0,2,'2019-11-07 13:05:04','2019-11-14 19:25:55',NULL),(18,'+60\'','uploads/tags/e9620a155ffbb727c9c4466cfa08415a.png',0,0,1,0,3,'2019-11-14 19:24:43','2019-11-14 19:25:22',NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@admin.com',NULL,'$2y$10$rpFadTnjBQo3dezZ/g3tP.wbJaE3GXSy13pqskuEb9SZdHTel7zR6',NULL,'2019-10-24 16:01:51','2019-10-24 16:01:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-19 11:39:27
