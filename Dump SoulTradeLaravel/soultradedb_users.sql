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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `price` int(10) DEFAULT 0,
  `availability` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `balance` int(10) DEFAULT 0,
  `profile_picture` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_file` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$pgprz82XyPwhMgtISmB0teb8Bd6.4DU81hD4yVdv20tYnOUVYkssK',NULL,'2021-02-21 02:31:39','2021-02-23 00:21:13','admin12','YES',0,'NO',42,'admin.png',NULL),(2,'Eren Ong','ongshaoan@gmail.com',NULL,'$2y$10$ub1DMWR/hBnpZLgQNyn/fO5jJQzKg4IPvIXB9oXhfChujHaEX633S',NULL,'2021-02-21 02:31:39','2021-02-27 23:54:16','This is a good bio','YES',40,'YES',130,'1YxCpjsuK8SEappsf-5XzUNCM6XZIju5Q0WBGHOlzUo_1614498856.png','9lm4vn0nk6m21_1614186774.jpg'),(3,'Dr. Rem-san','medical@gmail.com',NULL,'$2y$10$IeGn39FTmbCW9t5AS/uXdOygTdaGTu/QmUnsCY0vDHAZUHJ9g922e',NULL,'2021-02-21 02:31:39','2021-02-27 08:51:50','Can do multiple things','YES',30,'YES',48,'6thDxFyijA_0bXVFxoo19BxGTBzztVbfegiyEPzrQWo_1614444710.jpg',NULL),(6,'windblow','windblow@gmail.com',NULL,'$2y$10$zfHRiLXVbaSaxFRjWOd6QuRY.qsr4zQl0JyY7OFSZvjn6NzORAVse',NULL,'2021-02-22 01:35:01','2021-02-28 00:28:50','Demo bio','YES',30,'NO',126,'1STqixNZP2oDcPE3Qyf1XPLcvTYbIUu0td9MkCIP3lg_1614244397.jpg','5h3draihkiu51_1614244397.png'),(11,'Eren Ong 2','test2@gmail.com',NULL,'$2y$10$tP0kbvbuwwx5TdjNwqEUPuz3CGWYxAZnc4CByiNfsKlRAKUV32FhS',NULL,'2021-02-25 06:22:09','2021-02-25 06:57:43','demo bio2','YES',50,'YES',20,'0glencwyqvsy_1614263421.jpg','9lm4vn0nk6m21_1614263421.jpg'),(12,'External Guy','external@gmail.com',NULL,'$2y$10$.U6pskXWfL3bVW4LdE2OY.lsHBb2VauCXiBBxCSF/RXvTDO5Q8YKa',NULL,'2021-02-25 09:35:52','2021-02-28 01:00:08','ching chong','YES',50,'NO',0,'image0_1614502808.png',NULL),(20,'1337','1337@mail.co',NULL,'$2y$10$61D97pZ31j0MGaaMfe5MKOMZE.3hPAN4/Qpb3V5yCNhx/omTpj2oi',NULL,'2021-02-27 23:45:43','2021-02-28 00:13:59','hello world','YES',50,'YES',440,'0ul6qaas28x21_1614498601.jpg','__original_drawn_by_furukawa_itsuse__sample-aa1508977d777abaeea00255a73a4768_1614498601.jpg'),(21,'123','123@mail.co',NULL,'$2y$10$./PXXqggv.Tnxr0A7AsPfu8VNRvNs33zzbs7oEKS07ivGaLQMWZGG',NULL,'2021-02-28 00:08:50','2021-02-28 00:13:52','ching chong doktor','YES',49,'NO',0,'1STqixNZP2oDcPE3Qyf1XPLcvTYbIUu0td9MkCIP3lg_1614499762.jpg',NULL),(22,'chingchong','qwe@mail.com',NULL,'$2y$10$chFxbSyB/MxEU2wkJZm7huDywC7Rzg9qKdo1sA2tpAFfnFc7KOX4C',NULL,'2021-02-28 00:12:47','2021-02-28 00:13:46','i love china','YES',50,'NO',0,'8uokatg7f0d31_1614499992.jpg',NULL),(23,'Demo','demo@gmail.com',NULL,'$2y$10$t0UwdKnWzGY0cX.rxne4tuEuNK4dSoKhNYgKCtrlvOcjHJEq6sN8i',NULL,'2021-03-01 05:03:33','2021-03-01 05:07:18','Demo bio','YES',50,'NO',420,'6cchsoeq94m51_1614603934.jpg','zv3ij72azrc31_1614603934.png');
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

-- Dump completed on 2021-03-01 23:06:25
