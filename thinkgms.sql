/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : thinkgms

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-03-25 19:37:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gms_action
-- ----------------------------
DROP TABLE IF EXISTS `gms_action`;
CREATE TABLE `gms_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL COMMENT '标识',
  `title` char(80) NOT NULL COMMENT '标题',
  `remark` char(140) NOT NULL COMMENT '描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

-- ----------------------------
-- Records of gms_action
-- ----------------------------
INSERT INTO `gms_action` VALUES ('1', 'Admin_Login', '管理员登录', '系统记录', '', '[user|get_nickname]在[time|time_format]登录了后台', '1', '1', '1444460123');
INSERT INTO `gms_action` VALUES ('2', 'Admin_Logout', '管理员退出', '系统记录', '', '[user|get_nickname]在[time|time_format]退出系统', '1', '1', '1444460123');

-- ----------------------------
-- Table structure for gms_action_log
-- ----------------------------
DROP TABLE IF EXISTS `gms_action_log`;
CREATE TABLE `gms_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` varchar(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`),
  KEY `action_id_ix` (`action_id`),
  KEY `user_id_ix` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

-- ----------------------------
-- Records of gms_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for gms_addons
-- ----------------------------
DROP TABLE IF EXISTS `gms_addons`;
CREATE TABLE `gms_addons` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '插件名称',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件中文名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `disabled` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `isconfig` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许配置',
  `config` text,
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '安装时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `author` varchar(50) NOT NULL,
  `version` varchar(50) NOT NULL DEFAULT '0.0.0' COMMENT '版本号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='已安装模块列表';

-- ----------------------------
-- Records of gms_addons
-- ----------------------------
INSERT INTO `gms_addons` VALUES ('12', 'SiteStat', '站点统计信息', '统计站点的基础信息', '1', '1', '0', '\"\"', '0', '0', '管侯杰', '0.1');

-- ----------------------------
-- Table structure for gms_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `gms_auth_group`;
CREATE TABLE `gms_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL COMMENT '用户组标题',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '用户组状态',
  `rules` text NOT NULL COMMENT '用户权限',
  `sort` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gms_auth_group
-- ----------------------------
INSERT INTO `gms_auth_group` VALUES ('1', '超级管理组', '1', '1,41,42,4,33,36,35,34,45,46,47,48,61,49,52,51,50,29,32,31,30,5,62,38,37,40,39,2', '1');
INSERT INTO `gms_auth_group` VALUES ('2', '测试用户组', '1', '1,41,4,61,45,48,47,46,49,50,51,52,29,30,32,31,33,36,35,34,80,81,82,83,5,37,40,39,62,38,2,6,57,59,58,60,25,28,27,26,7,13,14,15,16,17,84,20,3,8,11,12,85,9,90,91,92,93,187,189,188,190,10,79', '1');

-- ----------------------------
-- Table structure for gms_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `gms_auth_rule`;
CREATE TABLE `gms_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `name` varchar(200) DEFAULT NULL COMMENT '节点',
  `title` char(20) NOT NULL COMMENT '标题',
  `icon` varchar(100) NOT NULL DEFAULT 'iconfont icon-other' COMMENT '图表',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '菜单类型',
  `hide` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gms_auth_rule
