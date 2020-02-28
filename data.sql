-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla empresa_db.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_contacto` varchar(45) NOT NULL,
  `celular` varchar(8) NOT NULL,
  `email_principal` varchar(45) NOT NULL,
  `email_secundario` varchar(45) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `fk_contacto_1_idx` (`id_empresa`),
  CONSTRAINT `fk_contacto_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla empresa_db.contacto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `celular`, `email_principal`, `email_secundario`, `id_empresa`) VALUES
	(6, 'Daniel Vasquez', '78451236', 'dvasquez@constancia.com', 'info@constancia.com', 8),
	(7, 'Alejandro Ramirez', '78546523', 'aramirez@caricia.com', NULL, 6);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;

-- Volcando estructura para tabla empresa_db.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(45) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL,
  `telefono_empresa` varchar(8) NOT NULL,
  `sitio_web` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla empresa_db.empresa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `direccion_empresa`, `telefono_empresa`, `sitio_web`) VALUES
	(6, 'Industrias Caricia', 'Blvd. del ejercito Nacional Km 4.5, Soyapango', '22517000', NULL),
	(8, 'Industrias La Constancia', '5.4 km · Pje Izotal', '29251555', 'www.laconstancia.com/');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
