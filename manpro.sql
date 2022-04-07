-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 03:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkitab`
--

CREATE TABLE `alkitab` (
  `id` int(11) NOT NULL,
  `ayat` varchar(30) NOT NULL,
  `renungan` text NOT NULL,
  `tanggal_dikasih` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` varchar(150) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `deletedAt` datetime NOT NULL,
  `deletedBy` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_event`
--

CREATE TABLE `detail_event` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `absen` tinyint(1) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_group`
--

CREATE TABLE `detail_group` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alkitab` int(11) NOT NULL,
  `sudah_baca` tinyint(1) NOT NULL,
  `sudah_baca_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_group`
--

INSERT INTO `detail_group` (`id`, `id_group`, `id_user`, `id_alkitab`, `sudah_baca`, `sudah_baca_at`) VALUES
(1, 1, 4, 0, 0, '0000-00-00 00:00:00'),
(2, 1, 5, 0, 0, '0000-00-00 00:00:00'),
(3, 1, 6, 0, 0, '0000-00-00 00:00:00'),
(4, 1, 7, 0, 0, '0000-00-00 00:00:00'),
(5, 1, 12, 0, 0, '0000-00-00 00:00:00'),
(6, 1, 5, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` varchar(150) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `updatedBy` varchar(150) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `deletedAt` datetime NOT NULL,
  `deletedBy` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_alkitab`
--

CREATE TABLE `group_alkitab` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` varchar(150) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `updatedBy` varchar(150) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `deletedAt` datetime NOT NULL,
  `deletedBy` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_alkitab`
--

INSERT INTO `group_alkitab` (`id`, `nama`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `isActive`, `deletedAt`, `deletedBy`) VALUES
(1, 'Group Jumat', '2022-03-23 14:30:56', 'admin@gmail.com', '0000-00-00 00:00:00', '', 1, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(2, 'TESTING MANPRO.pdf', 'finalTESTING MANPRO.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `lahir` date NOT NULL,
  `ketua` tinyint(1) NOT NULL,
  `update_ketua` datetime NOT NULL DEFAULT current_timestamp(),
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedProfileAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedProfileBy` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `pic_path` text NOT NULL,
  `group_member` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `salt`, `password`, `nama`, `hp`, `lahir`, `ketua`, `update_ketua`, `createdAt`, `updatedProfileAt`, `updatedProfileBy`, `last_login`, `pic_path`, `group_member`) VALUES
