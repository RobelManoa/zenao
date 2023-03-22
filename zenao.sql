/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 8.0.27 : Database - zenao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`zenao` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `zenao`;

/*Table structure for table `avis` */

DROP TABLE IF EXISTS `avis`;

CREATE TABLE `avis` (
  `id_avis` int NOT NULL AUTO_INCREMENT,
  `noom` varchar(100) NOT NULL,
  `lieux` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`id_avis`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `avis` */

insert  into `avis`(id_avis,noom,lieux,message,note) values (1,'Laurence78, France','Zenao Appart’Hotel Nevers','« L’accueil de la responsable, la déco et la grandeur de l’appartement, la vue arborée et le calme , le parking »',3),(2,'Paule, France','Zenao Appart’Hotel Lisieux','« Tout était conforme à ce que j’espérais\r\nlit , salle de bains\r\nje ne peux que dire merci »',4),(3,'Isabelle, France','Zenao Appart’Hotel Mulhouse','« Tout. Calme, propre, confortable. Matelas parfait. Très bien aménagé et personnel extrêmement agréable. Merci ! »',5);

/*Table structure for table `lisieux` */

DROP TABLE IF EXISTS `lisieux`;

CREATE TABLE `lisieux` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `NCIN` int NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `lisieux` */

insert  into `lisieux`(idClient,nom_client,mail,phone,NCIN,date_reserver) values (1,'Benja','benja@gmail.com',344587415,2147483647,'2023-02-23'),(2,'jams','jams@gmail.com',341545215,2147483647,'2023-03-10'),(3,'mona','mona@gmail.com',12345678,2147483647,'2023-03-14');

/*Table structure for table `mulhouse` */

DROP TABLE IF EXISTS `mulhouse`;

CREATE TABLE `mulhouse` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `NCIN` int NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*Data for the table `mulhouse` */

insert  into `mulhouse`(idClient,nom_client,mail,phone,NCIN,date_reserver) values (1,'mama','mama@gmail.com',123465798,2147483647,'2023-03-05'),(2,'maman','maman@gmail.com',123465789,2147483647,'2023-03-06');

/*Table structure for table `nevers` */

DROP TABLE IF EXISTS `nevers`;

CREATE TABLE `nevers` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `NCIN` int NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*Data for the table `nevers` */

insert  into `nevers`(idClient,nom_client,mail,phone,NCIN,date_reserver) values (1,'Peta','peta@gmail.com',2147483647,2147483647,'2023-02-17'),(2,'sitraka','sitraka@gmail.com',2147483647,2147483647,'2023-05-10');

/*Table structure for table `photo` */

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `idPhoto` int NOT NULL AUTO_INCREMENT,
  `photo` text NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

/*Data for the table `photo` */

insert  into `photo`(idPhoto,photo) values (3,'image1.jpg'),(4,'image2.jpg'),(5,'image3.jpg'),(6,'image4.jpg'),(7,'image5.jpg'),(8,'image6.jpg'),(9,'image7.jpg'),(10,'image8.jpg'),(11,'image9.jpg'),(12,'image10.jpg'),(13,'image11.jpg'),(14,'image12.jpg'),(15,'image13.jpg'),(16,'image14.jpg'),(17,'image15.jpg'),(18,'image16.jpg'),(19,'image19.jpg'),(20,'image20.jpg'),(21,'image21.jpg'),(22,'image22.jpg');

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `nomR` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `lieux_reserver` varchar(100) NOT NULL,
  `nb_personne` int NOT NULL,
  `NCIN` text NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idReservation`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

/*Data for the table `reservation` */

insert  into `reservation`(idReservation,nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) values (1,'Robel','robel@gmail.com',341040801,'zenaoM',4,'106654486','2023-03-02'),(2,'Robel','robel@gmail.com',341040801,'zenaoM',4,'106654486','2023-03-02'),(3,'RAKOTO malemy','rakotomalemy@gmail.com',334515421,'zenaoVA',2,'2147483647','2023-02-18'),(5,'Benja','benja@gmail.com',344587415,'zenaoL',5,'2147483647','2023-02-23'),(6,'Lolita','lolita@gmail.com',2147483647,'zenaoVA',4,'2147483647','2023-02-22'),(7,'Limo','limo@gmail.com',2147483647,'zenaoVA',4,'2147483647','2023-02-28'),(8,'Joary','joary@gmail.com',2147483647,'zenaoY',4,'2147483647','2023-02-27'),(9,'Peta','peta@gmail.com',2147483647,'zenaoN',4,'2147483647','2023-02-17'),(10,'jams','jams@gmail.com',341545215,'zenaoL',4,'2147483647','2023-03-10'),(11,'Lita','lita@gmail.com',341245678,'zenaoVA',2,'2147483647','2023-04-12'),(12,'Lola','lola@gmail.com',331475385,'zenaoVA',1,'2147483647','2023-03-08'),(14,'maman','maman@gmail.com',123465789,'zenaoVA',1,'2147483647','2023-03-06'),(15,'sitraka','sitraka@gmail.com',2147483647,'zenaoN',2,'111111111111','2023-05-10'),(16,'mona','mona@gmail.com',12345678,'zenaoL',2,'123456789123','2023-03-14');

/*Table structure for table `troyes` */

DROP TABLE IF EXISTS `troyes`;

CREATE TABLE `troyes` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `NCIN` int NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `troyes` */

/*Table structure for table `vavignon` */

DROP TABLE IF EXISTS `vavignon`;

CREATE TABLE `vavignon` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `NCIN` int NOT NULL,
  `date_reserver` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

/*Data for the table `vavignon` */

insert  into `vavignon`(idClient,nom_client,mail,phone,NCIN,date_reserver) values (1,'Mirana','mirana@gmail.com',341845685,2147483647,'2023-02-24'),(2,'Lolita','lolita@gmail.com',2147483647,2147483647,'2023-02-22'),(3,'Limo','limo@gmail.com',2147483647,2147483647,'2023-02-28'),(4,'Lita','lita@gmail.com',341245678,2147483647,'2023-04-12'),(5,'Lola','lola@gmail.com',331475385,2147483647,'2023-03-08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
