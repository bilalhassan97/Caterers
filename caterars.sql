-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 12:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caterars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(10) NOT NULL,
  `f_name` varchar(300) DEFAULT NULL,
  `l_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `contact_no` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `f_name`, `l_name`, `email`, `password`, `img`, `contact_no`) VALUES
(1, 'The', 'Caterars', 'thecaterars@gmail.com', 'a', 'nothing', 99999999);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cr_id` int(30) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paid` tinyint(1) DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cr_id`, `u_id`, `time`, `paid`, `total_price`) VALUES
(1, 4, '2019-06-10 22:01:03', 12, 100),
(2, 4, '2019-06-10 22:02:01', 50, 150),
(3, 6, '2019-06-10 22:02:01', 120, 390),
(4, 2, '2019-06-10 22:02:01', 100, 300),
(6, NULL, '2019-06-11 03:55:59', 0, 0),
(7, 1, '2019-06-11 04:10:35', 1, 9550),
(12, 1, '2019-06-11 04:51:07', 1, 590),
(15, 1, '2019-06-11 05:19:50', 1, 18950),
(16, 1, '2019-06-11 05:20:08', 0, 0),
(17, NULL, '2019-06-11 08:27:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_food`
--

CREATE TABLE `cart_food` (
  `cr_f_id` int(30) NOT NULL,
  `fd_id` int(5) DEFAULT NULL,
  `cr_id` int(30) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_food`
--

INSERT INTO `cart_food` (`cr_f_id`, `fd_id`, `cr_id`, `quantity`, `price`) VALUES
(1, 3, 2, 6, 1200),
(2, 4, 1, 6, 1200),
(3, 5, 3, 16, 2400),
(4, 6, 4, 26, 3600),
(5, 7, 1, 36, 4800),
(6, 6, 7, 1, 9550),
(7, 7, 12, 1, 690),
(8, 4, 15, 1, 19050);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(5) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `name`, `image`) VALUES
(1, 'Rice', 'img.jpg'),
(2, 'Beef', 'img.jpg'),
(3, 'Mutton', 'img.jpg'),
(4, 'Dessert', 'img.jpg'),
(5, 'Chicken', 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `c_id` int(10) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `u_id` int(10) DEFAULT NULL,
  `value` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`c_id`, `name`, `start_date`, `end_date`, `u_id`, `value`) VALUES
(1, '482903', '2019-06-10', '2019-06-17', 2, 100),
(2, '426219', '2019-06-10', '2019-06-17', 4, 100),
(3, '219388', '2019-06-10', '2019-06-17', 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(30) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `desc` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `u_id`, `time_stamp`, `desc`) VALUES
(1, 1, '2019-06-10 21:57:33', 'Fresh and delicious'),
(2, 2, '2019-06-10 21:58:05', 'Hot and Spicy'),
(3, 3, '2019-06-10 21:58:35', 'Late but good'),
(4, 1, '2019-06-11 04:13:01', 'great site the beeest'),
(5, 1, '2019-06-11 04:52:50', 'Great will come again');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fd_id` int(5) NOT NULL,
  `cate_id` int(5) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `unit_price` int(10) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fd_id`, `cate_id`, `name`, `unit_price`, `desc`, `image`) VALUES
(1, 1, 'Beef Biryani', 1200, 'Biryani is a set of rice-based foods made with spices, rice (usually basmati) and meat. The Beef Biryani includes steamed fry pieces of beef marinated in especial beef masala and served on biryani along with raita and salad.', 'beef_biryani.jpg'),
(2, 1, 'Beef Kabali Palao', 1500, 'Beef Kabali palao is an exotic dish of sub continent, its prepared using long grain basmati rice and garnished with raisins and carrots. Served usually in main course meal, its is often ordered along with gravy dishes', 'Beef-Kabali-Palao.jpg'),
(3, 1, 'Beef Kofta Palao', 2000, 'Kofta is a family of meatball or meatloaf dishes found in South Asian, Middle Eastern, Balkan, and Central Asian cuisine. The Beef is mixed with spices and onions shaped like small balls, then cooked in steam/boiled water and lastly fried in little amount of oil to served with plain fried rice with ', 'Beef-Kofta-Palao.jpg'),
(4, 5, 'Chicken Biryani', 900, 'Biryani is a set of rice-based foods made with spices, rice (usually basmati) and meat. The Chicken Biryani includes steamed fry pieces of chicken including leg, thai or chest marinated in especial chicken masala and served on biryani along with raita and salad.', 'Chicken-Biryani.jpg'),
(5, 5, 'Chicken Badami Qorma', 1550, 'Chicken Badami Qorma is a Pakistani qorma with the special addition of almonds to make it crunchy. The mouth watering spices in the chicken badami qorma curry with addition of yogurt and cream makes it more special and the garnishing of ginger and coriander serves with special roghni naan.', 'chicken-badami-qourma.jpg'),
(6, 5, 'Chicken Achari Qorma', 2050, 'As name suggests Chicken Achari Qorma is  bond of two. Lets put it this way, what happens when two of the most popular Pakistani meaty dishes come together? by the way achari (sometimes known as achaar or achar) means pickle. Achari Murgh is a traditional curry made with pickling spices and chicken.', 'Chicken-Achari-Qorma.jpg'),
(7, 4, 'Chakwal Halwa', 690, 'Cake ka halwa can be made in variety of different ways and with different ingredients. Two simple and delicious dessert recipes are Carrot Halwa  ad Channa K Halwa. Other most asked about dishes are  Cake Kalakand And Anjeer Ka Halwa.', 'Chakwali-Halwa.jpg'),
(8, 4, 'Cake Halwa', 760, 'Cake ka halwa can be made in variety of different ways and with different ingredients. Two simple and delicious dessert recipes are Carrot Halwa  ad Channa K Halwa. Other most asked about dishes are  Cake Kalakand And Anjeer Ka Halwa.', 'cake.jpg'),
(9, 4, 'Aaloo Halwa', 880, 'Aloo ka Halwa is an absolutely delicious dish to order.  Its a traditional sweet  dish prepared from the mix of grated potatoes, ghee, milk and sugar. An easy dessert recipe for any no of guests  using traditional Pakistani ingredients. Order a great looking Aaloo ka Halwa made with traditional reci', 'Aalo-halwa.jpg'),
(10, 1, 'Chicken Jalferezi', 999, 'Chicken delivery is favourite dish for bilal', 'jalferezi.jpg'),
(11, 2, 'assasdasd', 3213, 'ajsdjasdbjkddddddddddddddddddd', 'cake.jpg'),
(12, 2, 'assasdasd', 3213, 'ajsdjasdbjkddddddddddddddddddd', 'cake.jpg'),
(13, 2, 'assasdasd', 3213, 'ajsdjasdbjkddddddddddddddddddd', 'Aalo-halwa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_ing`
--

CREATE TABLE `food_ing` (
  `fd_in_id` int(10) NOT NULL,
  `fd_id` int(5) DEFAULT NULL,
  `in_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_ing`
--

INSERT INTO `food_ing` (`fd_in_id`, `fd_id`, `in_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 6),
(4, 1, 8),
(5, 1, 10),
(6, 2, 2),
(7, 2, 4),
(8, 2, 5),
(9, 2, 7),
(10, 2, 9),
(11, 2, 10),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 3, 5),
(16, 3, 7),
(17, 3, 10),
(18, 4, 2),
(19, 4, 3),
(20, 4, 6),
(21, 4, 7),
(22, 4, 8),
(23, 4, 10),
(24, 5, 3),
(25, 5, 5),
(26, 5, 6),
(27, 5, 8),
(28, 5, 9),
(29, 5, 10),
(30, 6, 3),
(31, 6, 5),
(32, 6, 6),
(33, 6, 10),
(34, 11, 3),
(35, 11, 6),
(36, 11, 7),
(37, 11, 8),
(38, 12, 3),
(39, 12, 6),
(40, 12, 7),
(41, 12, 8),
(42, 13, 3),
(43, 13, 6),
(44, 13, 7),
(45, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `in_id` int(5) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `unit_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`in_id`, `name`, `unit_price`) VALUES
(1, 'Bread', 100),
(2, 'Yogurt', 200),
(3, 'Cumin', 150),
(4, 'Coriander', 150),
(5, 'Cardamom', 250),
(6, 'Garam masala', 350),
(7, 'Dried plums', 450),
(8, 'Saffron', 550),
(9, 'Pomegranate seeds', 650),
(10, 'Chaat masala', 750),
(11, 'Sugar', 80),
(12, 'Kishmish', 180);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `or_id` int(30) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(300) DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL,
  `cr_id` int(30) DEFAULT NULL,
  `delivery` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`or_id`, `u_id`, `time`, `address`, `total_price`, `cr_id`, `delivery`) VALUES
(1, 1, '2019-06-11 03:24:44', 'Street#11, I-8, Islamabad', 1200, 1, 0),
(2, 1, '2019-06-10 22:06:45', 'Street#13, G-8, Lahore', 2400, 4, 0),
(3, 2, '2019-06-11 03:32:30', 'Street#15, H-8, Peshawar', 12200, 2, 1),
(4, 3, '2019-06-11 03:24:58', 'Street#71, I-9, Quetta', 1240, 3, 0),
(5, 3, '2019-06-10 22:06:45', 'Street#31, I-1, Rawalpindi', 1600, 3, 0),
(6, 1, '2019-06-11 04:10:59', 'dfasdasd', 9550, 7, 1),
(7, 1, '2019-06-11 04:51:16', 'asdasdsadasdsadasdasdasdasdasd', 590, 12, NULL),
(8, 1, '2019-06-11 05:20:07', 'fxfxfffffffff', 18950, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `f_name` varchar(300) DEFAULT NULL,
  `l_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contact_no` int(12) DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `f_name`, `l_name`, `email`, `password`, `contact_no`, `blocked`) VALUES
(1, 'Talha', 'Zubair', 'asd@gmail.com', 'talha1122', 214748364, 0),
(2, 'Bilal', 'hassan', 'bilal@gmail.com', 'bilal1122', 217483647, 1),
(3, 'Shahzaib', 'Haider', 'malik@gmail.com', 'malik1122', 214748364, 0),
(4, 'Zaka', 'Pakistan', 'zaka@gmail.com', 'zaka1122', 214748364, 0),
(5, 'muhammad', 'ali', 'ali@gmail.com', 'rafay', 344443226, 0),
(6, 'sherjeel', 'afsar', 'sherjeel@gmail.com', 'laxer', 234444444, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `cart_food`
--
ALTER TABLE `cart_food`
  ADD PRIMARY KEY (`cr_f_id`),
  ADD KEY `fd_id` (`fd_id`),
  ADD KEY `cr_id` (`cr_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fd_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `food_ing`
--
ALTER TABLE `food_ing`
  ADD PRIMARY KEY (`fd_in_id`),
  ADD KEY `fd_id` (`fd_id`),
  ADD KEY `in_id` (`in_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `cr_id` (`cr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cr_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart_food`
--
ALTER TABLE `cart_food`
  MODIFY `cr_f_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food_ing`
--
ALTER TABLE `food_ing`
  MODIFY `fd_in_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `in_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `cart_food`
--
ALTER TABLE `cart_food`
  ADD CONSTRAINT `cart_food_ibfk_1` FOREIGN KEY (`fd_id`) REFERENCES `food` (`fd_id`),
  ADD CONSTRAINT `cart_food_ibfk_2` FOREIGN KEY (`cr_id`) REFERENCES `cart` (`cr_id`);

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`);

--
-- Constraints for table `food_ing`
--
ALTER TABLE `food_ing`
  ADD CONSTRAINT `food_ing_ibfk_1` FOREIGN KEY (`fd_id`) REFERENCES `food` (`fd_id`),
  ADD CONSTRAINT `food_ing_ibfk_2` FOREIGN KEY (`in_id`) REFERENCES `ingredient` (`in_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`cr_id`) REFERENCES `cart` (`cr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
