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


-- Volcando estructura de base de datos para stocklem_db
CREATE DATABASE IF NOT EXISTS `stocklem_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `stocklem_db`;

-- Volcando estructura para tabla stocklem_db.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre articulo',
  `quantity` int NOT NULL COMMENT 'cantidad articulo',
  `min_quantity` int NOT NULL DEFAULT '1' COMMENT 'cantidad minima',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'foto articulo',
  `technical_sheet` text COLLATE utf8mb4_unicode_ci COMMENT 'ficha tecnica articulo',
  `presentation_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `supplier_id` bigint unsigned DEFAULT NULL,
  `unit_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `article_name_unique` (`name`),
  KEY `article_presentation_id_foreign` (`presentation_id`),
  KEY `article_category_id_foreign` (`category_id`),
  KEY `article_supplier_id_foreign` (`supplier_id`),
  KEY `article_unit_id_foreign` (`unit_id`),
  CONSTRAINT `article_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_presentation_id_foreign` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `article_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.article: ~10 rows (aproximadamente)
INSERT INTO `article` (`id`, `name`, `quantity`, `min_quantity`, `photo`, `technical_sheet`, `presentation_id`, `category_id`, `supplier_id`, `unit_id`, `created_at`, `updated_at`) VALUES
	(1, 'Antibiótico Bovino', 100, 20, NULL, NULL, 1, 1, 1, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(2, 'Fertilizante NPK 10-20-10', 500, 50, NULL, NULL, 2, 4, 3, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(3, 'Semillas de Maíz Híbrido', 200, 30, NULL, NULL, 5, 10, 3, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(4, 'Concentrado para Aves', 300, 40, NULL, NULL, 2, 2, 6, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(5, 'Insecticida Agrícola', 80, 15, NULL, NULL, 1, 9, 2, 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(6, 'Vitaminas para Ganado', 150, 25, NULL, NULL, 4, 6, 4, 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(7, 'Herbicida Selectivo', 120, 20, NULL, NULL, 6, 9, 2, 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(8, 'Alimento Balanceado Porcinos', 400, 60, NULL, NULL, 2, 2, 6, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(9, 'Fungicida para Cultivos', 90, 18, NULL, NULL, 1, 9, 2, 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(10, 'Suplemento Mineral Bovino', 250, 35, NULL, NULL, 5, 6, 4, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22');

-- Volcando estructura para tabla stocklem_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre categoria',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Descripcion categoria',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO' COMMENT 'estado categoría',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.category: ~10 rows (aproximadamente)
INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Medicamentos', 'Productos farmacéuticos para el ganado y cultivos', 'ACTIVO', NULL, NULL),
	(2, 'Alimentos', 'Productos alimenticios para consumo animal y humano', 'ACTIVO', NULL, NULL),
	(3, 'Cultivos', 'Productos agrícolas y semillas', 'ACTIVO', NULL, NULL),
	(4, 'Fertilizantes', 'Productos para mejorar la fertilidad del suelo', 'ACTIVO', NULL, NULL),
	(5, 'Herramientas', 'Instrumentos y equipos para labores agrícolas', 'ACTIVO', NULL, NULL),
	(6, 'Suplementos', 'Suplementos vitamínicos y nutricionales para animales', 'ACTIVO', NULL, NULL),
	(7, 'Insumos Agrícolas', 'Insumos generales para producción agrícola', 'ACTIVO', NULL, NULL),
	(8, 'Equipos de Riego', 'Sistemas y equipos para irrigación de cultivos', 'ACTIVO', NULL, NULL),
	(9, 'Plaguicidas', 'Productos para el control de plagas y enfermedades', 'ACTIVO', NULL, NULL),
	(10, 'Semillas', 'Semillas certificadas para siembra de cultivos', 'ACTIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.entry
CREATE TABLE IF NOT EXISTS `entry` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sena_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codigo sena',
  `date_entry` date NOT NULL COMMENT 'fecha entrada',
  `expiration_date` date DEFAULT NULL COMMENT 'fecha expiracion',
  `quantity` int NOT NULL COMMENT 'cantidad entrada',
  `observations` text COLLATE utf8mb4_unicode_ci COMMENT 'observaciones entrada',
  `article_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_article_id_foreign` (`article_id`),
  CONSTRAINT `entry_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.entry: ~10 rows (aproximadamente)
INSERT INTO `entry` (`id`, `sena_code`, `date_entry`, `expiration_date`, `quantity`, `observations`, `article_id`, `created_at`, `updated_at`) VALUES
	(1, 'ENTRY-001', '2025-01-15', '2026-01-15', 50, 'Entrada inicial de antibiótico bovino', 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(2, 'ENTRY-002', '2025-01-20', '2026-12-31', 200, 'Entrada de fertilizante NPK', 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(3, 'ENTRY-003', '2025-02-01', '2025-12-31', 100, 'Semillas de maíz para temporada', 3, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(4, 'ENTRY-004', '2025-02-10', '2025-08-10', 150, 'Concentrado para aves de engorde', 4, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(5, 'ENTRY-005', '2025-02-15', '2027-02-15', 40, 'Insecticida para control de plagas', 5, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(6, 'ENTRY-006', '2025-03-01', '2026-03-01', 80, 'Vitaminas para ganado lechero', 6, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(7, 'ENTRY-007', '2025-03-05', '2027-03-05', 60, 'Herbicida selectivo para cultivos', 7, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(8, 'ENTRY-008', '2025-03-10', '2025-09-10', 200, 'Alimento balanceado para porcinos', 8, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(9, 'ENTRY-009', '2025-03-15', '2027-03-15', 45, 'Fungicida para protección de cultivos', 9, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(10, 'ENTRY-010', '2025-03-20', '2026-06-20', 120, 'Suplemento mineral para ganado bovino', 10, '2025-11-13 19:04:22', '2025-11-13 19:04:22');

-- Volcando estructura para tabla stocklem_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stocklem_db.issue
CREATE TABLE IF NOT EXISTS `issue` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sena_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codigo sena',
  `date_issue` date NOT NULL COMMENT 'fecha salida',
  `quantity` int NOT NULL COMMENT 'cantidad salida',
  `observations` text COLLATE utf8mb4_unicode_ci COMMENT 'observaciones salida',
  `article_id` bigint unsigned NOT NULL,
  `person_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_article_id_foreign` (`article_id`),
  KEY `issue_person_id_foreign` (`person_id`),
  CONSTRAINT `issue_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `issue_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.issue: ~10 rows (aproximadamente)
INSERT INTO `issue` (`id`, `sena_code`, `date_issue`, `quantity`, `observations`, `article_id`, `person_id`, `created_at`, `updated_at`) VALUES
	(1, 'ISSUE-001', '2025-01-20', 10, 'Salida para tratamiento de ganado', 1, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(2, 'ISSUE-002', '2025-02-05', 50, 'Fertilización de cultivo de maíz', 2, 2, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(3, 'ISSUE-003', '2025-02-12', 30, 'Siembra de maíz parcela norte', 3, 3, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(4, 'ISSUE-004', '2025-02-18', 40, 'Alimentación aves de corral', 4, 4, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(5, 'ISSUE-005', '2025-02-22', 15, 'Control de plagas en cultivo', 5, 5, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(6, 'ISSUE-006', '2025-03-05', 20, 'Suplementación ganado lechero', 6, 6, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(7, 'ISSUE-007', '2025-03-08', 25, 'Control de maleza en cultivo', 7, 8, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(8, 'ISSUE-008', '2025-03-12', 60, 'Alimentación porcinos en crecimiento', 8, 9, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(9, 'ISSUE-009', '2025-03-18', 18, 'Prevención hongos en cultivo', 9, 10, '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(10, 'ISSUE-010', '2025-03-22', 35, 'Suplemento mineral para vacas', 10, 1, '2025-11-13 19:04:22', '2025-11-13 19:04:22');

-- Volcando estructura para tabla stocklem_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.migrations: ~13 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_06_12_172340_create_role_table', 1),
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2025_06_12_152127_create_unit_table', 1),
	(7, '2025_06_12_152139_create_person_table', 1),
	(8, '2025_06_12_152150_create_category_table', 1),
	(9, '2025_06_12_152207_create_supplier_table', 1),
	(10, '2025_06_12_152221_create_presentation_table', 1),
	(11, '2025_06_12_152458_create_article_table', 1),
	(12, '2025_06_12_152506_create_entry_table', 1),
	(13, '2025_06_12_163100_create_issue_table', 1);

-- Volcando estructura para tabla stocklem_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stocklem_db.person
CREATE TABLE IF NOT EXISTS `person` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document` bigint NOT NULL COMMENT 'documento persona',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'telefono persona',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre persona',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO' COMMENT 'estado persona',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_document_unique` (`document`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.person: ~10 rows (aproximadamente)
INSERT INTO `person` (`id`, `document`, `phone`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1001111111, '3121111111', 'Juan Martínez', 'ACTIVO', NULL, NULL),
	(2, 1001234567, '3124567890', 'Carlos Pérez', 'ACTIVO', NULL, NULL),
	(3, 1002222222, '3122222222', 'Ana López', 'ACTIVO', NULL, NULL),
	(4, 1003333333, '3123333333', 'Luis Rodríguez', 'ACTIVO', NULL, NULL),
	(5, 1007654321, '3156781234', 'María Gómez', 'ACTIVO', NULL, NULL),
	(6, 1004444444, '3144444444', 'Pedro Sánchez', 'ACTIVO', NULL, NULL),
	(7, 1005555555, '3155555555', 'Laura Torres', 'INACTIVO', NULL, NULL),
	(8, 1006666666, '3166666666', 'Andrés Ramírez', 'ACTIVO', NULL, NULL),
	(9, 1008888888, '3188888888', 'Sofia Vargas', 'ACTIVO', NULL, NULL),
	(10, 1009999999, '3199999999', 'Diego Morales', 'ACTIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stocklem_db.presentation
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Descripcion presentacion',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO' COMMENT 'estado prentación',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.presentation: ~10 rows (aproximadamente)
INSERT INTO `presentation` (`id`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Botella de 500ml', 'ACTIVO', NULL, NULL),
	(2, 'Saco de 50kg', 'ACTIVO', NULL, NULL),
	(3, 'Caja de 20 unidades', 'ACTIVO', NULL, NULL),
	(4, 'Frasco de 100ml', 'ACTIVO', NULL, NULL),
	(5, 'Bolsa de 10kg', 'ACTIVO', NULL, NULL),
	(6, 'Garrafa de 5 litros', 'ACTIVO', NULL, NULL),
	(7, 'Paquete de 1kg', 'ACTIVO', NULL, NULL),
	(8, 'Tambor de 200 litros', 'ACTIVO', NULL, NULL),
	(9, 'Caja de 100 unidades', 'ACTIVO', NULL, NULL),
	(10, 'Saco de 25kg', 'ACTIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ADMINISTRADOR, COORDINADOR ADMINISTRATIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.role: ~2 rows (aproximadamente)
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRADOR', NULL, NULL),
	(2, 'COORDINADOR ADMINISTRATIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre proveedor',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Telefono proveedor',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO' COMMENT 'estado proveedor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.supplier: ~10 rows (aproximadamente)
INSERT INTO `supplier` (`id`, `name`, `phone`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Agroinsumos del Valle', '3111234567', 'ACTIVO', NULL, NULL),
	(2, 'Distribuidora Agropecuaria', '3129876543', 'ACTIVO', NULL, NULL),
	(3, 'Semillas y Fertilizantes S.A.', '3151234890', 'ACTIVO', NULL, NULL),
	(4, 'Veterinaria La Granja', '3187654321', 'ACTIVO', NULL, NULL),
	(5, 'Suministros Agrícolas Ltda', '3165432198', 'ACTIVO', NULL, NULL),
	(6, 'Concentrados Premium', '3143216789', 'ACTIVO', NULL, NULL),
	(7, 'Tecniagrícola', '3198765432', 'ACTIVO', NULL, NULL),
	(8, 'Insumos del Campo', '3176543219', 'ACTIVO', NULL, NULL),
	(9, 'AgroMundo S.A.S', '3132109876', 'ACTIVO', NULL, NULL),
	(10, 'Proveedora Pecuaria', '3189012345', 'ACTIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre unidad',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO' COMMENT 'estado unidad',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.unit: ~10 rows (aproximadamente)
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Kilogramos', 'ACTIVO', NULL, NULL),
	(2, 'Litros', 'ACTIVO', NULL, NULL),
	(3, 'Unidades', 'ACTIVO', NULL, NULL),
	(4, 'Paquetes', 'ACTIVO', NULL, NULL),
	(5, 'Metros cúbicos', 'ACTIVO', NULL, NULL),
	(6, 'Gramos', 'ACTIVO', NULL, NULL),
	(7, 'Mililitros', 'ACTIVO', NULL, NULL),
	(8, 'Toneladas', 'ACTIVO', NULL, NULL),
	(9, 'Cajas', 'ACTIVO', NULL, NULL),
	(10, 'Bultos', 'ACTIVO', NULL, NULL);

-- Volcando estructura para tabla stocklem_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre usuarios',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'correo usuarios',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'contraseña usuarios',
  `role_id` bigint unsigned NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'estado del usuario',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla stocklem_db.users: ~11 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@example.com', '$2y$12$asau7MYkGuNLmwq.maC8a.ToePVOYYCEwqGrR5qryolhlVqSa9YWC', 1, 'ACTIVO', '2kQ5phhlFz', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(2, 'Cleta Kunde DVM', 'major.daugherty@example.com', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'l2DH2GfMjL', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(3, 'Miss Pearline Kohler DDS', 'tara05@example.com', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', '9xSHt8Wq0b', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(4, 'Dr. Eudora Wuckert Sr.', 'charlie.weimann@example.org', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'cKxyJBi1jW', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(5, 'Rylan Shanahan IV', 'boyer.kareem@example.org', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'iplRvZPWPH', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(6, 'Mrs. Lottie Boehm', 'presley.jacobi@example.net', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'VR4SRS7zsT', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(7, 'Era Pfannerstill', 'zieme.gerhard@example.org', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'QotYaU9BM6', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(8, 'Prof. Pete Mayer Sr.', 'nolan.pierce@example.com', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'rr1tyAnunP', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(9, 'Mr. Doyle Rippin', 'uhaag@example.org', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', '3Rg28hXCNN', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(10, 'Neva Bergstrom', 'elody.nolan@example.net', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'ubyrf8UVRS', '2025-11-13 19:04:22', '2025-11-13 19:04:22'),
	(11, 'Prof. Jannie Klein', 'qbeatty@example.com', '$2y$12$p7k39k6jOpgAiqXq9ZEhe.l.zyRPcAMANx15Qq8yZA9JEq5Th.1Pm', 1, 'ACTIVO', 'tP7AEruyI2', '2025-11-13 19:04:22', '2025-11-13 19:04:22');

-- Volcando estructura para disparador stocklem_db.trg_article_entry_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_article_entry_insert` AFTER INSERT ON `entry` FOR EACH ROW BEGIN
	UPDATE article 
   SET article.quantity = article.quantity + NEW.quantity 
   WHERE article.id = NEW.article_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador stocklem_db.trg_article_entry_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_article_entry_update` AFTER UPDATE ON `entry` FOR EACH ROW BEGIN
	UPDATE article 
   SET article.quantity = article.quantity + NEW.quantity 
   WHERE article.id = NEW.article_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador stocklem_db.trg_article_issue_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_article_issue_insert` AFTER INSERT ON `issue` FOR EACH ROW BEGIN
	UPDATE article
	SET article.quantity = article.quantity - NEW.quantity
	WHERE article.id = NEW.article_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador stocklem_db.trg_article_issue_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_article_issue_update` AFTER UPDATE ON `issue` FOR EACH ROW BEGIN
	UPDATE article
	SET article.quantity = article.quantity - NEW.quantity
	WHERE article.id = NEW.article_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
