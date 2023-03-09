-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 09, 2023 at 02:45 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RateARestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE `follower` (
  `follow_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`follow_id`, `member_id`, `rest_id`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 2, 1),
(4, 3, 4),
(5, 3, 5),
(6, 4, 2),
(7, 5, 1),
(8, 6, 1),
(9, 6, 2),
(10, 7, 3),
(11, 7, 5),
(12, 8, 1),
(13, 9, 3),
(14, 10, 2),
(15, 10, 4),
(16, 11, 2),
(17, 11, 4),
(18, 12, 1),
(19, 12, 3),
(20, 12, 5),
(21, 13, 2),
(22, 13, 3),
(24, 13, 5),
(25, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`food_id`, `food_name`) VALUES
(1, 'Croqueta'),
(2, 'Pizza'),
(3, 'Salad'),
(4, 'Gelato'),
(5, 'Fried Egg'),
(6, 'Spaghetti'),
(7, 'Calamari'),
(8, 'Tapa'),
(9, 'Mustard'),
(10, 'Guinea Pig'),
(11, 'Kale Smoothie'),
(12, 'Jar of Peanut Butter'),
(13, 'Brownies'),
(14, 'Pancakes'),
(15, 'Chips'),
(16, 'Sangria'),
(17, 'Lobster'),
(18, 'Steak'),
(19, 'Swordfish'),
(20, 'Jello');

-- --------------------------------------------------------

--
-- Table structure for table `food_rest`
--

CREATE TABLE `food_rest` (
  `food_rest_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_rest`
--

INSERT INTO `food_rest` (`food_rest_id`, `rest_id`, `food_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 3, 3),
(8, 4, 1),
(9, 4, 2),
(10, 4, 3),
(11, 4, 4),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3),
(15, 5, 4),
(16, 6, 1),
(17, 6, 2),
(18, 7, 1),
(19, 7, 3),
(20, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `phone`, `role`) VALUES
(1, 'Mabel', 'Sherman', 'mabel204', '$2y$10$b7Zb5jIIVaRc2g15u.PgOuu9r6u8GiG28.y0d/1gqsa38L6VfF3aa', 'mabel204@geemail.com', '3535559124', 'member'),
(2, 'Elijah', 'Patterson', 'elijahm54', '$2y$10$5s6oH5ywte1VqCtMi/4Tf.7eTBgNtz7S57Xjrsk99jKTbabMii2By', 'elijahm54@geemail.com', '4415559942', 'member'),
(3, 'Guy', 'Abney', 'guy2113', '$2y$10$8josPcIpx./EhTmK8uxcleIXqloZDCDnqo5K3uJV/JfaP3wdsU28m', 'guy2113@geemail.com', '4415551044', 'member'),
(4, 'Kimberly', 'Tyson', 'ktyson002', '$2y$10$VVSW.5uos/B4OHGVBrBRN.90OBicLVnUsKOjuO9qDPzLtcShrmilq', 'ktyson002@geemail', '6415550804', 'member'),
(5, 'Coy', 'McNeill', 'coymcneill77', '$2y$10$mbtyFIwsf8l4PVVQ43JmseE/EC31HqF7qHaCENMUtzmthi.re.d4G', 'coymcneill77@geemail.com', '8215556120', 'member'),
(6, 'Sonia', 'Xu', 'sonia1414', '$2y$10$sEc.jZnDGQI/yTSek.l9Reo14m.Z/pcrL6Tz0sW8t7VUmaK8yfe9i', 'sonia1414@geemail.com', '3535554847', 'member'),
(7, 'Bob', 'Maguire', 'bobmag6', '$2y$10$Y8ZeUf5hFX7TBS/JrnnsZun3wuuUL9ZegWJwYaEq8JPu9iJT0tr7W', 'bobmag6@geemail.com', '7335551300', 'member'),
(8, 'Alan', 'Bandini', 'alanba5', '$2y$10$/15Ha17dNWn4FaXmapO6uuxXLV08DaQQ48xcgr.b1ziVJ3GVvdLD2', 'alanba5@geemail.com', '3535552211', 'member'),
(9, 'Jill', 'Glover', 'jg1996', '$2y$10$6m9HeukkCBiR6Y12.Oyj0OtYeMTc0hvzBs369IP3FMetfy/w7BQg2', 'jg1996@geemail.com', '4055558331', 'member'),
(10, 'Hannah', 'Gomez', 'gomezhan1738', '$2y$10$R4r6aFusU3n9216RPxKyyehdTSVXTRj4CmgYEYGAR4SvnOhaLQ9G2', 'gomezhan1738@geemail.com', '8695552788', 'member'),
(11, 'Bill', 'Smith', 'bsmith', '$2y$10$WHYWIJvM2bs8Qyw0q/VQj.1uuZG7n4taF4OnVxRQqIXo44zoXUIa.', 'bsmith@geemail.com', '1235554321', 'admin'),
(12, 'Pauline', 'Jones', 'pjones', '$2y$10$1wKrYxqbCBFBacAfDIQfa.sJGco03VW19VaCIIgt/m0wGWtDw.p.G', 'pjs@geemail.com', '3355556020', 'member'),
(13, 'Doe', 'John', 'doej102', '$2y$10$AdvIzCGxxDDKOHgWbutEEeLOTkLm28QYYGoRpUTR9Cz8TO.VbKRDq', 'djs@geemail.com', '7215556688', 'rest'),
(14, 'Dwight', 'Schrute', 'dwigt04', '$2y$10$9T1hTytmtbfW8rhrDghgI.9yI/Ctq6a1Zw/YNCz.IKNlPoo/tr4S6', 'dundermif@geemail.com', '1085559232', 'rest'),
(15, 'Gordon', 'Ramsay', 'gordonram521@geemail.com', '$2y$10$xDm.lO5Xi1QQnD9vFYm0YejWzH7akdFfHHEh7i5wEISFY1Gf9Mr6O', 'hellskitchen@geemail.com', '2445551985', 'rest'),
(16, 'Saul', 'Goodman', 'saulgood09', '$2y$10$ICutl4dFMvR76k0NVf/9/uot2sqLMtEBZ4uwguNztd8Efw0aq6vri', 'bcs@geemail.com', '9999999999', 'rest'),
(17, 'Michael', 'Scott', 'scottym124', '$2y$10$axxcbnb4Dl7Z3YhmXAtD2OIL8Z4tBKvz5sUASf8A.Loodf7zZJqQi', 'scottmike@geemail.com', '8225559233', 'rest'),
(18, 'Dwayne', 'Ross', 'rossd034', '$2y$10$EZvx9CXXW.DGpfCY4YJ.FOO1qJFM73yXqPkORZ9eLcBttF4OvYHDe', 'rossd@geemail.com', '6415559833', 'member'),
(19, 'John', 'Tanner', 'jotan365', '$2y$10$eOKc9Aqb0by44y3i0A7i4e3Sdy8qiLzlthvL60kuCz3un0suGQa8a', 'jotann92@geemail.com', '7335553581', 'member'),
(20, 'Nadia', 'Lopez', 'nadlopez22', '$2y$10$2nApR6rOjdZyAMTfcRzfLuIPZB4ukevelB2.IFTcxcrzgQAH3enMS', 'nadlopez22@geemail.com', '6015554441', 'member'),
(21, 'Jane', 'Jimmy', 'jane', '$2y$10$HA2n7ac3BfhLWe/ibs.KpORdeWql8gtEEmYskz4AQ3VgDXEc//FSm', 'jane3', '3334445555', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `rest_id` int(10) NOT NULL,
  `rest_name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `premium_member` char(1) NOT NULL,
  `rest_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`rest_id`, `rest_name`, `address`, `phone`, `email`, `owner_name`, `premium_member`, `rest_password`) VALUES
