-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: snapshare
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.12.04.1

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
-- Current Database: `snapshare`
--

/*!40000 DROP DATABASE IF EXISTS `snapshare`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `snapshare` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `snapshare`;

--
-- Table structure for table `photographs`
--

DROP TABLE IF EXISTS `photographs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photographs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographs`
--

LOCK TABLES `photographs` WRITE;
/*!40000 ALTER TABLE `photographs` DISABLE KEYS */;
INSERT INTO `photographs` VALUES (57,'balloon_flying.jpg','image/jpeg',92356,'Hot Air Balloon Ride'),(58,'barrel_storm.jpg','image/jpeg',89581,'Storms over the plain'),(59,'beach_cave.jpg','image/jpeg',208190,'Portugal beach cave'),(60,'beach_chairs.jpg','image/jpeg',160236,'Beach chairs in summer'),(61,'beach_grass.jpg','image/jpeg',200541,'Grassy beach in California'),(62,'beach_hammok.jpg','image/jpeg',126829,'Hammock relaxation'),(63,'beach_houses.jpg','image/jpeg',127419,'Beach houses in Mexico'),(64,'boahma_house.jpg','image/jpeg',192267,'Mansion on the beach'),(65,'canopy_beach.jpg','image/jpeg',171685,'Beauty under the boardwalk'),(66,'castle_walls.jpg','image/jpeg',136153,'Castle walls in Autumn'),(67,'castle.jpg','image/jpeg',185918,'English castle manor'),(68,'clouds_and_rainbow.jpg','image/jpeg',157096,'Rainbows amidst clouds'),(69,'clouds_over_beach.jpg','image/jpeg',169822,'Cloudy beach day'),(70,'clouds.jpg','image/jpeg',251886,'White clouds'),(71,'cloudy_tornado.jpg','image/jpeg',91622,'Cloudy tornado'),(72,'cozy_beach.jpg','image/jpeg',171132,'A cozy beach'),(73,'cumulus_clouds.jpg','image/jpeg',165678,'High cumulus clouds'),(74,'dandelion.jpg','image/jpeg',100525,'A mature dandelion'),(75,'dark_clouds.jpg','image/jpeg',66920,'Cloudy night'),(76,'dark_horizon.jpg','image/jpeg',134676,'Blood-red horizon'),(77,'desert_star.jpg','image/jpeg',85945,'Star of the desert'),(78,'exotic_vacation.jpg','image/jpeg',717836,'Exotic vacation getaway'),(79,'field.jpg','image/jpeg',196303,'Golden fields'),(80,'fire_sunset.jpg','image/jpeg',196623,'Sunset in the forest'),(81,'fisherman_sunset.jpg','image/jpeg',172063,'Fishermen at sunset'),(82,'flowers_tree.jpg','image/jpeg',102207,'Pink tree flowers'),(83,'fluffy_clouds.jpg','image/jpeg',151891,'Ocean clouds at dusk'),(84,'flying_clouds.jpg','image/jpeg',136502,'High above the clouds'),(85,'forest_dwellers.jpg','image/jpeg',217717,'Path of purple flowers'),(86,'forest_rays.jpg','image/jpeg',163737,'Rays of sun in the forest'),(87,'glowing_village.jpg','image/jpeg',119127,'Village glowing in winter'),(88,'grass_frost.jpg','image/jpeg',212963,'Frosty grass at night'),(89,'grass_road.jpg','image/jpeg',195631,'Road in the countryside'),(90,'green_sunrise.jpg','image/jpeg',104876,'Green-hued sunrise'),(91,'heavy_storm.jpg','image/jpeg',97011,'Heavy storm at night'),(92,'large_sink.jpg','image/jpeg',156401,'Seashell in Mexico'),(93,'lavender.jpg','image/jpeg',177066,'Lavender field in the forest'),(94,'leafy_sprout.jpg','image/jpeg',74346,'Small growth of leaves'),(95,'lightening_storm.jpg','image/jpeg',90277,'Lightening storm in the sky'),(96,'lighthouse.jpg','image/jpeg',92551,'Lighthouse at sunset'),(97,'lilacs.jpg','image/jpeg',225803,'Lilacs in the mountains'),(98,'moonlit_beach.jpg','image/jpeg',75240,'Blue sunset on the beach'),(99,'morning_shore.jpg','image/jpeg',184676,'Dawn at the shore'),(100,'mountain_highway.jpg','image/jpeg',212803,'Mountain highway in Colorado'),(101,'mountain_marina.jpg','image/jpeg',152736,'Marina in the Mountains of Nepal'),(102,'mountain_rays.jpg','image/jpeg',118896,'Sun rays over the mountains'),(103,'mountain_sunrise.jpg','image/jpeg',142688,'Sunrise over the lake'),(104,'nature_bridge.jpg','image/jpeg',129782,'Bridge into the ocean'),(105,'nature_gift.jpg','image/jpeg',193021,'Gift of nature'),(106,'nature_mountains.jpg','image/jpeg',133405,'The mountain peak'),(107,'nebraska_storm.jpg','image/jpeg',97382,'Storm over Nebraska'),(108,'ocean_ice.jpg','image/jpeg',115715,'Ice covering the ocean'),(109,'ocean_surf.jpg','image/jpeg',134602,'Ocean surf at dusk'),(110,'orange_sand.jpg','image/jpeg',194829,'Orange beach sand'),(111,'orange_sky.jpg','image/jpeg',124531,'Tree leaves in Autumn'),(112,'painted_leaves.jpg','image/jpeg',241113,'The painted leaves'),(113,'person_on_hill.jpg','image/jpeg',157318,'Overlooking the sky'),(114,'pink_clouds.jpg','image/jpeg',119046,'Pink clouds at dawn'),(115,'pink_mountain.jpg','image/jpeg',186661,'Pink mountain cliffs'),(116,'pink_sunrise.jpg','image/jpeg',167212,'Pink stream in a field'),(117,'rabbit.jpg','image/jpeg',90324,'The Easter Bunny'),(118,'rainbow_falls.jpg','image/jpeg',183608,'Rainbow falls in Dominica'),(119,'rays_of_light.jpg','image/jpeg',108121,'Rays of light over the sea'),(120,'red_stone.jpg','image/jpeg',127172,'Red rock in the ocean'),(121,'red_sun.jpg','image/jpeg',77499,'The red sun'),(122,'reflecting_clouds.jpg','image/jpeg',116499,'Cloudy ocean reflection'),(123,'rolling_surf.jpg','image/jpeg',132688,'Surf rolling on the sand'),(124,'sea_gate.jpg','image/jpeg',250726,'Gateway to the sea'),(125,'smokey_ground.jpg','image/jpeg',149083,'Fog over the water'),(126,'snow_dunes.jpg','image/jpeg',174741,'Snow dunes at night'),(127,'storm_clouds.jpg','image/jpeg',123890,'Stormy clouds over the forest'),(128,'summer_clouds.jpg','image/jpeg',177122,'Summer clouds at daytime'),(129,'sunset_clouds.jpg','image/jpeg',128651,'Sunset of clouds in Montana'),(130,'sunset_stones.jpg','image/jpeg',198679,'Stones in the sea'),(131,'surfer.jpg','image/jpeg',119111,'Surfer at dusk'),(132,'thick_clouds.jpg','image/jpeg',149486,'Thick clouds of cotton'),(133,'town.jpg','image/jpeg',199852,'Winter town at night'),(134,'tree_branches.jpg','image/jpeg',153045,'Serene tree branches'),(135,'tree_shine.jpg','image/jpeg',197251,'Sun shining through a tree'),(136,'tree_woods.jpg','image/jpeg',222578,'Overgrown trees and grass'),(137,'trees_cliff.jpg','image/jpeg',116494,'Trees on the cliff'),(138,'trees_night.jpg','image/jpeg',149165,'Tunnel of trees'),(139,'vegetation.jpg','image/jpeg',179782,'Field of vegetation'),(140,'wave_crash.jpg','image/jpeg',198238,'Ocean waves crashing'),(141,'wheat_field.jpg','image/jpeg',200462,'Fields of grain'),(142,'wheat.jpg','image/jpeg',153359,'Closeup of wheat plant'),(143,'white_tree.jpg','image/jpeg',135535,'White blossoms in Summer'),(144,'windmills.jpg','image/jpeg',195542,'Windmills in the countryside'),(145,'winter_evening.jpg','image/jpeg',160490,'An evening in December'),(146,'winter_sunset.jpg','image/jpeg',111985,'A cold sunset'),(147,'winter_trees.jpg','image/jpeg',123188,'A silent night'),(148,'cherry.jpg','image/jpeg',218316,'Cherry blossoms in Japan');
/*!40000 ALTER TABLE `photographs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `biography` varchar(700) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `linkedin` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `education` varchar(50) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `employer` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `job_description` varchar(300) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','Todd','Austin','A hard worker with a strong aptitude for learning. As a full stack developer in an Agile environment, I have been able to take the lead as well as support others in accomplishing any objective or project passed our way. From server administration and IT support tickets to high-level project overview and code development, I have been fortunate enough to wear a variety of hats, making me an invaluable member of any team. Never stop imagining, because unless you try something beyond what you have already mastered, you will never see growth.','admin@snapshare.dev','612-309-8724','Minneapolis, MN','www.imaginestudioswebdesign.com','austintoddj','austintoddj','in/austintoddj','2015-02-27 18:28:46','North Central University, MN','Business Administration','Information Technology','Homes for Heroes, Inc','Web Developer','Develop an internal web-based system, helping the company be more efficient by enhancing the web application used for internal workflow, managing staff requests in regards to website improvements, and making recommendations and implementing web based solutions.','Married','Male','1987-04-08','ice.jpg','image/jpeg',96721,''),(2,'foo','foo','foo','bar','','foo@bar.com','','','','','','','2015-03-09 00:00:00','','','','','','','','','0000-00-00','','',0,'');
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

-- Dump completed on 2015-03-12 15:57:35
