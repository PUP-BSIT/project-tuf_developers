-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 10:15 AM
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
('', 26, '', 'asd', 'asd', '2024-07-03 14:31:41', '2024-07-03 14:31:41'),
('j0001', 6, 'ui0001', 'Journal Entry 1', 'Content of journal entry 1.', '2024-06-14 20:00:00', '2024-06-14 20:00:00'),
('j0002', 7, 'ui0002', 'Journal Entry 2', 'Content of journal entry 2.', '2024-06-15 21:00:00', '2024-06-15 21:00:00'),
('j0003', 8, 'ui0003', 'Journal Entry 3', 'Content of journal entry 3.', '2024-06-16 22:00:00', '2024-06-16 22:00:00'),
('j0004', 9, 'ui0004', 'Journal Entry 4', 'Content of journal entry 4.', '2024-06-17 23:00:00', '2024-06-17 23:00:00'),
('j0005', 10, 'ui0005', 'Journal Entry 5', 'Content of journal entry 5.', '2024-06-19 00:00:00', '2024-06-19 00:00:00'),
('j0006', 11, 'ui0006', 'Journal Entry 6', 'Content of journal entry 6.', '2024-06-20 01:00:00', '2024-06-20 01:00:00'),
('j0007', 12, 'ui0007', 'Journal Entry 7', 'Content of journal entry 7.', '2024-06-21 02:00:00', '2024-06-21 02:00:00'),
('j0008', 13, 'ui0008', 'Journal Entry 8', 'Content of journal entry 8.', '2024-06-22 03:00:00', '2024-06-22 03:00:00'),
('j0009', 14, 'ui0009', 'Journal Entry 9', 'Content of journal entry 9.', '2024-06-23 04:00:00', '2024-06-23 04:00:00'),
('j0010', 15, 'ui0010', 'Journal Entry 10', 'Content of journal entry 10.', '2024-06-24 05:00:00', '2024-06-24 05:00:00'),
('j0011', 16, 'ui0011', 'Journal Entry 11', 'Content of journal entry 11.', '2024-06-25 06:00:00', '2024-06-25 06:00:00'),
('j0012', 17, 'ui0012', 'Journal Entry 12', 'Content of journal entry 12.', '2024-06-26 07:00:00', '2024-06-26 07:00:00'),
('j0013', 18, 'ui0013', 'Journal Entry 13', 'Content of journal entry 13.', '2024-06-26 08:00:00', '2024-06-26 08:00:00'),
('j0014', 19, 'ui0014', 'Journal Entry 14', 'Content of journal entry 14.', '2024-06-27 09:00:00', '2024-06-27 09:00:00'),
('j0015', 20, 'ui0015', 'Journal Entry 15', 'Content of journal entry 15.', '2024-06-28 10:00:00', '2024-06-28 10:00:00'),
('j0016', 21, 'ui0016', 'Journal Entry 16', 'Content of journal entry 16.', '2024-06-29 11:00:00', '2024-06-29 11:00:00'),
('j0017', 22, 'ui0017', 'Journal Entry 17', 'Content of journal entry 17.', '2024-06-30 12:00:00', '2024-06-30 12:00:00'),
('j0018', 23, 'ui0018', 'Journal Entry 18', 'Content of journal entry 18.', '2024-07-01 13:00:00', '2024-07-01 13:00:00'),
('j0019', 24, 'ui0019', 'Journal Entry 19', 'Content of journal entry 19.', '2024-07-02 14:00:00', '2024-07-02 14:00:00'),
('j0020', 25, 'ui0020', 'Journal Entry 20', 'Content of journal entry 20.', '2024-07-03 15:00:00', '2024-07-03 15:00:00'),
('j0021', 1, 'ui0021', 'jhef first journal entry', 'this is my first journal entry', '2024-06-21 18:58:03', '2024-06-21 21:26:08'),
('j0022', 2, 'ui0022', 'maui first journal entry', 'this is my first journal entry', '2024-06-21 18:58:03', '2024-06-21 21:26:12'),
('j0023', 3, 'ui0023', 'von first journal entry', 'this is my first journal entry', '2024-06-21 18:58:03', '2024-06-21 21:26:15'),
('j0024', 4, 'ui0024', 'mark first journal entry', 'this is my first journal entry', '2024-06-21 18:58:03', '2024-06-21 21:26:21'),
('j0025', 5, 'ui0025', 'andrea first journal entry', 'this is my first journal entry', '2024-06-21 18:58:03', '2024-06-21 21:26:27'),
('j0046', 47, 'u0000', 'asas', 'asaszzz', '2024-07-03 15:59:20', '2024-07-03 15:59:20'),
('j0047', 48, 'u0000', 'asas', 'asaszzz', '2024-07-03 15:59:20', '2024-07-03 15:59:20'),
('j0048', 49, 'u0000', 'asas', 'asaszzz', '2024-07-03 16:00:23', '2024-07-03 16:00:23'),
('j0049', 50, 'u0000', 's', 's', '2024-07-03 16:01:29', '2024-07-03 16:01:29'),
('j0050', 51, 'u0000', 's', 's', '2024-07-03 16:02:23', '2024-07-03 16:02:23'),
('j0051', 52, 'u0000', '', '', '2024-07-03 16:02:31', '2024-07-03 16:02:31'),
('j0052', 53, 'u0000', '', '', '2024-07-03 16:03:45', '2024-07-03 16:03:45'),
('j0053', 54, 'u0000', 'as', 'as', '2024-07-03 16:04:53', '2024-07-03 16:04:53'),
('j0054', 55, 'u0000', 's', 's', '2024-07-03 16:05:55', '2024-07-03 16:05:55'),
('j0055', 56, 'u0000', 'sds', 'sd', '2024-07-03 16:09:15', '2024-07-03 16:09:15'),
('j0056', 57, 'ui0003', 'dfdaa', 'dfdf', '2024-07-03 16:12:58', '2024-07-06 08:05:35'),
('j0057', 58, 'ui0003', 'dfd', 'dfdf', '2024-07-03 16:12:58', '2024-07-03 16:12:58'),
('j0058', 59, 'ui0003', 'dfd', 'dfdf', '2024-07-03 16:12:59', '2024-07-03 16:12:59'),
('j0062', 62, 'ui0001', 'hello world', 'bye world', '2024-07-05 23:11:09', '2024-07-05 23:11:09'),
('j0063', 63, 'ui0003', 'a', 'a', '2024-07-14 08:17:40', '2024-07-14 08:17:40'),
('j0064', 64, 'ui0003', 's', 's', '2024-07-14 08:17:59', '2024-07-14 08:17:59'),
('j6140', 61, 'ui-0001', 'hello world', 'bye world', '2024-07-05 23:08:01', '2024-07-05 23:08:01'),
('ui140', 60, 'ui-0001', 'hello world', 'bye world', '2024-07-05 23:07:11', '2024-07-05 23:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `mood_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `mood_status` varchar(255) NOT NULL,
  `mood_description` text NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moods`
--

INSERT INTO `moods` (`mood_id`, `index_id`, `user_id`, `mood_status`, `mood_description`, `datetime_created`, `datetime_updated`) VALUES
('m-0053', 58, 'ui0001', 'mood_unhappy', '', '2024-07-15 05:48:38', '2024-07-15 05:48:38'),
('m-0059', 61, 'ui0003', 'mood_joyful', 'I am feeling happy today', '2024-07-16 08:12:08', '2024-07-16 08:12:08'),
('m-0062', 62, 'ui0003', 'mood_neutral', 'I am feeling neutral', '2024-07-16 08:13:49', '2024-07-16 08:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `todo` text NOT NULL,
  `in_progress` text NOT NULL,
  `completed` text NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `index_id`, `user_id`, `title`, `todo`, `in_progress`, `completed`, `datetime_created`, `datetime_updated`) VALUES
('m-0009', 9, 'ui0003', 'hellosdsd', '[\"aaaa\"]', '[\"ss\"]', '[\"maglalaba ako sa next year\",\"hello\",\"\"]', '2024-07-16 04:01:42', '2024-07-16 06:35:27'),
('m-0032', 33, 'ui0003', 'Some title', '[]', '[\"testing 1\",\"testing 2\"]', '[]', '2024-07-16 07:43:41', '2024-07-16 08:11:45'),
('m-0034', 34, 'ui0003', 'Gagawa ng Project', '[]', '[]', '[\"Gawin yung design\",\"Gawin yung html\",\"Gawin yung php\"]', '2024-07-16 08:08:44', '2024-07-16 08:09:51');

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
  `gender` varchar(10) NOT NULL,
  `theme` int(11) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `index_id`, `username`, `age`, `password`, `gender`, `theme`, `datetime_created`, `datetime_updated`) VALUES
('', 26, 'v', 0, '123', '', 0, '2024-07-04 23:25:39', '2024-07-04 23:25:39'),
('1', 28, 'hello', 0, 'hi', '', 0, '2024-07-05 16:03:07', '2024-07-05 16:03:07'),
('27', 27, 'hello', 0, 'hi', '', 0, '2024-07-05 16:00:09', '2024-07-05 16:00:09'),
('j0036', 36, 'q', 0, 'q', '', 0, '2024-07-06 07:23:17', '2024-07-06 07:23:17'),
('ui0001', 1, 'Jhef', 20, 'jhef123', 'male', 0, '2024-06-21 18:47:50', '2024-06-28 23:14:04'),
('ui0002', 2, 'Maui', 20, 'maui123', 'female', 0, '2024-06-21 18:47:50', '2024-06-28 23:14:12'),
('ui0003', 3, 'Von', 20, 'von123', 'male', 0, '2024-06-21 18:47:50', '2024-06-28 23:14:20'),
('ui0004', 4, 'Mark', 20, 'mark123', 'male', 0, '2024-06-21 18:47:50', '2024-06-28 23:14:28'),
('ui0005', 5, 'Andrea', 20, 'andrea123', 'female', 0, '2024-06-21 18:47:50', '2024-06-28 23:14:36'),
('ui0006', 6, 'Alice', 25, 'alice123', 'female', 0, '2024-06-14 20:00:00', '2024-06-28 23:14:41'),
('ui0007', 7, 'Bob', 30, 'bob123', 'male', 0, '2024-06-15 21:00:00', '2024-06-28 23:14:51'),
('ui0008', 8, 'Charlie', 28, 'charlie123', 'male', 0, '2024-06-16 22:00:00', '2024-06-28 23:15:02'),
('ui0009', 9, 'David', 35, 'david123', 'male', 0, '2024-06-17 23:00:00', '2024-06-28 23:15:09'),
('ui0010', 10, 'Eve', 22, 'eve123', 'female', 0, '2024-06-19 00:00:00', '2024-06-28 23:15:15'),
('ui0011', 11, 'Frank', 29, 'frank123', 'male', 0, '2024-06-20 01:00:00', '2024-06-28 23:15:21'),
('ui0012', 12, 'Grace', 31, 'grace123', 'female', 0, '2024-06-21 02:00:00', '2024-06-28 23:15:26'),
('ui0013', 13, 'Hank', 26, 'hank123', 'male', 0, '2024-06-22 03:00:00', '2024-06-28 23:15:38'),
('ui0014', 14, 'Ivy', 27, 'ivy123', 'female', 0, '2024-06-23 04:00:00', '2024-06-28 23:15:45'),
('ui0015', 15, 'Jack', 24, 'jack123', 'male', 0, '2024-06-24 05:00:00', '2024-06-28 23:15:51'),
('ui0016', 16, 'Karen', 33, 'karen123', 'female', 0, '2024-06-25 06:00:00', '2024-06-28 23:15:56'),
('ui0017', 17, 'Leo', 23, 'leo123', 'male', 0, '2024-06-26 07:00:00', '2024-06-28 23:16:04'),
('ui0018', 18, 'Mia', 34, 'mia123', 'female', 0, '2024-06-26 08:00:00', '2024-06-28 23:16:20'),
('ui0019', 19, 'Nina', 32, 'nina123', 'female', 0, '2024-06-27 09:00:00', '2024-06-28 23:16:27'),
('ui0020', 20, 'Oscar', 21, 'oscar123', 'male', 0, '2024-06-28 10:00:00', '2024-06-28 23:16:35'),
('ui0021', 21, 'Paul', 29, 'paul123', 'male', 0, '2024-06-29 11:00:00', '2024-06-28 23:16:42'),
('ui0022', 22, 'Quincy', 30, 'quincy123', 'male', 0, '2024-06-30 12:00:00', '2024-06-28 23:16:50'),
('ui0023', 23, 'Rachel', 28, 'rachel123', 'female', 0, '2024-07-01 13:00:00', '2024-06-28 23:16:56'),
('ui0024', 24, 'Steve', 27, 'steve123', 'male', 0, '2024-07-02 14:00:00', '2024-06-28 23:17:05'),
('ui0025', 25, 'Tina', 26, 'tina123', 'female', 0, '2024-07-03 15:00:00', '2024-06-28 23:17:11'),
('ui0037', 37, 'x', 0, 'x', '', 0, '2024-07-06 07:25:05', '2024-07-06 07:25:05'),
('us-0026', 29, 'hello', 0, 'hi', '', 0, '2024-07-05 16:04:07', '2024-07-05 16:04:07'),
('us-0027', 30, 'hello', 0, 'hi', '', 0, '2024-07-05 16:19:12', '2024-07-05 16:19:12'),
('us-0028', 31, 'hellosdsdsds', 0, 'hi', '', 0, '2024-07-05 16:19:36', '2024-07-05 16:19:36'),
('us-0029', 32, 'hello', 0, 'hi', '', 0, '2024-07-05 16:20:12', '2024-07-05 16:20:12'),
('us-0030', 33, 'hello', 0, 'hi', '', 0, '2024-07-05 16:20:12', '2024-07-05 16:20:12'),
('us-0033', 34, 'aaa', 0, 'hi', '', 0, '2024-07-05 16:22:07', '2024-07-05 16:22:07'),
('us-0035', 35, 'aaa', 0, 'hi', '', 0, '2024-07-05 16:22:32', '2024-07-05 16:22:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `index_id` (`index_id`);

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`mood_id`),
  ADD KEY `index_id` (`index_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `index_id` (`index_id`);

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
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
