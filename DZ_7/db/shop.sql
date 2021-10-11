-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3360
-- Время создания: Окт 11 2021 г., 14:43
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `goods_id` int NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`) VALUES
(14, 1, 'ienhprco82cu969ifo122b51ss6aahrl'),
(15, 2, 'ienhprco82cu969ifo122b51ss6aahrl'),
(18, 3, 'ienhprco82cu969ifo122b51ss6aahrl'),
(23, 1, 'ienhprco82cu969ifo122b51ss6aahrl'),
(24, 1, 'n6f97eoqdq2okfv46uvdcavmt7vlqroh'),
(25, 2, '7kk07udpg3tr34vtg1rsg9om6cr679a7'),
(26, 1, '7kk07udpg3tr34vtg1rsg9om6cr679a7');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(155) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Пицца', '24', 'pizza.jpeg', 'The best pizza in the sity!!!'),
(2, 'Чай', '1', 'tea.png', 'Ceylon tea for your health'),
(3, 'Яблоко', '12', 'apple.jpg', 'Fresh apples');

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
(5, '05.jpg', 2),
(6, 'img_20.gif', 6),
(7, 'img_23.jpg', 10),
(8, 'img_65.png', 7),
(27, 'img_69.jpg', 34),
(28, 'img_61.jpg', 4),
(30, 'img_43.png', 5),
(31, 'img_29.jpg', 1);

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

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_product` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comment`, `id_product`) VALUES
(4, 'Наталья', 'Отличный сайт, очень удобный', NULL),
(21, 'Admin', 'Спасибо за высокую оценку нашей работы', NULL),
(35, 'Тамара', 'Где можно купить этот чай?', NULL),
(38, 'Равиль', 'Хорошая пицца, жене очень нравится!', 1),
(49, 'Наталья', 'Мой сын обожает эту пиццу!', 1),
(50, 'Наталья', 'Замечательный фрукт', 3),
(51, 'Сергей', 'Натуральный чай, никакой химии', 2),
(52, 'Тамара', 'Сама бы съела все целиком', 1),
(53, 'Сергей', 'Мужа от них не оторвать', 3),
(54, 'Равиль', 'Очень полезный чай', 2),
(55, 'Настя', 'Отличный вкус!!', 1),
(56, 'Василий', 'Вкусный чай!', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '123', '205160191661630a383f6a21.76328654'),
(2, 'user', '321', '4913062566164215cde81c2.90131453');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_rew_goods` (`id_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_rew_goods` FOREIGN KEY (`id_product`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
