-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 02:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `lahir` date NOT NULL,
  `ketua` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `salt`, `password`, `nama`, `hp`, `lahir`, `ketua`, `last_login`, `foto`) VALUES
(1, 'admin@gmail.com', '1b481dad44c9d3d68db4f5b0070d583129fc4e71a73cd2eeb22a0cd9e3469cab46a2bc433b0c9d738b0fdf01244572ac41ffac9e6e93358bab0679b3d5a05236', '9e8d5e36c47b8fb2b7a107869ec746a8d15505638a5237f8d4d6730b1850b5fe54150abe45ca38a3be5216ed8944af6bb0fa45596081ffbdb7995ff9ea3cb752', 'Admin Super', '0123456789001', '2022-03-01', 0, '2022-03-15 00:00:00', 'image/cato.jpg'),
(2, 'michael@gmail.com', '759e11c61948ef41fb5c6575d3735eaac5898336c8320db67982ea6adc21c873d8cf9310f24035f73aacb70fe2db222460481cb3fa2cff102a58a09a91b234a5', '436cc6fe3af25b9ef5aedd917dfe7a6ee793f4347f07c6d7a4a691b25a009a3a021a72069f4289365835addd44abe7d91a4e1b01e52c4e48086dd773f7a07733', 'Michael', '00213987122', '2022-03-17', 0, '2022-03-14 14:31:13', ''),
(3, 'user2@gmail.com', '7dcc4420d36808f1c676c72500d3fa83d72b9530841bdf5574058359a72a80759ff76289bc46e7aa4d8c357a8b060bebe4cf0ce5f05ef071eab2f1cf825efdd8', '436cc6fe3af25b9ef5aedd917dfe7a6ee793f4347f07c6d7a4a691b25a009a3a021a72069f4289365835addd44abe7d91a4e1b01e52c4e48086dd773f7a07733', 'user2', '0021398712', '2022-01-10', 0, '2022-03-14 15:19:39', ''),
(5, 'dobby@gmail.com', 'd76a421285f2188a242c95f2d76bd9fbb9b83ad993bdaab463d94f7e60e7f7273a8c4e715b78dfedc016ff9b1a6f59d6094bd4d695a619080cdfdb947bd0eb83', '436cc6fe3af25b9ef5aedd917dfe7a6ee793f4347f07c6d7a4a691b25a009a3a021a72069f4289365835addd44abe7d91a4e1b01e52c4e48086dd773f7a07733', 'dobby', '082330000000013', '2001-05-05', 0, '2022-03-28 19:00:16', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
