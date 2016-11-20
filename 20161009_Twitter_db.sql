-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 20 Lis 2016, 21:44
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
-- Struktura tabeli dla tabeli `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `creationDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `tweetId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `tweetId` (`tweetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=71 ;

--
-- Zrzut danych tabeli `Comment`
--

INSERT INTO `Comment` (`id`, `text`, `creationDate`, `userId`, `tweetId`) VALUES
(1, 'twÃ³j komentarz', '2016-11-03 22:20:11', 15, 33),
(2, 'twÃ³j komentarz', '2016-11-03 22:21:08', 0, 33),
(3, 'twÃ³j komentarz', '2016-11-03 22:25:57', 0, 33),
(4, 'twÃ³j komentarz', '2016-11-03 22:28:56', 15, 33),
(5, 'twÃ³j komentarz333', '2016-11-03 22:30:08', 15, 33),
(6, 'twÃ³j komentarz333', '2016-11-03 22:31:51', 15, 33),
(7, 'twÃ³j komentarz333', '2016-11-03 22:34:01', 15, 33),
(8, 'twÃ³j komentarz333', '2016-11-03 22:35:20', 15, 33),
(9, 'twÃ³j komentarz333', '2016-11-03 22:36:46', 15, 33),
(10, 'twÃ³j komentarzafafafafzsdfe  sstw', '2016-11-03 22:37:01', 15, 33),
(11, 'twÃ³j komentarzafafafafzsdfe  sstw', '2016-11-03 22:37:21', 15, 33),
(12, 'twÃ³j komentarz lglhgllll', '2016-11-03 22:38:56', 15, 6),
(13, 'twÃ³j komentarz lglhgllll', '2016-11-03 22:39:50', 15, 6),
(14, 'jdl;J; SIFOUOIJVOIJOIV IWI I  PIPI', '2016-11-03 22:41:27', 15, 5),
(15, 'FFFFF', '2016-11-03 22:43:06', 15, 5),
(16, 'HHHHHH', '2016-11-03 22:44:23', 15, 5),
(17, 'twÃ³j komentarz', '2016-11-03 22:45:22', 15, 20),
(18, 'twÃ³j komentarz44', '2016-11-03 22:46:03', 15, 20),
(19, 'twÃ³j komentarz4   sss', '2016-11-03 22:48:00', 0, 20),
(20, 'twÃ³j komentarz', '2016-11-03 22:49:21', 15, 9),
(21, 'twÃ³j komentarz   gfdsgfd', '2016-11-03 22:50:55', 15, 9),
(22, 'twÃ³j komentarz  ', '2016-11-03 22:53:10', 15, 24),
(24, 'twÃ³j komentarz', '2016-11-03 22:54:07', 15, 16),
(26, 'twÃ³j komentarz', '2016-11-03 22:54:42', 15, 16),
(27, 'twÃ³j komentarz', '2016-11-03 22:54:44', 15, 16),
(28, 'twÃ³j komentarzvvvv', '2016-11-03 22:54:48', 15, 16),
(29, '', '2016-11-03 22:54:53', 15, 16),
(30, '', '2016-11-03 22:56:03', 15, 8),
(31, '', '2016-11-03 22:56:41', 15, 8),
(32, 'asfafa', '2016-11-03 22:56:48', 15, 8),
(33, 'twÃ³j komentarz', '2016-11-03 22:57:57', 12, 30),
(34, 'twÃ³j komentarz', '2016-11-03 22:58:28', 12, 26),
(35, '', '2016-11-03 22:59:17', 12, 26),
(36, 'ojoj!!', '2016-11-03 23:05:30', 16, 37),
(37, 'twÃ³j komentarz', '2016-11-03 23:10:03', 16, 36),
(38, 'twÃ³j komentarz', '2016-11-03 23:10:06', 16, 36),
(39, 'twÃ³j komentarz', '2016-11-03 23:10:06', 16, 36),
(40, 'twÃ³j komentarz', '2016-11-03 23:10:07', 16, 36),
(41, 'twÃ³j komentarz', '2016-11-03 23:10:15', 16, 36),
(42, 'twÃ³j komentarz', '2016-11-03 23:11:37', 16, 34),
(43, 'twÃ³j komentarz', '2016-11-03 23:11:50', 16, 34),
(44, 'gggggggggggggggggggg', '2016-11-03 23:12:39', 16, 34),
(45, 'gsfae nee46', '2016-11-03 23:13:42', 16, 34),
(46, 'twÃ³j komentarz', '2016-11-03 23:13:58', 16, 34),
(47, 'twÃ³j komentarz', '2016-11-03 23:15:15', 16, 34),
(48, 'kkkkkkk', '2016-11-03 23:15:53', 16, 8),
(49, 'kkkkkkk', '2016-11-03 23:16:38', 16, 8),
(50, 'kkkkkkk', '2016-11-03 23:16:57', 16, 8),
(51, 'kkkkkkk', '2016-11-03 23:17:46', 16, 8),
(52, 'kkkkkkk', '2016-11-03 23:18:06', 16, 8),
(53, 'to wspaniale', '2016-11-03 23:31:54', 17, 38),
(54, 'asdasdadsas', '2016-11-03 23:38:54', 17, 30),
(55, 'twÃ³j komentarz', '2016-11-04 00:12:43', 17, 15),
(56, 'twÃ³j komentarz', '2016-11-04 00:12:44', 17, 15),
(57, 'twÃ³j komentarz', '2016-11-04 00:12:46', 17, 15),
(58, 'twÃ³j komentarz', '2016-11-04 00:30:32', 17, 15),
(59, 'twÃ³j komentarz', '2016-11-04 00:50:26', 17, 15),
(60, 'twÃ³j komentarz', '2016-11-04 00:51:28', 17, 15),
(61, 'asdfafsaer', '2016-11-04 00:53:56', 17, 39),
(62, 'twÃ³j komentarz jljlkjlkj', '2016-11-09 16:20:37', 17, 39),
(63, 'twÃ³j komentarz do 111', '2016-11-20 11:14:26', 15, 40),
(64, 'twÃ³j komentarz do 2222', '2016-11-20 11:14:41', 15, 41),
(65, 'twÃ³j komentarz', '2016-11-20 15:31:59', 15, 33),
(66, 'twÃ³j komentarz 6666666666667777777', '2016-11-20 15:32:42', 15, 33),
(67, 'twÃ³j komentarz 6666666666667777777', '2016-11-20 15:36:34', 15, 33),
(68, 'twÃ³j komentarz 6666666666667777777', '2016-11-20 15:37:05', 15, 33),
(69, 'twÃ³j komentarz', '2016-11-20 15:57:09', 15, 37),
(70, 'twÃ³j komentarz', '2016-11-20 16:22:57', 17, 37);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `creationDate` datetime NOT NULL,
  `recipientUserId` int(11) NOT NULL,
  `senderUserId` int(11) NOT NULL,
  `text` text,
  `isRead` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`messageId`),
  KEY `recipientUserId` (`recipientUserId`),
  KEY `senderUserId` (`senderUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `Messages`
--

INSERT INTO `Messages` (`messageId`, `creationDate`, `recipientUserId`, `senderUserId`, `text`, `isRead`) VALUES
(1, '2016-11-11 00:00:00', 15, 10, 'zxvzzxv', 1),
(2, '2016-11-12 00:00:00', 1, 15, 'DGFDGDGBB VRRRRR ', 0),
(3, '2016-11-02 00:00:00', 17, 1, 'fasfaf sfesfsf', 0),
(4, '2016-11-15 00:00:00', 15, 17, 'asdadasdASD', 0),
(5, '2016-11-20 17:38:34', 15, 12, 'afwewbtwegt ', 0),
(6, '2016-11-20 17:39:45', 12, 15, 'afwewbtwegt  sfgwrvgwtw346w465', 1),
(7, '2016-11-20 17:41:01', 18, 12, 'wspaniale jjapfjwepf  oajfiosjfw    ', 0),
(8, '2016-11-20 17:42:21', 16, 12, 'qwwffv  dgegrergertew sgsfsfsdfsdf    ', 0),
(9, '2016-11-20 17:42:43', 16, 12, 'lolololololooloegryx', 0),
(10, '2016-11-20 17:45:59', 12, 17, 'lafjo jiwoeijwioefvne0eotijeoi', 1),
(11, '2016-11-20 17:47:03', 12, 16, 'KDHou', 1),
(12, '2016-11-20 17:47:10', 15, 16, 'afaerwerwrvvv ', 1),
(13, '2016-11-20 17:48:27', 17, 16, 'jhjhkjkj', 0),
(14, '2016-11-20 17:50:20', 18, 16, 'ldjlajdlkajdlkjalkd vvste4t', 0),
(15, '2016-11-20 21:12:02', 16, 12, 'asdfafxzvxzdfsvv', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE IF NOT EXISTS `Tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `text` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(1, 12, 'usr1111111111', '2011-11-11 00:00:00'),
(2, 12, 'jljlkjl', '2016-08-01 00:00:00'),
(3, 12, 'usr1111111111cfvghbjkjhgfrdeswedrft', '2016-11-01 00:00:00'),
(4, 12, '111111111rtyuiocvbnm', '2016-05-01 00:00:00'),
(5, 1, 'khjk  iuouou uhuyuyuy uuhyu', '2016-06-01 00:00:00'),
(6, 2, 'khjk  iudfghjhgfdfghjhgfdfghju', '2016-04-01 00:00:00'),
(7, 15, 'khkjhkhkjhk;h;k;khj', '2016-10-25 00:00:00'),
(8, 14, 'asdfghjkl;lkjhgfdsdfghjkl;', '2016-10-25 00:00:00'),
(9, 11, 'eryvgybhnjmk,', '2016-10-25 00:00:00'),
(12, 15, 'wpisz tresc tweeta', '2016-10-25 00:00:00'),
(13, 15, 'wpisz tresc tweeta', '2016-10-25 00:00:00'),
(14, 15, 'wpisz tresc tweeta', '2016-10-25 00:00:00'),
(15, 15, 'wpisz tresc tweetasefwerw', '2016-10-25 00:00:00'),
(16, 15, 'bla bla bla', '2016-10-25 00:00:00'),
(18, 15, 'wpisz tresc tweeta', '2016-10-26 00:00:00'),
(19, 15, 'wpisz tresc tweeta', '2016-10-26 17:00:00'),
(20, 15, 'wpisz tresc tweeta', '2016-10-26 16:00:00'),
(23, 15, 'wpisz tresc tweeta', '2016-10-26 00:00:00'),
(24, 15, 'hhhhhhhhhhhhhhhhhhhhhhhhhhh', '2016-10-26 00:00:00'),
(25, 15, 'wpisz tresc tweeta', '2016-10-26 00:00:00'),
(26, 12, 'sgsgrwrgsxwya', '2016-10-26 00:00:00'),
(27, 12, 'lkjhgfc', '2016-10-26 00:00:00'),
(28, 15, 'wwwwwwwwwwrrrrr', '2016-10-29 19:00:00'),
(29, 15, 'wwwwwwwwwwrrrrr', '2016-10-29 20:00:00'),
(30, 15, 'jghhgiyihgk', '2016-10-29 21:00:00'),
(31, 12, 'hgkhgkkkkkk hhiu  uy ouy ououi oy y', '2016-10-29 22:00:00'),
(32, 12, 'wpisz tresc tweetakhkjhjjk', '2016-11-01 19:38:24'),
(33, 15, 'hkhiuhiuh hauiouadoaui ouoaiudoiausdoia oaifoiauf', '2016-11-03 20:53:31'),
(34, 16, 'wpisz tresc tweeta', '2016-11-03 23:05:17'),
(35, 16, 'wpisz tresc tweeta', '2016-11-03 23:05:18'),
(36, 16, 'wpisz tresc tweeta', '2016-11-03 23:05:18'),
(37, 16, 'wpisz tresc tweeta', '2016-11-03 23:05:19'),
(38, 17, 'jestem nowa!!!', '2016-11-03 23:31:30'),
(39, 17, 'wpisz tresc tweeta', '2016-11-03 23:55:04'),
(40, 18, '111111', '2016-11-20 11:03:20'),
(41, 18, '2222222', '2016-11-20 11:13:57'),
(42, 15, 'ffgihgou  hyugou', '2016-11-20 15:57:24'),
(43, 15, 'ljhll ', '2016-11-20 18:04:24'),
(44, 15, 'xbxfgs', '2016-11-20 18:39:52');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `hashedPassword` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `information` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`id`, `username`, `hashedPassword`, `email`, `information`) VALUES
(1, 'ffffffff', 'sssssssssss123', 'ffff@wp.pl', 'super'),
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
(12, 'boszka', '$2y$10$SJnctQUtpCiDIRnZ7asEV.kIvWsdqW8dyXRi3lXCPO8vYh28UK8p6', 'skolimabo@gmail.com', 'info info'),
(14, 'jljlkklkll', '$2y$10$NC/oFpDiiy9Kkjg2WZQble7IrRxTK2sxBJL98v3tTYFoLMPn/AHI6', 'jljljjkl@lkjlkj.pl', ''),
(15, 'stasiek', '$2y$10$bc/KBbwC63CazC1wEw/f0./ek6mHgH8MOTiuwToRC9mtBrCX9KZwO', 'stasiek_piechota@wp.pl', 'jestem boski'),
(16, 'roman', '$2y$10$IrZE1pbF9guAZlmX9JHguOBL80DpivPUWqw74le.gRf8kWxpAqWxu', 'roman@wp.pl', ''),
(17, 'kasia', '$2y$10$nmCDxyrMqQWVR4fXv.QsKu99IzYonnUimHGebzD3QiOIt7atTApeq', 'kasia@wp.pl', 'jljljljllk'),
(18, 'ania', '$2y$10$djuEPFRNBopWCoo2pbndKOcUzBGPpsV3SpfVO/kLihX2lebr2Ekq6', 'ania@wp.pl', ';mksovjdoij josjfosjifoisjvvvmmv');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`tweetId`) REFERENCES `Tweet` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`senderUserId`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`recipientUserId`) REFERENCES `User` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `User` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
