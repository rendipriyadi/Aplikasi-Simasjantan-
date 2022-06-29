/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : simasjantan

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 28/06/2022 10:09:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detail_laporan
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan`;
CREATE TABLE `detail_laporan`  (
  `id_detaillaporan` int(11) NOT NULL AUTO_INCREMENT,
  `laporan_id` int(11) NULL DEFAULT NULL,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_detaillaporan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_laporan
-- ----------------------------
INSERT INTO `detail_laporan` VALUES (9, 10, 11, 'CMNP');
INSERT INTO `detail_laporan` VALUES (10, 11, 12, 'CMLJ');

-- ----------------------------
-- Table structure for gangguan
-- ----------------------------
DROP TABLE IF EXISTS `gangguan`;
CREATE TABLE `gangguan`  (
  `id_gangguan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_gangguan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gangguan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 131 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gangguan
-- ----------------------------
INSERT INTO `gangguan` VALUES (1, 'SERAH TERIMA TUGAS', '2022-04-27 11:06:37', '12', '2022-04-27 11:06:37', '12', NULL);
INSERT INTO `gangguan` VALUES (2, 'MOBIL-GANGGUAN RODA/TRANSMISSI', '2022-04-27 11:06:49', '12', '2022-04-27 11:06:49', '12', NULL);
INSERT INTO `gangguan` VALUES (3, 'MOBIL-KEMPES BAN', '2022-04-27 11:06:58', '12', '2022-04-27 11:06:58', '12', NULL);
INSERT INTO `gangguan` VALUES (4, 'MOBIL-PECAH BAN', '2022-04-27 11:07:10', '12', '2022-04-27 11:07:10', '12', NULL);
INSERT INTO `gangguan` VALUES (5, 'MOBIL-BAN LEPAS', '2022-04-27 11:07:18', '12', '2022-04-27 11:07:18', '12', NULL);
INSERT INTO `gangguan` VALUES (6, 'MOBIL-BAUT RODA LEPAS/LONGGAR', '2022-04-27 11:07:32', '12', '2022-04-27 11:07:32', '12', NULL);
INSERT INTO `gangguan` VALUES (7, 'MOBIL-BAUT RODA PATAH', '2022-04-27 11:07:40', '12', '2022-04-27 11:07:40', '12', NULL);
INSERT INTO `gangguan` VALUES (8, 'MOBIL-BEARING RODA PECAH/AUS', '2022-04-27 11:07:51', '12', '2022-04-27 11:07:51', '12', NULL);
INSERT INTO `gangguan` VALUES (9, 'MOBIL-AS RODA PATAH/LEPAS', '2022-04-27 11:08:06', '12', '2022-04-27 11:08:06', '12', NULL);
INSERT INTO `gangguan` VALUES (10, 'MOBIL-KOPEL LEPAS/LONGGAR', '2022-04-27 11:08:20', '12', '2022-04-27 11:08:20', '12', NULL);
INSERT INTO `gangguan` VALUES (11, 'MOBIL-KOPLING SLIP', '2022-04-27 11:08:53', '12', '2022-04-27 11:08:53', '12', NULL);
INSERT INTO `gangguan` VALUES (12, 'MOBIL-PERSENELING RUSAK', '2022-04-27 11:09:06', '12', '2022-04-27 11:09:06', '12', NULL);
INSERT INTO `gangguan` VALUES (13, 'MOBIL-PLAT KOPLING AUS/RUSAK', '2022-04-27 11:09:14', '12', '2022-04-27 11:09:14', '12', NULL);
INSERT INTO `gangguan` VALUES (14, 'MOBIL-REM MACET/BLONG.', '2022-04-27 11:09:25', '12', '2022-04-27 11:09:25', '12', NULL);
INSERT INTO `gangguan` VALUES (15, 'MOBIL-STABILIZER RODA RUSAK', '2022-04-27 11:09:34', '12', '2022-04-27 11:09:34', '12', NULL);
INSERT INTO `gangguan` VALUES (16, 'MOBIL-GANGGUAN GARDAN', '2022-04-27 11:10:25', '12', '2022-04-27 11:10:25', '12', NULL);
INSERT INTO `gangguan` VALUES (17, 'MOBIL-PER LEPAS/ PATAH', '2022-04-27 11:10:34', '12', '2022-04-27 11:10:34', '12', NULL);
INSERT INTO `gangguan` VALUES (18, 'MOBIL-TALI KOPLING LEPAS/PUTUS', '2022-04-27 11:10:45', '12', '2022-04-27 11:10:45', '12', NULL);
INSERT INTO `gangguan` VALUES (19, 'MOBIL-TROMOL LEPAS/PECAH', '2022-04-27 11:10:55', '12', '2022-04-27 11:10:55', '12', NULL);
INSERT INTO `gangguan` VALUES (20, 'MOBIL-POWER STERING RUSAK/PUTUS', '2022-04-27 11:11:05', '12', '2022-04-27 11:11:05', '12', NULL);
INSERT INTO `gangguan` VALUES (21, 'MOBIL-TANGKI BBM BOCOR', '2022-04-27 11:11:16', '12', '2022-04-27 11:11:16', '12', NULL);
INSERT INTO `gangguan` VALUES (22, 'MOBIL-SLANG REM/ANGIN BOCOR/RUSAK', '2022-04-27 11:11:24', '12', '2022-04-27 11:11:24', '12', NULL);
INSERT INTO `gangguan` VALUES (23, 'MOBIL-BAN SETIP JATUH/HILANG.', '2022-04-27 11:11:35', '12', '2022-04-27 11:11:35', '12', NULL);
INSERT INTO `gangguan` VALUES (24, 'MOBIL-REM BLONG', '2022-04-27 11:11:46', '12', '2022-04-27 11:11:46', '12', NULL);
INSERT INTO `gangguan` VALUES (25, 'MOBIL-GANGGUAN KLAKSON', '2022-04-27 11:11:57', '12', '2022-04-27 11:11:57', '12', NULL);
INSERT INTO `gangguan` VALUES (26, 'MOBIL-PER KOPLING LEPAS/PATAH', '2022-04-27 11:12:10', '12', '2022-04-27 11:12:10', '12', NULL);
INSERT INTO `gangguan` VALUES (27, 'MOBIL-BAN AUS.', '2022-04-27 11:12:19', '12', '2022-04-27 11:12:19', '12', NULL);
INSERT INTO `gangguan` VALUES (28, 'MOBIL-WATER PUMP RUSAK.', '2022-04-27 11:12:33', '12', '2022-04-27 11:12:33', '12', NULL);
INSERT INTO `gangguan` VALUES (29, 'MOBIL-KABEL DELCO/KOIL LEPAS/RUSAK', '2022-04-27 11:12:50', '12', '2022-04-27 11:12:50', '12', NULL);
INSERT INTO `gangguan` VALUES (30, 'MOBIL-TUTUP RADIATOR HILANG/LEPAS', '2022-04-27 11:12:59', '12', '2022-04-27 11:12:59', '12', NULL);
INSERT INTO `gangguan` VALUES (31, 'MOBIL-MINYAK REM/KOPLING HABIS/BOCOR', '2022-04-27 11:13:07', '12', '2022-04-27 11:13:07', '12', NULL);
INSERT INTO `gangguan` VALUES (32, 'MOBIL-BBM TERCAMPUR AIR.', '2022-04-27 11:13:18', '12', '2022-04-27 11:13:18', '12', NULL);
INSERT INTO `gangguan` VALUES (33, 'MOBIL-JOINT KOPEL RUSAK.', '2022-04-27 11:13:30', '12', '2022-04-27 11:13:30', '12', NULL);
INSERT INTO `gangguan` VALUES (34, 'MOBIL-PENGECEKAN KENDARAAN.', '2022-04-27 11:13:45', '12', '2022-04-27 11:13:45', '12', NULL);
INSERT INTO `gangguan` VALUES (35, 'MOBIL-DISTRIBUTOR NGADAT.', '2022-04-27 11:13:59', '12', '2022-04-27 11:13:59', '12', NULL);
INSERT INTO `gangguan` VALUES (36, 'MOBIL-MESIN BREBET.', '2022-04-27 11:14:09', '12', '2022-04-27 11:14:09', '12', NULL);
INSERT INTO `gangguan` VALUES (37, 'MOBIL-AIR ACCU HABIS/KURANG.', '2022-04-27 11:14:25', '12', '2022-04-27 11:14:25', '12', NULL);
INSERT INTO `gangguan` VALUES (38, 'MOBIL-BAMPER LEPAS.', '2022-04-27 11:14:35', '12', '2022-04-27 11:14:35', '12', NULL);
INSERT INTO `gangguan` VALUES (39, 'MOBIL-GANGGUAN MESIN', '2022-04-27 11:14:54', '12', '2022-04-27 11:14:54', '12', NULL);
INSERT INTO `gangguan` VALUES (40, 'MOBIL-ACCU LEMAH/SOAK', '2022-04-27 11:15:06', '12', '2022-04-27 11:15:06', '12', NULL);
INSERT INTO `gangguan` VALUES (41, 'MOBIL-AIR RADIATOR HABIS/KURANG', '2022-04-27 11:16:12', '12', '2022-04-27 11:16:12', '12', NULL);
INSERT INTO `gangguan` VALUES (42, 'MOBIL-BAUT ROTOR KENDOR', '2022-04-27 11:16:21', '12', '2022-04-27 11:16:21', '12', NULL);
INSERT INTO `gangguan` VALUES (43, 'MOBIL-BBM HABIS', '2022-04-27 11:16:33', '12', '2022-04-27 11:16:33', '12', NULL);
INSERT INTO `gangguan` VALUES (44, 'MOBIL-SELANG/BBM MAMPET', '2022-04-27 11:16:51', '12', '2022-04-27 11:16:51', '12', NULL);
INSERT INTO `gangguan` VALUES (45, 'MOBIL-BUSI KOTOR/BASAH/LEPAS', '2022-04-27 11:17:10', '12', '2022-04-27 11:17:10', '12', NULL);
INSERT INTO `gangguan` VALUES (46, 'MOBIL-COIL PANAS', '2022-04-27 11:17:21', '12', '2022-04-27 11:17:21', '12', NULL);
INSERT INTO `gangguan` VALUES (47, 'MOBIL-DELCO BASAH', '2022-04-27 11:17:41', '12', '2022-04-27 11:17:41', '12', NULL);
INSERT INTO `gangguan` VALUES (48, 'MOBIL-DINAMO AMPERE RUSAK', '2022-04-27 11:17:51', '12', '2022-04-27 11:17:51', '12', NULL);
INSERT INTO `gangguan` VALUES (49, 'MOBIL-DINAMO STARTER RUSAK', '2022-04-27 11:18:04', '12', '2022-04-27 11:18:04', '12', NULL);
INSERT INTO `gangguan` VALUES (50, 'MOBIL-KABEL ACCU LEPAS/KENDOR', '2022-04-27 11:18:14', '12', '2022-04-27 11:18:14', '12', NULL);
INSERT INTO `gangguan` VALUES (51, 'MOBIL-KABURATOR KOTOR', '2022-04-27 11:18:25', '12', '2022-04-27 11:18:25', '12', NULL);
INSERT INTO `gangguan` VALUES (52, 'MOBIL-KONDENSOR MATI', '2022-04-27 11:18:34', '12', '2022-04-27 11:18:34', '12', NULL);
INSERT INTO `gangguan` VALUES (53, 'MOBIL-KORTSLETING', '2022-04-27 11:20:11', '12', '2022-04-27 11:20:11', '12', NULL);
INSERT INTO `gangguan` VALUES (54, 'MOBIL-MASUK ANGIN', '2022-04-27 11:20:22', '12', '2022-04-27 11:20:22', '12', NULL);
INSERT INTO `gangguan` VALUES (55, 'MOBIL-MESIN PANAS', '2022-04-27 11:20:32', '12', '2022-04-27 11:20:32', '12', NULL);
INSERT INTO `gangguan` VALUES (56, 'MOBIL-MESIN PINCANG', '2022-04-27 11:20:40', '12', '2022-04-27 11:20:40', '12', NULL);
INSERT INTO `gangguan` VALUES (57, 'MOBIL-OLI BOCOR/HABIS', '2022-04-27 11:20:49', '12', '2022-04-27 11:20:49', '12', NULL);
INSERT INTO `gangguan` VALUES (58, 'MOBIL-OVER HEATING', '2022-04-27 11:20:57', '12', '2022-04-27 11:20:57', '12', NULL);
INSERT INTO `gangguan` VALUES (59, 'MOBIL-PENGAPIAN TIDAK BERFUNGSI', '2022-04-27 11:21:10', '12', '2022-04-27 11:21:10', '12', NULL);
INSERT INTO `gangguan` VALUES (60, 'MOBIL-PLATINA BASAH/KOTOR', '2022-04-27 11:21:19', '12', '2022-04-27 11:21:19', '12', NULL);
INSERT INTO `gangguan` VALUES (61, 'MOBIL-POMPA INJECTOR RUSAK', '2022-04-27 11:21:28', '12', '2022-04-27 11:21:28', '12', NULL);
INSERT INTO `gangguan` VALUES (62, 'MOBIL-PULLY KIPAS PECAH/RETAK', '2022-04-27 11:21:37', '12', '2022-04-27 11:21:37', '12', NULL);
INSERT INTO `gangguan` VALUES (63, 'MOBIL-RATAX/INJEKTOR LEMAH/RUSAK.', '2022-04-27 11:21:49', '12', '2022-04-27 11:21:49', '12', NULL);
INSERT INTO `gangguan` VALUES (64, 'MOBIL-SARINGAN BENSIN KOTOR', '2022-04-27 11:21:57', '12', '2022-04-27 11:21:57', '12', NULL);
INSERT INTO `gangguan` VALUES (65, 'MOBIL-SELANG/RADIATOR BOCOR', '2022-04-27 11:22:06', '12', '2022-04-27 11:22:06', '12', NULL);
INSERT INTO `gangguan` VALUES (66, 'MOBIL-SIKRING PUTUS', '2022-04-27 11:22:14', '12', '2022-04-27 11:22:14', '12', NULL);
INSERT INTO `gangguan` VALUES (67, 'MOBIL-TALI KIPAS KENDOR/PUTUS', '2022-04-27 11:22:22', '12', '2022-04-27 11:22:22', '12', NULL);
INSERT INTO `gangguan` VALUES (68, 'MOBIL-TIDAK BISA STARTER', '2022-04-27 11:22:30', '12', '2022-04-27 11:22:30', '12', NULL);
INSERT INTO `gangguan` VALUES (69, 'MOBIL-TIMING BELT PUTUS/LEPAS', '2022-04-27 11:22:39', '12', '2022-04-27 11:22:39', '12', NULL);
INSERT INTO `gangguan` VALUES (70, 'MOBIL-SELANG SOLAR PECAH', '2022-04-27 11:22:48', '12', '2022-04-27 11:22:48', '12', NULL);
INSERT INTO `gangguan` VALUES (71, 'MOBIL-TALI GAS PUTUS/LEPAS', '2022-04-27 11:22:57', '12', '2022-04-27 11:22:57', '12', NULL);
INSERT INTO `gangguan` VALUES (72, 'MOBIL-KUNCI KONTAK RUSAK/KETINGGALAN', '2022-04-27 11:23:04', '12', '2022-04-27 11:23:04', '12', NULL);
INSERT INTO `gangguan` VALUES (73, 'MOBIL-KOMPRESOR ANGIN RUSAK', '2022-04-27 11:23:42', '12', '2022-04-27 11:23:42', '12', NULL);
INSERT INTO `gangguan` VALUES (74, 'MOBIL-SETRUM HILANG', '2022-04-27 11:24:38', '12', '2022-04-27 11:24:38', '12', NULL);
INSERT INTO `gangguan` VALUES (75, 'MOBIL-FANT TIDAK BERFUNGSI', '2022-04-27 11:24:46', '12', '2022-04-27 11:24:46', '12', NULL);
INSERT INTO `gangguan` VALUES (76, 'MOBIL-FILTER SOLAR MAMPET', '2022-04-27 11:25:13', '12', '2022-04-27 11:25:13', '12', NULL);
INSERT INTO `gangguan` VALUES (77, 'MOBIL-STATER RUSAK.', '2022-04-27 11:25:21', '12', '2022-04-27 11:25:21', '12', NULL);
INSERT INTO `gangguan` VALUES (78, 'MOBIL-STIR LEPAS/TIDAK BERFUNGSI', '2022-04-27 11:25:30', '12', '2022-04-27 11:25:30', '12', NULL);
INSERT INTO `gangguan` VALUES (79, 'MOBIL-BREKET ACCU LEPAS/KENDOR.', '2022-04-27 11:25:38', '12', '2022-04-27 11:25:38', '12', NULL);
INSERT INTO `gangguan` VALUES (80, 'MOBIL-COIL BASAH.', '2022-04-27 11:25:57', '12', '2022-04-27 11:25:57', '12', NULL);
INSERT INTO `gangguan` VALUES (81, 'MOBIL-MERAPIHKAN MUATAN.', '2022-04-27 11:26:14', '12', '2022-04-27 11:26:14', '12', NULL);
INSERT INTO `gangguan` VALUES (82, 'MOBIL-GANGGUAN KELISTRIKAN.', '2022-04-27 11:26:28', '12', '2022-04-27 11:26:28', '12', NULL);
INSERT INTO `gangguan` VALUES (83, 'MOBIL-SLANG OLIE LEPAS/PECAH.', '2022-04-27 11:26:36', '12', '2022-04-27 11:26:36', '12', NULL);
INSERT INTO `gangguan` VALUES (84, 'MOBIL-POMPA OLIE RUSAK.', '2022-04-27 11:26:46', '12', '2022-04-27 11:26:46', '12', NULL);
INSERT INTO `gangguan` VALUES (85, 'MOBIL-KIPAS RADIATOR PECAH/LEPAS.', '2022-04-27 11:27:04', '12', '2022-04-27 11:27:04', '12', NULL);
INSERT INTO `gangguan` VALUES (86, 'MOBIL-KACA PECAH', '2022-04-27 11:27:18', '12', '2022-04-27 11:27:18', '12', NULL);
INSERT INTO `gangguan` VALUES (87, 'MOBIL-KNALPOT LEPAS', '2022-04-27 11:27:29', '12', '2022-04-27 11:27:29', '12', NULL);
INSERT INTO `gangguan` VALUES (88, 'MOBIL-TANGKI BBM LEPAS/BOCOR', '2022-04-27 11:27:37', '12', '2022-04-27 11:27:37', '12', NULL);
INSERT INTO `gangguan` VALUES (89, 'MOBIL-TEEROD LEPAS/LONGGAR', '2022-04-27 11:27:49', '12', '2022-04-27 11:27:49', '12', NULL);
INSERT INTO `gangguan` VALUES (90, 'MOBIL-WAVER MACET', '2022-04-27 11:27:57', '12', '2022-04-27 11:27:57', '12', NULL);
INSERT INTO `gangguan` VALUES (91, 'MOBIL-LAMPU KEND. MATI', '2022-04-27 11:28:06', '12', '2022-04-27 11:28:06', '12', NULL);
INSERT INTO `gangguan` VALUES (92, 'MOBIL-KLAIM PEMAKAI JALAN', '2022-04-27 11:28:16', '12', '2022-04-27 11:28:16', '12', NULL);
INSERT INTO `gangguan` VALUES (93, 'MOBIL-PEK./GANGGUAN TERTUNDA', '2022-04-27 11:28:24', '12', '2022-04-27 11:28:24', '12', NULL);
INSERT INTO `gangguan` VALUES (94, 'MOBIL-TANGKI BBM KEMASUKAN AIR', '2022-04-27 11:28:33', '12', '2022-04-27 11:28:33', '12', NULL);
INSERT INTO `gangguan` VALUES (95, 'MOBIL-KAP DEPAN TERBUKA/TERLEPAS', '2022-04-27 11:28:41', '12', '2022-04-27 11:28:41', '12', NULL);
INSERT INTO `gangguan` VALUES (96, 'MOBIL-VELG RETAK/PECAH', '2022-04-27 11:28:49', '12', '2022-04-27 11:28:49', '12', NULL);
INSERT INTO `gangguan` VALUES (97, 'MOBIL-MASTER KOPLING RUSAK', '2022-04-27 11:28:58', '12', '2022-04-27 11:30:02', '12', NULL);
INSERT INTO `gangguan` VALUES (98, 'MOBIL-LAIN-LAIN', '2022-04-27 11:30:17', '12', '2022-04-27 11:30:17', '12', NULL);
INSERT INTO `gangguan` VALUES (99, 'KECELAKAAN-3-3 TUNGGAL', '2022-04-27 11:30:54', '12', '2022-04-27 11:30:54', '12', NULL);
INSERT INTO `gangguan` VALUES (100, 'KECELAKAAN-3-3 GANDA', '2022-04-27 11:31:04', '12', '2022-04-27 11:31:04', '12', NULL);
INSERT INTO `gangguan` VALUES (101, 'KECELAKAAN-3-3 LEBIH DUA KENDARAAN', '2022-04-27 11:31:14', '12', '2022-04-27 11:31:14', '12', NULL);
INSERT INTO `gangguan` VALUES (102, 'KECELAKAAN-3-3 DI ON/OFF RAMP', '2022-04-27 11:31:23', '12', '2022-04-27 11:31:23', '12', NULL);
INSERT INTO `gangguan` VALUES (103, 'KECELAKAAN-3-3 DI ARTERI', '2022-04-27 11:31:31', '12', '2022-04-27 11:31:31', '12', NULL);
INSERT INTO `gangguan` VALUES (104, 'KECELAKAAN-3-3 DI RUAS JM', '2022-04-27 11:31:39', '12', '2022-04-27 11:31:39', '12', NULL);
INSERT INTO `gangguan` VALUES (105, 'KECELAKAAN-3-3 DAMAI', '2022-04-27 11:31:46', '12', '2022-04-27 11:31:46', '12', NULL);
INSERT INTO `gangguan` VALUES (106, 'KECELAKAAN-3-3 L(RINGAN/BERAT)', '2022-04-27 11:31:58', '12', '2022-04-27 11:31:58', '12', NULL);
INSERT INTO `gangguan` VALUES (107, 'KECELAKAAN-3-3 L/K TERHIMPIT.', '2022-04-27 11:32:08', '12', '2022-04-27 11:32:08', '12', NULL);
INSERT INTO `gangguan` VALUES (108, 'KECELAKAAN-3-4 KONTRA KABUR', '2022-04-27 11:32:30', '12', '2022-04-27 11:32:30', '12', NULL);
INSERT INTO `gangguan` VALUES (109, 'KECELAKAAN-3-4 M/L/K', '2022-04-27 11:32:40', '12', '2022-04-27 11:32:40', '12', NULL);
INSERT INTO `gangguan` VALUES (110, 'KECELAKAAN-KEND. SLIP/MELINTANG', '2022-04-27 11:33:01', '12', '2022-04-27 11:33:01', '12', NULL);
INSERT INTO `gangguan` VALUES (111, 'KECELAKAAN-KEND. TERBAKAR', '2022-04-27 11:33:09', '12', '2022-04-27 11:33:09', '12', NULL);
INSERT INTO `gangguan` VALUES (112, 'KECELAKAAN-KEND. TERBALIK', '2022-04-27 11:33:19', '12', '2022-04-27 11:33:19', '12', NULL);
INSERT INTO `gangguan` VALUES (113, 'KECELAKAAN-MUATAN TUMPAH/JATUH', '2022-04-27 11:33:27', '12', '2022-04-27 11:33:27', '12', NULL);
INSERT INTO `gangguan` VALUES (114, 'KECELAKAAN-GANDENGAN LEPAS', '2022-04-27 11:33:40', '12', '2022-04-27 11:33:40', '12', NULL);
INSERT INTO `gangguan` VALUES (115, 'KECELAKAAN-DIKETEMUKAN MAYAT.', '2022-04-27 11:33:50', '12', '2022-04-27 11:33:50', '12', NULL);
INSERT INTO `gangguan` VALUES (116, 'KECELAKAAN-SEREMPETAN.', '2022-04-27 11:33:59', '12', '2022-04-27 11:33:59', '12', NULL);
INSERT INTO `gangguan` VALUES (117, 'KECELAKAAN-MUATAN TERBAKAR.', '2022-04-27 11:34:09', '12', '2022-04-27 11:34:09', '12', NULL);
INSERT INTO `gangguan` VALUES (118, 'KECELAKAAN-MUATAN HAMPIR TUMPAH.', '2022-04-27 11:34:17', '12', '2022-04-27 11:34:17', '12', NULL);
INSERT INTO `gangguan` VALUES (119, 'LAINLAIN-DEMONSTRASI', '2022-04-27 11:34:51', '12', '2022-04-27 11:34:51', '12', NULL);
INSERT INTO `gangguan` VALUES (120, 'LAINLAIN-PEK./PEMASANGAN RAMBU', '2022-04-27 11:34:59', '12', '2022-04-27 11:34:59', '12', NULL);
INSERT INTO `gangguan` VALUES (121, 'LAINLAIN-PEK. PEMELIHARAAN', '2022-04-27 11:35:07', '12', '2022-04-27 11:35:07', '12', NULL);
INSERT INTO `gangguan` VALUES (122, 'LAINLAIN-PERJALANAN VIP', '2022-04-27 11:35:19', '12', '2022-04-27 11:35:19', '12', NULL);
INSERT INTO `gangguan` VALUES (123, 'LAINLAIN-TAWURAN', '2022-04-27 11:35:29', '12', '2022-04-27 11:35:29', '12', NULL);
INSERT INTO `gangguan` VALUES (124, 'LAINLAIN-GENANGAN AIR', '2022-04-27 11:35:37', '12', '2022-04-27 11:35:37', '12', NULL);
INSERT INTO `gangguan` VALUES (125, 'LAINLAIN-KOORDINASI', '2022-04-27 11:35:48', '12', '2022-04-27 11:35:48', '12', NULL);
INSERT INTO `gangguan` VALUES (126, 'LAINLAIN-MONITORING', '2022-04-27 11:35:58', '12', '2022-04-27 11:35:58', '12', NULL);
INSERT INTO `gangguan` VALUES (127, 'LAINLAIN-INFORMASI', '2022-04-27 11:36:10', '12', '2022-04-27 11:36:10', '12', NULL);
INSERT INTO `gangguan` VALUES (128, 'LAINLAIN-GANGGUAN KEAMANAN.', '2022-04-27 11:36:23', '12', '2022-04-27 11:36:23', '12', NULL);
INSERT INTO `gangguan` VALUES (129, 'LAINLAIN-PEK.PEMASANGAN REKLAME/IKLAN.', '2022-04-27 11:36:36', '12', '2022-04-27 11:36:36', '12', NULL);
INSERT INTO `gangguan` VALUES (130, 'LAINLAIN-PEK.PEMASANGAN REKLAME/IKLAN', '2022-04-27 11:36:55', '12', '2022-04-27 11:36:55', '12', NULL);

