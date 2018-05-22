-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2018, 21:02
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przychodnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `id_add` int(11) NOT NULL,
  `town` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `number` int(11) NOT NULL,
  `postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`id_add`, `town`, `street`, `number`, `postalcode`) VALUES
(1, 'MIelec', 'MIckiewicza', 11, 39300);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `alluser`
-- (See below for the actual view)
--
CREATE TABLE `alluser` (
`id_user` int(11)
,`id_userd` int(11)
,`login` varchar(20)
,`pesel` varchar(11)
,`name` varchar(15)
,`surname` varchar(30)
,`id_doc` int(11)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `appointment`
--

CREATE TABLE `appointment` (
  `id_app` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `appointment`
--

INSERT INTO `appointment` (`id_app`, `date`, `id_doc`, `id_type`, `id_user`) VALUES
(1, '2018-01-16 12:30:00', 3, 2, 8),
(2, '2018-01-15 10:30:00', 3, NULL, 13),
(3, '2018-01-16 12:00:00', 3, NULL, 13),
(4, '2018-01-17 08:30:00', 3, NULL, 13),
(5, '2018-01-22 10:30:00', 3, NULL, 13),
(6, '2018-01-24 08:30:00', 3, NULL, 25),
(7, '2018-01-24 09:30:00', 3, NULL, 25),
(8, '2018-01-23 11:00:00', 3, NULL, 26),
(9, '2018-01-23 12:00:00', 3, NULL, 27),
(10, '2018-01-26 10:00:00', 3, NULL, 25),
(11, '2018-01-26 10:30:00', 3, NULL, 25),
(12, '2018-01-23 10:30:00', 3, NULL, 26),
(13, '2018-01-24 09:00:00', 3, NULL, 25),
(14, '2018-01-29 11:30:00', 3, NULL, 25),
(15, '2018-01-30 13:00:00', 3, NULL, 25),
(16, '2018-01-31 08:30:00', 3, NULL, 26),
(17, '2018-01-30 11:00:00', 3, NULL, 25);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `appointmenttype`
--

CREATE TABLE `appointmenttype` (
  `id_type` int(10) NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `appointmenttype`
--

INSERT INTO `appointmenttype` (`id_type`, `type`) VALUES
(1, 'zwykla'),
(2, 'kontrola');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `card`
--

CREATE TABLE `card` (
  `id_card` int(10) NOT NULL,
  `number` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `card`
--

INSERT INTO `card` (`id_card`, `number`, `year`) VALUES
(1, 25, 2015),
(2, 40, 2015);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctor`
--

