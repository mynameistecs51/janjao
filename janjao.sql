-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 04:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `janjao`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`%` FUNCTION `fn_gen_sn` (`param_sncode` VARCHAR(6), `param_accounttype` VARCHAR(4), `param_daynumber` VARCHAR(8), `param_refcode` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8 MODIFIES SQL DATA
    DETERMINISTIC
BEGIN
	 DECLARE last_code varchar(20);
   DECLARE set_new_number VARCHAR(5);
   DECLARE next_number INT(5);
   DECLARE account_type varchar(2);
   DECLARE day_number varchar(6);    

   SELECT last_number INTO next_number
   FROM 	tsc_gensn 
	 WHERE ref_code = param_refcode  
    
   LIMIT  1; 

   IF next_number is NULL THEN
			BEGIN
				SET next_number = 1;
				 INSERT INTO tsc_gensn(sncode,account_type,day_number,last_number,ref_code,updateDT)
				 VALUES (param_sncode, param_accounttype, DATE_FORMAT(now(),'%y%m%d'), next_number, param_refcode, now());                   
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
   SELECT CONCAT(param_sncode,DATE_FORMAT(now(),'%y%m%d'),param_accounttype,set_new_number) INTO last_code;
   RETURN last_code;   
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `qr_checklogin`
--
CREATE TABLE `qr_checklogin` (
`userID` int(11)
,`username` varchar(255)
,`password` varchar(100)
,`useremail` varchar(100)
,`userFname` varchar(100)
,`userLname` varchar(100)
,`status` varchar(10)
,`usergroupID` int(11)
,`imgProfile` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tc_menu_config`
--

CREATE TABLE `tc_menu_config` (
  `menuConfigID` int(11) NOT NULL COMMENT '????????????????',
  `userGroupID` int(11) NOT NULL COMMENT 'User / Account ID',
  `menuID` int(11) NOT NULL COMMENT '??????????????????',
  `canAdd` varchar(30) NOT NULL DEFAULT 'ON' COMMENT '??????????????????',
  `canView` varchar(30) NOT NULL DEFAULT 'ON' COMMENT '???????????????????',
  `canEdit` varchar(11) NOT NULL DEFAULT 'ON' COMMENT '???????????????????????????????',
  `canDrop` varchar(255) NOT NULL DEFAULT 'ON',
  `canPrint` varchar(255) NOT NULL DEFAULT 'ON',
  `canApprove` varchar(255) NOT NULL DEFAULT 'ON',
  `status` varchar(10) NOT NULL DEFAULT 'ON' COMMENT '(LineStatus) ON/OFF',
  `updateDT` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateBY` varchar(30) NOT NULL COMMENT '???????????(UserName)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Configuration Data of System';

--
-- Dumping data for table `tc_menu_config`
--

INSERT INTO `tc_menu_config` (`menuConfigID`, `userGroupID`, `menuID`, `canAdd`, `canView`, `canEdit`, `canDrop`, `canPrint`, `canApprove`, `status`, `updateDT`, `updateBY`) VALUES
(1, 1, 1, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', ''),
(2, 1, 2, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', ''),
(3, 1, 3, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:17', ''),
(4, 1, 4, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:20', ''),
(5, 1, 5, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:21', ''),
(6, 1, 6, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:23', ''),
(7, 1, 20, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:25', ''),
(8, 1, 21, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:26', ''),
(9, 1, 22, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:28', ''),
(10, 1, 23, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:30', ''),
(11, 1, 24, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:31', ''),
(12, 1, 25, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:33', ''),
(13, 1, 26, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-16 16:02:38', ''),
(14, 1, 27, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:50', ''),
(15, 1, 28, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:54', ''),
(16, 1, 29, 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', 'ON', '2017-03-20 11:25:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `tm_menu`
--

CREATE TABLE `tm_menu` (
  `MenuID` int(11) NOT NULL COMMENT '??????????????',
  `MenuName` varchar(255) DEFAULT NULL COMMENT '???????????????',
  `MenuType` varchar(255) DEFAULT NULL COMMENT '?????????????????',
  `MenuParent` int(11) DEFAULT NULL COMMENT '?????????????????',
  `MenuURL` varchar(100) DEFAULT NULL COMMENT '?????????????????(Page)',
  `MenuIcon` varchar(100) DEFAULT NULL COMMENT '??????(Icon)???????',
  `MenuLevel` int(11) DEFAULT NULL COMMENT '???????????????????????????????',
  `order_no` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ON' COMMENT 'Data Status ',
  `UpdateDT` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime Update',
  `UpdateBy` varchar(30) DEFAULT NULL COMMENT 'UserName(tm_User)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Menu Head Data of System';

--
-- Dumping data for table `tm_menu`
--

INSERT INTO `tm_menu` (`MenuID`, `MenuName`, `MenuType`, `MenuParent`, `MenuURL`, `MenuIcon`, `MenuLevel`, `order_no`, `status`, `UpdateDT`, `UpdateBy`) VALUES
(1, 'HOME', 'none', 0, 'home', NULL, 1, 1, 'ON', '2017-03-16 13:52:11', NULL),
(2, 'BOOKED', 'none', 0, 'booked', NULL, 1, 2, 'ON', '2017-03-16 13:52:33', NULL),
(3, 'CHECKIN', 'none', 0, 'checkin', NULL, 1, 3, 'ON', '2017-03-16 14:44:40', NULL),
(4, 'CHECKOUT', 'none', 0, 'access', NULL, 1, 4, 'OFF', '2017-03-16 14:44:57', NULL),
(5, 'REPORT', 'dropdown', 0, '#', NULL, 1, 5, 'ON', '2017-03-16 14:43:16', NULL),
(6, 'SETTING', 'dropdown', 0, '#', NULL, 1, 6, 'ON', '2017-03-16 13:58:23', NULL),
(20, 'Room', 'none', 6, 'room', NULL, 2, 7, 'ON', '2017-03-16 13:54:43', NULL),
(21, 'Room Type', 'none', 6, 'questionnaire', NULL, 2, 8, 'ON', '2017-03-16 14:33:53', NULL),
(22, 'Service', 'none', 6, 'service', NULL, 2, 9, 'ON', '2017-03-16 13:58:36', NULL),
(23, 'Service Type', 'none', 6, 'servicetype', NULL, 2, 10, 'ON', '2017-03-16 14:02:16', NULL),
(24, 'User Group', 'none', 6, 'usergroup', NULL, 2, 12, 'ON', '2017-03-16 14:03:47', NULL),
(25, 'User', 'none', 6, 'user', NULL, 2, 13, 'ON', '2017-03-16 14:09:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `userIdcard` varchar(50) DEFAULT NULL COMMENT 'ID Card or Passport NO',
  `userTitle` varchar(50) DEFAULT NULL,
  `userFname` varchar(100) DEFAULT NULL,
  `userMname` varchar(100) DEFAULT NULL,
  `userLname` varchar(100) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `imgProfile` varchar(100) DEFAULT NULL,
  `imgPassport` varchar(100) DEFAULT NULL,
  `usergroupID` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ON',
  `createDT` datetime DEFAULT NULL,
  `createBY` varchar(50) DEFAULT NULL,
  `updateDT` datetime DEFAULT NULL,
  `updateBY` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`userID`, `username`, `password`, `useremail`, `userIdcard`, `userTitle`, `userFname`, `userMname`, `userLname`, `countryID`, `address`, `city`, `state`, `postcode`, `mobile`, `imgProfile`, `imgPassport`, `usergroupID`, `status`, `createDT`, `createBY`, `updateDT`, `updateBY`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'dittaphong@dev.com', NULL, 'MR', 'Dittaphong', '', 'Nilnama', 212, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 'ON', '2017-03-14 17:31:30', NULL, '2017-03-14 17:31:35', '1'),
(13, '', '', '', 's', '', '', '', '', 212, '', '', '', '', '', NULL, NULL, 0, 'ON', '2017-06-13 00:23:05', 'admin', '2017-06-13 00:23:05', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tm_usergroup`
--

CREATE TABLE `tm_usergroup` (
  `usergroupID` int(11) NOT NULL COMMENT '??????????????',
  `usergroupName` varchar(255) DEFAULT NULL COMMENT 'à¸Šà¸·à¹ˆà¸­à¸à¸¥à¸¸à¹ˆà¸¡à¸œà¸¹à¹‰à¹€à¸‚à¹‰à¸²à¹ƒà¸Šà¹‰à¸£à¸°à¸šà¸š',
  `usergroupDesc` varchar(255) DEFAULT NULL COMMENT 'à¸­à¸˜à¸´à¸šà¸²à¸¢à¹€à¸žà¸´à¹ˆà¸¡à¹€à¸•à¸´à¸¡',
  `status` varchar(10) DEFAULT 'ON' COMMENT 'Data Status ',
  `UpdateDT` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime Update',
  `UpdateBy` varchar(30) DEFAULT NULL COMMENT 'UserName(tm_User)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Menu Head Data of System' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tm_usergroup`
--

INSERT INTO `tm_usergroup` (`usergroupID`, `usergroupName`, `usergroupDesc`, `status`, `UpdateDT`, `UpdateBy`) VALUES
(1, 'SYSTEM', 'SYSTEM', 'ON', '2017-03-16 14:58:25', NULL),
(2, 'ADMIN', 'ADMIN OVER ALL', 'ON', '2017-03-16 14:58:41', NULL),
(3, 'CASHIER', 'SUPER USER', 'ON', '2017-03-16 14:58:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsc_gen`
--

CREATE TABLE `tsc_gen` (
  `id_tsc_gen` int(11) NOT NULL,
  `tsc_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อักษรขึ้นต้นของ Transection / เลขที่เอกสาร',
  `mdept_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสแผนก',
  `tsc_date` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  `last_number` int(10) DEFAULT NULL COMMENT 'Number ล่าสุด',
  `dt_update` datetime DEFAULT NULL COMMENT 'วันที่ update ล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ts_country`
--

CREATE TABLE `ts_country` (
  `countryID` int(11) NOT NULL COMMENT '????????????',
  `countryName` varchar(30) NOT NULL COMMENT '??????????(??????????)',
  `status` varchar(10) DEFAULT 'ON' COMMENT '(LineStatus)',
  `updateDT` datetime DEFAULT NULL COMMENT '?????????????????????',
  `updateBY` varchar(100) DEFAULT NULL COMMENT '???????????(UserName)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Country of System';

--
-- Dumping data for table `ts_country`
--

INSERT INTO `ts_country` (`countryID`, `countryName`, `status`, `updateDT`, `updateBY`) VALUES
(1, 'AFGHANISTAN', 'ON', '0000-00-00 00:00:00', ''),
(2, 'ALBANIA', 'ON', '0000-00-00 00:00:00', ''),
(3, 'ALGERIA', 'ON', '0000-00-00 00:00:00', ''),
(4, 'AMERICAN SAMOA', 'ON', '0000-00-00 00:00:00', ''),
(5, 'ANDORRA', 'ON', '0000-00-00 00:00:00', ''),
(6, 'ANGOLA', 'ON', '0000-00-00 00:00:00', ''),
(7, 'ANTIGUA AND BARBUDA', 'ON', '0000-00-00 00:00:00', ''),
(8, 'ARGENTINA', 'ON', '0000-00-00 00:00:00', ''),
(9, 'ARMENIA', 'ON', '0000-00-00 00:00:00', ''),
(10, 'ARUBA,BONAIRE & CURACAO', 'ON', '0000-00-00 00:00:00', ''),
(11, 'AUSTRALIA', 'ON', '0000-00-00 00:00:00', ''),
(12, 'AUSTRIA', 'ON', '0000-00-00 00:00:00', ''),
(14, 'AZERBAIJAN', 'ON', '0000-00-00 00:00:00', ''),
(15, 'BAHAMAS', 'ON', '0000-00-00 00:00:00', ''),
(16, 'BAHRAIN', 'ON', '0000-00-00 00:00:00', ''),
(17, 'BANGLADESH', 'ON', '0000-00-00 00:00:00', ''),
(18, 'BARBADOS', 'ON', '0000-00-00 00:00:00', ''),
(19, 'BELARUS', 'ON', '0000-00-00 00:00:00', ''),
(20, 'BELGIUM', 'ON', '0000-00-00 00:00:00', ''),
(21, 'BELIZE', 'ON', '0000-00-00 00:00:00', ''),
(22, 'BENIN', 'ON', '0000-00-00 00:00:00', ''),
(23, 'BERMUDA', 'ON', '0000-00-00 00:00:00', ''),
(24, 'BHUTAN', 'ON', '0000-00-00 00:00:00', ''),
(25, 'BOLIVIA', 'ON', '0000-00-00 00:00:00', ''),
(26, 'BOTSWANA', 'ON', '0000-00-00 00:00:00', ''),
(27, 'BOUVET ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(28, 'BRAZIL', 'ON', '0000-00-00 00:00:00', ''),
(29, 'BRITISH ANTRACTIC TERRI.', 'ON', '0000-00-00 00:00:00', ''),
(30, 'BRITISH VIRGIN ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(31, 'BRIT. INDIAN OCEAN TERRI.', 'ON', '0000-00-00 00:00:00', ''),
(32, 'BRUNEI DARUSSALAM', 'ON', '0000-00-00 00:00:00', ''),
(33, 'BULGARIA', 'ON', '0000-00-00 00:00:00', ''),
(34, 'BURKINA FASO', 'ON', '0000-00-00 00:00:00', ''),
(35, 'BURUNDI', 'ON', '0000-00-00 00:00:00', ''),
(36, 'CAMBODIA', 'ON', '0000-00-00 00:00:00', ''),
(37, 'CAMEROON', 'ON', '0000-00-00 00:00:00', ''),
(38, 'CANADA', 'ON', '0000-00-00 00:00:00', ''),
(39, 'CANARY ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(40, 'CANTON AND ENDERBURY ISLA', 'ON', '0000-00-00 00:00:00', ''),
(41, 'CAPE VERDE', 'ON', '0000-00-00 00:00:00', ''),
(42, 'CAYMAN ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(43, 'CENTRAL AFRICAN REPUBLIC', 'ON', '0000-00-00 00:00:00', ''),
(44, 'CHAD', 'ON', '0000-00-00 00:00:00', ''),
(45, 'CHILE', 'ON', '0000-00-00 00:00:00', ''),
(46, 'PEOPLE''S REPUBLIC OF CHINA', 'ON', '0000-00-00 00:00:00', ''),
(47, 'CHRISTMAS ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(48, 'COCOS(KEELING) ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(49, 'COLOMBIA', 'ON', '0000-00-00 00:00:00', ''),
(50, 'COMOROS', 'ON', '0000-00-00 00:00:00', ''),
(51, 'CONGO(THE)', 'ON', '0000-00-00 00:00:00', ''),
(52, 'COOK ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(53, 'COSTA RICA', 'ON', '0000-00-00 00:00:00', ''),
(54, 'IVORY COAST', 'ON', '0000-00-00 00:00:00', ''),
(55, 'CROATIA', 'ON', '0000-00-00 00:00:00', ''),
(56, 'CUBA', 'ON', '0000-00-00 00:00:00', ''),
(57, 'CYPRUS', 'ON', '0000-00-00 00:00:00', ''),
(58, 'CZECH REPUBLIC', 'ON', '0000-00-00 00:00:00', ''),
(59, 'CZECHOSLOVAKIA', 'ON', '0000-00-00 00:00:00', ''),
(60, 'DENMARK', 'ON', '0000-00-00 00:00:00', ''),
(61, 'DJIBOUTI', 'ON', '0000-00-00 00:00:00', ''),
(62, 'DOMINICA', 'ON', '0000-00-00 00:00:00', ''),
(63, 'DOMINICAN REPUBLIC(THE)', 'ON', '0000-00-00 00:00:00', ''),
(64, 'DRONNING MAUD LAND', 'ON', '0000-00-00 00:00:00', ''),
(65, 'EAST TIMOR', 'ON', '0000-00-00 00:00:00', ''),
(66, 'ECUADOR', 'ON', '0000-00-00 00:00:00', ''),
(67, 'EGYPT', 'ON', '0000-00-00 00:00:00', ''),
(68, 'EL SALVADOR', 'ON', '0000-00-00 00:00:00', ''),
(69, 'EQUATORIAL GUINEA', 'ON', '0000-00-00 00:00:00', ''),
(70, 'ESTONIA', 'ON', '0000-00-00 00:00:00', ''),
(71, 'ETHIOPIA', 'ON', '0000-00-00 00:00:00', ''),
(72, 'FAEROE ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(73, 'FALKLAND ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(74, 'FIJI', 'ON', '0000-00-00 00:00:00', ''),
(75, 'FINLAND', 'ON', '0000-00-00 00:00:00', ''),
(76, 'FRANCE', 'ON', '0000-00-00 00:00:00', ''),
(77, 'FRENCH GUIANA', 'ON', '0000-00-00 00:00:00', ''),
(78, 'FRENCH POLYNESIA', 'ON', '0000-00-00 00:00:00', ''),
(79, 'FRENCH SOUTHERN AND ANTAR', 'ON', '0000-00-00 00:00:00', ''),
(80, 'GABON', 'ON', '0000-00-00 00:00:00', ''),
(81, 'GAMBIA (THE)', 'ON', '0000-00-00 00:00:00', ''),
(82, 'GEORGIA', 'ON', '0000-00-00 00:00:00', ''),
(83, 'GERMANY', 'ON', '0000-00-00 00:00:00', ''),
(84, 'GHANA', 'ON', '0000-00-00 00:00:00', ''),
(85, 'GIBRALTAR', 'ON', '0000-00-00 00:00:00', ''),
(86, 'GREECE', 'ON', '0000-00-00 00:00:00', ''),
(87, 'GREENLAND', 'ON', '0000-00-00 00:00:00', ''),
(88, 'GRENADA', 'ON', '0000-00-00 00:00:00', ''),
(89, 'GUADELOUPE', 'ON', '0000-00-00 00:00:00', ''),
(90, 'GUAM', 'ON', '0000-00-00 00:00:00', ''),
(91, 'GUATEMALA', 'ON', '0000-00-00 00:00:00', ''),
(92, 'GUINEA', 'ON', '0000-00-00 00:00:00', ''),
(93, 'GUINEA-BISSAU', 'ON', '0000-00-00 00:00:00', ''),
(94, 'GUYANA', 'ON', '0000-00-00 00:00:00', ''),
(95, 'HAITI', 'ON', '0000-00-00 00:00:00', ''),
(96, 'HEARD AND MCDONALD ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(97, 'HOLY SEE (THE)', 'ON', '0000-00-00 00:00:00', ''),
(98, 'HONDURAS', 'ON', '0000-00-00 00:00:00', ''),
(99, 'HONG KONG', 'ON', '0000-00-00 00:00:00', ''),
(100, 'HUNGARY', 'ON', '0000-00-00 00:00:00', ''),
(101, 'ICELAND', 'ON', '0000-00-00 00:00:00', ''),
(102, 'INDIA', 'ON', '0000-00-00 00:00:00', ''),
(103, 'INDONESIA', 'ON', '0000-00-00 00:00:00', ''),
(104, 'IRAN', 'ON', '0000-00-00 00:00:00', ''),
(105, 'IRAQ', 'ON', '0000-00-00 00:00:00', ''),
(106, 'IRELAND', 'ON', '0000-00-00 00:00:00', ''),
(107, 'ISRAEL', 'ON', '0000-00-00 00:00:00', ''),
(108, 'ITALY', 'ON', '0000-00-00 00:00:00', ''),
(109, 'JAMAICA', 'ON', '0000-00-00 00:00:00', ''),
(110, 'JAPAN', 'ON', '0000-00-00 00:00:00', ''),
(111, 'JOHNSTON ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(112, 'JORDAN', 'ON', '0000-00-00 00:00:00', ''),
(113, 'KAZAKHSTAN', 'ON', '0000-00-00 00:00:00', ''),
(114, 'KENYA', 'ON', '0000-00-00 00:00:00', ''),
(115, 'KIRIBATI', 'ON', '0000-00-00 00:00:00', ''),
(116, 'KOREA NORTH DEMOCRATIC(THE)', 'ON', '0000-00-00 00:00:00', ''),
(117, 'REPUBLIC OF KOREA', 'ON', '0000-00-00 00:00:00', ''),
(118, 'KUWAIT', 'ON', '0000-00-00 00:00:00', ''),
(119, 'KYRGYZSTAN', 'ON', '0000-00-00 00:00:00', ''),
(120, 'LAO P.D.R.', 'ON', '0000-00-00 00:00:00', ''),
(121, 'LATVIA', 'ON', '0000-00-00 00:00:00', ''),
(122, 'LEBANON', 'ON', '0000-00-00 00:00:00', ''),
(123, 'LESOTHO', 'ON', '0000-00-00 00:00:00', ''),
(124, 'LIBERIA', 'ON', '0000-00-00 00:00:00', ''),
(125, 'LIBYA  ARAB JAMAHIRIYA', 'ON', '0000-00-00 00:00:00', ''),
(126, 'LIECHTENSTEIN', 'ON', '0000-00-00 00:00:00', ''),
(127, 'LITHUANIA', 'ON', '0000-00-00 00:00:00', ''),
(128, 'LUXEMBOURG', 'ON', '0000-00-00 00:00:00', ''),
(129, 'MACAO', 'ON', '0000-00-00 00:00:00', ''),
(130, 'MADAGASCAR', 'ON', '0000-00-00 00:00:00', ''),
(131, 'MALAWI', 'ON', '0000-00-00 00:00:00', ''),
(132, 'MALAYSIA', 'ON', '0000-00-00 00:00:00', ''),
(133, 'MALDIVES', 'ON', '0000-00-00 00:00:00', ''),
(134, 'MALI', 'ON', '0000-00-00 00:00:00', ''),
(135, 'MALTA', 'ON', '0000-00-00 00:00:00', ''),
(136, 'MARTINIQUE', 'ON', '0000-00-00 00:00:00', ''),
(137, 'MAURITANIA', 'ON', '0000-00-00 00:00:00', ''),
(138, 'MAURITIUS', 'ON', '0000-00-00 00:00:00', ''),
(139, 'MEXICO', 'ON', '0000-00-00 00:00:00', ''),
(140, 'MIDMAY ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(141, 'MOLDOVA REPUBLIC', 'ON', '0000-00-00 00:00:00', ''),
(142, 'MONACO', 'ON', '0000-00-00 00:00:00', ''),
(143, 'MONGOLIA', 'ON', '0000-00-00 00:00:00', ''),
(144, 'MONTSERRAT', 'ON', '0000-00-00 00:00:00', ''),
(145, 'MOROCCO', 'ON', '0000-00-00 00:00:00', ''),
(146, 'MOZAMBIQUE', 'ON', '0000-00-00 00:00:00', ''),
(147, 'UNION OF MYANMAR', 'ON', '0000-00-00 00:00:00', ''),
(148, 'NAMIBIA', 'ON', '0000-00-00 00:00:00', ''),
(149, 'NAURU', 'ON', '0000-00-00 00:00:00', ''),
(150, 'NEPAL', 'ON', '0000-00-00 00:00:00', ''),
(151, 'NETHERLAND(THE)', 'ON', '0000-00-00 00:00:00', ''),
(152, 'NEUTRAL ZONE', 'ON', '0000-00-00 00:00:00', ''),
(153, 'NEW CALEDONIA', 'ON', '0000-00-00 00:00:00', ''),
(154, 'NEW ZEALAND', 'ON', '0000-00-00 00:00:00', ''),
(155, 'NICARAGUA', 'ON', '0000-00-00 00:00:00', ''),
(156, 'NIGER (THE)', 'ON', '0000-00-00 00:00:00', ''),
(157, 'NIGERIA', 'ON', '0000-00-00 00:00:00', ''),
(158, 'NIUE', 'ON', '0000-00-00 00:00:00', ''),
(159, 'NORFOLK ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(160, 'NORWAY', 'ON', '0000-00-00 00:00:00', ''),
(161, 'OMAN', 'ON', '0000-00-00 00:00:00', ''),
(162, 'PACIFIC ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(163, 'PAKISTAN', 'ON', '0000-00-00 00:00:00', ''),
(164, 'PALESTINE', 'ON', '0000-00-00 00:00:00', ''),
(165, 'PANAMA', 'ON', '0000-00-00 00:00:00', ''),
(166, 'PANAMA CANAL ZONE', 'ON', '0000-00-00 00:00:00', ''),
(167, 'PAPUA NEW GUINEA', 'ON', '0000-00-00 00:00:00', ''),
(168, 'PARAGUAY', 'ON', '0000-00-00 00:00:00', ''),
(169, 'PERU', 'ON', '0000-00-00 00:00:00', ''),
(170, 'PHILIPPINES', 'ON', '0000-00-00 00:00:00', ''),
(171, 'PITCAIRN ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(172, 'REPUBLIC OF POLAND', 'ON', '0000-00-00 00:00:00', ''),
(173, 'PORTUGAL', 'ON', '0000-00-00 00:00:00', ''),
(174, 'PUERTO RICO', 'ON', '0000-00-00 00:00:00', ''),
(175, 'QATAR', 'ON', '0000-00-00 00:00:00', ''),
(176, 'REUNION', 'ON', '0000-00-00 00:00:00', ''),
(177, 'ROMANIA', 'ON', '0000-00-00 00:00:00', ''),
(178, 'RUSSIAN FEDERATION', 'ON', '0000-00-00 00:00:00', ''),
(179, 'RWANDA', 'ON', '0000-00-00 00:00:00', ''),
(180, 'ST. HELENA', 'ON', '0000-00-00 00:00:00', ''),
(181, 'ST.CHRISTOPHER AND NEVIS', 'ON', '0000-00-00 00:00:00', ''),
(182, 'SAINT LUCIA', 'ON', '0000-00-00 00:00:00', ''),
(183, 'SAINT PIERRE AND MIQUELON', 'ON', '0000-00-00 00:00:00', ''),
(184, 'SAINT VINCENT AND GRENA.', 'ON', '0000-00-00 00:00:00', ''),
(185, 'SAMOAUNA', 'ON', '0000-00-00 00:00:00', ''),
(186, 'SAN MARINO', 'ON', '0000-00-00 00:00:00', ''),
(187, 'SAO TOME AND PRINCIPE', 'ON', '0000-00-00 00:00:00', ''),
(188, 'SAUDI ARABIA', 'ON', '0000-00-00 00:00:00', ''),
(189, 'SCOTLAND', 'ON', '0000-00-00 00:00:00', ''),
(190, 'SENEGAL', 'ON', '0000-00-00 00:00:00', ''),
(191, 'SEYCHELLES', 'ON', '0000-00-00 00:00:00', ''),
(192, 'SIERRA LEONE', 'ON', '0000-00-00 00:00:00', ''),
(193, 'SINGAPORE', 'ON', '0000-00-00 00:00:00', ''),
(194, 'SLOVAK REP.', 'ON', '0000-00-00 00:00:00', ''),
(195, 'SLOVENIA', 'ON', '0000-00-00 00:00:00', ''),
(196, 'SOLOMON ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(197, 'SOMALIA', 'ON', '0000-00-00 00:00:00', ''),
(198, 'REPUBLIC OF SOUTH AFRICA', 'ON', '0000-00-00 00:00:00', ''),
(199, 'SPAIN', 'ON', '0000-00-00 00:00:00', ''),
(200, 'SRI LANKA', 'ON', '0000-00-00 00:00:00', ''),
(201, 'SUDAN(THE)', 'ON', '0000-00-00 00:00:00', ''),
(202, 'SURINAME', 'ON', '0000-00-00 00:00:00', ''),
(203, 'SVALBARD AND JAN MAYEN IS', 'ON', '0000-00-00 00:00:00', ''),
(204, 'SWAZILAND', 'ON', '0000-00-00 00:00:00', ''),
(205, 'SWEDEN', 'ON', '0000-00-00 00:00:00', ''),
(206, 'SWITZERLAND', 'ON', '0000-00-00 00:00:00', ''),
(207, 'SYRIA ARAB REPUBLIC(THE)', 'ON', '0000-00-00 00:00:00', ''),
(208, 'TAHITI', 'ON', '0000-00-00 00:00:00', ''),
(209, 'TAIWAN', 'ON', '0000-00-00 00:00:00', ''),
(210, 'TAJIKISTAN', 'ON', '0000-00-00 00:00:00', ''),
(211, 'TANZANIA', 'ON', '0000-00-00 00:00:00', ''),
(212, 'THAILAND', 'ON', '0000-00-00 00:00:00', ''),
(213, 'TOGO', 'ON', '0000-00-00 00:00:00', ''),
(214, 'TOKELAU', 'ON', '0000-00-00 00:00:00', ''),
(215, 'TONGA', 'ON', '0000-00-00 00:00:00', ''),
(216, 'TRINIDAD', 'ON', '0000-00-00 00:00:00', ''),
(217, 'TRINIDAD.AND TOBAGO', 'ON', '0000-00-00 00:00:00', ''),
(218, 'TUNISIA', 'ON', '0000-00-00 00:00:00', ''),
(219, 'TURKEY', 'ON', '0000-00-00 00:00:00', ''),
(220, 'TURKMENISTAN', 'ON', '0000-00-00 00:00:00', ''),
(221, 'TURKS AND CAICOS ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(222, 'TUVALU', 'ON', '0000-00-00 00:00:00', ''),
(223, 'UNITED ARAB EMIRATES', 'ON', '0000-00-00 00:00:00', ''),
(224, 'UGANDA', 'ON', '0000-00-00 00:00:00', ''),
(225, 'UNITED KINGDOM', 'ON', '0000-00-00 00:00:00', ''),
(226, 'UKRAINE', 'ON', '0000-00-00 00:00:00', ''),
(228, 'UNITED STATES MISCELLANEO', 'ON', '0000-00-00 00:00:00', ''),
(229, 'UNITED STATES VIRGIN ISL.', 'ON', '0000-00-00 00:00:00', ''),
(230, 'URUGUAY', 'ON', '0000-00-00 00:00:00', ''),
(231, 'UNITED STATES OF AMERICA', 'ON', '0000-00-00 00:00:00', ''),
(232, 'UZBEKISTAN', 'ON', '0000-00-00 00:00:00', ''),
(233, 'U.S.S.R.', 'ON', '0000-00-00 00:00:00', ''),
(234, 'VANUATU', 'ON', '0000-00-00 00:00:00', ''),
(235, 'VENEZUELA', 'ON', '0000-00-00 00:00:00', ''),
(236, 'VIETNAM', 'ON', '0000-00-00 00:00:00', ''),
(237, 'WAKE ISLAND', 'ON', '0000-00-00 00:00:00', ''),
(238, 'WALLIS AND FUTUNA ISLANDS', 'ON', '0000-00-00 00:00:00', ''),
(239, 'WESTERN SAHARA', 'ON', '0000-00-00 00:00:00', ''),
(240, 'YEMEN', 'ON', '0000-00-00 00:00:00', ''),
(241, 'YUGOSLAVIA', 'ON', '0000-00-00 00:00:00', ''),
(242, 'ZAIRE', 'ON', '0000-00-00 00:00:00', ''),
(243, 'ZAMBIA', 'ON', '0000-00-00 00:00:00', ''),
(244, 'ZARAGOZA', 'ON', '0000-00-00 00:00:00', ''),
(245, 'ZIMBABWE', 'ON', '0000-00-00 00:00:00', ''),
(246, 'CRANLEIGH', 'ON', '0000-00-00 00:00:00', ''),
(247, 'MAYOTTE', 'ON', '0000-00-00 00:00:00', ''),
(248, 'BOSNIA-HERZEGOVINA', 'ON', '0000-00-00 00:00:00', ''),
(249, 'GUERNSEY', 'ON', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `ts_log`
--

CREATE TABLE `ts_log` (
  `LogID` int(11) NOT NULL COMMENT '?????????????????????',
  `LogName` varchar(50) DEFAULT NULL COMMENT '???????????????????',
  `LogDesc` varchar(100) DEFAULT NULL COMMENT '???????????????????????',
  `LogGroup` varchar(30) DEFAULT NULL COMMENT '???????????????????????',
  `LogType` varchar(30) DEFAULT NULL COMMENT '????????????????????????',
  `TableDID` int(11) DEFAULT NULL COMMENT '?????????????????(ts_Table_D)',
  `TableDName` varchar(50) DEFAULT NULL COMMENT '???????????????(ts_Table_D)',
  `TableHID` int(11) DEFAULT NULL COMMENT '?????????????????(ts_Table_D)',
  `TableHName` varchar(50) DEFAULT NULL COMMENT '???????????????(ts_Table_D)',
  `LogList` int(11) DEFAULT NULL COMMENT '???????????????????????????????',
  `LogStatus` varchar(30) DEFAULT NULL COMMENT '??????????????(LineStatus)',
  `LogUpdate` datetime DEFAULT NULL COMMENT '?????????????????????',
  `LogBy` varchar(30) DEFAULT NULL COMMENT '???????????(UserName)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Log Tracking Data of System';

-- --------------------------------------------------------

--
-- Structure for view `qr_checklogin`
--
DROP TABLE IF EXISTS `qr_checklogin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qr_checklogin`  AS  select `tm_user`.`userID` AS `userID`,`tm_user`.`username` AS `username`,`tm_user`.`password` AS `password`,`tm_user`.`useremail` AS `useremail`,`tm_user`.`userFname` AS `userFname`,`tm_user`.`userLname` AS `userLname`,`tm_user`.`status` AS `status`,`tm_user`.`usergroupID` AS `usergroupID`,`tm_user`.`imgProfile` AS `imgProfile` from `tm_user` where (`tm_user`.`status` = 'ON') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tc_menu_config`
--
ALTER TABLE `tc_menu_config`
  ADD PRIMARY KEY (`menuConfigID`,`userGroupID`,`menuID`);

--
-- Indexes for table `tm_menu`
--
ALTER TABLE `tm_menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`userID`,`username`),
  ADD KEY `idx_userID` (`userID`),
  ADD KEY `idx_email` (`useremail`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_password` (`password`),
  ADD KEY `idx_fullname` (`userFname`,`userMname`,`userLname`),
  ADD KEY `idx_country` (`countryID`);

--
-- Indexes for table `tm_usergroup`
--
ALTER TABLE `tm_usergroup`
  ADD PRIMARY KEY (`usergroupID`);

--
-- Indexes for table `ts_country`
--
ALTER TABLE `ts_country`
  ADD PRIMARY KEY (`countryID`,`countryName`);

--
-- Indexes for table `ts_log`
--
ALTER TABLE `ts_log`
  ADD PRIMARY KEY (`LogID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tc_menu_config`
--
ALTER TABLE `tc_menu_config`
  MODIFY `menuConfigID` int(11) NOT NULL AUTO_INCREMENT COMMENT '????????????????', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tm_menu`
--
ALTER TABLE `tm_menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT COMMENT '??????????????', AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tm_usergroup`
--
ALTER TABLE `tm_usergroup`
  MODIFY `usergroupID` int(11) NOT NULL AUTO_INCREMENT COMMENT '??????????????', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
