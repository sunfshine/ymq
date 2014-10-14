-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-10-14 14:34:15
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ymq`
--

-- --------------------------------------------------------

--
-- 表的结构 `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `aid` int(10) NOT NULL AUTO_INCREMENT COMMENT '活动id',
  `num` varchar(20) NOT NULL COMMENT '人数',
  `cost` varchar(20) NOT NULL COMMENT '费用',
  `time` datetime NOT NULL COMMENT '时间',
  `description` text CHARACTER SET utf8 NOT NULL COMMENT '介绍',
  `owner` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '活动发起人',
  `location` text CHARACTER SET utf8 NOT NULL COMMENT '活动地点',
  `title` text CHARACTER SET utf8 NOT NULL COMMENT '活动标题',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `activities`
--

INSERT INTO `activities` (`aid`, `num`, `cost`, `time`, `description`, `owner`, `location`, `title`) VALUES
(1, '6', '80', '2014-10-16 14:00:00', '斑马斑马，你回到了你的家，可我浪费着我寒冷的年华，你的城市没有一扇门为我打开啊，我终究还要回到路上', '李冲', '杭州市上城区建国中路6号', '来玩羽毛球吧'),
(2, '8', '15', '2014-10-29 12:00:00', '斑马斑马，你回到了你的家，可我浪费着我寒冷的年华，你的城市没有一扇门为我打开啊，我终究还要回到路上', '孙登博', '杭州西湖区圣苑小区', '一起运动啊');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
