/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : quanlycafe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-22 19:49:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ban
-- ----------------------------
DROP TABLE IF EXISTS `ban`;
CREATE TABLE `ban` (
`id`  smallint(6) NOT NULL AUTO_INCREMENT ,
`ten`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`danh_muc_ban`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`trang_thai`  tinyint(4) NULL DEFAULT NULL ,
`ghi_chu`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of ban
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for chi
-- ----------------------------
DROP TABLE IF EXISTS `chi`;
CREATE TABLE `chi` (
`id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`ngay_thang_chi`  datetime NULL DEFAULT NULL ,
`tien`  decimal(15,3) NULL DEFAULT NULL ,
`noi_dung`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of chi
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for hoadon
-- ----------------------------
DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon` (
`id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`ngay_thanh_toan`  timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP ,
`tien`  decimal(15,3) NULL DEFAULT NULL ,
`ban_id`  smallint(6) NULL DEFAULT NULL ,
`trang_thai`  tinyint(4) NULL DEFAULT 0 COMMENT '0: chua thanh toan 1: da thanh toan' ,
`ghi_chu`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`giam_gia`  decimal(10,0) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`ban_id`) REFERENCES `ban` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_hoadon_ban` (`ban_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of hoadon
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for hoadonchitiet
-- ----------------------------
DROP TABLE IF EXISTS `hoadonchitiet`;
CREATE TABLE `hoadonchitiet` (
`id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`hoa_don_id`  bigint(20) NULL DEFAULT NULL ,
`san_pham_id`  smallint(6) NULL DEFAULT NULL ,
`ten_san_pham`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`don_gia_san_pham`  decimal(10,0) NULL DEFAULT NULL ,
`ten_ban`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`ghi_chu`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`so_luong`  tinyint(4) NULL DEFAULT NULL ,
`thanh_tien`  decimal(10,0) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`hoa_don_id`) REFERENCES `hoadon` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_hoadon_hoadonchitiet` (`hoa_don_id`) USING BTREE ,
INDEX `fk_sanpham_hoadonchitiet` (`san_pham_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of hoadonchitiet
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
`id`  smallint(11) NOT NULL AUTO_INCREMENT ,
`ten`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`gia`  decimal(11,3) NOT NULL ,
`ghi_chu`  mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`trang_thai`  tinyint(4) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for ban
-- ----------------------------
ALTER TABLE `ban` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for chi
-- ----------------------------
ALTER TABLE `chi` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for hoadon
-- ----------------------------
ALTER TABLE `hoadon` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for hoadonchitiet
-- ----------------------------
ALTER TABLE `hoadonchitiet` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for sanpham
-- ----------------------------
ALTER TABLE `sanpham` AUTO_INCREMENT=1;
