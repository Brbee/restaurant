-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 18, 2022 at 09:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `showed_up` tinyint(1) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `table_id`, `start_time`, `end_time`, `showed_up`, `comment`) VALUES
(3, 1, 13, '2022-03-15 12:15:00', '2022-03-15 15:15:00', NULL, NULL),
(4, 1, 14, '2022-03-15 09:15:00', '2022-03-15 15:15:00', NULL, NULL),
(8, 1, 12, '2022-03-14 12:15:00', '2022-03-14 18:15:00', NULL, NULL),
(9, 1, 11, '2022-03-14 12:15:00', '2022-03-14 18:15:00', NULL, NULL),
(11, 1, 13, '2022-03-11 19:00:00', '2022-03-11 22:00:00', NULL, NULL),
(12, 1, 9, '2022-03-11 19:00:00', '2022-03-11 22:00:00', NULL, NULL),
(14, 1, 14, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(16, 1, 7, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(17, 1, 8, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(18, 1, 9, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(19, 1, 10, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(20, 1, 11, '2022-03-06 10:15:00', '2022-03-06 14:15:00', NULL, NULL),
(21, 1, 9, '2022-03-08 16:15:00', '2022-03-08 20:15:00', NULL, NULL),
(22, 1, 13, '2022-03-17 11:00:00', '2022-03-17 14:00:00', 0, NULL),
(25, 1, 11, '2022-03-24 09:30:00', '2022-03-24 12:30:00', NULL, NULL),
(52, 1, 13, '2022-03-31 08:45:00', '2022-03-31 12:45:00', NULL, NULL),
(69, 27, 11, '2022-05-26 09:15:00', '2022-05-26 12:15:00', NULL, NULL),
(70, 27, 13, '2022-05-20 08:30:00', '2022-05-20 10:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `position_x` decimal(10,2) NOT NULL,
  `position_y` decimal(10,2) NOT NULL,
  `about_table` text NOT NULL,
  `num_of_seats` int(11) NOT NULL,
  `size` varchar(1) NOT NULL,
  `rotate` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `position_x`, `position_y`, `about_table`, `num_of_seats`, `size`, `rotate`) VALUES
(7, '1.00', '22.00', '', 6, 'L', '0.00'),
(8, '25.00', '22.00', '', 6, 'L', '0.00'),
(9, '50.00', '22.00', 'sada', 6, 'L', '0.00'),
(10, '5.20', '42.00', '', 6, 'L', '159.50'),
(11, '37.00', '42.00', '', 6, 'L', '0.00'),
(12, '62.50', '42.00', '', 6, 'L', '0.00'),
(13, '89.00', '42.00', '', 6, 'L', '0.00'),
(14, '86.50', '65.00', '', 6, 'L', '90.00'),
(24, '2.00', '1.00', '', 6, 'L', '0.00'),
(25, '25.00', '1.00', '', 6, 'L', '0.00'),
(26, '51.00', '1.00', '', 6, 'L', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'admin', 'adminovic', 'rotkiv.r@gmail.com', '$2y$10$WzRErCZpsBqhI9La2gMVH.BMjtfFBSftUv7tlhr1FLczrmtJuIk3K', '0659444991', 2),
(2, '', '', 'viktor@gmail.com', '$2y$10$ZhygakP1ZVTUy2t3BHk6A.M/Sg89ef.hoJ8U9BZyeN6vSByyZN0ZO', '', 0),
(8, 'Viktor', 'Rackov', 'rotkiv.r@gmail.coma', '$2y$10$kbYvWMrvLAqX5NNXkmdxDe06YrhCncASN8YBhF1.yMe02kNMzbs3S', '123', NULL),
(9, 'VIktor', 'Rackov', 'rotkiv.r@g', '$2y$10$OTyPBPhVv4.SR1xlKOrvz..DTw8s4ZxzZTmFw05IzTIbI9SMbbaE.', '06594449911', NULL),
(10, 'VIktor', 'Rackov', 'rotkiv@gmail.com', '$2y$10$kDyGg5BguZVFbSDe7Xyiae64GmGbREtptR7BP2EarPQ6ccZFUeRZe', '1234', NULL),
(11, 'VIktor', 'Rackov', 'rotkiv.r', '$2y$10$BKSEgwObYEzyRKZRpXp4fOinqBdIRfdGNyskzwYuMqrPTKXQaUR.O', 'ss', NULL),
(12, 'Viktor', 'Rackov', 'rotkiv.r@gmail.comm', '$2y$10$fyBDz7dpUJaYxpOFD6k38uxu4/g/zFB1qQisHA4HzU8nlbC.nZC4C', '456', 1),
(14, 'Viktori', 'asd', 'rotkiv.r@gmail.commms', '$2y$10$1n29wY7b/rGPNNitlm5dKeu.5BQtRcH/AOCE87NxP1sEsWucxtkhq', '1125', 1),
(15, 'asd', 'asd', 'rrs@s.s', '$2y$10$1yLNePnP6WxxvMk9qYJ9FeiNtuMBmgC0q7wUXUaFaon5kCzfKAXVm', '5465', NULL),
(16, 'Viktor', 'Rackov', 'rotkiv.r@gmail.comasda', '$2y$10$Gv59H6Etk1wVwFhh9BAqI.Q7jEJkkRhQXvJ6Uyh4EWbqETodalWA2', '45664', NULL),
(17, 'Viktor', 'Rackov', 'rotkiv.r@gmail.comasdasaa', '$2y$10$MQvNdjb1oIAVv9glULpPK./6wghm/.7G3wcWLpidnTTapzrWGuTqa', '4566445', NULL),
(27, 'Uros', 'Jeknic', 'urosjeknic@gmail.com', '$2y$10$i1054UcAeoAUI1JdCBy3c.BfJocLlNzQMn/F/Om9e4jOFaIiWMVxq', '0606692032', 2),
(28, 'Uros', 'Jeknic', 'urosjekna@gmail.com', '$2y$10$l8HUYAomPWuBqcMrNTsOqe3Jbxu8gsOkhASOa5BTZbiaJTXOXoXoK', '0606692031', NULL),
(29, 'Uros', 'Yekna', 'urosyekna@gmail.com', '$2y$10$1g6w//IdHo39Bv.VUTq2zuCH2ns0nzcqCnTetgeD1ZMlPf43msP6y', '0603854626', NULL);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `NewUser` AFTER INSERT ON `users` FOR EACH ROW BEGIN
     INSERT INTO verification(user_id)
     VALUES(new.user_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `verif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiration_date` varchar(100) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `verified` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`verif_id`, `user_id`, `expiration_date`, `code`, `verified`) VALUES
(1, 17, NULL, NULL, NULL),
(2, 1, '1648930831', '$2y$10$wrlxVHdYHEhKiPlZRVJvoOAGfvbz7l8gMA5yXFBfAlwX1qXfzY3sy', 1),
(13, 27, '1651606932', '$2y$10$T/LHw2iWstOzH1v0fs2fDON0knBr8scmFOxxodvJuEFRi0ML9X5SS', 1),
(14, 28, '1651697523', '$2y$10$xgqucwjE0eKvuIwIb3/sVekBTmWsFZk9E3WbDj8CJNtKkLYUqhVVe', 1),
(15, 29, '1651698050', '$2y$10$87UXvMM04GVZskL0X8XF2Oxr5G3k1Rk0hEL7KFl2H62SWWz0o.J2e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`verif_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `verif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`);

--
-- Constraints for table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
