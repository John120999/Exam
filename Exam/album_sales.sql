-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 11:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `album_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `sales_2022` int(11) DEFAULT NULL,
  `date_released` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `artist`, `album`, `sales_2022`, `date_released`, `last_update`) VALUES
(1, 'AB6IX', 'Complete with You: Special Album', 43058, '2022-01-17', '2022-01-31'),
(2, 'aespa', 'Savage', 19629, '2021-10-05', '2022-04-30'),
(3, 'Apink', 'Horn', 58641, '2022-02-14', '2022-02-28'),
(4, 'ATEEZ', 'Zero: Fever Epilogue', 3578, '2021-12-10', '2022-01-31'),
(5, 'BAE173', 'Intersection: Blaze', 16801, '2022-03-30', '2022-04-30'),
(6, 'BamBam', 'B', 87540, '2022-01-18', '2022-01-31'),
(7, 'Bang Yongguk', '2', 6933, '2022-03-02', '2022-03-31'),
(8, 'Billlie', 'The Collective Soul and Unconscious: Chapter One', 66885, '2022-02-23', '2022-04-30'),
(9, 'Blitzers', 'Bobbin', 17719, '2022-01-03', '2022-01-31'),
(10, 'Bolbbalgan4', 'Seoul', 2596, '2022-04-20', '2022-04-30'),
(11, 'Brave Girls', 'Thank You', 33605, '2022-03-15', '2022-03-31'),
(12, 'BTOB', 'Be Together', 121528, '2022-02-21', '2022-03-31'),
(13, 'Choi Yena', 'Smiley', 84346, '2022-01-17', '2022-03-31'),
(14, 'Cravity', 'Liberty: In Our Cosmos Part.2', 123922, '2022-03-22', '2022-04-30'),
(15, 'Cherry Bullet', 'Cherry Wish', 20250, '2022-03-02', '2022-03-31'),
(16, 'Def.', 'Love', 41148, '2022-01-26', '2022-01-31'),
(17, 'DKZ', 'Chase, Ep.2-Maum', 118583, '2022-04-12', '2022-04-30'),
(18, 'Dreamcatcher', 'Apocalypse: Save Us', 94706, '2022-04-12', '2022-04-30'),
(19, 'Drippin', 'Villian', 37535, '2022-01-17', '0000-00-00'),
(21, 'E\'LAST', 'Roar', 48695, '2022-04-27', '2022-04-30'),
(22, 'Enhypen', 'Dimension: Dilemma', 27591, '2021-10-12', '2022-04-30'),
(23, 'Enhypen', 'Dimension: Answer', 621425, '2022-01-10', '2022-04-30'),
(24, 'Epex', 'Book of Anxiety Chapter1. 21st Century Boys', 71584, '2022-04-11', '2022-04-30'),
(25, 'Epik High', 'Epik High is Here', 5382, '2022-02-14', '2022-02-28'),
(26, 'Eric Nam', 'There and Back Again', 2183, '2022-01-07', '2022-04-30'),
(27, 'Everglow', 'Return of the Girl', 2450, '2021-12-01', '2022-01-31'),
(28, 'fromis_9', 'Midnight Guest', 120245, '2022-01-17', '2022-03-31'),
(29, '(G)I-dle', 'I Never Die', 198589, '2022-03-14', '2022-04-30'),
(30, 'Ghost9', 'Arcade: V', 9311, '2022-04-07', '2022-04-30'),
(31, 'Ha Sungwoon', 'You', 18717, '2022-02-09', '2022-02-28'),
(32, 'Highlight', 'Daydream', 86293, '2022-03-21', '2022-04-30'),
(33, 'ILY:1', 'Love in Bloom', 3181, '2022-04-04', '2022-04-30'),
(34, 'IVE', 'Eleven', 37284, '2021-12-01', '2022-04-30'),
(35, 'IVE', 'Love Dive', 440067, '2022-04-05', '2022-04-30'),
(36, 'Jinjin & Rocky', 'Restore', 57401, '2022-01-17', '2022-02-28'),
(37, 'Just B', 'Just Begun', 51504, '2022-04-14', '2022-04-30'),
(38, 'Kai', 'Peaches', 5373, '2021-11-30', '2022-01-31'),
(39, 'Kang Hyewon', 'Winter Special Album: W', 18305, '2022-01-04', '2022-01-31'),
(40, 'Kep1er', 'First Impact', 271048, '2022-01-03', '2022-04-30'),
(41, 'Kihyun', 'Voyager', 141407, '2022-03-15', '2022-04-30'),
(42, 'Kim Jaehwan', 'The Letter', 9639, '2021-12-28', '2022-01-31'),
(43, 'Kim Junsu', 'Dimension', 55470, '2022-03-17', '2022-04-30'),
(44, 'Kim Sungkyu', 'Savior', 28082, '2022-04-22', '2022-04-30'),
(45, 'Kim Wooseok', 'Reve: 3rd Desire', 67957, '2022-03-07', '2022-03-31'),
(46, 'Kim Yohan', 'Illusoin', 51754, '2022-01-10', '2022-01-31'),
(47, 'Kingdom', 'History of Kingdom: Pt. 4: Dann', 19450, '2022-03-31', '2022-04-30'),
(48, 'Kwon Eunbi', 'Color', 55923, '2022-04-04', '2022-04-30'),
(49, 'Kyuhyun', 'Love Story (4 Season Project 季)', 37215, '2022-01-25', '2022-02-28'),
(50, 'Lee Seokhoon', 'Same Spot', 7673, '2022-03-24', '2022-03-31'),
(51, 'Lee Seungyoon', 'Even if it becomes ruins', 7640, '2021-11-24', '2022-02-28'),
(52, 'Lisa', 'Lalisa', 73336, '2021-09-10', '2022-04-30'),
(53, 'LUNA', 'Moonlight', 3705, '2022-01-17', '2022-01-31'),
(54, 'Max Changmin', 'Devil', 21831, '2022-01-13', '2022-02-28'),
(55, 'Mirae', 'Marvelous', 48067, '2022-01-12', '2022-01-31'),
(56, 'Miyeon', 'My', 90064, '2022-04-27', '2022-04-30'),
(57, 'Monsta X', 'No Limit', 23015, '2021-11-19', '2022-02-28'),
(58, 'Monsta X', 'Shape of Love', 284668, '2022-04-26', '2022-04-30'),
(59, 'Moonbin & Sanha', 'Refuge', 144205, '2022-03-15', '2022-04-30'),
(60, 'Moonbyul', '6equence', 78120, '2022-01-19', '2022-02-28'),
(61, 'Moonbyul', 'CITT: Cheese in the Trap', 86508, '2022-04-28', '2022-04-30'),
(62, 'NCT 127', 'Sticker', 31194, '2021-09-17', '2022-04-30'),
(63, 'NCT 127', 'Favorite', 30331, '2021-10-25', '2022-03-31'),
(64, 'NCT 2021', 'Universe', 118633, '2021-12-14', '2022-04-30'),
(65, 'NCT Dream', 'Glitch Mode', 1649993, '2022-03-28', '2022-04-30'),
(66, 'NINE.i', 'New World', 3618, '2022-03-30', '2022-04-30'),
(67, 'NMIXX', 'Ad Mare', 406936, '2022-02-22', '2022-04-30'),
(68, 'NU\'EST', 'Need & Bubble: Nu\'est the Best Album', 63446, '2022-03-15', '2022-03-31'),
(69, 'Oh My Girl', 'Real Love', 66912, '2022-03-28', '2022-04-30'),
(70, 'Omega X', 'Love Me Like', 86941, '2022-01-05', '2022-01-31'),
(71, 'Onew', 'Dice', 119006, '2022-04-11', '2022-04-30'),
(72, 'ONEWE', 'Planet Nine: Voyager', 18075, '2022-01-04', '2022-02-28'),
(73, 'ONF', 'Goosebumps', 4396, '2021-12-03', '2022-01-31'),
(74, 'OnlyOneOf', 'Instint, Pt.2', 49362, '2022-01-14', '2022-01-31'),
(75, 'P1Harmony', 'Disharmony: Find Out', 91969, '2022-01-03', '2022-01-31'),
(76, 'Pentagon', 'In:Vite U', 90114, '2022-01-24', '2022-02-28'),
(77, 'Purple Kiss', 'Memem', 32266, '2022-03-29', '2022-03-31'),
(78, 'Ravi', 'Love & Fight', 10359, '2022-02-08', '2022-02-28'),
(79, 'Red Velvet', 'The Reve Festival 2022: Feel My Rhythm', 560838, '2022-03-21', '2022-04-30'),
(80, 'Rocket Punch', 'Yellow Punch', 20055, '2022-02-28', '2022-04-30'),
(81, 'Seventeen', 'Attacca', 30049, '2021-10-22', '2022-04-30'),
(82, 'Solar', 'Face', 43599, '2022-03-16', '2022-04-30'),
(83, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 56940, '2021-12-27', '2022-01-31'),
(84, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 12971, '2021-12-27', '2022-03-31'),
(85, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 5974, '2021-12-27', '2022-03-31'),
(86, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 74162, '2021-12-27', '2022-03-31'),
(87, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 74087, '2021-12-27', '2022-03-31'),
(88, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 41833, '2021-12-27', '2022-03-31'),
(89, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 5265, '2021-12-27', '2022-01-31'),
(90, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 62545, '2021-12-27', '2022-03-31'),
(91, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 14336, '2021-12-27', '2022-01-31'),
(92, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', 2218, '2021-12-27', '2022-01-31'),
(93, 'Suho', 'Gray Suit', 186465, '2022-04-04', '2022-04-30'),
(94, 'StayC', 'Young-Luv.com', 182131, '2022-02-21', '2022-04-30'),
(95, 'Stray Kids', 'Christmas EveL', 14418, '2021-11-29', '2022-04-30'),
(96, 'Stray Kids', 'Oddinary', 1000088, '2022-03-18', '2022-04-30'),
(97, 'Super Junior', 'The Road: Winter for Spring', 142663, '2022-02-28', '2022-04-30'),
(98, 'Super Junior - D&E', 'Countdown Zero (Epilogue)', 8458, '2021-12-09', '2022-01-31'),
(99, 'Taeyeon', 'INVU', 179611, '2022-02-14', '2022-04-30'),
(100, 'Tempest', 'It\'s Me, It\'s We', 82307, '2022-03-02', '2022-04-30'),
(101, 'Tan', 'Limited Edition \'1TAN\'', 8870, '2022-03-10', '2022-04-30'),
(102, 'The Boyz', 'Maverick', 5566, '2021-11-01', '2022-02-28'),
(103, 'The Boyz', 'Webtoon Level Up Alone (OST)', 10573, '2022-03-18', '2022-03-31'),
(104, 'Treasure', 'The Second Step: Chapter One', 668539, '2022-02-15', '2022-04-30'),
(105, 'Trendz', 'Blue Set Chapter 1. Tracks', 6170, '2022-01-05', '2022-01-31'),
(106, 'Twice', 'Formula of Love: OT=<3', 8293, '2021-12-17', '2022-03-31'),
(107, 'UP10TION', 'Novella', 31415, '2022-01-03', '2022-04-30'),
(108, 'Verivery', 'Serioues O-Round 3: Whole', 97187, '2022-04-25', '2022-04-30'),
(109, 'Victon', 'Chronograph', 60959, '2022-01-18', '2022-02-28'),
(110, 'Viviz', 'Beam of Prism', 43638, '2022-02-10', '2022-02-28'),
(111, 'Weeekly', 'Play Game: Awake', 81537, '2022-03-07', '2022-03-31'),
(112, 'WEi', 'Love Pt. 1: First Love', 119853, '2022-03-16', '2022-03-31'),
(113, 'Wheein', 'Whee', 69470, '2022-01-17', '2022-01-31'),
(114, 'Wonho', 'Obsession', 56627, '2022-02-16', '2022-03-31'),
(115, 'Wonpil', 'Pilmography', 33668, '2022-02-10', '2022-02-28'),
(116, 'WJSN Chocome', 'Super Yuppers!', 15135, '2022-01-05', '2022-01-31'),
(117, 'Younha', 'End Theory Final Ed.', 7001, '2022-03-30', '2022-03-31'),
(118, 'Yoon Jisung', 'Miro', 6595, '2022-04-27', '2022-04-30'),
(119, 'Younite', 'Youni-Birth', 21927, '2022-04-22', '2022-04-30'),
(120, 'Yuju', 'Rec.', 22970, '2022-01-21', '2022-01-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
