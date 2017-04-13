-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-14 00:07:47
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqua`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCollarData` ()  begin
		set @cc = (select times from times where times.id =1);
		if (@cc <10)
		then
		insert into `collardata-ani` select * from AnalogCollarData where AnalogCollarData.CollarDataID = @cc;
		else
		alter event insertCollarEvent on completion preserve disable;
		end if;
		end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSensorTogether` ()  begin

		insert into `sensordata-ani` select * from AnalogSensorData;

		end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `multiCheck` (INOUT `parID` INT, INOUT `parStat` INT)  begin
		set @hb = (select HeartBeat from `collardata-ani` where CollarDataID = parID);
		set @rs = (select Respire from `collardata-ani` where CollarDataID = parID);
        set @te = (select Temperature from `collardata-ani` where CollarDataID = parID);
		set @minhb = (select MinHeartbeat from `standard-ani`);
		set @maxhb = (select MaxHeartbeat from `standard-ani`);
		set @minrs = (select MinRespire from `standard-ani`);
		set @maxrs = (select MaxRespire from `standard-ani`);
        set @minte = (select MinTemp from `standard-ani`);
		set @maxte = (select MaxTemp from `standard-ani`);
		if(@hb<@minhb or @hb>@maxhb or @rs<@minrs or @rs>@maxrs or @te<@minte or @te>@maxte)then set parStat = 2;
        else set parStat = 1;
		 end if;
		end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Job` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`ID`, `Username`, `Password`, `Job`, `FirstName`, `LastName`) VALUES
(1, 'mng', 'mng', 'mng', 'Junxi', 'Fan'),
(2, 'mng2', 'mng2', 'mng', 'Alan', 'Walker'),
(3, 'tech', 'tech', 'tech', 'Taotao', 'Jing'),
(4, 'tech2', 'tech2', 'tech', 'Clerence', 'Lopez'),
(5, 'tech3', 'tech3', 'tech', 'Sean', 'Hill'),
(6, 'tech4', 'tech4', 'tech', 'Victor', 'Scoot'),
(7, 'analyst', 'analyst', 'analyst', 'Kaixin', 'Gao'),
(8, 'analyst2', 'analyst2', 'analyst', 'Tony', 'Faker'),
(9, 'analyst3', 'analyst3', 'analyst', 'Alan', 'Lopez'),
(10, 'vet', 'vet', 'vet', 'Zhixin', 'Wang'),
(11, 'vet2', 'vet2', 'vet', 'Sean', 'Hill');

-- --------------------------------------------------------

--
-- 表的结构 `analogcollardata`
--

