/*
Navicat MySQL Data Transfer

Source Server         : ys.1024edu.wang
Source Server Version : 50719
Source Host           : new.1024edu.wang:17611
Source Database       : lanterns

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2017-12-08 00:13:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `brand_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `brand_name` varchar(50) DEFAULT NULL COMMENT '品牌名称',
  `create_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sort` char(2) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('44', '彩熠', '2017-12-08 00:02:01', null);

-- ----------------------------
-- Table structure for lantern
-- ----------------------------
DROP TABLE IF EXISTS `lantern`;
CREATE TABLE `lantern` (
  `lantern_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `special_id` int(11) DEFAULT NULL,
  `year` varchar(11) DEFAULT NULL,
  `lamp_status` varchar(20) DEFAULT NULL,
  `box_status` varchar(255) DEFAULT NULL,
  `num` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `pics` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lantern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lantern
-- ----------------------------
INSERT INTO `lantern` VALUES ('32', '44', '13', '2015', '新炮', '新航空箱', '20', '[\"upload/151266258069578.png\",\"upload/151266259318627.png\"]', '2017-12-08 00:03:22', null);

-- ----------------------------
-- Table structure for special
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `special_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_id` int(10) DEFAULT NULL,
  `special_name` varchar(200) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sort` int(10) DEFAULT NULL,
  PRIMARY KEY (`special_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of special
-- ----------------------------
INSERT INTO `special` VALUES ('13', '44', 'F2500 PERF', '2017-12-08 00:02:17', null);

-- ----------------------------
-- Table structure for userinfo
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'lzx', '123456', null);
INSERT INTO `userinfo` VALUES ('2', 'ccb', '123456', null);
