/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : ipdnacid_scdb

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2021-01-26 20:36:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `ket` text,
  `tanggal` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_log
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
