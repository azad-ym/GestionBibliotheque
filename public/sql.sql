-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: db_aect
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `adminastration`
--

DROP TABLE IF EXISTS `adminastration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminastration` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_type` int unsigned NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminastration`
--

LOCK TABLES `adminastration` WRITE;
/*!40000 ALTER TABLE `adminastration` DISABLE KEYS */;
INSERT INTO `adminastration` VALUES (1,1,'91b827e257eeae8e5989d961fe3011df'),(2,3,'f9819e4d963f46cbc169f56bea1f2cc7');
/*!40000 ALTER TABLE `adminastration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Roman'),(2,'Bande dessiné'),(3,'informatique'),(4,'Dico'),(8,'Poesie');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprunts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_livre` int unsigned NOT NULL,
  `id_user` int unsigned NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date NOT NULL,
  `retourne` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprunts`
--

LOCK TABLES `emprunts` WRITE;
/*!40000 ALTER TABLE `emprunts` DISABLE KEYS */;
INSERT INTO `emprunts` VALUES (26,21,14,'2021-01-24','2021-01-31',1),(27,22,2,'2021-01-24','2021-01-31',1),(28,26,5,'2021-01-24','2021-01-31',1),(29,5,7,'2021-01-24','2021-01-31',1),(30,27,19,'2021-01-24','2021-01-31',1),(31,5,14,'2021-01-25','2021-02-01',NULL),(32,22,14,'2021-01-25','2021-02-01',1),(33,22,14,'2021-01-25','2021-02-01',NULL);
/*!40000 ALTER TABLE `emprunts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livres` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titre_livre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur_livre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categorie` int NOT NULL,
  `disponibilite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livres`
--

LOCK TABLES `livres` WRITE;
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` VALUES (4,'ma conne je t\'aime','yoma','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea enim eum cupiditate sint hic. Esse atque repellat ullam dignissimos earum ipsam. Repellendus, temporibus! Vitae odit placeat aperiam saepe, quos quisquam?',2,1),(5,'salut l\'ami ','yoma','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea enim eum cupiditate sint hic. Esse atque repellat ullam dignissimos earum ipsam. Repellendus, temporibus! Vitae odit placeat aperiam saepe, quos quisquam?',1,1),(16,'comment ne plus etre timide','yoma','Salut les geeks ! &lt;br&gt; Vous etes trop timide, y\'a une meuf qui te plaie et vous n\'osez pas aller lui parler ?&lt;br&gt;\r\nVous etes au bonne endroit... je vais vous montrer le secret de ne plus etre timid😋😌&lt;br&gt;\r\nBon mais avant de commencer il faut que vous sachiez que moi aussi je suis trop timide😂🤣 et OUI donc si vous cherchez comment faire pour ne plus etre timide allez le cherchez ailleur😁😂🤣',4,NULL),(21,'comment seduire une femme','auteur','',1,NULL),(22,'le roi des math','Hakim','les mathematiques sont tres important blaa blallalaa',2,1),(23,'va te faire foutre ','joel','mais quoi ecrire sur cette livre je ne sais pas trop quoi ecrire',3,NULL),(26,'Science de la vie et de la terre','Manandjara','La science de la vie et de la terre est tres important surtout dans la vie quotidienne bla blalaaaa',4,NULL),(27,'mathematique','pythagore','dfsqdf',8,NULL);
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Bibliothécaire'),(2,'Adhérent'),(3,'DG'),(4,'President'),(5,'secretaire generale'),(6,'azhar');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` date NOT NULL,
  `date_expiration` date NOT NULL,
  `id_type` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Badrou','Ahmada','2002-04-19','Tsidjé','2020-12-12','2021-12-12',2),(4,'Said','Hassani','2001-05-19','Tsidjé','2020-12-12','2021-12-12',4),(5,'Mahir','Chakira','2001-07-06','Moroni','2020-12-12','2021-12-12',5),(7,'Raida','Abdallah','2000-07-29','Tsidjé','2020-12-12','2021-12-12',2),(8,'Faidji','M\'madi','2001-03-29','Tsidjé','2020-12-12','2021-12-12',2),(9,'Chaida','Moussa','1999-03-29','Tsidjé','2020-12-12','2021-12-12',2),(14,'azad','yoma','2000-07-19','Moroni','2020-02-16','2021-02-23',1),(17,'Rasta','Aissa','2001-04-19','Moroni','2021-01-13','2021-01-13',4),(19,'Mina','Imamou','2002-10-22','Moroni','2021-01-14','2021-01-14',1),(20,'Yoma','azad','2001-01-04','Tsidjé','2021-01-22','2021-01-22',1);
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

-- Dump completed on 2021-02-19 18:05:20
