-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 04:01 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csrobot`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `Id` int(11) NOT NULL,
  `ORG_Id` int(11) NOT NULL,
  `BRNH_Id` int(11) NOT NULL,
  `Job_Id` int(11) NOT NULL,
  `Profile_Pic` varchar(255) NOT NULL,
  `CoverLetter` text NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `CNIC` varchar(255) NOT NULL,
  `PHY_Address` varchar(255) NOT NULL,
  `PHY_Country` varchar(255) NOT NULL,
  `PHY_State` varchar(255) NOT NULL,
  `PHY_City` varchar(255) NOT NULL,
  `PHY_Zip_Code` varchar(255) NOT NULL,
  `PHY_Phone` varchar(255) NOT NULL,
  `PHY_Fax` varchar(255) NOT NULL,
  `PHY_Email` varchar(255) NOT NULL,
  `POS_Address` varchar(255) NOT NULL,
  `POS_Country` varchar(255) NOT NULL,
  `POS_State` varchar(255) NOT NULL,
  `POS_City` varchar(255) NOT NULL,
  `POS_Phone` varchar(255) NOT NULL,
  `POS_Fax` varchar(255) NOT NULL,
  `POS_Email` varchar(255) NOT NULL,
  `POS_Zip_Code` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Date_Added` date NOT NULL,
  `Date_Modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Modified_By` int(11) NOT NULL,
  `Added_By` int(11) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Deleted` int(11) NOT NULL,
  `Candidate_Country` int(11) NOT NULL,
  `Martial_Status` varchar(255) NOT NULL,
  `Languages` text NOT NULL,
  `Skills` text NOT NULL,
  `Industry` varchar(255) NOT NULL,
  `Career_Level` varchar(255) NOT NULL,
  `Functional_Area` varchar(255) NOT NULL,
  `Applicant_Status` varchar(255) NOT NULL,
  `Test_Id` int(11) NOT NULL,
  `Test_Time` datetime NOT NULL,
  `Interview_Date` datetime NOT NULL,
  `Test_Submission_Time` datetime NOT NULL,
  `Test_Status` varchar(255) NOT NULL,
  `Test_Assigned_By` int(11) NOT NULL,
  `Test_Checked_By` int(11) NOT NULL,
  `Check_Authority_Given_By` int(11) NOT NULL,
  `Shortlisted_By` int(11) NOT NULL,
  `Rejected_By` int(11) NOT NULL,
  `Rejected_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rejected_Phase` varchar(255) NOT NULL,
  `Test_Marks` int(11) NOT NULL,
  `Interviewers` text NOT NULL,
  `Test_Total_Marks` int(11) NOT NULL,
  `Interview_Marks` int(11) NOT NULL,
  `Test_Reviews` text NOT NULL,
  `Reject_Reason` text NOT NULL,
  `Interview_Reviews` text NOT NULL,
  `Candidate_Coming_Status` varchar(255) NOT NULL,
  `Test_Given_Status` int(11) NOT NULL,
  `Offerletter` text NOT NULL,
  `Offerletter_Sent_By` int(11) NOT NULL,
  `Applicant_Token` varchar(255) NOT NULL,
  `Class_Joined` int(11) NOT NULL,
  `Remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Id` int(11) NOT NULL,
  `OrganizationID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DepartmentAdmin` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '1',
  `Deleted` varchar(255) NOT NULL DEFAULT '0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `JoiningDate` date DEFAULT NULL,
  `LeavingDate` date NOT NULL,
  `EmployeeStatus` varchar(255) DEFAULT NULL,
  `Status` bit(11) NOT NULL DEFAULT b'1',
  `Deleted` bit(11) NOT NULL DEFAULT b'0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_activity`
--

