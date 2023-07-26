-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: damkar
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'UgJL54l2LKKdHSJ8v4LErzbeWv8InNwz',1,'2023-07-25 04:08:47','2023-07-25 04:08:47','2023-07-25 04:08:47'),(2,2,'YZnXfLPshBJFhi5hIZpxyg9BdDeS6Qbq',1,'2023-07-25 04:08:47','2023-07-25 04:08:47','2023-07-25 04:08:47'),(3,3,'UdALs7qzZOS3rBFyAiyfp2b5NmgmOyTA',1,'2023-07-25 04:51:08','2023-07-25 04:51:08','2023-07-25 04:51:08'),(4,4,'mHyvozzFM3mlndaxZ1AMXUHFxTgQ1FqA',1,'2023-07-25 08:33:59','2023-07-25 08:33:59','2023-07-25 08:33:59'),(5,5,'nnDHkaDqAQ8RxEEEcajB6r4HHcEhhzcG',1,'2023-07-25 08:34:45','2023-07-25 08:34:45','2023-07-25 08:34:45'),(6,6,'sHioLx9Jb7y3zL3rhG2LwnsuKBETx4OH',1,'2023-07-26 07:41:13','2023-07-26 07:41:13','2023-07-26 07:41:13');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_attendance`
--

DROP TABLE IF EXISTS `daily_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_attendance`
--

LOCK TABLES `daily_attendance` WRITE;
/*!40000 ALTER TABLE `daily_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_piket`
--

DROP TABLE IF EXISTS `group_piket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_piket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_piket`
--

LOCK TABLES `group_piket` WRITE;
/*!40000 ALTER TABLE `group_piket` DISABLE KEYS */;
INSERT INTO `group_piket` VALUES (1,'A','2023-07-25 05:58:43','2023-07-25 05:58:43'),(2,'B','2023-07-25 05:58:43','2023-07-25 05:58:43'),(3,'C','2023-07-25 05:58:43','2023-07-25 05:58:43'),(4,'D','2023-07-25 05:58:43','2023-07-25 05:58:43'),(5,'E','2023-07-25 05:58:43','2023-07-25 05:58:43');
/*!40000 ALTER TABLE `group_piket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_07_02_230147_migration_cartalyst_sentinel',1),(2,'2018_12_12_024127_create_provinces_table',1),(3,'2018_12_12_024224_create_subdistricts_table',1),(4,'2018_12_12_071102_create_user_addresses_table',1),(5,'2019_01_23_070612_add_field_province_in_user_addresses_table',1),(6,'2019_07_19_095051_create_shortlink_table',1),(7,'2019_07_22_152716_update_shortlink_table',1),(8,'2019_07_22_153847_update_shortlink_table_column_description',1),(9,'2019_07_22_155740_remove_counter_column_shortlink_table',1),(10,'2020_03_09_224740_add_column_created_by_user_table',1),(11,'2023_07_25_114410_create_jadual_piket',2),(12,'2023_07_25_125324_create_group_piket',2),(13,'2023_07_25_130702_create_daily_attendance',3),(14,'2023_07_25_130714_create_status_attendance',3),(15,'2023_07_25_145210_create_schedule_attendance',4),(16,'2023_07_26_002145_create_schedule_picket',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persistences`
--

