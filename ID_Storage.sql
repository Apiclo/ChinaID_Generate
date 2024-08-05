/*
 SQLyog Ultimate v13.1.1 (64 bit)
 MySQL - 5.5.53 : Database - test
 *********************************************************************
 */
/*!40101 SET NAMES utf8 */
;
/*!40101 SET SQL_MODE=''*/
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
CREATE DATABASE
/*!32312 IF NOT EXISTS*/
`test`
/*!40100 DEFAULT CHARACTER SET utf8 */
;
USE `test`;
/*Table structure for table `ids` */
DROP TABLE IF EXISTS `ids`;
CREATE TABLE `ids` (
  `id` varchar(18) NOT NULL,
  `area` varchar(20) NOT NULL,
  `birthyear` varchar(16) NOT NULL,
  `birthmonth` varchar(8) NOT NULL,
  `birthday` varchar(8) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `gentime` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8;
/*Data for the table `ids` */
insert into `ids`(
    `id`,
    `area`,
    `birthyear`,
    `birthmonth`,
    `birthday`,
    `gender`,
    `gentime`
  )
values (
    '310000199909052464',
    '上海市',
    '1999',
    '09',
    '05',
    'female',
    '1623315109'
  ),
  /*Table structure for table `test` */
  DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `name` varchar(30) NOT NULL,
  `height` int(60) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8;
/*Data for the table `test` */
insert into `test`(`name`, `height`)
values ('李皇', 178),
  ('陈陶', 175),
  ('阿奋', 176),
  ('拉苏', 185);
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;