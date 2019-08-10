-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: firstworking
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text,
  `facultad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`facultad_id`) REFERENCES `facultades` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
INSERT INTO `carreras` (`id`, `nombre`, `descripcion`, `facultad_id`, `creado`) VALUES ('1', 'Ingeniería en Sistemas de Información', 'El Ingeniero en Sistemas de Información es un profesional de sólida formación analítica que le permite la interpretación y resolución de problemas mediante el empleo de metodologías de sistemas y tecnologías de procesamiento de información.', '1', '2019-07-25 00:00:00');
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `resumen` varchar(120) DEFAULT NULL,
  `idcarrera` int(11) NOT NULL,
  `materias_aprobadas` int(2) DEFAULT NULL,
  `promedio` double DEFAULT NULL,
  `experiencia_laboral` varchar(500) DEFAULT NULL,
  `conocimientos` varchar(500) DEFAULT NULL,
  `objetivos` varchar(200) DEFAULT NULL,
  `archivo` blob,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultades`
--

DROP TABLE IF EXISTS `facultades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `facultades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `descripcion` text,
  `localidad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultades`
--

LOCK TABLES `facultades` WRITE;
INSERT INTO `facultades` (`id`, `nombre`, `direccion`, `email`, `descripcion`, `localidad_id`, `creado`) VALUES ('1', 'Universidad Tecnológica Nacional - regional rosario', 'Zeballos 1341', 'consulta@frro.utn.edu.ar', 'FACULTAD REGIONAL ROSARIO\r\nUniversidad Tecnológica Nacional', '1', '2019-07-25 00:00:00');
/*!40000 ALTER TABLE `facultades` DISABLE KEYS */;
/*!40000 ALTER TABLE `facultades` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `modalidad` varchar(45) DEFAULT NULL,
  `horario_laboral` varchar(45) DEFAULT NULL,
  `remuneracion` float DEFAULT NULL,
  `descripcion` text,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ofertas`
--

LOCK TABLES `ofertas` WRITE;
/*!40000 ALTER TABLE `ofertas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulaciones`
--

DROP TABLE IF EXISTS `postulaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `postulaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `oferta_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  FOREIGN KEY (`cv_id`) REFERENCES `cv` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulaciones`
--

LOCK TABLES `postulaciones` WRITE;
/*!40000 ALTER TABLE `postulaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `postulaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
INSERT INTO `provincias` (`id`, `nombre`, `descripcion`, `creado`) VALUES ('1', 'santa fe', 'lorem ipsum dolor sit amet consectetur adipisicing elit. placeat, magnam quibusdam.', '2019-05-21 03:36:19');
INSERT INTO `provincias` (`id`, `nombre`, `descripcion`, `creado`) VALUES ('2', 'cordoba', 'lorem ipsum dolor sit amet consectetur adipisicing elit. placeat, magnam quibusdam.', '2019-05-21 03:36:19');
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `localidades`
--

DROP TABLE IF EXISTS `localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) NOT NULL,
  `descripcion` text,
  `provincia_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidades`
--

LOCK TABLES `localidades` WRITE;
INSERT INTO `localidades` (`id`, `nombre`, `descripcion`, `provincia_id`, `creado`) VALUES ('1', 'rosario', 'lorem ipsum dolor sit amet consectetur adipisicing elit.', '1', '2019-05-27 02:02:14');
INSERT INTO `localidades` (`id`, `nombre`, `descripcion`, `provincia_id`, `creado`) VALUES ('2', 'cordoba', 'lorem ipsum dolor sit amet consectetur adipisicing elit.', '2', '2019-05-27 02:02:14');
/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `dni` int(10) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `localidad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- LA CONTRASEÑA ES: 123
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`, `telefono`, `dni`, `domicilio`, `carrera_id`, `localidad_id`, `creado`) 
  VALUES (NULL, 'usuario', 'administrador', 'admin@firstworking.com', '202cb962ac59075b964b07152d234b70', 'admin', NULL, NULL, NULL, NULL, '1', '2019-07-25 00:00:00');
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-26 15:08:29


/*ALTER TABLE carreras DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE cv DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE facultades DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE localidades DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE ofertas DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE postulaciones DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE provincias DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;
ALTER TABLE usuarios DEFAULT CHARSET=utf8 COLLATE utf8_spanish_ci;*/