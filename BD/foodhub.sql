-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2020 г., 10:15
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
-- База данных: `foodhub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cafe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `surname`, `email`, `password`, `cafe`) VALUES
(1, 'Елена', 'Пупкина', 'el1234@yandex.ru', '123', 'sushistic'),
(2, 'Михаил', 'Петров', 'mi1234@yandex.ru', '123', 'goodzone'),
(3, 'Андрей', 'иванов', 'an1234@yandex.ru', '123', 'sushibar');

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `name_dish` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `adress` varchar(150) NOT NULL,
  `name_cafe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `email`, `password`) VALUES
(76, 'Петя', 'Фимкин', 'pet1234@yandex.ru', '123'),
(81, 'леша', 'Фимкин', 'le1234@yandex.ru', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `dish`
--

CREATE TABLE `dish` (
  `id` int NOT NULL,
  `name_dish` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` int NOT NULL,
  `pictures` varchar(150) NOT NULL,
  `cafe` varchar(50) NOT NULL,
  `position` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish`
--

INSERT INTO `dish` (`id`, `name_dish`, `description`, `price`, `pictures`, `cafe`, `position`) VALUES
(1, 'пицца', 'описание пиццы', 350, '', 'sushistic', 'пиццы'),
(2, 'роллы', 'описание роллов', 450, '', 'sushistic', 'роллы'),
(9, 'двойной', '123', 2142, 'goodzone.jpg', 'sushistic', 'роллы'),
(10, 'название бургера', 'описание бургера', 345, '', 'sushibar', 'бургеры'),
(11, 'четверной', 'описание', 12345, '', 'goodzone', 'напитки'),
(12, 'калифорния', 'описание', 56, '', 'sushibar', 'роллы');

-- --------------------------------------------------------

--
-- Структура таблицы `goodzone`
--

CREATE TABLE `goodzone` (
  `id` int NOT NULL,
  `name_position` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `pictures` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pictures` varchar(100) NOT NULL,
  `cafe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sushibar`
--

CREATE TABLE `sushibar` (
  `id` int NOT NULL,
  `name_position` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `pictures` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sushistic`
--

CREATE TABLE `sushistic` (
  `id` int NOT NULL,
  `name_position` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `pictures` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sushistic`
--

INSERT INTO `sushistic` (`id`, `name_position`, `description`, `pictures`) VALUES
(64, 'бургер', 'Описание бургера', 'sushibar.jpg'),
(65, 'Пицца', 'описание пиццы', 'city.jpg'),
(66, 'Бургеры', 'описание бургеров', 'bur1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goodzone`
--
ALTER TABLE `goodzone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sushibar`
--
ALTER TABLE `sushibar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sushistic`
--
ALTER TABLE `sushistic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `goodzone`
--
ALTER TABLE `goodzone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sushibar`
--
ALTER TABLE `sushibar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sushistic`
--
ALTER TABLE `sushistic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
