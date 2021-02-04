-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: overbuff2
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accountdata`
--

DROP TABLE IF EXISTS `accountdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accountdata` (
  `accountid` int NOT NULL,
  `accountname` varchar(45) DEFAULT NULL,
  `playerid` int NOT NULL,
  `accountrank` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`accountid`,`playerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountdata`
--

LOCK TABLES `accountdata` WRITE;
/*!40000 ALTER TABLE `accountdata` DISABLE KEYS */;
INSERT INTO `accountdata` VALUES (0,'Epcar',0,'admin'),(1,'Buddy',1,'user'),(2,'Bieron',2,'admin'),(3,'Chubb',3,'user'),(4,'John Doe',4,'admin');
/*!40000 ALTER TABLE `accountdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `heroes` (
  `heroID` int NOT NULL,
  `heroName` varchar(15) NOT NULL,
  `pickRate` float DEFAULT NULL,
  `avgDamage` float DEFAULT NULL,
  `avgHeals` float DEFAULT NULL,
  `objKills` int DEFAULT NULL,
  `objTime` float DEFAULT NULL,
  `heroProf` float DEFAULT NULL,
  `roles` varchar(20) DEFAULT NULL,
  `heroWinsLoses` int DEFAULT NULL,
  PRIMARY KEY (`heroID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heroes`
--

LOCK TABLES `heroes` WRITE;
/*!40000 ALTER TABLE `heroes` DISABLE KEYS */;
INSERT INTO `heroes` VALUES (0,'Anna',0.2,4338,10017,5,65,40,'Support',20),(1,'Mercy',0.2,361,11932,1,61,20,'Healer',5),(2,'Reinhardt',0.2,11945,0,8,125,60,'Tank',10),(3,'Tracer',0.2,10636,0,8,58,50,'DPS',4),(4,'Reaper',0.1,13793,0,10,78,75,'Nuker',12),(5,'Genji',0.1,15116,0,5,32,65,'Nuker',8);
/*!40000 ALTER TABLE `heroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matchdata`
--

DROP TABLE IF EXISTS `matchdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matchdata` (
  `matchdataID` int NOT NULL,
  `matchnum` int DEFAULT NULL,
  `playerID` int DEFAULT NULL,
  `heroPicked` varchar(15) DEFAULT NULL,
  `matchResult` varchar(5) DEFAULT NULL,
  `doneDamage` int DEFAULT NULL,
  `doneHealing` int DEFAULT NULL,
  `onObjTime` float DEFAULT NULL,
  `onObjKills` int DEFAULT NULL,
  PRIMARY KEY (`matchdataID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchdata`
--

LOCK TABLES `matchdata` WRITE;
/*!40000 ALTER TABLE `matchdata` DISABLE KEYS */;
INSERT INTO `matchdata` VALUES (0,0,0,'Anna','1',4338,10017,65,5),(1,0,1,'Mercy','1',361,11932,61,1),(2,0,2,'Reinhardt','1',11945,0,125,8),(3,0,3,'Tracer','1',10636,0,58,8),(4,0,4,'Reaper','1',13793,0,78,10),(5,0,4,'Genji','1',15116,0,32,5);
/*!40000 ALTER TABLE `matchdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playerprofile`
--

DROP TABLE IF EXISTS `playerprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `playerprofile` (
  `playerID` int NOT NULL,
  `playerName` varchar(45) DEFAULT NULL,
  `playerPreferredRole` varchar(45) DEFAULT NULL,
  `playerCareerScore` float DEFAULT NULL,
  `playerWinLoseRatio` float DEFAULT NULL,
  `playerPreferredHero` varchar(15) DEFAULT NULL,
  `playerRegion` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playerprofile`
--

LOCK TABLES `playerprofile` WRITE;
/*!40000 ALTER TABLE `playerprofile` DISABLE KEYS */;
INSERT INTO `playerprofile` VALUES (0,'Carpe','Support',40,0.5,'Anna','US'),(1,'Buds','Healer',50,0.7,'Mercy','EUR'),(2,'Bier','Tank',70,0.7,'Reinhardt','SEA'),(3,'Chubz','DPS',30,0.2,'Tracer','AS'),(4,'EISSFELDT','Nuker',45,0.45,'Reaper','AUS');
/*!40000 ALTER TABLE `playerprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regiondata`
--

DROP TABLE IF EXISTS `regiondata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regiondata` (
  `regionID` int NOT NULL,
  `regionName` varchar(5) DEFAULT NULL,
  `regionPlayers` int DEFAULT NULL,
  PRIMARY KEY (`regionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regiondata`
--

LOCK TABLES `regiondata` WRITE;
/*!40000 ALTER TABLE `regiondata` DISABLE KEYS */;
INSERT INTO `regiondata` VALUES (0,'US',0),(1,'EUR',1),(2,'AUS',2),(3,'AS',3),(4,'SEA',4);
/*!40000 ALTER TABLE `regiondata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `role_data`
--

DROP TABLE IF EXISTS `role_data`;
/*!50001 DROP VIEW IF EXISTS `role_data`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `role_data` AS SELECT 
 1 AS `roleID`,
 1 AS `Name`,
 1 AS `HCount`,
 1 AS `PickRate`,
 1 AS `WinRate`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `roleID` int NOT NULL DEFAULT '0',
  `roleName` varchar(20) NOT NULL DEFAULT 'toxic',
  `roleHeroesCount` int DEFAULT NULL,
  `rolePickRate` float DEFAULT NULL,
  `roleWinRate` float DEFAULT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Sub/Dom';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'Support',1,0.2,0.5),(1,'Healer',1,0.2,1),(2,'Tank',1,0.2,1),(3,'DPS',1,0.2,0.5),(4,'Nuker',1,0.2,0.5);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `sample_hero_query`
--

DROP TABLE IF EXISTS `sample_hero_query`;
/*!50001 DROP VIEW IF EXISTS `sample_hero_query`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sample_hero_query` AS SELECT 
 1 AS `heroID`,
 1 AS `heroName`,
 1 AS `pickRate`,
 1 AS `avgDamage`,
 1 AS `avgHeals`,
 1 AS `objKills`,
 1 AS `objTime`,
 1 AS `heroProf`,
 1 AS `roles`,
 1 AS `heroWinsLoses`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `role_data`
--

/*!50001 DROP VIEW IF EXISTS `role_data`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `role_data` AS select `roles`.`roleID` AS `roleID`,`roles`.`roleName` AS `Name`,`roles`.`roleHeroesCount` AS `HCount`,`roles`.`rolePickRate` AS `PickRate`,`roles`.`roleWinRate` AS `WinRate` from `roles` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sample_hero_query`
--

/*!50001 DROP VIEW IF EXISTS `sample_hero_query`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sample_hero_query` AS select `heroes`.`heroID` AS `heroID`,`heroes`.`heroName` AS `heroName`,`heroes`.`pickRate` AS `pickRate`,`heroes`.`avgDamage` AS `avgDamage`,`heroes`.`avgHeals` AS `avgHeals`,`heroes`.`objKills` AS `objKills`,`heroes`.`objTime` AS `objTime`,`heroes`.`heroProf` AS `heroProf`,`heroes`.`roles` AS `roles`,`heroes`.`heroWinsLoses` AS `heroWinsLoses` from `heroes` where (`heroes`.`heroName` = 'Genji') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-04 17:04:53
