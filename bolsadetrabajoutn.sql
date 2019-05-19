CREATE DATABASE  IF NOT EXISTS `bolsadetrabajoutn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bolsadetrabajoutn`;
-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: bolsadetrabajoutn
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `Administrador`
--

DROP TABLE IF EXISTS `Administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nivelAcceso` varchar(45) DEFAULT NULL,
  `nombreAdm` varchar(45) DEFAULT NULL,
  `apeAdm` varchar(45) DEFAULT NULL,
  `dniAdm` int(9) DEFAULT NULL,
  `emailAdm` varchar(45) DEFAULT NULL,
  `usuAdm` varchar(45) DEFAULT NULL,
  `contAdm` varchar(45) DEFAULT NULL,
  `telefonoAdm` int(11) DEFAULT NULL,
  `domicilioAdm` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administrador`
--

LOCK TABLES `Administrador` WRITE;
/*!40000 ALTER TABLE `Administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `Administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `idCliente` int(9) NOT NULL,
  `nombreCliente` varchar(45) DEFAULT NULL,
  `apellidoCliente` varchar(45) DEFAULT NULL,
  `emailCliente` varchar(45) DEFAULT NULL,
  `telefonoCliente` int(11) DEFAULT NULL,
  `usuCliente` varchar(45) DEFAULT NULL,
  `contCliente` varchar(45) DEFAULT NULL,
  `dniCliente` int(9) DEFAULT NULL,
  `domicilioCliente` varchar(45) DEFAULT NULL,
  `carrera` varchar(45) DEFAULT NULL,
  `idlocalidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_Cliente_local_idx` (`idlocalidad`),
  CONSTRAINT `fk_Cliente_local` FOREIGN KEY (`idlocalidad`) REFERENCES `Localidad` (`idLocalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente_Postulaciones`
--

DROP TABLE IF EXISTS `Cliente_Postulaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente_Postulaciones` (
  `idCliente` int(11) NOT NULL,
  `idPostulaciones` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`,`idPostulaciones`),
  KEY `FKPos_idx` (`idPostulaciones`),
  CONSTRAINT `FKCli` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKPos` FOREIGN KEY (`idPostulaciones`) REFERENCES `Postulaciones` (`idPostulaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente_Postulaciones`
--

LOCK TABLES `Cliente_Postulaciones` WRITE;
/*!40000 ALTER TABLE `Cliente_Postulaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente_Postulaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contratista`
--

DROP TABLE IF EXISTS `Contratista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contratista` (
  `idContratista` int(9) NOT NULL,
  `nombreContratista` varchar(45) DEFAULT NULL,
  `descContratista` varchar(45) DEFAULT NULL,
  `idLocalidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContratista`),
  KEY `fk_Contratista_local_idx` (`idLocalidad`),
  CONSTRAINT `fk_Contratista_local` FOREIGN KEY (`idLocalidad`) REFERENCES `Localidad` (`idLocalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contratista`
--

LOCK TABLES `Contratista` WRITE;
/*!40000 ALTER TABLE `Contratista` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contratista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contratista_OfertaLaboral`
--

DROP TABLE IF EXISTS `Contratista_OfertaLaboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contratista_OfertaLaboral` (
  `idContratista` int(11) NOT NULL,
  `idOfertaLaboral` int(11) NOT NULL,
  PRIMARY KEY (`idContratista`,`idOfertaLaboral`),
  KEY `FKidOfertaLaboral_idx` (`idOfertaLaboral`),
  CONSTRAINT `FKOfertaLaboral` FOREIGN KEY (`idOfertaLaboral`) REFERENCES `OfertaLaboral` (`idOfertaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKidContratista` FOREIGN KEY (`idContratista`) REFERENCES `Contratista` (`idContratista`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contratista_OfertaLaboral`
--

LOCK TABLES `Contratista_OfertaLaboral` WRITE;
/*!40000 ALTER TABLE `Contratista_OfertaLaboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contratista_OfertaLaboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CurriculumVitae`
--

DROP TABLE IF EXISTS `CurriculumVitae`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CurriculumVitae` (
  `idCurriculumVitae` int(9) NOT NULL,
  `curriculumVitae` blob,
  PRIMARY KEY (`idCurriculumVitae`),
  CONSTRAINT `FKidCliente` FOREIGN KEY (`idCurriculumVitae`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CurriculumVitae`
--

LOCK TABLES `CurriculumVitae` WRITE;
/*!40000 ALTER TABLE `CurriculumVitae` DISABLE KEYS */;
/*!40000 ALTER TABLE `CurriculumVitae` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Localidad`
--

DROP TABLE IF EXISTS `Localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Localidad` (
  `idLocalidad` int(9) NOT NULL,
  `descLocalidad` varchar(45) DEFAULT NULL,
  `idProvincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLocalidad`),
  KEY `fk_LocalProv_idx` (`idProvincia`),
  CONSTRAINT `fk_LocalProv` FOREIGN KEY (`idProvincia`) REFERENCES `Provincia` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Localidad`
--

LOCK TABLES `Localidad` WRITE;
/*!40000 ALTER TABLE `Localidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `Localidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OfertaLaboral`
--

DROP TABLE IF EXISTS `OfertaLaboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OfertaLaboral` (
  `idOfertaLaboral` int(9) NOT NULL,
  `descOferta` varchar(45) DEFAULT NULL,
  `modalidadOferta` varchar(45) DEFAULT NULL,
  `horarioLaboral` varchar(45) DEFAULT NULL,
  `remuneracion` float DEFAULT NULL,
  `idLocalidad` int(9) DEFAULT NULL,
  `carrera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idOfertaLaboral`),
  KEY `fk_OfertaLaboral_Localidad_idx` (`idLocalidad`),
  CONSTRAINT `fk_OfertaLaboral_Localidad` FOREIGN KEY (`idLocalidad`) REFERENCES `Localidad` (`idLocalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OfertaLaboral`
--

LOCK TABLES `OfertaLaboral` WRITE;
/*!40000 ALTER TABLE `OfertaLaboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `OfertaLaboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Postulaciones`
--

DROP TABLE IF EXISTS `Postulaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Postulaciones` (
  `idPostulaciones` int(9) NOT NULL,
  `cvElegido` blob,
  PRIMARY KEY (`idPostulaciones`),
  CONSTRAINT `FKidOfertaLaboral` FOREIGN KEY (`idPostulaciones`) REFERENCES `OfertaLaboral` (`idOfertaLaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Postulaciones`
--

LOCK TABLES `Postulaciones` WRITE;
/*!40000 ALTER TABLE `Postulaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `Postulaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Provincia`
--

DROP TABLE IF EXISTS `Provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Provincia` (
  `idProvincia` int(9) NOT NULL,
  `descProvincia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Provincia`
--

LOCK TABLES `Provincia` WRITE;
/*!40000 ALTER TABLE `Provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `Provincia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-23 18:39:34
