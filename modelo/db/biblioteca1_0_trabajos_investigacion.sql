-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca1_0
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `trabajos_investigacion`
--

DROP TABLE IF EXISTS `trabajos_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajos_investigacion` (
  `cota` varchar(15) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `linea_investigacion` varchar(255) DEFAULT NULL,
  `mencion` varchar(255) DEFAULT NULL,
  `metodologia` text,
  `metodo` varchar(255) DEFAULT NULL,
  `tipo` enum('post','pre') DEFAULT NULL,
  `palabras_claves` text,
  `nivel_academico` enum('Trabajo de investigacion','Tesis') DEFAULT NULL,
  PRIMARY KEY (`cota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajos_investigacion`
--

LOCK TABLES `trabajos_investigacion` WRITE;
/*!40000 ALTER TABLE `trabajos_investigacion` DISABLE KEYS */;
INSERT INTO `trabajos_investigacion` VALUES ('D123O329','Sistema Biblioteca Unefa','Jesús Rios ','Jesus Rios','2024-05-30','Administración de Empoin','2025-02-13',3,'','','Cualitativa','','post','GESTIO','Tesis');
/*!40000 ALTER TABLE `trabajos_investigacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-22 13:35:40
