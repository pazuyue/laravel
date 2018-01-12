/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : secret

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-12 18:31:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2017_12_08_154724_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('2', '2017_12_08_163528_create_comments_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_12_15_102449_add_is_del_to_users', '2');
INSERT INTO `migrations` VALUES ('4', '2017_12_22_020102_add_deleted_at_to_roles_table', '3');
INSERT INTO `migrations` VALUES ('5', '2017_12_22_061110_add_permissions_deleted_at', '4');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('4', 'user-userAdd', '用户添加', '用户添加功能', '2017-12-22 06:54:03', '2018-01-12 09:59:07', null);
INSERT INTO `permissions` VALUES ('5', 'user-userEdit', '用户修改', '用户信息修改功能', '2018-01-12 09:56:52', '2018-01-12 09:56:52', null);
INSERT INTO `permissions` VALUES ('1', 'user-userList', '用户列表', '显示用户列表信息', '2017-12-22 06:39:36', '2017-12-22 06:45:05', null);
INSERT INTO `permissions` VALUES ('6', 'user-userDel', '用户冻结', '用户删除功能', '2018-01-12 09:57:16', '2018-01-12 09:57:56', null);
INSERT INTO `permissions` VALUES ('7', 'user-userThaw', '用户解冻', '用户删除恢复', '2018-01-12 09:57:46', '2018-01-12 09:57:46', null);
INSERT INTO `permissions` VALUES ('8', 'user-userRole', '用户绑定角色', '用户绑定角色功能', '2018-01-12 09:58:33', '2018-01-12 10:30:25', null);
INSERT INTO `permissions` VALUES ('9', 'role-roleList', '角色列表', '角色列表显示', '2018-01-12 09:59:24', '2018-01-12 09:59:24', null);
INSERT INTO `permissions` VALUES ('10', 'role-roleeDel', '角色冻结', '角色删除功能', '2018-01-12 09:59:53', '2018-01-12 09:59:53', null);
INSERT INTO `permissions` VALUES ('11', 'role-roleThaw', '角色解冻', '角色解冻功能', '2018-01-12 10:00:14', '2018-01-12 10:00:14', null);
INSERT INTO `permissions` VALUES ('12', 'role-roleEdit', '角色修改', '角色修改功能', '2018-01-12 10:01:02', '2018-01-12 10:01:02', null);
INSERT INTO `permissions` VALUES ('13', 'role-roleAdd', '角色添加', '角色添加功能', '2018-01-12 10:01:20', '2018-01-12 10:01:20', null);
INSERT INTO `permissions` VALUES ('14', 'role-permissionRole', '角色绑定权限', '角色绑定权限功能', '2018-01-12 10:01:43', '2018-01-12 10:01:43', null);
INSERT INTO `permissions` VALUES ('15', 'permission-permissionList', '权限列表', '权限列表功能', '2018-01-12 10:02:34', '2018-01-12 10:02:34', null);
INSERT INTO `permissions` VALUES ('16', 'permission-permissionAdd', '权限添加', '权限添加功能', '2018-01-12 10:03:19', '2018-01-12 10:03:19', null);
INSERT INTO `permissions` VALUES ('17', 'Permission-permissionDel', '权限冻结', '权限冻结功能', '2018-01-12 10:03:41', '2018-01-12 10:03:41', null);
INSERT INTO `permissions` VALUES ('18', 'Permission-permissionhaw', '权限解冻', '权限解冻功能', '2018-01-12 10:04:05', '2018-01-12 10:04:05', null);
INSERT INTO `permissions` VALUES ('19', 'Permission-permissionEdit', '权限修改', '权限修改功能', '2018-01-12 10:04:32', '2018-01-12 10:04:32', null);

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('4', '1');
INSERT INTO `permission_role` VALUES ('5', '1');
INSERT INTO `permission_role` VALUES ('6', '1');
INSERT INTO `permission_role` VALUES ('7', '1');
INSERT INTO `permission_role` VALUES ('8', '1');
INSERT INTO `permission_role` VALUES ('9', '1');
INSERT INTO `permission_role` VALUES ('10', '1');
INSERT INTO `permission_role` VALUES ('11', '1');
INSERT INTO `permission_role` VALUES ('12', '1');
INSERT INTO `permission_role` VALUES ('13', '1');
INSERT INTO `permission_role` VALUES ('14', '1');
INSERT INTO `permission_role` VALUES ('15', '1');
INSERT INTO `permission_role` VALUES ('16', '1');
INSERT INTO `permission_role` VALUES ('17', '1');
INSERT INTO `permission_role` VALUES ('18', '1');
INSERT INTO `permission_role` VALUES ('19', '1');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_admin', '超级管理员', '拥有超级权限', '2017-12-22 10:20:22', '2017-12-22 03:19:41', null);
INSERT INTO `roles` VALUES ('2', 'admin', '用户管理员', '管理用户模块', '2017-12-22 03:19:36', '2017-12-22 06:03:33', null);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `user_unique` (`id`,`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '月光', '284934551@qq.com', '$2y$10$qJwnE9EZX36wIoPCHBXBd.5lAdb8jLFnGnsFkEyCCTJKFEpCoT3si', 'MUut4wd6HmqaICeYfSVAs0Q6p1zoa7eF1M6ZHaVu2bFVI61wtCw09avgAiO6', '2017-12-13 06:20:25', '2017-12-22 07:15:27', null);
INSERT INTO `users` VALUES ('2', '测试', '284934552@qq.com', '$2y$10$qJwnE9EZX36wIoPCHBXBd.5lAdb8jLFnGnsFkEyCCTJKFEpCoT3si', null, '2017-12-13 06:20:25', '2017-12-22 07:23:16', '2017-12-22 07:23:16');
INSERT INTO `users` VALUES ('11', '月光2', '284934553@qq.com', '$2y$10$sk8VcUF1UwVHWRoy62nHBuBiIxVVqk/gVUcnWhtBQ/A4lg7dOMEAK', null, '2017-12-21 07:54:16', '2017-12-21 07:54:16', null);
