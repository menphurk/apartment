-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 07:27 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `bank_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dorm`
--

CREATE TABLE `dorm` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `images` text NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `room_id`, `timestamp_create`, `timestamp_update`) VALUES
(1, '1', '2020-02-06 16:09:34', '2020-02-06 16:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(191) NOT NULL,
  `idcard` int(15) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text,
  `name_workplace` varchar(191) DEFAULT NULL,
  `address_workplace` text,
  `phone_workplace` varchar(50) DEFAULT NULL,
  `name_emergency` varchar(100) DEFAULT NULL,
  `phone_emergency` varchar(50) DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `image_profile` text NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `title_id`, `first_name`, `last_name`, `age`, `birthday`, `gender`, `idcard`, `phone`, `email`, `address`, `name_workplace`, `address_workplace`, `phone_workplace`, `name_emergency`, `phone_emergency`, `username`, `password`, `image_profile`, `timestamp_create`, `timestamp_update`) VALUES
(1, 1, 'สรศักดิ์', 'เม่นเผือก', 0, '2020-02-05', 'male', 2147483647, '0839506223', 'sorasak_456123@hotmail.com', '3 ซอยองค์การทรัพย์สิน\r\nต.เมืองสวรรคโลก', 'สรศักดิ์ เม่นเผือก', '', '', '', '', 'menphurk', 'e10adc3949ba59abbe56e057f20f883e', 'picture', '2020-02-06 14:41:51', '2020-02-06 14:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `meters_rec`
--

CREATE TABLE `meters_rec` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_rec` datetime(6) NOT NULL,
  `room_id` int(11) NOT NULL,
  `w_meter_bef` int(11) NOT NULL,
  `w_meter_now` int(11) NOT NULL,
  `e_meter_bef` int(11) NOT NULL,
  `e_meter_now` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meters_rec`
--

INSERT INTO `meters_rec` (`id`, `date_rec`, `room_id`, `w_meter_bef`, `w_meter_now`, `e_meter_bef`, `e_meter_now`, `status`, `timestamp_create`, `timestamp_update`) VALUES
(1, '2020-02-06 00:00:00.000000', 1, 0, 20, 0, 11, 0, '2020-02-06 16:09:34', '2020-02-06 16:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `promise_renter`
--

CREATE TABLE `promise_renter` (
  `id` int(11) NOT NULL,
  `start_pro` date NOT NULL,
  `end_pro` date NOT NULL,
  `rent` varchar(191) CHARACTER SET utf8 NOT NULL,
  `recognizance` varchar(191) CHARACTER SET utf8 NOT NULL,
  `member_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promise_renter`
--

INSERT INTO `promise_renter` (`id`, `start_pro`, `end_pro`, `rent`, `recognizance`, `member_id`, `room_id`, `timestamp_create`, `timestamp_update`) VALUES
(1, '2020-02-06', '2020-02-29', '', '5000', 1, 1, '2020-02-06 16:00:03', '2020-02-06 16:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `repair_infrom`
--

CREATE TABLE `repair_infrom` (
  `id` int(11) NOT NULL,
  `topic` varchar(191) NOT NULL,
  `description` text,
  `room_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `repair_date` date NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_infrom`
--

INSERT INTO `repair_infrom` (`id`, `topic`, `description`, `room_id`, `member_id`, `repair_date`, `timestamp_create`, `timestamp_update`) VALUES
(1, 'test', 'ttt', 1, 1, '0000-00-00', '2020-02-06 18:12:27', '2020-02-06 18:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `type_room_id` int(11) NOT NULL,
  `price` varchar(40) NOT NULL,
  `code_place_room` varchar(30) NOT NULL,
  `code_floor_room` varchar(30) NOT NULL,
  `image` text CHARACTER SET latin1,
  `num_people` int(3) NOT NULL,
  `description` text CHARACTER SET latin1,
  `facilities` text CHARACTER SET latin1,
  `status` int(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type_room_id`, `price`, `code_place_room`, `code_floor_room`, `image`, `num_people`, `description`, `facilities`, `status`, `user_id`, `timestamp_create`, `timestamp_update`) VALUES
(1, 'ทดสอบห้อง', 2, '1040', 'D', 'F', 'c7c56519ce5a5c123c4d11fa2f402270.png', 2, NULL, NULL, 0, 1, NULL, NULL),
(8, 'สรศักดิ์ เม่นเผือก', 2, '690', 'D', 'F', '194a0068fa48ae1664c23e660ada351e.png', 2, NULL, NULL, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_room`
--

CREATE TABLE `status_room` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_room`
--

INSERT INTO `status_room` (`id`, `name`) VALUES
(1, 'ว่าง'),
(2, 'จองแล้ว'),
(3, 'อยู่ระหว่างการปรับปรุง');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`) VALUES
(1, 'นาย'),
(2, 'นางสาว'),
(3, 'นาง');

-- --------------------------------------------------------

--
-- Table structure for table `type_room`
--

CREATE TABLE `type_room` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_room`
--

INSERT INTO `type_room` (`id`, `name`) VALUES
(1, 'พัดลม'),
(2, 'ปรับอากาศ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `title_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `timestamp_create` timestamp NULL DEFAULT NULL,
  `timestamp_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `title_id`, `name`, `email`, `phone`, `active`, `timestamp_create`, `timestamp_update`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'admin', 'admin@local.com', '0839506223', 1, '2019-10-03 13:30:54', '2019-10-07 10:58:08'),
(2, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 1, 'sorasak menphurk', 'sorasak_456123@hotmail.com', '0839506223', 0, '2019-10-03 13:00:39', '2019-10-03 13:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorm`
--
ALTER TABLE `dorm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meters_rec`
--
ALTER TABLE `meters_rec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promise_renter`
--
ALTER TABLE `promise_renter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_infrom`
--
ALTER TABLE `repair_infrom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_room`
--
ALTER TABLE `status_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_room`
--
ALTER TABLE `type_room`
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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dorm`
--
ALTER TABLE `dorm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meters_rec`
--
ALTER TABLE `meters_rec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promise_renter`
--
ALTER TABLE `promise_renter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair_infrom`
--
ALTER TABLE `repair_infrom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_room`
--
ALTER TABLE `status_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_room`
--
ALTER TABLE `type_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
