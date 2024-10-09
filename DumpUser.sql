CREATE DATABASE  IF NOT EXISTS `streamingportal` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `streamingportal`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: streamingportal
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `abos`
--

DROP TABLE IF EXISTS `abos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(11,2) NOT NULL,
  `provider_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_abos_provider_idx` (`provider_id`),
  CONSTRAINT `fk_abos_provider` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abos`
--

LOCK TABLES `abos` WRITE;
/*!40000 ALTER TABLE `abos` DISABLE KEYS */;
INSERT INTO `abos` VALUES (1,12.99,1),(2,8.99,2),(3,6.99,3),(4,14.99,4),(5,4.99,5);
/*!40000 ALTER TABLE `abos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actors` (
  `movies_id` int(11) NOT NULL,
  `filmIndustryProfessional_id` int(11) NOT NULL,
  KEY `fk_famouspersons_has_movies1_movies1_idx` (`movies_id`),
  KEY `fk_actors_filmIndustryProfessional1_idx` (`filmIndustryProfessional_id`),
  CONSTRAINT `fk_actors_filmIndustryProfessional1` FOREIGN KEY (`filmIndustryProfessional_id`) REFERENCES `filmindustryprofessional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_famouspersons_has_movies1_movies1` FOREIGN KEY (`movies_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,2),(1,3);
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin@admin.com','9ae2be73b58b565bce3e47493a56e26a');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deleteduser`
--

DROP TABLE IF EXISTS `deleteduser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deleteduser`
--

LOCK TABLES `deleteduser` WRITE;
/*!40000 ALTER TABLE `deleteduser` DISABLE KEYS */;
/*!40000 ALTER TABLE `deleteduser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directors` (
  `movies_id` int(11) NOT NULL,
  `filmIndustryProfessional_id` int(11) NOT NULL,
  KEY `fk_famouspersons_has_movies_movies1_idx` (`movies_id`),
  KEY `fk_directors_filmIndustryProfessional1_idx` (`filmIndustryProfessional_id`),
  CONSTRAINT `fk_directors_filmIndustryProfessional1` FOREIGN KEY (`filmIndustryProfessional_id`) REFERENCES `filmindustryprofessional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_famouspersons_has_movies_movies1` FOREIGN KEY (`movies_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES (1,1),(2,1),(6,4),(7,5);
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `episodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `releaseYear` int(11) NOT NULL,
  `seasons_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_episodes_seasons1_idx` (`seasons_id`),
  CONSTRAINT `fk_episodes_seasons1` FOREIGN KEY (`seasons_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episodes`
--

LOCK TABLES `episodes` WRITE;
/*!40000 ALTER TABLE `episodes` DISABLE KEYS */;
INSERT INTO `episodes` VALUES (1,1,'Live Free or Die',43,2012,1),(2,2,'Madrigal',47,2012,1),(3,3,'Hazard Pay',48,2012,1),(4,4,'Fifty-One',47,2012,1),(5,5,'Dead Freight',51,2012,1),(6,1,'The Red Woman',50,2016,2),(7,2,'Home',54,2016,2),(8,3,'Oathbreaker',52,2016,2),(9,4,'Book of the Stranger',59,2016,2),(10,5,'The Door',68,2016,2),(11,1,'Suzie, Do You Copy?',51,2019,3),(12,2,'The Mall Rats',50,2019,3),(13,3,'The Case of the Missing Lifeguard',50,2019,3),(14,4,'The Sauna Test',53,2019,3),(15,5,'The Flayed',49,2019,3),(16,1,'Chapter 9: The Marshal',54,2020,4),(17,2,'Chapter 10: The Passenger',42,2020,4),(18,3,'Chapter 11: The Heiress',39,2020,4),(19,4,'Chapter 12: The Siege',40,2020,4),(20,5,'Chapter 13: The Jedi',47,2020,4),(21,1,'The End\'s Beginning',61,2019,5),(22,2,'Four Marks',60,2019,5),(23,3,'Betrayer Moon',67,2019,5),(24,4,'Of Banquets, Bastards and Burials',61,2019,5),(25,5,'Bottled Appetites',59,2019,5);
/*!40000 ALTER TABLE `episodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmindustryprofessional`
--

DROP TABLE IF EXISTS `filmindustryprofessional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmindustryprofessional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmindustryprofessional`
--

LOCK TABLES `filmindustryprofessional` WRITE;
/*!40000 ALTER TABLE `filmindustryprofessional` DISABLE KEYS */;
INSERT INTO `filmindustryprofessional` VALUES (1,'Christopher','Nolan'),(2,'Robert','Downey Jr.'),(3,'Scarlett','Johansson'),(4,'Vince','Gilligan'),(5,'David','Benioff');
/*!40000 ALTER TABLE `filmindustryprofessional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Action'),(2,'Drama'),(3,'Science Fiction'),(4,'Fantasy'),(5,'Thriller');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hasdubs`
--

DROP TABLE IF EXISTS `hasdubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hasdubs` (
  `languages_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  KEY `fk_languages_has_offers_offers1_idx` (`offers_id`),
  KEY `fk_languages_has_offers_languages1_idx` (`languages_id`),
  CONSTRAINT `fk_languages_has_offers_languages1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_languages_has_offers_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasdubs`
--

LOCK TABLES `hasdubs` WRITE;
/*!40000 ALTER TABLE `hasdubs` DISABLE KEYS */;
INSERT INTO `hasdubs` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `hasdubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hassubs`
--