(1, 'admin@gmail.com', '1b481dad44c9d3d68db4f5b0070d583129fc4e71a73cd2eeb22a0cd9e3469cab46a2bc433b0c9d738b0fdf01244572ac41ffac9e6e93358bab0679b3d5a05236', '33fb077e32c86109ec21c64fe66ba84c06c38fc33aaf0cacb5d3267d26056c02dd3c43f1ae707e8fb5fbd22437f0028b4aed4a4d157670803b9a9006addca9d7', 'Admin Super', '0', '2022-03-14', 1, '2022-03-20 16:01:20', '2022-03-20 16:02:46', '2022-03-20 16:02:46', '', '2022-03-15 00:00:00', '', 0),
(4, 'michael@gmail.com', '91aa3e78034290a56e0e11a1ac83bc80590433dc6ba780e9ec185327e574dfb646fbaf1a3e8a9bbf19db66aa95e1e0c88a7cc13ea52d19a086480f150eb178ea', '893f25311c9518ea6819f517a1dedf0152dae638354f42836f14a81165473dc708b6ef1f7b8ce020e917fd08e2daf0a1252e1985b131ffec937a19e180185338', 'Michael', '0021398712', '2022-03-07', 1, '2022-03-20 10:15:46', '2022-03-20 10:15:46', '2022-03-20 10:15:46', '', '2022-03-20 10:15:46', '', 0),
(5, 'halim@gmail.com', 'e04d53fc1911ac08b19bf0088011125079e8057e37637bd647511b03f80a4c36bbb008ba4b5e3b307205e3bf9f9ced3b5b4868fbfd39391c896b405c675289a1', 'f6b8fb4fa16222aa2f6fbd99ad154859f6ee757a0db887bf3b0022a09fd5fd5fda85c07d922ae1e06e6993e03677651b49aa4fa63ce7c1cf3a1a0cab39579ba3', 'halim', '00212398712', '2022-03-20', 0, '2022-03-20 10:16:52', '2022-03-20 10:16:52', '2022-03-20 10:16:52', '', '2022-03-20 10:16:52', '', 1),
(6, 'angel@gmail.com', '902d6ece792e7ed1687ba1df904e4fa9bd0a452ec43ab6d782cf3eaacb98e81598856d40939ba12b9fc70146cc42fd0e37fe5d87c48e8bde2a189d39f307d1fe', '8fcd939184b910bb5590d0458f0df7ed45d3c8ebcdedd0248cf23c98bb9fc381de4aa2fabee6cfae51de5a3ad365a0c8237be23743460ba5da3bf464a7b65b05', 'angel', '092123458712', '1977-12-21', 0, '2022-03-20 10:17:54', '2022-03-20 10:17:54', '2022-03-20 10:17:54', '', '2022-03-20 10:17:54', '', 1),
(7, 'user1@gmail.com', 'c41f513ccdf576259979a3b346c395e35a2111a5cd62f2230ab4a05baaa0e6a10fe9ef8b4c9007df5ae52799662d7791623d3fbdfc3eaad4b26a82805375e907', 'ae92d4076429f0b7b2fd05ce036c70c0b5f9be55dcf71857c4cf07a40bd4fa6f51bd08caa712fae545a0abb74c34123a226fe35c66e77b05022e4183393cf687', 'user1', '0021398712', '2004-01-06', 0, '2022-03-20 11:09:27', '2022-03-20 11:09:27', '2022-03-20 11:09:27', '', '2022-03-20 11:09:27', '', 1),
(8, 'user3@gmail.com', '32865bed5750a38c121d619562320427c9072fc3a9ebe2aa9260c67f0f518d4901b77a634c83a4924d5b120239d66cae907372537c41a96801308956c703baed', 'ec5521b4f4034015c5e72e3d3f6282d8262d76caaab39a2efb15bbc6f9d460bc24cf240cf563b0ddc8e703e579218e96c81e25634b280e265c3c11bfcd8e59fe', 'user3', '0021398712', '2005-02-20', 0, '2022-03-20 15:01:31', '2022-03-20 15:01:31', '2022-03-20 15:01:31', '', '2022-03-20 15:01:31', '', 0),
(9, 'user4@gmail.com', '0a031c35e4fa509bd1aa1bf46bf15dc658cc1467a93ae09f111f984d6f8b84e27fb2e5e5b14f05c00ba0c4970461fd0db48f610ee5044de7fb3ee6fe5d200039', '2768e5980597240dc24adf48e773dcc244b01ca0e69c3803ddb1e348ea39319f19353ed0adbcce449a28dda77987730523ef85a5323bf6eb3b679dc32a019998', 'user4', '0021398712', '2000-03-23', 0, '2022-03-20 15:08:31', '2022-03-20 15:08:31', '2022-03-20 15:08:31', '', '2022-03-20 15:08:31', '', 0),
(11, 'user7@gmail.com', '7380d4f1c436b299d8153d4ebbc91ece54881b03d6392f445c7a9f9188a859924fd65916410e3f46fbb3bf5e4e1a4c16ca808f683f70b338759253161f752bbc', 'eef709fb87cd1203e4e0e5dc9436cd715125b8ff1235b1893969fc9ab17c878054aed324c2ea47277258b1bb793927e1826677a8a264c73a7c5d87c6f222fee7', 'user7', '0021398712', '1997-12-12', 0, '0000-00-00 00:00:00', '2022-03-21 17:18:41', '2022-03-21 17:18:41', 'user7', '2022-03-21 17:18:41', '', 0),
(12, 'user8@gmail.com', '8efbf23ecd4b76384f2ab0e4cbbb6fbf4c2fa7b0fab028d0021fee88068e813227e695a1e957d769f58fed82389d6c41dd8e5bca45abb87a7a7705a67808c1e8', '65ba2731ddda5b75a1661c986dc6c0f01ac5753afc267675c5f4b73a74f8d3d05f2362019703f818577ffdb388290abf1bb206661a729aa7807c727d37e99df8', 'user8', '0021398712', '1997-12-12', 0, '0000-00-00 00:00:00', '2022-03-21 17:22:08', '0000-00-00 00:00:00', '', '2022-03-21 17:22:08', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkitab`
--
ALTER TABLE `alkitab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_event`
--
ALTER TABLE `detail_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_group`
--
ALTER TABLE `detail_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_alkitab`
--
ALTER TABLE `group_alkitab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alkitab`
--
ALTER TABLE `alkitab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_event`
--
ALTER TABLE `detail_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_group`
--
ALTER TABLE `detail_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_alkitab`
--
ALTER TABLE `group_alkitab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
