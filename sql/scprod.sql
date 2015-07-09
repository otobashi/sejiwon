-- phpMyAdmin SQL Dump
-- version 4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 14-11-04 12:02
-- 서버 버전: 5.1.45p1-log
-- PHP Version: 5.3.13p1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scprod`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `acct`
--

CREATE TABLE IF NOT EXISTS `acct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `import_id` int(11) DEFAULT NULL COMMENT 'IMP순번',
  `voucher_id` int(11) DEFAULT NULL COMMENT 'VID순번',
  `ymd` date NOT NULL COMMENT '지출일자',
  `acct_dtl_id` int(11) DEFAULT NULL,
  `in_amt` int(15) DEFAULT NULL COMMENT '입금액',
  `out_amt` int(15) DEFAULT NULL COMMENT '출금액',
  `description` text COMMENT '지출내용',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='회계장부' AUTO_INCREMENT=109 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `acct_dtl`
--

CREATE TABLE IF NOT EXISTS `acct_dtl` (
  `acct_dtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_mst_id` int(11) NOT NULL,
  `acct_dtl_nm` varchar(200) NOT NULL COMMENT '상세분류',
  `cd` int(1) DEFAULT NULL,
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`acct_dtl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='상세분류코드' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `acct_import`
--

CREATE TABLE IF NOT EXISTS `acct_import` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seq` int(11) DEFAULT NULL COMMENT '순번',
  `ymd` datetime DEFAULT NULL COMMENT '거래일시',
  `out_amt` int(15) DEFAULT NULL COMMENT '출금액',
  `in_amt` int(15) DEFAULT NULL COMMENT '입금액',
  `cur_amt` int(15) DEFAULT NULL COMMENT '잔액',
  `description` varchar(100) DEFAULT NULL COMMENT '거래내용',
  `etc_acct_no` varchar(100) DEFAULT NULL COMMENT '상대계좌번호',
  `etc_bank_nm` varchar(100) DEFAULT NULL COMMENT '상대은행',
  `type` varchar(100) DEFAULT NULL COMMENT '거래구분',
  `etc_amt` int(15) DEFAULT NULL COMMENT '수표어음금액',
  `cms_code` varchar(100) DEFAULT NULL COMMENT 'CMS코드',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT '등록자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='계좌가져오기' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `acct_mst`
--

CREATE TABLE IF NOT EXISTS `acct_mst` (
  `acct_mst_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `acct_mst_nm` varchar(200) NOT NULL COMMENT '대분류',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`acct_mst_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='대분류코드' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '이름',
  `hp` varchar(20) DEFAULT NULL COMMENT '핸드폰',
  `email` varchar(50) DEFAULT NULL COMMENT '이메일',
  `address` varchar(255) DEFAULT NULL COMMENT '주소',
  `group_id` int(11) DEFAULT NULL COMMENT '그룹id',
  `corp_id` int(11) DEFAULT NULL COMMENT '회사id',
  `description` text COMMENT '비고',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='주소록' AUTO_INCREMENT=277 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `address_group`
--

CREATE TABLE IF NOT EXISTS `address_group` (
  `address_id` int(11) NOT NULL COMMENT '주소록id',
  `group_id` int(11) NOT NULL COMMENT '그룹id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='주소록_그룹';

-- --------------------------------------------------------

--
-- 테이블 구조 `addr_corp`
--

CREATE TABLE IF NOT EXISTS `addr_corp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_nm` varchar(100) NOT NULL COMMENT '회사명',
  `tel` varchar(20) DEFAULT NULL COMMENT '대표전화',
  `fax` varchar(20) DEFAULT NULL COMMENT '팩스',
  `address` varchar(255) DEFAULT NULL COMMENT '주소',
  `description` text COMMENT '비고',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='주소록회사' AUTO_INCREMENT=208 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `addr_group`
--

CREATE TABLE IF NOT EXISTS `addr_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_nm` varchar(100) NOT NULL COMMENT '그룹이름',
  `description` text COMMENT '그룹설명',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='주소록그룹' AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `auth` varchar(10) NOT NULL,
  `auth_level` int(3) NOT NULL,
  `last_email` varchar(50) NOT NULL,
  `last_created` datetime NOT NULL,
  PRIMARY KEY (`auth_id`),
  UNIQUE KEY `auth_idx` (`email`,`auth`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

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
  PRIMARY KEY (`ymd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Calendar';

-- --------------------------------------------------------

--
-- 테이블 구조 `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code_type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `code_level` int(3) NOT NULL,
  `high_code` varchar(10) DEFAULT NULL,
  `code_name` varchar(50) NOT NULL,
  `description` text,
  `lang` varchar(2) NOT NULL DEFAULT 'KR',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `last_email` varchar(50) NOT NULL,
  `last_created` datetime NOT NULL,
  PRIMARY KEY (`code_id`),
  UNIQUE KEY `code_idx` (`code_type`,`code`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=281 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_amenity`
--

CREATE TABLE IF NOT EXISTS `code_amenity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_amenity_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_facility`
--

CREATE TABLE IF NOT EXISTS `code_facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_facility_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_grade`
--

CREATE TABLE IF NOT EXISTS `code_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_grade_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_location`
--

CREATE TABLE IF NOT EXISTS `code_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_location_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_matters`
--

CREATE TABLE IF NOT EXISTS `code_matters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_matters_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_ota`
--

CREATE TABLE IF NOT EXISTS `code_ota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_ota_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_parking`
--

CREATE TABLE IF NOT EXISTS `code_parking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_parking_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_policy`
--

CREATE TABLE IF NOT EXISTS `code_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_policy_idx` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `code_promotion`
--

CREATE TABLE IF NOT EXISTS `code_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `description` text,
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_promotion_idx` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `corp`
--

CREATE TABLE IF NOT EXISTS `corp` (
  `corp_id` int(11) NOT NULL AUTO_INCREMENT,
  `high_corp_id` int(11) NOT NULL,
  `reg_no` varchar(10) NOT NULL COMMENT '사업자 등록번호',
  `reg_nm` varchar(100) NOT NULL COMMENT '사업자 등록명칭',
  `pre_nm` varchar(50) NOT NULL COMMENT '대표자명',
  `str_ymd` date NOT NULL COMMENT '개업년월일',
  `biz_no` varchar(20) NOT NULL COMMENT '법인/주민등록번호',
  `biz_loc` varchar(200) NOT NULL COMMENT '사업장소재지',
  `main_loc` varchar(200) NOT NULL COMMENT '본점소재지',
  `biz_sta` varchar(200) NOT NULL COMMENT '업태',
  `biz_item` varchar(200) NOT NULL COMMENT '종목',
  `biz_rmk` varchar(200) NOT NULL COMMENT '교부사유',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `last_email` varchar(50) NOT NULL,
  `last_created` datetime NOT NULL,
  PRIMARY KEY (`corp_id`),
  UNIQUE KEY `corp_idx` (`reg_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL COMMENT '호텔ID',
  `id_date` date DEFAULT NULL COMMENT 'ID/PW 발급일',
  `free_start_date` date DEFAULT NULL COMMENT '무료사용개시일',
  `free_end_date` date DEFAULT NULL COMMENT '무료사용종료일',
  `start_date` date DEFAULT NULL COMMENT '유료사용개시일',
  `end_date` date DEFAULT NULL COMMENT '유료사용종료일',
  `intro_amt` int(15) DEFAULT NULL COMMENT '도입료',
  `use_amt` int(15) DEFAULT NULL COMMENT '월사용료',
  `first_amt` int(15) DEFAULT NULL COMMENT '첫월사용료',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='TL Lincoln 입금현황' AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `email_log`
--

CREATE TABLE IF NOT EXISTS `email_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(50) DEFAULT NULL COMMENT '보내는 email',
  `to_email` varchar(300) DEFAULT NULL COMMENT '받는 email',
  `subject` text COMMENT 'email제목',
  `description` text COMMENT 'email내용',
  `created` datetime DEFAULT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='e-mail Log' AUTO_INCREMENT=235 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `emp_nm` varchar(50) DEFAULT NULL COMMENT '사원명',
  `dept_nm` varchar(100) DEFAULT NULL COMMENT '부서',
  `position` varchar(50) DEFAULT NULL COMMENT '호칭',
  `mobile` varchar(20) DEFAULT NULL COMMENT '휴대폰',
  `address` varchar(200) DEFAULT NULL COMMENT '집주소',
  `reg_dt` date DEFAULT NULL COMMENT '입사일자',
  `exp_dt` date DEFAULT NULL COMMENT '퇴사일자',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `last_email` varchar(50) NOT NULL,
  `last_created` datetime NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_idx` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_amenity`
--

CREATE TABLE IF NOT EXISTS `hotel_amenity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `amenity` varchar(100) NOT NULL COMMENT '호텔객실내편의시설코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_amenity_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_basic`
--

CREATE TABLE IF NOT EXISTS `hotel_basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enm` varchar(100) NOT NULL COMMENT '호텔영문명',
  `knm` varchar(100) NOT NULL COMMENT '호텔한글명',
  `qty` int(11) DEFAULT NULL COMMENT '객실수',
  `addr` varchar(200) DEFAULT NULL COMMENT '호텔주소',
  `tel` varchar(20) DEFAULT NULL COMMENT '호텔전화번호',
  `fax` varchar(20) DEFAULT NULL COMMENT '호텔FAX',
  `email` varchar(50) DEFAULT NULL COMMENT '호텔email',
  `grade` varchar(100) DEFAULT NULL COMMENT '호텔등급',
  `location` varchar(100) DEFAULT NULL COMMENT '호텔위치',
  `info` text COMMENT '호텔정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_basic_idx` (`enm`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_compset`
--

CREATE TABLE IF NOT EXISTS `hotel_compset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `compset_hotel_id` int(11) NOT NULL COMMENT 'Comp. Set Hotel ID',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_compset_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_facility`
--

CREATE TABLE IF NOT EXISTS `hotel_facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `facility` varchar(100) NOT NULL COMMENT '호텔부대시설코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_facility_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_last_price`
--

CREATE TABLE IF NOT EXISTS `hotel_last_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `ymd` date NOT NULL,
  `ota` varchar(100) DEFAULT NULL COMMENT 'OTA',
  `st_twin` int(12) DEFAULT NULL COMMENT 'Standard Twin',
  `st_double` int(12) DEFAULT NULL COMMENT 'Standard Double',
  `created` datetime NOT NULL COMMENT '등록시간',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  PRIMARY KEY (`id`),
  KEY `hotel_promotion_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='price' AUTO_INCREMENT=7642 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_matters`
--

CREATE TABLE IF NOT EXISTS `hotel_matters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `matters` varchar(100) NOT NULL COMMENT '호텔유의사항코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_matters_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_parking`
--

CREATE TABLE IF NOT EXISTS `hotel_parking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `parking` varchar(100) NOT NULL COMMENT '호텔주차코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_parking_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_policy`
--

CREATE TABLE IF NOT EXISTS `hotel_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `policy` varchar(100) NOT NULL COMMENT '호텔정책코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_policy_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_price`
--

CREATE TABLE IF NOT EXISTS `hotel_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `ymd` date NOT NULL,
  `ota` varchar(100) DEFAULT NULL COMMENT 'OTA',
  `st_twin` int(12) DEFAULT NULL COMMENT 'Standard Twin',
  `st_double` int(12) DEFAULT NULL COMMENT 'Standard Double',
  `created` datetime NOT NULL COMMENT '등록시간',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  PRIMARY KEY (`id`),
  KEY `hotel_promotion_idx` (`hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='price' AUTO_INCREMENT=9066 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `hotel_promotion`
--

CREATE TABLE IF NOT EXISTS `hotel_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT '호텔ID',
  `promotion` varchar(100) NOT NULL COMMENT '호텔프로모션코드',
  `description` text COMMENT '상세정보',
  `reg_user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `hotel_promotion_idx` (`hotel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `ih_check`
--

CREATE TABLE IF NOT EXISTS `ih_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT 'Hotel ID',
  `check_in_ymd` date NOT NULL COMMENT 'CHECK IN 일자',
  `check_in_hour` int(2) DEFAULT NULL COMMENT 'CHECK IN 시간',
  `check_in_min` int(2) DEFAULT NULL COMMENT 'CHECK IN 분',
  `check_out_ymd` date NOT NULL COMMENT 'CHECK OUT 일자',
  `check_out_hour` int(2) DEFAULT NULL COMMENT 'CHECK OUT 시간',
  `check_out_min` int(2) DEFAULT NULL COMMENT 'CHECK OUT 분',
  `room_no` varchar(10) NOT NULL COMMENT '방번호',
  `name` varchar(100) NOT NULL COMMENT '고객명',
  `sex` varchar(1) NOT NULL COMMENT '성별',
  `email` varchar(50) NOT NULL COMMENT '이메일',
  `tel` varchar(30) NOT NULL COMMENT '전화번호',
  `lang` varchar(10) NOT NULL COMMENT '사용언어',
  `nation` varchar(10) NOT NULL COMMENT '국적',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_user_id` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_user_id` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='투숙고객' AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `ih_gift`
--

CREATE TABLE IF NOT EXISTS `ih_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT 'Hotel ID',
  `lang` varchar(10) NOT NULL COMMENT '사용언어',
  `gift` varchar(50) NOT NULL COMMENT '선물제목',
  `description` text NOT NULL COMMENT '선물내용',
  `use_flag` varchar(1) DEFAULT NULL COMMENT '사용여부',
  `ord_seq` int(11) DEFAULT NULL COMMENT '정렬순서',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_user_id` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_user_id` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='방문선물' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `ih_greet`
--

CREATE TABLE IF NOT EXISTS `ih_greet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT 'Hotel ID',
  `lang` varchar(10) NOT NULL COMMENT '사용언어',
  `greet` text NOT NULL COMMENT '인사말',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_user_id` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_user_id` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='인사말' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `ih_order`
--

CREATE TABLE IF NOT EXISTS `ih_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL COMMENT 'Hotel ID',
  `email` varchar(50) NOT NULL COMMENT '고객이메일',
  `room_no` varchar(10) NOT NULL COMMENT '방번호',
  `lang` varchar(10) NOT NULL COMMENT '사용언어',
  `order` text NOT NULL COMMENT '내용',
  `process_yn` varchar(1) NOT NULL COMMENT '처리여부YN',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_user_id` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_user_id` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='투숙고객주문' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `korea_hotel`
--

CREATE TABLE IF NOT EXISTS `korea_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area1` varchar(30) DEFAULT NULL COMMENT '지역',
  `area2` varchar(30) DEFAULT NULL COMMENT '자치구',
  `grade` varchar(30) DEFAULT NULL COMMENT '등급',
  `knm` varchar(100) DEFAULT NULL COMMENT '호텔명(한글)',
  `corp_nm` varchar(100) DEFAULT NULL COMMENT '법인명',
  `fac` text COMMENT '부대시설현황',
  `room` int(11) DEFAULT NULL COMMENT '객실수',
  `addr` varchar(300) DEFAULT NULL COMMENT '주소',
  `tel` varchar(30) DEFAULT NULL COMMENT '전화번호',
  `homepage` varchar(200) DEFAULT NULL COMMENT '홈페이지',
  `reg_date` date DEFAULT NULL COMMENT '호텔등록일자',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='전국한국호텔' AUTO_INCREMENT=721 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `log_email`
--

CREATE TABLE IF NOT EXISTS `log_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(50) DEFAULT NULL COMMENT '보내는 email',
  `to_email` varchar(300) DEFAULT NULL COMMENT '받는 email',
  `subject` text COMMENT 'email제목',
  `description` text COMMENT 'email내용',
  `created` datetime DEFAULT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='e-mail Log' AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `log_session`
--

CREATE TABLE IF NOT EXISTS `log_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(6) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `ip_country` varchar(16) DEFAULT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `robot` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `platform` varchar(200) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `auth` int(11) NOT NULL COMMENT '관리자가 지정한 권한',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  KEY `created_idx` (`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=864 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `lunar_solar`
--

CREATE TABLE IF NOT EXISTS `lunar_solar` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `lunar_date` date NOT NULL DEFAULT '0000-00-00',
  `solar_date` date NOT NULL DEFAULT '0000-00-00',
  `yun` tinyint(1) NOT NULL DEFAULT '0',
  `ganji` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `memo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`num`),
  KEY `lunar_date` (`lunar_date`),
  KEY `solar_date` (`solar_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109939 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(10) NOT NULL,
  `menu` varchar(10) NOT NULL,
  `menu_level` int(3) NOT NULL,
  `high_menu` varchar(10) DEFAULT NULL,
  `menu_name` varchar(50) NOT NULL,
  `description` text,
  `lang` varchar(2) NOT NULL DEFAULT 'KR',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `auth` varchar(10) NOT NULL,
  `auth_level` int(3) NOT NULL,
  `a_link` varchar(100) DEFAULT NULL,
  `last_email` varchar(50) NOT NULL,
  `last_created` datetime NOT NULL,
  PRIMARY KEY (`menu_id`),
  UNIQUE KEY `menu_idx` (`menu_type`,`menu`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `type` varchar(10) NOT NULL COMMENT '공지사항구분',
  `subject` varchar(200) NOT NULL COMMENT '제목',
  `writer` varchar(50) NOT NULL COMMENT '작성자',
  `description` text NOT NULL COMMENT '내용',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '조회수',
  `ip_address` varchar(16) NOT NULL COMMENT '아이피',
  `created` datetime NOT NULL COMMENT '등록 일시',
  `last_update` datetime NOT NULL COMMENT '수정 일시',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='공지사항' AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ymd` date NOT NULL COMMENT '지출일자',
  `acct_dtl_id` int(11) DEFAULT NULL,
  `in_amt` int(15) DEFAULT NULL COMMENT '입금액',
  `out_amt` int(15) DEFAULT NULL COMMENT '출금액',
  `description` text COMMENT '지출내용',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='예산장부' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '호텔id',
  `ymd` date DEFAULT NULL,
  `ota` varchar(30) DEFAULT NULL COMMENT 'OTA',
  `st_twin` int(12) DEFAULT NULL COMMENT 'Standard Twin',
  `st_double` int(12) DEFAULT NULL COMMENT 'Standard Double',
  `created` datetime DEFAULT NULL COMMENT '등록시간',
  `created_email` varchar(50) DEFAULT NULL COMMENT '등록자',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='price' AUTO_INCREMENT=497 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `rate_con`
--

CREATE TABLE IF NOT EXISTS `rate_con` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `from_date` date DEFAULT NULL COMMENT 'FROM일자',
  `to_date` date DEFAULT NULL COMMENT 'TO일자',
  `comp_1` int(11) DEFAULT NULL COMMENT 'Comp.Set 호텔ID',
  `comp_2` int(11) DEFAULT NULL COMMENT 'Comp.Set 호텔ID',
  `comp_3` int(11) DEFAULT NULL COMMENT 'Comp.Set 호텔ID',
  `comp_4` int(11) DEFAULT NULL COMMENT 'Comp.Set 호텔ID',
  `comp_5` int(11) DEFAULT NULL COMMENT 'Comp.Set 호텔ID',
  `ota` varchar(100) DEFAULT NULL COMMENT 'Difference of Rate',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=248 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `TABLE 26`
--

CREATE TABLE IF NOT EXISTS `TABLE 26` (
  `COL 1` int(3) DEFAULT NULL,
  `COL 2` varchar(9) DEFAULT NULL,
  `COL 3` varchar(13) DEFAULT NULL,
  `COL 4` varchar(18) DEFAULT NULL,
  `COL 5` varchar(64) DEFAULT NULL,
  `COL 6` varchar(51) DEFAULT NULL,
  `COL 7` varchar(233) DEFAULT NULL,
  `COL 8` varchar(4) DEFAULT NULL,
  `COL 9` varchar(59) DEFAULT NULL,
  `COL 10` varchar(16) DEFAULT NULL,
  `COL 11` varchar(76) DEFAULT NULL,
  `COL 12` varchar(10) DEFAULT NULL,
  `COL 13` varchar(10) DEFAULT NULL,
  `COL 14` varchar(10) DEFAULT NULL,
  `COL 15` varchar(10) DEFAULT NULL,
  `COL 16` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `tl_basic`
--

CREATE TABLE IF NOT EXISTS `tl_basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '회사id',
  `hotel_enm` varchar(100) NOT NULL COMMENT '호텔영문명',
  `hotel_knm` varchar(100) DEFAULT NULL COMMENT '호텔한글명',
  `room_qty` int(11) DEFAULT NULL COMMENT '방개수',
  `hotel_grade` varchar(30) DEFAULT NULL COMMENT '호텔등급',
  `hotel_grade_etc` varchar(30) DEFAULT NULL COMMENT '호텔등급기타',
  `tl_price` varchar(30) DEFAULT NULL COMMENT 'TL PRICE',
  `tl_price_etc` varchar(30) DEFAULT NULL COMMENT 'TL PRICE기타',
  `hotel_pms` varchar(30) DEFAULT NULL COMMENT 'HOTEL PMS',
  `hotel_pms_etc` varchar(30) DEFAULT NULL COMMENT 'HOTEL PMS기타',
  `chanel_manager` varchar(30) DEFAULT NULL COMMENT 'CHANNEL MANAGER',
  `chanel_manager_etc` varchar(30) DEFAULT NULL COMMENT 'CHANNEL MANAGER기타',
  `ota` int(11) DEFAULT NULL COMMENT 'OTA',
  `inbound` int(11) DEFAULT NULL COMMENT 'INBOUND',
  `corporate` int(11) DEFAULT NULL COMMENT 'CORPORATE',
  `convention` int(11) DEFAULT NULL COMMENT 'CONVENTION',
  `local_inbound` int(11) DEFAULT NULL COMMENT 'LOCAL_INBOUND',
  `japan` int(11) DEFAULT NULL COMMENT 'JAPAN',
  `china` int(11) DEFAULT NULL COMMENT 'China (Mainland)',
  `usa` int(11) DEFAULT NULL COMMENT 'USA',
  `europe` int(11) DEFAULT NULL COMMENT 'EUROPE',
  `sea` int(11) DEFAULT NULL COMMENT 'SEA',
  `korean` int(11) DEFAULT NULL COMMENT 'KOREAN',
  `agoda` varchar(20) DEFAULT NULL COMMENT 'AGODA',
  `expedia` varchar(20) DEFAULT NULL COMMENT 'EXPEDIA',
  `booking` varchar(20) DEFAULT NULL COMMENT 'BOOKING,COM',
  `rakuten` varchar(20) DEFAULT NULL COMMENT 'RAKUTEN',
  `orbitz` varchar(20) DEFAULT NULL COMMENT 'ORBITZ',
  `gta` varchar(20) DEFAULT NULL COMMENT 'GTA',
  `ctrip` varchar(20) DEFAULT NULL COMMENT 'CTRIP',
  `elong` varchar(20) DEFAULT NULL COMMENT 'ELONG',
  `bccardchina` varchar(20) DEFAULT NULL COMMENT 'BCCARDCHINA',
  `asiarooms` varchar(20) DEFAULT NULL COMMENT 'ASIAROOMS',
  `interpark` varchar(20) DEFAULT NULL COMMENT 'INTERPARK',
  `hotelnjoy` varchar(20) DEFAULT NULL COMMENT 'HOTELNJOY',
  `hoteljoin` varchar(20) DEFAULT NULL COMMENT 'HOTELJOIN',
  `konest` varchar(20) DEFAULT NULL COMMENT 'KONEST',
  `seoulnavi` varchar(20) DEFAULT NULL COMMENT 'SEOULNAVI',
  `other_ota` varchar(20) DEFAULT NULL COMMENT 'other_ota',
  `lookjtb` varchar(10) DEFAULT NULL COMMENT 'LOOKJTB',
  `his` varchar(10) DEFAULT NULL,
  `knt_holiday` varchar(10) DEFAULT NULL COMMENT 'KNT_HOLIDAY',
  `nta` varchar(10) DEFAULT NULL COMMENT 'NTA',
  `jalpak` varchar(10) DEFAULT NULL COMMENT 'JALPAK',
  `ana` varchar(10) DEFAULT NULL COMMENT 'ANA',
  `jtb_operator` varchar(20) DEFAULT NULL COMMENT 'JTB_OPERATOR',
  `gmn_name` varchar(100) DEFAULT NULL COMMENT 'GENERAL_MANAGER_NAME',
  `gmn_korean` varchar(10) DEFAULT NULL COMMENT 'KOREAN',
  `gmn_american` varchar(10) DEFAULT NULL COMMENT 'AMERICAN',
  `gmn_french` varchar(10) DEFAULT NULL COMMENT 'FRENCH',
  `gmn_italian` varchar(10) DEFAULT NULL COMMENT 'ITALIAN',
  `gmn_japanese` varchar(10) DEFAULT NULL COMMENT 'JAPANESE',
  `gmn_chinese` varchar(10) DEFAULT NULL COMMENT 'CHINESE',
  `gmn_nation_etc` varchar(10) DEFAULT NULL COMMENT 'NATION_ETC',
  `gmn_nationality_etc` varchar(10) DEFAULT NULL COMMENT 'NATIONALITY_ETC',
  `gmn_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `gmn_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `gmn_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `gmn_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `gmn_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `gmn_remark` text COMMENT '비고',
  `dir_name` varchar(100) DEFAULT NULL COMMENT 'DIRECTOR_MANAGER_NAME',
  `dir_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `dir_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `dir_position` varchar(5) DEFAULT NULL COMMENT 'DIR_POSITION',
  `dir_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `dir_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `dir_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `dir_remark` text COMMENT '비고',
  `ota_name` varchar(100) DEFAULT NULL COMMENT 'OTA_MANAGER_NAME',
  `ota_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `ota_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `ota_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `ota_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `ota_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `ota_remark` text COMMENT '비고',
  `key_name` varchar(100) DEFAULT NULL COMMENT 'KEY_NAME',
  `key_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `key_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `key_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `key_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `key_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `key_remark` text COMMENT '비고',
  `rsv_name` varchar(100) DEFAULT NULL COMMENT 'RESERVATION_NAME',
  `rsv_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `rsv_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `rsv_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `rsv_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `rsv_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `rsv_remark` text COMMENT '비고',
  `rvn_name` varchar(100) DEFAULT NULL COMMENT 'REVENUE_NAME',
  `rvn_gender` varchar(5) DEFAULT NULL COMMENT 'GENDER',
  `rvn_title` varchar(10) DEFAULT NULL COMMENT 'TITLE',
  `rvn_email` varchar(50) DEFAULT NULL COMMENT 'EMAIL',
  `rvn_tel` varchar(20) DEFAULT NULL COMMENT 'TELEPHONE',
  `rvn_mobile` varchar(20) DEFAULT NULL COMMENT 'MOBILE',
  `rvn_remark` text COMMENT '비고',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT 'EMAIL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='TL-Licoln 호텔체크리스트 기본정보' AUTO_INCREMENT=242 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `tl_report`
--

CREATE TABLE IF NOT EXISTS `tl_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '회사id',
  `sales_date` varchar(10) NOT NULL COMMENT '영업일자',
  `sales_time` varchar(8) NOT NULL COMMENT '영업시간',
  `sales_emp_id` int(11) NOT NULL COMMENT '영업직원',
  `sales_category` varchar(10) DEFAULT NULL COMMENT '영업처구분',
  `sales_category_etc` varchar(100) DEFAULT NULL COMMENT '영업처구분기타',
  `sales_type` varchar(20) DEFAULT NULL COMMENT '영업형태',
  `sales_type_etc` varchar(100) DEFAULT NULL COMMENT '영업형태기타',
  `sales_desc1` text COMMENT '영업목적',
  `sales_desc2` text COMMENT '영업결과',
  `sales_desc3` text COMMENT '영업과제',
  `sales_desc4` text COMMENT 'Next Action',
  `sales_desc5` text COMMENT 'Memo',
  `attendance_name1` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title1` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title1` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `attendance_name2` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title2` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title2` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `attendance_name3` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title3` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title3` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `attendance_name4` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title4` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title4` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `attendance_name5` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title5` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title5` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `sales_corp_id_3rd1` int(11) NOT NULL COMMENT '기타영업처',
  `attendance_name_3rd1` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title_3rd1` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title_3rd1` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `sales_corp_id_3rd2` int(11) NOT NULL COMMENT '기타영업처',
  `attendance_name_3rd2` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title_3rd2` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title_3rd2` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `sales_corp_id_3rd3` int(11) NOT NULL COMMENT '기타영업처',
  `attendance_name_3rd3` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title_3rd3` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title_3rd3` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `sales_corp_id_3rd4` int(11) NOT NULL COMMENT '기타영업처',
  `attendance_name_3rd4` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title_3rd4` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title_3rd4` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `sales_corp_id_3rd5` int(11) NOT NULL COMMENT '기타영업처',
  `attendance_name_3rd5` varchar(100) DEFAULT NULL COMMENT 'ATTENDANCE_NAME',
  `attendance_title_3rd5` varchar(20) DEFAULT NULL COMMENT 'ATTENDANCE_TITLE',
  `etc_attendance_title_3rd5` varchar(30) DEFAULT NULL COMMENT 'ETC_ATTENDANCE_TITLE',
  `created` datetime NOT NULL COMMENT '등록시간',
  `created_email` varchar(50) NOT NULL COMMENT 'EMAIL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='TL-Licoln 호텔영업리포트' AUTO_INCREMENT=1133 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `una_session`
--

CREATE TABLE IF NOT EXISTS `una_session` (
  `ip_address` varchar(16) NOT NULL COMMENT 'IP Address',
  `login_yn` varchar(1) NOT NULL COMMENT 'nickname',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT 'email',
  `nickname` varchar(50) DEFAULT NULL COMMENT 'nickname',
  `ts_auth_level` int(3) DEFAULT NULL COMMENT 'Tour Story',
  `hm_auth_level` int(3) DEFAULT NULL COMMENT 'Hotel Manager',
  `biz_auth_level` int(3) DEFAULT NULL COMMENT 'Business Manager',
  `site_auth_level` int(3) DEFAULT NULL COMMENT 'Site Manager',
  `site1_auth_level` int(3) DEFAULT NULL COMMENT 'Tour Story',
  `site2_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site3_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site4_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site5_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site6_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site7_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site8_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site9_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `site10_auth_level` int(3) DEFAULT NULL COMMENT 'Unknown',
  `created` datetime DEFAULT NULL COMMENT '등록 일시',
  `last_update` datetime DEFAULT NULL COMMENT '수정 일시',
  PRIMARY KEY (`ip_address`,`email`),
  UNIQUE KEY `notice_idx` (`ip_address`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='una_session';

-- --------------------------------------------------------

--
-- 테이블 구조 `una_sessions`
--

CREATE TABLE IF NOT EXISTS `una_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL COMMENT 'USER아이디',
  `nickname` varchar(20) NOT NULL COMMENT '별명',
  `email` varchar(50) NOT NULL COMMENT '이메일',
  `password` varchar(255) NOT NULL COMMENT '비밀번호',
  `hotel_nm` varchar(100) NOT NULL COMMENT '관리자 인증전 요청호텔',
  `hotel_id` int(11) DEFAULT NULL COMMENT '관리자 인증후 사이트 호텔ID',
  `auth` int(11) DEFAULT NULL COMMENT '관리자가 지정한 권한',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_idx` (`email`),
  UNIQUE KEY `user_id_idx` (`user_id`),
  UNIQUE KEY `nickname_idx` (`nickname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ymd` date NOT NULL COMMENT '지출일자',
  `acct_dtl_id` int(11) DEFAULT NULL,
  `price` int(15) DEFAULT NULL,
  `qty` int(15) DEFAULT NULL,
  `amount` int(15) DEFAULT NULL,
  `description` text COMMENT '지출내용',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='경비지출내역' AUTO_INCREMENT=74 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `emp_id` int(11) NOT NULL COMMENT '업무작성자',
  `work_nm` varchar(200) NOT NULL COMMENT '업무명',
  `description` text NOT NULL COMMENT '업무내용',
  `work_level` int(11) DEFAULT NULL COMMENT '업무레벨',
  `high_work_id` int(11) DEFAULT NULL COMMENT '상위업무',
  `priority_id` int(11) NOT NULL COMMENT '업무중요도코드',
  `status_id` int(11) NOT NULL COMMENT '업무상태코드',
  `type_id` int(11) DEFAULT NULL COMMENT '업무유형코드',
  `public` varchar(1) DEFAULT NULL COMMENT '공통업무여부(Y/N)',
  `ratio` int(11) DEFAULT NULL COMMENT '완료진척율',
  `done_flag` varchar(1) NOT NULL DEFAULT 'N',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`work_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무' AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_assign`
--

CREATE TABLE IF NOT EXISTS `work_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL COMMENT '업무',
  `emp_id` int(11) NOT NULL COMMENT '해당직원',
  `subject` varchar(200) NOT NULL COMMENT '업무명',
  `description` text NOT NULL COMMENT '업무내용',
  `estimated_time` int(11) NOT NULL COMMENT '추정소요시간',
  `ratio` int(11) DEFAULT NULL COMMENT '완료진척율',
  `year` int(4) NOT NULL COMMENT '완료예정년도',
  `month` int(2) NOT NULL COMMENT '완료예정월',
  `day` int(2) NOT NULL COMMENT '완료예정일자',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_idx` (`work_id`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무배정' AUTO_INCREMENT=266 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_comment`
--

CREATE TABLE IF NOT EXISTS `work_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response_id` int(11) NOT NULL COMMENT '업무의견',
  `work_id` int(11) NOT NULL COMMENT '업무',
  `assign_id` int(11) NOT NULL COMMENT '업무배정',
  `description` text NOT NULL COMMENT '업무답변',
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_comment_idx` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무의견댓글' AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_member`
--

CREATE TABLE IF NOT EXISTS `work_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL COMMENT '업무ID',
  `emp_id` int(11) NOT NULL COMMENT '해당직원',
  `role_id` int(11) NOT NULL COMMENT '업무역할코드',
  `receive_mail` varchar(1) NOT NULL COMMENT '메일수신여부(Y/N)',
  `created` datetime NOT NULL COMMENT '업무부여일자',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_member_idx` (`work_id`,`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='업무참여자' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_priority`
--

CREATE TABLE IF NOT EXISTS `work_priority` (
  `priority_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `priority_nm` varchar(200) NOT NULL COMMENT '중요도 - 상,중,하',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`priority_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무중요도코드' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_relation`
--

CREATE TABLE IF NOT EXISTS `work_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL COMMENT '업무ID',
  `relation_id` int(11) NOT NULL COMMENT 'Relation업무ID',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_relation_idx` (`work_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='관련업무' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_response`
--

CREATE TABLE IF NOT EXISTS `work_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL COMMENT '업무',
  `emp_id` int(11) NOT NULL COMMENT '해당직원',
  `assign_id` int(11) NOT NULL COMMENT '업무배정id',
  `description` text NOT NULL COMMENT '업무답변',
  `created` datetime NOT NULL COMMENT '등록시간',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무배정' AUTO_INCREMENT=443 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_role`
--

CREATE TABLE IF NOT EXISTS `work_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `role_nm` varchar(200) NOT NULL COMMENT '역할 - O:Owner, M:Member, R:Reporter',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무역할코드' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_status`
--

CREATE TABLE IF NOT EXISTS `work_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `status_nm` varchar(200) NOT NULL COMMENT '업무상태 - P:PLAN, A:ACTIVE, R:REVIEW',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무상태코드' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_trace`
--

CREATE TABLE IF NOT EXISTS `work_trace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL COMMENT '업무ID',
  `assign_id` int(11) DEFAULT NULL,
  `response_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `work_value` varchar(255) NOT NULL COMMENT '업무변경값',
  `description` text NOT NULL COMMENT '업무변경내용',
  `created` datetime NOT NULL COMMENT '업무상태 및 유형 변경일자',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_trace_idx` (`work_id`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무추적' AUTO_INCREMENT=1067 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `work_type`
--

CREATE TABLE IF NOT EXISTS `work_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_id` int(11) NOT NULL COMMENT '소속회사',
  `type_nm` varchar(200) NOT NULL COMMENT '업무유형 - N:신규업무, O:기존업무',
  `use_flag` varchar(1) NOT NULL DEFAULT 'Y',
  `ord_seq` int(5) DEFAULT NULL,
  `created` datetime NOT NULL COMMENT '등록시간',
  `create_email` varchar(50) NOT NULL COMMENT '등록자 email',
  `updated` datetime NOT NULL COMMENT '수정시간',
  `updated_email` varchar(50) NOT NULL COMMENT '수정자 email',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='업무유형코드' AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
