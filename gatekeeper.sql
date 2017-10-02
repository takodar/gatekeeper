-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2014 at 06:15 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demomicr_gatekeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE IF NOT EXISTS `coupon_master` (
  `coupon_code_id` int(6) NOT NULL AUTO_INCREMENT,
  `coupon_code_name` varchar(60) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `value` int(6) NOT NULL,
  PRIMARY KEY (`coupon_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`coupon_code_id`, `coupon_code_name`, `start_date`, `end_date`, `type`, `value`) VALUES
(3, 'Coupon 3', '07/16/2014', '07/26/2014', 1, 30),
(4, 'Coupon 4', '07/31/2014', '08/12/2014', 0, 50),
(6, 'testcode', '07/07/2014', '07/31/2014', 1, 10),
(7, 'testcode1', '07/06/2014', '07/22/2014', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `coustomer_master`
--

CREATE TABLE IF NOT EXISTS `coustomer_master` (
  `coustomer_id` int(7) NOT NULL AUTO_INCREMENT,
  `order_id` int(6) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pincode` bigint(9) NOT NULL,
  PRIMARY KEY (`coustomer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `coustomer_master`
--

INSERT INTO `coustomer_master` (`coustomer_id`, `order_id`, `f_name`, `l_name`, `email_id`, `address`, `city`, `state`, `pincode`) VALUES
(43, 75, 'sdasd', 'sdsadas', 'vffvfv@gmail.com', 'sdsadasd', 'sdsdas', 'sdsadsad', 3333),
(44, 76, 'azazaz', 'azazaz', '....aaa@gmail.vhjhj', 'azazaz', 'zaz', 'zazaz', 222),
(45, 77, 'fdgdfgd', 'fgfgdf', 'dn@gmail.com', 'dfgfg', 'gfgfdgfdf', 'gfdgdfg', 383325),
(46, 78, '7y78y7y', 'cscs', 'dn@gmail.com', 'scscs', 'scsc', 'scsc', 4444),
(47, 79, 'jghjhg', 'hjhgj', 'dn@gmail.com', 'hjhgjgh', 'hgjghj', 'hjhgj', 5655),
(48, 80, '7y78y7y', 'patel l', 'dn@gmail.com', '444', 'bayad 1', 'gujarat', 383325),
(49, 81, 'dfgrg', 'grfgdfg', 'dn@gmail.com', 'fgfdgf', 'fgfdgdf', 'fgfdg', 67657),
(50, 82, 'dinkar', 'patel', 'dn@gmail.com', 'bayad', 'ahmedabad', 'gujarat', 9913024677),
(51, 83, 'swsw', 'wsws', 'dd@gmail.com', 'swsw', 'sws', 'wsws', 2222),
(52, 84, 'dqwd', 'wdwd', 'dn@gmail.com', 'wdw', 'wdw', 'wdwd', 33),
(53, 85, 'Dinkar', 'Patel', 'Dnpatel88@gmail.com', 'Bayad', 'Ahmedabad', 'Gujarat', 99130),
(54, 86, 'sasas', 'asa', 'ddd@gmail.com', 'saSAS', 'AsaS', 'AsaSAs', 3233),
(55, 87, 'thgtrg', 'tgtrgtr', 'ddd@gmail.com', 'gtrgtrg', 'gtrg', 'tgtrg', 4344),
(56, 88, 'erer', 'erwerwe', 'ddd@gmail.com', 'rewrwer', 'ewrwerewrwr', 'werewrew', 7868),
(57, 89, 'g', 'g', 'ddd@gmail.com', 'ghgh', 'ggh', 'ghg', 5656),
(58, 90, 'gh', 'hgh', 'ddd@gmail.com', 'ghgh', 'ghg', 'h', 66),
(59, 91, 'aas', 'asas', 'ddd@gmail.com', 'sa', 'asas', 'asas', 233),
(60, 92, 'dsd', 'dsd', 'ddd@gmail.com', 'sdsd', 'dsds', 'dsds', 343),
(61, 93, 'fgf', 'gfgf', 'ddd@gmail.com', 'gfgf', 'fgf', 'fgf', 233),
(62, 94, 'fdfd', 'fdfd', 'df@gfg.fgf', 'fdf', 'dfdf', 'dfdf', 455),
(63, 95, 'dd', 'sdas', 'ddd@gmail.com', 'dsads', 'dsadsa', 'dsadsd', 546456),
(64, 96, 'sds', 'sd', 'dn@micropixel.co.in', 'dsd', 'dsds', 'dsd', 434),
(65, 97, 'sx', 'xs', 'ddd@gmail.com', 'sx', 'sxsx', 'xsx', 455),
(66, 98, 'xcxc', 'xcx', 'zz@sds.coo', 'xcx', 'cx', 'xc', 3223),
(67, 99, '22', '22', 'aa@sds.csc', '22', '22', '22', 222),
(68, 100, 'asa', 'sas', 'ddd@gmail.com', 'sas', 'ss', 'ss', 33),
(69, 101, 'zZ', 'zZ', 'dn@micropixel.co.in', 'ZZ', 'Zas', 'sasa', 434),
(70, 102, 'asasasas', 'asas', 'dn@micropixel.co.in', 'asas', 'asas', 'asasa', 33),
(71, 103, 'Zaz', 'aa', 'ddd@gmail.com', 'sasas', 'asas', 'asasa', 222),
(72, 104, 'dfd', 'dfdfd', 'ddd@gmail.com', 'fdf', 'fdfd', 'dfdf', 78768),
(73, 105, 'ee', 'erewr', 'ddd@gmail.com', 'ere', 'erer', 'ererwe', 345435),
(74, 106, 'aq', 'a', 'ddd@gmail.com', 'a', 'aa', 'a', 222),
(75, 107, '22', 'g', 'ddd@gmail.com', 'dss', 'asas', 'sdsd', 4354),
(76, 108, 'fdf', 'dfdsff', 'ddd@gmail.com', 'dfsdfd', 'fsdfds', 'fsdfsd', 444),
(77, 109, 'rfe', 'ere', 'ff@gmail.com', 'ere', 'ewrwerewrwr', 'ere', 555),
(78, 110, 'vvv', 'vdv', 'dd@vd.com', 'dvdv', 'dvdv', 'dvdvd', 44),
(79, 111, 'zZZ', 'Z', 'ddd@gmail.com', 'ZZ', 'ZZz', 'ZZ', 3432),
(80, 112, 'xcx', 'xx', 'ddd@gmail.com', 'cxcx', 'cxc', 'xcx', 3333),
(81, 113, 'asaaa', 'sasa', 'ddd@gmail.com', 'asasasasa', 'asa', 'sasaasas', 3223),
(82, 114, 'bhj', 'ghuj', 'aa@sds.csc', 'gu', 'gu', 'gu', 2122),
(83, 115, 'bj', 'bb', 'aa@sds.csc', 'b', 'b', 'ujbu', 122),
(84, 116, 'qsqs', 'qsq', 'dn@micropixel.co.in', 'sqsq', 'sqsqs', 'qsqs', 11),
(85, 117, 'erer', 'sds', 'tarun@micropixel.co.in', 'dss', 'sds', 'asasa', 4354),
(86, 118, 'dsd', 'sd', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(87, 119, 'dd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(88, 120, 'asaaa', 'jhjh', 'ddd@gmail.com', 'jhjhj', 'hjhj', 'hjhj', 434),
(89, 121, 'dsd', 'sds', 'ddd@gmail.com', 'dvdv', 'sds', 'sdsd', 32),
(90, 122, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(91, 123, 'dsd', 'sds', 'ddd@gmail.com', 'dvdv', 'sds', 'sdsd', 4354),
(92, 124, 'sd', 'dsd', 'dd@vd.com', 'sdsdd', 'ds', 'sd', 3333),
(93, 125, 'ewfef', 'efef', 'ddd@gmail.com', 'efef', 'efef', 'efe', 443),
(94, 126, 'sas', 'asa', 'ddd@gmail.com', 'aa', 'aa', 'asas', 4354),
(95, 127, 'ss', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(96, 128, 'dsd', 'dsd', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(97, 129, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(98, 130, 'sds', 'sds', 'ddd@gmail.com', 'dvdv', 'sds', 'sdsd', 4354),
(99, 131, 'dsd', 'dsd', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(100, 132, 'dsd', 'sds', 'dd@vd.com', 'dss', 'sds', 'sdsd', 4354),
(101, 133, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(102, 134, 'dsd', 'dsd', 'ddd@gmail.com', 'dss', 'asas', 'asasa', 3333),
(103, 135, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(104, 136, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(105, 137, 'dsd', 'dsd', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(106, 138, 'dsd', 'sds', 'ddd@gmail.com', 'dvdv', 'asas', 'sdsd', 4354),
(107, 139, 'test', 'last', 'dn@micropixel.co.in', 'adrees', 'cityies', 'statess', 9939939399),
(108, 140, 'fname', 'lname', 'dn@micropixel.co.in', 'addressss', 'city1', 'state1', 9999),
(109, 141, 'dn', 'patel', 'dn@micropixel.co.in', 'micropixel', 'bayad', 'gujarat', 9939939399),
(110, 142, 'sss', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(111, 143, 'test', 'dsd', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(112, 144, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(113, 145, 'ss', 'dsd', 'tarun@micropixel.co.in', 'dvdv', 'asas', 'sdsd', 4354),
(114, 146, 'dn', 'nkjn', 'dn@micropixel.co.in', 'jnj', 'nnj', 'njnj', 8989),
(115, 147, 'ss', 'sds', 'ddd@gmail.com', 'dss', 'asas', 'asasa', 3333),
(116, 148, 'dsd', 'sds', 'ddd@gmail.com', 'dss', 'sds', 'sdsd', 4354),
(117, 149, 'ss', 'dsd', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 4354),
(118, 150, 'dsd', 'dsd', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 3333),
(119, 151, 'ss', 'dsd', 'dn@micropixel.co.in', 'dvdv', 'asas', 'asasa', 3333),
(120, 152, 'dd', 'dsd', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 4354),
(121, 153, 'dsd', 'dsd', 'dn@micropixel.co.in', 'dss', 'asas', 'sdsd', 4354),
(122, 154, 'ss', 'sds', 'dn@micropixel.co.in', 'dss', 'sds', 'asasa', 3333),
(123, 155, 'dsd', 'sds', 'dn@micropixel.co.in', 'dvdv', 'asas', 'asasa', 3333),
(124, 156, 'dsd', 'sds', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 3333),
(125, 157, 'ss', 'dsd', 'dn@micropixel.co.in', 'dvdv', 'asas', 'asasa', 3333),
(126, 158, 'dsd', 'sds', 'aa@sds.csc', 'dvdv', 'asas', 'asasa', 3333),
(127, 159, 'ashita', 'bhatt', 'dn@micropixel.co.in', 'maninagar', 'ahmedabad', 'gujarat', 999898),
(128, 160, 'dsd', 'dsd', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 4354),
(129, 161, 'dsd', 'sds', 'tarun@micropixel.co.in', 'dss', 'asas', 'asasa', 3333),
(130, 162, 'ss', 'sds', 'ddd@gmail.com', 'dvdv', 'aa', 'asasa', 4354),
(131, 163, 'dsd', 'sds', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 3333),
(132, 164, 'ss', 'dsd', 'ddd@gmail.com', 'dvdv', 'asas', 'asasa', 3333),
(133, 165, 'asdf', 'asd', 'testmail@gmail.com', 'sdf', 'fasdf', 'asdf', 345345),
(134, 166, 'asdf', 'asd', 'testmail@gmail.com', 'fasd', 'Ahmedabad', 'asdf', 345345),
(135, 167, 'asdf', 'asd', 'testmail@gmail.com', 'fasd', 'Ahmedabad', 'asdf', 345345),
(136, 168, 'asdf', 'asd', 'testmail@gmail.com', 'fasd', 'Ahmedabad', 'asdf', 345345),
(137, 169, 'Andy', 'Hebert', 'ahebert@authentry.com', '110 MAIN STREET ', 'Hampstead', 'NH', 3841),
(138, 170, 'df', 'dfg', 'fghfgh@hotmail.vom', 'fgdfg', '456', 'dfg', 456),
(139, 171, 'asdf', 'asd', 'tarun@micropixel.co.in', 'fasdf', 'asdf', 'asdf', 345),
(140, 172, 'asdf', 'asdf', 'dn@micropixel.co.in', 'asdf', 'asdf', 'asdf', 345),
(141, 173, 'asdf', 'asd', 'dn@micropixel.co.in', 'Sankalp', '234', '234', 345),
(142, 174, 'asdf', 'asdf', 'tarunmistri5585@gmail.com', 'fasdfsdf', '345', 'asdf', 345),
(143, 175, 'kjhg', 'jh', 'tarun@micropixel.co.in', 'lkjh', 'kjh', 'kj', 876),
(144, 176, 'asdfasdf', 'asdf', 'tarun@micropixel.co.in', 'asdf', 'asdf', 'asdf', 345),
(145, 177, 'asdfasdf', 'asdf', 'tarun@micropixel.co.in', 'asdf', 'asdf', 'asdf', 345);

-- --------------------------------------------------------

--
-- Table structure for table `loginmaster`
--

CREATE TABLE IF NOT EXISTS `loginmaster` (
  `admin_id` int(12) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `contact_no` bigint(14) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_loggin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `loginmaster`
--

INSERT INTO `loginmaster` (`admin_id`, `first_name`, `last_name`, `email_id`, `contact_no`, `user_name`, `password`, `last_loggin`) VALUES
(1, 'patel', 'dinkar', 'dn@micropixel.co.in', 9913024677, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2014-07-23 03:54:44'),
(2, 'Yogesh', 'Patel', 'yogesh4@friend.com', 9987887100, 'admin', 'yogesh', '2013-04-12 16:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `prod_id` int(3) NOT NULL,
  `prod_subscription` int(2) NOT NULL,
  `prod_price` float NOT NULL,
  `coupon_id` int(6) NOT NULL,
  `deduction` float NOT NULL,
  `shipping_charge` int(2) NOT NULL,
  `total` float NOT NULL,
  `payment_status` int(1) NOT NULL,
  `order_date` varchar(12) NOT NULL,
  `process` int(1) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `prod_id`, `prod_subscription`, `prod_price`, `coupon_id`, `deduction`, `shipping_charge`, `total`, `payment_status`, `order_date`, `process`) VALUES
(73, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '2014-07-09', 0),
(74, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '2014-07-09', 0),
(75, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '2014-07-09', 0),
(76, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '2014-07-09', 0),
(77, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '2014-07-09', 0),
(78, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '2014-07-09', 0),
(79, 1, 2, 29.98, 7, 5, 0, 24.98, 0, '2014-07-09', 0),
(80, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '2014-07-09', 0),
(81, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '2014-07-09', 0),
(82, 1, 2, 29.98, 7, 5, 0, 24.98, 0, '2014-07-09', 0),
(83, 1, 2, 29.98, 7, 5, 0, 24.98, 0, '2014-07-09', 0),
(84, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '2014-07-09', 2),
(85, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '2014-07-10', 0),
(86, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(87, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(88, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(89, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(90, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(91, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(92, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(93, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(94, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(95, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(96, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(97, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(98, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(99, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/12/2014', 0),
(100, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(101, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(102, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(103, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(104, 2, 0, 49.99, 6, 5, 60, 104.99, 0, '07/12/2014', 0),
(105, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/12/2014', 0),
(106, 2, 0, 49.99, 6, 5, 60, 104.99, 0, '07/12/2014', 0),
(107, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/12/2014', 0),
(108, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(109, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/12/2014', 0),
(110, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/12/2014', 0),
(111, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/12/2014', 0),
(112, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/12/2014', 0),
(113, 2, 0, 49.99, 6, 5, 60, 104.99, 0, '07/12/2014', 0),
(114, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/12/2014', 0),
(115, 2, 0, 49.99, 6, 5, 60, 104.99, 0, '07/12/2014', 0),
(116, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/14/2014', 0),
(117, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/14/2014', 0),
(118, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(119, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/14/2014', 0),
(120, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(121, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(122, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(123, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(124, 1, 1, 19.99, 6, 2, 0, 17.99, 0, '07/14/2014', 0),
(125, 1, 2, 29.98, 6, 3, 0, 26.98, 0, '07/14/2014', 0),
(126, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(127, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(128, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(129, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/14/2014', 0),
(130, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(131, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(132, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(133, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(134, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(135, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(136, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(137, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/14/2014', 0),
(138, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/14/2014', 0),
(139, 1, 2, 29.98, 0, 0, 0, 29.98, 0, '07/15/2014', 0),
(140, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(141, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(142, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(143, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(144, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(145, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(146, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(147, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(148, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(149, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(150, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(151, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(152, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(153, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(154, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(155, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(156, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(157, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(158, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(159, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(160, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(161, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(162, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(163, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(164, 1, 1, 19.99, 0, 0, 0, 19.99, 1, '07/15/2014', 0),
(165, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(166, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/15/2014', 0),
(167, 1, 1, 19.99, 0, 0, 0, 19.99, 2, '07/15/2014', 0),
(168, 2, 0, 49.99, 0, 0, 60, 109.99, 1, '07/15/2014', 0),
(169, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/19/2014', 0),
(170, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/21/2014', 0),
(171, 2, 0, 49.99, 0, 0, 60, 109.99, 0, '07/21/2014', 0),
(172, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/23/2014', 0),
(173, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/23/2014', 0),
(174, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/23/2014', 0),
(175, 1, 1, 19.99, 0, 0, 0, 19.99, 0, '07/23/2014', 0),
(176, 2, 0, 49.99, 0, 0, 5, 54.99, 0, '07/23/2014', 0),
(177, 2, 0, 49.99, 0, 0, 5, 54.99, 0, '07/23/2014', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE IF NOT EXISTS `shipping_charge` (
  `s_id` int(1) NOT NULL AUTO_INCREMENT,
  `charge` int(5) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`s_id`, `charge`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_master`
--

CREATE TABLE IF NOT EXISTS `shipping_master` (
  `shipping_id` int(6) NOT NULL AUTO_INCREMENT,
  `order_id` int(6) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `shipping_master`
--

INSERT INTO `shipping_master` (`shipping_id`, `order_id`, `f_name`, `l_name`, `email_id`, `address`, `city`, `state`, `pincode`) VALUES
(1, 75, 'dxwxdwe', 'edewde', 'ghfggh@g.com', 'ededed', 'ededed', 'ewdewdew', 4444),
(2, 84, 'dd', 'dsds', 'ddd@gmail.com', 'sdsd', 'asdsd', 'sdsd', 455),
(3, 104, 'sds', 'sds', 'dd@dd.com', 'sds', 'dsds', 'sds', 56546),
(4, 106, 'aa', 'a', 'dd@dd.com', 'a', 'a', 'a', 222),
(5, 107, 'aa', 'a', 'dd@dd.com', 'a', 'a', 'a', 222),
(6, 109, 'fdefrdf', 'dfdf', 'dd@dd.com', 'dfdf', 'dfdf', 'fdfd', 33),
(7, 110, 'ss', 'sdsd', 'dd@dd.com', 'sds', 'sds', 'ds', 33),
(8, 112, 'ss', 'sddsd', 'dd@dd.com', 'sds', 'sds', 'dsdsd', 8797),
(9, 113, 'aa', 'asa', 'dd@dd.com', 'sasa', 'sas', 'asas', 22),
(10, 115, 'f', 'f', 'dd@dd.com', 'ff', 'yf', 'yfy', 76767),
(11, 168, 'asdf', 'asdf', 'av@hotmail.com', 'as', 'dfasdf', 'asdf', 345),
(12, 170, 'dfg', 'dfg', 'abc@hotmail.com', 'dfg', 'dfg', 'dgf', 456),
(13, 171, 'asdf', 'asdf', 'abc@hotmail.com', 'asdf', 'adf', 'asdf', 34534),
(14, 176, 'asdfasd', 'fasd', 'abc@hotmail.com', 'asdffaasd', 'fasdf', '3', 45345),
(15, 177, 'asdfasd', 'fasd', 'abc@hotmail.com', 'asdffaasd', 'fasdf', '3', 45345);

-- --------------------------------------------------------

--
-- Table structure for table `transc_master`
--

CREATE TABLE IF NOT EXISTS `transc_master` (
  `T_ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `TRANS_ID` varchar(30) NOT NULL,
  `TOKEN` varchar(30) NOT NULL,
  `BILLINGAGREEMENTACCEPTEDSTATUS` varchar(30) NOT NULL,
  `CHECKOUTSTATUS` varchar(30) NOT NULL,
  `TIMESTAMP` varchar(30) NOT NULL,
  `CORRELATIONID` varchar(30) NOT NULL,
  `ACK` varchar(30) NOT NULL,
  `VERSION` varchar(30) NOT NULL,
  `BUILD` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PAYERID` varchar(30) NOT NULL,
  `PAYERSTATUS` varchar(30) NOT NULL,
  `BUSINESS` varchar(60) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `COUNTRYCODE` varchar(30) NOT NULL,
  `SHIPTONAME` varchar(60) NOT NULL,
  `SHIPTOSTREET` varchar(30) NOT NULL,
  `SHIPTOCITY` varchar(30) NOT NULL,
  `SHIPTOSTATE` varchar(30) NOT NULL,
  `SHIPTOZIP` varchar(30) NOT NULL,
  `SHIPTOCOUNTRYCODE` varchar(30) NOT NULL,
  `SHIPTOCOUNTRYNAME` varchar(30) NOT NULL,
  `ADDRESSSTATUS` varchar(30) NOT NULL,
  `CURRENCYCODE` varchar(30) NOT NULL,
  `AMT` varchar(30) NOT NULL,
  `ITEMAMT` varchar(30) NOT NULL,
  `SHIPPINGAMT` varchar(30) NOT NULL,
  `HANDLINGAMT` varchar(30) NOT NULL,
  `TAXAMT` varchar(30) NOT NULL,
  `INSURANCEAMT` varchar(30) NOT NULL,
  `SHIPDISCAMT` varchar(30) NOT NULL,
  `L_NAME0` varchar(30) NOT NULL,
  `L_NUMBER0` varchar(30) NOT NULL,
  `L_QTY0` varchar(30) NOT NULL,
  `L_TAXAMT0` varchar(30) NOT NULL,
  `L_AMT0` varchar(30) NOT NULL,
  `L_DESC0` varchar(30) NOT NULL,
  `L_ITEMWEIGHTVALUE0` varchar(30) NOT NULL,
  `L_ITEMLENGTHVALUE0` varchar(30) NOT NULL,
  `L_ITEMWIDTHVALUE0` varchar(30) NOT NULL,
  `L_ITEMHEIGHTVALUE0` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_CURRENCYCODE` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_AMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_ITEMAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPPINGAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_HANDLINGAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_TAXAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_INSURANCEAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPDISCAMT` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_TRANSACTIONID` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTONAME` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOSTREET` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOCITY` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOSTATE` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOZIP` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_ADDRESSSTATUS` varchar(30) NOT NULL,
  `PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_NAME0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_NUMBER0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_QTY0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_TAXAMT0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_AMT0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_DESC0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0` varchar(30) NOT NULL,
  `L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0` varchar(30) NOT NULL,
  `PAYMENTREQUESTINFO_0_ERRORCODE` varchar(30) NOT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `transc_master`
--

INSERT INTO `transc_master` (`T_ID`, `TRANS_ID`, `TOKEN`, `BILLINGAGREEMENTACCEPTEDSTATUS`, `CHECKOUTSTATUS`, `TIMESTAMP`, `CORRELATIONID`, `ACK`, `VERSION`, `BUILD`, `EMAIL`, `PAYERID`, `PAYERSTATUS`, `BUSINESS`, `FIRSTNAME`, `LASTNAME`, `COUNTRYCODE`, `SHIPTONAME`, `SHIPTOSTREET`, `SHIPTOCITY`, `SHIPTOSTATE`, `SHIPTOZIP`, `SHIPTOCOUNTRYCODE`, `SHIPTOCOUNTRYNAME`, `ADDRESSSTATUS`, `CURRENCYCODE`, `AMT`, `ITEMAMT`, `SHIPPINGAMT`, `HANDLINGAMT`, `TAXAMT`, `INSURANCEAMT`, `SHIPDISCAMT`, `L_NAME0`, `L_NUMBER0`, `L_QTY0`, `L_TAXAMT0`, `L_AMT0`, `L_DESC0`, `L_ITEMWEIGHTVALUE0`, `L_ITEMLENGTHVALUE0`, `L_ITEMWIDTHVALUE0`, `L_ITEMHEIGHTVALUE0`, `PAYMENTREQUEST_0_CURRENCYCODE`, `PAYMENTREQUEST_0_AMT`, `PAYMENTREQUEST_0_ITEMAMT`, `PAYMENTREQUEST_0_SHIPPINGAMT`, `PAYMENTREQUEST_0_HANDLINGAMT`, `PAYMENTREQUEST_0_TAXAMT`, `PAYMENTREQUEST_0_INSURANCEAMT`, `PAYMENTREQUEST_0_SHIPDISCAMT`, `PAYMENTREQUEST_0_TRANSACTIONID`, `PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED`, `PAYMENTREQUEST_0_SHIPTONAME`, `PAYMENTREQUEST_0_SHIPTOSTREET`, `PAYMENTREQUEST_0_SHIPTOCITY`, `PAYMENTREQUEST_0_SHIPTOSTATE`, `PAYMENTREQUEST_0_SHIPTOZIP`, `PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE`, `PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME`, `PAYMENTREQUEST_0_ADDRESSSTATUS`, `PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS`, `L_PAYMENTREQUEST_0_NAME0`, `L_PAYMENTREQUEST_0_NUMBER0`, `L_PAYMENTREQUEST_0_QTY0`, `L_PAYMENTREQUEST_0_TAXAMT0`, `L_PAYMENTREQUEST_0_AMT0`, `L_PAYMENTREQUEST_0_DESC0`, `L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0`, `L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0`, `L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0`, `L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0`, `PAYMENTREQUESTINFO_0_ERRORCODE`) VALUES
(1, '', 'EC-31S820357U9996645', '0', 'PaymentActionCompleted', '2014-07-15T05:59:33Z', 'ce3edb7addae5', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', 'EC-7SN622306T377853F', '0', 'PaymentActionCompleted', '2014-07-15T06:37:54Z', '56c222366f645', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', '', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20St', '1%20Main%20St', 'San%20Jose', 'CA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', 'EC-7PE457601V353692S', '0', 'PaymentActionCompleted', '2014-07-15T06:41:54Z', 'c8811c1fa8852', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', 'EC-31591589LW1522316', '0', 'PaymentActionCompleted', '2014-07-15T06:54:11Z', '79d2b634c57b5', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', 'EC-7S229792J1886123K', '0', 'PaymentActionCompleted', '2014-07-15T07:02:49Z', '9ea7c486c8834', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '152', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', 'EC-4M661782K8817010J', '0', 'PaymentActionCompleted', '2014-07-15T07:25:08Z', '85679f9f7e549', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '154', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', 'EC-7W415651T79967916', '0', 'PaymentActionCompleted', '2014-07-15T07:35:28Z', 'ad5d77ea142e', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '156', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '71P562501C749853L', 'false', 'Dinkar%20Patel%27s%20Test%20St', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '45L29276E30717937', 'EC-38P13866SM3666533', '0', 'PaymentActionCompleted', '2014-07-15T08:19:31Z', '8621548516934', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '157', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '45L29276E30717937', 'false', 'Dinkar%20Patel%27s%20Test%20St', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '157 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(9, '8A96551403788720J', 'EC-2LH539423U315603F', '0', 'PaymentActionCompleted', '2014-07-15T08:32:08Z', 'ba51ae7920000', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '158', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '8A96551403788720J', 'false', 'Dinkar%20Patel%27s%20Test%20St', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '158 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(10, '7SL228939Y8820935', 'EC-8WL04058609848443', '0', 'PaymentActionCompleted', '2014-07-15T08:39:49Z', 'a1b93d7fbfc3b', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '159', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '7SL228939Y8820935', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '159 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(11, '30A51058E8113483D', 'EC-1X1971873N196221J', '0', 'PaymentActionCompleted', '2014-07-15T09:10:59Z', '50a26930511eb', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '160', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '30A51058E8113483D', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '160 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(12, '30A51058E8113483D', 'EC-1X1971873N196221J', '0', 'PaymentActionCompleted', '2014-07-15T09:27:48Z', '321037c7346a4', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '160', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '30A51058E8113483D', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '160 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(13, '3KM10936KV942274G', 'EC-48L793515P681513D', '0', 'PaymentActionCompleted', '2014-07-15T09:29:59Z', '3dc97e036e49f', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '161', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '3KM10936KV942274G', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '161 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(14, '8JJ5937766922141T', 'EC-3YJ56785FX666752P', '0', 'PaymentActionCompleted', '2014-07-15T09:32:52Z', 'e2e33a553c4b4', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '162', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '8JJ5937766922141T', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '162 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(15, '8JJ5937766922141T', 'EC-3YJ56785FX666752P', '0', 'PaymentActionCompleted', '2014-07-15T09:43:44Z', 'bd9d207c9089a', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '162', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '8JJ5937766922141T', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '162 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(16, '8JJ5937766922141T', 'EC-3YJ56785FX666752P', '0', 'PaymentActionCompleted', '2014-07-15T09:45:26Z', '1c9c86a263687', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '162', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '8JJ5937766922141T', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '162 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(17, '8JJ5937766922141T', 'EC-3YJ56785FX666752P', '0', 'PaymentActionCompleted', '2014-07-15T09:46:59Z', 'ce2bca4d20950', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '162', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '8JJ5937766922141T', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '162 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(18, '23L520221R868380X', 'EC-7CV97862S8307743M', '0', 'PaymentActionCompleted', '2014-07-15T09:51:42Z', '7d6892bb101ee', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '163', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '23L520221R868380X', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '163 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(19, '42F0172012180462E', 'EC-65129764PK688350T', '0', 'PaymentActionCompleted', '2014-07-15T09:54:09Z', 'b5477f947de72', 'Success', '109.0', '11843215', 'ashita@micropixel.co.in', 'UHXFFJYW6WRBY', 'verified', '', 'Ashita', 'Bhatt', 'US', 'Ashita%20Bhatt', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Gatekeeper%20Pro', '164', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '19.99', '19.99', '0.00', '0.00', '0.00', '0.00', '0.00', '42F0172012180462E', 'false', 'Ashita%20Bhatt', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Gatekeeper Pro', '164 ', '1', '0.00', '19.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(20, '69C471980G4939847', 'EC-95M1115609829902A', '0', 'PaymentActionCompleted', '2014-07-15T11:15:17Z', 'e5634be950ad', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '109.99', '109.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Logikey', '168', '1', '0.00', '109.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '109.99', '109.99', '0.00', '0.00', '0.00', '0.00', '0.00', '69C471980G4939847', 'false', 'Dinkar%20Patel%27s%20Test%20St', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Logikey', '168 ', '1', '0.00', '109.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0'),
(21, '69C471980G4939847', 'EC-95M1115609829902A', '0', 'PaymentActionCompleted', '2014-07-15T11:15:50Z', 'cfaff62811eb0', 'Success', '109.0', '11843215', 'dn@micropixel.co.in', 'P2YXXTTWTT88Q', 'unverified', 'Dinkar%20Patel%27s%20Test%20Store', 'Dinkar', 'Patel', 'US', 'Dinkar%20Patel%27s%20Test%20Store', '1%20Main%20St', 'San%20Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'USD', '109.99', '109.99', '0.00', '0.00', '0.00', '0.00', '0.00', 'Logikey', '168', '1', '0.00', '109.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', 'USD', '109.99', '109.99', '0.00', '0.00', '0.00', '0.00', '0.00', '69C471980G4939847', 'false', 'Dinkar%20Patel%27s%20Test%20St', '1 Main St', 'San Jose', 'CA', '95131', 'US', 'United States', 'Confirmed', 'None', 'Logikey', '168 ', '1', '0.00', '109.99', '0', '   0.00000', '   0.00000', '   0.00000', '   0.00000', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