CREATE TABLE `doctor` (
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `doctor`
--

INSERT INTO `doctor` (`id_doc`) VALUES
(3),
(4);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `doctordata`
-- (See below for the actual view)
--
CREATE TABLE `doctordata` (
`name` varchar(15)
,`surname` varchar(30)
,`id_doc` int(11)
,`spec` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctorspec`
--

CREATE TABLE `doctorspec` (
  `id_docspec` int(11) NOT NULL,
  `id_spec` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `doctorspec`
--

INSERT INTO `doctorspec` (`id_docspec`, `id_spec`, `id_doc`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `office`
--

CREATE TABLE `office` (
  `id_office` int(11) NOT NULL,
  `number` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `office`
--

INSERT INTO `office` (`id_office`, `number`) VALUES
(1, 123),
(2, 124);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `patients`
-- (See below for the actual view)
--
CREATE TABLE `patients` (
`vdate` datetime
,`name` varchar(15)
,`surname` varchar(30)
,`id_doc` int(11)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'ordinary'),
(2, 'doctor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specialty`
--

CREATE TABLE `specialty` (
  `id_spec` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `degree` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `specialty`
--

INSERT INTO `specialty` (`id_spec`, `name`, `degree`) VALUES
(1, 'laryngolog', 2),
(2, 'laryngolog dziecięcy', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `surgery`
--

CREATE TABLE `surgery` (
  `id_surg` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `id_office` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `surgery`
--

INSERT INTO `surgery` (`id_surg`, `start`, `end`, `id_office`, `id_doc`) VALUES
(3, '2008-01-12 08:00:00', '2008-01-12 11:00:00', 1, 3),
(4, '2008-01-09 10:00:00', '2008-01-09 13:30:00', 1, 3),
(5, '2008-01-10 07:00:00', '2008-01-10 10:00:00', 1, 3),
(6, '2008-01-08 09:00:00', '2008-01-08 15:00:00', 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `time`
--

CREATE TABLE `time` (
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` int(11) NOT NULL,
  `id_userd` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `email`, `login`, `password`, `enabled`, `salt`, `id_userd`, `id_role`) VALUES
(3, 'adamK@gmail.com', 'adamus', '1234', 1, 999, 1, 1),
(5, 'malpa@gmail.com', 'malpa', '3412', 0, 999, 3, 1),
(6, 'adam@gmail.com', 'adnus', '3412', 1, 999, 4, 1),
(8, 'mucha@wp.pl', 'muszeczka', 'tescik', 1, 999, 6, 1),
(13, 'a@qp.pl', 'test', 'test', 1, 999, 37, 1),
(14, 'test@test.pl', 'as', 'test', 1, 999, 38, 1),
(17, 'adamK@wp.pl', 'lekarz', 'lekarz', 1, 999, 41, 2),
(22, 'jola@op.p', 'bc', 'test', 1, 999, 44, 1),
(25, 'jola@op.pl', 'pacjent', 'pacjent', 1, 999, 45, 1),
(26, 'owad@owad', 'owad', 'owad', 1, 999, 48, 1),
(27, 'test@eo', 'pa', 'test', 1, 999, 49, 1),
(28, 's@wp', 'ad', 'test', 1, 999, 50, 1),
(29, 's@rp', 'sdf', 'test', 1, 999, 51, 1),
(30, 'ala@wp.pl', 'login', 'haslo', 1, 999, 52, 1);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `user_appointment`
-- (See below for the actual view)
--
CREATE TABLE `user_appointment` (
`date` datetime
,`name` varchar(15)
,`surname` varchar(30)
,`id_user` int(11)
,`id_app` int(11)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_details`
--

CREATE TABLE `user_details` (
  `id_userd` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8_polish_ci DEFAULT NULL,
  `datebirth` date NOT NULL,
  `id_add` int(11) NOT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `id_card` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_details`
--

INSERT INTO `user_details` (`id_userd`, `name`, `surname`, `pesel`, `datebirth`, `id_add`, `id_doc`, `id_card`) VALUES
(1, 'Adam', 'Kowalski', '87112003454', '1987-11-20', 1, NULL, 1),
(3, 'Albert', 'Nowak', '90041212245', '1990-04-12', 1, NULL, 2),
(4, 'Aadam', 'Kowal', NULL, '2007-11-01', 1, NULL, NULL),
(6, 'Magda', 'Lubera', '320311111', '2000-12-03', 1, NULL, 2),
(7, 'Małgorzata', 'Tyczek', '95120311111', '1995-12-03', 1, NULL, NULL),
(8, 'Adam', 'Kowalski', '85124478', '1995-12-03', 1, NULL, NULL),
(9, 'Jola', 'Mola', '878454545', '1995-12-03', 1, NULL, NULL),
(10, 'test', 'test', '85124478', '1995-12-03', 1, NULL, NULL),
(11, 'imie', 'nazwisko', '77142515478', '1995-12-03', 1, NULL, NULL),
(37, 'i', 'n', '95110107141', '1995-12-03', 1, NULL, NULL),
(38, 'a', 'add', '95', '1995-12-03', 1, NULL, NULL),
(41, 'Adam', 'Kowalski', '80041512345', '1995-12-03', 1, 3, NULL),
(44, 'cvb', 'cvbvc', '43343', '1995-12-03', 1, NULL, NULL),
(45, 'Jolanta', 'Nowakowska', '77100425147', '1995-12-03', 1, NULL, NULL),
(46, 'Jolanta', 'Nowakowska', '77100425147', '1995-12-03', 1, NULL, NULL),
(47, 'Jolanta', 'Nowakowska', '77100425147', '1995-12-03', 1, NULL, NULL),
(48, 'JÄ™drzej', 'Mucha', '78021114525', '1995-12-03', 1, NULL, NULL),
(49, 'Justyna', 'staa', '5484518451', '1995-12-03', 1, NULL, NULL),
(50, 'Sdad', 'dgs', '95114412457', '1995-12-03', 1, NULL, NULL),
(51, 'gdg', 'fvs', '5445154515', '1995-12-03', 1, NULL, NULL),
(52, 'Jan', 'Baba', '3578591245', '1995-12-03', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura widoku `alluser`
--
DROP TABLE IF EXISTS `alluser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alluser`  AS  select `u`.`id_user` AS `id_user`,`d`.`id_userd` AS `id_userd`,`u`.`login` AS `login`,`d`.`pesel` AS `pesel`,`d`.`name` AS `name`,`d`.`surname` AS `surname`,`d`.`id_doc` AS `id_doc` from (`user` `u` join `user_details` `d` on((`u`.`id_userd` = `d`.`id_userd`))) ;

-- --------------------------------------------------------

--
-- Struktura widoku `doctordata`
--
DROP TABLE IF EXISTS `doctordata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctordata`  AS  select `d`.`name` AS `name`,`d`.`surname` AS `surname`,`d`.`id_doc` AS `id_doc`,`s`.`name` AS `spec` from ((`doctorspec` `ds` join `user_details` `d` on((`ds`.`id_doc` = `d`.`id_doc`))) join `specialty` `s` on((`ds`.`id_spec` = `s`.`id_spec`))) ;

-- --------------------------------------------------------

--
-- Struktura widoku `patients`
--
DROP TABLE IF EXISTS `patients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patients`  AS  select `a`.`date` AS `vdate`,`d`.`name` AS `name`,`d`.`surname` AS `surname`,`a`.`id_doc` AS `id_doc` from ((`user` `u` join `appointment` `a` on((`u`.`id_user` = `a`.`id_user`))) join `user_details` `d` on((`u`.`id_userd` = `d`.`id_userd`))) ;

-- --------------------------------------------------------

--
-- Struktura widoku `user_appointment`
--
DROP TABLE IF EXISTS `user_appointment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_appointment`  AS  select `a`.`date` AS `date`,`d`.`name` AS `name`,`d`.`surname` AS `surname`,`a`.`id_user` AS `id_user`,`a`.`id_app` AS `id_app` from (`user_details` `d` join `appointment` `a` on((`d`.`id_doc` = `a`.`id_doc`))) ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_add`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `appointmenttype`
--
ALTER TABLE `appointmenttype`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id_card`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `doctorspec`
--
ALTER TABLE `doctorspec`
  ADD PRIMARY KEY (`id_docspec`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_spec` (`id_spec`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id_office`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id_spec`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`id_surg`),
  ADD KEY `id_office` (`id_office`),
  ADD KEY `surgery_ibfk_2` (`id_doc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_userd` (`id_userd`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id_userd`),
  ADD KEY `user_details_ibfk_1` (`id_add`),
  ADD KEY `user_details_ibfk_2` (`id_doc`),
  ADD KEY `user_details_ibfk_3` (`id_card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `address`
--
ALTER TABLE `address`
  MODIFY `id_add` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `appointmenttype`
--
ALTER TABLE `appointmenttype`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `card`
--
ALTER TABLE `card`
  MODIFY `id_card` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `doctorspec`
--
ALTER TABLE `doctorspec`
  MODIFY `id_docspec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `office`
--
ALTER TABLE `office`
  MODIFY `id_office` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id_spec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `surgery`
--
ALTER TABLE `surgery`
  MODIFY `id_surg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id_userd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `appointmenttype` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `doctorspec`
--
ALTER TABLE `doctorspec`
  ADD CONSTRAINT `doctorspec_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorspec_ibfk_2` FOREIGN KEY (`id_spec`) REFERENCES `specialty` (`id_spec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `surgery`
--
ALTER TABLE `surgery`
  ADD CONSTRAINT `surgery_ibfk_1` FOREIGN KEY (`id_office`) REFERENCES `office` (`id_office`),
  ADD CONSTRAINT `surgery_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`id_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_userd`) REFERENCES `user_details` (`id_userd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`id_add`) REFERENCES `address` (`id_add`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_3` FOREIGN KEY (`id_card`) REFERENCES `card` (`id_card`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
