-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2015 at 04:43 
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mxious`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `clicked` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `userid` int(11) NOT NULL,
  `apikey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

--
-- Triggers `comments`
--
DELIMITER $$
CREATE TRIGGER `after_create_comment` AFTER INSERT ON `comments`
 FOR EACH ROW BEGIN
  -- UPDATE posts SET comments_count = comments_count+1 WHERE id = NEW.postid;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_delete_comment` AFTER DELETE ON `comments`
 FOR EACH ROW BEGIN 
  DELETE FROM alerts 
    WHERE `from` = OLD.userid 
      AND object_id = OLD.id 
      AND `action` = 'comment';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE IF NOT EXISTS `following` (
  `id` int(10) unsigned NOT NULL,
  `userid` int(11) NOT NULL,
  `followid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Triggers `following`
--
DELIMITER $$
CREATE TRIGGER `after_unfollow` AFTER DELETE ON `following`
 FOR EACH ROW BEGIN
  -- Delete follow alert
  DELETE FROM alerts 
  WHERE action = 'follow'
  AND `from` = OLD.userid
  AND object_id = OLD.followid
  AND object_type = 'user';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `token` varchar(32) DEFAULT NULL COMMENT 'md5 token',
  `created` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(9) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` varchar(500) CHARACTER SET latin1 NOT NULL,
  `tags` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `up_votes` int(10) NOT NULL DEFAULT '0' COMMENT 'Cache of up votes',
  `down_votes` int(11) DEFAULT '0' COMMENT 'Cache of down votes',
  `comments_count` int(11) NOT NULL COMMENT 'Cache of comment count',
  `time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=581 DEFAULT CHARSET=utf8;

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `after_post_delete` AFTER DELETE ON `posts`
 FOR EACH ROW -- Delete data related to post
BEGIN
  -- Delete post's votes
  DELETE FROM votes WHERE postid = OLD.id;
  -- Delete post's comments
  DELETE FROM comments WHERE postid = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '50',
  `bio` text,
  `location` varchar(50) DEFAULT NULL,
  `website_title` varchar(100) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `favorite_movies` text,
  `favorite_tv` text,
  `favorite_music` text,
  `favorite_quotes` text,
  `avatar` varchar(150) NOT NULL DEFAULT '',
  `status` tinytext NOT NULL,
  `joined` int(20) NOT NULL,
  `last_login` int(20) DEFAULT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  `following` int(11) NOT NULL DEFAULT '0',
  `official` tinyint(1) NOT NULL DEFAULT '0',
  `employee` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_delete` AFTER DELETE ON `users`
 FOR EACH ROW -- Delete the user's data

BEGIN

  -- Delete from following table
  DELETE FROM `following` WHERE userid = OLD.id OR followid = OLD.id;

  -- Delete posts
  DELETE FROM `posts` WHERE userid = OLD.id;

  -- Delete comments
  DELETE FROM `comments` WHERE userid = OLD.id;

  -- Delete votes
  DELETE FROM `votes` WHERE userid = OLD.id;

  -- Delete forgot password tokens
  DELETE FROM `forgot_password` WHERE userid = OLD.id;
  
  -- Delete oauth accounts
  DELETE FROM `user_oauth` WHERE userid = OLD.id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_links`
--

CREATE TABLE IF NOT EXISTS `user_links` (
  `id` int(11) unsigned NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `text` varchar(35) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `created` int(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_oauth`
--

CREATE TABLE IF NOT EXISTS `user_oauth` (
  `id` int(11) unsigned NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `oauth_provider` varchar(20) DEFAULT NULL,
  `oauth_uid` varchar(128) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Triggers `votes`
--
DELIMITER $$
CREATE TRIGGER `after_delete_vote` AFTER DELETE ON `votes`
 FOR EACH ROW BEGIN
  DELETE FROM `alerts`
  WHERE `object_id` = OLD.postid
  AND `from` = OLD.userid
  AND (`action` = 'like' OR `action` = 'dislike');
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`followid`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD FULLTEXT KEY `searchindex` (`content`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_links`
--
ALTER TABLE `user_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_oauth`
--
ALTER TABLE `user_oauth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`userid`,`oauth_uid`,`oauth_provider`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`userid`,`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=581;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_links`
--
ALTER TABLE `user_links`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_oauth`
--
ALTER TABLE `user_oauth`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;