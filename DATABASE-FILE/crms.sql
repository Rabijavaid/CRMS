-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 10:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `complainUser` varchar(100) NOT NULL,
  `complainSubject` varchar(100) NOT NULL,
  `complaindetails` text NOT NULL,
  `complainStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `complainUser`, `complainSubject`, `complaindetails`, `complainStatus`) VALUES
(1, 'sumamafarooq@gmail.com', 'theft', '\"\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"', 1),
(2, 'sumamafarooq@gmail.com', 'car theft', '\"\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"', 0),
(3, 'sumamafarooq@gmail.com', 'abuse', '\"\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crime_id` int(11) NOT NULL,
  `crime_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`crime_id`, `crime_name`) VALUES
(1, 'terrorist'),
(2, 'arson'),
(3, 'child abuse'),
(4, 'domestic abuse'),
(5, 'kidnapping'),
(6, 'rape and statutory rape'),
(7, 'Larceny'),
(8, 'Robbery'),
(9, 'Burglary'),
(10, 'Drug Manufacturing'),
(11, 'murder'),
(12, 'cybercrime');

-- --------------------------------------------------------

--
-- Table structure for table `crime_status`
--

CREATE TABLE `crime_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime_status`
--

INSERT INTO `crime_status` (`status_id`, `status_name`) VALUES
(1, 'Prisoner'),
(2, 'Suspect'),
(3, 'Convict'),
(4, 'wanted'),
(5, 'Most wanted'),
(6, 'Fugitives‎ '),
(7, 'Outlaws‎ ');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(100) NOT NULL,
  `C_Fname` varchar(100) NOT NULL,
  `C_cnic` varchar(16) NOT NULL,
  `C_image` varchar(15) NOT NULL,
  `C_crime` int(11) NOT NULL,
  `C_status` int(11) NOT NULL,
  `C_address` text NOT NULL,
  `C_officer` int(11) NOT NULL,
  `C_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`C_id`, `C_name`, `C_Fname`, `C_cnic`, `C_image`, `C_crime`, `C_status`, `C_address`, `C_officer`, `C_detail`) VALUES
