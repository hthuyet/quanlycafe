/*
SQLyog Ultimate v11.3 (64 bit)
MySQL - 5.6.16 : Database - cafe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `activations` */

DROP TABLE IF EXISTS `activations`;

CREATE TABLE `activations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `completed` int(1) DEFAULT '0',
  `completed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `activations` */

insert  into `activations`(`id`,`code`,`user_id`,`updated_at`,`created_at`,`completed`,`completed_at`) values (1,'NCHVPSPAtnDrQSgeOaHfwvMLIbI7ZbAu',1,'2016-11-14 04:25:39','2016-11-14 04:25:39',1,'2016-11-14 04:25:39'),(2,'gf8izhwmjrHSYWWOOBisEd4A2Fh90dYP',2,'2016-11-16 09:42:17','2016-11-16 09:42:17',1,'2016-11-16 09:42:17'),(3,'OFNhhAK1RwGvQRqk8Um23wdQxzklpU41',3,'2016-11-16 10:06:19','2016-11-16 10:06:19',1,'2016-11-16 10:06:19'),(4,'3vrAWQ8rVdDIjLB0L3xO8JrgdgrbwWyM',3,'2016-11-24 03:27:33','2016-11-24 03:27:33',1,'2016-11-24 03:27:33');

/*Table structure for table `ban` */

DROP TABLE IF EXISTS `ban`;

CREATE TABLE `ban` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) DEFAULT NULL,
  `danh_muc_ban` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT NULL,
  `ghi_chu` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ban` */

insert  into `ban`(`id`,`ten`,`danh_muc_ban`,`trang_thai`,`ghi_chu`) values (1,'34gsdfn','ngfn',1,'edrbhfsng'),(2,'456','5tyn',1,'nsđsàd');

/*Table structure for table `blog_categories` */

DROP TABLE IF EXISTS `blog_categories`;

CREATE TABLE `blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_categories` */

insert  into `blog_categories`(`id`,`title`,`created_at`,`updated_at`,`deleted_at`) values (1,'category 1','2016-11-16 09:29:24','2016-11-16 09:29:24',NULL);

/*Table structure for table `blog_comments` */

DROP TABLE IF EXISTS `blog_comments`;

CREATE TABLE `blog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_comments` */

insert  into `blog_comments`(`id`,`blog_id`,`name`,`email`,`website`,`comment`,`created_at`,`updated_at`,`deleted_at`) values (1,5,'hthueyt','shdfljk@gmail.com','jsadlkf','sjladfgjasldkgjslakdgsdabe\r\ncomment test','2016-11-17 07:25:40','2016-11-17 07:25:40',NULL);

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`blog_category_id`,`user_id`,`title`,`content`,`image`,`views`,`created_at`,`updated_at`,`deleted_at`,`slug`,`files`) values (1,1,1,'èbdsfnbsfn','<p>brnfhdmfgm</p>',NULL,1,'2016-11-16 09:30:40','2016-11-16 09:33:50',NULL,'ebdsfnbsfn',NULL),(2,1,1,'tag aa','<p>egfdagfd</p>',NULL,0,'2016-11-16 09:34:20','2016-11-16 09:34:20',NULL,'tag-aa',NULL),(3,1,1,'blog 1','<p>day la blog 1</p>',NULL,0,'2016-11-16 09:35:28','2016-11-16 09:35:28',NULL,'blog-1',NULL),(4,1,1,'blog 2','<p>dat la blog 2</p><p><b>sdafsadf</b></p><p><b><br></b></p><p><b>d<span style=\"background-color: rgb(156, 0, 255);\">svfasdgbb</span></b></p><p><b><span style=\"background-color: rgb(156, 0, 255);\">sdbsdavb</span></b></p>',NULL,2,'2016-11-16 09:36:10','2016-11-17 07:24:32',NULL,'blog-2',NULL),(5,1,1,'test imgae','<p>Day la test image vs <b>html</b></p><p style=\"text-align: center; \"><b>can giua ne</b></p><p><img src=\"data:image/jpeg;base64,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\" style=\"width: 60px;\" data-filename=\"t_1.jpg\"><b><br></b></p><p><b><br></b></p><p><b><br></b></p><p><b><br></b></p>',NULL,3,'2016-11-17 07:24:27','2016-11-17 07:25:40',NULL,'test-imgae','C:\\xampp\\tmp\\php305.tmp');

/*Table structure for table `booktests` */

DROP TABLE IF EXISTS `booktests`;

CREATE TABLE `booktests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `booktests` */

