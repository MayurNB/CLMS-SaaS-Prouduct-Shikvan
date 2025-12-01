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
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `branches` VALUES ('423b46ea-f3d8-470b-b679-3b60f9db17a7','2559a851-a77e-11f0-b33d-0242ac110002','17th coaching class','katar','dadar','mh','738265','ind','Mayur141@gmail.com','1234567890',1,'2025-10-14 11:45:38','2025-10-14 16:27:08'),('63684590-2270-44b7-af3c-44cc4f05317c','2559a851-a77e-11f0-b33d-0242ac110002','11th coaching class','Street 12 , genesh road','Titwala','GU','124253','IND','Mayur122@gmail.com','1234567890',1,'2025-10-14 11:42:03','2025-10-14 16:29:29'),('93bf3910-2ac3-4e83-ba38-f9ef6f56dbe6','2559a851-a77e-11f0-b33d-0242ac110002','18th coaching class','Palak nagar','Raver','MH','423305','IND','support@palak.com','1234577890',1,'2025-11-09 15:59:06','2025-11-09 16:00:14'),('b23c0c78-9030-44c1-a5a7-88564834c8d0','2559a851-a77e-11f0-b33d-0242ac110002','14th coaching class','jjj','thane','mh','421605','ind','Mayur13@gmail.com','1234567890',1,'2025-10-14 11:44:55','2025-10-14 11:44:55'),('c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2559a851-a77e-11f0-b33d-0242ac110002','10th coaching class','Street 12 , genesh road','Mumbai','MH','421605','IND','Mayur@gmail.com','1234567890',1,'2025-10-14 10:22:55','2025-10-14 10:22:55'),('c247da8f-338f-4215-924a-28f7f104a0aa','2559a851-a77e-11f0-b33d-0242ac110002','12th coaching class','gan','th','mh','7392','ind','Mayur11@gmail.com','1234567890',1,'2025-10-14 11:42:52','2025-10-14 11:42:52'),('d9bebee2-7894-43d2-b9a2-3041a811f644','2559a851-a77e-11f0-b33d-0242ac110002','13th coaching class','kkaka','thane','mahr','478374','IND','Mayur12@gmail.com','1234567890',1,'2025-10-14 11:44:15','2025-10-14 11:44:15'),('dd618b9d-a743-4810-9568-c0b8f093355a','2559a851-a77e-11f0-b33d-0242ac110002','16th coaching class','sfee','kh','jj','578579','afg','Mayur181@gmail.com','1234567890',0,'2025-10-14 12:16:29','2025-10-14 16:12:57');
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
INSERT INTO `courses` VALUES ('01998121-0f07-71b4-b862-4ab11f21a4cc','English',NULL,'Very usefull',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 19:17:31','2025-09-25 19:17:31'),('019985cf-cf59-70bc-a908-90774ab9240a','Social Science',NULL,'Important',NULL,0.00,1,'019985ce-a544-7162-8ac9-1c938f44f03c',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 17:06:52','2025-09-26 17:06:52'),('0199864a-e3e9-7086-9b98-be8ca19f9ec0','Math',NULL,'Advance',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:19','2025-09-26 19:21:19'),('0199864b-1f2b-73af-b575-7b5e7c29a2ee','Science',NULL,'Advance',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:34','2025-09-26 19:21:34'),('0199864b-6cdd-725a-bcaa-c33bc9a66b52','Computer',NULL,'Technology',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:21:54','2025-09-26 19:21:54'),('0199864b-e6f1-72de-8653-2377a10fcda8','History',NULL,'Past study',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:22:25','2025-09-26 19:22:25'),('0199864c-ad15-7322-bcb1-8fa022a9eb60','geography',NULL,'worldwide',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 19:23:16','2025-09-26 19:23:16'),('0199867b-a9aa-72d8-96ee-cced80e2ae10','HTML',NULL,'normalcode',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:14:35','2025-09-26 20:14:35'),('0199867f-9b6f-7091-aba0-aa8c32d7ec62','JS',NULL,'response',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:18:53','2025-09-26 20:18:53'),('01998680-1ee4-7160-9cec-452b5495cf56','php',NULL,'backend',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:19:27','2025-09-26 20:19:27'),('01998680-5c54-739e-b589-d0b5775f1a1c','mysql',NULL,'database',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:19:43','2025-09-26 20:19:43'),('01998680-c5b7-7059-aad8-383d245428de','python',NULL,'AIML',NULL,0.00,1,'01998120-8d85-7392-beee-7e1f76f0adef',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:20:10','2025-09-26 20:20:10'),('01998681-db97-7212-a28c-95b045261ccc','Geomatric',NULL,'don\'t know',NULL,0.00,1,'a4f2df09-8366-487a-bbe5-b56f409c44ad',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 20:21:21','2025-09-26 20:21:21'),('01998f1e-dc86-72a5-84b9-5fe7fb019fe4','Biology',NULL,'for science program need it',NULL,0.00,1,'01998f1e-722a-7238-918f-98dcfd4e3070',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:29:48','2025-09-28 12:29:48'),('01998f22-00a1-7268-b040-be73f068387c','Biology',NULL,'for science program need it',NULL,0.00,1,'01998f1e-722a-7238-918f-98dcfd4e3070',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:33:14','2025-09-28 12:33:14'),('01998f5a-f46b-7015-833e-c755937e638b','MATH','math','math',NULL,0.00,1,'01998f59-871b-72d5-8f03-7ce20652b08a',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:35:26','2025-09-28 13:35:26'),('01998f5e-89a2-7049-9b6c-d0df26b1392f','ABC','abc','test',NULL,0.00,1,'01998f5e-35e6-73e7-804a-6ddb65a21a5f',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:39:21','2025-09-28 13:39:21'),('01998f68-5d6b-719b-889f-b1e3bcb8ad20','MATH','math','test',NULL,0.00,1,'01998f5e-35e6-73e7-804a-6ddb65a21a5f',NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:50:05','2025-09-28 13:50:05'),('0199ebd7-e5bd-72bc-9667-81d103bc8644','Webx','webx','html,css,js','http',1000.00,1,'0199ebd7-e4e1-7021-9b44-ea89d5cbab1b',NULL,'0199c4de-9651-70c1-8ef0-752c45ffdd4c','2025-10-16 12:36:58','2025-10-16 12:36:58'),('0199ed4f-d2ed-710c-adce-2cc33a6899d9','PHP','php','PHP',NULL,0.00,1,'0199ed4f-d23d-7288-9b78-f2cfffba47c7',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:27:35','2025-10-16 19:27:35'),('0199fcd4-bbea-71f5-bc45-3306b6d95a51','marathi','marathi','mother',NULL,0.00,1,'0199fcd4-bb0a-713c-9fe2-0eb6d9403d06',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fcd4-bc10-7356-aa1c-f7bd1661868c','english','english','nothing',NULL,0.00,1,'0199fcd4-bb0a-713c-9fe2-0eb6d9403d06',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fff8-0c14-7024-a58f-10fd5410a8c1','physics','physics','eveyrhting',NULL,0.00,1,'0199fff8-0b50-738a-b636-ea5f3be428b3',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:24:30','2025-10-20 10:24:30'),('0199fff9-14cc-73dc-b15d-04560e783ef3','chemistry','chemistry','ok',NULL,0.00,1,'0199fff9-14b1-7123-8fb2-a5129f153396',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:25:37','2025-10-20 10:25:37'),('019a293d-f8bf-7232-8166-26bec22d149d','Model','model','make model',NULL,0.00,1,'019a293d-f75d-715f-a451-5413309ac135',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-28 10:45:18','2025-10-28 10:45:18'),('019a3a4f-b71e-71e9-8f5f-92bb1d457c7a','IP','ip','main',NULL,0.00,1,'019a3a4f-b651-73d7-984e-d39ffe6d3cc3',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 18:18:14','2025-10-31 18:18:14'),('019a3a87-4449-7370-a6a2-c31459499f2c','DBMS','dbms','Data',NULL,0.00,1,'019a3a87-42f3-7224-9067-94260cce605c',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3a87-4482-7372-afe8-9098b7502ce2','Adbm','adbm','data',NULL,0.00,1,'019a3a87-42f3-7224-9067-94260cce605c',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3b6e-61e2-705c-81b7-360fde0fce03','Stock 1','stock1','market','httpsmarketstock',0.00,1,'019a3b6e-61a7-7349-b9db-9b75f814c581',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:31:21','2025-10-31 23:31:21'),('019a3b6e-61f8-713b-9f61-f0152c7cac01','Stock 2','stock2','stake','httpsmarketstake',0.00,1,'019a3b6e-61a7-7349-b9db-9b75f814c581',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:31:21','2025-10-31 23:31:21'),('019a3f88-e259-7076-acdb-b26db6bceb73','course of program 1','courseofprogram1','course program 1','https programs ocurses',0.00,1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 18:38:46'),('019a3f88-e27b-7047-b49e-2d8d25caa7fe','prorgam courses 2','prorgamcourses2','programs courses 2','https',0.00,1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:02'),('019a3fa5-7fa4-72a6-9917-3740a04ad9c8','programs courses 3','programscourses3','program courses 3',NULL,0.00,1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 19:10:02','2025-11-01 19:10:02'),('019a6335-d1dd-7060-be58-a8c2d74a23b3','Github','github','Github are the consider it contain the code to always make it the gcp and stuffs can be use it','https',1000.00,1,'019a6335-d0d9-7074-ab7b-64146e5802ec',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22'),('019a6335-d1f1-7071-9f70-6f63878e7548','AWS','aws','AWS it\'s cloud server to have massive scale in the scale of cloud to maintain the stuffs it\'s that can be use it','https',1000.00,1,'019a6335-d0d9-7074-ab7b-64146e5802ec',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22'),('f89060e5-c694-4686-adec-7c540735c24b','Algebra',NULL,'linear and non-linear line number related stubject',NULL,0.00,1,NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 18:21:36','2025-09-25 18:21:36');
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
INSERT INTO `discounts_offers` VALUES ('0199ed4c-e1e5-7007-ab5a-75f19449e7fa','Diwali',NULL,NULL,'0',0.00,NULL,NULL,1,'0199ed4c-e176-7149-a74e-3b29f3a79330',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:24:22','2025-10-16 19:24:22'),('0199ed4f-d2c6-7163-9942-90d50f66948f','Diwali',NULL,NULL,'0',0.00,NULL,NULL,1,'0199ed4f-d23d-7288-9b78-f2cfffba47c7',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:27:35','2025-10-16 19:27:35'),('0199fcd4-bbb7-7321-bbcd-ad0f471e22fa','everything',NULL,NULL,'0',0.00,NULL,NULL,1,'0199fcd4-bb0a-713c-9fe2-0eb6d9403d06',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fff8-0bf0-7234-9eb3-efd1e223adca','asit',NULL,NULL,'0',0.00,NULL,NULL,1,'0199fff8-0b50-738a-b636-ea5f3be428b3',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:24:30','2025-10-20 10:24:30'),('019a293d-f88b-70f4-8a84-d7795bb794fd','today only',NULL,NULL,'0',0.00,NULL,NULL,1,'019a293d-f75d-715f-a451-5413309ac135',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-28 10:45:18','2025-10-28 10:45:18'),('019a3a4f-b6ea-7242-a67e-81ac855901b1','Diwali',NULL,NULL,'0',0.00,NULL,NULL,1,'019a3a4f-b651-73d7-984e-d39ffe6d3cc3',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 18:18:14','2025-10-31 18:18:14'),('019a3a87-43ee-71f4-909d-8f219096aa6d','Sessional',NULL,NULL,'0',0.00,NULL,NULL,1,'019a3a87-42f3-7224-9067-94260cce605c',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3b62-ccb4-7130-b431-2dc520821437','Stock expert 4 d1','s e 4 d 1','s e 4 d 1','normal',2.00,'2025-10-31','2025-11-01',1,'019a3b62-cc78-7109-b06a-346799f35694',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:18:42','2025-10-31 23:18:42'),('019a3b62-ccd0-7220-94d9-845480fa8069','stock expert 5 d2','s e 5 d 2','s e 5 d 2','extra normal',4.00,'2025-10-31','2025-11-01',1,'019a3b62-cc78-7109-b06a-346799f35694',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:18:42','2025-10-31 23:18:42'),('019a3f88-e21b-7240-b90e-47dadf24e598','program discount','program discount','program discount','0',2.00,'2025-11-01','2025-11-03',1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:01'),('019a3f88-e235-71dd-a080-315301fc528e','program discount 2','program discount 2','program discount 2','0',4.00,'2025-11-01','2025-11-04',1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:01'),('019a3fa5-7f6a-71ef-9ae1-3f518c49e5db','program discount 3',NULL,NULL,'0',6.00,NULL,NULL,1,'019a3f88-e10b-73da-8258-9a01e85ff35d',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 19:10:02','2025-11-01 19:10:02'),('019a6335-d1b4-7146-b3db-626d1d6bde44','Engineer Programs only','Only Engineer based the stuffs it use for the discount on use it','scope in market it','Technology on Discount',3.00,'2025-11-08','2025-11-22',1,'019a6335-d0d9-7074-ab7b-64146e5802ec',NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22'),('30da3968-ba08-4c22-adc4-3dd35672e270','Diwali2025','offer','revenu','normal',10.00,'2025-10-16','2025-10-31',1,'0199ebd7-e4e1-7021-9b44-ea89d5cbab1b',NULL,'0199c4de-9651-70c1-8ef0-752c45ffdd4c','2025-10-16 12:36:58','2025-10-16 12:36:58');
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
INSERT INTO `employers_profiles` VALUES ('0ea675ef-e6e8-49a7-9137-ac3ab2c6e4fa','0199c4de-9651-70c1-8ef0-752c45ffdd4c','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-08 22:59:05','2025-10-08 22:59:05'),('396aa0f8-01ad-44bd-93b7-86316178404e','0199b840-6922-70d9-8060-3799a45a5e50','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-06 12:10:53','2025-10-06 12:10:53'),('5971a166-0dfa-4df8-962d-68ad8c01f0e8','0199adb9-fc0d-73a0-8e4d-a42beea3dc53','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-04 11:07:51','2025-10-04 11:07:51'),('7abdb7e8-8101-42b3-9a90-11a03ba7713f','0199a9ff-b07e-71c5-af3b-46834f15e039','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:45:30','2025-10-03 17:45:30'),('b8e41aa8-0f38-4da5-905c-d87a8a521037','0199a9f3-6fdb-7271-8036-136751697044','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-03 17:32:07','2025-10-03 17:32:07'),('cb2cfad0-374e-439b-b424-8cac6f1a7fed','0198cc3c-6b37-7144-b0b7-309ccdff7070','Mahabharat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-08-22 21:54:19','2025-08-22 21:54:19'),('ef671f6e-f3ca-457d-a65d-1741cf2ec944','0199b853-fb88-7040-a598-55d7e4d80bb9','N/A','General',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-06 12:32:15','2025-10-06 12:32:15');
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
INSERT INTO `enrolled_courses` VALUES ('12fa2243-b791-4396-9b7d-f885756fe151','c822ddb8-76f2-405b-afec-d3121626665e','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-26 17:14:15','2025-11-26 17:14:15'),('3c0b8ea4-1f7d-4d93-8861-68942e24a60f','6059d93a-4e60-46ba-b97a-42f94a7d66e7','019a3f88-e259-7076-acdb-b26db6bceb73','in_progress','2025-11-30 19:34:51','2025-11-30 19:34:51'),('41bc596a-7b18-4747-862e-d4622ba3e727','466a53ac-266f-465c-9cb7-c2104fe9cd47','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-30 19:17:05','2025-11-30 19:17:05'),('5f23c853-6c03-431a-89e5-cf71c4d9192a','c7eb2725-4d6c-4a81-8a87-8850bd4c4654','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-21 19:45:37','2025-11-21 19:45:37'),('64b98286-0e7b-4ca5-9584-bcb7252d212b','e23e69ef-4914-435d-b175-a2b83faf8781','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-21 19:55:47','2025-11-21 19:55:47'),('7d778075-e70f-4ee3-a62b-4c2d60d89006','d9fd371a-c0dd-4a50-9cf4-248a616dd2d2','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-13 16:08:33','2025-11-13 16:08:33'),('7d955f2f-caa3-4515-bd83-f8745e838455','c6b0d3f3-4c83-4d71-969a-6f74e4b74d8c','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-21 19:55:23','2025-11-21 19:55:23'),('82238f22-8979-4d4a-9d80-b2a26064a039','7328c1d7-5561-4cdd-bedf-f8b591100c3c','019a6335-d1f1-7071-9f70-6f63878e7548','deactive','2025-11-26 17:07:03','2025-11-30 18:35:45'),('95f58b19-b4ab-4be0-88c0-c3ff04296fa4','cf68bff5-1e46-464f-95b9-c1a85b7c387a','019a3f88-e259-7076-acdb-b26db6bceb73','in_progress','2025-11-30 19:47:07','2025-11-30 19:47:07'),('97e9241d-5c06-4d22-8e76-b5f71ced7766','7328c1d7-5561-4cdd-bedf-f8b591100c3c','019a6335-d1dd-7060-be58-a8c2d74a23b3','deactive','2025-11-26 17:07:03','2025-11-30 18:35:45'),('a3497747-caf9-4de1-9cca-f720a80aa0e7','d9fd371a-c0dd-4a50-9cf4-248a616dd2d2','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-13 16:08:33','2025-11-13 16:08:33'),('a36063b5-427b-4832-9bb0-c50dda793930','6d82d6b0-ca20-4a9e-bc5e-efa2216e66f2','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-30 19:39:07','2025-11-30 19:39:07'),('b46eb471-e140-4943-8cff-ddc645e7d56f','c822ddb8-76f2-405b-afec-d3121626665e','019a6335-d1dd-7060-be58-a8c2d74a23b3','in_progress','2025-11-26 17:14:15','2025-11-26 17:14:15'),('c16bb026-699d-4727-b089-3ecf386257ed','6d82d6b0-ca20-4a9e-bc5e-efa2216e66f2','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-30 19:39:07','2025-11-30 19:39:07'),('c85f8593-98c2-4365-a515-8816cdc7cf49','466a53ac-266f-465c-9cb7-c2104fe9cd47','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-30 19:17:05','2025-11-30 19:17:05'),('e983e199-b5f5-4675-b564-7f1cf237c161','e5028853-306e-4c8a-928a-717c2beb328a','019a6335-d1f1-7071-9f70-6f63878e7548','in_progress','2025-11-15 17:00:03','2025-11-15 17:00:03');
/*!40000 ALTER TABLE `enrolled_courses` ENABLE KEYS */;
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
INSERT INTO `enrollment_discounts` VALUES ('466a53ac-266f-465c-9cb7-c2104fe9cd47','019a6335-d1b4-7146-b3db-626d1d6bde44',660.00,'2025-11-30','2025-11-30 19:21:19','2025-11-30 19:21:19'),('6059d93a-4e60-46ba-b97a-42f94a7d66e7','019a6335-d1b4-7146-b3db-626d1d6bde44',30.00,'2025-11-30','2025-11-30 19:35:56','2025-11-30 19:35:56'),('6d82d6b0-ca20-4a9e-bc5e-efa2216e66f2','019a6335-d1b4-7146-b3db-626d1d6bde44',660.00,'2025-11-30','2025-11-30 19:40:20','2025-11-30 19:40:20'),('7328c1d7-5561-4cdd-bedf-f8b591100c3c','019a6335-d1b4-7146-b3db-626d1d6bde44',660.00,'2025-11-26','2025-11-26 17:10:56','2025-11-26 17:10:56'),('c6b0d3f3-4c83-4d71-969a-6f74e4b74d8c','019a6335-d1b4-7146-b3db-626d1d6bde44',630.00,'2025-11-21','2025-11-21 19:57:53','2025-11-21 19:57:53'),('c7eb2725-4d6c-4a81-8a87-8850bd4c4654','019a6335-d1b4-7146-b3db-626d1d6bde44',630.00,'2025-11-21','2025-11-21 19:47:16','2025-11-21 19:47:16'),('c822ddb8-76f2-405b-afec-d3121626665e','019a6335-d1b4-7146-b3db-626d1d6bde44',660.00,'2025-11-26','2025-11-26 17:21:28','2025-11-26 17:21:28'),('cf68bff5-1e46-464f-95b9-c1a85b7c387a','019a6335-d1b4-7146-b3db-626d1d6bde44',30.00,'2025-11-30','2025-11-30 19:48:11','2025-11-30 19:48:11'),('d9fd371a-c0dd-4a50-9cf4-248a616dd2d2','019a6335-d1b4-7146-b3db-626d1d6bde44',640.20,'2025-11-14','2025-11-14 23:42:36','2025-11-14 23:42:36'),('e23e69ef-4914-435d-b175-a2b83faf8781','019a6335-d1b4-7146-b3db-626d1d6bde44',630.00,'2025-11-21','2025-11-21 19:56:50','2025-11-21 19:56:50'),('e5028853-306e-4c8a-928a-717c2beb328a','019a6335-d1b4-7146-b3db-626d1d6bde44',630.00,'2025-11-15','2025-11-15 17:04:54','2025-11-15 17:04:54');
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
INSERT INTO `enrollment_fees` VALUES ('087450e8-44ad-4fdd-adbd-28473f21175e','e23e69ef-4914-435d-b175-a2b83faf8781',NULL,20370.00,370.00,630.00,NULL,NULL,'partial','2025-11-21 19:55:47','2025-11-21 19:56:50'),('0a35277d-afbc-4621-bf13-0e2b194817b6','e5028853-306e-4c8a-928a-717c2beb328a',NULL,20370.00,20370.00,630.00,NULL,NULL,'complete','2025-11-15 17:00:03','2025-11-15 17:04:54'),('2246c436-b41f-4984-9467-fe9850c551ec','6d82d6b0-ca20-4a9e-bc5e-efa2216e66f2',NULL,21340.00,2000.00,660.00,3000.00,'nothing just the relation of employer','partial','2025-11-30 19:39:07','2025-11-30 19:40:20'),('3dd886a0-703a-476e-9417-a752eb3e68a1','466a53ac-266f-465c-9cb7-c2104fe9cd47',NULL,21340.00,1000.00,660.00,1000.00,'nothing just credit from old enrollment cancle.','partial','2025-11-30 19:17:05','2025-11-30 19:21:19'),('5bac8452-b9f6-4d32-ac99-bac1918d7867','6059d93a-4e60-46ba-b97a-42f94a7d66e7',NULL,970.00,200.00,30.00,NULL,NULL,'partial','2025-11-30 19:34:51','2025-11-30 19:35:56'),('75e48931-6866-44c0-a5ec-990c4cdd0022','d9fd371a-c0dd-4a50-9cf4-248a616dd2d2',NULL,20699.80,20701.00,0.00,NULL,NULL,'complete','2025-11-13 16:08:33','2025-11-18 20:40:45'),('d25c7848-7166-47b0-9926-f112a7d24e63','cf68bff5-1e46-464f-95b9-c1a85b7c387a',NULL,970.00,100.00,30.00,300.00,'nothing just the relation of employer','partial','2025-11-30 19:47:08','2025-11-30 19:48:11'),('d90f98d8-60ee-4825-9deb-e3e6264b38e3','c822ddb8-76f2-405b-afec-d3121626665e',NULL,21340.00,9340.00,0.00,NULL,NULL,'partial','2025-11-26 17:14:15','2025-11-30 18:08:41'),('dd71a1dc-67ae-4d9e-9ecd-46d377635285','7328c1d7-5561-4cdd-bedf-f8b591100c3c',NULL,21340.00,21341.00,0.00,NULL,NULL,'lost','2025-11-26 17:07:03','2025-11-30 18:35:45'),('dec2fd89-a5c6-4b15-8f77-246443b4c280','c7eb2725-4d6c-4a81-8a87-8850bd4c4654',NULL,20370.00,370.00,630.00,NULL,NULL,'partial','2025-11-21 19:45:37','2025-11-21 19:47:16'),('fb158feb-5a78-4abe-8182-17758b258571','c6b0d3f3-4c83-4d71-969a-6f74e4b74d8c',NULL,20370.00,70.00,630.00,NULL,NULL,'lost','2025-11-21 19:55:23','2025-11-21 19:57:53');
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
INSERT INTO `enrollments` VALUES ('466a53ac-266f-465c-9cb7-c2104fe9cd47','75db0b05-1523-4562-894d-a510bb1b7cbf','019a6335-d0d9-7074-ab7b-64146e5802ec','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-30','active','2025-11-30 19:17:05','2025-11-30 19:17:05'),('6059d93a-4e60-46ba-b97a-42f94a7d66e7','75db0b05-1523-4562-894d-a510bb1b7cbf','019a3f88-e10b-73da-8258-9a01e85ff35d','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-30','active','2025-11-30 19:34:51','2025-11-30 19:34:51'),('6d82d6b0-ca20-4a9e-bc5e-efa2216e66f2','38042a81-789b-467f-bbec-3303b44b98cf','019a6335-d0d9-7074-ab7b-64146e5802ec','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-30','active','2025-11-30 19:39:07','2025-11-30 19:39:07'),('7328c1d7-5561-4cdd-bedf-f8b591100c3c','865235b5-f6f1-4807-b3a4-3ad3901135d7','019a6335-d0d9-7074-ab7b-64146e5802ec','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-26','deactive','2025-11-26 17:07:03','2025-11-30 18:35:45'),('c6b0d3f3-4c83-4d71-969a-6f74e4b74d8c','f6e6770f-8899-4cae-8498-5aecc353baca','019a6335-d0d9-7074-ab7b-64146e5802ec','63684590-2270-44b7-af3c-44cc4f05317c','2025-11-21','active','2025-11-21 19:55:23','2025-11-21 19:55:23'),('c7eb2725-4d6c-4a81-8a87-8850bd4c4654','6323502c-c054-4bca-9e67-c37f92db9c86','019a6335-d0d9-7074-ab7b-64146e5802ec','63684590-2270-44b7-af3c-44cc4f05317c','2025-11-21','active','2025-11-21 19:45:37','2025-11-21 19:45:37'),('c822ddb8-76f2-405b-afec-d3121626665e','b0b82d7d-d32e-408a-902d-8f3068e09018','019a6335-d0d9-7074-ab7b-64146e5802ec','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-26','active','2025-11-26 17:14:15','2025-11-26 17:14:15'),('cf68bff5-1e46-464f-95b9-c1a85b7c387a','38042a81-789b-467f-bbec-3303b44b98cf','019a3f88-e10b-73da-8258-9a01e85ff35d','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','2025-11-30','active','2025-11-30 19:47:06','2025-11-30 19:47:06'),('d9fd371a-c0dd-4a50-9cf4-248a616dd2d2','b784ea00-567d-40e0-8fc4-dac13d7a9cad','019a6335-d0d9-7074-ab7b-64146e5802ec','63684590-2270-44b7-af3c-44cc4f05317c','2025-11-13','active','2025-11-13 16:08:33','2025-11-13 16:08:33'),('e23e69ef-4914-435d-b175-a2b83faf8781','9ea24779-1648-43dd-adc2-013d37312503','019a6335-d0d9-7074-ab7b-64146e5802ec','63684590-2270-44b7-af3c-44cc4f05317c','2025-11-21','active','2025-11-21 19:55:47','2025-11-21 19:55:47'),('e5028853-306e-4c8a-928a-717c2beb328a','cea4d391-2ca0-488b-8258-ad8e9e97d3f8','019a6335-d0d9-7074-ab7b-64146e5802ec','63684590-2270-44b7-af3c-44cc4f05317c','2025-11-15','active','2025-11-15 17:00:03','2025-11-15 17:00:03');
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
INSERT INTO `institute_infos` VALUES ('1234','cb2cfad0-374e-439b-b424-8cac6f1a7fed','jay shree ram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.shutterstock.com/image-vector/lord-hanuman-graphic-trendy-design-600w-2214174237.jpg','https://hindubhagwan.com/Gallery/images/portfolio/full/small/lord_hanuman_angry_image.jpg',1,'2025-08-14 08:19:03','2025-09-08 05:39:58'),('2559a851-a77e-11f0-b33d-0242ac110002','0ea675ef-e6e8-49a7-9137-ac3ab2c6e4fa','Shree Education Institute','Leading institution for advanced learning','123 Knowledge Street','Pune','Maharashtra','411001','India','contact@shreeedu.com','+91-9876543210','https://example.com/shreeedu-logo.png','https://example.com/shreeedu-bg.png',1,'2025-10-12 15:14:28','2025-10-12 15:14:28');
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
INSERT INTO `learners` VALUES ('38042a81-789b-467f-bbec-3303b44b98cf','Karanav Puti','karanav@puti.com','1234567890','Enrolled','6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','LRN-5EP7YL','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:38:43','2025-11-30 19:48:11','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33'),('6323502c-c054-4bca-9e67-c37f92db9c86','Rohini Saraf','rohini@saraf.com','1234567890','Enrolled','dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','LRN-NZQXIU','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:45:05','2025-11-21 19:47:16',''),('75db0b05-1523-4562-894d-a510bb1b7cbf','Hitesh Ramami','hitech@ramami.com','1234567890','Enrolled','02b2a2f4-1890-445a-937f-6b88163a9e95','LRN-4MBSPL','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:15:26','2025-11-30 19:35:56','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33'),('865235b5-f6f1-4807-b3a4-3ad3901135d7','Haseen Julfhe','haseen@julfhe.com','1234567890','Enrolled','91fa5ce8-fb24-414a-933b-0d740340697e','LRN-RENW9G','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:45:43','2025-11-26 17:32:03',''),('9ea24779-1648-43dd-adc2-013d37312503','Pankaj Bhor','pankaj@bhor.com','1234567890','Enrolled','f0f912a8-156c-442a-bdfd-92c796884238','LRN-3PUNMY','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:49','2025-11-21 19:56:50',''),('b0b82d7d-d32e-408a-902d-8f3068e09018','Aditi Garv','aditi@garv','1234567890','Enrolled','f3a2013a-79da-4259-b0ba-ec9d238a650c','LRN-PMRKGQ','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:53:50','2025-11-30 18:08:41',''),('b784ea00-567d-40e0-8fc4-dac13d7a9cad','Shiv krishna','Shiva@krishna.com','1234567890','Enrolled','746d1f5c-168d-4eac-bd83-176c4b17ff97','LRN-O1YSRX','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-04 19:25:02','2025-11-18 20:40:45',''),('bed93690-b983-11f0-860b-0242ac110002','Mayur','Mayur@2003.com','1234567890','initial_entry',NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 10:23:10','2025-10-03 10:23:10',''),('bedb3b05-b983-11f0-860b-0242ac110002','Mayur','Mayur@2003.com','1234567891','initial_entry',NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 11:51:12','2025-10-03 11:51:12',''),('bedb8604-b983-11f0-860b-0242ac110002','Mayur','Mayur@2003.com','12345','initial_entry',NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:02:04','2025-10-03 12:02:04',''),('bedb8882-b983-11f0-860b-0242ac110002','Mayur','Mayur@2003.com','0123456789','initial_entry',NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:57:00','2025-10-03 12:57:00',''),('bedb8956-b983-11f0-860b-0242ac110002','Mayur','Mayur@2003.com','1234567890','initial_entry',NULL,NULL,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-10-03 12:57:40','2025-10-03 12:57:40',''),('bedb8a17-b983-11f0-860b-0242ac110002','Rukasha','Ruksha@gmail.com','1234567890','initial_entry',NULL,NULL,'0199adb9-fc0d-73a0-8e4d-a42beea3dc53','2025-10-04 11:09:34','2025-10-04 11:09:34',''),('bedb8ac8-b983-11f0-860b-0242ac110002','Roshan','Roshan@gmail.com','1234567890','initial_entry',NULL,NULL,'0199b853-fb88-7040-a598-55d7e4d80bb9','2025-10-06 12:34:32','2025-10-06 12:34:32',''),('bedb9b70-b983-11f0-860b-0242ac110002','Ritisha','Ritisha@gupta.com','1234567890','initial_entry',NULL,NULL,'0199b853-fb88-7040-a598-55d7e4d80bb9','2025-10-06 12:46:34','2025-10-06 12:46:34',''),('bedb9d2c-b983-11f0-860b-0242ac110002','Ravan','Ravan@gmail.com','1234567890','initial_entry',NULL,NULL,'0199b840-6922-70d9-8060-3799a45a5e50','2025-10-08 13:11:59','2025-10-08 13:11:59',''),('cea4d391-2ca0-488b-8258-ad8e9e97d3f8','Shivay Mahadev','Shivay@mahadev.com','1234567890','Enrolled','47b504c0-310b-4936-a888-294846434530','LRN-T8DMMS','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-13 15:55:57','2025-11-15 17:04:54',''),('f6e6770f-8899-4cae-8498-5aecc353baca','Mahesh Dal','mahesh@dal.com','1234567890','Enrolled','ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','LRN-C6QLUJ','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:11','2025-11-21 19:57:53','');
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
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_08_03_034432_create_users_and_auth_tables',1),(2,'2025_08_03_034700_create_failed_jobs_table',1),(3,'2025_08_03_034816_create_cache_table',1),(4,'2025_08_03_040308_create_user_profiles_table',1),(5,'2025_08_03_044721_create_product_version_histories_table',1),(6,'2025_08_03_044825_create_product_infos_table',1),(7,'2025_08_03_044940_create_packages_table',1),(8,'2025_08_03_045225_create_pricing_zones_table',1),(9,'2025_08_03_111247_create_permissions_table',1),(10,'2025_08_03_111402_create_roles_table',1),(11,'2025_08_03_112236_create_role_permissions_table',1),(12,'2025_08_03_112532_create_user_roles_table',1),(13,'2025_08_03_114016_create_employers_profiles_table',1),(14,'2025_08_03_114118_create_institute_infos_table',1),(15,'2025_08_03_114231_create_branches_table',1),(16,'2025_08_03_144532_create_programs_table',1),(17,'2025_08_03_144642_create_courses_table',1),(18,'2025_08_03_144800_create_contents_table',1),(19,'2025_08_03_150212_create_tags_table',1),(20,'2025_08_03_150328_create_program_tags_table',1),(21,'2025_08_03_150508_create_discounts_offers_table',1),(22,'2025_08_03_150621_create_program_prices_table',1),(23,'2025_08_04_050924_create_assignments_table',1),(24,'2025_08_04_051036_create_assignment_submissions_table',1),(25,'2025_08_04_053655_create_exams_table',1),(26,'2025_08_04_053802_create_exam_papers_table',1),(27,'2025_08_04_053858_create_results_table',1),(28,'2025_08_04_055721_create_timetables_table',1),(29,'2025_08_04_055831_create_attendances_table',1),(30,'2025_08_04_060955_create_subscriptions_table',1),(31,'2025_08_04_061111_create_payments_table',1),(32,'2025_08_04_061209_create_employer_payments_table',1),(33,'2025_08_04_061336_create_fees_table',1),(34,'2025_08_04_063541_create_communications_table',1),(35,'2025_08_04_063703_create_support_tickets_table',1),(36,'2025_08_04_063811_create_activity_logs_table',1),(37,'2025_08_04_064158_create_jobs_table',1),(38,'2025_08_04_064303_create_job_batches_table',1),(39,'2025_08_04_074342_create_personal_access_tokens_table',1),(40,'2025_08_06_101000_create_penalties_table',1),(41,'2025_08_23_163327_create_employer_consents_table',2),(42,'2025_08_31_105335_create_user_consents_table',3),(43,'2025_09_28_131351_add_normalized_name_to_programs_table',4),(44,'2025_09_28_131624_add_normalized_name_to_courses_table',4),(45,'2025_10_03_100801_create_learner_catalog_table',5),(46,'2025_10_03_120700_make_raw_phone_nullable_in_learner_catalog_table',6),(48,'2025_10_07_195322_add_paid_amount_to_learner_catalog_table',7),(49,'2025_10_08_183705_rename_learner_catalog_to_learners',8),(50,'2025_10_08_184019_create_enrollments_table',8),(51,'2025_10_08_185657_create_enrollment_fees_table',8),(52,'2025_10_08_192713_create_enrolled_courses_table',9),(53,'2025_10_08_193753_create_employees__assignments_table',10),(54,'2025_10_08_221425_clean_up_redundant_columns_in_learners_table',11),(55,'2025_10_15_170226_update_program_courses_related_changes',12),(56,'2025_10_19_223211_create_user_branch_roles_table',13),(57,'2025_12_01_193736_create_activity_logs_table',0),(58,'2025_12_01_193736_create_assignment_submissions_table',0),(59,'2025_12_01_193736_create_assignments_table',0),(60,'2025_12_01_193736_create_attendances_table',0),(61,'2025_12_01_193736_create_branches_table',0),(62,'2025_12_01_193736_create_cache_table',0),(63,'2025_12_01_193736_create_cache_locks_table',0),(64,'2025_12_01_193736_create_communications_table',0),(65,'2025_12_01_193736_create_contents_table',0),(66,'2025_12_01_193736_create_courses_table',0),(67,'2025_12_01_193736_create_discounts_offers_table',0),(68,'2025_12_01_193736_create_employees__assignments_table',0),(69,'2025_12_01_193736_create_employer_consents_table',0),(70,'2025_12_01_193736_create_employer_payments_table',0),(71,'2025_12_01_193736_create_employers_profiles_table',0),(72,'2025_12_01_193736_create_enrolled_courses_table',0),(73,'2025_12_01_193736_create_enrollment_discounts_table',0),(74,'2025_12_01_193736_create_enrollment_fees_table',0),(75,'2025_12_01_193736_create_enrollments_table',0),(76,'2025_12_01_193736_create_exam_papers_table',0),(77,'2025_12_01_193736_create_exams_table',0),(78,'2025_12_01_193736_create_failed_jobs_table',0),(79,'2025_12_01_193736_create_fees_table',0),(80,'2025_12_01_193736_create_institute_infos_table',0),(81,'2025_12_01_193736_create_job_batches_table',0),(82,'2025_12_01_193736_create_jobs_table',0),(83,'2025_12_01_193736_create_learners_table',0),(84,'2025_12_01_193736_create_packages_table',0),(85,'2025_12_01_193736_create_password_reset_tokens_table',0),(86,'2025_12_01_193736_create_payments_table',0),(87,'2025_12_01_193736_create_penalties_table',0),(88,'2025_12_01_193736_create_permissions_table',0),(89,'2025_12_01_193736_create_personal_access_tokens_table',0),(90,'2025_12_01_193736_create_pricing_zones_table',0),(91,'2025_12_01_193736_create_product_infos_table',0),(92,'2025_12_01_193736_create_product_version_histories_table',0),(93,'2025_12_01_193736_create_program_prices_table',0),(94,'2025_12_01_193736_create_program_tags_table',0),(95,'2025_12_01_193736_create_programs_table',0),(96,'2025_12_01_193736_create_reminders_table',0),(97,'2025_12_01_193736_create_results_table',0),(98,'2025_12_01_193736_create_role_permissions_table',0),(99,'2025_12_01_193736_create_roles_table',0),(100,'2025_12_01_193736_create_sessions_table',0),(101,'2025_12_01_193736_create_subscriptions_table',0),(102,'2025_12_01_193736_create_support_tickets_table',0),(103,'2025_12_01_193736_create_tags_table',0),(104,'2025_12_01_193736_create_timetables_table',0),(105,'2025_12_01_193736_create_user_branch_roles_table',0),(106,'2025_12_01_193736_create_user_consents_table',0),(107,'2025_12_01_193736_create_user_profiles_table',0),(108,'2025_12_01_193736_create_user_roles_table',0),(109,'2025_12_01_193736_create_users_table',0),(110,'2025_12_01_193739_add_foreign_keys_to_activity_logs_table',0),(111,'2025_12_01_193739_add_foreign_keys_to_assignment_submissions_table',0),(112,'2025_12_01_193739_add_foreign_keys_to_assignments_table',0),(113,'2025_12_01_193739_add_foreign_keys_to_attendances_table',0),(114,'2025_12_01_193739_add_foreign_keys_to_branches_table',0),(115,'2025_12_01_193739_add_foreign_keys_to_communications_table',0),(116,'2025_12_01_193739_add_foreign_keys_to_contents_table',0),(117,'2025_12_01_193739_add_foreign_keys_to_courses_table',0),(118,'2025_12_01_193739_add_foreign_keys_to_discounts_offers_table',0),(119,'2025_12_01_193739_add_foreign_keys_to_employer_consents_table',0),(120,'2025_12_01_193739_add_foreign_keys_to_employer_payments_table',0),(121,'2025_12_01_193739_add_foreign_keys_to_employers_profiles_table',0),(122,'2025_12_01_193739_add_foreign_keys_to_exam_papers_table',0),(123,'2025_12_01_193739_add_foreign_keys_to_exams_table',0),(124,'2025_12_01_193739_add_foreign_keys_to_fees_table',0),(125,'2025_12_01_193739_add_foreign_keys_to_institute_infos_table',0),(126,'2025_12_01_193739_add_foreign_keys_to_penalties_table',0),(127,'2025_12_01_193739_add_foreign_keys_to_product_infos_table',0),(128,'2025_12_01_193739_add_foreign_keys_to_product_version_histories_table',0),(129,'2025_12_01_193739_add_foreign_keys_to_program_prices_table',0),(130,'2025_12_01_193739_add_foreign_keys_to_program_tags_table',0),(131,'2025_12_01_193739_add_foreign_keys_to_results_table',0),(132,'2025_12_01_193739_add_foreign_keys_to_role_permissions_table',0),(133,'2025_12_01_193739_add_foreign_keys_to_roles_table',0),(134,'2025_12_01_193739_add_foreign_keys_to_sessions_table',0),(135,'2025_12_01_193739_add_foreign_keys_to_subscriptions_table',0),(136,'2025_12_01_193739_add_foreign_keys_to_support_tickets_table',0),(137,'2025_12_01_193739_add_foreign_keys_to_timetables_table',0),(138,'2025_12_01_193739_add_foreign_keys_to_user_branch_roles_table',0),(139,'2025_12_01_193739_add_foreign_keys_to_user_consents_table',0),(140,'2025_12_01_193739_add_foreign_keys_to_user_profiles_table',0),(141,'2025_12_01_193739_add_foreign_keys_to_user_roles_table',0);
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
INSERT INTO `payments` VALUES ('019a8391-ba1b-70e7-ae58-f7511e1d1a19',1000.00,'CASH','CASH-123','COMPLETE','2025-11-14 23:42:37','75e48931-6866-44c0-a5ec-990c4cdd0022','LF','2025-11-14 23:42:37','2025-11-14 23:42:37'),('019a874b-f9f2-7364-9d3e-c2f5eb83ebaa',20370.00,'CARD','12345673','COMPLETE','2025-11-15 17:04:54','0a35277d-afbc-4621-bf13-0e2b194817b6','LF','2025-11-15 17:04:54','2025-11-15 17:04:54'),('019a977d-530d-7211-974e-a7220f4b0388',699.00,'UPI','UPI-37482845','COMPLETE','2025-11-18 20:32:44','75e48931-6866-44c0-a5ec-990c4cdd0022','LF','2025-11-18 20:32:44','2025-11-18 20:32:44'),('019a9780-4c85-72ca-9aae-f3370dd3b4df',17000.00,'CHEQUE','SBI-CH-123-352','COMPLETE','2025-11-18 20:35:59','75e48931-6866-44c0-a5ec-990c4cdd0022','LF','2025-11-18 20:35:59','2025-11-18 20:35:59'),('019a9781-ec61-72db-bd57-abd27ee202e0',1.00,'WALLET','CRP-252-322','COMPLETE','2025-11-18 20:37:45','75e48931-6866-44c0-a5ec-990c4cdd0022','LF','2025-11-18 20:37:45','2025-11-18 20:37:45'),('019a9784-aa63-72f4-8f77-461169e75b16',1.00,'CASH','13464','COMPLETE','2025-11-18 20:40:45','75e48931-6866-44c0-a5ec-990c4cdd0022','LF','2025-11-18 20:40:45','2025-11-18 20:40:45'),('019aa6c6-c849-707f-b18b-3bcaf6a5873a',370.00,'CASH','CH-34353','COMPLETE','2025-11-21 19:47:16','dec2fd89-a5c6-4b15-8f77-246443b4c280','LF','2025-11-21 19:47:16','2025-11-21 19:47:16'),('019aa6cf-8904-7180-be60-c7ba9f850e2a',370.00,'CASH','CH-23533','COMPLETE','2025-11-21 19:56:50','087450e8-44ad-4fdd-adbd-28473f21175e','LF','2025-11-21 19:56:50','2025-11-21 19:56:50'),('019aa6d0-81df-7014-9349-2acfd76810ee',70.00,'CASH','CH-344533','COMPLETE','2025-11-21 19:57:53','fb158feb-5a78-4abe-8182-17758b258571','LF','2025-11-21 19:57:53','2025-11-21 19:57:53'),('019abff7-73db-71a6-bb7a-1f298e944b76',6000.00,'CASH','SBI-CH-432','COMPLETE','2025-11-26 17:10:56','dd71a1dc-67ae-4d9e-9ecd-46d377635285','LF','2025-11-26 17:10:56','2025-11-26 17:10:56'),('019ac001-19f0-72e2-972a-359f547851ce',6000.00,'CASH','SBI-CH-423','COMPLETE','2025-11-26 17:21:29','d90f98d8-60ee-4825-9deb-e3e6264b38e3','LF','2025-11-26 17:21:29','2025-11-26 17:21:29'),('019ac00a-c8e2-711d-8193-9d46fe24e0da',15341.00,'CASH','SBI-CH-432-443','COMPLETE','2025-11-26 17:32:03','dd71a1dc-67ae-4d9e-9ecd-46d377635285','LF','2025-11-26 17:32:03','2025-11-26 17:32:03'),('019ad4bb-7d6b-710a-8652-500f3e43b865',340.00,'CASH','CASH-145','COMPLETE','2025-11-30 17:57:28','d90f98d8-60ee-4825-9deb-e3e6264b38e3','LF','2025-11-30 17:57:28','2025-11-30 17:57:28'),('019ad4c1-b8df-73e5-a805-6b0bff57ae8c',2000.00,'CASH','CASH-1353','COMPLETE','2025-11-30 18:04:16','d90f98d8-60ee-4825-9deb-e3e6264b38e3','LF','2025-11-30 18:04:16','2025-11-30 18:04:16'),('019ad4c5-c269-72b1-906d-a390178a7ba3',1000.00,'CASH','CASH-7847','COMPLETE','2025-11-30 18:08:41','d90f98d8-60ee-4825-9deb-e3e6264b38e3','LF','2025-11-30 18:08:41','2025-11-30 18:08:41'),('019ad508-429a-7233-86aa-b5e8cb7828f9',1000.00,'CASH','CASH-2432','COMPLETE','2025-11-30 19:21:19','3dd886a0-703a-476e-9417-a752eb3e68a1','LF','2025-11-30 19:21:19','2025-11-30 19:21:19'),('019ad515-a400-7078-94c3-b5495181c1df',200.00,'CASH','CASH-7835','COMPLETE','2025-11-30 19:35:56','5bac8452-b9f6-4d32-ac99-bac1918d7867','LF','2025-11-30 19:35:56','2025-11-30 19:35:56'),('019ad519-ac53-70ab-ad46-93cd5b59b693',2000.00,'CASH','CASH-24343','COMPLETE','2025-11-30 19:40:20','2246c436-b41f-4984-9467-fe9850c551ec','LF','2025-11-30 19:40:20','2025-11-30 19:40:20'),('019ad520-d94d-7343-b132-cadf4b8222b1',100.00,'CASH','CASH-1352','COMPLETE','2025-11-30 19:48:11','d25c7848-7166-47b0-9926-f112a7d24e63','LF','2025-11-30 19:48:11','2025-11-30 19:48:11');
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
INSERT INTO `program_prices` VALUES ('0199ed49-716e-7324-a8d7-1ce3ad1219d7','0199ed49-710f-73fd-98c7-71b20d8c4ea0','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:20:37','2025-10-16 19:20:37'),('0199ed4c-e1c9-70fb-96e3-b870f56cd269','0199ed4c-e176-7149-a74e-3b29f3a79330','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:24:22','2025-10-16 19:24:22'),('0199ed4f-d2a8-7227-86fa-60310a03233f','0199ed4f-d23d-7288-9b78-f2cfffba47c7','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:27:35','2025-10-16 19:27:35'),('0199fcd4-bb90-7182-bed4-aa36dcba7b1a','0199fcd4-bb0a-713c-9fe2-0eb6d9403d06','crazy',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fff8-0bc9-701f-9006-5bfca22c66d0','0199fff8-0b50-738a-b636-ea5f3be428b3','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:24:30','2025-10-20 10:24:30'),('019a293d-f843-7180-9791-cd87058e4f70','019a293d-f75d-715f-a451-5413309ac135','religion',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-28 10:45:18','2025-10-28 10:45:18'),('019a3a4f-b6ca-72ed-bfd2-4d9123cd3585','019a3a4f-b651-73d7-984e-d39ffe6d3cc3','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 18:18:14','2025-10-31 18:18:14'),('019a3a87-43a3-71e3-9630-c1ec14449c5b','019a3a87-42f3-7224-9067-94260cce605c','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3a87-43ba-71f1-a35f-7ba6abb9495e','019a3a87-42f3-7224-9067-94260cce605c','normal',0.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3ab0-db35-7173-926a-d1838d011f10','019a3ab0-dab6-71c7-b734-be2c7a2c5d50','Full stak',50000.00,NULL,'industry',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:04:20','2025-10-31 20:04:20'),('019a3ab0-db4a-73cf-95a1-93dea9550995','019a3ab0-dab6-71c7-b734-be2c7a2c5d50','Web Stack',50000.00,NULL,'industry',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:04:20','2025-10-31 20:04:20'),('019a3acf-9a87-732f-80b1-3ef5f180d710','019a3acf-9a61-705e-aa13-614f887c0d16','normal stock learner',3000.00,NULL,'for use it revenue  in stocks',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:37:55','2025-10-31 20:37:55'),('019a3acf-9aa9-73f4-be4e-3515184afe7c','019a3acf-9a61-705e-aa13-614f887c0d16','higher stock learner',5000.00,NULL,'for use it to reinvestment in stocks',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:37:55','2025-10-31 20:37:55'),('019a3f88-e1d6-7205-9e74-2ef16900a75c','019a3f88-e10b-73da-8258-9a01e85ff35d','Program price 1 ok',1000.00,NULL,'program price 1',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:01'),('019a3f88-e201-7305-91e9-614ab77e08af','019a3f88-e10b-73da-8258-9a01e85ff35d','program price 2 ok',2000.00,NULL,'program price 2',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:01'),('019a3fa5-7f18-70ec-a982-1e61d8cceb75','019a3f88-e10b-73da-8258-9a01e85ff35d','program price 3 ok',3000.00,NULL,NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 19:10:01','2025-11-01 19:10:01'),('019a6335-d195-725a-872e-f0b9019702cf','019a6335-d0d9-7074-ab7b-64146e5802ec','Tech Price type',20000.00,NULL,'this price fair to market to right way to get it stuffs',1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22'),('7b8ba222-690d-4451-bb61-3989738ca307','0199ebd7-e4e1-7021-9b44-ea89d5cbab1b','region based',5000.00,NULL,'scope',1,'0199c4de-9651-70c1-8ef0-752c45ffdd4c','2025-10-16 12:36:58','2025-10-16 12:36:58');
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
INSERT INTO `program_tags` VALUES ('0199ebd7-e4e1-7021-9b44-ea89d5cbab1b','0199ebd7-e531-711d-aa6c-966afba71523','2025-10-16 12:36:58'),('0199ed3c-79de-72e5-a05c-84d88d33a94a','0199ed3c-7a12-7176-bab2-4939b9cd0c28','2025-10-16 19:06:27'),('0199ed46-5ea7-713a-a250-a2596d8a9242','0199ed46-5ed3-7057-8a96-6b6f275dcefb','2025-10-16 19:17:16'),('0199ed49-710f-73fd-98c7-71b20d8c4ea0','0199ed49-713a-71c5-9211-a93b9e2e04c2','2025-10-16 19:20:37'),('0199ed4c-e176-7149-a74e-3b29f3a79330','0199ed4c-e195-71be-8978-ee258a0c4a3a','2025-10-16 19:24:22'),('0199ed4f-d23d-7288-9b78-f2cfffba47c7','0199ed4f-d26d-7088-978a-4890a49042a9','2025-10-16 19:27:35'),('0199fcd4-bb0a-713c-9fe2-0eb6d9403d06','0199fcd4-bb47-72bf-a275-d54a39bc5c61','2025-10-19 19:47:04'),('0199fff8-0b50-738a-b636-ea5f3be428b3','0199fff8-0b81-72f7-a2b6-20f40c416c80','2025-10-20 10:24:30'),('019a293d-f75d-715f-a451-5413309ac135','019a293d-f7c9-7257-b376-949b3744f055','2025-10-28 10:45:18'),('019a3a4f-b651-73d7-984e-d39ffe6d3cc3','019a3a4f-b691-7243-ad07-176b0bb1d588','2025-10-31 18:18:13'),('019a3a87-42f3-7224-9067-94260cce605c','019a3a87-4327-73fa-8ea5-4d775db5d2e8','2025-10-31 19:18:54'),('019a3a87-42f3-7224-9067-94260cce605c','019a3a87-436d-7294-a8e8-75a8d51c9a75','2025-10-31 19:18:54'),('019a3ab0-dab6-71c7-b734-be2c7a2c5d50','019a3ab0-db01-72c8-9a17-f54442b45c84','2025-10-31 20:04:20'),('019a3acb-8c5e-7135-a85c-9931da0b8c28','019a3acb-8c8c-73fb-b85b-674df04fc5e1','2025-10-31 20:33:29'),('019a3acb-8c5e-7135-a85c-9931da0b8c28','019a3acb-8cc9-7244-b62e-953b88143b4b','2025-10-31 20:33:29'),('019a3f88-e10b-73da-8258-9a01e85ff35d','019a3f88-e16f-720f-932b-ede884959aab','2025-11-01 18:38:46'),('019a3f88-e10b-73da-8258-9a01e85ff35d','019a3fa5-7fe6-73cf-b0a4-1a4c20939ba7','2025-11-01 13:40:02'),('019a3f88-e10b-73da-8258-9a01e85ff35d','019a3fa5-8004-71d9-a2a0-7e981b2b5663','2025-11-01 13:40:02'),('019a6335-d0d9-7074-ab7b-64146e5802ec','019a6335-d156-7004-9eb1-7709c7c10c82','2025-11-08 16:54:22');
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
INSERT INTO `programs` VALUES ('01998120-8d85-7392-beee-7e1f76f0adef','CLASS-10',NULL,'SSC LEVEL',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 19:16:58','2025-09-25 19:16:58'),('019985ce-a544-7162-8ac9-1c938f44f03c','CLASS-1st',NULL,'Class 1st standard start',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-26 17:05:36','2025-09-26 17:05:36'),('01998f1e-722a-7238-918f-98dcfd4e3070','Class-11th',NULL,'Science class 11th',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:29:21','2025-09-28 12:29:21'),('01998f20-0466-71ae-b9c4-c782ad290d81','Class-11th',NULL,'for science program need it',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 12:31:04','2025-09-28 12:31:04'),('01998f53-4c56-72bb-b767-33371a19d429','CLASS-X',NULL,'class x is important',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:27:04','2025-09-28 13:27:04'),('01998f53-c290-716d-bdcd-450d1ff0bd7b','CLASS-X',NULL,'test for normalize function',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:27:35','2025-09-28 13:27:35'),('01998f59-871b-72d5-8f03-7ce20652b08a','CLASS-Y','class-y','class Y is important',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:33:53','2025-09-28 13:33:53'),('01998f5e-35e6-73e7-804a-6ddb65a21a5f','CLASS-Z','class-z','test for normalize function',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-28 13:39:00','2025-09-28 13:39:00'),('0199ebd7-e4e1-7021-9b44-ea89d5cbab1b','BE-4Y-8SEM-CS','be-4y-8sem-cs','BE-4Y-8SEM-CS',NULL,1,'0199c4de-9651-70c1-8ef0-752c45ffdd4c','2025-10-16 12:36:58','2025-10-16 12:36:58'),('0199ed2c-e5eb-730d-9a04-9c7282e5df39','BE',NULL,'Basic plan for the client have below 50 learner\'s count this can be have related stuffs and features.',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 18:49:26','2025-10-16 18:49:26'),('0199ed32-cd17-7360-9673-d77d25ef5d40','BE',NULL,'Basic plan for the client have below 50 learner\'s count this can be have related stuffs and features.',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 18:55:53','2025-10-16 18:55:53'),('0199ed38-8f00-718a-a3f9-c8af89c101ae','BE-FY-1SEM-CS',NULL,'CS',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:02:10','2025-10-16 19:02:10'),('0199ed3c-79de-72e5-a05c-84d88d33a94a','BE-FY-2SEM-CS',NULL,'be',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:06:27','2025-10-16 19:06:27'),('0199ed46-5ea7-713a-a250-a2596d8a9242','BE-FY-3SEM-CS',NULL,'be',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:17:16','2025-10-16 19:17:16'),('0199ed49-710f-73fd-98c7-71b20d8c4ea0','BE-FY-4SEM-CS',NULL,'BE',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:20:37','2025-10-16 19:20:37'),('0199ed4c-e176-7149-a74e-3b29f3a79330','BE-FY-5SEM-CS',NULL,'cs',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:24:22','2025-10-16 19:24:22'),('0199ed4f-d23d-7288-9b78-f2cfffba47c7','BE-FY-7SEM-CS',NULL,'BE',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:27:35','2025-10-16 19:27:35'),('0199fcd4-bb0a-713c-9fe2-0eb6d9403d06','Arts',NULL,'arts',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fff8-0b50-738a-b636-ea5f3be428b3','Science',NULL,'science',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:24:29','2025-10-20 10:24:29'),('0199fff9-14b1-7123-8fb2-a5129f153396','BSC',NULL,'bsc',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:25:37','2025-10-20 10:25:37'),('019a293d-f75d-715f-a451-5413309ac135','Arts',NULL,'nothin',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-28 10:45:18','2025-10-28 10:45:18'),('019a3a4f-b651-73d7-984e-d39ffe6d3cc3','Network',NULL,'infra need it',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 18:18:13','2025-10-31 18:18:13'),('019a3a87-42f3-7224-9067-94260cce605c','DataCenter World',NULL,'this main program of CS',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:29:28'),('019a3aa9-d109-7330-b2f6-92ef1b5fbd4b','Senior Developer',NULL,'engineer',NULL,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:56:38','2025-10-31 19:56:38'),('019a3ab0-dab6-71c7-b734-be2c7a2c5d50','Full stack engineer',NULL,'entire web',120,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:04:20','2025-10-31 20:04:20'),('019a3acb-8c5e-7135-a85c-9931da0b8c28','stock expert',NULL,'stock',120,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:33:29','2025-10-31 20:33:29'),('019a3acf-9a61-705e-aa13-614f887c0d16','stock expert1',NULL,'stock expert 1',300,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:37:55','2025-10-31 20:37:55'),('019a3b62-cc78-7109-b06a-346799f35694','Stock Expert 4',NULL,'stock expert 4',400,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:18:41','2025-10-31 23:18:41'),('019a3b6e-61a7-7349-b9db-9b75f814c581','stok expert 6',NULL,'stock 6 adavcne',200,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:31:21','2025-10-31 23:31:21'),('019a3b72-2f3a-739d-b1da-061963d44736','time less',NULL,'usless timepass ok',500,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 23:35:30','2025-10-31 23:38:13'),('019a3f88-e10b-73da-8258-9a01e85ff35d','Test program Creation entire Form 1',NULL,'this is the program form creation to hold many sub category and stuffs use',2001,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 19:10:01'),('019a6335-d0d9-7074-ab7b-64146e5802ec','DevOps Engineer',NULL,'DevOps Engineer program have multi courses',300,1,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22'),('a4f2df09-8366-487a-bbe5-b56f409c44ad','MATH',NULL,'MATH 12th',NULL,1,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 17:41:00','2025-09-25 17:41:00'),('ec0f36b0-5d0c-41ac-8d10-91846f262324','MATH11',NULL,'MATH CLASS 11th',NULL,0,'0198cc3c-6b37-7144-b0b7-309ccdff7070','2025-09-25 17:57:13','2025-09-25 17:57:13');
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
INSERT INTO `sessions` VALUES ('fVFfPywkznOGsr0rhWWkj4GG8wPa3SKeTLrZH3tC','02b2a2f4-1890-445a-937f-6b88163a9e95','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiWHVDbEg3dGxrUXY3a0d0Tzk2Y2dSN0JuWGZwbDBZWlhHRnhoZWNqMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWFybmVyL2p1c3QtdmlldyI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llci9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjAyYjJhMmY0LTE4OTAtNDQ1YS05MzdmLTZiODgxNjNhOWU5NSI7czoxNToiYWN0aXZlQnJhbmNoX2lkIjtzOjM2OiJjMWM4NWY1Yy1mYmVkLTRmZjktODJkOS0yMWFkZTMzZTdiMzMiO3M6MTM6ImFjdGl2ZVJvbGVfaWQiO3M6MzY6IjQ2M2NlMmZkLWFlMzgtMTFmMC1hMzIxLTAyNDJhYzExMDAwMiI7czoyMDoic2VsZWN0ZWRfcm9sZV9wcmVmaXgiO3M6NzoibGVhcm5lciI7fQ==',1764512525),('vhEM5S6lN8UTM0dfiQLl4lDdFSlkeLHv7lywgiNt','0199c4de-9651-70c1-8ef0-752c45ffdd4c','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYmNOb1pqY1hSc2JyN1ZhbHNsRk0wMmVFRlEyazdGR2F1ODQ0dm5JbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llci9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiMDE5OWM0ZGUtOTY1MS03MGMxLThlZjAtNzUyYzQ1ZmZkZDRjIjtzOjIwOiJzZWxlY3RlZF9yb2xlX3ByZWZpeCI7czoxNDoic3lzdGVtZW1wbG95ZXIiO30=',1764524752);
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
INSERT INTO `tags` VALUES ('0199ebd7-e531-711d-aa6c-966afba71523','Block chain','CS','cs','0199c4de-9651-70c1-8ef0-752c45ffdd4c','2025-10-16 12:36:58','2025-10-16 12:36:58'),('0199ed38-8f26-721a-aa71-b914985bc062','IT',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:02:10','2025-10-16 19:02:10'),('0199ed3c-7a12-7176-bab2-4939b9cd0c28','AIML',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:06:27','2025-10-16 19:06:27'),('0199ed46-5ed3-7057-8a96-6b6f275dcefb','db',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:17:16','2025-10-16 19:17:16'),('0199ed49-713a-71c5-9211-a93b9e2e04c2','JAVA',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:20:37','2025-10-16 19:20:37'),('0199ed4c-e195-71be-8978-ee258a0c4a3a','CSD',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:24:22','2025-10-16 19:24:22'),('0199ed4f-d26d-7088-978a-4890a49042a9','BCA',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-16 19:27:35','2025-10-16 19:27:35'),('0199fcd4-bb47-72bf-a275-d54a39bc5c61','Arts',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-19 19:47:04','2025-10-19 19:47:04'),('0199fff8-0b81-72f7-a2b6-20f40c416c80','science',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-20 10:24:30','2025-10-20 10:24:30'),('019a293d-f7c9-7257-b376-949b3744f055','art',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-28 10:45:18','2025-10-28 10:45:18'),('019a3a4f-b691-7243-ad07-176b0bb1d588','NetworInfra',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 18:18:13','2025-10-31 18:18:13'),('019a3a87-4327-73fa-8ea5-4d775db5d2e8','Data',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3a87-436d-7294-a8e8-75a8d51c9a75','Center',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 19:18:54','2025-10-31 19:18:54'),('019a3ab0-db01-72c8-9a17-f54442b45c84','Full stack','normal','full stack','2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:04:20','2025-10-31 20:04:20'),('019a3acb-8c8c-73fb-b85b-674df04fc5e1','stock','market','stock','2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:33:29','2025-10-31 20:33:29'),('019a3acb-8cc9-7244-b62e-953b88143b4b','share','market','stock','2559a851-a77e-11f0-b33d-0242ac110002','2025-10-31 20:33:29','2025-10-31 20:33:29'),('019a3f88-e141-7348-ac15-368d16ffcda4','Program test','program creation','programs test','2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 18:38:46'),('019a3f88-e16f-720f-932b-ede884959aab','program test 2','program creation','program test','2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 18:38:46','2025-11-01 18:38:46'),('019a3fa5-7fe6-73cf-b0a4-1a4c20939ba7','Program test 1',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 19:10:02','2025-11-01 19:10:02'),('019a3fa5-8004-71d9-a2a0-7e981b2b5663','program test 3',NULL,NULL,'2559a851-a77e-11f0-b33d-0242ac110002','2025-11-01 19:10:02','2025-11-01 19:10:02'),('019a6335-d156-7004-9eb1-7709c7c10c82','DevOps','DevOps Engineer','DevOps Engineer Stack it to be can be usefull it contain the many parts servers and networkings.','2559a851-a77e-11f0-b33d-0242ac110002','2025-11-08 16:54:22','2025-11-08 16:54:22');
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
INSERT INTO `user_branch_roles` VALUES ('03c44236-cab6-406a-a765-7591ae377ae9','746d1f5c-168d-4eac-bd83-176c4b17ff97','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('244c32f7-d539-401b-b853-8b0b340a1cf6','9dcc63e9-5212-4fdb-a216-f96fef09b90b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('2605ebc6-d0c1-4d79-925f-4118d7364c4d','6c7b2bbc-d104-422e-ab26-db53f0df9e5d','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('32db0bd4-5d8b-441e-b044-09ef15e7fe63','6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('33735faf-b015-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-10-23 13:35:55','2025-10-23 13:35:55'),('39e601c3-b019-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','63684590-2270-44b7-af3c-44cc4f05317c','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-23 14:04:44','2025-10-23 14:04:44'),('3cc5714b-a1d8-4c49-bae0-768779eec811','dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('470a314e-fe62-4366-868a-623a444bf8a3','f3a2013a-79da-4259-b0ba-ec9d238a650c','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-26 16:53:50','2025-11-26 16:53:50'),('55916761-2451-47ca-a958-67412e2e37b7','ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('69f5bddd-a51e-40d0-9ed9-a7b5bcedb94b','f0f912a8-156c-442a-bdfd-92c796884238','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('8971fc9c-9a3f-4d53-b714-4b54730dbbf4','91fa5ce8-fb24-414a-933b-0d740340697e','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('92d8859d-d16e-4d8b-82d9-c1ae731b97dc','02b2a2f4-1890-445a-937f-6b88163a9e95','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-30 19:15:26','2025-11-30 19:15:26'),('9a5e099d-9c2c-42f2-be82-2626abe90122','7c64a808-4f41-456b-aca0-ce225ce8b40b','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('b64fe353-7e97-49df-a111-e72a13cd463e','47b504c0-310b-4936-a888-294846434530','63684590-2270-44b7-af3c-44cc4f05317c','463ce2fd-ae38-11f0-a321-0242ac110002',1,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('ef9483e1-1e1c-4ef4-ba1e-5ce304de35ea','1aa313f1-8d7a-4399-9ba3-0b843cc54c32','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('fea7d400-b00a-11f0-ad79-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4634f256-ae38-11f0-a321-0242ac110002',1,'2025-10-23 12:22:51','2025-10-23 12:22:51'),('u1b2c3d4-e5f6-7890-abcd-1234567890ef','a19a0835-ada8-11f0-8b09-0242ac110002','c1c85f5c-fbed-4ff9-82d9-21ade33e7b33','4992256f-ad09-11f0-80ba-0242ac110002',1,'2025-10-21 06:44:39','2025-10-21 06:44:39');
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
INSERT INTO `user_profiles` VALUES ('045bc936-c351-435a-85ed-1bf98bde2b72','6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','Karanav','Puti',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('3acc3f18-2347-4b4d-a0dc-c7740cb144ec','f3a2013a-79da-4259-b0ba-ec9d238a650c','Aditi','Garv',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-26 16:53:50','2025-11-26 16:53:50'),('3c51eb5f-a5ca-415b-9330-bd917b564842','02b2a2f4-1890-445a-937f-6b88163a9e95','Hitesh','Ramami',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-30 19:15:26','2025-11-30 19:15:26'),('4f10f18b-c429-4790-b7dd-04d6ce12d074','f0f912a8-156c-442a-bdfd-92c796884238','Pankaj','Bhor',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('4fed4949-edc9-4787-83d6-80a63c0f6d60','0199b840-6922-70d9-8060-3799a45a5e50','Mayur','Barhate','2025-10-22','Male','Titwala','Manda','Titwala','MH','421605','IND','/storage/uploads/profile_pictures/KppzIuB9OoRjEy66kkavfED8mGnZz0BLoTrA1zKH.jpg','I am the developer','PHP',NULL,NULL,'2025-10-10 11:18:01','2025-10-11 20:57:50'),('607b3494-8302-419e-97d4-9fa87c75e49f','47b504c0-310b-4936-a888-294846434530','Shivay','Mahadev',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('801c1d56-391b-4dfc-b454-920df813dbb1','9dcc63e9-5212-4fdb-a216-f96fef09b90b','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('872e4545-68b0-4d01-b88b-9c4c21d56ac2','dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','Rohini','Saraf',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('8e86efa6-b0f3-11f0-a793-0242ac110002','a19a0835-ada8-11f0-8b09-0242ac110002','Shweta','Rao','2023-08-09','FEMALE','Street 12 , genesh road','near rbb','kalyan','DELHI','738274','INDIAN','/storage/uploads/profile_pictures/etK69q0pbveDErFD78vLtHQe6bqJnq4rXjlI1lca.jpg','Marathi alwaya','Marathi',NULL,NULL,'2025-10-24 16:07:36','2025-10-26 10:13:48'),('8ec383f0-33cc-4d42-b0bb-81315d2703e8','746d1f5c-168d-4eac-bd83-176c4b17ff97','Shiv','krishna',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('a5875ca4-dc75-4d78-8514-6a01ea498354','1aa313f1-8d7a-4399-9ba3-0b843cc54c32','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('c2703147-707d-44ec-9c5e-49ba63c70c62','ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','Mahesh','Dal',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('ca0ad001-9eaf-4b24-838d-473e44c1e62e','0198a25a-bd59-710d-b405-661be7d47fa2','Duggi','Dugum','2025-09-17','FEMALE','any','no','ok','we','44444','cany','/storage/uploads/profile_pictures/WbWjtW0OFchPaNbcuXFsYVri1Misk6XJlRwWPvXG.jpg','ok','mn',NULL,NULL,'2025-08-15 17:59:43','2025-09-08 21:05:51'),('cfbdb4ce-03f4-4818-b9c8-55c766a5fabb','91fa5ce8-fb24-414a-933b-0d740340697e','Haseen','Julfhe',NULL,'Female',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('d886efeb-4ed0-442b-b3aa-c104c6e42354','6c7b2bbc-d104-422e-ab26-db53f0df9e5d','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('f9cdef3d-5cc9-405f-8431-76b3c7f7a509','0199c4de-9651-70c1-8ef0-752c45ffdd4c','Rama','Karam','2025-10-09','MALE','Titwala','Manda','Thane','MH','421605','INDIA','/storage/uploads/profile_pictures/08zOgD8axEMAgwaRqKVOTIMfUXdiylzDRIXcowKU.jpg','I know it','HTML',NULL,NULL,'2025-10-08 22:59:05','2025-10-14 09:11:32');
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
INSERT INTO `user_roles` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','0198a25a-ba68-7365-a398-fe87aa5997c7','active',NULL,NULL,'2025-08-13 13:05:12','2025-08-13 13:05:12'),('0198a25a-bd59-710d-b405-661be7d47fa2','0199aa0b-8454-70f4-a975-48b260cd8c70','inactive',NULL,NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26'),('0199b840-6922-70d9-8060-3799a45a5e50','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-06 12:10:53','2025-10-06 12:10:53'),('0199b853-fb88-7040-a598-55d7e4d80bb9','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-06 12:32:15','2025-10-06 12:32:15'),('0199c4de-9651-70c1-8ef0-752c45ffdd4c','0199aa0b-8454-70f4-a975-48b260cd8c70','active','0198a25a-bd59-710d-b405-661be7d47fa2',NULL,'2025-10-08 22:59:05','2025-10-08 22:59:05'),('02b2a2f4-1890-445a-937f-6b88163a9e95','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:15:26','2025-11-30 19:15:26','2025-11-30 19:15:26'),('1aa313f1-8d7a-4399-9ba3-0b843cc54c32','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('47b504c0-310b-4936-a888-294846434530','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-13 15:55:57','2025-11-13 15:55:57','2025-11-13 15:55:57'),('6c7b2bbc-d104-422e-ab26-db53f0df9e5d','463ce2fd-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-30 19:38:43','2025-11-30 19:38:43','2025-11-30 19:38:43'),('746d1f5c-168d-4eac-bd83-176c4b17ff97','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-04 19:25:02','2025-11-04 19:25:02','2025-11-04 19:25:02'),('7c64a808-4f41-456b-aca0-ce225ce8b40b','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('91fa5ce8-fb24-414a-933b-0d740340697e','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:45:43','2025-11-26 16:45:43','2025-11-26 16:45:43'),('9dcc63e9-5212-4fdb-a216-f96fef09b90b','4634f256-ae38-11f0-a321-0242ac110002','active',NULL,NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('a19a0835-ada8-11f0-8b09-0242ac110002','0199aa0b-8454-70f4-a975-48b260cd8c70','active',NULL,'2025-10-23 13:35:40','2025-10-23 13:35:40','2025-10-23 13:35:40'),('a19a0835-ada8-11f0-8b09-0242ac110002','4634f256-ae38-11f0-a321-0242ac110002','active','0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-23 12:14:21','2025-10-23 12:14:21','2025-10-23 12:14:21'),('a19a0835-ada8-11f0-8b09-0242ac110002','463ce2fd-ae38-11f0-a321-0242ac110002','active',NULL,'2025-10-23 13:35:40','2025-10-23 13:35:40','2025-10-23 13:35:40'),('a19a0835-ada8-11f0-8b09-0242ac110002','4992256f-ad09-11f0-80ba-0242ac110002','active','0198a25a-bd59-710d-b405-661be7d47fa2','2025-10-20 11:51:42','2025-10-20 11:51:42','2025-10-20 11:51:42'),('dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:45:05','2025-11-21 19:45:05','2025-11-21 19:45:05'),('ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:11','2025-11-21 19:54:11','2025-11-21 19:54:11'),('f0f912a8-156c-442a-bdfd-92c796884238','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-21 19:54:49','2025-11-21 19:54:49','2025-11-21 19:54:49'),('f3a2013a-79da-4259-b0ba-ec9d238a650c','463ce2fd-ae38-11f0-a321-0242ac110002','active','a19a0835-ada8-11f0-8b09-0242ac110002','2025-11-26 16:53:50','2025-11-26 16:53:50','2025-11-26 16:53:50');
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
INSERT INTO `users` VALUES ('0198a25a-bd59-710d-b405-661be7d47fa2','FirstUser','fu@gmail.com',NULL,'fu','$2y$12$eQAfWSDE5iqwDrjxfJ6S8eVQOZpGdLWVOSIMkj6yKzEwgFWekNYGK',NULL,'2025-08-13 13:05:12','2025-08-13 13:14:58'),('0198cc3c-6b37-7144-b0b7-309ccdff7070','vasudev','vasudev@world.protect',NULL,'krishna','$2y$12$OofLKLjq4z0TfWkLk7m75ubomTYrpFlcU1NmhCinEbZuU.NeRwP3C','tbGIQ1QeGVFLbh2ZL3EMEFPUXAaB5W914b4MizR62Zmjry2b7TiLtfjIxoVS','2025-08-21 16:16:08','2025-10-04 07:34:02'),('0199a9cf-ec62-71c9-8f9b-4bff7035ac1c','Mayur Nilesh Barhate','ABC@GMAIL.COM',NULL,'SunitaCH','1234567890',NULL,'2025-10-03 16:53:20','2025-10-03 16:53:20'),('0199a9d0-a272-7157-a4df-a62cf48ac139','Rohan','Rohan@123.com',NULL,'Rohan','1234567890',NULL,'2025-10-03 16:54:06','2025-10-03 16:54:06'),('0199a9de-e8ec-7241-b016-f3d3de613f24','Mayur Nilesh Barhate','Mayur@Barhate.com',NULL,'Mayur','$2y$12$qBWHESj6IhQJ0PzGRLxyAeyzJlJwweb9HjW7fqXMdSjJlKTn2v5Li',NULL,'2025-10-03 17:09:42','2025-10-03 17:09:42'),('0199a9ea-79c4-7087-bf68-8f38afc13b0b','Mayur Nilesh Barhate','Mayur@BIG.com',NULL,'MayurCEO','$2y$12$08O05AF0xVjkoclW2af//ujwGXe6ahTLqcAHn3JnmVo04NwJJ1LxW',NULL,'2025-10-03 17:22:20','2025-10-03 17:22:20'),('0199a9f3-6fdb-7271-8036-136751697044','Mayur Nilesh Barhate','Mayur@gmail.com',NULL,'MayurEMP','$2y$12$fqBNOJ.201ik3gBWOeVP6e.Vue3mSSbsNqIH/TIe9FA3GHcOA288y',NULL,'2025-10-03 17:32:07','2025-10-03 17:32:07'),('0199a9f8-b372-71a3-838c-f254cbad7c74','Sunita','Suninta@gmail.com',NULL,'Sunita','$2y$12$oMUXQ3Aa4EGs8OzaQOIN0uBu7sbFfI9tgm1jn5W6CeNXBZskeKk3e',NULL,'2025-10-03 17:37:52','2025-10-03 17:37:52'),('0199a9ff-b07e-71c5-af3b-46834f15e039','Kajal','Kajal@gmail.com',NULL,'Kajal','$2y$12$NwsP0MyVw0Z3vtk8PmrYm.QlKkuZ4MrTi29eAc8lm441BVX6eu/JG',NULL,'2025-10-03 17:45:30','2025-10-06 12:03:55'),('0199aa0b-86aa-713b-af7b-f4fa083d4346','MayurAdmin','mayurnb2003@gmail.com',NULL,'Admin','$2y$12$q8luGINumz7K7ohNmyZvO.KVskAbANxwv.fkEaIlBAZh31buvVFP6',NULL,'2025-10-03 17:58:26','2025-10-03 17:58:26'),('0199adb9-fc0d-73a0-8e4d-a42beea3dc53','Rita','Rita@gmail.com',NULL,'Rita','$2y$12$Py4tOvxmC.2VUZLm4UvB4eyC/YjlhFtPdf94Z9t5wYbB9sdjsNTR2',NULL,'2025-10-04 11:07:51','2025-10-04 11:07:51'),('0199b840-6922-70d9-8060-3799a45a5e50','bard','bard@gmail.com',NULL,'Bard','$2y$12$uM/MCx3fyOMxpi0kFk.X.u64NHAs71Wl4QARC1VrIW4wR.71ZOJaK',NULL,'2025-10-06 12:10:53','2025-10-06 12:10:53'),('0199b853-fb88-7040-a598-55d7e4d80bb9','Shivam','Shivam@gmail.com',NULL,'Shivam','$2y$12$Kr26mUY3Qcqz5vjQXzmkne48GM/V/v5VnqyoZfZteLZqtFZ9Zv8tq',NULL,'2025-10-06 12:32:15','2025-10-06 12:32:15'),('0199c4de-9651-70c1-8ef0-752c45ffdd4c','Ramanuj','Ramanuj@gmail.com',NULL,'Rama','$2y$12$J/oxYB5Rk9ljGEopxs5ADegOSZiAOAvhKr3p2kuKl0PaPAMk2NA56',NULL,'2025-10-08 22:59:05','2025-10-08 22:59:05'),('02b2a2f4-1890-445a-937f-6b88163a9e95','Hitesh Ramami','hitech@ramami.com',NULL,'hitesh.ramami706','$2y$12$e7H4UjLASSTdfChVPXz7uO/ybOO6EYNmPd2xvs/FpLlHD9O7uAoFe',NULL,'2025-11-30 19:15:26','2025-11-30 19:15:26'),('1aa313f1-8d7a-4399-9ba3-0b843cc54c32','Nancy','Nancy@gamail.com',NULL,'Nancy','$2y$12$IZV1PbNKKckm2V.d6iCww.hK68/tqiO45BP9BuxM9Q2YS7neIVRO6',NULL,'2025-10-22 10:28:10','2025-10-22 10:28:10'),('47b504c0-310b-4936-a888-294846434530','Shivay Mahadev','Shivay@mahadev.com',NULL,'shivay.mahadev746','$2y$12$QCJ0SzXbTgE4wYs//mganeKmd8EQQqWvN8ESSnkuzZpqVh//sySJm',NULL,'2025-11-13 15:55:57','2025-11-13 15:55:57'),('6c7b2bbc-d104-422e-ab26-db53f0df9e5d','Jak','Jak@gmail.com',NULL,'Jak','$2y$12$MLomqSVBn9zZ2TZJr/7AI.5aBELeXtAc0tk1vNdxSfm40uvft6Ev6',NULL,'2025-10-22 10:48:35','2025-10-22 10:48:35'),('6e3f33f3-ea80-4dd1-86de-bc4a7e29622b','Karanav Puti','karanav@puti.com',NULL,'karanav.puti592','$2y$12$GcQYx20iiAXlhPDjOgoCmOkTSoU1oCzMaZOzwFyAwI9dEGlXkUJ3.',NULL,'2025-11-30 19:38:43','2025-11-30 19:38:43'),('746d1f5c-168d-4eac-bd83-176c4b17ff97','Shiv krishna','Shiva@krishna.com',NULL,'shiv.krishna266','$2y$12$ogOnJ4puOIqGw5tiAGe0Xu2yYhEcGOWA6GHym.L2e82q9Rm38EGfu',NULL,'2025-11-04 19:25:02','2025-11-04 19:25:02'),('7c64a808-4f41-456b-aca0-ce225ce8b40b','John','John@gmail.com',NULL,'John','$2y$12$E6nMV1Sm2K.s6n9RsS1wKeChzOWX0cDnb3tPCQvHLKj0RW3r1iWu.',NULL,'2025-10-22 10:21:49','2025-10-22 10:21:49'),('91fa5ce8-fb24-414a-933b-0d740340697e','Haseen Julfhe','haseen@julfhe.com',NULL,'haseen.julfhe825','$2y$12$RQsDbeC5aB8iMnZgkAm3rOGPJ36q9/jrQBaIG7OPOffVGB5Rk.L8y',NULL,'2025-11-26 16:45:43','2025-11-26 16:45:43'),('9dcc63e9-5212-4fdb-a216-f96fef09b90b','merry','merry@gmail.com',NULL,'Merry','$2y$12$bdm0h229YtycDDaSVX4JdeTnMaNxJsK0nsdv6u3uTB4g5CokkuhPG',NULL,'2025-10-22 10:46:53','2025-10-22 10:46:53'),('a19a0835-ada8-11f0-8b09-0242ac110002','shweta','shweta@gmail.com',NULL,'Shweta','$2y$12$eO5QYP8U28xKyGynMYJycOFEuhtaqcNsyL5RAqCusFrv4PNU46zVe',NULL,'2025-10-20 11:33:42','2025-10-20 11:33:42'),('dbe02f48-7beb-4a5f-9a1f-b6615afe8b9a','Rohini Saraf','rohini@saraf.com',NULL,'rohini.saraf637','$2y$12$lJoUHRO219ePAicHAb8fC.MSykaGDTRvFCOcTnB.ajjvEw79zYQiC',NULL,'2025-11-21 19:45:05','2025-11-21 19:45:05'),('e0ee2c3d-3c93-4198-8374-707f4973186c','Roshan','Roshan@gmail.com',NULL,'Roshan','$2y$12$xXrH2xfj7GUL83f9tcJyl.v1zTouO901U9TZPdZG49aHR165dUd1y',NULL,'2025-10-22 10:00:21','2025-10-22 10:00:21'),('ea157c9b-4ea8-4e3a-ac77-271cb9163d9d','Mahesh Dal','mahesh@dal.com',NULL,'mahesh.dal432','$2y$12$y/yRAbnnX3Ge0PrMXFNIB.QHqYg1zGX2qU/tzFJa2jpcoOLvmwEvG',NULL,'2025-11-21 19:54:11','2025-11-21 19:54:11'),('f0f912a8-156c-442a-bdfd-92c796884238','Pankaj Bhor','pankaj@bhor.com',NULL,'pankaj.bhor996','$2y$12$XFwdNaOEXAFAFjhZSX134e/m/kCiPMe.0MyK8fNgq.I14kuKt6lIe',NULL,'2025-11-21 19:54:49','2025-11-21 19:54:49'),('f3a2013a-79da-4259-b0ba-ec9d238a650c','Aditi Garv','aditi@garv',NULL,'aditi.garv865','$2y$12$FW9ZIL3UzTiiTpGMGR89o.upg0SawoPfkJdgz2QnNJJCCjYF3xI3y',NULL,'2025-11-26 16:53:50','2025-11-26 16:53:50');
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

-- Dump completed on 2025-12-01 17:57:49
