-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: stf_db
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `discovery_pack`
--

DROP TABLE IF EXISTS `discovery_pack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discovery_pack` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text,
  `duration` int DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discovery_pack`
--

LOCK TABLES `discovery_pack` WRITE;
/*!40000 ALTER TABLE `discovery_pack` DISABLE KEYS */;
INSERT INTO `discovery_pack` VALUES (1,'Silver Pack',120.00,'The \"Silver Discovery Pack\" offers a complete and varied shooting experience, ideal for firearms enthusiasts wishing to test different weapons and calibers. The pack includes 20 shots with the Glock 17, known for its reliability and ease of use, and 20 shots with the CZ 75 Shadow 2, famous for its accuracy and balance in shooting competitions. For a classic revolver experience, the pack also includes 5 shots with the Manurhin MR 73 in .38 Special and 5 shots in .357 Magnum, offering a powerful and precise shooting sensation. This pack is perfect for discovering the diversity and performance of these iconic weapons in a controlled, secure environment.',120,'/assets/images/silver_pack.webp'),(2,'Gold Pack',240.00,'The \"Gold Discovery Pack\" is an exceptional offer for shooters who want a complete and diversified shooting experience. In addition to everything included in the \"Silver Discovery Pack\", this pack enriches the experience with three additional weapons for total immersion in the world of firearms.\n\nThe pack includes 20 shots with the Colt 1911 in .45 ACP, an icon of American power and precision, known for its reliable performance and historic role in the armed forces. Revolver enthusiasts will also appreciate the 10-shot Ruger Super Redhawk in .44 Magnum, a rugged choice for large-caliber shooting offering excellent accuracy and optimized recoil management. To complete the package, 30 shots are offered with the Daniel Defense M4 MK18 in .223 Remington, a compact tactical rifle favored for its maneuverability and accuracy in close-in shooting scenarios.\n\nThe \"Gold Discovery Pack\" is ideal for shooters looking for in-depth experience covering a wide range of weapons and calibers, perfect for honing shooting skills and discovering the nuances of several types of firearm in a secure setting.\n\n\n\n\n\n',160,'/assets/images/gold_pack.webp'),(3,'Platinum Pack',360.00,'The \"Platinum Discovery Pack\" represents the ultimate offer for firearms enthusiasts looking to explore an even wider range of iconic calibers and models. This pack includes everything the Silver and Gold packs offer, with exceptional additions for an incomparable shooting experience.\n\nIn addition to the weapons and ammunition provided in the previous packs, the Platinum Pack enriches the adventure with 5 shots fired from the powerful Desert Eagle in .50 AE, a handgun renowned for its ability to deliver impressive firepower with remarkable accuracy. This pack also includes 5 shots from the fearsome Smith & Wesson in .500 S&W, the world\'s most powerful revolver, offering an extraordinarily intense shooting experience.\n\nFor tactical weapons enthusiasts, 30 shots with the CMMG Banshee MK47 in 7.62x39 offer an opportunity to handle a semi-automatic tactical rifle that combines the ruggedness of the AK-47 with the precision and modularity of the AR-15. This rifle is particularly appreciated for its reliable performance and compatibility with a wide range of accessories.\n\nThe \"Platinum Discovery Pack\" is perfect for those seeking total immersion in the world of firearms, offering a diverse and rewarding shooting experience suitable for both novice and expert shooters seeking to broaden their range of firearms skills and knowledge.\n\n\n\n\n\n',200,'/assets/images/platinium_pack.webp');
/*!40000 ALTER TABLE `discovery_pack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discovery_pack_reservation`
--

DROP TABLE IF EXISTS `discovery_pack_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discovery_pack_reservation` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `discovery_pack_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`),
  KEY `discovery_pack_id` (`discovery_pack_id`),
  CONSTRAINT `discovery_pack_reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  CONSTRAINT `discovery_pack_reservation_ibfk_2` FOREIGN KEY (`discovery_pack_id`) REFERENCES `discovery_pack` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discovery_pack_reservation`
--

LOCK TABLES `discovery_pack_reservation` WRITE;
/*!40000 ALTER TABLE `discovery_pack_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `discovery_pack_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `age` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_member` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,23,'admin@test.com','$2y$10$o74Sz1YZZY222Z3HeuJKteqhVeT0o3u03FX/lNCNUcpevA9lNZKFe',1,1),(2,43,'test1@exemple.com','$2y$10$SIV4I6tT467LkHZyTH1.vuKb..Q6lxTrXkFqNK81vrZl334AzziB.',1,0),(3,25,'test2@exemple.com','$2y$10$Gnv6/BshbbrzEPAatXbMRuVHj3vAdxyD6qyRqcDnIyBfJEfa1wSTm',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weapon`
--

DROP TABLE IF EXISTS `weapon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weapon` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `caliber` varchar(255) DEFAULT NULL,
  `description` text,
  `image` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weapon`
--

LOCK TABLES `weapon` WRITE;
/*!40000 ALTER TABLE `weapon` DISABLE KEYS */;
INSERT INTO `weapon` VALUES (1,'75 Shadow 2','CZ','9mm PARA','A fixture on every shooting range, the first-generation CZ75 SP01 Shadow has already won over legions of sports shooters. Now, with a view to perfecting their excellence, the Czechs at CZ are launching the second generation of this marvel: the CZ Shadow 2.','/assets/images/shadow2.webp'),(2,'17 Gen5','Glock','9mm PARA','The Glock 17 Gen 5 is an evolution of the famous semi-automatic pistol, offering improved ergonomics with no protuberances on the grip, a Marksman barrel for enhanced accuracy, and an nDLC finish for improved durability. Featuring easy-to-identify magazines and safety enhancements, it\'s ideal for both professional and personal use.','/assets/images/glock17.webp'),(3,'92X Performance','Beretta','9mm PARA','The Beretta 92X Performance is a semi-automatic pistol designed for competition and sport shooting. It combines the proven reliability of the 92 series with improvements for optimum accuracy and performance, such as an ergonomic grip, a steel frame for better balance, and a quick-reaction trigger. Its robust construction and adjustable features, such as sights and safety, make it extremely accurate and adaptable to the needs of competitive shooters.','/assets/images/92X.webp'),(4,'1911 COMPETITION SERIES','Colt','.45 ACP','The Colt 1911 Competition Series is a modern iteration of the classic 1911 pistol, tailored for competitive shooting. It features a match-grade barrel for exceptional accuracy, an upgraded fiber optic front sight for quick target acquisition, and a dual spring recoil system to reduce felt recoil and muzzle flip. The series boasts an ergonomic grip and a National Match slide, making it highly sought after by precision shooters for its reliability and performance in competition settings.','/assets/images/1911.webp'),(5,'MR73 Sport 6\"','Manurhin','.357 mag - 38 special','The Manurhin MR73 Sport with a 6\" barrel is a high-precision revolver renowned for its durability and accuracy. This model is designed for both sport shooting and tactical applications. It features a robust, forged frame and cylinder, precision adjustable sights, and a finely tuned double-action trigger. The MR73\'s reputation for reliability and superior craftsmanship makes it a favored choice among competitive shooters and law enforcement professionals alike.','/assets/images/MR73.webp'),(6,'Black 6\"','Desert Eagle','.50 AE','The Desert Eagle Black with a 6\" barrel is an iconic semi-automatic pistol known for its imposing size and powerful chambering. This model, finished in sleek black, boasts a gas-operated mechanism that is rare among pistols, allowing it to handle the high pressures of the .50 AE cartridges it commonly fires. The 6\" barrel aids in accuracy and velocity, while its large frame and weight help manage recoil. This pistol is popular for its distinctive appearance and formidable stopping power, making it a standout choice for enthusiasts and collectors.','/assets/images/Desert_Eagle.webp'),(7,'500 8\"','Smith & Wesson','.500 SW','The Smith & Wesson Model 500 with an 8\" barrel is a massively powerful revolver designed for hunting and extreme shooting sports. It holds the title as one of the most powerful production revolvers in the world, chambered for the .500 S&W Magnum cartridge. This model features a stainless steel construction, a compensator to help reduce recoil, and an adjustable rear sight for enhanced accuracy. The 8\" barrel provides optimal velocity and precision, making the S&W 500 ideal for targeting large game and for long-range shooting challenges.','/assets/images/500SW.webp'),(8,'SUPER REDHAWK Inox 7.5\"','Ruger','.44 Rem Mag','The Ruger Super Redhawk Inox with a 7.5\" barrel is a rugged and robust revolver designed for serious sportsmen and outdoor adventurers. Crafted from corrosion-resistant stainless steel, this model excels in demanding environments. It is chambered for powerful cartridges such as .44 Magnum, making it suitable for hunting large game. The revolver features a strong, extended frame for increased durability, adjustable sights for precision aiming, and a cushioned grip system that helps absorb recoil. The Super Redhawk\'s reliability and performance make it a top choice for hunters and target shooters who require a dependable firearm in harsh conditions.','/assets/images/Super_Redhawk.webp'),(9,'M4 MK18 10.3\" RIS III','Daniel Defense','.223 Rem','The Daniel Defense M4 MK18 with a 10.3\" RIS III is a highly compact and versatile tactical carbine renowned for its reliability and performance in close quarters combat. It features a 10.3-inch barrel that makes it ideal for maneuverability in tight spaces, while the RIS III rail system allows for extensive customization with optics, lights, and other tactical accessories. This model is built to military specifications with a free-floating, cold hammer-forged barrel for superior accuracy, and a rugged and ergonomic design that withstands demanding use. The MK18 is a preferred choice among law enforcement and military units for its exceptional durability and effective firepower in a compact package.','/assets/images/MK18.webp'),(10,'Banshee MK47 8\"','CMMG','7,62x39','The CMMG Banshee MK47 with an 8\" barrel is a compact and powerful firearm that blends the best features of the AK-47 and AR platforms. It is chambered for the 7.62x39mm cartridge, providing substantial firepower in a small frame. This model features an 8-inch barrel that makes it highly maneuverable and ideal for close-quarters combat, while still being capable of achieving significant accuracy at medium ranges. The Banshee MK47 incorporates a unique radial delayed blowback system, which reduces recoil and enhances shooting comfort. Its M-LOK compatible handguard allows for easy customization with accessories. Durable and versatile, the Banshee MK47 is particularly favored for tactical applications and personal defense.','/assets/images/MK47.webp');
/*!40000 ALTER TABLE `weapon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weapon_reservation`
--

DROP TABLE IF EXISTS `weapon_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weapon_reservation` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `weapon_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`),
  KEY `weapon_id` (`weapon_id`),
  CONSTRAINT `weapon_reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  CONSTRAINT `weapon_reservation_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weapon_reservation`
--

LOCK TABLES `weapon_reservation` WRITE;
/*!40000 ALTER TABLE `weapon_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `weapon_reservation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-14 11:28:24
