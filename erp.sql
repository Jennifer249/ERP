-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-08 10:59:23
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- 表的结构 `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `weightd` varchar(20) NOT NULL,
  `weight` double NOT NULL,
  `num` double NOT NULL,
  `price` double NOT NULL,
  `sum` double NOT NULL,
  `employeeID` varchar(20) NOT NULL,
  `providerID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `yunfei` double NOT NULL,
  `hetong` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `buy`
--

INSERT INTO `buy` (`ID`, `productID`, `weightd`, `weight`, `num`, `price`, `sum`, `employeeID`, `providerID`, `time`, `yunfei`, `hetong`) VALUES
('', 'YZ001', '吨', 0, 0, 6100, 100000, '1', 'p001', '2018-01-05 00:00:00', 10, 'CM180105'),
('', 'YZ001', '吨', 0, 0, 6100, 100000, '1', 'p001', '2018-01-05 00:00:00', 10, 'CM180105'),
('', 'YZ001', '吨', 0, 0, 6100, 0, '1', 'p001', '2018-01-05 00:00:00', 0, 'CM180105'),
('', 'YZ001', '吨', 0, 0, 6100, 100000, '1', 'p001', '2018-01-05 00:00:00', 10, 'CM180105'),
('', 'YZ001', '吨', 0, 0, 6100, 100000, '1', 'p001', '2018-01-05 00:00:00', 10, 'CM180105'),
('', 'YZ001', '吨', 0, 0, 6100, 0, '1', 'p001', '2018-01-05 00:00:00', 0, 'CM180105');

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`name`, `address`, `tele`, `fax`, `zipcode`) VALUES
('a', 'x', '1', '1', 'a');

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL COMMENT '0代表非会员，1代表会员'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`ID`, `name`, `address`, `bank`, `tele`, `flag`) VALUES
('c001', '福州大大纸品有限公司', '福建省福州市闽侯县', '1234567890', '15980267015', 0),
('c001', '福州大大纸品有限公司', '福建省福州市闽侯县', '1234567890', '15980267015', 0);

-- --------------------------------------------------------

--
-- 表的结构 `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `zw` varchar(20) NOT NULL,
  `question1` varchar(20) NOT NULL COMMENT '密保问题1',
  `question2` varchar(20) NOT NULL COMMENT '密保问题2',
  `answer1` varchar(20) NOT NULL COMMENT '密保问题回答1',
  `answer2` varchar(20) NOT NULL COMMENT '密保问题回答2',
  `flag` int(11) NOT NULL COMMENT '1代表管理员0代表普通用户'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `employee`
--

INSERT INTO `employee` (`ID`, `name`, `password`, `tele`, `zw`, `question1`, `question2`, `answer1`, `answer2`, `flag`) VALUES
('Admin', '', '123456', '', '', '', '', '', '', 1),
('123456', '', '123456', '', '', '', '', '', '', 0),
('1', '', '1', '', '', '你最喜欢的歌手', '你最喜欢的老师', '1', '1', 0),
('Admin', '', '123456', '', '', '', '', '', '', 1),
('123456', '', '123456', '', '', '', '', '', '', 0),
('1', '', '1', '', '', '你最喜欢的歌手', '你最喜欢的老师', '1', '1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fqoutput`
--

CREATE TABLE IF NOT EXISTS `fqoutput` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `weightd` varchar(2) NOT NULL,
  `numd` varchar(2) NOT NULL,
  `outputweight` double NOT NULL,
  `outnum` double NOT NULL,
  `price` double NOT NULL,
  `sum` double NOT NULL,
  `jh` varchar(200) NOT NULL COMMENT '件号',
  `saleID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `employeeID` varchar(20) NOT NULL,
  `bz` varchar(20) NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分切出仓单';

--
-- 转存表中的数据 `fqoutput`
--

INSERT INTO `fqoutput` (`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID`, `bz`) VALUES
('001OUT', '001', '吨', '张', 8, 1000, 20, 20000, 'j001', '0', '2018-01-07 00:00:00', 'e001', '0'),
('001OUT', '002', '吨', '张', 4, 500, 10, 5000, 'j002', '0', '2018-01-07 00:00:00', 'e001', '0'),
('001OUT', '003', '吨', '张', 16, 2000, 30, 60000, 'j003', '0', '2018-01-07 00:00:00', 'e001', '0');

-- --------------------------------------------------------

--
-- 表的结构 `input`
--

CREATE TABLE IF NOT EXISTS `input` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `numd` varchar(2) NOT NULL,
  `weightd` varchar(2) NOT NULL,
  `inputweight` double NOT NULL,
  `inputnum` double NOT NULL,
  `kw` varchar(20) NOT NULL COMMENT '库位',
  `flag` int(11) NOT NULL,
  `origin` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  `bz` varchar(200) NOT NULL COMMENT '备注',
  `price` double NOT NULL,
  `jh` varchar(200) NOT NULL COMMENT '件号',
  `sum` double NOT NULL,
  `employeeID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `inputmoney`
