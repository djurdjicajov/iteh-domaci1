/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.25-MariaDB : Database - bioskop1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bioskop1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bioskop1`;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `events` */

/*Table structure for table `film` */

DROP TABLE IF EXISTS `film`;

CREATE TABLE `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `trajanje` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `zanr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `zanr` (`zanr`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`zanr`) REFERENCES `zanr` (`id_zanra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `film` */

/*Table structure for table `zanr` */

DROP TABLE IF EXISTS `zanr`;

CREATE TABLE `zanr` (
  `id_zanra` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_zanra` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_zanra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `zanr` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
