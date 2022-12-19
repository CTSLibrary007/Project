-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Username`, `Password`) VALUES
('Arko', 'arkokundu@#1234', '1a1dc91c907325c69271ddf0c944bc72'),
('Swastik', 'kookaswas@#1234', '1a1dc91c907325c69271ddf0c944bc72');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `AccNo` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Edition` varchar(5) NOT NULL,
  `Branch` varchar(5) NOT NULL,
  `Year` varchar(5) NOT NULL,
  `Sem` varchar(5) NOT NULL,
  `Status` enum('Available','Demanded','Borrowed','Read Only') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`AccNo`, `Title`, `Author`, `Publisher`, `Edition`, `Branch`, `Year`, `Sem`, `Status`) VALUES
(2808, 'Higher Engineering Mathematics', 'B. S. Grewal', 'Khanna Publishers', '8th', 'DCST', '1st', '2nd', 'Available'),
(3381, 'Engineering Drawing', 'ND Bhatt', 'Charotkar Publishing House', '53rd', 'DCST', '1st', '1st', 'Available'),
(4390, 'Programming in C', 'E. Balaguruswamy', 'Tata McGraw Hill', '4th', 'DCST', '2nd', '3rd', 'Available'),
(4490, 'Concepts of Physics', 'HC Verma', 'Bharti Bhawan', '3rd', 'DCST', '1st', '1st', 'Demanded'),
(5501, 'Data Structures Using C', 'Reema Thareja', 'Oxford', '3rd', 'DCST', '2nd', '3rd', 'Available'),
(5589, 'Concepts of Physics', 'HC Verma', 'Bharti Bhawan', '3rd', 'DCST', '1st', '2nd', 'Available'),
(5618, 'Core Java', 'Horstmann', 'Pearson', '3rd', 'DCST', '2nd', '4th', 'Available'),
(6666, 'Engineering Chemistry', 'Agarwal & Sikha', 'Cambridge University Press', '4th', 'DCST', '1st', '1st', 'Available'),
(6692, 'Engineering Mathematics', 'A. Sarkar', 'Naba Publication', '6th', 'DCST', '1st', '1st', 'Borrowed'),
(6705, 'Computer Fundamentals', 'Goel', 'Pearson', '6th', 'DCST', '1st', '2nd', 'Available'),
(6824, 'Core Python Programming', 'Wesley', 'Tata McGraw Hill', '4th', 'DCST', '2nd', '3rd', 'Available'),
(7077, 'Operating System Concepts', 'Silberschatz, Galvin', 'Addison-Wesley', '5th', 'DCST', '2nd', '4th', 'Available'),
(7402, 'Higher Engineering Mathematics', 'B. S. Grewal', 'Khanna Publishers', '11th', 'DCST', '1st', '1st', 'Available'),
(7404, 'Fundamentals of Database System', 'Elmasri, Navathe', 'Pearson', '3rd', 'DCST', '2nd', '4th', 'Available'),
(7750, 'Introduction to Algorithms', 'Thomas Cormen', 'MIT Press', '4th', 'DCST', '2nd', '3rd', 'Available'),
(7909, 'Computer Networking', 'Kurose, Ross', 'Pearson', '5th', 'DCST', '2nd', '4th', 'Available'),
(7963, 'Computer Organization', 'Carl Hamacher', 'Tata Mc Graw Hill', '9th', 'DCST', '2nd', '3rd', 'Available'),
(7977, 'Basic Electricals and Electronics', 'S. K. Bhattacharya', 'Pearson', '6th', 'DCST', '1st', '2nd', 'Available'),
(8695, 'Database Concept and System', 'Evan Bayross', 'SPD', '6th', 'DCST', '2nd', '4th', 'Available'),
(8824, 'Java The Complete Reference', 'Herber Schildt', 'Tata McGraw Hill', '5th', 'DCST', '2nd', '4th', 'Available'),
(8891, 'Programming in C', 'Reema Thareja', 'Oxford', '6th', 'DCST', '2nd', '3rd', 'Available'),
(9341, 'Data Communication and Networking ', 'Forouzan', 'Tata McGraw Hill', '5th', 'DCST', '2nd', '4th', 'Available'),
(9391, 'Fundamental of Software Engineering', 'Rajib Mall', 'PHI Learning Private Limited', '4th', 'DCST', '2nd', '4th', 'Available'),
(9999, '3500+ JELET', 'A. Sarkar', 'Naba Publication', '1st', 'DCST', '6th', '2nd', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `BorrowID` int(11) NOT NULL,
  `LibID` varchar(50) NOT NULL,
  `AccNo` int(11) NOT NULL,
  `BorrDt` datetime NOT NULL DEFAULT current_timestamp(),
  `Group` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`BorrowID`, `LibID`, `AccNo`, `BorrDt`, `Group`) VALUES
