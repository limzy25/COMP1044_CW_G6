-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(12) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `category_id` int(12) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(12) NOT NULL,
  `book_pub` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` year(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_added`, `status`) VALUES
(15, 'Natural Resources', 8, 'Robin Kerrod', 15, 'Marshall Cavendish Corporation', 'Marshall', '1-85435-628-3', 1997, '2013-12-11 06:34:00', 'New'),
(16, 'Encyclopedia Americana', 5, 'Grolier', 20, 'Connecticut', 'Grolier Incorporation', '0-7172-0119-8', 1988, '2013-12-11 06:36:00', 'Archive'),
(17, 'Algebra 1', 3, 'Bellman, Bragg , Charles  ', 35, 'Pearson Education, Inc', 'Prentice Hall, New Jersey', '0-130523167', 2004, '2013-12-11 06:39:00', 'Damage'),
(18, 'The Philippine Daily Inquirer', 7, 'N/A', 3, 'N/A', 'Raul Pangalanan', '0116-0443', 1985, '2013-12-11 06:41:00', 'New'),
(19, 'Science in our World', 4, 'Brian Knapp', 25, 'N/A', 'Grolier Educational Corporation', '9780717271702', 1991, '2013-12-11 06:44:00', 'Lost'),
(20, 'Literature', 9, 'Greg Glowka', 20, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 2001, '2013-12-11 06:47:00', 'Old'),
(21, 'Lexicon Universal Encyclopedia', 5, 'Lexicon', 10, 'Lexicon Publication', 'Pulication Inc., Lexicon', '0-717220214', 1986, '2013-12-11 06:49:00', 'Old'),
(22, 'Science and Invention Encyclopedia', 5, 'Clarke Donald, Dartford Mark', 16, 'H.S. Stuttman inc. Publishing', 'Publisher , Westport Connecticut', '0-87475-450-x', 1977, '2013-12-11 06:52:00', 'New'),
(23, 'Integrated Science Textbook ', 4, 'Merde C. Tan', 15, 'Book Media Express, Inc. Printwell, Inc.', 'N/A', '971-570-124-8', 2009, '2013-12-11 06:55:00', 'New'),
(24, 'Algebra 2', 3, 'Glencoe McGraw Hill', 15, 'The McGrawHill Companies Inc.', 'McGrawhill', '978-0078738326', 2008, '2013-12-11 06:57:00', 'New'),
(25, 'Wiki at Panitikan ', 7, 'Lorenza P. Avera', 28, 'JGM & S Corporation', 'JGM & S Corporation', '971-07-1574-7', 2000, '2013-12-11 06:59:00', 'Damage'),
(26, 'English Expressways TextBook for 4th year', 9, 'Virginia Bermudez Ed. O. et al', 23, 'SD Publications, Inc.', 'Gregorio Araneta Avenue, Quezon City', '978-971-0315-33-8', 2012, '2013-12-11 07:01:00', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan ', 8, 'Ricardo T. Jose, Ph . D.', 21, 'Vibal Publishing House Inc.', 'Araneta Avenue . Cor. Maria Clara St., Quezon City', '971-07-2324-3', 2008, '2013-12-11 07:02:00', 'New'),
(28, 'Literature (the readers choice)', 9, 'Glencoe McGraw Hill', 20, 'N/A', 'the McGrawHill Companies Inc', '0-02-817934-x', 2001, '2013-12-11 07:05:00', 'Damage'),
(29, 'Beloved a Novel', 9, 'Toni Morrison', 13, 'N/A', 'Alfred A. Knopf Inc.', '1-58060-120-0', 1987, '2013-12-11 07:07:00', 'Old'),
(30, 'Silver Burdett Engish', 2, 'Judy Brim', 12, 'Silver Burdett Company', 'Silver', '0-382-03574-7', 1985, '2013-12-11 09:22:00', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', 8, 'Douglas K. Ramsey', 8, 'Houghton Miffin Company', 'N/A', '0-395-35487-0', 1987, '2013-12-11 09:25:00', 'Old'),
(32, 'Introduction to Information System', 9, 'Cristine Redoblo', 10, 'CHMSC', 'Brian INC', '123-132', 2013, '2014-01-17 19:00:00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(12) NOT NULL,
  `book_id` int(12) NOT NULL,
  `member_id` int(12) NOT NULL,
  `date_borrow` datetime NOT NULL,
  `due_date` date NOT NULL,
  `borrow_status` varchar(20) NOT NULL,
  `date_return` datetime DEFAULT current_timestamp(),
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `member_id`, `date_borrow`, `due_date`, `borrow_status`, `date_return`, `user_id`) VALUES
(162, 15, 52, '2014-03-20 23:38:00', '2014-03-27', 'pending', '0000-00-00 00:00:00', 2),
(163, 15, 55, '2014-03-20 23:49:00', '2014-03-27', 'returned', '2014-03-21 00:30:00', 2),
(164, 16, 55, '2014-03-20 23:50:00', '2014-03-27', 'pending', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(12) NOT NULL,
  `classname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `type_id` int(12) NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', '212010', 2, 'Faculty', 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona', '0', 22, 'Second Year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', '9', 22, 'First Year', 'Active'),
(55, 'Jonathan', 'Antanilla', 'Male', 'E.B. Magalona', '32', 22, 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', '3030', 22, 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', '90902', 22, 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', '123', 22, 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', '9340', 22, 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', '132134', 22, 'Second Year', 'Active'),
(62, 'Chairty Joy', 'Punzalan', 'Female', 'E.B. Magalona', '12423', 2, 'Faculty', 'Active'),
(63, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', '1321', 22, 'Second Year', 'Active'),
(64, 'Chinie marie', 'Laborosa', 'Female', 'E.B. Magalona', '902101', 22, 'Second Year', 'Active'),
(65, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', 'N/A', 2, 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(12) NOT NULL,
  `borrowertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `borrowertype`) VALUES
(2, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(32, 'Contruction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin', 'john', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrow_details_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `borrowdetails_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `borrowdetails_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `borrowdetails_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
