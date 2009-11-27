# Sequel Pro dump
# Version 1563
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.37)
# Database: go4c
# Generation Time: 2009-11-27 21:28:59 +0100
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) DEFAULT NULL,
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
  `Storage required` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`,`name`,`entire_bank_process`,`entire_bank_knowledge`,`entire_bank_risk`,`entire_bank_information`,`marketing_process`,`marketing_knowledge`,`marketing_risk`,`marketing_information`,`production_process`,`production_knowledge`,`production_risk`,`production_information`,`it_process`,`it_knowledge`,`it_risk`,`it_information`,`costs`,`Emp. Ext. IT required`,`Emp. Ext. Man. required`,`Emp. Ext. Org. required`,`Emp. IT Dev. required`,`Emp. Man. required`,`Emp. Serv. Sav. required`,`Emp. Org. required`,`Emp. Mark. required`,`Emp. S&M Loans required`,`Emp. Orig. Loans required`,`Emp. Serv. Loans required`,`Emp. S&M Sav. required`,`Emp. Orig. Sav. required`,`Comm. required`,`Server required`,`Storage required`)
VALUES
	(1,'Optimization of division of work amongst front- and backoffice',0,0,0,0,0,0,0,0,0,0,0,0,0,1,3,2,1627500,0,0,4,0,6,1,2,0,1,1,1,1,1,0,0,0),
	(2,'Design of new slim processes',0,0,0,0,0,0,0,0,0,0,0,0,0,2,3,1,1807500,0,0,4,0,4,2,2,0,4,4,4,2,2,0,0,0),
	(3,'Process automation by the use of Workflow Management Systems',0,0,0,0,0,0,0,2,0,0,2,0,0,0,3,2,1639500,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
	(4,'Optimisation of interfaces amongst Front- and Backoffice',0,0,0,0,0,0,3,0,0,0,0,0,0,0,3,0,939500,2,0,0,8,4,0,2,0,0,0,0,0,0,0,0,0),
	(5,'Definition of product standards',0,0,2,0,0,0,2,0,0,2,2,0,0,0,2,0,1765000,0,0,0,0,8,0,12,16,4,0,0,4,0,0,0,0),
	(6,'Cross- und Upselling programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3455000,0,4,0,0,12,2,8,12,6,0,2,6,0,0,0,0),
	(7,'Customer retention programme',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1900000,0,0,0,0,8,8,6,10,8,0,8,8,0,0,0,0),
	(8,'CRM-Implementation',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2491000,6,0,0,20,10,0,4,0,0,0,0,0,0,100,2000,0),
	(9,'Introduction of enhanced consulting tools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2101500,4,0,0,18,10,0,4,0,0,0,0,0,0,100,2000,0),
	(10,'Trainee programme for sales staff in order to cope with CRM- and consultingtools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,710300,0,0,0,2,4,0,10,0,0,0,0,0,0,0,2000,1),
	(11,'Expansion of internet Sales',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1037800,0,0,0,0,4,0,4,16,0,0,0,0,0,100,1000,1),
	(12,'Implementation of a new internet portal',0,0,0,0,0,1,1,2,0,0,0,0,0,0,0,0,3098000,8,0,0,24,12,0,4,0,0,0,0,0,0,200,2000,0),
	(13,'Mobile/ flexible Sales',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(14,'Indroduction of Life-Assistance-Banking',0,0,0,0,0,0,0,0,0,3,2,2,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(15,'Indroduction of Community-Banking',0,0,0,0,0,0,0,0,0,2,2,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(16,'Indroduction of Convenience-Banking',0,0,0,0,0,0,0,0,0,2,3,0,0,0,2,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(52,'Concentration upon core capabilities',0,1,0,1,0,1,0,0,0,1,0,1,0,1,1,1,2777500,0,2,6,0,6,0,2,0,0,0,0,0,0,0,0,0),
	(19,'Coaching-programme to convey enhanced sales culture to sales staff',0,0,0,0,0,0,0,0,0,2,1,0,0,0,0,0,1005000,0,0,0,0,4,0,6,6,6,0,0,6,0,0,0,0),
	(20,'Upgrading monetary and nonmonetary incentive models for sales staff',0,0,0,0,0,0,0,0,0,0,2,0,0,0,1,0,1022500,0,0,0,0,8,0,6,8,0,0,0,0,0,0,0,0),
	(41,'Implementation of integrarted Data Warehouse',0,0,0,0,0,2,2,2,0,0,0,0,0,0,0,0,2054600,4,0,0,20,8,0,4,0,0,0,0,0,0,100,0,2),
	(51,'BPR preparation: process analysis',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2485000,0,2,4,0,6,1,4,0,1,1,1,1,1,0,0,0),
	(55,'Alignment of IT processes onto ITIL reference processes',0,0,0,0,2,2,2,3,0,0,0,0,0,0,0,0,3494000,4,0,4,20,12,0,8,0,0,0,0,0,0,100,2000,0),
	(17,'Indroduction of High-Tech-Banking',0,0,0,0,0,0,0,0,0,3,3,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(18,'Active adress to the custermers',0,0,0,0,0,0,0,0,0,2,1,2,0,0,0,0,847500,0,0,0,0,2,0,0,10,6,0,0,6,0,200,0,0),
	(21,'Industrialization of the business/enterprise',0,0,2,0,0,0,3,0,0,0,1,0,0,0,3,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(22,'Process standardization',0,0,0,0,0,0,0,0,0,0,0,0,1,2,2,2,2077500,0,0,4,0,6,4,2,0,4,4,4,4,4,0,0,0);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
