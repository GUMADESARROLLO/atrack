/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : atrack

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-18 16:39:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bitacora
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idcliente` varchar(15) DEFAULT NULL,
  `producto` varchar(150) DEFAULT NULL,
  `ndoc` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bitacora
-- ----------------------------

-- ----------------------------
-- Table structure for bitacora_log
-- ----------------------------
DROP TABLE IF EXISTS `bitacora_log`;
CREATE TABLE `bitacora_log` (
  `idLog` int(15) NOT NULL AUTO_INCREMENT,
  `idBitacora` int(15) DEFAULT NULL,
  `Cliente` int(15) DEFAULT NULL,
  `via` varchar(100) DEFAULT NULL,
  `viaNombre` varchar(100) DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bitacora_log
-- ----------------------------

-- ----------------------------
-- Table structure for bitacora_via
-- ----------------------------
DROP TABLE IF EXISTS `bitacora_via`;
CREATE TABLE `bitacora_via` (
  `idvia` int(15) NOT NULL AUTO_INCREMENT,
  `VIA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idvia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bitacora_via
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `IdRol` int(10) NOT NULL COMMENT 'Id de Rol',
  `Descripcion` varchar(250) NOT NULL COMMENT 'Descripcion del Rol',
  PRIMARY KEY (`IdRol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'SuperAdministrador');
INSERT INTO `roles` VALUES ('2', 'Administrador');
INSERT INTO `roles` VALUES ('3', 'Cliente');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `IdUsuario` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Id de usuario',
  `Usuario` varchar(100) NOT NULL COMMENT 'Usuario',
  `Nombre` varchar(150) DEFAULT NULL COMMENT 'Nombre del usuario',
  `Clave` varchar(100) NOT NULL COMMENT 'Contraseña de Usuario',
  `Rol` varchar(100) NOT NULL COMMENT 'Tipo de Usuario',
  `IdCL` varchar(10) NOT NULL COMMENT 'Id del Cliente',
  `Cliente` varchar(250) DEFAULT NULL COMMENT 'Nombre del Cliente',
  `Zona` varchar(250) DEFAULT NULL COMMENT 'Nombre de Vendedor o Ruta',
  `Estado` bit(1) DEFAULT NULL COMMENT '0 Activo, 1 Inactivo',
  `FechaCreacion` datetime NOT NULL COMMENT 'Fecha de Creación del Usuario',
  `FechaBaja` datetime DEFAULT NULL COMMENT 'Fecha de Baja del Usuario',
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3141 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', 'admin', '7C33FC4A0D1662CF5A5E8EB686A1DEC3', 'Administrador', '', '', '', '\0', '2016-06-27 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `usuario` VALUES ('3139', 'srenazco', 'srenazco', '827ccb0eea8a706c4c34a16891f84e7b', '', '', null, null, '\0', '2017-06-19 00:05:25', '2017-06-19 00:33:29');
INSERT INTO `usuario` VALUES ('3140', 'srenazco', 'srenazco', '827ccb0eea8a706c4c34a16891f84e7b', 'Cliente', '', null, null, '\0', '2017-06-19 00:08:22', null);

-- ----------------------------
-- View structure for view_bitacora
-- ----------------------------
DROP VIEW IF EXISTS `view_bitacora`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_bitacora` AS SELECT	
	T0.id,
	T0.idcliente,
	(SELECT T2.Nombre FROM usuario T2 WHERE T2.IdUsuario=T0.idcliente)as Nombre,
	T0.producto,
	T0.ndoc,
	(SELECT T1.viaNombre FROM bitacora_log T1 where T1.idBitacora=T0.id ORDER BY T1.idLog DESC limit 1) as Via,
	(SELECT T1.Status FROM bitacora_log T1 where T1.idBitacora=T0.id ORDER BY T1.idLog DESC limit 1) as Estado
FROM
	bitacora T0 ;

-- ----------------------------
-- Procedure structure for pc_Catalogo
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Catalogo`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_Catalogo`(IN `CATALOGO` INT)
BEGIN
		DECLARE v_IdCT,  v_Puntos 	INT;
		DECLARE v_Nombre VARCHAR(255);
		DECLARE v_Imagen, v_CodImg VARCHAR(150);

		
		DECLARE cont, conse INT DEFAULT 1;
		
		DECLARE CSQL TEXT DEFAULT "(";
		DECLARE RELLENO, errores INT DEFAULT 0;
		
		DECLARE data_cursor CURSOR FOR 
			SELECT detallect.IdCT, detallect.IdIMG, detallect.Nombre, detallect.IMG, detallect.Puntos
			FROM detallect
			WHERE detallect.IdCT = CATALOGO AND detallect.Estado <> 1
			ORDER BY detallect.IdIMG;
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET errores = 1;

		SELECT COUNT(IdCT) INTO RELLENO FROM detallect WHERE detallect.IdCT = CATALOGO AND detallect.Estado <> 1;
       
        IF RELLENO <> 0 THEN
          OPEN data_cursor;
               read_data: LOOP
                          FETCH data_cursor INTO v_IdCT, v_CodImg, v_Nombre, v_Imagen, v_Puntos;
				
				           IF errores = 1 THEN LEAVE read_data; END IF;
                
				           SET CSQL = CONCAT(CSQL, v_IdCT, ",'",v_CodImg,"','",  v_Nombre, "','", v_Imagen, "',", v_Puntos);
                
				           IF cont = 4 THEN                    
                              IF conse = RELLENO THEN
                                 SET CSQL = CONCAT(CSQL, ")");
                              ELSE
                                  SET CSQL = CONCAT(CSQL, "),(");
                              END IF;	
                    
                              SET cont = 0;
                          ELSEIF conse < RELLENO THEN
                              SET CSQL = CONCAT(CSQL, ",");   
                          END IF;
				
				          SET cont = cont + 1;
				          SET conse = conse + 1;
                END LOOP read_data;
		    CLOSE data_cursor;
            	    
		    SET RELLENO = 4 - (((RELLENO/4) - FLOOR(RELLENO/4)) * 4);
		    
		    IF RELLENO < 4 THEN
               SET CSQL = CONCAT(CSQL, ",");
               
			   WHILE RELLENO <> 0 DO
			         SET CSQL = CONCAT(CSQL, "'0','0','','','0'");
            		 SET RELLENO = RELLENO - 1;
                
				     IF RELLENO <> 0 THEN
				        SET CSQL = CONCAT(CSQL, ",");
                     ELSE
                        SET CSQL = CONCAT(CSQL, ")");
                     END IF;
               END WHILE;
           END IF;
   	       
		   DELETE FROM tmp_Catalogo;
           
		   SET @query = CONCAT("INSERT INTO tmp_Catalogo VALUES", CSQL);
           
		   PREPARE IC FROM @query; 
		   EXECUTE IC; 
		   DEALLOCATE PREPARE IC;
		END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_Clientes_Facturas
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Clientes_Facturas`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_Clientes_Facturas`(IN `cod` VARCHAR(20))
BEGIN
				

			SELECT GROUP_CONCAT(CONCAT("'",Factura,"'")) as Facturas  
								FROM rfactura
				WHERE IdCliente = cod AND Puntos = 0 
				GROUP BY IdCliente;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_Clientes_Facturas_dev
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Clientes_Facturas_dev`;
DELIMITER ;;
CREATE DEFINER=`Dios`@`%` PROCEDURE `pc_Clientes_Facturas_dev`(IN cod VARCHAR(20))
BEGIN
				SELECT GROUP_CONCAT(CONCAT("'",Factura,"'")) as Facturas  
				FROM view_devolucion_factura
				WHERE IdCliente = cod 
				GROUP BY IdCliente;					
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_Clientes_Facturas_Fre
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Clientes_Facturas_Fre`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_Clientes_Facturas_Fre`(IN `cod` CHAR(20))
BEGIN
								SELECT GROUP_CONCAT(CONCAT("'",Factura,"'")) as Facturas  
								FROM view_fre_factura
								WHERE IdCliente = cod
								AND Anulado='N'
								GROUP BY IdCliente;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_clientes_pa
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_clientes_pa`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_clientes_pa`(IN `CODIGO` INT)
BEGIN
SELECT T0.IdCliente, SUM(T0.Puntos) AS Puntos FROM view_frp_factura T0
  WHERE T0.Anulado = 'N' AND T0.IdCliente = CODIGO
  GROUP BY T0.IdCliente;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_clientes_pe
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_clientes_pe`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_clientes_pe`(IN `cod` CHAR(20))
BEGIN
                SELECT T0.IdCliente, SUM(T0.Puntos) AS Puntos FROM view_fre_factura T0
								WHERE T0.Anulado = 'N' AND T0.IdCliente = cod
								GROUP BY T0.IdCliente;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_Clientes_rfactura
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Clientes_rfactura`;
DELIMITER ;;
CREATE DEFINER=`Dios`@`%` PROCEDURE `pc_Clientes_rfactura`(IN cod VARCHAR(20))
BEGIN
				SELECT GROUP_CONCAT(CONCAT("'",Factura,"'")) as Facturas  
				FROM rfactura
				WHERE IdCliente = cod AND Puntos = '0'
				GROUP BY IdCliente;					
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_Devoluciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Devoluciones`;
DELIMITER ;;
CREATE DEFINER=`Dios`@`%` PROCEDURE `pc_Devoluciones`()
BEGIN
				SELECT GROUP_CONCAT(CONCAT("'",Factura,"'")) as Facturas  
				FROM devolucion
				WHERE ttPuntos = Puntos
				GROUP BY Factura;					
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_MFactura
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_MFactura`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_MFactura`(IN `infactura` CHAR(20), IN `inpuntos` INT, IN `fecha` DATETIME)
BEGIN
             UPDATE rfactura SET Puntos = (Puntos + INPUNTOS), FechaActualizacion = FECHA  WHERE Factura = INFACTURA;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for pc_RFactura
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_RFactura`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_RFactura`(IN `INFACTURA` CHAR(20), IN `INPUNTOS` INT, IN `CLIENTE` CHAR(30), IN `FECHA` DATETIME, IN `ttpuntos` INT)
BEGIN
                IF EXISTS(SELECT Factura FROM rfactura  WHERE Factura=INFACTURA) THEN
                BEGIN
                    UPDATE rfactura SET Puntos= (Puntos - INPUNTOS), FechaActualizacion = FECHA  WHERE Factura = INFACTURA;
                END;
                ELSE
                BEGIN
                               INSERT INTO rfactura (IdCliente,Factura,ttPuntos,Puntos,FechaActualizacion) 
                               VALUES(CLIENTE,INFACTURA,ttpuntos,ttpuntos-INPUNTOS,FECHA);       
               END;
END IF ;
END
;;
DELIMITER ;