(1, 'HAMID MUSHTAQ', 'MUHAMMAD MUSHTAQ', '35102-3143534-5', '1039345772.jpg', 10, 5, 'PATTOKI, KASUR, PUNJAB, PAKISTAN', 2, '\"\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"'),
(12, 'ZEESHAN BADSHAH', 'MUHAMMAD AKRAM', '35102-3143534-5', '1437847275.jpg', 2, 3, 'LINK NAHAR , JAMBER', 2, 'kajbdbhadbjhsdh'),
(20, 'KASHIF BARKAT', 'MUHAMMAD BARKAT', '35102-3143534-5', '2145001409.jpg', 4, 3, 'PATTOKI, KASUR, PUNJAB, PAKISTAN', 2, 'bhzbzbihsdsbbd'),
(21, 'WAQAS SAEED', 'MUHAMMAD SAEED', '35102-3143534-5', '215185301.jpg', 3, 5, 'PATTOKI, KASUR, PUNJAB, PAKISTAN', 2, 'akhabdbisfiys');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CNIC` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `photo` varchar(15) NOT NULL,
  `cases` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `name`, `Fname`, `Email`, `CNIC`, `city`, `rank`, `ps_id`, `photo`, `cases`, `contact`) VALUES
(0, 'No Officer ', '', '', '', '', 0, 0, '', 11, ''),
(1, 'KASHIF BARKAT', 'MUHAMMAD BARKAT', 'kashifkhan0052@gmail.com', '35102-1232421-3', 'NAROKI MAHJA , PATTOKI', 12, 0, '1544698154.jpg', 0, '0304-9696189'),
(2, 'SUMAMA FAROOQ', 'MUHAMMAD FAROOQ', 'kakoobadshah679@gmail.com', '35103-4953674-3', 'JABO MAIL , KASUR', 6, 4, '1955452157.jpg', 4, '0308-4776963'),
(3, 'LAEEQ AHMAD', 'DAULAT KHAN', 'laeeqahmad123@gmail.com', '35101-2314254-4', 'FARMANITIES LAHORE', 4, 0, '571674252.jpg', 0, '0321-7583547'),
(4, 'MUHAMMAD HAMZA', 'DAULAT KHAN', 'hamzahamii123@gmail.com', '35102-3223435-4', 'FARMANITIES LAHORE', 3, 5, '201443392.jpg', 0, '0300-3536637'),
(8, 'WAQAR RANA', 'RANA AKRAM', 'waqarRana564@gmail.com', '35102-3143534-5', 'MAIN BYPASS PATTOKI', 3, 0, '883737966.jpg', 0, '03011067084'),
(9, 'MUHAMMAD ZEESHAN', 'MUHAMMAD AKRAM', 'zeeshanakram0026@gmail.com', '35102-3143534-5', 'LINK NAHAR , JAMBER', 4, 2, '994201244.jpg', 0, '049-12323432'),
(10, 'SAKHAWAT MAYO', '..............', 'sakhawatMayo0017@gmail.com', '35102-3143534-5', 'MAIN BYPASS PATTOKI', 2, 0, '1665520253.jpg', 0, '0300-3536637'),
(11, 'HAMID MUSHTAQ', 'MUHAMMAD MUSHTAQ', 'hamidhamii0056@gmail.com', '35102-3143534-5', 'PATTOKI', 7, 0, '90073720.jpg', 0, '03014378121'),
(12, 'JAWAD TARIQ', 'MUHAMMAD TARIQ', 'saqibch0055@gmail.com', '35102-3143534-5', 'PATTOKI', 10, 0, '1914171254.jpg', 0, '03024646847'),
(13, 'WAQAS SAEED', 'MUHAMMAD SAEED', 'waqassaeed0037@gmail.com', '35102-3143534-5', 'PATTOKI', 5, 0, '1682784152.jpg', 0, '0308-4776963'),
(16, 'TALHA SHAKEEL', 'MUHAMMAD SHAKEEL', 'talhashakeel919@gmail.com', '35102-3143534-5', 'PATTOKI', 5, 0, '1561542126.jpg', 0, '0308-4776963');

-- --------------------------------------------------------

--
-- Table structure for table `policestation`
--

CREATE TABLE `policestation` (
  `PSID` int(11) NOT NULL,
  `ps_name` varchar(100) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `O_id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policestation`
--

INSERT INTO `policestation` (`PSID`, `ps_name`, `contactNo`, `O_id`, `location`, `url`) VALUES
(0, 'OFF Duty', '', 0, '', ''),
(2, 'SADAR POLICE STATION PATTOKI ', '049-1232343', 9, 'PATTOKI, KASUR, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Sadar+police+station+pattoki/@31.0218827,73.832484,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391841e3921227c1:0x35f8277dcdcd8b16!8m2!3d31.0393896!4d73.846998'),
(4, 'JOHAR TOWN POLICE STATION ', '+9230144585', 2, 'LANE 22, WAFAQI COLONY, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Johar+Town+Police+Station/@31.4783451,74.2730917,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391903e7d7dd7301:0xc6efedab78963816!8m2!3d31.4783451!4d74.2906012'),
(5, 'HALLOKI POLICE STATION', '+9242358105', 4, 'BLOCK A3 BLOCK A 3 ENGINEERS TOWN, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Halloki+Police+Station/@31.3947441,74.2762987,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391900bc05c472dd:0xdaef60645ef0f9e4!8m2!3d31.3947441!4d74.2938082'),
(6, 'POLICE STATION NAWAB TOWN', '+9232154284', 0, 'BLOCK D NAWAB TOWN, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Police+Station+Nawab+Town/@31.4525679,74.232361,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x3919018e4a23e455:0x54d518d958f841e8!8m2!3d31.4525679!4d74.2498705'),
(7, 'NISHTAR POLICE STATION', '+9242358105', 0, 'SALMAN BLOCK NISHTER COLONY, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Nishtar+Police+Station/@31.4222728,74.3437099,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391907a85a4b6f13:0x88e72edcf3aaf52!8m2!3d31.4222728!4d74.3612194'),
(8, 'LIAQATABAD POLICE STATION', '+9242992303', 0, 'THALLA FLATS, BLOCK Q, OPPOSITE TUBE WELL، BLOCK Q FLATS MODEL TOWN, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Liaqatabad+Police+Station/@31.470214,74.3121969,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391906a734990519:0x104df35b619c8bab!8m2!3d31.470214!4d74.3297064'),
(9, 'TOWN SHIP POLICE STATION', '+9242351244', 0, 'TOWNSHIP TWP COMMERCIAL AREA LAHORE, PUNJAB 54770, PAKISTAN', 'https://www.google.com/maps/place/Town+Ship+Police+Station/@31.45136,74.2909201,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x3919014b9870f003:0xea4280e16cb093ae!8m2!3d31.45136!4d74.3084296'),
(10, 'FAISAL TOWN POLICE STATION', '+9242992315', 0, 'BLOCK N BLOCK N CENTRAL FLATS MODEL TOWN, LAHORE, PUNJAB, PAKISTAN', 'https://www.google.com/maps/place/Faisal+Town+Police+Station/@31.4760214,74.293143,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x391903f8b707a4c9:0x81125eaff8c225b9!8m2!3d31.4760214!4d74.3106525'),
(11, 'ICHHRA POLICE STATION', '+9242375814', 0, 'SHAH JAMAL RD, ICHHRA LAHORE, PUNJAB 54000, PAKISTAN', 'https://www.google.com/maps/place/Ichhra+Police+Station/@31.53041,74.3051941,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x3919049a6f8d43ab:0x529c1ee338af2bb7!8m2!3d31.53041!4d74.3227036'),
(12, 'GREEN TOWN POLICE STATION', '+9242351180', 0, 'CHAUDHRY, RAHMAT ALI RD, TOWNSHIP BLOCK 2 SECTOR 1 LAHORE, PUNJAB 54000, PAKISTAN', 'https://www.google.com/maps/place/Green+Town+Police+Station/@31.4385043,74.2803685,14z/data=!4m8!1m2!2m1!1spolice+station!3m4!1s0x3919013a50b5498b:0xf51950a790fd390c!8m2!3d31.4385043!4d74.297878');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `RankName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `RankName`) VALUES
(1, 'Constable'),
(2, 'Head Constable'),
(3, 'Assistant Sub-Inspector'),
(4, 'Sub-Inspector'),
(5, 'Police Inspector'),
(6, 'Assistant Superintendent of Police'),
(7, 'Deputy Superintendent of Police'),
(8, 'Superintendent of Police'),
(9, 'Senior Superintendent of Police'),
(10, 'Deputy Inspector General'),
(11, 'Additional Inspector General'),
(12, 'Inspector General of Police');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userCNIC` varchar(15) NOT NULL,
  `userContact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userCNIC`, `userContact`) VALUES
(1, 'sumama farooq', 'sumamafarooq@gmail.com', '35103-2323232-2', '03084776963');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_name`, `password`, `role`) VALUES
('hamidhamii0056@gmail.com', '71b8c251d6c166a09783416c6616661a', 'c81e728d9d4c2f636f067f89cc14862c'),
('hamzahamii123@gmail.com', '184a7e2e854b8f9b273e3ff9e8cb0314', 'c81e728d9d4c2f636f067f89cc14862c'),
('kakoobadshah679@gmail.com', 'f579763fc1d09b844493b41756d10786', 'c81e728d9d4c2f636f067f89cc14862c'),
('kashifkhan0052@gmail.com', 'b70b37ead22206c4e81418abf84944a4', 'c81e728d9d4c2f636f067f89cc14862c'),
('laeeqahmad123@gmail.com', '100ae53ac716fe1a68aeccdeafe98d05', 'c81e728d9d4c2f636f067f89cc14862c'),
('sakhawatMayo0017@gmail.com', '181cceb314143ed1a1cc8810fcac047e', 'c81e728d9d4c2f636f067f89cc14862c'),
('saqibch0055@gmail.com', 'a68cb4086a1bacaa8a20bafc11f43ba5', 'c81e728d9d4c2f636f067f89cc14862c'),
('sumamafarooq0018@gmail.com', '181cceb314143ed1a1cc8810fcac047e', 'c81e728d9d4c2f636f067f89cc14862c'),
('sumamafarooq567@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'c4ca4238a0b923820dcc509a6f75849b'),
('sumamafarooq@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
('talhashakeel123@gmail.com', 'c3eb8a7ea85586ed4ad019c6f74a1022', 'c81e728d9d4c2f636f067f89cc14862c'),
('talhashakeel919@gmail.com', '2c0d3ab73dddaab21cacebb38818287e', 'c81e728d9d4c2f636f067f89cc14862c'),
('waqarRana564@gmail.com', 'cbdf6f1c92f284d7a31af4c0fc213f9d', 'c81e728d9d4c2f636f067f89cc14862c'),
('waqassaeed0037@gmail.com', 'cab51edeaad6dc29f563cbe29c8099a7', 'c81e728d9d4c2f636f067f89cc14862c'),
('zeeshanakram0026@gmail.com', '8bdaa559c32d880e78a7e1ef5869191a', 'c81e728d9d4c2f636f067f89cc14862c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `crime_status`
--
ALTER TABLE `crime_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officer_id`),
  ADD UNIQUE KEY `Email_2` (`Email`),
  ADD UNIQUE KEY `Email_3` (`Email`);

--
-- Indexes for table `policestation`
--
ALTER TABLE `policestation`
  ADD PRIMARY KEY (`PSID`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `crime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crime_status`
--
ALTER TABLE `crime_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `policestation`
--
ALTER TABLE `policestation`
  MODIFY `PSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
