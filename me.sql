-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 03:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `me`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailautora` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `vijest`, `tekst`, `autor`, `vrijeme`, `emailautora`) VALUES
(1, 1, 'Prvi comment', 'Anonymous', '2015-05-28 10:31:58', ''),
(2, 1, 'Drugi comment test', 'Anonymous', '2015-05-28 10:33:15', ''),
(3, 2, 'Commentttt', 'Sharky', '2015-05-28 10:35:32', ''),
(4, 2, 'Drugi commenttt', 'Sharky', '2015-05-28 10:36:29', ''),
(5, 1, 'Treći komentar', 'Webster', '2015-05-28 10:39:11', ''),
(6, 2, 'Comment test refresh', 'Anonymous', '2015-05-28 10:41:25', ''),
(7, 2, 'Refreshhh', 'Anonymous', '2015-05-28 10:43:13', ''),
(8, 2, 'Još jedan comment', 'Anonymous', '2015-05-28 10:53:38', ''),
(9, 1, 'fasdfdas', 'Anonymous', '2015-05-28 10:53:58', ''),
(10, 1, 'fdasfaewf', 'Anonymous', '2015-05-28 10:59:17', ''),
(11, 1, 'aasdasd', 'Anonymous', '2015-05-28 11:00:06', ''),
(12, 1, 'ttttt', 'Anonymous', '2015-05-28 11:01:14', ''),
(13, 1, 'dfasfasdf', 'Anonymous', '2015-05-28 11:01:56', ''),
(14, 2, 'xcaffgafga', 'Anonymous', '2015-05-28 11:03:12', ''),
(15, 2, 'adsadsaaf', 'Anonymous', '2015-05-28 11:06:41', ''),
(16, 2, 'fgfagfag', 'Anonymous', '2015-05-28 11:13:27', ''),
(17, 1, 'fewfgre', 'Anonymous', '2015-05-28 12:31:04', 'nesto@nesto.com'),
(18, 2, 'rtrtrtrtr', 'Anonymous', '2015-05-28 12:31:29', ''),
(19, 2, 'gregegsgsyfggtrwg', 'Anonymous', '2015-05-28 12:31:47', 'nesto@nesto.com'),
(20, 2, 'nesto nesto', 'Anonymous', '2015-05-28 12:41:51', 'hsemic1991@gmail.com'),
(21, 1, 'Neki comment', 'Anonymous', '2015-05-28 20:25:01', ''),
(22, 1, 'Coenakjsnkalskmrmmennttt', 'Anonymous', '2015-05-28 20:25:22', 'nesto@nesto.com'),
(23, 1, 'dfasdfads', 'Anonymous', '2015-05-28 20:42:06', 'nesto@nesto.com'),
(24, 1, 'huehuheuhauehfa', 'webster', '2015-05-28 20:42:42', ''),
(25, 1, 'heeeew', 'admin', '2015-05-29 03:47:45', ''),
(26, 1, 'mm', 'admin', '2015-05-29 03:51:57', ''),
(27, 1, 'gggg', 'admin', '2015-05-29 03:52:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prava` varchar(10) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `prava`) VALUES
('admin', 'admin', 'admin'),
('Anonymous', 'anonymous', 'user'),
('Sharky', 'sharky', 'user'),
('Webster', 'webster', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE IF NOT EXISTS `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tip` varchar(20) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'ostalo',
  `slika` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `tip`, `slika`) VALUES
(1, 'Mike vale in cinemas sloga - 27.03.2015', 'On friday, 27th of March 2015. beginning at 11pm, famous Sloveninan house music DJ and producer, Mike Vale, held a concert in Sarajevo''s most famous nightclub, Cinemas Sloga, in front of 500 of his fans. Several guest DJs from Sarajevo also made their appearance: Hator Master, Dizzy Dee, Papa S and a few others. ', 'Sharky', '2015-05-28 09:38:50', 'shows', 'mikevale1.jpg'),
(2, 'New Epsilon INNO-PROPAK', 'EPSILON DJT-1300 USB – Ultra Hi Torque Pro DJ Turntable with USB Output. Extremely High Torque Direct Drive motor with instant Dual Stop / Play buttons and Reverse button for the pro battle performance scratch DJ’s.\r\n\r\nThe DJT-1300 USB is a direct drive professional multi-speed digital quartz driven turntable that allows playback speed of 33, 45, 78 rpm, adjustable pitch control (+/- 8%, +/- 16% and +/- 50 %) for exact beat mixing, including Dual Play / Stop buttons for battle use and easy plug and play with any DJ Software for PC or MAC.\r\n\r\nDJT-1300 USB boasts electronic brake and a 330mm aluminum die cast turntable platter including a Static balance S-shaped tone arm with detachable head shell and both Phono / Line Output.', 'Webster', '2015-05-28 09:37:35', 'gear', 'epsilonpropak.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijesti` (`id`),
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `korisnici` (`username`);

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `vijesti_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `korisnici` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