(1, 'Best Burgers', '1234 Burger Ave', '8005551111', 'bestburgers@gmail.com', 'Doe Johnny', '1', '$2y$10$WtRPdu/0CwUDc3QU3O.HfO0gTpvwwXdZBBXXTdnKszpJefnpTuWGu'),
(2, 'Pizza Paradise', '999 Trastevere St', '4445550099', 'pizzaparadise88@gmail.com', 'Dwight Schrute', '1', '$2y$10$.4qOt.bD9x2HGigaE3yU4uD3XydVvGHQ7ae8hL1cTLEzx1blU1Yny'),
(3, 'Nifty Noodles', '321 Pesto Ln', '8004441234', 'niftynoodle16@gmail.com', 'Gordon Ramsay', '0', '$2y$10$m5iDBdIo1VBdf3ajr6f3q.T1FrfiMuYOelFSLfDi1xysed7zzpu8S'),
(4, 'Sandwich Sanctuary', '4321 Crescenzio Ave', '8885550303', 'ssanctuary@gmail.com', 'Saul Goodman', '1', '$2y$10$1SOpfTt91I9Sl1J5YAu2ZO4CUZsvDqDJhzqtGL8QUCYMGESzGshua'),
(5, 'Spaghetti House', '747 Forum Dr', '9995552468', 'spaghethouse11@gmail.com', 'Michael Scott', '0', '$2y$10$I9NMXSHF092r.Urkj2B.S.Eei..li4UbnNapVUjCpQRZNBmp.HcEC'),
(6, 'Savory Bites', '4444 La Sagrada Ave', '3215554896', 'sb@geemail.com', 'Sam Bankman', '1', '$2y$10$RqtcOXpuQJVdmRZNsTW0Kuc7Hwypm8Xv4KcXr8xjEyd78GchuDEUK'),
(7, 'Umami Palace', '555 Bill St', '8885551237', 'up@geemail.com', 'John Durango', '0', '$2y$10$Z8msk/PnMfMuYgd5r.vO2O.eb1RoGK6c.SdQ9Wjz6REmQ64YvuH2K'),
(8, 'Rustic Rooster', '12 Amaty Ave', '7715551294', 'rr@geemail.ccom', 'Benjamin Button', '1', '$2y$10$OtXjJQre0MfbQMs5EpK6b.O0fdBylkfvbHoBFyz.dUQyH98a495Ye'),
(9, 'Tasty Trails', '123 Sesame St', '8245559991', 'tasty@geemail.com', 'Taylor Swift', '1', '$2y$10$R7egc5GP7ylY32/EtoWYsel7iOiJYB1SrxzCn7BRSLXEiicTUOdEO'),
(10, 'Fusion Frenzy', '4222 Vatican Ave', '1405556666', 'fusion@geemail.com', 'Eun Woo Frank', '1', '$2y$10$MiutSWGKNcRR8tcihDB5vOFutR00CKV.zUF07pOdZqL8o8Bk5Xelq'),
(11, 'Spice Street', '17511 Woodrow Way', '2425550195', 'spicy@geemail.com', 'Sylvanus Beake', '0', '$2y$10$.HHXSyliH3u52vn5kqMTEeQr88cd0ruW5ZtkmJTKsBuSIfg7YWUVe'),
(12, 'Bistro Bliss', '4763 Bicetown Road', '5315550090', 'bistrob@geemail.com', 'Reuel Pettersson', '0', '$2y$10$5Qi82WUoBNqNtMQgj2hS/ezLvicF6stxjxm3QCQz8Aan/rRcnb29W'),
(13, 'Sea Salt Shack', '3777 Walnut Hill Dr', '9835550142', 'sss@geemail.com', 'Tony Hale', '1', '$2y$10$ow4H8K3WY0eLVoVWux.7euJu1AF10XOJTpSQQA6PJNKncDPW1xFPW'),
(14, 'Garden Grill', '526 Browning Lane', '4125552224', 'garden@geemail.com', 'Laboni Pierce', '0', '$2y$10$DVkemPJ.TttudnevE1.enOgJ6zip6AOQxyPxdgMBLIIn0B1C6O1gi'),
(15, 'Flame Fiesta', '3780 Tater Tot Ave', '6666666666', 'flamefiest@geemail.com', 'Dan Tate', '1', '$2y$10$ubt0D0ASI2iGywnymXImhOIa5QHrnSM1f8FQTh1jESj3/I18eLvYa'),
(16, 'Yum Yum Kitchen', '924 Maple View Dr', '2145550024', 'yyum@geemail.com', 'Kandas Bottom', '0', '$2y$10$wfaz7HNz6ukFxiP13fupne6L9PlqI72aX6qGJzfDY4CG/OsnF102K'),
(17, 'Fork n Knife', '158 Junior Ave', '6325558913', 'fork@geemail.com', 'Zula Stamimos', '1', '$2y$10$ww4zXUGLM0j8vYNMp/g0deQx81JwDAYgGd1BoQHdsUnEqVaoyoiCq'),
(18, 'Boogie Berries', '1447 Racoon Run', '9355551340', 'boogie@geemail.com', 'Allie Franke', '0', '$2y$10$qzgcWdpuRmuLS2exTEsiIOrH7rbaubQPA00D8hluw9Qg7nw3aluae'),
(19, 'Cozy Korner', '41 George St', '1325556150', 'cozyk@geemail.com', 'William Ward', '1', '$2y$10$Yn139u7SVuZTXamCi2TTL.IJsDnOE6rzqI//T1rPF.GK7ms.z7MfK'),
(20, 'Plate and Palette', '9999 Timber Road', '9155556666', 'plate@geemail.com', 'Matthew Riley', '1', '$2y$10$mO5/NzUJG54zC9840EiCJ.AEyLgP9wrrZuD86WzhHWygklUWEj.tG'),
(21, 'American Pie', '1776 Patriot Ave', '9245550124', 'americapie@geemail.com', 'Sydney Killer', '1', '$2y$10$Q4zxPC5P6LdrnAGul25D2.gogcUhw5xVZB9xsAQIaWnpKKq9q6chi'),
(22, 'Stifflers Restaurant', '2411 Water Way', '3545559120', 'stiff@geemail.com', 'Timothy Twinkle', '1', '$2y$10$x6eJPcyCet47qyeUuzFk8.BipC65UzaMgkulDme2O1LQSlYmlk2am'),
(23, 'Bellas Bistro', '888 Main St', '8885551240', 'bellas@geemail.com', 'Bella Bon', '1', '$2y$10$kAbkyppn.KkkUKwx3wWuq.iYvwqY.XKBpOTN5BjMT/1h8.2E3PwHu'),
(24, 'Hungry Bear Cafe', '789 Forest Rd', '9535550013', 'foreds@geemail.com', 'Driver Jackson', '1', '$2y$10$XXB0iU79ANT5Be.wgSK5D.Oo65UzPOtqhtJ0G29.NC0CKosiD4ZuO'),
(25, 'Sizzling Skillet', '456 Park Ave', '8425556650', 'sizzle@geemail.com', 'Jose Ramirez', '1', '$2y$10$wqYoXNhCt9TwE6uJYD1ujOJ0VafoD2J1JHTWi0vE.JxZzE4RpiLjm'),
(26, 'Raviolli', '444 Pickle Lane', '8885550126', 'rav@geemail.com', 'Samantha Smith', '1', '$2y$10$p1NnviBlGhSaLFvKmdTxzODx2dO0h8HrmBACQ11wwwmDgFZS47Afm'),
(27, 'Beef Cake', '942 Hells Bells Ln', '0025550000', 'beef@geemail.com', 'Troy Tram', '1', '$2y$10$/It8WuJsEtirC3FM.HFwo.E/0.JWPgdPkEduFIMl6MQyL0EytXTge'),
(28, 'Pickle Chip Cafe', '6 Chip Rd', '0925550267', 'picklec@geemail.com', 'Chad Chips', '1', '$2y$10$1RyKBBei/xEfkCgFapKdReUkrh5yhyT/0zhRWT.sNlkO6YxfxiPSa'),
(29, 'Ratatouille Rat', '821 Mouse Ln', '2495550001', 'rat@geemail.com', 'Remi Rat', '1', '$2y$10$z/VUtofJQzJs8JwYpj28GOASc31Ra/cK26kVuP8u.MP8pf0dN5wZK');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rating_score` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `member_id`, `rest_id`, `food_id`, `rating_score`) VALUES
(1, 1, 2, 2, '5'),
(2, 1, 2, 4, '2'),
(3, 1, 4, 1, '4'),
(4, 2, 1, 2, '1'),
(5, 2, 1, 3, '4'),
(6, 3, 4, 1, '1'),
(7, 3, 4, 3, '3'),
(8, 3, 5, 1, '5'),
(9, 3, 5, 2, '1'),
(10, 4, 2, 4, '3'),
(11, 5, 1, 2, '5'),
(12, 5, 1, 3, '5'),
(13, 5, 1, 4, '4'),
(14, 6, 1, 2, '3'),
(15, 6, 1, 4, '2'),
(16, 6, 2, 2, '4'),
(17, 6, 2, 3, '4'),
(18, 7, 3, 3, '5'),
(19, 7, 5, 1, '2'),
(20, 9, 3, 3, '5'),
(21, 10, 4, 1, '1'),
(22, 10, 4, 4, '3'),
(23, 11, 1, 2, '1'),
(24, 11, 1, 2, '1'),
(25, 11, 5, 1, '3'),
(26, 11, 1, 2, '5'),
(27, 11, 4, 3, '5'),
(28, 11, 2, 4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `month_fee` smallint(6) NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `rest_id`, `month_fee`, `payment_method`) VALUES
(1, 1, 300, 'Check'),
(2, 2, 300, 'Credit'),
(3, 4, 300, 'Debit'),
(4, 6, 300, 'Credit'),
(5, 8, 300, 'Debit'),
(6, 9, 300, 'Check'),
(7, 10, 300, 'Check'),
(8, 13, 300, 'Debit'),
(9, 15, 300, 'Credit'),
(10, 17, 300, 'Debit'),
(11, 19, 300, 'Check'),
(12, 21, 300, 'Debit'),
(13, 22, 300, 'Check'),
(14, 23, 300, 'Debit'),
(15, 24, 300, 'Debit'),
(16, 25, 300, 'Credit'),
(17, 26, 300, 'Check'),
(18, 27, 300, 'Check'),
(19, 28, 300, 'Debit'),
(20, 29, 300, 'Credit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `rest_id` (`rest_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_rest`
--
ALTER TABLE `food_rest`
  ADD PRIMARY KEY (`food_rest_id`),
  ADD KEY `rest_id` (`rest_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `rest_id` (`rest_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `rest_id` (`rest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `food_rest`
--
ALTER TABLE `food_rest`
  MODIFY `food_rest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rest_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`rest_id`),
  ADD CONSTRAINT `follower_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `food_rest`
--
ALTER TABLE `food_rest`
  ADD CONSTRAINT `food_rest_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`rest_id`),
  ADD CONSTRAINT `food_rest_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_item` (`food_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_item` (`food_id`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`rest_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`rest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
