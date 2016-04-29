# Host: localhost  (Version: 5.6.21)
# Date: 2016-04-26 17:01:51
# Generator: MySQL-Front 5.3  (Build 4.243)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "kardex"
#

DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `productoID` varchar(100) DEFAULT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `entrada` int(10) DEFAULT NULL,
  `salida` int(10) DEFAULT NULL,
  `saldo` int(10) DEFAULT NULL,
  `costoUnitario` decimal(10,2) DEFAULT NULL,
  `haber` decimal(10,2) DEFAULT NULL,
  `debe` decimal(10,2) DEFAULT NULL,
  `saldoMoney` decimal(10,2) DEFAULT NULL,
  `duiID` int(11) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `leftDui` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;