CREATE TABLE `analogcollardata` (
  `CollarDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `HeartBeat` int(11) NOT NULL,
  `Respire` int(11) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Power` varchar(45) DEFAULT NULL,
  `Connection` varchar(45) DEFAULT NULL,
  `RecycleDate` date DEFAULT NULL,
  `CollarID` int(11) NOT NULL,
  `Temperature` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `analogcollardata`
--

INSERT INTO `analogcollardata` (`CollarDataID`, `RecordDate`, `HeartBeat`, `Respire`, `Location`, `Power`, `Connection`, `RecycleDate`, `CollarID`, `Temperature`) VALUES
(1, '2017-02-16', 90, 36, '31.03,103.19', '1', '1', '2017-01-17', 8, '37'),
(2, '2017-02-16', 96, 35, '31.03,103.19', '1', '1', '2017-01-18', 8, '36.9'),
(3, '2017-02-16', 89, 37, '31.03,103.19', '1', '1', '2017-01-19', 8, '37.5'),
(4, '2017-02-16', 170, 56, '31.03,103.19', '1', '1', '2017-01-20', 8, '39.6'),
(5, '2017-02-16', 169, 59, '31.03,103.19', '1', '1', '2017-01-21', 8, '40.5'),
(6, '2017-02-16', 185, 52, '31.03,103.19', '1', '1', '2017-01-22', 8, '38.4'),
(7, '2017-02-16', 170, 40, '31.03,103.19', '1', '1', '2017-01-23', 8, '38.1'),
(8, '2017-02-16', 168, 38, '31.03,103.19', '1', '1', '2017-01-24', 8, '36.1'),
(9, '2017-02-16', 150, 62, '31.03,103.19', '1', '1', '2017-01-25', 8, '36.1');

-- --------------------------------------------------------

--
-- 表的结构 `analogsensordata`
--

CREATE TABLE `analogsensordata` (
  `SensorDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `Bloodpressure` int(11) NOT NULL,
  `Power` int(11) DEFAULT NULL,
  `Connection` int(11) DEFAULT NULL,
  `SensorID` int(11) NOT NULL,
  `Bioelectricity` int(11) NOT NULL,
  `PH` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `analogsensordata`
--

INSERT INTO `analogsensordata` (`SensorDataID`, `RecordDate`, `Bloodpressure`, `Power`, `Connection`, `SensorID`, `Bioelectricity`, `PH`) VALUES
(1, '2017-02-16', 140, 1, 1, 4, 500, '7.12'),
(2, '2017-02-16', 120, 1, 1, 4, 400, '7.01'),
(3, '2017-02-16', 168, 1, 1, 4, 300, '7.01'),
(4, '2017-02-16', 170, 1, 1, 4, 500, '7.5'),
(5, '2017-02-16', 160, 1, 1, 4, 400, '6.5'),
(6, '2017-02-16', 130, 1, 1, 4, 350, '6.8');

-- --------------------------------------------------------

--
-- 表的结构 `analyst`
--

CREATE TABLE `analyst` (
  `AnalystID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `analyst`
--

INSERT INTO `analyst` (`AnalystID`, `FirstName`, `LastName`) VALUES
(7, 'Kaixin', 'Gao'),
(8, 'Tony', 'Faker'),
(9, 'Alan', 'Lopez');

-- --------------------------------------------------------

--
-- 表的结构 `animal`
--

CREATE TABLE `animal` (
  `AnimalID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `animal`
--

INSERT INTO `animal` (`AnimalID`, `TypeID`, `Status`, `Age`, `Name`) VALUES
(1, 1, 2, 2, 'Yuan'),
(2, 5, 0, 5, 'June'),
(3, 6, 0, 7, 'Tony'),
(4, 7, 0, 5, 'Stark'),
(5, 4, 0, 3, 'Bob'),
(6, 5, 3, 2, 'Alice'),
(7, 6, 0, 5, 'Oven'),
(8, 2, 0, 9, 'Hitler'),
(9, 3, 0, 4, 'Statling'),
(10, 1, 2, 2, 'Putting');

-- --------------------------------------------------------

--
-- 表的结构 `animal-ani`
--

CREATE TABLE `animal-ani` (
  `AnimalID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Age` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `animal-ani`
--

INSERT INTO `animal-ani` (`AnimalID`, `TypeID`, `Status`, `Age`, `Name`) VALUES
(10, 1, '5', '2', 'Putting');

-- --------------------------------------------------------

--
-- 表的结构 `collar`
--

CREATE TABLE `collar` (
  `CollarID` int(11) NOT NULL,
  `ActivateDate` date NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `ProductInfo` varchar(45) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `collar`
--

INSERT INTO `collar` (`CollarID`, `ActivateDate`, `AnimalID`, `ProductInfo`, `StaffID`) VALUES
(1, '2017-01-05', 8, 'A', 4),
(2, '2017-01-06', 7, 'C', 5),
(3, '2017-01-07', 9, 'B', 6),
(4, '2017-01-08', 6, 'C', 6),
(5, '2017-01-09', 2, 'B', 3),
(6, '2017-01-10', 3, 'C', 5),
(7, '2017-01-11', 1, 'A', 4),
(8, '2017-01-12', 10, 'B', 6),
(9, '2017-01-13', 4, 'C', 3),
(10, '2017-01-14', 5, 'A', 5),
(11, '2017-04-10', 1, '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `collar-ani`
--

CREATE TABLE `collar-ani` (
  `CollarID` int(11) NOT NULL,
  `ActivateDate` date NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `ProductInfo` varchar(45) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `collar-ani`
--

INSERT INTO `collar-ani` (`CollarID`, `ActivateDate`, `AnimalID`, `ProductInfo`, `StaffID`) VALUES
(8, '2017-01-12', 10, 'B', 6);

-- --------------------------------------------------------

--
-- 表的结构 `collardata`
--

CREATE TABLE `collardata` (
  `CollarDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `HeartBeat` int(11) NOT NULL,
  `Respire` int(11) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `CollarID` int(11) NOT NULL,
  `Temperature` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `collardata`
--

INSERT INTO `collardata` (`CollarDataID`, `RecordDate`, `HeartBeat`, `Respire`, `Location`, `CollarID`, `Temperature`) VALUES
(1, '2017-02-06', 90, 30, '31.03,103.19', 7, '36'),
(2, '2017-02-07', 90, 30, '58.18,-78.08', 5, '35.6'),
(3, '2017-02-08', 120, 35, '7.34,23.19', 6, '38'),
(4, '2017-02-09', 156, 25, '31.03,103.19', 9, '38.2'),
(5, '2017-02-10', 42, 28, '58.18,-78.08', 10, '37'),
(6, '2017-02-11', 98, 26, '7.34,23.19', 4, '36.5'),
(7, '2017-02-12', 150, 38, '31.03,103.19', 2, '38.2'),
(8, '2017-02-13', 29, 6, '58.18,-78.08', 1, '36'),
(9, '2017-02-14', 149, 59, '7.34,23.19', 3, '37'),
(10, '2017-02-15', 125, 37, '31.03,103.19', 8, '36.5'),
(11, '2017-02-16', 90, 30, '31.76,103.87', 7, '36.8'),
(12, '2017-02-17', 90, 30, '58.56,-78.76', 5, '36'),
(13, '2017-02-18', 120, 35, '7.56,23.56', 6, '37.9'),
(14, '2017-02-19', 156, 25, '31.76,103.43', 9, '38.1'),
(15, '2017-02-20', 42, 28, '58.14,-78.38', 10, '37.4'),
(16, '2017-02-21', 98, 26, '7.23,23.43', 4, '36.8'),
(17, '2017-02-22', 150, 38, '31.43,103.45', 2, '37.9'),
(18, '2017-02-23', 29, 6, '58.76,-78.23', 1, '36.5'),
(19, '2017-02-24', 149, 59, '7.34,23.13', 3, '37.4'),
(20, '2017-02-25', 125, 37, '31.24,103.75', 8, '36'),
(21, '2017-02-26', 90, 30, '31.64,103.56', 7, '36.6'),
(22, '2017-02-27', 90, 30, '58.35,-78.23', 5, '35.3'),
(23, '2017-02-28', 120, 35, '7.35,23.34', 6, '37.9'),
(24, '2017-03-01', 156, 25, '31.65,103.45', 9, '38'),
(25, '2017-03-02', 42, 28, '58.14,-78.45', 10, '37.4'),
(26, '2017-03-01', 98, 26, '7.33,23.45', 4, '36.7'),
(27, '2017-03-02', 150, 38, '31.02,103.54', 2, '37.2'),
(28, '2017-03-03', 29, 6, '58.86,-78.45', 1, '36.5'),
(29, '2017-03-04', 149, 59, '7.67,23.57', 3, '37.2'),
(30, '2017-03-05', 125, 37, '31.76,103.49', 8, '36');

-- --------------------------------------------------------

--
-- 表的结构 `collardata-ani`
--

CREATE TABLE `collardata-ani` (
  `CollarDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `HeartBeat` int(11) NOT NULL,
  `Respire` int(11) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Power` varchar(45) DEFAULT NULL,
  `Connection` varchar(45) DEFAULT NULL,
  `RecycleDate` date DEFAULT NULL,
  `CollarID` int(11) NOT NULL,
  `Temperature` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `collardata-ani`
--

INSERT INTO `collardata-ani` (`CollarDataID`, `RecordDate`, `HeartBeat`, `Respire`, `Location`, `Power`, `Connection`, `RecycleDate`, `CollarID`, `Temperature`) VALUES
(1, '2017-02-16', 90, 36, '31.03,103.19', '1', '1', '2017-01-17', 8, '37'),
(2, '2017-02-16', 96, 35, '31.03,103.19', '1', '1', '2017-01-18', 8, '36.9'),
(3, '2017-02-16', 89, 37, '31.03,103.19', '1', '1', '2017-01-19', 8, '37.5'),
(4, '2017-02-16', 170, 56, '31.03,103.19', '1', '1', '2017-01-20', 8, '39.6'),
(5, '2017-02-16', 169, 59, '31.03,103.19', '1', '1', '2017-01-21', 8, '40.5'),
(6, '2017-02-16', 185, 52, '31.03,103.19', '1', '1', '2017-01-22', 8, '38.4'),
(7, '2017-02-16', 170, 40, '31.03,103.19', '1', '1', '2017-01-23', 8, '38.1'),
(8, '2017-02-16', 168, 38, '31.03,103.19', '1', '1', '2017-01-24', 8, '36.1'),
(9, '2017-02-16', 150, 62, '31.03,103.19', '1', '1', '2017-01-25', 8, '36.1');

--
-- 触发器 `collardata-ani`
--
DELIMITER $$
CREATE TRIGGER `sendSignal` AFTER INSERT ON `collardata-ani` FOR EACH ROW BEGIN
		  declare result int;
		  set @parID = New.CollarDataID;
		  call multiCheck(@parID,result);
          if(select result = 1)then
          set @oldStatus = (select Status from `animal-ani`);
		  set @newStatus = @oldStatus -1;
		  
		  elseIF(select result = 2)THEN
		  set @oldStatus = (select Status from `animal-ani`);
		  set @newStatus = @oldStatus +1;
          end if;
		  update `animal-ani` set Status = @newStatus where AnimalID in (select AnimalID from `collar-ani` where CollarID = New.CollarID);
		  if(@newStatus = 3)then
          INSERT INTO sickanimal (AnimalID,Location,Status)values ((select AnimalID from `collar-ani`where `CollarID` =New.CollarID), New.Location,(select Status from `animal-ani`where animalID = (select AnimalID from `collar-ani`where `CollarID` =New.CollarID)));
		     
		  									                                    		elseif (@newStatus >3)then update `sickanimal` set Status = @newStatus where AnimalID = (select AnimalID from `collar-ani` where CollarID = New.CollarID);
		  
         				 end if;
             update times set times = times+1 where times.id = 1;

		  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 替换视图以便查看 `collardata_search`
-- (See below for the actual view)
--
CREATE TABLE `collardata_search` (
`CollarDataID` int(11)
,`AnimalID` int(11)
,`Name` varchar(45)
,`CollarID` int(11)
,`RecordDate` date
,`HeartBeat` int(11)
,`Respire` int(11)
,`Temperature` varchar(45)
,`Location` varchar(45)
);

-- --------------------------------------------------------

--
-- 表的结构 `donor`
--

CREATE TABLE `donor` (
  `DonationID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `donor`
--

INSERT INTO `donor` (`DonationID`, `Name`, `Address`, `PhoneNumber`, `AnimalID`, `Amount`) VALUES
(1, 'Alan', 'America', '2345654244', 2, 2000),
(2, 'Bob', 'Japan', '2345432123', 6, 500),
(3, 'Dave', 'China', '1234543212', 5, 788),
(4, 'Ferad', 'France', '5676543455', 3, 544),
(5, 'Gary', 'UK', '1234543234', 10, 800),
(6, 'sdf', 'sdfs', 'sdf', 2, 1000);

-- --------------------------------------------------------

--
-- 表的结构 `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  `ManagerID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`ManagerID`, `FirstName`, `LastName`, `Address`, `PhoneNumber`) VALUES
(1, 'Junxi', 'Fan', 'Asian', '3456765434'),
(2, 'Alan', 'Walker', 'Afrian', '2345434566');

-- --------------------------------------------------------

--
-- 表的结构 `sensor`
--

CREATE TABLE `sensor` (
  `SensorID` int(11) NOT NULL,
  `ActivateDate` date NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `ProductInfo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sensor`
--

INSERT INTO `sensor` (`SensorID`, `ActivateDate`, `AnimalID`, `ProductInfo`) VALUES
(1, '2017-01-02', 8, 'A'),
(2, '2017-01-03', 7, 'C'),
(3, '2017-01-04', 9, 'B'),
(4, '2017-01-05', 6, 'C'),
(5, '2017-01-06', 2, 'B'),
(6, '2017-01-07', 3, 'C'),
(7, '2017-01-08', 1, 'A'),
(8, '2017-01-09', 10, 'B'),
(9, '2017-01-10', 4, 'C'),
(10, '2017-01-11', 5, 'A');

-- --------------------------------------------------------

--
-- 表的结构 `sensor-ani`
--

CREATE TABLE `sensor-ani` (
  `SensorID` int(11) NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `ActivateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sensor-ani`
--

INSERT INTO `sensor-ani` (`SensorID`, `AnimalID`, `ActivateDate`) VALUES
(4, 10, '2017-01-05');

-- --------------------------------------------------------

--
-- 表的结构 `sensordata`
--

CREATE TABLE `sensordata` (
  `SensorDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `Bloodpressure` int(11) NOT NULL,
  `SensorID` int(11) NOT NULL,
  `Bioelectricity` int(11) NOT NULL,
  `PH` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sensordata`
--

INSERT INTO `sensordata` (`SensorDataID`, `RecordDate`, `Bloodpressure`, `SensorID`, `Bioelectricity`, `PH`) VALUES
(1, '2017-02-06', 100, 7, 500, '7.12'),
(2, '2017-02-07', 120, 5, 400, '7.01'),
(3, '2017-02-08', 100, 6, 300, '7.01'),
(4, '2017-02-09', 120, 9, 500, '7.5'),
(5, '2017-02-10', 150, 10, 400, '6.5'),
(6, '2017-02-11', 130, 4, 350, '6.8'),
(7, '2017-02-12', 120, 2, 353, '6.7'),
(8, '2017-02-13', 150, 1, 336, '6.65'),
(9, '2017-02-14', 120, 3, 321, '6.67'),
(10, '2017-02-15', 160, 8, 306, '7.4');

-- --------------------------------------------------------

--
-- 表的结构 `sensordata-ani`
--

CREATE TABLE `sensordata-ani` (
  `SensorDataID` int(11) NOT NULL,
  `RecordDate` date NOT NULL,
  `Bloodpressure` int(11) NOT NULL,
  `Power` int(11) DEFAULT NULL,
  `Connection` int(11) DEFAULT NULL,
  `SensorID` int(11) NOT NULL,
  `Bioelectricity` int(11) NOT NULL,
  `PH` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sensordata-ani`
--

INSERT INTO `sensordata-ani` (`SensorDataID`, `RecordDate`, `Bloodpressure`, `Power`, `Connection`, `SensorID`, `Bioelectricity`, `PH`) VALUES
(1, '2017-02-16', 140, 1, 1, 4, 500, '7.12'),
(2, '2017-02-16', 120, 1, 1, 4, 400, '7.01'),
(3, '2017-02-16', 168, 1, 1, 4, 300, '7.01'),
(4, '2017-02-16', 170, 1, 1, 4, 500, '7.5'),
(5, '2017-02-16', 160, 1, 1, 4, 400, '6.5'),
(6, '2017-02-16', 130, 1, 1, 4, 350, '6.8');

--
-- 触发器 `sensordata-ani`
--
DELIMITER $$
CREATE TRIGGER `manageSensorInsert` AFTER INSERT ON `sensordata-ani` FOR EACH ROW BEGIN
			 update times set times = times+1 where times.id = 2;
		  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 替换视图以便查看 `sensordata_search`
-- (See below for the actual view)
--
CREATE TABLE `sensordata_search` (
`SensorDataID` int(11)
,`AnimalID` int(11)
,`Name` varchar(45)
,`sensorID` int(11)
,`RecordDate` date
,`Bloodpressure` int(11)
,`Bioelectricity` int(11)
,`PH` varchar(45)
);

-- --------------------------------------------------------

--
-- 表的结构 `sickanimal`
--

CREATE TABLE `sickanimal` (
  `SickID` int(11) NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sickanimal`
--

INSERT INTO `sickanimal` (`SickID`, `AnimalID`, `Location`, `Status`) VALUES
(2, 5, '7.34,23.19', 2),
(3, 7, '58.18,-78.08', 2),
(4, 1, '31.03,103.19', 2),
(5, 10, '31.03,103.19', 5);

--
-- 触发器 `sickanimal`
--
DELIMITER $$
CREATE TRIGGER `changeStatus` AFTER UPDATE ON `sickanimal` FOR EACH ROW BEGIN
		 update Animal set Status = 2 where AnimalID = New.AnimalID;
		  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertSensorData` AFTER INSERT ON `sickanimal` FOR EACH ROW BEGIN
		  if((select Status from `animal-ani`) = 3)then
		   call insertSensorTogether();
		   end if;
           update Animal set Status = 2 where AnimalID = New.AnimalID;
		  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `LastName`) VALUES
(3, 'Taotao', 'Jing'),
(4, 'Clerence', 'Lopez'),
(5, 'Sean', 'Hill'),
(6, 'Victor', 'Scoot');

-- --------------------------------------------------------

--
-- 表的结构 `standard`
--

CREATE TABLE `standard` (
  `TypeID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `MinWeight` int(11) NOT NULL,
  `MaxWeight` int(11) NOT NULL,
  `MinLength` int(11) NOT NULL,
  `MaxLength` int(11) NOT NULL,
  `MinTemp` int(11) NOT NULL,
  `MaxTemp` int(11) NOT NULL,
  `MinRespire` int(11) NOT NULL,
  `MaxRespire` int(11) NOT NULL,
  `MinHeartbeat` int(11) NOT NULL,
  `MaxHeartbeat` int(11) NOT NULL,
  `MinBloodpressure` int(11) NOT NULL,
  `MaxBloodpressure` int(11) NOT NULL,
  `RunningSpeed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `standard`
--

INSERT INTO `standard` (`TypeID`, `Name`, `MinWeight`, `MaxWeight`, `MinLength`, `MaxLength`, `MinTemp`, `MaxTemp`, `MinRespire`, `MaxRespire`, `MinHeartbeat`, `MaxHeartbeat`, `MinBloodpressure`, `MaxBloodpressure`, `RunningSpeed`) VALUES
(1, 'giant panda', 100, 150, 1, 2, 35, 37, 20, 40, 70, 150, 90, 160, 30),
(2, 'african elephant', 4000, 6000, 4, 8, 36, 38, 4, 6, 25, 30, 112, 187, 40),
(3, 'tiger', 99, 297, 1, 3, 37, 39, 10, 60, 70, 150, 90, 160, 70),
(4, 'african rhino', 675, 450, 1, 3, 37, 37, 16, 23, 32, 42, 38, 183, 60),
(5, 'orangutan', 60, 90, 1, 1, 36, 37, 20, 35, 80, 120, 84, 160, 6),
(6, 'snow leopard', 33, 52, 1, 2, 38, 39, 20, 40, 90, 250, 76, 130, 88),
(7, 'jaguar', 70, 108, 1, 2, 38, 39, 18, 38, 110, 230, 83, 140, 100);

-- --------------------------------------------------------

--
-- 表的结构 `standard-ani`
--

CREATE TABLE `standard-ani` (
  `TypeID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `MinWeight` int(11) NOT NULL,
  `MaxWeight` int(11) NOT NULL,
  `MinLength` int(11) NOT NULL,
  `MaxLength` int(11) NOT NULL,
  `MinTemp` int(11) NOT NULL,
  `MaxTemp` int(11) NOT NULL,
  `MinRespire` int(11) NOT NULL,
  `MaxRespire` int(11) NOT NULL,
  `MinHeartbeat` int(11) NOT NULL,
  `MaxHeartbeat` int(11) NOT NULL,
  `MinBloodpressure` int(11) NOT NULL,
  `MaxBloodpressure` int(11) NOT NULL,
  `RunningSpeed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `standard-ani`
--

INSERT INTO `standard-ani` (`TypeID`, `Name`, `MinWeight`, `MaxWeight`, `MinLength`, `MaxLength`, `MinTemp`, `MaxTemp`, `MinRespire`, `MaxRespire`, `MinHeartbeat`, `MaxHeartbeat`, `MinBloodpressure`, `MaxBloodpressure`, `RunningSpeed`) VALUES
(1, 'giant panda', 100, 150, 1, 2, 35, 37, 20, 40, 70, 150, 90, 160, 30);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `tech_install`
-- (See below for the actual view)
--
CREATE TABLE `tech_install` (
`AnimalID` int(11)
,`TypeName` varchar(45)
,`Name` varchar(45)
);

-- --------------------------------------------------------

--
-- 表的结构 `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `times` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `times`
--

INSERT INTO `times` (`id`, `times`) VALUES
(1, 10),
(2, 7);

-- --------------------------------------------------------

--
-- 表的结构 `treatment`
--

CREATE TABLE `treatment` (
  `TreatmentID` int(11) NOT NULL,
  `VetID` int(11) NOT NULL,
  `AnimalID` int(11) NOT NULL,
  `TreatmentRecord` varchar(45) NOT NULL,
  `TreatmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `treatment`
--

INSERT INTO `treatment` (`TreatmentID`, `VetID`, `AnimalID`, `TreatmentRecord`, `TreatmentDate`) VALUES
(1, 10, 3, 'cold', '2016-08-09'),
(2, 11, 4, 'fever', '2016-08-10'),
(3, 12, 5, 'injury', '2016-08-11'),
(4, 10, 4, 'injury', '2016-08-12'),
(5, 11, 5, 'injury', '2016-08-13'),
(6, 12, 6, 'injury', '2016-08-14'),
(7, 10, 6, 'heiheihei', '2017-04-10'),
(8, 10, 6, 'gg', '2017-04-10');

-- --------------------------------------------------------

--
-- 表的结构 `vet`
--

CREATE TABLE `vet` (
  `VetID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL,
  `Specialty` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `vet`
--

INSERT INTO `vet` (`VetID`, `FirstName`, `LastName`, `PhoneNumber`, `Specialty`) VALUES
(10, 'Zhixin', 'Wang', '6175268423', 'A'),
(11, 'Sean', 'Hill', '2651259657', 'G'),
(12, 'Victor', 'Scoot', '5632486234', 'B');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `vet_view_newsensordata`
-- (See below for the actual view)
--
CREATE TABLE `vet_view_newsensordata` (
`SensorDataID` int(11)
,`AnimalID` int(11)
,`Name` varchar(45)
,`sensorID` int(11)
,`RecordDate` date
,`Bloodpressure` int(11)
,`Bioelectricity` int(11)
,`PH` varchar(45)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `vet_view_sickanimal`
-- (See below for the actual view)
--
CREATE TABLE `vet_view_sickanimal` (
`SickID` int(11)
,`AnimalID` int(11)
,`TypeName` varchar(45)
,`Name` varchar(45)
,`Location` varchar(45)
);

-- --------------------------------------------------------

--
-- 表的结构 `volunteer`
--

CREATE TABLE `volunteer` (
  `ApplicationID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL,
  `Resume` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `volunteer`
--

INSERT INTO `volunteer` (`ApplicationID`, `FirstName`, `LastName`, `Address`, `PhoneNumber`, `Resume`, `Email`) VALUES
(1, 'Max', 'Gao', 'US', '1568453269', 'good vet', '126@225.com');

-- --------------------------------------------------------

--
-- 视图结构 `collardata_search`
--
DROP TABLE IF EXISTS `collardata_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collardata_search`  AS  select `collardata`.`CollarDataID` AS `CollarDataID`,`animal`.`AnimalID` AS `AnimalID`,`standard`.`Name` AS `Name`,`collar`.`CollarID` AS `CollarID`,`collardata`.`RecordDate` AS `RecordDate`,`collardata`.`HeartBeat` AS `HeartBeat`,`collardata`.`Respire` AS `Respire`,`collardata`.`Temperature` AS `Temperature`,`collardata`.`Location` AS `Location` from (((`animal` join `standard` on((`animal`.`TypeID` = `standard`.`TypeID`))) join `collar` on((`animal`.`AnimalID` = `collar`.`AnimalID`))) join `collardata` on((`collar`.`CollarID` = `collardata`.`CollarID`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `sensordata_search`
--
DROP TABLE IF EXISTS `sensordata_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sensordata_search`  AS  select `sensordata`.`SensorDataID` AS `SensorDataID`,`animal`.`AnimalID` AS `AnimalID`,`standard`.`Name` AS `Name`,`sensor`.`SensorID` AS `sensorID`,`sensordata`.`RecordDate` AS `RecordDate`,`sensordata`.`Bloodpressure` AS `Bloodpressure`,`sensordata`.`Bioelectricity` AS `Bioelectricity`,`sensordata`.`PH` AS `PH` from (((`animal` join `standard` on((`animal`.`TypeID` = `standard`.`TypeID`))) join `sensor` on((`animal`.`AnimalID` = `sensor`.`AnimalID`))) join `sensordata` on((`sensor`.`SensorID` = `sensordata`.`SensorID`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `tech_install`
--
DROP TABLE IF EXISTS `tech_install`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tech_install`  AS  select `animal`.`AnimalID` AS `AnimalID`,`standard`.`Name` AS `TypeName`,`animal`.`Name` AS `Name` from (`animal` join `standard` on((`animal`.`TypeID` = `standard`.`TypeID`))) where (`animal`.`Status` = '0') ;

-- --------------------------------------------------------

--
-- 视图结构 `vet_view_newsensordata`
--
DROP TABLE IF EXISTS `vet_view_newsensordata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vet_view_newsensordata`  AS  select `sensordata-ani`.`SensorDataID` AS `SensorDataID`,`animal`.`AnimalID` AS `AnimalID`,`standard`.`Name` AS `Name`,`sensor-ani`.`SensorID` AS `sensorID`,`sensordata-ani`.`RecordDate` AS `RecordDate`,`sensordata-ani`.`Bloodpressure` AS `Bloodpressure`,`sensordata-ani`.`Bioelectricity` AS `Bioelectricity`,`sensordata-ani`.`PH` AS `PH` from (((`animal` join `standard` on((`animal`.`TypeID` = `standard`.`TypeID`))) join `sensor-ani` on((`animal`.`AnimalID` = `sensor-ani`.`AnimalID`))) join `sensordata-ani` on((`sensor-ani`.`SensorID` = `sensordata-ani`.`SensorID`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `vet_view_sickanimal`
--
DROP TABLE IF EXISTS `vet_view_sickanimal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vet_view_sickanimal`  AS  select `sickanimal`.`SickID` AS `SickID`,`sickanimal`.`AnimalID` AS `AnimalID`,`standard`.`Name` AS `TypeName`,`animal`.`Name` AS `Name`,`sickanimal`.`Location` AS `Location` from ((`animal` join `standard` on((`animal`.`TypeID` = `standard`.`TypeID`))) join `sickanimal` on((`sickanimal`.`AnimalID` = `animal`.`AnimalID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `analogcollardata`
--
ALTER TABLE `analogcollardata`
  ADD PRIMARY KEY (`CollarDataID`,`RecordDate`);

--
-- Indexes for table `analogsensordata`
--
ALTER TABLE `analogsensordata`
  ADD PRIMARY KEY (`SensorDataID`);

--
-- Indexes for table `analyst`
--
ALTER TABLE `analyst`
  ADD PRIMARY KEY (`AnalystID`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`AnimalID`),
  ADD KEY `fk_Animal_Standard1_idx` (`TypeID`);

--
-- Indexes for table `animal-ani`
--
ALTER TABLE `animal-ani`
  ADD PRIMARY KEY (`AnimalID`),
  ADD KEY `fk_Animal-ani_Standard-ani1_idx` (`TypeID`);

--
-- Indexes for table `collar`
--
ALTER TABLE `collar`
  ADD PRIMARY KEY (`CollarID`),
  ADD KEY `fk_Collar_Animal1_idx` (`AnimalID`),
  ADD KEY `fk_Collar_Staff1_idx` (`StaffID`);

--
-- Indexes for table `collar-ani`
--
ALTER TABLE `collar-ani`
  ADD PRIMARY KEY (`CollarID`),
  ADD KEY `fk_Collar-ani_Animal-ani1_idx` (`AnimalID`);

--
-- Indexes for table `collardata`
--
ALTER TABLE `collardata`
  ADD PRIMARY KEY (`CollarDataID`),
  ADD KEY `fk_CollarData_Collar1_idx` (`CollarID`);

--
-- Indexes for table `collardata-ani`
--
ALTER TABLE `collardata-ani`
  ADD PRIMARY KEY (`CollarDataID`,`RecordDate`),
  ADD KEY `fk_CollarData-ani_Collar-ani1_idx` (`CollarID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DonationID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`SensorID`),
  ADD KEY `fk_Sensor_Animal1_idx` (`AnimalID`);

--
-- Indexes for table `sensor-ani`
--
ALTER TABLE `sensor-ani`
  ADD PRIMARY KEY (`SensorID`),
  ADD KEY `fk_Sensor-ani_Animal-ani1_idx` (`AnimalID`);

--
-- Indexes for table `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`SensorDataID`),
  ADD KEY `fk_SensorData_Sensor1_idx` (`SensorID`);

--
-- Indexes for table `sensordata-ani`
--
ALTER TABLE `sensordata-ani`
  ADD PRIMARY KEY (`SensorDataID`),
  ADD KEY `fk_SensorData-ani_Sensor-ani1_idx` (`SensorID`);

--
-- Indexes for table `sickanimal`
--
ALTER TABLE `sickanimal`
  ADD PRIMARY KEY (`SickID`),
  ADD KEY `fk_SickAnimal_Animal1_idx` (`AnimalID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `standard-ani`
--
ALTER TABLE `standard-ani`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `fk_Treatment_Vet1_idx` (`VetID`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`VetID`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`ApplicationID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `analogcollardata`
--
ALTER TABLE `analogcollardata`
  MODIFY `CollarDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `analogsensordata`
--
ALTER TABLE `analogsensordata`
  MODIFY `SensorDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `animal`
--
ALTER TABLE `animal`
  MODIFY `AnimalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `animal-ani`
--
ALTER TABLE `animal-ani`
  MODIFY `AnimalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `collar`
--
ALTER TABLE `collar`
  MODIFY `CollarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `collar-ani`
--
ALTER TABLE `collar-ani`
  MODIFY `CollarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `collardata`
--
ALTER TABLE `collardata`
  MODIFY `CollarDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `collardata-ani`
--
ALTER TABLE `collardata-ani`
  MODIFY `CollarDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `donor`
--
ALTER TABLE `donor`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `sensor`
--
ALTER TABLE `sensor`
  MODIFY `SensorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `sensor-ani`
--
ALTER TABLE `sensor-ani`
  MODIFY `SensorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `SensorDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `sensordata-ani`
--
ALTER TABLE `sensordata-ani`
  MODIFY `SensorDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `sickanimal`
--
ALTER TABLE `sickanimal`
  MODIFY `SickID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `standard-ani`
--
ALTER TABLE `standard-ani`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `treatment`
--
ALTER TABLE `treatment`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_Animal_Standard1` FOREIGN KEY (`TypeID`) REFERENCES `standard` (`TypeID`);

--
-- 限制表 `animal-ani`
--
ALTER TABLE `animal-ani`
  ADD CONSTRAINT `fk_Animal-ani_Standard-ani1` FOREIGN KEY (`TypeID`) REFERENCES `standard-ani` (`TypeID`);

--
-- 限制表 `collar`
--
ALTER TABLE `collar`
  ADD CONSTRAINT `fk_Collar_Animal1` FOREIGN KEY (`AnimalID`) REFERENCES `animal` (`AnimalID`),
  ADD CONSTRAINT `fk_Collar_Staff1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- 限制表 `collar-ani`
--
ALTER TABLE `collar-ani`
  ADD CONSTRAINT `fk_Collar-ani_Animal-ani1` FOREIGN KEY (`AnimalID`) REFERENCES `animal-ani` (`AnimalID`);

--
-- 限制表 `collardata`
--
ALTER TABLE `collardata`
  ADD CONSTRAINT `fk_CollarData_Collar1` FOREIGN KEY (`CollarID`) REFERENCES `collar` (`CollarID`);

--
-- 限制表 `collardata-ani`
--
ALTER TABLE `collardata-ani`
  ADD CONSTRAINT `fk_CollarData-ani_Collar-ani1` FOREIGN KEY (`CollarID`) REFERENCES `collar-ani` (`CollarID`);

--
-- 限制表 `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `fk_Sensor_Animal1` FOREIGN KEY (`AnimalID`) REFERENCES `animal` (`AnimalID`);

--
-- 限制表 `sensor-ani`
--
ALTER TABLE `sensor-ani`
  ADD CONSTRAINT `fk_Sensor-ani_Animal-ani1` FOREIGN KEY (`AnimalID`) REFERENCES `animal-ani` (`AnimalID`);

--
-- 限制表 `sensordata`
--
ALTER TABLE `sensordata`
  ADD CONSTRAINT `fk_SensorData_Sensor1` FOREIGN KEY (`SensorID`) REFERENCES `sensor` (`SensorID`);

--
-- 限制表 `sensordata-ani`
--
ALTER TABLE `sensordata-ani`
  ADD CONSTRAINT `fk_SensorData-ani_Sensor-ani1` FOREIGN KEY (`SensorID`) REFERENCES `sensor-ani` (`SensorID`);

--
-- 限制表 `sickanimal`
--
ALTER TABLE `sickanimal`
  ADD CONSTRAINT `fk_SickAnimal_Animal1` FOREIGN KEY (`AnimalID`) REFERENCES `animal` (`AnimalID`);

--
-- 限制表 `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `fk_Treatment_Vet1` FOREIGN KEY (`VetID`) REFERENCES `vet` (`VetID`);

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`root`@`localhost` EVENT `insertCollarEvent` ON SCHEDULE EVERY 1 SECOND STARTS '2017-04-10 13:04:36' ON COMPLETION PRESERVE DISABLE DO call insertCollarData()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
