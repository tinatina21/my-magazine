-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2024 г., 10:45
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `visitors`
--
CREATE DATABASE IF NOT EXISTS `visitors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `visitors`;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_description` text,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(1, 1, 'HandmadeTOYstudioCo', '9500.00', 'Мягкая интерьерная игрушка ручной работы Солнечный Зайчик', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCze3L8EilLHqZhbZUKd_NrlyTxGg_mU-91A&s'),
(2, 2, 'HandmadeTOYstudioCo', '7500.00', 'Валяный лисёнок Фенек', 'https://cdn.lmbd.ru/dedc03e9-1b16-4569-ae6d-e44f48627b0f/-/preview/1666x920/-/format/auto/-/quality/lighter/-/resize/264x/'),
(3, 3, 'HandmadeTOYstudioCo', '6000.00', 'Мягкая игрушка ручной работы Бульдог Бадди', 'https://cdn.lmbd.ru/7f8554eb-0c5a-493b-b7d6-cbed0d32d131/-/preview/1666x920/-/format/auto/-/quality/lighter/-/resize/x264/'),
(4, 4, 'HandmadeTOYstudioCo', '8000.00', 'Мягкая игрушка ручной работы Зайка Руся', 'https://cdn.lmbd.ru/82f767a0-2697-471b-8ac2-f901b9d559a5/-/preview/1666x920/-/format/auto/-/quality/lighter/-/resize/x264/'),
(5, 5, 'HandmadeTOYstudioCo', '3500.00', 'Интерьерная игрушка ручной работы Ёжик в печали', 'https://cdn.lmbd.ru/44e1b059-231b-4a26-813c-074a90ca292e/-/preview/1666x920/-/format/auto/-/quality/lighter/-/resize/x264/');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `email`, `password`) VALUES
('Анна', 'Оствальд', 'anna@shop.ru', 'annashop05'),
('as', 'as', 'asa@gm.com', '12'),
('1323', '213123', '1@gmail.com', '12'),
('ыва', 'ыва', '1@gm.com', '121212');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
