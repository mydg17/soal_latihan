# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.23)
# Database: soal
# Generation Time: 2021-07-31 16:30:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bio`;

CREATE TABLE `bio` (
  `id_bio` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_bio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table keys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `keys`;

CREATE TABLE `keys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`)
VALUES
	(1,1,'key-tutor007',1,0,0,NULL,1);

/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table limits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `limits`;

CREATE TABLE `limits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int NOT NULL,
  `hour_started` int NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table paket_soal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paket_soal`;

CREATE TABLE `paket_soal` (
  `id_paket_soal` int NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_paket_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `paket_soal` WRITE;
/*!40000 ALTER TABLE `paket_soal` DISABLE KEYS */;

INSERT INTO `paket_soal` (`id_paket_soal`, `nama_paket`)
VALUES
	(33,'coba'),
	(36,'matematika juni');

/*!40000 ALTER TABLE `paket_soal` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table soal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
  `id_soal` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `text_soal` text,
  `id_paket_soal` int DEFAULT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `soal` WRITE;
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;

INSERT INTO `soal` (`id_soal`, `id_user`, `text_soal`, `id_paket_soal`)
VALUES
	(7,15,'tes',18),
	(12,15,'tes soal latian',18),
	(14,15,'lasjflks',19),
	(15,15,'coba',25),
	(16,15,'soal latian',29),
	(17,15,'tes soal latian',18),
	(100,15,'tes soal mix',8),
	(101,15,'tes soal mix',8),
	(102,15,'tes soal lengkap',35),
	(103,15,'coba ke 10',33),
	(104,15,'coba ke 11',18),
	(105,15,'tes soal yang ke dua',33),
	(106,15,'hitung jumlah 5 + 5 = ',36);

/*!40000 ALTER TABLE `soal` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table soal_pilgan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soal_pilgan`;

CREATE TABLE `soal_pilgan` (
  `id_pilgan` int NOT NULL AUTO_INCREMENT,
  `id_soal` int NOT NULL,
  `text_pilgan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `order_pilgan` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pilgan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `soal_pilgan` WRITE;
/*!40000 ALTER TABLE `soal_pilgan` DISABLE KEYS */;

INSERT INTO `soal_pilgan` (`id_pilgan`, `id_soal`, `text_pilgan`, `order_pilgan`)
VALUES
	(1,2,'update pilgan','b'),
	(5,30,'test pilgan0','R'),
	(8,89990,'cobain','E'),
	(9,199,'tes 9','c'),
	(100,100,'asdfsfdsf','a'),
	(101,100,'testestes','b'),
	(102,101,'asdfsfdsf','a'),
	(103,101,'testestes','b'),
	(104,102,'12+5','D'),
	(105,102,'14/2',''),
	(106,102,'90/5',''),
	(107,102,'20/4',''),
	(108,103,'coba ke 10 A','A'),
	(109,103,'coba ke 10 B','B'),
	(110,103,'coba ke 10 C','C'),
	(111,103,'coba ke 10 D','D'),
	(112,104,'coba ke 11 A','A'),
	(113,104,'coba ke 11 B','B'),
	(114,104,'coba ke 11 C','C'),
	(115,104,'coba ke 11 D','D'),
	(116,105,'tes soal yang ke dua A','A'),
	(117,105,'tes soal yang ke dua B','B'),
	(118,105,'tes soal yang ke dua C','C'),
	(119,105,'tes soal yang ke dua D','D'),
	(120,106,'2','A'),
	(121,106,'5','B'),
	(122,106,'10','C'),
	(123,106,'8','D');

/*!40000 ALTER TABLE `soal_pilgan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `role` enum('admin','tutor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role`)
VALUES
	(15,'mydg','fc5e1052001e0569543129b8895d555b','mydg@test.do','tutor'),
	(19,'admin','21232f297a57a5a743894a0e4a801fc3','admin@test.do','admin'),
	(28,'asfacoba','d41d8cd98f00b204e9800998ecf8427e','asfa@coba.dulu','tutor'),
	(30,'test','de17066b6cbb84e3646fad5d29788c21','admin@test.do2','admin'),
	(31,'alitopan','9915803a362be1392122187da3148d7e','alitopan@widyaedu.com','admin'),
	(32,'okiwicaksono','3b7da39baa889ac11928b482ac4cc16c','okiwicaksono@widyaedu.com','admin');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