-- ----------------------------
INSERT INTO `gms_auth_rule` VALUES ('1', '0', '', '系统', 'iconfont icon-computer', '2', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('2', '0', '', '用户', 'iconfont icon-user', '2', '0', '1', '3', '');
INSERT INTO `gms_auth_rule` VALUES ('3', '0', '', '扩展', 'iconfont icon-all', '2', '0', '1', '9', '');
INSERT INTO `gms_auth_rule` VALUES ('4', '1', '', '系统设置', 'iconfont icon-computer', '2', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('5', '1', '', '数据库管理', 'iconfont icon-associated', '2', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('6', '2', '', '用户管理', 'iconfont icon-user', '2', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('7', '2', '', '行为管理', 'iconfont icon-monitoring', '2', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('8', '3', '', '在线平台', 'iconfont icon-cloud', '2', '1', '0', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('9', '3', '', '模块管理', 'iconfont icon-data', '2', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('10', '3', '', '插件管理', 'iconfont icon-keyboard', '2', '0', '1', '3', '');
INSERT INTO `gms_auth_rule` VALUES ('11', '8', 'Admin/Cloud/index?type=1', '模块商店', 'iconfont icon-cart', '2', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('12', '8', 'Admin/Cloud/index?type=2', '插件商店', 'iconfont icon-cart', '2', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('13', '7', 'Admin/Action/index', '行为管理', 'iconfont icon-monitoring', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('14', '13', 'Admin/Action/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('15', '13', 'Admin/Action/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('16', '13', 'Admin/Action/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('17', '7', 'Admin/ActionLog/index', '日志管理', 'iconfont icon-survey', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('20', '17', 'Admin/ActionLog/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('25', '6', 'Admin/AuthGroup/index', '用户组管理', 'iconfont icon-members', '1', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('26', '25', 'Admin/AuthGroup/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('27', '25', 'Admin/AuthGroup/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('28', '25', 'Admin/AuthGroup/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('29', '4', 'Admin/AuthRule/index', '菜单管理', 'iconfont icon-viewlist', '1', '0', '1', '5', '');
INSERT INTO `gms_auth_rule` VALUES ('30', '29', 'Admin/AuthRule/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('31', '29', 'Admin/AuthRule/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('32', '29', 'Admin/AuthRule/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('33', '4', 'Admin/Config/index', '配置管理', 'iconfont icon-set', '1', '0', '1', '9', '');
INSERT INTO `gms_auth_rule` VALUES ('34', '33', 'Admin/Config/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('35', '33', 'Admin/Config/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('36', '33', 'Admin/Config/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('37', '5', 'Admin/Database/index?type=export', '备份数据库', 'iconfont icon-indentation-right', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('38', '62', 'Admin/Database/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('39', '37', 'Admin/Database/repair', '修复表', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('40', '37', 'Admin/Database/optimize', '优化表', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('41', '1', 'Admin/Index/index', '后台首页', 'iconfont icon-other', '1', '1', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('45', '4', 'Admin/Model/index', '模型管理', 'iconfont icon-box-empty', '1', '0', '1', '3', '');
INSERT INTO `gms_auth_rule` VALUES ('46', '45', 'Admin/Model/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('47', '45', 'Admin/Model/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('48', '45', 'Admin/Model/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('49', '4', 'Admin/ModelField/index', '字段管理', 'iconfont icon-other', '1', '1', '1', '4', '');
INSERT INTO `gms_auth_rule` VALUES ('50', '49', 'Admin/ModelField/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('51', '49', 'Admin/ModelField/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('52', '49', 'Admin/ModelField/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('61', '4', 'Admin/Config/group', '系统设置', 'iconfont icon-shezhi', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('57', '6', 'Admin/User/index', '用户管理', 'iconfont icon-account', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('58', '57', 'Admin/User/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('59', '57', 'Admin/User/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('60', '57', 'Admin/User/del', '删除', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('62', '5', 'Admin/Database/index?type=import', '还原数据库', 'iconfont icon-indentation-left', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('79', '10', 'Admin/Addons/index', '插件管理', 'iconfont icon-other', '1', '0', '1', '44', '');
INSERT INTO `gms_auth_rule` VALUES ('80', '4', 'Admin/Hooks/index', '钩子管理', 'iconfont icon-other', '1', '0', '1', '20', '');
INSERT INTO `gms_auth_rule` VALUES ('81', '80', 'Admin/Hooks/add', '新增', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('82', '80', 'Admin/Hooks/edit', '编辑', 'iconfont icon-other', '1', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('83', '80', 'Admin/Hooks/del', '删除', 'iconfont icon-other', '1', '1', '1', '3', '');
INSERT INTO `gms_auth_rule` VALUES ('84', '17', 'Admin/ActionLog/edit', '查看', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('85', '8', 'Admin/Cloud/index?type=3', '开发者', 'iconfont icon-member', '1', '0', '1', '3', '');
INSERT INTO `gms_auth_rule` VALUES ('90', '9', 'Admin/Module/index', '模块管理', 'iconfont icon-project-solid', '1', '0', '1', '0', '');
INSERT INTO `gms_auth_rule` VALUES ('91', '90', 'Admin/Module/add', '安装', 'iconfont icon-other', '1', '0', '1', '1', '');
INSERT INTO `gms_auth_rule` VALUES ('92', '90', 'Admin/Module/disabled', '启用', 'iconfont icon-other', '1', '0', '1', '2', '');
INSERT INTO `gms_auth_rule` VALUES ('93', '90', 'Admin/Module/del', '卸载', 'iconfont icon-other', '1', '1', '1', '3', '');

-- ----------------------------
-- Table structure for gms_cache
-- ----------------------------
DROP TABLE IF EXISTS `gms_cache`;
CREATE TABLE `gms_cache` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增长ID',
  `key` char(100) NOT NULL DEFAULT '' COMMENT '缓存key值',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '名称',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模块名称',
  `model` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '方法名',
  `param` char(255) NOT NULL DEFAULT '' COMMENT '参数',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统',
  PRIMARY KEY (`id`),
  KEY `ckey` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='缓存更新列队';

-- ----------------------------
-- Records of gms_cache
-- ----------------------------
INSERT INTO `gms_cache` VALUES ('1', 'Config', '网站配置', 'Admin', 'Config', 'cache', '', '1');
INSERT INTO `gms_cache` VALUES ('2', 'Action', '行为列表', 'Admin', 'Action', 'cache', '', '0');
INSERT INTO `gms_cache` VALUES ('3', 'ActionLog', '行为日志', 'Admin', 'ActionLog', 'cache', '', '0');

-- ----------------------------
-- Table structure for gms_config
-- ----------------------------
DROP TABLE IF EXISTS `gms_config`;
CREATE TABLE `gms_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置标题',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` text NOT NULL COMMENT '配置参数',
  `remark` varchar(100) NOT NULL COMMENT '说明',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gms_config
-- ----------------------------
INSERT INTO `gms_config` VALUES ('1', 'WEB_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1379235274', '1', 'Gms管理系统', '0');
INSERT INTO `gms_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '2', '网站描述', '1', '', '网站搜索引擎描述', '1378898976', '1379235841', '1', 'ThinkGms内置：thinkphp,EasyUI,AmazeUI,KE编辑器', '1');
INSERT INTO `gms_config` VALUES ('3', 'WEB_SITE_KEYWORD', '2', '网站关键字', '1', '', '网站搜索引擎关键字', '1378898976', '1381390100', '1', '让你的开发更便捷！~', '8');
INSERT INTO `gms_config` VALUES ('4', 'WEB_SITE_CLOSE', '4', '关闭站点', '1', '0:关闭|1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1378898976', '1379235296', '1', '1', '1');
INSERT INTO `gms_config` VALUES ('9', 'CONFIG_TYPE_LIST', '3', '配置类型', '4', '', '主要用于数据解析和页面表单的生成', '1378898976', '1379235348', '1', '0:数字|1:字符|2:文本|3:数组|4:枚举|5:编辑器', '2');
INSERT INTO `gms_config` VALUES ('10', 'WEB_SITE_ICP', '1', '网站备案号', '1', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1378900335', '1379235859', '1', '000-1', '9');
INSERT INTO `gms_config` VALUES ('20', 'CONFIG_GROUP_LIST', '3', '配置分组', '4', '', '用于系统配置中批量更改的分组', '1379228036', '1384418383', '1', '1:基本|2:内容|3:用户|4:系统', '4');
INSERT INTO `gms_config` VALUES ('28', 'DATA_BACKUP_PATH', '1', '数据库备份根路径', '4', '', '路径必须以 / 结尾', '1381482411', '1381482411', '1', './Data/', '5');
INSERT INTO `gms_config` VALUES ('29', 'DATA_BACKUP_PART_SIZE', '0', '数据库备份卷大小', '4', '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '1381482488', '1381729564', '1', '20971520', '7');
INSERT INTO `gms_config` VALUES ('30', 'DATA_BACKUP_COMPRESS', '4', '数据库备份文件是否启用压缩', '4', '0:不压缩|1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '1381713345', '1381729544', '1', '1', '9');
INSERT INTO `gms_config` VALUES ('31', 'DATA_BACKUP_COMPRESS_LEVEL', '4', '数据库备份文件压缩级别', '4', '1:普通|4:一般|9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '1381713408', '1381713408', '1', '1', '10');
INSERT INTO `gms_config` VALUES ('37', 'SHOW_PAGE_TRACE', '4', '是否显示页面Trace信息', '4', '0:关闭|1:开启', '是否显示页面Trace信息', '1387165685', '1387165685', '1', '0', '1');
INSERT INTO `gms_config` VALUES ('58', 'ACTION_TYPE', '3', '行为类型', '3', '', '行为的类型', '0', '0', '1', '1:系统|2:用户', '0');
INSERT INTO `gms_config` VALUES ('59', 'USER_STATUS_TYPE', '3', '用户状态类型', '3', '', '用户状态类型', '0', '0', '1', '0:禁用|1:启用', '0');
INSERT INTO `gms_config` VALUES ('60', 'USERGROUP_STATUS_TYPE', '3', '用户组状态', '3', '', '用户组状态', '0', '0', '1', '0:禁用|1:启用|2:暂停使用|3:废弃', '0');
INSERT INTO `gms_config` VALUES ('61', 'ADMIN_QQ', '1', '管理员QQ', '4', '管理员的QQ号码', '', '0', '0', '1', '912524639', '0');
INSERT INTO `gms_config` VALUES ('62', 'LEFT_MENU_STYLE', '4', '左侧导航风格', '4', '1:Metro|2:列表', '', '0', '0', '1', '1', '0');
INSERT INTO `gms_config` VALUES ('63', 'ADMIN_LOGIN_BG_TYPE', '4', '后台登录背景类型', '4', '0:纯色|1:根据值|2:随机（1-5）', '', '0', '0', '1', '2', '0');
INSERT INTO `gms_config` VALUES ('64', 'ADMIN_LOGIN_BG_IMG', '2', '后台登录背景图片路径', '4', '', '', '0', '0', '1', './Public/Admin/images/Login/bg_1.jpg', '0');
INSERT INTO `gms_config` VALUES ('65', 'ADMIN_REME', '0', '后台记住密码时间', '4', '', '', '0', '0', '1', '3600', '0');

-- ----------------------------
-- Table structure for gms_hooks
-- ----------------------------
DROP TABLE IF EXISTS `gms_hooks`;
CREATE TABLE `gms_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gms_hooks
-- ----------------------------
INSERT INTO `gms_hooks` VALUES ('1', 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', '1', '0', '', '1');
INSERT INTO `gms_hooks` VALUES ('2', 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', '1', '0', '', '1');
INSERT INTO `gms_hooks` VALUES ('3', 'AdminIndex', '首页小格子个性化显示', '1', '1382596073', 'SiteStat', '1');
INSERT INTO `gms_hooks` VALUES ('4', 'app_begin', '应用开始', '2', '1384481614', '', '1');

-- ----------------------------
-- Table structure for gms_model
-- ----------------------------
DROP TABLE IF EXISTS `gms_model`;
CREATE TABLE `gms_model` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` char(30) NOT NULL COMMENT '标识',
  `title` char(30) NOT NULL COMMENT '名称',
  `table_name` varchar(50) NOT NULL COMMENT '表名',
  `is_extend` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '允许子模型',
  `extend` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '继承的模型',
  `list_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '列表类型',
  `list_edit` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许行编辑',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `sort` tinyint(2) NOT NULL DEFAULT '1',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型表';

-- ----------------------------
-- Records of gms_model
-- ----------------------------

-- ----------------------------
-- Table structure for gms_model_field
-- ----------------------------
DROP TABLE IF EXISTS `gms_model_field`;
CREATE TABLE `gms_model_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `field` varchar(100) NOT NULL COMMENT '字段定义',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `extra` text NOT NULL COMMENT '参数',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `list_edit` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许行编辑',
  `sort_l` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '列表',
  `sort_s` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '搜索',
  `sort_a` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '新增',
  `sort_e` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '修改',
  `is_sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序关键字',
  `l_width` varchar(10) NOT NULL DEFAULT '100' COMMENT '列表宽度',
  `field_group` varchar(5) NOT NULL DEFAULT '1' COMMENT '字段分组',
  `validate_rule` text NOT NULL COMMENT '验证规则',
  `auto_rule` text NOT NULL COMMENT '完成规则',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型字段表';

-- ----------------------------
-- Records of gms_model_field
-- ----------------------------

-- ----------------------------
-- Table structure for gms_module
-- ----------------------------
DROP TABLE IF EXISTS `gms_module`;
CREATE TABLE `gms_module` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '模块名称',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '模块中文名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `disabled` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `isconfig` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许配置',
  `config` text,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `author` varchar(50) NOT NULL,
  `version` varchar(50) NOT NULL DEFAULT '0.0.0' COMMENT '版本号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='已安装模块列表';

-- ----------------------------
-- Records of gms_module
-- ----------------------------

-- ----------------------------
-- Table structure for gms_user
-- ----------------------------
DROP TABLE IF EXISTS `gms_user`;
CREATE TABLE `gms_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `nickname` varchar(50) NOT NULL COMMENT '昵称/姓名',
  `password` char(32) NOT NULL COMMENT '密码',
  `last_login_time` int(11) unsigned DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) DEFAULT NULL COMMENT '上次登录IP',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `phone` varchar(20) DEFAULT '' COMMENT '手机',
  `head_img` varchar(255) DEFAULT '/Updatas/d_head.jpg' COMMENT '头像',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `amount` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '余额',
  `point` tinyint(8) unsigned DEFAULT '0' COMMENT '积分',
  `vip` tinyint(4) unsigned DEFAULT '0' COMMENT 'vip等级',
  `overduedate` int(11) unsigned DEFAULT '0' COMMENT 'vip到期时间',
  `create_time` int(11) unsigned DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `info` text COMMENT '信息',
  `group_ids` varchar(255) DEFAULT NULL COMMENT '用户组ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of gms_user
-- ----------------------------
INSERT INTO `gms_user` VALUES ('1', 'admin', '超级管理员', '21232f297a57a5a743894a0e4a801fc3', '1458905437', '127.0.0.1', '912524639@qq.com', '00000000000', '/Updatas/d_head.jpg', '哈哈', '0.00', '0', '0', '0', '1458034376', '1458034376', '1', '', '1,2');
