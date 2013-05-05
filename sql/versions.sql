-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-05-05 01:04:53
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table web.versions
DROP TABLE IF EXISTS `versions`;
CREATE TABLE IF NOT EXISTS `versions` (
  `game` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `build` text,
  `date` datetime DEFAULT NULL,
  `accessed` int(11) DEFAULT '0',
  PRIMARY KEY (`game`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Dumping data for table web.versions: 7 rows
DELETE FROM `versions`;
/*!40000 ALTER TABLE `versions` DISABLE KEYS */;
INSERT INTO `versions` (`game`, `id`, `build`, `date`, `accessed`) VALUES
	(0, 0, '777869e', '2013-5-5 00:00:00', 0),
	(1, 0, '107784', '2013-5-5 00:00:00', 0),
	(2, 0, 'v33202', '2013-5-5 00:00:00', 0),
	(3, 0, 'v293294', '2013-5-5 00:00:00', 0),
	(4, 0, '1839', '2013-5-5 00:00:00', 0),
	(5, 0, 'v84768', '2013-5-5 00:00:00', 0),
	(6, 0, '58120', '2013-5-5 00:00:00', 0),
	(7, 0, '56179', '2013-5-5 00:00:00', 0);
/*!40000 ALTER TABLE `versions` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
