-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.73-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema ress
--

CREATE DATABASE IF NOT EXISTS ress;
USE ress;

--
-- Definition of table `complains`
--

DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Culprit` varchar(45) DEFAULT NULL,
  `Section` varchar(45) DEFAULT NULL,
  `Explanation` varchar(45) DEFAULT NULL,
  `RDate` date DEFAULT NULL,
  `Employee` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complains`
--

/*!40000 ALTER TABLE `complains` DISABLE KEYS */;
INSERT INTO `complains` (`Id`,`Date`,`Culprit`,`Section`,`Explanation`,`RDate`,`Employee`,`Status`) VALUES 
 (1,'2022-08-09','Jane','1','sawa','2022-08-11','287PC257','Closed'),
 (2,'2022-08-10','jane','1','fff','2022-08-11','287PC257','Pending');
/*!40000 ALTER TABLE `complains` ENABLE KEYS */;


--
-- Definition of table `empleave`
--

DROP TABLE IF EXISTS `empleave`;
CREATE TABLE `empleave` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `EmpNo` varchar(45) DEFAULT NULL,
  `LFrom` date DEFAULT NULL,
  `LTo` date DEFAULT NULL,
  `Reason` varchar(145) DEFAULT NULL,
  `SuperV` varchar(45) DEFAULT 'Pending',
  `Status` varchar(45) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleave`
--

/*!40000 ALTER TABLE `empleave` DISABLE KEYS */;
INSERT INTO `empleave` (`Id`,`EmpNo`,`LFrom`,`LTo`,`Reason`,`SuperV`,`Status`) VALUES 
 (1,'287PC257','2022-08-09','2022-08-10','Sick','Approved','Approved');
/*!40000 ALTER TABLE `empleave` ENABLE KEYS */;


--
-- Definition of table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `Email` varchar(145) NOT NULL DEFAULT '',
  `Name` varchar(145) DEFAULT NULL,
  `IdNo` int(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Pno` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Level` varchar(45) DEFAULT NULL,
  `Section` varchar(45) DEFAULT NULL,
  `EmpNo` varchar(45) DEFAULT NULL,
  `Password` varchar(145) DEFAULT NULL,
  `Status` double DEFAULT '0',
  `Image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`Email`,`Name`,`IdNo`,`DOB`,`Pno`,`Gender`,`Level`,`Section`,`EmpNo`,`Password`,`Status`,`Image`) VALUES 
 ('kiki@gmail.com','Zilda Kiki',23434,'2022-08-04','343565','Female','Admin','2','257PC63','sawa',1,'maumbwa.png'),
 ('maish@gmail.com','Deno Maish',4343243,'2022-08-04','4343','Male','Worker','2','287PC257','zamzam',1,NULL),
 ('test@gmail.com','Test Data1',32434,'2022-08-04','43434','Male','Supervisor','1','200PC231','zamzam',1,NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


--
-- Definition of table `empvaluate`
--

DROP TABLE IF EXISTS `empvaluate`;
CREATE TABLE `empvaluate` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Employee` varchar(45) DEFAULT NULL,
  `Rating` int(10) unsigned DEFAULT NULL,
  `Remarks` varchar(545) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Section` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empvaluate`
--

/*!40000 ALTER TABLE `empvaluate` DISABLE KEYS */;
INSERT INTO `empvaluate` (`Id`,`Employee`,`Rating`,`Remarks`,`Date`,`Section`) VALUES 
 (1,'257PC63',10,'Excellent','2022-08-04','2'),
 (2,'287PC257',2,'-','2022-08-10','2'),
 (3,'200PC231',5,'o','2022-08-10','2'),
 (4,'287PC257',3,'k','2022-08-10','2'),
 (5,'200PC231',9,'l','2022-08-10','2');
/*!40000 ALTER TABLE `empvaluate` ENABLE KEYS */;


--
-- Definition of table `evaluate`
--

DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Section` varchar(45) DEFAULT NULL,
  `Remarks` varchar(500) DEFAULT NULL,
  `Rating` int(10) unsigned DEFAULT NULL,
  `Department` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluate`
--

/*!40000 ALTER TABLE `evaluate` DISABLE KEYS */;
INSERT INTO `evaluate` (`Id`,`Name`,`Section`,`Remarks`,`Rating`,`Department`,`Date`) VALUES 
 (1,'Kiloko Miko','1','Poor Service',7,'Computer','2022-08-04'),
 (2,'ffff','2','d',9,'Hospitality','2022-08-10'),
 (3,'sasa','3','d',4,'Other','2022-08-11'),
 (4,'ffsdd','2','ssdd',3,'Computer','2022-10-01');
/*!40000 ALTER TABLE `evaluate` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `RefId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(145) DEFAULT NULL,
  `Items` varchar(145) DEFAULT NULL,
  `Href` varchar(45) DEFAULT NULL,
  `Seqns` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`RefId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`RefId`,`Title`,`Items`,`Href`,`Seqns`) VALUES 
 (1,'1','Add/View Rooms','rooms.php',3),
 (2,'6','Menu','menu.php',2),
 (3,'2','testing 2','dede.php',1),
 (4,'3','wasa','wasa.php',2),
 (5,'4','Testing 3','th.php',2),
 (6,'1','Assign Rooms to Classes','as.php',3),
 (7,'3','Test 6','pip.php',2),
 (8,'5','test5','index.php',1),
 (9,'1','Assign Rights','assign.php',3),
 (10,'1','Login','login.php',1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menu_group`
--

DROP TABLE IF EXISTS `menu_group`;
CREATE TABLE `menu_group` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) DEFAULT NULL,
  `Default` varchar(45) DEFAULT 'Closed',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group`
--

/*!40000 ALTER TABLE `menu_group` DISABLE KEYS */;
INSERT INTO `menu_group` (`Id`,`Title`,`Default`) VALUES 
 (1,'Admin Settings','Closed'),
 (2,'Admin Termly Settings fff','Closed'),
 (3,'Mutuku','Closed'),
 (4,'Reports Zako','Closed'),
 (5,'Ziglar hh','Closed'),
 (6,'Test','Closed'),
 (7,'test5','Closed');
/*!40000 ALTER TABLE `menu_group` ENABLE KEYS */;


--
-- Definition of table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `Code` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Supervisor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`Code`,`Name`,`Supervisor`) VALUES 
 (1,'Mess',NULL),
 (2,'Gate',''),
 (3,'Admin','test@gmail.com');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;


--
-- Definition of table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `SemCode` varchar(100) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Statuz` varchar(45) DEFAULT 'Not Current',
  `ACode` varchar(100) DEFAULT NULL,
  `RefId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RefId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` (`SemCode`,`StartDate`,`EndDate`,`Statuz`,`ACode`,`RefId`) VALUES 
 ('TERM 3 2021','2021-08-22','2021-08-22','Not Current','556e39-8e96d6-421b16-fddd70-6634d4--1629622104',35),
 ('TERM 1 2022','2022-01-01','2022-03-31','Not Current','556e39-8e96d6-421b16-fddd70-6634d4--1629622104',36),
 ('TERM 2','2022-04-12','2022-04-21','Current','556e39-8e96d6-421b16-fddd70-6634d4--1629622104',37),
 ('TERM 2 2022','2022-04-29','2022-07-29','Not Current','556e39-8e96d6-421b16-fddd70-6634d4--1629622104',38),
 ('Term 4 2022','2022-08-15','2022-08-17','Not Current',NULL,39);
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;


