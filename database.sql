-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 03:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `yardyadventures`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `affiliate_code` text NOT NULL,
  `unique_link` text NOT NULL,
  `bank_details` text NOT NULL,
  `dateModified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_uuid` varchar(36) NOT NULL,
  `service_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL COMMENT 'from available timeslot.',
  `transportatiion` text NOT NULL DEFAULT '',
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fac_settings`
--

CREATE TABLE `fac_settings` (
  `id` int(11) NOT NULL,
  `merchant_id` text NOT NULL,
  `merchand_password` text NOT NULL,
  `merchant_sandbox_id` text NOT NULL,
  `merchant_sandbox_password` text NOT NULL,
  `mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_settings`
--

INSERT INTO `fac_settings` (`id`, `merchant_id`, `merchand_password`, `merchant_sandbox_id`, `merchant_sandbox_password`, `mode`) VALUES
(1, 'chalkedfeetDoNotUse', 'opennow', '586364532DoNotUse', '867566dx647wwe764cu6rcdu6845d8', 'Sandbox');

-- --------------------------------------------------------

--
-- Table structure for table `fac_transactions`
--

CREATE TABLE `fac_transactions` (
  `id` int(11) NOT NULL,
  `OrderID` text NOT NULL,
  `CardHolderName` text NOT NULL,
  `CardPan` text NOT NULL,
  `CardCVV` tinyint(4) NOT NULL,
  `CardExpiration` varchar(5) NOT NULL,
  `BillToAddress` text NOT NULL,
  `BillToAddress2` text NOT NULL,
  `BillToCity` text NOT NULL,
  `BillToCountry` text NOT NULL,
  `BillToState` text NOT NULL,
  `BillToZipPostCode` varchar(6) NOT NULL,
  `BillToFirstName` text NOT NULL,
  `BillToLastname` text NOT NULL,
  `BillToTelephone` varchar(20) NOT NULL,
  `BillToMobile` varchar(20) NOT NULL,
  `BillToEmail` text NOT NULL,
  `Total` decimal(40,2) NOT NULL,
  `SpiToken` text NOT NULL,
  `rrn` int(11) NOT NULL,
  `Transaction_Id` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `affiliate` text NOT NULL,
  `billing_address` text NOT NULL,
  `billing_address_2` varchar(30) NOT NULL,
  `billing_city` varchar(30) NOT NULL,
  `billing_state` varchar(30) NOT NULL,
  `billing_zip` varchar(7) NOT NULL,
  `email` text NOT NULL,
  `telephone` varchar(17) NOT NULL,
  `price` decimal(40,2) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `billing_country` varchar(30) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `date`, `time`, `status`, `fname`, `lname`, `affiliate`, `billing_address`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip`, `email`, `telephone`, `price`, `mobile`, `billing_country`, `dateCreated`, `dateModified`) VALUES
(1, 'River Rapids Tubing', '2024-09-19', '08:38:00', '', '', '', '', '', '', '', '', '', '', '', '7500.00', '', '', '2024-09-19 06:38:40', '2024-09-19 06:38:40'),
(3, 'Bamboo Rafting', '2024-09-20', '17:57:00', '', '', '', '', '', '', '', '', '', '', '', '12000.00', '', '', '2024-09-19 15:57:42', '2024-09-19 15:57:42'),
(7, 'River Rapids Tubing', '2024-09-21', '09:14:00', '', '', '', '', '', '', '', '', '', '', '', '7500.00', '', '', '2024-09-20 16:11:30', '2024-09-20 16:11:30'),
(8, 'Bamboo Rafting', '2024-09-23', '10:26:00', 'Paid', 'Deron', 'Daye', 'RTu6UC050quaRw5', '6 Gordon Town Road', 'Apt 5', 'Kingston 6', 'Kingston', '00000', 'dairiondaye@yahoo.com', '+18765485207', '12000.00', '8764300622', 'Jamaica', '2024-09-20 16:26:40', '2024-09-20 16:31:24'),
(9, 'River Rapids Tubing', '2024-09-29', '22:54:00', '', 'Nevile', 'George', '', 'West', '10', 'Sav', 'West', '2266', 'nevilegeorge10@gmail.com', '', '7500.00', '8767811741', 'Jamaica', '2024-09-29 08:55:32', '2024-09-29 08:58:21'),
(11, 'River Rapids Tubing', '2024-10-03', '15:00:00', '', '', '', '', '', '', '', '', '', '', '', '7500.00', '', '', '2024-10-01 07:47:26', '2024-10-01 07:47:26'),
(13, 'Yardy White Water Rafting ', '2024-10-30', '04:57:00', '', '', '', '', '', '', '', '', '', '', '', '120.00', '', '', '2024-10-21 13:56:19', '2024-10-21 13:56:19'),
(14, 'Yardy Park Life', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '45.00', '', '', '2024-10-21 14:41:04', '2024-10-21 14:41:04'),
(15, 'Breezy Hill ATV', '2024-10-25', '20:11:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-10-25 18:10:07', '2024-10-25 18:10:07'),
(16, 'Yardy River Tubing', '2024-10-31', '10:53:00', '', '', '', '', '', '', '', '', '', '', '', '65.00', '', '', '2024-10-31 07:54:01', '2024-10-31 07:54:01'),
(17, 'Breezy Hill ATV', '2024-11-05', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-11-01 12:52:37', '2024-11-01 12:52:37'),
(18, 'Breezy Hill ATV', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-11-04 18:04:08', '2024-11-04 18:04:08'),
(19, 'Yardy River Walk', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '45.00', '', '', '2024-11-04 18:07:09', '2024-11-04 18:07:09'),
(20, 'Breezy Hill ATV', '2024-11-16', '14:00:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', 'Japan', '2024-11-09 20:51:51', '2024-11-09 20:53:52'),
(21, 'Horseback Riding', '2024-11-28', '12:05:00', '', '', '', '', '', '', '', '', '', '', '', '120.00', '', '', '2024-11-20 18:01:50', '2024-11-20 18:01:50'),
(22, 'Horseback Riding', '2024-11-23', '12:50:00', '', '', '', '', '', '', '', '', '', '', '', '120.00', '', '', '2024-11-20 20:44:06', '2024-11-20 20:44:06'),
(23, 'Yardy River Tubing', '2024-11-30', '00:05:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-11-20 23:05:39', '2024-11-20 23:05:39'),
(24, 'Yardy River Tubing', '2024-11-21', '15:40:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-11-21 11:40:08', '2024-11-21 11:40:08'),
(25, 'Breezy Hill ATV/Dune Buggy', '2024-11-21', '14:40:00', '', '', '', '', '', '', '', '', '', '', '', '150.00', '', '', '2024-11-21 12:40:21', '2024-11-21 12:40:21'),
(26, 'Breezy Hill ATV/Dune Buggy', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '150.00', '', '', '2024-11-25 11:38:58', '2024-11-25 11:38:58'),
(27, 'Yardy River Walk', '2024-11-27', '07:26:00', '', '', '', '', '', '', '', '', '', '', '', '85.00', '', '', '2024-11-27 05:26:43', '2024-11-27 05:26:43'),
(28, 'Yardy Horseback Riding', '2024-11-27', '08:48:00', '', '', '', '', '', '', '', '', '', '', '', '95.00', '', '', '2024-11-27 09:48:43', '2024-11-27 09:48:43'),
(29, 'Breezy Hill ATV/Dune Buggy', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '150.00', '', '', '2024-12-04 07:46:53', '2024-12-04 07:46:53'),
(30, 'Yardy White Water Rafting', '2025-01-01', '20:45:00', '', '', '', '', '', '', '', '', '', '', '', '120.00', '', '', '2024-12-29 20:47:38', '2024-12-29 20:47:38'),
(31, 'Yardy White Water Rafting', '2025-01-01', '20:45:00', '', 'Ryan', 'Cole', '', 'Williamsfield District', '', 'Savanna-la-mar', 'Jamaica', '', 'colrryan110@gmail.com', '+18765353906', '120.00', '', 'Jamaica', '2024-12-29 20:47:39', '2024-12-29 20:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_child` decimal(10,2) DEFAULT NULL,
  `max_capacity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `time_slots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON Array storing time values for bookings.' CHECK (json_valid(`time_slots`)),
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `price_child`, `max_capacity`, `time_slots`, `image_url`) VALUES
(1, 'Yardy River Tubing', '<b>All year round 2 km of unrestricted tubing along the Rapids of the Roaring River</b>\n\nEscape the ordinary and dive into fun and relaxation on our thrilling Yardy River Tubing Tour! Race along rapid currents and pause to enjoy the surrounding scenery, where lush greenery meets crystal-clear waters. Perfect for families, friends, or solo adventurers. This guided experience combines the excitement of floating with the serenity of nature.<br>\n\nOur experienced tour guides and life guards ensures your safety while you create unforgettable memories. Whether you are a seasoned rafter or a first-time tuber, this is the perfect way to unhinge from the rigors of normal and connect with the great outdoors.\n\n<table>\n   <tr>\n      <th>Duration</th>\n      <td>2 hours</td>\n   </tr>\n    <tr>\n      <th>Includes</th>\n      <td>Guide, Tubing gear, lunch (subject to time and availability), walking trails, natures jacuzzi, and cultural highlights</td>\n   </tr>\n    <tr>\n      <th>Tour requirements</th>\n      <td>Water shoes</td>\n   </tr>\n    <tr>\n      <th>Suggested add on</th>\n      <td>Clay massage by certified masseuse at the confluence</td>\n   </tr>\n    <tr>\n      <th>Booking Cycle</th>\n      <td>Hourly|8am - 4pm</td>\n   </tr>\n</table>', '85.00', '65.00', 80, '[8,9,10,11,12,13,14,15,16]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/tubing.jpg'),
(2, 'Yardy Horseback Riding', '&lt;p&gt;Ride along the old country road on beautiful horses to discover the origin of streams and breathe in the natural country air while your tour guide highlights indigenous plants and historic landmarks. The nature packed adventure through meadows will create opportunities to interact with members of the community and the option to purchase of tasty treats that forms part of our culinary history, such as dukunoo and drops, refreshing water coconuts and sweet sugar cane.&lt;/p&gt;&lt;figure class=&quot;table&quot;&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th&gt;Duration&lt;/th&gt;&lt;td&gt;2 hours&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Includes&lt;/th&gt;&lt;td&gt;Guide and lunch (subject to time and availability), access to walking trails, blue holes, natures jacuzzi and cultural highlights&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Tour requirements&lt;/th&gt;&lt;td&gt;Water shoes/appropriate footwear.&amp;nbsp;&lt;br&gt;&lt;i&gt;Weight limit-&lt;/i&gt;not exceeding 250lbs or 115kg&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Suggested add on&lt;/th&gt;&lt;td&gt;Farm produce including sugar cane, coconuts, etc, Jamaican sweet treats including dukunoo, coconut drops, etc&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;th&gt;Booking Cycle&lt;/th&gt;&lt;td&gt;Hourly | 8am – 4pm&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/figure&gt;', '95.00', '95.00', 10, '[8,9,10,11,12,13,14,15,16]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/66873963da3e71720138083.jpg'),
(3, 'Breezy Hill ATV/Dune Buggy', 'Rev your path to Breezy Hill for a panoramic view of mountain ranges to the north and miles across the Georges Plain out to the Caribbean Sea.<br>\n\nDune buggy/ ATV trail begins in the adjoining community of Williamsfield unto the unending forest of towering bamboo, fruit trees and yam fields on the 360 acres privately owned Glenislay.<br>\n<table>\n   <tr>\n      <th>Duration</th>\n      <td>2 hours</td>\n   </tr>\n    <tr>\n      <th>Includes</th>\n      <td>Guide and lunch (subject to time and availability), access to blue holes, natures jacuzzi and cultural highlights</td>\n   </tr>\n    <tr>\n      <th>Tour requirements</th>\n      <td>Valid drivers\' license for ATV/driver of dune buggy.Safety Googles/eyewear.</td>\n   </tr>\n    <tr>\n      <th>Booking Cycle</th>\n      <td>Hourly |8am &ndash; 4pm</td>\n   </tr>\n</table>', '150.00', '150.00', 18, '[8,10,12,14,16]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/image2.png'),
(4, 'Yardy River Walk', 'Experience the convergence of cool mineral springs, miniature under water caves, fish habitats, seasonal fruits, towering bamboos and natural flora on the riverbanks and in the Cabaritta.  \n\nOur experienced tour guide ensures your safety and enthral you facts on the eco-environment that creates and sustain the continuous flow of the rivers.  Experience the hot water from undercurrents at the confluence of the Cabaritta and Roaring River and submerge into to natures jacuzzi.\n\n\n<table>\n   <tr>\n      <th>Duration</th>\n      <td>2 hours</td>\n   </tr>\n    <tr>\n      <th>Includes</th>\n      <td>Guide and lunch (subject to time and availability),  access to walking trails, natures jacuzzi and cultural highlights</td>\n   </tr>\n    <tr>\n      <th>Tour requirements</th>\n      <td>Water shoes <br> <em>OPTIONAL</em> – Diving Googles</td>\n   </tr>\n    <tr>\n      <th>Suggested add on</th>\n      <td>Clay massages by certified masseuse at the confluence</td>\n   </tr>\n    <tr>\n      <th>Booking Cycle</th>\n      <td>Hourly |  8am – 4pm</td>\n   </tr>\n</table>', '85.00', '65.00', 10, '[8,10,12]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/image1.png'),
(5, 'Yardy White Water Rafting', 'Our white water rafting adventure is a unique experience that combines the relaxation of rafting and being energized from rowing over rapids and still blue holes of the Cabaritta. Suitable for all skill levels and can be enjoyed solo on kayak or as a group of party of 6-12 on huge raft.\nChoose how you raft and splash!\nOur experienced guides will ensure you are ready to tackle every twist and turn while you connect with nature breathtaking sceneries.\n\n<table>\n   <tr>\n      <th>Duration</th>\n      <td>2&frac12;hours</td>\n   </tr>\n    <tr>\n      <th>Includes</th>\n      <td>Guide, Raft/equipment and lunch (subject to time and availability), walking trails, natures jacuzzi and cultural highlights</td>\n   </tr>\n    <tr>\n      <th>Tour requirements</th>\n      <td>Water shoes</td>\n   </tr>\n    <tr>\n      <th>Suggested add on</th>\n      <td>Clay massage by certified masseuse at the confluence</td>\n   </tr>\n    <tr>\n      <th>Booking Cycle</th>\n      <td>Hourly|8am - 3pm</td>\n   </tr>\n</table>', '120.00', NULL, 30, '[8,9,10,11,12,13,14,15]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/image5.png'),
(7, 'Yardy Park Life', 'Enjoy the walking trails along the embankment, plunge into blue holes, get carried away by the wind in a hammock, have an interchange of culture at Yardy University or just listen to the sound of water on a park bench or log.  Yardy Park life is soothing for the soft adventurer or pulsating for the hard adventurer.\r\n\r\nOur experience tour guide will cater to your pace while you explore and immerse yourself in the unscathed rustic outdoor at Yardy.\r\n\r\n<table>\r\n   <tr>\r\n      <th>Duration</th>\r\n      <td>2 hours</td>\r\n   </tr>\r\n    <tr>\r\n      <th>Includes</th>\r\n      <td>Guide and lunch (subject to time and availability), access to blue holes, natures jacuzzi and cultural highlights</td>\r\n   </tr>\r\n    <tr>\r\n      <th>Tour requirements</th>\r\n      <td>Water shoes/appropriate footwear.\r\n          <br>Guided tour may or may not be wet | may be enjoyed independently (without guide) for the entire day</td>\r\n   </tr>\r\n    <tr>\r\n      <th>Suggested add on</th>\r\n      <td>Clay massages by certified masseuse at the confluence</td>\r\n   </tr>\r\n    <tr>\r\n      <th>Booking Cycle</th>\r\n      <td>Hourly |  8am – 4pm</td>\r\n   </tr>\r\n</table>', '65.00', '45.00', 50, '[8,10,12,14]', 'https://yardyadventures.com/demo/assets/images/frontend/blog/park.jpg'),
(8, 'Yardy Pulsate', '(Dune Buggy) Rev your path to Breezy Hill for a panoramic view of mountain ranges to the north and miles across the Georges Plain out to the Caribbean Sea.   The dune buggy/ ATV trail begins in the adjoining community of Williamsfield unto unending forests of towering bamboo, fruit trees and yam fields on the 360 acres privately owned Glenislay.    Escape the ordinary and indulge the Jamaica’s best River Tubing Adventure.    Race along  rapids of the Roaring River.   Pause to enjoy the surrounding  scenery, where lush greenery meets crystal-clear waters.  Our expert tour guides ensure your safety while you immerse into the making of  unforgettable memories. Whether you are a seasoned rafter or a first-time tuber, this is the perfect way to unhinge from the rigors of normal and connect with the great outdoors.  A THRILLING adventure enjoyed solo or with the entire family and friends. | River Tubing) ', '200.00', '195.00', 0, NULL, ''),
(9, 'Yardy Rush', '', '145.00', '125.00', 0, NULL, ''),
(10, 'Yardy Indulge', '', '100.00', '125.00', 0, NULL, ''),
(11, 'Yardy Fully Rushed', '', '200.00', '170.00', 0, NULL, ''),
(12, 'Floating Resturant and Bar', '', '200.00', '170.00', 0, NULL, ''),
(13, 'Yardy Mountain Biking', '', '0.00', '0.00', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `address` text DEFAULT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `access` int(2) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UUID` (`booking_uuid`);

--
-- Indexes for table `fac_settings`
--
ALTER TABLE `fac_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fac_transactions`
--
ALTER TABLE `fac_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fac_settings`
--
ALTER TABLE `fac_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fac_transactions`
--
ALTER TABLE `fac_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
