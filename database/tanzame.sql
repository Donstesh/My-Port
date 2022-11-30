-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tanzame
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_name` varchar(255) NOT NULL,
  `about_title` text NOT NULL,
  `about_desc` text NOT NULL,
  `about_photo` varchar(255) NOT NULL,
  `about_age` varchar(100) NOT NULL,
  `about_free` varchar(255) NOT NULL,
  `about_email` varchar(255) NOT NULL,
  `about_address` varchar(255) NOT NULL,
  `about_lang` varchar(255) NOT NULL,
  `about_exp` varchar(255) NOT NULL,
  `about_skill` varchar(255) NOT NULL,
  `about_exp_yrs` varchar(255) NOT NULL,
  `about_project` varchar(255) NOT NULL,
  `about_awards` varchar(255) NOT NULL,
  `about_happy` varchar(100) NOT NULL,
  `about_button` varchar(255) NOT NULL,
  `about_hire` varchar(255) NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'Faith Evans','Software Developerr','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','about-file-1649254119.png','25','Available','faith@gmail.com','Dodoma, Tanzania','Swahili, English','4 Years','Front-End & Backed','23 Years','755','784','56','tanzahost.com','0742552286');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` text NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_photo` varchar(100) NOT NULL,
  `blog_status` int(11) NOT NULL,
  `blog_date_created` datetime NOT NULL,
  `blog_date_updated` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (3,'kgjjhgkjgj','tyjyjyjj','default.png',1,'2022-04-05 23:33:16','0000-00-00 00:00:00'),(4,'eyeuryjtyj','jjjkukkkuuytuyrtr5yutuuiuiuiui','default.png',1,'2022-04-05 23:35:55','0000-00-00 00:00:00'),(5,'ryuyjyjyjj','jjujukjkjj','default.png',1,'2022-04-05 23:53:12','0000-00-00 00:00:00'),(6,'bibi','hhhthththth','default.png',1,'2022-04-05 23:53:24','0000-00-00 00:00:00'),(7,'fdggdggh','hhhhhhht','blog-photo-1649186558.png',1,'2022-04-06 00:22:38','0000-00-00 00:00:00'),(8,'bgdhghghdthghgh','Introduction​In this tutorial, we will have a look at a few important tasks to perform in the server for initial set up of the server and basic server hardening. These steps will increase the security of your server as well as usability. We will perform a series of tasks such as creating a new sudo user, updating packages, setting timezone and securing SSH server, etc.&amp;nbsp;Prerequisites​Cloud VPS with CentOS 7 installed.Step 1: Log in via SSH​When your server is created TanzaHost sends you an email with the default username, password, and server IP address. For first time login, you need to use those credentials to log in to your server.&amp;nbsp;Step 2: Change Logged in User Password​Upon the first login, it is very important to change the password of the current user. Use the following command for the same.passwdIt will ask you to provide your existing password unless you are logged in as the root user.&amp;nbsp;Step 3: Create a New Sudo User​If you are logged in as root user, it is recommended to create a sudo user. If you are logged in as sudo user with username in format client_xxxxxx_x, which TanzaHost already created for you, it is still a best practice to create a new sudo user.A Sudo user is a user having superuser privileges. In simple terms, this user can perform administrative commands and tasks as the root user.','blog-photo-1649186620.jpeg',1,'2022-04-06 00:23:40','0000-00-00 00:00:00'),(9,'cbfghhf','jfjjjjyj','default.png',1,'2022-04-06 00:23:52','0000-00-00 00:00:00'),(10,'jkkukryyyertretrtt','ettrtehythryjyrjyjy','default.png',1,'2022-04-06 00:24:02','0000-00-00 00:00:00'),(12,'tttttttttttttttttttttt','wertyuisadfg','default.png',0,'2022-04-06 00:24:26','0000-00-00 00:00:00'),(54,'Initial Server Setup with CentOS 7','Introduction​In this tutorial, we will have a look at a few important tasks to perform in the server for initial set up of the server and basic server hardening.','default.png',1,'2022-04-05 23:26:52','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_info` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_fb` varchar(255) NOT NULL,
  `contact_tw` varchar(255) NOT NULL,
  `contact_insta` varchar(255) NOT NULL,
  `contact_wts` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','support@tanzahost.com','+123-456-7890','Dodoma, Tanzania','tanzahost','AlmirFrances','_tanzahost','255742552286'),(3,'','','','','','','',''),(4,'','','7878788','hghghgh','fghfhfghh','ghghhdg','ghghhghgf','hfhfgghg');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `education_year` varchar(255) NOT NULL,
  `education_title` varchar(255) NOT NULL,
  `education_desc` text NOT NULL,
  `education_status` varchar(11) NOT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (2,'2017 - 2018','Graphics Design','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','1'),(4,'2017 - 2018','Back-End Development','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','1'),(44,'2017 - 2018','Front-End Development','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','1'),(45,'2018 - 2019','Software Development','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','1');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_views`
