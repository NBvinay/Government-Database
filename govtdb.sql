-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2018 at 03:46 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `govtdb`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `IncTax`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `IncTax` (IN `adh` BIGINT(20), IN `sal` INT(10))  BEGIN
DECLARE ictax int(10);
IF(sal<=30000) THEN
	SET ictax = 0.05*sal;
ELSEIF(sal>30000 && sal <=60000) THEN
	SET ictax = 0.07*sal;
ELSEIF(sal>60000 && sal<100000) THEN
	SET ictax = 0.10*sal;
ELSE
	SET ictax = 0.20*sal;
END IF;

UPDATE `employment details` SET `IncomeTax`=ictax WHERE `Aadhar Number`=adh;
END$$

DROP PROCEDURE IF EXISTS `PropTax`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PropTax` (IN `adh` BIGINT(20), IN `kth` INT(10), IN `amt` BIGINT(10), IN `val` INT(10))  BEGIN
DECLARE ptax int(10);
SET ptax = (val/100)*amt;
UPDATE `property_details` SET `PropertyTax`=ptax where `Katha`=kth AND `Aadhar Number`=adh;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employment details`
--

DROP TABLE IF EXISTS `employment details`;
CREATE TABLE IF NOT EXISTS `employment details` (
  `Aadhar Number` bigint(20) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `Company Name` varchar(100) NOT NULL,
  `Job` varchar(100) NOT NULL,
  `Salary` int(10) NOT NULL,
  `Date_of_joining` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Date of resignation/retirement` date NOT NULL,
  `IncomeTax` bigint(10) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `Aadhar Number` (`Aadhar Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment details`
--

INSERT INTO `employment details` (`Aadhar Number`, `employee_id`, `Company Name`, `Job`, `Salary`, `Date_of_joining`, `Status`, `Date of resignation/retirement`, `IncomeTax`) VALUES
(123, '123', 'google', 'devloper', 12000, '2012-12-12', 'working', '2030-12-12', 600);

--
-- Triggers `employment details`
--
DROP TRIGGER IF EXISTS `delEmpTrig`;
DELIMITER $$
CREATE TRIGGER `delEmpTrig` BEFORE DELETE ON `employment details` FOR EACH ROW INSERT INTO emprecord VALUES(OLD.`employee_id`, 'deleted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insEmpTrig`;
DELIMITER $$
CREATE TRIGGER `insEmpTrig` AFTER INSERT ON `employment details` FOR EACH ROW INSERT INTO emprecord VALUES(NEW.`employee_id`, 'inserted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `updEmpTrig`;
DELIMITER $$
CREATE TRIGGER `updEmpTrig` AFTER UPDATE ON `employment details` FOR EACH ROW INSERT INTO emprecord VALUES(OLD.`employee_id`, 'updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emprecord`
--

DROP TABLE IF EXISTS `emprecord`;
CREATE TABLE IF NOT EXISTS `emprecord` (
  `employee_id` bigint(20) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprecord`
--

INSERT INTO `emprecord` (`employee_id`, `Operation`, `Time`) VALUES
(123, 'updated', '2018-11-19 16:02:17'),
(3322, 'updated', '2018-11-19 16:02:17'),
(123, 'deleted', '2018-11-19 16:02:48'),
(3322, 'deleted', '2018-11-19 16:02:48'),
(123, 'inserted', '2018-11-19 16:03:10'),
(123, 'updated', '2018-11-19 16:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE IF NOT EXISTS `personal_info` (
  `Aadhar Number` bigint(200) NOT NULL,
  `Password` varchar(2000) NOT NULL,
  `Full Name` text NOT NULL,
  `Father Name` text NOT NULL,
  `Mother Name` text NOT NULL,
  `DOB` date NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email-id` varchar(100) NOT NULL,
  `Present Address` varchar(1000) NOT NULL,
  `Qualifications` varchar(100) NOT NULL,
  PRIMARY KEY (`Aadhar Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`Aadhar Number`, `Password`, `Full Name`, `Father Name`, `Mother Name`, `DOB`, `Gender`, `Email-id`, `Present Address`, `Qualifications`) VALUES
(123, '5f4dcc3b5aa765d61d8327deb882cf99', 'VinayNB', 'Balakrishna', 'Savitha', '1998-04-01', 'm', 'Vinaynb63@gmail.com', '#16/1,kalyananagar 2nd main,nagarbhavi 1st stage,bangalore 560072', 'BE'),
(1111, '5f4dcc3b5aa765d61d8327deb882cf99', 'YaserAhmedN', 'yaser1', 'yaser2', '2018-10-18', 'M', 'Yaser@yaser.com', 'MG road', 'Topper'),
(2222, '5f4dcc3b5aa765d61d8327deb882cf99', 'GaganSkumar', 'gagan1', 'gagan2', '1998-12-23', 'M', 'Gagan@gagan.com', 'flat,uttralli,bangalore', 'BE'),
(3333, '5f4dcc3b5aa765d61d8327deb882cf99', 'Vigansha', 'viggi1', 'viggi2', '1998-04-01', 'm', 'Viggi@gmail.com', 'home,sunkudkatte,bangalore', 'BE'),
(4444, '5f4dcc3b5aa765d61d8327deb882cf99', 'Suhith', 'suhith1', 'suhith2', '1998-09-26', 'm', 'Suhith@gmail.com', 'karishma hills,uthralli,balgalore', 'BE'),
(123456987, '25f9e794323b453885f5181f1b624d0b', 'Shubham', 'ShubhamSenior', 'Shubhamsupersenior', '2018-08-20', 'o', 'Gyucvc@hotmail.com', 'hostel', 'mbbs'),
(111222333444, '827ccb0eea8a706c4c34a16891f84e7b', 'Srivatsan', 'vatsansenior', 'vatsansupersenior', '2018-10-20', 'm', 'Ajsdbjasbd@gmail.com', 'jharkand', 'mbbs');

--
-- Triggers `personal_info`
--
DROP TRIGGER IF EXISTS `persTrig`;
DELIMITER $$
CREATE TRIGGER `persTrig` AFTER INSERT ON `personal_info` FOR EACH ROW BEGIN
INSERT INTO record VALUES(NEW.`Aadhar Number`, 'Created', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

DROP TABLE IF EXISTS `property_details`;
CREATE TABLE IF NOT EXISTS `property_details` (
  `Aadhar Number` bigint(200) NOT NULL,
  `ppt_regNo` varchar(100) NOT NULL,
  `Katha` varchar(100) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Postal Address` varchar(100) NOT NULL,
  `Amount` bigint(50) NOT NULL,
  `PropertyTax` bigint(50) NOT NULL,
  PRIMARY KEY (`Katha`),
  KEY `Aadhar Number` (`Aadhar Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`Aadhar Number`, `ppt_regNo`, `Katha`, `Area`, `Postal Address`, `Amount`, `PropertyTax`) VALUES
(123, 'r1234', '2233', 'nagarbhavi', '16/1,kalyanagar,nagarchabi,bangalrore', 98000, 14700),
(123, 'radfg', '24123124', 'nagarbhavi', 'home', 12343, 1851);

--
-- Triggers `property_details`
--
DROP TRIGGER IF EXISTS `delPropTrig`;
DELIMITER $$
CREATE TRIGGER `delPropTrig` BEFORE DELETE ON `property_details` FOR EACH ROW INSERT into proprecord VALUES (OLD.`Katha`, 'deleted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insPropTrig`;
DELIMITER $$
CREATE TRIGGER `insPropTrig` AFTER INSERT ON `property_details` FOR EACH ROW INSERT INTO proprecord VALUES(NEW.`katha`, 'inserted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `updPropTrig`;
DELIMITER $$
CREATE TRIGGER `updPropTrig` AFTER UPDATE ON `property_details` FOR EACH ROW INSERT INTO proprecord VALUES(OLD.`katha`,'updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `proprecord`
--

DROP TABLE IF EXISTS `proprecord`;
CREATE TABLE IF NOT EXISTS `proprecord` (
  `katha` bigint(20) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprecord`
--

INSERT INTO `proprecord` (`katha`, `Operation`, `Time`) VALUES
(444, 'inserted', '2018-11-19 14:48:24'),
(444, 'updated', '2018-11-19 14:48:24'),
(444, 'deleted', '2018-11-19 15:56:48'),
(523451, 'deleted', '2018-11-19 15:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `Aadhar Number` bigint(20) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`Aadhar Number`, `Operation`, `Time`) VALUES
(2222, 'Created', '2018-11-18 14:08:53'),
(3333, 'Created', '2018-11-18 14:12:16'),
(4444, 'Created', '2018-11-18 14:16:59'),
(123, 'inserted', '2018-11-18 14:22:25'),
(123, 'inserted', '2018-11-18 14:23:51'),
(12313, 'inserted', '2018-11-19 14:46:13'),
(221133, 'inserted', '2018-11-19 16:33:40'),
(123321, 'inserted', '2018-11-19 16:34:02'),
(123, 'inserted', '2018-11-19 16:34:37'),
(3232, 'inserted', '2018-11-19 16:35:18'),
(111222333444, 'Created', '2018-11-20 14:53:31'),
(123456987, 'Created', '2018-11-20 14:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `tax_ref`
--

DROP TABLE IF EXISTS `tax_ref`;
CREATE TABLE IF NOT EXISTS `tax_ref` (
  `Area` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Value%` int(10) NOT NULL,
  PRIMARY KEY (`Area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_ref`
--

INSERT INTO `tax_ref` (`Area`, `City`, `Value%`) VALUES
('indiranagar', 'bangalore', 10),
('kanakpura', 'bangalore', 12),
('mg road', 'banglore', 15),
('mylasandra', 'Bangalore', 10),
('nagarbhavi', 'Bangalore', 15);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

DROP TABLE IF EXISTS `vehicle_details`;
CREATE TABLE IF NOT EXISTS `vehicle_details` (
  `Aadhar Number` bigint(20) NOT NULL,
  `WheelNumber` int(1) NOT NULL,
  `Registration Number` varchar(100) NOT NULL,
  `DL Number` text NOT NULL,
  `Insurance Number` text NOT NULL,
  PRIMARY KEY (`Registration Number`),
  KEY `Aadhar Number` (`Aadhar Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`Aadhar Number`, `WheelNumber`, `Registration Number`, `DL Number`, `Insurance Number`) VALUES
(123, 123, '123', 'asd', '2222'),
(123, 2, '123321', 'asd123', '121212'),
(123, 2, '221133', 'dl2017123', '1122'),
(1111, 3, '3232', '123312', '3232');

--
-- Triggers `vehicle_details`
--
DROP TRIGGER IF EXISTS `delVehTrig`;
DELIMITER $$
CREATE TRIGGER `delVehTrig` BEFORE DELETE ON `vehicle_details` FOR EACH ROW INSERT INTO vehrecord VALUES(OLD.`Registration Number`, 'deleted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insVehTrig`;
DELIMITER $$
CREATE TRIGGER `insVehTrig` AFTER INSERT ON `vehicle_details` FOR EACH ROW INSERT INTO record VALUES(NEW.`Registration Number`, 'inserted', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `updVehTrig`;
DELIMITER $$
CREATE TRIGGER `updVehTrig` AFTER UPDATE ON `vehicle_details` FOR EACH ROW INSERT INTO vehrecord VALUES(OLD.`Registration Number`, 'updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vehrecord`
--

DROP TABLE IF EXISTS `vehrecord`;
CREATE TABLE IF NOT EXISTS `vehrecord` (
  `Aadhar Number` bigint(20) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehrecord`
--

INSERT INTO `vehrecord` (`Aadhar Number`, `Operation`, `Time`) VALUES
(123, 'updated', '2018-11-19 16:37:09'),
(3232, 'updated', '2018-11-19 16:37:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employment details`
--
ALTER TABLE `employment details`
  ADD CONSTRAINT `employment details_ibfk_1` FOREIGN KEY (`Aadhar Number`) REFERENCES `personal_info` (`Aadhar Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_details`
--
ALTER TABLE `property_details`
  ADD CONSTRAINT `property_details_ibfk_1` FOREIGN KEY (`Aadhar Number`) REFERENCES `personal_info` (`Aadhar Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD CONSTRAINT `vehicle_details_ibfk_1` FOREIGN KEY (`Aadhar Number`) REFERENCES `personal_info` (`Aadhar Number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