LOCK TABLES `persistences` WRITE;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` VALUES (1,1,'eiG1JzCkmvJ3Gov6qBb7VvbQpR8ezO0y','2023-07-25 04:17:00','2023-07-25 04:17:00'),(2,1,'wVol0EqRoEleEGgAIev96PcvFvWDJMeV','2023-07-25 12:13:17','2023-07-25 12:13:17'),(3,1,'2rcUGy19v3RPzE4d6vgjPJVwDJpXdos9','2023-07-25 16:46:55','2023-07-25 16:46:55'),(4,1,'O9UxlFb13rn0Rwetzvt9pOufvyuPviKT','2023-07-26 03:39:15','2023-07-26 03:39:15'),(7,2,'r5alpjvh0JeDLIGNh2eELA9Dfz91NQXF','2023-07-26 07:46:31','2023-07-26 07:46:31');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `code` tinyint(4) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `provinces_code_unique` (`code`),
  KEY `provinces_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,1,'2023-07-25 04:08:47','2023-07-25 04:08:47'),(2,2,'2023-07-25 04:08:47','2023-07-25 04:08:47'),(3,3,'2023-07-25 04:51:08','2023-07-25 04:51:08'),(4,3,'2023-07-25 08:33:59','2023-07-25 08:33:59'),(5,3,'2023-07-25 08:34:45','2023-07-25 08:34:45'),(6,4,'2023-07-26 07:41:13','2023-07-26 07:41:13');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'root','Root','{\"dashboard\":true}','Root','Root','2023-07-25 04:08:47','2023-07-25 04:08:47'),(2,'admin','pemimpin kelompok','{\"dashboard\":true,\"picket.create\":true,\"picket.show\":true}','Root','Root','2023-07-25 04:08:47','2023-07-26 07:39:42'),(3,'member','Member','{\"dashboard\":true}','Root','Root','2023-07-25 04:08:47','2023-07-25 04:08:47'),(4,'pemimpin-apel','pemimpin apel','{\"dashboard\":true,\"report_damkar.show\":true}','Root','Root','2023-07-26 07:40:23','2023-07-26 07:40:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_picket`
--

DROP TABLE IF EXISTS `schedule_picket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_picket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `name_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_picket` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_group_picket` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_picket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_picket` date NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_picket`
--

LOCK TABLES `schedule_picket` WRITE;
/*!40000 ALTER TABLE `schedule_picket` DISABLE KEYS */;
INSERT INTO `schedule_picket` VALUES (1,3,' iman',' piket hadir','A','','2023-07-26','Admin','2023-07-26 07:44:20','2023-07-26 07:44:20'),(2,4,' Adon',' cadangan piket','B','izin','2023-07-26','Admin','2023-07-26 07:44:20','2023-07-26 07:44:20'),(3,5,' Yoga',' lepas piket','c','','2023-07-26','Admin','2023-07-26 07:44:20','2023-07-26 07:44:20');
/*!40000 ALTER TABLE `schedule_picket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortlink`
--

DROP TABLE IF EXISTS `shortlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortlink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `long_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shortlink_long_link_short_link_index` (`long_link`,`short_link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortlink`
--

LOCK TABLES `shortlink` WRITE;
/*!40000 ALTER TABLE `shortlink` DISABLE KEYS */;
/*!40000 ALTER TABLE `shortlink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_attendance`
--

DROP TABLE IF EXISTS `status_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_attendance`
--

LOCK TABLES `status_attendance` WRITE;
/*!40000 ALTER TABLE `status_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subdistricts`
--

DROP TABLE IF EXISTS `subdistricts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subdistricts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urban` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_code` tinyint(4) NOT NULL,
  `postal_code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subdistricts_city_index` (`city`),
  KEY `subdistricts_sub_district_index` (`sub_district`),
  KEY `subdistricts_province_code_index` (`province_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subdistricts`
--

LOCK TABLES `subdistricts` WRITE;
/*!40000 ALTER TABLE `subdistricts` DISABLE KEYS */;
/*!40000 ALTER TABLE `subdistricts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (1,NULL,'global',NULL,'2023-07-25 04:15:24','2023-07-25 04:15:24'),(2,NULL,'ip','127.0.0.1','2023-07-25 04:15:24','2023-07-25 04:15:24'),(3,1,'user',NULL,'2023-07-25 04:15:24','2023-07-25 04:15:24');
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_confirmed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('user','customer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root@admin.com',NULL,'$2y$10$CorC40BsRqf3uJs9Rbh1A.RcV7YK.L/ereQdMfqDG4LjCP01RqlD2',NULL,NULL,'2023-07-26 03:39:15','Root','08189890000',NULL,'user',NULL,NULL,'2023-07-25 04:08:47','2023-07-26 03:39:15'),(2,'admin@admin.com',NULL,'$2y$10$u00fZks.jE1IuEZHcpU99.Kc47B7spuCWs7HtHCfGqWGh/q2LIh6.',NULL,NULL,'2023-07-26 07:46:31','Admin','08189890001',NULL,'user',NULL,NULL,'2023-07-25 04:08:47','2023-07-26 07:46:31'),(3,'iman@damkar.com',NULL,'$2y$08$8Uc/ECSsxxo80zqzwugj.eJQlzLSOCS7dW.qTicAtFVrC8JMjMVbq',NULL,NULL,NULL,'iman','0812345678',NULL,NULL,'Root',NULL,'2023-07-25 04:51:08','2023-07-25 04:51:08'),(4,'adon@member.com',NULL,'$2y$08$CfRU3I5ain8kCStUdamyNeoDEc5CRwd2gmuxuSQJi.4oaXqOcTlN6',NULL,NULL,NULL,'Adon','0812345678',NULL,NULL,'Root',NULL,'2023-07-25 08:33:59','2023-07-25 08:33:59'),(5,'yoga@damkar.com',NULL,'$2y$08$SIQOdz7RIND054Xndyz2dOl13eeL3gFGAi7sFeq8C9pl8i4UwN5aW',NULL,NULL,NULL,'Yoga','0812345678',NULL,NULL,'Root',NULL,'2023-07-25 08:34:45','2023-07-25 08:34:45'),(6,'pemimpin-apel@damkar.com',NULL,'$2y$08$CyluM3P3g0yobqysAAUBQOL91Z5RV0cKAmOySFfIzfvtqYnK1v0VO',NULL,NULL,'2023-07-26 07:41:53','ruly','0812345678',NULL,NULL,'Root',NULL,'2023-07-26 07:41:13','2023-07-26 07:41:53');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_id` int(10) unsigned DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_addresses_user_id_foreign` (`user_id`),
  KEY `user_addresses_subdistrict_id_foreign` (`subdistrict_id`),
  CONSTRAINT `user_addresses_subdistrict_id_foreign` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

LOCK TABLES `user_addresses` WRITE;
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-26 17:13:32
