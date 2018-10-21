-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 05:52 PM
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
  `Official_Status` bit(1) NOT NULL DEFAULT b'0',
  `ActUser` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_barangayofficial`
--

INSERT INTO `bitdb_r_barangayofficial` (`Brgy_Official_ID`, `CitizenID`, `PosID`, `StartTerm`, `EndTerm`, `Official_Status`, `ActUser`) VALUES
(1, 1, 3, '2018-10-21', '2018-10-31', b'1', b'1'),
(2, 2, 2, '2018-10-21', '2018-10-31', b'1', b'1');

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
(1, 'Admin', 'Administrator', b'1'),
(2, 'Barangay Captain', 'The Chairman of the Barangay', b'1'),
(3, 'Secretary', 'The one who holds the document', b'1');

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
(1, NULL, 'admin', 'admin', 0),
(2, 1, 'secretary', 'secretary', 1),
(3, 2, 'barangaycap', 'barangaycap', 2);

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
(1, 1, 'Zone 1', b'1', '2018-10-21'),
(3, 1, 'Zone 2', b'1', '2018-10-21'),
(4, 1, 'Zone 3', b'1', '2018-10-21'),
(5, 1, 'Zone 4', b'1', '2018-10-21'),
(6, 1, 'Zone 5', b'1', '2018-10-21');

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
(1, 'Theft', '2018-10-21'),
(2, 'Violence', '2018-10-21'),
(3, 'Lost Item', '2018-10-21'),
(4, 'Scandal', '2018-10-21'),
(5, 'Abuse', '2018-10-21');

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
(1, 'Biglang Gwapo', 1, 'Lowell Dave Agnir', 'Lamar Village', NULL, b'0', 1),
(2, 'Kyah Pembarya', 4, 'Kyah', 'Lamar Village', NULL, b'0', 3);

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
(1, 'Barber Shop', 'A place where hairs are everywhere', '2018-10-21'),
(2, 'Pizza Shop', 'A place where pizza begins', '2018-10-21'),
(3, 'Carinderia', 'A place where food is great', '2018-10-21');

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
(1, 'Mr.', 'Lowell Dave', 'Elba', 'Agnir', '', 'lowell.agnir@gmail.com', 66.0000, 27.0000, '1999-04-21', 'Sampaloc, Manila', 'Filipino', b'1', 'Single', '', 'M', 'O+', 'Blk 17', 'Lot 11', 1, '2018-10-21', '', '0', NULL, NULL),
(2, 'Mr.', 'Lawrence', 'Elba', 'Agnir', '', 'lawrence.agnir@gmail.com', 62.0000, 35.0000, '1992-07-16', 'San Mateo, Rizal', 'Filipino', b'1', 'Single', 'Programmer', 'M', 'O+', '56', '32', 3, '2018-10-21', NULL, NULL, NULL, NULL);

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
(1, 'Rizal', 'M', 'San Mateo', 'C', 'Ampid I', 'Cosmos.png', 'Chaos.png');

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
(1, 1, NULL, 1, 'For good purpose', '2018-10-21'),
(2, NULL, 1, 2, NULL, '2018-10-21');

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
  `Persons_Involved` varchar(200) DEFAULT NULL,
  `OrdDesc` varchar(200) NOT NULL,
  `DateImplemented` date NOT NULL,
  `OrdStatus` bit(1) NOT NULL DEFAULT b'1',
  `Sanction` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_ordinance`
--

INSERT INTO `bitdb_r_ordinance` (`OrdinanceID`, `OrdinanceTitle`, `CategoryID`, `Persons_Involved`, `OrdDesc`, `DateImplemented`, `OrdStatus`, `Sanction`) VALUES
(2, 'No Clean No Life', 1, '1', 'Linis Barangay is very important for all of us', '2018-10-21', b'1', ' '),
(3, 'Curfew', 2, '2', 'Dapat Laging nasa tama ~ ', '2018-10-21', b'1', '1st Offense  - Kulong 10 minutes\r\n2nd Offense  - Kulong 30 minutes\r\n3rd Offense  - Kulong 1 hour'),
(4, 'Chicken Noodles ay Masarap', 1, '', 'Masarap ang Chicken Noodles', '2018-10-21', b'1', '');

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinanceauthor`
--

CREATE TABLE `bitdb_r_ordinanceauthor` (
  `OrdinanceID` int(11) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitdb_r_ordinanceauthor`
--

INSERT INTO `bitdb_r_ordinanceauthor` (`OrdinanceID`, `Author`, `Status`) VALUES
(2, 'Lowell Dave', b'1'),
(3, 'Lawrence', b'1'),
(4, 'Lara', b'1');

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
(1, 'Peace'),
(2, 'Order'),
(3, 'Clean');

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

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectcategory`
--

CREATE TABLE `bitdb_r_projectcategory` (
  `ProjectCategoryID` int(11) NOT NULL,
  `ProjectCategory` varchar(100) NOT NULL,
  `ProjectCategoryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `bitdb_r_ordinanceauthor`
--
ALTER TABLE `bitdb_r_ordinanceauthor`
  ADD KEY `FK_AuthorOrdinanceID` (`OrdinanceID`);

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
  MODIFY `Brgy_Official_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayposition`
--
ALTER TABLE `bitdb_r_barangayposition`
  MODIFY `PosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayzone`
--
ALTER TABLE `bitdb_r_barangayzone`
  MODIFY `ZoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  MODIFY `BlotterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_blottercategory`
--
ALTER TABLE `bitdb_r_blottercategory`
  MODIFY `BlotterCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  MODIFY `BusinessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_businesscategory`
--
ALTER TABLE `bitdb_r_businesscategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  MODIFY `Citizen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  MODIFY `BarangayIdentity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  MODIFY `OrdinanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinancecategory`
--
ALTER TABLE `bitdb_r_ordinancecategory`
  MODIFY `OrdCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_projectactivity`
--
ALTER TABLE `bitdb_r_projectactivity`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_projectcategory`
--
ALTER TABLE `bitdb_r_projectcategory`
  MODIFY `ProjectCategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_projectdonation`
--
ALTER TABLE `bitdb_r_projectdonation`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  MODIFY `SummonID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `bitdb_r_ordinanceauthor`
--
ALTER TABLE `bitdb_r_ordinanceauthor`
  ADD CONSTRAINT `FK_AuthorOrdinanceID` FOREIGN KEY (`OrdinanceID`) REFERENCES `bitdb_r_ordinance` (`OrdinanceID`);

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
