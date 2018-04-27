-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 27 Kwi 2018, 10:57
-- Wersja serwera: 5.7.22-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `psiai_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `attendance_list`
--

CREATE TABLE `attendance_list` (
  `date` date NOT NULL,
  `entry_hour` varchar(2) COLLATE utf8_bin NOT NULL,
  `addons` varchar(50) COLLATE utf8_bin NOT NULL,
  `leave_hour` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `attendance_list`
--

INSERT INTO `attendance_list` (`date`, `entry_hour`, `addons`, `leave_hour`) VALUES
('2018-04-02', '1', 'pracowal', '10'),
('2018-04-05', '10', 'co 10 minut papieros', '20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contractors`
--

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `nip` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `contractors`
--

INSERT INTO `contractors` (`id`, `name`, `nip`) VALUES
(3, 'JakiA› kontrahent', 1111),
(4, 'efouewfu', 176498),
(5, 'rewrfwfewf', 53535),
(6, 'dvfsvsdvsdv', 5464646);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `document_user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `notes` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`document_id`, `document_user_id`, `file_id`, `notes`, `date`) VALUES
(1, 32, 5, 'asd', '2018-04-26 15:59:51'),
(2, 33, 5, 'asd', '2018-04-26 16:00:37'),
(3, 34, 555, '555', '2018-04-26 16:00:54'),
(4, 36, 5, 's', '2018-04-26 16:06:45'),
(7, 666, 39, 'sad', '2018-04-26 17:13:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipment`
--

