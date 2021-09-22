/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_raywhite

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 22/09/2021 09:02:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Written Report', 'written-report', '/images/categories/category-written-report.jpeg');
INSERT INTO `categories` VALUES (2, 'Trading Report', 'trading-report', '/images/categories/category-trading-report.jpeg');
INSERT INTO `categories` VALUES (3, 'Settled Report', 'settled-reportt', '/images/categories/category-settled-report.jpeg');
INSERT INTO `categories` VALUES (4, 'Written Quarter Report', 'written-quarter-report', '/images/categories/category-written-quarter-report.jpeg');
INSERT INTO `categories` VALUES (5, 'Trading Quarter Report', 'treder-quarter-report', '/images/categories/category-trading-quarter-report.jpeg');
INSERT INTO `categories` VALUES (6, 'Annual Award', 'annual-award', '/images/categories/category-annual-award.jpeg');

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES (1, 'Office written & trading', 1);
INSERT INTO `reports` VALUES (3, 'test update sekali lagi', 6);
INSERT INTO `reports` VALUES (5, 'mila aghniya', 6);
INSERT INTO `reports` VALUES (7, 'test report', 1);
INSERT INTO `reports` VALUES (9, 'report', 3);
INSERT INTO `reports` VALUES (11, 'coba testing', 1);
INSERT INTO `reports` VALUES (15, 'ajshaj', 5);

SET FOREIGN_KEY_CHECKS = 1;
