-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 jun 2017 om 14:49
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fifa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_matches`
--

CREATE TABLE `tbl_matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id_a` int(10) UNSIGNED DEFAULT NULL,
  `team_id_b` int(10) UNSIGNED DEFAULT NULL,
  `score_team_a` int(10) UNSIGNED DEFAULT NULL,
  `score_team_b` int(10) UNSIGNED DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `poule_id` int(11) NOT NULL,
  `place_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_matches`
--

INSERT INTO `tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`, `poule_id`, `place_id`) VALUES
(427, 1, 2, NULL, NULL, '2017-06-07 14:46:57', 2, '1'),
(428, 208, 209, NULL, NULL, '2017-06-07 14:46:57', 2, '2'),
(429, 210, 211, NULL, NULL, '2017-06-07 14:46:57', 2, '3'),
(430, 212, 213, NULL, NULL, '2017-06-07 14:46:57', 2, '4'),
(431, 214, 215, NULL, NULL, '2017-06-07 14:46:57', 2, '5'),
(432, 216, 217, NULL, NULL, '2017-06-07 14:46:57', 2, '6'),
(433, 218, 219, NULL, NULL, '2017-06-07 14:46:57', 2, '7'),
(434, 220, 221, NULL, NULL, '2017-06-07 14:46:57', 2, '8');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_players`
--

CREATE TABLE `tbl_players` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `team_id` int(11) UNSIGNED NOT NULL,
  `goals` varchar(255) DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_players`
--

INSERT INTO `tbl_players` (`id`, `student_id`, `team_id`, `goals`, `first_name`, `last_name`, `created_at`, `deleted_at`) VALUES
(21478, 'd000000', 2, '0', '', '', '2017-05-29 13:09:11', NULL),
(21479, 'd000000', 2, '0', '', '', '2017-05-29 13:09:11', NULL),
(21480, 'd000000', 2, '0', 'Jeroen', 'Zoet', '2017-05-29 13:09:11', NULL),
(21481, 'd000000', 2, '0', 'hector', 'Moreno', '2017-05-29 13:09:11', NULL),
(21482, 'd000000', 2, '0', '', '', '2017-05-29 13:09:11', NULL),
(21483, 'd000000', 2, '0', '', '', '2017-05-29 13:09:11', NULL),
(21484, 'd000000', 2, '0', '', '', '2017-05-29 13:09:11', NULL),
(21485, 'd000000', 1, '0', 'Lasse', 'SchÃ¶ne', '2017-05-29 13:09:54', NULL),
(21486, 'd000000', 1, '0', 'Davy ', 'Klaassen', '2017-05-29 13:09:54', NULL),
(21487, 'd000000', 1, '0', 'Hakim', 'Ziyech', '2017-05-29 13:09:54', NULL),
(21488, 'd000000', 1, '0', 'Kasper', 'Dolberg', '2017-05-29 13:09:54', NULL),
(21489, 'd000000', 1, '0', '', '', '2017-05-29 13:09:54', NULL),
(21490, 'd000000', 1, '0', '', '', '2017-05-29 13:09:54', NULL),
(21491, 'd000000', 1, '0', '', '', '2017-05-29 13:09:54', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_poules`
--

CREATE TABLE `tbl_poules` (
  `id` int(11) NOT NULL,
  `naam` varchar(10) NOT NULL,
  `created_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `poule_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `set_players` int(1) NOT NULL DEFAULT '0',
  `place_id` varchar(4) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_teams`
--

INSERT INTO `tbl_teams` (`id`, `poule_id`, `name`, `set_players`, `place_id`, `created_at`, `deleted_at`) VALUES
(1, 1, 'Ajax', 1, '1', '2017-04-13 09:42:45', NULL),
(2, 1, 'PSV', 1, '2', '2017-04-13 09:42:45', NULL),
(208, 1, 'team3', 0, '3', '2017-06-06 14:02:39', NULL),
(209, 1, 'team4', 0, '4', '2017-06-06 14:02:42', NULL),
(210, 1, 'team5', 0, '5', '2017-06-06 14:02:46', NULL),
(211, 1, 'team6', 0, '6', '2017-06-06 14:02:50', NULL),
(212, 1, 'team7', 0, '7', '2017-06-06 14:02:54', NULL),
(213, 1, 'team8', 0, '8', '2017-06-06 14:02:58', NULL),
(214, 2, 'team9', 0, '9', '2017-06-06 14:03:02', NULL),
(215, 2, 'team10', 0, '10', '2017-06-06 14:03:05', NULL),
(216, 2, 'team11', 0, '11', '2017-06-06 14:03:09', NULL),
(217, 2, 'team12', 0, '12', '2017-06-06 14:03:13', NULL),
(218, 2, 'team13', 0, '13', '2017-06-06 14:03:17', NULL),
(219, 2, 'team14', 0, '14', '2017-06-06 14:03:22', NULL),
(220, 2, 'team15', 0, '15', '2017-06-06 14:03:25', NULL),
(221, 2, 'team16', 0, '16', '2017-06-06 14:03:30', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'ad12345', '2017-05-02 13:36:52');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_matches_ibfk_1` (`team_id_a`),
  ADD KEY `tbl_matches_ibfk_2` (`team_id_b`);

--
-- Indexen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexen voor tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naam` (`naam`);

--
-- Indexen voor tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;
--
-- AUTO_INCREMENT voor een tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21611;
--
-- AUTO_INCREMENT voor een tabel `tbl_poules`
--
ALTER TABLE `tbl_poules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT voor een tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD CONSTRAINT `tbl_matches_ibfk_1` FOREIGN KEY (`team_id_a`) REFERENCES `tbl_teams` (`id`),
  ADD CONSTRAINT `tbl_matches_ibfk_2` FOREIGN KEY (`team_id_b`) REFERENCES `tbl_teams` (`id`);

--
-- Beperkingen voor tabel `tbl_players`
--
ALTER TABLE `tbl_players`
  ADD CONSTRAINT `tbl_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_teams` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
