-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 08:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Email` varchar(140) DEFAULT NULL,
  `Password` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`) VALUES
(1, 'rahul@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `CarName` varchar(140) DEFAULT NULL,
  `CarOverview` longtext DEFAULT NULL,
  `CarPrice` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Image1` varchar(140) DEFAULT NULL,
  `Image2` varchar(140) DEFAULT NULL,
  `Image3` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `CarName`, `CarOverview`, `CarPrice`, `FuelType`, `SeatingCapacity`, `Image1`, `Image2`, `Image3`) VALUES
(1, 'Maruti Suzuki Swift', 'The 2021 Swift speaks performance, style and dynamism from every angle. Its new dual-tone sporty design is sharp and purposeful, and accentuated by the Sporty Cross Mesh Grille', 250, 'Petrol', 5, 'swiftImg1.jpg', 'swiftImg2.jpeg', 'swiftImg3.jpg'),
(2, 'Maruti Suzuki Baleno', 'Designed to suit the bold lifestyle of the modern car buyer, the New 2022 NEXA Baleno by Maruti Suzuki now comes with the Crafted Futurism design language and first-in-segment technologies and features that offer you a sensorial driving experience.', 350, 'Petrol', 5, 'BalenoImg2.jpg', 'BalenoImg3.jpg', 'BalenoImg3.jpg'),
(4, 'BMW 5 Series', 'The BMW 5 series is here with the power to take you farther. Faster. Best-in-class acceleration that sets you apart from the rest. Adaptive suspension that lets you play with every twist and turn. Coupled with the most advanced driver assistance systems', 850, 'Deisel', 5, 'BmwImg2.jpg', 'BmwImg1.jpg', 'BmwImg3.jpg'),
(5, 'Mercerdes CLA', 'The design puts a shine on you. The performance puts you in the fast lane. The interface speaks your language.', 950, 'Petrol', 5, 'MercedesImg2.jpg', 'MercedesImg1.jpg', 'MercedesImg3.jpg'),
(6, 'Mahindra XUV 700', 'Mahindra XUV700 is an all new, authentic, global SUV set', 550, 'Deisel', 7, 'MahindraImg2.jpg', 'MahindraImg2.jpg', 'MahindraImg3.jpg'),
(7, 'Tata Nexon', 'Nexon’s high-strength steel structure absorbs impact energy and protects the passenger during an unfortunate collision.', 400, 'Deisel', 5, 'NexonImg1.jpg', 'NexonImg2.jpg', 'NexonImg3.jpg'),
(8, 'Maruti Suzuki Brezza', 'Made for adventures and designed with the purpose to takeover. ', 400, 'Petro', 5, 'BrezzaImg2.jpg', 'BrezzaImg1.jpg', 'BrezzaImg3.jpg'),
(9, 'Hyundai i20', 'The all-new i20 has been inspired from Hyundai’s design DNA of “sensuous sportiness” with a dynamic look on the outside & luxurious feeling on the inside.', 350, 'Deisel', 5, 'i20Img1.jpg', 'i20Img2.jpeg', 'i20Img3.jpeg'),
(10, 'Toyota Fortuner', 'The new Legender and Fortuner combines incredible power with legendary styling like never-before. ', 700, 'Deisel', 7, 'fortunerImg1.jpg', 'fortunerImg2.jpeg', 'fortunerImg3.jpeg'),
(11, 'Volvo XC90', 'The XC90 mild hybrid has been engineered to deliver smooth take-offs and refined acceleration, making both city and highway journeys more refined', 1100, 'Deisel', 7, 'VolvoImg1.jpg', 'VolvoImg2.jpg', 'VolvoImg3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `userbookings`
--

CREATE TABLE `userbookings` (
  `id` int(11) NOT NULL,
  `BookingNumber` int(11) DEFAULT NULL,
  `email` varchar(140) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL,
  `TotalDays` int(11) DEFAULT NULL,
  `BookingDate` varchar(80) DEFAULT NULL,
  `BookingStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userbookings`
--

INSERT INTO `userbookings` (`id`, `BookingNumber`, `email`, `VehicleID`, `TotalDays`, `BookingDate`, `BookingStatus`) VALUES
(6, 84416, 'rahul@gmail.com', 5, 3, '2023-02-24', 0),
(9, 57585, 'rahul@gmail.com', 4, 1, '2023-02-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`) VALUES
(6, 'Rahul Lama', 'rahul@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userbookings`
--
ALTER TABLE `userbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userbookings`
--
ALTER TABLE `userbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
