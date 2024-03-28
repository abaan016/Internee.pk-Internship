-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 11:36 AM
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
-- Database: `db_internee.pk`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addInternship` (IN `categ` VARCHAR(255), IN `Cover` VARCHAR(255), IN `Duration` INT, IN `type` VARCHAR(255), IN `link` TEXT)   BEGIN
    INSERT INTO `internships`(`Category`, `CoverImg`, `Duration`, `Type`, `ApplyLink`) 
    VALUES (categ, Cover, Duration, type, link);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchInternees` ()   BEGIN 
    SELECT A.*, B.Category
    FROM `tbl_internees` as A
    JOIN `internships` as B
    ON A.Intern_Category = B.Id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FetchInternships` ()   BEGIN
    SELECT * FROM `internships`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchReviews` ()   BEGIN 
    SELECT * FROM `tbl_reviews`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fetch_Sub_Interns` ()   BEGIN
    SELECT A.*, B.Category FROM `sub_interns` A JOIN `internships` B ON A.CategId = B.Id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messages` ()   BEGIN
	SELECT * FROM `tbl_contact`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `newInternships` ()   BEGIN
    SELECT * FROM `internships` ORDER BY Id DESC LIMIT 6;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Sub_Interns_fetch` (IN `internId` INT)   BEGIN 
	SELECT * FROM `sub_interns` WHERE `CategId` = internID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userAuth` ()   BEGIN
    SELECT * FROM `users` ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `Id` int(11) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `CoverImg` varchar(255) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`Id`, `Category`, `CoverImg`, `Duration`, `Type`, `Status`) VALUES
(1, 'Frontend Development', 'FrontEnd.jpeg', 1, 'Remote', 0),
(2, 'Cloud Computing ', 'cloud.jpg', 1, 'Remote', 0),
(3, 'Backend Development', 'BackendDevelopment.jpeg', 1, 'Remote', 0),
(4, 'Mobile App Development', 'Mobile App Developer.jpeg', 1, 'Remote', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_interns`
--

CREATE TABLE `sub_interns` (
  `subId` int(11) NOT NULL,
  `DomainName` varchar(255) DEFAULT NULL,
  `LogoImg` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `JobType` varchar(255) DEFAULT NULL,
  `WorkType` varchar(255) DEFAULT NULL,
  `ApplyLink` text DEFAULT NULL,
  `CategId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_interns`
--

INSERT INTO `sub_interns` (`subId`, `DomainName`, `LogoImg`, `Location`, `Duration`, `JobType`, `WorkType`, `ApplyLink`, `CategId`) VALUES
(1, 'MERN Stack Internship', 'mern.png', 'Karachi, Pakistan', 1, 'Internship', 'Remote', 'https://docs.google.com/forms/d/e/1FAIpQLSd6PxijXvz3R8Vdl3livzg9_aPES_abyydAyde0SV0BxmeT2w/closedform', 3),
(2, 'PHP Development Internship', 'php.png', 'Karachi, Pakistan', 1, 'Internship', 'Remote', 'https://docs.google.com/forms/d/e/1FAIpQLSfCOUPfXXqPKVp2aIlYPRiSa-Ll7lbfQjxfpZ4xI7ffNimPow/closedform', 3),
(4, 'HTML CSS JS Internship', 'htmlcssjs.png', 'Karachi, Pakistan', 1, 'OnSite', 'Remote', 'https://forms.gle/XmQbTNBEqvkkPRoW6', 1),
(5, 'Flutter Internship', 'flutter.png', 'Karachi, Pakistan', 1, 'OnSite', 'Remote', 'https://docs.google.com/forms/d/e/1FAIpQLSfKt0T2qtUlau5tR1EsDoin2NNgtvqq4VJ2r7wb8lDCOx8ckg/closedform', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `Recieve_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`Id`, `Name`, `Email`, `Phone`, `Message`, `Recieve_date`) VALUES
(2, 'Alice Smith', 'alice@example.com', '9876543210', 'Lorem ipsum dolor sit amet.', '2024-03-27 07:00:00'),
(3, 'Bob Johnson', 'bob@example.com', '5551234567', 'This is a test message.', '2024-03-27 07:00:00'),
(4, 'Emily Brown', 'emily@example.com', '4449876543', 'Testing message content.', '2024-03-27 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_internees`
--

CREATE TABLE `tbl_internees` (
  `Internee_Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Intern_Category` int(11) DEFAULT NULL,
  `Education` varchar(255) DEFAULT NULL,
  `Start_date` datetime DEFAULT NULL,
  `End_date` datetime DEFAULT NULL,
  `Intern_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_internees`
--

INSERT INTO `tbl_internees` (`Internee_Id`, `Name`, `Email`, `Phone`, `Intern_Category`, `Education`, `Start_date`, `End_date`, `Intern_status`) VALUES
(1, 'John Doe', 'john@example.com', '123-456-7890', 1, 'Bachelor of Science in Computer Science', '2023-06-15 09:00:00', '2023-12-15 17:00:00', 1),
(2, 'Jane Smith', 'jane@example.com', '987-654-3210', 2, 'Master of Business Administration', '2023-07-01 08:30:00', '2023-12-31 16:30:00', 0),
(3, 'Alice Johnson', 'alice@example.com', '555-555-5555', 1, 'Bachelor of Arts in Economics', '2023-08-01 10:00:00', '2023-11-30 18:00:00', 1),
(4, 'Bob Williams', 'bob@example.com', '444-444-4444', 3, 'Bachelor of Science in Engineering', '2023-09-01 08:00:00', '2024-01-31 16:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `Review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`Id`, `Name`, `location`, `feedback`, `Review_date`) VALUES
(1, 'John Doe', 'New York', 'Great experience, learned a lot!', '2024-03-26'),
(2, 'Jane Smith', 'Los Angeles', 'The internship program was well-organized.', '2024-03-27'),
(3, 'Alice Johnson', 'Chicago', 'Amazing team and supportive environment.', '2024-03-25'),
(4, 'Bob Williams', 'San Francisco', 'Highly recommend this internship!', '2024-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `UserPass` binary(32) DEFAULT NULL,
  `UserRole` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FullName`, `Email`, `UserPass`, `UserRole`) VALUES
(1, 'Aban Ali', 'aban@gmail.com', 0x0123450000000000000000000000000000000000000000000000000000000000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sub_interns`
--
ALTER TABLE `sub_interns`
  ADD PRIMARY KEY (`subId`),
  ADD KEY `CategId` (`CategId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_internees`
--
ALTER TABLE `tbl_internees`
  ADD PRIMARY KEY (`Internee_Id`),
  ADD KEY `Intern_Category` (`Intern_Category`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_interns`
--
ALTER TABLE `sub_interns`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_internees`
--
ALTER TABLE `tbl_internees`
  MODIFY `Internee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_interns`
--
ALTER TABLE `sub_interns`
  ADD CONSTRAINT `sub_interns_ibfk_1` FOREIGN KEY (`CategId`) REFERENCES `internships` (`Id`);

--
-- Constraints for table `tbl_internees`
--
ALTER TABLE `tbl_internees`
  ADD CONSTRAINT `tbl_internees_ibfk_1` FOREIGN KEY (`Intern_Category`) REFERENCES `internships` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
