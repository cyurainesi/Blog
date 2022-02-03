-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 09:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commentsytem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_unique_id` int(11) NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_unique_id`, `user_unique_id`, `post_id`, `comment`, `date`) VALUES
(2, 23472109, 1, 11352109, '#new #trading', '2021-09-25 05:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `user_id` int(11) NOT NULL,
  `dash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_unique_id` int(11) NOT NULL,
  `follow` varchar(255) NOT NULL,
  `follower` varchar(255) NOT NULL,
  `following` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_unique_id`, `follow`, `follower`, `following`) VALUES
(34332109, '0', '1', '42290709'),
(26342109, '1', '1', '24190609'),
(54352109, '1', '1', '383839'),
(48312109, '1', '26', '131'),
(8342109, '1', '26', '37'),
(12342109, '1', '26', '32'),
(17342109, '1', '26', '46'),
(22342109, '1', '26', '25'),
(27342109, '1', '26', '40'),
(42342109, '1', '26', '1'),
(47342109, '1', '26', '2'),
(53342109, '1', '26', '4'),
(59342109, '1', '26', '5'),
(24352109, '1', '26', '6'),
(1242109, '1', '24190609', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `users_id` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp_messages`
--

CREATE TABLE `grp_messages` (
  `message_id` int(11) NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `user_unique_id_r` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grp_users`
--

CREATE TABLE `grp_users` (
  `id` int(11) NOT NULL,
  `grp_id` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_unique_id` varchar(255) NOT NULL,
  `liked` int(11) NOT NULL,
  `user_unique_id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_unique_id`, `liked`, `user_unique_id`, `post_id`, `date`) VALUES
('29302109', 1, '1', '56292109', '2021-09-23 06:30:29'),
('45392109', 1, '1', '11352109', '2021-09-25 05:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `mentions`
--

CREATE TABLE `mentions` (
  `id` int(11) NOT NULL,
  `mentioned_user` varchar(255) NOT NULL,
  `mentioner_user` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentions`
--

INSERT INTO `mentions` (`id`, `mentioned_user`, `mentioner_user`, `post`, `comment`, `reply`, `date`) VALUES
(11, '@inde', 'admin', '19002109', '', '', '2021-09-26'),
(12, '@yobu', 'admin', '13532109', '', '', '2021-09-26'),
(13, '@admin', 'admin', '13532109', '', '', '2021-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `user_unique_id_r` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `grp_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `muted_users`
--

CREATE TABLE `muted_users` (
  `unique_id` int(11) NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `user_unique_id_m` int(11) NOT NULL,
  `muted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muted_users`
--

INSERT INTO `muted_users` (`unique_id`, `user_unique_id`, `user_unique_id_m`, `muted`) VALUES
(53132109, 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nicknames`
--

CREATE TABLE `nicknames` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_r` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `table` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_id`, `user_id`, `type_id`, `table`, `date`, `seen`, `action`) VALUES
(1, 34332109, 1, 42290709, 'follow', '2021-09-23 06:33:34', 0, 'Started following you  '),
(2, 26342109, 1, 24190609, 'follow', '2021-09-23 06:34:26', 0, 'Started following you  '),
(3, 54352109, 1, 383839, 'follow', '2021-09-23 06:35:54', 0, 'Started following you  '),
(4, 48312109, 26, 131, 'follow', '2021-09-25 12:31:48', 0, 'Started following you  '),
(5, 8342109, 26, 37, 'follow', '2021-09-25 12:34:08', 0, 'Started following you  '),
(6, 12342109, 26, 32, 'follow', '2021-09-25 12:34:12', 0, 'Started following you  '),
(7, 17342109, 26, 46, 'follow', '2021-09-25 12:34:17', 0, 'Started following you  '),
(8, 22342109, 26, 25, 'follow', '2021-09-25 12:34:22', 0, 'Started following you  '),
(9, 27342109, 26, 40, 'follow', '2021-09-25 12:34:27', 0, 'Started following you  '),
(10, 42342109, 26, 1, 'follow', '2021-09-25 12:34:42', 0, 'Started following you  '),
(11, 47342109, 26, 2, 'follow', '2021-09-25 12:34:47', 0, 'Started following you  '),
(12, 53342109, 26, 4, 'follow', '2021-09-25 12:34:53', 0, 'Started following you  '),
(13, 59342109, 26, 5, 'follow', '2021-09-25 12:34:59', 0, 'Started following you  '),
(14, 24352109, 26, 6, 'follow', '2021-09-25 12:35:24', 0, 'Started following you  '),
(15, 1242109, 24190609, 0, 'follow', '2021-09-25 01:24:01', 0, 'Started following you  '),
(16, 18472109, 1, 42290709, 'follow', '2021-09-25 01:47:18', 0, 'Unfollowed you'),
(17, 58472109, 1, 42290709, 'follow', '2021-09-25 01:47:58', 0, 'Started following you '),
(18, 55482109, 1, 42290709, 'follow', '2021-09-25 01:48:55', 0, 'Unfollowed you');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_unique_id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `user_unique_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `month` date DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_unique_id`, `post`, `date`, `user_unique_id`, `link`, `image`, `image_caption`, `video`, `month`, `location`) VALUES
(1, 56292109, 'Hy all welcome to my site\r\n', '2021-09-23 06:29:56', 1, '', '', '', '', '0000-00-00', 'Kigali Rwanda'),
(4, 18012109, '#laravel', '2021-09-25 05:01:18', 1, '', '', '', '', '0000-00-00', 'Kigali Rwanda'),
(6, 8172109, '#react', '2021-09-25 05:17:08', 1, '', '', '', '', '0000-00-00', 'Huye'),
(7, 55252109, '#react', '2021-09-25 05:25:55', 1, '', '', '', '', '0000-00-00', 'Kigali Rwanda'),
(9, 31322109, '', '2021-09-25 05:32:31', 1, '', 'IMG_20200409_094149_985.jpg', '#photo #nature #livewire', '', '0000-00-00', 'Huye'),
(10, 11352109, '', '2021-09-25 05:35:11', 1, '', '', '#video #nature #funny #smile photo', 'pexels-karolina-grabowska-6837579.mp4', '0000-00-00', ''),
(12, 13532109, '@yobu @admin', '2021-09-26 08:53:13', 1, '', '', '', '', '0000-00-00', 'Huye');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `profile`) VALUES
(0, 1, 'images.png'),
(56, 26, 'fu.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `id` int(11) NOT NULL,
  `reply_unique_idd` int(11) DEFAULT NULL,
  `user_unique_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_unique_id` int(11) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saved_posts`
--

CREATE TABLE `saved_posts` (
  `id` int(11) NOT NULL,
  `saved` int(11) DEFAULT NULL,
  `user_unique_id` int(11) DEFAULT NULL,
  `postedby` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_posts`
--

INSERT INTO `saved_posts` (`id`, `saved`, `user_unique_id`, `postedby`, `post_id`, `date`) VALUES
(1, 1, 1, 1, 56292109, '2021-09-23 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `user_unique_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag` varchar(2555) NOT NULL,
  `posts_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tag`, `posts_number`) VALUES
(104, 8172109, '#react', 2),
(105, 18012109, '#laravel', 2),
(106, 31322109, '#photo', 2),
(107, 31322109, '#nature', 2),
(108, 31322109, '#livewire', 2),
(109, 11352109, '#video', 2),
(110, 11352109, '#funny', 2),
(111, 11352109, '#smile', 2),
(112, 23472109, '#new', 2),
(113, 23472109, '#trading', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `unique_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `token_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`unique_id`, `username`, `email`, `date`, `active`, `password`, `phone`, `bio`, `token_`) VALUES
(1, 'admin', 'admin@gmail.com', '2021-06-16 16:27:57', 1, 'admin', '0780808080', '“Any fool can write code that a computer can understand. Good programmers write code that humans can understand.” – Martin Fowler', '$2y$10$UpbARganc.fs7UiMbsy3FuVlVviPS3jyRUXEYVQLcfwiif8wtjIrW'),
(2, 'ish dam', 'dam@123gmail.com', '2021-06-17 12:17:02', 0, 'qwert', '+250787173942', '', ''),
(4, 'imanishimwe', 'imanishimwejean@gmail.com', '2021-06-17 10:26:04', 0, '12345', '+250785186008', '', ''),
(5, 'jizzy', 'jizzyy@gmail.com', '2021-06-12 02:08:05', 0, '123', '0', '', ''),
(6, 'copin01', 'kizigenza@gmail.com', '2021-06-18 10:59:06', 1, '0725565802', '+250784801965', '', ''),
(8, 'The cat', 'cat@gmail.com', '2021-06-20 03:06:08', 1, 'honore', '+188888888888', '', ''),
(9, 'bugingO', 'Bugingo@gmail.com', '2021-06-09 11:41:09', 0, '123', '0', '', ''),
(10, 'damour', 'bb@gmail.com', '2021-06-09 11:23:10', 0, '123', '0', '', ''),
(12, 'gashia', 'gashia@gmail.com', '2021-06-21 01:11:12', 0, 'gashia1', '+250783821143', '', ''),
(14, 'Yumvagusenga Patrick', 'yumvagusengapatrick14@gmail.com', '2021-06-17 06:27:14', 0, 'Patrick', '+250781099825', '', ''),
(17, 'Alexis', 'alexis@gmail.com', '2021-06-17 07:31:17', 0, 'alexis', '+250789362778', '', ''),
(19, 'Isimbi', 'alianeisimbi777@gmail.com', '2021-06-17 11:03:19', 0, '11111', '+250786419039', '', ''),
(20, 'topie', 'topiecalliopie@gmail.com', '2021-06-03 11:24:20', 0, '123', '0', '', ''),
(21, 'henriette', 'henriette500@gmail.com', '2021-06-18 09:47:21', 0, 'henriette', '+250783970605', '', ''),
(24, 'serge', 'serge@gmail.com', '2021-06-18 12:01:24', 0, 'serg12', '+250785642400', '', ''),
(25, 'Ruth', 'ruth@gmail.com', '2021-06-21 12:23:25', 0, 'ruth2003', '+250784208832', 'nge nemera daddy kub', ''),
(26, '_.a.d.r.i.n.e._', 'uweraadrine3@gmail.com', '2021-08-08 05:07:26', 0, 'lovely brother', '+250785776569', 'hy u Learn how to learn ', ''),
(27, 'dufitumukiza ileveni', 'ileveni@gmail.com', '2021-06-17 07:28:27', 0, 'ileveni', '+250785135892', '', ''),
(29, 'musabika fidele', 'kajyejye@gmail.com', '2021-06-18 08:53:29', 0, 'bongisa', '+250789648391', '', ''),
(30, 'Rocky', 'rockstar@gmai.com', '2021-06-20 01:53:30', 0, 'igitangaza', '+250783516417', '', ''),
(31, 'kool', 'jobe1@gmail.com', '2021-06-17 08:32:31', 0, 'koolio', '+250788456580', '', ''),
(32, 'hyacinthe', 'hyacinthe449@gmail.com', '2021-06-20 02:13:32', 0, 'hyacinthe', '+250781838834', '', ''),
(33, 'jean marie', 'jmr@gmail.com', '2021-06-18 06:38:33', 0, 'dushime', '+250787705849', '', ''),
(35, 'Naka Salim', 'naka@gmail.com', '2021-06-18 10:16:35', 0, 'nakasalim', ' +250787500068', '', ''),
(36, 'duf', 'dufitukuriplacode@gmail.com', '2021-06-04 10:13:36', 0, '123', '0', '', ''),
(37, 'EMMY', 'emmy@gmail.com', '2021-06-12 02:07:37', 0, '123', '0', '', ''),
(38, 'hucker', 'hucker@gmail.com', '2021-06-01 08:08:41', 0, '123', '0', '', ''),
(39, 'MANZI', 'manzi449@gmail.com', '2021-06-17 06:40:39', 0, '123456', '+250788892807', '', ''),
(40, 'mugisha joshua', 'mugisha.joshua@gmail.com', '2021-06-17 05:43:40', 0, 'joshua', '+250782689374', '', ''),
(42, 'honore', 'honore@gmail.com', '2021-06-17 08:40:42', 0, 'kabongo', '+250788456580', '', ''),
(43, 'Bushii', 'bu@gmail.com', '2021-06-20 02:49:43', 0, 'shema', '+250789876787', '', ''),
(44, 'Joe', 'oliandohr@gmail.com', '2021-06-01 11:43:44', 1, '123', '0', '', ''),
(45, 'Sport News', 'mugabohuessin20199@gmail.com', '2021-06-12 10:44:45', 0, '123', '0781444094', 'Sport is my Passion & Sport news hafi yaweeeee!!!!!!!!!', ''),
(46, 'admin', 'admin@gmail.com', '2021-06-17 03:03:46', 0, 'admin123', '+250788892807', '', '$2y$10$UpbARganc.fs7UiMbsy3FuVlVviPS3jyRUXEYVQLcfwiif8wtjIrW'),
(47, 'izeere liliane', 'liliane@gmail.com', '2021-06-17 06:21:47', 0, 'liliane', '+250725235568', '', ''),
(49, 'Honorine', 'ingabirehonorine1@gmail.com', '2021-06-17 11:19:49', 0, 'honor1', '+250786380176', '', ''),
(50, 'i am BYIMBO', 'byimbobjean@gmail.com', '2021-06-11 04:08:50', 0, '123', '0', '', ''),
(51, 'mugabe', 'mugabeb2@gmail.com', '2021-06-01 04:09:51', 0, '123', '0', '', ''),
(53, 'mpumuro', 'kalisagashema@gmail.com', '2021-06-17 09:37:53', 0, 'kajene', '+250781354862', '', ''),
(55, 'clemance', 'clemance27@gmail.com', '2021-06-17 06:15:55', 0, 'fille20', '+250780591090', '', ''),
(56, 'new', 'new@gmail.com', '2021-06-04 10:34:56', 0, '123', '0', '', ''),
(57, 'merveillemanzi', 'uwasezoe@gmail.com', '2021-06-18 11:12:57', 0, 'merveille21', '+250780155273', '', ''),
(58, 'jessica', 'waida@ishimwegmail.com', '2021-06-21 01:25:58', 0, 'waidax', '+250787731449', '', ''),
(59, 'mubirigi', 'rachel@gmail.com', '2021-06-11 04:14:59', 1, '123', '0', '', ''),
(60, 'Bos$!!', 'boss@gmail.com', '2021-06-21 17:04:10', 1, 'bossman', '+2507816791688', 'Boss', ''),
(131, 'Bukera', 'Bukera`peter@gmail.com', '2021-06-16 04:33:13', 0, 'bkrptr', '+250788892807', '', ''),
(190, 'Great', 'great@gmail.com', '2021-06-01 10:26:16', 1, '123', '0', 'Never giv up', ''),
(383839, 'jobe', 'jobe@gmail.com', '2021-06-01 08:58:47', 1, 'jobe', '+2567750062', 'Winner is a dreamer who never gives up ', ''),
(1344444, 'admin', 'admin@gmail.com', '2021-06-16 16:27:57', 0, 'admin', '0780808080', '', '$2y$10$UpbARganc.fs7UiMbsy3FuVlVviPS3jyRUXEYVQLcfwiif8wtjIrW'),
(15530309, 'Okay ', 'okya@gmail.com', '2021-09-12 03:53:15', 0, '1234567', '+2507088009031', '', ''),
(24190609, 'yobu', 'yobu@gmail.com', '2021-09-10 06:19:24', 1, '1234567', '+250780809031', '#fine helo \r\nKiDi\r\nTouch It\r\nAlbum: The Golden Boy\r\nRelease Date: May 5, 2021 by KiDi ', ''),
(40560509, 'sad', 'ksadn@gmail.com', '2021-09-11 05:56:40', 0, '231345', '+250790996571', '', ''),
(42290709, 'new2', 'ne2w@gmail.com', '2021-09-12 07:29:42', 1, '1234567', '+250780809031', 'something here to see if this works\r\n', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grp_messages`
--
ALTER TABLE `grp_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `grp_users`
--
ALTER TABLE `grp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentions`
--
ALTER TABLE `mentions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `nicknames`
--
ALTER TABLE `nicknames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_posts`
--
ALTER TABLE `saved_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grp_messages`
--
ALTER TABLE `grp_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grp_users`
--
ALTER TABLE `grp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentions`
--
ALTER TABLE `mentions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nicknames`
--
ALTER TABLE `nicknames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_posts`
--
ALTER TABLE `saved_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
