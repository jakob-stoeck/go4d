-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: go4c
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5

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
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `entire_bank_process` int(11) DEFAULT '0',
  `entire_bank_knowledge` int(11) DEFAULT '0',
  `entire_bank_risk` int(11) DEFAULT '0',
  `entire_bank_information` int(11) DEFAULT '0',
  `marketing_process` int(11) DEFAULT '0',
  `marketing_knowledge` int(11) DEFAULT '0',
  `marketing_risk` int(11) DEFAULT '0',
  `marketing_information` int(11) DEFAULT '0',
  `production_process` int(11) DEFAULT '0',
  `production_knowledge` int(11) DEFAULT '0',
  `production_risk` int(11) DEFAULT '0',
  `production_information` int(11) DEFAULT '0',
  `it_process` int(11) DEFAULT '0',
  `it_knowledge` int(11) DEFAULT '0',
  `it_risk` int(11) DEFAULT '0',
  `it_information` int(11) DEFAULT '0',
  `costs` int(11) DEFAULT '0',
  `Emp. Ext. IT required` int(11) DEFAULT '0',
  `Emp. Ext. Man. required` int(11) DEFAULT '0',
  `Emp. Ext. Org. required` int(11) DEFAULT '0',
  `Emp. IT Dev. required` int(11) DEFAULT '0',
  `Emp. Man. required` int(11) DEFAULT '0',
  `Emp. Serv. Sav. required` int(11) DEFAULT '0',
  `Emp. Org. required` int(11) DEFAULT '0',
  `Emp. Mark. required` int(11) DEFAULT '0',
  `Emp. S&M Loans required` int(11) DEFAULT '0',
  `Emp. Orig. Loans required` int(11) DEFAULT '0',
  `Emp. Serv. Loans required` int(11) DEFAULT '0',
  `Emp. S&M Sav. required` int(11) DEFAULT '0',
  `Emp. Orig. Sav. required` int(11) DEFAULT '0',
  `Comm. required` int(11) DEFAULT '0',
  `Server required` int(11) DEFAULT '0',
  `Storage required` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Optimization of division of work amongst front- and backoffice',0,0,0,0,0,0,0,0,0,0,0,0,0,1,3,2,1627500,0,0,4,0,6,1,2,0,1,1,1,1,1,0,0,0),(2,'Design of new slim processes',0,0,0,0,0,0,0,0,0,0,0,0,0,2,3,1,1807500,0,0,4,0,4,2,2,0,4,4,4,2,2,0,0,0),(3,'Process automation by the use of Workflow Management Systems',0,0,0,0,0,0,0,2,0,0,2,0,0,0,3,2,1639500,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,'Optimisation of interfaces amongst Front- and Backoffice',0,0,0,0,0,0,3,0,0,0,0,0,0,0,3,0,939500,2,0,0,8,4,0,2,0,0,0,0,0,0,0,0,0),(5,'Definition of product standards',0,0,2,0,0,0,2,0,0,2,2,0,0,0,2,0,1765000,0,0,0,0,8,0,12,16,4,0,0,4,0,0,0,0),(6,'Cross- und Upselling programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3455000,0,4,0,0,12,2,8,12,6,0,2,6,0,0,0,0),(7,'Customer retention programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1900000,0,0,0,0,8,8,6,10,8,0,8,8,0,0,0,0),(8,'CRM-Implementation',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2491000,6,0,0,20,10,0,4,0,0,0,0,0,0,100,2000,0),(9,'Introduction of enhanced consulting tools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2101500,4,0,0,18,10,0,4,0,0,0,0,0,0,100,2000,0),(10,'Trainee programme for sales staff in order to cope with CRM- and consultingtools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,710300,0,0,0,2,4,0,10,0,0,0,0,0,0,0,2000,1),(11,'Expansion of internet Sales',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1037800,0,0,0,0,4,0,4,16,0,0,0,0,0,100,1000,1),(12,'Implementation of a new internet portal',0,0,0,0,0,1,1,2,0,0,0,0,0,0,0,0,3098000,8,0,0,24,12,0,4,0,0,0,0,0,0,200,2000,0),(13,'Mobile/ flexible Sales',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(14,'Indroduction of Life-Assistance-Banking',0,0,0,0,0,0,0,0,0,3,2,2,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(15,'Indroduction of Community-Banking',0,0,0,0,0,0,0,0,0,2,2,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(16,'Indroduction of Convenience-Banking',0,0,0,0,0,0,0,0,0,2,3,0,0,0,2,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(52,'Concentration upon core capabilities',0,1,0,1,0,1,0,0,0,1,0,1,0,1,1,1,2777500,0,2,6,0,6,0,2,0,0,0,0,0,0,0,0,0),(19,'Coaching-programme to convey enhanced sales culture to sales staff',0,0,0,0,0,0,0,0,0,2,1,0,0,0,0,0,1005000,0,0,0,0,4,0,6,6,6,0,0,6,0,0,0,0),(20,'Upgrading monetary and nonmonetary incentive models for sales staff',0,0,0,0,0,0,0,0,0,0,2,0,0,0,1,0,1022500,0,0,0,0,8,0,6,8,0,0,0,0,0,0,0,0),(41,'Implementation of integrarted Data Warehouse',0,0,0,0,0,2,2,2,0,0,0,0,0,0,0,0,2054600,4,0,0,20,8,0,4,0,0,0,0,0,0,100,0,2),(51,'BPR preparation: process analysis',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2485000,0,2,4,0,6,1,4,0,1,1,1,1,1,0,0,0),(55,'Alignment of IT processes onto ITIL reference processes',0,0,0,0,2,2,2,3,0,0,0,0,0,0,0,0,3494000,4,0,4,20,12,0,8,0,0,0,0,0,0,100,2000,0),(17,'Indroduction of High-Tech-Banking',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(18,'Active adress to the custermers',0,0,0,0,0,0,0,0,0,2,1,2,0,0,0,0,847500,0,0,0,0,2,0,0,10,6,0,0,6,0,200,0,0),(21,'Industrialization of the business/enterprise',0,0,2,0,0,0,3,0,0,0,1,0,0,0,3,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(22,'Process standardization',0,0,0,0,0,0,0,0,0,0,0,0,1,2,2,2,2077500,0,0,4,0,6,4,2,0,4,4,4,4,4,0,0,0);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_users`
--

DROP TABLE IF EXISTS `projects_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  `wanted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_users`
--

LOCK TABLES `projects_users` WRITE;
/*!40000 ALTER TABLE `projects_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_preceding_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,2,1,'req'),(2,4,1,'req'),(3,5,2,'constraint'),(4,2,3,'req'),(5,22,3,'req'),(6,26,3,'constraint'),(7,29,6,'req'),(8,29,7,'constraint'),(9,10,8,'constraint'),(10,10,9,'constraint'),(11,12,11,'req'),(12,39,11,'req'),(13,32,13,'req'),(14,6,14,'req'),(15,19,14,'constraint'),(16,20,14,'constraint'),(17,7,14,'constraint'),(18,6,15,'req'),(19,19,15,'constraint'),(20,20,15,'constraint'),(21,18,16,'req'),(22,5,16,'req'),(23,19,16,'constraint'),(24,20,16,'constraint'),(25,11,17,'constraint'),(26,19,17,'constraint'),(27,20,17,'constraint'),(28,29,18,'req'),(29,24,21,'req'),(30,23,21,'constraint'),(31,27,21,'constraint'),(32,52,21,'constraint'),(33,5,22,'constraint'),(34,2,24,'req'),(35,22,24,'req'),(36,47,25,'req'),(37,3,28,'req'),(38,31,28,'constraint'),(39,8,29,'req'),(40,9,29,'req'),(41,44,30,'req'),(42,29,32,'req'),(43,42,32,'req'),(44,53,33,'req'),(45,54,33,'req'),(46,29,35,'req'),(47,30,35,'req'),(48,34,35,'constraint'),(49,36,37,'req'),(50,37,38,'req'),(51,2,40,'req'),(52,43,40,'req'),(53,44,43,'req'),(54,41,44,'req'),(55,3,45,'req'),(56,1,45,'constraint'),(57,25,46,'req'),(58,29,47,'req'),(59,48,47,'req'),(60,50,49,'req'),(61,51,50,'req'),(62,24,52,'constraint'),(63,2,53,'req'),(64,22,53,'req'),(65,38,56,'req'),(66,34,56,'constraint'),(67,55,56,'constraint');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2009-11-27 21:07:39
