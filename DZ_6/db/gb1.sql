-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3360
-- Время создания: Окт 05 2021 г., 15:40
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
-- База данных: `gb1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `image`) VALUES
(1, 'Пицца', '24', 'pizza.jpeg'),
(2, 'Чай', '1', 'tea.png'),
(3, 'Яблоко', '12', 'apple.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `prod_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `prod_id`, `name`, `feedback`) VALUES
(1, 1, 'Админ', 'Не флудить!'),
(2, 2, 'Юзер', 'Как дела?'),
(5, 3, 'Петя', 'Привет'),
(9, 1, 'Админ', 'Привет'),
(11, 2, 'Олег', 'Забаню!'),
(14, 3, 'Админ', 'Привет'),
(17, 2, 'Вася', 'не то и не это'),
(18, 3, 'Polly', 'hi'),
(19, 1, 'Вася', 'прив всем'),
(24, 2, 'Настя', 'lolol');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `likes`) VALUES
(1, '01.jpg', 2),
(2, '02.jpg', 2),
(3, '03.jpg', 0),
(4, '04.jpg', 3),
(5, '05.jpg', 1),
(6, 'img_20.gif', 6),
(7, 'img_23.jpg', 10),
(8, 'img_65.png', 7),
(27, 'img_69.jpg', 34),
(28, 'img_61.jpg', 4),
(30, 'img_43.png', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `likes` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `likes`) VALUES
(1, 'Путин определил глав профильных комиссий \"Единой России\"', 'Путин распределил между лидерами списка \"Единой России\" внутрипартийные должности\r\nПрезидент РФ В. Путин встретился с лидерами предвыборного списка партии Единая Россия - РИА Новости, 1920, 27.09.2021\r\n© РИА Новости / Алексей Дружинин\r\nПерейти в фотобанк\r\nЧитать ria.ru в\r\nМОСКВА, 27 сен — РИА Новости. Президент Владимир Путин поздравил \"пятерку\" списка \"Единой России\" с убедительной победой на выборах в Госдуму и распределил между ними внутрипартийные должности.\r\n\"Хочу <...> поблагодарить именно как лидеров предвыборного списка партии за достойный результат избирательной кампании\", — сказал глава государства на встрече, добавив, что это отражает высокий уровень доверия и к самой партии, и к ее конкретным делам.\r\nПрофильные комиссии возглавят:\r\n—глава Минобороны Сергей Шойгу — по развитию Восточной Сибири;\r\n—глава МИД Сергей Лавров — по международному сотрудничеству и поддержке соотечественников;\r\n—детский омбудсмен Анна Кузнецова — по защите материнства, детства и поддержке семьи;\r\n—сопредседатель штаба ОНФ Елена Шмелева — по образованию и науке;\r\n—главврач больницы в Коммунарке Денис Проценко — по здравоохранению.', 0),
(4, 'Суд арестовал экс-вице-премьера Крыма', 'Суд арестовал экс-вице-премьера Крыма Кабанова, курировавшего ФЦП развития региона nЕвгений Кабанов - РИА Новости, 1920, 24.09.2021 © РИА Новости / Дмитрий Макеев Евгений Кабанов. Архивное фото Читать ria.ru в СИМФЕРОПОЛЬ, 24 сен — РИА Новости. Киевский районный суд Симферополя арестовал бывшего вице-премьера Крыма Евгения Кабанова по делу о хищении более 57 миллионов рублей, передает корреспондент РИА Новости. По версии следствия, обвиняемый, вместе с бывшим министром строительства и архитектуры Крыма Михаилом Храмовым, а также генеральным директором компании \\\"Мастер-ЮГ\\\" Романом Журавлевым, украл эти деньги из бюджета.', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