insert  into `booktests`(`id`,`title`,`author`,`description`,`created_at`,`updated_at`) values (2,'aaa','aaaaa','aaaaaaaaaa','2016-11-14 10:23:33','2016-11-14 10:23:33'),(3,'adbadbh','4bdsabsd','fn sagsdag','2016-11-14 10:27:14','2016-11-14 10:27:14'),(4,'erfnsdfn','sadb','2gsdg','2016-11-14 10:27:41','2016-11-14 10:27:41'),(5,'vasvbasg','sabadbsdg','gdsgsadgsg','2016-11-14 10:40:17','2016-11-14 10:40:17'),(6,'bfdg','asdhdndh','sgdsawgasg','2016-11-14 10:41:06','2016-11-14 10:41:06'),(7,'adfhdfhd','b3nhbrn','fnfdsdfhgd','2016-11-14 10:41:41','2016-11-14 10:41:41'),(8,'SDAVsdb','adfbdab','dafbdabdfb','2016-11-16 03:37:17','2016-11-16 03:37:17'),(9,'titlesdf','2fasb','ágasfsdf','2016-11-16 04:41:08','2016-11-16 04:41:08'),(10,'dfhgdfshn','be4tnfsgn','fdnfgdsnfgn','2016-11-16 04:42:08','2016-11-16 04:42:08'),(11,'3brhnrn','rndftgnm','dgmhdgmhg','2016-11-16 04:42:23','2016-11-16 04:42:23'),(12,'34hgrnfg','dnfdgnfdgn','fdgnfdn','2016-11-16 04:43:55','2016-11-16 04:43:55'),(13,'34brfntg','fgnfn','fdhgmnhgm','2016-11-16 07:44:12','2016-11-16 07:44:12'),(15,'bfvn','nfgsnfgn','fdgnfdgn','2016-11-16 07:49:27','2016-11-16 07:49:27'),(16,'adad','adfadf','adfadfdsa','2016-11-16 08:05:39','2016-11-16 08:05:39'),(17,'234g','sdg','reb','2016-11-16 10:14:36','2016-11-17 02:53:51'),(18,'a','d','d','2016-11-17 02:51:37','2016-11-17 02:51:37'),(19,'ưe','bdf','dfb','2016-11-17 03:20:11','2016-11-17 03:20:11'),(20,'4g','dfb','dfb','2016-11-17 03:22:14','2016-11-17 03:22:14');

/*Table structure for table `chi` */

DROP TABLE IF EXISTS `chi`;

CREATE TABLE `chi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ngay_thang_chi` datetime DEFAULT NULL,
  `tien` decimal(15,3) DEFAULT NULL,
  `noi_dung` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `chi` */

insert  into `chi`(`id`,`ngay_thang_chi`,`tien`,`noi_dung`) values (1,'2016-11-24 00:00:00','50.000','ftest');

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `files` */

/*Table structure for table `hoadon` */

DROP TABLE IF EXISTS `hoadon`;

