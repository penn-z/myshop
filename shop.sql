-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `think_address`
--

DROP TABLE IF EXISTS `think_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `receiver` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人',
  `rece_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '省份地址',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '城市地址',
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '区镇地址',
  `post_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '后置地址',
  `is_default` int(1) NOT NULL COMMENT '是否默认',
  `addtime` int(13) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_address`
--

LOCK TABLES `think_address` WRITE;
/*!40000 ALTER TABLE `think_address` DISABLE KEYS */;
INSERT INTO `think_address` VALUES (10,4,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',1,1475047649),(15,4,'liujing  ','12345678901','广东省','深圳市','南山区','大新xx街道xx坊xx号',0,1475062529),(17,4,'爱萝莉真是太好了 ','12345678901','福建省','福州市','仓山区','鸟不拉屎的地方～～～～',0,1475079413),(33,4,'山治','13333333333','香港特别行政区','深水埗区','','暂时不知道在哪里~~!- -',0,1476344863),(36,4,'皮城女警       ','13422222222','上海市','上海市市辖区','静安区','皮城戒备19区',0,1476347685);
/*!40000 ALTER TABLE `think_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_admin`
--

DROP TABLE IF EXISTS `think_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员账户',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员密码',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员名称',
  `power` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员权限',
  `addtime` int(13) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_admin`
--

LOCK TABLES `think_admin` WRITE;
/*!40000 ALTER TABLE `think_admin` DISABLE KEYS */;
INSERT INTO `think_admin` VALUES (1,'penn','e10adc3949ba59abbe56e057f20f883e','鹏','',1475205518),(2,'admin','e10adc3949ba59abbe56e057f20f883e','鹏','',1475205518);
/*!40000 ALTER TABLE `think_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_attr`
--

DROP TABLE IF EXISTS `think_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_attr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `goods_sn` int(20) NOT NULL COMMENT '商品序列号',
  `word_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '文字描述',
  `picture_description` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT '图片描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_attr`
--

LOCK TABLES `think_attr` WRITE;
/*!40000 ALTER TABLE `think_attr` DISABLE KEYS */;
INSERT INTO `think_attr` VALUES (1,7,1000001,'',' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/Public/images/tw1.jpg\"/><img src=\"/Public/images/tw2.jpg\"/><img src=\"/Public/images/tw3.jpg\"/><img src=\"/Public/images/tw4.jpg\"/><img src=\"/Public/images/tw5.jpg\"/><img src=\"/Public/images/tw6.jpg\"/><img src=\"/Public/images/tw7.jpg\"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'),(2,8,1000011,'','<p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img height=\"38\" src=\"https://img.alicdn.com/imgextra/i4/725677994/TB29lOvcXXXXXbGXXXXXXXXXXXX_!!725677994.jpg\" width=\"740\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><span style=\"margin: 0px; padding: 0px; line-height: 1.5;\">&nbsp;</span></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i4/725677994/TB2UYg1gFXXXXbjXXXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2p1I_gFXXXXXDXXXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2hfZFgFXXXXa4XpXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2DLU8gFXXXXXUXXXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2pxA5gFXXXXawXXXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2AkEBgFXXXXccXpXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i4/725677994/TB258QDgFXXXXbXXpXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2tIQCgFXXXXblXpXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2Wgo7gFXXXXaaXXXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2kXQBgFXXXXcFXpXXXXXXXXXX_!!725677994.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;\"/></p>'),(3,19,101,'','<p>测试～～～～</p>'),(4,19,102,'','<p>测试～～～～</p>'),(5,20,1010,'','<table width=\"790\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 768px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px;\" class=\"firstRow\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB2Sv0TqpXXXXXUXXXXXXXXXXXX_!!2057428013.jpg\" width=\"790\" alt=\"\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2n7bhqFXXXXb_XXXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2RneRqFXXXXciXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map2\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/><map name=\"Map2\" style=\"margin: 0px; padding: 0px;\"><area coords=\"525,11,757,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=45708439078\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,11,510,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531608164782\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"33,11,270,300\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531380891957\" style=\"margin: 0px; padding: 0px;\"/></map></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2Mve_qFXXXXamXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map3\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr></tbody></table><p><map name=\"Map\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"31,10,271,305\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42460864727\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"283,10,507,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42294531486\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"524,10,752,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=520114629178\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map2\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"283,10,520,299\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,10,271,299\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map3\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"523,9,758,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531502031489\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,9,513,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531458709460\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,9,269,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531459149111\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"https://img.alicdn.com/imgextra/i4/2057428013/TB20JpfgpXXXXXmXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none; line-height: 1.5;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i3/2057428013/TB2QWMTgXXXXXa1XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB29UM8gXXXXXbZXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB26wIWgXXXXXX4XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p>&nbsp;</p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB2KblhgpXXXXXsXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><br/></p>'),(6,20,1011,'','<table width=\"790\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 768px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px;\" class=\"firstRow\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB2Sv0TqpXXXXXUXXXXXXXXXXXX_!!2057428013.jpg\" width=\"790\" alt=\"\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2n7bhqFXXXXb_XXXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2RneRqFXXXXciXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map2\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/><map name=\"Map2\" style=\"margin: 0px; padding: 0px;\"><area coords=\"525,11,757,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=45708439078\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,11,510,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531608164782\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"33,11,270,300\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531380891957\" style=\"margin: 0px; padding: 0px;\"/></map></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2Mve_qFXXXXamXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map3\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr></tbody></table><p><map name=\"Map\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"31,10,271,305\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42460864727\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"283,10,507,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42294531486\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"524,10,752,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=520114629178\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map2\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"283,10,520,299\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,10,271,299\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map3\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"523,9,758,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531502031489\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,9,513,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531458709460\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,9,269,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531459149111\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"https://img.alicdn.com/imgextra/i4/2057428013/TB20JpfgpXXXXXmXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none; line-height: 1.5;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i3/2057428013/TB2QWMTgXXXXXa1XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB29UM8gXXXXXbZXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB26wIWgXXXXXX4XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p>&nbsp;</p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB2KblhgpXXXXXsXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><br/></p>'),(7,20,1012,'','<table width=\"790\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 768px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr style=\"margin: 0px; padding: 0px;\" class=\"firstRow\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB2Sv0TqpXXXXXUXXXXXXXXXXXX_!!2057428013.jpg\" width=\"790\" alt=\"\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2n7bhqFXXXXb_XXXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i2/725677994/TB2RneRqFXXXXciXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map2\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/><map name=\"Map2\" style=\"margin: 0px; padding: 0px;\"><area coords=\"525,11,757,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=45708439078\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,11,510,299\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531608164782\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"33,11,270,300\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531380891957\" style=\"margin: 0px; padding: 0px;\"/></map></td></tr><tr style=\"margin: 0px; padding: 0px;\"><td style=\"margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);\"><img src=\"https://img.alicdn.com/imgextra/i1/725677994/TB2Mve_qFXXXXamXpXXXXXXXXXX_!!725677994.jpg\" alt=\"\" width=\"790\" border=\"0\" usemap=\"#Map3\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1;\"/></td></tr></tbody></table><p><map name=\"Map\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"31,10,271,305\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42460864727\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"283,10,507,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=42294531486\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"524,10,752,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=520114629178\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map2\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"283,10,520,299\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,10,271,299\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span><map name=\"Map3\" style=\"margin: 0px; padding: 0px; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><area coords=\"523,9,758,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531502031489\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"278,9,513,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531458709460\" style=\"margin: 0px; padding: 0px;\"/><area coords=\"34,9,269,306\" href=\"https://chaoshi.detail.tmall.com/item.htm?id=531459149111\" style=\"margin: 0px; padding: 0px;\"/></map><span style=\"color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"></span></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"https://img.alicdn.com/imgextra/i4/2057428013/TB20JpfgpXXXXXmXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none; line-height: 1.5;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i3/2057428013/TB2QWMTgXXXXXa1XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i2/2057428013/TB29UM8gXXXXXbZXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB26wIWgXXXXXX4XpXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p>&nbsp;</p><p><img src=\"https://img.alicdn.com/imgextra/i1/2057428013/TB2KblhgpXXXXXsXXXXXXXXXXXX_!!2057428013.jpg\" class=\"img-ks-lazyload\" style=\"margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top;\"/></p><p><br/></p>'),(8,21,1,'','<p>真的没有什么可以描述的啊～！！！～</p>'),(9,21,2,'','<p>真的没有什么可以描述的啊～！！！～</p>'),(10,22,1,'','<p>真的没有什么可以描述的啊～！！！～</p>'),(11,22,2,'','<p>真的没有什么可以描述的啊～！！！～</p>'),(12,23,200000101,'','<p>苹果啥的手机是什么呢～～～～～！～！！！~<br/></p>'),(13,23,200000102,'','<p>苹果啥的手机是什么呢～～～～～！～！！！~<br/></p>'),(19,27,200000201,'','<p>先不描述。</p>'),(20,27,200000202,'','<p>先不描述。</p>'),(21,27,200000203,'','<p>先不描述。</p>');
/*!40000 ALTER TABLE `think_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_eveumalte`
--

DROP TABLE IF EXISTS `think_eveumalte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_eveumalte` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `good_nums` int(8) NOT NULL COMMENT '好评数量',
  `common_nums` int(8) NOT NULL COMMENT '中评数量',
  `bad_nums` int(8) NOT NULL COMMENT '差评数量',
  `good_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '好评描述',
  `common_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '中评描述',
  `bad_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '差评描述',
  `good_addtime` int(13) NOT NULL COMMENT '好评时间',
  `common_addtime` int(13) NOT NULL COMMENT '中评时间',
  `bad_addtime` int(13) NOT NULL COMMENT '差评时间',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_eveumalte`
--

LOCK TABLES `think_eveumalte` WRITE;
/*!40000 ALTER TABLE `think_eveumalte` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_eveumalte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_goods`
--

DROP TABLE IF EXISTS `think_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `goods_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_sn` int(32) DEFAULT NULL COMMENT '商品序列号',
  `goods_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '种类(口味、颜色之类)',
  `goods_type2` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格2(尺寸、大小、包装等)',
  `goods_package` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '包装',
  `goods_brief` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品简介',
  `category_id` int(11) NOT NULL COMMENT '范畴ID',
  `goods_nums` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品库存',
  `month_sales` int(8) NOT NULL COMMENT '月销量',
  `cumulative_sales` int(8) NOT NULL COMMENT '累计销量',
  `goods_evaluation` int(8) NOT NULL COMMENT '评价数目',
  `goods_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `goods_source` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品来源名',
  `addtime` int(13) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_goods`
--

LOCK TABLES `think_goods` WRITE;
/*!40000 ALTER TABLE `think_goods` DISABLE KEYS */;
INSERT INTO `think_goods` VALUES (7,'良品铺子 手剥松子218g 坚果炒货 巴西松子',1000001,'口味','包装','a:3:{i:0;s:15:\"手袋单人份\";i:1;s:15:\"礼盒双人份\";i:2;s:15:\"全家福礼包\";}','',7,'1000',1015,6015,640,' &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;img src=&quot;/Public/images/tw1.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw2.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw3.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw4.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw5.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw6.jpg&quot;/&gt;&lt;img src=&quot;/Public/images/tw7.jpg&quot;/&gt; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;','',1475897100),(8,'三只松鼠 炭烧腰果185g坚果零食特产干果碳烧腰果仁',1000011,'a:3:{i:0;s:3:\"111\";i:1;s:3:\"222\";i:2;s:3:\"333\";}','','a:2:{i:0;s:7:\"d大调\";i:1;s:5:\"qq群\";}','',7,'7367',6666,201112,155775,'&lt;p style=&quot;margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img height=&quot;38&quot; src=&quot;https://img.alicdn.com/imgextra/i4/725677994/TB29lOvcXXXXXbGXXXXXXXXXXXX_!!725677994.jpg&quot; width=&quot;740&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;span style=&quot;margin: 0px; padding: 0px; line-height: 1.5;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i4/725677994/TB2UYg1gFXXXXbjXXXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i2/725677994/TB2p1I_gFXXXXXDXXXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i1/725677994/TB2hfZFgFXXXXa4XpXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i2/725677994/TB2DLU8gFXXXXXUXXXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i1/725677994/TB2pxA5gFXXXXawXXXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i2/725677994/TB2AkEBgFXXXXccXpXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i4/725677994/TB258QDgFXXXXbXXpXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i1/725677994/TB2tIQCgFXXXXblXpXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i2/725677994/TB2Wgo7gFXXXXaaXXXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px; line-height: 1.4; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://img.alicdn.com/imgextra/i2/725677994/TB2kXQBgFXXXXcFXpXXXXXXXXXX_!!725677994.jpg&quot; class=&quot;img-ks-lazyload&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; float: none;&quot;/&gt;&lt;/p&gt;','',1475897400),(19,'测试002',0,'','','','',7,'',1000,6666,7777,'<p>测试～～～～</p>','',1476023099),(20,'测试006',0,'口味','包装','a:3:{i:0;s:6:\"单人\";i:1;s:6:\"双人\";i:2;s:9:\"全家桶\";}','',8,'',6666,6666,6666,' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/Public/images/tw1.jpg\"/><img src=\"/Public/images/tw2.jpg\"/><img src=\"/Public/images/tw3.jpg\"/><img src=\"/Public/images/tw4.jpg\"/><img src=\"/Public/images/tw5.jpg\"/><img src=\"/Public/images/tw6.jpg\"/><img src=\"/Public/images/tw7.jpg\"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;','',1476026162),(23,'iphone8',NULL,'颜色','尺寸','','美国品牌，富士康代工生产',8,'',1010,6015,640,'&lt;p&gt;暂时没什么可以描述的～～～！&lt;/p&gt;','Apple Corporation',1476956032),(27,'字幕组',NULL,'剧种','剧型','','没有简介，每个剧不同。',1,'',5000,15000,12000,'&lt;p&gt;先不描述。&lt;/p&gt;','各国',1477199453);
/*!40000 ALTER TABLE `think_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_goods_category`
--

DROP TABLE IF EXISTS `think_goods_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_goods_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'category_id',
  `category` varchar(16) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品范畴',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_goods_category`
--

LOCK TABLES `think_goods_category` WRITE;
/*!40000 ALTER TABLE `think_goods_category` DISABLE KEYS */;
INSERT INTO `think_goods_category` VALUES (1,'点心'),(2,'蛋糕'),(3,'饼干'),(4,'膨化'),(5,'素食'),(6,'卤味'),(7,'坚果'),(8,'炒货');
/*!40000 ALTER TABLE `think_goods_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_goods_specify`
--

DROP TABLE IF EXISTS `think_goods_specify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_goods_specify` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `goods_sn` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '此规格序列号',
  `goods_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品规格',
  `goods_price` float(8,2) DEFAULT NULL COMMENT '原价钱',
  `goods_discount` float(8,2) DEFAULT NULL COMMENT '折扣价',
  `goods_num` int(10) DEFAULT NULL COMMENT '库存数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_goods_specify`
--

LOCK TABLES `think_goods_specify` WRITE;
/*!40000 ALTER TABLE `think_goods_specify` DISABLE KEYS */;
INSERT INTO `think_goods_specify` VALUES (1,19,'101','原味',100.00,1000.00,5000),(2,19,'102','奶油',99.00,999.00,4999),(3,20,'1010','大号',78.00,66.00,66660),(4,20,'1011','中号',76.00,55.00,77773),(5,20,'1012','小号',80.00,45.00,88883),(6,7,'1000001','原味',98.00,56.90,250),(7,7,'1000002','奶油',99.00,54.50,248),(8,7,'1000003','炭烧',100.00,60.50,248),(9,7,'1000004','咸香',96.00,57.50,246),(14,23,'200000101','黑色',6000.10,5800.00,199),(28,23,'200000102','黄色',5900.00,5888.00,120),(27,23,'200000103','金色',5777.00,5700.00,145),(25,23,'200000104','粉色',5666.00,5555.00,140),(29,23,'200000105','绿色',5700.00,5666.00,200),(37,27,'200000203','日剧',3000.00,2000.00,1000),(36,27,'200000202','英剧',4000.00,3000.00,900),(35,27,'200000201','美剧',5000.00,4000.00,799);
/*!40000 ALTER TABLE `think_goods_specify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_goods_type2`
--

DROP TABLE IF EXISTS `think_goods_type2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_goods_type2` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `goods_id` int(8) NOT NULL COMMENT '商品id',
  `type2_name` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格类型2的子类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_goods_type2`
--

LOCK TABLES `think_goods_type2` WRITE;
/*!40000 ALTER TABLE `think_goods_type2` DISABLE KEYS */;
INSERT INTO `think_goods_type2` VALUES (18,23,'6.0寸'),(6,7,'手袋单人份'),(8,7,'礼盒双人份'),(9,7,'全家福礼包'),(10,20,'单人'),(11,20,'双人'),(12,20,'全家桶'),(19,23,'5.5寸'),(20,23,'4.7寸'),(28,27,'悬疑'),(27,27,'爱情'),(30,27,'灾难'),(31,27,'战争');
/*!40000 ALTER TABLE `think_goods_type2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_order`
--

DROP TABLE IF EXISTS `think_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `order_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT '用户留言',
  `total_money` float(8,2) NOT NULL COMMENT '合计（含运费）',
  `express_style` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '快递',
  `express_fee` float(8,2) NOT NULL COMMENT '快递费用',
  `receiver` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '收件人',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '联系电话',
  `province` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '省份',
  `city` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '城市',
  `district` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '区域',
  `street` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '详细地址',
  `status` int(2) NOT NULL COMMENT '订单状态(0待付款，1待发货，2待收货，3待评价，4已评价，9为取消订单）',
  `addtime` int(11) NOT NULL COMMENT '生成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_order`
--

LOCK TABLES `think_order` WRITE;
/*!40000 ALTER TABLE `think_order` DISABLE KEYS */;
INSERT INTO `think_order` VALUES (25,'147675667400041619',4,'又要留言，～要不是为了测试，我才不写留言呢～～！',833.00,'申通',10.00,'山治 ','13333333333','香港特别行政区','深水埗区','','暂时不知道在哪里~~!- -',1,1476756674),(24,'147675661700047651',4,'只是买个果子而已，不算什么的～～！～',152.00,'顺丰',20.00,'liujing ','2147483647','广东省','深圳市','南山区','大新xx街道xx坊xx号',1,1476756617),(28,'147677373800044612',4,'留言个球捏～！～',679.00,'顺丰',20.00,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',2,1476773738),(23,'147675658400046624',4,'无留言～～～～～～～！！！！！！！！！我真的不知道写些什么好',309.00,'韵达',12.00,'皮城女警       ','13422222222','天津市','天津市市辖区','西青区','皮城戒备19区',2,1476756584),(22,'147675653100047323',4,'',265.00,'顺丰',20.00,'爱萝莉真是太好了 ','12345678901','福建省','福州市','鼓楼区','鸟不拉屎的地方～～～～',3,1476756531),(21,'147670340800040188',4,'忘记留言了～！～',110.00,'圆通',10.00,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',4,1476703408),(29,'147677946000042462',4,'忘记设置支付方式了，下次补上吧～！',380.50,'韵达',12.00,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',0,1476779460),(30,'147686834100044939',4,'又是留言，留，留，留～～～！',208.00,'圆通',10.00,'山治 ','13333333333','香港特别行政区','深水埗区','','暂时不知道在哪里~~!- -',1,1476868341),(31,'147723015800046984',4,'',64.50,'圆通',10.00,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',0,1477230158),(32,'147727269300042380',4,'',4010.00,'圆通',10.00,'penn','15818263192','广东省','东莞市','松山湖','大学路1号东莞理工学院7栋宿舍',0,1477272693);
/*!40000 ALTER TABLE `think_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_order_detail`
--

DROP TABLE IF EXISTS `think_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `order_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单号',
  `goods_id` int(16) NOT NULL COMMENT '商品id',
  `goods_sn` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品序列号',
  `goods_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_type1` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格1名称',
  `goods_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品规格（口味、尺寸、颜色等）',
  `goods_type2` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格2名称',
  `goods_package` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '包装',
  `goods_price` float(8,2) NOT NULL COMMENT '单价',
  `goods_num` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT '购买数量',
  `goods_thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '缩略图地址',
  `addtime` int(11) NOT NULL COMMENT '生成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_order_detail`
--

LOCK TABLES `think_order_detail` WRITE;
/*!40000 ALTER TABLE `think_order_detail` DISABLE KEYS */;
INSERT INTO `think_order_detail` VALUES (9,'147670340800040188',20,'1012','测试006','尺寸','小号','包装','双人',45.00,'1','/Public/Uploads/goods/sn1012/001_mid.jpg',1476703408),(10,'147675653100047323',20,'1011','测试006','尺寸','中号','包装','全家桶',55.00,'2','/Public/Uploads/goods/sn1011/001_mid.jpg',1476756531),(8,'147670340800040188',20,'1011','测试006','尺寸','中号','包装','全家桶',55.00,'1','/Public/Uploads/goods/sn1011/001_mid.jpg',1476703408),(11,'147675653100047323',20,'1012','测试006','尺寸','小号','包装','双人',45.00,'3','/Public/Uploads/goods/sn1012/001_mid.jpg',1476756531),(12,'147675658400046624',7,'1000003','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','炭烧','包装','全家福礼包',60.50,'4','/Public/Uploads/goods/sn1000003/01_mid.jpg',1476756584),(13,'147675658400046624',20,'1011','测试006','尺寸','中号','包装','单人',55.00,'1','/Public/Uploads/goods/sn1011/001_mid.jpg',1476756584),(14,'147675661700047651',20,'1010','测试006','尺寸','大号','包装','单人',66.00,'2','/Public/Uploads/goods/sn1010/001_mid.jpg',1476756617),(15,'147675667400041619',7,'1000003','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','炭烧','包装','礼盒双人份',60.50,'10','/Public/Uploads/goods/sn1000003/01_mid.jpg',1476756674),(16,'147675667400041619',7,'1000002','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','奶油','包装','手袋单人份',54.50,'4','/Public/Uploads/goods/sn1000002/01_mid.jpg',1476756674),(17,'147677373800044612',20,'1011','测试006','尺寸','中号','包装','全家桶',55.00,'10','/Public/Uploads/goods/sn1011/001_mid.jpg',1476773738),(18,'147677373800044612',7,'1000002','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','奶油','包装','全家福礼包',54.50,'2','/Public/Uploads/goods/sn1000002/01_mid.jpg',1476773738),(19,'147677946000042462',7,'1000003','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','炭烧','包装','手袋单人份',60.50,'5','/Public/Uploads/goods/sn1000003/01_mid.jpg',1476779460),(20,'147677946000042462',20,'1010','测试006','尺寸','大号','包装','单人',66.00,'1','/Public/Uploads/goods/sn1010/001_mid.jpg',1476779460),(21,'147686834100044939',20,'1010','测试006','尺寸','大号','包装','单人',66.00,'3','/Public/Uploads/goods/sn1010/001_mid.jpg',1476868341),(22,'147723015800046984',7,'1000002','良品铺子 手剥松子218g 坚果炒货 巴西松子','口味','奶油','包装','手袋单人份',54.50,'1','/Public/Uploads/goods/sn1000002/01_mid.jpg',1477230158),(23,'147727269300042380',27,'200000201','字幕组','剧种','美剧','剧型','悬疑',4000.00,'1','/Public/Uploads/goods/sn200000201/West world_mid.jpg',1477272693);
/*!40000 ALTER TABLE `think_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_question`
--

DROP TABLE IF EXISTS `think_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `user_id` int(11) NOT NULL COMMENT '账户ID',
  `answer_1` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '问题1答案',
  `question_1` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '问题1',
  `answer_2` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '问题2答案',
  `question_2` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '问题2',
  `addtime` int(13) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_question`
--

LOCK TABLES `think_question` WRITE;
/*!40000 ALTER TABLE `think_question` DISABLE KEYS */;
INSERT INTO `think_question` VALUES (21,4,'梅州','您的故乡在哪里？','蓝色','您最喜欢的颜色是什么？',1475135509);
/*!40000 ALTER TABLE `think_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_shopcart`
--

DROP TABLE IF EXISTS `think_shopcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_shopcart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车商品主键',
  `user_id` int(8) DEFAULT NULL COMMENT '用户ID',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `goods_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_sn` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品序列号',
  `goods_type1` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格1名称',
  `goods_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品规格',
  `goods_type2` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '规格2名称',
  `goods_package` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品包装',
  `goods_num` int(8) NOT NULL COMMENT '此规格数量',
  `goods_cost` float(8,2) NOT NULL COMMENT '单件费用',
  `is_order` int(1) NOT NULL COMMENT '是否在订单(0否,1是)',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`cart_id`),
  KEY `goods_cost` (`goods_cost`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_shopcart`
--

LOCK TABLES `think_shopcart` WRITE;
/*!40000 ALTER TABLE `think_shopcart` DISABLE KEYS */;
INSERT INTO `think_shopcart` VALUES (108,4,7,'良品铺子 手剥松子218g 坚果炒货 巴西松子','1000003','口味','炭烧','包装','手袋单人份',1,60.50,0,1477229024),(106,4,7,'良品铺子 手剥松子218g 坚果炒货 巴西松子','1000001','口味','原味','包装','手袋单人份',1,56.90,0,1477229018);
/*!40000 ALTER TABLE `think_shopcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_temporary_order`
--

DROP TABLE IF EXISTS `think_temporary_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_temporary_order` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '临时订单id',
  `user_id` int(8) NOT NULL COMMENT '用户id',
  `cart_id` int(8) NOT NULL COMMENT '购物车商品id',
  `addtime` int(11) NOT NULL COMMENT '生成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_temporary_order`
--

LOCK TABLES `think_temporary_order` WRITE;
/*!40000 ALTER TABLE `think_temporary_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `think_temporary_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_thumb`
--

DROP TABLE IF EXISTS `think_thumb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_thumb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '缩略图相册id',
  `goods_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `big` text COLLATE utf8_unicode_ci NOT NULL COMMENT '大图(800*800)',
  `mid` text COLLATE utf8_unicode_ci NOT NULL COMMENT '中图(350*350)',
  `small` text COLLATE utf8_unicode_ci NOT NULL COMMENT '小图(60*60)',
  `goods_sn` int(20) NOT NULL COMMENT '商品序列号',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `addtime` int(13) NOT NULL COMMENT '相册添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_thumb`
--

LOCK TABLES `think_thumb` WRITE;
/*!40000 ALTER TABLE `think_thumb` DISABLE KEYS */;
INSERT INTO `think_thumb` VALUES (3,'良品铺子 手剥松子218g 坚果炒货 巴西松子','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000001/01_big.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000001/02_big.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000001/03_big.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000001/01_mid.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000001/02_mid.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000001/03_mid.jpg\";}','a:3:{i:0;s:44:\"/Public/Uploads/goods/sn1000001/01_small.jpg\";i:1;s:44:\"/Public/Uploads/goods/sn1000001/02_small.jpg\";i:2;s:44:\"/Public/Uploads/goods/sn1000001/03_small.jpg\";}',1000001,7,1475633329),(8,'三只松鼠 炭烧腰果185g坚果零食特产干果碳烧腰果仁','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn1000011/001_big.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn1000011/002_big.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn1000011/003_big.jpg\";}','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn1000011/001_mid.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn1000011/002_mid.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn1000011/003_mid.jpg\";}','a:3:{i:0;s:45:\"/Public/Uploads/goods/sn1000011/001_small.jpg\";i:1;s:45:\"/Public/Uploads/goods/sn1000011/002_small.jpg\";i:2;s:45:\"/Public/Uploads/goods/sn1000011/003_small.jpg\";}',1000011,8,1475672758),(10,'良品铺子 手剥松子218g 坚果炒货 巴西松子','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000002/01_big.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000002/02_big.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000002/03_big.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000002/01_mid.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000002/02_mid.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000002/03_mid.jpg\";}','a:3:{i:0;s:44:\"/Public/Uploads/goods/sn1000002/01_small.jpg\";i:1;s:44:\"/Public/Uploads/goods/sn1000002/02_small.jpg\";i:2;s:44:\"/Public/Uploads/goods/sn1000002/03_small.jpg\";}',1000002,7,1476106855),(11,'良品铺子 手剥松子218g 坚果炒货 巴西松子','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000003/01_big.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000003/02_big.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000003/03_big.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000003/01_mid.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000003/02_mid.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000003/03_mid.jpg\";}','a:3:{i:0;s:44:\"/Public/Uploads/goods/sn1000003/01_small.jpg\";i:1;s:44:\"/Public/Uploads/goods/sn1000003/02_small.jpg\";i:2;s:44:\"/Public/Uploads/goods/sn1000003/03_small.jpg\";}',1000003,7,1476106872),(12,'良品铺子 手剥松子218g 坚果炒货 巴西松子','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000004/01_big.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000004/02_big.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000004/03_big.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1000004/01_mid.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1000004/02_mid.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1000004/03_mid.jpg\";}','a:3:{i:0;s:44:\"/Public/Uploads/goods/sn1000004/01_small.jpg\";i:1;s:44:\"/Public/Uploads/goods/sn1000004/02_small.jpg\";i:2;s:44:\"/Public/Uploads/goods/sn1000004/03_small.jpg\";}',1000004,7,1476106916),(13,'测试006','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1011/001_big.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1011/002_big.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1011/003_big.jpg\";}','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1011/001_mid.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1011/002_mid.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1011/003_mid.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1011/001_small.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1011/002_small.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1011/003_small.jpg\";}',1011,20,1476107010),(14,'测试006','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1012/001_big.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1012/002_big.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1012/003_big.jpg\";}','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1012/001_mid.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1012/002_mid.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1012/003_mid.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1012/001_small.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1012/002_small.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1012/003_small.jpg\";}',1012,20,1476107028),(15,'测试006','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1010/001_big.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1010/002_big.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1010/003_big.jpg\";}','a:3:{i:0;s:40:\"/Public/Uploads/goods/sn1010/001_mid.jpg\";i:1;s:40:\"/Public/Uploads/goods/sn1010/002_mid.jpg\";i:2;s:40:\"/Public/Uploads/goods/sn1010/003_mid.jpg\";}','a:3:{i:0;s:42:\"/Public/Uploads/goods/sn1010/001_small.jpg\";i:1;s:42:\"/Public/Uploads/goods/sn1010/002_small.jpg\";i:2;s:42:\"/Public/Uploads/goods/sn1010/003_small.jpg\";}',1010,20,1476107157),(16,'字幕组','a:3:{i:0;s:52:\"/Public/Uploads/goods/sn200000201/West world_big.jpg\";i:1;s:58:\"/Public/Uploads/goods/sn200000201/The walking dead_big.jpg\";i:2;s:51:\"/Public/Uploads/goods/sn200000201/灵异镇_big.jpg\";}','a:3:{i:0;s:52:\"/Public/Uploads/goods/sn200000201/West world_mid.jpg\";i:1;s:58:\"/Public/Uploads/goods/sn200000201/The walking dead_mid.jpg\";i:2;s:51:\"/Public/Uploads/goods/sn200000201/灵异镇_mid.jpg\";}','a:3:{i:0;s:54:\"/Public/Uploads/goods/sn200000201/West world_small.jpg\";i:1;s:60:\"/Public/Uploads/goods/sn200000201/The walking dead_small.jpg\";i:2;s:53:\"/Public/Uploads/goods/sn200000201/灵异镇_small.jpg\";}',200000201,27,1477199453),(17,'字幕组','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn200000202/1_big.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn200000202/2_big.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn200000202/3_big.jpg\";}','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn200000202/1_mid.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn200000202/2_mid.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn200000202/3_mid.jpg\";}','a:3:{i:0;s:45:\"/Public/Uploads/goods/sn200000202/1_small.jpg\";i:1;s:45:\"/Public/Uploads/goods/sn200000202/2_small.jpg\";i:2;s:45:\"/Public/Uploads/goods/sn200000202/3_small.jpg\";}',200000202,27,1477199453),(18,'字幕组','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn200000203/2_big.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn200000203/3_big.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn200000203/4_big.jpg\";}','a:3:{i:0;s:43:\"/Public/Uploads/goods/sn200000203/2_mid.jpg\";i:1;s:43:\"/Public/Uploads/goods/sn200000203/3_mid.jpg\";i:2;s:43:\"/Public/Uploads/goods/sn200000203/4_mid.jpg\";}','a:3:{i:0;s:45:\"/Public/Uploads/goods/sn200000203/2_small.jpg\";i:1;s:45:\"/Public/Uploads/goods/sn200000203/3_small.jpg\";i:2;s:45:\"/Public/Uploads/goods/sn200000203/4_small.jpg\";}',200000203,27,1477199453);
/*!40000 ALTER TABLE `think_thumb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_user`
--

DROP TABLE IF EXISTS `think_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `account` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户账号',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '登陆邮箱',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名称',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '注册手机',
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '昵称',
  `sexy` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT '性别',
  `birth` int(13) NOT NULL COMMENT '出生日期',
  `header_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户头像',
  `iphone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户手机',
  `iemail` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户邮箱',
  `addtime` int(13) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user`
--

LOCK TABLES `think_user` WRITE;
/*!40000 ALTER TABLE `think_user` DISABLE KEYS */;
INSERT INTO `think_user` VALUES (4,'penn','202cb962ac59075b964b07152d234b70','penn_z@aliyun.com','黄鹏鹏','13512345678','鹏1','male',1474992000,'/Public/Uploads/Images/Person/id4/57ed34bfecfe7.jpg','12345678904','betwsne@gmail.com',1474871883),(5,'betwsne','e10adc3949ba59abbe56e057f20f883e','betwsne@gmail.com','','','','',0,'','','',1476620964);
/*!40000 ALTER TABLE `think_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-24 18:21:52
