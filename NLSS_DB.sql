-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- 생성 시간: 17-07-10 17:58
-- 서버 버전: 5.7.18-0ubuntu0.16.04.1
-- PHP 버전: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `NLSS`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `Lecture`
--

CREATE TABLE `Lecture` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `ppt_sequence` smallint(5) DEFAULT '1',
  `l_user` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `Lecture`
--

INSERT INTO `Lecture` (`l_id`, `l_name`, `ppt_sequence`, `l_user`) VALUES
(3, '캡스톤', 1, 'temple'),
(6, '네트워크', 1, 'temple'),
(8, '알고리즘', 1, 'professor'),
(9, '생활과 경제', 1, 'professor2'),
(10, '캡스톤', 1, 'professor3');

-- --------------------------------------------------------

--
-- 테이블 구조 `Location`
--

CREATE TABLE `Location` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `loc_rposition` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `Location`
--

INSERT INTO `Location` (`loc_id`, `loc_name`, `loc_rposition`) VALUES
(1, '공1104', '10.42.0.172'),
(2, '공1201', '192.168.11.61');

-- --------------------------------------------------------

--
-- 테이블 구조 `L_schedule`
--

CREATE TABLE `L_schedule` (
  `loc_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `week` varchar(4) COLLATE utf8_bin NOT NULL,
  `s_time` smallint(6) NOT NULL,
  `e_time` smallint(6) NOT NULL,
  `user_id` varchar(15) COLLATE utf8_bin NOT NULL,
  `l_name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `L_schedule`
--

INSERT INTO `L_schedule` (`loc_id`, `l_id`, `week`, `s_time`, `e_time`, `user_id`, `l_name`) VALUES
(1, 8, '수', 2, 5, 'professor', '알고리즘'),
(2, 9, '금', 8, 11, 'professor2', '생활과 경제'),
(2, 9, '화', 14, 17, 'professor2', '생활과 경제'),
(1, 10, '금', 10, 24, 'professor3', '캡스톤'),
(1, 10, '수', 14, 20, 'professor3', '캡스톤'),
(1, 10, '월', 11, 18, 'professor3', '캡스톤');

-- --------------------------------------------------------

--
-- 테이블 구조 `Manager_List`
--

CREATE TABLE `Manager_List` (
  `m_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `m_pass` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `Manager_List`
--

INSERT INTO `Manager_List` (`m_id`, `m_pass`) VALUES
('kaka', '5113489');

-- --------------------------------------------------------

--
-- 테이블 구조 `Nfc_Code`
--

CREATE TABLE `Nfc_Code` (
  `nfc_code` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `Nfc_Code`
--

INSERT INTO `Nfc_Code` (`nfc_code`) VALUES
('5113489');

-- --------------------------------------------------------

--
-- 테이블 구조 `PPT`
--

CREATE TABLE `PPT` (
  `p_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `p_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_bin NOT NULL,
  `slide_page` int(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `PPT`
--

INSERT INTO `PPT` (`p_id`, `l_id`, `p_name`, `url`, `slide_page`) VALUES
(1, 3, '6_동적계획법3 - 과제만.pptx', './ppt_upload/kaka/3_캡스톤/6_동적계획법3 - 과제만.pptx', 2),
(1, 10, 'Chapter 5_홍현표.pptx', './ppt_upload/professor3/10_캡스톤/Chapter 5_홍현표.pptx', 1),
(2, 10, 'Chapter 4_홍현표.pptx', './ppt_upload/professor3/10_캡스톤/Chapter 4_홍현표.pptx', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `Roll_Book`
--

CREATE TABLE `Roll_Book` (
  `l_id` int(11) NOT NULL,
  `user_id` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `Roll_Book`
--

INSERT INTO `Roll_Book` (`l_id`, `user_id`) VALUES
(3, 'hgd'),
(8, 'hgd'),
(9, 'hgd'),
(10, 'hgd'),
(3, 'kcs'),
(8, 'kcs'),
(9, 'kcs'),
(10, 'kcs'),
(3, 'kyh'),
(8, 'kyh'),
(9, 'kyh'),
(10, 'kyh');

-- --------------------------------------------------------

--
-- 테이블 구조 `Roll_Book_Check`
--

CREATE TABLE `Roll_Book_Check` (
  `l_id` int(11) NOT NULL,
  `check_date` date NOT NULL,
  `user_id` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `nfc_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(16) COLLATE utf8_bin NOT NULL,
  `late` varchar(2) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 테이블 구조 `S_schedule`
--

CREATE TABLE `S_schedule` (
  `user_id` varchar(15) COLLATE utf8_bin NOT NULL,
  `user_sch` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `S_schedule`
--

INSERT INTO `S_schedule` (`user_id`, `user_sch`) VALUES
('hgd', '2┃3┃8┃9┃10'),
('kcs', '2┃3┃8┃9┃10'),
('kyh', '2┃3┃8┃9┃10');

-- --------------------------------------------------------

--
-- 테이블 구조 `User_table`
--

CREATE TABLE `User_table` (
  `user_id` varchar(15) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_pass` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_type` varchar(4) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 테이블의 덤프 데이터 `User_table`
--

INSERT INTO `User_table` (`user_id`, `user_name`, `user_pass`, `user_type`) VALUES
('exit', '허성해', '1111', 'P'),
('hgd', '홍길동', '1111', 'S'),
('kaka', '홍현표', '1111', 'P'),
('kcs', '김철수', '1111', 'S'),
('kyh', '김영희', '1111', 'S'),
('professor', '교수', '1111', 'P'),
('professor2', '교수2', '1111', 'P'),
('professor3', '교수3', '1111', 'P'),
('temple', '전현덕', '1111', 'P');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `Lecture`
--
ALTER TABLE `Lecture`
  ADD PRIMARY KEY (`l_id`,`l_name`),
  ADD KEY `l_user` (`l_user`);

--
-- 테이블의 인덱스 `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`loc_id`);

--
-- 테이블의 인덱스 `L_schedule`
--
ALTER TABLE `L_schedule`
  ADD PRIMARY KEY (`l_id`,`week`),
  ADD KEY `loc_id` (`loc_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `L_schedule_ibfk_2` (`l_id`,`l_name`);

--
-- 테이블의 인덱스 `Manager_List`
--
ALTER TABLE `Manager_List`
  ADD PRIMARY KEY (`m_id`);

--
-- 테이블의 인덱스 `Nfc_Code`
--
ALTER TABLE `Nfc_Code`
  ADD PRIMARY KEY (`nfc_code`);

--
-- 테이블의 인덱스 `PPT`
--
ALTER TABLE `PPT`
  ADD PRIMARY KEY (`p_id`,`l_id`),
  ADD KEY `PPT_ibfk_1` (`l_id`);

--
-- 테이블의 인덱스 `Roll_Book`
--
ALTER TABLE `Roll_Book`
  ADD PRIMARY KEY (`l_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 테이블의 인덱스 `Roll_Book_Check`
--
ALTER TABLE `Roll_Book_Check`
  ADD PRIMARY KEY (`l_id`,`check_date`,`nfc_code`,`phone_number`);

--
-- 테이블의 인덱스 `S_schedule`
--
ALTER TABLE `S_schedule`
  ADD PRIMARY KEY (`user_id`);

--
-- 테이블의 인덱스 `User_table`
--
ALTER TABLE `User_table`
  ADD PRIMARY KEY (`user_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `Lecture`
--
ALTER TABLE `Lecture`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 테이블의 AUTO_INCREMENT `Location`
--
ALTER TABLE `Location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 테이블의 AUTO_INCREMENT `PPT`
--
ALTER TABLE `PPT`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `Lecture`
--
ALTER TABLE `Lecture`
  ADD CONSTRAINT `Lecture_ibfk_1` FOREIGN KEY (`l_user`) REFERENCES `User_table` (`user_id`);

--
-- 테이블의 제약사항 `L_schedule`
--
ALTER TABLE `L_schedule`
  ADD CONSTRAINT `L_schedule_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `Location` (`loc_id`),
  ADD CONSTRAINT `L_schedule_ibfk_2` FOREIGN KEY (`l_id`,`l_name`) REFERENCES `Lecture` (`l_id`, `l_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `L_schedule_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `User_table` (`user_id`);

--
-- 테이블의 제약사항 `PPT`
--
ALTER TABLE `PPT`
  ADD CONSTRAINT `PPT_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `Lecture` (`l_id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `Roll_Book`
--
ALTER TABLE `Roll_Book`
  ADD CONSTRAINT `Roll_Book_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `Lecture` (`l_id`),
  ADD CONSTRAINT `Roll_Book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User_table` (`user_id`);

--
-- 테이블의 제약사항 `S_schedule`
--
ALTER TABLE `S_schedule`
  ADD CONSTRAINT `S_schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User_table` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