CREATE TABLE `hoadon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ngay_thanh_toan` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tien` decimal(15,3) DEFAULT NULL,
  `ban_id` smallint(6) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT '0' COMMENT '0: chua thanh toan 1: da thanh toan',
  `ghi_chu` mediumtext,
  `giam_gia` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hoadon_ban` (`ban_id`) USING BTREE,
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ban_id`) REFERENCES `ban` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `hoadon` */

insert  into `hoadon`(`id`,`ngay_thanh_toan`,`tien`,`ban_id`,`trang_thai`,`ghi_chu`,`giam_gia`) values (2,'2016-11-24 10:22:02','500.000',1,1,'tét','2');

/*Table structure for table `hoadonchitiet` */

DROP TABLE IF EXISTS `hoadonchitiet`;

CREATE TABLE `hoadonchitiet` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hoa_don_id` bigint(20) DEFAULT NULL,
  `san_pham_id` smallint(6) DEFAULT NULL,
  `ten_san_pham` varchar(255) DEFAULT NULL,
  `don_gia_san_pham` decimal(10,0) DEFAULT NULL,
  `ten_ban` varchar(255) DEFAULT NULL,
  `ghi_chu` mediumtext,
  `so_luong` tinyint(4) DEFAULT NULL,
  `thanh_tien` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hoadon_hoadonchitiet` (`hoa_don_id`) USING BTREE,
  KEY `fk_sanpham_hoadonchitiet` (`san_pham_id`) USING BTREE,
  CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoadon` (`id`),
  CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hoadonchitiet` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2016_11_14_042200_create_taggable_table',1),('2016_11_14_044554_create_booktests_table',2),('2015_03_07_311070_create_tracker_paths_table',3),('2015_03_07_311071_create_tracker_queries_table',3),('2015_03_07_311072_create_tracker_queries_arguments_table',3),('2015_03_07_311073_create_tracker_routes_table',3),('2015_03_07_311074_create_tracker_routes_paths_table',3),('2015_03_07_311075_create_tracker_route_path_parameters_table',3),('2015_03_07_311076_create_tracker_agents_table',3),('2015_03_07_311077_create_tracker_cookies_table',3),('2015_03_07_311078_create_tracker_devices_table',3),('2015_03_07_311079_create_tracker_domains_table',3),('2015_03_07_311080_create_tracker_referers_table',3),('2015_03_07_311081_create_tracker_geoip_table',3),('2015_03_07_311082_create_tracker_sessions_table',3),('2015_03_07_311083_create_tracker_errors_table',3),('2015_03_07_311084_create_tracker_system_classes_table',3),('2015_03_07_311085_create_tracker_log_table',3),('2015_03_07_311086_create_tracker_events_table',3),('2015_03_07_311087_create_tracker_events_log_table',3),('2015_03_07_311088_create_tracker_sql_queries_table',3),('2015_03_07_311089_create_tracker_sql_query_bindings_table',3),('2015_03_07_311090_create_tracker_sql_query_bindings_parameters_table',3),('2015_03_07_311091_create_tracker_sql_queries_log_table',3),('2015_03_07_311092_create_tracker_connections_table',3),('2015_03_07_311093_create_tracker_tables_relations',3),('2015_03_13_311094_create_tracker_referer_search_term_table',3),('2015_03_13_311095_add_tracker_referer_columns',3),('2015_11_23_311096_add_tracker_referer_column_to_log',3),('2015_11_23_311097_create_tracker_languages_table',3),('2015_11_23_311098_add_language_id_column_to_sessions',3),('2015_11_23_311099_add_tracker_language_foreign_key_to_sessions',3),('2015_11_23_311100_add_nullable_to_tracker_error',3),('2016_11_20_095604_create_routes_table',4);

/*Table structure for table `persistences` */

DROP TABLE IF EXISTS `persistences`;

CREATE TABLE `persistences` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `code` varchar(512) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `persistences` */

insert  into `persistences`(`id`,`user_id`,`code`,`updated_at`,`created_at`) values (3,1,'SKpo5hbwBTt2JOeJi8vPIfipWu5HJ3SH','2016-11-14 04:37:00','2016-11-14 04:37:00'),(5,1,'jdfAqhpkvoZM7hjZIvEKhIIMzTE2jqr4','2016-11-16 08:05:08','2016-11-16 08:05:08'),(7,1,'k3OVFMAOGhLwvQSa3xT5jl6uy1v2qG1E','2016-11-16 09:41:05','2016-11-16 09:41:05'),(9,2,'gAqfsNLekVQFMJcNk234ZwyohTK42AE7','2016-11-16 09:56:01','2016-11-16 09:56:01'),(12,2,'G6m0EzeXLcJtdDvoZ245IghBcRkkXHCl','2016-11-16 09:56:56','2016-11-16 09:56:56'),(16,1,'r0y5OOjnlxNMF4o4g1vPghZhDQSJw9gM','2016-11-17 04:29:24','2016-11-17 04:29:24'),(26,1,'VulzTcMqCO7bODrStiVqme4jdv0ZyuN6','2016-11-17 07:58:20','2016-11-17 07:58:20'),(27,1,'nLrddKu2nKjhFe8MNsqYtLmfq2BcGsgk','2016-11-20 09:33:06','2016-11-20 09:33:06'),(28,1,'oOvBsjKhCcpkdMSruZqcWkRZLzmn2hMa','2016-11-21 06:58:26','2016-11-21 06:58:26'),(29,1,'PlZU8bQwgGUVpOsK1uPSf0FaKRnRgPgr','2016-11-21 11:50:22','2016-11-21 11:50:22'),(31,1,'nl9zmKFwe6TiGoi1fhUpARmKdqhZMX4j','2016-11-23 03:32:23','2016-11-23 03:32:23'),(32,1,'isfpXTe2knOJs0sg7O6z7Gj8vLVvHEtA','2016-11-23 03:32:29','2016-11-23 03:32:29'),(33,1,'5cflIOkDxFaFMWufiE1jFtKmwoDxAzlc','2016-11-23 03:32:45','2016-11-23 03:32:45'),(34,1,'Sa2C4wRBXzC5jtRbN3ulPVNx52uV0N0A','2016-11-23 03:33:23','2016-11-23 03:33:23'),(38,1,'qpoYzNrJq6rBLITyUzw3Qn3Rh9BYVCld','2016-11-23 07:18:25','2016-11-23 07:18:25'),(40,3,'Ub7ZERFd4H0Fswq5LbB5EGrraPtM92sN','2016-11-24 03:27:44','2016-11-24 03:27:44');

/*Table structure for table `role_users` */

DROP TABLE IF EXISTS `role_users`;

CREATE TABLE `role_users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role_users` */

insert  into `role_users`(`id`,`updated_at`,`created_at`,`role_id`,`user_id`) values (1,'2016-11-14 04:25:39','2016-11-14 04:25:39',1,1),(2,'2016-11-16 09:42:17','2016-11-16 09:42:17',2,2),(3,'2016-11-24 03:27:33','2016-11-24 03:27:33',3,3);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `permissions` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`slug`,`permissions`,`updated_at`,`created_at`) values (1,'Admin','admin','{\"admin\":true,\"admin.roles\":true,\"user.delete\":false}','2016-11-23 04:26:05','2016-11-14 04:25:39'),(2,'User','user','{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.store\":true,\"admin.users.show\":true,\"admin.users.edit\":true,\"admin.users.update\":true,\"admin.users.destroy\":true,\"admin.groups.getPermission\":true,\"admin.groups.savePermissions\":true,\"admin.datatables.data\":true}','2016-11-23 07:14:22','2016-11-14 04:25:39'),(3,'testSanPham','testsanpham','{\"admin.sanpham.getAjax\":true,\"admin.sanpham.saveSp\":true,\"admin.sanpham.index\":true,\"admin.sanpham.store\":true,\"admin.sanpham.show\":true,\"admin.sanpham.edit\":true,\"admin.sanpham.update\":true,\"admin.sanpham.destroy\":true,\"admin.sanpham.delete\":true,\"admin.sanpham.confirm-delete\":true}','2016-11-24 03:26:34','2016-11-24 03:26:34');

/*Table structure for table `roles_permissions` */

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `roles_id` int(10) DEFAULT NULL,
  `routes_id` int(10) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `roles_id` (`roles_id`),
  KEY `routes_id` (`routes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `roles_permissions` */

