/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - group_chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_application`;

/*Table structure for table `chat_message` */

DROP TABLE IF EXISTS `chat_message`;

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `message_time` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`chat_message_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chat_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat_message` */

insert  into `chat_message`(`chat_message_id`,`message`,`message_time`,`user_id`) values 
(1,'Hello','1681340152',1),
(2,'Hi','1681340172',2),
(3,'Hi Sana, How are you?','1681340372',4),
(4,'Hello guys!!','1681340485',4),
(5,'Hi','1681340504',3),
(6,'hi','1681340558',4),
(7,':)','1681340568',3),
(8,'Hi guys','1681340695',5),
(9,'hi','1681340711',4),
(10,'Bye :D','1681340742',5);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `is_online` int(11) NOT NULL DEFAULT 0,
  `log_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`last_name`,`email`,`password`,`profile_picture`,`is_online`,`log_time`) values 
(1,'Ali','Khan','ali@gmail.com','123','1.png',0,'1681340205'),
(2,'Talha','Shaikh','talha@gmail.com','123','4.png',0,'1681340214'),
(3,'Sana','Ali','sana@gmail.com','123','2.png',0,'1681340589'),
(4,'Dua','Shah','dua@gmail.com','123','3.png',0,'1681340755'),
(5,'Ahmed','Memon','ahmed@gmail.com','123','4.png',0,'1681340757');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
