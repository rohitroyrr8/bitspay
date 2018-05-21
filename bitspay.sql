-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 21, 2018 at 02:56 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitspay`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit_request`
--

CREATE TABLE IF NOT EXISTS `deposit_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `reference_no` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deposit_request`
--

INSERT INTO `deposit_request` (`id`, `amount`, `email`, `date`, `reference_no`) VALUES
(1, '100', 'mail2fxglobal@gmail.com', '2018-04-18', '1234'),
(2, '34', 'mail2fxglobal@gmail.com', '2018-03-31', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_status`
--

CREATE TABLE IF NOT EXISTS `kyc_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `id_type` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `img_id` varchar(50) NOT NULL,
  `img_photo` varchar(50) NOT NULL,
  `img_bank` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Processing',
  `date_applied` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kyc_status`
--

INSERT INTO `kyc_status` (`id`, `email`, `id_no`, `id_type`, `sex`, `city`, `zipcode`, `img_id`, `img_photo`, `img_bank`, `bank_name`, `bank_branch`, `ifsc`, `account_no`, `account_name`, `account_type`, `status`, `date_applied`, `date_updated`) VALUES
(7, 'rohitroyrr8@gmail.com', '1234', 'Passport', 'Male', 'Gurgaon', '12201 ', 'id_card.jpg', ' photo.jpg', 'bank_statement.jpg', 'SBI', 'Sec 10', 'SBIN0006610', '1234', 'Rohit', 'Savings', 'Processing', '2018-04-24', '2018-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `listed_coins`
--

CREATE TABLE IF NOT EXISTS `listed_coins` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `explorer` varchar(50) NOT NULL,
  `source_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `symbol` (`symbol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listed_coins`
--

INSERT INTO `listed_coins` (`id`, `name`, `symbol`, `image`, `website`, `explorer`, `source_code`) VALUES
(1, 'Bitcoin', 'BTC', 'bitcoin.png', 'https://bitcoin.org/en/', 'https://blockchain.info/', 'https://github.com/bitcoin/'),
(2, 'Ethereum', 'ETH', 'ethereum.png', 'https://www.ethereum.org/', 'https://etherscan.io/', 'https://github.com/ethereum'),
(3, 'Ripple', 'XRP', 'ripple.png', 'https://ripple.com/', 'https://xrpcharts.ripple.com/#/graph/', 'https://github.com/ripple'),
(4, 'Bitcoin Cash', 'BCH', 'bitcoin_cash.png', 'https://www.bitcoincash.org/', 'https://blockchair.com/bitcoin-cash/blocks', 'https://github.com/bitcoincashorg/'),
(5, 'Litecoin', 'LTC', 'litecoin.png', 'https://litecoin.com/', 'http://explorer.litecoin.net/chain/Litecoin', 'https://github.com/litecoin-project/litecoin'),
(6, 'EOS', 'EOS', 'eos.png', 'https://eos.io/', 'https://etherscan.io/token/EOS', 'https://github.com/eosio'),
(7, 'Cardano', 'ADA', 'ada.png', 'https://www.cardano.org/en/home/', 'https://cardanoexplorer.com/', 'https://github.com/input-output-hk/cardano-sl/'),
(8, 'Stellat', 'XLM', 'xlm.png', 'https://www.stellar.org/', 'https://dashboard.stellar.org/', 'https://github.com/stellar'),
(10, 'Monero', 'XMR', 'monero.png', 'https://getmonero.org/', 'https://moneroblocks.info/', 'https://github.com/monero-project/monero'),
(11, 'IOTA', 'IOT', 'ota.png', 'https://iota.org/', 'https://thetangle.org/', 'https://github.com/iotaledger'),
(12, 'Dash', 'DASH', 'dashcoin.png', 'https://www.dash.org/', 'https://insight.dash.org/insight/', 'https://github.com/dashpay/dash');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `os` varchar(33) NOT NULL,
  `location` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `email`, `source`, `ip`, `os`, `location`, `action`, `date`) VALUES
(22, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.176.222.27', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-01 15:57:20'),
(23, 'mail2fxglobal@gmail.com', 'Firefox', '122.176.222.27', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-01 15:58:08'),
(24, 'mail2fxglobal@gmail.com', 'Firefox', '122.176.222.27', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-01 16:00:57'),
(25, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.176.222.27', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-01 17:09:05'),
(26, 'mail2fxglobal@gmail.com', 'Google Chrome', '171.50.189.28', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-02 14:12:03'),
(27, 'mail2fxglobal@gmail.com', 'Google Chrome', '171.50.189.28', 'Linux', 'New Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-02 14:57:16'),
(28, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.176.238.248', 'Linux', 'Gurgaon, Haryana, India', 'Login', '2018-05-08 16:36:53'),
(29, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.176.238.248', 'Linux', 'Gurgaon, Haryana, India', 'Login', '2018-05-08 18:33:20'),
(30, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-09 12:50:10'),
(31, 'support@fxcoin.uk', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Registration', '2018-05-09 14:47:53'),
(32, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-09 15:02:59'),
(33, 'support@fxcoin.uk', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-09 16:25:02'),
(34, 'mail2fxglobal@gmail.com', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-09 16:25:17'),
(35, 'support@fxcoin.uk', 'Google Chrome', '122.162.28.33', 'Linux', 'Delhi, National Capital Territory of Delhi, India', 'Login', '2018-05-09 17:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `notfication`
--

CREATE TABLE IF NOT EXISTS `notfication` (
  `id` int(10) NOT NULL,
  `email` int(50) NOT NULL,
  `heading` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_book`
--

CREATE TABLE IF NOT EXISTS `order_book` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `coin` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `volume` varchar(30) NOT NULL,
  `price_per_unit` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `fee` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `trade_id` varchar(20) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2095211211 ;

--
-- Dumping data for table `order_book`
--

INSERT INTO `order_book` (`order_id`, `email`, `date`, `coin`, `type`, `volume`, `price_per_unit`, `price`, `fee`, `total`, `trade_id`) VALUES
(1430166874, 'mail2fxglobal@gmail.com', '2018-05-09 17:37:25', 'ETH', 'BUY', '1', '731', '731', '1.83', '732.83', '1434007161'),
(72, 'support@fxcoin.uk', '2018-05-09 15:01:53', 'ETH', 'SELL', '1', '731', '731', '1.83', '729.17', '1434007161');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE IF NOT EXISTS `tbl_sample` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `name`, `phone`) VALUES
(143, 'roy', '233443'),
(323, 'rohit', '3534'),
(3334, '423', '32'),
(4853, 'sam', '3433'),
(954, 'qwerrt', '23453'),
(3313, 'krishana', '3424'),
(8173, '434', '4343'),
(6001, '31223', '32');

-- --------------------------------------------------------

--
-- Table structure for table `trade_history`
--

CREATE TABLE IF NOT EXISTS `trade_history` (
  `trade_id` int(233) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `coin` varchar(34) NOT NULL,
  `volume` varchar(33) NOT NULL,
  `price_per_unit` varchar(43) NOT NULL,
  PRIMARY KEY (`trade_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2079463652 ;

--
-- Dumping data for table `trade_history`
--

INSERT INTO `trade_history` (`trade_id`, `date`, `coin`, `volume`, `price_per_unit`) VALUES
(1434007161, '2018-05-09 17:37:25', 'ETH', '1', '731');

-- --------------------------------------------------------

--
-- Table structure for table `usd_withdrawal`
--

CREATE TABLE IF NOT EXISTS `usd_withdrawal` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usd_withdrawal`
--

INSERT INTO `usd_withdrawal` (`id`, `email`, `amount`, `remark`, `date`, `status`) VALUES
(1, 'mail2fxglobal@gmail.com', '3', '12233', '2018-04-24', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(20) NOT NULL,
  `forget_identity` varchar(50) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `country` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `google_auth_code` varchar(40) DEFAULT NULL,
  `block_unblock` varchar(20) DEFAULT NULL,
  `date_registered` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `SPONSER_ID` varchar(10) NOT NULL,
  `KYC_Status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='5';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `forget_identity`, `name`, `email`, `phone`, `country`, `Password`, `google_auth_code`, `block_unblock`, `date_registered`, `date_of_birth`, `SPONSER_ID`, `KYC_Status`) VALUES
(782519, 'f0b0edfd10b2b8e79ae9c5510ef3ad24', 'Admin', 'admin', '91-787643559', 'India', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', NULL, '2018-04-07', '2018-04-20', '', 'Pending'),
(669494, NULL, 'FXGlobal', 'mail2fxglobal@gmail.com', '984500202', 'India', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', NULL, NULL, '2018-04-19', '2018-04-09', '782519', 'Pending'),
(69055, NULL, 'Priyanka', 'support@fxcoin.uk', '86534565', 'India', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, '2018-05-09', '2018-03-14', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolilo`
--

CREATE TABLE IF NOT EXISTS `user_portfolilo` (
  `portfolio_id` int(50) NOT NULL,
  `usd_value` varchar(10) NOT NULL,
  `XRP_value` varchar(20) NOT NULL,
  `LTC_value` varchar(20) NOT NULL,
  `BCH_value` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `BTC_value` varchar(20) NOT NULL,
  `ETH_value` varchar(20) NOT NULL,
  PRIMARY KEY (`portfolio_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_portfolilo`
--

INSERT INTO `user_portfolilo` (`portfolio_id`, `usd_value`, `XRP_value`, `LTC_value`, `BCH_value`, `email`, `BTC_value`, `ETH_value`) VALUES
(669494, '267.17', '21.2', '2.1', '2.1', 'mail2fxglobal@gmail.com', '1', '1'),
(69055, '731', '0.00', '0.000', '0.0000', 'support@fxcoin.uk', '0.0000', '6.5'),
(782519, '3.66', '0.0', '0.0', '0.0', 'admin', '0.0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE IF NOT EXISTS `withdrawal` (
  `txn_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `coin_type` varchar(20) NOT NULL,
  `type` varchar(21) NOT NULL,
  `date` date NOT NULL,
  `destin_addr` varchar(100) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `fee` varchar(20) NOT NULL,
  `recivable` varchar(20) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`txn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`txn_id`, `email`, `coin_type`, `type`, `date`, `destin_addr`, `volume`, `fee`, `recivable`, `reference`, `status`) VALUES
(15, 'mail2fxglobal@gmail.com', 'Bitcoin', 'Deposit', '2018-04-19', '0xb122673e939d27feccb8456bdb7613747e284ee7', '0.0006', '0.0005', '0.0001', '', 'Processing'),
(16, 'mail2fxglobal@gmail.com', 'Ethereum', 'Withdrawal', '2018-04-19', '0xb122673e939d27feccb8456bdb7613747e284ee7', '0.005', '0.003', '0.002', '', 'Processing'),
(20, 'mail2fxglobal@gmail.com', 'USD', 'Deposit', '2018-04-24', '', '4', '0', '4', '0xdfedbacb2762c820c9f93b78e41d25e7ad8783daf1dfab38d7db35d445fda245', 'Done');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
