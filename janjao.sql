/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : janjao

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-22 01:06:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tc_menu_config
-- ----------------------------
DROP TABLE IF EXISTS `tc_menu_config`;
CREATE TABLE `tc_menu_config` (
  `menuConfigID` int(11) NOT NULL AUTO_INCREMENT,
  `userGroupID` int(11) NOT NULL COMMENT 'User / Account ID',
  `menuID` int(11) NOT NULL,
  `canAdd` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `canView` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `canEdit` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `canDrop` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `canPrint` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `canApprove` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `status` enum('OFF','ON') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON' COMMENT '(LineStatus) ON/OFF',
  `updateDT` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateBY` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '(UserName)',
  PRIMARY KEY (`menuConfigID`,`userGroupID`,`menuID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Configuration Data of System';

-- ----------------------------
-- Records of tc_menu_config
-- ----------------------------
INSERT INTO `tc_menu_config` VALUES ('1', '1', '1', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', '');
INSERT INTO `tc_menu_config` VALUES ('2', '1', '2', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', '');
INSERT INTO `tc_menu_config` VALUES ('3', '1', '3', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', '');
INSERT INTO `tc_menu_config` VALUES ('4', '1', '4', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:20', '');
INSERT INTO `tc_menu_config` VALUES ('5', '1', '5', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:21', '');
INSERT INTO `tc_menu_config` VALUES ('6', '1', '6', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:23', '');
INSERT INTO `tc_menu_config` VALUES ('7', '1', '20', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:25', '');
INSERT INTO `tc_menu_config` VALUES ('8', '1', '21', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:26', '');
INSERT INTO `tc_menu_config` VALUES ('9', '1', '22', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:28', '');
INSERT INTO `tc_menu_config` VALUES ('10', '1', '23', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:30', '');
INSERT INTO `tc_menu_config` VALUES ('11', '1', '24', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:31', '');
INSERT INTO `tc_menu_config` VALUES ('12', '1', '25', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:33', '');
INSERT INTO `tc_menu_config` VALUES ('13', '1', '26', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:38', '');
INSERT INTO `tc_menu_config` VALUES ('14', '1', '27', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:50', '');
INSERT INTO `tc_menu_config` VALUES ('15', '1', '28', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:54', '');
INSERT INTO `tc_menu_config` VALUES ('16', '1', '29', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:56', '');
INSERT INTO `tc_menu_config` VALUES ('26', '1', '17', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-06-14 21:12:21', '');
INSERT INTO `tc_menu_config` VALUES ('27', '1', '17', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-06-14 21:12:21', '');
INSERT INTO `tc_menu_config` VALUES ('28', '1', '17', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-06-14 21:12:21', '');

-- ----------------------------
-- Table structure for tm_menu
-- ----------------------------
DROP TABLE IF EXISTS `tm_menu`;
CREATE TABLE `tm_menu` (
  `MenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MenuType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MenuParent` int(11) DEFAULT NULL,
  `MenuURL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(Page)',
  `MenuIcon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(Icon)',
  `MenuLevel` int(11) DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `status` enum('OFF','ON') COLLATE utf8_unicode_ci DEFAULT 'ON' COMMENT 'Data Status ',
  `UpdateDT` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime Update',
  `UpdateBy` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'UserName(tm_User)',
  PRIMARY KEY (`MenuID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Menu Head Data of System';

-- ----------------------------
-- Records of tm_menu
-- ----------------------------
INSERT INTO `tm_menu` VALUES ('1', 'HOME', 'none', '0', 'home', null, '1', '1', 'ON', '2017-03-16 13:52:11', null);
INSERT INTO `tm_menu` VALUES ('2', 'BOOKED', 'none', '0', 'booked', null, '1', '2', 'ON', '2017-03-16 13:52:33', null);
INSERT INTO `tm_menu` VALUES ('3', 'CHECKIN', 'none', '0', 'checkin', null, '1', '3', 'ON', '2017-03-16 14:44:40', null);
INSERT INTO `tm_menu` VALUES ('4', 'CHECKOUT', 'none', '0', 'checkout', null, '1', '4', 'ON', '2017-03-16 14:44:57', null);
INSERT INTO `tm_menu` VALUES ('5', 'REPORT', 'dropdown', '0', '#', null, '1', '5', 'ON', '2017-03-16 14:43:16', null);
INSERT INTO `tm_menu` VALUES ('6', 'SETTING', 'dropdown', '0', '#', null, '1', '6', 'ON', '2017-03-16 13:58:23', null);
INSERT INTO `tm_menu` VALUES ('20', 'Room', 'none', '6', 'room', null, '2', '7', 'ON', '2017-03-16 13:54:43', null);
INSERT INTO `tm_menu` VALUES ('21', 'Room Type', 'none', '6', 'questionnaire', null, '2', '8', 'ON', '2017-03-16 14:33:53', null);
INSERT INTO `tm_menu` VALUES ('22', 'Service', 'none', '6', 'service', null, '2', '9', 'ON', '2017-03-16 13:58:36', null);
INSERT INTO `tm_menu` VALUES ('23', 'Service Type', 'none', '6', 'servicetype', null, '2', '10', 'ON', '2017-03-16 14:02:16', null);
INSERT INTO `tm_menu` VALUES ('24', 'User Group', 'none', '6', 'usergroup', null, '2', '12', 'ON', '2017-03-16 14:03:47', null);
INSERT INTO `tm_menu` VALUES ('25', 'User', 'none', '6', 'user', null, '2', '13', 'ON', '2017-03-16 14:09:23', null);
INSERT INTO `tm_menu` VALUES ('26', 'รายงานยอดเช่าห้อง', null, '5', 'report/booked', null, '2', '14', 'ON', '2017-06-14 21:07:29', null);
INSERT INTO `tm_menu` VALUES ('27', 'รายงานยอดเช่าห้อง', null, '5', 'report/revenue', null, '2', '15', 'ON', '2017-06-14 21:07:33', null);
INSERT INTO `tm_menu` VALUES ('28', 'สินค้าบริการ', null, '5', 'report/service', null, '2', '16', 'ON', '2017-06-14 21:09:45', null);
INSERT INTO `tm_menu` VALUES ('29', 'ทรัพสินเสียหาย', null, '5', 'report/service', null, '2', '17', 'ON', '2017-06-14 21:09:50', null);

-- ----------------------------
-- Table structure for tm_room
-- ----------------------------
DROP TABLE IF EXISTS `tm_room`;
CREATE TABLE `tm_room` (
  `roomID` int(10) NOT NULL AUTO_INCREMENT,
  `roomtypeID` int(10) NOT NULL,
  `floor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `roomCODE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transaction` enum('EMPTY','BOOKED','CHECKIN','CHECKOUT','CLEANING') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EMPTY' COMMENT 'empty,booked,checkin,checkout,cleaning',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('ON','OFF') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tm_room
-- ----------------------------
INSERT INTO `tm_room` VALUES ('1', '1', '2', '202', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('2', '1', '2', '204', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('3', '1', '2', '206', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('4', '1', '2', '208', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('5', '1', '2', '210', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('6', '1', '2', '212', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('7', '1', '2', '214', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('8', '1', '2', '216', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('9', '1', '2', '218', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('10', '1', '2', '220', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('11', '1', '2', '201', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('12', '1', '2', '203', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('13', '1', '2', '205', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('14', '1', '2', '207', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('15', '1', '2', '209', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('16', '1', '2', '211', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('17', '1', '2', '213', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('18', '1', '2', '215', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('19', '1', '2', '217', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('20', '1', '2', '219', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('21', '1', '3', '302', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('22', '1', '3', '304', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('23', '1', '3', '306', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('24', '1', '3', '308', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('25', '1', '3', '310', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('26', '1', '3', '312', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('27', '1', '3', '314', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('28', '1', '3', '316', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('29', '1', '3', '318', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('30', '1', '3', '320', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('31', '1', '3', '301', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('32', '1', '3', '303', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('33', '1', '3', '305', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('34', '1', '3', '307', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('35', '1', '3', '309', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('36', '1', '3', '311', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('37', '1', '3', '313', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('38', '1', '3', '315', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('39', '1', '3', '317', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('40', '1', '3', '319', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('41', '1', '4', '402', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('42', '1', '4', '404', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('43', '1', '4', '406', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('44', '1', '4', '408', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('45', '1', '4', '410', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('46', '1', '4', '412', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('47', '1', '4', '414', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('48', '1', '4', '416', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('49', '1', '4', '418', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('50', '1', '4', '420', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('51', '1', '4', '401', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('52', '1', '4', '403', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('53', '1', '4', '405', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('54', '1', '4', '407', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('55', '1', '4', '409', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('56', '1', '4', '411', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('57', '1', '4', '413', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('58', '1', '4', '415', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('59', '1', '4', '417', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);
INSERT INTO `tm_room` VALUES ('60', '1', '4', '419', 'EMPTY', null, 'ON', '2560-06-20 22:06:59', 'admin', null, null);

-- ----------------------------
-- Table structure for tm_roomtype
-- ----------------------------
DROP TABLE IF EXISTS `tm_roomtype`;
CREATE TABLE `tm_roomtype` (
  `roomtypeID` int(10) NOT NULL AUTO_INCREMENT,
  `floor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `roomtypeCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_month` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_day` decimal(10,2) DEFAULT '0.00',
  `price_short` decimal(10,2) DEFAULT '0.00',
  `price_hour` decimal(10,2) DEFAULT '0.00',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('ON','OFF') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`roomtypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tm_roomtype
-- ----------------------------

-- ----------------------------
-- Table structure for tm_user
-- ----------------------------
DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE `tm_user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userIdcard` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ID Card or Passport NO',
  `userTitle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userFname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userMname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userLname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgProfile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgPassport` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usergroupID` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'ON',
  `createDT` datetime DEFAULT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`userID`,`username`),
  KEY `idx_userID` (`userID`),
  KEY `idx_email` (`useremail`),
  KEY `idx_username` (`username`),
  KEY `idx_password` (`password`),
  KEY `idx_fullname` (`userFname`,`userMname`,`userLname`),
  KEY `idx_country` (`countryID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES ('1', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'dittaphong@dev.com', null, 'MR', 'Dittaphong', '', 'Nilnama', '212', null, null, null, null, null, '', null, '1', 'ON', '2017-03-14 17:31:30', null, '2017-03-14 17:31:35', '1');
INSERT INTO `tm_user` VALUES ('13', '', '', '', 's', '', '', '', '', '212', '', '', '', '', '', null, null, '0', 'ON', '2017-06-13 00:23:05', 'admin', '2017-06-13 00:23:05', 'admin');

-- ----------------------------
-- Table structure for tm_usergroup
-- ----------------------------
DROP TABLE IF EXISTS `tm_usergroup`;
CREATE TABLE `tm_usergroup` (
  `usergroupID` int(11) NOT NULL AUTO_INCREMENT,
  `usergroupName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usergroupDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'ON' COMMENT 'Data Status ',
  `UpdateDT` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime Update',
  `UpdateBy` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'UserName(tm_User)',
  PRIMARY KEY (`usergroupID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='Menu Head Data of System';

-- ----------------------------
-- Records of tm_usergroup
-- ----------------------------
INSERT INTO `tm_usergroup` VALUES ('1', 'SYSTEM', 'SYSTEM', 'ON', '2017-03-16 14:58:25', null);
INSERT INTO `tm_usergroup` VALUES ('2', 'ADMIN', 'ADMIN OVER ALL', 'ON', '2017-03-16 14:58:41', null);
INSERT INTO `tm_usergroup` VALUES ('3', 'CASHIER', 'SUPER USER', 'ON', '2017-03-16 14:58:57', null);

-- ----------------------------
-- Table structure for tsc_gensn
-- ----------------------------
DROP TABLE IF EXISTS `tsc_gensn`;
CREATE TABLE `tsc_gensn` (
  `id_tsc_gen` int(11) NOT NULL,
  `sncode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อักษรขึ้นต้นของ Transection / เลขที่เอกสาร',
  `day_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ํYYMM',
  `last_number` int(10) DEFAULT NULL COMMENT 'Number ล่าสุด',
  `ref_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่สร้าง',
  `updateDT` datetime DEFAULT NULL COMMENT 'วันที่ update ล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tsc_gensn
-- ----------------------------
INSERT INTO `tsc_gensn` VALUES ('0', 'TSF', '1706', '1', 'TSF1706', '2017-06-22 01:00:51');
INSERT INTO `tsc_gensn` VALUES ('0', 'AAA', '1706', '4', 'AAA1701', '2017-06-22 01:05:48');

-- ----------------------------
-- Table structure for ts_booked
-- ----------------------------
DROP TABLE IF EXISTS `ts_booked`;
CREATE TABLE `ts_booked` (
  `bookedID` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookedCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idcardno` int(10) NOT NULL,
  `idcardnoPath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bookedDate` datetime NOT NULL,
  `checkInAppointDate` datetime NOT NULL,
  `checkOutAppointDate` datetime NOT NULL,
  `is_breakfast` enum('YES','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `bookedType` enum('HOUR','SHORT','DAY','MONTH') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DAY',
  `cashPledge` double(10,2) DEFAULT NULL,
  `cashPledgePath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('ON','OFF') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bookedID`,`bookedCode`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_booked
-- ----------------------------

-- ----------------------------
-- Table structure for ts_booked_room
-- ----------------------------
DROP TABLE IF EXISTS `ts_booked_room`;
CREATE TABLE `ts_booked_room` (
  `bookedroomID` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookedID` bigint(20) NOT NULL,
  `roomID` int(10) NOT NULL,
  `checkinDate` datetime DEFAULT NULL,
  `checkoutDate` datetime DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('BOOKED','CHECKIN','LATE','CANCLE','HIDDEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BOOKED',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bookedroomID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_booked_room
-- ----------------------------

-- ----------------------------
-- Table structure for ts_booked_room_log
-- ----------------------------
DROP TABLE IF EXISTS `ts_booked_room_log`;
CREATE TABLE `ts_booked_room_log` (
  `logroomdateID` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookedroomID` bigint(20) NOT NULL,
  `roomID` int(10) NOT NULL,
  `logDate` datetime DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('BOOKED','CHECKIN','CHECKOUT','CLEAN','CANCLE','HIDDEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BOOKED',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`logroomdateID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_booked_room_log
-- ----------------------------

-- ----------------------------
-- Table structure for ts_cash_dtl
-- ----------------------------
DROP TABLE IF EXISTS `ts_cash_dtl`;
CREATE TABLE `ts_cash_dtl` (
  `cashdtlID` bigint(20) NOT NULL AUTO_INCREMENT,
  `cashhdrID` bigint(20) NOT NULL,
  `bookedID` bigint(20) NOT NULL,
  `cashName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cashDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cashDate` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('OPEN','PAY','CANCLE','HIDDEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OPEN',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cashdtlID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_cash_dtl
-- ----------------------------

-- ----------------------------
-- Table structure for ts_cash_hdr
-- ----------------------------
DROP TABLE IF EXISTS `ts_cash_hdr`;
CREATE TABLE `ts_cash_hdr` (
  `cashhdrID` bigint(20) NOT NULL AUTO_INCREMENT,
  `cashCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bookedID` bigint(20) NOT NULL,
  `roomID` int(10) NOT NULL,
  `cashDate` datetime NOT NULL,
  `totalVat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalDiscount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalLast` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('OPEN','PAY','CANCLE','HIDDEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OPEN',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cashhdrID`,`cashCode`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_cash_hdr
-- ----------------------------

-- ----------------------------
-- Table structure for ts_country
-- ----------------------------
DROP TABLE IF EXISTS `ts_country`;
CREATE TABLE `ts_country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'ON' COMMENT '(LineStatus)',
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(UserName)',
  PRIMARY KEY (`countryID`,`countryName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Country of System';

-- ----------------------------
-- Records of ts_country
-- ----------------------------
INSERT INTO `ts_country` VALUES ('1', 'AFGHANISTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('2', 'ALBANIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('3', 'ALGERIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('4', 'AMERICAN SAMOA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('5', 'ANDORRA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('6', 'ANGOLA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('7', 'ANTIGUA AND BARBUDA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('8', 'ARGENTINA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('9', 'ARMENIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('10', 'ARUBA,BONAIRE & CURACAO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('11', 'AUSTRALIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('12', 'AUSTRIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('14', 'AZERBAIJAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('15', 'BAHAMAS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('16', 'BAHRAIN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('17', 'BANGLADESH', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('18', 'BARBADOS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('19', 'BELARUS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('20', 'BELGIUM', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('21', 'BELIZE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('22', 'BENIN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('23', 'BERMUDA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('24', 'BHUTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('25', 'BOLIVIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('26', 'BOTSWANA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('27', 'BOUVET ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('28', 'BRAZIL', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('29', 'BRITISH ANTRACTIC TERRI.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('30', 'BRITISH VIRGIN ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('31', 'BRIT. INDIAN OCEAN TERRI.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('32', 'BRUNEI DARUSSALAM', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('33', 'BULGARIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('34', 'BURKINA FASO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('35', 'BURUNDI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('36', 'CAMBODIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('37', 'CAMEROON', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('38', 'CANADA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('39', 'CANARY ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('40', 'CANTON AND ENDERBURY ISLA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('41', 'CAPE VERDE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('42', 'CAYMAN ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('43', 'CENTRAL AFRICAN REPUBLIC', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('44', 'CHAD', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('45', 'CHILE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('46', 'PEOPLE\'S REPUBLIC OF CHINA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('47', 'CHRISTMAS ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('48', 'COCOS(KEELING) ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('49', 'COLOMBIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('50', 'COMOROS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('51', 'CONGO(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('52', 'COOK ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('53', 'COSTA RICA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('54', 'IVORY COAST', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('55', 'CROATIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('56', 'CUBA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('57', 'CYPRUS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('58', 'CZECH REPUBLIC', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('59', 'CZECHOSLOVAKIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('60', 'DENMARK', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('61', 'DJIBOUTI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('62', 'DOMINICA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('63', 'DOMINICAN REPUBLIC(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('64', 'DRONNING MAUD LAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('65', 'EAST TIMOR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('66', 'ECUADOR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('67', 'EGYPT', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('68', 'EL SALVADOR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('69', 'EQUATORIAL GUINEA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('70', 'ESTONIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('71', 'ETHIOPIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('72', 'FAEROE ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('73', 'FALKLAND ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('74', 'FIJI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('75', 'FINLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('76', 'FRANCE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('77', 'FRENCH GUIANA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('78', 'FRENCH POLYNESIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('79', 'FRENCH SOUTHERN AND ANTAR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('80', 'GABON', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('81', 'GAMBIA (THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('82', 'GEORGIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('83', 'GERMANY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('84', 'GHANA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('85', 'GIBRALTAR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('86', 'GREECE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('87', 'GREENLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('88', 'GRENADA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('89', 'GUADELOUPE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('90', 'GUAM', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('91', 'GUATEMALA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('92', 'GUINEA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('93', 'GUINEA-BISSAU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('94', 'GUYANA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('95', 'HAITI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('96', 'HEARD AND MCDONALD ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('97', 'HOLY SEE (THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('98', 'HONDURAS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('99', 'HONG KONG', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('100', 'HUNGARY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('101', 'ICELAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('102', 'INDIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('103', 'INDONESIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('104', 'IRAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('105', 'IRAQ', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('106', 'IRELAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('107', 'ISRAEL', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('108', 'ITALY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('109', 'JAMAICA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('110', 'JAPAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('111', 'JOHNSTON ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('112', 'JORDAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('113', 'KAZAKHSTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('114', 'KENYA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('115', 'KIRIBATI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('116', 'KOREA NORTH DEMOCRATIC(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('117', 'REPUBLIC OF KOREA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('118', 'KUWAIT', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('119', 'KYRGYZSTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('120', 'LAO P.D.R.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('121', 'LATVIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('122', 'LEBANON', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('123', 'LESOTHO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('124', 'LIBERIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('125', 'LIBYA  ARAB JAMAHIRIYA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('126', 'LIECHTENSTEIN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('127', 'LITHUANIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('128', 'LUXEMBOURG', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('129', 'MACAO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('130', 'MADAGASCAR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('131', 'MALAWI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('132', 'MALAYSIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('133', 'MALDIVES', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('134', 'MALI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('135', 'MALTA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('136', 'MARTINIQUE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('137', 'MAURITANIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('138', 'MAURITIUS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('139', 'MEXICO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('140', 'MIDMAY ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('141', 'MOLDOVA REPUBLIC', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('142', 'MONACO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('143', 'MONGOLIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('144', 'MONTSERRAT', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('145', 'MOROCCO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('146', 'MOZAMBIQUE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('147', 'UNION OF MYANMAR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('148', 'NAMIBIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('149', 'NAURU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('150', 'NEPAL', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('151', 'NETHERLAND(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('152', 'NEUTRAL ZONE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('153', 'NEW CALEDONIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('154', 'NEW ZEALAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('155', 'NICARAGUA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('156', 'NIGER (THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('157', 'NIGERIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('158', 'NIUE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('159', 'NORFOLK ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('160', 'NORWAY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('161', 'OMAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('162', 'PACIFIC ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('163', 'PAKISTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('164', 'PALESTINE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('165', 'PANAMA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('166', 'PANAMA CANAL ZONE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('167', 'PAPUA NEW GUINEA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('168', 'PARAGUAY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('169', 'PERU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('170', 'PHILIPPINES', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('171', 'PITCAIRN ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('172', 'REPUBLIC OF POLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('173', 'PORTUGAL', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('174', 'PUERTO RICO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('175', 'QATAR', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('176', 'REUNION', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('177', 'ROMANIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('178', 'RUSSIAN FEDERATION', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('179', 'RWANDA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('180', 'ST. HELENA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('181', 'ST.CHRISTOPHER AND NEVIS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('182', 'SAINT LUCIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('183', 'SAINT PIERRE AND MIQUELON', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('184', 'SAINT VINCENT AND GRENA.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('185', 'SAMOAUNA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('186', 'SAN MARINO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('187', 'SAO TOME AND PRINCIPE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('188', 'SAUDI ARABIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('189', 'SCOTLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('190', 'SENEGAL', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('191', 'SEYCHELLES', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('192', 'SIERRA LEONE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('193', 'SINGAPORE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('194', 'SLOVAK REP.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('195', 'SLOVENIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('196', 'SOLOMON ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('197', 'SOMALIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('198', 'REPUBLIC OF SOUTH AFRICA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('199', 'SPAIN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('200', 'SRI LANKA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('201', 'SUDAN(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('202', 'SURINAME', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('203', 'SVALBARD AND JAN MAYEN IS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('204', 'SWAZILAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('205', 'SWEDEN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('206', 'SWITZERLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('207', 'SYRIA ARAB REPUBLIC(THE)', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('208', 'TAHITI', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('209', 'TAIWAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('210', 'TAJIKISTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('211', 'TANZANIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('212', 'THAILAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('213', 'TOGO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('214', 'TOKELAU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('215', 'TONGA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('216', 'TRINIDAD', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('217', 'TRINIDAD.AND TOBAGO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('218', 'TUNISIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('219', 'TURKEY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('220', 'TURKMENISTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('221', 'TURKS AND CAICOS ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('222', 'TUVALU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('223', 'UNITED ARAB EMIRATES', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('224', 'UGANDA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('225', 'UNITED KINGDOM', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('226', 'UKRAINE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('228', 'UNITED STATES MISCELLANEO', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('229', 'UNITED STATES VIRGIN ISL.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('230', 'URUGUAY', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('231', 'UNITED STATES OF AMERICA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('232', 'UZBEKISTAN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('233', 'U.S.S.R.', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('234', 'VANUATU', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('235', 'VENEZUELA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('236', 'VIETNAM', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('237', 'WAKE ISLAND', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('238', 'WALLIS AND FUTUNA ISLANDS', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('239', 'WESTERN SAHARA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('240', 'YEMEN', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('241', 'YUGOSLAVIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('242', 'ZAIRE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('243', 'ZAMBIA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('244', 'ZARAGOZA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('245', 'ZIMBABWE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('246', 'CRANLEIGH', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('247', 'MAYOTTE', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('248', 'BOSNIA-HERZEGOVINA', 'ON', '0000-00-00 00:00:00', '');
INSERT INTO `ts_country` VALUES ('249', 'GUERNSEY', 'ON', '0000-00-00 00:00:00', '');

-- ----------------------------
-- Table structure for ts_log
-- ----------------------------
DROP TABLE IF EXISTS `ts_log`;
CREATE TABLE `ts_log` (
  `LogID` int(11) NOT NULL,
  `LogName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogDesc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogGroup` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogType` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TableDID` int(11) DEFAULT NULL COMMENT '(ts_Table_D)',
  `TableDName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(ts_Table_D)',
  `TableHID` int(11) DEFAULT NULL COMMENT '(ts_Table_D)',
  `TableHName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(ts_Table_D)',
  `LogList` int(11) DEFAULT NULL,
  `LogStatus` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(LineStatus)',
  `LogUpdate` datetime DEFAULT NULL,
  `LogBy` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(UserName)',
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Log Tracking Data of System';

-- ----------------------------
-- Records of ts_log
-- ----------------------------

-- ----------------------------
-- Table structure for ts_service
-- ----------------------------
DROP TABLE IF EXISTS `ts_service`;
CREATE TABLE `ts_service` (
  `serviceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookedroomID` bigint(20) NOT NULL,
  `serviceName` int(10) NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `amount` decimal(10,2) DEFAULT '0.00',
  `unit` decimal(10,2) DEFAULT '0.00',
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('ORDER','RECIVE','PAY','CANCLE','HIDDEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ORDER',
  `createDT` datetime NOT NULL,
  `createBY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ts_service
-- ----------------------------

-- ----------------------------
-- View structure for qr_checklogin
-- ----------------------------
DROP VIEW IF EXISTS `qr_checklogin`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `qr_checklogin` AS select `tm_user`.`userID` AS `userID`,`tm_user`.`username` AS `username`,`tm_user`.`password` AS `password`,`tm_user`.`useremail` AS `useremail`,`tm_user`.`userFname` AS `userFname`,`tm_user`.`userLname` AS `userLname`,`tm_user`.`status` AS `status`,`tm_user`.`usergroupID` AS `usergroupID`,`tm_user`.`imgProfile` AS `imgProfile` from `tm_user` where (`tm_user`.`status` = 'ON') ; ;

-- ----------------------------
-- Function structure for fn_gen_sn
-- ----------------------------
DROP FUNCTION IF EXISTS `fn_gen_sn`;
DELIMITER ;;
CREATE DEFINER=`root`@`%` FUNCTION `fn_gen_sn`(`param_sncode` VARCHAR(10), `param_refcode` VARCHAR(20)) RETURNS varchar(20) CHARSET utf8 COLLATE utf8_unicode_ci
    MODIFIES SQL DATA
BEGIN
   DECLARE last_code varchar(20);
   DECLARE set_new_number VARCHAR(5);
   DECLARE next_number INT(5);
   DECLARE day_number varchar(6);    

   SELECT last_number INTO next_number
   FROM   tsc_gensn 
   WHERE  ref_code = param_refcode  
   LIMIT  1; 

   IF next_number is NULL THEN
			BEGIN
				SET next_number = 1;
				 INSERT INTO tsc_gensn(sncode,day_number,last_number,ref_code,updateDT)
				 VALUES (param_sncode, DATE_FORMAT(now(),'%y%m'), next_number, param_refcode, now());                   
			END;
	  ELSE
		BEGIN 
			SET next_number = next_number + 1; 
      UPDATE tsc_gensn
      SET  last_number = next_number,
			     updateDT = now()
      WHERE ref_code = param_refcode;  
		END;
   END IF;
   SELECT lpad(next_number,5,'0') INTO set_new_number;
   SELECT CONCAT(param_sncode,DATE_FORMAT(now(),'%y%m'),set_new_number) INTO last_code;
   RETURN last_code;
END
;;
DELIMITER ;
