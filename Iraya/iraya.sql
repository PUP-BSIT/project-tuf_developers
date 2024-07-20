-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 11:11 PM
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
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `code_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`code_id`, `index_id`, `user_id`, `code`, `datetime_created`, `datetime_updated`) VALUES
('c1', 2, 'ui0003', '38f9966f-44d4-11ef-98f4-0a0027000010', '2024-07-18 07:06:15', '2024-07-18 07:06:15'),
('c2', 3, 'ui0002', 'a97f4721-44e5-11ef-98f4-0a0027000010', '2024-07-18 09:11:05', '2024-07-18 18:51:15'),
('c4', 4, 'ui0005', 'cfd08324-4535-11ef-98f4-0a0027000010', '2024-07-18 18:44:49', '2024-07-18 18:44:49');

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
('j0014', 14, 'ui0002', 'Journal Entry 1', '<div>Today was an interesting day at work. We had a team meeting where we brainstormed ideas for the new project. I felt really inspired by the creativity in the room. After work, I went for a long walk in the park. The weather was perfect, and it gave me time to reflect on the day. I ended the evening by cooking a new recipe for dinner, which turned out surprisingly well. Overall, it was a productive and fulfilling day.</div>\n      ', '2024-07-14 16:28:18', '2024-07-14 16:29:46'),
('j0015', 15, 'ui0002', 'Journal Entry 2', 'I woke up feeling a bit under the weather today. Despite that, I managed to push through my tasks at work. I spent most of the day coding and troubleshooting some bugs. In the evening, I treated myself to a relaxing bath and read a few chapters of a novel I\'m really enjoying. I\'m hoping a good night\'s sleep will help me feel better tomorrow.', '2024-07-15 16:30:06', '2024-07-15 16:30:06'),
('j0016', 16, 'ui0002', 'Journal Entry 3', 'What a whirlwind of a day! I had back-to-back meetings and barely had time to catch my breath. We made significant progress on the project, though, which feels rewarding. After work, I met up with a friend for coffee, and we had a great time catching up. I ended the night by watching a movie and unwinding on the couch. It was hectic but enjoyable.', '2024-07-16 16:30:22', '2024-07-16 16:30:22'),
('j0017', 17, 'ui0002', 'Journal Entry 4', 'Today was all about self-care. I took the day off from work and indulged in some much-needed relaxation. I started the day with a yoga session, followed by a healthy breakfast. In the afternoon, I went to the spa for a massage. I feel rejuvenated and ready to tackle the rest of the week. Sometimes, it\'s important to take a step back and focus on yourself.', '2024-07-16 16:30:35', '2024-07-16 16:30:35'),
('j0018', 18, 'ui0002', 'Journal Entry 5', 'I had an exciting day at the office today. We launched the beta version of our new software, and the feedback has been overwhelmingly positive. It\'s such a relief to see our hard work paying off. After work, I celebrated with my team over dinner. It\'s moments like these that make all the late nights and hard work worth it.', '2024-07-17 16:30:51', '2024-07-17 16:30:51'),
('j0019', 19, 'ui0002', 'Journal Entry 6', 'I spent the day working from home, which was a nice change of pace. I managed to be incredibly productive without the usual office distractions. During my lunch break, I took a short walk around the neighborhood. The fresh air and sunshine were invigorating. In the evening, I experimented with a new recipe and it turned out great. Overall, it was a satisfying day.', '2024-07-19 16:34:54', '2024-07-19 16:34:54'),
('j0020', 20, 'ui0002', 'Journal Entry 7', 'Today was a challenging day. I faced several obstacles at work, and it felt like nothing was going right. Despite the frustrations, I kept pushing through. In the evening, I went for a run to clear my mind. It helped me to put things in perspective and reminded me that setbacks are a part of the process. Tomorrow is a new day, and I\'m determined to make it better.', '2024-07-19 16:36:02', '2024-07-19 16:36:02'),
('j0021', 21, 'ui0002', 'Journal Entry 8', 'I had a really productive day today. I finally completed a project I\'ve been working on for weeks. It feels so good to see it finished. After work, I treated myself to a nice dinner at my favorite restaurant. I spent the rest of the evening reading a book and relaxing. It\'s important to celebrate the small victories and take time to recharge.', '2024-07-19 16:36:23', '2024-07-19 16:36:23');

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
('m-0073', 73, 'ui0003', 'happy', '', '2024-07-17 02:38:21', '2024-07-17 05:11:32'),
('m-0074', 74, 'ui0001', 'neutral', '', '2024-07-17 04:24:11', '2024-07-17 04:24:11'),
('m-0075', 75, 'ui0001', 'sad', '', '2024-07-17 04:24:17', '2024-07-17 04:24:17'),
('m-0076', 76, 'ui0001', 'unhappy', '', '2024-07-17 04:24:19', '2024-07-17 04:24:19'),
('m-0077', 77, 'ui0001', 'happy', '', '2024-07-17 04:24:21', '2024-07-17 04:24:21'),
('m-0078', 78, 'ui0001', 'joyful', '', '2024-07-17 04:24:24', '2024-07-17 04:24:24'),
('m-0079', 79, 'ui0001', 'joyful', '', '2024-07-17 04:24:32', '2024-07-17 04:24:32'),
('m-0080', 80, 'ui0001', 'joyful', '', '2024-07-17 04:24:34', '2024-07-17 04:24:34'),
('m-0081', 81, 'ui0001', 'happy', '', '2024-07-17 04:24:36', '2024-07-17 04:24:36'),
('m-0082', 82, 'ui0003', 'neutral', '', '2024-07-17 11:38:30', '2024-07-17 16:29:24'),
('m-0083', 83, 'ui0049', 'sad', '', '2024-07-17 20:52:24', '2024-07-17 20:52:24'),
('m-0084', 84, 'ui0003', 'joyful', 'ako ay masaya', '2024-07-18 05:07:07', '2024-07-18 05:07:07'),
('m-0094', 94, 'ui0002', 'happy', 'Feeling happy despite a hectic day at work, thanks to progress on the project and a pleasant coffee catch-up with a friend.', '2024-07-19 08:00:35', '2024-07-19 16:45:45'),
('m-0095', 95, 'ui0002', 'neutral', 'Feeling neutral. Under the weather, but managed to get through the day and ended with a nice evening reading.', '2024-07-19 08:00:43', '2024-07-19 16:45:22'),
('m-0096', 96, 'ui0002', 'happy', 'Feeling happy today after a productive brainstorming session and a relaxing walk in the park.', '2024-07-19 10:03:02', '2024-07-19 16:45:07'),
('m-0097', 97, 'ui0002', 'joyful', 'Feeling joyful after a day of self-care and relaxation, including yoga and a spa visit.', '2024-07-19 16:46:03', '2024-07-19 16:46:03'),
('m-0098', 98, 'ui0002', 'unhappy', 'Feeling unhappy due to facing several obstacles at work, but a run in the evening helped clear my mind.', '2024-07-19 16:46:16', '2024-07-19 16:46:16'),
('m-0099', 99, 'ui0002', 'sad', 'Feeling sad today after receiving disappointing feedback on a project. The walk in the park helped a bit, but the mood lingered.', '2024-07-19 16:46:59', '2024-07-19 16:46:59');

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
('m-0024', 26, 'ui0002', 'Study', '[\"Learn Spanish\",\"Learn Japanese\",\"Learn German\"]', '[\"Learn Korean\"]', '[\"Learn Tagalog\",\"Learn English\"]', '2024-07-19 12:47:15', '2024-07-19 16:50:58'),
('m-0027', 27, 'ui0002', 'Project Website', '[\"Finalize the website\"]', '[\"Do the frontend\",\"Do the backend\"]', '[\"Plan the schedule\",\"Assign roles\"]', '2024-07-19 13:44:22', '2024-07-19 16:37:44'),
('m-4', 21, 'ui0002', 'Test', '[\"sdsd\",\"asas\"]', '[]', '[]', '2024-07-19 10:00:13', '2024-07-19 16:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `index_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `index_id`, `username`, `password`, `datetime_created`, `datetime_updated`) VALUES
('ui0002', 2, 'irayauser ', 'Iraya@User123', '2024-07-18 07:05:00', '2024-07-19 16:26:18'),
('ui0003', 3, 'test1', 'Aasd123!!!a', '2024-07-18 07:06:15', '2024-07-18 08:04:35'),
('ui0004', 4, 'test', 'Test123!', '2024-07-18 18:42:33', '2024-07-18 18:42:33'),
('ui0005', 5, 'testt', 'Qwerty123!', '2024-07-18 18:44:49', '2024-07-18 18:52:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `index_id` (`index_id`);

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
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