insert  into `roles_permissions`(`roles_id`,`routes_id`,`id`) values (1,1,1),(1,152,2),(1,153,3),(3,1,4),(3,152,5),(3,153,6),(3,154,7),(3,155,8),(3,156,9),(3,157,10),(3,158,11),(3,159,12);

/*Table structure for table `routes` */

DROP TABLE IF EXISTS `routes`;

CREATE TABLE `routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `routes` */

insert  into `routes`(`id`,`name`,`path`,`created_at`,`updated_at`) values (1,'admin.books.index','admin/books','2016-11-20 17:31:41','2016-11-20 17:31:43'),(152,'admin.books.create','admin/books/create','2016-11-21 07:08:52','2016-11-21 07:08:52'),(153,'admin.books.store','admin/books','2016-11-21 07:08:52','2016-11-21 07:08:52'),(154,'admin.books.show','admin/books/{books}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(155,'admin.books.edit','admin/books/{books}/edit','2016-11-21 07:08:52','2016-11-21 07:08:52'),(156,'admin.books.update','admin/books/{books}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(157,'admin.books.destroy','admin/books/{books}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(158,'admin.books.delete','admin/books/{id}/delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(159,'admin.books.confirm-delete','admin/books/{id}/confirm-delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(160,'admin.booktests.index','admin/booktests','2016-11-21 07:08:52','2016-11-21 07:08:52'),(161,'admin.booktests.create','admin/booktests/create','2016-11-21 07:08:52','2016-11-21 07:08:52'),(162,'admin.booktests.store','admin/booktests','2016-11-21 07:08:52','2016-11-21 07:08:52'),(163,'admin.booktests.show','admin/booktests/{booktests}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(164,'admin.booktests.edit','admin/booktests/{booktests}/edit','2016-11-21 07:08:52','2016-11-21 07:08:52'),(165,'admin.booktests.update','admin/booktests/{booktests}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(166,'admin.booktests.destroy','admin/booktests/{booktests}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(167,'admin.booktests.delete','admin/booktests/{id}/delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(168,'admin.booktests.confirm-delete','admin/booktests/{id}/confirm-delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(169,'admin.booktests.getAjax','admin/booktests/getAjax','2016-11-21 07:08:52','2016-11-21 07:08:52'),(170,'admin.booktests.detail','admin/booktests/detail','2016-11-21 07:08:52','2016-11-21 07:08:52'),(171,'admin.booktests.saveBook','admin/booktests/saveBook','2016-11-21 07:08:52','2016-11-21 07:08:52'),(172,'admin.routes.generateRoutes','admin/routes/generateRoutes','2016-11-21 07:08:52','2016-11-21 07:08:52'),(173,'admin.routes.index','admin/routes','2016-11-21 07:08:52','2016-11-21 07:08:52'),(174,'admin.routes.create','admin/routes/create','2016-11-21 07:08:52','2016-11-21 07:08:52'),(175,'admin.routes.store','admin/routes','2016-11-21 07:08:52','2016-11-21 07:08:52'),(176,'admin.routes.show','admin/routes/{routes}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(177,'admin.routes.edit','admin/routes/{routes}/edit','2016-11-21 07:08:52','2016-11-21 07:08:52'),(178,'admin.routes.update','admin/routes/{routes}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(179,'admin.routes.destroy','admin/routes/{routes}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(180,'admin.routes.delete','admin/routes/{id}/delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(181,'admin.routes.confirm-delete','admin/routes/{id}/confirm-delete','2016-11-21 07:08:52','2016-11-21 07:08:52'),(182,'admin.users.index','admin/users','2016-11-21 07:08:52','2016-11-21 07:08:52'),(183,'admin.users.create','admin/users/create','2016-11-21 07:08:52','2016-11-21 07:08:52'),(184,'admin.users.store','admin/users','2016-11-21 07:08:52','2016-11-21 07:08:52'),(185,'admin.users.show','admin/users/{users}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(186,'admin.users.edit','admin/users/{users}/edit','2016-11-21 07:08:52','2016-11-21 07:08:52'),(187,'admin.users.update','admin/users/{users}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(188,'admin.users.destroy','admin/users/{users}','2016-11-21 07:08:52','2016-11-21 07:08:52'),(189,'admin.datatables.data','admin/datatables/data','2016-11-21 07:08:52','2016-11-21 07:08:52');

/*Table structure for table `sanpham` */

DROP TABLE IF EXISTS `sanpham`;

CREATE TABLE `sanpham` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `gia` decimal(11,3) NOT NULL,
  `ghi_chu` mediumtext,
  `trang_thai` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sanpham` */

insert  into `sanpham`(`id`,`ten`,`gia`,`ghi_chu`,`trang_thai`) values (1,'test','20000.000','fgsnhfm',1),(2,'fdngfnm','500000.000','5renhtnm',1);

/*Table structure for table `taggable_taggables` */

DROP TABLE IF EXISTS `taggable_taggables`;

