-- phpMyAdmin SQL Dump
-- version 4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15-07-14 21:31
-- 서버 버전: 5.5.40
-- PHP Version: 5.4.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sejiwon`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL COMMENT '권한명 언어별표시',
  `auth` varchar(20) NOT NULL COMMENT '권한',
  `level` int(3) NOT NULL COMMENT '권한 레벨',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`,`language_id`),
  KEY `fk_auth_language1_idx` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `ymd` date NOT NULL COMMENT '일자',
  `week` int(11) NOT NULL COMMENT '주차',
  `quarter` int(11) NOT NULL COMMENT '분기',
  `month_long` varchar(20) NOT NULL COMMENT '월이름',
  `month_short` varchar(3) NOT NULL COMMENT '월짧은이름',
  `byday_long` varchar(20) NOT NULL COMMENT '요일이름',
  `byday_short` varchar(3) NOT NULL COMMENT '요일짧은이름',
  `byday_sun` int(11) NOT NULL COMMENT '일요일은 1부터 숫자로 표기',
  `byday_mon` int(11) NOT NULL COMMENT '월요일은 0부터 숫자로 표기',
  `year` int(11) NOT NULL COMMENT '년숫자',
  `month` int(11) NOT NULL COMMENT '월숫자',
  `day` int(11) NOT NULL COMMENT '일숫자',
  `day_count` int(11) NOT NULL COMMENT '1년처음부터현재까지의 일자 COUNT',
  `lunar_date` date NOT NULL COMMENT '음력',
  `yun` tinyint(1) NOT NULL COMMENT '윤달',
  `ganji` varchar(5) NOT NULL COMMENT '12간지',
  `memo` varchar(50) DEFAULT NULL COMMENT '기념일등',
  PRIMARY KEY (`ymd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Calendar';

-- --------------------------------------------------------

--
-- 테이블 구조 `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL COMMENT '언어코드',
  `description` text COMMENT '언어설명',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_UNIQUE` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `log_email`
--

CREATE TABLE IF NOT EXISTS `log_email` (
  `id` int(11) NOT NULL,
  `from_email` varchar(50) DEFAULT NULL,
  `to_email` varchar(300) DEFAULT NULL,
  `subject` text,
  `description` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `log_session`
--

CREATE TABLE IF NOT EXISTS `log_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_language_id` int(11) NOT NULL,
  `type` varchar(6) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `ip_country` varchar(16) DEFAULT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `robot` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `platform` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`,`user_language_id`),
  KEY `fk_log_session_user1_idx` (`user_id`,`user_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_language_id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL COMMENT '메뉴명',
  `description` text COMMENT '메뉴설명',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `level` int(11) NOT NULL COMMENT '최상위레벨은 ‘1’',
  `high_id` int(11) DEFAULT NULL COMMENT '상위메뉴id',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`,`project_id`,`project_language_id`),
  KEY `fk_menu_project1_idx` (`project_id`,`project_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `use_flag` varchar(1) NOT NULL,
  `ord_seq` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated` datetime NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`language_id`),
  KEY `fk_message_language1_idx` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL COMMENT '프로젝트표시언어',
  `project` varchar(50) NOT NULL COMMENT '프로젝트명',
  `description` text COMMENT '프로젝트설명',
  `level` int(11) NOT NULL COMMENT '레벨 최상위는 ‘1’',
  `high_id` int(11) DEFAULT NULL COMMENT '상위프로젝트id',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`,`language_id`),
  KEY `fk_project_language1_idx` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `project_has_auth`
--

CREATE TABLE IF NOT EXISTS `project_has_auth` (
  `project_id` int(11) NOT NULL,
  `project_language_id` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `auth_language_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`project_language_id`,`auth_id`,`auth_language_id`),
  KEY `fk_project_has_auth_auth1_idx` (`auth_id`,`auth_language_id`),
  KEY `fk_project_has_auth_project1_idx` (`project_id`,`project_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL COMMENT '사용권한',
  `language_id` int(11) NOT NULL COMMENT '사용언어',
  `user_id` varchar(20) NOT NULL COMMENT '유저아이디',
  `name` varchar(50) NOT NULL COMMENT '유저명',
  `email` varchar(50) NOT NULL COMMENT '이메일',
  `password` varchar(255) NOT NULL COMMENT '패스워드',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`,`auth_id`,`language_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_auth1_idx` (`auth_id`),
  KEY `fk_user_language1_idx` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '그룹명',
  `description` text COMMENT '그룹설명',
  `level` int(11) NOT NULL COMMENT '최상위 레벨은 ‘1’',
  `high_id` int(11) DEFAULT NULL COMMENT '상위레벨id',
  `use_flag` varchar(1) NOT NULL COMMENT '사용여부(Y/N)',
  `ord_seq` int(11) NOT NULL COMMENT '표시순서',
  `created` datetime NOT NULL COMMENT '작성일',
  `created_by` varchar(20) NOT NULL COMMENT '작성자',
  `updated` datetime NOT NULL COMMENT '수정일',
  `updated_by` varchar(20) NOT NULL COMMENT '수정자',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_has_group`
--

CREATE TABLE IF NOT EXISTS `user_has_group` (
  `user_id` int(11) NOT NULL,
  `user_auth_id` int(11) NOT NULL,
  `user_language_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`user_auth_id`,`user_language_id`,`group_id`),
  KEY `fk_user_has_group_group1_idx` (`group_id`),
  KEY `fk_user_has_group_user1_idx` (`user_id`,`user_auth_id`,`user_language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_has_group_has_project_has_auth`
--

CREATE TABLE IF NOT EXISTS `user_has_group_has_project_has_auth` (
  `user_has_group_user_id` int(11) NOT NULL,
  `user_has_group_user_auth_id` int(11) NOT NULL,
  `user_has_group_user_language_id` int(11) NOT NULL,
  `user_has_group_group_id` int(11) NOT NULL,
  `project_has_auth_project_id` int(11) NOT NULL,
  `project_has_auth_project_language_id` int(11) NOT NULL,
  `project_has_auth_auth_id` int(11) NOT NULL,
  `project_has_auth_auth_language_id` int(11) NOT NULL,
  PRIMARY KEY (`user_has_group_user_id`,`user_has_group_user_auth_id`,`user_has_group_user_language_id`,`user_has_group_group_id`,`project_has_auth_project_id`,`project_has_auth_project_language_id`,`project_has_auth_auth_id`,`project_has_auth_auth_language_id`),
  KEY `fk_user_has_group_has_project_has_auth_project_has_auth1_idx` (`project_has_auth_project_id`,`project_has_auth_project_language_id`,`project_has_auth_auth_id`,`project_has_auth_auth_language_id`),
  KEY `fk_user_has_group_has_project_has_auth_user_has_group1_idx` (`user_has_group_user_id`,`user_has_group_user_auth_id`,`user_has_group_user_language_id`,`user_has_group_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk_auth_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_session`
--
ALTER TABLE `log_session`
  ADD CONSTRAINT `fk_log_session_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_project1` FOREIGN KEY (`project_id`, `project_language_id`) REFERENCES `project` (`id`, `language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_has_auth`
--
ALTER TABLE `project_has_auth`
  ADD CONSTRAINT `fk_project_has_auth_project1` FOREIGN KEY (`project_id`, `project_language_id`) REFERENCES `project` (`id`, `language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_has_auth_auth1` FOREIGN KEY (`auth_id`, `auth_language_id`) REFERENCES `auth` (`id`, `language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_auth1` FOREIGN KEY (`auth_id`) REFERENCES `auth` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_group`
--
ALTER TABLE `user_has_group`
  ADD CONSTRAINT `fk_user_has_group_user1` FOREIGN KEY (`user_id`, `user_auth_id`, `user_language_id`) REFERENCES `user` (`id`, `auth_id`, `language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_group_group1` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_group_has_project_has_auth`
--
ALTER TABLE `user_has_group_has_project_has_auth`
  ADD CONSTRAINT `fk_user_has_group_has_project_has_auth_user_has_group1` FOREIGN KEY (`user_has_group_user_id`, `user_has_group_user_auth_id`, `user_has_group_user_language_id`, `user_has_group_group_id`) REFERENCES `user_has_group` (`user_id`, `user_auth_id`, `user_language_id`, `group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_group_has_project_has_auth_project_has_auth1` FOREIGN KEY (`project_has_auth_project_id`, `project_has_auth_project_language_id`, `project_has_auth_auth_id`, `project_has_auth_auth_language_id`) REFERENCES `project_has_auth` (`project_id`, `project_language_id`, `auth_id`, `auth_language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
