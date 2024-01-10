-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 17 2023 г., 20:26
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
-- База данных: `products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_products`, `name`, `description`, `price`) VALUES
(1, 'Аккаунт CS:GO 50+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 5.00),
(2, 'Аккаунт CS:GO 100+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 10.00),
(3, 'Аккаунт CS:GO 250+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 15.00),
(4, 'Аккаунт CS:GO 500+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 20.00),
(5, 'Аккаунт CS:GO 1000+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 30.00),
(6, 'Аккаунт CS:GO 2000+ часов с родной почтой.', '⭐️ Пример /profiles/76561199492076208 (количество часов и наличие аватара может отличаться)<br/>\r\n⭐️ Родная почта FIRSTMAIL.LTD<br/>\r\n⭐️ Чистый аккаунт<br/>\r\n⭐️ Нет блокировок<br/>\r\n⭐️ На почту заходить с https://firstmail.ltd/webmail/login<br/>\r\n⭐️ FACEIT не зарегистрирован<br/>\r\nВо избежание спорных ситуаций произведите полную смену данных сразу же после покупки, спасибо!', 50.00);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