--

CREATE TABLE IF NOT EXISTS `inputmoney` (
  `ID` varchar(20) NOT NULL,
  `saleID` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  `sum` double NOT NULL,
  `employeeID` varchar(20) NOT NULL,
  `customerID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `inputmoney`
--

INSERT INTO `inputmoney` (`ID`, `saleID`, `time`, `sum`, `employeeID`, `customerID`) VALUES
('I001', '0001', '2018-01-05 00:00:00', 3, '1', 'c001'),
('I001', '0001', '2018-01-05 00:00:00', 3, '1', 'c001');

-- --------------------------------------------------------

--
-- 表的结构 `kuwei`
--

CREATE TABLE IF NOT EXISTS `kuwei` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `weight` double NOT NULL COMMENT '该库位剩余容量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `output`
--

CREATE TABLE IF NOT EXISTS `output` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `weightd` varchar(2) NOT NULL,
  `numd` varchar(2) NOT NULL,
  `outputweight` double NOT NULL,
  `outnum` double NOT NULL,
  `price` double NOT NULL,
  `sum` double NOT NULL,
  `jh` varchar(200) NOT NULL COMMENT '件号',
  `saleID` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  `employeeID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `output`
--

INSERT INTO `output` (`ID`, `productID`, `weightd`, `numd`, `outputweight`, `outnum`, `price`, `sum`, `jh`, `saleID`, `time`, `employeeID`) VALUES
('001', '1', '1', '1', 1, 1, 1, 1, '1', '111111111', '2018-01-02 00:00:00', '1'),
('0002OUT', 'YZ001', '吨', '张', 1, 1, 1, 1, '', '0002', '0000-00-00 00:00:00', '1'),
('S001OUT', '001', '吨', '张', 8, 1000, 20, 20000, '', 'S001', '0000-00-00 00:00:00', 'e001'),
('S002OUT', '001', '吨', '张', 16, 2000, 20, 40000, '', 'S002', '0000-00-00 00:00:00', 'e001'),
('OUT', '', '吨', '张', 0, 0, 0, 0, '', '', '0000-00-00 00:00:00', ''),
('S001OUT', '001', '吨', '张', 8, 1000, 20, 20000, '', 'S001', '0000-00-00 00:00:00', 'e001'),
('S001OUT', '001', '吨', '张', 8, 1000, 20, 20000, '', 'S001', '0000-00-00 00:00:00', 'e001');

-- --------------------------------------------------------

--
-- 表的结构 `outputmoney`
--

CREATE TABLE IF NOT EXISTS `outputmoney` (
  `ID` varchar(20) NOT NULL,
  `providerID` varchar(20) NOT NULL,
  `buyID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `sum` double NOT NULL,
  `employeeID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `outputmoney`
--

INSERT INTO `outputmoney` (`ID`, `providerID`, `buyID`, `time`, `sum`, `employeeID`) VALUES
('O001', 'p001', '001', '2018-01-05 00:00:00', 3, '1'),
('O001', 'p001', '001', '2018-01-05 00:00:00', 3, '1');

-- --------------------------------------------------------

--
-- 表的结构 `porduct`
--

CREATE TABLE IF NOT EXISTS `porduct` (
  `ID` varchar(20) NOT NULL,
  `pinpai` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `jibie` char(2) NOT NULL,
  `kezhong` double NOT NULL,
  `guige` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `weightd` varchar(20) NOT NULL COMMENT '重量单位',
  `numd` varchar(20) NOT NULL COMMENT '数量单位',
  `number` double NOT NULL COMMENT '库存',
  `bzprice` double NOT NULL,
  `yhprice` double NOT NULL,
  `lowestsave` double NOT NULL,
  `highestsave` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `porduct`
--

INSERT INTO `porduct` (`ID`, `pinpai`, `type`, `jibie`, `kezhong`, `guige`, `price`, `weightd`, `numd`, `number`, `bzprice`, `yhprice`, `lowestsave`, `highestsave`) VALUES
('YZ001', '晨鸣', '白卡', 'A', 300, '1092', 6100, '吨', '件', 0, 6200, 6300, 2, 5),
('YZ001', '晨鸣', '白卡', 'A', 300, '1092', 6100, '吨', '件', 0, 6200, 6300, 2, 5),
('YZ001', '晨鸣', '白卡', 'A', 300, '1092', 6100, '吨', '件', 0, 6200, 6300, 2, 5),
('YZ001', '晨鸣', '白卡', 'A', 300, '1092', 6100, '吨', '件', 0, 6200, 6300, 2, 5);

-- --------------------------------------------------------

--
-- 表的结构 `provideproduct`
--

CREATE TABLE IF NOT EXISTS `provideproduct` (
  `provideID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `provideproduct`
--

INSERT INTO `provideproduct` (`provideID`, `productID`) VALUES
('p001', 'YZ001'),
('p001', 'YZ001');

-- --------------------------------------------------------

--
-- 表的结构 `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `tele` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `provider`
--

INSERT INTO `provider` (`ID`, `name`, `address`, `bank`, `tele`) VALUES
('p001', '青州造纸厂', '福建省福州市闽侯县', '1234567890', '15980267015'),
('p001', '青州造纸厂', '福建省福州市闽侯县', '1234567890', '15980267015');

-- --------------------------------------------------------

--
-- 表的结构 `qu`
--

CREATE TABLE IF NOT EXISTS `qu` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `productID` varchar(20) NOT NULL,
  `questionID` varchar(20) NOT NULL,
  `weight` double NOT NULL,
  `jh` varchar(200) NOT NULL,
  `buyID` varchar(20) NOT NULL,
  `lost` double NOT NULL,
  `provideID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `inputID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `num` double NOT NULL,
  `weight` double NOT NULL,
  `price` double NOT NULL,
  `sum` double NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `employeeID` varchar(20) NOT NULL,
  `bz` varchar(200) NOT NULL COMMENT '备注',
  `hetong` varchar(200) NOT NULL,
  `fqprice` double NOT NULL,
  `yunprice` double NOT NULL,
  `allsum` double NOT NULL,
  `specialID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sale`
--

INSERT INTO `sale` (`ID`, `productID`, `num`, `weight`, `price`, `sum`, `customerID`, `time`, `employeeID`, `bz`, `hetong`, `fqprice`, `yunprice`, `allsum`, `specialID`) VALUES
('S001', '001', 1000, 8, 20, 20000, 'c001', '2018-01-05 00:00:00', 'e001', '0', '', 1000, 100, 21100, '1'),
('S002', '001', 2000, 16, 20, 40000, 'c001', '2018-01-04 00:00:00', 'e001', '', '', 1000, 100, 41100, '0'),
('S002', '002', 500, 4, 20, 10000, 'c001', '2018-01-04 00:00:00', 'e001', '', '', 1000, 100, 11100, '0');

-- --------------------------------------------------------

--
-- 表的结构 `special`
--

CREATE TABLE IF NOT EXISTS `special` (
  `ID` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `storehouse`
--

CREATE TABLE IF NOT EXISTS `storehouse` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `storehouse`
--

INSERT INTO `storehouse` (`ID`, `name`) VALUES
('', ''),
('', ''),
('', ''),
('1', '2'),
('', ''),
('', '2'),
('333', '33'),
('1111', '111'),
('1', 'aaa'),
('s', 's'),
('s', 's'),
('zz', 'zz'),
('q', 'q'),
('', ''),
('q', 'q'),
('w', 'x'),
('x', 'x'),
('111', 'asdfg'),
('10101', 'zxcvbn'),
('111', ''),
('1', ''),
('123', ''),
('123', ''),
('ABCDEF', '');

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `jh` varchar(200) NOT NULL,
  `inputID` varchar(20) NOT NULL,
  `providerID` varchar(20) NOT NULL,
  `buyID` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `productID` varchar(20) NOT NULL,
  `weightd` varchar(2) NOT NULL,
  `kwID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='验货单';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