CREATE TABLE `employee_activity` (
  `Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `ActivityType` varchar(255) DEFAULT NULL,
  `ActivityFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ActivityTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ActivityDescription` text NOT NULL,
  `Status` bit(11) NOT NULL DEFAULT b'1',
  `Deleted` bit(11) NOT NULL DEFAULT b'0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendence`
--

CREATE TABLE `employee_attendence` (
  `Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `TimeIn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeOut` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AttendenceStatus` varchar(255) DEFAULT NULL,
  `RemarkType` varchar(255) DEFAULT NULL,
  `Remarks` text,
  `Status` bit(11) NOT NULL,
  `Deleted` bit(11) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_bankaccount`
--

CREATE TABLE `employee_bankaccount` (
  `Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `AccountTitle` varchar(255) DEFAULT NULL,
  `AccountType` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BranchCode` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Status` bit(11) NOT NULL DEFAULT b'1',
  `Deleted` bit(11) NOT NULL DEFAULT b'0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) NOT NULL,
  `ModifiedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `Id` int(11) NOT NULL,
  `DesignationTitle` varchar(255) DEFAULT NULL,
  `Status` bit(11) NOT NULL DEFAULT b'1',
  `Deleted` bit(11) NOT NULL DEFAULT b'0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `Id` int(11) NOT NULL,
  `Applicant_Id` int(11) NOT NULL,
  `Degree_Name` varchar(255) NOT NULL,
  `Degree_Type` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Institute` varchar(255) NOT NULL,
  `Result_Date` varchar(255) NOT NULL,
  `Examination_System` varchar(255) NOT NULL,
  `Marks_Obtained` varchar(255) NOT NULL,
  `Total_Marks` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience`
--

CREATE TABLE `employee_experience` (
  `Id` int(11) NOT NULL,
  `Applicant_Id` int(11) NOT NULL,
  `ORG_Type` varchar(255) NOT NULL,
  `Industry` varchar(255) NOT NULL,
  `ORG_Name` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Job_Description` text NOT NULL,
  `Job_Field` varchar(255) NOT NULL,
  `Job_Start_Date` date NOT NULL,
  `Job_End_Date` date NOT NULL,
  `Previous_Salary` varchar(255) NOT NULL,
  `Expected_Salary` varchar(255) NOT NULL,
  `EXP_Document` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `LeaveType` varchar(255) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `LeaveDurration` varchar(255) DEFAULT NULL,
  `ApprovedBy` varchar(255) DEFAULT NULL,
  `StatusUpdationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LeaveStatus` varchar(255) DEFAULT NULL,
  `LeaveRequest` varchar(255) DEFAULT NULL,
  `Status` bit(11) NOT NULL DEFAULT b'1',
  `Deleted` bit(11) NOT NULL DEFAULT b'0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `NTN` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Address` text,
  `Email` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `AccountTitle` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BranchName` varchar(255) DEFAULT NULL,
  `OpeningTime` time DEFAULT NULL,
  `ClosingTime` time DEFAULT NULL,
  `BreakStartTime` time DEFAULT NULL,
  `BreakEndTime` time DEFAULT NULL,
  `Day` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '1',
  `Deleted` varchar(255) NOT NULL DEFAULT '0',
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` int(11) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `UserType` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'1',
  `Deleted` bit(1) NOT NULL DEFAULT b'0',
  `AddedBy` varchar(255) DEFAULT NULL,
  `ModifiedBy` varchar(255) DEFAULT NULL,
  `AddedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserEmail`, `UserPassword`, `UserType`, `FirstName`, `LastName`, `Status`, `Deleted`, `AddedBy`, `ModifiedBy`, `AddedDate`, `ModifiedDate`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin', 'Abid ', 'Maqbool', b'1111111111111111111111111111111', b'1111111111111111111111111111111', 'Abid', 'Admin', '2017-12-27 20:42:06', '2017-12-27 20:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_activity`
--
ALTER TABLE `employee_activity`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_attendence`
--
ALTER TABLE `employee_attendence`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_bankaccount`
--
ALTER TABLE `employee_bankaccount`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_designation`
--
ALTER TABLE `employee_designation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_activity`
--
ALTER TABLE `employee_activity`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_attendence`
--
ALTER TABLE `employee_attendence`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_bankaccount`
--
ALTER TABLE `employee_bankaccount`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