CREATE TABLE `taggable_taggables` (
  `tag_id` int(10) unsigned NOT NULL,
  `taggable_id` int(10) unsigned NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `taggable_taggables` */

insert  into `taggable_taggables`(`tag_id`,`taggable_id`,`taggable_type`,`created_at`,`updated_at`) values (1,1,'App\\Blog','2016-11-16 09:30:40','2016-11-16 09:30:40'),(2,1,'App\\Blog','2016-11-16 09:30:41','2016-11-16 09:30:41'),(3,1,'App\\Blog','2016-11-16 09:30:41','2016-11-16 09:30:41'),(1,2,'App\\Blog','2016-11-16 09:34:20','2016-11-16 09:34:20'),(4,2,'App\\Blog','2016-11-16 09:34:21','2016-11-16 09:34:21'),(5,3,'App\\Blog','2016-11-16 09:35:29','2016-11-16 09:35:29'),(6,3,'App\\Blog','2016-11-16 09:35:29','2016-11-16 09:35:29'),(5,4,'App\\Blog','2016-11-16 09:36:10','2016-11-16 09:36:10'),(7,4,'App\\Blog','2016-11-16 09:36:10','2016-11-16 09:36:10'),(5,5,'App\\Blog','2016-11-17 07:24:27','2016-11-17 07:24:27'),(8,5,'App\\Blog','2016-11-17 07:24:28','2016-11-17 07:24:28');

/*Table structure for table `taggable_tags` */

DROP TABLE IF EXISTS `taggable_tags`;

CREATE TABLE `taggable_tags` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `normalized` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `taggable_tags` */

insert  into `taggable_tags`(`tag_id`,`name`,`normalized`,`created_at`,`updated_at`) values (1,'aa','aa','2016-11-16 09:30:40','2016-11-16 09:30:40'),(2,'b','b','2016-11-16 09:30:41','2016-11-16 09:30:41'),(3,'cc','cc','2016-11-16 09:30:41','2016-11-16 09:30:41'),(4,'sdf','sdf','2016-11-16 09:34:21','2016-11-16 09:34:21'),(5,'tag1','tag1','2016-11-16 09:35:29','2016-11-16 09:35:29'),(6,'tag2','tag2','2016-11-16 09:35:29','2016-11-16 09:35:29'),(7,'tag3','tag3','2016-11-16 09:36:10','2016-11-16 09:36:10'),(8,'image','image','2016-11-17 07:24:28','2016-11-17 07:24:28');

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `finished` tinyint(4) NOT NULL DEFAULT '0',
  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
  `task_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tasks` */

/*Table structure for table `throttle` */

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `throttle` */

/*Table structure for table `tracker_agents` */

DROP TABLE IF EXISTS `tracker_agents`;

CREATE TABLE `tracker_agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_agents_name_unique` (`name`),
  KEY `tracker_agents_browser_index` (`browser`),
  KEY `tracker_agents_created_at_index` (`created_at`),
  KEY `tracker_agents_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_agents` */

/*Table structure for table `tracker_connections` */

DROP TABLE IF EXISTS `tracker_connections`;

CREATE TABLE `tracker_connections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_connections_name_index` (`name`),
  KEY `tracker_connections_created_at_index` (`created_at`),
  KEY `tracker_connections_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_connections` */

/*Table structure for table `tracker_cookies` */

DROP TABLE IF EXISTS `tracker_cookies`;

CREATE TABLE `tracker_cookies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_cookies_uuid_unique` (`uuid`),
  KEY `tracker_cookies_created_at_index` (`created_at`),
  KEY `tracker_cookies_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_cookies` */

/*Table structure for table `tracker_devices` */

DROP TABLE IF EXISTS `tracker_devices`;

CREATE TABLE `tracker_devices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kind` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `platform_version` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `is_mobile` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_devices_kind_model_platform_platform_version_unique` (`kind`,`model`,`platform`,`platform_version`),
  KEY `tracker_devices_kind_index` (`kind`),
  KEY `tracker_devices_model_index` (`model`),
  KEY `tracker_devices_platform_index` (`platform`),
  KEY `tracker_devices_platform_version_index` (`platform_version`),
  KEY `tracker_devices_created_at_index` (`created_at`),
  KEY `tracker_devices_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_devices` */

/*Table structure for table `tracker_domains` */

DROP TABLE IF EXISTS `tracker_domains`;

CREATE TABLE `tracker_domains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_domains_name_index` (`name`),
  KEY `tracker_domains_created_at_index` (`created_at`),
  KEY `tracker_domains_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_domains` */

/*Table structure for table `tracker_errors` */

DROP TABLE IF EXISTS `tracker_errors`;

CREATE TABLE `tracker_errors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_errors_code_index` (`code`),
  KEY `tracker_errors_message_index` (`message`),
  KEY `tracker_errors_created_at_index` (`created_at`),
  KEY `tracker_errors_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_errors` */

/*Table structure for table `tracker_events` */

DROP TABLE IF EXISTS `tracker_events`;

CREATE TABLE `tracker_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_events_name_index` (`name`),
  KEY `tracker_events_created_at_index` (`created_at`),
  KEY `tracker_events_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_events` */

/*Table structure for table `tracker_events_log` */

DROP TABLE IF EXISTS `tracker_events_log`;

CREATE TABLE `tracker_events_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned NOT NULL,
  `class_id` bigint(20) unsigned DEFAULT NULL,
  `log_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_events_log_event_id_index` (`event_id`),
  KEY `tracker_events_log_class_id_index` (`class_id`),
  KEY `tracker_events_log_log_id_index` (`log_id`),
  KEY `tracker_events_log_created_at_index` (`created_at`),
  KEY `tracker_events_log_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_events_log_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `tracker_system_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_events_log_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `tracker_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_events_log_log_id_foreign` FOREIGN KEY (`log_id`) REFERENCES `tracker_log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_events_log` */

/*Table structure for table `tracker_geoip` */

DROP TABLE IF EXISTS `tracker_geoip`;

CREATE TABLE `tracker_geoip` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `country_code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code3` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_code` bigint(20) DEFAULT NULL,
  `dma_code` double DEFAULT NULL,
  `metro_code` double DEFAULT NULL,
  `continent_code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_geoip_latitude_index` (`latitude`),
  KEY `tracker_geoip_longitude_index` (`longitude`),
  KEY `tracker_geoip_country_code_index` (`country_code`),
  KEY `tracker_geoip_country_code3_index` (`country_code3`),
  KEY `tracker_geoip_country_name_index` (`country_name`),
  KEY `tracker_geoip_city_index` (`city`),
  KEY `tracker_geoip_created_at_index` (`created_at`),
  KEY `tracker_geoip_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_geoip` */

/*Table structure for table `tracker_languages` */

DROP TABLE IF EXISTS `tracker_languages`;

CREATE TABLE `tracker_languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `preference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language-range` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_languages_preference_language_range_unique` (`preference`,`language-range`),
  KEY `tracker_languages_preference_index` (`preference`),
  KEY `tracker_languages_language_range_index` (`language-range`),
  KEY `tracker_languages_created_at_index` (`created_at`),
  KEY `tracker_languages_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_languages` */

/*Table structure for table `tracker_log` */

DROP TABLE IF EXISTS `tracker_log`;

CREATE TABLE `tracker_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` bigint(20) unsigned NOT NULL,
  `path_id` bigint(20) unsigned DEFAULT NULL,
  `query_id` bigint(20) unsigned DEFAULT NULL,
  `method` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `route_path_id` bigint(20) unsigned DEFAULT NULL,
  `is_ajax` tinyint(1) NOT NULL,
  `is_secure` tinyint(1) NOT NULL,
  `is_json` tinyint(1) NOT NULL,
  `wants_json` tinyint(1) NOT NULL,
  `error_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `referer_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tracker_log_session_id_index` (`session_id`),
  KEY `tracker_log_path_id_index` (`path_id`),
  KEY `tracker_log_query_id_index` (`query_id`),
  KEY `tracker_log_method_index` (`method`),
  KEY `tracker_log_route_path_id_index` (`route_path_id`),
  KEY `tracker_log_error_id_index` (`error_id`),
  KEY `tracker_log_created_at_index` (`created_at`),
  KEY `tracker_log_updated_at_index` (`updated_at`),
  KEY `tracker_log_referer_id_index` (`referer_id`),
  CONSTRAINT `tracker_log_error_id_foreign` FOREIGN KEY (`error_id`) REFERENCES `tracker_errors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_log_path_id_foreign` FOREIGN KEY (`path_id`) REFERENCES `tracker_paths` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_log_query_id_foreign` FOREIGN KEY (`query_id`) REFERENCES `tracker_queries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_log_route_path_id_foreign` FOREIGN KEY (`route_path_id`) REFERENCES `tracker_route_paths` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_log_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `tracker_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_log` */

/*Table structure for table `tracker_paths` */

DROP TABLE IF EXISTS `tracker_paths`;

CREATE TABLE `tracker_paths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_paths_path_index` (`path`),
  KEY `tracker_paths_created_at_index` (`created_at`),
  KEY `tracker_paths_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_paths` */

/*Table structure for table `tracker_queries` */

DROP TABLE IF EXISTS `tracker_queries`;

CREATE TABLE `tracker_queries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `query` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_queries_query_index` (`query`),
  KEY `tracker_queries_created_at_index` (`created_at`),
  KEY `tracker_queries_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_queries` */

/*Table structure for table `tracker_query_arguments` */

DROP TABLE IF EXISTS `tracker_query_arguments`;

CREATE TABLE `tracker_query_arguments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `query_id` bigint(20) unsigned NOT NULL,
  `argument` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_query_arguments_query_id_index` (`query_id`),
  KEY `tracker_query_arguments_argument_index` (`argument`),
  KEY `tracker_query_arguments_value_index` (`value`),
  KEY `tracker_query_arguments_created_at_index` (`created_at`),
  KEY `tracker_query_arguments_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_query_arguments_query_id_foreign` FOREIGN KEY (`query_id`) REFERENCES `tracker_queries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_query_arguments` */

/*Table structure for table `tracker_referers` */

DROP TABLE IF EXISTS `tracker_referers`;

CREATE TABLE `tracker_referers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `domain_id` bigint(20) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `medium` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `search_terms_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tracker_referers_domain_id_index` (`domain_id`),
  KEY `tracker_referers_url_index` (`url`),
  KEY `tracker_referers_created_at_index` (`created_at`),
  KEY `tracker_referers_updated_at_index` (`updated_at`),
  KEY `tracker_referers_medium_index` (`medium`),
  KEY `tracker_referers_source_index` (`source`),
  KEY `tracker_referers_search_terms_hash_index` (`search_terms_hash`),
  CONSTRAINT `tracker_referers_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `tracker_domains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_referers` */

/*Table structure for table `tracker_referers_search_terms` */

DROP TABLE IF EXISTS `tracker_referers_search_terms`;

CREATE TABLE `tracker_referers_search_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `referer_id` bigint(20) unsigned NOT NULL,
  `search_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_referers_search_terms_referer_id_index` (`referer_id`),
  KEY `tracker_referers_search_terms_search_term_index` (`search_term`),
  KEY `tracker_referers_search_terms_created_at_index` (`created_at`),
  KEY `tracker_referers_search_terms_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_referers_referer_id_fk` FOREIGN KEY (`referer_id`) REFERENCES `tracker_referers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_referers_search_terms` */

/*Table structure for table `tracker_route_path_parameters` */

DROP TABLE IF EXISTS `tracker_route_path_parameters`;

CREATE TABLE `tracker_route_path_parameters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `route_path_id` bigint(20) unsigned NOT NULL,
  `parameter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_route_path_parameters_route_path_id_index` (`route_path_id`),
  KEY `tracker_route_path_parameters_parameter_index` (`parameter`),
  KEY `tracker_route_path_parameters_value_index` (`value`),
  KEY `tracker_route_path_parameters_created_at_index` (`created_at`),
  KEY `tracker_route_path_parameters_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_route_path_parameters_route_path_id_foreign` FOREIGN KEY (`route_path_id`) REFERENCES `tracker_route_paths` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_route_path_parameters` */

/*Table structure for table `tracker_route_paths` */

DROP TABLE IF EXISTS `tracker_route_paths`;

CREATE TABLE `tracker_route_paths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_route_paths_route_id_index` (`route_id`),
  KEY `tracker_route_paths_path_index` (`path`),
  KEY `tracker_route_paths_created_at_index` (`created_at`),
  KEY `tracker_route_paths_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_route_paths_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `tracker_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_route_paths` */

/*Table structure for table `tracker_routes` */

DROP TABLE IF EXISTS `tracker_routes`;

CREATE TABLE `tracker_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_routes_name_index` (`name`),
  KEY `tracker_routes_action_index` (`action`),
  KEY `tracker_routes_created_at_index` (`created_at`),
  KEY `tracker_routes_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_routes` */

/*Table structure for table `tracker_sessions` */

DROP TABLE IF EXISTS `tracker_sessions`;

CREATE TABLE `tracker_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `device_id` bigint(20) unsigned DEFAULT NULL,
  `agent_id` bigint(20) unsigned DEFAULT NULL,
  `client_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer_id` bigint(20) unsigned DEFAULT NULL,
  `cookie_id` bigint(20) unsigned DEFAULT NULL,
  `geoip_id` bigint(20) unsigned DEFAULT NULL,
  `is_robot` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_sessions_uuid_unique` (`uuid`),
  KEY `tracker_sessions_user_id_index` (`user_id`),
  KEY `tracker_sessions_device_id_index` (`device_id`),
  KEY `tracker_sessions_agent_id_index` (`agent_id`),
  KEY `tracker_sessions_client_ip_index` (`client_ip`),
  KEY `tracker_sessions_referer_id_index` (`referer_id`),
  KEY `tracker_sessions_cookie_id_index` (`cookie_id`),
  KEY `tracker_sessions_geoip_id_index` (`geoip_id`),
  KEY `tracker_sessions_created_at_index` (`created_at`),
  KEY `tracker_sessions_updated_at_index` (`updated_at`),
  KEY `tracker_sessions_language_id_index` (`language_id`),
  CONSTRAINT `tracker_sessions_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `tracker_agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sessions_cookie_id_foreign` FOREIGN KEY (`cookie_id`) REFERENCES `tracker_cookies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sessions_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `tracker_devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sessions_geoip_id_foreign` FOREIGN KEY (`geoip_id`) REFERENCES `tracker_geoip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sessions_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `tracker_languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sessions_referer_id_foreign` FOREIGN KEY (`referer_id`) REFERENCES `tracker_referers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_sessions` */

/*Table structure for table `tracker_sql_queries` */

DROP TABLE IF EXISTS `tracker_sql_queries`;

CREATE TABLE `tracker_sql_queries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sha1` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `statement` text COLLATE utf8_unicode_ci NOT NULL,
  `time` double NOT NULL,
  `connection_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_sql_queries_sha1_index` (`sha1`),
  KEY `tracker_sql_queries_time_index` (`time`),
  KEY `tracker_sql_queries_created_at_index` (`created_at`),
  KEY `tracker_sql_queries_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_sql_queries` */

/*Table structure for table `tracker_sql_queries_log` */

DROP TABLE IF EXISTS `tracker_sql_queries_log`;

CREATE TABLE `tracker_sql_queries_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_id` bigint(20) unsigned NOT NULL,
  `sql_query_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_sql_queries_log_log_id_index` (`log_id`),
  KEY `tracker_sql_queries_log_sql_query_id_index` (`sql_query_id`),
  KEY `tracker_sql_queries_log_created_at_index` (`created_at`),
  KEY `tracker_sql_queries_log_updated_at_index` (`updated_at`),
  CONSTRAINT `tracker_sql_queries_log_log_id_foreign` FOREIGN KEY (`log_id`) REFERENCES `tracker_log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tracker_sql_queries_log_sql_query_id_foreign` FOREIGN KEY (`sql_query_id`) REFERENCES `tracker_sql_queries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_sql_queries_log` */

/*Table structure for table `tracker_sql_query_bindings` */

DROP TABLE IF EXISTS `tracker_sql_query_bindings`;

CREATE TABLE `tracker_sql_query_bindings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sha1` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `serialized` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_sql_query_bindings_sha1_index` (`sha1`),
  KEY `tracker_sql_query_bindings_created_at_index` (`created_at`),
  KEY `tracker_sql_query_bindings_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_sql_query_bindings` */

/*Table structure for table `tracker_sql_query_bindings_parameters` */

DROP TABLE IF EXISTS `tracker_sql_query_bindings_parameters`;

CREATE TABLE `tracker_sql_query_bindings_parameters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sql_query_bindings_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_sql_query_bindings_parameters_name_index` (`name`),
  KEY `tracker_sql_query_bindings_parameters_created_at_index` (`created_at`),
  KEY `tracker_sql_query_bindings_parameters_updated_at_index` (`updated_at`),
  KEY `tracker_sqlqb_parameters` (`sql_query_bindings_id`),
  CONSTRAINT `tracker_sqlqb_parameters` FOREIGN KEY (`sql_query_bindings_id`) REFERENCES `tracker_sql_query_bindings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_sql_query_bindings_parameters` */

/*Table structure for table `tracker_system_classes` */

DROP TABLE IF EXISTS `tracker_system_classes`;

CREATE TABLE `tracker_system_classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tracker_system_classes_name_index` (`name`),
  KEY `tracker_system_classes_created_at_index` (`created_at`),
  KEY `tracker_system_classes_updated_at_index` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tracker_system_classes` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bio` text,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `permissions` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`email`,`password`,`updated_at`,`created_at`,`deleted_at`,`bio`,`gender`,`dob`,`pic`,`country`,`state`,`city`,`address`,`postal`,`first_name`,`last_name`,`last_login`,`permissions`) values (1,'admin',NULL,'admin@admin.com','$2y$10$Pc6YFYUlOm/kTZOtbnMTN.udk/MMqOv3neNLtOQDMbFTcm2xQJaky','2016-11-24 01:56:56','2016-11-14 04:25:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Le','Thuyet','2016-11-24 01:56:56','{\"admin\":true,\"admin.roles\":true,\"user.delete\":false}'),(2,'longdq',NULL,'longdq@gmail.com','$2y$10$KlGsXUYi8iB3haMCajasP.OTUV8KHbRxkm81uZr2QXmTOqzY/paqy','2016-11-23 07:14:38','2016-11-16 09:42:16',NULL,'sadfasf','male','0000-00-00',NULL,'VN','State','City','Address','10000','Dang ','Long','2016-11-23 07:14:38','{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.store\":true,\"admin.users.show\":true,\"admin.users.edit\":true,\"admin.users.update\":true,\"admin.users.destroy\":true,\"admin.groups.getPermission\":true,\"admin.groups.savePermissions\":true,\"admin.datatables.data\":true}'),(3,'createsp',NULL,'createsp@gmail.com','$2y$10$y3GnCTyS3EO2eL3g5/uJGOOala81dk2NaTZUbARu997EImpbO/X9e','2016-11-24 03:27:44','2016-11-24 03:27:33',NULL,'sdf','male','0000-00-00',NULL,'AW','?','sdg','egfsdfg','','test','test','2016-11-24 03:27:44','{\"admin.sanpham.getAjax\":true,\"admin.sanpham.saveSp\":false,\"admin.sanpham.index\":true,\"admin.sanpham.store\":true,\"admin.sanpham.show\":true,\"admin.sanpham.edit\":true,\"admin.sanpham.update\":true,\"admin.sanpham.destroy\":true,\"admin.sanpham.delete\":false,\"admin.sanpham.confirm-delete\":true}');

/*Table structure for table `users_bk` */

DROP TABLE IF EXISTS `users_bk`;

CREATE TABLE `users_bk` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `username` varchar(128) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bio` text,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users_bk` */

insert  into `users_bk`(`id`,`username`,`name`,`email`,`password`,`updated_at`,`created_at`,`deleted_at`,`bio`,`gender`,`dob`,`pic`,`country`,`state`,`city`,`address`,`postal`,`first_name`,`last_name`,`last_login`) values (1,'admin',NULL,'admin@admin.com','$2y$10$Pc6YFYUlOm/kTZOtbnMTN.udk/MMqOv3neNLtOQDMbFTcm2xQJaky','2016-11-23 04:14:04','2016-11-14 04:25:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Le','Thuyet','2016-11-23 03:41:44'),(2,'longdq',NULL,'longdq@gmail.com','$2y$10$KlGsXUYi8iB3haMCajasP.OTUV8KHbRxkm81uZr2QXmTOqzY/paqy','2016-11-16 09:56:56','2016-11-16 09:42:16',NULL,'sadfasf','male','0000-00-00',NULL,'VN','State','City','Address','10000','Dang ','Long','2016-11-16 09:56:56'),(3,'test',NULL,'test@gmail.com','$2y$10$IEPe2sughvNQ3pwxqePzu.d5NQCUE4Zj3Irchlb2WERWn0j7CFf9u','2016-11-16 10:06:19','2016-11-16 10:06:19',NULL,'test','male','0000-00-00',NULL,'BS','test','test','test','31432','le3','test4',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
