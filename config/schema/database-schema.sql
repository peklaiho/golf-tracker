-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2026 at 06:28 AM
-- Server version: 12.2.2-MariaDB
-- PHP Version: 8.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golf`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_holes`
--

CREATE TABLE `course_holes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `par` int(11) NOT NULL,
  `hcp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_hole_distances`
--

CREATE TABLE `course_hole_distances` (
  `id` int(11) NOT NULL,
  `course_hole_id` int(11) NOT NULL,
  `course_tee_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tees`
--

CREATE TABLE `course_tees` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `cr` decimal(4,1) DEFAULT NULL,
  `slope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `green_card_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `course_tee_id` int(11) NOT NULL,
  `tee_time` datetime NOT NULL,
  `note` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `round_holes`
--

CREATE TABLE `round_holes` (
  `id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL,
  `course_hole_id` int(11) NOT NULL,
  `strokes` int(11) NOT NULL,
  `fairway_hit` int(11) DEFAULT NULL,
  `green_in_reg` int(11) DEFAULT NULL,
  `putts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_holes`
--
ALTER TABLE `course_holes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_hole_number` (`course_id`,`number`);

--
-- Indexes for table `course_hole_distances`
--
ALTER TABLE `course_hole_distances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_hole_and_tee` (`course_hole_id`,`course_tee_id`);

--
-- Indexes for table `course_tees`
--
ALTER TABLE `course_tees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_tee_id` (`course_tee_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `round_holes`
--
ALTER TABLE `round_holes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `round_hole` (`round_id`,`course_hole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_holes`
--
ALTER TABLE `course_holes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_hole_distances`
--
ALTER TABLE `course_hole_distances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_tees`
--
ALTER TABLE `course_tees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `round_holes`
--
ALTER TABLE `round_holes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_holes`
--
ALTER TABLE `course_holes`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `course_hole_distances`
--
ALTER TABLE `course_hole_distances`
  ADD CONSTRAINT `course_hole_id` FOREIGN KEY (`course_hole_id`) REFERENCES `course_holes` (`id`),
  ADD CONSTRAINT `course_tee_id` FOREIGN KEY (`course_tee_id`) REFERENCES `course_tees` (`id`);

--
-- Constraints for table `course_tees`
--
ALTER TABLE `course_tees`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `rounds`
--
ALTER TABLE `rounds`
  ADD CONSTRAINT `course_tee_id` FOREIGN KEY (`course_tee_id`) REFERENCES `course_tees` (`id`),
  ADD CONSTRAINT `player_id` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`);

--
-- Constraints for table `round_holes`
--
ALTER TABLE `round_holes`
  ADD CONSTRAINT `course_hole_id` FOREIGN KEY (`course_hole_id`) REFERENCES `course_holes` (`id`),
  ADD CONSTRAINT `round_id` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
