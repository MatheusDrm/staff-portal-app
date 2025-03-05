-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: matrizEnsaios
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.20.04.1

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
-- Table structure for table `funcionarios_db`
--
CREATE DATABASE IF NOT EXISTS matrizEnsaios;
USE matrizEnsaios;

DROP TABLE IF EXISTS `funcionarios_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios_db` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `tecnologia` varchar(50) NOT NULL,
  `localTrabalho` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `funcionarios_db_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login_db` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios_db`
--

LOCK TABLES `funcionarios_db` WRITE;
/*!40000 ALTER TABLE `funcionarios_db` DISABLE KEYS */;
INSERT INTO `funcionarios_db` VALUES (2,1,'testeUser','Engenheiro','Software','São Paulo'),(3,5,'Rogerio','Engenheiro','Aeronáutica','GPX');
/*!40000 ALTER TABLE `funcionarios_db` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_db`
--

DROP TABLE IF EXISTS `login_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_db` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_db`
--

LOCK TABLES `login_db` WRITE;
/*!40000 ALTER TABLE `login_db` DISABLE KEYS */;
INSERT INTO `login_db` VALUES (1,'Matheus','matheus@gmail.com','$2y$10$Jeq0QYE8DfbV/2aZBn0dbuyUkUy6XZu5c7CFXD.c68mFRAfReHvjy','2025-03-04 20:36:19'),(2,'Gustavin','gustavin@gmail.com','$2y$10$gulKnOPA93xpDOVkNsVwuuJWPcod5ckXRQJ7mUARIE22jYSxSiNkW','2025-03-04 21:16:26'),(3,'Pedrin','pedrin@gmail.com','$2y$10$S4JDO5eqTaEAuKccRtYCR.pACbsahGVtSeQsGkFjySTb0fOsN25dW','2025-03-04 21:21:00'),(4,'Teste','test@gmail.com','$2y$10$oRxyFSwNsQGkp7SQD.Og6u6DU16irY1o4AXa4/U88TxIS/c5nSFjC','2025-03-04 21:48:17'),(5,'Rogerio','rogerio@gmail.com','$2y$10$sVAnaYC5VJqoTCvt2UGIauTiKCLI/aPtpeuTdTheNQuz8yI3DFz8W','2025-03-04 21:48:40');
/*!40000 ALTER TABLE `login_db` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-05 16:04:48
