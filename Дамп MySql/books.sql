-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2015 г., 06:45
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `date_update` date NOT NULL,
  `preview` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `date_create`, `date_update`, `preview`, `date`, `author_id`) VALUES
(1, 'Черный отряд', '2015-12-23', '2015-12-23', '1gk.jpg', '2016-01-01', 1),
(2, 'Тени сгущаются', '2015-12-23', '2015-12-23', '2gk.jpg', '2016-01-02', 1),
(3, 'Белая Роза', '2015-12-23', '2015-12-23', '3gk.jpg', '2016-01-03', 1),
(4, 'Игра теней', '2015-12-23', '2015-12-23', '4gk.jpg', '2016-01-04', 1),
(5, 'Стальные сны', '2015-12-23', '2015-12-23', '5gk.jpg', '2016-01-05', 1),
(6, 'Серебряный Клин', '2015-12-23', '2015-12-23', '6gk.jpg', '2016-01-06', 1),
(7, 'Суровые времена', '2015-12-23', '2015-12-23', '7gk.jpg', '2016-01-07', 1),
(8, 'Тьма', '2015-12-23', '2015-12-23', '8gk.jpg', '2016-01-08', 1),
(9, 'Воды спят', '2015-12-23', '2015-12-23', '9gk.jpg', '2016-01-09', 1),
(10, 'Солдаты живут', '2015-12-23', '2015-12-23', '10gk.jpg', '2016-01-10', 1),
(11, 'Игра престолов', '2015-12-23', '2015-12-23', '1gm.jpg', '2016-02-01', 2),
(12, 'Битва королей', '2015-12-23', '2015-12-23', '2gm.jpg', '2016-02-02', 2),
(13, 'Буря мечей', '2015-12-23', '2015-12-23', '3gm.jpg', '2016-02-03', 2),
(14, 'Пир стервятников', '2015-12-23', '2015-12-23', '4gm.jpg', '2016-02-04', 2),
(15, 'Танец с драконами', '2015-12-23', '2015-12-23', '5gm.jpg', '2016-02-05', 2),
(16, 'Слушай песню ветра', '2015-12-23', '2015-12-23', '1hm.jpg', '2016-03-01', 3),
(17, 'Пинбол-1973', '2015-12-23', '2015-12-23', '2hm.jpg', '2016-03-02', 3),
(18, 'Охота на овец', '2015-12-23', '2015-12-23', '3hm.jpg', '2016-03-03', 3),
(19, 'Дэнс, Дэнс, Дэнс', '2015-12-23', '2015-12-23', '4hm.jpg', '2016-03-04', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
