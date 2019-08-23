-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 01:15 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doldur`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `course_id` smallint(5) UNSIGNED NOT NULL,
  `prof_id` int(10) NOT NULL,
  `pr0` tinyint(4) NOT NULL,
  `pr1` tinyint(4) NOT NULL,
  `pr2` tinyint(4) NOT NULL,
  `pr3` tinyint(4) NOT NULL,
  `pr4` tinyint(4) NOT NULL,
  `pr5` tinyint(4) NOT NULL,
  `cr6` tinyint(4) NOT NULL,
  `comments` varchar(1500) NOT NULL,
  `av_mt1` tinyint(3) UNSIGNED NOT NULL,
  `av_mt2` tinyint(3) UNSIGNED NOT NULL,
  `av_final` tinyint(3) UNSIGNED NOT NULL,
  `your_overall` tinyint(3) UNSIGNED NOT NULL,
  `your_grade` varchar(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `prof_id`, `pr0`, `pr1`, `pr2`, `pr3`, `pr4`, `pr5`, `cr6`, `comments`, `av_mt1`, `av_mt2`, `av_final`, `your_overall`, `your_grade`, `date`) VALUES
(1, 55, 371397038, 3, 1, 2, 3, 4, 2, 1, 'kötü', 23, 231, 21, 22, 'BA', '2019-08-18'),
(2, 55, 371397038, 2, 3, 4, 5, 5, 5, 2, 'dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem', 0, 34, 31, 13, 'AA', '0000-00-00'),
(3, 142, 1156607560, 5, 5, 5, 5, 4, 4, 5, 'Mail tanrısı.', 100, 98, 95, 98, '4', '2019-08-11'),
(4, 41, -533872494, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '0000-00-00'),
(5, 41, -533872494, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '2019-08-23'),
(6, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 0, 0, 0, 0, 'AA', '2019-08-23'),
(7, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 0, 0, 0, 0, 'AA', '2019-08-23'),
(8, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 0, 0, 0, 100, 'AA', '2019-08-23'),
(9, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 0, 0, 0, 100, 'AA', '2019-08-23'),
(10, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 100, 100, 100, 100, 'AA', '2019-08-23'),
(11, 41, -533872494, 5, 5, 5, 5, 5, 5, 5, '', 100, 100, 100, 100, 'AA', '2019-08-23'),
(12, 55, 371397038, 5, 5, 5, 5, 3, 3, 1, 'bok gibi', 100, 100, 100, 100, 'AA', '2019-08-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
