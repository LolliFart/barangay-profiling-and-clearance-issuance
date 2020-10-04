-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 12:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `date_created` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `last_login` date NOT NULL,
  `last_logout` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`, `date_created`, `created_by`, `last_login`, `last_logout`, `status`) VALUES
(1, 'admin', 'Admin123', NULL, NULL, '2020-10-04', '2020-10-04', '1'),
(2, 'akodao', '12345', '2020-09-28', 'Akodao1234', '0000-00-00', '0000-00-00', '1'),
(3, 'akodao1', '12345', '2020-09-28', 'admin', '0000-00-00', '0000-00-00', '1'),
(4, 'akodao123', 'Akodao1234', '2020-09-28', 'admin', '2020-10-04', '2020-10-04', '0'),
(5, 'aganap', 'Agabap1234', '2020-10-02', 'admin', '0000-00-00', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_requested`
--

CREATE TABLE `clearance_requested` (
  `clearanceRequested_id` int(10) NOT NULL,
  `res_id` int(10) NOT NULL,
  `clearance_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `date_issuedOn` date DEFAULT NULL,
  `date_requestedOn` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `file_upload_directory` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_approved` enum('1','0') DEFAULT NULL,
  `is_pending` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_requested`
--

INSERT INTO `clearance_requested` (`clearanceRequested_id`, `res_id`, `clearance_id`, `address`, `civil_status`, `date_issuedOn`, `date_requestedOn`, `purpose`, `file_upload_directory`, `email`, `is_approved`, `is_pending`) VALUES
(4, 11, 1, 'western kolambog, lapasan cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(5, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(6, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(7, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(8, 9, 1, 'sta. cruz 2 lapasan,cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(9, 9, 1, 'sta. cruz 2 lapasan,cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(10, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(11, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(12, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(13, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(14, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(15, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(16, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(17, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(18, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(19, 23, 1, 'macabalan', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(20, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(21, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(22, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(23, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(24, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(25, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(26, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(27, 7, 2, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(28, 10, 2, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(29, 7, 3, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(30, 7, 3, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(31, 7, 1, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(32, 11, 1, 'western kolambog, lapasan cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(33, 7, 2, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(34, 7, 3, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(35, 7, 5, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'renew/apply', NULL, NULL, '1', '0'),
(36, 7, 5, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'renew/apply', NULL, NULL, '1', '0'),
(37, 7, 5, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'renew/apply', NULL, NULL, '1', '0'),
(39, 7, 4, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'water connection', NULL, NULL, '1', '0'),
(40, 7, 4, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'water connection', NULL, NULL, '1', '0'),
(41, 1, 1, 'bugo, cagayan de oro city', 'single', '2020-09-28', '2020-09-28', 'wala lang try lng', 'upload_zip_image/upload_1601290688.zip', 'shaimontareal@gmail.com', '1', '0'),
(42, 24, 2, 'carmen, cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'try lng jpun ehehhe', 'upload_zip_image/upload_1601290965.zip', 'rije.jabunan@gmail.com', '1', '0'),
(43, 24, 3, 'carmen, cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'sample', 'upload_zip_image/upload_1601291433.zip', 'rije.ladao@gmail.com', '1', '0'),
(44, 7, 3, 'western kolambog,lapasan cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', NULL, NULL, '1', '0'),
(45, 19, 3, 'ramonal', 'single', '2020-09-28', '2020-09-28', 'employment', 'upload_zip_image/upload_1601291798.zip', 'sarssydereal0590@gmail.com', '1', '0'),
(46, 9, 1, 'carmen, cagayan de oro city', 'married', '2020-09-28', '2020-09-28', 'employment', 'upload_zip_image/upload_1601291925.zip', 'ladaojupiter@gmail.com', '1', '0'),
(47, 2, 1, 'ramonal', 'single', '2020-10-02', '2020-10-02', 'employment', 'upload_zip_image/upload_1601625090.zip', 'christdao19@gmail.com', '0', '0'),
(48, 1, 1, 'ramonal', 'single', '2020-10-02', '2020-10-02', 'employment', 'upload_zip_image/upload_1601625462.zip', 'christdao19@gmail.com', '1', '0'),
(49, 9, 3, 'sta. cruz 2 lapasan,cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'employment', NULL, NULL, '1', '0'),
(50, 10, 1, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'employment', NULL, NULL, '1', '0'),
(51, 10, 2, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'employment', NULL, NULL, '1', '0'),
(52, 10, 3, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'employment', NULL, NULL, '1', '0'),
(53, 10, 4, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'water connection', NULL, NULL, '1', '0'),
(54, 10, 5, 'sta. cruz 2,lapasan cagayan de oro city', 'single', '2020-10-02', '2020-10-02', 'renew/apply', NULL, NULL, '1', '0'),
(55, 2, 1, 'nazareth', 'single', '2020-10-04', '2020-10-04', 'employment', 'upload_zip_image/upload_1601781563.zip', 'christdao19@gmail.com', '1', '0'),
(56, 9, 1, 'sta. cruz 2 lapasan,cagayan de oro city', 'single', '2020-10-04', '2020-10-04', 'employment', NULL, NULL, '1', '0'),
(57, 25, 1, 'macabalan cagayan de oro city', 'married', '2020-10-04', '2020-10-04', 'employment', NULL, NULL, '1', '0'),
(58, 25, 5, 'macabalan cagayan de oro city', 'married', '2020-10-04', '2020-10-04', 'renew/apply', NULL, NULL, '1', '0'),
(59, 22, 5, '21-20 upper, nazareth', 'single', '2020-10-04', '2020-10-04', 'renew/apply', NULL, NULL, '1', '0'),
(60, 12, 5, 'sto. nino,lapasan cagayan de oro city', 'single', '2020-10-04', '2020-10-04', 'renew/apply', NULL, NULL, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_type`
--

CREATE TABLE `clearance_type` (
  `clearance_id` int(10) NOT NULL,
  `clearance_name` varchar(255) NOT NULL,
  `clearance_path_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_type`
--

INSERT INTO `clearance_type` (`clearance_id`, `clearance_name`, `clearance_path_name`) VALUES
(1, 'Barangay Clearance', 'brgy_clearance_template.inc.php'),
(2, 'Certificate Of Indigency', 'cert_indigency_template.inc.php'),
(3, 'Certificate Of Residency', 'cert_for_residency_template.inc.php'),
(4, 'Certification', 'certification_template.inc.php'),
(5, 'Business Certificate', 'cert_for_business_template.inc.php');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `res_id` int(10) NOT NULL,
  `res_lname` varchar(255) NOT NULL,
  `res_fname` varchar(255) NOT NULL,
  `res_mname` varchar(255) DEFAULT NULL,
  `res_gender` char(10) NOT NULL,
  `res_religion` char(255) DEFAULT NULL,
  `res_DOB` date NOT NULL,
  `res_address` varchar(255) NOT NULL,
  `res_civilStatus` char(25) NOT NULL,
  `res_POB` varchar(255) DEFAULT NULL,
  `res_contactNumber` varchar(15) DEFAULT NULL,
  `is_archived` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`res_id`, `res_lname`, `res_fname`, `res_mname`, `res_gender`, `res_religion`, `res_DOB`, `res_address`, `res_civilStatus`, `res_POB`, `res_contactNumber`, `is_archived`) VALUES
(1, 'Montareal', 'Shaina', 'Vequezo', 'Male', 'Roman Catholic', '1990-11-23', 'Kolambog,Lapasan Cagayan de Oro City', 'Married', '669 Keshaun Cape Bukidnon City', '+639335558313', '1'),
(2, 'Melon', 'Petey', 'Mario', 'Male', 'Seventh-Day Adventist', '1992-11-23', 'Santa Cruz 1,Lapasan Cagayan de Oro City', 'Single', '5998 Monserrate Street Davao Oriental,Boston', '+639215556054', '1'),
(3, 'Didas', 'Greta', 'Life', 'Female', 'Roman Catholic', '1988-11-23', 'Kolambog,Lapasan Cagayan de Oro City', 'Married', '38562 Era Meadows,Iligan City', '+639325555500', '1'),
(4, 'Terry', 'Sal', 'Castillo', 'Female', 'Iglesia ni Cristo', '1991-11-23', 'Sto nino,Lapasan Cagayan de Oro City', 'Married', '2949 Jerry Cliff Surigao del Sur,Castillo', '+639105551580', '1'),
(5, 'Robin', 'Jimmy', 'Munduya', 'Male', 'Christian', '1985-11-23', 'San Juan 1,Lapasan Cagayan de Oro City', 'Single', '2638 Sarai Parks Agusan del Sur,Prosperidad', '+639195556292', '1'),
(6, 'Pat', 'Popoy', 'Inot', 'Male', 'Roman Catholic', '1981-10-21', 'Sta.Cruz 2,Lapasan Cagayan de Oro City', 'Divorced', '48512 Schinner Via Surigao del Sur, Panaosawon', '+639295551751', '1'),
(7, 'cabali', 'johna mae', 'velasco', 'male', 'muslim', '1982-06-09', 'western kolambog,lapasan cagayan de oro city', 'married', '956 feeney bridge,zamboanga sibugay', '+639325554823', '0'),
(8, 'Curt', 'Buster', 'Hanz', 'Male', 'Roman Catholic', '1979-07-24', 'San Juan 1 Lapasan,Cagayan de Oro City', 'Married', '425 Padberg Alley,South Cotabato', '+639105559150', '1'),
(9, 'ladao', 'jupiter', '', 'female', 'christian', '1990-07-01', 'sta. cruz 2 lapasan,cagayan de oro city', 'single', 'sta cruz 2 lapasan,cagayan de oro city', '+639325551818', '1'),
(10, 'choke', 'marvin', 'pangan', 'male', 'jehovahs witness', '2005-09-27', 'sta. cruz 2,lapasan cagayan de oro city', 'single', '57852 serenity garden south cotabato, koronadal city', '+639335556393', '0'),
(11, 'Marban', 'Jiezle', 'Paney', 'Female', 'Roman Catholic', '1997-05-30', 'Western Kolambog, Lapasan Cagayan de Oro City', 'Single', 'Western Kolambog, Lapasan Cagayan de Oro City', '+639260555952', '1'),
(12, 'Medel', 'Giovanni', 'Pajardo', 'Male', 'Jehovahs Witness', '1998-07-26', 'Sto. nino,Lapasan Cagayan de Oro City', 'Married', '441 Sim Shoal,Zamboanga del Norte', '+639283555445', '1'),
(13, 'Munoz', 'Grace Ann', 'Palamine', 'Female', 'Roman Catholic', '1984-05-05', 'Sta. Cruz 2,Lapasan Cagayan de Oro City', 'Widowed', '7041 Deckow Drives\r\nZamboanga Sibugay, Poblacion City', '+639283555501', '1'),
(14, 'Paano', 'John Rey', 'Cagas', 'Male', 'Roman Catholic', '1996-08-25', 'Sta. Cruz 2,Lapasan Cagayan de Oro City', 'Single', '2784 Hermann Via Davao del Norte, Sua-on, Sambayon', '+639105556567', '1'),
(15, 'Sanguilon', 'Bridgette', 'Caingay', 'Female', 'Seventh-day Adventist', '1994-02-28', 'Western Kolambog,Lapasan Cagayan de Oro City', 'Single', 'Western Kolambog,Lapasan Cagayan de Oro City', '+639195557439', '1'),
(16, 'Mendez', 'John', 'Tusoy', 'Male', 'Roman Catholic', '1987-09-13', 'Sta. Cruz 1 Lapasan,Cagayan de Oro City', 'Married', '3722 Letitia Run Zamboanga Sibugay, Mamangon', '+639075557654', '1'),
(17, 'Panillon', 'Cherry', 'Rivera', 'Female', 'Roman Catholic', '1974-09-12', 'San Juan 1,Lapasan Cagayan de Oro City', 'Married', 'San Juan 1,Lapasan Cagayan de Oro City', '+639280555425', '1'),
(18, 'Montareal', 'Kristene', 'Rebino', 'Female', 'Roman Catholic', '1997-02-02', 'Sto nino,Lapasan Cagayan de Oro City', 'Single', '76683 Jaquan Parkway Maguindanao, Bual', '+639285558710', '1'),
(19, 'tareal', 'shai', 'mon', 'female', 'roman catholic', '1998-05-08', 'sta. cruz 1 lapasan,cagayan de oro city', 'single', '1294 coby street davao del norte, dagohoy, daligdigon', '+639285557079', '1'),
(20, 'Cruz', 'Queenie', 'Pasardan', 'Female', 'Roman Catholic', '1995-09-03', 'San Juan 1,Lapasan Cagayan de Oro City', 'Single', 'San Juan 1,Lapasan Cagayan de Oro City', '+639285555129', '1'),
(21, 'asdasd', 'asd', 'asdasd', 'female', 'christian', '2009-12-31', 'assadasd', 'married', 'bancal carmona cavite', '+639069146830', '0'),
(22, 'daohog', 'christian', '', 'male', 'christian', '2020-12-31', '21-20 upper, nazareth', 'single', 'bancal carmona cavite', '+639959125420', '1'),
(23, 'jalop', 'cindy', 'pangan', 'female', 'christian', '2020-12-31', 'macabalan', 'single', 'bancal carmona cavite', '+639069146830', '0'),
(24, 'jabunan', 'rije', '', 'female', 'christian', '2020-12-31', 'ramonal', 'married', 'bancal carmona cavite', '+639069146830', '1'),
(25, 'cindy', 'cindy', 'jalop', 'female', 'christian', '2003-12-31', 'macabalan cagayan de oro city', 'married', 'bancal carmona cavite', '+639069146830', '1'),
(26, 'daohog', 'christian', 'montoya', 'female', 'christian', '2020-12-31', 'nazareth', 'widow', 'bancal carmona cavite', '+639069146830', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clearance_requested`
--
ALTER TABLE `clearance_requested`
  ADD PRIMARY KEY (`clearanceRequested_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `clearance_id` (`clearance_id`);

--
-- Indexes for table `clearance_type`
--
ALTER TABLE `clearance_type`
  ADD PRIMARY KEY (`clearance_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clearance_requested`
--
ALTER TABLE `clearance_requested`
  MODIFY `clearanceRequested_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `clearance_type`
--
ALTER TABLE `clearance_type`
  MODIFY `clearance_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clearance_requested`
--
ALTER TABLE `clearance_requested`
  ADD CONSTRAINT `clearance_requested_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `resident` (`res_id`),
  ADD CONSTRAINT `clearance_requested_ibfk_2` FOREIGN KEY (`clearance_id`) REFERENCES `clearance_type` (`clearance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
