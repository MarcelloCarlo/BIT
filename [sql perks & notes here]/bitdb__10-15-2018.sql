-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 05:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
DROP DATABASE IF EXISTS `bitdb`;
CREATE DATABASE `bitdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci; 
USE `bitdb`;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayofficial`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_barangayofficial`;
CREATE TABLE IF NOT EXISTS `bitdb_r_barangayofficial` (
  `Brgy_Official_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CitizenID` int(11) NOT NULL,
  `PosID` int(11) DEFAULT NULL,
  `StartTerm` date NOT NULL,
  `EndTerm` date NOT NULL,
  `ActUser` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`Brgy_Official_ID`),
  KEY `FK_CitizenID` (`CitizenID`),
  KEY `FK_PosID` (`PosID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_barangayofficial`:
--   `CitizenID`
--       `bitdb_r_citizen` -> `Citizen_ID`
--   `PosID`
--       `bitdb_r_barangayposition` -> `PosID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayposition`
--
-- Creation: Oct 15, 2018 at 07:46 AM
--

DROP TABLE IF EXISTS `bitdb_r_barangayposition`;
CREATE TABLE IF NOT EXISTS `bitdb_r_barangayposition` (
  `PosID` int(11) NOT NULL AUTO_INCREMENT,
  `PosName` varchar(50) NOT NULL,
  `PosDesc` varchar(200) NOT NULL,
  `PosStat` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`PosID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_barangayposition`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayuseraccounts`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_barangayuseraccounts`;
CREATE TABLE IF NOT EXISTS `bitdb_r_barangayuseraccounts` (
  `AccountID` int(11) NOT NULL AUTO_INCREMENT,
  `Brgy_Official_ID` int(11) DEFAULT NULL,
  `AccountUsername` varchar(12) NOT NULL,
  `AccountPassword` varchar(12) NOT NULL,
  `AccountUserType` int(11) DEFAULT NULL,
  PRIMARY KEY (`AccountID`),
  KEY `FK_OfficialUserAccounts` (`Brgy_Official_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_barangayuseraccounts`:
--   `Brgy_Official_ID`
--       `bitdb_r_barangayofficial` -> `Brgy_Official_ID`
--

--
-- Dumping data for table `bitdb_r_barangayuseraccounts`
--

INSERT INTO `bitdb_r_barangayuseraccounts` (`AccountID`, `Brgy_Official_ID`, `AccountUsername`, `AccountPassword`, `AccountUserType`) VALUES
(14, NULL, 'sysadmin', 'sysadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayzone`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_barangayzone`;
CREATE TABLE IF NOT EXISTS `bitdb_r_barangayzone` (
  `ZoneID` int(11) NOT NULL AUTO_INCREMENT,
  `BarangayIdentity` int(11) NOT NULL,
  `Zone` varchar(100) NOT NULL,
  `ZoneStatus` bit(1) DEFAULT b'1',
  `ZoneDate` date NOT NULL,
  PRIMARY KEY (`ZoneID`),
  KEY `FK_ZoneBarangayIdentity` (`BarangayIdentity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_barangayzone`:
--   `BarangayIdentity`
--       `bitdb_r_config` -> `BarangayIdentity`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_blotter`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_blotter`;
CREATE TABLE IF NOT EXISTS `bitdb_r_blotter` (
  `BlotterID` int(11) NOT NULL AUTO_INCREMENT,
  `IncidentDate` date NOT NULL,
  `IncidentArea` int(11) DEFAULT NULL,
  `Complainant` varchar(200) NOT NULL,
  `Accused` int(11) DEFAULT NULL,
  `BlotterType` int(11) DEFAULT NULL,
  `ComplaintStatement` varchar(100) NOT NULL,
  `ComplaintStatus` bit(1) NOT NULL DEFAULT b'1',
  `Resolution` varchar(200) DEFAULT NULL,
  `ComplaintDate` date NOT NULL,
  PRIMARY KEY (`BlotterID`),
  KEY `FK_BlotterAccused` (`Accused`),
  KEY `BlotterType` (`BlotterType`),
  KEY `FK_IncidentArea` (`IncidentArea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_blotter`:
--   `Accused`
--       `bitdb_r_citizen` -> `Citizen_ID`
--   `BlotterType`
--       `bitdb_r_blottercategory` -> `BlotterCategoryID`
--   `IncidentArea`
--       `bitdb_r_barangayzone` -> `ZoneID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_blottercategory`
--
-- Creation: Oct 15, 2018 at 07:46 AM
--

DROP TABLE IF EXISTS `bitdb_r_blottercategory`;
CREATE TABLE IF NOT EXISTS `bitdb_r_blottercategory` (
  `BlotterCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `BlotterCategoryName` varchar(100) NOT NULL,
  `BlotterCategoryDate` date NOT NULL,
  PRIMARY KEY (`BlotterCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_blottercategory`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_business`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_business`;
CREATE TABLE IF NOT EXISTS `bitdb_r_business` (
  `BusinessID` int(11) NOT NULL AUTO_INCREMENT,
  `Business_Name` varchar(100) NOT NULL,
  `BusinessLoc` int(11) DEFAULT NULL,
  `Manager` varchar(100) NOT NULL,
  `Mgr_Address` varchar(200) NOT NULL,
  `Date_Issued` date DEFAULT NULL,
  `BusinessStatus` bit(1) NOT NULL DEFAULT b'1',
  `BusinessCategory` int(11) NOT NULL,
  PRIMARY KEY (`BusinessID`),
  KEY `FK_BusinessCategory` (`BusinessCategory`),
  KEY `FK_BusinessLoc` (`BusinessLoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_business`:
--   `BusinessCategory`
--       `bitdb_r_businesscategory` -> `categoryID`
--   `BusinessLoc`
--       `bitdb_r_barangayzone` -> `ZoneID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_businesscategory`
--
-- Creation: Oct 15, 2018 at 07:46 AM
--

DROP TABLE IF EXISTS `bitdb_r_businesscategory`;
CREATE TABLE IF NOT EXISTS `bitdb_r_businesscategory` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(200) NOT NULL,
  `categoryDate` date NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_businesscategory`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_citizen`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_citizen`;
CREATE TABLE IF NOT EXISTS `bitdb_r_citizen` (
  `Citizen_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `DigitalSign` blob,
  PRIMARY KEY (`Citizen_ID`),
  KEY `FK_CitizenZone` (`Zone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_citizen`:
--   `Zone`
--       `bitdb_r_barangayzone` -> `ZoneID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_config`
--
-- Creation: Oct 15, 2018 at 07:46 AM
--

DROP TABLE IF EXISTS `bitdb_r_config`;
CREATE TABLE IF NOT EXISTS `bitdb_r_config` (
  `BarangayIdentity` int(11) NOT NULL AUTO_INCREMENT,
  `ProvinceName` varchar(100) NOT NULL,
  `CityType` char(1) NOT NULL,
  `Municipality` varchar(100) NOT NULL,
  `BarangayType` char(1) NOT NULL,
  `BarangayName` varchar(100) NOT NULL,
  `MunicipalSeal` varchar(100) NOT NULL,
  `BarangaySeal` varchar(100) NOT NULL,
  PRIMARY KEY (`BarangayIdentity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_config`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuance`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_issuance`;
CREATE TABLE IF NOT EXISTS `bitdb_r_issuance` (
  `IssuanceID` int(11) NOT NULL AUTO_INCREMENT,
  `CitizenID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `IssuanceType` int(11) NOT NULL,
  `Purpose` varchar(200) DEFAULT NULL,
  `IssuanceDate` date NOT NULL,
  PRIMARY KEY (`IssuanceID`),
  KEY `FK_IssuanceCitizenID` (`CitizenID`),
  KEY `FK_IssuanceType` (`IssuanceType`),
  KEY `FK_IssuanceBusinessID` (`BusinessID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_issuance`:
--   `BusinessID`
--       `bitdb_r_business` -> `BusinessID`
--   `CitizenID`
--       `bitdb_r_citizen` -> `Citizen_ID`
--   `IssuanceType`
--       `bitdb_r_issuancetype` -> `IssuanceID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuancetype`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_issuancetype`;
CREATE TABLE IF NOT EXISTS `bitdb_r_issuancetype` (
  `IssuanceID` int(11) NOT NULL AUTO_INCREMENT,
  `IssuanceType` varchar(100) DEFAULT NULL,
  `IssuanceOption` varchar(50) DEFAULT NULL,
  `BarangayIdentity` int(11) DEFAULT NULL,
  PRIMARY KEY (`IssuanceID`),
  KEY `FK_BarangayIdentity` (`BarangayIdentity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_issuancetype`:
--   `BarangayIdentity`
--       `bitdb_r_config` -> `BarangayIdentity`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinance`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_ordinance`;
CREATE TABLE IF NOT EXISTS `bitdb_r_ordinance` (
  `OrdinanceID` int(11) NOT NULL AUTO_INCREMENT,
  `OrdinanceTitle` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Persons_Involved` varchar(200) DEFAULT NULL,
  `OrdDesc` varchar(200) NOT NULL,
  `DateImplemented` date NOT NULL,
  `OrdStatus` bit(1) NOT NULL DEFAULT b'1',
  `Sanction` varchar(200) NOT NULL,
  PRIMARY KEY (`OrdinanceID`),
  KEY `FK_OrdCategory` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_ordinance`:
--   `CategoryID`
--       `bitdb_r_ordinancecategory` -> `OrdCategoryID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinancecategory`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_ordinancecategory`;
CREATE TABLE IF NOT EXISTS `bitdb_r_ordinancecategory` (
  `OrdCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `OrdinanceTitle` varchar(200) NOT NULL,
  PRIMARY KEY (`OrdCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_ordinancecategory`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_project`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_project`;
CREATE TABLE IF NOT EXISTS `bitdb_r_project` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(100) NOT NULL,
  `ProjectCategory` int(11) DEFAULT NULL,
  `ProjectLocation` int(11) DEFAULT NULL,
  `ProjectDesc` varchar(500) NOT NULL,
  `ProjectStatus` int(11) NOT NULL,
  `ProjectBudget` decimal(15,2) DEFAULT '0.00',
  PRIMARY KEY (`ProjectID`),
  KEY `FK_ProjectCategory` (`ProjectCategory`),
  KEY `FK_ProjectLocation` (`ProjectLocation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_project`:
--   `ProjectCategory`
--       `bitdb_r_projectcategory` -> `ProjectCategoryID`
--   `ProjectLocation`
--       `bitdb_r_barangayzone` -> `ZoneID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectactivity`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_projectactivity`;
CREATE TABLE IF NOT EXISTS `bitdb_r_projectactivity` (
  `ActivityID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `ActivityName` varchar(200) NOT NULL,
  `ActivityDesc` varchar(200) DEFAULT NULL,
  `ActivityBudget` decimal(15,2) DEFAULT '0.00',
  `PeopleInvolve` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `ActivityStatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`ActivityID`),
  KEY `FK_ProjectActivityID` (`ProjectID`),
  KEY `FK_ActivityInvolve` (`PeopleInvolve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_projectactivity`:
--   `PeopleInvolve`
--       `bitdb_r_citizen` -> `Citizen_ID`
--   `ProjectID`
--       `bitdb_r_project` -> `ProjectID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectcategory`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_projectcategory`;
CREATE TABLE IF NOT EXISTS `bitdb_r_projectcategory` (
  `ProjectCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectCategory` varchar(100) NOT NULL,
  `ProjectCategoryDate` date NOT NULL,
  PRIMARY KEY (`ProjectCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_projectcategory`:
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_projectdonation`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_projectdonation`;
CREATE TABLE IF NOT EXISTS `bitdb_r_projectdonation` (
  `DonationID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `DonorName` varchar(200) NOT NULL,
  `MoneyDonated` decimal(15,2) DEFAULT '0.00',
  `DateGiven` date NOT NULL,
  `DateRecorded` date DEFAULT NULL,
  PRIMARY KEY (`DonationID`),
  KEY `FK_ProjectDonation` (`ProjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_projectdonation`:
--   `ProjectID`
--       `bitdb_r_project` -> `ProjectID`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_summons`
--
-- Creation: Oct 15, 2018 at 07:47 AM
--

DROP TABLE IF EXISTS `bitdb_r_summons`;
CREATE TABLE IF NOT EXISTS `bitdb_r_summons` (
  `SummonID` int(11) NOT NULL AUTO_INCREMENT,
  `BlotterID` int(11) NOT NULL,
  `SummonSched` date NOT NULL,
  `SummonPlace` varchar(100) NOT NULL,
  `SummonStatus` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`SummonID`),
  KEY `FK_BlotterID` (`BlotterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bitdb_r_summons`:
--   `BlotterID`
--       `bitdb_r_blotter` -> `BlotterID`
--

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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table bitdb_r_barangayofficial
--

--
-- Metadata for table bitdb_r_barangayposition
--

--
-- Metadata for table bitdb_r_barangayuseraccounts
--

--
-- Metadata for table bitdb_r_barangayzone
--

--
-- Metadata for table bitdb_r_blotter
--

--
-- Metadata for table bitdb_r_blottercategory
--

--
-- Metadata for table bitdb_r_business
--

--
-- Metadata for table bitdb_r_businesscategory
--

--
-- Metadata for table bitdb_r_citizen
--

--
-- Metadata for table bitdb_r_config
--

--
-- Metadata for table bitdb_r_issuance
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'bitdb', 'bitdb_r_issuance', '{\"sorted_col\":\"`bitdb_r_issuance`.`IssuanceType` ASC\"}', '2018-10-15 10:11:09');

--
-- Metadata for table bitdb_r_issuancetype
--

--
-- Metadata for table bitdb_r_ordinance
--

--
-- Metadata for table bitdb_r_ordinancecategory
--

--
-- Metadata for table bitdb_r_project
--

--
-- Metadata for table bitdb_r_projectactivity
--

--
-- Metadata for table bitdb_r_projectcategory
--

--
-- Metadata for table bitdb_r_projectdonation
--

--
-- Metadata for table bitdb_r_summons
--

--
-- Metadata for database bitdb
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
