/*
 Navicat Premium Data Transfer

 Source Server         : wampMysql
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : chatroom

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 21/03/2019 15:16:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for chatlist
-- ----------------------------
DROP TABLE IF EXISTS `chatlist`;
CREATE TABLE `chatlist`  (
  `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hostname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`uid`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for chatmember
-- ----------------------------
DROP TABLE IF EXISTS `chatmember`;
CREATE TABLE `chatmember`  (
  `uid` int(8) UNSIGNED NOT NULL,
  `membername` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for textmsg
-- ----------------------------
DROP TABLE IF EXISTS `textmsg`;
CREATE TABLE `textmsg`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `color` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `sender` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uid` int(8) UNSIGNED NULL DEFAULT NULL,
  INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isadmin` int(4) NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
