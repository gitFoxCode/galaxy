-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lut 2019, 13:23
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
-- Baza danych: `galaxy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `codes`
--

INSERT INTO `codes` (`id`, `code`, `active`, `time`) VALUES
(1, 'fclAVIAIyuebF8vLlQtM', 1, '24'),
(2, 'X2vB9IosKnYhLrrfYqJI', 1, '12'),
(3, 'dvqnZb3byH8SBiwgkswT', 1, '24'),
(4, 'AQcPz4n3uHw2qpkCmOla', 1, '24'),
(5, '0mzALqUL0BzHwcHxrSm3', 0, '24'),
(6, 'Ncl0t7hm02434bOsT9cZ', 1, '24'),
(7, 'BVyB0tktdHyBrS2AhgdU', 1, '24'),
(8, 'qe8ZAVQ68xDEZ5v2mVL3', 1, '24'),
(9, '5X2gKLIZBYy2d70KHCtR', 10, '24'),
(10, 'd7Ypi0dPn2syy8cSAGTR', 0, ''),
(11, 'o8Rbsd78uol9mlcZJlsF', 0, '0'),
(12, 'kJj0BrAvLtj3DEddL4xL', 0, '0'),
(13, 'YTuNu1jsxdveDPlwOTNX', 0, '0'),
(14, '4XUcyZVEfLLRPjz6tV7r', 0, '0'),
(15, '96vaCYrNJM1JvHmfTuvl', 1, '24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `episode_id`, `series_id`, `author_id`, `comment`, `date`) VALUES
(11, 1, 2, 4, 'Pierwszy komentarz pod pierwszym odcinkiem Pory na przygodę napisany przez konto administracyjne', '2019-01-13 17:47:51'),
(12, 4, 2, 6, 'Drugi komentarz pod pierwszym odcinkiem, napisany przez zwykłego użytkownika', '2019-01-13 17:56:16'),
(13, 4, 2, 1, 'Trzeci komentarz napisany przez kolejnego użytkownika bez uprawnień', '2019-01-13 17:56:57'),
(14, 2, 2, 1, 'test', '2019-01-13 18:16:39'),
(15, 1, 3, 1, 'Komentarz dla gravity falls s01e01', '2019-01-13 18:55:06'),
(16, 4, 2, 1, 'test', '2019-01-13 19:01:32'),
(17, 2, 3, 4, 'Odcinek drugi,  Sezon pierwszy, Komentarz pierwszy - Administrator', '2019-02-22 20:11:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `dubbing` varchar(10) NOT NULL,
  `rate` float NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `episodes`
--

INSERT INTO `episodes` (`id`, `series_id`, `title`, `video`, `avatar`, `season`, `episode`, `views`, `dubbing`, `rate`, `time`) VALUES
(1, 3, 'Turystyczna Pułapka', 's01e01', 'gravity-falls', 1, 1, 0, '2', 9, '00:15:14'),
(2, 3, 'Atak Zombie', 's01e02', 'gravity-falls', 1, 2, 0, '2', 8, '00:14:11'),
(3, 6, 'Ben odkrywa coś', '', 'ben-10', 1, 1, 1, '2', 5, '00:08:03'),
(4, 2, 'Pora na zgon!', 's01e01', 'adventure-time', 1, 1, 1, '2', 9, '00:14:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tv` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` float NOT NULL,
  `PEGI` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `series`
--

INSERT INTO `series` (`id`, `title`, `tv`, `description`, `rate`, `PEGI`, `avatar`, `name`) VALUES
(2, 'Pora na przygodę!', 'DisneyXD', 'Finn i pies Jake bronią mieszkańców krainy Ooo przed wrogami.', 9, 7, 'adventure-time', 'adventure-time'),
(3, 'Wodogrzmoty Małe', 'DisneyXD', 'Podczas wakacji spędzanych u wujka, bliźniaki Dipper i Mabel odkrywają tajemnice miasteczka Gravity Falls.', 8.6, 7, 'gravity-falls', 'gravity-falls'),
(4, 'Ed, Edd i Eddy', 'Cartoon Network', 'Serial opowiadający przygody trzech kumpli o dość podobnych imionach. Mieszkają na przedmieściu USA, borykają się z problemami typowych nastolatków i mają ze sobą wiele wspólnego', 7.5, 7, 'edds', 'ed-edd-n-eddy'),
(5, 'Laboratorium Dextera', 'Cartoon Network', 'Młody naukowiec buduje w domu tajne laboratorium, o czym wie tylko jego irytująca siostra.\r\n', 8.3, 7, 'dexter', 'dexters-lab'),
(6, 'Ben 10', 'Cartoon Network', 'Ben jest przeciętnym chłopcem do dnia, w którym znajduje niesamowite urządzenie zwane Omnitrix, które pozwala mu zmieniać się w kosmitów', 8.4, 7, 'ben-10', 'ben-10'),
(7, 'Dom dla zmyślonych przyjaciół pani Foster', 'Cartoon Network', 'Historia stworzenia Bloo w domu dla porzuconych zmyślonych przyjaciół', 7.2, 7, 'foster', 'foster-house'),
(8, 'Brenda i pan Whiskers', 'Disney Channel', 'Kiedy suczka i królik wypadają z samolotu prosto w Amazońską dżungle, postanawiają wrócić do domu\r\n', 6, 7, 'BrendanWhiskers', 'Brenda-n-mr-Whiskers'),
(9, 'Zwyczajny serial', 'Cartoon Network', 'Dwóch przyjaciół - Mordechaj i Rigby w zwariowanym \"Zwyczajnym Świecie\"', 8, 12, 'regular', 'regular-show'),
(10, 'Amerykański smok Jake Long', 'Disney Channel', 'Smoki są na co dzień są zwykłymi ludźmi. Stanowią granicę między światem ludzkim i magicznym. Jednym ze smoków jest 13-letni Jake Long. ', 5, 7, 'american-dragon-jake-long', 'american-dragon-jake-long'),
(11, 'Awatar: Legenda Aanga', 'Nickelodeon', 'Aang, 12-letni mag powietrza z Świątyni Powietrza, dowiaduje się, że jest kolejną inkarnacją Awatara. Mając na względzie wiszącą w powietrzu wojnę, Awatar ma jak najszybciej przywrócił równowagę na świecie.', 7, 7, 'avatar-legend-of-aang', 'avatar-legend-of-aang'),
(12, 'Harcerz Lazlo', 'Cartoon Network', 'Lazlo jest małpką z hufca Groszki, która wyjechała na obóz harcerski Nerka. Jego najlepszymi przyjaciółmi są słoń Raj i nosorożec Zgrzyt. Trio zamieszkało w domku o nazwie Galaretka, aby poważnie naruszyć porządek ustanowiony przez drużynowego Lumpusa.\r\n\r', 4, 7, 'camp-lazlo', 'camp-lazlo'),
(13, 'Kryptonim: Klan Na Drzewie', 'Cartoon Network', 'Agenci KND służą w tajnej organizacji walczącej o wyzwolenie dzieckości.', 6, 7, 'knd', 'knd'),
(14, 'Mój Kumpel z WF-u jest małpą', 'Cartoon Network ', 'Chłopiec z powodu błędu urzędników trafia do Gimnazjum im. Karola Darwina dla dzikich zwierząt. W aklimatyzacji pomaga mu jego najlepszy kumpel Jake.', 6.5, 7, 'monkey-partner', 'monkey-partner'),
(15, 'Mroczne przygody Billy’ego i Mandy', 'Cartoon Network', 'Ponury Żniwiarz zostaje oszukany i musi zostać na Ziemi, pilnując dwójki rodzeństwa. ', 5, 12, 'billy-n-mandy', 'billy-n-mandy'),
(16, 'Johnny Bravo', 'Cartoon Network', 'Historia młodzieńca, który zawsze w ten sam nieudolny sposób próbuje poderwać dziewczynę, co jest przyczyną wielu przygód.', 5, 12, 'johnny-bravo', 'johnny-bravo'),
(17, 'Z życia nastoletniego robota', 'Nickelodeon', 'Jenny to robot w prawie ludzkiej skórze posiadającym moce, których nie posiada żaden człowiek. Może on ratować ziemie, lecz on woli spotykać się z przyjaciółmi-Bradem i Tuckiem.', 7.5, 7, 'teenage-robot', 'teenage-robot'),
(18, 'Podwójne życie Jagody Lee', 'Cartoon Network', 'Bohaterką jest Jagoda Lee - zwykła, 11-letnia dziewczyna. Ale czy aby na pewno zwykła? Otóż życiowym celem Jagody jest zwalczanie wszelkiego zła zalegającego na świecie.', 4, 7, 'juniper-lee', 'juniper-lee'),
(19, 'One Piece', 'Fuji TV', 'Historia o przygodach pirackiej załogi Słomkowego Kapelusza, której kapitanem jest Monkey D. Luffy. Jego największym marzeniem jest odnalezienie najwspanialszego skarbu na świecie, One Piece, oraz stanie się Królem Piratów.', 2, 7, 'one-piece', 'one-piece'),
(20, 'Pokemon', 'Disney XD', 'Ash wyrusza w podróż, by zostać najlepszym trenerem pokemonów na świecie. ', 9, 7, 'pokemon', 'pokemon'),
(21, 'Samuraj Jack', 'Cartoon Network', 'Samuraj Jack został wysłany w przyszłość przez złego Aku. Tylko Jack może go pokonać.', 8, 7, 'samurai-jack', 'samurai-jack'),
(22, 'SpongeBob Kanciastoporty', 'Disney Channel', 'Fabuła serialu koncentruje się na tytułowym SpongeBobie Kanciastoportym, energicznej i pozytywnie nastawionej do świata gąbce morskiej z wyglądu przypominającej gąbkę kuchenną.', 9, 7, 'spangebob', 'spangebob'),
(23, 'Młodzi Tytani', 'Cartoon Network', 'Piątka nastolatków tworzą grupę superherosów o nazwie Młodzi Tytani, pilnuje porządku w mieście Jump City', 8, 7, 'teen-titans', 'teen-titans'),
(24, 'Odlotowe agentki', 'Disney Channel+', 'Nastoletnie agentki pracują dla Światowej Organizacji Ochrony Ludzkości, której założycielem i szefem jest Jerry Lewis.', 7, 7, 'totally-spies', 'totally-spies'),
(25, 'Xiaolin – pojedynek mistrzów', 'Cartoon Network', 'Serial opowiada o losach czwórki dzieci, szkolących się w klasztorze Shaolin. ', 9, 7, 'xiaolin', 'xiaolin'),
(26, 'Danny Phantom', 'Nickelodeon', 'Serial opowiada o czternastolatku Dannym Fentonie, który po wypadku w laboratorium rodziców, staje się Dannym Phantomem, walczy z duchami, które zagrażają jego miastu – Amity Park.', 7.2, 7, 'danny-phantom', 'danny-phantom');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `ptime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `premium`, `ptime`) VALUES
(1, 'admin@galaxy.pl', '$2y$10$KVHXcD/WS3ZZS3wAXcyfp.smOilIHFgXU9d4c7hWg5gWehQwzUfpq', 1, '2019-01-31 10:00:00'),
(2, 'administrator@galaxy.pl', '$2y$10$cbMVaZDH2Ff7CtU6mKOhSusLnFAzuXIy6tU9XtLSUA/GpGpMH4r6W', 0, NULL),
(3, 'testowe@konto.pl', '$2y$10$RZ0LOuWieob9x5WzE.2hTO.ZcZkwI9O.LOT8bWKOJunitvnW7nTti', 0, NULL),
(4, 'foxcode@galaxy.pl', '$2y$10$8z.MqtIM.6cTP0MxU3vtIetATPWEONDEGIpmL/5K6BVHacqhgvTZW', 2, '2019-01-14 18:47:54'),
(5, 'user@galaxy.pl', '$2y$10$X8I0v865baW4wQQmF2UoI.CpdNS6WKLgT/LBbJgfXwyx5JCci0lzK', 0, NULL),
(6, 'premium@galaxy.pl', '$2y$10$N./oAUagStB9tJPSO2IVzutZehqS34Jh0Gz5MlLHalQHaUHEDu.JS', 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_history`
--

CREATE TABLE `users_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users_history`
--

INSERT INTO `users_history` (`id`, `user_id`, `episode_id`) VALUES
(19, 4, 2),
(20, 4, 1),
(21, 4, 4),
(22, 4, 1),
(23, 4, 4),
(24, 4, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_history`
--
ALTER TABLE `users_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users_history`
--
ALTER TABLE `users_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
