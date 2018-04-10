-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 12:51 PM
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
  `PosID` int(11) DEFAULT NULL,
  `StartTerm` date NOT NULL,
  `EndTerm` date NOT NULL,
  `ActUser` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayofficial`
--

INSERT INTO `bitdb_r_barangayofficial` (`Brgy_Official_ID`, `CitizenID`, `PosID`, `StartTerm`, `EndTerm`, `ActUser`) VALUES
(9, 12, 7, '2018-03-24', '2018-03-31', b'1'),
(10, 13, 8, '2018-03-24', '2018-03-31', b'1'),
(11, 14, 9, '2018-03-19', '2018-03-31', b'1'),
(12, 20, 8, '2018-03-29', '2018-03-21', b'1'),
(13, 21, 12, '2018-04-02', '2021-04-02', b'0'),
(14, 15, 11, '2018-04-02', '2018-04-02', b'1'),
(15, 22, NULL, '2018-04-03', '2021-04-03', b'0'),
(16, 19, 10, '2018-04-03', '2021-04-03', b'1');

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
(7, 'Admin', 'Administers and manages the configuration of the website', b'1'),
(8, 'Secretary', 'Secretary', b'1'),
(9, 'Barangay Captain', 'Description for Barangay Captain', b'1'),
(10, 'Chief Tanod', 'Chief Tanod', b'1'),
(11, 'Census Officer', 'Descriptions for Census Officer', b'1'),
(12, 'PIO', '', b'1');

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
(7, 9, 'admin', 'admin', 0),
(8, 10, 'Secretary', 'secretary', 1),
(9, 11, 'barangaycap', 'barangaycap', 2),
(10, 12, 'Chief', 'chief', 2),
(11, 13, 'extra01', 'extra01', 4),
(12, 14, 'censusoffice', 'censusoffice', 4),
(13, 16, 'chieftanod', 'chieftanod', 3);

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
(4, 3, 'Zone 1', b'1', '2018-03-24'),
(5, 3, 'Zone A', b'1', '2018-04-02');

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
  `Resolution` varchar(200) DEFAULT NULL,
  `ComplaintDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_blotter`
--

INSERT INTO `bitdb_r_blotter` (`BlotterID`, `IncidentDate`, `IncidentArea`, `Complainant`, `Accused`, `BlotterType`, `ComplaintStatement`, `ComplaintStatus`, `Resolution`, `ComplaintDate`) VALUES
(6, '2018-03-08', 4, 'Carlo', 13, 3, 'Ung tote bag ko nawala', b'1', 'Missing', '2018-03-22'),
(7, '2018-03-15', 4, 'Carlo', 18, 4, 'Pinatay ung ipis namin', b'1', 'Sue Him', '2018-03-23'),
(8, '2018-03-01', 4, 'Bryan', 16, 3, 'Theft of charger', b'0', 'Sue Him', '2018-03-22'),
(9, '2018-04-06', 4, 'qwerty', NULL, 3, 'qwerty', b'1', NULL, '2018-04-21'),
(10, '2018-04-01', 5, 'Ceriaco Respecia', 14, 3, 'Insert complaint statement here', b'0', 'Closed', '2018-04-03'),
(11, '2018-04-28', 5, 'Ceriaco Respecia', 13, 4, 'A complaint for killing a dog', b'1', NULL, '2018-04-30');

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
(3, 'Thefts', '2018-03-24'),
(4, 'Murder', '2018-03-24'),
(5, 'Kidnapping', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_business`
--

