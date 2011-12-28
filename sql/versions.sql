-- Copyright (c) Settings (https://github.com/Mihapro/Settings) --
/*
Navicat MySQL Data Transfer

Source Server         : Miha-PC MySQL
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-12-24 12:06:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `versions`
-- ----------------------------
DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions` (
  `game` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `build` text,
  `date` datetime DEFAULT NULL,
  `accessed` int(11) DEFAULT '0',
  PRIMARY KEY (`game`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of versions
-- ----------------------------

INSERT INTO `versions` VALUES ('0', '1', '80027', '2011-12-28 00:00:00', '0');
INSERT INTO `versions` VALUES ('1', '1', '40463', '2011-12-24 00:00:00', '0');
INSERT INTO `versions` VALUES ('2', '1', 'v31852', '2011-12-24 00:00:00', '0');
INSERT INTO `versions` VALUES ('3', '1', 'v146514', '2011-12-28 00:00:00', '0');
INSERT INTO `versions` VALUES ('4', '1', '1340', '2011-12-24 00:00:00', '0');
INSERT INTO `versions` VALUES ('5', '1', 'v84768', '2011-12-24 00:00:00', '0');
INSERT INTO `versions` VALUES ('6', '1', '17433', '2011-12-24 00:00:00', '0');