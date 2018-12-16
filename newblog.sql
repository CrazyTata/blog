/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.53 : Database - new_blog
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`new_blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `bg_auth` */

CREATE TABLE `bg_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '权限名称',
  `module` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(60) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(60) NOT NULL DEFAULT '' COMMENT '方法',
  `is_btn` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否是按钮;1:不是(默认),2:是',
  `is_nav` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否是导航;1:不是(默认),2:是',
  `father_nav` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级导航;默认是一级导航,0',
  `is_delete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除，1:否(默认)',
  `order_list` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `acm` (`module`,`controller`,`action`),
  KEY `module` (`module`),
  KEY `controller` (`controller`),
  KEY `action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

/*Data for the table `bg_auth` */

/*Table structure for table `bg_group` */

CREATE TABLE `bg_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) NOT NULL DEFAULT '' COMMENT '分组组名',
  `auth_ids` text COMMENT '权限ID组',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_name` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户分组表';

/*Data for the table `bg_group` */

/*Table structure for table `bg_user` */

CREATE TABLE `bg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '账号名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `ip` varchar(32) NOT NULL DEFAULT '' COMMENT 'ip',
  `load_time` timestamp NULL DEFAULT NULL COMMENT '最近登录时间',
  `true_name` varchar(32) NOT NULL DEFAULT '' COMMENT '真实名',
  `telephone` bigint(20) unsigned DEFAULT NULL COMMENT '电话',
  `cate_id` smallint(5) unsigned DEFAULT NULL COMMENT '分组id',
  `user_group` varchar(32) NOT NULL DEFAULT '' COMMENT '用户分组',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  `pay_password` varchar(64) DEFAULT NULL COMMENT '查看订单密码',
  `pay_moblie` varchar(200) DEFAULT NULL COMMENT '支付验证的手机号码',
  `can_pay` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可以付款',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `bg_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
