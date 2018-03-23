-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 12:44 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayofficial`
--

CREATE TABLE `bitdb_r_barangayofficial` (
  `Brgy_Official_ID` int(11) NOT NULL,
  `CitizenID` int(11) NOT NULL,
  `PosID` int(11) NOT NULL,
  `StartTerm` date NOT NULL,
  `EndTerm` date NOT NULL,
  `ActUser` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayofficial`
--

INSERT INTO `bitdb_r_barangayofficial` (`Brgy_Official_ID`, `CitizenID`, `PosID`, `StartTerm`, `EndTerm`, `ActUser`) VALUES
(1, 1, 1, '2018-02-01', '2018-02-02', b'1'),
(2, 2, 2, '2018-02-06', '2018-02-21', b'1'),
(3, 3, 3, '2018-02-06', '2018-02-28', b'1'),
(4, 4, 4, '0000-00-00', '0000-00-00', b'1'),
(5, 5, 5, '0000-00-00', '0000-00-00', b'1'),
(8, 6, 6, '2018-03-16', '2018-03-22', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayposition`
--

CREATE TABLE `bitdb_r_barangayposition` (
  `PosID` int(11) NOT NULL,
  `PosName` varchar(50) NOT NULL,
  `PosDesc` varchar(200) NOT NULL,
  `PosStat` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayposition`
--

INSERT INTO `bitdb_r_barangayposition` (`PosID`, `PosName`, `PosDesc`, `PosStat`) VALUES
(1, 'Secretary', 'Taga ayos ng mga bagay bagay sa kahit saan', b'1'),
(2, 'Barangay Captain', 'Tagapamuno ~ !', b'1'),
(3, 'Admin', 'Tagapamalaga~ !', b'1'),
(4, 'Census Officer', 'Taga add ni citizen ~!', b'1'),
(5, 'Chief Tanod', 'Blotter Log', b'1'),
(6, 'PIO', 'huhu', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayuseraccounts`
--

CREATE TABLE `bitdb_r_barangayuseraccounts` (
  `AccountID` int(11) NOT NULL,
  `Brgy_Official_ID` int(11) DEFAULT NULL,
  `AccountUsername` varchar(12) NOT NULL,
  `AccountPassword` varchar(12) NOT NULL,
  `AccountUserType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayuseraccounts`
--

INSERT INTO `bitdb_r_barangayuseraccounts` (`AccountID`, `Brgy_Official_ID`, `AccountUsername`, `AccountPassword`, `AccountUserType`) VALUES
(2, 1, 'secretary', 'secretary', 1),
(3, 2, 'barangaycap', 'barangaycap', 2),
(4, 3, 'admin', 'admin', 0),
(5, 5, 'chieftanod', 'chieftanod', 3),
(6, 4, 'censusoffice', 'censusoffice', 4);

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayzone`
--

CREATE TABLE `bitdb_r_barangayzone` (
  `ZoneID` int(11) NOT NULL,
  `BarangayIdentity` int(11) NOT NULL,
  `Zone` varchar(100) NOT NULL,
  `ZoneStatus` bit(1) DEFAULT b'1',
  `ZoneDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayzone`
--

INSERT INTO `bitdb_r_barangayzone` (`ZoneID`, `BarangayIdentity`, `Zone`, `ZoneStatus`, `ZoneDate`) VALUES
(2, 2, 'Zone1', b'1', '2018-03-21'),
(3, 2, 'Zone2', b'1', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_blotter`
--

CREATE TABLE `bitdb_r_blotter` (
  `BlotterID` int(11) NOT NULL,
  `IncidentDate` date NOT NULL,
  `IncidentArea` int(11) DEFAULT NULL,
  `Complainant` varchar(200) NOT NULL,
  `Accused` int(11) DEFAULT NULL,
  `BlotterType` int(11) DEFAULT NULL,
  `ComplaintStatement` varchar(100) NOT NULL,
  `ComplaintStatus` bit(1) NOT NULL DEFAULT b'1',
  `Resolution` varchar(200) NOT NULL,
  `ComplaintDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_blotter`
--

INSERT INTO `bitdb_r_blotter` (`BlotterID`, `IncidentDate`, `IncidentArea`, `Complainant`, `Accused`, `BlotterType`, `ComplaintStatement`, `ComplaintStatus`, `Resolution`, `ComplaintDate`) VALUES
(1, '2018-02-25', 2, 'wew', 1, 2, 'asdasdasdasdasdad', b'1', 'qweqweqweqweqwe', '2018-02-24'),
(2, '2018-03-17', 2, 'qwerty', 9, 2, 'asdfg', b'0', 'asdfg', '2018-03-24'),
(3, '2018-03-17', 3, 'qwerty', 11, 1, 'fghfgh', b'1', 'hfg', '2018-03-24'),
(4, '2018-03-17', 3, 'qwerty', 11, 2, 'fghfgh', b'1', 'hfg', '2018-03-24'),
(5, '2018-03-14', 3, 'dgadsgsdf', 9, 1, 'lkljhk', b'0', 'ioui', '2018-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_blottercategory`
--

CREATE TABLE `bitdb_r_blottercategory` (
  `BlotterCategoryID` int(11) NOT NULL,
  `BlotterCategoryName` varchar(100) NOT NULL,
  `BlotterCategoryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_blottercategory`
--

INSERT INTO `bitdb_r_blottercategory` (`BlotterCategoryID`, `BlotterCategoryName`, `BlotterCategoryDate`) VALUES
(1, 'Theft', '2018-03-20'),
(2, 'Lost Item', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_business`
--

CREATE TABLE `bitdb_r_business` (
  `BusinessID` int(11) NOT NULL,
  `Business_Name` varchar(100) NOT NULL,
  `BusinessLoc` varchar(100) NOT NULL,
  `Manager` varchar(100) NOT NULL,
  `Mgr_Address` varchar(200) NOT NULL,
  `Date_Issued` date DEFAULT NULL,
  `BusinessStatus` bit(1) NOT NULL DEFAULT b'1',
  `BusinessCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_business`
--

INSERT INTO `bitdb_r_business` (`BusinessID`, `Business_Name`, `BusinessLoc`, `Manager`, `Mgr_Address`, `Date_Issued`, `BusinessStatus`, `BusinessCategory`) VALUES
(1, 'Soy Sauce', 'Soy Sauce Philippines', 'Datu Puti', 'Datu Puti Philippines', NULL, b'0', 1),
(2, 'viganvigan', 'somewhere out there', 'Jeremiah Vigan', 'Litex', NULL, b'0', 3),
(3, 'Lugawan ', 'Siomai Zone', 'Carlo Gutierrez', '6r74etufrjeyfgyuewgfh', NULL, b'0', 6),
(4, 'Prprprprpr', 'Manila', 'Ako huhu', 'somewhere', NULL, b'0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_businesscategory`
--

CREATE TABLE `bitdb_r_businesscategory` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(200) NOT NULL,
  `categoryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_businesscategory`
--

INSERT INTO `bitdb_r_businesscategory` (`categoryID`, `categoryName`, `categoryDesc`, `categoryDate`) VALUES
(1, 'Grocery Store', 'Tindahan ni aling nena~', '2018-03-11'),
(3, 'Barber Shop', 'Pagupitan ni Kuya', '2018-03-11'),
(6, 'Mall', 'Galaan namin', '2018-03-11'),
(7, 'Bakery', 'Pandesalan', '2018-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_citizen`
--

CREATE TABLE `bitdb_r_citizen` (
  `Citizen_ID` int(11) NOT NULL,
  `Salutation` varchar(10) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Name_Ext` varchar(10) DEFAULT NULL,
  `Citizen_Email` varchar(50) DEFAULT NULL,
  `Height` float(18,4) NOT NULL,
  `Weight` float(18,4) NOT NULL,
  `Birthdate` date NOT NULL,
  `Birth_Place` varchar(200) DEFAULT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Res_Status` bit(1) NOT NULL DEFAULT b'1',
  `Civil_Status` varchar(10) NOT NULL,
  `Occupation` varchar(100) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Blood_Type` varchar(3) NOT NULL,
  `House_No` varchar(10) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Zone` varchar(100) NOT NULL,
  `Date_Rec` date NOT NULL,
  `Person_Con` varchar(100) DEFAULT NULL,
  `Contact` decimal(11,0) DEFAULT NULL,
  `ProfilePicture` blob,
  `DigitalSign` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_citizen`
--

INSERT INTO `bitdb_r_citizen` (`Citizen_ID`, `Salutation`, `First_Name`, `Middle_Name`, `Last_Name`, `Name_Ext`, `Citizen_Email`, `Height`, `Weight`, `Birthdate`, `Birth_Place`, `Nationality`, `Res_Status`, `Civil_Status`, `Occupation`, `Gender`, `Blood_Type`, `House_No`, `Street`, `Zone`, `Date_Rec`, `Person_Con`, `Contact`, `ProfilePicture`, `DigitalSign`) VALUES
(1, 'Mr.', 'Lowell Dave', 'Elba', 'Agnir', '', 'lowell.agnir@yahoo.com', 5.6000, 56.0000, '2018-02-14', '', 'Filipino', b'1', 'Single', 'Video Editor', 'M', 'O', '17', 'St. Matthew St.', '6', '2018-02-01', 'Me,Myself and I', '9123456789', NULL, NULL),
(2, 'Dr.', 'Soul', NULL, 'Extinction', NULL, 'soul.extinction@gmail.com', 5.1100, 66.0000, '2017-11-16', NULL, 'Astral', b'1', 'Single', NULL, 'M', 'A', '23', '41', '123', '2018-02-06', NULL, NULL, NULL, NULL),
(3, 'Legend', 'Soy', NULL, 'Sauce', NULL, 'soy.sauce@yahoo.com', 4.5000, 33.0000, '2018-02-15', NULL, 'Datu Puti', b'1', 'Married', 'pampasarap kasama si suka', 'M', 'Z', '34', '234', 'ads', '2018-02-06', NULL, NULL, NULL, NULL),
(4, 'Mr.', 'Bui', 'Bui', 'Bui', 'LVII', 'wew.gsdfgs@gmail.com', 67.0000, 68.0000, '0000-00-00', 'Kung San man', 'Ugandan', b'1', 'Single', 'Kahit ano', 'M', 'Z', '34', '34', '234', '2018-02-15', NULL, NULL, NULL, NULL),
(5, 'Ms.', 'wew', 'wew', 'wew', '', 'wew@wew.com', 43.0000, 34.0000, '2018-09-23', 'wewewew', 'Filipino', b'1', 'Single', 'Worker', 'F', 'X', '34', '32', '54', '2018-02-18', 'woi', '9876543212', NULL, NULL),
(6, 'Mr', 'Peter John ', '', 'Teneza', '', 'peterjohnteneza@gmail.com', 5.0000, 10.0000, '1998-11-11', 'Hongkong', 'Filipino', b'1', 'Single', 'tambay', 'M', 'O', '72', '222', 'Isip', '2018-02-19', 'Mama', '222', NULL, NULL),
(7, 'Mr', 'Jashmine', 'Meme', 'Montano', 'Jr', 'jash@gmail.com', 60.0000, 100.0000, '1995-11-11', 'bulacan', 'Filipino', b'1', 'Single', 'Walawala', 'F', 'o', '23', '66', 'Zone', '2018-02-19', 'Nanay ', '123456', NULL, NULL),
(8, 'Mr.', 'qwerty', 'qwertyu', 'qwertyu', 'III', 'qwerty.qwerty.com', 67.0000, 65.0000, '2018-02-13', 'qwerty', 'qwerty', b'1', 'single', 'qwertyui', 'M', 'S', '56', '76', 'fsd', '2018-02-25', 'qwertyui', '9876543213', NULL, NULL),
(9, 'Mr.', 'carloasas', 'guierrz', 'cortesiano', '', 'exa', 56.0000, 102.0000, '2018-03-01', 'tyrew', 'Filipino-German', b'1', 'widowed', '', '', 'O+', '34', 'Mapayapa Inside', 'Zone 45', '2018-03-01', 'Inner Saboteurs', '0', NULL, NULL),
(10, 'Mrs.', 'qwertyukio', '3rw4etrtyu', 'wwertyju', 'VVI', 'ewrtyu@asdfbgnb.com', 45.0000, 67.0000, '2018-03-08', 'dsfgrtfhju', 'Filipino', b'1', 'Single', 'wefrgh', 'M', 'S', '23', '54', '23', '2018-03-05', 'qwerty', '9876543218', NULL, NULL),
(11, 'Ms.', 'hvdbsdkj', 'ldfkbgjhl', 'erthdfghjk', 'VI', 'sdfgjilds@adfkgjdsf.com', 90.0000, 89.0000, '2018-03-21', 'dfjghoi', 'Antartican', b'1', 'Married', 'Ice Breaker', 'M', 'C', '56', '89', 'sdfgd', '2018-03-05', 'tyyrtyu', '9876543214', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_config`
--

CREATE TABLE `bitdb_r_config` (
  `BarangayIdentity` int(11) NOT NULL,
  `ProvinceName` varchar(100) NOT NULL,
  `CityType` char(1) NOT NULL,
  `Municipality` varchar(100) NOT NULL,
  `BarangayType` char(1) NOT NULL,
  `BarangayName` varchar(100) NOT NULL,
  `Signatory` int(11) DEFAULT NULL,
  `MunicipalSeal` varchar(100) NOT NULL,
  `BarangaySeal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_config`
--

INSERT INTO `bitdb_r_config` (`BarangayIdentity`, `ProvinceName`, `CityType`, `Municipality`, `BarangayType`, `BarangayName`, `Signatory`, `MunicipalSeal`, `BarangaySeal`) VALUES
(2, 'Bulacan', 'C', 'San Mateo', 'C', 'Ampid I', 2, 'Cosmos.png', 'Chaos.png');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuance`
--

CREATE TABLE `bitdb_r_issuance` (
  `IssuanceID` int(11) NOT NULL,
  `CitizenID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `IssuanceType` int(11) NOT NULL,
  `Purpose` varchar(200) DEFAULT NULL,
  `IssuanceDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_issuance`
--

INSERT INTO `bitdb_r_issuance` (`IssuanceID`, `CitizenID`, `BusinessID`, `IssuanceType`, `Purpose`, `IssuanceDate`) VALUES
(1, 9, NULL, 3, 'Kahit ano', '2018-03-24'),
(4, 4, NULL, 1, 'wertwertwr', '2018-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuancetype`
--

CREATE TABLE `bitdb_r_issuancetype` (
  `IssuanceID` int(11) NOT NULL,
  `IssuanceType` varchar(100) DEFAULT NULL,
  `IssuanceOption` varchar(50) DEFAULT NULL,
  `BarangayIdentity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_issuancetype`
--

INSERT INTO `bitdb_r_issuancetype` (`IssuanceID`, `IssuanceType`, `IssuanceOption`, `BarangayIdentity`) VALUES
(1, 'Indigency', 'Personal', NULL),
(2, 'Business Permit', 'Business', NULL),
(3, 'Barangay Clearance', 'Personal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinance`
--

CREATE TABLE `bitdb_r_ordinance` (
  `OrdinanceID` int(11) NOT NULL,
  `OrdinanceTitle` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Persons_Involved` varchar(200) DEFAULT NULL,
  `OrdDesc` varchar(200) NOT NULL,
  `DateImplemented` date NOT NULL,
  `OrdStatus` bit(1) NOT NULL DEFAULT b'1',
  `Sanction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_ordinance`
--

INSERT INTO `bitdb_r_ordinance` (`OrdinanceID`, `OrdinanceTitle`, `CategoryID`, `Author`, `Persons_Involved`, `OrdDesc`, `DateImplemented`, `OrdStatus`, `Sanction`) VALUES
(2, 'No Clean No Life', 1, 'Me', 'wewewe', 'qwert', '2018-02-20', b'0', 'Clean for 1 Hour'),
(5, 'peter', 2, 'Perperper', 'Lowell', 'Deds na kami', '2015-11-11', b'1', 'death');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinancecategory`
--

CREATE TABLE `bitdb_r_ordinancecategory` (
  `OrdCategoryID` int(11) NOT NULL,
  `OrdinanceTitle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_ordinancecategory`
--

INSERT INTO `bitdb_r_ordinancecategory` (`OrdCategoryID`, `OrdinanceTitle`) VALUES
(1, 'ORD02'),
(2, 'peace');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_project`
--

CREATE TABLE `bitdb_r_project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(100) NOT NULL,
  `ProjectCategory` int(11) DEFAULT NULL,
  `ProjectLocation` int(11) DEFAULT NULL,
  `ProjectDesc` varchar(500) NOT NULL,
  `ProjectStatus` int(11) NOT NULL,
  `ProjectBudget` decimal(15,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_project`
--

INSERT INTO `bitdb_r_project` (`ProjectID`, `ProjectName`, `ProjectCategory`, `ProjectLocation`, `ProjectDesc`, `ProjectStatus`, `ProjectBudget`) VALUES
(2, 'Linis!', 2, 3, 'Tra Linis!', 1, '50.00'),
(3, 'Project Aces', 1, 3, 'Ace Building', 1, '800.00');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectactivity`
--

CREATE TABLE `bitdb_r_projectactivity` (
  `ActivityID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `ActivityName` varchar(200) NOT NULL,
  `ActivityDesc` varchar(200) DEFAULT NULL,
  `ActivityBudget` decimal(15,2) DEFAULT '0.00',
  `PeopleInvolve` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `ActivityStatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_projectactivity`
--

INSERT INTO `bitdb_r_projectactivity` (`ActivityID`, `ProjectID`, `ActivityName`, `ActivityDesc`, `ActivityBudget`, `PeopleInvolve`, `StartDate`, `FinishDate`, `ActivityStatus`) VALUES
(1, 3, 'Structural Process', 'Tagaayos ng mga bagay bagay', '600.00', 3, '2018-03-23', '2018-03-24', b'1'),
(2, 2, 'Zone Clean Up', 'Tra Lines!', '30.00', 9, '2018-03-22', '2018-03-24', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectcategory`
--

CREATE TABLE `bitdb_r_projectcategory` (
  `ProjectCategoryID` int(11) NOT NULL,
  `ProjectCategory` varchar(100) NOT NULL,
  `ProjectCategoryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_projectcategory`
--

INSERT INTO `bitdb_r_projectcategory` (`ProjectCategoryID`, `ProjectCategory`, `ProjectCategoryDate`) VALUES
(1, 'Infrastructure', '2018-03-20'),
(2, 'Community Project', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectdonation`
--

CREATE TABLE `bitdb_r_projectdonation` (
  `DonationID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `DonorName` varchar(200) NOT NULL,
  `MoneyDonated` decimal(15,2) DEFAULT '0.00',
  `DateGiven` date NOT NULL,
  `DateRecorded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_projectdonation`
--

INSERT INTO `bitdb_r_projectdonation` (`DonationID`, `ProjectID`, `DonorName`, `MoneyDonated`, `DateGiven`, `DateRecorded`) VALUES
(1, 3, 'Aces', '8000.00', '2018-03-22', '2018-03-22'),
(2, 3, 'Aurelia', '9000.00', '2018-03-23', '2018-03-24'),
(3, 2, 'Aces', '500.00', '2018-03-21', '2018-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_summons`
--

CREATE TABLE `bitdb_r_summons` (
  `SummonID` int(11) NOT NULL,
  `BlotterID` int(11) NOT NULL,
  `SummonSched` date NOT NULL,
  `SummonPlace` varchar(100) NOT NULL,
  `SummonStatus` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_summons`
--

INSERT INTO `bitdb_r_summons` (`SummonID`, `BlotterID`, `SummonSched`, `SummonPlace`, `SummonStatus`) VALUES
(1, 2, '2018-03-24', 'Kabilang Kanto', b'1'),
(2, 1, '2018-03-31', 'Tindahan nila at sa iba pa', b'1'),
(3, 4, '2018-03-22', 'asdfhdfgh', b'1'),
(4, 5, '2018-03-18', 'hkjhjk', b'1'),
(5, 3, '2018-03-23', 'Kahit saan', b'1'),
(6, 3, '2018-03-24', 'Kahit saan Ulet', b'1'),
(7, 4, '0000-00-00', '', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitdb_r_barangayofficial`
--
ALTER TABLE `bitdb_r_barangayofficial`
  ADD PRIMARY KEY (`Brgy_Official_ID`),
  ADD KEY `FK_CitizenID` (`CitizenID`),
  ADD KEY `FK_PosID` (`PosID`);

--
-- Indexes for table `bitdb_r_barangayposition`
--
ALTER TABLE `bitdb_r_barangayposition`
  ADD PRIMARY KEY (`PosID`);

--
-- Indexes for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `FK_OfficialUserAccounts` (`Brgy_Official_ID`);

--
-- Indexes for table `bitdb_r_barangayzone`
--
ALTER TABLE `bitdb_r_barangayzone`
  ADD PRIMARY KEY (`ZoneID`),
  ADD KEY `FK_ZoneBarangayIdentity` (`BarangayIdentity`);

--
-- Indexes for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  ADD PRIMARY KEY (`BlotterID`),
  ADD KEY `FK_BlotterAccused` (`Accused`),
  ADD KEY `BlotterType` (`BlotterType`),
  ADD KEY `FK_IncidentArea` (`IncidentArea`);

--
-- Indexes for table `bitdb_r_blottercategory`
--
ALTER TABLE `bitdb_r_blottercategory`
  ADD PRIMARY KEY (`BlotterCategoryID`);

--
-- Indexes for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  ADD PRIMARY KEY (`BusinessID`),
  ADD KEY `FK_BusinessCategory` (`BusinessCategory`);

--
-- Indexes for table `bitdb_r_businesscategory`
--
ALTER TABLE `bitdb_r_businesscategory`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  ADD PRIMARY KEY (`Citizen_ID`);

--
-- Indexes for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  ADD PRIMARY KEY (`BarangayIdentity`),
  ADD KEY `FK_Signatories` (`Signatory`);

--
-- Indexes for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  ADD PRIMARY KEY (`IssuanceID`),
  ADD KEY `FK_IssuanceCitizenID` (`CitizenID`),
  ADD KEY `FK_IssuanceBusinessID` (`BusinessID`),
  ADD KEY `FK_IssuanceType` (`IssuanceType`);

--
-- Indexes for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  ADD PRIMARY KEY (`IssuanceID`),
  ADD KEY `FK_BarangayIdentity` (`BarangayIdentity`);

--
-- Indexes for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  ADD PRIMARY KEY (`OrdinanceID`),
  ADD KEY `FK_OrdCategory` (`CategoryID`);

--
-- Indexes for table `bitdb_r_ordinancecategory`
--
ALTER TABLE `bitdb_r_ordinancecategory`
  ADD PRIMARY KEY (`OrdCategoryID`);

--
-- Indexes for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `FK_ProjectCategory` (`ProjectCategory`),
  ADD KEY `FK_ProjectLocation` (`ProjectLocation`);

--
-- Indexes for table `bitdb_r_projectactivity`
--
ALTER TABLE `bitdb_r_projectactivity`
  ADD PRIMARY KEY (`ActivityID`),
  ADD KEY `FK_ProjectActivityID` (`ProjectID`),
  ADD KEY `FK_ActivityInvolve` (`PeopleInvolve`);

--
-- Indexes for table `bitdb_r_projectcategory`
--
ALTER TABLE `bitdb_r_projectcategory`
  ADD PRIMARY KEY (`ProjectCategoryID`);

--
-- Indexes for table `bitdb_r_projectdonation`
--
ALTER TABLE `bitdb_r_projectdonation`
  ADD PRIMARY KEY (`DonationID`),
  ADD KEY `FK_ProjectDonation` (`ProjectID`);

--
-- Indexes for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  ADD PRIMARY KEY (`SummonID`),
  ADD KEY `FK_BlotterID` (`BlotterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitdb_r_barangayofficial`
--
ALTER TABLE `bitdb_r_barangayofficial`
  MODIFY `Brgy_Official_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayposition`
--
ALTER TABLE `bitdb_r_barangayposition`
  MODIFY `PosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayzone`
--
ALTER TABLE `bitdb_r_barangayzone`
  MODIFY `ZoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  MODIFY `BlotterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_blottercategory`
--
ALTER TABLE `bitdb_r_blottercategory`
  MODIFY `BlotterCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  MODIFY `BusinessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bitdb_r_businesscategory`
--
ALTER TABLE `bitdb_r_businesscategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  MODIFY `Citizen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  MODIFY `BarangayIdentity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  MODIFY `OrdinanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinancecategory`
--
ALTER TABLE `bitdb_r_ordinancecategory`
  MODIFY `OrdCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_projectactivity`
--
ALTER TABLE `bitdb_r_projectactivity`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_projectcategory`
--
ALTER TABLE `bitdb_r_projectcategory`
  MODIFY `ProjectCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_projectdonation`
--
ALTER TABLE `bitdb_r_projectdonation`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  MODIFY `SummonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bitdb_r_barangayofficial`
--
ALTER TABLE `bitdb_r_barangayofficial`
  ADD CONSTRAINT `FK_CitizenID` FOREIGN KEY (`CitizenID`) REFERENCES `bitdb_r_citizen` (`Citizen_ID`),
  ADD CONSTRAINT `FK_PosID` FOREIGN KEY (`PosID`) REFERENCES `bitdb_r_barangayposition` (`PosID`);

--
-- Constraints for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  ADD CONSTRAINT `FK_OfficialUserAccounts` FOREIGN KEY (`Brgy_Official_ID`) REFERENCES `bitdb_r_barangayofficial` (`Brgy_Official_ID`);

--
-- Constraints for table `bitdb_r_barangayzone`
--
ALTER TABLE `bitdb_r_barangayzone`
  ADD CONSTRAINT `FK_ZoneBarangayIdentity` FOREIGN KEY (`BarangayIdentity`) REFERENCES `bitdb_r_config` (`BarangayIdentity`);

--
-- Constraints for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  ADD CONSTRAINT `FK_BlotterAccused` FOREIGN KEY (`Accused`) REFERENCES `bitdb_r_citizen` (`Citizen_ID`),
  ADD CONSTRAINT `FK_BlotterSubject` FOREIGN KEY (`BlotterType`) REFERENCES `bitdb_r_blottercategory` (`BlotterCategoryID`),
  ADD CONSTRAINT `FK_IncidentArea` FOREIGN KEY (`IncidentArea`) REFERENCES `bitdb_r_barangayzone` (`ZoneID`);

--
-- Constraints for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  ADD CONSTRAINT `FK_BusinessCategory` FOREIGN KEY (`BusinessCategory`) REFERENCES `bitdb_r_businesscategory` (`categoryID`);

--
-- Constraints for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  ADD CONSTRAINT `FK_Signatories` FOREIGN KEY (`Signatory`) REFERENCES `bitdb_r_barangayofficial` (`Brgy_Official_ID`);

--
-- Constraints for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  ADD CONSTRAINT `FK_IssuanceBusinessID` FOREIGN KEY (`BusinessID`) REFERENCES `bitdb_r_business` (`BusinessID`),
  ADD CONSTRAINT `FK_IssuanceCitizenID` FOREIGN KEY (`CitizenID`) REFERENCES `bitdb_r_citizen` (`Citizen_ID`),
  ADD CONSTRAINT `FK_IssuanceType` FOREIGN KEY (`IssuanceType`) REFERENCES `bitdb_r_issuancetype` (`IssuanceID`);

--
-- Constraints for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  ADD CONSTRAINT `FK_BarangayIdentity` FOREIGN KEY (`BarangayIdentity`) REFERENCES `bitdb_r_config` (`BarangayIdentity`);

--
-- Constraints for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  ADD CONSTRAINT `FK_OrdCategory` FOREIGN KEY (`CategoryID`) REFERENCES `bitdb_r_ordinancecategory` (`OrdCategoryID`);

--
-- Constraints for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  ADD CONSTRAINT `FK_ProjectCategory` FOREIGN KEY (`ProjectCategory`) REFERENCES `bitdb_r_projectcategory` (`ProjectCategoryID`),
  ADD CONSTRAINT `FK_ProjectLocation` FOREIGN KEY (`ProjectLocation`) REFERENCES `bitdb_r_barangayzone` (`ZoneID`);

--
-- Constraints for table `bitdb_r_projectactivity`
--
ALTER TABLE `bitdb_r_projectactivity`
  ADD CONSTRAINT `FK_ActivityInvolve` FOREIGN KEY (`PeopleInvolve`) REFERENCES `bitdb_r_citizen` (`Citizen_ID`),
  ADD CONSTRAINT `FK_ProjectActivityID` FOREIGN KEY (`ProjectID`) REFERENCES `bitdb_r_project` (`ProjectID`);

--
-- Constraints for table `bitdb_r_projectdonation`
--
ALTER TABLE `bitdb_r_projectdonation`
  ADD CONSTRAINT `FK_ProjectDonation` FOREIGN KEY (`ProjectID`) REFERENCES `bitdb_r_project` (`ProjectID`);

--
-- Constraints for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  ADD CONSTRAINT `FK_BlotterID` FOREIGN KEY (`BlotterID`) REFERENCES `bitdb_r_blotter` (`BlotterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
