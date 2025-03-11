-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterbudget`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Name`, `Email`, `country`, `Password`) VALUES
('Test Developer', 'test@gmail.com', 'INDIA', '123456789'),
('Vedant Gohil', 'vedant07@gmail.com', 'RUSSIAN FEDERATION', '24132413');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bankName` varchar(20) NOT NULL,
  `accountNo` varchar(11) NOT NULL,
  `ifscCode` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `PhoneNo` char(10) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bankName`, `accountNo`, `ifscCode`, `email`, `PhoneNo`, `branch`, `Pincode`, `date`) VALUES
('State Bank of India', '12345678901', 'SBIN0060337', 'test@gmail.com', '9537413107', 'Bhavnagar', 364002, '2024-12-31'),
('Russia State Bank', '24132413007', 'RSBIN006033', 'vedant07@gmail.com', '9106061161', 'Russia', 787787, '2025-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `cetegory`
--

CREATE TABLE `cetegory` (
  `cetegory_ID` int(11) NOT NULL,
  `accountNo` varchar(11) NOT NULL,
  `cetegory_name` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cetegory`
--

INSERT INTO `cetegory` (`cetegory_ID`, `accountNo`, `cetegory_name`, `type`, `date`) VALUES
(101, '12345678901', 'House Rent', 'Income', '2025-01-20 23:05:30'),
(102, '12345678901', 'Salary', 'Income', '2025-01-26 18:27:16'),
(103, '12345678901', 'Bonuse', 'Income', '2025-01-26 18:28:21'),
(105, '12345678901', 'Food', 'Expense', '2025-01-26 18:29:54'),
(106, '12345678901', 'Travel', 'Expense', '2025-01-26 18:30:31'),
(107, '12345678901', 'Bills', 'Expence', '2025-01-26 19:25:14'),
(108, '12345678901', 'Other', 'Expence', '2025-01-26 20:52:17'),
(109, '12345678901', 'Fees', 'Expence', '2025-01-26 21:31:12'),
(110, '12345678901', 'Sell', 'Income', '2025-01-30 16:48:09'),
(111, '12345678901', 'Buy', 'Expence', '2025-01-30 16:48:40'),
(113, '24132413007', 'Assets', 'Income', '2025-01-31 20:23:12'),
(114, '24132413007', 'liability ', 'Expence', '2025-01-31 20:26:21'),
(115, '24132413007', 'Donation ', 'Expence', '2025-01-31 20:34:51'),
(116, '24132413007', 'Subscription', 'Expense', '2025-01-31 06:29:04'),
(117, '12345678901', 'Subscription', 'Expense', '2025-01-31 06:29:48'),
(119, '12345678901', 'Stocks', 'Income', '2025-02-07 07:58:08'),
(120, '12345678901', 'House', 'Expense', '2025-02-07 08:05:29'),
(121, '12345678901', 'Vehicle', 'Expense', '2025-02-07 08:07:42'),
(122, '12345678901', 'Clothes', 'Expense', '2025-02-07 08:16:48'),
(123, '12345678901', 'medicine ', 'Expense', '2025-02-09 06:48:48'),
(124, '12345678901', 'school fees', 'Expense', '2025-02-09 06:56:04'),
(125, '12345678901', 'Fashion', 'Expense', '2025-02-14 04:08:20'),
(126, '7285092142', 'stock market ', 'Income', '2025-02-28 06:16:20'),
(127, '24132413007', 'Salary', 'Income', '2025-03-10 05:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `country_id` int(3) NOT NULL,
  `country_name` varchar(20) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `crvalue` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`country_id`, `country_name`, `currency`, `symbol`, `crvalue`) VALUES
(18, 'AUSTRALIA', 'Australian Dollar', 'AUD', 1.6067),
(16, 'BANGLADESH', 'Taka', 'BDT', 121.59),
(20, 'BRAZIL', 'Brazilian real', 'BRL', 5.8619),
(14, 'CANADA', 'Canadian Dollar', 'CAD', 1.4437),
(15, 'CHINA', 'Yuan Renminbi', 'CNY', 7.2501),
(3, 'EUROPEAN UNION', 'EURO', 'EUR', 0.961),
(4, 'FRANCE', 'EURO', 'EUR', 0.906),
(5, 'GERMANY', 'EURO', 'EUR', 0.961),
(9, 'HONG KONG', 'Hong Kong Dollar', 'HKD', 7.7915),
(1, 'INDIA', 'INDIAN RUPEE', 'INR', 86.5511),
(17, 'ISRAEL', 'New Israeli Sheqel', 'ILS', 3.6),
(6, 'JAPAN', 'YEN', 'JPY', 155.212),
(7, 'MEXICO', 'Mexican Peso', 'MXN', 20.6406),
(8, 'NEW ZEALAND', 'New Zealand Dollar', 'NZD', 1.7709),
(10, 'PAKISTAN', 'Pakistan Rupee', 'PKR', 279.9279),
(11, 'RUSSIAN FEDERATION', 'Russian Ruble', 'RUB', 98.9788),
(12, 'SINGAPORE', 'Singapore Dollar', 'SGD', 1.3512),
(13, 'SOUTH AFRICA', 'Rand', 'ZAR', 18.6727),
(19, 'UNITED KINGDOM', 'Pound Sterling', 'GBP', 0.8046),
(2, 'UNITED STATES', 'UNITED STATES DOLLAR', 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `account` varchar(20) NOT NULL,
  `tran_id` double NOT NULL,
  `tranname` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `trandate` date NOT NULL,
  `amount` int(10) NOT NULL,
  `balance` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`account`, `tran_id`, `tranname`, `category`, `type`, `method`, `trandate`, `amount`, `balance`) VALUES
('12345678901', 1020250007, 'Fuel', 'Vehicle', 'Expense', 'UPI', '2025-01-26', 200, 200),
('12345678901', 1020250009, 'Travel', 'Travel', 'Expense', 'UPI', '2025-01-25', 1500, 1700),
('12345678901', 1020250010, 'Mobile Recharge', 'Bills', 'Expense', 'UPI', '2025-01-07', 799, 2499),
('12345678901', 1020250011, 'Gas bill', 'Bills', 'Expense', 'UPI', '2025-01-25', 810, 3309),
('12345678901', 1020250012, 'petroleum bill', 'Bills', 'Expense', 'UPI', '2025-01-26', 900, 4209),
('12345678901', 1020250013, 'panipuri ', 'Food', 'Expense', 'Cash', '2025-01-25', 60, 4269),
('12345678901', 1020250017, 'bike repair', 'Vehicle', 'Expense', 'Cash', '2025-01-26', 300, 154569),
('12345678901', 1020250018, 'vadapav', 'Food', 'Expense', 'Cash', '2025-01-20', 60, 154629),
('12345678901', 1020250019, 'Grocery', 'House', 'Expense', 'Check', '2024-12-30', 2000, 174629),
('12345678901', 1020250020, 'College Fees', 'Fees', 'Expense', 'Check', '2024-12-23', 12000, 186629),
('12345678901', 1020250030, 'Fuel', 'Vehicle', 'Expense', 'UPI', '2025-02-06', 500, 19129),
('12345678901', 1020250031, 'Panipuri', 'Food', 'Expense', 'Cash', '2025-02-07', 150, 19279),
('12345678901', 1020250032, 'Grocery', 'House', 'Expense', 'Cash', '2025-02-03', 500, 19779),
('12345678901', 1020250033, 'Car Service', 'Vehicle', 'Expense', 'UPI', '2025-02-03', 15000, 34779),
('12345678901', 1020250034, 'Birthday Party', 'Food', 'Expense', 'Cash', '2025-02-05', 1500, 36279),
('12345678901', 1020250035, 'Clothes', 'Clothes', 'Expense', 'UPI', '2025-02-02', 1800, 38079),
('12345678901', 1020250036, 'bike tire', 'Vehicle', 'Expense', 'Cash', '2025-02-08', 1500, 39579),
('12345678901', 1020250037, 'hospital charges ', 'medicine', 'Expense', 'Cash', '2025-02-09', 50, 39629),
('12345678901', 1020250038, 'hostel fees ', 'Fees', 'Expense', 'Cash', '2025-02-01', 11000, 50629),
('12345678901', 1020250040, 'Grocery', 'House', 'Expense', 'Cash', '2024-12-05', 5000, 55629),
('12345678901', 1020250041, 'Grocery', 'House', 'Expense', 'Cash', '2025-01-06', 5000, 60629),
('12345678901', 1020250042, 'Clothes', 'Clothes', 'Expense', 'UPI', '2025-02-16', 3000, 63629),
('12345678901', 1020250043, 'Makeup Kit', 'Fashion', 'Expense', 'UPI', '2025-02-10', 600, 64229),
('12345678901', 1020250044, 'Car Service', 'Vehicle', 'Expense', 'Cash', '2024-12-20', 3000, 67229),
('24132413007', 1020250047, 'repair ', 'liability', 'Expense', 'Cash', '2025-02-26', 2000, 2000),
('24132413007', 1020250049, 'loss ', 'liability', 'Expense', 'Bank', '2025-02-27', 1200, 1400),
('24132413007', 1020250051, 'car', 'liability', 'Expense', 'Cash', '2025-02-28', 1000, 1000),
('12345678901', 1020250056, 'Recharge', 'Bills', 'Expense', 'UPI', '2025-03-02', 719, 67948),
('12345678901', 1020250058, 'Grocery', 'House', 'Expense', 'Cash', '2025-03-03', 7000, 74948),
('12345678901', 1020250059, 'Food', 'Food', 'Expense', 'UPI', '2025-03-05', 500, 75448),
('12345678901', 1020250060, 'Recharge', 'Bills', 'Expense', 'UPI', '2025-03-02', 799, 76247),
('12345678901', 1020250061, 'Light Bill', 'Bills', 'Expense', 'Cash', '2025-03-01', 3500, 79747),
('12345678901', 1020250062, 'Fuel', 'Vehicle', 'Expense', 'Cash', '2025-03-01', 500, 80247),
('12345678901', 1020250063, 'Fuel', 'Vehicle', 'Expense', 'UPI', '2025-03-01', 4000, 84247),
('12345678901', 1020250064, 'Car Service', 'Vehicle', 'Expense', 'Cash', '2025-03-02', 9000, 93247),
('12345678901', 1020250065, 'Grocery', 'House', 'Expense', 'Cash', '2025-03-07', 300, 93547);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `account` varchar(20) NOT NULL,
  `tran_id` double NOT NULL,
  `tranname` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `trandate` date NOT NULL,
  `amount` double NOT NULL,
  `balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`account`, `tran_id`, `tranname`, `category`, `type`, `method`, `trandate`, `amount`, `balance`) VALUES
('12345678901', 1020250001, 'Salary', 'Salary', 'Income', 'Bank', '2024-12-02', 40000, 40000),
('12345678901', 1020250003, 'Salary', 'Salary', 'Income', 'Bank', '2025-01-01', 50000, 50000),
('12345678901', 1020250005, 'Rent', 'House Rent', 'Income', 'UPI', '2025-01-06', 15000, 65000),
('12345678901', 1020250008, 'Rent', 'House Rent', 'Income', 'UPI', '2025-01-06', 15000, 80000),
('12345678901', 1020250014, 'scrape of oldpaper', 'Sell', 'Income', 'Cash', '2025-01-25', 5000, 85000),
('12345678901', 1020250028, 'Salary', 'Salary', 'Income', 'Bank', '2025-02-03', 35000, 260000),
('12345678901', 1020250029, 'Dividend', 'Stocks', 'Income', 'Bank', '2025-02-07', 5000, 125000),
('12345678901', 1020250039, 'Payment', 'Salary', 'Income', 'Bank', '2024-12-05', 5000, 130000),
('12345678901', 1020250045, 'Dividend', 'Stocks', 'Income', 'Bank', '2025-02-20', 5000, 135000),
('24132413007', 1020250046, 'building', 'Assets', 'Income', 'Cash', '2025-02-26', 1200, 1200),
('24132413007', 1020250048, 'rent', 'Assets', 'Income', 'Bank', '2025-02-26', 8000, 8000),
('24132413007', 1020250050, 'profit ', 'Assets', 'Income', 'Bank', '2025-02-26', 1000, 1000),
('24132413007', 1020250052, 'Manav', 'Assets', 'Income', 'Cash', '2025-02-27', 5000, 5000),
('12345678901', 1020250054, 'Salary', 'Salary', 'Income', 'Bank', '2025-03-02', 40000, 175000),
('12345678901', 1020250057, 'Rent', 'House Rent', 'Income', 'Cash', '2025-03-03', 5000, 180000),
('24132413007', 1020250066, 'Salary', 'Salary', 'Income', 'Bank', '2025-03-05', 15000, 30200);

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `ID` int(3) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`ID`, `Item`, `Text`) VALUES
(1, 'Fixed Deposits', 'A fixed deposit (FD) is a tenured deposit account provided by banks or non-bank financial institutions which provides investors a higher rate of interest than a regular savings account, until the given maturity date. It may or may not require the creation of a separate account. The term fixed deposit is most commonly used in India and the United States.'),
(2, 'Mutual Fund', 'A mutual fund is a company that pools money from many investors and invests the money in securities such as stocks, bonds, and short-term debt. The combined holdings of the mutual fund are known as its portfolio. Investors buy shares in mutual funds. Each share represents an investor\'s part ownership in the fund and the income it generates.'),
(3, 'Debt Funds', 'Debt funds invest in securities that generate fixed income, like treasury bills, corporate bonds, commercial papers, government securities, and many other money market instruments.All these instruments have a pre-decided maturity date and interest rate that the buyer can earn on maturity - hence the name fixed-income securities. The returns are usually not affected by fluctuations in the market. Therefore, debt securities are considered to be low-risk investment options.'),
(4, 'Post Office Time Deposit', 'The post-office term deposit (POTD) is similar to a bank fixed deposit, where you save money for a definite time period, earning a guaranteed return through the tenure of the deposit. At the end of the deposit\'s tenure, the maturity amount comprises the capital deposited and the interest it earns.'),
(5, 'SIP', 'A \"SIP\" (Systematic Investment Plan) means regularly investing a fixed amount of money into a mutual fund each month, essentially allowing you to buy more units when the market is low and fewer when it\'s high, effectively averaging out your purchase price and mitigating market volatility; for example, if you set up a ₹5,000 SIP in a mutual fund with a current NAV (Net Asset Value) of ₹50, you\'d buy 100 units this month, but if the NAV drops to ₹40 next month, you\'d buy 125 units with the same ₹5,000, lowering your overall average cost per unit.'),
(6, 'Public Provident Fund (PPF)', 'The Public Provident Fund (PPF) is the best investment option in India for the long-term. It offers tax-exempt contributions, interest, and withdrawals, ensuring tax efficiency.'),
(7, 'Gold', 'Gold has a long and rich cultural significance in India. It is often seen as a symbol of wealth, prosperity, and good luck, making gold and gold assets the best investment option for many Indians.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `account` varchar(20) NOT NULL,
  `tran_id` double NOT NULL,
  `tranname` varchar(20) NOT NULL,
  `cetegory` varchar(20) NOT NULL,
  `tran_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `memo` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`account`, `tran_id`, `tranname`, `cetegory`, `tran_date`, `type`, `method`, `amount`, `memo`, `date`) VALUES
('12345678901', 1020250001, 'Salary', 'Salary', '2024-12-02', 'Income', 'Bank', 40000, 'Salary', '2024-12-24 20:03:56'),
('12345678901', 1020250003, 'Salary', 'Salary', '2025-01-01', 'Income', 'Bank', 50000, 'Salary', '2025-02-03 06:33:18'),
('12345678901', 1020250005, 'Rent', 'House Rent', '2025-01-06', 'Income', 'UPI', 15000, 'Rent', '2025-02-03 06:33:18'),
('12345678901', 1020250007, 'Fuel', 'Vehicle', '2025-01-26', 'Expense', 'Cash', 200, 'Fuel', '2025-02-03 06:33:18'),
('12345678901', 1020250008, 'Rent', 'House Rent', '2025-01-06', 'Income', 'UPI', 15000, 'Rent', '2025-02-03 06:33:18'),
('12345678901', 1020250009, 'Travel', 'Travel', '2025-01-25', 'Expense', 'UPI', 1500, 'Travel', '2025-02-03 06:33:18'),
('12345678901', 1020250010, 'Mobile Recharge', 'Bills', '2025-01-07', 'Expense', 'UPI', 799, 'Mobile Recharge', '2025-02-03 06:33:18'),
('12345678901', 1020250011, 'Gas bill', 'Bills', '2025-01-25', 'Expense', 'UPI', 810, 'Gas bill', '2025-02-03 06:33:18'),
('12345678901', 1020250012, 'petroleum bill', 'Bills', '2025-01-26', 'Expense', 'UPI', 900, 'petroleum bill', '2025-02-03 06:33:18'),
('12345678901', 1020250013, 'panipuri ', 'Food', '2025-01-25', 'Expense', 'Cash', 60, 'panipuri ', '2025-02-03 06:33:18'),
('12345678901', 1020250014, 'scrape of oldpaper', 'Sell', '2025-01-25', 'Income', 'Cash', 5000, 'scrape of oldpaper', '2025-02-03 06:33:18'),
('12345678901', 1020250017, 'bike repair', 'Vehicle', '2025-01-26', 'Expense', 'Cash', 300, 'bike repair', '2025-02-03 06:33:18'),
('12345678901', 1020250018, 'vadapav', 'Food', '2025-01-20', 'Expense', 'Cash', 60, 'vadapav', '2025-02-03 06:33:18'),
('12345678901', 1020250019, 'Grocery', 'House', '2024-12-30', 'Expense', 'Check', 2000, 'Grocery', '2025-02-03 06:33:18'),
('12345678901', 1020250020, 'College Fees', 'Fees', '2024-12-23', 'Expense', 'Check', 12000, 'College Fees', '2025-02-03 06:33:18'),
('12345678901', 1020250028, 'Salary', 'Salary', '2025-02-03', 'Income', 'Bank', 35000, 'Salary', '2025-02-03 06:33:18'),
('12345678901', 1020250029, 'Dividend', 'Stocks', '2025-02-07', 'Income', 'Bank', 5000, 'Dividend of ABC company', '2025-02-07 07:58:50'),
('12345678901', 1020250030, 'Fuel', 'Vehicle', '2025-02-06', 'Expense', 'UPI', 500, 'Bike Fuel', '2025-02-07 08:02:50'),
('12345678901', 1020250031, 'Panipuri', 'Food', '2025-02-07', 'Expense', 'Cash', 150, 'Panipuri with friends', '2025-02-07 08:04:32'),
('12345678901', 1020250032, 'Grocery', 'House', '2025-02-03', 'Expense', 'Cash', 500, 'House Grocery', '2025-02-07 08:06:05'),
('12345678901', 1020250033, 'Car Service', 'Vehicle', '2025-02-03', 'Expense', 'UPI', 15000, 'Car Services ', '2025-02-07 08:08:19'),
('12345678901', 1020250034, 'Birthday Party', 'Food', '2025-02-05', 'Expense', 'Cash', 1500, 'Birthday party friends', '2025-02-07 08:14:00'),
('12345678901', 1020250035, 'Clothes', 'Clothes', '2025-02-02', 'Expense', 'UPI', 1800, 'New Clothes', '2025-02-07 08:17:50'),
('12345678901', 1020250036, 'bike tire', 'Vehicle', '2025-02-08', 'Expense', 'Cash', 1500, 'Bike tire change', '2025-02-09 03:47:35'),
('12345678901', 1020250037, 'hospital charges ', 'medicine', '2025-02-09', 'Expense', 'Cash', 50, 'hospital charges are paid.', '2025-02-09 06:51:08'),
('12345678901', 1020250038, 'hostel fees ', 'Fees', '2025-02-01', 'Expense', 'Cash', 11000, 'hostel paid to joshi bhai', '2025-02-09 06:58:37'),
('12345678901', 1020250039, 'Payment', 'Salary', '2024-12-05', 'Income', 'Bank', 5000, 'Payment of Work', '2025-02-14 03:02:30'),
('12345678901', 1020250040, 'Grocery', 'House', '2024-12-05', 'Expense', 'Cash', 5000, 'Grocery', '2025-02-14 03:05:14'),
('12345678901', 1020250041, 'Grocery', 'House', '2025-01-06', 'Expense', 'Cash', 5000, 'Grocery', '2025-02-14 03:05:49'),
('12345678901', 1020250042, 'Clothes', 'Clothes', '2025-02-16', 'Expense', 'UPI', 3000, 'Wedding Clothes', '2025-02-14 03:06:36'),
('12345678901', 1020250043, 'Makeup Kit', 'Fashion', '2025-02-10', 'Expense', 'UPI', 600, 'Fashion Product', '2025-02-14 04:09:14'),
('12345678901', 1020250044, 'Car Service', 'Vehicle', '2024-12-20', 'Expense', 'Cash', 3000, 'Car Services ', '2025-02-14 04:10:24'),
('12345678901', 1020250045, 'Dividend', 'Stocks', '2025-02-20', 'Income', 'Bank', 5000, 'Dividend of Shares', '2025-02-20 07:53:54'),
('24132413007', 1020250046, 'building', 'Assets', '2025-02-26', 'Income', 'Cash', 1200, 'buying a building', '2025-02-26 10:30:36'),
('24132413007', 1020250047, 'repair ', 'liability', '2025-02-26', 'Expense', 'Cash', 2000, 'repairing of building', '2025-02-26 10:32:23'),
('24132413007', 1020250048, 'rent', 'Assets', '2025-02-26', 'Income', 'Bank', 8000, 'monthly rent received of building ', '2025-02-26 10:34:52'),
('24132413007', 1020250049, 'loss ', 'liability', '2025-02-27', 'Expense', 'Bank', 1200, 'loss in other business', '2025-02-26 10:36:59'),
('24132413007', 1020250050, 'profit ', 'Assets', '2025-02-26', 'Income', 'Bank', 2000, 'jiic4c4i4ic4cm4c', '2025-02-26 10:38:31'),
('24132413007', 1020250051, 'car', 'liability', '2025-02-28', 'Expense', 'Cash', 10000, 'Buy a new buggati veron ', '2025-02-28 05:48:22'),
('24132413007', 1020250052, 'Manav', 'Assets', '2025-02-27', 'Income', 'Cash', 5000, 'hslvnvio;hvipebhso', '2025-02-28 05:51:37'),
('12345678901', 1020250054, 'Salary', 'Salary', '2025-03-02', 'Income', 'Bank', 40000, 'Salary', '2025-03-02 03:19:13'),
('12345678901', 1020250056, 'Recharge', 'Bills', '2025-03-02', 'Expense', 'UPI', 719, 'Hardik Mobile Recharge', '2025-03-02 03:22:48'),
('12345678901', 1020250057, 'Rent', 'House Rent', '2025-03-03', 'Income', 'Cash', 5000, 'House Rent', '2025-03-04 07:12:28'),
('12345678901', 1020250058, 'Grocery', 'House', '2025-03-03', 'Expense', 'Cash', 7000, 'House Groceries', '2025-03-04 07:13:45'),
('12345678901', 1020250059, 'Food', 'Food', '2025-03-05', 'Expense', 'UPI', 500, 'Food in Hotel', '2025-03-04 07:14:23'),
('12345678901', 1020250060, 'Recharge', 'Bills', '2025-03-02', 'Expense', 'UPI', 799, 'Mobile Recharge', '2025-03-04 07:15:09'),
('12345678901', 1020250061, 'Light Bill', 'Bills', '2025-03-01', 'Expense', 'Cash', 3500, 'House Light Bill', '2025-03-04 07:15:59'),
('12345678901', 1020250062, 'Fuel', 'Vehicle', '2025-03-01', 'Expense', 'Cash', 500, 'Bike Fuel', '2025-03-04 07:16:40'),
('12345678901', 1020250063, 'Fuel', 'Vehicle', '2025-03-01', 'Expense', 'UPI', 4000, 'Car Diesel', '2025-03-04 07:17:11'),
('12345678901', 1020250064, 'Car Service', 'Vehicle', '2025-03-02', 'Expense', 'Cash', 9000, 'Car Service ', '2025-03-04 07:17:50'),
('12345678901', 1020250065, 'Grocery', 'House', '2025-03-07', 'Expense', 'Cash', 300, 'Grocery', '2025-03-07 06:44:39'),
('24132413007', 1020250066, 'Salary', 'Salary', '2025-03-05', 'Income', 'Bank', 15000, 'Salary', '2025-03-10 05:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`accountNo`);

--
-- Indexes for table `cetegory`
--
ALTER TABLE `cetegory`
  ADD PRIMARY KEY (`cetegory_ID`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`country_name`),
  ADD UNIQUE KEY `country_id` (`country_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
