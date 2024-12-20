-- phpMyAdmin SQL Dump
-- version 5.1.3-2.red80
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 14 2024 г., 06:15
-- Версия сервера: 10.11.6-MariaDB
-- Версия PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users1`
--

INSERT INTO `users1` (`id`, `login`, `password`, `email`, `role`) VALUES
(33, 'admin', '123', '', 'admin'),
(34, '123', '123123', '123@123', ''),
(35, '321', '321', '', 'station_worker'),
(36, '111', '111', '', 'manager');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
