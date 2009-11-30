# Sequel Pro dump
# Version 1576
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.37)
# Database: go4c
# Generation Time: 2009-11-30 12:34:14 +0100
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
  `storage_required` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`,`name`,`entire_bank_process`,`entire_bank_knowledge`,`entire_bank_risk`,`entire_bank_information`,`marketing_process`,`marketing_knowledge`,`marketing_risk`,`marketing_information`,`production_process`,`production_knowledge`,`production_risk`,`production_information`,`it_process`,`it_knowledge`,`it_risk`,`it_information`,`costs`,`emp_ext_it required`,`emp_ext_man_required`,`emp_ext_org_required`,`emp_it dev_required`,`emp_man_required`,`emp_serv_sav_required`,`emp_org_required`,`emp_mark_required`,`emp_sm loans_required`,`emp_orig_loans_required`,`emp_serv_loans_required`,`emp_sm sav_required`,`emp_orig_sav_required`,`comm_required`,`server_required`,`storage_required`)
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
	(22,'Process standardization',0,0,0,0,0,0,0,0,0,0,0,0,1,2,2,2,2077500,0,0,4,0,6,4,2,0,4,4,4,4,4,0,0,0),
	(23,'Introduction of a industrial quality management concept',0,0,0,1,0,0,0,1,0,0,0,2,0,0,0,2,1627500,0,0,4,0,6,1,2,0,1,1,1,1,1,0,0,0),
	(24,'Process outsourcing',0,0,1,0,0,0,1,0,0,0,1,0,0,2,1,1,2667500,0,0,8,0,6,1,2,0,1,1,1,1,1,0,0,0),
	(25,'Link-up of all sales channels onto CRM system',0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,978250,2,0,0,8,4,0,1,2,0,0,0,0,0,0,0,0),
	(26,'Trainee programme to aquaint employees with Workflow-Management System',0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,590300,0,0,0,4,2,0,0,0,0,0,0,0,0,0,0,0),
	(27,'Introduction of activity-based costing',0,0,0,0,0,0,0,0,0,0,0,0,3,3,1,1,1357500,0,0,4,0,4,0,2,0,0,0,0,0,0,0,0,0),
	(28,'Digitalization of bank workstation',0,0,1,1,0,1,1,1,0,1,1,1,0,0,1,1,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(29,'Customer data integration',0,0,0,0,0,0,0,1,1,1,1,1,0,0,1,1,1847000,2,0,2,14,4,0,2,4,0,0,0,0,0,0,0,0),
	(30,'Implementation of a Controlling-Tool',1,1,2,2,1,0,0,0,1,0,0,0,1,0,0,0,1594000,4,0,0,8,8,0,4,0,0,0,0,0,0,100,2000,0),
	(31,'Digitalization of business processes',0,0,2,0,0,0,0,0,0,0,2,0,0,0,3,0,1693300,4,0,0,6,6,2,4,0,2,2,2,2,2,100,0,6),
	(32,'Connection/link-up of mobile devices with vital customer data(CRM and consulting tools)',0,0,0,0,0,0,1,0,0,0,1,0,0,0,1,0,887000,2,0,0,6,4,0,2,0,0,0,0,0,0,100,2000,0),
	(33,'Iimplementation of Service Oriented Architecture (SOA)',0,0,0,0,3,3,3,3,0,0,0,0,0,0,0,0,3321000,6,0,2,20,12,0,8,0,0,0,0,0,0,200,8000,0),
	(34,'Knowledge management intiative',1,2,0,0,0,2,0,0,0,2,0,0,0,2,0,0,2130100,0,2,2,8,6,0,4,0,0,0,0,0,0,10,1000,2),
	(35,'Optimization of decision support',3,1,1,1,3,1,0,0,3,0,0,0,3,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(36,'Conceptual design of Information Lifecycle Management',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1065000,0,0,2,2,4,1,2,0,1,1,1,1,1,0,0,0),
	(37,'Implementation of ILM-Tools',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1108100,2,0,0,12,4,0,2,0,0,0,0,0,0,40,2000,2),
	(38,'Implementation of Information Lifecycle Management',0,0,2,0,0,0,3,3,0,0,2,0,0,0,2,3,1900600,2,0,2,8,6,1,4,4,1,1,1,1,1,40,2000,2),
	(39,'Definition of >feedback-capable< processes',0,0,0,0,0,0,0,0,0,0,2,2,0,0,1,0,870000,0,0,2,4,2,1,0,0,1,1,1,1,1,0,0,0),
	(40,'Value-based Customer Management (VBM)',0,0,0,0,0,0,0,0,2,2,2,3,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(42,'Introduction of mobile workstation',0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,507500,0,0,0,4,2,0,6,0,0,0,0,0,0,0,0,0),
	(43,'Prompt customer value determination',0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,1372500,0,2,0,0,6,0,0,0,0,0,0,0,0,0,0,0),
	(44,'Integration of Business Intelligence',3,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,2387600,2,0,2,20,10,0,4,0,0,0,0,0,0,100,2000,2),
	(45,'Business-Process-Change',0,0,3,0,0,0,3,0,0,0,3,0,0,0,3,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(46,'Multi-Channel-Strategy',0,0,1,0,0,0,1,0,0,3,3,3,0,1,1,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0),
	(47,'Consolidation & integration of marketing tools for CRM',0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,1,832500,2,0,0,6,2,0,2,2,0,0,0,0,0,40,2000,0),
	(48,'Arrangement of multi-channel-compatible business processes',0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,1353750,0,0,4,2,2,0,1,2,0,0,0,0,0,0,0,0),
	(49,'Business Process Reengineering',0,0,3,0,0,0,3,0,0,0,3,0,0,3,3,3,2995000,0,2,4,0,12,2,4,0,2,2,2,2,2,0,0,0),
	(50,'BPR preparation: process definition',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2335000,0,2,4,0,6,0,4,0,0,0,0,0,0,0,0,0),
	(53,'Standardization of IT architecture/environment',0,0,0,0,2,2,2,3,0,0,0,0,0,0,0,0,3366000,6,0,2,24,8,2,4,0,2,2,2,2,2,200,2000,0),
	(54,'Software (SW) development of new individual solutions',0,0,0,0,0,2,3,2,0,0,0,0,0,0,2,0,3968000,8,0,2,16,8,6,4,0,6,6,6,6,6,200,2000,0),
	(56,'Integration of innovative IT-conceptions',0,0,0,0,0,3,3,3,0,0,0,0,0,0,0,0,120000,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
