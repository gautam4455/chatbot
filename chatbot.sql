-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 12:16 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_hints`
--

CREATE TABLE `chatbot_hints` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot_hints`
--

INSERT INTO `chatbot_hints` (`id`, `question`, `reply`) VALUES
(1, 'Hey||HI||Hello||Hola', 'Hello, how are you.'),
(2, 'How are you?||Whats up?', 'Good to see you again!'),
(3, 'What is your name?||Whats your name?||What should I call you?', 'My name is Bot.'),
(4, 'Who are you?||What are you?', 'I\'m Bot. An Artificial Intelligence Program design to assist people.'),
(5, 'Where are you from?', 'I\'m from India.'),
(6, 'What you do?||Whats your work?||What is your work?', 'I help people to solve their queries.'),
(7, 'Bye||See you later||Have a Good Day', 'Sad to see you are going. Have a nice day.'),
(8, 'Who made you?||Who built you?||Who developed you?||Who created you?', 'GK is created me.');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `pclass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `added_on`, `type`, `pclass`) VALUES
(1, 'Hey', '2020-07-17 05:08:09', 'User', ''),
(2, 'Hello, how are you.', '2020-07-17 05:08:09', 'Bot', ''),
(3, 'Whats your name', '2020-07-17 05:10:28', 'User', ''),
(4, 'My name is Bot.', '2020-07-17 05:10:28', 'Bot', ''),
(5, 'whats up', '2020-07-17 05:11:11', 'User', ''),
(6, 'Good to see you again!', '2020-07-17 05:11:11', 'Bot', ''),
(7, 'Bye', '2020-07-17 05:11:18', 'User', ''),
(8, 'Sad to see you are going. Have a nice day.', '2020-07-17 05:11:19', 'Bot', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
