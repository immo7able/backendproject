-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 10 2024 г., 15:58
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `backendproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blacklist`
--

CREATE TABLE `blacklist` (
  `user_id` int(11) NOT NULL,
  `bandate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bantime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `blacklist`
--

INSERT INTO `blacklist` (`user_id`, `bandate`, `bantime`) VALUES
(37, '2023-12-14 08:56:55', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `avatar`) VALUES
(1, 'CS:GO', '11.png'),
(2, 'DOTA 2', '23.png'),
(9, 'apex', '98.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `price`, `date`) VALUES
(1, 30, 2, 1, 10, '2023-12-14 14:49:02'),
(1, 30, 5, 1, 30, '2023-12-14 14:49:02'),
(1, 30, 6, 1, 50, '2023-12-14 14:49:02'),
(2, 30, 2, 1, 10, '2023-12-14 14:53:15'),
(2, 30, 6, 1, 50, '2023-12-14 14:53:15'),
(2, 30, 4, 1, 20, '2023-12-14 14:53:15');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_products`, `name`, `description`, `price`, `category_id`) VALUES
(1, 'Аккаунт CS:GO 50+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 5.00, 1),
(2, 'Аккаунт CS:GO 100+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 10.00, 1),
(3, 'Аккаунт CS:GO 250+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 15.00, 1),
(4, 'Аккаунт CS:GO 500+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 20.00, 1),
(5, 'Аккаунт CS:GO 1000+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 30.00, 1),
(6, 'Аккаунт CS:GO 2000+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 50.00, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `role` varchar(25) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `login`, `role`, `avatar`) VALUES
(18, 'zhibek@mail.ru', 'e267cfcd18461ce938067eca67c59f41', 'Zhibek', '', ''),
(19, 'kek@mail.ru', '279a1e3c57a7b9965b0924f9a3659131', 'kek', '', ''),
(20, 'keke@mail.ru', 'e267cfcd18461ce938067eca67c59f41', 'kekeke', '', ''),
(21, 'aza@gnail.com', '70045d15d033483f0a4e6ed35e742735', 'Aza', '', ''),
(22, 'kekes@gmail.com', 'ef031a9bb9e971377df016ad2d60324f', 'kekes', '', ''),
(23, 'zhibek@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'Zhibek', '', ''),
(24, 'mama@mail.ru', '356b6dec1de17d392e8e1996349ec04f', 'mama', '', ''),
(25, 'damil@mail.ru', 'e45e36c6b4bed4c85b01dc04fec3c5c9', 'Damil', '', ''),
(26, 'azaza@mail.ru', 'be91ee1521a7afb75af3a815b50c18c6', 'azaza', '', ''),
(27, 'kekes@mail.ru', '82040430ea70187910b9d7063692437c', 'Ahmad', '', ''),
(28, 'all@mail.ru', 'ef031a9bb9e971377df016ad2d60324f', 'Ahmad', '', ''),
(30, 'ahmad@mail.ru', 'ef031a9bb9e971377df016ad2d60324f', 'Ahmad', 'admin', 'ahmad@mail.ruahmad@mail.ru1gMtppd.jpg'),
(35, 'phanchy@gmail.com', '9de915f5c0f2dc88388d91dd31900ece', 'phanchy', '', ''),
(37, 'cheburek@mail.ru', 'ef031a9bb9e971377df016ad2d60324f', 'cheburek', 'user', 'cheburek@mail.ruguy3.jpg'),
(38, 'alex@mail.kz', 'ef031a9bb9e971377df016ad2d60324f', 'kekke', 'user', 'no-ava.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
