/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : liuyanban

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-03 10:02:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `create_time` varchar(11) NOT NULL DEFAULT '',
  `parent_id` char(6) NOT NULL DEFAULT '0',
  `user_image` varchar(255) DEFAULT NULL,
  `huifu_id` char(6) NOT NULL,
  `userid` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5010 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '', '世界很美好啊', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('3', '', '我们的世界很美好', '0', '0', null, '0', '5003');
INSERT INTO `message` VALUES ('4', '', '北京欢迎你', '0', '5001', null, '5002', '5004');
INSERT INTO `message` VALUES ('5', '', '我们很好啊', '0', '5001', null, '5004', '5005');
INSERT INTO `message` VALUES ('11', '', '3333333', '0', '5001', null, '5001', '5004');
INSERT INTO `message` VALUES ('12', '', '天下一家', '0', '5001', null, '5004', '5002');
INSERT INTO `message` VALUES ('7', '', 'wwwwwwwwwww', '0', '5003', null, '5003', '5002');
INSERT INTO `message` VALUES ('8', '', 'ssss', '0', '5003', null, '5003', '5001');
INSERT INTO `message` VALUES ('13', '', '共图大业', '0', '05001', null, '5002', '5004');
INSERT INTO `message` VALUES ('14', '5001', '好骚搜啊', '0', '5001', '5001', '5002', '5001');
INSERT INTO `message` VALUES ('15', '', '啥也不于东', '0', '05001', null, '5005', '5004');
INSERT INTO `message` VALUES ('16', '', '浏览量', '0', '05001', null, '5003', '5004');
INSERT INTO `message` VALUES ('17', '', '好不好', '0', '05001', null, '5004', '5002');
INSERT INTO `message` VALUES ('18', '', '呵呵呵呵呵', '0', '05001', null, '5002', '5003');
INSERT INTO `message` VALUES ('19', '', '啊', '0', '05001', null, '5002', '5003');
INSERT INTO `message` VALUES ('20', '', '不多', '0', '05001', null, '5005', '5004');
INSERT INTO `message` VALUES ('21', '', '实话实说是', '0', '05001', null, '5002', '5005');
INSERT INTO `message` VALUES ('22', '', '阿萨达所多', '0', '05001', null, '5003', '5004');
INSERT INTO `message` VALUES ('23', '', '菠萝蜜', '0', '05001', null, '5004', '5002');
INSERT INTO `message` VALUES ('24', '5001', '气温气味', '0', '5001', '5001', '5003', '5001');
INSERT INTO `message` VALUES ('25', '', '&lt;p&gt;wwwwwwwwwww&lt;/p&gt;', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5003', '', 'meihao', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5004', '', '', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5005', '', '&lt;p&gt;一二三四&lt;br/&gt;&lt;/p&gt;', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5006', '', '<p>三四五六<br/></p>', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5007', '', '<p>是啊啊啊啊啊啊</p>', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5008', '', '<p>222222222222222222<br/></p>', '0', '0', null, '0', '5001');
INSERT INTO `message` VALUES ('5009', '', '<p>wwwwww无无无无无无无无无无无无无<br/></p>', '1519726987', '0', null, '0', '5001');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userid` char(6) NOT NULL,
  `userimg` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'xiaoming', 'e10adc3949ba59abbe56e057f20f883e', '5001', '/uploads/20180227/d833c895d143.jpg', '');
INSERT INTO `users` VALUES ('2', 'xiaohui', 'e10adc3949ba59abbe56e057f20f883e', '5002', null, '');
INSERT INTO `users` VALUES ('3', 'xiaola', 'e10adc3949ba59abbe56e057f20f883e', '5003', null, '');
INSERT INTO `users` VALUES ('4', 'xiaopiao', 'e10adc3949ba59abbe56e057f20f883e', '5004', null, '');
INSERT INTO `users` VALUES ('5', 'xiaowang', 'e10adc3949ba59abbe56e057f20f883e', '5005', null, '');
INSERT INTO `users` VALUES ('6', '', 'd41d8cd98f00b204e9800998ecf8427e', '', null, '');
INSERT INTO `users` VALUES ('7', 'xiaobai', 'e10adc3949ba59abbe56e057f20f883e', '', '/uploads/20180211/8e60b4df46231dd10a0b447e1839ef19.jpg', '');
INSERT INTO `users` VALUES ('8', 'xiaoyang', '60cd1a9d61e1e48faa378de2bda3f84e', '', null, '');
INSERT INTO `users` VALUES ('9', 'xiaoyang', '60cd1a9d61e1e48faa378de2bda3f84e', '', null, '');
INSERT INTO `users` VALUES ('10', 'xiaoyang', '60cd1a9d61e1e48faa378de2bda3f84e', '', null, '');
INSERT INTO `users` VALUES ('11', '小白', 'e10adc3949ba59abbe56e057f20f883e', '5008', null, '344595744@qq.com');
INSERT INTO `users` VALUES ('12', '小白', 'e10adc3949ba59abbe56e057f20f883e', '5009', null, '344595744@qq.com');
INSERT INTO `users` VALUES ('13', '小白', 'e10adc3949ba59abbe56e057f20f883e', '5010', null, '344595744@qq.com');

-- ----------------------------
-- Table structure for usersession
-- ----------------------------
DROP TABLE IF EXISTS `usersession`;
CREATE TABLE `usersession` (
  `id` int(6) NOT NULL,
  `session` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usersession
-- ----------------------------
