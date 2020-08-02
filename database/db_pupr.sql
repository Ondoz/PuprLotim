-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pupr
DROP DATABASE IF EXISTS `pupr`;
CREATE DATABASE IF NOT EXISTS `pupr` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pupr`;

-- Dumping structure for table pupr.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` char(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT '0',
  `created_by` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tbl_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `name`, `user_email`, `user_password`, `role_id`, `is_active`, `created_by`) VALUES
	(9, '1', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL),
	(10, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, NULL),
	(12, 'Reza', 'reza@reza.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_access_menu
DROP TABLE IF EXISTS `tb_access_menu`;
CREATE TABLE IF NOT EXISTS `tb_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_access_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_access_menu` DISABLE KEYS */;
INSERT INTO `tb_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 2, 2);
/*!40000 ALTER TABLE `tb_access_menu` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_answers
DROP TABLE IF EXISTS `tb_answers`;
CREATE TABLE IF NOT EXISTS `tb_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_questions` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_answers: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_answers` DISABLE KEYS */;
INSERT INTO `tb_answers` (`id`, `id_questions`, `id_user`, `body`, `created_at`, `updated_at`) VALUES
	(12, 20, 2, 'asssssaasasdfwwerafas', '2019-10-20 13:13:54', '2019-10-20 13:13:54'),
	(13, 19, 2, 'fadsfxasdfasdfwffasdfasdf', '2019-10-20 13:14:07', '2019-10-20 13:14:07'),
	(14, 20, 1, 'siap', '2019-11-08 05:52:57', '2019-11-08 05:52:57'),
	(15, 21, 1, 'siap ', '2019-11-20 15:52:49', '2019-11-20 15:52:49'),
	(16, 21, 7, 'ok pak\r\n', '2019-11-20 15:53:50', '2019-11-20 15:53:50'),
	(17, 21, 1, 'apa sih ribut ribut', '2019-11-20 15:57:53', '2019-11-20 15:57:53'),
	(18, 21, 9, 'kagak tau eee ', '2019-11-20 15:58:12', '2019-11-20 15:58:12');
/*!40000 ALTER TABLE `tb_answers` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_data_project
DROP TABLE IF EXISTS `tb_data_project`;
CREATE TABLE IF NOT EXISTS `tb_data_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uraian_pekerjaan` varchar(50) NOT NULL DEFAULT '0',
  `volume` int(10) unsigned NOT NULL DEFAULT '0',
  `sat` varchar(50) NOT NULL DEFAULT '0',
  `no_analisa` varchar(50) NOT NULL DEFAULT '0',
  `harga_satuan` int(20) unsigned NOT NULL DEFAULT '0',
  `status` enum('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `tb_project` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_data_project: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_data_project` DISABLE KEYS */;
INSERT INTO `tb_data_project` (`id`, `project_id`, `uraian_pekerjaan`, `volume`, `sat`, `no_analisa`, `harga_satuan`, `status`) VALUES
	(5, 2, 'Pembangun', 2, 'Set', 'Ls', 100000, '1'),
	(6, 2, 'Galian', 4, 'm3', 'Ls', 233333, '2');
/*!40000 ALTER TABLE `tb_data_project` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_menu
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_project
DROP TABLE IF EXISTS `tb_project`;
CREATE TABLE IF NOT EXISTS `tb_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_kerja` varchar(255) DEFAULT NULL,
  `no_spk` varchar(50) DEFAULT NULL,
  `tgl_spk` date DEFAULT NULL,
  `paket_pekerjaan` varchar(255) DEFAULT NULL,
  `no_supl` varchar(50) DEFAULT NULL,
  `tgl_supl` date DEFAULT NULL,
  `no_bahpl` varchar(50) DEFAULT NULL,
  `tgl_bahpl` date DEFAULT NULL,
  `sumber_dana` text,
  `jumlah_hk` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_project: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_project` DISABLE KEYS */;
INSERT INTO `tb_project` (`id`, `satuan_kerja`, `no_spk`, `tgl_spk`, `paket_pekerjaan`, `no_supl`, `tgl_supl`, `no_bahpl`, `tgl_bahpl`, `sumber_dana`, `jumlah_hk`, `tgl_mulai`, `tgl_selesai`) VALUES
	(2, 'Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Lombok Timur', '1/PKK/PLP3/PU-CK/03082020', '2020-08-03', 'Pembuatan Bendungan Di Desa Sakra', '3/PKK/PLP3/PU-CK/2020', '2020-08-22', '5/PKK/PLP3/PU-CK/2020', '2020-08-29', 'Uang Kas Daerah', 190, '2020-08-27', '2020-08-31');
/*!40000 ALTER TABLE `tb_project` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_questions
DROP TABLE IF EXISTS `tb_questions`;
CREATE TABLE IF NOT EXISTS `tb_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid_question` char(32) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sub_module` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_questions: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_questions` DISABLE KEYS */;
INSERT INTO `tb_questions` (`id`, `uuid_question`, `id_user`, `id_sub_module`, `title`, `slug`, `body`, `views`, `created_at`, `updated_at`) VALUES
	(19, '61e29a2d-f2fb-11e9-b0ab-448a5bcf', 2, 1, 'It\'s Questions Title', 'it-s-questions-title', 'questions first', 5, '2019-10-20 12:35:10', '2019-10-20 12:35:10'),
	(20, 'c3da508a-f300-11e9-b0ab-448a5bcf', 2, 1, 'this is my first question update', 'this-is-my-first-question-update', 'gas luuurrr', 0, '2019-10-20 13:13:42', '2019-10-20 13:13:42'),
	(21, '0599c7a5-0b73-11ea-915c-448a5bcf', 7, 2, 'It\'s Questions Title', 'it-s-questions-title', '<p>terserah</p>', 0, '2019-11-20 15:52:03', '2019-11-20 15:52:03'),
	(22, '454911ea-ccaa-11ea-bc87-c85b7698', 10, 4, 'update Pengerjaan Jalan ', 'update-pengerjaan-jalan', '<p>1. kita buat ukurannya&nbsp;</p><p>2. membuat rancangan&nbsp;</p>', 1, '2020-07-23 13:03:46', '2020-07-23 13:03:46');
/*!40000 ALTER TABLE `tb_questions` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_role
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE IF NOT EXISTS `tb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_role` DISABLE KEYS */;
INSERT INTO `tb_role` (`id`, `name_role`) VALUES
	(1, 'Admin'),
	(2, 'User');
/*!40000 ALTER TABLE `tb_role` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_sda
DROP TABLE IF EXISTS `tb_sda`;
CREATE TABLE IF NOT EXISTS `tb_sda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sungai` varchar(50) NOT NULL DEFAULT '0',
  `nama_sungai` varchar(50) NOT NULL DEFAULT '0',
  `wilayah` varchar(50) NOT NULL DEFAULT '0',
  `lebar_max` int(11) NOT NULL DEFAULT '0',
  `max_m3` int(11) NOT NULL DEFAULT '0',
  `panjang` int(11) NOT NULL DEFAULT '0',
  `ket` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_sda: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_sda` DISABLE KEYS */;
INSERT INTO `tb_sda` (`id`, `kode_sungai`, `nama_sungai`, `wilayah`, `lebar_max`, `max_m3`, `panjang`, `ket`) VALUES
	(2, 'Ks-0001', 'keruak', 'Keruak', 10, 100, 1000, 'Sehat');
/*!40000 ALTER TABLE `tb_sda` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_sub_menu
DROP TABLE IF EXISTS `tb_sub_menu`;
CREATE TABLE IF NOT EXISTS `tb_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_sub_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_sub_menu` DISABLE KEYS */;
INSERT INTO `tb_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin/dashboard', 'md md-dashboard', 1),
	(3, 1, 'Menu', 'admin/menu', 'md md-menu', 1),
	(5, 1, 'Role', 'admin/role', 'md md-accessibility', 1),
	(8, 1, 'Module', 'admin/module', 'md md-my-library-books', 1),
	(16, 2, 'Dashboard', 'user/dashboard', 'md md-dashboard', 1),
	(17, 2, 'Module ', 'user/module', 'md md-my-library-books', 1),
	(21, 1, 'Project', 'admin/project', 'md md-work', 1),
	(23, 1, 'SD AIR', 'admin/sda', 'md md-local-drink', 1),
	(24, 1, 'User', 'admin/user', 'md  md-account-box', 1);
/*!40000 ALTER TABLE `tb_sub_menu` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_sub_module
DROP TABLE IF EXISTS `tb_sub_module`;
CREATE TABLE IF NOT EXISTS `tb_sub_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `createby` varchar(500) NOT NULL,
  `createdatetime` datetime NOT NULL,
  `updatedatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_sub_module: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_sub_module` DISABLE KEYS */;
INSERT INTO `tb_sub_module` (`id`, `title`, `slug`, `is_active`, `createby`, `createdatetime`, `updatedatetime`) VALUES
	(1, 'Financie and Cost Control', 'financie-and-cost-control', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Procurement Managemen', 'procurement-managemen', 1, '2', '2019-10-09 16:13:41', '2019-10-09 16:13:41'),
	(3, ' Inventory and Matrilal Managemen ', 'inventory-and-matrilal-managemen ', 1, '1', '2019-10-09 16:15:57', '2019-10-09 16:15:57');
/*!40000 ALTER TABLE `tb_sub_module` ENABLE KEYS */;

-- Dumping structure for table pupr.tb_wilayah
DROP TABLE IF EXISTS `tb_wilayah`;
CREATE TABLE IF NOT EXISTS `tb_wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(50) NOT NULL DEFAULT '0',
  `jml_kelurahan` int(11) NOT NULL DEFAULT '0',
  `jml_desa` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table pupr.tb_wilayah: ~20 rows (approximately)
/*!40000 ALTER TABLE `tb_wilayah` DISABLE KEYS */;
INSERT INTO `tb_wilayah` (`id`, `kecamatan`, `jml_kelurahan`, `jml_desa`) VALUES
	(1, 'Aikmel', 0, 24),
	(2, 'Jerowaru', 0, 15),
	(3, 'Keruak', 0, 15),
	(4, 'Labuhan Haji', 4, 8),
	(5, 'Masbagik', 0, 10),
	(6, 'Montong Gading', 0, 8),
	(7, 'Pringgabaya', 0, 15),
	(8, 'Pringgasela', 0, 10),
	(9, 'Sakra', 0, 12),
	(10, 'Sakra Timur', 0, 10),
	(11, 'Sakra Barat', 0, 18),
	(12, 'Sambelia', 0, 11),
	(13, 'Selong', 11, 1),
	(14, 'Sembalun', 0, 6),
	(15, 'Sikur', 0, 9),
	(16, 'Sukamulia', 0, 9),
	(17, 'Suralaga', 0, 15),
	(18, 'Suwela', 0, 8),
	(19, 'Terara', 0, 16),
	(20, 'Wabasaba', 0, 14);
/*!40000 ALTER TABLE `tb_wilayah` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
