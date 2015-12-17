# Host: 192.168.64.131  (Version: 5.6.21)
# Date: 2015-12-17 18:12:08
# Generator: MySQL-Front 5.3  (Build 4.243)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "anticipo"
#

DROP TABLE IF EXISTS `anticipo`;
CREATE TABLE `anticipo` (
  `cod_saldo` decimal(10,0) NOT NULL DEFAULT '0',
  `codigo_cliente` decimal(10,0) DEFAULT NULL,
  `monto_favor` decimal(10,0) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `monto_pedido` decimal(10,4) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_saldo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "anticipo"
#

/*!40000 ALTER TABLE `anticipo` DISABLE KEYS */;
INSERT INTO `anticipo` VALUES (1,1,200,'2015-11-02',250.0000,NULL,'Entregado','Productos:'),(2,1,100,'2015-11-14',200.0000,NULL,'Entregado','Productos:');
/*!40000 ALTER TABLE `anticipo` ENABLE KEYS */;

#
# Structure for table "anticipouser"
#

DROP TABLE IF EXISTS `anticipouser`;
CREATE TABLE `anticipouser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_user` decimal(30,0) DEFAULT NULL,
  `nombre_vendedor` varchar(100) DEFAULT NULL,
  `id_anticipo` decimal(30,0) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "anticipouser"
#

INSERT INTO `anticipouser` VALUES (1,1,'Franklin Villarroel Saavedra',3),(2,1,'Franklin Villarroel Saavedra',3);

#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `CODIGO_CLIENTE` decimal(6,0) NOT NULL DEFAULT '0',
  `CI_CLIENTE` decimal(8,0) NOT NULL DEFAULT '0',
  `NOMBRE_CLIENTE` varchar(30) NOT NULL DEFAULT '',
  `APELLIDO_PATERNO` varchar(30) DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(30) DEFAULT NULL,
  `DIRECCION_CLIENTE` varchar(250) DEFAULT NULL,
  `TELEFONO_CLIENTE` decimal(10,0) DEFAULT NULL,
  `E_MAIL` varchar(60) DEFAULT NULL,
  `FECHA_SUS` date DEFAULT NULL,
  `ESTADO_CLIENTE` varchar(15) DEFAULT NULL,
  `OBSERVACIONES_CLIENTE` varchar(255) DEFAULT NULL,
  `DESCUENTO` decimal(6,0) DEFAULT NULL,
  `TIPO_CLIENTE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_CLIENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,99999999,'Qixia','Qin','','Las Palmas',60773312,'qin@hotmail.com','2015-05-03','Activo','pedidos anticipados - update',5,'Nuevo S/T');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

#
# Structure for table "detalle_venta"
#

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta` (
  `CODIGO_DETALLE` decimal(10,0) NOT NULL DEFAULT '0',
  `COD_USUARIO` varchar(30) DEFAULT NULL,
  `CODIGO_PRODUCTO` varchar(30) DEFAULT NULL,
  `ID_VENTA` decimal(10,0) DEFAULT NULL,
  `CODIGO_CLIENTE` decimal(6,0) DEFAULT NULL,
  `CANTIDAD` decimal(10,0) DEFAULT NULL,
  `PRECIO_UNITARIO` decimal(15,0) DEFAULT NULL,
  `MONTO_PARCIAL` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_DETALLE`),
  KEY `VENTA_DV_FK` (`ID_VENTA`),
  KEY `US_DP_FK` (`COD_USUARIO`),
  KEY `PROD_DV_FK` (`CODIGO_PRODUCTO`),
  KEY `CLI_DV_FK` (`CODIGO_CLIENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "detalle_venta"
#

/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (3,'1','AX-004',1,1,1,10,10),(4,'1','AX-004',2,1,3,10,30),(5,'1','AX-004',2,1,2,10,20),(6,'1','AX-0041',2,1,1,200,200),(7,'1','AX-0041',3,1,1,200,200),(8,'1','AX-004',4,1,2,10,20),(9,'1','AX-007',5,1,1,10,10),(10,'1','AX-007',6,1,1,10,10),(11,'1','AX-016',6,1,2,10,20),(12,'1','AX-004',7,1,2,10,20),(13,'1','AX-015',8,1,4,10,40),(14,'1','AX-0041',9,1,1,200,200),(15,'1','AX-004',10,1,2,10,20),(16,'1','AX-013',10,1,3,10,30);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

#
# Structure for table "pago_pedido"
#

DROP TABLE IF EXISTS `pago_pedido`;
CREATE TABLE `pago_pedido` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` decimal(10,0) DEFAULT NULL,
  `id_cliente` decimal(10,0) DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `monto_pago` decimal(10,2) DEFAULT NULL,
  `estado_pagos` varchar(100) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pago_pedido"
#


#
# Structure for table "persona"
#

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `COD_PERSONA` varchar(30) NOT NULL DEFAULT '',
  `COD_USUARIO` varchar(30) DEFAULT NULL,
  `COD_ROL` varchar(30) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDOP` varchar(30) DEFAULT NULL,
  `APELLIDOM` varchar(30) DEFAULT NULL,
  `CI` decimal(7,0) DEFAULT NULL,
  `TELEFONO` decimal(12,0) DEFAULT NULL,
  `DIRECCION` varchar(60) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`COD_PERSONA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "persona"
#

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('1','1','2','Franklin','Villarroel','Saavedra',311305,7777777,'Grover suarez','admin@hotmail.com','ninguno'),('2','2','1','Dante','Villarroel','Saavedra',3113054,72729061,'Grover suarez','test@hotmail.com','Ingreso en Fecha 06/05/2015, Garantia.....'),('3','4','2','Franklin','terrazas','Mar',444444,6565665,'zone cobija','test@hotmail.com','ninguna'),('4','5','1','user1','apaterno12','amaterno1',222222,3333,'new1','test@hotmail.com','Ninguna1'),('5','6','1','user2','apaterno','amaterno',33333,333,'new','test@hotmail.com','new user'),('6','7','2','Dante','Villarroel','Saavedra',3113054,72729061,'Grover suarez 1429','test@hotmail.com','Ingreso en Fecha 06/05/2015, Garantia.....');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

#
# Structure for table "producto"
#

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `CODIGO_PRODUCTO` varchar(30) NOT NULL DEFAULT '',
  `NOMBRE_PRODUCTO` varchar(60) NOT NULL DEFAULT '',
  `NOMBRE_CHINO` varchar(60) NOT NULL DEFAULT '',
  `NOMBRE_INGLES` varchar(60) NOT NULL DEFAULT '',
  `PRECIO_UNITARIO_PROD` decimal(6,0) NOT NULL DEFAULT '0',
  `STOCK` decimal(4,0) DEFAULT NULL,
  `MARCA` varchar(250) DEFAULT NULL,
  `INDUSTRIA` varchar(250) DEFAULT NULL,
  `STOCK_MINIMO` decimal(4,0) DEFAULT NULL,
  `UNIDAD` varchar(50) DEFAULT NULL,
  `OBSERVACIONES_PRODUCTO` varchar(250) DEFAULT NULL,
  `ESTADO_PRODUCTO` varchar(25) DEFAULT NULL,
  `IMAGEN1` varchar(255) DEFAULT NULL,
  `IMAGEN2` varchar(255) DEFAULT NULL,
  `IMAGEN3` varchar(255) DEFAULT NULL,
  `IMAGEN4` varchar(255) DEFAULT NULL,
  `IMAGEN5` varchar(255) DEFAULT NULL,
  `PREFERENCIAL` decimal(10,0) DEFAULT NULL,
  `REGULAR` decimal(10,0) DEFAULT NULL,
  `IRREGULAR` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_PRODUCTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "producto"
#

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES ('AX-004','Balatas-update','','',10,509,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-0041','Balatas-update','','',200,1002,'CHINA','CHINA',40,'PCS','Ninguna','Activo','Balatas.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-005','Balatas2','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas2.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-007','Balatas3-update2','','',10,498,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas3.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-008','Balatas4','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas4.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-009','Balatas5','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas5.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-010','Balatas6','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas6.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-011','chapa de contacto AX-100','','',20,200,'CHINA','CHINA',20,'PCS','','Activo','chapa de contacto AX-100.jpg',NULL,NULL,NULL,NULL,20,21,22),('AX-013','Balatas2','','',10,497,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas2.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-014','Balatas3-update2','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas3.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-015','Balatas4','','',10,496,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas4.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-016','Balatas5','','',10,498,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas5.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-018','Balatas6','','',10,500,'CHINA','CHINA',30,'PCS','Ninguna','Activo','Balatas6.jpg',NULL,NULL,NULL,NULL,26,30,34),('AX-020','chapa de contacto AX-100','','',20,200,'CHINA','CHINA',20,'PCS','','Activo','chapa de contacto AX-100.jpg',NULL,NULL,NULL,NULL,20,21,22);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

#
# Structure for table "rol"
#

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `COD_ROL` varchar(30) NOT NULL DEFAULT '',
  `NOMBRE_ROL` varchar(30) DEFAULT NULL,
  `DESCRICION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`COD_ROL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "rol"
#

/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES ('1','Vendedor','None'),('2','Administrador','none');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

#
# Structure for table "session"
#

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `cod_user` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "session"
#

/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('1');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `COD_USUARIO` varchar(30) NOT NULL DEFAULT '',
  `LOGIN` varchar(30) DEFAULT NULL,
  `PASS` varchar(30) DEFAULT NULL,
  `ESTADO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`COD_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "usuario"
#

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('1','franklin','franklin','Activo'),('2','dvillarroel','dvillarroel','Activo'),('3','cvillarroel','cvillarroel','activo'),('4','fterrazas','fterrazas','Activo'),('5','user1','user1','Activo'),('6','user2','user2','Activo'),('7','dvillarroel','dvillarroel','Activo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

#
# Structure for table "venta"
#

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `ID_VENTA` decimal(10,0) NOT NULL DEFAULT '0',
  `TOTAL` decimal(30,0) DEFAULT NULL,
  `TOTAL_DESCUENTO` decimal(30,0) DEFAULT NULL,
  `FECHA_VENTA` date DEFAULT NULL,
  `ESTADO_VENTA` varchar(10) DEFAULT NULL,
  `CODIGO_CLIENTE` decimal(6,0) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado_pagado` varchar(50) DEFAULT NULL,
  `monto_pagado` decimal(10,2) DEFAULT NULL,
  `monto_saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_VENTA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "venta"
#

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,10,0,'2015-05-03','Ejecutado',1,NULL,NULL,NULL,NULL),(2,250,0,'2015-11-02','Ejecutado',1,NULL,NULL,NULL,NULL),(3,200,0,'2015-11-07','Ejecutado',1,NULL,NULL,NULL,NULL),(4,20,0,'2015-12-10','Ejecutado',1,NULL,NULL,NULL,NULL),(5,10,0,'2015-12-10','Ejecutado',1,NULL,NULL,NULL,NULL),(6,30,0,'2015-12-10','Ejecutado',1,'2015-12-13',NULL,NULL,NULL),(7,20,0,'2015-12-12','Ejecutado',1,'2015-12-14',NULL,NULL,NULL),(8,40,0,'2015-12-13','Ejecutado',1,'2015-12-15',NULL,NULL,NULL),(9,200,0,'2015-12-17','No Ejecuto',1,NULL,NULL,NULL,NULL),(10,0,0,'2015-12-17','No Ejecuto',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

#
# Structure for table "ventavendedor"
#

DROP TABLE IF EXISTS `ventavendedor`;
CREATE TABLE `ventavendedor` (
  `Id_vv` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` decimal(30,0) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `nombrevendedor` varchar(255) DEFAULT NULL,
  `id_userEntrego` decimal(10,0) DEFAULT NULL,
  `nombreentrego` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_vv`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "ventavendedor"
#

INSERT INTO `ventavendedor` VALUES (1,4,'1','Franklin Villarroel Saavedra',NULL,NULL),(2,5,'1','Franklin Villarroel Saavedra',2,'Dante Villarroel Saavedra'),(3,6,'1','Franklin Villarroel Saavedra',2,'Dante Villarroel Saavedra'),(4,7,'1','Franklin Villarroel Saavedra',2,'Dante Villarroel Saavedra'),(5,8,'1','Franklin Villarroel Saavedra',2,'Dante Villarroel Saavedra'),(6,9,'1','Franklin Villarroel Saavedra',NULL,NULL);
