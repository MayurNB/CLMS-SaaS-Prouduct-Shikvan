-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `loggable_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loggable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_text` text COLLATE utf8mb4_unicode_ci,
  `file_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points_awarded` int DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timetable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('present','absent','late','excused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'absent',
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'document',
  `content_url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `normalized_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_published` tinyint NOT NULL DEFAULT '0',
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `courses_program_id_index` (`program_id`),
  KEY `courses_instructor_user_id_index` (`instructor_user_id`),
  KEY `courses_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `courses_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `courses_instructor_user_id_foreign` FOREIGN KEY (`instructor_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `courses_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('01998121-0f07-71b4-b862-4ab11f21a4cc','English',NULL,'Very usefull',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 19:17:31','2025-09-25 19:17:31'),('019985cf-cf59-70bc-a908-90774ab9240a','Social Science',NULL,'Important',NULL,0.00,1,'019985ce-a544-7162-8ac9-1c938f44f03c',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 17:06:52','2025-09-26 17:06:52'),('0199864a-e3e9-7086-9b98-be8ca19f9ec0','Math',NULL,'Advance',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:19','2025-09-26 19:21:19'),('0199864b-1f2b-73af-b575-7b5e7c29a2ee','Science',NULL,'Advance',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:34','2025-09-26 19:21:34'),('0199864b-6cdd-725a-bcaa-c33bc9a66b52','Computer',NULL,'Technology',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:54','2025-09-26 19:21:54'),('0199864b-e6f1-72de-8653-2377a10fcda8','History',NULL,'Past study',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:22:25','2025-09-26 19:22:25'),('0199864c-ad15-7322-bcb1-8fa022a9eb60','geography',NULL,'worldwide',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:23:16','2025-09-26 19:23:16'),('0199867b-a9aa-72d8-96ee-cced80e2ae10','HTML',NULL,'normalcode',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:14:35','2025-09-26 20:14:35'),('0199867f-9b6f-7091-aba0-aa8c32d7ec62','JS',NULL,'response',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:18:53','2025-09-26 20:18:53'),('01998680-1ee4-7160-9cec-452b5495cf56','php',NULL,'backend',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:19:27','2025-09-26 20:19:27'),('01998680-5c54-739e-b589-d0b5775f1a1c','mysql',NULL,'database',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:19:43','2025-09-26 20:19:43'),('01998680-c5b7-7059-aad8-383d245428de','python',NULL,'AIML',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:20:10','2025-09-26 20:20:10'),('01998681-db97-7212-a28c-95b045261ccc','Geomatric',NULL,'don\'t know',NULL,0.00,1,'a4f2df09-8366-487a-bbe5-b56f409c44ad',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:21:21','2025-09-26 20:21:21'),('01998f1e-dc86-72a5-84b9-5fe7fb019fe4','Biology',NULL,'for science program need it',NULL,0.00,1,'01998f1e-722a-7238-918f-98dcfd4e3070',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:29:48','2025-09-28 12:29:48'),('01998f22-00a1-7268-b040-be73f068387c','Biology',NULL,'for science program need it',NULL,0.00,1,'01998f1e-722a-7238-918f-98dcfd4e3070',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:33:14','2025-09-28 12:33:14'),('01998f5a-f46b-7015-833e-c755937e638b','MATH','math','math',NULL,0.00,1,'01998f59-871b-72d5-8f03-7ce20652b08a',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:35:26','2025-09-28 13:35:26'),('01998f5e-89a2-7049-9b6c-d0df26b1392f','ABC','abc','test',NULL,0.00,1,'01998f5e-35e6-73e7-804a-6ddb65a21a5f',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:39:21','2025-09-28 13:39:21'),('01998f68-5d6b-719b-889f-b1e3bcb8ad20','MATH','math','test',NULL,0.00,1,'01998f5e-35e6-73e7-804a-6ddb65a21a5f',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:50:05','2025-09-28 13:50:05'),('f89060e5-c694-4686-adec-7c540735c24b','Algebra',NULL,'linear and non-linear line number related stubject',NULL,0.00,1,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 18:21:36','2025-09-25 18:21:36');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts_offers`
--

DROP TABLE IF EXISTS `discounts_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts_offers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description_public` text COLLATE utf8mb4_unicode_ci,
  `description_internal` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `discounts_offers_program_id_index` (`program_id`),
  KEY `discounts_offers_course_id_index` (`course_id`),
  KEY `discounts_offers_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `discounts_offers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  CONSTRAINT `discounts_offers_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `discounts_offers_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts_offers`
--

LOCK TABLES `discounts_offers` WRITE;
/*!40000 ALTER TABLE `discounts_offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_consents`
--

DROP TABLE IF EXISTS `employer_consents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employer_consents` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Links to the employer profile that gave consent.',
  `consent_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g., terms_and_conditions, privacy_policy.',
  `consent_version` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The version of the legal document.',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Flag to confirm consent was given (1 = accepted).',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP address of the user at the time of consent.',
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_profile_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `industry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `settings` json DEFAULT NULL,
  `onboarded_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `employers_profiles` VALUES ('7abdb7e8-8101-42b3-9a90-11a03ba7713f','0199a9ff-b07e-71c5-af3b-46834f15e039','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:45:30','2025-10-03 17:45:30'),('b8e41aa8-0f38-4da5-905c-d87a8a521037','0199a9f3-6fdb-7271-8036-136751697044','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:32:07','2025-10-03 17:32:07'),('cb2cfad0-374e-439b-b424-8cac6f1a7fed','0198cc3c-6b37-7144-b0b7-309ccdff7070','Mahabharat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-08-22 21:54:19','2025-08-22 21:54:19');
/*!40000 ALTER TABLE `employers_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_papers`
--

DROP TABLE IF EXISTS `exam_papers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_papers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `points` int NOT NULL DEFAULT '1',
  `options` text COLLATE utf8mb4_unicode_ci,
  `correct_answer` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instructions` text COLLATE utf8mb4_unicode_ci,
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'one_time',
  `course_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institute_infos`
--

DROP TABLE IF EXISTS `institute_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institute_infos` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `institute_infos` VALUES ('1234','cb2cfad0-374e-439b-b424-8cac6f1a7fed','jay shree ram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.shutterstock.com/image-vector/lord-hanuman-graphic-trendy-design-600w-2214174237.jpg','https://hindubhagwan.com/Gallery/images/portfolio/full/small/lord_hanuman_angry_image.jpg',1,'2025-08-14 08:19:03','2025-09-08 05:39:58');
/*!40000 ALTER TABLE `institute_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `learner_catalog`
--

DROP TABLE IF EXISTS `learner_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `learner_catalog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `raw_learner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_fee_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'initial_entry',
  `learner_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `learner_catalog_user_id_index` (`user_id`),
  KEY `learner_catalog_created_by_index` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_catalog`
--

LOCK TABLES `learner_catalog` WRITE;
/*!40000 ALTER TABLE `learner_catalog` DISABLE KEYS */;
INSERT INTO `learner_catalog` VALUES (1,'Mayur','Mayur@2003.com','1234567890','MATH',1000.00,'initial_entry',NULL,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 10:23:10','2025-10-03 10:23:10'),(3,'Mayur','Mayur@2003.com','1234567891','English',1000.00,'initial_entry',NULL,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 11:51:12','2025-10-03 11:51:12'),(4,'Mayur','Mayur@2003.com','12345','Science',1000.00,'initial_entry',NULL,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:02:04','2025-10-03 12:02:04'),(6,'Mayur','Mayur@2003.com','0123456789','CSS',1000.00,'initial_entry',NULL,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:57:00','2025-10-03 12:57:00'),(7,'Mayur','Mayur@2003.com','1234567890','MATH',1000.00,'initial_entry',NULL,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:57:40','2025-10-03 12:57:40');
/*!40000 ALTER TABLE `learner_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_08_03_034432_create_users_and_auth_tables',1),(2,'2025_08_03_034700_create_failed_jobs_table',1),(3,'2025_08_03_034816_create_cache_table',1),(4,'2025_08_03_040308_create_user_profiles_table',1),(5,'2025_08_03_044721_create_product_version_histories_table',1),(6,'2025_08_03_044825_create_product_infos_table',1),(7,'2025_08_03_044940_create_packages_table',1),(8,'2025_08_03_045225_create_pricing_zones_table',1),(9,'2025_08_03_111247_create_permissions_table',1),(10,'2025_08_03_111402_create_roles_table',1),(11,'2025_08_03_112236_create_role_permissions_table',1),(12,'2025_08_03_112532_create_user_roles_table',1),(13,'2025_08_03_114016_create_employers_profiles_table',1),(14,'2025_08_03_114118_create_institute_infos_table',1),(15,'2025_08_03_114231_create_branches_table',1),(16,'2025_08_03_144532_create_programs_table',1),(17,'2025_08_03_144642_create_courses_table',1),(18,'2025_08_03_144800_create_contents_table',1),(19,'2025_08_03_150212_create_tags_table',1),(20,'2025_08_03_150328_create_program_tags_table',1),(21,'2025_08_03_150508_create_discounts_offers_table',1),(22,'2025_08_03_150621_create_program_prices_table',1),(23,'2025_08_04_050924_create_assignments_table',1),(24,'2025_08_04_051036_create_assignment_submissions_table',1),(25,'2025_08_04_053655_create_exams_table',1),(26,'2025_08_04_053802_create_exam_papers_table',1),(27,'2025_08_04_053858_create_results_table',1),(28,'2025_08_04_055721_create_timetables_table',1),(29,'2025_08_04_055831_create_attendances_table',1),(30,'2025_08_04_060955_create_subscriptions_table',1),(31,'2025_08_04_061111_create_payments_table',1),(32,'2025_08_04_061209_create_employer_payments_table',1),(33,'2025_08_04_061336_create_fees_table',1),(34,'2025_08_04_063541_create_communications_table',1),(35,'2025_08_04_063703_create_support_tickets_table',1),(36,'2025_08_04_063811_create_activity_logs_table',1),(37,'2025_08_04_064158_create_jobs_table',1),(38,'2025_08_04_064303_create_job_batches_table',1),(39,'2025_08_04_074342_create_personal_access_tokens_table',1),(40,'2025_08_06_101000_create_penalties_table',1),(41,'2025_08_23_163327_create_employer_consents_table',2),(42,'2025_08_31_105335_create_user_consents_table',3),(43,'2025_09_28_131351_add_normalized_name_to_programs_table',4),(44,'2025_09_28_131624_add_normalized_name_to_courses_table',4),(45,'2025_10_03_100801_create_learner_catalog_table',5),(46,'2025_10_03_120700_make_raw_phone_nullable_in_learner_catalog_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `package_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `payable_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penalties`
--

DROP TABLE IF EXISTS `penalties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penalties` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `permission_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `zone_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `current_version` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_of_service_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `privacy_policy_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `default_trial_days` int NOT NULL DEFAULT '0',
  `admin_contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `marketing_site_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `default_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `is_maintenance_mode` tinyint NOT NULL DEFAULT '0',
  `maintenance_message` text COLLATE utf8mb4_unicode_ci,
  `last_updated_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `release_date` date DEFAULT NULL,
  `released_by_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_notes` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_offer_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_notes` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `program_prices_program_id_index` (`program_id`),
  KEY `program_prices_course_id_index` (`course_id`),
  KEY `program_prices_discount_offer_id_index` (`discount_offer_id`),
  KEY `program_prices_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `program_prices_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `program_prices_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `program_prices_discount_offer_id_foreign` FOREIGN KEY (`discount_offer_id`) REFERENCES `discounts_offers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `program_prices_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_prices`
--

LOCK TABLES `program_prices` WRITE;
/*!40000 ALTER TABLE `program_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `program_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_tags`
--

DROP TABLE IF EXISTS `program_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program_tags` (
  `program_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
/*!40000 ALTER TABLE `program_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `normalized_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration_days` int DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `programs_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `programs_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES ('01998120-8d85-7392-beee-7e1f76f0adef','CLASS-10',NULL,'SSC LEVEL',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 19:16:58','2025-09-25 19:16:58'),('019985ce-a544-7162-8ac9-1c938f44f03c','CLASS-1st',NULL,'Class 1st standard start',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 17:05:36','2025-09-26 17:05:36'),('01998f1e-722a-7238-918f-98dcfd4e3070','Class-11th',NULL,'Science class 11th',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:29:21','2025-09-28 12:29:21'),('01998f20-0466-71ae-b9c4-c782ad290d81','Class-11th',NULL,'for science program need it',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:31:04','2025-09-28 12:31:04'),('01998f53-4c56-72bb-b767-33371a19d429','CLASS-X',NULL,'class x is important',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:27:04','2025-09-28 13:27:04'),('01998f53-c290-716d-bdcd-450d1ff0bd7b','CLASS-X',NULL,'test for normalize function',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:27:35','2025-09-28 13:27:35'),('01998f59-871b-72d5-8f03-7ce20652b08a','CLASS-Y','class-y','class Y is important',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:33:53','2025-09-28 13:33:53'),('01998f5e-35e6-73e7-804a-6ddb65a21a5f','CLASS-Z','class-z','test for normalize function',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:39:00','2025-09-28 13:39:00'),('a4f2df09-8366-487a-bbe5-b56f409c44ad','MATH',NULL,'MATH 12th',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 17:41:00','2025-09-25 17:41:00'),('ec0f36b0-5d0c-41ac-8d10-91846f262324','MATH11',NULL,'MATH CLASS 11th',NULL,0,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 17:57:13','2025-09-25 17:57:13');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_points` int DEFAULT NULL,
  `points_awarded` int DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `level` int DEFAULT NULL,
  `dashboard_route_name` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `roles` VALUES ('0198a25a-ba68-7365-a398-fe87aa5997c7',NULL,'Admin','Administrator','Super Administrator with full system access.',0,NULL,'adminDashboard','Active',NULL,'2025-08-13 13:05:11','2025-08-13 08:26:32'),('0198a25a-bab4-7182-9498-c8a765d92932',NULL,'Employer','Employer','Employer Role means client account',0,NULL,'employerDashboard','Active',NULL,'2025-08-13 13:05:11','2025-09-24 05:51:14'),('0199aa0b-8454-70f4-a975-48b260cd8c70',NULL,'SystemEmployer','System Employer','Responsible for maintaining client-side control.',0,NULL,NULL,'Active',NULL,'2025-10-03 17:58:25','2025-10-03 17:58:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('1079DRm7q2Cv2g6DbTxgjIPL4ztKzYD7AlNNvC7D','0198cc3c-6b37-7144-b0b7-309ccdff7070','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUtHNUFCbVYxcGF0TVRLcGdvYURNUkxkU1ZlRktQMWpmOVVERzZuOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9FbXBsb3llci9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiMDE5OGNjM2MtNmIzNy03MTQ0LWIwYjctMzA5Y2NkZmY3MDcwIjt9',1759499235),('cghwJsA4jwonSd0ju1C5f1dc3m8FgifuiYhHOU07',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEpWckRIbDF3eWJScHlhZkpwRjlBekFvbkpVNUtEdGtNYXpBSzE3WSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL29uYm9hcmQtZW1wbG95ZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL29uYm9hcmQtZW1wbG95ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1759482316),('OBTeUey4eFiPVwPPlhk6tCwt6vcLfscS79Bbhzwf',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY2VORG91bXRUNDg1OHVpa0c0MFJVTmxMY2NmajE4U2ltOUlwUEQ1SCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL0VtcGxveWVyL0xlYXJuZXIlMjBFbnJvbGxtZW50Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9FbXBsb3llci9MZWFybmVyJTIwRW5yb2xsbWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1759468869),('yAyMxBDCKmiqu2posDioY3hRJQblFcxOHfYOUpuR','0199a9ff-b07e-71c5-af3b-46834f15e039','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOXVEdmdvRlp6Q1lMbXMwRVZzZjd1UVVnZERzRWFTbHZBZjdJWVJNbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9FbXBsb3llci9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiMDE5OWE5ZmYtYjA3ZS03MWM1LWFmM2ItNDY4MzRmMTVlMDM5Ijt9',1759499131);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_profile_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initiated_by_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_frequency` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_to_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by_user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`),
  KEY `tags_created_by_user_id_index` (`created_by_user_id`),
  CONSTRAINT `tags_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetables` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_of_week` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_user_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `user_consents`
--

DROP TABLE IF EXISTS `user_consents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_consents` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Links to the user that gave consent.',
  `consent_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g., terms_and_conditions, privacy_policy.',
  `consent_version` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The version of the legal document.',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Flag to confirm consent was given (1 = accepted).',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'IP address of the user at the time of consent.',
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `preferred_language` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `user_profiles` VALUES ('ca0ad001-9eaf-4b24-838d-473e44c1e62e','0198a25a-bd59-710d-b405-661be7d47fa2','Duggi','Dugum','2025-09-17','FEMALE','any','no','ok','we','44444','cany','/storage/uploads/profile_pictures/WbWjtW0OFchPaNbcuXFsYVri1Misk6XJlRwWPvXG.jpg','ok','mn',NULL,NULL,'2025-08-15 17:59:43','2025-09-08 21:05:51');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `assigned_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `user_roles` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','0198a25a-ba68-7365-a398-fe87aa5997c7','active',NULL,NULL,'2025-08-13 13:05:12','2025-08-13 13:05:12'),('0198a25a-bd59-710d-b405-661be7d47fa2','0199aa0b-8454-70f4-a975-48b260cd8c70','inactive',NULL,NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26'),('0198cc3c-6b37-7144-b0b7-309ccdff7070','0198a25a-bab4-7182-9498-c8a765d92932','active',NULL,NULL,'2025-08-13 13:05:12','2025-08-13 13:05:12'),('0199a9ff-b07e-71c5-af3b-46834f15e039','0198a25a-bab4-7182-9498-c8a765d92932','active','0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:45:30','2025-10-03 17:45:30','2025-10-03 17:45:30');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `users` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','FirstUser','fu@gmail.com',NULL,'fu','$2y$12$eQAfWSDE5iqwDrjxfJ6S8eVQOZpGdLWVOSIMkj6yKzEwgFWekNYGK',NULL,'2025-08-13 13:05:12','2025-08-13 13:14:58'),('0198cc3c-6b37-7144-b0b7-309ccdff7070','vasudev','vasudev@world.protect',NULL,'krishna','$2y$12$OofLKLjq4z0TfWkLk7m75ubomTYrpFlcU1NmhCinEbZuU.NeRwP3C','d9MLGJMuFRpQAcQKbKsIjQD3sCBTpX9pFqrw4CPaz4B9if7m8cnMk4nY6zUm','2025-08-21 16:16:08','2025-09-02 08:04:56'),('0199a9cf-ec62-71c9-8f9b-4bff7035ac1c','Mayur Nilesh Barhate','ABC@GMAIL.COM',NULL,'SunitaCH','1234567890',NULL,'2025-10-03 16:53:20','2025-10-03 16:53:20'),('0199a9d0-a272-7157-a4df-a62cf48ac139','Rohan','Rohan@123.com',NULL,'Rohan','1234567890',NULL,'2025-10-03 16:54:06','2025-10-03 16:54:06'),('0199a9de-e8ec-7241-b016-f3d3de613f24','Mayur Nilesh Barhate','Mayur@Barhate.com',NULL,'Mayur','$2y$12$qBWHESj6IhQJ0PzGRLxyAeyzJlJwweb9HjW7fqXMdSjJlKTn2v5Li',NULL,'2025-10-03 17:09:42','2025-10-03 17:09:42'),('0199a9ea-79c4-7087-bf68-8f38afc13b0b','Mayur Nilesh Barhate','Mayur@BIG.com',NULL,'MayurCEO','$2y$12$08O05AF0xVjkoclW2af//ujwGXe6ahTLqcAHn3JnmVo04NwJJ1LxW',NULL,'2025-10-03 17:22:20','2025-10-03 17:22:20'),('0199a9f3-6fdb-7271-8036-136751697044','Mayur Nilesh Barhate','Mayur@gmail.com',NULL,'MayurEMP','$2y$12$fqBNOJ.201ik3gBWOeVP6e.Vue3mSSbsNqIH/TIe9FA3GHcOA288y',NULL,'2025-10-03 17:32:07','2025-10-03 17:32:07'),('0199a9f8-b372-71a3-838c-f254cbad7c74','Sunita','Suninta@gmail.com',NULL,'Sunita','$2y$12$oMUXQ3Aa4EGs8OzaQOIN0uBu7sbFfI9tgm1jn5W6CeNXBZskeKk3e',NULL,'2025-10-03 17:37:52','2025-10-03 17:37:52'),('0199a9ff-b07e-71c5-af3b-46834f15e039','Kajal','Kajal@gmail.com',NULL,'Kajal','$2y$12$lb76pBZWiIPM4sCCtovoHOPjDXMqZFz7CFIFkivXLw5i7TkfcRp8S',NULL,'2025-10-03 17:45:30','2025-10-03 17:45:30'),('0199aa0b-86aa-713b-af7b-f4fa083d4346','MayurAdmin','mayurnb2003@gmail.com',NULL,'Admin','$2y$12$q8luGINumz7K7ohNmyZvO.KVskAbANxwv.fkEaIlBAZh31buvVFP6',NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26');
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

-- Dump completed on 2025-10-04  4:32:31
