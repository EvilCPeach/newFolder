-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2024 г., 13:42
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `AA ANGUAGE IV`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ctities`
--

CREATE TABLE `ctities` (
  `id-city` int(1) NOT NULL,
  `name-city` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ctities`
--

INSERT INTO `ctities` (`id-city`, `name-city`) VALUES
(1, 'Калининград'),
(2, 'Балтийск'),
(3, 'Черняховск');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id-post` int(1) NOT NULL,
  `name-post` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id-post`, `name-post`) VALUES
(1, 'Чиновник'),
(2, 'Студент'),
(3, 'Рабочий'),
(4, 'Ученый');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id-status` int(1) NOT NULL,
  `name-status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id-status`, `name-status`) VALUES
(1, 'Губернатор'),
(2, 'Мэр'),
(3, 'Житель');

-- --------------------------------------------------------

--
-- Структура таблицы `villagers`
--

CREATE TABLE `villagers` (
  `id-villager` int(2) NOT NULL,
  `fio-villager` varchar(32) DEFAULT NULL,
  `login-villager` varchar(6) DEFAULT NULL,
  `status--villager` int(1) DEFAULT NULL,
  `city-villager` int(1) DEFAULT NULL,
  `post-villager` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `villagers`
--

INSERT INTO `villagers` (`id-villager`, `fio-villager`, `login-villager`, `status--villager`, `city-villager`, `post-villager`) VALUES
(1, 'Иванов Иван Иванович', 'User1', 1, 1, 1),
(2, 'Васькин Илья  Владимирович', 'User2', 2, 1, 1),
(3, 'Великий Виктор Михайлович', 'User3', 3, 1, 2),
(4, 'Гегель Павел Викторович', 'User4', 3, 1, 2),
(5, 'Дунилина Ангелина Александровна', 'User5', 3, 1, 2),
(6, 'Жарова Елизавета Андреевна', 'User6', 3, 1, 2),
(7, 'Железнов Михаил Владимирович', 'User7', 3, 1, 2),
(8, 'Каратеева Злата Васильевна', 'User8', 3, 1, 2),
(9, 'Колесниченко Алина Владимировна', 'User9', 3, 1, 2),
(10, 'Матвеева Анастасия  Дмитриевна', 'User10', 3, 1, 2),
(11, 'Мельников Федор Евгеньевич', 'User11', 3, 1, 2),
(12, 'Морозова Алина Васильевна', 'User12', 3, 1, 2),
(13, 'Портной Никита Александрович', 'User13', 3, 1, 2),
(14, 'Рагимов Амир Анар оглы', 'User14', 3, 1, 3),
(15, 'Родин Алексей Анатольевич', 'User15', 3, 1, 3),
(16, 'Рожков Олег Константинович', 'User16', 2, 2, 1),
(17, 'Соломка Егор Николаевич', 'User17', 3, 2, 3),
(18, 'Стойко Андрей Андреевич', 'User18', 3, 2, 3),
(19, 'Харитонов Андрей Анатольевич', 'User19', 3, 2, 3),
(20, 'Швалёв Дмитрий Михайлович', 'User20', 3, 2, 2),
(21, 'Швец Кристина Александровна', 'User21', 3, 2, 2),
(22, 'Белоусов  Виктор  Андреевич', 'User22', 3, 2, 2),
(23, 'Бунковский  Дмитрий  Павлович', 'User23', 3, 2, 3),
(24, 'Вульченко  Игорь  Геннадьевич', 'User24', 3, 2, 3),
(25, 'Громыко  Александр  Николаевич', 'User25', 3, 2, 2),
(26, 'Давыдов  Илья Витальевич', 'User26', 3, 2, 3),
(27, 'Зоричева  Виктория  Андреевна', 'User27', 3, 2, 3),
(28, 'Липанина  Екатерина  Евгеньевна', 'User28', 3, 2, 3),
(29, 'Медведев  Виктор  Игоревич', 'User29', 3, 2, 3),
(30, 'Нагибина  Екатерина  Павловна', 'User30', 3, 2, 3),
(31, 'Паклин  Владимир  Валерьевич', 'User31', 2, 3, 1),
(32, 'Пряхин  Даниил  Александрович', 'User32', 3, 3, 4),
(33, 'Рязанцева  Анастасия  Евгеньевна', 'User33', 3, 3, 4),
(34, 'Сигитов  Даниил  Николаевич', 'User34', 3, 3, 4),
(35, 'Сидельников  Арсений  Сергеевич', 'User35', 3, 3, 4),
(36, 'Соколов  Дмитрий  Алексеевич', 'User36', 3, 3, 4),
(37, 'Лебедев  Тимур  Игоревич', 'User37', 3, 3, 3),
(38, 'Шамардин  Евгений Романович', 'User38', 3, 3, 3),
(39, 'Шапарь  Данила  Алексеевич', 'User39', 3, 3, 1),
(40, 'Шустов  Виктор  Сергеевич', 'User40', 3, 3, 3),
(41, 'Башин Роман Антонович', 'User41', 3, 3, 2),
(42, 'Белова Софья Сергеевна', 'User42', 3, 3, 3),
(43, 'Гагаринова Яна Валерьевна', 'User43', 3, 3, 2),
(44, 'Добровольский Виталий Романович', 'User44', 3, 3, 4),
(45, 'Евсюков Руслан Муратович', 'User45', 3, 3, 4),
(46, 'Жданов Павел Николаевич', 'User46', 3, 3, 4),
(47, 'Кондратьева Марина Александровна', 'User47', 3, 3, 4),
(48, 'Крылов Дмитрий Александрович', 'User48', 3, 3, 4),
(49, 'Кутыркин Сергей Сергеевич', 'User49', 3, 3, 4),
(50, 'Левкин Антон Викторович', 'User50', 3, 3, 4),
(51, 'Лесных Игорь Игоревич', 'User51', 3, 1, 3),
(52, 'Марцинович Илья Андреевич', 'User52', 3, 1, 4),
(53, 'Науменко Андрей Сергеевич', 'User53', 3, 1, 3),
(54, 'Пилипчук Дарья Владимировна', 'User54', 3, 1, 4),
(55, 'Силушин Данила Александрович', 'User55', 3, 1, 3),
(56, 'Стратонов Владислав Сергеевич', 'User56', 3, 1, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ctities`
--
ALTER TABLE `ctities`
  ADD PRIMARY KEY (`id-city`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id-post`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id-status`);

--
-- Индексы таблицы `villagers`
--
ALTER TABLE `villagers`
  ADD PRIMARY KEY (`id-villager`),
  ADD KEY `post-villager` (`post-villager`),
  ADD KEY `status--villager` (`status--villager`),
  ADD KEY `city-villager` (`city-villager`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ctities`
--
ALTER TABLE `ctities`
  MODIFY `id-city` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id-post` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id-status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `villagers`
--
ALTER TABLE `villagers`
  MODIFY `id-villager` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `villagers`
--
ALTER TABLE `villagers`
  ADD CONSTRAINT `villagers_ibfk_1` FOREIGN KEY (`post-villager`) REFERENCES `post` (`id-post`),
  ADD CONSTRAINT `villagers_ibfk_2` FOREIGN KEY (`status--villager`) REFERENCES `status` (`id-status`),
  ADD CONSTRAINT `villagers_ibfk_3` FOREIGN KEY (`city-villager`) REFERENCES `ctities` (`id-city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
