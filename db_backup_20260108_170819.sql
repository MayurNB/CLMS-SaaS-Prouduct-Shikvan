-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: CLMS
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `loggable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loggable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changes` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `activity_logs_loggable_id_loggable_type_index` (`loggable_id`,`loggable_type`),
  KEY `activity_logs_user_id_index` (`user_id`),
  CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment_submissions`
--

DROP TABLE IF EXISTS `assignment_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment_submissions` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points_awarded` int DEFAULT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `assignment_submissions_assignment_id_index` (`assignment_id`),
  KEY `assignment_submissions_submitted_by_user_id_index` (`submitted_by_user_id`),
  CONSTRAINT `assignment_submissions_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assignment_submissions_submitted_by_user_id_foreign` FOREIGN KEY (`submitted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment_submissions`
--

LOCK TABLES `assignment_submissions` WRITE;
/*!40000 ALTER TABLE `assignment_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignment_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `due_date` timestamp NULL DEFAULT NULL,
  `max_points` int NOT NULL DEFAULT '100',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `assignments_course_id_index` (`course_id`),
  KEY `assignments_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `assignments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assignments_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendances` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timetable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('present','absent','late','excused') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'absent',
  `attendance_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attendances_timetable_id_user_id_attendance_date_unique` (`timetable_id`,`user_id`,`attendance_date`),
  KEY `attendances_timetable_id_index` (`timetable_id`),
  KEY `attendances_user_id_index` (`user_id`),
  CONSTRAINT `attendances_timetable_id_foreign` FOREIGN KEY (`timetable_id`) REFERENCES `timetables` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branches` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address_line_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `branches_institute_id_index` (`institute_id`),
  CONSTRAINT `branches_institute_id_foreign` FOREIGN KEY (`institute_id`) REFERENCES `institute_infos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES ('423b46ea-f3d8-470b-b679-3b60f9db17a7','2559a851-a77e-11f0-b33d-0242ac110002','17th coaching class','katar','dadar','mh','738265','ind','Mayur141@gmail.com','1234567890',1,'2025-10-14 11:45:38','2025-10-14 16:27:08'),('47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','7d1a3467-d80e-11f0-8152-0242ac110002','1st to 10th School Coaching Class','Demo','Mumbai','Maharashtra','400001','INDIA','mumbai@demo.com','1234567890',1,'2025-12-13 16:55:20','2025-12-13 16:55:20'),('63684590-2270-44b7-af3c-44cc4f05317c','2559a851-a77e-11f0-b33d-0242ac110002','11th coaching class','Street 12 , genesh road','Titwala','GU','124253','IND','Mayur122@gmail.com','1234567890',1,'2025-10-14 11:42:03','2025-10-14 16:29:29'),('93bf3910-2ac3-4e83-ba38-f9ef6f56dbe6','2559a851-a77e-11f0-b33d-0242ac110002','18th coaching class','Palak nagar','Raver','MH','423305','IND','support@palak.com','1234577890',1,'2025-11-09 15:59:06','2025-11-09 16:00:14'),('b23c0c78-9030-44c1-a5a7-88564834c8d0','2559a851-a77e-11f0-b33d-0242ac110002','14th coaching class','jjj','thane','mh','421605','ind','Mayur13@gmail.com','1234567890',1,'2025-10-14 11:44:55','2025-10-14 11:44:55'),('c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2559a851-a77e-11f0-b33d-0242ac110002','10th coaching class','Street 12 , genesh road','Mumbai','MH','421605','IND','Mayur@gmail.com','1234567890',1,'2025-10-14 10:22:55','2025-10-14 10:22:55'),('c247da8f-338f-4215-924a-28f7f104a0aa','2559a851-a77e-11f0-b33d-0242ac110002','12th coaching class','gan','th','mh','7392','ind','Mayur11@gmail.com','1234567890',1,'2025-10-14 11:42:52','2025-10-14 11:42:52'),('d9bebee2-7894-43d2-b9a2-3041a811f644','2559a851-a77e-11f0-b33d-0242ac110002','13th coaching class','kkaka','thane','mahr','478374','IND','Mayur12@gmail.com','1234567890',1,'2025-10-14 11:44:15','2025-10-14 11:44:15'),('dd618b9d-a743-4810-9568-c0b8f093355a','2559a851-a77e-11f0-b33d-0242ac110002','16th coaching class','sfee','kh','jj','578579','afg','Mayur181@gmail.com','1234567890',0,'2025-10-14 12:16:29','2025-10-14 16:12:57');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communications`
--

DROP TABLE IF EXISTS `communications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `sent_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `communications_from_user_id_index` (`from_user_id`),
  KEY `communications_to_user_id_index` (`to_user_id`),
  CONSTRAINT `communications_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `communications_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communications`
--

LOCK TABLES `communications` WRITE;
/*!40000 ALTER TABLE `communications` DISABLE KEYS */;
/*!40000 ALTER TABLE `communications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contents` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'document',
  `content_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sort_order` int DEFAULT NULL,
  `is_published` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `contents_course_id_index` (`course_id`),
  CONSTRAINT `contents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `normalized_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_published` tinyint NOT NULL DEFAULT '0',
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `courses_program_id_index` (`program_id`),
  KEY `courses_instructor_user_id_index` (`instructor_user_id`),
  KEY `courses_created_by_user_id_index` (`institute_id`),
  CONSTRAINT `courses_instructor_user_id_foreign` FOREIGN KEY (`instructor_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `courses_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('019b9962-d758-7248-9df9-270fd4087891','Mathematics','mathematics','Math dedicated School','http',10000.00,1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b9962-d770-713b-ae9c-06cbe1c1bbb2','English','english','School Dedicated','https',10000.00,1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b9962-d781-724a-a47c-e003f72d9f2f','Social Science','socialscience','Social Science Market','https',10000.00,1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b9962-d7a3-7229-8e18-1389d8aa6849','History','history','School Dedicated Market','https',10000.00,1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b9962-d7b6-703e-96c7-07e8a883d2ad','PT','pt','School Dedicated Market','https',10000.00,1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b99e3-fada-7301-9801-b75aa9b95983','Math','math','Math','https',10000.00,1,'019b99e3-fa07-7193-b55b-fb67f63c7731',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53'),('019b99e3-faf4-7392-be90-095056a53fbb','English','english','English','https',10000.00,1,'019b99e3-fa07-7193-b55b-fb67f63c7731',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53'),('019b99e3-fb0a-7143-8a9c-04f7ad004415','Science','science','school regular','https',10000.00,1,'019b99e3-fa07-7193-b55b-fb67f63c7731',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts_offers`
--

DROP TABLE IF EXISTS `discounts_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts_offers` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description_public` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_internal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `discounts_offers_program_id_index` (`program_id`),
  KEY `discounts_offers_course_id_index` (`course_id`),
  KEY `discounts_offers_created_by_user_id_index` (`institute_id`),
  CONSTRAINT `discounts_offers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  CONSTRAINT `discounts_offers_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts_offers`
--

LOCK TABLES `discounts_offers` WRITE;
/*!40000 ALTER TABLE `discounts_offers` DISABLE KEYS */;
INSERT INTO `discounts_offers` VALUES ('019b9962-d72d-730b-ac5a-32b842b8ff60','1st School Regular','dedicated market','dedicated market','percentage',10.00,'2026-01-07','2026-01-14',1,'019b9962-d675-721d-b68d-67c6ce2c9df5',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b99e3-faaf-703f-8ba7-1846186d0484','2nd School Regular','school regular','school regular','percentage',20.00,'2026-01-10','2026-01-15',1,'019b99e3-fa07-7193-b55b-fb67f63c7731',NULL,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53');
/*!40000 ALTER TABLE `discounts_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees__assignments`
--

DROP TABLE IF EXISTS `employees__assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees__assignments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to users table - one user can only have one staff profile per institute.',
  `institute_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to institute_infos',
  `branch_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'FK to branches - defines their primary work location/scope.',
  `job_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees__assignments_user_id_institute_id_unique` (`user_id`,`institute_id`),
  UNIQUE KEY `employees__assignments_user_id_unique` (`user_id`),
  KEY `employees__assignments_institute_id_index` (`institute_id`),
  KEY `employees__assignments_branch_id_index` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees__assignments`
--

LOCK TABLES `employees__assignments` WRITE;
/*!40000 ALTER TABLE `employees__assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees__assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_consents`
--

DROP TABLE IF EXISTS `employer_consents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employer_consents` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Links to the employer profile that gave consent.',
  `consent_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g., terms_and_conditions, privacy_policy.',
  `consent_version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The version of the legal document.',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Flag to confirm consent was given (1 = accepted).',
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP address of the user at the time of consent.',
  `consented_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp of when consent was given.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_employer_consent_type` (`employer_id`,`consent_type`),
  CONSTRAINT `employer_consents_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_consents`
--

LOCK TABLES `employer_consents` WRITE;
/*!40000 ALTER TABLE `employer_consents` DISABLE KEYS */;
/*!40000 ALTER TABLE `employer_consents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_payments`
--

DROP TABLE IF EXISTS `employer_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employer_payments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_profile_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `employer_payments_employer_profile_id_index` (`employer_profile_id`),
  KEY `employer_payments_subscription_id_index` (`subscription_id`),
  KEY `employer_payments_payment_id_index` (`payment_id`),
  KEY `employer_payments_processed_by_user_id_index` (`processed_by_user_id`),
  CONSTRAINT `employer_payments_employer_profile_id_foreign` FOREIGN KEY (`employer_profile_id`) REFERENCES `employers_profiles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employer_payments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `employer_payments_processed_by_user_id_foreign` FOREIGN KEY (`processed_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `employer_payments_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_payments`
--

LOCK TABLES `employer_payments` WRITE;
/*!40000 ALTER TABLE `employer_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `employer_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employers_profiles`
--

DROP TABLE IF EXISTS `employers_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employers_profiles` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `industry` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `settings` json DEFAULT NULL,
  `onboarded_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employers_profiles_user_id_unique` (`user_id`),
  KEY `employers_profiles_onboarded_by_user_id_index` (`onboarded_by_user_id`),
  CONSTRAINT `employers_profiles_onboarded_by_user_id_foreign` FOREIGN KEY (`onboarded_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `employers_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employers_profiles`
--

LOCK TABLES `employers_profiles` WRITE;
/*!40000 ALTER TABLE `employers_profiles` DISABLE KEYS */;
INSERT INTO `employers_profiles` VALUES ('0ea675ef-e6e8-49a7-9137-ac3ab2c6e4fa','0199c4de-9651-70c1-8ef0-752c45ffdd4c','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-08 22:59:05','2025-10-08 22:59:05'),('1707ffa0-35c9-49eb-a197-60fba4f71164','019b1731-86c0-73d9-9e60-b2d9c76becea','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-12-13 15:41:20','2025-12-13 15:41:20'),('396aa0f8-01ad-44bd-93b7-86316178404e','0199b840-6922-70d9-8060-3799a45a5e50','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-06 12:10:53','2025-10-06 12:10:53'),('5971a166-0dfa-4df8-962d-68ad8c01f0e8','0199adb9-fc0d-73a0-8e4d-a42beea3dc53','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-04 11:07:51','2025-10-04 11:07:51'),('7abdb7e8-8101-42b3-9a90-11a03ba7713f','0199a9ff-b07e-71c5-af3b-46834f15e039','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:45:30','2025-10-03 17:45:30'),('b8e41aa8-0f38-4da5-905c-d87a8a521037','0199a9f3-6fdb-7271-8036-136751697044','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:32:07','2025-10-03 17:32:07'),('cb2cfad0-374e-439b-b424-8cac6f1a7fed','0198cc3c-6b37-7144-b0b7-309ccdff7070','Mahabharat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-08-22 21:54:19','2025-08-22 21:54:19'),('ef671f6e-f3ca-457d-a65d-1741cf2ec944','0199b853-fb88-7040-a598-55d7e4d80bb9','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-06 12:32:15','2025-10-06 12:32:15');
/*!40000 ALTER TABLE `employers_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrolled_courses`
--

DROP TABLE IF EXISTS `enrolled_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrolled_courses` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to the enrollments record',
  `course_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to the courses master catalog',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrolled_courses_enrollment_id_course_id_unique` (`enrollment_id`,`course_id`),
  KEY `enrolled_courses_enrollment_id_index` (`enrollment_id`),
  KEY `enrolled_courses_course_id_index` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrolled_courses`
--

LOCK TABLES `enrolled_courses` WRITE;
/*!40000 ALTER TABLE `enrolled_courses` DISABLE KEYS */;
INSERT INTO `enrolled_courses` VALUES ('408ff14a-3233-4fba-af2f-f380e5058712','252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d758-7248-9df9-270fd4087891','in_progress','2026-01-07 22:57:14','2026-01-07 22:57:14'),('4c680774-192a-42bf-8ac5-793c9c577699','252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d7b6-703e-96c7-07e8a883d2ad','in_progress','2026-01-07 22:57:14','2026-01-07 22:57:14'),('4d15acf6-08e2-46ae-a26a-2c13425c66c1','252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d781-724a-a47c-e003f72d9f2f','in_progress','2026-01-07 22:57:14','2026-01-07 22:57:14'),('67a0ee4f-456b-4d45-9afd-e3f0ac28f302','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','019b99e3-fada-7301-9801-b75aa9b95983','in_progress','2026-01-08 00:48:15','2026-01-08 00:48:15'),('6b995bd3-e331-41cf-af1b-2887f1b68cd3','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','019b99e3-faf4-7392-be90-095056a53fbb','in_progress','2026-01-08 00:48:15','2026-01-08 00:48:15'),('9cd64a4b-df98-46ba-9f6a-a5fc626d2725','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','019b99e3-fb0a-7143-8a9c-04f7ad004415','in_progress','2026-01-08 00:48:15','2026-01-08 00:48:15'),('f03fc983-0767-4264-b8c7-1d049409822f','252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d7a3-7229-8e18-1389d8aa6849','in_progress','2026-01-07 22:57:14','2026-01-07 22:57:14'),('f7b1814b-7ec0-4adf-9f13-4a26775c5559','252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d770-713b-ae9c-06cbe1c1bbb2','in_progress','2026-01-07 22:57:14','2026-01-07 22:57:14');
/*!40000 ALTER TABLE `enrolled_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_applied_fees`
--

DROP TABLE IF EXISTS `enrollment_applied_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_applied_fees` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollment_applied_fees_enrollment_id_index` (`enrollment_id`),
  CONSTRAINT `enrollment_applied_fees_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_applied_fees`
--

LOCK TABLES `enrollment_applied_fees` WRITE;
/*!40000 ALTER TABLE `enrollment_applied_fees` DISABLE KEYS */;
INSERT INTO `enrollment_applied_fees` VALUES ('4296459c-7da2-4f90-9008-c0691b1fafd7','252cd5ae-428b-4e3f-b295-d451400a2a9c','extra','Exam set charges',200.00,'2026-01-07 22:57:14','2026-01-07 22:57:14'),('5e0d74de-d3a6-4ac8-8b89-b346506678c0','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','extra','stationery charges',120.00,'2026-01-08 00:48:15','2026-01-08 00:48:15'),('70c7aba7-fd92-403d-8f0b-1a941c494b89','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','extra','Exam set charges',200.00,'2026-01-08 00:48:15','2026-01-08 00:48:15'),('76208e8d-b27f-4ae1-ae4d-d84a3a2ee7ba','252cd5ae-428b-4e3f-b295-d451400a2a9c','extra','stationery charges',120.00,'2026-01-07 22:57:14','2026-01-07 22:57:14'),('882867a9-7867-4535-9111-d83e40cd84f5','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','common','Enrollments Setup fees',40.00,'2026-01-08 00:48:15','2026-01-08 00:48:15'),('9df47660-a218-476b-a5a4-8582b40a456d','252cd5ae-428b-4e3f-b295-d451400a2a9c','common','convenience services charges',70.00,'2026-01-07 22:57:14','2026-01-07 22:57:14'),('ae426978-2cff-4f3c-bd67-7e83636d274a','252cd5ae-428b-4e3f-b295-d451400a2a9c','common','Enrollments Setup fees',40.00,'2026-01-07 22:57:14','2026-01-07 22:57:14'),('d7dfc636-4d9b-403d-8ef3-ffb746f7fece','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','common','convenience services charges',70.00,'2026-01-08 00:48:15','2026-01-08 00:48:15');
/*!40000 ALTER TABLE `enrollment_applied_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_discounts`
--

DROP TABLE IF EXISTS `enrollment_discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_discounts` (
  `enrollment_id` char(36) NOT NULL,
  `discount_id` char(36) NOT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `applied_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`enrollment_id`,`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_discounts`
--

LOCK TABLES `enrollment_discounts` WRITE;
/*!40000 ALTER TABLE `enrollment_discounts` DISABLE KEYS */;
INSERT INTO `enrollment_discounts` VALUES ('252cd5ae-428b-4e3f-b295-d451400a2a9c','019b9962-d72d-730b-ac5a-32b842b8ff60',10000.00,'2026-01-07','2026-01-07 22:57:14','2026-01-07 22:57:14'),('8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','019b99e3-faaf-703f-8ba7-1846186d0484',10000.00,'2026-01-08','2026-01-08 00:48:15','2026-01-08 00:48:15');
/*!40000 ALTER TABLE `enrollment_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_fees`
--

DROP TABLE IF EXISTS `enrollment_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_fees` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to enrollments table',
  `superseded_by_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fee_charged` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_applied` decimal(10,2) NOT NULL DEFAULT '0.00',
  `flexi_amount` decimal(10,2) DEFAULT NULL,
  `flexi_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'partial',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrollment_fees_enrollment_id_unique` (`enrollment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_fees`
--

LOCK TABLES `enrollment_fees` WRITE;
/*!40000 ALTER TABLE `enrollment_fees` DISABLE KEYS */;
INSERT INTO `enrollment_fees` VALUES ('f039c971-970e-4806-90f9-b2b56f3b99bd','8e5bbc71-9576-4cc7-a570-c3a27c20f8ce',NULL,40430.00,3000.00,10000.00,NULL,NULL,NULL,'partial','2026-01-08 00:48:15','2026-01-08 01:18:03'),('f90803dd-e467-46ea-8a1f-a3cc7cdf0497','252cd5ae-428b-4e3f-b295-d451400a2a9c',NULL,90430.00,6000.00,10000.00,NULL,NULL,NULL,'partial','2026-01-07 22:57:14','2026-01-08 01:18:46');
/*!40000 ALTER TABLE `enrollment_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `learner_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to learners table',
  `program_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'FK to programs table',
  `branch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'CRITICAL: FK for scoping',
  `enrollment_date` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_enrollment` (`learner_id`,`program_id`,`branch_id`),
  KEY `enrollments_learner_id_index` (`learner_id`),
  KEY `enrollments_program_id_index` (`program_id`),
  KEY `enrollments_branch_id_index` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES ('252cd5ae-428b-4e3f-b295-d451400a2a9c','9bd10c70-b3b8-4740-800d-0638aaea4a4f','019b9962-d675-721d-b68d-67c6ce2c9df5','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','2026-01-07','active','2026-01-07 22:57:14','2026-01-07 22:57:14'),('8e5bbc71-9576-4cc7-a570-c3a27c20f8ce','9bd10c70-b3b8-4740-800d-0638aaea4a4f','019b99e3-fa07-7193-b55b-fb67f63c7731','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','2026-01-08','active','2026-01-08 00:48:15','2026-01-08 00:48:15');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_papers`
--

DROP TABLE IF EXISTS `exam_papers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_papers` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `points` int NOT NULL DEFAULT '1',
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `correct_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `exam_papers_exam_id_index` (`exam_id`),
  CONSTRAINT `exam_papers_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_papers`
--

LOCK TABLES `exam_papers` WRITE;
/*!40000 ALTER TABLE `exam_papers` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_papers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exams` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instructions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `duration_minutes` int DEFAULT NULL,
  `available_at` timestamp NULL DEFAULT NULL,
  `due_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `exams_course_id_index` (`course_id`),
  KEY `exams_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exams_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fees` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'one_time',
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fees_course_id_index` (`course_id`),
  KEY `fees_program_id_index` (`program_id`),
  CONSTRAINT `fees_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fees_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES ('24d51a8a-3c66-4a6d-bd51-ef2d9bf3db38','7d1a3467-d80e-11f0-8152-0242ac110002','Exam set charges',200.00,'extra',NULL,NULL,'2026-01-06 11:47:53','2026-01-06 11:47:53'),('2b753b34-97ca-48fa-a831-47a823e5facb','7d1a3467-d80e-11f0-8152-0242ac110002','stationery charges',120.00,'extra',NULL,NULL,'2026-01-06 11:48:45','2026-01-06 11:48:45'),('34ea653f-4bc8-4a64-b7db-b304e221c254','7d1a3467-d80e-11f0-8152-0242ac110002','convenience services charges',70.00,'common',NULL,NULL,'2026-01-06 11:46:53','2026-01-06 11:46:53'),('a5aff981-024d-46f1-9135-5c44f9587620','7d1a3467-d80e-11f0-8152-0242ac110002','Enrollments Setup fees',40.00,'common',NULL,NULL,'2026-01-06 11:31:41','2026-01-06 11:45:11');
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institute_infos`
--

DROP TABLE IF EXISTS `institute_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institute_infos` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_line_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `institute_infos_employer_id_index` (`employer_id`),
  CONSTRAINT `institute_infos_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers_profiles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institute_infos`
--

LOCK TABLES `institute_infos` WRITE;
/*!40000 ALTER TABLE `institute_infos` DISABLE KEYS */;
INSERT INTO `institute_infos` VALUES ('1234','cb2cfad0-374e-439b-b424-8cac6f1a7fed','jay shree ram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.shutterstock.com/image-vector/lord-hanuman-graphic-trendy-design-600w-2214174237.jpg','https://hindubhagwan.com/Gallery/images/portfolio/full/small/lord_hanuman_angry_image.jpg',1,'2025-08-14 08:19:03','2025-09-08 05:39:58'),('2559a851-a77e-11f0-b33d-0242ac110002','0ea675ef-e6e8-49a7-9137-ac3ab2c6e4fa','Shree Education Institute','Leading institution for advanced learning','123 Knowledge Street','Pune','Maharashtra','411001','India','contact@shreeedu.com','+91-9876543210','https://example.com/shreeedu-logo.png','https://example.com/shreeedu-bg.png',1,'2025-10-12 15:14:28','2025-10-12 15:14:28'),('7d1a3467-d80e-11f0-8152-0242ac110002','1707ffa0-35c9-49eb-a197-60fba4f71164','Demo Institute','Institute created for demo employer user','Demo Address Line 1','Pune','Maharashtra','411001','India','demo@institute.com','+91-9000000000','https://example.com/logo.png','https://example.com/bg.png',1,'2025-12-13 10:28:38','2025-12-13 10:28:38');
/*!40000 ALTER TABLE `institute_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learners`
--

DROP TABLE IF EXISTS `learners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `learners` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_learner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'initial_entry',
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learner_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `learners_learner_code_unique` (`learner_code`),
  KEY `learner_catalog_user_id_index` (`user_id`),
  KEY `learner_catalog_created_by_index` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learners`
--

LOCK TABLES `learners` WRITE;
/*!40000 ALTER TABLE `learners` DISABLE KEYS */;
INSERT INTO `learners` VALUES ('9bd10c70-b3b8-4740-800d-0638aaea4a4f','Rushi Kam','rushi@kam.com','1234567890','initial_entry','a0147168-d10e-4d15-ab59-988621d041d6','LRN-39PBIU','019b1731-86c0-73d9-9e60-b2d9c76becea','2026-01-07 22:51:42','2026-01-07 22:51:42','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab');
/*!40000 ALTER TABLE `learners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_08_03_034432_create_users_and_auth_tables',1),(2,'2025_08_03_034700_create_failed_jobs_table',1),(3,'2025_08_03_034816_create_cache_table',1),(4,'2025_08_03_040308_create_user_profiles_table',1),(5,'2025_08_03_044721_create_product_version_histories_table',1),(6,'2025_08_03_044825_create_product_infos_table',1),(7,'2025_08_03_044940_create_packages_table',1),(8,'2025_08_03_045225_create_pricing_zones_table',1),(9,'2025_08_03_111247_create_permissions_table',1),(10,'2025_08_03_111402_create_roles_table',1),(11,'2025_08_03_112236_create_role_permissions_table',1),(12,'2025_08_03_112532_create_user_roles_table',1),(13,'2025_08_03_114016_create_employers_profiles_table',1),(14,'2025_08_03_114118_create_institute_infos_table',1),(15,'2025_08_03_114231_create_branches_table',1),(16,'2025_08_03_144532_create_programs_table',1),(17,'2025_08_03_144642_create_courses_table',1),(18,'2025_08_03_144800_create_contents_table',1),(19,'2025_08_03_150212_create_tags_table',1),(20,'2025_08_03_150328_create_program_tags_table',1),(21,'2025_08_03_150508_create_discounts_offers_table',1),(22,'2025_08_03_150621_create_program_prices_table',1),(23,'2025_08_04_050924_create_assignments_table',1),(24,'2025_08_04_051036_create_assignment_submissions_table',1),(25,'2025_08_04_053655_create_exams_table',1),(26,'2025_08_04_053802_create_exam_papers_table',1),(27,'2025_08_04_053858_create_results_table',1),(28,'2025_08_04_055721_create_timetables_table',1),(29,'2025_08_04_055831_create_attendances_table',1),(30,'2025_08_04_060955_create_subscriptions_table',1),(31,'2025_08_04_061111_create_payments_table',1),(32,'2025_08_04_061209_create_employer_payments_table',1),(33,'2025_08_04_061336_create_fees_table',1),(34,'2025_08_04_063541_create_communications_table',1),(35,'2025_08_04_063703_create_support_tickets_table',1),(36,'2025_08_04_063811_create_activity_logs_table',1),(37,'2025_08_04_064158_create_jobs_table',1),(38,'2025_08_04_064303_create_job_batches_table',1),(39,'2025_08_04_074342_create_personal_access_tokens_table',1),(40,'2025_08_06_101000_create_penalties_table',1),(41,'2025_08_23_163327_create_employer_consents_table',2),(42,'2025_08_31_105335_create_user_consents_table',3),(43,'2025_09_28_131351_add_normalized_name_to_programs_table',4),(44,'2025_09_28_131624_add_normalized_name_to_courses_table',4),(45,'2025_10_03_100801_create_learner_catalog_table',5),(46,'2025_10_03_120700_make_raw_phone_nullable_in_learner_catalog_table',6),(48,'2025_10_07_195322_add_paid_amount_to_learner_catalog_table',7),(49,'2025_10_08_183705_rename_learner_catalog_to_learners',8),(50,'2025_10_08_184019_create_enrollments_table',8),(51,'2025_10_08_185657_create_enrollment_fees_table',8),(52,'2025_10_08_192713_create_enrolled_courses_table',9),(53,'2025_10_08_193753_create_employees__assignments_table',10),(54,'2025_10_08_221425_clean_up_redundant_columns_in_learners_table',11),(55,'2025_10_15_170226_update_program_courses_related_changes',12),(56,'2025_10_19_223211_create_user_branch_roles_table',13),(57,'2025_12_01_193736_create_activity_logs_table',0),(58,'2025_12_01_193736_create_assignment_submissions_table',0),(59,'2025_12_01_193736_create_assignments_table',0),(60,'2025_12_01_193736_create_attendances_table',0),(61,'2025_12_01_193736_create_branches_table',0),(62,'2025_12_01_193736_create_cache_table',0),(63,'2025_12_01_193736_create_cache_locks_table',0),(64,'2025_12_01_193736_create_communications_table',0),(65,'2025_12_01_193736_create_contents_table',0),(66,'2025_12_01_193736_create_courses_table',0),(67,'2025_12_01_193736_create_discounts_offers_table',0),(68,'2025_12_01_193736_create_employees__assignments_table',0),(69,'2025_12_01_193736_create_employer_consents_table',0),(70,'2025_12_01_193736_create_employer_payments_table',0),(71,'2025_12_01_193736_create_employers_profiles_table',0),(72,'2025_12_01_193736_create_enrolled_courses_table',0),(73,'2025_12_01_193736_create_enrollment_discounts_table',0),(74,'2025_12_01_193736_create_enrollment_fees_table',0),(75,'2025_12_01_193736_create_enrollments_table',0),(76,'2025_12_01_193736_create_exam_papers_table',0),(77,'2025_12_01_193736_create_exams_table',0),(78,'2025_12_01_193736_create_failed_jobs_table',0),(79,'2025_12_01_193736_create_fees_table',0),(80,'2025_12_01_193736_create_institute_infos_table',0),(81,'2025_12_01_193736_create_job_batches_table',0),(82,'2025_12_01_193736_create_jobs_table',0),(83,'2025_12_01_193736_create_learners_table',0),(84,'2025_12_01_193736_create_packages_table',0),(85,'2025_12_01_193736_create_password_reset_tokens_table',0),(86,'2025_12_01_193736_create_payments_table',0),(87,'2025_12_01_193736_create_penalties_table',0),(88,'2025_12_01_193736_create_permissions_table',0),(89,'2025_12_01_193736_create_personal_access_tokens_table',0),(90,'2025_12_01_193736_create_pricing_zones_table',0),(91,'2025_12_01_193736_create_product_infos_table',0),(92,'2025_12_01_193736_create_product_version_histories_table',0),(93,'2025_12_01_193736_create_program_prices_table',0),(94,'2025_12_01_193736_create_program_tags_table',0),(95,'2025_12_01_193736_create_programs_table',0),(96,'2025_12_01_193736_create_reminders_table',0),(97,'2025_12_01_193736_create_results_table',0),(98,'2025_12_01_193736_create_role_permissions_table',0),(99,'2025_12_01_193736_create_roles_table',0),(100,'2025_12_01_193736_create_sessions_table',0),(101,'2025_12_01_193736_create_subscriptions_table',0),(102,'2025_12_01_193736_create_support_tickets_table',0),(103,'2025_12_01_193736_create_tags_table',0),(104,'2025_12_01_193736_create_timetables_table',0),(105,'2025_12_01_193736_create_user_branch_roles_table',0),(106,'2025_12_01_193736_create_user_consents_table',0),(107,'2025_12_01_193736_create_user_profiles_table',0),(108,'2025_12_01_193736_create_user_roles_table',0),(109,'2025_12_01_193736_create_users_table',0),(110,'2025_12_01_193739_add_foreign_keys_to_activity_logs_table',0),(111,'2025_12_01_193739_add_foreign_keys_to_assignment_submissions_table',0),(112,'2025_12_01_193739_add_foreign_keys_to_assignments_table',0),(113,'2025_12_01_193739_add_foreign_keys_to_attendances_table',0),(114,'2025_12_01_193739_add_foreign_keys_to_branches_table',0),(115,'2025_12_01_193739_add_foreign_keys_to_communications_table',0),(116,'2025_12_01_193739_add_foreign_keys_to_contents_table',0),(117,'2025_12_01_193739_add_foreign_keys_to_courses_table',0),(118,'2025_12_01_193739_add_foreign_keys_to_discounts_offers_table',0),(119,'2025_12_01_193739_add_foreign_keys_to_employer_consents_table',0),(120,'2025_12_01_193739_add_foreign_keys_to_employer_payments_table',0),(121,'2025_12_01_193739_add_foreign_keys_to_employers_profiles_table',0),(122,'2025_12_01_193739_add_foreign_keys_to_exam_papers_table',0),(123,'2025_12_01_193739_add_foreign_keys_to_exams_table',0),(124,'2025_12_01_193739_add_foreign_keys_to_fees_table',0),(125,'2025_12_01_193739_add_foreign_keys_to_institute_infos_table',0),(126,'2025_12_01_193739_add_foreign_keys_to_penalties_table',0),(127,'2025_12_01_193739_add_foreign_keys_to_product_infos_table',0),(128,'2025_12_01_193739_add_foreign_keys_to_product_version_histories_table',0),(129,'2025_12_01_193739_add_foreign_keys_to_program_prices_table',0),(130,'2025_12_01_193739_add_foreign_keys_to_program_tags_table',0),(131,'2025_12_01_193739_add_foreign_keys_to_results_table',0),(132,'2025_12_01_193739_add_foreign_keys_to_role_permissions_table',0),(133,'2025_12_01_193739_add_foreign_keys_to_roles_table',0),(134,'2025_12_01_193739_add_foreign_keys_to_sessions_table',0),(135,'2025_12_01_193739_add_foreign_keys_to_subscriptions_table',0),(136,'2025_12_01_193739_add_foreign_keys_to_support_tickets_table',0),(137,'2025_12_01_193739_add_foreign_keys_to_timetables_table',0),(138,'2025_12_01_193739_add_foreign_keys_to_user_branch_roles_table',0),(139,'2025_12_01_193739_add_foreign_keys_to_user_consents_table',0),(140,'2025_12_01_193739_add_foreign_keys_to_user_profiles_table',0),(141,'2025_12_01_193739_add_foreign_keys_to_user_roles_table',0),(142,'2025_12_24_105427_add_remark_to_enrollment_fees_table',14),(143,'2026_01_06_142914_create_enrollment_applied_fees_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `package_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `min_learner_capacity` int NOT NULL DEFAULT '0',
  `max_learner_capacity` int NOT NULL DEFAULT '0',
  `base_per_learner_rate_urban` decimal(10,2) NOT NULL DEFAULT '0.00',
  `instructor_capacity_limit` int NOT NULL DEFAULT '0',
  `storage_limit_mb` int NOT NULL DEFAULT '0',
  `features` json DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`package_id`),
  UNIQUE KEY `packages_package_name_unique` (`package_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES ('d1beed1d-353b-4b65-8b9e-adf6a752bebf','Founding Member - Basic','Founding Member - Basic this is package have learner limit only 100 not allowed more than 100 learner. but product all features and services can be access it.',1,100,7.00,5,500,'[\"All FEATURES\", \"CORE ALL\"]',1,1,'2025-09-01 09:30:23','2025-09-01 09:30:23');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `payable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`),
  KEY `payments_payable_id_payable_type_index` (`payable_id`,`payable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES ('019b99db-0343-72b8-8bf1-e08283b91719',1000.00,'UPI','UPI-123-456','completed','2026-01-08 00:37:05','f90803dd-e467-46ea-8a1f-a3cc7cdf0497','LF','2026-01-08 00:37:05','2026-01-08 00:37:05'),('019b99ff-8867-7285-abf0-43cdb1a1c644',1000.00,'UPI','UPI-123-789','completed','2026-01-08 01:16:59','f039c971-970e-4806-90f9-b2b56f3b99bd','LF','2026-01-08 01:16:59','2026-01-08 01:16:59'),('019b9a00-8340-70b0-ab12-e8c6a114e708',2000.00,'UPI','UPI-123-101','completed','2026-01-08 01:18:03','f039c971-970e-4806-90f9-b2b56f3b99bd','LF','2026-01-08 01:18:03','2026-01-08 01:18:03'),('019b9a01-29fd-70b4-a28d-17caad77c669',5000.00,'UPI','UPI-123-111','completed','2026-01-08 01:18:46','f90803dd-e467-46ea-8a1f-a3cc7cdf0497','LF','2026-01-08 01:18:46','2026-01-08 01:18:46');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penalties`
--

DROP TABLE IF EXISTS `penalties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penalties` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `applied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penalties_subscription_id_foreign` (`subscription_id`),
  CONSTRAINT `penalties_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penalties`
--

LOCK TABLES `penalties` WRITE;
/*!40000 ALTER TABLE `penalties` DISABLE KEYS */;
/*!40000 ALTER TABLE `penalties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_super_admin_only` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing_zones`
--

DROP TABLE IF EXISTS `pricing_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_zones` (
  `zone_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rate_multiplier` decimal(5,2) NOT NULL DEFAULT '1.00',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`zone_id`),
  UNIQUE KEY `pricing_zones_zone_name_unique` (`zone_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_zones`
--

LOCK TABLES `pricing_zones` WRITE;
/*!40000 ALTER TABLE `pricing_zones` DISABLE KEYS */;
INSERT INTO `pricing_zones` VALUES ('80f46a97-3e38-471e-9b79-69aa5e0a7372','KALYAN-MH-421304','Kalyan come under urban but have some under cities come under the rural due to rate of learner are the low.',7.00,1,'2025-09-01 13:50:47','2025-09-01 13:50:47');
/*!40000 ALTER TABLE `pricing_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_infos`
--

DROP TABLE IF EXISTS `product_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_infos` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `current_version` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_of_service_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `privacy_policy_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `default_trial_days` int NOT NULL DEFAULT '0',
  `admin_contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `support_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `marketing_site_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `default_language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `is_maintenance_mode` tinyint NOT NULL DEFAULT '0',
  `maintenance_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_updated_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_infos_current_version_index` (`current_version`),
  KEY `product_infos_last_updated_by_user_id_index` (`last_updated_by_user_id`),
  CONSTRAINT `product_infos_current_version_foreign` FOREIGN KEY (`current_version`) REFERENCES `product_version_histories` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `product_infos_last_updated_by_user_id_foreign` FOREIGN KEY (`last_updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_infos`
--

LOCK TABLES `product_infos` WRITE;
/*!40000 ALTER TABLE `product_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_version_histories`
--

DROP TABLE IF EXISTS `product_version_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_version_histories` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `release_date` date DEFAULT NULL,
  `released_by_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_major_release` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_version_histories_released_by_id_index` (`released_by_id`),
  CONSTRAINT `product_version_histories_released_by_id_foreign` FOREIGN KEY (`released_by_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_version_histories`
--

LOCK TABLES `product_version_histories` WRITE;
/*!40000 ALTER TABLE `product_version_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_version_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_prices`
--

DROP TABLE IF EXISTS `program_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_prices` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_offer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `institute_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `program_prices_program_id_index` (`program_id`),
  KEY `program_prices_discount_offer_id_index` (`discount_offer_id`),
  KEY `program_prices_created_by_user_id_index` (`institute_id`),
  CONSTRAINT `program_prices_discount_offer_id_foreign` FOREIGN KEY (`discount_offer_id`) REFERENCES `discounts_offers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `program_prices_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_prices`
--

LOCK TABLES `program_prices` WRITE;
/*!40000 ALTER TABLE `program_prices` DISABLE KEYS */;
INSERT INTO `program_prices` VALUES ('019b9962-d701-70ca-aace-329d43b00c7d','019b9962-d675-721d-b68d-67c6ce2c9df5','Regular',50000.00,NULL,'Market Dedicted',1,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b99e3-fa7e-708a-b1a2-a08a7e2f7793','019b99e3-fa07-7193-b55b-fb67f63c7731','School Regular',20000.00,NULL,'School Regular',1,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53');
/*!40000 ALTER TABLE `program_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_tags`
--

DROP TABLE IF EXISTS `program_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_tags` (
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`program_id`,`tag_id`),
  KEY `program_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `program_tags_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `program_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_tags`
--

LOCK TABLES `program_tags` WRITE;
/*!40000 ALTER TABLE `program_tags` DISABLE KEYS */;
INSERT INTO `program_tags` VALUES ('019b9962-d675-721d-b68d-67c6ce2c9df5','019b9962-d6ca-71be-8b70-5e46ed44319c','2026-01-07 22:25:50');
/*!40000 ALTER TABLE `program_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `normalized_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `duration_days` int DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `institute_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `programs_created_by_user_id_index` (`institute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES ('019b9962-d675-721d-b68d-67c6ce2c9df5','1st Class School Regular',NULL,'1st Class School Regular',180,1,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50'),('019b99e3-fa07-7193-b55b-fb67f63c7731','2nd School Regular',NULL,'2nd School Regular',180,1,'7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-08 00:46:53','2026-01-08 00:46:53');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reminders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_description` text COLLATE utf8mb4_unicode_ci,
  `reminder_start_date` datetime NOT NULL,
  `reminder_end_date` datetime DEFAULT NULL,
  `reminder_from_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_to_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_reminder_type` (`reminder_type`),
  KEY `idx_reminder_to_user` (`reminder_to_user_id`),
  KEY `idx_reminder_from_user` (`reminder_from_user_id`)
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
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_points` int DEFAULT NULL,
  `points_awarded` int DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `results_user_id_index` (`user_id`),
  KEY `results_exam_id_index` (`exam_id`),
  CONSTRAINT `results_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_permissions` (
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `level` int DEFAULT NULL,
  `dashboard_route_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`),
  KEY `roles_employer_id_index` (`employer_id`),
  KEY `roles_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `roles_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES ('0198a25a-ba68-7365-a398-fe87aa5997c7',NULL,'Admin','Administrator','Super Administrator with full system access.',0,NULL,'adminDashboard','Active',NULL,'2025-08-13 13:05:11','2025-08-13 08:26:32'),('0199aa0b-8454-70f4-a975-48b260cd8c70',NULL,'SystemEmployer','System Employer','Responsible for maintaining client-side control.',0,NULL,'employerDashboard','Active',NULL,'2025-10-03 17:58:25','2025-10-06 06:55:31'),('4634f256-ae38-11f0-a321-0242ac110002',NULL,'Instructor','Instructor','Responsible for teaching, training, and guiding learners within the system.',0,NULL,'instructorDashboard','Active',NULL,'2025-10-21 04:41:56','2025-10-21 04:41:56'),('463ce2fd-ae38-11f0-a321-0242ac110002',NULL,'Learner','Learner','Registered user who participates in courses and learning activities.',0,NULL,'learnerDashboard','Active',NULL,'2025-10-21 04:41:56','2025-10-21 04:41:56'),('4992256f-ad09-11f0-80ba-0242ac110002',NULL,'BranchExecutive','Branch Executive','Manages daily operations and local logistics for a single branch.',1,NULL,'branchExecutiveDashboard','Active',NULL,'2025-10-19 16:33:04','2025-10-19 16:33:04');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('GSuN9RzEKKZ72XF7H7mCiDJatn2P3dmsMjWbP9IT','019b1731-86c0-73d9-9e60-b2d9c76becea','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiZ3B6NzZBSHNyTTNXdFlRUTZlbGZJdmxqelE0NVpta3JXRm10ZkxvayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9icmFuY2gtZXhlY3V0aXZlL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM2OiIwMTliMTczMS04NmMwLTczZDktOWU2MC1iMmQ5Yzc2YmVjZWEiO3M6MTM6ImNvbWJpbmVkUm9sZXMiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjI6e2k6MDthOjU6e3M6NDoidHlwZSI7czo2OiJnbG9iYWwiO3M6MjoiaWQiO3M6MzY6IjAxOTlhYTBiLTg0NTQtNzBmNC1hOTc1LTQ4YjI2MGNkOGM3MCI7czo0OiJuYW1lIjtzOjE0OiJTeXN0ZW1FbXBsb3llciI7czo2OiJicmFuY2giO047czo5OiJkYXNoYm9hcmQiO3M6MTc6ImVtcGxveWVyRGFzaGJvYXJkIjt9aToxO2E6NTp7czo0OiJ0eXBlIjtzOjY6ImJyYW5jaCI7czoyOiJpZCI7czozNjoiMjIzNGM3MmUtZDgxYi0xMWYwLTgxNTItMDI0MmFjMTEwMDAyIjtzOjQ6Im5hbWUiO3M6MTU6IkJyYW5jaEV4ZWN1dGl2ZSI7czo2OiJicmFuY2giO3M6MzM6IjFzdCB0byAxMHRoIFNjaG9vbCBDb2FjaGluZyBDbGFzcyI7czo5OiJkYXNoYm9hcmQiO3M6MjQ6ImJyYW5jaEV4ZWN1dGl2ZURhc2hib2FyZCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6MTU6ImFjdGl2ZUJyYW5jaF9pZCI7czozNjoiNDdlYWU0MGEtZjBjZS00ZGM5LWJkNGQtZTY5NTdjYThjN2FiIjtzOjEzOiJhY3RpdmVSb2xlX2lkIjtzOjM2OiI0OTkyMjU2Zi1hZDA5LTExZjAtODBiYS0wMjQyYWMxMTAwMDIiO3M6MjA6InNlbGVjdGVkX3JvbGVfcHJlZml4IjtzOjE1OiJicmFuY2hleGVjdXRpdmUiO30=',1767891352),('hXzQtpYviRwzoVtQetU0zKABpH01NSrHwSJJOt7g','019b1731-86c0-73d9-9e60-b2d9c76becea','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiR3FrT1JrN1JKVXAxbzRMbmxZWWxTTURycnJMbUpFbVlweXdQdnpXRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9icmFuY2gtZXhlY3V0aXZlL3BheW1lbnRzL2Vucm9sbG1lbnQvMjUyY2Q1YWUtNDI4Yi00ZTNmLWIyOTUtZDQ1MTQwMGEyYTljIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjAxOWIxNzMxLTg2YzAtNzNkOS05ZTYwLWIyZDljNzZiZWNlYSI7czoxMzoiY29tYmluZWRSb2xlcyI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6Mjp7aTowO2E6NTp7czo0OiJ0eXBlIjtzOjY6Imdsb2JhbCI7czoyOiJpZCI7czozNjoiMDE5OWFhMGItODQ1NC03MGY0LWE5NzUtNDhiMjYwY2Q4YzcwIjtzOjQ6Im5hbWUiO3M6MTQ6IlN5c3RlbUVtcGxveWVyIjtzOjY6ImJyYW5jaCI7TjtzOjk6ImRhc2hib2FyZCI7czoxNzoiZW1wbG95ZXJEYXNoYm9hcmQiO31pOjE7YTo1OntzOjQ6InR5cGUiO3M6NjoiYnJhbmNoIjtzOjI6ImlkIjtzOjM2OiIyMjM0YzcyZS1kODFiLTExZjAtODE1Mi0wMjQyYWMxMTAwMDIiO3M6NDoibmFtZSI7czoxNToiQnJhbmNoRXhlY3V0aXZlIjtzOjY6ImJyYW5jaCI7czozMzoiMXN0IHRvIDEwdGggU2Nob29sIENvYWNoaW5nIENsYXNzIjtzOjk6ImRhc2hib2FyZCI7czoyNDoiYnJhbmNoRXhlY3V0aXZlRGFzaGJvYXJkIjt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czoxNToiYWN0aXZlQnJhbmNoX2lkIjtzOjM2OiI0N2VhZTQwYS1mMGNlLTRkYzktYmQ0ZC1lNjk1N2NhOGM3YWIiO3M6MTM6ImFjdGl2ZVJvbGVfaWQiO3M6MzY6IjQ5OTIyNTZmLWFkMDktMTFmMC04MGJhLTAyNDJhYzExMDAwMiI7czoyMDoic2VsZWN0ZWRfcm9sZV9wcmVmaXgiO3M6MTU6ImJyYW5jaGV4ZWN1dGl2ZSI7fQ==',1767815365),('YJbcSwrPhYNWGReq5F18gDUvwaXndXwYu34XD6SX','019b1731-86c0-73d9-9e60-b2d9c76becea','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaExKMjlSUktEemhpalR1MThzUFRTZFl5eVpOUEd4dG94bHVrVVZ0OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llci9wcm9ncmFtcy1jb3Vyc2VzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjAxOWIxNzMxLTg2YzAtNzNkOS05ZTYwLWIyZDljNzZiZWNlYSI7czoxMzoiY29tYmluZWRSb2xlcyI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6Mjp7aTowO2E6NTp7czo0OiJ0eXBlIjtzOjY6Imdsb2JhbCI7czoyOiJpZCI7czozNjoiMDE5OWFhMGItODQ1NC03MGY0LWE5NzUtNDhiMjYwY2Q4YzcwIjtzOjQ6Im5hbWUiO3M6MTQ6IlN5c3RlbUVtcGxveWVyIjtzOjY6ImJyYW5jaCI7TjtzOjk6ImRhc2hib2FyZCI7czoxNzoiZW1wbG95ZXJEYXNoYm9hcmQiO31pOjE7YTo1OntzOjQ6InR5cGUiO3M6NjoiYnJhbmNoIjtzOjI6ImlkIjtzOjM2OiIyMjM0YzcyZS1kODFiLTExZjAtODE1Mi0wMjQyYWMxMTAwMDIiO3M6NDoibmFtZSI7czoxNToiQnJhbmNoRXhlY3V0aXZlIjtzOjY6ImJyYW5jaCI7czozMzoiMXN0IHRvIDEwdGggU2Nob29sIENvYWNoaW5nIENsYXNzIjtzOjk6ImRhc2hib2FyZCI7czoyNDoiYnJhbmNoRXhlY3V0aXZlRGFzaGJvYXJkIjt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czoyMDoic2VsZWN0ZWRfcm9sZV9wcmVmaXgiO3M6MTQ6InN5c3RlbWVtcGxveWVyIjt9',1767813432),('zgxitt43PWx07YTLge9mNCIAZjC26K5aYu8jOn7M',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoia01wc2NYSjNnWm5aWENmU2RpSzNadnVzTXpGTmFLVFFBbTRwMktWViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JyYW5jaC1leGVjdXRpdmUvTGVhcm5lciUyME9uYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JyYW5jaC1leGVjdXRpdmUvTGVhcm5lciUyME9uYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1767805932);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_profile_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `initiated_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_frequency` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subscriptions_employer_profile_id_index` (`employer_profile_id`),
  KEY `subscriptions_package_id_index` (`package_id`),
  KEY `subscriptions_initiated_by_user_id_index` (`initiated_by_user_id`),
  CONSTRAINT `subscriptions_employer_profile_id_foreign` FOREIGN KEY (`employer_profile_id`) REFERENCES `employers_profiles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscriptions_initiated_by_user_id_foreign` FOREIGN KEY (`initiated_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_tickets`
--

DROP TABLE IF EXISTS `support_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_tickets` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_to_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `priority` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `support_tickets_created_by_user_id_index` (`created_by_user_id`),
  KEY `support_tickets_assigned_to_user_id_index` (`assigned_to_user_id`),
  CONSTRAINT `support_tickets_assigned_to_user_id_foreign` FOREIGN KEY (`assigned_to_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `support_tickets_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_tickets`
--

LOCK TABLES `support_tickets` WRITE;
/*!40000 ALTER TABLE `support_tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `institute_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`),
  KEY `tags_created_by_user_id_index` (`institute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES ('019b9962-d6ca-71be-8b70-5e46ed44319c','School Regular','School','School Regular it','7d1a3467-d80e-11f0-8152-0242ac110002','2026-01-07 22:25:50','2026-01-07 22:25:50');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetables` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_of_week` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `timetables_branch_id_index` (`branch_id`),
  KEY `timetables_course_id_index` (`course_id`),
  KEY `timetables_program_id_index` (`program_id`),
  KEY `timetables_instructor_user_id_index` (`instructor_user_id`),
  CONSTRAINT `timetables_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `timetables_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `timetables_instructor_user_id_foreign` FOREIGN KEY (`instructor_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `timetables_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetables`
--

LOCK TABLES `timetables` WRITE;
/*!40000 ALTER TABLE `timetables` DISABLE KEYS */;
/*!40000 ALTER TABLE `timetables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_branch_roles`
--

DROP TABLE IF EXISTS `user_branch_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_branch_roles` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_branch_roles_user_id_branch_id_role_id_unique` (`user_id`,`branch_id`,`role_id`),
  KEY `user_branch_roles_branch_id_foreign` (`branch_id`),
  KEY `user_branch_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_branch_roles_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_branch_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  CONSTRAINT `user_branch_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_branch_roles`
--

LOCK TABLES `user_branch_roles` WRITE;
/*!40000 ALTER TABLE `user_branch_roles` DISABLE KEYS */;
INSERT INTO `user_branch_roles` VALUES ('03c44236-cab6-406a-a765-7591ae377ae9','746d1f5c-168d-4eac-bd83-176c4b17ff97','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('19ebe17e-c6f9-498f-833f-4af3a5bd6164','6bf87bd9-f7ec-4d4b-95d7-6b515bda00c6','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-12-13 17:48:09','2025-12-13 17:48:09'),('2234c72e-d81b-11f0-8152-0242ac110002','019b1731-86c0-73d9-9e60-b2d9c76becea','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','4992256f-ad09-11f0-80ba-0242ac110002',1,'2025-12-13 11:59:09','2025-12-13 11:59:09'),('244c32f7-d539-401b-b853-8b0b340a1cf6','9dcc63e9-5212-4fdb-a216-f96fef09b90b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('2605ebc6-d0c1-4d79-925f-4118d7364c4d','6c7b2bbc-d104-422e-ab26-db53f0df9e5d','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('32db0bd4-5d8b-441e-b044-09ef15e7fe63','6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('33735faf-b015-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-10-23 13:35:55','2025-10-23 13:35:55'),('35201e60-d684-416e-b350-6b434e973bcd','c1bea9dc-5916-4b72-b1f5-7fc7ca79a5ce','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-12-24 09:49:55','2025-12-24 09:49:55'),('39e601c3-b019-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','63684590-2270-44b7-af3c-44cc4f05317c','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-23 14:04:44','2025-10-23 14:04:44'),('3cc5714b-a1d8-4c49-bae0-768779eec811','dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('470a314e-fe62-4366-868a-623a444bf8a3','f3a2013a-79da-4259-b0ba-ec9d238a650c','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-26 16:53:50','2025-11-26 16:53:50'),('55916761-2451-47ca-a958-67412e2e37b7','ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('69f5bddd-a51e-40d0-9ed9-a7b5bcedb94b','f0f912a8-156c-442a-bdfd-92c796884238','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('6bcb5760-1535-4107-b168-1a0c74e58df6','a0147168-d10e-4d15-ab59-988621d041d6','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2026-01-07 22:51:42','2026-01-07 22:51:42'),('8971fc9c-9a3f-4d53-b714-4b54730dbbf4','91fa5ce8-fb24-414a-933b-0d740340697e','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('8de968d2-3bf5-48db-80ea-b53d82961da5','4eca6564-9fbf-45bb-b6d9-9ad0895ab01e','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-12-29 16:49:42','2025-12-29 16:49:42'),('92d8859d-d16e-4d8b-82d9-c1ae731b97dc','02b2a2f4-1890-445a-937f-6b88163a9e95','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-30 19:15:26','2025-11-30 19:15:26'),('9a5e099d-9c2c-42f2-be82-2626abe90122','7c64a808-4f41-456b-aca0-ce225ce8b40b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('b64fe353-7e97-49df-a111-e72a13cd463e','47b504c0-310b-4936-a888-294846434530','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('c5e3473f-596c-4af5-b1bb-d1d21a1c6a3a','46a870ce-ecb6-4f96-90af-f4cad83035a3','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-12-29 17:45:14','2025-12-29 17:45:14'),('d40fa6e2-0478-4f61-90ec-68a16a1872f3','d45958e5-2fd3-4752-9291-9ca8b889fec4','47eae40a-f0ce-4dc9-bd4d-e6957ca8c7ab','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2026-01-07 15:55:48','2026-01-07 15:55:48'),('ef9483e1-1e1c-4ef4-ba1e-5ce304de35ea','1aa313f1-8d7a-4399-9ba3-0b843cc54c32','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('fea7d400-b00a-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-23 12:22:51','2025-10-23 12:22:51'),('u1b2c3d4-e5f6-7890-abcd-1234567890ef','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4992256f-ad09-11f0-80ba-0242ac110002',1,'2025-10-21 06:44:39','2025-10-21 06:44:39');
/*!40000 ALTER TABLE `user_branch_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_consents`
--

DROP TABLE IF EXISTS `user_consents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_consents` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Links to the user that gave consent.',
  `consent_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g., terms_and_conditions, privacy_policy.',
  `consent_version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The version of the legal document.',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Flag to confirm consent was given (1 = accepted).',
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP address of the user at the time of consent.',
  `consented_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp of when consent was given.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_consent_type` (`user_id`,`consent_type`),
  CONSTRAINT `user_consents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_consents`
--

LOCK TABLES `user_consents` WRITE;
/*!40000 ALTER TABLE `user_consents` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_consents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profiles` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture_url` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `preferred_language` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_timezone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_profiles_user_id_unique` (`user_id`),
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES ('045bc936-c351-435a-85ed-1bf98bde2b72','6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','Karanav','Puti',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('1be3b917-d3d1-4cec-9f09-e66ba046e5c6','d45958e5-2fd3-4752-9291-9ca8b889fec4','Rushi','Sam',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-01-07 15:55:48','2026-01-07 15:55:48'),('21bdd0ae-fb5f-4993-aca9-e0ffb9564caf','4eca6564-9fbf-45bb-b6d9-9ad0895ab01e','Shreya','Ker',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-12-29 16:49:42','2025-12-29 16:49:42'),('3acc3f18-2347-4b4d-a0dc-c7740cb144ec','f3a2013a-79da-4259-b0ba-ec9d238a650c','Aditi','Garv',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-26 16:53:50','2025-11-26 16:53:50'),('3c51eb5f-a5ca-415b-9330-bd917b564842','02b2a2f4-1890-445a-937f-6b88163a9e95','Himeshh','Rasamii','2019-11-19','MALE','K 1','4 M','Shimla','Uttarkhand','421253','india','/storage/uploads/profile_pictures/dPPEw4tSGhAmFtl4GNctsD4eomSKpWXejchObyKB.jpg','nothing','French',NULL,NULL,'2025-11-30 19:15:26','2025-12-12 18:04:45'),('4f10f18b-c429-4790-b7dd-04d6ce12d074','f0f912a8-156c-442a-bdfd-92c796884238','Pankaj','Bhor',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('4fed4949-edc9-4787-83d6-80a63c0f6d60','0199b840-6922-70d9-8060-3799a45a5e50','Mayur','Barhate','2025-10-22','Male','Titwala','Manda','Titwala','MH','421605','IND','/storage/uploads/profile_pictures/KppzIuB9OoRjEy66kkavfED8mGnZz0BLoTrA1zKH.jpg','I am the developer','PHP',NULL,NULL,'2025-10-10 11:18:01','2025-10-11 20:57:50'),('586611fd-b102-4ace-86a2-82e71ba896bb','6bf87bd9-f7ec-4d4b-95d7-6b515bda00c6','Demo','Learner',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-12-13 17:48:09','2025-12-13 17:48:09'),('607b3494-8302-419e-97d4-9fa87c75e49f','47b504c0-310b-4936-a888-294846434530','Shivay','Mahadev',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('801c1d56-391b-4dfc-b454-920df813dbb1','9dcc63e9-5212-4fdb-a216-f96fef09b90b','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('83f40527-6cc9-4cf4-a72a-b9849e0b0d1f','c1bea9dc-5916-4b72-b1f5-7fc7ca79a5ce','Vedika','Kem',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-12-24 09:49:55','2025-12-24 09:49:55'),('872e4545-68b0-4d01-b88b-9c4c21d56ac2','dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','Rohini','Saraf',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('8e86efa6-b0f3-11f0-a793-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','Shweta','Rao','2023-08-09','FEMALE','Street 12 , genesh road','near rbb','kalyan','DELHI','738274','INDIAN','/storage/uploads/profile_pictures/etK69q0pbveDErFD78vLtHQe6bqJnq4rXjlI1lca.jpg','Marathi alwaya','Marathi',NULL,NULL,'2025-10-24 16:07:36','2025-10-26 10:13:48'),('8ec383f0-33cc-4d42-b0bb-81315d2703e8','746d1f5c-168d-4eac-bd83-176c4b17ff97','Shiv','krishna',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('a5875ca4-dc75-4d78-8514-6a01ea498354','1aa313f1-8d7a-4399-9ba3-0b843cc54c32','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('aac428e5-317d-4f9d-9432-c89fe28cfa05','46a870ce-ecb6-4f96-90af-f4cad83035a3','Reshma','Kher',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-12-29 17:45:14','2025-12-29 17:45:14'),('b764dce3-ba04-4dd7-b09f-b838c57317a0','a0147168-d10e-4d15-ab59-988621d041d6','Rushi','Kam',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-01-07 22:51:42','2026-01-07 22:51:42'),('c2703147-707d-44ec-9c5e-49ba63c70c62','ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','Mahesh','Dal',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('ca0ad001-9eaf-4b24-838d-473e44c1e62e','0198a25a-bd59-710d-b405-661be7d47fa2','Duggi','Dugum','2025-09-17','FEMALE','any','no','ok','we','44444','cany','/storage/uploads/profile_pictures/WbWjtW0OFchPaNbcuXFsYVri1Misk6XJlRwWPvXG.jpg','ok','mn',NULL,NULL,'2025-08-15 17:59:43','2025-09-08 21:05:51'),('cfbdb4ce-03f4-4818-b9c8-55c766a5fabb','91fa5ce8-fb24-414a-933b-0d740340697e','Haseen','Julfhe',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('d886efeb-4ed0-442b-b3aa-c104c6e42354','6c7b2bbc-d104-422e-ab26-db53f0df9e5d','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('df8775d2-f53b-49f3-a9d2-ccdc0e8c85a0','019b1731-86c0-73d9-9e60-b2d9c76becea','NA','NA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-12-13 15:41:20','2025-12-13 15:41:20'),('f9cdef3d-5cc9-405f-8431-76b3c7f7a509','0199c4de-9651-70c1-8ef0-752c45ffdd4c','Rama','Karam','2025-10-09','MALE','Titwala','Manda','Thane','MH','421605','INDIA','/storage/uploads/profile_pictures/08zOgD8axEMAgwaRqKVOTIMfUXdiylzDRIXcowKU.jpg','I know it','HTML',NULL,NULL,'2025-10-08 22:59:05','2025-10-14 09:11:32');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `assigned_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  KEY `user_roles_assigned_by_foreign` (`assigned_by`),
  CONSTRAINT `user_roles_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','0198a25a-ba68-7365-a398-fe87aa5997c7','active',NULL,NULL,'2025-08-13 13:05:12','2025-08-13 13:05:12'),('0198a25a-bd59-710d-b405-661be7d47fa2','0199aa0b-8454-70f4-a975-48b260cd8c70','inactive',NULL,NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26'),('0199b840-6922-70d9-8060-3799a45a5e50','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-06 12:10:53','2025-10-06 12:10:53'),('0199b853-fb88-7040-a598-55d7e4d80bb9','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-06 12:32:15','2025-10-06 12:32:15'),('0199c4de-9651-70c1-8ef0-752c45ffdd4c','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-08 22:59:05','2025-10-08 22:59:05'),('019b1731-86c0-73d9-9e60-b2d9c76becea','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-12-13 15:41:20','2025-12-13 15:41:20'),('019b1731-86c0-73d9-9e60-b2d9c76becea','4992256f-ad09-11f0-80ba-0242ac110002','active',NULL,'2025-12-13 11:38:54','2025-12-13 11:38:54','2025-12-13 11:38:54'),('02b2a2f4-1890-445a-937f-6b88163a9e95','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:15:26','2025-11-30 19:15:26','2025-11-30 19:15:26'),('1aa313f1-8d7a-4399-9ba3-0b843cc54c32','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('46a870ce-ecb6-4f96-90af-f4cad83035a3','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-12-29 17:45:14','2025-12-29 17:45:14','2025-12-29 17:45:14'),('47b504c0-310b-4936-a888-294846434530','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-13 15:55:57','2025-11-13 15:55:57','2025-11-13 15:55:57'),('4eca6564-9fbf-45bb-b6d9-9ad0895ab01e','463ce2fd-ae38-11f0-a321-0242ac110002','active','019b1731-86c0-73d9-9e60-b2d9c76becea','2025-12-29 16:49:42','2025-12-29 16:49:42','2025-12-29 16:49:42'),('6bf87bd9-f7ec-4d4b-95d7-6b515bda00c6','463ce2fd-ae38-11f0-a321-0242ac110002','active','019b1731-86c0-73d9-9e60-b2d9c76becea','2025-12-13 17:48:09','2025-12-13 17:48:09','2025-12-13 17:48:09'),('6c7b2bbc-d104-422e-ab26-db53f0df9e5d','463ce2fd-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:38:43','2025-11-30 19:38:43','2025-11-30 19:38:43'),('746d1f5c-168d-4eac-bd83-176c4b17ff97','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-04 19:25:02','2025-11-04 19:25:02','2025-11-04 19:25:02'),('7c64a808-4f41-456b-aca0-ce225ce8b40b','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('91fa5ce8-fb24-414a-933b-0d740340697e','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:45:43','2025-11-26 16:45:43','2025-11-26 16:45:43'),('9dcc63e9-5212-4fdb-a216-f96fef09b90b','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('a0147168-d10e-4d15-ab59-988621d041d6','463ce2fd-ae38-11f0-a321-0242ac110002','active','019b1731-86c0-73d9-9e60-b2d9c76becea','2026-01-07 22:51:42','2026-01-07 22:51:42','2026-01-07 22:51:42'),('a19a0835-ada8-11f0-8b09-0242ac110002','0199aa0b-8454-70f4-a975-48b260cd8c70','active',NULL,'2025-10-23 13:35:40','2025-10-23 13:35:40','2025-10-23 13:35:40'),('a19a0835-ada8-11f0-8b09-0242ac110002','4634f256-ae38-11f0-a321-0242ac110002','active','0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-23 12:14:21','2025-10-23 12:14:21','2025-10-23 12:14:21'),('a19a0835-ada8-11f0-8b09-0242ac110002','463ce2fd-ae38-11f0-a321-0242ac110002','active',NULL,'2025-10-23 13:35:40','2025-10-23 13:35:40','2025-10-23 13:35:40'),('a19a0835-ada8-11f0-8b09-0242ac110002','4992256f-ad09-11f0-80ba-0242ac110002','active','0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-20 11:51:42','2025-10-20 11:51:42','2025-10-20 11:51:42'),('c1bea9dc-5916-4b72-b1f5-7fc7ca79a5ce','463ce2fd-ae38-11f0-a321-0242ac110002','active','019b1731-86c0-73d9-9e60-b2d9c76becea','2025-12-24 09:49:55','2025-12-24 09:49:55','2025-12-24 09:49:55'),('d45958e5-2fd3-4752-9291-9ca8b889fec4','463ce2fd-ae38-11f0-a321-0242ac110002','active','019b1731-86c0-73d9-9e60-b2d9c76becea','2026-01-07 15:55:48','2026-01-07 15:55:48','2026-01-07 15:55:48'),('dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:45:05','2025-11-21 19:45:05','2025-11-21 19:45:05'),('ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:11','2025-11-21 19:54:11','2025-11-21 19:54:11'),('f0f912a8-156c-442a-bdfd-92c796884238','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:49','2025-11-21 19:54:49','2025-11-21 19:54:49'),('f3a2013a-79da-4259-b0ba-ec9d238a650c','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:53:50','2025-11-26 16:53:50','2025-11-26 16:53:50');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','FirstUser','fu@gmail.com',NULL,'fu','$2y$12$eQAfWSDE5iqwDrjxfJ6S8eVQOZpGdLWVOSIMkj6yKzEwgFWekNYGK',NULL,'2025-08-13 13:05:12','2025-08-13 13:14:58'),('0198cc3c-6b37-7144-b0b7-309ccdff7070','vasudev','vasudev@world.protect',NULL,'krishna','$2y$12$OofLKLjq4z0TfWkLk7m75ubomTYrpFlcU1NmhCinEbZuU.NeRwP3C','tbGIQ1QeGVFLbh2ZL3EMEFPUXAaB5W914b4MizR62Zmjry2b7TiLtfjIxoVS','2025-08-21 16:16:08','2025-10-04 07:34:02'),('0199a9cf-ec62-71c9-8f9b-4bff7035ac1c','Mayur Nilesh Barhate','ABC@GMAIL.COM',NULL,'SunitaCH','1234567890',NULL,'2025-10-03 16:53:20','2025-10-03 16:53:20'),('0199a9d0-a272-7157-a4df-a62cf48ac139','Rohan','Rohan@123.com',NULL,'Rohan','1234567890',NULL,'2025-10-03 16:54:06','2025-10-03 16:54:06'),('0199a9de-e8ec-7241-b016-f3d3de613f24','Mayur Nilesh Barhate','Mayur@Barhate.com',NULL,'Mayur','$2y$12$qBWHESj6IhQJ0PzGRLxyAeyzJlJwweb9HjW7fqXMdSjJlKTn2v5Li',NULL,'2025-10-03 17:09:42','2025-10-03 17:09:42'),('0199a9ea-79c4-7087-bf68-8f38afc13b0b','Mayur Nilesh Barhate','Mayur@BIG.com',NULL,'MayurCEO','$2y$12$08O05AF0xVjkoclW2af//ujwGXe6ahTLqcAHn3JnmVo04NwJJ1LxW',NULL,'2025-10-03 17:22:20','2025-10-03 17:22:20'),('0199a9f3-6fdb-7271-8036-136751697044','Mayur Nilesh Barhate','Mayur@gmail.com',NULL,'MayurEMP','$2y$12$fqBNOJ.201ik3gBWOeVP6e.Vue3mSSbsNqIH/TIe9FA3GHcOA288y',NULL,'2025-10-03 17:32:07','2025-10-03 17:32:07'),('0199a9f8-b372-71a3-838c-f254cbad7c74','Sunita','Suninta@gmail.com',NULL,'Sunita','$2y$12$oMUXQ3Aa4EGs8OzaQOIN0uBu7sbFfI9tgm1jn5W6CeNXBZskeKk3e',NULL,'2025-10-03 17:37:52','2025-10-03 17:37:52'),('0199a9ff-b07e-71c5-af3b-46834f15e039','Kajal','Kajal@gmail.com',NULL,'Kajal','$2y$12$NwsP0MyVw0Z3vtk8PmrYm.QlKkuZ4MrTi29eAc8lm441BVX6eu/JG',NULL,'2025-10-03 17:45:30','2025-10-06 12:03:55'),('0199aa0b-86aa-713b-af7b-f4fa083d4346','MayurAdmin','mayurnb2003@gmail.com',NULL,'Admin','$2y$12$q8luGINumz7K7ohNmyZvO.KVskAbANxwv.fkEaIlBAZh31buvVFP6',NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26'),('0199adb9-fc0d-73a0-8e4d-a42beea3dc53','Rita','Rita@gmail.com',NULL,'Rita','$2y$12$Py4tOvxmC.2VUZLm4UvB4eyC/YjlhFtPdf94Z9t5wYbB9sdjsNTR2',NULL,'2025-10-04 11:07:51','2025-10-04 11:07:51'),('0199b840-6922-70d9-8060-3799a45a5e50','bard','bard@gmail.com',NULL,'Bard','$2y$12$uM/MCx3fyOMxpi0kFk.X.u64NHAs71Wl4QARC1VrIW4wR.71ZOJaK',NULL,'2025-10-06 12:10:53','2025-10-06 12:10:53'),('0199b853-fb88-7040-a598-55d7e4d80bb9','Shivam','Shivam@gmail.com',NULL,'Shivam','$2y$12$Kr26mUY3Qcqz5vjQXzmkne48GM/V/v5VnqyoZfZteLZqtFZ9Zv8tq',NULL,'2025-10-06 12:32:15','2025-10-06 12:32:15'),('0199c4de-9651-70c1-8ef0-752c45ffdd4c','Ramanuj','Ramanuj@gmail.com',NULL,'Rama','$2y$12$J/oxYB5Rk9ljGEopxs5ADegOSZiAOAvhKr3p2kuKl0PaPAMk2NA56',NULL,'2025-10-08 22:59:05','2025-10-08 22:59:05'),('019b1731-86c0-73d9-9e60-b2d9c76becea','Demo','demo@demo.com',NULL,'demo','$2y$12$4chbPW.iOJqW5F0w7m0vFupIDnsRt2Oa6TBBaUVC6MjFDPCjvoc6i',NULL,'2025-12-13 15:41:20','2025-12-13 15:41:20'),('02b2a2f4-1890-445a-937f-6b88163a9e95','Hitesh Ramami','hitech@ramami.com',NULL,'hitesh.ramami706','$2y$12$e7H4UjLASSTdfChVPXz7uO/ybOO6EYNmPd2xvs/FpLlHD9O7uAoFe',NULL,'2025-11-30 19:15:26','2025-11-30 19:15:26'),('1aa313f1-8d7a-4399-9ba3-0b843cc54c32','Nancy','Nancy@gamail.com',NULL,'Nancy','$2y$12$IZV1PbNKKckm2V.d6iCww.hK68/tqiO45BP9BuxM9Q2YS7neIVRO6',NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('46a870ce-ecb6-4f96-90af-f4cad83035a3','Reshma Kher','reshma@kher.com',NULL,'reshma.kher324','$2y$12$BZjiHpZodR4MnL1ZnBKDzOBvTkbMBol6LP772fR8VEwOcycHgsxNS',NULL,'2025-12-29 17:45:14','2025-12-29 17:45:14'),('47b504c0-310b-4936-a888-294846434530','Shivay Mahadev','Shivay@mahadev.com',NULL,'shivay.mahadev746','$2y$12$QCJ0SzXbTgE4wYs//mganeKmd8EQQqWvN8ESSnkuzZpqVh//sySJm',NULL,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('4eca6564-9fbf-45bb-b6d9-9ad0895ab01e','Shreya Ker','shreya@ker.com',NULL,'shreya.ker961','$2y$12$Xd14dAYTtaK.IAsy11RHsuSAQvB4gN7mb6j1ECFZM6I.if4jqdyaW',NULL,'2025-12-29 16:49:42','2025-12-29 16:49:42'),('6bf87bd9-f7ec-4d4b-95d7-6b515bda00c6','Demo Learner','demo@learner.com',NULL,'demo.learner485','$2y$12$qnqGja.w4sSmA36BphV20OxWAwQVuZ8.pN4eO0QrslSN6uJR0bVJa',NULL,'2025-12-13 17:48:09','2025-12-13 17:48:09'),('6c7b2bbc-d104-422e-ab26-db53f0df9e5d','Jak','Jak@gmail.com',NULL,'Jak','$2y$12$MLomqSVBn9zZ2TZJr/7AI.5aBELeXtAc0tk1vNdxSfm40uvft6Ev6',NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','Karanav Puti','karanav@puti.com',NULL,'karanav.puti592','$2y$12$GcQYx20iiAXlhPDjOgoCmOkTSoU1oCzMaZOzwFyAwI9dEGlXkUJ3.',NULL,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('746d1f5c-168d-4eac-bd83-176c4b17ff97','Shiv krishna','Shiva@krishna.com',NULL,'shiv.krishna266','$2y$12$ogOnJ4puOIqGw5tiAGe0Xu2yYhEcGOWA6GHym.L2e82q9Rm38EGfu',NULL,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('7c64a808-4f41-456b-aca0-ce225ce8b40b','John','John@gmail.com',NULL,'John','$2y$12$E6nMV1Sm2K.s6n9RsS1wKeChzOWX0cDnb3tPCQvHLKj0RW3r1iWu.',NULL,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('91fa5ce8-fb24-414a-933b-0d740340697e','Haseen Julfhe','haseen@julfhe.com',NULL,'haseen.julfhe825','$2y$12$RQsDbeC5aB8iMnZgkAm3rOGPJ36q9/jrQBaIG7OPOffVGB5Rk.L8y',NULL,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('9dcc63e9-5212-4fdb-a216-f96fef09b90b','merry','merry@gmail.com',NULL,'Merry','$2y$12$bdm0h229YtycDDaSVX4JdeTnMaNxJsK0nsdv6u3uTB4g5CokkuhPG',NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('a0147168-d10e-4d15-ab59-988621d041d6','Rushi Kam','rushi@kam.com',NULL,'rushi.kam497','$2y$12$Yl9RxWNJSsSWrnXox.lwFueFw3oHWUkDyjmbb0oEvqSTXXjvt90zK',NULL,'2026-01-07 22:51:42','2026-01-07 22:51:42'),('a19a0835-ada8-11f0-8b09-0242ac110002','shweta','shweta@gmail.com',NULL,'Shweta','$2y$12$eO5QYP8U28xKyGynMYJycOFEuhtaqcNsyL5RAqCusFrv4PNU46zVe',NULL,'2025-10-20 11:33:42','2025-10-20 11:33:42'),('c1bea9dc-5916-4b72-b1f5-7fc7ca79a5ce','Vedika Kem','vedika@kem.com',NULL,'vedika.kem359','$2y$12$yev6.yMG5sCoPE4r00U3/O2aiLYIAd5nRCpnC62JwEYIHw/KIYXam',NULL,'2025-12-24 09:49:55','2025-12-24 09:49:55'),('d45958e5-2fd3-4752-9291-9ca8b889fec4','Rushi Sam','rushi@sam.com',NULL,'rushi.sam492','$2y$12$shvnokVpE2AoVHKget83T.cfMRjz/0W2bQ86zfYJoQJNxSGNpLP7y',NULL,'2026-01-07 15:55:48','2026-01-07 15:55:48'),('dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','Rohini Saraf','rohini@saraf.com',NULL,'rohini.saraf637','$2y$12$lJoUHRO219ePAicHAb8fC.MSykaGDTRvFCOcTnB.ajjvEw79zYQiC',NULL,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('e0ee2c3d-3c93-4198-8374-707f4973186c','Roshan','Roshan@gmail.com',NULL,'Roshan','$2y$12$xXrH2xfj7GUL83f9tcJyl.v1zTouO901U9TZPdZG49aHR165dUd1y',NULL,'2025-10-22 10:00:21','2025-10-22 10:00:21'),('ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','Mahesh Dal','mahesh@dal.com',NULL,'mahesh.dal432','$2y$12$y/yRAbnnX3Ge0PrMXFNIB.QHqYg1zGX2qU/tzFJa2jpcoOLvmwEvG',NULL,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('f0f912a8-156c-442a-bdfd-92c796884238','Pankaj Bhor','pankaj@bhor.com',NULL,'pankaj.bhor996','$2y$12$XFwdNaOEXAFAFjhZSX134e/m/kCiPMe.0MyK8fNgq.I14kuKt6lIe',NULL,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('f3a2013a-79da-4259-b0ba-ec9d238a650c','Aditi Garv','aditi@garv',NULL,'aditi.garv865','$2y$12$FW9ZIL3UzTiiTpGMGR89o.upg0SawoPfkJdgz2QnNJJCCjYF3xI3y',NULL,'2025-11-26 16:53:50','2025-11-26 16:53:50');
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

-- Dump completed on 2026-01-08 17:08:24
