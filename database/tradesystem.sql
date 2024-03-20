-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebartersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`) VALUES
(1, 'Angel', 'angel@gmail.com', '$2y$10$Ydw.dAiVLooCYVG5jRYApe4QVS1FPM/F80xl.uuOIoz2Aaq3Uc04a'),
(2, 'Angel', 'angel@gmail.com', '$2y$10$v/p24VQDZh2Oc4LePOV3i.k//R.HgrYQTvGhnsNS3tvhJopzobTTK'),
(3, 'Angeline', 'Angeline@gmail.com', '$2y$10$6/.9dm0DSZvJm3cP1P.zfuYGvnYkFq3KKTGCpNb6Cp7uhQdwEVp7q'),
(4, 'Angeline', 'Angeline@gmail.com', '$2y$10$rU6EfoZyd/kz5dOgydp7re98/VTdaAOgRFLpXPgDWjClyL.y9TdhG'),
(5, 'Angeline', 'Angeline@gmail.com', '$2y$10$KGiRjV2YfcjT1Xabd4BiiepZR6wAG1TLsIxVbLOnljI5Pq1HCBHtC'),
(6, 'Jasmine', 'jasmine@gmail.com', '$2y$10$rnGzS4dESs6gffH5dY1.tuSlc/azrzfHCCfsE4Jp.u2yoD6.tfZYS'),
(7, 'Jasmine', 'jasmine@gmail.com', '$2y$10$4LaOBceTu/.HXf2PRuBRKOkEaVWLt.PhOL22EDMiV6WuwJgU3fqXS'),
(8, 'Jasmine', 'jasmine@gmail.com', '$2y$10$hgdI/yc1D2DqCcGtJ5NM6.byv8ynlJR7Y4P1TwLbBBdybeL1pYYgq'),
(9, 'Jasmine', 'jasmine@gmail.com', '$2y$10$dI3h3GOIJXk6XVwQNb/paO.MjTHnAYfcAyoSXHquDiPPT4C8uyUxK'),
(10, 'Jasmine', 'jasmine@gmail.com', '$2y$10$fINLsIJoG70FhhL2WD7l4.k6htB0tbyZ0JSTiPHz/HdXkdeKgIs9.'),
(14, 'Angie', 'angie@gmail.com', '$2y$10$hasKQO.WyIeQqUjgQtn1dOvdUAUqZraMZ5hjVV7FyhaSw4wH3lwAu'),
(15, 'Atos', 'atos@gmail.com', '$2y$10$0TJiZnDoLAbAiCV.V4vtOeW6BWS4KwzpSQlA8dpxdA8s0RGRxmKb2'),
(16, 'admi', 'admi@gmail.com', '$2y$10$GQ3cAOgW.Ph9T9gmZYVbvegdDX85Ri3JFHbbc4G5Tdya9M8eeso6a'),
(17, 'ocfemia', 'ocfemia@gmail.com', '$2y$10$n4alf3nNk5Je2ZRtIl880uufD3lRPZfdf5/G2ZbKBqWnx7rqlFZWW'),
(18, 'campos', 'campos@gmail.com', '$2y$10$EQ5EUkeiXqOZmIBrjcqT5ODLIi6WHn7Y96dWqwD9kQZSiClvArPWa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
