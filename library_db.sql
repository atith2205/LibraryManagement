-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 08:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `library_db`
--
-- --------------------------------------------------------
--
-- Table structure for table `admin`
--
CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `photo` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `admin`
--
INSERT INTO `admin` (
    `adminId`,
    `adminName`,
    `password`,
    `username`,
    `email`,
    `photo`
  )
VALUES (
    1,
    'Samvid',
    '1234',
    'Samvid',
    'samvid@gmail.com',
    '2086_1527169280.png'
  ),
  (
    2,
    'Atith',
    '1234',
    'Atith',
    'Atith@gmail.com',
    'posts-images/7197_1531096754.jpeg'
  ),
  (
    3,
    'Stuti',
    '1234',
    'stuti',
    'stuti@gmail.com',
    'posts-images/2368_1531097680.jpeg'
  );
-- --------------------------------------------------------
--
-- Table structure for table `books`
--
CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(150) NOT NULL,
  `author` varchar(60) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `bookCopies` varchar(10) NOT NULL,
  `publisherName` varchar(60) NOT NULL,
  `available` varchar(10) NOT NULL,
  `categories` varchar(30) NOT NULL,
  `callNumber` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `books`
--
INSERT INTO `books` (
    `bookId`,
    `bookTitle`,
    `author`,
    `ISBN`,
    `bookCopies`,
    `publisherName`,
    `available`,
    `categories`,
    `callNumber`
  )
VALUES (
    5,
    'How to Become a Billionaire',
    'James Flitch',
    '1900-124-3242',
    '30',
    'Robert Muller',
    'YES',
    'Morals',
    '0902334'
  ),
  (
    6,
    'Oliver Twist',
    'Charles Dickey',
    '123-423-4-13',
    '12',
    'African Books.Inc',
    'YES',
    'Fairy Tail',
    '0216230.'
  ),
  (
    7,
    'Death of a million starts',
    'Breakthrough',
    '123',
    '3',
    'Rexxon',
    'YES',
    '123',
    '12'
  );
-- --------------------------------------------------------
--
-- Table structure for table `borrow`
--
CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` varchar(20) NOT NULL,
  `returnDate` varchar(20) NOT NULL,
  `bookId` int(2) NOT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `borrow`
--
INSERT INTO `borrow` (
    `borrowId`,
    `memberName`,
    `matricNo`,
    `bookName`,
    `borrowDate`,
    `returnDate`,
    `bookId`,
    `borrowStatus`,
    `fine`
  )
VALUES (
    1,
    'adit',
    'B',
    'Oliver Twist',
    '2021-09-23',
    '2021-09-26',
    6,
    0,
    '390'
  ),
  (
    2,
    'adit',
    'B',
    'Death of a million starts',
    '2021-09-21',
    '2021-09-24',
    7,
    0,
    '450'
  );
-- --------------------------------------------------------
--
-- Table structure for table `news`
--
CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `announcement` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `news`
--
INSERT INTO `news` (`newsId`, `announcement`)
VALUES (
    1,
    'Welcome to Our Online Sakec Library Management System. You can have access to all books like comics, Sci-Fi, biographies, Study material, previous papers and documentaries'
  ),
  (
    2,
    'Due to covid 19 the admin contact hours mai differ. '
  ),
  (
    3,
    'If the student does not return the book by return-date. They have to pay fine for submitting books late.'
  ),
  (
    4,
    'Here in sakec we are providing free COVID-19 vaccine for students on 15 October 2021. '
  ),
  (
    5,
    'If any queries contact on the following number  99303 12094 / 83695 27513.'
  );
-- --------------------------------------------------------
--
-- Table structure for table `students`
--
CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dept` varchar(60) NOT NULL,
  `photo` text NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `students`
--
INSERT INTO `students` (
    `studentId`,
    `matric_no`,
    `password`,
    `username`,
    `email`,
    `dept`,
    `photo`,
    `phoneNumber`,
    `name`
  )
VALUES (
    1,
    'A',
    '1234',
    'Mayank',
    'mak.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124579655',
    'Mayank'
  ),
  (
    2,
    'B',
    '1234',
    'adit',
    'adit@gmail.com',
    'Software Engineering',
    '2093_1531223199.jpeg',
    '08124578966',
    'adit'
  ),
  (
    3,
    'C',
    '1234',
    'Priyanshi',
    'Priyanshi.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124457575',
    'Priyanshi'
  ),
  (
    4,
    'D',
    '1234',
    'Aditya',
    'Aditya.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '04578964120',
    'Aditya'
  ),
  (
    5,
    'E',
    '1234',
    'Hardi',
    'Hardi.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '07462374589',
    'Hardi'
  ),
  (
    6,
    'F',
    '1234',
    'Mehek',
    'mehek.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '01884457965',
    'Mehek'
  ),
  (
    7,
    'G',
    '1234',
    'Kush',
    'Kush.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08524536955',
    'Kush'
  ),
  (
    8,
    'H',
    '1234',
    'Rahil',
    'Rahil.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08154279655',
    'Rahil'
  ),
  (
    9,
    'I',
    '1234',
    'Devanshee',
    'Devanshee.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08175979655',
    'Devanshee'
  ),
  (
    10,
    'J',
    '1234',
    'Jhanvi',
    'jhanvi.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124569655',
    'Jhanvi'
  ),
  (
    11,
    'K',
    '1234',
    'miloni',
    'miloni.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124742055',
    'Miloni'
  ),
  (
    12,
    'L',
    '1234',
    'Ishika',
    'Ishika.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08127409655',
    'Ishika'
  ),
  (
    13,
    'M',
    '1234',
    'Anushka',
    'Anushka.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124746355',
    'Ansuhka'
  ),
  (
    14,
    'N',
    '1234',
    'Dhruvi',
    'Dhruvi.in@gmail.com',
    'Software Engineering',
    '4477_1526321327.jpeg',
    '08124740855',
    'Dhruvi'
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY (`adminId`);
--
-- Indexes for table `books`
--
ALTER TABLE `books`
ADD PRIMARY KEY (`bookId`);
--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
ADD PRIMARY KEY (`borrowId`);
--
-- Indexes for table `news`
--
ALTER TABLE `news`
ADD PRIMARY KEY (`newsId`);
--
-- Indexes for table `students`
--
ALTER TABLE `students`
ADD PRIMARY KEY (`studentId`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 20;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;