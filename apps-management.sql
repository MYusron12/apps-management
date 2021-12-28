-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 09:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Elton Harrison', '1-872-348-1267', 'ornare@outlook.net', 'P.O. Box 251, 8942 Tempus St.'),
(2, 'Yardley Hayden', '1-216-336-0468', 'tincidunt.nibh@icloud.org', 'Ap #442-9978 Elit. Rd.'),
(3, 'Baker Haley', '1-460-313-8127', 'sit.amet@yahoo.org', '548-6186 Interdum Avenue'),
(4, 'Nathan Parsons', '(327) 162-3918', 'malesuada.integer@google.edu', '730-5637 Donec Road'),
(5, 'Aiko Noble', '(738) 370-5586', 'non.leo@google.com', 'P.O. Box 750, 9790 Vitae Rd.'),
(6, 'Todd Buckley', '(485) 351-2487', 'ullamcorper.duis@protonmail.edu', 'P.O. Box 718, 2267 Parturient Rd.'),
(7, 'Kelly Clark', '1-986-488-1881', 'id.libero@icloud.couk', '2717 Interdum. Ave'),
(8, 'Echo Marshall', '(238) 540-3813', 'eu@yahoo.edu', 'P.O. Box 791, 9230 Egestas St.'),
(9, 'Sylvester Park', '1-257-861-2425', 'ipsum.leo@aol.couk', 'P.O. Box 119, 4477 Euismod Rd.'),
(10, 'Nathan Shields', '1-339-383-3871', 'non.luctus@aol.ca', '8744 Tincidunt Av.'),
(11, 'Renee Jarvis', '1-785-371-4815', 'aptent.taciti@hotmail.ca', 'Ap #454-3927 Erat, St.'),
(12, 'Alfonso Murray', '1-861-126-6077', 'nunc.mauris@outlook.couk', '6626 Mauris St.'),
(13, 'Simon May', '(672) 262-5248', 'non.sapien@aol.edu', 'Ap #627-177 Eu Ave'),
(14, 'Diana Rosales', '(758) 823-8108', 'per@aol.net', 'Ap #186-4135 Libero. Av.'),
(15, 'Kieran Raymond', '1-415-667-6534', 'purus.accumsan@icloud.org', 'Ap #312-1022 Consequat Road'),
(16, 'Kennan Coffey', '1-565-729-5777', 'rutrum.fusce.dolor@yahoo.ca', '248-1294 Nisi Ave'),
(17, 'Zia Meyer', '1-823-646-8374', 'urna.nullam.lobortis@outlook.net', 'P.O. Box 182, 9778 Nisi. Ave'),
(18, 'Ursa James', '1-766-643-4727', 'commodo@aol.net', 'P.O. Box 910, 4222 Facilisis. Av.'),
(19, 'Malachi Stark', '(578) 485-1639', 'lacinia.mattis.integer@icloud.edu', 'Ap #635-9781 Ligula St.'),
(20, 'Hall Thornton', '1-622-179-6373', 'feugiat.sed@icloud.org', '436-6281 Dui Ave'),
(21, 'Anonymous', '0812345678', 'test@test.com', 'jakarta'),
(22, 'User test', '08881112223', 'test@email.com', 'jakarta'),
(23, 'Muhammad Yusron', '0812345678', 'test@email.com', 'jakarta'),
(24, 'apps-management', '08080808', 'apm@test.com', 'tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Muhammad Yusron', 'ryusron19@gmail.com', 'bg1.png', '$2y$10$k0gpi.lhitwxl1UXLBR72eHJQmb6zlMj1OoTONk.OU5RV6H01oA0q', 2, 1, 1638074049),
(5, 'administrator', 'admin@admin.com', 'default.jpg', '$2y$10$6G0vNGjaUdNrOiGh.ejhOefpTdhTBXEPAL3xbdS6.j/KUimncmOOe', 1, 1, 1638105503);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(11, 1, 3),
(15, 1, 2),
(17, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Crud');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 4, 'Master', 'master', 'fas fa-fw fa-clipboard-list', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
