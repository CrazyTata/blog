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

/*Table structure for table `bg_article` */

CREATE TABLE `bg_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text COMMENT '文章内容',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '最近修改时间',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类',
  `key_words` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `reply_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `image_id` int(11) DEFAULT NULL COMMENT '图片 id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='博客表';

/*Data for the table `bg_article` */

insert  into `bg_article`(`id`,`member_id`,`title`,`content`,`number`,`create_at`,`update_at`,`cate_id`,`key_words`,`reply_num`,`is_delete`,`sort`,`image_id`) values (1,1,'第一天','第一天很好',0,'2018-12-21 16:40:03','2018-12-21 16:40:05',1,'第一天',0,1,0,NULL);

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

/*Table structure for table `bg_category` */

CREATE TABLE `bg_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1前段显示   2不显示',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `img` varchar(255) DEFAULT NULL COMMENT '分类图标',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `is_del` tinyint(1) DEFAULT '1' COMMENT '1正常  2已删除',
  `description` text COMMENT '描述',
  PRIMARY KEY (`id`),
  KEY `pid` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='分类表';

/*Data for the table `bg_category` */

insert  into `bg_category`(`id`,`name`,`is_show`,`sort`,`img`,`parent_id`,`is_del`,`description`) values (1,'php',1,1,NULL,0,1,'php是世界上最好的语言'),(2,'mysql',1,0,NULL,0,1,'一个很好用的数据库'),(3,'linux',1,0,NULL,0,1,NULL),(4,'框架',1,0,NULL,0,1,NULL),(5,'前端',1,0,NULL,0,2,NULL),(6,'laravel',1,0,NULL,0,1,NULL),(7,'笔记',1,3,NULL,0,1,'notebook'),(8,'音乐',1,5,NULL,0,1,'听听音乐');

/*Table structure for table `bg_comment` */

CREATE TABLE `bg_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text COMMENT '评论内容',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '最近修改时间',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类',
  `key_words` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `reply_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

/*Data for the table `bg_comment` */

/*Table structure for table `bg_friend` */

CREATE TABLE `bg_friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '友情链接名',
  `link` text COMMENT '外链',
  `types` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1：友情链接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `create_user` varchar(32) NOT NULL DEFAULT '' COMMENT '评论人',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1否，2是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接表';

/*Data for the table `bg_friend` */

/*Table structure for table `bg_group` */

CREATE TABLE `bg_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) NOT NULL DEFAULT '' COMMENT '分组组名',
  `auth_ids` text COMMENT '权限ID组',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除：1否，2是',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_name` (`group_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户分组表';

/*Data for the table `bg_group` */

insert  into `bg_group`(`id`,`group_name`,`auth_ids`,`is_delete`) values (1,'超级管理员',NULL,1),(2,'人事部',NULL,1),(3,'技术部',NULL,1),(4,'采购部',NULL,1);

/*Table structure for table `bg_images` */

CREATE TABLE `bg_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(5000) DEFAULT NULL COMMENT '原图',
  `m_url` varchar(5000) DEFAULT NULL COMMENT '中图',
  `l_url` varchar(5000) DEFAULT NULL COMMENT '小图',
  `desc` varchar(5000) DEFAULT NULL COMMENT '图片描述',
  `types` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0为banner',
  `is_delete` tinyint(1) DEFAULT '1' COMMENT '1正常  2已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片表';

/*Data for the table `bg_images` */

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
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `bg_user` */

insert  into `bg_user`(`id`,`name`,`password`,`ip`,`load_time`,`true_name`,`telephone`,`cate_id`,`user_group`,`is_delete`,`pay_password`,`pay_moblie`,`can_pay`,`create_at`) values (1,'tata','d0fa9ead4ba8f67b80f82334a4beb090','127.0.0.1','2018-12-21 10:51:18','tata',18913533664,0,'1',1,NULL,NULL,0,'2018-12-11 15:19:26'),(2,'zif','d0fa9ead4ba8f67b80f82334a4beb090','','2018-12-18 16:26:59','zif',18688700750,NULL,'1',2,NULL,NULL,0,'2018-12-05 16:27:09'),(3,'王五','123456','',NULL,'',123456,NULL,'2',1,NULL,NULL,0,'2018-12-19 16:30:20'),(4,'周六','14e1b600b1fd579f47433b88e8d85291','',NULL,'周六',12345678977,NULL,'4',1,NULL,NULL,0,'2018-12-19 16:28:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
