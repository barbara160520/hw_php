-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3360
-- Время создания: Ноя 19 2021 г., 18:18
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

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
  `product_id` int NOT NULL,
  `session_id` text NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `product_id`, `session_id`, `user_id`) VALUES
(38, 6, 'rgssdjtfj3c7619jv9tjpjbk54v428a9', 4),
(39, 2, '9531if6ok6rq0s27tehopf8kk5nopv98', 3),
(40, 1, '9531if6ok6rq0s27tehopf8kk5nopv98', 3),
(73, 1, 'icnkrptk1nfk661bk6cj63qdjksetjqs', 2),
(75, 6, 'icnkrptk1nfk661bk6cj63qdjksetjqs', 2),
(76, 2, '7eu5rljerhhifrbaogr4lvcluf94ehhm', 3),
(77, 1, '7eu5rljerhhifrbaogr4lvcluf94ehhm', 3),
(78, 3, '7eu5rljerhhifrbaogr4lvcluf94ehhm', 3),
(79, 6, '7eu5rljerhhifrbaogr4lvcluf94ehhm', 3),
(80, 1, '6m5d12a6naahuhsu2n1dvhvk53sllh5f', 2),
(81, 2, '6m5d12a6naahuhsu2n1dvhvk53sllh5f', 2),
(82, 3, '6m5d12a6naahuhsu2n1dvhvk53sllh5f', 2),
(83, 6, '6m5d12a6naahuhsu2n1dvhvk53sllh5f', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(155) NOT NULL,
  `description` varchar(255) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`, `description`, `likes`) VALUES
(1, 'Пицца', '24', 'pizza.jpeg', 'The best pizza in the sity!!!', 6),
(2, 'Чай', '1', 'tea.png', 'Ceylon tea for your health', 9),
(3, 'Яблоко', '12', 'apple.jpg', 'Fresh apples', 2),
(6, 'Рыба', '25', 'fish.png', 'Самая вкусная рыба!!', 0);

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
(1, '01.jpg', 4),
(2, '02.jpg', 2),
(3, '03.jpg', 0),
(4, '04.jpg', 3),
(5, '05.jpg', 2),
(6, 'img_20.gif', 7),
(7, 'img_23.jpg', 13),
(8, 'img_65.png', 8),
(27, 'img_69.jpg', 35),
(28, 'img_61.jpg', 4),
(30, 'img_43.png', 5),
(31, 'img_29.jpg', 3),
(32, 'img_86.jpg', 1);

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
(1, 'Путин определил глав профильных комиссий \"Единой России\"', 'Путин распределил между лидерами списка \"Единой России\" внутрипартийные должности\r\nПрезидент РФ В. Путин встретился с лидерами предвыборного списка партии Единая Россия - РИА Новости, 1920, 27.09.2021\r\n© РИА Новости / Алексей Дружинин\r\nПерейти в фотобанк\r\nЧитать ria.ru в\r\nМОСКВА, 27 сен — РИА Новости. Президент Владимир Путин поздравил \"пятерку\" списка \"Единой России\" с убедительной победой на выборах в Госдуму и распределил между ними внутрипартийные должности.\r\n\"Хочу <...> поблагодарить именно как лидеров предвыборного списка партии за достойный результат избирательной кампании\", — сказал глава государства на встрече, добавив, что это отражает высокий уровень доверия и к самой партии, и к ее конкретным делам.\r\nПрофильные комиссии возглавят:\r\n—глава Минобороны Сергей Шойгу — по развитию Восточной Сибири;\r\n—глава МИД Сергей Лавров — по международному сотрудничеству и поддержке соотечественников;\r\n—детский омбудсмен Анна Кузнецова — по защите материнства, детства и поддержке семьи;\r\n—сопредседатель штаба ОНФ Елена Шмелева — по образованию и науке;\r\n—главврач больницы в Коммунарке Денис Проценко — по здравоохранению.', 7),
(2, 'Путин подписал указ об оказании гуманитарной помощи Донецкой и Луганской областям Украины', 'Президент РФ Владимир Путин подписал указ об оказании гуманитарной поддержки населению Донецкой и Луганской народных республик. Путин поручил правительству в месячный срок принять ряд мер, смягчающих условия для допуска на российские рынки товаров из ДНР и ЛНР.', 11),
(5, 'МКС потеряла ориентацию в пространстве при тестировании двигателей «Союза МС-18»', 'Международная космическая станция (МКС) потеряла ориентацию в пространстве во время тестирования двигателей корабля «Союз МС-18», сообщили «РИА Новости» со ссылкой на переговоры космонавтов с Землей, которые транслирует NASA.', 10),
(7, 'Росстат объявил о старте с 15 октября Всероссийской переписи населения', 'С сегодняшнего дня стартовала Всероссийская перепись населения. Она продлится до 14 ноября. В современной истории России это уже третья перепись: до этого они проводились в 2002 и 2010 годах.', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `session_id` text NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`, `user_id`) VALUES
(21, 'Ульяна', '89287866642', '9531if6ok6rq0s27tehopf8kk5nopv98', 3),
(38, 'Василий', '89881754296', 'icnkrptk1nfk661bk6cj63qdjksetjqs', 2),
(39, 'Саша', '79281456571', '6m5d12a6naahuhsu2n1dvhvk53sllh5f', 2);

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
(35, 'Тамара', 'Где можно купить этот чай?', NULL),
(49, 'Наталья', 'Мой сын обожает эту пиццу!', 1),
(50, 'Наталья', 'Замечательный фрукт', 3),
(51, 'Сергей', 'Натуральный чай, никакой химии', 2),
(52, 'Тамара', 'Сама бы съела все целиком', 1),
(53, 'Сергей', 'Мужа от них не оторвать', 3),
(54, 'Равиль', 'Очень полезный чай', 2),
(74, 'Василий', 'Шикарный вкус', 1),
(76, 'Настя', 'Пицца - пальчики оближешь!', 1),
(77, 'Polly', 'Сайт крутой!!', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`) VALUES
(1, 'admin', '123', '$2y$10$LEbwmBqwreRKUrS1CyOMq.EpcdqIHuBSwgjIA71o8fMPf3qL1u7W.', 1),
(2, 'user', '321', '$2y$10$PxCXyRCms2LMo6AQ/Yep9eV.w9S1ZDMsUecuQHsB2ol3bjgX.QOEC', 0),
(3, 'poni', '1605', '$2y$10$ex9JwtOQGoggF9munDw2SezYmnm9EuBxDNwGgcoOcO5RvdZWIanLm', 1),
(4, 'alex', '125', '$2y$10$6r8CeOHaCZW0bCX4tWL/4eSTuI8v8xeXfQ2eqvmWS6Mtls34cMZxy', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_basket` (`user_id`);

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_orders` (`user_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `FK_user_basket` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_user_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_rew_goods` FOREIGN KEY (`id_product`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