(7, '0/CS/B2/109', 6692, '2022-11-17 13:12:56', 'B2');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `DemandID` int(11) NOT NULL,
  `DemandDate` datetime DEFAULT current_timestamp(),
  `AccNo` int(11) NOT NULL,
  `StdID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`DemandID`, `DemandDate`, `AccNo`, `StdID`) VALUES
(9, '2022-10-11 19:48:48', 4490, '0/CS/B2/110'),
(23, '2022-11-17 13:18:44', 9999, '0/CS/B2/109');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Card_No` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Course` varchar(4) NOT NULL,
  `Year` int(11) NOT NULL,
  `RegNumber` varchar(12) NOT NULL,
  `Roll` varchar(10) NOT NULL,
  `Number` int(11) NOT NULL,
  `Group` varchar(5) NOT NULL,
  `Date` date NOT NULL,
  `Password` varchar(100) NOT NULL DEFAULT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Card_No`, `Name`, `Course`, `Year`, `RegNumber`, `Roll`, `Number`, `Group`, `Date`, `Password`) VALUES
('0/CE/C/001', 'Anik Das', 'DCE', 2, '', '', 0, 'C', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/C/002', 'Rina Chowdhury', 'DCE', 2, '', '', 10005511, 'C', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/C/003', 'Dhrubyajoti Patra', 'DCE', 2, '', '', 10005497, 'C', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/C/004', 'Bimal Pramanik', 'DCE', 2, '', '', 0, 'C', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/C/005', 'Bitan Sarkar', 'DCE', 2, '', '', 10005495, 'C', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/M/018', 'Riya Debnath', 'DCE', 2, '', '', 10005513, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/M/019', 'Tamojit Neogi', 'DCE', 2, '', '', 10005535, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/M/020', 'Samihan Kadir', 'DCE', 2, '', '', 10005518, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/M/021', 'Suvasundar Das', 'DCE', 2, '', '', 10005534, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CE/M/022', 'Joydeep Dey', 'DCE', 2, '', '', 10005502, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/105', 'Shuvankar Dhara', 'DCST', 2, '', 'DCTSCSTS4', 10005568, 'B2', '2022-04-19', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/106', 'Tanmoy Bose', 'DCST', 2, '', 'DCTSCSTS4', 10005589, 'B2', '2022-04-19', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/107', 'Suranjan Das', 'DCST', 2, '', 'DCTSCSTS4', 10005583, 'B2', '2022-04-19', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/108', 'Subhajit Mondal', 'DCST', 2, '', 'DCTSCSTS4', 0, 'B2', '2022-04-19', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/109', 'Swastik Sarkar', 'DCST', 2, '', 'DCTSCSTS4', 10005586, 'B2', '2022-02-02', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/B2/110', 'Arko Kundu', 'DCST', 2, '', 'DCTSCSTS4', 10005544, 'B2', '2022-04-19', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/012', 'Sayan Pramanik', 'DCST', 2, '', 'DCTSCSTS4', 10005565, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/013', 'Swarnali Pramanik', 'DCST', 2, '', 'DCTSCSTS4', 10005585, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/014', 'Suman Das', 'DCST', 2, '', 'DCTSCSTS4', 10005581, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/015', 'Purnendu Naskar', 'DCST', 2, '', 'DCTSCSTS4', 10005558, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/016', 'Dipayan Paul', 'DCST', 2, '', 'DCTSCSTS4', 10005553, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/K/017', 'Arnab Dalui', 'DCST', 2, '', 'DCTSCSTS4', 10005545, 'K', '2022-03-15', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/M1/087', 'Rishav Saha', 'DCST', 2, '', 'DCTSCSTS4', 10005567, 'M1', '2022-04-20', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/023', 'Ankita Das', 'DCST', 2, '', 'DCTSCSTS4', 10005542, 'P', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/024', 'Anushka Dutta', 'DCST', 2, '', 'DCTSCSTS4', 10005543, 'P', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/025', 'Tanaya Kanrar', 'DCST', 2, '', 'DCTSCSTS4', 10005587, 'P', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/026', 'Souvik Harh', 'DCST', 2, '', 'DCTSCSTS4', 10005577, 'P', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/027', 'Shampa Das', 'DCST', 2, '', 'DCTSCSTS4', 10005567, 'P', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/P/086', 'Anirudha Bag', 'DCST', 2, '', 'DCTSCSTS4', 10005540, 'P', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/Q/028', 'Subhankar Majumdar', 'DCST', 2, '', 'DCTSCSTS4', 10005574, 'Q', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/Q/029', 'Dip Kumar Bargi', 'DCST', 2, '', 'DCTSCSTS4', 10005552, 'Q', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/Q/030', 'Sagar Sarkar', 'DCST', 2, '', 'DCTSCSTS4', 10005563, 'Q', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/Q/031', 'Rajarshi Ghosh', 'DCST', 2, '', 'DCTSCSTS4', 10005559, 'Q', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/CS/Q/032', 'Airshwita Saha', 'DCST', 2, '', 'DCTSCSTS4', 0, 'Q', '2022-03-21', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/G1/072', 'Debangshu Samanta', 'DEE', 2, '', '', 10005601, 'G1', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/G1/073', 'Pralay Ghosh', 'DEE', 2, '', '', 10005614, 'G1', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/G1/074', 'Koushik Mallick', 'DEE', 2, '', '', 10005605, 'G1', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/G1/075', 'Amal Khanna', 'DEE', 2, '', '', 0, 'G1', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/G1/076', 'Souvick Das', 'DEE', 2, '', '', 10005629, 'G1', '2022-03-29', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/J/007', 'Debjit Ray', 'DEE', 2, '', '', 10005602, 'J', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/J/008', 'Chirosri Biswas', 'DEE', 2, '', '', 10005600, 'J', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/J/009', 'Bidisha Roy', 'DEE', 2, '', '', 10005599, 'J', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/J/010', 'Ananya Mondal', 'DEE', 2, '', '', 10005593, 'J', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/EE/J/011', 'Sudip Sarkar', 'DEE', 2, '', '', 10005635, 'J', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/051', 'Puspendu Paul', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/052', 'Kuntal Kundu', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/053', 'Purna Shankar Mondal', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/054', 'Subham Mondal', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/055', 'Pramito Bhowmick', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('0/ME/X/056', 'Barnali Sarkar', 'DME', 2, '', '', 10005666, 'X', '2022-03-26', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CE/C/006', 'Risibha Raj Gupta', 'DCE', 2, '', '', 10005512, 'C', '2022-07-13', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CE/N/005', 'Sunny Deo Ram', 'DCE', 1, '', '', 48, 'N', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CE/N/006', 'Vijayanand Kumar', 'DCE', 1, '', '', 52, 'N', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CE/N/007', 'Snneha Shaw', 'DCE', 1, '', '', 59, 'N', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CE/N/008', 'Shant Shaw', 'DCE', 1, '', '', 37, 'M', '2022-03-16', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CS/E/001', ' Ayush Prakash', 'DCST', 1, '', '', 64, 'E', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CS/E/002', ' Shivam Viswakarma', 'DCST', 1, '', '', 38, 'E', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CS/E/003', 'Shoaib Ahmed Quaraishi', 'DCST', 1, '', '', 33, 'E', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99'),
('1/CS/E/004', 'Md. Daneyal', 'DCST', 1, '', '', 55, 'E', '2022-03-14', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`AccNo`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`BorrowID`),
  ADD UNIQUE KEY `AccNo_2` (`AccNo`),
  ADD KEY `LibID` (`LibID`),
  ADD KEY `AccNo` (`AccNo`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`DemandID`),
  ADD UNIQUE KEY `AccNo` (`AccNo`),
  ADD KEY `StdID` (`StdID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Card_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `BorrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `DemandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD CONSTRAINT `borrowed_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `books` (`AccNo`),
  ADD CONSTRAINT `borrowed_ibfk_2` FOREIGN KEY (`LibID`) REFERENCES `students` (`Card_No`);

--
-- Constraints for table `demand`
--
ALTER TABLE `demand`
  ADD CONSTRAINT `demand_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `books` (`AccNo`),
  ADD CONSTRAINT `demand_ibfk_2` FOREIGN KEY (`StdID`) REFERENCES `students` (`Card_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