--

DROP TABLE IF EXISTS `page_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_views` (
  `page_id` int(11) NOT NULL,
  `visitor_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_views`
--

LOCK TABLES `page_views` WRITE;
/*!40000 ALTER TABLE `page_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_views`
--

DROP TABLE IF EXISTS `pages_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_views` (
  `id` int(11) NOT NULL,
  `total_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_views`
--

LOCK TABLES `pages_views` WRITE;
/*!40000 ALTER TABLE `pages_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portifolio`
--

DROP TABLE IF EXISTS `portifolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portifolio` (
  `portifolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `portifolio_title` varchar(255) NOT NULL,
  `portifolio_desc` text NOT NULL,
  `portifolio_photo` varchar(100) NOT NULL,
  `portifolio_status` int(11) NOT NULL,
  `p_created` datetime NOT NULL,
  `p_updated` datetime NOT NULL,
  `portifolio_url` varchar(255) NOT NULL,
  PRIMARY KEY (`portifolio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portifolio`
--

LOCK TABLES `portifolio` WRITE;
/*!40000 ALTER TABLE `portifolio` DISABLE KEYS */;
INSERT INTO `portifolio` VALUES (14,'Blog Dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','../portifolio-photo-1649334414.jpg',1,'2022-04-07 00:25:05','0000-00-00 00:00:00','tanzahost.com'),(23,'App Dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','portifolio-photo-1649334441.jpg',1,'2022-04-07 17:27:21','0000-00-00 00:00:00','tanzahost.com'),(24,'Logo','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','portifolio-photo-1649334485.jpg',1,'2022-04-07 17:28:05','0000-00-00 00:00:00','tanzahost.com'),(25,'Recording','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','portifolio-photo-1649334558.jpg',1,'2022-04-07 17:29:18','0000-00-00 00:00:00','tanzahost.com'),(26,'Banking','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','portifolio-photo-1649334594.jpg',1,'2022-04-07 17:29:54','0000-00-00 00:00:00','tanzahost.com'),(27,'Adimin Dev','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','portifolio-photo-1649334632.jpg',1,'2022-04-07 17:30:32','0000-00-00 00:00:00','tanzahost.com');
/*!40000 ALTER TABLE `portifolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `services_title` text NOT NULL,
  `services_desc` text NOT NULL,
  `services_photo` varchar(100) NOT NULL,
  `services_status` int(11) NOT NULL,
  `services_date_created` datetime NOT NULL,
  `services_date_updated` datetime NOT NULL,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (2,'Masaka Frances','Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Distinctio, Praesentium.','user.png',1,'2022-04-05 11:12:25','0000-00-00 00:00:00'),(7,'App Development','Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Distinctio, Praesentium.','default.png',1,'2022-04-06 06:50:18','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `site_description` text NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_from_title` varchar(255) NOT NULL,
  `seo_meta_title` varchar(100) NOT NULL,
  `seo_meta_tags` varchar(100) NOT NULL,
  `seo_meta_description` varchar(250) NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'TanzaMe','Best PHP Personal Portfolio Script','logo-file-1649334923.png','support@tanzahost.com','TanzaMe','tanzame','tanzame,tanzahost,tanzaweb,portfolio,personal,codecanyon,','tanzame');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `reg_token` varchar(255) NOT NULL,
  `token_time` varchar(255) NOT NULL,
  `user_date_created` datetime NOT NULL,
  `user_date_updated` datetime NOT NULL,
  `user_last_login` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Almir Frances','support@tanzahost.com','admin','$2y$10$9MvVKHuiNtuNiq4d89HyEuU3Yz49VqadjU2aXuXu3ngORsruOksYC','admin-photo-1649275516.jpg',1,'8c2ca882e50bf439f11a9749a86c6caa','1649078730','2022-04-04 18:25:30','2022-04-07 01:05:16','2022-04-04 18:26:08'),(37,'Faith Evans','support@tanzahost.co.tz','masaka','$2y$10$BY972POtbGbp4uA3F/AYCeZcPmD4fj7FMXp.8rX3ZueyBvxTT9S5m','admin-photo-1649275215.png',1,'','','2022-04-04 18:45:39','2022-04-07 15:55:16','2022-04-07 17:22:24'),(38,'Tanzahost LLC','support@tanzaweb.com','tanzaweb','$2y$10$fZVTdoXfiDpTa1/VcB0.4OF.aAw5wGpNu6Ssj/WrMTwDk6k3W9T/u','default.png',1,'','','2022-04-07 17:39:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
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

-- Dump completed on 2022-04-07  5:40:59