-- ----------------------------
-- Table structure for kejadian
-- ----------------------------
DROP TABLE IF EXISTS `kejadian`;
CREATE TABLE `kejadian`  (
  `id_kejadian` int(11) NOT NULL AUTO_INCREMENT,
  `laporan_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `tipe_kejadian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu_kejadian` datetime(0) NULL DEFAULT NULL,
  `waktu_penanganan` datetime(0) NULL DEFAULT NULL,
  `waktu_selesai_penanganan` datetime(0) NULL DEFAULT NULL,
  `cuaca_kejadian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harilibur_kejadian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sta_id` int(11) NULL DEFAULT NULL,
  `lokasi_kejadian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lajur_kejadian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penyebab_id` int(1) NULL DEFAULT NULL,
  `tipe_tabrakan_id` int(11) NULL DEFAULT NULL,
  `kode_gangguan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi_jalan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `posisi_mobil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `klr_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `klb_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `km_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ktr_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `krr_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `krb_kejadian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kejadian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kejadian
-- ----------------------------
INSERT INTO `kejadian` VALUES (11, 10, 26, 'non kecelakaan', '2022-06-23 15:13:00', '2022-06-22 15:14:00', '2022-06-22 15:20:00', 'CERAH', 'HARI KERJA', 299, NULL, 'LAJUR 3', NULL, NULL, '3', 'RAMAI LANCAR', 'MENYEBRANG', '0', '0', '0', '1', '0', '0', 'Tka', '', 'CMNP', '2022-06-22 15:13:26', '4', '2022-06-23 11:41:03', '4', NULL);
INSERT INTO `kejadian` VALUES (12, 11, 29, 'kecelakaan', '2022-06-23 14:20:00', '2022-06-22 14:30:00', '2022-06-22 15:00:00', 'HUJAN', 'HARI KERJA', 337, 'JALAN UTAMA', 'LAJUR 1', 1, 3, '3', 'RAMAI LANCAR', 'MENYEBRANG', '1', '0', '0', '0', '1', '0', 'Tka', '', 'CMLJ', '2022-06-22 15:15:24', '5', '2022-06-23 09:16:21', '5', NULL);
INSERT INTO `kejadian` VALUES (13, 12, 30, 'non kecelakaan', '2022-06-27 14:14:00', '2022-06-23 14:55:00', '2022-06-23 16:44:00', 'CERAH', 'HARI KERJA', 14, NULL, 'LAJUR 1', NULL, NULL, '24', 'PADAT', 'MENYEBRANG', '0', '0', '0', '0', '0', '0', 'Tka', '', 'CMNP', '2022-06-23 14:55:14', '4', '2022-06-23 16:47:00', '4', NULL);
INSERT INTO `kejadian` VALUES (14, 12, 31, 'non kecelakaan', '2022-06-27 09:49:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'CERAH', 'HARI KERJA', 334, NULL, 'LAJUR 2', NULL, NULL, '5', 'PADAT', '', '0', '0', '0', '0', '0', '0', '', '', 'CMNP', '2022-06-27 09:49:00', '4', '2022-06-27 09:49:30', '4', NULL);

-- ----------------------------
-- Table structure for korban_kecelakaan
-- ----------------------------
DROP TABLE IF EXISTS `korban_kecelakaan`;
CREATE TABLE `korban_kecelakaan`  (
  `id_korban` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `nama_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenkel_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `notlp_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sim_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ktp_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi_korban` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `catatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_korban`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of korban_kecelakaan
-- ----------------------------
INSERT INTO `korban_kecelakaan` VALUES (3, 12, 'Heru Aji', 'laki-laki', '081544976315', '795521124589', '9875216314456', 'Jatiasih', 'LUKA RINGAN', 'Dilarikan ke rumah sakit', '', 'CMLJ', '2022-06-22 16:49:52', '5', '2022-06-22 16:49:52', '5', NULL);

-- ----------------------------
-- Table structure for master_mobil
-- ----------------------------
DROP TABLE IF EXISTS `master_mobil`;
CREATE TABLE `master_mobil`  (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nopol_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mobil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_mobil
-- ----------------------------
INSERT INTO `master_mobil` VALUES (1, 'E - 01', 'ELANG-07', 'PATROLI', 'B 1070 UYF', 'CMNP', 'aktif', '2022-04-27 09:08:16', '12', '2022-06-22 13:27:21', '4', NULL);
INSERT INTO `master_mobil` VALUES (2, 'E - 02', 'ELANG-08', 'PATROLI', 'B 2345 XB', 'CMNP', 'aktif', '2022-04-27 09:08:55', '12', '2022-06-22 13:27:39', '4', NULL);
INSERT INTO `master_mobil` VALUES (3, 'G 01', 'Derek 1', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:09:38', '12', '2022-06-22 13:27:42', '4', NULL);
INSERT INTO `master_mobil` VALUES (4, 'G 02', 'Derek 2', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:10:48', '12', '2022-06-22 13:27:46', '4', NULL);
INSERT INTO `master_mobil` VALUES (5, 'G 03', 'Derek 3', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:11:48', '12', '2022-06-22 13:27:52', '4', NULL);
INSERT INTO `master_mobil` VALUES (6, 'G 04', 'Derek 4', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:12:22', '12', '2022-06-22 13:27:57', '4', NULL);
INSERT INTO `master_mobil` VALUES (7, 'G 05', 'Derek 5', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:12:48', '12', '2022-06-22 13:28:01', '4', NULL);
INSERT INTO `master_mobil` VALUES (8, 'G 06', 'Derek 6', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:14:01', '12', '2022-06-22 13:28:09', '4', NULL);
INSERT INTO `master_mobil` VALUES (9, 'G 07', 'Derek 7', 'DEREK', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:14:34', '12', '2022-06-22 13:28:21', '4', NULL);
INSERT INTO `master_mobil` VALUES (10, 'K.920', 'Kijang 920', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:15:22', '12', '2022-06-22 13:28:25', '4', NULL);
INSERT INTO `master_mobil` VALUES (11, 'K.921', 'Kijang 921', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:16:54', '12', '2022-06-22 13:28:57', '4', NULL);
INSERT INTO `master_mobil` VALUES (12, 'K.922', 'Kijang 922', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:17:57', '12', '2022-06-22 13:29:03', '4', NULL);
INSERT INTO `master_mobil` VALUES (13, 'K.923', 'Kijang 923', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:18:33', '12', '2022-06-22 13:29:08', '4', NULL);
INSERT INTO `master_mobil` VALUES (14, 'K.924', 'Kijang 924', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:18:57', '12', '2022-06-22 13:29:12', '4', NULL);
INSERT INTO `master_mobil` VALUES (15, 'K.925', 'Kijang 925', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:19:34', '12', '2022-06-22 13:29:21', '4', NULL);
INSERT INTO `master_mobil` VALUES (16, 'K.926', 'Kijang 926', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:20:05', '12', '2022-06-22 13:29:25', '4', NULL);
INSERT INTO `master_mobil` VALUES (17, 'K.927', 'Kijang 927', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:20:32', '12', '2022-06-22 13:29:30', '4', NULL);
INSERT INTO `master_mobil` VALUES (18, 'K.928', 'Kijang 928', 'PATROLI', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:21:04', '12', '2022-06-22 13:29:43', '4', NULL);
INSERT INTO `master_mobil` VALUES (19, 'K 01', 'Kuda 01', 'AMBULANCE', 'B 1234 BB', 'CMNP', 'aktif', '2022-04-27 09:22:17', '12', '2022-06-22 13:29:47', '4', NULL);
INSERT INTO `master_mobil` VALUES (20, 'K 02', 'Kuda 02', 'AMBULANCE', 'B 1234 BB', 'CMNP', 'aktif', '2022-04-27 09:23:59', '12', '2022-06-22 13:29:51', '4', NULL);
INSERT INTO `master_mobil` VALUES (21, 'RSC', 'Rescue', 'RESCUE', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:24:43', '12', '2022-06-22 13:30:16', '4', NULL);
INSERT INTO `master_mobil` VALUES (22, 'Z 00', 'Zebra 0', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:26:12', '12', '2022-06-22 13:30:21', '4', NULL);
INSERT INTO `master_mobil` VALUES (23, 'Z 01', 'Zebra 1', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:26:52', '12', '2022-06-22 13:30:28', '4', NULL);
INSERT INTO `master_mobil` VALUES (24, 'Z 02', 'Zebra 2', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:27:19', '12', '2022-06-22 13:30:33', '4', NULL);
INSERT INTO `master_mobil` VALUES (25, 'Z 03', 'Zebra 3', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:27:48', '12', '2022-06-22 13:30:39', '4', NULL);
INSERT INTO `master_mobil` VALUES (26, 'Z 04', 'Zebra 4', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:28:12', '12', '2022-06-22 13:30:45', '4', NULL);
INSERT INTO `master_mobil` VALUES (27, 'Z 05', 'Zebra 5', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:28:37', '12', '2022-06-22 13:30:55', '4', NULL);
INSERT INTO `master_mobil` VALUES (28, 'Z 06', 'Zebra 6', 'ZEBRA', 'B 12345 BB', 'CMNP', 'aktif', '2022-04-27 09:29:12', '12', '2022-06-22 13:31:01', '4', NULL);
INSERT INTO `master_mobil` VALUES (29, 'C-00', 'CRANE', 'DEREK', 'B 9999 CMP', 'CMNP', 'aktif', '2022-04-27 09:30:50', '12', '2022-06-22 13:31:07', '4', NULL);
INSERT INTO `master_mobil` VALUES (30, 'PPGT ', 'PPGT ', 'LAIN-LAIN', 'B 1234 BBB', 'CMNP', 'aktif', '2022-04-27 09:32:28', '12', '2022-06-22 13:31:16', '4', NULL);
INSERT INTO `master_mobil` VALUES (31, 'BTN', 'BETON', 'LAIN-LAIN', 'B 456 XXX', 'CMNP', 'aktif', '2022-04-27 09:33:18', '12', '2022-06-22 13:31:24', '4', NULL);
INSERT INTO `master_mobil` VALUES (32, 'GNI', 'GNI', 'LAIN-LAIN', 'B 1234 BBB', 'CMNP', 'aktif', '2022-04-27 09:33:58', '12', '2022-06-22 13:31:30', '4', NULL);
INSERT INTO `master_mobil` VALUES (33, 'URC', 'BISON', 'LAIN-LAIN', 'B 9999 URC', 'CMNP', 'aktif', '2022-04-27 09:34:24', '12', '2022-06-22 13:31:35', '4', NULL);
INSERT INTO `master_mobil` VALUES (34, '1.', 'SWEEPER', 'LAIN-LAIN', 'B 1112 XXX', 'CMNP', 'aktif', '2022-04-27 09:35:09', '12', '2022-06-22 13:31:40', '4', NULL);
INSERT INTO `master_mobil` VALUES (35, '2.', 'TANGKI', 'LAIN-LAIN', 'B 1111 XXX', 'CMNP', 'aktif', '2022-04-27 09:35:38', '12', '2022-06-22 13:31:46', '4', NULL);
INSERT INTO `master_mobil` VALUES (36, 'LAIN2', 'Lain-lain', 'LAIN-LAIN', 'B 1234 BBB', 'CMNP', 'aktif', '2022-04-27 09:36:07', '12', '2022-06-22 13:31:50', '4', NULL);
INSERT INTO `master_mobil` VALUES (37, 'E - 07', 'ELANG-07', 'PATROLI', 'G 5191 KJ', 'CMLJ', 'aktif', '2022-06-22 13:34:15', '5', '2022-06-22 13:34:15', '5', NULL);
INSERT INTO `master_mobil` VALUES (38, 'E - 08', 'ELANG-08', 'PATROLI', 'G 5090 ABV', 'CMLJ', 'aktif', '2022-06-22 13:34:53', '5', '2022-06-22 13:34:53', '5', NULL);

-- ----------------------------
-- Table structure for master_petugas
-- ----------------------------
DROP TABLE IF EXISTS `master_petugas`;
CREATE TABLE `master_petugas`  (
  `id_pt` int(11) NOT NULL AUTO_INCREMENT,
  `nip_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kodepos_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kota_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `notlp_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nohp_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_atasan_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pt`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_petugas
-- ----------------------------
INSERT INTO `master_petugas` VALUES (0, NULL, 'Tidak Ada Petugas', NULL, '  ', '', '', '', '', '', NULL, NULL, NULL, NULL, '2022-04-19 08:56:18', '12', '2022-04-20 09:59:36', '12', NULL);
INSERT INTO `master_petugas` VALUES (45, 'M7429421', 'Rendi Priyadi', 'SENKOM', 'Jatiasih', '17422', 'Bekasi', '083783568981', '021463666564', 'admin@gmail.com', 'aktif', 'CMNP', 'EKo Julianto', '', '2022-06-22 11:36:41', '1', '2022-06-22 11:36:41', '1', NULL);
INSERT INTO `master_petugas` VALUES (46, 'M20220012', 'Rendi Orton', 'PATROLI', 'Jatiasih', '17422', 'Bekasi', '083783568981', '021463666564', 'admin@gmail.com', 'aktif', 'CMNP', 'EKo Julianto', '', '2022-06-22 11:38:16', '1', '2022-06-22 11:38:16', '1', NULL);
INSERT INTO `master_petugas` VALUES (47, 'M20220034', 'Eri Ganteng', 'SENKOM', 'Pondok Gede', '17422', 'Bekasi', '083783568981', '021463666564', 'admin@gmail.com', 'aktif', 'CMLJ', 'EKo Julianto', '', '2022-06-22 11:42:59', '5', '2022-06-22 11:42:59', '5', NULL);
INSERT INTO `master_petugas` VALUES (48, 'M20220876', 'Eri Tonang', 'PATROLI', 'Pondok Gede', '17422', 'Bekasi', '083783568981', '021463666564', 'admin@gmail.com', 'aktif', 'CMLJ', 'EKo Julianto', '', '2022-06-22 11:43:46', '5', '2022-06-22 11:43:46', '5', NULL);

-- ----------------------------
-- Table structure for mobil_korban
-- ----------------------------
DROP TABLE IF EXISTS `mobil_korban`;
CREATE TABLE `mobil_korban`  (
  `id_mobil_korban` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `jenis_mobil_korban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `golongan_mobil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `merk_mobil_korban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nopol_mobil_korban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mobil_derek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `warna_mobil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi_kendaraan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `catatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mobil_korban`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobil_korban
-- ----------------------------
INSERT INTO `mobil_korban` VALUES (8, 11, 'BUS', 'GOLONGAN 3', 'Toyota Avanza', 'G 5191 AVG', 'DEREK 1', 'Putih', 'TIDAK RUSAK', 'Tka', '', 'CMNP', '2022-06-22 16:52:26', '4', '2022-06-22 16:52:26', '4', NULL);
INSERT INTO `mobil_korban` VALUES (9, 12, 'MINIBUS', 'GOLONGAN 4', 'Daihatsu Ayla', 'B 8754 KJL', 'DEREK 2', 'Merah', 'RUSAK RINGAN', 'Tka', '', 'CMLJ', '2022-06-22 16:53:06', '5', '2022-06-22 16:53:06', '5', NULL);

-- ----------------------------
-- Table structure for mobil_petugas
-- ----------------------------
DROP TABLE IF EXISTS `mobil_petugas`;
CREATE TABLE `mobil_petugas`  (
  `id_mobil_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `pemakaian_mobil_id` int(11) NULL DEFAULT NULL,
  `waktu_tiba` datetime(0) NULL DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mobil_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobil_petugas
-- ----------------------------
INSERT INTO `mobil_petugas` VALUES (9, 11, 41, '2022-06-22 16:56:00', 'Ok', 'CMNP', '2022-06-22 16:56:32', '4', '2022-06-22 16:56:32', '4', NULL);
INSERT INTO `mobil_petugas` VALUES (10, 12, 42, '2022-06-22 16:30:00', 'Tka', 'CMLJ', '2022-06-22 16:56:52', '5', '2022-06-22 16:56:52', '5', NULL);
INSERT INTO `mobil_petugas` VALUES (11, 13, 41, '0000-00-00 00:00:00', 'Ok', 'CMNP', '2022-06-23 16:45:17', '4', '2022-06-23 16:45:17', '4', NULL);

-- ----------------------------
-- Table structure for pemakaian_bbm
-- ----------------------------
DROP TABLE IF EXISTS `pemakaian_bbm`;
CREATE TABLE `pemakaian_bbm`  (
  `id_bbm` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_bbm` datetime(0) NULL DEFAULT NULL,
  `mobil_id` int(11) NULL DEFAULT NULL,
  `jenis_bbm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_bbm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `shift_bbm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_bbm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemakaian_bbm
-- ----------------------------
INSERT INTO `pemakaian_bbm` VALUES (3, '2022-06-22 16:19:00', 3, 'Pertalite', '30 liter', '2', 'CMNP', '2022-06-22 16:20:07', '4', '2022-06-22 16:20:07', '4', NULL);
INSERT INTO `pemakaian_bbm` VALUES (4, '2022-06-22 16:20:00', 4, 'Pertalite', '50 Liter', '2', 'CMLJ', '2022-06-22 16:21:00', '5', '2022-06-22 16:21:00', '5', NULL);

-- ----------------------------
-- Table structure for pemakaian_mobil
-- ----------------------------
DROP TABLE IF EXISTS `pemakaian_mobil`;
CREATE TABLE `pemakaian_mobil`  (
  `id_pakai_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pakai_mobil` date NULL DEFAULT NULL,
  `mobil_id` int(11) NULL DEFAULT NULL,
  `id_pt1` int(11) NULL DEFAULT NULL,
  `id_pt2` int(11) NULL DEFAULT NULL,
  `id_pt3` int(11) NULL DEFAULT NULL,
  `id_pt4` int(11) NULL DEFAULT NULL,
  `shift_mobil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `odo_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `odo_akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pakai_mobil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemakaian_mobil
-- ----------------------------
INSERT INTO `pemakaian_mobil` VALUES (41, '2022-06-22', 1, 46, 0, 0, 0, '1', '', '', 'CMNP', '2022-06-22 14:37:28', '4', '2022-06-23 16:52:51', '4', NULL);
INSERT INTO `pemakaian_mobil` VALUES (42, '2022-06-22', 38, 48, 0, 0, 0, '1', '', '', 'CMLJ', '2022-06-22 14:38:47', '5', '2022-06-22 14:38:47', '5', NULL);
INSERT INTO `pemakaian_mobil` VALUES (43, '2022-06-24', 23, 46, 0, 0, 0, '1', '', '', 'CMNP', '2022-06-24 14:52:29', '4', '2022-06-24 14:52:29', '4', NULL);

-- ----------------------------
-- Table structure for penerimaan_laporan
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan_laporan`;
CREATE TABLE `penerimaan_laporan`  (
  `id_pelapor` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `no_laporan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_laporan` datetime(0) NULL DEFAULT NULL,
  `nama_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `notlp_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `informasi_id` int(11) NULL DEFAULT NULL,
  `gangguan_id` int(11) NULL DEFAULT NULL,
  `keterangan_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelapor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penerimaan_laporan
-- ----------------------------
INSERT INTO `penerimaan_laporan` VALUES (10, 11, 'NKH220622001', '2022-06-22 14:48:00', 'Ucok', 'PELAYANAN', '', '', 10, 3, '', '', 'CMNP', '2022-06-22 14:48:53', '4', '2022-06-23 09:11:57', '4', NULL);
INSERT INTO `penerimaan_laporan` VALUES (11, 12, 'NKH220622002', '2022-06-22 14:49:00', 'Joko', 'PELAYANAN', 'joko_tole', '', 14, 4, 'Ban Kempes di Km 200', '', 'CMLJ', '2022-06-22 14:50:17', '5', '2022-06-23 09:12:08', '5', NULL);
INSERT INTO `penerimaan_laporan` VALUES (12, NULL, 'NKH230622001', '2022-06-23 14:53:00', 'Sugeng', 'PELAYANAN', '@sugeng', '083783568981', 15, 24, 'Mobil Rem Blong', '', 'CMNP', '2022-06-23 14:54:59', '4', '2022-06-23 14:54:59', '4', NULL);

-- ----------------------------
-- Table structure for penyebab
-- ----------------------------
DROP TABLE IF EXISTS `penyebab`;
CREATE TABLE `penyebab`  (
  `id_penyebab` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_penyebab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_penyebab`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penyebab
-- ----------------------------
INSERT INTO `penyebab` VALUES (1, 'PENGEMUDI-LENGAH / KURANG HATI - HATI', '2022-04-27 13:22:38', '12', '2022-04-27 13:22:38', '12', NULL);
INSERT INTO `penyebab` VALUES (2, 'PENGEMUDI-TIDAK TERAMPIL', '2022-04-27 13:22:50', '12', '2022-04-27 13:22:50', '12', NULL);
INSERT INTO `penyebab` VALUES (3, 'PENGEMUDI-LELAH / NGANTUK', '2022-04-27 13:23:02', '12', '2022-04-27 13:23:02', '12', NULL);
INSERT INTO `penyebab` VALUES (4, 'PENGEMUDI-MABUK', '2022-04-27 13:23:10', '12', '2022-04-27 13:23:10', '12', NULL);
INSERT INTO `penyebab` VALUES (5, 'PENGEMUDI-TIDAK TERTIB MENGEMUDI', '2022-04-27 13:23:20', '12', '2022-04-27 13:23:20', '12', NULL);
INSERT INTO `penyebab` VALUES (6, 'PENGEMUDI-LAIN - LAIN', '2022-04-27 13:23:28', '12', '2022-04-27 13:23:28', '12', NULL);
INSERT INTO `penyebab` VALUES (7, 'KENDARAAN-PECAH BAN', '2022-04-27 13:23:38', '12', '2022-04-27 13:23:38', '12', NULL);
INSERT INTO `penyebab` VALUES (8, 'KENDARAAN-BAN GUNDUL', '2022-04-27 13:23:47', '12', '2022-04-27 13:23:47', '12', NULL);
INSERT INTO `penyebab` VALUES (9, 'KENDARAAN-KERUSAKAN SISTEM REM', '2022-04-27 13:23:57', '12', '2022-04-27 13:23:57', '12', NULL);
INSERT INTO `penyebab` VALUES (10, 'KENDARAAN-KERUSAKAN MESIN', '2022-04-27 13:24:07', '12', '2022-04-27 13:24:07', '12', NULL);
INSERT INTO `penyebab` VALUES (11, 'KENDARAAN-SISTEM PENERANGAN', '2022-04-27 13:24:18', '12', '2022-04-27 13:24:18', '12', NULL);
INSERT INTO `penyebab` VALUES (12, 'KENDARAAN-TERTIB MUATAN', '2022-04-27 13:24:28', '12', '2022-04-27 13:24:28', '12', NULL);
INSERT INTO `penyebab` VALUES (13, 'KENDARAAN-LAIN - LAIN', '2022-04-27 13:24:37', '12', '2022-04-27 13:24:37', '12', NULL);
INSERT INTO `penyebab` VALUES (14, 'JALAN-KERUSAKAN JALAN', '2022-04-27 13:24:48', '12', '2022-04-27 13:24:48', '12', NULL);
INSERT INTO `penyebab` VALUES (15, 'JALAN-PERLENGKAPAN JALAN', '2022-04-27 13:24:56', '12', '2022-04-27 13:24:56', '12', NULL);
INSERT INTO `penyebab` VALUES (16, 'JALAN-LAIN - LAIN', '2022-04-27 13:25:03', '12', '2022-04-27 13:25:03', '12', NULL);
INSERT INTO `penyebab` VALUES (17, 'LINGKUNGAN-PENYEBERANG JALAN', '2022-04-27 13:25:11', '12', '2022-04-27 13:25:11', '12', NULL);
INSERT INTO `penyebab` VALUES (18, 'LINGKUNGAN-MENGHINDARI HEWAN', '2022-04-27 13:25:19', '12', '2022-04-27 13:25:19', '12', NULL);
INSERT INTO `penyebab` VALUES (19, 'LINGKUNGAN-GANGGUAN KAMTIBMAS', '2022-04-27 13:25:28', '12', '2022-04-27 13:25:28', '12', NULL);
INSERT INTO `penyebab` VALUES (20, 'LINGKUNGAN-MATERIAL DI JALAN', '2022-04-27 13:25:37', '12', '2022-04-27 13:25:37', '12', NULL);
INSERT INTO `penyebab` VALUES (21, 'LINGKUNGAN-LAIN - LAIN', '2022-04-27 13:25:46', '12', '2022-04-27 13:25:46', '12', NULL);

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas`  (
  `id_pthariini` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_tugas` date NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `jam_shift` time(0) NULL DEFAULT NULL,
  `id_pt1` int(11) NULL DEFAULT NULL,
  `id_pt2` int(11) NULL DEFAULT NULL,
  `id_pt3` int(11) NULL DEFAULT NULL,
  `id_pt4` int(11) NULL DEFAULT NULL,
  `shift` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pthariini`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES (45, '2022-06-22', 4, '14:00:50', 45, 0, 0, 0, '1', 'CMNP', '2022-06-22 14:00:50', '4', '2022-06-22 14:00:50', '4', NULL);
INSERT INTO `petugas` VALUES (46, '2022-06-22', 5, '14:03:35', 47, 0, 0, 0, '1', 'CMLJ', '2022-06-22 14:03:35', '5', '2022-06-22 14:03:35', '5', NULL);
INSERT INTO `petugas` VALUES (47, '2022-06-23', 4, '08:58:12', 45, 0, 0, 0, '1', 'CMNP', '2022-06-23 08:58:12', '4', '2022-06-23 08:58:12', '4', NULL);
INSERT INTO `petugas` VALUES (48, '2022-06-23', 5, '08:58:31', 47, 0, 0, 0, '1', 'CMLJ', '2022-06-23 08:58:31', '5', '2022-06-23 08:58:31', '5', NULL);
INSERT INTO `petugas` VALUES (49, '2022-06-24', 4, '10:25:02', 45, 0, 0, 0, '1', 'CMNP', '2022-06-24 10:25:02', '4', '2022-06-24 10:25:02', '4', NULL);
INSERT INTO `petugas` VALUES (50, '2022-06-24', 5, '10:29:25', 47, 0, 0, 0, '1', 'CMLJ', '2022-06-24 10:29:25', '5', '2022-06-24 10:29:25', '5', NULL);
INSERT INTO `petugas` VALUES (51, '2022-06-27', 4, '09:10:11', 45, 0, 0, 0, '1', 'CMNP', '2022-06-27 09:10:11', '4', '2022-06-27 09:10:11', '4', NULL);
INSERT INTO `petugas` VALUES (52, '2022-06-27', 5, '10:16:58', 47, 0, 0, 0, '1', 'CMLJ', '2022-06-27 10:16:58', '5', '2022-06-27 10:16:58', '5', NULL);

-- ----------------------------
-- Table structure for sta_system
-- ----------------------------
DROP TABLE IF EXISTS `sta_system`;
CREATE TABLE `sta_system`  (
  `id_sta` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ruas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wilayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `km` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jalur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi_jalanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alinyemen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `latitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 339 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sta_system
-- ----------------------------
INSERT INTO `sta_system` VALUES (1, '10+200 Lajur A', 'SERAH TERIMA TUGAS', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:42:52', '12', '2022-05-17 09:47:06', '12', NULL);
INSERT INTO `sta_system` VALUES (2, '13+000 Jalur A', '13+000', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:45:21', '12', '2022-04-27 09:45:21', '12', NULL);
INSERT INTO `sta_system` VALUES (3, '13+000 Jalur B', '13+000', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:47:13', '12', '2022-04-27 09:47:13', '12', NULL);
INSERT INTO `sta_system` VALUES (4, '12+200 Jalur A', '12+200', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:49:09', '12', '2022-04-27 09:49:09', '12', NULL);
INSERT INTO `sta_system` VALUES (5, '12+400 Jalur A', '12+400', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:50:07', '12', '2022-04-27 09:50:07', '12', NULL);
INSERT INTO `sta_system` VALUES (6, '12+600 Jalur A', '12+600', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:50:32', '12', '2022-04-27 09:50:32', '12', NULL);
INSERT INTO `sta_system` VALUES (7, '12+800 Jalur A', '12+800', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:52:15', '12', '2022-04-27 09:52:15', '12', NULL);
INSERT INTO `sta_system` VALUES (8, '12+200 Jalur B', '12+200', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:52:42', '12', '2022-04-27 09:52:42', '12', NULL);
INSERT INTO `sta_system` VALUES (9, '12+400 Jalur B', '12+400', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:54:23', '12', '2022-04-27 09:54:23', '12', NULL);
INSERT INTO `sta_system` VALUES (10, '12+600 Jalur B', '12+600', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:54:56', '12', '2022-04-27 09:54:56', '12', NULL);
INSERT INTO `sta_system` VALUES (11, '12+800 Jalur B', '12+800', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:55:47', '12', '2022-04-27 09:55:47', '12', NULL);
INSERT INTO `sta_system` VALUES (12, '12+800 Lajur B', '12+800 B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:56:53', '12', '2022-04-27 09:56:53', '12', NULL);
INSERT INTO `sta_system` VALUES (13, '17+800 Lajur A', 'OFF RAMP ANCOL TIMUR', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:58:28', '12', '2022-04-27 09:58:28', '12', NULL);
INSERT INTO `sta_system` VALUES (14, '11+000 B', 'ON RAMP PODOMORO', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 09:59:34', '12', '2022-04-27 09:59:34', '12', NULL);
INSERT INTO `sta_system` VALUES (15, '12+800 Lajur A', '12+800 ARAH PRIOK', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:01:39', '12', '2022-04-27 10:01:39', '12', NULL);
INSERT INTO `sta_system` VALUES (16, '12+600 B', '12+600 DARI GT. PRIOK 1', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:02:15', '12', '2022-04-27 10:02:15', '12', NULL);
INSERT INTO `sta_system` VALUES (17, '12+600 A', '12+600 ARAH PRIOK', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:02:55', '12', '2022-04-27 10:02:55', '12', NULL);
INSERT INTO `sta_system` VALUES (18, '22+600 B', 'ON RAMP GEDONG PANJANG 2', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:04:18', '12', '2022-04-27 10:04:18', '12', NULL);
INSERT INTO `sta_system` VALUES (19, '13+600 B', 'ON RAMP KEBON BAWANG', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:05:04', '12', '2022-04-27 10:05:04', '12', NULL);
INSERT INTO `sta_system` VALUES (20, '13+600 A', 'OFF RAMP KEBON BAWANG', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:05:45', '12', '2022-04-27 10:05:45', '12', NULL);
INSERT INTO `sta_system` VALUES (21, '13+000 B', 'ON RAMP PRIOK 1', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:06:16', '12', '2022-04-27 10:06:16', '12', NULL);
INSERT INTO `sta_system` VALUES (22, '13+000 A', 'OFF RAMP PRIOK 1', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:06:45', '12', '2022-04-27 10:06:45', '12', NULL);
INSERT INTO `sta_system` VALUES (23, '25+600 B', 'ON RAMP PLUIT', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 10:07:39', '12', '2022-04-27 10:07:39', '12', NULL);
INSERT INTO `sta_system` VALUES (24, '00+000 Jalur A', 'INTERCHANGE CAWANG', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,221492', '106,8747', 'CMNP', '2022-04-27 10:09:23', '12', '2022-04-27 10:09:23', '12', NULL);
INSERT INTO `sta_system` VALUES (25, '00+200 Jalur A', 'KM 00+200 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,222111', '106,8747', 'CMNP', '2022-04-27 10:10:12', '12', '2022-04-27 10:10:12', '12', NULL);
INSERT INTO `sta_system` VALUES (26, '00+400 Jalur A', 'KM 00+400 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,22258', '106,8748', 'CMNP', '2022-04-27 10:10:58', '12', '2022-04-27 10:10:58', '12', NULL);
INSERT INTO `sta_system` VALUES (27, '00+600 Jalur A', 'KM 00+600 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,222772', '106,8742', 'CMNP', '2022-04-27 10:11:43', '12', '2022-04-27 10:11:43', '12', NULL);
INSERT INTO `sta_system` VALUES (28, '00+800 Jalur A', 'KM 00+800 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220895', '106,8742', 'CMNP', '2022-04-27 10:12:43', '12', '2022-04-27 10:12:43', '12', NULL);
INSERT INTO `sta_system` VALUES (29, '00-200 Jalur A', 'KM 00-200 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220276', '106,8742', 'CMNP', '2022-04-27 10:13:30', '12', '2022-04-27 10:13:30', '12', NULL);
INSERT INTO `sta_system` VALUES (30, '00-300 Jalur A', 'KM 00-300 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219721', '106,8742', 'CMNP', '2022-04-27 10:14:08', '12', '2022-04-27 10:14:08', '12', NULL);
INSERT INTO `sta_system` VALUES (31, '01+000 Jalur A', 'KM 01+000 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219252', '106,8741', 'CMNP', '2022-04-27 10:14:55', '12', '2022-04-27 10:14:55', '12', NULL);
INSERT INTO `sta_system` VALUES (32, '01+200 Jalur A', 'KM 01+200 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219231', '106,8745', 'CMNP', '2022-04-27 10:15:36', '12', '2022-04-27 10:15:36', '12', NULL);
INSERT INTO `sta_system` VALUES (33, '01+400 Jalur A', 'KM 01+400 Jalur A', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219657', '106,8746', 'CMNP', '2022-04-27 10:16:22', '12', '2022-04-27 10:16:22', '12', NULL);
INSERT INTO `sta_system` VALUES (34, '01+600 Jalur A', 'ON RAMP KEBON NANAS', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220191', '106,8746', 'CMNP', '2022-04-27 10:17:54', '12', '2022-04-27 10:17:54', '12', NULL);
INSERT INTO `sta_system` VALUES (35, '01+800 Jalur A', 'KM 01+800 Jalur A', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,220745', '106,8747', 'CMNP', '2022-04-27 10:22:58', '12', '2022-04-27 10:22:58', '12', NULL);
INSERT INTO `sta_system` VALUES (36, '02+000 Jalur A', 'KM 01+800 Jalur A', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,220852', '106,8741', 'CMNP', '2022-04-27 10:25:51', '12', '2022-04-27 10:25:51', '12', NULL);
INSERT INTO `sta_system` VALUES (37, '02+200 Jalur A', 'KM 02+200 Jalur A', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,219295', '106,8741', 'CMNP', '2022-04-27 10:28:03', '12', '2022-04-27 10:28:03', '12', NULL);
INSERT INTO `sta_system` VALUES (38, '02+400 Jalur A', 'OFF RAMP PEDATI', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,218399', '106,8741', 'CMNP', '2022-04-27 10:29:43', '12', '2022-04-27 10:29:43', '12', NULL);
INSERT INTO `sta_system` VALUES (39, '02+600 Jalur A', 'KM 02+600 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217802', '106,8741', 'CMNP', '2022-04-27 10:33:37', '12', '2022-04-27 10:33:37', '12', NULL);
INSERT INTO `sta_system` VALUES (40, '02+800 Jalur A', 'KM 02+800 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21746', '106,8741', 'CMNP', '2022-04-27 10:34:36', '12', '2022-04-27 10:34:36', '12', NULL);
INSERT INTO `sta_system` VALUES (41, '03+000 Jalur A', 'KM 03+000 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21746', '106,8745', 'CMNP', '2022-04-27 10:36:04', '12', '2022-04-27 10:36:04', '12', NULL);
INSERT INTO `sta_system` VALUES (42, '03+200 Jalur A', 'KM 03+200 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,216735', '106,8745', 'CMNP', '2022-04-27 10:36:52', '12', '2022-04-27 10:36:52', '12', NULL);
INSERT INTO `sta_system` VALUES (43, '03+400 Jalur A', 'KM 03+400 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217204', '106,8745', 'CMNP', '2022-04-27 10:37:40', '12', '2022-04-27 10:37:40', '12', NULL);
INSERT INTO `sta_system` VALUES (44, '03+600 Jalur A', 'KM 03+600 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217375', '106,8745', 'CMNP', '2022-04-27 10:38:50', '12', '2022-04-27 10:38:50', '12', NULL);
INSERT INTO `sta_system` VALUES (45, '03+800 Jalur A', 'KM 03+800 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217524', '106,8739', 'CMNP', '2022-04-27 10:39:30', '12', '2022-04-27 10:39:30', '12', NULL);
INSERT INTO `sta_system` VALUES (46, '04+000 Jalur A', 'KM 04+000 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,215647', '106,8739', 'CMNP', '2022-04-27 10:40:22', '12', '2022-04-27 10:40:22', '12', NULL);
INSERT INTO `sta_system` VALUES (47, '04+400 Jalur A', 'KM 04+400 Jalur A', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,214325', '106,8739', 'CMNP', '2022-04-27 10:41:11', '12', '2022-04-27 10:41:11', '12', NULL);
INSERT INTO `sta_system` VALUES (48, '04+200 Jalur A', 'ON RAMP JATINEGARA', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21505', '106,874', 'CMNP', '2022-04-27 10:41:44', '12', '2022-04-27 10:41:44', '12', NULL);
INSERT INTO `sta_system` VALUES (49, '04+600 Jalur A', 'KM 04+600 Jalur A', 'Jatinegara - Rawamangun', 'JATINEGARA', NULL, NULL, NULL, NULL, NULL, '-6,21377', '106,8739', 'CMNP', '2022-04-27 10:44:19', '12', '2022-04-27 10:44:19', '12', NULL);
INSERT INTO `sta_system` VALUES (50, '04+800 Jalur A', 'KM 04+800 Jalur A', 'Jatinegara - Rawamangun', 'JATINEGARA', NULL, NULL, NULL, NULL, NULL, '-6,213727', '106,8744', 'CMNP', '2022-04-27 10:45:23', '12', '2022-04-27 10:45:23', '12', NULL);
INSERT INTO `sta_system` VALUES (51, '05+000 Jalur A', 'KM 05+000 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21441', '106,8744', 'CMNP', '2022-04-27 10:46:38', '12', '2022-04-27 10:46:38', '12', NULL);
INSERT INTO `sta_system` VALUES (52, '05+040 Jalur A', 'KM 05+040 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,215007', '106,8744', 'CMNP', '2022-04-27 10:47:43', '12', '2022-04-27 10:47:43', '12', NULL);
INSERT INTO `sta_system` VALUES (53, '05+080 Jalur A', 'KM 05+080 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,215604', '106,8744', 'CMNP', '2022-04-27 10:49:13', '12', '2022-04-27 10:49:13', '12', NULL);
INSERT INTO `sta_system` VALUES (54, '05+120 Jalur A', 'KM 05+120 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21569', '106,8738', 'CMNP', '2022-04-27 10:50:03', '12', '2022-04-27 10:50:03', '12', NULL);
INSERT INTO `sta_system` VALUES (55, '05+160 Jalur A', 'KM 05+160 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213599', '106,8738', 'CMNP', '2022-04-27 10:51:15', '12', '2022-04-27 10:51:15', '12', NULL);
INSERT INTO `sta_system` VALUES (56, '05+200 Jalur A', 'OFF RAMP RAWAMANGUN', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212831', '106,8738', 'CMNP', '2022-04-27 10:51:53', '12', '2022-04-27 10:51:53', '12', NULL);
INSERT INTO `sta_system` VALUES (57, '05+400 Jalur A', 'KM 05+400 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212362', '106,8738', 'CMNP', '2022-04-27 10:52:29', '12', '2022-04-27 10:52:29', '12', NULL);
INSERT INTO `sta_system` VALUES (58, '05+600 Jalur A', 'KM 05+600 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211722', '106,8738', 'CMNP', '2022-04-27 10:53:07', '12', '2022-04-27 10:53:07', '12', NULL);
INSERT INTO `sta_system` VALUES (59, '05+800 Jalur A', 'KM 05+800 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211658', '106,8742', 'CMNP', '2022-04-27 10:54:35', '12', '2022-04-27 10:54:35', '12', NULL);
INSERT INTO `sta_system` VALUES (60, '06+000 Jalur A', 'KM 06+000 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212149', '106,8743', 'CMNP', '2022-04-27 10:56:17', '12', '2022-04-27 10:56:17', '12', NULL);
INSERT INTO `sta_system` VALUES (61, '06+200 Jalur A', 'KM 06+200 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212639', '106,8743', 'CMNP', '2022-04-27 10:58:38', '12', '2022-04-27 10:58:38', '12', NULL);
INSERT INTO `sta_system` VALUES (62, '06+400 Jalur A', 'KM 06+400 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213194', '106,8743', 'CMNP', '2022-04-27 10:59:26', '12', '2022-04-27 10:59:26', '12', NULL);
INSERT INTO `sta_system` VALUES (63, '06+600 Jalur A', 'KM 06+600 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213557', '106,8744', 'CMNP', '2022-04-27 11:01:05', '12', '2022-04-27 11:01:05', '12', NULL);
INSERT INTO `sta_system` VALUES (64, '06+800 Jalur A', 'KM 06+800 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213578', '106,8737', 'CMNP', '2022-04-27 11:01:51', '12', '2022-04-27 11:01:51', '12', NULL);
INSERT INTO `sta_system` VALUES (65, '07+000 Jalur A', 'KM 07+000 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211786', '106,8738', 'CMNP', '2022-04-27 11:02:43', '12', '2022-04-27 11:02:43', '12', NULL);
INSERT INTO `sta_system` VALUES (66, '07+400 Jalur A', 'KM 07+400 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,2104', '106,8738', 'CMNP', '2022-04-27 11:03:42', '12', '2022-04-27 11:03:42', '12', NULL);
INSERT INTO `sta_system` VALUES (67, '07+200 Jalur A', 'ON RAMP PULOMAS', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21089', '106,8738', 'CMNP', '2022-04-27 11:04:17', '12', '2022-04-27 11:04:17', '12', NULL);
INSERT INTO `sta_system` VALUES (68, '07+600 Jalur A', 'KM 07+600 Jalur A', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,209909', '106,8737', 'CMNP', '2022-04-27 13:30:59', '12', '2022-04-27 13:30:59', '12', NULL);
INSERT INTO `sta_system` VALUES (69, '07+800 Jalur A', 'KM 07+800 Jalur A', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,209845', '106,8742', 'CMNP', '2022-04-27 13:31:47', '12', '2022-04-27 13:31:47', '12', NULL);
INSERT INTO `sta_system` VALUES (70, '08+000 Jalur A', 'KM 08+000 Jalur A', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,210208', '106,8742', 'CMNP', '2022-04-27 13:32:38', '12', '2022-04-27 13:32:38', '12', NULL);
INSERT INTO `sta_system` VALUES (71, '08+200 Jalur A', 'KM 08+200 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,210677', '106,8742', 'CMNP', '2022-04-27 13:34:50', '12', '2022-04-27 13:34:50', '12', NULL);
INSERT INTO `sta_system` VALUES (72, '08+400 Jalur A', 'OFF RAMP CEMPAKA PUTIH', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211253', '106,8743', 'CMNP', '2022-04-27 13:35:36', '12', '2022-04-27 13:35:36', '12', NULL);
INSERT INTO `sta_system` VALUES (73, '08+600 Jalur A', 'KM 08+600 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211615', '106,8743', 'CMNP', '2022-04-27 13:37:51', '12', '2022-04-27 13:37:51', '12', NULL);
INSERT INTO `sta_system` VALUES (74, '08+800 Jalur A', 'KM 08+800 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211765', '106,8742', 'CMNP', '2022-04-27 13:38:29', '12', '2022-04-27 13:38:29', '12', NULL);
INSERT INTO `sta_system` VALUES (75, '09+000 Jalur A', 'KM 09+000 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211807', '106,8737', 'CMNP', '2022-04-27 13:39:06', '12', '2022-04-27 13:39:06', '12', NULL);
INSERT INTO `sta_system` VALUES (76, '09+200 Jalur A', 'KM 09+200 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209952', '106,8738', 'CMNP', '2022-04-27 13:39:47', '12', '2022-04-27 13:39:47', '12', NULL);
INSERT INTO `sta_system` VALUES (77, '09+240 Jalur A', 'KM 09+240 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209333', '106,8738', 'CMNP', '2022-04-27 13:40:29', '12', '2022-04-27 13:40:29', '12', NULL);
INSERT INTO `sta_system` VALUES (78, '09+280 Jalur A', 'KM 09+280 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,208629', '106,8737', 'CMNP', '2022-04-27 13:41:03', '12', '2022-04-27 13:41:03', '12', NULL);
INSERT INTO `sta_system` VALUES (79, '09+320 Jalur A', 'KM 09+320 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,208053', '106,8737', 'CMNP', '2022-04-27 13:41:37', '12', '2022-04-27 13:41:37', '12', NULL);
INSERT INTO `sta_system` VALUES (80, '09+360 Jalur A', 'KM 09+360 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,207989', '106,8741', 'CMNP', '2022-04-27 13:42:14', '12', '2022-04-27 13:42:14', '12', NULL);
INSERT INTO `sta_system` VALUES (81, '09+400 Jalur A', 'KM 09+400 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,20848', '106,8741', 'CMNP', '2022-04-27 13:42:56', '12', '2022-04-27 13:42:56', '12', NULL);
INSERT INTO `sta_system` VALUES (82, '09+600 Jalur A', 'KM 09+600 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209056', '106,8742', 'CMNP', '2022-04-27 13:43:28', '12', '2022-04-27 13:43:28', '12', NULL);
INSERT INTO `sta_system` VALUES (83, '09+800 Jalur A', 'KM 09+800 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209674', '106,8742', 'CMNP', '2022-04-27 13:44:12', '12', '2022-04-27 13:44:12', '12', NULL);
INSERT INTO `sta_system` VALUES (84, '10+000 Jalur A', 'ON RAMP SUNTER', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209973', '106,8742', 'CMNP', '2022-04-27 13:44:57', '12', '2022-04-27 13:44:57', '12', NULL);
INSERT INTO `sta_system` VALUES (85, '10+200 Jalur A', 'KM 10+200 Jalur A', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209973', '106,8737', 'CMNP', '2022-04-27 13:45:35', '12', '2022-04-27 13:45:35', '12', NULL);
INSERT INTO `sta_system` VALUES (86, '10+400 Jalur A', 'KM 10+400 Jalur A', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,208096', '106,8736', 'CMNP', '2022-04-27 13:47:14', '12', '2022-04-27 13:47:14', '12', NULL);
INSERT INTO `sta_system` VALUES (87, '10+600 Jalur A', 'KM 10+600 Jalur A', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,207285', '106,8736', 'CMNP', '2022-04-27 13:50:18', '12', '2022-04-27 13:50:18', '12', NULL);
INSERT INTO `sta_system` VALUES (88, '10+800 Jalur A', 'OFF RAMP PODOMORO', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,206816', '106,8737', 'CMNP', '2022-04-27 13:51:13', '12', '2022-04-27 13:51:13', '12', NULL);
INSERT INTO `sta_system` VALUES (89, '11+000 Jalur A', 'KM 11+000 Jalur A', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,206197', '106,8736', 'CMNP', '2022-04-27 13:52:19', '12', '2022-04-27 13:52:19', '12', NULL);
INSERT INTO `sta_system` VALUES (90, '11+200 Jalur A', 'KM 11+200 Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,206005', '106,8736', 'CMNP', '2022-04-27 13:53:37', '12', '2022-04-27 13:53:37', '12', NULL);
INSERT INTO `sta_system` VALUES (91, '11+400 Jalur A', 'KM 11+400 Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205941', '106,874', 'CMNP', '2022-04-27 13:54:17', '12', '2022-04-27 13:54:17', '12', NULL);
INSERT INTO `sta_system` VALUES (92, '11+600 Jalur A', 'KM 11+600 Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,206496', '106,874', 'CMNP', '2022-04-27 13:54:54', '12', '2022-04-27 13:54:54', '12', NULL);
INSERT INTO `sta_system` VALUES (93, '11+800 Jalur A', 'PT. MANDOM', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,2072', '106,874', 'CMNP', '2022-04-27 13:55:32', '12', '2022-04-27 13:55:32', '12', NULL);
INSERT INTO `sta_system` VALUES (94, '12+000 Jalur A', 'KM 12+000 Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,207626', '106,874', 'CMNP', '2022-04-27 13:56:30', '12', '2022-04-27 13:56:30', '12', NULL);
INSERT INTO `sta_system` VALUES (95, '13+400P Jalur A', 'KM 13+400 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,204363', '106,8738', 'CMNP', '2022-04-27 13:57:10', '12', '2022-04-27 13:57:10', '12', NULL);
INSERT INTO `sta_system` VALUES (96, '13+800P Jalur A', 'KM 13+800 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,204811', '106,8738', 'CMNP', '2022-04-27 13:57:56', '12', '2022-04-27 13:57:56', '12', NULL);
INSERT INTO `sta_system` VALUES (97, '14+000P Jalur A', 'KM 14+000 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205259', '106,8739', 'CMNP', '2022-04-27 13:58:52', '12', '2022-04-27 13:58:52', '12', NULL);
INSERT INTO `sta_system` VALUES (98, '14+200P Jalur A', 'KM 14+200 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205664', '106,874', 'CMNP', '2022-04-27 13:59:32', '12', '2022-04-27 13:59:32', '12', NULL);
INSERT INTO `sta_system` VALUES (99, '14+400P Jalur A', 'KM 14+400 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205899', '106,874', 'CMNP', '2022-04-27 14:00:04', '12', '2022-04-27 14:00:04', '12', NULL);
INSERT INTO `sta_system` VALUES (100, '14+600P Jalur A', 'KM 14+600 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205984', '106,8735', 'CMNP', '2022-04-27 14:00:40', '12', '2022-04-27 14:00:40', '12', NULL);
INSERT INTO `sta_system` VALUES (101, '14+800P Jalur A', 'KM 14+800 P Jalur A', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:01:22', '12', '2022-04-27 14:01:22', '12', NULL);
INSERT INTO `sta_system` VALUES (102, '13+400 Jalur A', 'KM 13+400 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:02:26', '12', '2022-04-27 14:02:26', '12', NULL);
INSERT INTO `sta_system` VALUES (103, '13+600 Jalur A', 'ON RAMP PRIOK 2', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:03:12', '12', '2022-04-27 14:03:12', '12', NULL);
INSERT INTO `sta_system` VALUES (104, '13+800 Jalur A', 'KM 13+800 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:04:06', '12', '2022-04-27 14:04:06', '12', NULL);
INSERT INTO `sta_system` VALUES (105, '14+000 Jalur A', 'KM 14+000 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:04:47', '12', '2022-04-27 14:04:47', '12', NULL);
INSERT INTO `sta_system` VALUES (106, '14+200 Jalur A', 'KM 14+200 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:05:32', '12', '2022-04-27 14:05:32', '12', NULL);
INSERT INTO `sta_system` VALUES (107, '14+400 Jalur A', 'KM 14+400 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:28:54', '12', '2022-04-27 14:28:54', '12', NULL);
INSERT INTO `sta_system` VALUES (108, '14+600 Jalur A', 'KM 14+600 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:29:40', '12', '2022-04-27 14:29:40', '12', NULL);
INSERT INTO `sta_system` VALUES (109, '14+800 Jalur A', 'KM 14+800 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:30:20', '12', '2022-04-27 14:30:20', '12', NULL);
INSERT INTO `sta_system` VALUES (110, '15+000 Jalur A', 'KM 15+000 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:30:52', '12', '2022-04-27 14:30:52', '12', NULL);
INSERT INTO `sta_system` VALUES (111, '15+200 Jalur A', 'KM 15+200 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:31:17', '12', '2022-04-27 14:31:17', '12', NULL);
INSERT INTO `sta_system` VALUES (112, '15+400 Jalur A', 'KM 15+400 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:32:09', '12', '2022-04-27 14:32:09', '12', NULL);
INSERT INTO `sta_system` VALUES (113, '15+600 Jalur A', 'KM 15+600 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:32:32', '12', '2022-04-27 14:32:32', '12', NULL);
INSERT INTO `sta_system` VALUES (114, '15+800 Jalur A', 'KM 15+800 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:32:56', '12', '2022-04-27 14:32:56', '12', NULL);
INSERT INTO `sta_system` VALUES (115, '16+000 Jalur A', 'KM 16+000 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:33:30', '12', '2022-04-27 14:33:30', '12', NULL);
INSERT INTO `sta_system` VALUES (116, '16+200 Jalur A', 'KM 16+200 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:34:44', '12', '2022-04-27 14:34:44', '12', NULL);
INSERT INTO `sta_system` VALUES (117, '16+400 Jalur A', 'KM 16+400 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:35:07', '12', '2022-04-27 14:35:07', '12', NULL);
INSERT INTO `sta_system` VALUES (118, '16+600 Jalur A', 'KM 16+600 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:35:31', '12', '2022-04-27 14:35:31', '12', NULL);
INSERT INTO `sta_system` VALUES (119, '16+800 Jalur A', 'KM 16+800 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:35:59', '12', '2022-04-27 14:35:59', '12', NULL);
INSERT INTO `sta_system` VALUES (120, '17+000 Jalur A', 'KM 17+000 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:36:26', '12', '2022-04-27 14:36:26', '12', NULL);
INSERT INTO `sta_system` VALUES (121, '17+200 Jalur A', 'KM 17+200 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:36:53', '12', '2022-04-27 14:36:53', '12', NULL);
INSERT INTO `sta_system` VALUES (122, '17+400 Jalur A', 'KM 17+400 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:37:21', '12', '2022-04-27 14:37:21', '12', NULL);
INSERT INTO `sta_system` VALUES (123, '17+600 Jalur A', 'KM 17+600 Jalur A', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:37:53', '12', '2022-04-27 14:37:53', '12', NULL);
INSERT INTO `sta_system` VALUES (124, '17+800 Jalur A', 'ON RAMP ANCOL TIMUR', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:38:22', '12', '2022-04-27 14:38:22', '12', NULL);
INSERT INTO `sta_system` VALUES (125, '17+835 Jalur A', 'KM 17+835 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:39:40', '12', '2022-04-27 14:39:40', '12', NULL);
INSERT INTO `sta_system` VALUES (126, '17+870 Jalur A', 'KM 17+870 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:40:34', '12', '2022-04-27 14:40:34', '12', NULL);
INSERT INTO `sta_system` VALUES (127, '17+905 Jalur A', 'KM 17+905 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:41:06', '12', '2022-04-27 14:41:06', '12', NULL);
INSERT INTO `sta_system` VALUES (128, '17+940 Jalur A', 'KM 17+940 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:41:42', '12', '2022-04-27 14:41:42', '12', NULL);
INSERT INTO `sta_system` VALUES (129, '17+975 Jalur A', 'KM 17+975 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:42:08', '12', '2022-04-27 14:42:08', '12', NULL);
INSERT INTO `sta_system` VALUES (130, '18+000 Jalur A', 'KM 18+000 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:43:03', '12', '2022-04-27 14:43:03', '12', NULL);
INSERT INTO `sta_system` VALUES (131, '18+200 Jalur A', 'KM 18+200 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:43:46', '12', '2022-04-27 14:43:46', '12', NULL);
INSERT INTO `sta_system` VALUES (132, '18+400 Jalur A', 'KM 18+400 Jalur A', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:44:27', '12', '2022-04-27 14:44:27', '12', NULL);
INSERT INTO `sta_system` VALUES (133, '18+600 Jalur A', 'ON RAMP KEMAYORAN', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:45:23', '12', '2022-04-27 14:45:23', '12', NULL);
INSERT INTO `sta_system` VALUES (134, '18+800 Jalur A', 'KM 18+800 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:46:00', '12', '2022-04-27 14:46:00', '12', NULL);
INSERT INTO `sta_system` VALUES (135, '19+000 Jalur A', 'KM 19+000 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:46:36', '12', '2022-04-27 14:46:36', '12', NULL);
INSERT INTO `sta_system` VALUES (136, '19+200 Jalur A', 'KM 19+200 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:47:36', '12', '2022-04-27 14:47:36', '12', NULL);
INSERT INTO `sta_system` VALUES (137, '19+400 Jalur A', 'KM 19+400 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:48:07', '12', '2022-04-27 14:48:07', '12', NULL);
INSERT INTO `sta_system` VALUES (138, '19+600 Jalur A', 'KM 19+600 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:48:43', '12', '2022-04-27 14:48:43', '12', NULL);
INSERT INTO `sta_system` VALUES (139, '19+800 Jalur A', 'KM 19+800 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:49:30', '12', '2022-04-27 14:49:30', '12', NULL);
INSERT INTO `sta_system` VALUES (140, '20+000 Jalur A', 'KM 20+000 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:50:06', '12', '2022-04-27 14:50:06', '12', NULL);
INSERT INTO `sta_system` VALUES (141, '20+200 Jalur A', 'KM 20+200 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:50:42', '12', '2022-04-27 14:50:42', '12', NULL);
INSERT INTO `sta_system` VALUES (142, '20+400 Jalur A', 'KM 20+400 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:51:22', '12', '2022-04-27 14:51:22', '12', NULL);
INSERT INTO `sta_system` VALUES (143, '20+600 Jalur A', 'KM 20+600 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:51:57', '12', '2022-04-27 14:51:57', '12', NULL);
INSERT INTO `sta_system` VALUES (144, '20+800 Jalur A', 'KM 20+800 Jalur A', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:52:45', '12', '2022-04-27 14:52:45', '12', NULL);
INSERT INTO `sta_system` VALUES (145, '21+000 Jalur A', 'ON RAMP ANCOL BARAT', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:53:53', '12', '2022-04-27 14:53:53', '12', NULL);
INSERT INTO `sta_system` VALUES (146, '21+200 Jalur A', 'KM 21+200 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:54:52', '12', '2022-04-27 14:54:52', '12', NULL);
INSERT INTO `sta_system` VALUES (147, '21+400 Jalur A', 'KM 21+400 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:55:27', '12', '2022-04-27 14:55:27', '12', NULL);
INSERT INTO `sta_system` VALUES (148, '21+600 Jalur A', 'KM 21+600 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:55:59', '12', '2022-04-27 14:55:59', '12', NULL);
INSERT INTO `sta_system` VALUES (149, '21+625 Jalur A', 'KM 21+625 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:57:27', '12', '2022-04-27 14:57:27', '12', NULL);
INSERT INTO `sta_system` VALUES (150, '21+650 Jalur A', 'KM 21+650 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:58:09', '12', '2022-04-27 14:58:09', '12', NULL);
INSERT INTO `sta_system` VALUES (151, '21+675 Jalur A', 'KM 21+675 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:58:49', '12', '2022-04-27 14:58:49', '12', NULL);
INSERT INTO `sta_system` VALUES (152, '21+700 Jalur A', 'KM 21+700 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 14:59:23', '12', '2022-04-27 14:59:23', '12', NULL);
INSERT INTO `sta_system` VALUES (153, '21+725 Jalur A', 'KM 21+725 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:00:24', '12', '2022-04-27 15:00:24', '12', NULL);
INSERT INTO `sta_system` VALUES (154, '21+750 Jalur A', 'KM 21+750 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:01:06', '12', '2022-04-27 15:01:06', '12', NULL);
INSERT INTO `sta_system` VALUES (155, '21+775 Jalur A', 'KM 21+775 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:01:46', '12', '2022-04-27 15:01:46', '12', NULL);
INSERT INTO `sta_system` VALUES (156, '21+800 Jalur A', 'KM 21+800 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:03:06', '12', '2022-04-27 15:03:06', '12', NULL);
INSERT INTO `sta_system` VALUES (157, '22+000 Jalur A', 'KM 22+000 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:03:49', '12', '2022-04-27 15:03:49', '12', NULL);
INSERT INTO `sta_system` VALUES (158, '22+200 Jalur A', 'KM 22+200 Jalur A', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:04:22', '12', '2022-04-27 15:04:22', '12', NULL);
INSERT INTO `sta_system` VALUES (159, '22+400 Jalur A', 'OFF RAMP GEDONG PANJANG 2', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:05:01', '12', '2022-04-27 15:05:01', '12', NULL);
INSERT INTO `sta_system` VALUES (160, '22+600 Jalur A', 'ON RAMP GEDONG PANJANG 1', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:07:05', '12', '2022-04-27 15:07:40', '12', NULL);
INSERT INTO `sta_system` VALUES (161, '22+800 Jalur A', 'KM 22+800 Jalur A', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:08:17', '12', '2022-04-27 15:08:17', '12', NULL);
INSERT INTO `sta_system` VALUES (162, '23+000 Jalur A', 'KM 23+000 Jalur A', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:08:54', '12', '2022-04-27 15:08:54', '12', NULL);
INSERT INTO `sta_system` VALUES (163, '23+200 Jalur A', 'KM 23+200 Jalur A', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:09:31', '12', '2022-04-27 15:09:31', '12', NULL);
INSERT INTO `sta_system` VALUES (164, '23+400 Jalur A', 'KM 23+400 Jalur A', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:10:43', '12', '2022-04-27 15:10:43', '12', NULL);
INSERT INTO `sta_system` VALUES (165, '23+600 Jalur A', 'KM 23+600 Jalur A', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:11:16', '12', '2022-04-27 15:11:16', '12', NULL);
INSERT INTO `sta_system` VALUES (166, '23+800 Jalur A', 'KM 23+800 Jalur A', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:12:08', '12', '2022-04-27 15:12:08', '12', NULL);
INSERT INTO `sta_system` VALUES (167, '24+000 Jalur A', 'OFF RAMP JEMBATAN 3 - 2', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:12:48', '12', '2022-04-27 15:12:48', '12', NULL);
INSERT INTO `sta_system` VALUES (168, '24+200 Jalur A', 'ON RAMP JEMBATAN 3 - 1', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:13:17', '12', '2022-04-27 15:13:17', '12', NULL);
INSERT INTO `sta_system` VALUES (169, '24+400 Jalur A', 'KM 24+400 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:16:52', '12', '2022-04-27 15:16:52', '12', NULL);
INSERT INTO `sta_system` VALUES (170, '24+600 Jalur A', 'KM 24+600 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:46:53', '12', '2022-04-27 15:46:53', '12', NULL);
INSERT INTO `sta_system` VALUES (171, '24+800 Jalur A', 'KM 24+800 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:47:29', '12', '2022-04-27 15:47:29', '12', NULL);
INSERT INTO `sta_system` VALUES (172, '25+000 Jalur A', 'KM 25+000 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:48:05', '12', '2022-04-27 15:48:05', '12', NULL);
INSERT INTO `sta_system` VALUES (173, '25+200 Jalur A', 'KM 25+200 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:48:40', '12', '2022-04-27 15:48:40', '12', NULL);
INSERT INTO `sta_system` VALUES (174, '25+400 Jalur A', 'KM 25+400 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:49:16', '12', '2022-04-27 15:49:16', '12', NULL);
INSERT INTO `sta_system` VALUES (175, '25+600 Jalur A', 'KM 25+600 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-27 15:50:03', '12', '2022-04-27 15:50:03', '12', NULL);
INSERT INTO `sta_system` VALUES (176, '25+800 Jalur A', 'KM 25+800 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 08:24:54', '12', '2022-04-28 08:24:54', '12', NULL);
INSERT INTO `sta_system` VALUES (177, '26+000 Jalur A', 'KM 26+000 Jalur A', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 08:25:28', '12', '2022-04-28 08:25:28', '12', NULL);
INSERT INTO `sta_system` VALUES (179, '00+000 Jalur B', 'INTERCHANGE CAWANG', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,221492', '106,8747', 'CMNP', '2022-04-28 08:35:45', '12', '2022-04-28 08:35:45', '12', NULL);
INSERT INTO `sta_system` VALUES (180, '00+200 Jalur B', 'KM 00+200 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,222111', '106,8747', 'CMNP', '2022-04-28 08:36:29', '12', '2022-04-28 08:36:29', '12', NULL);
INSERT INTO `sta_system` VALUES (181, '00+400 Jalur B', 'KM 00+400 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,22258', '106,8748', 'CMNP', '2022-04-28 08:37:00', '12', '2022-04-28 08:37:00', '12', NULL);
INSERT INTO `sta_system` VALUES (182, '00+600 Jalur B', 'KM 00+600 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,222772', '106,8742', 'CMNP', '2022-04-28 08:37:35', '12', '2022-04-28 08:37:35', '12', NULL);
INSERT INTO `sta_system` VALUES (183, '00+800 Jalur B', 'KM 00+800 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220895', '106,8742', 'CMNP', '2022-04-28 08:38:05', '12', '2022-04-28 08:38:05', '12', NULL);
INSERT INTO `sta_system` VALUES (184, '00-200 Jalur B', 'KM 00-200 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220276', '106,8742', 'CMNP', '2022-04-28 08:38:39', '12', '2022-04-28 08:38:39', '12', NULL);
INSERT INTO `sta_system` VALUES (185, '00-300 Jalur B', 'KM 00-300 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219721', '106,8742', 'CMNP', '2022-04-28 08:39:31', '12', '2022-04-28 08:39:31', '12', NULL);
INSERT INTO `sta_system` VALUES (186, '01+000 Jalur B', 'KM 01+000 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219252', '106,8741', 'CMNP', '2022-04-28 08:40:16', '12', '2022-04-28 08:40:16', '12', NULL);
INSERT INTO `sta_system` VALUES (187, '01+200 Jalur B', 'KM 01+200 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219231', '106,8745', 'CMNP', '2022-04-28 08:40:49', '12', '2022-04-28 08:40:49', '12', NULL);
INSERT INTO `sta_system` VALUES (188, '01+400 Jalur B', 'KM 01+400 Jalur B', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,219657', '106,8746', 'CMNP', '2022-04-28 08:41:26', '12', '2022-04-28 08:41:26', '12', NULL);
INSERT INTO `sta_system` VALUES (189, '01+600 Jalur B', 'OFF RAMP KEBON NANAS', 'Jakarta IC - Kb. Nanas', 'INTERCHANGE', NULL, NULL, NULL, NULL, NULL, '-6,220191', '106,8746', 'CMNP', '2022-04-28 08:42:14', '12', '2022-04-28 08:42:14', '12', NULL);
INSERT INTO `sta_system` VALUES (190, '01+800 Jalur B', 'KM 01+800 Jalur B', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,220745', '106,8747', 'CMNP', '2022-04-28 08:44:44', '12', '2022-04-28 08:44:44', '12', NULL);
INSERT INTO `sta_system` VALUES (191, '02+000 Jalur B', 'KM 02+000 Jalur B', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,220852', '106,8741', 'CMNP', '2022-04-28 08:45:28', '12', '2022-04-28 08:45:28', '12', NULL);
INSERT INTO `sta_system` VALUES (192, '02+200 Jalur B', 'KM 02+200 Jalur B', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,219295', '106,8741', 'CMNP', '2022-04-28 08:46:13', '12', '2022-04-28 08:46:13', '12', NULL);
INSERT INTO `sta_system` VALUES (193, '02+400 Jalur B', 'KM 02+400 Jalur B', 'Kb. Nanas - Pedati', 'KEBON NANAS', NULL, NULL, NULL, NULL, NULL, '-6,218399', '106,8741', 'CMNP', '2022-04-28 08:47:08', '12', '2022-04-28 08:47:08', '12', NULL);
INSERT INTO `sta_system` VALUES (194, '02+600 Jalur B', 'KM 02+600 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217802', '106,8741', 'CMNP', '2022-04-28 08:48:27', '12', '2022-04-28 08:48:27', '12', NULL);
INSERT INTO `sta_system` VALUES (195, '02+800 Jalur B', 'ON RAMP PEDATI', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21746', '106,8741', 'CMNP', '2022-04-28 08:49:11', '12', '2022-04-28 08:49:11', '12', NULL);
INSERT INTO `sta_system` VALUES (196, '03+000 Jalur B', 'KM 03+000 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21746', '106,8745', 'CMNP', '2022-04-28 08:49:50', '12', '2022-04-28 08:49:50', '12', NULL);
INSERT INTO `sta_system` VALUES (197, '03+200 Jalur B', 'KM 03+200 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,216735', '106,8745', 'CMNP', '2022-04-28 08:51:29', '12', '2022-04-28 08:51:29', '12', NULL);
INSERT INTO `sta_system` VALUES (198, '03+400 Jalur B', 'KM 03+400 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217204', '106,8745', 'CMNP', '2022-04-28 08:52:14', '12', '2022-04-28 08:52:14', '12', NULL);
INSERT INTO `sta_system` VALUES (199, '03+600 Jalur B', 'KM 03+600 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217375', '106,8745', 'CMNP', '2022-04-28 08:53:02', '12', '2022-04-28 08:53:02', '12', NULL);
INSERT INTO `sta_system` VALUES (200, '03+800 Jalur B', 'KM 03+800 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,217524', '106,8739', 'CMNP', '2022-04-28 08:54:19', '12', '2022-04-28 08:54:19', '12', NULL);
INSERT INTO `sta_system` VALUES (201, '04+000 Jalur B', 'KM 04+000 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,215647', '106,8739', 'CMNP', '2022-04-28 08:55:08', '12', '2022-04-28 08:55:08', '12', NULL);
INSERT INTO `sta_system` VALUES (202, '04+200 Jalur B', 'OFF RAMP JATINEGARA', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,21505', '106,874', 'CMNP', '2022-04-28 08:56:48', '12', '2022-04-28 08:56:48', '12', NULL);
INSERT INTO `sta_system` VALUES (203, '04+400 Jalur B', 'KM 04+400 Jalur B', 'Pedati - Jatinegara', 'PEDATI', NULL, NULL, NULL, NULL, NULL, '-6,214325', '106,8739', 'CMNP', '2022-04-28 08:57:46', '12', '2022-04-28 08:57:46', '12', NULL);
INSERT INTO `sta_system` VALUES (204, '04+600 Jalur B', 'KM 04+600 Jalur B', 'Jatinegara - Rawamangun', 'JATINEGARA', NULL, NULL, NULL, NULL, NULL, '-6,21377', '106,8739', 'CMNP', '2022-04-28 09:00:11', '12', '2022-04-28 09:00:51', '12', NULL);
INSERT INTO `sta_system` VALUES (205, '04+800 Jalur B', 'KM 04+800 Jalur B', 'Jatinegara - Rawamangun', 'JATINEGARA', NULL, NULL, NULL, NULL, NULL, '-6,213727', '106,8744', 'CMNP', '2022-04-28 09:01:37', '12', '2022-04-28 09:01:37', '12', NULL);
INSERT INTO `sta_system` VALUES (206, '05+000 Jalur B', 'ON RAMP RAWAMANGUN', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21441', '106,8744', 'CMNP', '2022-04-28 09:04:20', '12', '2022-04-28 09:04:20', '12', NULL);
INSERT INTO `sta_system` VALUES (207, '05+040 Jalur B', 'KM 05+040 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,215007', '106,8744', 'CMNP', '2022-04-28 09:05:00', '12', '2022-04-28 09:05:00', '12', NULL);
INSERT INTO `sta_system` VALUES (208, '05+080 Jalur B', 'KM 05+080 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,215604', '106,8744', 'CMNP', '2022-04-28 09:05:52', '12', '2022-04-28 09:05:52', '12', NULL);
INSERT INTO `sta_system` VALUES (209, '05+120 Jalur B', 'KM 05+120 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21569', '106,8738', 'CMNP', '2022-04-28 09:06:33', '12', '2022-04-28 09:06:33', '12', NULL);
INSERT INTO `sta_system` VALUES (210, '05+160 Jalur B', 'KM 05+160 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213599', '106,8738', 'CMNP', '2022-04-28 09:07:21', '12', '2022-04-28 09:07:21', '12', NULL);
INSERT INTO `sta_system` VALUES (211, '05+200 Jalur B', 'KM 05+200 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212831', '106,8738', 'CMNP', '2022-04-28 09:29:27', '12', '2022-04-28 09:29:27', '12', NULL);
INSERT INTO `sta_system` VALUES (212, '05+400 Jalur B', 'KM 05+400 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212362', '106,8738', 'CMNP', '2022-04-28 09:30:00', '12', '2022-04-28 09:30:00', '12', NULL);
INSERT INTO `sta_system` VALUES (213, '05+600 Jalur B', 'KM 05+600 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211722', '106,8738', 'CMNP', '2022-04-28 09:30:40', '12', '2022-04-28 09:30:40', '12', NULL);
INSERT INTO `sta_system` VALUES (214, '05+800 Jalur B', 'KM 05+800 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211658', '106,8742', 'CMNP', '2022-04-28 09:31:22', '12', '2022-04-28 09:31:22', '12', NULL);
INSERT INTO `sta_system` VALUES (215, '06+000 Jalur B', 'KM 06+000 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212149', '106,8743', 'CMNP', '2022-04-28 09:31:56', '12', '2022-04-28 09:31:56', '12', NULL);
INSERT INTO `sta_system` VALUES (216, '06+200 Jalur B', 'KM 06+200 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212639', '106,8743', 'CMNP', '2022-04-28 09:32:38', '12', '2022-04-28 09:32:38', '12', NULL);
INSERT INTO `sta_system` VALUES (217, '06+400 Jalur B', 'KM 06+400 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213194', '106,8743', 'CMNP', '2022-04-28 09:33:18', '12', '2022-04-28 09:33:18', '12', NULL);
INSERT INTO `sta_system` VALUES (218, '06+600 Jalur B', 'KM 06+600 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213557', '106,8744', 'CMNP', '2022-04-28 09:34:00', '12', '2022-04-28 09:34:00', '12', NULL);
INSERT INTO `sta_system` VALUES (219, '06+800 Jalur B', 'KM 06+800 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,213578', '106,8737', 'CMNP', '2022-04-28 09:34:41', '12', '2022-04-28 09:34:41', '12', NULL);
INSERT INTO `sta_system` VALUES (220, '07+000 Jalur B', 'KM 07+000 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,211786', '106,8738', 'CMNP', '2022-04-28 09:35:35', '12', '2022-04-28 09:47:06', '12', NULL);
INSERT INTO `sta_system` VALUES (221, '07+200 Jalur B', 'KM 07+200 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,21089', '106,8738', 'CMNP', '2022-04-28 09:46:47', '12', '2022-04-28 09:46:47', '12', NULL);
INSERT INTO `sta_system` VALUES (222, '07+400 Jalur B', 'KM 07+400 Jalur B', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,2104', '106,8738', 'CMNP', '2022-04-28 09:47:42', '12', '2022-04-28 09:47:42', '12', NULL);
INSERT INTO `sta_system` VALUES (223, '07+600 Jalur B', 'OFF RAMP PULOMAS', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,209909', '106,8737', 'CMNP', '2022-04-28 09:48:42', '12', '2022-04-28 09:48:42', '12', NULL);
INSERT INTO `sta_system` VALUES (224, '07+800 Jalur B', 'KM 07+800 Jalur B', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,209845', '106,8742', 'CMNP', '2022-04-28 09:49:31', '12', '2022-04-28 09:49:31', '12', NULL);
INSERT INTO `sta_system` VALUES (225, '08+000 Jalur B', 'KM 08+000 Jalur B', 'Pulomas - Cempaka Putih', 'PULO MAS', NULL, NULL, NULL, NULL, NULL, '-6,210208', '106,8742', 'CMNP', '2022-04-28 09:50:22', '12', '2022-04-28 09:50:22', '12', NULL);
INSERT INTO `sta_system` VALUES (226, '08+200 Jalur B', 'KM 08+200 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,210677', '106,8742', 'CMNP', '2022-04-28 09:51:39', '12', '2022-04-28 09:51:39', '12', NULL);
INSERT INTO `sta_system` VALUES (227, '08+400 Jalur B', 'ON RAMP CEMPAKA PUTIH', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211253', '106,8743', 'CMNP', '2022-04-28 09:52:32', '12', '2022-04-28 09:52:32', '12', NULL);
INSERT INTO `sta_system` VALUES (228, '08+600 Jalur B', 'KM 08+600 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211615', '106,8743', 'CMNP', '2022-04-28 09:53:36', '12', '2022-04-28 09:53:36', '12', NULL);
INSERT INTO `sta_system` VALUES (229, '08+800 Jalur B', 'KM 08+800 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211765', '106,8742', 'CMNP', '2022-04-28 09:54:22', '12', '2022-04-28 09:54:22', '12', NULL);
INSERT INTO `sta_system` VALUES (230, '09+000 Jalur B', 'KM 09+000 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,211807', '106,8737', 'CMNP', '2022-04-28 09:55:13', '12', '2022-04-28 09:55:13', '12', NULL);
INSERT INTO `sta_system` VALUES (231, '09+200 Jalur B', 'KM 09+200 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209952', '106,8738', 'CMNP', '2022-04-28 09:55:52', '12', '2022-04-28 09:55:52', '12', NULL);
INSERT INTO `sta_system` VALUES (232, '09+240 Jalur B', 'KM 09+240 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209333', '106,8738', 'CMNP', '2022-04-28 09:56:30', '12', '2022-04-28 09:56:30', '12', NULL);
INSERT INTO `sta_system` VALUES (233, '09+280 Jalur B', 'KM 09+280 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,208629', '106,8737', 'CMNP', '2022-04-28 09:57:05', '12', '2022-04-28 09:57:05', '12', NULL);
INSERT INTO `sta_system` VALUES (234, '09+320 Jalur B', 'KM 09+320 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,208053', '106,8737', 'CMNP', '2022-04-28 09:57:45', '12', '2022-04-28 09:57:45', '12', NULL);
INSERT INTO `sta_system` VALUES (235, '09+360 Jalur B', 'KM 09+360 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,207989', '106,8741', 'CMNP', '2022-04-28 09:58:20', '12', '2022-04-28 09:58:20', '12', NULL);
INSERT INTO `sta_system` VALUES (236, '09+400 Jalur B', 'KM 09+400 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,20848', '106,8741', 'CMNP', '2022-04-28 09:59:11', '12', '2022-04-28 09:59:11', '12', NULL);
INSERT INTO `sta_system` VALUES (237, '09+600 Jalur B', 'KM 09+600 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209056', '106,8742', 'CMNP', '2022-04-28 09:59:50', '12', '2022-04-28 09:59:50', '12', NULL);
INSERT INTO `sta_system` VALUES (238, '09+800 Jalur B', 'KM 09+800 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209674', '106,8742', 'CMNP', '2022-04-28 10:00:29', '12', '2022-04-28 10:00:29', '12', NULL);
INSERT INTO `sta_system` VALUES (239, '10+000 Jalur B', 'OFF RAMP SUNTER', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209973', '106,8742', 'CMNP', '2022-04-28 10:01:02', '12', '2022-04-28 10:01:02', '12', NULL);
INSERT INTO `sta_system` VALUES (240, '10+200 Jalur B', 'KM 10+200 Jalur B', 'Cempaka Putih - Sunter', 'CEMPAKA PUTIH', NULL, NULL, NULL, NULL, NULL, '-6,209973', '106,8737', 'CMNP', '2022-04-28 10:01:36', '12', '2022-04-28 10:01:36', '12', NULL);
INSERT INTO `sta_system` VALUES (241, '10+400 Jalur B', 'KM 10+400 Jalur B', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,208096', '106,8736', 'CMNP', '2022-04-28 10:03:01', '12', '2022-04-28 10:03:01', '12', NULL);
INSERT INTO `sta_system` VALUES (242, '10+600 Jalur B', 'KM 10+600 Jalur B', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,207285', '106,8736', 'CMNP', '2022-04-28 10:03:52', '12', '2022-04-28 10:03:52', '12', NULL);
INSERT INTO `sta_system` VALUES (243, '10+800 Jalur B', 'KM 10+800 Jalur B', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,206816', '106,8737', 'CMNP', '2022-04-28 10:05:26', '12', '2022-04-28 10:05:26', '12', NULL);
INSERT INTO `sta_system` VALUES (244, '11+000 Jalur B', 'KM 11+000 Jalur B', 'Sunter - Podomoro', 'SUNTER', NULL, NULL, NULL, NULL, NULL, '-6,206197', '106,8736', 'CMNP', '2022-04-28 10:06:24', '12', '2022-04-28 10:06:24', '12', NULL);
INSERT INTO `sta_system` VALUES (245, '11+200 Jalur B', 'KM 11+200 Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,206005', '106,8736', 'CMNP', '2022-04-28 10:07:15', '12', '2022-04-28 10:09:13', '12', NULL);
INSERT INTO `sta_system` VALUES (246, '11+400 Jalur B', 'KM 11+400 Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205941', '106,874', 'CMNP', '2022-04-28 10:08:00', '12', '2022-04-28 10:09:26', '12', NULL);
INSERT INTO `sta_system` VALUES (247, '11+600 Jalur B', 'KM 11+600 Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,206496', '106,874', 'CMNP', '2022-04-28 10:10:12', '12', '2022-04-28 10:10:12', '12', NULL);
INSERT INTO `sta_system` VALUES (248, '11+800 Jalur B', 'KM 11+800 Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,2072', '106,874', 'CMNP', '2022-04-28 10:10:43', '12', '2022-04-28 10:10:43', '12', NULL);
INSERT INTO `sta_system` VALUES (249, '12+000 Jalur B', 'KM 12+000 Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,207626', '106,874', 'CMNP', '2022-04-28 10:11:19', '12', '2022-04-28 10:11:19', '12', NULL);
INSERT INTO `sta_system` VALUES (250, '13+400P Jalur B', 'KM 13+400 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,204363', '106,8738', 'CMNP', '2022-04-28 10:11:56', '12', '2022-04-28 10:11:56', '12', NULL);
INSERT INTO `sta_system` VALUES (251, '13+800P Jalur B', 'KM 13+800 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,204811', '106,8738', 'CMNP', '2022-04-28 10:12:29', '12', '2022-04-28 10:12:29', '12', NULL);
INSERT INTO `sta_system` VALUES (252, '14+000P Jalur B', 'KM 14+000 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205259', '106,8739', 'CMNP', '2022-04-28 10:13:07', '12', '2022-04-28 10:13:07', '12', NULL);
INSERT INTO `sta_system` VALUES (253, '14+200P Jalur B', 'KM 14+200 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205664', '106,874', 'CMNP', '2022-04-28 10:13:39', '12', '2022-04-28 10:13:39', '12', NULL);
INSERT INTO `sta_system` VALUES (254, '14+400P Jalur B', 'KM 14+400 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205899', '106,874', 'CMNP', '2022-04-28 10:14:23', '12', '2022-04-28 10:14:23', '12', NULL);
INSERT INTO `sta_system` VALUES (255, '14+600P Jalur B', 'KM 14+600 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, '-6,205984', '106,8735', 'CMNP', '2022-04-28 10:14:54', '12', '2022-04-28 10:14:54', '12', NULL);
INSERT INTO `sta_system` VALUES (256, '14+800P Jalur B', 'KM 14+800 P Jalur B', 'Podomoro - Tg. Priok IC', 'PODOMORO 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:15:20', '12', '2022-04-28 10:15:20', '12', NULL);
INSERT INTO `sta_system` VALUES (257, '13+400 Jalur B', 'OFF RAMP PRIOK 2', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:16:30', '12', '2022-04-28 10:16:30', '12', NULL);
INSERT INTO `sta_system` VALUES (258, '13+600 Jalur B', 'KM 13+600 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:16:55', '12', '2022-04-28 10:16:55', '12', NULL);
INSERT INTO `sta_system` VALUES (259, '13+800 Jalur B', 'KM 13+800 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:17:20', '12', '2022-04-28 10:17:20', '12', NULL);
INSERT INTO `sta_system` VALUES (260, '14+000 Jalur B', 'KM 14+000 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:17:47', '12', '2022-04-28 10:17:47', '12', NULL);
INSERT INTO `sta_system` VALUES (261, '14+200 Jalur B', 'KM 14+200 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:18:06', '12', '2022-04-28 10:18:06', '12', NULL);
INSERT INTO `sta_system` VALUES (262, '14+400 Jalur B', 'KM 14+400 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:18:30', '12', '2022-04-28 10:18:30', '12', NULL);
INSERT INTO `sta_system` VALUES (263, '14+600 Jalur B', 'KM 14+600 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:18:51', '12', '2022-04-28 10:18:51', '12', NULL);
INSERT INTO `sta_system` VALUES (264, '14+800 Jalur B', 'KM 14+800 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:19:16', '12', '2022-04-28 10:19:16', '12', NULL);
INSERT INTO `sta_system` VALUES (265, '15+000 Jalur B', 'KM 15+000 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:19:45', '12', '2022-04-28 10:19:45', '12', NULL);
INSERT INTO `sta_system` VALUES (266, '15+200 Jalur B', 'KM 15+200 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:20:10', '12', '2022-04-28 10:20:10', '12', NULL);
INSERT INTO `sta_system` VALUES (267, '15+400 Jalur B', 'KM 15+400 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:20:39', '12', '2022-04-28 10:20:39', '12', NULL);
INSERT INTO `sta_system` VALUES (268, '15+600 Jalur B', 'KM 15+600 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:21:06', '12', '2022-04-28 10:21:06', '12', NULL);
INSERT INTO `sta_system` VALUES (269, '15+800 Jalur B', 'KM 15+800 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:21:38', '12', '2022-04-28 10:21:38', '12', NULL);
INSERT INTO `sta_system` VALUES (270, '16+000 Jalur B', 'KM 16+000 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:22:06', '12', '2022-04-28 10:22:06', '12', NULL);
INSERT INTO `sta_system` VALUES (271, '16+200 Jalur B', 'KM 16+200 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:22:25', '12', '2022-04-28 10:22:25', '12', NULL);
INSERT INTO `sta_system` VALUES (272, '16+400 Jalur B', 'KM 16+400 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:23:14', '12', '2022-04-28 10:23:14', '12', NULL);
INSERT INTO `sta_system` VALUES (273, '16+600 Jalur B', 'KM 16+600 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:23:37', '12', '2022-04-28 10:23:37', '12', NULL);
INSERT INTO `sta_system` VALUES (274, '16+800 Jalur B', 'KM 16+800 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:24:02', '12', '2022-04-28 10:24:02', '12', NULL);
INSERT INTO `sta_system` VALUES (275, '17+000 Jalur B', 'KM 17+000 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:24:23', '12', '2022-04-28 10:24:23', '12', NULL);
INSERT INTO `sta_system` VALUES (276, '17+200 Jalur B', 'KM 17+200 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:24:52', '12', '2022-04-28 10:24:52', '12', NULL);
INSERT INTO `sta_system` VALUES (277, '17+400 Jalur B', 'KM 17+400 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:25:11', '12', '2022-04-28 10:25:11', '12', NULL);
INSERT INTO `sta_system` VALUES (278, '17+600 Jalur B', 'ON ANCOL TIMUR', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:25:33', '12', '2022-04-28 10:25:33', '12', NULL);
INSERT INTO `sta_system` VALUES (279, '17+800 Jalur B', 'KM 17+800 Jalur B', 'Tg. Priok IC - Ancol Timur', 'PRIOK II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:26:40', '12', '2022-04-28 10:26:40', '12', NULL);
INSERT INTO `sta_system` VALUES (280, '17+835 Jalur B', 'KM 17+835 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:31:22', '12', '2022-04-28 10:31:22', '12', NULL);
INSERT INTO `sta_system` VALUES (281, '17+870 Jalur B', 'KM 17+870 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:32:03', '12', '2022-04-28 10:32:03', '12', NULL);
INSERT INTO `sta_system` VALUES (282, '17+905 Jalur B', 'KM 17+905 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:32:33', '12', '2022-04-28 10:32:33', '12', NULL);
INSERT INTO `sta_system` VALUES (283, '17+940 Jalur B', 'KM 17+940 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:33:17', '12', '2022-04-28 10:33:17', '12', NULL);
INSERT INTO `sta_system` VALUES (284, '17+975 Jalur B', 'KM 17+975 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:34:00', '12', '2022-04-28 10:34:00', '12', NULL);
INSERT INTO `sta_system` VALUES (285, '18+000 Jalur B', 'KM 18+000 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:34:38', '12', '2022-04-28 10:34:38', '12', NULL);
INSERT INTO `sta_system` VALUES (286, '18+200 Jalur B', 'KM 18+200 Jalur B', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:35:11', '12', '2022-04-28 10:35:11', '12', NULL);
INSERT INTO `sta_system` VALUES (287, '18+400 Jalur B', 'OFF RAMP KEMAYORAN', 'Ancol Timur - Kemayoran', 'ANCOL TIMUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:35:54', '12', '2022-04-28 10:35:54', '12', NULL);
INSERT INTO `sta_system` VALUES (288, '18+600 Jalur B', 'KM 18+600 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:37:08', '12', '2022-04-28 10:37:08', '12', NULL);
INSERT INTO `sta_system` VALUES (289, '18+800 Jalur B', 'KM 18+800 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:37:40', '12', '2022-04-28 10:37:40', '12', NULL);
INSERT INTO `sta_system` VALUES (290, '19+000 Jalur B', 'KM 19+000 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:38:29', '12', '2022-04-28 10:38:29', '12', NULL);
INSERT INTO `sta_system` VALUES (291, '19+200 Jalur B', 'KM 19+200 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:39:08', '12', '2022-04-28 10:39:08', '12', NULL);
INSERT INTO `sta_system` VALUES (292, '19+400 Jalur B', 'KM 19+400 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:39:56', '12', '2022-04-28 10:39:56', '12', NULL);
INSERT INTO `sta_system` VALUES (293, '19+600 Jalur B', 'KM 19+600 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:40:26', '12', '2022-04-28 10:40:26', '12', NULL);
INSERT INTO `sta_system` VALUES (294, '19+800 Jalur B', 'KM 19+800 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:41:34', '12', '2022-04-28 10:41:34', '12', NULL);
INSERT INTO `sta_system` VALUES (295, '20+000 Jalur B', 'KM 20+000 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:42:07', '12', '2022-04-28 10:42:07', '12', NULL);
INSERT INTO `sta_system` VALUES (296, '20+200 Jalur B', 'KM 20+200 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:42:41', '12', '2022-04-28 10:42:41', '12', NULL);
INSERT INTO `sta_system` VALUES (297, '20+400 Jalur B', 'KM 20+400 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:43:15', '12', '2022-04-28 10:43:15', '12', NULL);
INSERT INTO `sta_system` VALUES (298, '20+600 Jalur B', 'KM 20+600 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:43:52', '12', '2022-04-28 10:43:52', '12', NULL);
INSERT INTO `sta_system` VALUES (299, '20+800 Jalur B', 'KM 20+800 Jalur B', 'Kemayoran - Ancol Barat', 'KEMAYORAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:45:27', '12', '2022-04-28 10:45:27', '12', NULL);
INSERT INTO `sta_system` VALUES (300, '21+000 Jalur B', 'OFF RAMP ANCOL BARAT', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:48:25', '12', '2022-04-28 10:48:25', '12', NULL);
INSERT INTO `sta_system` VALUES (301, '21+200 Jalur B', 'KM 21+200 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:49:04', '12', '2022-04-28 10:49:04', '12', NULL);
INSERT INTO `sta_system` VALUES (302, '21+400 Jalur B', 'KM 21+400 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:49:40', '12', '2022-04-28 10:49:40', '12', NULL);
INSERT INTO `sta_system` VALUES (303, '21+600 Jalur B', 'KM 21+600 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:50:15', '12', '2022-04-28 10:50:15', '12', NULL);
INSERT INTO `sta_system` VALUES (304, '21+625 Jalur B', 'KM 21+625 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:50:47', '12', '2022-04-28 10:50:47', '12', NULL);
INSERT INTO `sta_system` VALUES (305, '21+650 Jalur B', 'KM 21+650 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:51:22', '12', '2022-04-28 10:51:22', '12', NULL);
INSERT INTO `sta_system` VALUES (306, '21+675 Jalur B', 'KM 21+675 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:52:00', '12', '2022-04-28 10:52:00', '12', NULL);
INSERT INTO `sta_system` VALUES (307, '21+700 Jalur B', 'KM 21+700 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:52:42', '12', '2022-04-28 10:52:42', '12', NULL);
INSERT INTO `sta_system` VALUES (308, '21+725 Jalur B', 'KM 21+725 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:53:27', '12', '2022-04-28 10:53:27', '12', NULL);
INSERT INTO `sta_system` VALUES (309, '21+750 Jalur B', 'KM 21+750 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:54:05', '12', '2022-04-28 10:54:05', '12', NULL);
INSERT INTO `sta_system` VALUES (310, '21+775 Jalur B', 'KM 21+775 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:54:57', '12', '2022-04-28 10:54:57', '12', NULL);
INSERT INTO `sta_system` VALUES (311, '21+800 Jalur B', 'KM 21+800 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:55:38', '12', '2022-04-28 10:55:38', '12', NULL);
INSERT INTO `sta_system` VALUES (312, '22+000 Jalur B', 'KM 22+000 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:56:08', '12', '2022-04-28 10:56:08', '12', NULL);
INSERT INTO `sta_system` VALUES (313, '22+200 Jalur B', 'KM 22+200 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:56:39', '12', '2022-04-28 10:56:39', '12', NULL);
INSERT INTO `sta_system` VALUES (314, '22+400 Jalur B', 'KM 22+400 Jalur B', 'Ancol Barat - Gd. Panjang 2', 'ANCOL BARAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:57:10', '12', '2022-04-28 10:57:10', '12', NULL);
INSERT INTO `sta_system` VALUES (315, '22+600 Jalur B', 'KM 22+600 Jalur B', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:58:49', '12', '2022-04-28 10:58:49', '12', NULL);
INSERT INTO `sta_system` VALUES (316, '22+800 Jalur B', 'KM 22+800 Jalur B', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 10:59:21', '12', '2022-04-28 10:59:21', '12', NULL);
INSERT INTO `sta_system` VALUES (317, '23+000 Jalur B', 'OFF RAMP GEDONG PANJANG 1', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:00:05', '12', '2022-04-28 11:00:05', '12', NULL);
INSERT INTO `sta_system` VALUES (318, '23+200 Jalur B', 'OFF RAMP GEDONG PANJANG 1', 'Gd. Panjang 2 - Gd. Panjang 1', 'GEDONG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:00:35', '12', '2022-04-28 11:00:35', '12', NULL);
INSERT INTO `sta_system` VALUES (319, '23+400 Jalur B', 'KM 23+400 Jalur B', 'Gd. Panjang 1 - Jemb. Tiga 2', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:01:34', '12', '2022-04-28 11:01:34', '12', NULL);
INSERT INTO `sta_system` VALUES (320, '23+600 Jalur B', 'KM 23+600 Jalur B', 'Gd. Panjang 1 - Jemb. Tiga 2', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:02:32', '12', '2022-04-28 11:02:32', '12', NULL);
INSERT INTO `sta_system` VALUES (321, '23+800 Jalur B', 'ON RAMP JEMBATAN 3 - 2', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:03:29', '12', '2022-04-28 11:03:29', '12', NULL);
INSERT INTO `sta_system` VALUES (322, '24+000 Jalur B', 'KM 24+000 Jalur B', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:04:01', '12', '2022-04-28 11:04:01', '12', NULL);
INSERT INTO `sta_system` VALUES (323, '24+200 Jalur B', 'KM 24+200 Jalur B', 'Jemb. Tiga 2 - Jemb. Tiga 1', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:04:34', '12', '2022-04-28 11:04:34', '12', NULL);
INSERT INTO `sta_system` VALUES (324, '24+400 Jalur B', 'KM 24+400 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:06:32', '12', '2022-04-28 11:06:32', '12', NULL);
INSERT INTO `sta_system` VALUES (325, '24+600 Jalur B', 'KM 24+600 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:07:01', '12', '2022-04-28 11:07:01', '12', NULL);
INSERT INTO `sta_system` VALUES (326, '24+800 Jalur B', 'KM 24+800 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:07:39', '12', '2022-04-28 11:07:39', '12', NULL);
INSERT INTO `sta_system` VALUES (327, '25+000 Jalur B', 'KM 25+000 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:08:33', '12', '2022-04-28 11:08:33', '12', NULL);
INSERT INTO `sta_system` VALUES (328, '25+200 Jalur B', 'KM 25+200 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:09:01', '12', '2022-04-28 11:09:01', '12', NULL);
INSERT INTO `sta_system` VALUES (329, '25+400 Jalur B', 'KM 25+400 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:09:38', '12', '2022-04-28 11:09:38', '12', NULL);
INSERT INTO `sta_system` VALUES (330, '25+600 Jalur B', 'KM 25+600 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:10:14', '12', '2022-04-28 11:10:14', '12', NULL);
INSERT INTO `sta_system` VALUES (331, '25+800 Jalur B', 'KM 25+800 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:10:40', '12', '2022-04-28 11:10:40', '12', NULL);
INSERT INTO `sta_system` VALUES (332, '26+000 Jalur B', 'KM 26+000 Jalur B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:11:07', '12', '2022-04-28 11:11:07', '12', NULL);
INSERT INTO `sta_system` VALUES (333, '05+200', 'KM 05+200 Jalur A', 'Rawamangun - Pulomas', 'RAWAMANGUN', NULL, NULL, NULL, NULL, NULL, '-6,212831', '106,8738', 'CMNP', '2022-04-28 11:12:04', '12', '2022-04-28 11:12:04', '12', NULL);
INSERT INTO `sta_system` VALUES (334, '24+400', 'OFF RAMP JEMBATAN 3.1 JALUR B', 'Jemb. Tiga 1 - Pluit', 'JEMBATAN TIGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CMNP', '2022-04-28 11:12:45', '12', '2022-04-28 11:12:45', '12', NULL);
INSERT INTO `sta_system` VALUES (337, '10+400 Lajur A', '12+800 ARAH BANDUNG', 'Bandung - Soreang', 'BANDUNG', '10', '400', 'A', 'LURUS', 'MENANJAK', '', '', 'CMLJ', '2022-06-22 13:49:51', '5', '2022-06-22 13:49:51', '5', NULL);
INSERT INTO `sta_system` VALUES (338, '10+600 Lajur A', 'ON RAMP BANDUNG', 'Bandung - Soreang', 'BANDUNG', '10', '600', 'A', 'MELENGKUNG', 'MENURUN', '', '', 'CMLJ', '2022-06-22 13:51:01', '5', '2022-06-22 13:51:01', '5', NULL);

-- ----------------------------
-- Table structure for status_kejadian
-- ----------------------------
DROP TABLE IF EXISTS `status_kejadian`;
CREATE TABLE `status_kejadian`  (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `deskripsi_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu` datetime(0) NULL DEFAULT NULL,
  `petugas_id` int(11) NULL DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_kejadian
-- ----------------------------
INSERT INTO `status_kejadian` VALUES (24, 11, 'LAPORAN - BELUM ADA PETUGAS', '2022-06-22 15:13:00', NULL, NULL, '2022-06-22 15:13:34', '4', '2022-06-22 15:13:34', '4', NULL);
INSERT INTO `status_kejadian` VALUES (25, 11, 'SEDANG DITANGANI PETUGAS', '2022-06-22 15:14:00', NULL, NULL, '2022-06-22 15:14:34', '4', '2022-06-22 15:14:34', '4', NULL);
INSERT INTO `status_kejadian` VALUES (26, 11, 'SELESAI', '2022-06-22 15:20:00', NULL, NULL, '2022-06-22 15:14:45', '4', '2022-06-22 15:14:45', '4', NULL);
INSERT INTO `status_kejadian` VALUES (27, 12, 'LAPORAN - BELUM ADA PETUGAS', '2022-06-22 14:20:00', NULL, NULL, '2022-06-22 15:16:41', '5', '2022-06-22 15:16:41', '5', NULL);
INSERT INTO `status_kejadian` VALUES (28, 12, 'SEDANG DITANGANI PETUGAS', '2022-06-22 14:30:00', NULL, NULL, '2022-06-22 15:16:56', '5', '2022-06-22 15:16:56', '5', NULL);
INSERT INTO `status_kejadian` VALUES (29, 12, 'SELESAI', '2022-06-22 15:00:00', NULL, NULL, '2022-06-22 15:17:16', '5', '2022-06-22 15:17:16', '5', NULL);
INSERT INTO `status_kejadian` VALUES (30, 13, 'SELESAI', '2022-06-23 16:44:00', NULL, NULL, '2022-06-23 14:55:21', '4', '2022-06-23 16:44:20', '4', NULL);
INSERT INTO `status_kejadian` VALUES (31, 14, 'LAPORAN - BELUM ADA PETUGAS', '2022-06-27 09:49:00', NULL, NULL, '2022-06-27 09:49:06', '4', '2022-06-27 09:49:06', '4', NULL);

-- ----------------------------
-- Table structure for sumber_informasi
-- ----------------------------
DROP TABLE IF EXISTS `sumber_informasi`;
CREATE TABLE `sumber_informasi`  (
  `id_informasi` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_informasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_informasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sumber_informasi
-- ----------------------------
INSERT INTO `sumber_informasi` VALUES (1, 'AMBULANCE', '2022-04-27 11:40:13', '12', '2022-04-27 11:40:13', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (2, 'BISON', '2022-04-27 11:40:42', '12', '2022-04-27 11:44:32', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (3, 'CRANE', '2022-04-27 11:40:59', '12', '2022-04-27 11:45:10', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (4, 'DEREK', '2022-04-27 11:41:18', '12', '2022-04-27 11:41:18', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (5, 'ELANG', '2022-04-27 11:45:21', '12', '2022-04-27 11:45:21', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (6, 'PEMAKAI JALAN', '2022-04-27 11:46:28', '12', '2022-04-27 11:46:28', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (7, 'PPGT ', '2022-04-27 11:47:28', '12', '2022-04-27 11:47:28', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (8, 'PJR', '2022-04-27 11:47:48', '12', '2022-04-27 11:47:48', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (9, 'RESCUE', '2022-04-27 11:48:04', '12', '2022-04-27 11:48:04', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (10, 'RADIO KOMUNIKASI', '2022-04-27 11:48:23', '12', '2022-06-06 16:33:24', '1', NULL);
INSERT INTO `sumber_informasi` VALUES (11, 'ZEBRA', '2022-04-27 11:48:38', '12', '2022-04-27 11:48:38', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (12, 'TELEPON', '2022-04-27 11:49:16', '12', '2022-04-27 11:49:16', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (13, 'WHATSAPP', '2022-04-27 11:49:34', '12', '2022-04-27 11:49:34', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (14, 'INSTAGRAM', '2022-04-27 11:49:51', '12', '2022-04-27 11:49:51', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (15, 'TWITTER', '2022-04-27 11:51:12', '12', '2022-04-27 11:51:12', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (16, 'LAIN-LAIN', '2022-04-27 11:51:31', '12', '2022-04-27 11:51:31', '12', NULL);
INSERT INTO `sumber_informasi` VALUES (17, 'CCTV', '2022-06-06 16:33:32', '1', '2022-06-06 16:33:32', '1', NULL);

-- ----------------------------
-- Table structure for tindakan_kejadian
-- ----------------------------
DROP TABLE IF EXISTS `tindakan_kejadian`;
CREATE TABLE `tindakan_kejadian`  (
  `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,
  `kejadian_id` int(11) NULL DEFAULT NULL,
  `tindakan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu_tindakan` datetime(0) NULL DEFAULT NULL,
  `catatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tindakan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tindakan_kejadian
-- ----------------------------
INSERT INTO `tindakan_kejadian` VALUES (7, 12, 'DIDEREK KELUAR OFF TERDEKAT', '2022-06-23 09:00:00', 'Tka', '2022-06-23 09:01:41', '5', '2022-06-23 09:01:41', '5', NULL);
INSERT INTO `tindakan_kejadian` VALUES (8, 11, 'DIBANTU LANJUT PERJALANAN', '2022-06-23 09:02:00', 'Tka', '2022-06-23 09:02:09', '4', '2022-06-23 09:02:09', '4', NULL);
INSERT INTO `tindakan_kejadian` VALUES (9, 13, 'DIDEREK KELUAR OFF TERDEKAT', '2022-06-23 16:46:00', 'Ok', '2022-06-23 16:46:17', '4', '2022-06-23 16:46:17', '4', NULL);

-- ----------------------------
-- Table structure for tipe_tabrakan
-- ----------------------------
DROP TABLE IF EXISTS `tipe_tabrakan`;
CREATE TABLE `tipe_tabrakan`  (
  `id_tipe_tabrakan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipe_tabrakan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipe_tabrakan
-- ----------------------------
INSERT INTO `tipe_tabrakan` VALUES (1, 'GANDA-TABRAKAN DEPAN-DEPAN', '', '2022-04-27 11:54:54', '12', '2022-04-27 11:54:54', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (2, 'GANDA-TABRAKAN SAMPING', '', '2022-04-27 11:55:29', '12', '2022-04-27 11:55:29', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (3, 'GANDA-TABRAKAN DEPAN BELAKANG', '', '2022-04-27 11:55:42', '12', '2022-04-27 11:55:42', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (4, 'GANDA-LAIN-LAIN', '', '2022-04-27 11:55:51', '12', '2022-04-27 11:55:51', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (5, 'TUNGGAL-KELUAR JALUR DI JALAN LURUS', '', '2022-04-27 11:56:03', '12', '2022-04-27 11:56:03', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (6, 'TUNGGAL-KELUAR JALUR DI JALAN MENIKUNG', '', '2022-04-27 13:17:12', '12', '2022-04-27 13:17:12', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (7, 'TUNGGAL-KECELAKAAN TIDAK KELUAR JALUR', '', '2022-04-27 13:17:48', '12', '2022-04-27 13:17:48', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (8, 'TUNGGAL-MENABRAK HEWAN', '', '2022-04-27 13:18:45', '12', '2022-04-27 13:18:45', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (9, 'TUNGGAL-MENABRAK ORANG', '', '2022-04-27 13:18:55', '12', '2022-04-27 13:18:55', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (10, 'TUNGGAL-MENABRAK GERBANG TOL', '', '2022-04-27 13:19:05', '12', '2022-04-27 13:19:05', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (11, 'TUNGGAL-MENABRAK GUARD RAIL/MEDIAN BAR', '', '2022-04-27 13:19:15', '12', '2022-04-27 13:19:15', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (12, 'TUNGGAL-MENABRAK OBYEK TETAP', '', '2022-04-27 13:19:28', '12', '2022-04-27 13:19:28', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (13, 'TUNGGAL-MENABRAK BARRIER', '', '2022-04-27 13:19:36', '12', '2022-04-27 13:19:36', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (14, 'BERUNTUN-TABRAKAN DEPAN-DEPAN', '', '2022-04-27 13:19:47', '12', '2022-04-27 13:19:47', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (15, 'BERUNTUN-TABRAKAN SAMPING', '', '2022-04-27 13:19:59', '12', '2022-04-27 13:19:59', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (16, 'BERUNTUN-TABRAKAN DEPAN BELAKANG', '', '2022-04-27 13:20:12', '12', '2022-04-27 13:20:12', '12', NULL);
INSERT INTO `tipe_tabrakan` VALUES (17, 'BERUNTUN-LAIN-LAIN', '', '2022-04-27 13:20:21', '12', '2022-04-27 13:20:21', '12', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(16) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'cmnpadmin', '$2y$10$O5MWn44GnAU4MCOCNIlp.eMrd0K0WjLgYgTxAE5HLC5khZ9a8.aie', 'Administrator', 'CMNP', 'admin', '1', '2022-05-25 04:23:59', NULL, '2022-06-27 14:30:20', NULL);
INSERT INTO `users` VALUES (5, 'cmljadmin', '$2y$10$O5MWn44GnAU4MCOCNIlp.eMrd0K0WjLgYgTxAE5HLC5khZ9a8.aie', 'Administrator', 'CMLJ', 'admin', '1', '2022-05-25 04:23:59', NULL, '2022-06-27 10:16:55', NULL);
INSERT INTO `users` VALUES (6, 'cwadmin', '$2y$10$O5MWn44GnAU4MCOCNIlp.eMrd0K0WjLgYgTxAE5HLC5khZ9a8.aie', 'Administrator', 'CW', 'admin', NULL, '2022-05-25 04:23:59', NULL, '2022-05-25 04:23:59', NULL);
INSERT INTO `users` VALUES (7, 'direkturcmnp', '$2y$10$YvebSI3TYWCfFMf5Ut.oIu02jBb4SaDbXUMzoZ8/ZhlLZkqqAY6ji', 'Direktur', 'CMNP', 'direktur', '1', NULL, NULL, '2022-06-27 10:17:26', NULL);

-- ----------------------------
-- Triggers structure for table detail_laporan
-- ----------------------------
DROP TRIGGER IF EXISTS `tri_delete_detail_laporan`;
delimiter ;;
CREATE TRIGGER `tri_delete_detail_laporan` AFTER DELETE ON `detail_laporan` FOR EACH ROW BEGIN
	update penerimaan_laporan set kejadian_id = null where id_pelapor = old.laporan_id;
    END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
