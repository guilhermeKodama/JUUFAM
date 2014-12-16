-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: juufam
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `atleta`
--

DROP TABLE IF EXISTS `atleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atleta` (
  `matricula` varchar(8) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `data_nasc` varchar(45) NOT NULL,
  `genero` enum('feminino','masculino') NOT NULL,
  `tipo_atleta` enum('egresso','funcionario','ativo') NOT NULL,
  `id_curso` varchar(12) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `id_curso_idx` (`id_curso`),
  CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atleta`
--

LOCK TABLES `atleta` WRITE;
/*!40000 ALTER TABLE `atleta` DISABLE KEYS */;
INSERT INTO `atleta` VALUES ('21101409','01719550212','19923880','Guilherme Kodama','03/11/1992','masculino','ativo','IE015');
/*!40000 ALTER TABLE `atleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapa`
--

DROP TABLE IF EXISTS `chapa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_evento_idx` (`id_evento`),
  KEY `id_unidade_idx` (`id_unidade`),
  CONSTRAINT `id_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapa`
--

LOCK TABLES `chapa` WRITE;
/*!40000 ALTER TABLE `chapa` DISABLE KEYS */;
INSERT INTO `chapa` VALUES (1,'Sistema de Informacao',1,1);
/*!40000 ALTER TABLE `chapa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` varchar(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_instituto` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_instituto_idx` (`id_instituto`),
  KEY `id_unidade_idx` (`id_unidade`),
  CONSTRAINT `id_instituto` FOREIGN KEY (`id_instituto`) REFERENCES `instituto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_unidade_curso` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES ('ICC015','Ciencia da Computacao',1,1),('IE015','Sistemas de Informacão',1,1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `data_ini_event` date NOT NULL,
  `data_end_event` date NOT NULL,
  `data_ini_insc` date NOT NULL,
  `data_end_insc` date NOT NULL,
  `cert_conc_path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Evento 2015','2014-12-31','2014-12-31','2014-12-31','2014-12-31',NULL);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_modalidade`
--

DROP TABLE IF EXISTS `evento_modalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_modalidade` (
  `id_evento` int(11) NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  KEY `id_evento_idx` (`id_evento`),
  KEY `id_modalidade_idx` (`id_modalidade`),
  CONSTRAINT `id_evento_modalidade` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_modalidade_evento` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_modalidade`
--

LOCK TABLES `evento_modalidade` WRITE;
/*!40000 ALTER TABLE `evento_modalidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_modalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituto`
--

DROP TABLE IF EXISTS `instituto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `id_uni` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_uni_idx` (`id_uni`),
  CONSTRAINT `id_uni` FOREIGN KEY (`id_uni`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituto`
--

LOCK TABLES `instituto` WRITE;
/*!40000 ALTER TABLE `instituto` DISABLE KEYS */;
INSERT INTO `instituto` VALUES (1,'ICOMP',1);
/*!40000 ALTER TABLE `instituto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalidade`
--

DROP TABLE IF EXISTS `modalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `tipo_modalidade` enum('coletivo','individual') NOT NULL,
  `min_inscr` int(11) NOT NULL,
  `max_inscr` int(11) NOT NULL,
  `genero` enum('masculino','feminino') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalidade`
--

LOCK TABLES `modalidade` WRITE;
/*!40000 ALTER TABLE `modalidade` DISABLE KEYS */;
INSERT INTO `modalidade` VALUES (1,'Futsal','coletivo',5,10,'masculino');
/*!40000 ALTER TABLE `modalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repr_atleta`
--

DROP TABLE IF EXISTS `repr_atleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repr_atleta` (
  `id_repr` varchar(45) NOT NULL,
  `id_atleta` varchar(11) NOT NULL,
  `data` date NOT NULL,
  KEY `fk_id_representante_idx` (`id_repr`),
  KEY `fk_id_atleta_idx` (`id_atleta`),
  CONSTRAINT `fk_id_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_representante` FOREIGN KEY (`id_repr`) REFERENCES `usuario` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repr_atleta`
--

LOCK TABLES `repr_atleta` WRITE;
/*!40000 ALTER TABLE `repr_atleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `repr_atleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(11) NOT NULL,
  `id_curso` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_modalidade_time` (`id_modalidade`),
  KEY `id_curso_time` (`id_curso`),
  CONSTRAINT `id_curso_time` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_modalidade_time` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time`
--

LOCK TABLES `time` WRITE;
/*!40000 ALTER TABLE `time` DISABLE KEYS */;
/*!40000 ALTER TABLE `time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_atletas`
--

DROP TABLE IF EXISTS `time_atletas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_atletas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atleta` varchar(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_time_time` (`id_time`),
  KEY `fk_id_atleta_time_idx` (`id_atleta`),
  CONSTRAINT `fk_id_atleta_time` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_time_time` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_atletas`
--

LOCK TABLES `time_atletas` WRITE;
/*!40000 ALTER TABLE `time_atletas` DISABLE KEYS */;
/*!40000 ALTER TABLE `time_atletas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidade`
--

DROP TABLE IF EXISTS `unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidade`
--

LOCK TABLES `unidade` WRITE;
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` VALUES (1,'Manaus');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `id_tipo_usuario` enum('representante','admin') NOT NULL,
  `id_chapa` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `id_chapa_idx` (`id_chapa`),
  CONSTRAINT `id_chapa` FOREIGN KEY (`id_chapa`) REFERENCES `chapa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('Guilherme Kodama','admin','admin','representante',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-15 18:06:18
