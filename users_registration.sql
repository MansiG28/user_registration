-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 10:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `token_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_role` enum('Admin','User') DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `token_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `insert_dt` datetime NOT NULL,
  `update_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`token_id`, `users_id`, `users_role`, `access_token`, `token_status`, `insert_dt`, `update_dt`) VALUES
(2, 1, 'Admin', '284dace48b41f81c4eb4b861cc505d026557ed84', 'active', '2021-03-23 13:14:56', '2021-03-23 10:14:56'),
(3, 2, 'Admin', '165ef430a5f45b0b9594d0ba61e6df0652d77245', 'active', '2021-03-23 14:43:36', '2021-03-23 11:43:36'),
(4, 2, 'Admin', 'a09dd2ca0a863c2b0c39e6cbda30df288c22a12c', 'active', '2021-03-23 14:45:48', '2021-03-23 11:45:48'),
(5, 2, 'Admin', '6ce8f0c64ad2174fa2dcf3311dbf1a147395b605', 'active', '2021-03-23 14:50:47', '2021-03-23 11:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(50) DEFAULT NULL,
  `users_lname` varchar(50) DEFAULT NULL,
  `users_email_id` varchar(300) DEFAULT NULL,
  `users_password` varchar(15) DEFAULT NULL,
  `users_role` enum('Admin','User') DEFAULT NULL,
  `insert_dt` datetime DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_email_id`, `users_password`, `users_role`, `insert_dt`, `update_dt`) VALUES
(1, 'Testtttt', 'Test', 'jhon@yahoo.in', 'testuser@123', 'User', '2021-03-23 12:25:08', '2021-03-23 13:34:41'),
(2, 'John', 'Smith', 'jhon1@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:26:29', '2021-03-23 12:26:29'),
(3, 'John', 'Smith', 'jhon2@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:27:11', '2021-03-23 12:27:11'),
(4, 'John', 'Smith', 'jhon3@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:27:49', '2021-03-23 12:27:49'),
(5, 'John', 'Smith', 'jhon4@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:28:39', '2021-03-23 12:28:39'),
(6, 'John', 'Smith', 'jhon5@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:29:31', '2021-03-23 12:29:31'),
(7, 'John', 'Smith', 'jhon6@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:30:20', '2021-03-23 12:30:20'),
(8, 'John', 'Smith', 'jhon7@yahoo.in', 'testuser1@123', 'Admin', '2021-03-23 12:38:45', '2021-03-23 12:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `usertracking`
--

CREATE TABLE `usertracking` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `user_identifier` varchar(255) DEFAULT NULL,
  `request_uri` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `client_user_agent` text NOT NULL,
  `admin_identifier` varchar(255) DEFAULT NULL,
  `referer_page` text NOT NULL,
  `http_method` varchar(20) NOT NULL,
  `get_parameters` text DEFAULT NULL,
  `post_parameters` text DEFAULT NULL,
  `raw_parameters` text DEFAULT NULL,
  `insert_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertracking`
--

INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `admin_identifier`, `referer_page`, `http_method`, `get_parameters`, `post_parameters`, `raw_parameters`, `insert_datetime`) VALUES
(1, 'fjqj17ngm3qgh87ni8r43tq7g6dpjnn7', NULL, '/users_registration/api/user/users_signup', '1616482509', '::1', 'PostmanRuntime/7.26.8', NULL, '', 'post', '[]', '[]', '{\"users_fname\":\"John\",\"users_lname\":\"Smith\",\"users_email_id\":\"jhon@yahoo.in\",\"users_password\":\"testuser@123\",\"users_role\":\"admin\"}', '2021-03-23 12:25:09'),
(2, 'fjqj17ngm3qgh87ni8r43tq7g6dpjnn7', NULL, '/users_registration/api/user/users_signup', '1616482548', '::1', 'PostmanRuntime/7.26.8', NULL, '', 'post', '[]', '[]', '{\"users_fname\":\"John\",\"users_lname\":\"Smith\",\"users_email_id\":\"jhon@yahoo.in\",\"users_password\":\"testuser@1231\",\"users_role\":\"admin\"}', '2021-03-23 12:25:48'),
(3, 'fjqj17ngm3qgh87ni8r43tq7g6dpjnn7', NULL, '/users_registration/api/user/users_signup', '1616482570', '::1', 'PostmanRuntime/7.26.8', NULL, '', 'post', '[]', '[]', '{\"users_fname\":\"John\",\"users_lname\":\"Smith\",\"users_email_id\":\"jhon@yahoo.in\",\"users_password\":\"testuser1@gmail.com\",\"users_role\":\"admin\"}', '2021-03-23 12:26:10'),
(4, 'fjqj17ngm3qgh87ni8r43tq7g6dpjnn7', NULL, '/users_registration/api/user/users_signup', '1616482590', '::1', 'PostmanRuntime/7.26.8', NULL, '', 'post', '[]', '[]', '{\"users_fname\":\"John\",\"users_lname\":\"Smith\",\"users_email_id\":\"jhon1@yahoo.in\",\"users_password\":\"testuser1@123\",\"users_role\":\"admin\"}', '2021-03-23 12:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_tickets`
--

CREATE TABLE `user_tickets` (
  `user_tickets_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `insert_dt` datetime DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tickets`
--

INSERT INTO `user_tickets` (`user_tickets_id`, `users_id`, `message`, `insert_dt`, `update_dt`) VALUES
(1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-03-23 13:57:43', '2021-03-23 13:57:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`token_id`) USING BTREE,
  ADD KEY `access_token` (`access_token`) USING BTREE,
  ADD KEY `FK_access_token_users` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `usertracking`
--
ALTER TABLE `usertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tickets`
--
ALTER TABLE `user_tickets`
  ADD PRIMARY KEY (`user_tickets_id`),
  ADD KEY `FK1_users_id` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertracking`
--
ALTER TABLE `usertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tickets`
--
ALTER TABLE `user_tickets`
  MODIFY `user_tickets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_token`
--
ALTER TABLE `access_token`
  ADD CONSTRAINT `FK_access_token_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_tickets`
--
ALTER TABLE `user_tickets`
  ADD CONSTRAINT `FK1_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
