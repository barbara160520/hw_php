-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3360
-- Время создания: Сен 30 2021 г., 23:18
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `path_big` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `path_small` varchar(155) NOT NULL,
  `name` varchar(150) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path_big`, `path_small`, `name`, `likes`) VALUES
(1, '/gallery_img/big/', '/gallery_img/small/', '01.jpg', 0),
(2, '/gallery_img/big/', '/gallery_img/small/', '02.jpg', 2),
(3, '/gallery_img/big/', '/gallery_img/small/', '03.jpg', 0),
(4, '/gallery_img/big/', '/gallery_img/small/', '04.jpg', 3),
(5, '/gallery_img/big/', '/gallery_img/small/', '05.jpg', 1),
(6, '/gallery_img/big/', '/gallery_img/small/', 'img_20.gif', 5),
(7, '/gallery_img/big/', '/gallery_img/small/', 'img_23.jpg', 10),
(8, '/gallery_img/big/', '/gallery_img/small/', 'img_65.png', 7),
(9, '/gallery_img/big/', '/gallery_img/small/', 'img_85.jpg', 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