--
-- Definition of table `snews`
--

DROP TABLE IF EXISTS `snews`;
CREATE TABLE `snews` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Subject` varchar(645) DEFAULT NULL,
  `Cc` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snews`
--

/*!40000 ALTER TABLE `snews` DISABLE KEYS */;
INSERT INTO `snews` (`Id`,`Title`,`Date`,`Subject`,`Cc`) VALUES 
 (1,'Cleaning Time','2022-08-10','The above subject refers to cleaning time. the classes should be cleaned before 6:00 in the morning.','The Principal<br>Hods.'),
 (2,'Mass','2022-08-10','There will be institutional mass on 12/1/2023','HODS');
/*!40000 ALTER TABLE `snews` ENABLE KEYS */;


--
-- Definition of table `user_rights`
--

DROP TABLE IF EXISTS `user_rights`;
CREATE TABLE `user_rights` (
  `User` int(10) unsigned NOT NULL DEFAULT '0',
  `GNames` varchar(45) DEFAULT NULL,
  `GItems` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

/*!40000 ALTER TABLE `user_rights` DISABLE KEYS */;
INSERT INTO `user_rights` (`User`,`GNames`,`GItems`) VALUES 
 (1,'1,3,6','10,1,6,9,4,7,2');
/*!40000 ALTER TABLE `user_rights` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Id`,`UserName`,`Email`,`Password`) VALUES 
 (1,'Alex','alx@gmail.com','1234'),
 (2,'kilo','kilo@gmail.com','1234'),
 (3,'Mwas','lasmwa@gmail.com','1234');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `warning`
--

DROP TABLE IF EXISTS `warning`;
CREATE TABLE `warning` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `EmpNo` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Warning` varchar(645) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warning`
--

/*!40000 ALTER TABLE `warning` DISABLE KEYS */;
INSERT INTO `warning` (`Id`,`EmpNo`,`Date`,`Title`,`Warning`) VALUES 
 (1,'287PC257','2022-08-11','Lateness','It has been noted with concern that you are reporting to work late without a valid reason. Note that work should be reported to at 8:00. Failure to adhere will attract consequences. '),
 (7,'287PC257','2022-08-09','Ushenzi','Achana na ufala'),
 (9,'287PC257','2022-08-10','Madness','achana na bangi ama nikufute');
/*!40000 ALTER TABLE `warning` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
