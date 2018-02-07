-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 02:48 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_barangayuseraccounts`
--

CREATE TABLE `bitdb_r_barangayuseraccounts` (
  `AccountID` int(11) NOT NULL,
  `Brgy_Official_ID` int(11) DEFAULT NULL,
  `AccountUsername` varchar(12) NOT NULL,
  `AccountPassword` varchar(12) NOT NULL,
  `AccountUserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_blotter`
--

CREATE TABLE `bitdb_r_blotter` (
  `BlotterID` int(11) NOT NULL,
  `IncidentDate` date NOT NULL,
  `Complainant` varchar(200) NOT NULL,
  `Accused` int(11) DEFAULT NULL,
  `ComplaintStatement` varchar(100) NOT NULL,
  `ComplaintStatus` bit(1) NOT NULL DEFAULT b'1',
  `Resolution` varchar(200) NOT NULL,
  `BlotterType` varchar(50) NOT NULL,
  `ComplaintDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Date_Issued` date NOT NULL,
  `BusinessStatus` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Name_Ext` varchar(10) NOT NULL,
  `Citizen_Email` varchar(50) NOT NULL,
  `Height` float(18,4) NOT NULL,
  `Weight` float(18,4) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_config`
--

CREATE TABLE `bitdb_r_config` (
  `BarangayIdentity` int(11) NOT NULL,
  `ProvinceName` varchar(100) NOT NULL,
  `Municipality` varchar(100) NOT NULL,
  `BarangayType` char(1) NOT NULL,
  `BarangayName` varchar(100) NOT NULL,
  `Signatory` int(11) DEFAULT NULL,
  `MunicipalSeal` blob NOT NULL,
  `BarangaySeal` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuance`
--

CREATE TABLE `bitdb_r_issuance` (
  `IssuanceID` int(11) NOT NULL,
  `CitizenID` int(11) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `IssuanceType` int(11) NOT NULL,
  `IssuanceDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_issuancetype`
--

CREATE TABLE `bitdb_r_issuancetype` (
  `IssuanceID` int(11) NOT NULL,
  `IssuanceType` varchar(100) DEFAULT NULL,
  `BarangayIdentity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinance`
--

CREATE TABLE `bitdb_r_ordinance` (
  `OrdinanceID` int(11) NOT NULL,
  `OrdinanceTitle` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Persons_Involved` int(11) DEFAULT NULL,
  `OrdDesc` varchar(200) NOT NULL,
  `DateImplemented` date NOT NULL,
  `OrdStatus` bit(1) NOT NULL DEFAULT b'1',
  `Sanction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_ordinancecategory`
--

CREATE TABLE `bitdb_r_ordinancecategory` (
  `OrdCategoryID` int(11) NOT NULL,
  `OrdinanceTitle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_project`
--

CREATE TABLE `bitdb_r_project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(100) NOT NULL,
  `ProjectLoc` varchar(200) NOT NULL,
  `ProjectDesc` varchar(500) NOT NULL,
  `ProjectPhases` int(11) DEFAULT NULL,
  `DateStart` date NOT NULL,
  `DateFinish` date NOT NULL,
  `ProjectStatus` int(11) NOT NULL,
  `PeopleInvolved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitdb_r_summons`
--

CREATE TABLE `bitdb_r_summons` (
  `BlotterID` int(11) NOT NULL,
  `SummonSched` datetime NOT NULL,
  `SummonPlace` varchar(100) NOT NULL
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
-- Indexes for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  ADD PRIMARY KEY (`BlotterID`),
  ADD KEY `FK_BlotterAccused` (`Accused`);

--
-- Indexes for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  ADD PRIMARY KEY (`BusinessID`);

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
  ADD KEY `FK_OrdCategory` (`CategoryID`),
  ADD KEY `FK_OdinanceInvolved` (`Persons_Involved`);

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
  ADD KEY `FK_ProjectInvolved` (`PeopleInvolved`);

--
-- Indexes for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  ADD KEY `FK_BlotterID` (`BlotterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitdb_r_barangayofficial`
--
ALTER TABLE `bitdb_r_barangayofficial`
  MODIFY `Brgy_Official_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayposition`
--
ALTER TABLE `bitdb_r_barangayposition`
  MODIFY `PosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_barangayuseraccounts`
--
ALTER TABLE `bitdb_r_barangayuseraccounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  MODIFY `BlotterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_business`
--
ALTER TABLE `bitdb_r_business`
  MODIFY `BusinessID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_citizen`
--
ALTER TABLE `bitdb_r_citizen`
  MODIFY `Citizen_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_config`
--
ALTER TABLE `bitdb_r_config`
  MODIFY `BarangayIdentity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_issuance`
--
ALTER TABLE `bitdb_r_issuance`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_issuancetype`
--
ALTER TABLE `bitdb_r_issuancetype`
  MODIFY `IssuanceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinance`
--
ALTER TABLE `bitdb_r_ordinance`
  MODIFY `OrdinanceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_ordinancecategory`
--
ALTER TABLE `bitdb_r_ordinancecategory`
  MODIFY `OrdCategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `bitdb_r_blotter`
--
ALTER TABLE `bitdb_r_blotter`
  ADD CONSTRAINT `FK_BlotterAccused` FOREIGN KEY (`Accused`) REFERENCES `bitdb_r_citizen` (`Citizen_ID`);

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
  ADD CONSTRAINT `FK_OdinanceInvolved` FOREIGN KEY (`Persons_Involved`) REFERENCES `bitdb_r_barangayofficial` (`Brgy_Official_ID`),
  ADD CONSTRAINT `FK_OrdCategory` FOREIGN KEY (`CategoryID`) REFERENCES `bitdb_r_ordinancecategory` (`OrdCategoryID`);

--
-- Constraints for table `bitdb_r_project`
--
ALTER TABLE `bitdb_r_project`
  ADD CONSTRAINT `FK_ProjectInvolved` FOREIGN KEY (`PeopleInvolved`) REFERENCES `bitdb_r_barangayofficial` (`Brgy_Official_ID`);

--
-- Constraints for table `bitdb_r_summons`
--
ALTER TABLE `bitdb_r_summons`
  ADD CONSTRAINT `FK_BlotterID` FOREIGN KEY (`BlotterID`) REFERENCES `bitdb_r_blotter` (`BlotterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
