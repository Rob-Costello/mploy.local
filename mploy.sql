-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2018 at 02:35 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hyperext_mploy_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mploy_companies`
--

CREATE TABLE `mploy_companies` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone number` varchar(30) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `comp_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mploy_companies`
--

INSERT INTO `mploy_companies` (`id`, `name`, `phone number`, `industry`, `address1`, `address2`, `town`, `county`, `country`, `postcode`, `comp_id`) VALUES
(1, 'Rob Costello', '07391723283', 'Web', '177 Windle Hall Drive', '', 'St Helens', 'Merseyside', 'United Kingdom', 'WA10 6PY', 1),
(2, 'Robert Costello', '07598516341', 'Tech', '51 Rodney Street', '', 'St Helens', 'Merseyside', 'United Kingdom', 'WA10 6PY', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mploy_posts`
--

CREATE TABLE `mploy_posts` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mploy_posts`
--

INSERT INTO `mploy_posts` (`id`, `name`, `slug`, `date`) VALUES
(1, 'test', 'testslug', '2018-04-03'),
(2, 'test2', 'testslug2', '2018-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `mploy_schools`
--

CREATE TABLE `mploy_schools` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `dfe_urn` varchar(20) NOT NULL,
  `linked_course_codes` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL,
  `allow_student_sub` varchar(10) NOT NULL,
  `allow_student_reg` varchar(10) NOT NULL,
  `allow_student_search` varchar(10) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `school_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mploy_schools`
--

INSERT INTO `mploy_schools` (`id`, `name`, `type`, `phone_number`, `address1`, `address2`, `town`, `county`, `country`, `postcode`, `dfe_urn`, `linked_course_codes`, `website`, `allow_student_sub`, `allow_student_reg`, `allow_student_search`, `attendance`, `price`, `school_id`) VALUES
(1, 'Test School', 'Primary School', '01744 222222', 'Ruskin Drive', 'Eccleston', 'St Helens', 'Merseyside', 'United Kingdom', 'WA10 6PY', '', '', '', '', '', '', '', '', 1),
(2, 'Test School2', 'Primary School2', '01744 2222222', 'Ruskin Drive2', 'Eccleston2', 'St Helens2', 'Merseyside2', 'United Kingdom2', 'WA10 6PY', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mploy_school_contacts`
--

CREATE TABLE `mploy_school_contacts` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mploy_school_contacts`
--

INSERT INTO `mploy_school_contacts` (`id`, `name`, `position`, `phone`, `email`, `school_id`) VALUES
(1, 'Rob Costell', 'Developer', '01744 33333', 'rob@hyperext.com', 1),
(2, 'Rob Costello', 'Developer', '01744 33333', 'rob@hyperext.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mploy_school_history`
--

CREATE TABLE `mploy_school_history` (
  `id` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `caller` int(20) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `origin` varchar(10) NOT NULL,
  `call_notes` varchar(4000) NOT NULL,
  `school_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mploy_school_history`
--

INSERT INTO `mploy_school_history` (`id`, `date`, `time`, `caller`, `receiver`, `origin`, `call_notes`, `school_id`) VALUES
(1, '2018-05-01', '0000-00-00 00:00:00.000000', 1, 'Test Person', 'In', 'This is a Test note', 1),
(2, '0000-00-00', '0000-00-00 00:00:00.000000', 0, 'sdaDFD', 'In', '', 0),
(3, '0000-00-00', '0000-00-00 00:00:00.000000', 0, 'ASDFSAFSF', 'In', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mploy_school_placements`
--

CREATE TABLE `mploy_school_placements` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `class` varchar(200) NOT NULL,
  `mploy_self` varchar(20) NOT NULL,
  `placed` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `student_id` int(20) NOT NULL,
  `placement_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mploy_school_placements`
--

INSERT INTO `mploy_school_placements` (`id`, `start_date`, `end_date`, `class`, `mploy_self`, `placed`, `status`, `student_id`, `placement_type`) VALUES
(1, '2018-05-01', '2018-05-02', 'Year 10', '100/10', '7/10', 'matching', 1, 'Work Experience');

-- --------------------------------------------------------

--
-- Table structure for table `mploy_students`
--

CREATE TABLE `mploy_students` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `upn` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school_id` int(10) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `year` int(3) NOT NULL,
  `form_name` varchar(100) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `health` int(255) NOT NULL,
  `other_health` int(255) NOT NULL,
  `sen` int(10) NOT NULL,
  `lac` int(10) NOT NULL,
  `placement_company_name` varchar(255) NOT NULL,
  `placement_company_id` int(20) NOT NULL,
  `placement_start_date` date NOT NULL,
  `placement_end_date` date NOT NULL,
  `uln` int(30) NOT NULL,
  `carer` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `last_updated` date NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE `to_do_lists` (
  `id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `list_item` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1526280266, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mploy_companies`
--
ALTER TABLE `mploy_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mploy_posts`
--
ALTER TABLE `mploy_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mploy_schools`
--
ALTER TABLE `mploy_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mploy_school_placements`
--
ALTER TABLE `mploy_school_placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mploy_students`
--
ALTER TABLE `mploy_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mploy_companies`
--
ALTER TABLE `mploy_companies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mploy_posts`
--
ALTER TABLE `mploy_posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mploy_schools`
--
ALTER TABLE `mploy_schools`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mploy_school_placements`
--
ALTER TABLE `mploy_school_placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mploy_students`
--
ALTER TABLE `mploy_students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
