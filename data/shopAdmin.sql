CREATE DATABASE IF NOT EXISTS `shopAdmin`;
USE `shopAdmin`;
--管理员表
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`(
	`id`       tinyint unsigned NOT NULL AUTO_INCREMENT,--主键
	`username` varchar(20) NOT NULL UNIQUE,--管理员名称，唯一
	`password` varchar(32) NOT NULL, --管理员密码
	`email`    varchar(50) NOT NULL, --邮箱
	PRIMARY KEY(`id`)
)ENGINE = INNODB CHARSET = 'utf8';

--分类表
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`(
	`id`    smallint unsigned  NOT NULL AUTO_INCREMENT,--主键
	`cName` varchar(50) UNIQUE NOT NULL, --分类名称
	PRIMARY KEY(`id`)
)ENGINE = INNODB CHARSET = 'utf8';

--商品表
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`(
	`id`      smallint unsigned NOT NULL AUTO_INCREMENT,--主键
	`gName`   varchar(255)  NOT NULL, --商品名称
	`cId`     int unsigned  NOT NULL, --所属分类ID
	`gLabel`  varchar(50)   NOT NULL, --商品货号
	`gSum`    int unsigned  NOT NULL DEFAULT 0, --商品库存
	`mPrice`  decimal(10, 2)NOT NULL, --市场价
	`gPrice`  decimal(10, 2)NOT NULL, --网站价
	`gDesc`   mediumtext,             --商品简介
	`pubTime` int unsigned  NOT NULL, --商品上架时间
	`isShow`  tinyint(1) NOT NULL DEFAULT 1, --商品是否上架
	`isHot`   tinyint(1) NOT NULL DEFAULT 0, --商品是否热卖
	PRIMARY KEY(`id`)
)ENGINE = INNODB CHARSET = 'utf8';

--会员表
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
	`id`       int unsigned    NOT NULL AUTO_INCREMENT,
	`username` varchar(30) NOT NULL,
	`password` char(32)    NOT NULL,
	`sex`      enum("男", "女", "保密") NOT NULL DEFAULT "保密",
	`email`    varchar(60)  NOT NULL,
	`face`     varchar(50)  NOT NULL, --头像
	`regTime`  int unsigned NOT NULL, --注册时间
	`activeFlag` tinyint(1) NOT NULL DEFAULT 0, --是否激活
	PRIMARY KEY(`id`)
)ENGINE = INNODB CHARSET = 'utf8';

--相册表
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album`(
	`id` int unsigned  NOT NULL AUTO_INCREMENT,
	`cId` int unsigned NOT NULL, --对应的商品分类ID
	`albumPath` varchar(50) NOT NULL, --商品图片
	PRIMARY KEY(`id`)
)ENGINE = INNODB CHARSET = 'utf8';