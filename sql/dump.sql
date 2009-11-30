-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: go4d
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
  `emp_ext_it required` int(11) DEFAULT '0',
  `emp_ext_man_required` int(11) DEFAULT '0',
  `emp_ext_org_required` int(11) DEFAULT '0',
  `emp_it dev_required` int(11) DEFAULT '0',
  `emp_man_required` int(11) DEFAULT '0',
  `emp_serv_sav_required` int(11) DEFAULT '0',
  `emp_org_required` int(11) DEFAULT '0',
  `emp_mark_required` int(11) DEFAULT '0',
  `emp_sm loans_required` int(11) DEFAULT '0',
  `emp_orig_loans_required` int(11) DEFAULT '0',
  `emp_serv_loans_required` int(11) DEFAULT '0',
  `emp_sm sav_required` int(11) DEFAULT '0',
  `emp_orig_sav_required` int(11) DEFAULT '0',
  `comm_required` int(11) DEFAULT '0',
  `server_required` int(11) DEFAULT '0',
  `storage_required` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Optimization of division of work amongst front- and backoffice',0,0,0,0,0,0,0,0,0,0,0,0,0,1,3,2,1627500,0,0,4,0,6,1,2,0,1,1,1,1,1,0,0,0),(2,'Design of new slim processes',0,0,0,0,0,0,0,0,0,0,0,0,0,2,3,1,1807500,0,0,4,0,4,2,2,0,4,4,4,2,2,0,0,0),(3,'Process automation by the use of Workflow Management Systems',0,0,0,0,0,0,0,2,0,0,2,0,0,0,3,2,1639500,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,'Optimisation of interfaces amongst Front- and Backoffice',0,0,0,0,0,0,3,0,0,0,0,0,0,0,3,0,939500,2,0,0,8,4,0,2,0,0,0,0,0,0,0,0,0),(5,'Definition of product standards',0,0,2,0,0,0,2,0,0,2,2,0,0,0,2,0,1765000,0,0,0,0,8,0,12,16,4,0,0,4,0,0,0,0),(6,'Cross- und Upselling programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3455000,0,4,0,0,12,2,8,12,6,0,2,6,0,0,0,0),(7,'Customer retention programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1900000,0,0,0,0,8,8,6,10,8,0,8,8,0,0,0,0),(8,'CRM-Implementation',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2491000,6,0,0,20,10,0,4,0,0,0,0,0,0,100,2000,0),(9,'Introduction of enhanced consulting tools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2101500,4,0,0,18,10,0,4,0,0,0,0,0,0,100,2000,0),(10,'Trainee programme for sales staff in order to cope with CRM- and consultingtools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,710300,0,0,0,2,4,0,10,0,0,0,0,0,0,0,2000,1),(11,'Expansion of internet Sales',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1037800,0,0,0,0,4,0,4,16,0,0,0,0,0,100,1000,1),(12,'Implementation of a new internet portal',0,0,0,0,0,1,1,2,0,0,0,0,0,0,0,0,3098000,8,0,0,24,12,0,4,0,0,0,0,0,0,200,2000,0),(13,'Mobile/ flexible Sales',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(14,'Indroduction of Life-Assistance-Banking',0,0,0,0,0,0,0,0,0,3,2,2,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(15,'Indroduction of Community-Banking',0,0,0,0,0,0,0,0,0,2,2,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(16,'Indroduction of Convenience-Banking',0,0,0,0,0,0,0,0,0,2,3,0,0,0,2,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(52,'Concentration upon core capabilities',0,1,0,1,0,1,0,0,0,1,0,1,0,1,1,1,2777500,0,2,6,0,6,0,2,0,0,0,0,0,0,0,0,0),(19,'Coaching-programme to convey enhanced sales culture to sales staff',0,0,0,0,0,0,0,0,0,2,1,0,0,0,0,0,1005000,0,0,0,0,4,0,6,6,6,0,0,6,0,0,0,0),(20,'Upgrading monetary and nonmonetary incentive models for sales staff',0,0,0,0,0,0,0,0,0,0,2,0,0,0,1,0,1022500,0,0,0,0,8,0,6,8,0,0,0,0,0,0,0,0),(41,'Implementation of integrarted Data Warehouse',0,0,0,0,0,2,2,2,0,0,0,0,0,0,0,0,2054600,4,0,0,20,8,0,4,0,0,0,0,0,0,100,0,2),(51,'BPR preparation: process analysis',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2485000,0,2,4,0,6,1,4,0,1,1,1,1,1,0,0,0),(55,'Alignment of IT processes onto ITIL reference processes',0,0,0,0,2,2,2,3,0,0,0,0,0,0,0,0,3494000,4,0,4,20,12,0,8,0,0,0,0,0,0,100,2000,0),(17,'Indroduction of High-Tech-Banking',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(18,'Active adress to the custermers',0,0,0,0,0,0,0,0,0,2,1,2,0,0,0,0,847500,0,0,0,0,2,0,0,10,6,0,0,6,0,200,0,0),(21,'Industrialization of the business/enterprise',0,0,2,0,0,0,3,0,0,0,1,0,0,0,3,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(22,'Process standardization',0,0,0,0,0,0,0,0,0,0,0,0,1,2,2,2,2077500,0,0,4,0,6,4,2,0,4,4,4,4,4,0,0,0),(23,'Introduction of a industrial quality management concept',0,0,0,1,0,0,0,1,0,0,0,2,0,0,0,2,1627500,0,0,4,0,6,1,2,0,1,1,1,1,1,0,0,0),(24,'Process outsourcing',0,0,1,0,0,0,1,0,0,0,1,0,0,2,1,1,2667500,0,0,8,0,6,1,2,0,1,1,1,1,1,0,0,0),(25,'Link-up of all sales channels onto CRM system',0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,978250,2,0,0,8,4,0,1,2,0,0,0,0,0,0,0,0),(26,'Trainee programme to aquaint employees with Workflow-Management System',0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,590300,0,0,0,4,2,0,0,0,0,0,0,0,0,0,0,0),(27,'Introduction of activity-based costing',0,0,0,0,0,0,0,0,0,0,0,0,3,3,1,1,1357500,0,0,4,0,4,0,2,0,0,0,0,0,0,0,0,0),(28,'Digitalization of bank workstation',0,0,1,1,0,1,1,1,0,1,1,1,0,0,1,1,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(29,'Customer data integration',0,0,0,0,0,0,0,1,1,1,1,1,0,0,1,1,1847000,2,0,2,14,4,0,2,4,0,0,0,0,0,0,0,0),(30,'Implementation of a Controlling-Tool',1,1,2,2,1,0,0,0,1,0,0,0,1,0,0,0,1594000,4,0,0,8,8,0,4,0,0,0,0,0,0,100,2000,0),(31,'Digitalization of business processes',0,0,2,0,0,0,0,0,0,0,2,0,0,0,3,0,1693300,4,0,0,6,6,2,4,0,2,2,2,2,2,100,0,6),(32,'Connection/link-up of mobile devices with vital customer data(CRM and consulting tools)',0,0,0,0,0,0,1,0,0,0,1,0,0,0,1,0,887000,2,0,0,6,4,0,2,0,0,0,0,0,0,100,2000,0),(33,'Iimplementation of Service Oriented Architecture (SOA)',0,0,0,0,3,3,3,3,0,0,0,0,0,0,0,0,3321000,6,0,2,20,12,0,8,0,0,0,0,0,0,200,8000,0),(34,'Knowledge management intiative',1,2,0,0,0,2,0,0,0,2,0,0,0,2,0,0,2130100,0,2,2,8,6,0,4,0,0,0,0,0,0,10,1000,2),(35,'Optimization of decision support',3,1,1,1,3,1,0,0,3,0,0,0,3,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(36,'Conceptual design of Information Lifecycle Management',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1065000,0,0,2,2,4,1,2,0,1,1,1,1,1,0,0,0),(37,'Implementation of ILM-Tools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1108100,2,0,0,12,4,0,2,0,0,0,0,0,0,40,2000,2),(38,'Implementation of Information Lifecycle Management',0,0,2,0,0,0,3,3,0,0,2,0,0,0,2,3,1900600,2,0,2,8,6,1,4,4,1,1,1,1,1,40,2000,2),(39,'Definition of >feedback-capable< processes',0,0,0,0,0,0,0,0,0,0,2,2,0,0,1,0,870000,0,0,2,4,2,1,0,0,1,1,1,1,1,0,0,0),(40,'Value-based Customer Management (VBM)',0,0,0,0,0,0,0,0,2,2,2,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(42,'Introduction of mobile workstation',0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,507500,0,0,0,4,2,0,6,0,0,0,0,0,0,0,0,0),(43,'Prompt customer value determination',0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,1372500,0,2,0,0,6,0,0,0,0,0,0,0,0,0,0,0),(44,'Integration of Business Intelligence',3,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,2387600,2,0,2,20,10,0,4,0,0,0,0,0,0,100,2000,2),(45,'Business-Process-Change',0,0,3,0,0,0,3,0,0,0,3,0,0,0,3,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(46,'Multi-Channel-Strategy',0,0,1,0,0,0,1,0,0,3,3,3,0,1,1,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),(47,'Consolidation & integration of marketing tools for CRM',0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,1,832500,2,0,0,6,2,0,2,2,0,0,0,0,0,40,2000,0),(48,'Arrangement of multi-channel-compatible business processes',0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,1353750,0,0,4,2,2,0,1,2,0,0,0,0,0,0,0,0),(49,'Business Process Reengineering',0,0,3,0,0,0,3,0,0,0,3,0,0,3,3,3,2995000,0,2,4,0,12,2,4,0,2,2,2,2,2,0,0,0),(50,'BPR preparation: process definition',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2335000,0,2,4,0,6,0,4,0,0,0,0,0,0,0,0,0),(53,'Standardization of IT architecture/environment',0,0,0,0,2,2,2,3,0,0,0,0,0,0,0,0,3366000,6,0,2,24,8,2,4,0,2,2,2,2,2,200,2000,0),(54,'Software (SW) development of new individual solutions',0,0,0,0,0,2,3,2,0,0,0,0,0,0,2,0,3968000,8,0,2,16,8,6,4,0,6,6,6,6,6,200,2000,0),(56,'Integration of innovative IT-conceptions',0,0,0,0,0,3,3,3,0,0,0,0,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0);
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
  `done` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wanted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=539 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_users`
--

LOCK TABLES `projects_users` WRITE;
/*!40000 ALTER TABLE `projects_users` DISABLE KEYS */;
INSERT INTO `projects_users` VALUES (538,55,1,0,0),(537,52,1,0,0),(536,51,1,0,0),(535,50,1,0,0),(534,49,1,0,0),(533,41,1,0,0),(532,22,1,0,0),(531,21,1,0,0),(530,20,1,0,0),(529,19,1,0,0),(528,18,1,0,0),(527,17,1,0,0),(526,16,1,0,0),(525,15,1,0,0),(524,14,1,0,0),(523,13,1,0,0),(522,12,1,0,0),(521,11,1,0,0),(520,10,1,0,0),(519,9,1,0,0),(518,8,1,0,0),(517,7,1,0,0),(516,6,1,0,0),(515,5,1,0,0),(514,4,1,0,0),(513,3,1,0,0),(512,2,1,1,0),(511,1,1,0,1);
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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saved_calculus` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'team01','48994eb64166282d4414c61cb787736e8c09d3a4','a:2:{s:5:\"costs\";d:4332000;s:10:\"projectIds\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";i:3;s:1:\"5\";}}');
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

-- Dump completed on 2009-11-30 17:43:18
