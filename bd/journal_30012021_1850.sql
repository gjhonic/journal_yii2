-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Янв 30 2021 г., 10:46
-- Версия сервера: 10.3.27-MariaDB-1:10.3.27+maria~focal
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `journal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `author_id` int(10) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_surname` varchar(255) NOT NULL,
  `author_patronymic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_surname`, `author_patronymic`) VALUES
(1, 'Иван', 'Иванов', 'Иванович'),
(2, 'Петр', 'Петров', 'Петрович'),
(3, 'Светлана', 'Дудко', 'Ираклиевна '),
(4, 'Андриян', 'Железнов', 'Давыдович '),
(5, 'Лаврентий', 'Фамусов', 'Никитевич ');

-- --------------------------------------------------------

--
-- Структура таблицы `author_journal`
--

CREATE TABLE `author_journal` (
  `id` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  `journal_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author_journal`
--

INSERT INTO `author_journal` (`id`, `author_id`, `journal_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE `journal` (
  `journal_id` int(10) NOT NULL,
  `journal_title` varchar(255) NOT NULL,
  `journal_description` text NOT NULL,
  `journal_img` varchar(255) NOT NULL,
  `journal_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `journal`
--

INSERT INTO `journal` (`journal_id`, `journal_title`, `journal_description`, `journal_img`, `journal_date`) VALUES
(1, 'Первый', 'Равным образом постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения направлений прогрессивного развития. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа модели развития. Задача организации, в особенности же начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании модели развития. ', '1232312', '30.01.2021');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Индексы таблицы `author_journal`
--
ALTER TABLE `author_journal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `author_journal`
--
ALTER TABLE `author_journal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `journal`
--
ALTER TABLE `journal`
  MODIFY `journal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
