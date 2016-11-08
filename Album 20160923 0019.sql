--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.0.49.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 23.09.2016 0:19:11
-- Версия сервера: 5.7.11
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE Album;

--
-- Описание для таблицы gallery
--
DROP TABLE IF EXISTS gallery;
CREATE TABLE gallery (
  id_gallery INT(11) NOT NULL AUTO_INCREMENT,
  gallery_name VARCHAR(50) NOT NULL,
  cover VARCHAR(250) NOT NULL,
  PRIMARY KEY (id_gallery),
  UNIQUE INDEX UK_gallery_gallery_name (gallery_name)
)
ENGINE = INNODB
AUTO_INCREMENT = 8
AVG_ROW_LENGTH = 2340
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы images
--
DROP TABLE IF EXISTS images;
CREATE TABLE images (
  id_image INT(11) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор картинки',
  id_gallery INT(11) NOT NULL COMMENT 'идентификатор галлереи',
  image VARCHAR(255) NOT NULL COMMENT 'путь к картинке',
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id_image),
  CONSTRAINT FK_images_gallery_id_gallery FOREIGN KEY (id_gallery)
    REFERENCES gallery(id_gallery) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 286
AVG_ROW_LENGTH = 187
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы news
--
DROP TABLE IF EXISTS news;
CREATE TABLE news (
  id BIGINT(255) NOT NULL AUTO_INCREMENT,
  title VARCHAR(60) NOT NULL,
  date TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата размещения новости',
  content VARCHAR(4000) NOT NULL,
  admin VARCHAR(30) NOT NULL,
  image VARCHAR(255) DEFAULT NULL COMMENT 'Ссылка на первое фото в новости',
  image1 VARCHAR(255) DEFAULT NULL COMMENT 'Ссылка на второе фото в новости',
  image2 VARCHAR(255) DEFAULT NULL COMMENT 'Ссылка на третье фото в новости',
  PRIMARY KEY (id),
  CONSTRAINT FK_news_user_name FOREIGN KEY (admin)
    REFERENCES user(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AUTO_INCREMENT = 22
AVG_ROW_LENGTH = 1820
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'таблица для хранения новостей'
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы user
--
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя',
  name VARCHAR(30) NOT NULL COMMENT 'login пользователя',
  email VARCHAR(30) NOT NULL COMMENT 'почта пользователя',
  password VARCHAR(20) NOT NULL COMMENT 'пароль пользователя',
  role VARCHAR(10) DEFAULT NULL COMMENT 'поле для определения Админа и user',
  PRIMARY KEY (id),
  UNIQUE INDEX UK_user_name (name)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы video
--
DROP TABLE IF EXISTS video;
CREATE TABLE video (
  id_video INT(11) NOT NULL AUTO_INCREMENT,
  ref_youtube VARCHAR(255) NOT NULL,
  title VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_video)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы gallery
--
INSERT INTO gallery VALUES
(1, 'Новый_год_вместе с "Glyanetss"', 'https://pp.vk.me/c627727/v627727903/35dbc/IBJRB7hBw4c.jpg'),
(2, 'Новый_2016', 'https://pp.vk.me/c629413/v629413903/2bef7/ivu7IHzujSc.jpg'),
(3, 'Семейное чаепитие Алёны Арсентьевой', 'http://cs631224.vk.me/v631224903/165a0/dWcBxfEVdMQ.jpg'),
(4, 'Свадебный переполох', 'https://pp.vk.me/c631224/v631224769/125f4/FY5TF2kDY5g.jpg'),
(5, 'Наш альбом', 'https://pp.vk.me/c628429/v628429903/27591/-7Rm-mIuanM.jpg'),
(6, 'Семейные фотосессии', 'https://pp.vk.me/c629413/v629413903/2baa4/2EgmHUtsry8.jpg'),
(7, 'В ожидании маленького чуда', 'https://pp.vk.me/c629413/v629413903/2b972/c-2zmUAOlvk.jpg');

-- 
-- Вывод данных для таблицы images
--
INSERT INTO images VALUES
(1, 1, 'https://pp.vk.me/c627727/v627727903/35c7f/tZnCoYkyxF0.jpg', NULL),
(2, 1, 'https://pp.vk.me/c627727/v627727903/35c89/agheHqIcxnE.jpg', NULL),
(3, 1, 'https://pp.vk.me/c627727/v627727903/35c93/ZwSVqO1NO8U.jpg', NULL),
(4, 1, 'http://cs627727.vk.me/v627727903/35c9f/hMzPaAjq5rw.jpg', NULL),
(5, 1, 'http://cs627727.vk.me/v627727903/35ca9/CM9up9n_DmE.jpg', NULL),
(6, 1, 'http://cs627727.vk.me/v627727903/35cb3/8nnJQlSEAX4.jpg', NULL),
(7, 1, 'http://cs627727.vk.me/v627727903/35cbd/cpBRes7kw9U.jpg', NULL),
(8, 1, 'http://cs627727.vk.me/v627727903/35cc7/0c0JePWstSc.jpg', NULL),
(9, 1, 'http://cs627727.vk.me/v627727903/35cd1/v01jfvsJkfs.jpg', NULL),
(10, 1, 'http://cs627727.vk.me/v627727903/35cdb/PMXumz4SZ4U.jpg', NULL),
(11, 1, 'http://cs627727.vk.me/v627727903/35d44/4cZMOtXXYk0.jpg', NULL),
(12, 1, 'http://cs627727.vk.me/v627727903/35d4d/e5RRZqQECCE.jpg', NULL),
(13, 1, 'http://cs627727.vk.me/v627727903/35d56/DcS3pq2uvLg.jpg', NULL),
(14, 1, 'http://cs627727.vk.me/v627727903/35d5f/ZEGVJ1kTEzY.jpg', NULL),
(15, 1, 'http://cs627727.vk.me/v627727903/35d68/YpHEpsyKyAc.jpg', NULL),
(16, 1, 'http://cs627727.vk.me/v627727903/35d71/vXm9a44t2JU.jpg', NULL),
(17, 1, 'http://cs627727.vk.me/v627727903/35d7a/5AFVBnZYX4I.jpg', NULL),
(18, 1, 'http://cs627727.vk.me/v627727903/35d83/O2bRXXfbMLc.jpg', NULL),
(19, 1, 'http://cs627727.vk.me/v627727903/35d8c/_gS1RKwxpT0.jpg', NULL),
(20, 1, 'http://cs627727.vk.me/v627727903/35d95/RqyruRx40C0.jpg', NULL),
(21, 1, 'http://cs627727.vk.me/v627727903/35d9e/CzOEJYr5Apc.jpg', NULL),
(22, 1, 'http://cs627727.vk.me/v627727903/35da7/zRBfIkNgn9Y.jpg', NULL),
(23, 1, 'http://cs627727.vk.me/v627727903/35db0/tGyps5ymcNE.jpg', NULL),
(24, 1, 'http://cs627727.vk.me/v627727903/35db9/mB2NNQmYZ5E.jpg', NULL),
(25, 1, 'http://cs627727.vk.me/v627727903/35dc2/diztbulL418.jpg', NULL),
(26, 1, 'http://cs627727.vk.me/v627727903/35dcb/oLmfRNjg_HI.jpg', NULL),
(27, 1, 'http://cs627727.vk.me/v627727903/35dd4/465fqfl_p9Q.jpg', NULL),
(28, 1, 'http://cs627727.vk.me/v627727903/35ddd/263fu2BF7Eg.jpg', NULL),
(29, 1, 'http://cs627727.vk.me/v627727903/35de6/WQjYC6T-5yM.jpg', NULL),
(30, 1, 'http://cs627727.vk.me/v627727903/35def/oos6637k8Ts.jpg', NULL),
(31, 1, 'http://cs627727.vk.me/v627727903/35df8/SGnwLM4Dv2M.jpg', NULL),
(32, 1, 'http://cs627727.vk.me/v627727903/35e01/2ExP-CQtpPs.jpg', NULL),
(33, 1, 'http://cs627727.vk.me/v627727903/35e0a/VOYTnr4tRVg.jpg', NULL),
(34, 1, 'http://cs627727.vk.me/v627727903/35e13/hstlWF7pzX0.jpg', NULL),
(35, 1, 'http://cs627727.vk.me/v627727903/35e1c/WrUYO4sMR0U.jpg', NULL),
(36, 1, 'http://cs627727.vk.me/v627727903/35e25/TAhp64xJ8tg.jpg', NULL),
(37, 1, 'http://cs627727.vk.me/v627727903/35e2e/DZz3e5A5UJQ.jpg', NULL),
(38, 1, 'http://cs627727.vk.me/v627727903/35e37/8_rtM0I2otk.jpg', NULL),
(39, 1, 'http://cs627727.vk.me/v627727903/35e40/vfil5UuPxVY.jpg', NULL),
(40, 1, 'http://cs627727.vk.me/v627727903/35e49/RqqE3SfcUyg.jpg', NULL),
(41, 1, 'http://cs627727.vk.me/v627727903/35e52/DhHRsY0AI1g.jpg', NULL),
(42, 1, 'http://cs627727.vk.me/v627727903/35e5b/1AUrcOnDnMw.jpg', NULL),
(43, 1, 'http://cs627727.vk.me/v627727903/35e64/FvYCe-YE2VQ.jpg', NULL),
(44, 1, 'http://cs627727.vk.me/v627727903/35e6d/D3OVoU3qnsQ.jpg', NULL),
(45, 1, 'http://cs627727.vk.me/v627727903/35e76/YIcsR0EqXBc.jpg', NULL),
(46, 1, 'http://cs627727.vk.me/v627727903/35e7f/aGWLo-7sBV4.jpg', NULL),
(47, 1, 'http://cs627727.vk.me/v627727903/35e88/xZwkxyGM-wM.jpg', NULL),
(48, 1, 'http://cs627727.vk.me/v627727903/35e88/xZwkxyGM-wM.jpg', NULL),
(49, 1, 'http://cs627727.vk.me/v627727903/35e91/xM_0is87lkg.jpg', NULL),
(50, 1, 'http://cs627727.vk.me/v627727903/35e9a/nYyYiJ8IfSI.jpg', NULL),
(51, 1, 'http://cs627727.vk.me/v627727903/35ea4/62sYo4wS8tI.jpg', NULL),
(52, 1, 'http://cs627727.vk.me/v627727903/35eae/jc9Vrl6b3qM.jpg', NULL),
(53, 1, 'http://cs627727.vk.me/v627727903/35eb8/kZsElD9VTpk.jpg', NULL),
(54, 1, 'http://cs627727.vk.me/v627727903/35ec2/XmBEwycyiNo.jpg', NULL),
(55, 1, 'http://cs627727.vk.me/v627727903/35edd/Gw0PN81UT8A.jpg', NULL),
(56, 1, 'http://cs627727.vk.me/v627727903/35ee6/IYqUIOpYUxc.jpg', NULL),
(57, 1, 'http://cs627727.vk.me/v627727903/35eef/VcdaRzaHT_E.jpg', NULL),
(58, 1, 'http://cs627727.vk.me/v627727903/35ef8/obMqDW8jxgg.jpg', NULL),
(59, 1, 'http://cs627727.vk.me/v627727903/35f01/kljL-hSA7WI.jpg', NULL),
(60, 1, 'http://cs627727.vk.me/v627727903/35f0a/Nxts6Pnon0s.jpg', NULL),
(61, 1, 'http://cs627727.vk.me/v627727903/35f13/8Y58bUaPzFA.jpg', NULL),
(62, 1, 'http://cs627727.vk.me/v627727903/35f1c/lcSE5p4jgoE.jpg', NULL),
(63, 1, 'http://cs627727.vk.me/v627727903/35f25/--nYcpjrcFk.jpg', NULL),
(64, 1, 'http://cs627727.vk.me/v627727903/35f2e/kREsAKOZKgA.jpg', NULL),
(65, 1, 'http://cs627727.vk.me/v627727903/35f37/gTeBVdAJB-s.jpg', NULL),
(66, 1, 'http://cs627727.vk.me/v627727903/35f40/YWCUSfJJgCg.jpg', NULL),
(67, 1, 'http://cs627727.vk.me/v627727903/35f49/VNVu_bXIDek.jpg', NULL),
(68, 1, 'http://cs627727.vk.me/v627727903/35f52/GEsAKhBY4No.jpg', NULL),
(69, 1, 'http://cs627727.vk.me/v627727903/35f5b/pdwBzEr-eBo.jpg', NULL),
(70, 1, 'http://cs627727.vk.me/v627727903/35f64/Y6d2t-AZ6W8.jpg', NULL),
(71, 2, 'http://cs629413.vk.me/v629413903/2be82/pHfQ35qEyYs.jpg', NULL),
(72, 2, 'http://cs629413.vk.me/v629413903/2be8b/5snbR0tUjx8.jpg', NULL),
(73, 2, 'http://cs629413.vk.me/v629413903/2be94/cyLRkT685lM.jpg', NULL),
(74, 2, 'http://cs629413.vk.me/v629413903/2be9d/sPZQyh1O4oI.jpg', NULL),
(75, 2, 'http://cs629413.vk.me/v629413903/2bea6/1b2msqXx4gw.jpg', NULL),
(76, 2, 'http://cs629413.vk.me/v629413903/2beaf/vLEDEmy8qMc.jpg\r\n', NULL),
(77, 2, 'http://cs629413.vk.me/v629413903/2beb8/oaoZ_rRM5xw.jpg', NULL),
(78, 2, 'http://cs629413.vk.me/v629413903/2bec1/Cs3Les7igSs.jpg', NULL),
(79, 2, 'http://cs629413.vk.me/v629413903/2beca/-1MenrYJHWY.jpg', NULL),
(80, 2, 'http://cs629413.vk.me/v629413903/2bed3/svm_Ww5cGv0.jpg', NULL),
(81, 2, 'http://cs629413.vk.me/v629413903/2bedc/Da8m9FqcxjI.jpg', NULL),
(82, 2, 'http://cs629413.vk.me/v629413903/2beeb/QeCjpjn7axI.jpg', NULL),
(83, 2, 'http://cs629413.vk.me/v629413903/2bef4/yctWSP97-b0.jpg', NULL),
(84, 2, 'http://cs629413.vk.me/v629413903/2befd/_RLN-64Ey8c.jpg', NULL),
(85, 2, 'http://cs629413.vk.me/v629413903/2bf06/LfqYxy080GU.jpg', NULL),
(86, 2, 'http://cs629413.vk.me/v629413903/2bf0f/aTcthcpsreU.jpg', NULL),
(87, 2, 'http://cs629413.vk.me/v629413903/2bf18/8XOsGPEKTko.jpg', NULL),
(88, 2, 'http://cs629413.vk.me/v629413903/2bf21/jRAx88Zht1E.jpg', NULL),
(89, 2, 'http://cs629413.vk.me/v629413903/2bf2a/05vehQa8Y5k.jpg', NULL),
(90, 2, 'http://cs629413.vk.me/v629413903/2bf33/kS2uhJAmF8I.jpg', NULL),
(91, 2, 'http://cs629413.vk.me/v629413903/2bf3c/DkdkdEQq5QY.jpg', NULL),
(92, 2, 'http://cs629413.vk.me/v629413903/2bf45/w-lJ6A2a83M.jpg', NULL),
(93, 2, 'http://cs629413.vk.me/v629413903/2bf4e/p8lDnCYAJ2g.jpg', NULL),
(94, 2, 'http://cs629413.vk.me/v629413903/2bf57/ZJbKtjrw6hQ.jpg', NULL),
(95, 2, 'http://cs629413.vk.me/v629413903/2bf60/y6qeasC_jwQ.jpg', NULL),
(96, 2, 'http://cs629413.vk.me/v629413903/2bf69/Z8QwiaWPmRw.jpg', NULL),
(97, 2, 'http://cs629413.vk.me/v629413903/2bf72/uDaIad7sxN0.jpg', NULL),
(98, 2, 'http://cs629413.vk.me/v629413903/2bf7b/td-31AovFRE.jpg', NULL),
(99, 2, 'http://cs629413.vk.me/v629413903/2bf84/LkCkIRVc3PU.jpg', NULL),
(100, 2, 'http://cs629413.vk.me/v629413903/2bf8d/q-QORkR8yL8.jpg', NULL),
(101, 2, 'http://cs629413.vk.me/v629413903/2bf96/iJyETA59pfE.jpg', NULL),
(102, 2, 'http://cs629413.vk.me/v629413903/2bf9f/XxvrDbDRUV8.jpg', NULL),
(103, 2, 'http://cs629413.vk.me/v629413903/2bfa8/7mPqP6RCRS0.jpg', NULL),
(104, 2, 'http://cs627822.vk.me/v627822903/3a3f2/DFPM1WvxXc0.jpg', NULL),
(105, 2, 'http://cs627822.vk.me/v627822903/3a3fc/gqu1WxymIa0.jpg', NULL),
(106, 2, 'http://cs627822.vk.me/v627822903/3a406/iLEhVQKT4ew.jpg', NULL),
(107, 2, 'http://cs627822.vk.me/v627822903/3a410/ev3K1DgNGLY.jpg', NULL),
(108, 2, 'http://cs627822.vk.me/v627822903/3a41a/5aWBmjWnySE.jpg', NULL),
(109, 2, 'http://cs627822.vk.me/v627822903/3a424/EYAn9XceYNg.jpg', NULL),
(110, 2, 'http://cs627822.vk.me/v627822903/3a42e/QX0Quw0GWH8.jpg', NULL),
(111, 2, 'http://cs627822.vk.me/v627822903/3a438/TimgFK0bpSU.jpg', NULL),
(112, 2, 'http://cs627822.vk.me/v627822903/3a442/iRZgmdhqs5k.jpg', NULL),
(113, 2, 'http://cs627822.vk.me/v627822903/3a44c/yu7bA90solg.jpg', NULL),
(114, 2, 'http://cs627822.vk.me/v627822903/3a456/R1XRnBJEApA.jpg', NULL),
(115, 2, 'http://cs627822.vk.me/v627822903/3a460/tzd7Q945xUQ.jpg', NULL),
(116, 3, 'http://cs631224.vk.me/v631224903/165cf/_iog8cJ2aeg.jpg', NULL),
(117, 3, 'http://cs631224.vk.me/v631224903/165d9/P6JNZQtQo5k.jpg', NULL),
(118, 3, 'http://cs631224.vk.me/v631224903/165e3/V-5J2iSBX6o.jpg', NULL),
(119, 3, 'http://cs631224.vk.me/v631224903/165ed/hEly6uCR_Pk.jpg', NULL),
(120, 3, 'http://cs631224.vk.me/v631224903/165f7/OH23zDcIV7M.jpg', NULL),
(121, 3, 'http://cs631224.vk.me/v631224903/16601/hMc1-gswOrY.jpg', NULL),
(122, 3, 'http://cs631224.vk.me/v631224903/1660b/iL-VidFRLuE.jpg', NULL),
(123, 3, 'http://cs631224.vk.me/v631224903/16615/yZdD9k5sTNs.jpg', NULL),
(124, 3, 'http://cs631224.vk.me/v631224903/1661f/trHu4FFWS6A.jpg', NULL),
(125, 3, 'http://cs631224.vk.me/v631224903/16629/irmC0ABQDVI.jpg', NULL),
(126, 3, 'http://cs631224.vk.me/v631224903/16633/0e0twO7uBrc.jpg', NULL),
(127, 3, 'http://cs631224.vk.me/v631224903/1663d/RvU4Cjns1nk.jpg', NULL),
(128, 3, 'http://cs631224.vk.me/v631224903/16647/Yho_B1mEm8A.jpg', NULL),
(129, 3, 'http://cs631224.vk.me/v631224903/16651/XWgt3V8bekE.jpg', NULL),
(130, 3, 'http://cs631224.vk.me/v631224903/1665b/UGm0n1ve888.jpg', NULL),
(131, 3, 'http://cs631224.vk.me/v631224903/16665/Jvo90PL9UFE.jpg', NULL),
(132, 3, 'http://cs631224.vk.me/v631224903/1666f/DGHSDzj85n4.jpg', NULL),
(133, 3, 'http://cs631224.vk.me/v631224903/16679/TWdV4FpF3PA.jpg', NULL),
(134, 3, 'http://cs631224.vk.me/v631224903/16683/czBSBTk5mz0.jpg\r\n', NULL),
(135, 3, 'http://cs631224.vk.me/v631224903/1668d/_fZGrAF8ILE.jpg', NULL),
(136, 3, 'http://cs631224.vk.me/v631224903/16734/MpVGcetOoeU.jpg', NULL),
(137, 3, 'http://cs631224.vk.me/v631224903/1673e/Nd0VN5aMPMc.jpg', NULL),
(138, 3, 'http://cs631224.vk.me/v631224903/16697/ny3EGyislAw.jpg', NULL),
(139, 3, 'http://cs631224.vk.me/v631224903/166a1/DVTo3Pf_ZSo.jpg', NULL),
(140, 3, 'http://cs631224.vk.me/v631224903/166ab/c6WjSeE1ZM4.jpg', NULL),
(141, 3, 'http://cs631224.vk.me/v631224903/166b5/M-EyBDDKyHQ.jpg', NULL),
(142, 3, 'http://cs631224.vk.me/v631224903/166bf/9iz7nPHu2Og.jpg', NULL),
(143, 3, 'http://cs631224.vk.me/v631224903/166c9/Udo_heeauhs.jpg', NULL),
(144, 3, 'http://cs631224.vk.me/v631224903/166d3/qQt0tcDAZN0.jpg', NULL),
(145, 3, 'http://cs631224.vk.me/v631224903/16716/SD0Z8r8zSdg.jpg', NULL),
(146, 3, 'http://cs631224.vk.me/v631224903/16720/D1epYhuFYCY.jpg', NULL),
(147, 3, 'http://cs631224.vk.me/v631224903/1672a/zrsJWONIbTs.jpg', NULL),
(148, 4, 'http://cs629413.vk.me/v629413903/2bae9/Uo59FPzTF0M.jpg', NULL),
(149, 4, 'http://cs629413.vk.me/v629413903/2baf2/S6bq8ZQsTB4.jpg', NULL),
(150, 4, 'http://cs629413.vk.me/v629413903/2bafb/-AbkMBKvSuM.jpg', NULL),
(151, 4, 'http://cs629413.vk.me/v629413903/2bb04/JQUfbLBJG6w.jpg', NULL),
(152, 4, 'http://cs629413.vk.me/v629413903/2bb0d/Paoxg3UhFf8.jpg', NULL),
(153, 4, 'http://cs629413.vk.me/v629413903/2bb16/U_b7uDIlaPg.jpg', NULL),
(154, 4, 'http://cs629413.vk.me/v629413903/2bb1f/6LS5VnSFWgA.jpg', NULL),
(155, 4, 'http://cs629413.vk.me/v629413903/2bb28/L3eEDTcGRjg.jpg', NULL),
(156, 4, 'http://cs629413.vk.me/v629413903/2bb31/8rwUCHDN-D4.jpg', NULL),
(157, 4, 'http://cs629413.vk.me/v629413903/2bb3a/ZO4phQqZ2NY.jpg', NULL),
(158, 4, 'http://cs629413.vk.me/v629413903/2bb43/NtmfnXEuCIU.jpg', NULL),
(159, 4, 'http://cs629413.vk.me/v629413903/2bb4c/93KbRwn0Tws.jpg', NULL),
(160, 4, 'http://cs629413.vk.me/v629413903/2bb55/yMV2Cx8Pvro.jpg', NULL),
(161, 4, 'http://cs629413.vk.me/v629413903/2bb5e/7SDi9OrJAAI.jpg', NULL),
(162, 4, 'http://cs629413.vk.me/v629413903/2bb67/aZqXkVX3AR4.jpg', NULL),
(163, 4, 'http://cs629413.vk.me/v629413903/2bb70/21gLo5CFwUs.jpg', NULL),
(164, 4, 'http://cs629413.vk.me/v629413903/2bb79/D-lg5cZd1vc.jpg', NULL),
(165, 4, 'http://cs629413.vk.me/v629413903/2bb82/TfT8vyim1lc.jpg', NULL),
(166, 4, 'http://cs629413.vk.me/v629413903/2bb8b/TvHikC3P_Ps.jpg', NULL),
(167, 4, 'http://cs629413.vk.me/v629413903/2bb94/CSoydO_66ds.jpg', NULL),
(168, 4, 'http://cs629413.vk.me/v629413903/2bba6/jzEN-Vhyqs8.jpg', NULL),
(169, 4, 'http://cs629413.vk.me/v629413903/2bbaf/Us0O3Y_OkkQ.jpg', NULL),
(170, 4, 'http://cs629413.vk.me/v629413903/2bbb8/YEVlsDVtu1o.jpg', NULL),
(171, 4, 'http://cs629413.vk.me/v629413903/2bbc1/hYB7hqo9AKs.jpg', NULL),
(172, 4, 'http://cs629413.vk.me/v629413903/2bbca/pgt35ni4FxA.jpg', NULL),
(173, 4, 'http://cs629413.vk.me/v629413903/2bbd3/VGR5RcsB8f0.jpg', NULL),
(174, 4, 'http://cs629413.vk.me/v629413903/2bbdc/Tyzl_mqBwoY.jpg', NULL),
(175, 4, 'http://cs629413.vk.me/v629413903/2bbe5/on0g6zG5qNQ.jpg', NULL),
(176, 4, 'http://cs629413.vk.me/v629413903/2bbee/mM2_r4n4h4g.jpg', NULL),
(177, 4, 'http://cs629413.vk.me/v629413903/2bbf7/IwQEahSXr5E.jpg', NULL),
(178, 4, 'http://cs629413.vk.me/v629413903/2bc00/OpdDyJem5fM.jpg', NULL),
(179, 4, 'http://cs629413.vk.me/v629413903/2bc09/zooyeVMYrrs.jpg', NULL),
(180, 4, 'http://cs629413.vk.me/v629413903/2bc12/38lMK8647sM.jpg', NULL),
(181, 4, 'http://cs629413.vk.me/v629413903/2bc1b/leG7Cxpo_5U.jpg', NULL),
(182, 4, 'http://cs629413.vk.me/v629413903/2bc24/ERrF3ImGd_0.jpg', NULL),
(183, 4, 'http://cs629413.vk.me/v629413903/2bc2d/zpXw1syC91U.jpg', NULL),
(184, 4, 'http://cs629413.vk.me/v629413903/2bc36/EukAxjIruz8.jpg', NULL),
(185, 4, 'http://cs629413.vk.me/v629413903/2bc48/6EbwlFTsEB8.jpg', NULL),
(186, 4, 'http://cs629413.vk.me/v629413903/2bc51/zPfDmWywHMg.jpg', NULL),
(187, 4, 'http://cs629413.vk.me/v629413903/2bc5a/IAs_1mTRUj8.jpg', NULL),
(188, 4, 'http://cs629413.vk.me/v629413903/2bc63/_ruAdJWACfc.jpg', NULL),
(189, 4, 'http://cs629413.vk.me/v629413903/2bc6c/jAAQrv9FFhg.jpg', NULL),
(190, 4, 'http://cs629413.vk.me/v629413903/2bc75/jkWAGi83dRY.jpg', NULL),
(191, 4, 'http://cs629413.vk.me/v629413903/2bc7e/Y-wp7YSTX2Y.jpg', NULL),
(192, 4, 'http://cs629413.vk.me/v629413903/2bc87/PsdEN6NF6gk.jpg', NULL),
(193, 4, 'http://cs629413.vk.me/v629413903/2bc90/VAkYXJmwiIU.jpg', NULL),
(194, 4, 'http://cs629413.vk.me/v629413903/2bc99/C1euVx0B93g.jpg', NULL),
(195, 4, 'http://cs629413.vk.me/v629413903/2bca2/FuH-ZO8Mo9I.jpg', NULL),
(196, 4, 'http://cs629413.vk.me/v629413903/2bcab/nmaMlHq77dQ.jpg', NULL),
(197, 4, 'http://cs629413.vk.me/v629413903/2bcb4/DYQC5DGoXM8.jpg', NULL),
(198, 4, 'http://cs631224.vk.me/v631224769/125e8/hSiApOiGRHU.jpg', NULL),
(199, 4, 'http://cs631224.vk.me/v631224769/125f1/k2imJFagah4.jpg', NULL),
(200, 5, 'http://cs628429.vk.me/v628429903/2758e/IGcMEeL3ysk.jpg', NULL),
(201, 5, 'http://cs628430.vk.me/v628430903/27651/gQPhavx_-uE.jpg', NULL),
(202, 5, 'http://cs627729.vk.me/v627729903/3de7d/-jcU7EnUoTw.jpg', NULL),
(203, 5, 'http://cs630818.vk.me/v630818903/2ca5/KHehhFkfdA8.jpg', NULL),
(204, 5, 'http://cs630818.vk.me/v630818903/2cae/18eOH9M92Nc.jpg', NULL),
(205, 5, 'http://cs627131.vk.me/v627131903/47e8/p0GvQNq7_TA.jpg', NULL),
(206, 5, 'http://cs627131.vk.me/v627131903/47d6/Zq0cxls6hGQ.jpg', NULL),
(207, 5, 'http://cs623819.vk.me/v623819903/c48e/4048HBJaAgs.jpg', NULL),
(208, 5, 'http://cs620029.vk.me/v620029903/19ef2/G2WeqihHApQ.jpg', NULL),
(209, 5, 'http://cs620628.vk.me/v620628903/e92/BJ7HE65cv0Q.jpg', NULL),
(210, 5, 'http://cs606116.vk.me/v606116903/1d98/SzhlSTVIyHg.jpg', NULL),
(211, 5, 'http://cs606116.vk.me/v606116903/1d8f/tGivd-AbPfk.jpg', NULL),
(212, 5, 'http://cs606116.vk.me/v606116903/1d86/Y4VeS0-L_08.jpg', NULL),
(213, 5, 'http://cs606116.vk.me/v606116903/1d7d/cg_iHYOYQSk.jpg', NULL),
(214, 5, 'http://cs606116.vk.me/v606116903/1d74/iuUwrprKkMw.jpg', NULL),
(215, 5, 'http://cs616529.vk.me/v616529903/447f/4qBI6-iTiio.jpg', NULL),
(216, 5, 'http://cs310917.vk.me/v310917903/1a15/a2t0eHMLRwU.jpg', NULL),
(217, 5, 'http://cs6089.vk.me/v6089903/5732/SZtQh701vsg.jpg', NULL),
(218, 5, 'http://cs306506.vk.me/v306506903/bc19/t97ARWPtt8U.jpg', NULL),
(219, 5, 'http://cs405429.vk.me/v405429903/75f5/NqoyOTiWH-A.jpg', NULL),
(220, 5, 'http://cs307606.vk.me/v307606903/6d60/d5WGk8phQ2U.jpg', NULL),
(221, 5, 'http://cs407222.vk.me/v407222903/724f/B8I5nRxEakY.jpg', NULL),
(222, 5, 'http://cs407222.vk.me/v407222903/7246/MkBP_4-8K70.jpg', NULL),
(223, 5, 'http://cs302700.vk.me/v302700903/3191/9UeasYSAuZM.jpg', NULL),
(224, 5, 'http://cs406124.vk.me/v406124903/13e0/ZKMP9s3biM8.jpg', NULL),
(225, 5, 'http://cs5733.vk.me/u18307903/-7/y_5868c69c.jpg', NULL),
(226, 5, 'http://cs5733.vk.me/u18307903/-7/y_50bd2dd8.jpg', NULL),
(227, 5, 'http://cs5733.vk.me/u18307903/-7/y_4363c898.jpg', NULL),
(228, 5, 'http://cs5733.vk.me/u18307903/-7/y_3235ab19.jpg', NULL),
(229, 5, 'http://cs5733.vk.me/u18307903/-7/y_5a87f710.jpg', NULL),
(230, 5, 'http://cs5733.vk.me/u18307903/-7/y_c512a5d6.jpg', NULL),
(231, 5, 'http://cs5733.vk.me/u18307903/-7/y_650e55ab.jpg', NULL),
(232, 5, 'http://cs5733.vk.me/u18307903/-7/y_07bb3bcd.jpg', NULL),
(233, 5, 'http://cs11506.vk.me/u18307903/141954554/y_93528e71.jpg', NULL),
(234, 5, 'http://cs11506.vk.me/u18307903/141954554/y_2159cb4d.jpg', NULL),
(235, 5, 'http://cs11506.vk.me/u18307903/141954554/y_31098e95.jpg', NULL),
(236, 5, 'http://cs11270.vk.me/u18307903/-6/y_9166d3da.jpg', NULL),
(237, 5, 'http://cs4905.vk.me/u18307903/-6/y_1dde449e.jpg', NULL),
(238, 5, 'http://cs11465.vk.me/u18307903/-6/y_1ea97b47.jpg', NULL),
(239, 5, 'http://cs11465.vk.me/u18307903/-6/x_d877c4a4.jpg', NULL),
(240, 6, 'http://cs629413.vk.me/v629413903/2b9ae/Gg6uxRngOO8.jpg', NULL),
(241, 6, 'http://cs629413.vk.me/v629413903/2b9b7/1bRSWStjDng.jpg', NULL),
(242, 6, 'http://cs629413.vk.me/v629413903/2b9c0/YeJFUz9d8i4.jpg', NULL),
(243, 6, 'http://cs629413.vk.me/v629413903/2b9c9/4OJzeqF2mzU.jpg', NULL),
(244, 6, 'http://cs629413.vk.me/v629413903/2b9d2/4ed2WHtgpU0.jpg', NULL),
(245, 6, 'http://cs629413.vk.me/v629413903/2b9db/xZVKXHW_jzM.jpg', NULL),
(246, 6, 'http://cs629413.vk.me/v629413903/2b9e4/x6NCnpmm2ZI.jpg', NULL),
(247, 6, 'http://cs629413.vk.me/v629413903/2b9ed/NTjkA1O5Ve4.jpg', NULL),
(248, 6, 'http://cs629413.vk.me/v629413903/2b9f6/ENa6fxhkoWE.jpg', NULL),
(249, 6, 'http://cs629413.vk.me/v629413903/2b9ff/oWQjLSBhYNs.jpg', NULL),
(250, 6, 'http://cs629413.vk.me/v629413903/2ba62/mKmMfkHoqQE.jpg', NULL),
(251, 6, 'http://cs629413.vk.me/v629413903/2ba6b/8Ot-AtGIOzw.jpg', NULL),
(252, 6, 'http://cs629413.vk.me/v629413903/2ba74/SnD01-htsNU.jpg', NULL),
(253, 6, 'http://cs629413.vk.me/v629413903/2ba7d/a1NB1oNr_lc.jpg', NULL),
(254, 6, 'http://cs629413.vk.me/v629413903/2ba86/qex7GHO0nTU.jpg', NULL),
(255, 6, 'http://cs629413.vk.me/v629413903/2ba8f/ktdSel6twPc.jpg', NULL),
(256, 6, 'http://cs629413.vk.me/v629413903/2ba98/lZ5C6j_42C8.jpg', NULL),
(257, 6, 'http://cs629413.vk.me/v629413903/2baa1/ZfAb_g14Kmg.jpg', NULL),
(258, 6, 'http://cs629413.vk.me/v629413903/2baaa/d83zUBDn-w4.jpg', NULL),
(259, 6, 'http://cs629413.vk.me/v629413903/2bab3/s0J0XkBqEwY.jpg', NULL),
(260, 6, 'http://cs629413.vk.me/v629413903/2babc/gTiadvMhJ5o.jpg', NULL),
(261, 6, 'http://cs629413.vk.me/v629413903/2bac5/FeWIzYizY6M.jpg', NULL),
(262, 6, 'http://cs629413.vk.me/v629413903/2bace/OipuHbDaNR4.jpg', NULL),
(263, 6, 'http://cs629413.vk.me/v629413903/2bad7/BMneEC80Vac.jpg', NULL),
(264, 6, 'http://cs629413.vk.me/v629413903/2bae0/ydl9Jtdrgbg.jpg', NULL),
(265, 7, 'http://cs629413.vk.me/v629413903/2b9a4/uVlUIPK3bw8.jpg', NULL),
(266, 7, 'http://cs629413.vk.me/v629413903/2b99b/gcx4rIRAu_k.jpg', NULL),
(267, 7, 'http://cs629413.vk.me/v629413903/2b992/Tzx4UT_1aro.jpg', NULL),
(268, 7, 'http://cs629413.vk.me/v629413903/2b989/dgPp7kRqonk.jpg', NULL),
(269, 7, 'http://cs629413.vk.me/v629413903/2b980/h9WFtRBNmoI.jpg', NULL),
(270, 7, 'http://cs629413.vk.me/v629413903/2b977/Fn7nqwf5D-8.jpg', NULL),
(271, 7, 'http://cs629413.vk.me/v629413903/2b96e/HcL9TGwT8QA.jpg', NULL),
(272, 7, 'http://cs5733.vk.me/u18307903/-7/y_50bd2dd8.jpg', NULL),
(273, 7, 'http://cs5733.vk.me/u18307903/-7/y_4363c898.jpg', NULL),
(274, 7, 'http://cs5733.vk.me/u18307903/-7/y_c512a5d6.jpg', NULL),
(275, 7, 'http://cs5733.vk.me/u18307903/-7/y_650e55ab.jpg', NULL),
(276, 7, 'http://cs5733.vk.me/u18307903/-7/y_07bb3bcd.jpg', NULL),
(277, 1, 'https://pp.vk.me/c627727/v627727903/35c7f/tZnCoYkyxF0.jpg', ''),
(278, 1, 'https://pp.vk.me/c627727/v627727903/35c89/agheHqIcxnE.jpg', ''),
(279, 6, 'https://pp.vk.me/c629401/v629401903/462e6/rxNTwXVW7Bw.jpg', ''),
(280, 6, 'https://pp.vk.me/c629401/v629401903/462f0/5qv0Subfjfw.jpg', ''),
(282, 6, 'https://pp.vk.me/c629401/v629401903/46304/ZstjiWEJ7mY.jpg', ''),
(283, 6, 'https://pp.vk.me/c629401/v629401903/4630e/0TODvC_oogg.jpg', ''),
(284, 6, 'https://pp.vk.me/c629401/v629401903/46318/feMKZZwoyEE.jpg', ''),
(285, 6, 'https://pp.vk.me/c629401/v629401903/46332/ADPbKeRyLx4.jpg', '');

-- 
-- Вывод данных для таблицы news
--
INSERT INTO news VALUES
(1, 'Открытие нашей группы', '2015-12-24 19:09:36', 'Фотографы семъя Рядченко (Минск, Бобруйск и др)\r\nТоржественное открытие нашей группы к 2016 году состоялось!\r\n', 'Mixal', 'http://cs628429.vk.me/v628429903/2758b/riFmkYDrFNU.jpg', NULL, NULL),
(2, 'Фотосессия в новогоднем уголке', '2015-12-25 19:13:00', 'Ура! Вы хотите сфотографироваться в новогоднем уголке, нам помог украсить его собой сам Дедушка Мороз! Который с радостью согласился остаться там до конца января! По желанию можно и без дедушки сфотографироваться, если вам нравится наша новогодняя сказка!', 'Mixal', 'http://cs628430.vk.me/v628430903/2764e/TfIynH3FuPo.jpg', NULL, NULL),
(3, 'Розыгрыш бесплатной фотосессии', '2015-12-26 00:00:00', 'Две недели мы будем проводить розыгрыш бесплатной фотосессии, для этого Вам необходимо сделать репост новости в ВК у нас в группе.', 'Mixal', 'http://cs627729.vk.me/v627729903/3de7a/jxY-Ey7gJmk.jpg', NULL, NULL),
(4, 'Победитель первой недели.', '2015-12-27 23:00:43', 'В конкурсе победил №4 - Татьяна Анейчик!!!Поздравляем победителя, спишемся в личку, остальным желаю победы на следующем этапе, стартующем завтра. =)', 'Mixal', 'http://cs410226.vk.me/v410226341/3720/2J3TckEjzhs.jpg', NULL, NULL),
(5, 'Победитель второй недели.', '2016-01-03 00:26:49', 'Поздравляем победителя, Александре Немилостевой везет сегодня.', 'Mixal', 'http://cs628820.vk.me/v628820099/31c98/FPWe9tDoBAI.jpg', NULL, NULL),
(6, 'Будем рады подарить фотосессию!', '2016-02-19 21:48:24', 'Фотосессия к 23 февраля достанется случайному подписчику, сделавшему репост этой записи и подписавшемуся на Фотографы семъя Рядченко \r\n\r\nИмя счастливчика будет опубликовано отдельным постом в нашем паблике 22 февраля.', 'Mixal', 'http://cs633618.vk.me/v633618675/159a0/jg-Kr2UHSHA.jpg', NULL, NULL),
(7, 'Жизнь - это прежде всего творчество', '2016-02-24 00:00:00', '"Жизнь - это прежде всего творчество, но это не значит, что каждый человек, чтобы жить, должен родиться художником, балериной или ученым. Творчество тоже можно творить. Можно творить просто добрую атмосферу вокруг себя."\r\nД. Лихачёв \r\nТак подписала свои фото Алена Арсентьева! Семейное чаепитие прошло успешно, в спокойной и приятной атмосфере!', 'Mixal', 'http://cs631224.vk.me/v631224903/1659a/uQGuXzEPyMA.jpg', NULL, NULL),
(8, 'Фотосессия к 8 марта', '2016-02-24 21:54:42', 'Фотосессия к 8 марта достанется случайному подписчику, сделавшему репост этой записи и подписавшемуся на Фотографы семъя Рядченко \r\nИмя счастливчика будет опубликовано отдельным постом в нашем паблике 7 марта.', 'Mixal', 'http://cs633618.vk.me/v633618216/16483/ZKF70Fwh4Ac.jpg', NULL, NULL),
(9, 'Встреча с Аленой Арсентьевой', '2016-03-04 01:52:05', 'Сегодня в очередной раз удалось пообщаться с замечательным человеком и профессионалом своего дела, и замечательной мамой 4-х детишек! Как она красива и очень женственна. Алена Арсентьева ты такая молодец! Вот одно фото с нашей с тобой встречи.\r\nОriental dancer: Алена Арсентьева\r\nPhoto: Ольга Рядченко http://vk.com/ryadchenkoeio\r\nMake up: Анна Куликова http://vk.com/joann\r\nHair: Олеся Букас http://vk.com/bukas86 Dekor: "Вest club"', 'Mixal', 'http://cs630723.vk.me/v630723903/26796/4rKu2SdaSI4.jpg', NULL, NULL),
(10, 'Результаты розыгрыша 7 марта', '2016-03-07 14:33:53', 'Счастливчики 7 февраля уже определены: \r\n\r\nЯна Ушанкова получает Фотосессия к 8 марта \r\nИрка Буткевич получает Сертификат на процедуру по уходу за лицом \r\nДля получения подарка напишите администратору группы-спонсора, ссылка на которую указана в конкурсе: Фотосессия к 8 марта - http://vk.com/ryadchenkoeio \r\nСертификат на процедуру по уходу за лицом - http://vk.com/public53554969', 'Mixal', 'https://pp.vk.me/c633619/v633619716/1915b/j9YjuXD2R24.jpg', NULL, NULL),
(11, 'Всем бобра!', '2016-03-08 14:37:01', 'Всем бобра!', 'Mixal', 'https://cs7060.vk.me/c540109/v540109544/31587/Cf5WeZBFgqQ.jpg', NULL, NULL),
(12, 'Первый день рождения Златушки.', '2016-03-09 14:40:48', 'Вот это я понимаю день рождение, где и мама и папа создают праздник своей маленькой принцессе! Златушке будет что показать потом, как прошел ее первый день рождение!', 'Mixal', 'https://pp.vk.me/c629401/v629401903/462f5/8qa55OPXkug.jpg', NULL, NULL),
(13, 'Подарок на 8 марта.', '2016-03-09 14:48:16', 'Муж спросил - что тебе подарить? А я ему - удиви меня! Кроме подарка, он сделал мне, Анечке и Ирочке вот такие букетики! ИЗ НОСКОВ!!! УДИВИЛ!', 'Mixal', 'https://pp.vk.me/c633517/v633517903/223dd/eeYiKsFAurY.jpg', NULL, NULL),
(14, 'Лучшие фотографы и модели', '2016-04-29 00:57:04', 'Чтобы научиться хорошо позировать перед камерой, вам совсем не обязательно посещать школу моделей или курсы. \r\nОсвоить и успешно практиковать позирование на съемках вас научат журналы о моде! Надеюсь, у вас найдется десяток экземпляров? Я уж не говорю о реальной экономии такого подхода :) \r\n\r\nВ идеале, это должны быть издания, посвященные высокой моде (hi-fashion), например, такие монстры, как «Vogue», «Elle», «Harper’s Bazaar» и т.п., но могут подойти и менее именитые их представители. \r\nБольше всего нас интересуют fashion-story, обычно в таких съемках максимально раскрывается потенциал модели. \r\nВыбирая примеры, обращайте внимание также на возраст модели – ведь в каждой возрастной группе есть свои тонкости и специфика. \r\n\r\nДля удобства и эффективности разобьем учебную программу на пункты: \r\n\r\nПункт первый. \r\nВсе начинается с теории. Выберите в журнале фото с моделью и рассматривайте его внимательно, вникая в детали. Недостаточно просто полистать страницы, как вы это делаете обычно. Глядя на моделей из журнала, не стоит забывать, что все эти люди – высокооплачиваемые специалисты в индустрии моды, они знают свою работу досконально. Но пускай вас не пугает их безупречная внешность и уровень мастерства – все эти люди вполне реальны, и они не всегда были иконами стиля. Секрет их успеха заключаются в упорной работе над собой. \r\n\r\nПункт второй. \r\nИтак, вы выбрали фото с моделью. Изучайте эту фотографию, как через микроскоп. Вас должно интересовать все: как была сделана поза, в какой позиции находилась голова модели, положение тела, где ее руки и ноги. Обратите внимание, в каком положении находились пальцы модели, и т.д. \r\n\r\nПункт третий. \r\nПрактика. Для начала попробуйте в точности воспроизвести позу модели, которую вы в данный момент изучаете. Здесь нечего стыдится – скорее всего, когда-то эта модель из журнала была в похожей ситуации. Все с чего-то начинают. Обязательно практикуйте свою позу, стоя перед зеркалом. \r\n\r\nЗатем приступайте к частичному изменению позы, начинайте слегка менять позицию головы, рук, ног. Почувствуйте разницу между копированием и импровизацией. Продолжайте до тех пор, пока не достигните такой вариации позы, которая превзойдет оригинал. Важно, чтобы вы чувствовали себя уверенно в этой позе. Практикуйте ее до тех пор, пока она не станет для вас естественной. \r\n\r\nПункт четвертый. \r\nЭмоциональная часть. Обратите внимание на то, как модель проявляет эмоции в кадре. Если она серьезна, сработает ли эта же поза, но с улыбкой? Подойдет ли застенчивый взгляд, сексуальный взгляд, взгляд гнева и т.д.? Отрабатывая свои эмоции, найдите ту, которая «заработает» лучше всего с вашей собственной вариацией позы. \r\n\r\nПункт пятый. \r\nСделайте снэпы* своей новой позы. Попросите друга/подругу сделать несколько фотографий вашей новой позы, а лучше всех ее вариаций для того, чтобы ничего не забыть. Для съемки подойдет как естественный свет из окна, так и встроенная вспышка. Снимать лучше на однородном, максимально светлом фоне (в идеале – белая стена). Если нет возможности пригласить помощника – можно установить режим «автоспуск» в фотоаппарате и сделать такие фото самостоятельно. \r\nТак в вашем арсенале появится поза в лучших традициях «модных журналов». \r\n\r\nДопустим, вы наработали позу, которая так же хороша, как у модели из вашего журнала. Возможно, у вас это получится даже лучше оригинала. Используя этот метод, нарабатывайте новые позы, не забывая, что в погоне за количеством не должно страдать качество. Знаю, все это непросто и требует немалых усилий, но как говорится, «под лежачий камень вода не течет». Трудитесь, и впоследствии вы будете приятно удивлены тем, с какой легкостью у вас получится принимать интересные позы и создавать яркие образы на своей следующей фотосессии. \r\n\r\nКак добиться успеха в позировании? \r\n\r\nПо мере того, как вы будете продвигаться в изучении позирования, в стиле «фешн» и «гламур», новые идеи будут появляться все чаще и легче. Вскоре у вас появятся способности к созданию своего уникального образа.', 'Mixal', 'https://pp.vk.me/c7002/v7002458/1763b/-tlXqYfLkqk.jpg', NULL, NULL),
(15, 'Ждем цветения садов, и активно готовимся к романтическим фот', '2016-04-14 01:04:26', 'Пусть в жизни всегда будет момент для счастья, повод для улыбки и время для мечты!', 'Mixal', 'https://pp.vk.me/c7002/v7002988/18f46/2KZP7qf_VeE.jpg', NULL, NULL),
(16, 'Пьяные друзья', '2016-07-24 01:49:05', 'Бразильский фотограф запечатлел друзей до и после 3-х бокалов вина', 'Mixal', 'https://pp.vk.me/c7002/v7002277/18f8d/BOdKNOfJXhU.jpg', NULL, NULL),
(17, 'Кошки', '2016-07-24 02:02:26', 'Кошки много спят и всячески наслаждаются жизнью. В те моменты, когда им хочется расслабиться, они ищут самое тепленькое местечко во всем доме. И находят!', 'Mixal', 'https://pp.vk.me/c7002/v7002564/18ec6/BwoXm3JXyhU.jpg', NULL, NULL),
(18, 'Ждем цветения садов', '2016-07-24 02:06:51', 'Ждем цветения садов, и активно готовимся к романтическим фотосессиям! Пусть в жизни всегда будет момент для счастья, повод для улыбки и время для мечты!', 'Mixal', 'https://pp.vk.me/c7002/v7002762/19658/rsqjVkIRmNw.jpg', NULL, NULL),
(19, 'Анонс', '2016-07-24 02:11:03', 'После выходных будут готовы и остальные фото', 'Mixal', 'https://pp.vk.me/c630122/v630122828/262cd/HW7_9GM8Tb8.jpg', NULL, NULL),
(20, 'Фото от нас', '2016-09-20 01:50:57', ' С рождением детей в доме исчезает порядок, деньги, покой и безмятежность… и появляется счастье.', 'Mixal', 'https://pp.vk.me/c630224/v630224903/4716f/rEJeL5sdN5c.jpg', 'http://img.a.tyt.by/catalog/peugeot/3008/06/5/peugeot-3008-1-restyling-2013-crossover_20_.jpg', 'http://img.tyt.by/n/avto/0e/3/insignia25_da.jpg'),
(21, 'Розыгрыш', '2016-09-18 22:47:04', 'Мы опять объявляем розыгрыш бесплатной фотосессии! Вам для этого необходимо стать участником нашей группы https://vk.com/ryadchenkoeio, проголосовать за "Miss Oriental 2016", в группе https://vk.com/lanabobruisk, и сделать репост донной записи! Поставим плюс в комментариях данной записи, и у вас появится шанс выиграть фотосессию в образе одной из участниц "Miss Oriental 2016". Победитель определится генератором случайным чисел 22 мая в 22.00', 'Mixal', 'https://pp.vk.me/c636125/v636125828/2611/HLeYZLJ34xM.jpg', 'http://img.a.tyt.by/catalog/peugeot/3008/06/5/peugeot-3008-1-restyling-2013-crossover_20_.jpg', 'http://img.a.tyt.by/catalog/nissan/qashqai/2014/03/8/rezultat_114316_1_5.jpg');

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'Mixal', 'Mixal-1985@mail.ru', '12345678', 'admin');

-- 
-- Вывод данных для таблицы video
--
INSERT INTO video VALUES
(1, '<iframe width="560" height="315" src="https://www.youtube.com/embed/2M2nfShbhgY" frameborder="0" allowfullscreen></iframe>', 'Wed Party'),
(2, '<iframe width="560" height="315" src="https://www.youtube.com/embed/7Vm7Z28OqZA" frameborder="0" allowfullscreen></iframe>', 'Алена Арсентьева (Lana AlAr), г.Бобруйск'),
(3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/ZNjTe1QujRw" frameborder="0" allowfullscreen></iframe>', 'БОБРУЙСК Алена Арсентьева ч 2 2014'),
(4, '<iframe width="560" height="315" src="https://www.youtube.com/embed/IJydsxxS-bE" frameborder="0" allowfullscreen></iframe>', 'Born_of_FIRE[Видео#5]'),
(5, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Tn1Fhsuj0AU" frameborder="0" allowfullscreen></iframe>', 'Эпоха мечты');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;