DROP TABLE IF EXISTS `hassubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hassubs` (
  `offers_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  KEY `fk_offers_has_languages_languages1_idx` (`languages_id`),
  KEY `fk_offers_has_languages_offers1_idx` (`offers_id`),
  CONSTRAINT `fk_offers_has_languages_languages1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_offers_has_languages_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hassubs`
--

LOCK TABLES `hassubs` WRITE;
/*!40000 ALTER TABLE `hassubs` DISABLE KEYS */;
INSERT INTO `hassubs` VALUES (1,1),(1,2),(2,1),(6,1),(7,2);
/*!40000 ALTER TABLE `hassubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English'),(2,'German'),(3,'Spanish'),(4,'French'),(5,'Italian');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `releaseYear` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movie_offers1_idx` (`offers_id`),
  CONSTRAINT `fk_movie_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,2019,181,1),(2,2014,169,2),(3,2020,151,3),(4,2010,148,4),(5,2008,152,5);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (18,'julian.igelsboeck@gmx.at','Admin','Create Account','2024-10-09 14:50:53');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `fsk` tinyint(4) NOT NULL,
  `posterLink` varchar(255) NOT NULL,
  `originalTitle` varchar(255) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,'Avengers: Endgame','https://www.youtube.com/watch?v=TcMBFSGVi1c&pp=ygUYYXZlbmdlcnMgZW5kZ2FtZSB0cmFpbGVy',12,'https://m.media-amazon.com/images/I/81ai6zx6eXL._AC_SL1304_.jpg','Avengers: Endgame',8.40,'The Avengers assemble to defeat Thanos.'),(2,'Interstellar','https://www.youtube.com/watch?v=FByEFOAQeU0&pp=ygUUaW50ZXJzdGVsbGFyIHRyYWlsZXI%3D',12,'https://m.media-amazon.com/images/I/71jDI4zi7rL._AC_UF894,1000_QL80_.jpg','Interstellar',8.60,'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.'),(3,'Soul','https://www.youtube.com/watch?v=1Bko4KPRl0s&pp=ygUMc291bCB0cmFpbGVy',6,'https://image.tmdb.org/t/p/original/tYdEoMovmyUnQ6DyUvtCHomVGly.jpg','Soul',8.00,'A musician who has lost his passion for music is transported out of his body and must find his way back.'),(4,'Inception','https://www.youtube.com/watch?v=YoHD9XEInc0&pp=ygURaW5jZXB0aW9uIHRyYWlsZXI%3D',12,'https://img.fruugo.com/product/2/44/14488442_max.jpg','Inception',8.80,'A thief who enters the dreams of others takes on the ultimate heist.'),(5,'The Dark Knight','https://www.youtube.com/watch?v=EXeTwQWrcwY&pp=ygUSZGFyayBrbmlnaHR0cmFpbGVy',16,'https://i.ebayimg.com/images/g/bKUAAOSwTctkxmSP/s-l1200.jpg','The Dark Knight',9.00,'Batman faces the Joker in a battle for Gotham\'s soul.'),(6,'Breaking Bad','https://www.youtube.com/watch?v=3oFofYisAko&pp=ygUeYnJlYWtpbmcgYmFkIHRyYWlsZXIgc2Vhc29uIDUg',18,'http://es.web.img3.acsta.net/pictures/18/04/04/22/52/3191575.jpg','Breaking Bad',9.50,'A high school chemistry teacher turned methamphetamine producer.'),(7,'Game of Thrones','https://www.youtube.com/watch?v=yu8eRaq1FUM&pp=ygUZZ2FtZSBvZiB0aHJvbmVzIHRyYWlsZXIgNg%3D%3D',18,'https://m.media-amazon.com/images/M/MV5BN2IzYzBiOTQtNGZmMi00NDI5LTgxMzMtN2EzZjA1NjhlOGMxXkEyXkFqcGdeQXVyNjAwNDUxODI@._V1_FMjpg_UX1000_.jpg','Game of Thrones',9.30,'Noble families vie for control of the Iron Throne.'),(8,'Stranger Things','https://www.youtube.com/watch?v=6Am4v0C_z8c&pp=ygUgc3RyYW5nZXIgdGhpbmdzIHRyYWlsZXIgc2Vhc29uIDM%3D',16,'http://es.web.img1.acsta.net/pictures/17/10/24/09/04/3656474.jpg','Stranger Things',8.70,'A group of kids uncover secret experiments and supernatural forces.'),(9,'The Mandalorian','https://www.youtube.com/watch?v=srAXcBP_u8w&pp=ygUXdGhlIG1hbmRhbG9yaWFuIHRyYWlsZXI%3D',12,'https://jedinet.com/wp-content/uploads/2023/02/Star-Wars-The-Mandalorian-Season-3-poster-1.jpg','The Mandalorian',8.80,'A lone bounty hunter makes his way through the outer reaches of the galaxy.'),(10,'The Witcher','https://www.youtube.com/watch?v=ndl1W4ltcmg&pp=ygUYd2l0Y2hlciB0cmFpbGVyIHNlYXNvbiAx',18,'https://i.etsystatic.com/26585309/r/il/dcf927/2801291093/il_570xN.2801291093_eac4.jpg','The Witcher',8.20,'A monster hunter struggles to find his place in a world full of humans, beasts, and treachery.');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offershasgenres`
--

DROP TABLE IF EXISTS `offershasgenres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offershasgenres` (
  `offers_id` int(11) NOT NULL,
  `genres_id` int(11) NOT NULL,
  KEY `fk_offers_has_genres_genres1_idx` (`genres_id`),
  KEY `fk_offers_has_genres_offers1_idx` (`offers_id`),
  CONSTRAINT `fk_offers_has_genres_genres1` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_offers_has_genres_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offershasgenres`
--

LOCK TABLES `offershasgenres` WRITE;
/*!40000 ALTER TABLE `offershasgenres` DISABLE KEYS */;
INSERT INTO `offershasgenres` VALUES (1,1),(1,3),(2,1),(2,5),(3,1),(3,3),(4,2),(4,5),(5,2),(5,5),(6,2),(6,5),(7,4),(7,2),(8,3),(8,4),(9,4),(9,1),(10,4),(10,1);
/*!40000 ALTER TABLE `offershasgenres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offershasproviders`
--

DROP TABLE IF EXISTS `offershasproviders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offershasproviders` (
  `provider_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  KEY `fk_provider_has_movie_movie1_idx` (`offers_id`),
  KEY `fk_provider_has_movie_provider1_idx` (`provider_id`),
  CONSTRAINT `fk_provider_has_movie_movie1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_provider_has_movie_provider1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offershasproviders`
--

LOCK TABLES `offershasproviders` WRITE;
/*!40000 ALTER TABLE `offershasproviders` DISABLE KEYS */;
INSERT INTO `offershasproviders` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(1,6),(2,7),(3,8),(4,9),(5,10);
/*!40000 ALTER TABLE `offershasproviders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `affiliateLink` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Netflix','https://affiliate.link/netflix','https://logo.link/netflix.png'),(2,'Amazon Prime','https://affiliate.link/amazon_prime','https://logo.link/amazon_prime.png'),(3,'Disney+','https://affiliate.link/disney_plus','https://logo.link/disney_plus.png'),(4,'HBO Max','https://affiliate.link/hbo_max','https://logo.link/hbo_max.png'),(5,'Apple TV+','https://affiliate.link/apple_tv','https://logo.link/apple_tv.png');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seasons_offers1_idx` (`offers_id`),
  CONSTRAINT `fk_seasons_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
INSERT INTO `seasons` VALUES (1,5,6),(2,6,7),(3,3,8),(4,2,9),(5,1,10);
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (20,'Julian Igelsböck','julian.igelsboeck@gmx.at','0c0e70731f2620c29a7ea0319e400c92','Male','06606793526','Mister','julian-igelsböck.jpg',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watchlists`
--

DROP TABLE IF EXISTS `watchlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `watchlists` (
  `user_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  KEY `fk_user_has_offers_offers1_idx` (`offers_id`),
  KEY `fk_user_has_offers_user1_idx` (`user_id`),
  CONSTRAINT `fk_user_has_offers_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_offers_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watchlists`
--

LOCK TABLES `watchlists` WRITE;
/*!40000 ALTER TABLE `watchlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `watchlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-09 17:10:25
