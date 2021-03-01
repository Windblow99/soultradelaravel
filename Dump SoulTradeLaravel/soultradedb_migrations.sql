-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: soultradedb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.17-MariaDB

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_02_17_174245_create_profiles_table',1),(5,'2021_02_20_051033_add_roles_to_users_table',2),(6,'2021_02_20_051457_create_permissions_table',2),(7,'2021_02_20_051509_create_roles_table',2),(8,'2021_02_20_051656_create_users_permissions_table',3),(9,'2021_02_20_051811_create_users_roles_table',3),(10,'2021_02_20_051849_create_roles_permissions_table',3),(11,'2021_02_20_125949_create_roles_table',4),(12,'2021_02_20_130154_create_role_user_table',5),(13,'2021_02_20_140641_create_permission_tables',6),(14,'2021_02_20_140748_create_listings_table',7),(15,'2021_02_21_085137_create_permission_tables',8),(16,'2021_02_21_095238_create_roles_table',9),(17,'2021_02_21_095413_create_role_user_table',9),(18,'2021_02_22_095544_create_foreign_keys_for_role_user_table',10),(19,'2021_02_23_040333_create_categories_table',11),(20,'2021_02_23_040528_create_category_user_table',11),(21,'2021_02_23_040603_create_foreign_keys_for_category_user_table',11),(22,'2021_02_23_040913_create_personalities_table',12),(23,'2021_02_23_040931_create_personalities_user_table',12),(24,'2021_02_23_041808_create_category_table',13),(25,'2021_02_23_041824_create_category_user_table',13),(26,'2021_02_23_041848_create_foreign_keys_for_category_user_table',13),(27,'2021_02_23_042015_create_personality_table',14),(28,'2021_02_23_042030_create_personality_user_table',14),(29,'2021_02_23_042100_create_foreign_keys_for_personality_user_table',14),(30,'2021_02_23_065018_create_medical_table',15),(31,'2021_02_23_065041_create_medical_user_table',15),(32,'2021_02_23_065109_create_foreign_keys_for_medical_user_table',15),(33,'2021_02_23_065603_create_order_table',16),(34,'2021_02_23_065623_create_order_users_table',16),(35,'2021_02_23_065647_create_foreign_keys_for_order_users_table',16),(36,'2021_02_24_123209_create_orders_table',17),(37,'2021_02_24_152952_create_reports_table',18),(38,'2021_02_24_155504_create_withdrawals_table',19),(39,'2021_02_26_172833_create_messages_table',20),(40,'2021_02_26_172848_create_user_messages_table',20),(41,'2021_02_27_044447_create_messages_table',21),(42,'2021_02_27_075345_add_read_to_messages',22);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-01 23:06:24
