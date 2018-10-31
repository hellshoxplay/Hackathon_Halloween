-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: Bonbondex
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `Adresses`
--

DROP TABLE IF EXISTS `Adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adresses` (
  `idAdresses` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `markerName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdresses`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adresses`
--

LOCK TABLES `Adresses` WRITE;
/*!40000 ALTER TABLE `Adresses` DISABLE KEYS */;
INSERT INTO `Adresses` VALUES (1,47.8927,1.89989,'Manoir de l\'ennui'),(2,47.8934,1.89861,'Crypte de l\'enfer'),(3,47.8923,1.9,'Tombeau de la folie'),(4,47.8919,1.89927,'Geyser de boyau'),(5,47.8913,1.89863,'Antre du masochiste'),(6,47.893,1.89837,'Caveau des Lamentations'),(7,47.8918,1.89881,'Antre de la bête'),(8,47.891,1.89897,'Crypte noire'),(9,47.891,1.89838,'Cimetierre des Wilders'),(10,47.8907,1.89804,'Citrouille découpée'),(11,47.8928,1.89735,'Chevalier sans-tête'),(12,47.8929,1.89501,'Tombe de coupeur de têtes'),(13,47.8925,1.89429,'Taverne du fantôme'),(14,47.891,1.89501,'Fond de la grotte'),(15,47.8915,1.89298,'Chair de Pull'),(16,47.8913,1.89194,'Couvent Hanté'),(17,47.8902,1.89183,'Tombe de la frousse'),(18,47.8897,1.89093,'Manoir du doigt coupé'),(19,47.8907,1.88982,'Citadelle de l\'horeur'),(20,47.8909,1.88836,'Grotte de l\'araignée'),(21,47.8898,1.8877,'Crypte du Necromancien'),(22,47.8921,1.88756,'Champ morbide'),(23,47.8917,1.88689,'Goule sanguinolante'),(24,47.892,1.8858,'Massacre macabre'),(25,47.8901,1.88669,'Solitude éprouvante'),(26,47.8902,1.88814,'Forêt de la mort'),(27,47.89,1.88946,'Gargouille affamée'),(28,47.8938,1.88892,'Ecarteleur'),(29,47.8933,1.89012,'Succube ailée'),(30,47.8925,1.89084,'Donjon meurtrier'),(31,47.892,1.89139,'Lune écarlate'),(32,47.8923,1.89319,'Soldat defenestré'),(33,47.8925,1.89466,'Fantôme hurlant'),(34,47.8941,1.89645,'George le Dépeceur'),(35,47.8942,1.8997,'Bois du pendu'),(36,47.8931,1.89977,'Potence lugubre'),(37,47.8913,1.88377,'Monstre du placard'),(38,47.891,1.88406,'Langue de vipère'),(39,47.8909,1.88442,'Rapace decapité'),(40,47.8907,1.88502,'Essaim d\'abeilles tueuses');
/*!40000 ALTER TABLE `Adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Adresses_has_Bonbondex`
--

DROP TABLE IF EXISTS `Adresses_has_Bonbondex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adresses_has_Bonbondex` (
  `Adresses_idAdresses` int(11) NOT NULL,
  `Bonbondex_id` int(11) NOT NULL,
  PRIMARY KEY (`Adresses_idAdresses`,`Bonbondex_id`),
  KEY `fk_Adresses_has_Bonbondex_Bonbondex1_idx` (`Bonbondex_id`),
  KEY `fk_Adresses_has_Bonbondex_Adresses_idx` (`Adresses_idAdresses`),
  CONSTRAINT `fk_Adresses_has_Bonbondex_Adresses` FOREIGN KEY (`Adresses_idAdresses`) REFERENCES `Adresses` (`idAdresses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adresses_has_Bonbondex_Bonbondex1` FOREIGN KEY (`Bonbondex_id`) REFERENCES `Bonbondex` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adresses_has_Bonbondex`
--

LOCK TABLES `Adresses_has_Bonbondex` WRITE;
/*!40000 ALTER TABLE `Adresses_has_Bonbondex` DISABLE KEYS */;
INSERT INTO `Adresses_has_Bonbondex` VALUES (1,1),(2,2),(14,2),(3,3),(4,4),(5,5),(15,6),(40,7),(25,8),(26,9),(27,10),(23,11),(18,12),(26,13),(1,14),(24,14),(13,15),(18,15),(32,16),(17,17),(10,18),(36,18),(9,19),(25,19),(18,20),(2,21),(30,21),(17,22),(18,23),(19,24),(25,25),(12,26),(14,26),(6,27),(8,28),(9,29),(33,30),(4,31),(40,31),(5,32),(8,32),(39,32),(38,33),(6,34),(37,34),(36,35),(3,36),(35,36),(34,37),(33,38),(32,39),(31,40),(11,41),(30,41),(7,42),(29,42),(28,43),(27,44),(26,45),(25,46),(24,47),(23,48),(22,49),(21,50),(20,51),(19,52),(18,53),(17,54),(16,55),(15,56);
/*!40000 ALTER TABLE `Adresses_has_Bonbondex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bonbondex`
--

DROP TABLE IF EXISTS `Bonbondex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bonbondex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bonbondex`
--

LOCK TABLES `Bonbondex` WRITE;
/*!40000 ALTER TABLE `Bonbondex` DISABLE KEYS */;
INSERT INTO `Bonbondex` VALUES (1,'Tagada l\'originale','https://static.openfoodfacts.org/images/products/310/322/000/9574/front_fr.77.400.jpg',0),(2,'Chamallows Choco','https://static.openfoodfacts.org/images/products/310/322/004/3158/front_fr.4.400.jpg',0),(3,'Guimauve','https://static.openfoodfacts.org/images/products/201/995/829/9990/front_fr.16.400.jpg',0),(4,'Mini chupa chups','https://static.openfoodfacts.org/images/products/460/179/803/0055/front_fr.3.400.jpg',0),(5,'Citrouille halloween assortiment de confiseries','https://static.openfoodfacts.org/images/products/321/547/051/6938/front_fr.4.400.jpg',0),(6,'Bonbons au miel Myrtille Framboise','https://static.openfoodfacts.org/images/products/326/362/275/9719/front_fr.4.400.jpg',0),(7,'Haloween Party','https://static.openfoodfacts.org/images/products/23167308/front_fr.4.400.jpg',0),(8,'Cerise à la liqueur','https://static.openfoodfacts.org/images/products/26049472/front_fr.5.400.jpg',0),(9,'Maltesers','https://static.openfoodfacts.org/images/products/500/015/943/7943/front_fr.19.400.jpg',0),(10,'Dragolo','https://static.openfoodfacts.org/images/products/310/322/000/7822/front_fr.60.400.jpg',0),(11,'Sucette ghost pops','https://static.openfoodfacts.org/images/products/541/137/600/3147/front_fr.4.400.jpg',0),(12,'Rotella l\'original','https://static.openfoodfacts.org/images/products/310/322/000/9635/front_fr.7.400.jpg',0),(13,'Alpin fresh','https://static.openfoodfacts.org/images/products/761/070/062/6368/front_fr.13.400.jpg',0),(14,'La Vosgienne - Sève de Pin','https://static.openfoodfacts.org/images/products/353/828/003/6220/front_fr.12.400.jpg',0),(15,'Trick or treat assortiment','https://static.openfoodfacts.org/images/products/842/462/100/2519/front_fr.4.400.jpg',0),(16,'Magic Mouse','https://static.openfoodfacts.org/images/products/20724108/front_fr.13.400.jpg',0),(17,'Tic Tac Intense Mint','https://static.openfoodfacts.org/images/products/301/762/050/0060/front_fr.7.400.jpg',0),(18,'Bonherba','https://static.openfoodfacts.org/images/products/761/016/761/6810/front_fr.15.400.jpg',0),(19,'Winter Edition','https://static.openfoodfacts.org/images/products/310/322/004/2847/front_fr.4.400.jpg',0),(20,'Bestfizz','https://static.openfoodfacts.org/images/products/311/674/002/6136/front_fr.7.400.jpg',0),(21,'Hallowcandies','https://static.openfoodfacts.org/images/products/842/462/170/8299/front_fr.4.400.jpg',0),(22,'Ghost Tetine','https://static.openfoodfacts.org/images/products/501/106/100/1566/front_fr.4.400.jpg',0),(23,'pâtes de fruits','https://static.openfoodfacts.org/images/products/338/975/000/5556/front_fr.4.400.jpg',0),(24,'Scary Mix','https://static.openfoodfacts.org/images/products/842/462/100/1437/front_fr.4.400.jpg',0),(25,'Batna','https://static.openfoodfacts.org/images/products/366/434/630/8106/front_fr.8.400.jpg',0),(26,'Maxi mix','https://static.openfoodfacts.org/images/products/359/671/044/7992/front_fr.4.400.jpg',0),(27,'Langues acides','https://static.openfoodfacts.org/images/products/26034119/front_fr.6.400.jpg',0),(28,'Mentos menthe','https://static.openfoodfacts.org/images/products/87108019/front_fr.6.400.jpg',0),(29,'Skittles Fruits','https://static.openfoodfacts.org/images/products/400/990/049/8975/front_fr.19.400.jpg',0),(30,'Happy\'life','https://static.openfoodfacts.org/images/products/310/322/003/4804/front_fr.50.400.jpg',0),(31,'Haribo Orangina P!K','https://static.openfoodfacts.org/images/products/310/322/003/5597/front_fr.15.400.jpg',0),(32,'Skittles Fruits','https://static.openfoodfacts.org/images/products/500/015/930/3774/front_fr.35.400.jpg',0),(33,'Violettes cristallisées','https://static.openfoodfacts.org/images/products/376/004/378/5407/front_fr.12.400.jpg',0),(34,'Ricola aux plantes','https://static.openfoodfacts.org/images/products/761/070/060/0054/front_de.8.400.jpg',0),(35,'Halloween Box','https://static.openfoodfacts.org/images/products/356/470/653/9365/front_fr.4.400.jpg',0),(36,'Fondant aux 2 menthes, menthise','https://static.openfoodfacts.org/images/products/311/674/001/0210/front_fr.5.400.jpg',0),(37,'Tic Tac Goût Fraise Smoothie Banane','https://static.openfoodfacts.org/images/products/800/050/020/5341/front_fr.56.400.jpg',0),(38,'caramel de France au beurre salé','https://static.openfoodfacts.org/images/products/355/508/002/0563/front_fr.6.400.jpg',0),(39,'Bonbons caramels au beurre salé','https://static.openfoodfacts.org/images/products/376/013/006/6389/front_fr.4.400.jpg',0),(40,'Mon Caramel à la fleur de sel de Noirmoutier','https://static.openfoodfacts.org/images/products/376/007/274/3553/front_fr.6.400.jpg',0),(41,'Bonbons fourrés au Caramel et au sel de Guérande','https://static.openfoodfacts.org/images/products/347/020/210/0018/front_fr.4.400.jpg',0),(42,'Bonbons  fourrés au caramel au sel de noirmoutier','https://static.openfoodfacts.org/images/products/347/020/100/7943/front_fr.5.400.jpg',0),(43,'Berlingots au caramel au beurre salé de bretagne','https://static.openfoodfacts.org/images/products/347/020/100/7929/front_fr.6.400.jpg',0),(44,'Lutti Magnificat','https://static.openfoodfacts.org/images/products/311/674/002/2619/front_fr.12.400.jpg',0),(45,'Bonbons d\'Accueil : Caramel Mous au Beurre Salé','https://static.openfoodfacts.org/images/products/343/949/520/3905/front_fr.3.400.jpg',0),(46,'Mures','https://static.openfoodfacts.org/images/products/321/547/051/4163/front_fr.13.400.jpg',0),(47,'Spooky Eyeball','https://static.openfoodfacts.org/images/products/065/495/422/7671/front_fr.11.400.jpg',0),(48,'Seau Guimauves Assorties Halloween','https://static.openfoodfacts.org/images/products/376/003/635/8496/front_fr.4.400.jpg',0),(49,'Bonbons Lutti Scoubidou','https://static.openfoodfacts.org/images/products/311/674/002/7317/front_fr.6.400.jpg',0),(50,'Fraises Tagada','https://static.openfoodfacts.org/images/products/310/322/003/0417/front_fr.5.400.jpg',0),(51,'Haribo Pinballs 10P','https://static.openfoodfacts.org/images/products/400/168/657/9046/front_fr.20.400.jpg',0),(52,'Carambar Carafrisson','https://static.openfoodfacts.org/images/products/366/434/631/0505/front_fr.6.400.jpg',0),(53,'Haloween mix','https://static.openfoodfacts.org/images/products/841/317/826/9940/front_fr.4.400.jpg',0),(54,'Sensation Fruit Framboise & Cranberry','https://static.openfoodfacts.org/images/products/304/692/004/5315/front_fr.35.400.jpg',0),(55,'Skittles Tropical','https://static.openfoodfacts.org/images/products/063/415/430/3474/front_fr.9.400.jpg',0),(56,'Halloween Mask and Candy','https://static.openfoodfacts.org/images/products/871/330/580/8869/front_fr.5.400.jpg',0);
/*!40000 ALTER TABLE `Bonbondex` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-31  6:29:49
