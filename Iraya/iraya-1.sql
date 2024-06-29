-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 01:02 AM
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
-- Database: `iraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `journal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `journal_title` varchar(255) NOT NULL,
  `journal_content` text NOT NULL,
  `sticker_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`journal_id`, `user_id`, `journal_title`, `journal_content`, `sticker_name`) VALUES
(27, 6, 'a', 'ddf', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `journal_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `journal_title` varchar(255) NOT NULL,
  `journal_content` text NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_id`, `index_id`, `user_id`, `journal_title`, `journal_content`, `datetime_created`, `datetime_updated`) VALUES
('j0001', 6, 'ui0001', 'Journal Entry 1', 'Content of journal entry 1.', '2024-06-15 04:00:00', '2024-06-15 04:00:00'),
('j0002', 7, 'ui0002', 'Journal Entry 2', 'Content of journal entry 2.', '2024-06-16 05:00:00', '2024-06-16 05:00:00'),
('j0003', 8, 'ui0003', 'Journal Entry 3', 'Content of journal entry 3.', '2024-06-17 06:00:00', '2024-06-17 06:00:00'),
('j0004', 9, 'ui0004', 'Journal Entry 4', 'Content of journal entry 4.', '2024-06-18 07:00:00', '2024-06-18 07:00:00'),
('j0005', 10, 'ui0005', 'Journal Entry 5', 'Content of journal entry 5.', '2024-06-19 08:00:00', '2024-06-19 08:00:00'),
('j0006', 11, 'ui0001', 'Journal Entry 6', 'Content of journal entry 6.', '2024-06-20 09:00:00', '2024-06-20 09:00:00'),
('j0007', 12, 'ui0002', 'Journal Entry 7', 'Content of journal entry 7.', '2024-06-21 10:00:00', '2024-06-21 10:00:00'),
('j0008', 13, 'ui0003', 'Journal Entry 8', 'Content of journal entry 8.', '2024-06-22 11:00:00', '2024-06-22 11:00:00'),
('j0009', 14, 'ui0004', 'Journal Entry 9', 'Content of journal entry 9.', '2024-06-23 12:00:00', '2024-06-23 12:00:00'),
('j0010', 15, 'ui0005', 'Journal Entry 10', 'Content of journal entry 10.', '2024-06-24 13:00:00', '2024-06-24 13:00:00'),
('j0011', 16, 'ui0001', 'Journal Entry 11', 'Content of journal entry 11.', '2024-06-25 14:00:00', '2024-06-25 14:00:00'),
('j0012', 17, 'ui0002', 'Journal Entry 12', 'Content of journal entry 12.', '2024-06-26 15:00:00', '2024-06-26 15:00:00'),
('j0013', 18, 'ui0003', 'Journal Entry 13', 'Content of journal entry 13.', '2024-06-26 16:00:00', '2024-06-26 16:00:00'),
('j0014', 19, 'ui0004', 'Journal Entry 14', 'Content of journal entry 14.', '2024-06-27 17:00:00', '2024-06-27 17:00:00'),
('j0015', 20, 'ui0005', 'Journal Entry 15', 'Content of journal entry 15.', '2024-06-28 18:00:00', '2024-06-28 18:00:00'),
('j0016', 21, 'ui0001', 'Journal Entry 16', 'Content of journal entry 16.', '2024-06-29 19:00:00', '2024-06-29 19:00:00'),
('j0017', 22, 'ui0002', 'Journal Entry 17', 'Content of journal entry 17.', '2024-06-30 20:00:00', '2024-06-30 20:00:00'),
('j0018', 23, 'ui0003', 'Journal Entry 18', 'Content of journal entry 18.', '2024-07-01 21:00:00', '2024-07-01 21:00:00'),
('j0019', 24, 'ui0004', 'Journal Entry 19', 'Content of journal entry 19.', '2024-07-02 22:00:00', '2024-07-02 22:00:00'),
('j0020', 25, 'ui0005', 'Journal Entry 20', 'Content of journal entry 20.', '2024-07-03 23:00:00', '2024-07-03 23:00:00'),
('j0021', 1, 'ui0001', 'jhef first journal entry', 'this is my first journal entry', '2024-06-22 02:58:03', '2024-06-22 05:26:08'),
('j0022', 2, 'ui0002', 'maui first journal entry', 'this is my first journal entry', '2024-06-22 02:58:03', '2024-06-22 05:26:12'),
('j0023', 3, 'ui0003', 'von first journal entry', 'this is my first journal entry', '2024-06-22 02:58:03', '2024-06-22 05:26:15'),
('j0024', 4, 'ui0004', 'mark first journal entry', 'this is my first journal entry', '2024-06-22 02:58:03', '2024-06-22 05:26:21'),
('j0025', 5, 'ui0005', 'andrea first journal entry', 'this is my first journal entry', '2024-06-22 02:58:03', '2024-06-22 05:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `index_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'light',
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`index_id`, `username`, `password`, `theme`, `datetime_created`, `datetime_updated`) VALUES
(6, 'von', '123', 'light', '2024-06-08 03:35:34', '2024-06-08 03:35:34'),
(7, 'Kazzuhira', '1234567890', 'light', '2024-06-08 03:35:34', '2024-06-08 03:35:34'),
(8, 'jhefanon', 'jhefanon', 'light', '2024-06-21 13:43:29', '2024-06-21 13:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `theme` int(11) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `index_id`, `username`, `age`, `password`, `theme`, `datetime_created`, `datetime_updated`) VALUES
('ui0001', 1, 'Jhef', 20, 'jhef123', 0, '2024-06-22 02:47:50', '2024-06-22 02:47:50'),
('ui0002', 2, 'Maui', 20, 'maui123', 0, '2024-06-22 02:47:50', '2024-06-22 02:47:50'),
('ui0003', 3, 'Von', 20, 'von123', 0, '2024-06-22 02:47:50', '2024-06-22 02:47:50'),
('ui0004', 4, 'Mark', 20, 'mark123', 0, '2024-06-22 02:47:50', '2024-06-22 02:47:50'),
('ui0005', 5, 'Andrea', 20, 'andrea123', 0, '2024-06-22 02:47:50', '2024-06-22 02:47:50'),
('ui0006', 6, 'Alice', 25, 'alice123', 0, '2024-06-15 04:00:00', '2024-06-15 04:00:00'),
('ui0007', 7, 'Bob', 30, 'bob123', 0, '2024-06-16 05:00:00', '2024-06-16 05:00:00'),
('ui0008', 8, 'Charlie', 28, 'charlie123', 0, '2024-06-17 06:00:00', '2024-06-17 06:00:00'),
('ui0009', 9, 'David', 35, 'david123', 0, '2024-06-18 07:00:00', '2024-06-18 07:00:00'),
('ui0010', 10, 'Eve', 22, 'eve123', 0, '2024-06-19 08:00:00', '2024-06-19 08:00:00'),
('ui0011', 11, 'Frank', 29, 'frank123', 0, '2024-06-20 09:00:00', '2024-06-20 09:00:00'),
('ui0012', 12, 'Grace', 31, 'grace123', 0, '2024-06-21 10:00:00', '2024-06-21 10:00:00'),
('ui0013', 13, 'Hank', 26, 'hank123', 0, '2024-06-22 11:00:00', '2024-06-22 11:00:00'),
('ui0014', 14, 'Ivy', 27, 'ivy123', 0, '2024-06-23 12:00:00', '2024-06-23 12:00:00'),
('ui0015', 15, 'Jack', 24, 'jack123', 0, '2024-06-24 13:00:00', '2024-06-24 13:00:00'),
('ui0016', 16, 'Karen', 33, 'karen123', 0, '2024-06-25 14:00:00', '2024-06-25 14:00:00'),
('ui0017', 17, 'Leo', 23, 'leo123', 0, '2024-06-26 15:00:00', '2024-06-26 15:00:00'),
('ui0018', 18, 'Mia', 34, 'mia123', 0, '2024-06-26 16:00:00', '2024-06-26 16:00:00'),
('ui0019', 19, 'Nina', 32, 'nina123', 0, '2024-06-27 17:00:00', '2024-06-27 17:00:00'),
('ui0020', 20, 'Oscar', 21, 'oscar123', 0, '2024-06-28 18:00:00', '2024-06-28 18:00:00'),
('ui0021', 21, 'Paul', 29, 'paul123', 0, '2024-06-29 19:00:00', '2024-06-29 19:00:00'),
('ui0022', 22, 'Quincy', 30, 'quincy123', 0, '2024-06-30 20:00:00', '2024-06-30 20:00:00'),
('ui0023', 23, 'Rachel', 28, 'rachel123', 0, '2024-07-01 21:00:00', '2024-07-01 21:00:00'),
('ui0024', 24, 'Steve', 27, 'steve123', 0, '2024-07-02 22:00:00', '2024-07-02 22:00:00'),
('ui0025', 25, 'Tina', 26, 'tina123', 0, '2024-07-03 23:00:00', '2024-07-03 23:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `index_id` (`index_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `index_id` (`index_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