CREATE TABLE `equipment` (
  `inventary_number` int(40) NOT NULL,
  `description` varchar(30) COLLATE utf8_bin NOT NULL,
  `serial_number` int(40) NOT NULL,
  `date_of_purschure` date NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `warranty` int(1) NOT NULL,
  `whos_is_equipment` varchar(30) COLLATE utf8_bin NOT NULL,
  `another_note` varchar(70) COLLATE utf8_bin NOT NULL,
  `netto_value` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `equipment`
--

INSERT INTO `equipment` (`inventary_number`, `description`, `serial_number`, `date_of_purschure`, `invoice_id`, `warranty`, `whos_is_equipment`, `another_note`, `netto_value`) VALUES
(10, 'Monitor', 42, '2018-04-01', 42, 1, 'kierownik', 'Dziala', 1000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_category_id` int(11) NOT NULL,
  `original_filename` varchar(64) COLLATE utf8_bin NOT NULL,
  `unique_filename` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `files`
--

INSERT INTO `files` (`id`, `file_category_id`, `original_filename`, `unique_filename`) VALUES
(20, 1, '0699X_Xpertis_2017_PIT11.pdf', 'f6a4eb04f83a0ceb9be29b7f4cd64121.pdf'),
(21, 1, '0699X_Xpertis_2017_PIT11.pdf', '70957cc55173561cf7c4df91d34d0ee0.pdf'),
(22, 1, '0699X_Xpertis_2017_PIT11.pdf', '9dce1cc6d764b86a861da4ccc5adc3ea.pdf'),
(23, 1, 'company-manager.pdf', '313865c5c30e1818268a7cde9a1f3c58.pdf'),
(24, 1, 'Elearning - Zadanie 2.pdf', '946aa56067df5e5cf81e61d303c389cf.pdf'),
(29, 1, 'Elearning - Zadanie 2.pdf', '43df0e1fed2d592a98a845bcff715b87.pdf'),
(30, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', 'b999573c67c70f7cb064680bb79e61c7.docx'),
(31, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', '60383afec262ada47b432d0e5e6ac63b.docx'),
(32, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', 'b8b7400219f3134523f7a4a39922a53c.docx'),
(33, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', '732e5ddc7857c7c93322ef05e734618e.docx'),
(34, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', '9985c147f9d211a879859ac36310f788.docx'),
(35, 1, 'EGZAMIN MN.pdf', '69450ceee7a1781888c05dce74b71383.pdf'),
(36, 3, 'PSIAI-A-LAB02-PABISIAK-BARTLOMIEJ.docx', 'ea4c9f32c6f799c1049fbdc26c8298af.docx'),
(39, 3, 'Angielski_List2.docx', '8b2b15328024962c58288123f9524473.docx'),
(41, 3, 'EGZAMIN MN.pdf', 'e9eea0da6a911d4c4fa16b0cbbc43ec5.pdf'),
(42, 3, 'EGZAMIN MN.pdf', '9e7d885aab9f014be3e9805be6942722.pdf'),
(43, 4, 'EGZAMIN MN.pdf', 'f35ebd8f7b683864407843d6932998e3.pdf'),
(45, 4, 'EGZAMIN MN.pdf', 'f94436c135a28d14314aab949768a5f8.pdf'),
(46, 4, 'EGZAMIN MN.pdf', '5888a5bf6d97c779f1fe55f32005c8ff.pdf'),
(47, 4, 'EGZAMIN MN.pdf', '8532eba9fa6feeeaa934d4f91ca1bb91.pdf'),
(48, 4, 'EGZAMIN MN.pdf', 'aa0b5b183d4410301e52e64bc7e7bea7.pdf'),
(49, 4, 'EGZAMIN MN.pdf', 'e01f1853732a3f50e61dc9a061fbf62a.pdf'),
(50, 4, 'EGZAMIN MN.pdf', '5087b715c3162180f825e28bf81af2e0.pdf'),
(54, 4, 'EGZAMIN MN.pdf', '7696b33f1d43a7d8c4a63264a20abee2.pdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `file_categories`
--

CREATE TABLE `file_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_bin NOT NULL,
  `extensions` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `file_categories`
--

INSERT INTO `file_categories` (`id`, `title`, `extensions`) VALUES
(1, 'Faktury sprzeda¿y', 'pdf'),
(2, 'Faktury zakupów', 'pdf'),
(3, 'Dokumenty', 'docx:doc:pdf'),
(4, 'Licencje', 'pdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_bin NOT NULL,
  `permissions` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `title`, `permissions`) VALUES
(1, 'W³aœciciel', '11:11:11:11:11:11:11'),
(2, 'Pracownik', '11:11:00:00:00:00:00'),
(3, 'Audytor', '11:01:01:01:01:01:01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `type` varchar(32) COLLATE utf8_bin NOT NULL,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `number` int(11) NOT NULL,
  `amount_netto` double NOT NULL,
  `amount_brutto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `contractor_id`, `file_id`, `tax_id`, `type`, `title`, `number`, `amount_netto`, `amount_brutto`) VALUES
(1, 4, 35, 1, 'purchase', 'asd', 5, 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licenses`
--

CREATE TABLE `licenses` (
  `license_id` int(11) NOT NULL,
  `inventary_number` int(40) NOT NULL,
  `file_id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf8_bin NOT NULL,
  `serial_number` int(40) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `technical_support` varchar(32) COLLATE utf8_bin NOT NULL,
  `licenses_till` varchar(32) COLLATE utf8_bin NOT NULL,
  `whos_is_licenses` varchar(30) COLLATE utf8_bin NOT NULL,
  `another_note` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `licenses`
--

INSERT INTO `licenses` (`license_id`, `inventary_number`, `file_id`, `description`, `serial_number`, `id_invoice`, `technical_support`, `licenses_till`, `whos_is_licenses`, `another_note`) VALUES
(1, 2131312, 0, 'jest', 12312, 213, '2018-04-02', '2018-04-20', 'kierownik', 'dodac'),
(5, 1, 54, '22', 22, 1, '22', '22', '22', '22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `tax_value` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `taxes`
--

INSERT INTO `taxes` (`id`, `tax_value`) VALUES
(1, 23),
(2, 8),
(3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `surname` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `surname`, `email`, `password`) VALUES
(1, 1, 'Bart³omiej', 'Pabisiak', 'wlasciciel@mail.com', '56806560e0f09426f15eae6fea30dc3a95743d933451add4f268b6e3f51371e6a06c715aca8fe3ebe958aafaea990fffc2a992bd69899a71e0c64c42385b432f'),
(2, 2, 'John', 'Smith', 'pracownik@mail.com', '56806560e0f09426f15eae6fea30dc3a95743d933451add4f268b6e3f51371e6a06c715aca8fe3ebe958aafaea990fffc2a992bd69899a71e0c64c42385b432f'),
(3, 3, 'Jan', 'Kowal', 'audytor@mail.com', '56806560e0f09426f15eae6fea30dc3a95743d933451add4f268b6e3f51371e6a06c715aca8fe3ebe958aafaea990fffc2a992bd69899a71e0c64c42385b432f');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_categories`
--
ALTER TABLE `file_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT dla tabeli `file_categories`
--
ALTER TABLE `file_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `licenses`
--
ALTER TABLE `licenses`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
