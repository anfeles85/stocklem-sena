-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.40 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bdinventario
CREATE DATABASE IF NOT EXISTS `bdinventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdinventario`;

-- Volcando estructura para tabla bdinventario.article
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `technical_sheet` varchar(255) DEFAULT NULL,
  `id_presentation` bigint DEFAULT NULL,
  `id_category` bigint DEFAULT NULL,
  `id_supplier` bigint DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_presentation` (`id_presentation`),
  KEY `id_category` (`id_category`),
  KEY `FK_article_supplier` (`id_supplier`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_presentation`) REFERENCES `presentation` (`id_presentation`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_article_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.article: ~5 rows (aproximadamente)
INSERT INTO `article` (`id_article`, `name`, `quantity`, `photo`, `technical_sheet`, `id_presentation`, `id_category`, `id_supplier`) VALUES
	(1, 'Antibiótico Bovino', 100, NULL, NULL, 1, 1, 1),
	(2, 'Concentrado para pollos', 200, NULL, NULL, 2, 2, 3),
	(3, 'Semillas de maíz', 300, NULL, NULL, 3, 3, 3),
	(4, 'Fertilizante Orgánico', 150, NULL, NULL, 4, 4, 1),
	(5, 'Herramienta de Riego', 50, NULL, NULL, 5, 5, 1);

-- Volcando estructura para tabla bdinventario.category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.category: ~5 rows (aproximadamente)
INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
	(1, 'Medicamentos', 'Productos farmacéuticos para el ganado y cultivos'),
	(2, 'Alimentos', 'Productos alimenticios para consumo animal y humano'),
	(3, 'Cultivos', 'Productos agrícolas y semillas'),
	(4, 'Fertilizantes', 'Productos para mejorar la fertilidad del suelo'),
	(5, 'Herramientas', 'Instrumentos y equipos para labores agrícolas');

-- Volcando estructura para tabla bdinventario.entry
CREATE TABLE IF NOT EXISTS `entry` (
  `id_entry` bigint NOT NULL AUTO_INCREMENT,
  `sena_code` varchar(70) DEFAULT NULL,
  `date` date NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `quantity` int NOT NULL,
  `observations` text,
  `id_article` bigint NOT NULL,
  PRIMARY KEY (`id_entry`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.entry: ~5 rows (aproximadamente)
INSERT INTO `entry` (`id_entry`, `sena_code`, `date`, `expiration_date`, `quantity`, `observations`, `id_article`) VALUES
	(1, 'SENA-001', '2025-03-01', '2026-03-01', 50, 'Entrada inicial de antibiótico', 1),
	(2, 'SENA-002', '2025-02-15', '2026-02-15', 100, 'Primera entrada de concentrado', 2),
	(3, 'SENA-003', '2025-04-01', '2026-04-01', 75, 'Entrada de semillas de maíz', 3),
	(4, 'SENA-004', '2025-04-10', '2026-04-10', 60, 'Entrada de fertilizante orgánico', 4),
	(5, 'SENA-005', '2025-04-15', '2026-04-15', 20, 'Entrada de herramienta de riego', 5);

-- Volcando estructura para tabla bdinventario.exit
CREATE TABLE IF NOT EXISTS `exit` (
  `id_exit` bigint NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantity` int NOT NULL,
  `observations` text,
  `id_article` bigint NOT NULL,
  `document` bigint NOT NULL DEFAULT (0),
  `id_unit` bigint NOT NULL,
  PRIMARY KEY (`id_exit`),
  KEY `id_article` (`id_article`),
  KEY `id_unit` (`id_unit`),
  KEY `FK_exit_person` (`document`),
  CONSTRAINT `exit_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `exit_ibfk_3` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_exit_person` FOREIGN KEY (`document`) REFERENCES `person` (`document`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.exit: ~5 rows (aproximadamente)
INSERT INTO `exit` (`id_exit`, `date`, `quantity`, `observations`, `id_article`, `document`, `id_unit`) VALUES
	(1, '2025-03-02', 10, 'Salida para uso en tratamiento', 1, 1001234567, 2),
	(2, '2025-03-05', 20, 'Salida para alimentación de pollos', 2, 1007654321, 1),
	(3, '2025-04-02', 15, 'Salida para siembra de maíz', 3, 1001111111, 1),
	(4, '2025-04-12', 5, 'Salida para fertilización', 4, 1002222222, 2),
	(5, '2025-04-18', 2, 'Salida para mantenimiento de riego', 5, 1003333333, 3);

-- Volcando estructura para tabla bdinventario.person
CREATE TABLE IF NOT EXISTS `person` (
  `document` bigint NOT NULL DEFAULT (0),
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.person: ~5 rows (aproximadamente)
INSERT INTO `person` (`document`, `phone`, `name`) VALUES
	(1001111111, '3121111111', 'Juan Martínez'),
	(1001234567, '3124567890', 'Carlos Pérez'),
	(1002222222, '3122222222', 'Ana López'),
	(1003333333, '3123333333', 'Luis Rodríguez'),
	(1007654321, '3156781234', 'María Gómez');

-- Volcando estructura para tabla bdinventario.presentation
CREATE TABLE IF NOT EXISTS `presentation` (
  `id_presentation` bigint NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id_presentation`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.presentation: ~5 rows (aproximadamente)
INSERT INTO `presentation` (`id_presentation`, `description`) VALUES
	(1, 'Botella de 500ml'),
	(2, 'Saco de 50kg'),
	(3, 'Caja de 20 unidades'),
	(4, 'Frasco de 100ml'),
	(5, 'Bolsa de 10kg');

-- Volcando estructura para tabla bdinventario.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_unit` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.supplier: ~3 rows (aproximadamente)
INSERT INTO `supplier` (`id_unit`, `name`, `phone`) VALUES
	(1, 'Hernan Perez', '31174554'),
	(2, 'Maices Gallina Feliz', '31174586'),
	(3, 'Concentrados el Pollon', '3478548');

-- Volcando estructura para tabla bdinventario.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `id_unit` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdinventario.unit: ~5 rows (aproximadamente)
INSERT INTO `unit` (`id_unit`, `name`) VALUES
	(1, 'Kilogramos'),
	(2, 'Litros'),
	(3, 'Unidades'),
	(4, 'Paquetes'),
	(5, 'Metros cúbicos');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
