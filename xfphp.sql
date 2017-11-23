/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xfphp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-23 16:21:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xf_admin_nav
-- ----------------------------
DROP TABLE IF EXISTS `xf_admin_nav`;
CREATE TABLE `xf_admin_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) DEFAULT NULL COMMENT '父菜单',
  `name` varchar(15) DEFAULT NULL COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT NULL COMMENT '模块/控制器/方法',
  `icon` varchar(20) DEFAULT NULL COMMENT '图标',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_admin_nav
-- ----------------------------
INSERT INTO `xf_admin_nav` VALUES ('1', '0', '菜单管理', 'Admin/Index/menu', 'fa-tasks', null);
INSERT INTO `xf_admin_nav` VALUES ('2', '1', '菜单列表', 'Admin/Menu/lst', '', null);
INSERT INTO `xf_admin_nav` VALUES ('3', '0', '权限管理', 'Admin/Index/rule', 'fa-unlock-alt', null);
INSERT INTO `xf_admin_nav` VALUES ('4', '3', '权限列表', 'Admin/Rule/lst', '', null);
INSERT INTO `xf_admin_nav` VALUES ('5', '3', '用户组列表', 'Admin/Rule/group', '', null);
INSERT INTO `xf_admin_nav` VALUES ('6', '3', '管理员列表', 'Admin/AdminUsers/lst', '', null);
INSERT INTO `xf_admin_nav` VALUES ('8', '0', '仪表盘', 'Admin/Index/index', 'fa-tachometer', '1');
INSERT INTO `xf_admin_nav` VALUES ('9', '0', '网站配置', 'admin/Index/conf', 'fa-certificate', '1');
INSERT INTO `xf_admin_nav` VALUES ('10', '9', '配置列表', 'Admin/Conf/lst', '', null);
INSERT INTO `xf_admin_nav` VALUES ('11', '9', '配置管理', 'Admin/Conf/lstconf', '', null);

-- ----------------------------
-- Table structure for xf_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `xf_admin_user`;
CREATE TABLE `xf_admin_user` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '后台用户id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `status` tinyint(1) NOT NULL COMMENT '状态 0:禁用 1:启用',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_admin_user
-- ----------------------------
INSERT INTO `xf_admin_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', null, null, null);
INSERT INTO `xf_admin_user` VALUES ('2', 'xufeng', 'e10adc3949ba59abbe56e057f20f883e', '1', '0000-00-00 00:00:00', null, null);
INSERT INTO `xf_admin_user` VALUES ('3', 'xufeng1', 'd41d8cd98f00b204e9800998ecf8427e', '0', '0000-00-00 00:00:00', null, null);

-- ----------------------------
-- Table structure for xf_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `xf_auth_group`;
CREATE TABLE `xf_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限组id',
  `title` char(100) NOT NULL COMMENT '权限组名',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1:启用 0:禁用',
  `rules` varchar(255) NOT NULL COMMENT '权限组规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限组表';

-- ----------------------------
-- Records of xf_auth_group
-- ----------------------------
INSERT INTO `xf_auth_group` VALUES ('1', '超级管理员', '1', '1,2,7,8,9,10,11,12,15,16,17,13,18,19,20,21,22,14,23,24,25,26,27,28,29');
INSERT INTO `xf_auth_group` VALUES ('2', '权限管理员', '1', '11,12,15,16,17,13,18,19,20,21,22,14,23,24,25,26');

-- ----------------------------
-- Table structure for xf_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `xf_auth_group_access`;
CREATE TABLE `xf_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_auth_group_access
-- ----------------------------
INSERT INTO `xf_auth_group_access` VALUES ('1', '1');
INSERT INTO `xf_auth_group_access` VALUES ('2', '2');

-- ----------------------------
-- Table structure for xf_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `xf_auth_rule`;
CREATE TABLE `xf_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `pid` smallint(5) NOT NULL,
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `sort` tinyint(4) NOT NULL COMMENT '排序',
  `condition` char(100) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_auth_rule
-- ----------------------------
INSERT INTO `xf_auth_rule` VALUES ('1', 'Admin/Index/menu', '菜单管理', '1', '1', '0', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('2', 'Admin/Menu/lst', '菜单列表', '1', '1', '1', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('7', 'Admin/Menu/add', '添加菜单', '1', '1', '2', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('8', 'Admin/Menu/edit', '修改菜单', '1', '1', '2', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('9', 'Admin/Menu/del', '删除菜单', '1', '1', '2', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('10', 'Admin/Menu/order', '菜单排序', '1', '1', '2', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('11', 'Admin/Index/rule', '权限管理', '1', '1', '0', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('12', 'Admin/Rule/lst', '权限列表', '1', '1', '11', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('13', 'Admin/Rule/group', '用户组列表', '1', '1', '11', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('14', 'Admin/AdminUsers/lst', '管理员列表', '1', '1', '11', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('15', 'Admin/Rule/add', '添加权限', '1', '1', '12', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('16', 'Admin/Rule/edit', '修改权限', '1', '1', '12', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('17', 'Admin/Rule/delete', '删除权限', '1', '1', '12', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('18', 'Admin/Rule/add_group', '添加用户组', '1', '1', '13', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('19', 'Admin/Rule/edit_group', '修改用户组', '1', '1', '13', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('20', 'Admin/Rule/delete_group', '删除用户组', '1', '1', '13', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('21', 'Admin/Rule/rule_group', '分配权限', '1', '1', '13', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('22', 'Admin/Rule/check_user', '添加成员', '1', '1', '13', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('23', 'Admin/AdminUsers/add_user_to_group', '设置为管理员', '1', '1', '14', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('24', 'Admin/AdminUsers/add', '添加管理员', '1', '1', '14', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('25', 'Admin/AdminUsers/edit', '修改管理员', '1', '1', '14', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('26', 'Admin/Index/index', '首页', '1', '1', '0', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('27', 'Admin/Index/conf', '网站配置', '1', '1', '0', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('28', 'Admin/Conf/lst', '配置列表', '1', '1', '27', null, '0', '');
INSERT INTO `xf_auth_rule` VALUES ('29', 'Admin/Conf/lstconf', '配置管理', '1', '1', '27', null, '0', '');

-- ----------------------------
-- Table structure for xf_conf
-- ----------------------------
DROP TABLE IF EXISTS `xf_conf`;
CREATE TABLE `xf_conf` (
  `id` int(4) NOT NULL,
  `cname` varchar(50) NOT NULL COMMENT '中文名称',
  `ename` varchar(50) NOT NULL COMMENT '英文名称',
  `value` text COMMENT '默认值',
  `values` text COMMENT '可选值',
  `d_type` tinyint(1) DEFAULT NULL COMMENT '1:输入框 2:单选框 3: 复选框 4:下拉菜单 5:文本域 5:附件',
  `c_type` tinyint(1) DEFAULT NULL COMMENT '1:基本配置 2:联系方式 3:seo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_conf
-- ----------------------------
