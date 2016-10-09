-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 09 Paź 2016, 21:58
-- Wersja serwera: 5.5.50-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `20161009_Twitter_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE IF NOT EXISTS `Tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(1, 12, 'usr1111111111', '2011-11-11'),
(2, 12, 'jljlkjl', '2016-08-01'),
(3, 12, 'usr1111111111cfvghbjkjhgfrdeswedrft', '2016-11-01'),
(4, 12, '111111111rtyuiocvbnm', '2016-05-01'),
(5, 1, 'khjk  iuouou uhuyuyuy uuhyu', '2016-06-01'),
(6, 2, 'khjk  iudfghjhgfdfghjhgfdfghju', '2016-04-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `hashedPassword` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `information` varchar(225) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`id`, `username`, `hashedPassword`, `email`, `information`) VALUES
(1, 'usr1111111111', '$2y$10$EDpnO2ldd2GikF3gfzRpE./.3kjKxaQIoICSzwCBecHJNsYDLanEy', '111111111@gmail.com', 'lkj nnmnmnmn'),
(2, 'usr22222222', '$2y$10$jB6vowywnk1AWtA461Die.r4BVd7VI/nNPra2g0qND1q6OBtfk.3y', '22222222222@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(3, 'usr333333', '$2y$10$VO9kd2o992/HZBesr/yG0u2hnoi64wbnKVNDdNrjRCt8IC7UQTYxa', '3333333333@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(4, 'usr4444444', '$2y$10$Re88un9F8/uvWE2PCa2I..2k.2wMbn0QU6XAlIF/I7hI9Aj9ypgpu', '444444@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(5, 'usr55555', '$2y$10$UsvnlqEu/ZyAlHxjbwkNs.V9encTUuoS7SW19xu.MHVuGwdPuArw6', '55555@gmail.com', 'Nullam varius fringilla dolor pulvinar imperdiet'),
(6, 'usr66666666666', '$2y$10$QaMwxitwrM0Tue3vzDcfUOoxRkSVO7wIV8S7GcRNVnhAlieHTw87C', '66666666666@gmail.com', 'Nullam varius fringilla dolor pulvinar imperdiet'),
(7, 'usr77777777', '$2y$10$nU3YnxIRyBpFlZTCBOl/zero/.F9Q8wEbH..8huZOYQqt7fXR3U.2', '77777@gmail.com', 'Strona ma pobierać email i hasło.'),
(8, 'dADDDD', '$2y$10$1rq/7.UJaJgYXw2lpysQV.SUKJC5FmJ1P9c22rqqNG6ZUxSYQLowm', 'ddd@dd.com', 'Nullam varius fringilla dolor pulvinar imperdiet'),
(9, 'Roman', '$2y$10$d1rCW3.Ulgz0AYKdz5hxCeIqwGJdgWmO1yE8k9Mc7LOrFCZx7S/yu', '234@dd.c', 'Strona ma pobierać email i hasło.'),
(10, 'wwwww', '$2y$10$YqHWjbWSWqGLd2vT.esugud4bsBDuIoxYQY4hj.Awle9Bh9h5wnQu', 'qq@w.w', 'Strona ma pobierać email i hasło.'),
(11, 'wwwwww', '$2y$10$Am9L3St6kelQKqPZThKcIOWic80CCCyXeSnRQT9UyLBvBzpsjXYbS', 'www@q.pl', 'Nullam varius fringilla dolor pulvinar imperdiet'),
(12, 'boszka', '$2y$10$SJnctQUtpCiDIRnZ7asEV.kIvWsdqW8dyXRi3lXCPO8vYh28UK8p6', 'skolimabo@gmail.com', 'info info');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
