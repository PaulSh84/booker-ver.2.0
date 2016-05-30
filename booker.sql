-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 29 2016 г., 18:39
-- Версия сервера: 10.1.9-MariaDB-log
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `booker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(3) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_number` int(2) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `weekly` int(1) DEFAULT NULL,
  `bi_weekly` int(1) DEFAULT NULL,
  `monthly` int(1) DEFAULT NULL,
  `parent_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `employee_id`, `created_at`, `room_number`, `start_date`, `start_time`, `end_time`, `event_time`, `description`, `weekly`, `bi_weekly`, `monthly`, `parent_id`) VALUES
(209, 2, '2016-04-15 13:33:11', 1, '2016-04-15', '16:30:00', '17:00:00', '16:30 - 17:00', 'sdfgsdfg', 4, NULL, NULL, NULL),
(210, 2, '2016-04-15 13:33:12', 1, '2016-04-22', '16:30:00', '17:00:00', '16:30 - 17:00', 'sdfgsdfg', NULL, NULL, NULL, 209),
(212, 2, '2016-04-15 13:33:12', 1, '2016-05-06', '16:30:00', '17:00:00', '16:30 - 17:00', 'sdfgsdfg', NULL, NULL, NULL, 209),
(213, 2, '2016-04-15 16:47:25', 1, '2016-04-22', '19:45:00', '20:00:00', '19:45 - 20:00', 'asdfadsf', NULL, 3, NULL, NULL),
(214, 2, '2016-04-15 16:47:25', 1, '2016-05-06', '19:45:00', '20:00:00', '19:45 - 20:00', 'asdfadsf', NULL, NULL, NULL, 213),
(215, 2, '2016-04-15 16:47:25', 1, '2016-05-20', '19:45:00', '20:00:00', '19:45 - 20:00', 'asdfadsf', NULL, NULL, NULL, 213),
(244, 1, '2016-04-22 17:43:24', 1, '2016-04-22', '20:45:00', '21:00:00', '20:45 - 21:00', 'asdfasdfasd', 2, NULL, NULL, NULL),
(245, 1, '2016-04-22 17:43:25', 1, '2016-04-29', '20:45:00', '21:15:00', '20:45 - 21:15', 'asdfasdfasd', NULL, NULL, NULL, 244),
(246, 1, '2016-04-26 13:45:01', 1, '2016-04-26', '16:45:00', '17:15:00', '16:45 - 17:15', 'test1', 4, NULL, NULL, NULL),
(247, 1, '2016-04-26 13:45:01', 1, '2016-05-03', '16:45:00', '17:15:00', '16:45 - 17:15', 'test1', NULL, NULL, NULL, 246),
(248, 1, '2016-04-26 13:45:01', 1, '2016-05-10', '16:45:00', '17:15:00', '16:45 - 17:15', 'test1', NULL, NULL, NULL, 246),
(249, 1, '2016-04-26 13:45:01', 1, '2016-05-17', '16:45:00', '17:15:00', '16:45 - 17:15', 'test1', NULL, NULL, NULL, 246),
(250, 1, '2016-04-26 13:53:42', 2, '2016-04-26', '16:00:00', '16:30:00', '16:00 - 16:30', 'dfgsdfgsfd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `email`, `password`, `admin_role`) VALUES
(1, 'Pavel', 'pshirmovski@geeksforless.net', '$2a$12$SfftJJRxeW4RhXOiC599c.UzvEjTeI/3iTHTHDHaST0kkFSFg5fmu', 0),
(2, 'Admin', 'admin@geeksforless.net', '$2a$12$EHra4NyxkOP4fiArrCH4venz0fMUjS9h2BBqMtfAef9hqrMK5IWN6', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `employee_id_2` (`employee_id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
