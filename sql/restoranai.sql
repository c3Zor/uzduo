-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 10:16 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoranai`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_menu`
--

CREATE TABLE `res_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_menu`
--

INSERT INTO `res_menu` (`id`, `name`, `about`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
(1, 'Ramen', 'Nieko nepasakysi', 'pirmadiensi', 'antradienis', 'treciadienis', 'ketvirtadienis', 'penktadienis'),
(2, 'Kitas restoranas', 'kazkoaks neaiskus', 'kaip tau ', 'siaip tau', ' niekada nezinojau', 'ka jau padarytis ', 'neiko nezinosi'),
(3, 'Mano manai', 'kazkas', 'Lavas', 'Kabaas', 'cikados', 'melaninas', 'takoma'),
(8, 'Kitoks restoranas', 'Soya galbut', 'Dienos sriuba1.15 â‚¬  California maki (8 ritinukai)2.95 â‚¬ Salotos su virta kiauliena ir grybais3.35 â‚¬', 'Dienos sriuba + Salotos su kepta gruzdinta viÅ¡tiena3.90 â‚¬ Dienos sriuba + Salotos su plÄ—Å¡yta \"pulled\' jautiena3.90 â‚¬ 13.47 LtDienos sriuba + SilkÄ—s uÅ¾kandis3.90 â‚¬', '', '', ''),
(9, 'Gyvenimo orchidejos', 'Maistas ir ne tik', 'Keptas karbonadas su pikantiÅ¡ku grybÅ³ padaÅ¾u. BulviÅ³ koÅ¡Ä—, Å¡vÅ¾ kopÅ«stÅ³ salotos su aliejumi. BaltÅ³jÅ³ ir raudonÅ³jÅ³ pupeliÅ³ sriuba.', 'ViÅ¡tienos ir darÅ¾oviÅ³ salotos. SalotÅ³ lapai, agurkai, morkos, sezamai, Å¾emÄ—s rieÅ¡utai, kepsniÅ³ padaÅ¾as. Ä®v. pupeliÅ³ sriuba.', 'Apkepti didÅ¾kukuliai su mÄ—sa. Su spirguÄiais ir grietine. BaltÅ³jÅ³ ir raudonÅ³jÅ³ pupeliÅ³ sriuba', 'ViÅ¡tienos Å¡aÅ¡lykas. Marinuoti viÅ¡tÅ³ kumpeliai, ryÅ¾iai, Å¡vÅ¾ darÅ¾oviÅ³ salotos, Å¡velnus pomidorÅ³ padaÅ¾as. ItaliÅ¡ka darÅ¾oviÅ³ sriuba ', 'BBQ salotos su sÅ«rio spurgytÄ—mis. SalotÅ³ lapai, burokÄ—liai, agurkai, pomidorai, skrud. Å¡oninÄ—, svogÅ«nai. ItaliÅ¡ka darÅ¾oviÅ³ sriuba ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pass`) VALUES
(1, 'as', 'tu', 'givenimas@kartu.lt', 'mano', '$2y$10$0kWaH4pmwbYqRwSLgCnnGONWYzvcA8Bh0LWq67nqdOQSYXbd5Hg3G'),
(2, 'as', 'tu', 'mes@gmail.com', 'as', '$2y$10$OX5904uYFkWr5O7Rvt03du.itBoxvnXTVVNMH5ltjg1hEjGzVmt2O'),
(3, 'tav', 'tav', 'tavo@tavo.lt', 'tavo', '$2y$10$mM1DftWNEaKhMOmrzufQIuWsyJD/4ob3b9L7DrzcrKIMINN3vFXYG');

-- --------------------------------------------------------

--
-- Table structure for table `view_rating`
--

CREATE TABLE `view_rating` (
  `rating_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `view_rating`
--

INSERT INTO `view_rating` (`rating_id`, `post_id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(1, 1, 3, 11, '2017-08-06 10:26:01', '2017-08-06 10:26:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_menu`
--
ALTER TABLE `res_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `view_rating`
--
ALTER TABLE `view_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res_menu`
--
ALTER TABLE `res_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `view_rating`
--
ALTER TABLE `view_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
