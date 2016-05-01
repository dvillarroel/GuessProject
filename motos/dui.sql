# Host: localhost  (Version: 5.6.21)
# Date: 2016-04-30 22:17:03
# Generator: MySQL-Front 5.3  (Build 4.243)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "dui"
#

DROP TABLE IF EXISTS `dui`;
CREATE TABLE `dui` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `duiNumber` varchar(30) DEFAULT NULL,
  `cod_producto` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;
