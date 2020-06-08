/*
 Navicat Premium Data Transfer

 Source Server         : LocalFormacion
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : service

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 07/06/2020 15:21:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) DEFAULT NULL,
  `targeta` varchar(255) DEFAULT NULL,
  `saldo` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of accounts
-- ----------------------------
BEGIN;
INSERT INTO `accounts` VALUES (1, 3, 'VANS', 200, NULL, '2020-06-07 20:19:56');
INSERT INTO `accounts` VALUES (2, 1, 'BANCOMER', 380, NULL, '2020-06-07 20:19:18');
INSERT INTO `accounts` VALUES (3, 8, NULL, 200, '2020-06-06 18:58:51', '2020-06-06 19:04:58');
INSERT INTO `accounts` VALUES (4, 9, NULL, 200, '2020-06-06 19:06:15', '2020-06-06 19:07:29');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_03_11_154714_role_usuario', 1);
INSERT INTO `migrations` VALUES (5, '2020_03_11_155008_servicio', 1);
INSERT INTO `migrations` VALUES (6, '2020_03_11_155952_subcripcion', 1);
INSERT INTO `migrations` VALUES (7, '2020_03_11_160759_pago', 1);
COMMIT;

-- ----------------------------
-- Table structure for pagos
-- ----------------------------
DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_subscripcion` int(11) NOT NULL,
  `se_pago` date NOT NULL,
  `monto` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pagos
-- ----------------------------
BEGIN;
INSERT INTO `pagos` VALUES (1, 16, '2020-06-07', 120, '2020-06-07 20:19:18', '2020-06-07 20:19:18');
INSERT INTO `pagos` VALUES (2, 17, '2020-06-07', 200, '2020-06-07 20:19:56', '2020-06-07 20:19:56');
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for role_usuario
-- ----------------------------
DROP TABLE IF EXISTS `role_usuario`;
CREATE TABLE `role_usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_usuario
-- ----------------------------
BEGIN;
INSERT INTO `role_usuario` VALUES (1, 'subscriptor', 'usario que hace uso de un servicio', NULL, NULL);
INSERT INTO `role_usuario` VALUES (2, 'cobrador', 'usuario que administra el sistema', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` blob DEFAULT NULL,
  `costo` int(11) NOT NULL,
  `monto_mora` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of servicios
-- ----------------------------
BEGIN;
INSERT INTO `servicios` VALUES (1, 'Zumba Toning', '1591560182_1.jpg', '1591560182_2.jpeg', '1591560182_3.jpg', NULL, 120, 30, 1, 1, '2020-06-07 20:03:02', '2020-06-07 20:03:02');
INSERT INTO `servicios` VALUES (2, 'Zumba Step', '1591560303_1.jpg', '1591560303_2.jpg', '1591560303_3.jpeg', NULL, 100, 20, 1, 1, '2020-06-07 20:05:03', '2020-06-07 20:05:03');
INSERT INTO `servicios` VALUES (3, 'Aqua Zumba', '1591560378_1.jpg', '1591560378_2.jpg', '1591560378_3.jpg', NULL, 200, 70, 1, 1, '2020-06-07 20:06:18', '2020-06-07 20:06:18');
INSERT INTO `servicios` VALUES (4, 'Zumba Kids', '1591560484_1.jpeg', '1591560484_2.jpg', '1591560484_3.jpg', NULL, 250, 95, 1, 1, '2020-06-07 20:08:04', '2020-06-07 20:08:04');
INSERT INTO `servicios` VALUES (5, 'Zumba Kids Junior', '1591560614_1.jpeg', '1591560614_2.jpeg', '1591560614_3.jpeg', NULL, 320, 100, 1, 1, '2020-06-07 20:10:14', '2020-06-07 20:10:14');
COMMIT;

-- ----------------------------
-- Table structure for subscripciones
-- ----------------------------
DROP TABLE IF EXISTS `subscripciones`;
CREATE TABLE `subscripciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_fecha` date NOT NULL,
  `renovacion` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_servicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelar` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subscripciones
-- ----------------------------
BEGIN;
INSERT INTO `subscripciones` VALUES (16, '2020-06-07', '2020-07-08', 1, '1', 0, '2020-06-07 20:19:18', '2020-06-07 20:19:18');
INSERT INTO `subscripciones` VALUES (17, '2020-06-07', '2020-07-08', 3, '3', 0, '2020-06-07 20:19:56', '2020-06-07 20:19:56');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cuenta` int(3) DEFAULT NULL,
  `saldo` int(10) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'ASH2A9J909JA', 'ramon', '9612932192', 'AV. Siempre viva', 'nombre@io.com', '$2y$10$vwxAcuaJ28lVsCV4DCWGn..Cssb0cnkakjIIY3R5RPjaeZBIGroqi', 1, NULL, '2020-03-11 17:51:24', '2020-06-05 02:25:22', NULL, 150);
INSERT INTO `users` VALUES (2, 'NEAA850101152', 'Amado Nemesis Achienta', NULL, 'Av. No viva', 'amado@io.com', '$2y$10$ww6y0pF6mhLKFZi7EjD1f.igLvaf2qwSqEgOH3g09Zxvpy4L9B0Le', 2, 'Y61Ujx11BBbrlN95Xcjc5YCk8xZPtftbTK2FWcjh6KOvcp7vsheTN6It5hOu', '2020-03-11 18:22:56', '2020-03-17 02:38:59', NULL, NULL);
INSERT INTO `users` VALUES (3, 'LUGA610808B98', 'Josep Y. Loma Callon', '9612982192', 'Avenida Zenon No. 416', 'josep@io.com', '$2y$10$q5N5cspIMErGbLqMRzbUVeThrML.S8qjvVJ7VvHTc6AgNCDfTMPEm', 1, NULL, '2020-03-13 15:34:50', '2020-05-26 16:47:50', 1, 400);
INSERT INTO `users` VALUES (4, 'HAA7y8A/', 'Ricando', NULL, 'Av. No viva', '23mk01@gmail.com', '$2y$10$HK7VjLVygjQabpyK5Ou/EOQzorvbASrTycwcf9yFhOWvkCrSGNsNW', 1, NULL, '2020-06-06 18:34:24', '2020-06-06 18:34:24', NULL, 0);
INSERT INTO `users` VALUES (9, '010IJISUDHF89S89', 'MANUEL DE LA PAX', NULL, 'AV. FUCK THE POPULATION', 'asd@gmail.com', '$2y$10$l8RYXqSd0gF9yz/J1EK9ROZMJWaTD40vV2cVyPKi38stwjZRfNTtS', 2, NULL, '2020-06-06 19:06:15', '2020-06-06 19:06:15', NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