CREATE TABLE `bitdb_r_business` (
  `BusinessID` int(11) NOT NULL,
  `Business_Name` varchar(100) NOT NULL,
  `BusinessLoc` int(11) DEFAULT NULL,
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
(5, 'Pagupitan Ni carlita', 4, 'Carlo Gutierrez', 'Datu Puti Philippines', NULL, b'0', 8),
(6, 'Lowell\'s Sari-Sari Store', 5, 'Lowell Dave Agnir', '132 Catalina st. Unit IV Barangay Commonwealth, Quezon CIty', NULL, b'0', 9);

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
(8, 'Parlor', 'pampaganda', '2018-03-24'),
(9, 'Sari-sari store', 'Small market business', '2018-04-02');

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
  `Gender` varchar(6) NOT NULL,
  `Blood_Type` varchar(3) NOT NULL,
  `House_No` varchar(10) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Zone` int(11) DEFAULT NULL,
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
(12, 'Mr.', 'Lowell Dave', 'Elba', 'Agnir', '', 'lowell.agnir@yahoo.com', 51.0000, 60.0000, '2017-04-21', 'Sampaloc,Manila', 'Filipino', b'1', 'Single', 'Video Editor', '', 'AB+', 'B17 L11', 'St.Matthew St.', 4, '2018-03-24', 'Lilibeth Agnir', '91234567889', NULL, NULL),
(13, 'Mr.', 'Carlo', 'Villar', 'Gutierrez', '', 'carlo.gutierrez@gmail.com', 124.0000, 58.0000, '1998-12-30', 'Quezon City', 'Filipino', b'1', 'Single', 'UI Designer', '', 'O+', 'B12 L43', 'St.Any St.', 4, '2018-03-24', '', '0', NULL, NULL),
(14, 'Ms.', 'Jasmine Mae', NULL, 'Montano', NULL, 'Jasmine.Montano@gmail.com', 120.0000, 65.0000, '1998-06-09', 'Quezon City', 'Filipino', b'1', 'Single', 'Programmer', 'F', 'B', 'B90 L31', 'Any St.', 4, '2018-03-24', NULL, NULL, NULL, NULL),
(15, 'Mr.', 'Carlo', 'Bak', 'Gutierrez', 'Jr.', '', 26.0000, 80.0000, '1999-02-02', 'Quezon', 'Filipino', b'1', 'Single', '', 'M', 'O', '', 'Mangga', 4, '2018-03-24', NULL, NULL, NULL, NULL),
(16, 'Mr.', 'Carlo', 'Bak', 'Gutierrez', 'Jr.', '', 26.0000, 80.0000, '1999-02-02', 'Quezon', 'Filipino', b'1', 'Single', '', 'M', 'O', 'B17 L90', 'Mangga', 4, '2018-03-24', NULL, NULL, NULL, NULL),
(17, 'Mr.', 'Carlo', 'Bak', 'Gutierrez', 'Jr.', '', 26.0000, 80.0000, '1999-02-02', 'Quezon', 'Filipino', b'1', 'Single', '', 'M', 'O', 'B17 L90', 'Mangga', 4, '2018-03-24', NULL, NULL, NULL, NULL),
(18, 'Mr.', 'Bryan', 'Gutierrez', 'Cor', 'Jr', '', 10.0000, 70.0000, '2018-03-05', 'Montalban', 'Filipino', b'1', 'Married', '', '', 'O+', '234', 'bato-bato', 4, '2018-03-24', 'John carlo Gutierrez', '0', NULL, NULL),
(19, 'Mr.', 'Lawrence', 'Elba', 'Agnir', '', 'lawrence.agnir@gmail.com', 56.0000, 76.0000, '1996-07-16', 'Manila', 'Filipino', b'1', 'Single', 'Programmer', 'M', 'A', '341', '23', 4, '2018-03-26', NULL, NULL, NULL, NULL),
(20, 'Mr.', 'Lawrence', 'Elba', 'Agnir', '', 'lawrence.agnir@gmail.com', 56.0000, 76.0000, '1996-07-16', 'Manila', 'Filipino', b'1', 'Single', 'Programmer', 'M', 'A', '341', '23', 4, '2018-03-26', NULL, NULL, NULL, NULL),
(21, 'Mr.', 'Peter', 'John', 'Teneza', 'III', 'trapeze@gmail.com', 5.0000, 64.0000, '1997-09-14', 'Vigan', 'Filipino', b'1', 'Married', 'Programmer', 'Male', 'A+', '32', 'Kalapati', 4, '2018-04-02', NULL, NULL, NULL, NULL),
(22, 'Mr.', 'Peter ', 'John', 'Parker', 'II', 'Petetrapeze@gmail.com', 5.0000, 64.0000, '1991-04-21', 'Quezon City', 'Filipino', b'1', 'Single', 'Photographer', 'Male', 'O+', '334', 'Woodrow', 4, '2018-04-02', NULL, NULL, NULL, NULL),
(23, 'Mr.', 'Jeremiah ', 'Dumagpi', 'Paulo', '', 'PauloJeremiah@gmail.com', 5.0000, 63.0000, '1998-12-30', 'Quezon City', 'Filipino', b'1', 'Single', '', 'M', 'B+', '1329', 'Adarna', 5, '2018-04-02', 'Peter John Teneza', '9876543212', NULL, NULL);

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
  `MunicipalSeal` varchar(100) NOT NULL,
  `BarangaySeal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_config`
--

INSERT INTO `bitdb_r_config` (`BarangayIdentity`, `ProvinceName`, `CityType`, `Municipality`, `BarangayType`, `BarangayName`, `MunicipalSeal`, `BarangaySeal`) VALUES
(3, 'Metro Manila', 'C', 'Quezon City', 'I', 'Tandang Sora', 'provincelogo.png', 'barangay logo117x119.png');

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
(7, 12, NULL, 4, 'Legal purpose', '2018-03-24'),
(8, NULL, 5, 6, NULL, '2018-03-24'),
(9, 16, NULL, 4, '', '2018-03-24'),
(10, 12, NULL, 8, 'School Requirement', '2018-04-02'),
(11, 12, NULL, 4, 'For foreign accreditation', '2018-04-02'),
(12, 12, NULL, 4, '', '2018-04-02'),
(13, 14, NULL, 4, 'asdasd', '2018-04-02'),
(14, 15, NULL, 4, 'sdfsd', '2018-04-02'),
(15, 14, NULL, 4, 'zdfs', '2018-04-02'),
(16, 19, NULL, 4, 'asdasdasd', '2018-04-02'),
(17, NULL, 5, 6, NULL, '2018-04-02'),
(18, NULL, 6, 6, NULL, '2018-04-02'),
(19, 12, NULL, 4, 'Work purposes', '2018-04-02'),
(20, NULL, 5, 6, NULL, '2018-04-02');

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
(4, 'Barangay Clearance', 'Personal', NULL),
(5, 'Indigency', 'Personal', NULL),
(6, 'Business Permit', 'Business', NULL),
(7, 'Birth Certificate', 'Personal', NULL),
(8, 'Birth Certificate', 'Personal', NULL);

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
(6, 'Curfew', 3, 'Senator Carlo', 'Bryan', 'No kids at night or party', '2018-01-01', b'1', 'Community Serivce'),
(7, 'Linis barangay', 4, 'Carlo Gutierez', 'Peter John Teneza', 'For barangay sanitation', '2018-04-11', b'1', 'a fine of 5,000 pesos only'),
(8, 'Linis barangay', 4, 'Jeremiah Paulo', 'Peter John Teneza', 'Barangay cleaning', '2018-04-27', b'1', 'a fine of 5000 pesos only');

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
(3, 'Peace'),
(4, 'Barangay Sanitation');

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
(4, 'Pazumba ni Madame', 3, 4, 'For senior citizens', 1, '40000.00'),
(5, 'Quantum physics ni mayor', 4, 4, 'zzzzzz', 1, '100000.00'),
(6, 'Bayanihan', 5, 5, 'Housing construction', 1, '50.00'),
(7, 'Bayanihan', 5, 5, 'Building homes for fellow citizens', 1, '600000.00');

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
(1, 5, 'Phase 1 ', 'Phase 01 Desc', '20.00', 17, '2018-04-25', '2018-04-12', b'1'),
(2, 4, 'Phase01', 'First Phase', '30000.00', 12, '2018-04-06', '2018-04-19', b'0'),
(3, 6, 'Bayanihan part 01', 'qwerty', '50.00', 12, '2018-04-10', '2018-04-12', b'1');

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
(3, 'Health', '2018-03-24'),
(4, 'Education', '2018-03-24'),
(5, 'Infrastructure', '2018-04-02');

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
(1, 5, 'Aces', '20000.00', '2018-03-30', '2018-03-30'),
(2, 4, 'Mayora', '20.00', '2018-03-31', '2018-03-30'),
(3, 5, 'Aces 2', '5000.00', '2018-04-13', '2018-04-02');

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
(8, 7, '2018-03-25', 'Zone 1', b'1'),
(9, 8, '2018-03-29', 'Barangay', b'1'),
(10, 11, '2018-04-30', 'Barangay', b'0');

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
  ADD KEY `FK_BusinessCategory` (`BusinessCategory`),
  ADD KEY `FK_BusinessLoc` (`BusinessLoc`);

--
-- Indexes for table `bitdb_r_businesscategory`
--
ALTER TABLE `bitdb_r_businesscategory`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  ADD PRIMARY KEY (`Citizen_ID`),
  ADD KEY `FK_CitizenZone` (`Zone`);

--
-- Indexes for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  ADD PRIMARY KEY (`BarangayIdentity`);

--
-- Indexes for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  ADD PRIMARY KEY (`IssuanceID`),
  ADD KEY `FK_IssuanceCitizenID` (`CitizenID`),
  ADD KEY `FK_IssuanceType` (`IssuanceType`),
  ADD KEY `FK_IssuanceBusinessID` (`BusinessID`);

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
  MODIFY `Brgy_Official_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayposition`
--
ALTER TABLE `bitdb_r_barangayposition`
  MODIFY `PosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayzone`
--
ALTER TABLE `bitdb_r_barangayzone`
  MODIFY `ZoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  MODIFY `BlotterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bitdb_r_blottercategory`
--
ALTER TABLE `bitdb_r_blottercategory`
  MODIFY `BlotterCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  MODIFY `BusinessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bitdb_r_businesscategory`
--
ALTER TABLE `bitdb_r_businesscategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  MODIFY `Citizen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  MODIFY `BarangayIdentity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  MODIFY `OrdinanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinancecategory`
--
ALTER TABLE `bitdb_r_ordinancecategory`
  MODIFY `OrdCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bitdb_r_projectactivity`
--
ALTER TABLE `bitdb_r_projectactivity`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_projectcategory`
--
ALTER TABLE `bitdb_r_projectcategory`
  MODIFY `ProjectCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_projectdonation`
--
ALTER TABLE `bitdb_r_projectdonation`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  MODIFY `SummonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `FK_BusinessCategory` FOREIGN KEY (`BusinessCategory`) REFERENCES `bitdb_r_businesscategory` (`categoryID`),
  ADD CONSTRAINT `FK_BusinessLoc` FOREIGN KEY (`BusinessLoc`) REFERENCES `bitdb_r_barangayzone` (`ZoneID`);

--
-- Constraints for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  ADD CONSTRAINT `FK_CitizenZone` FOREIGN KEY (`Zone`) REFERENCES `bitdb_r_barangayzone` (`ZoneID`);

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
