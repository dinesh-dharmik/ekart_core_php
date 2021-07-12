-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekartt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`, `admin_name`) VALUES
(1, 'admin@gmail.com', 'admin7945', 'dinesh');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'RealMe'),
(2, 'HP'),
(3, 'Samsung'),
(4, 'Apple'),
(5, 'Bajaj'),
(6, 'Beats'),
(7, 'Croma'),
(8, 'Fit Bit'),
(9, 'Xiaomi'),
(10, 'One Plus'),
(11, 'Oppo'),
(12, 'Nikon'),
(13, 'One plus'),
(14, 'Vivo'),
(15, 'Boat'),
(16, 'Amazon'),
(17, 'LG'),
(18, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Computers'),
(2, 'Laptops'),
(3, 'Television'),
(4, 'Mobiles'),
(5, 'Audio'),
(6, 'Camera'),
(7, 'Accessories'),
(8, 'Refrigerators\r\n'),
(9, 'GADGETS OF DESIRE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_fullname` varchar(30) NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_pass` text NOT NULL,
  `customer_add` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(30) NOT NULL,
  `customer_state` varchar(30) NOT NULL,
  `customer_code` varchar(10) NOT NULL,
  `customer_country` varchar(15) NOT NULL,
  `customer_info` varchar(100) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `customer_ip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fullname`, `customer_email`, `customer_pass`, `customer_add`, `customer_address`, `customer_city`, `customer_state`, `customer_code`, `customer_country`, `customer_info`, `customer_phone`, `customer_ip`) VALUES
(5, 'danish', 'dineshdharmik0@gmail.com', 'dinesh7945', 'asdkjasn', 'dasjkn', 'asdjkn', 'asdkj', '421306', 'India', 'asd', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(11, 5, 4999, 1697048467, 1, '2020-04-16 11:40:11', 'pending'),
(12, 5, 19949, 2114489278, 1, '2020-04-16 11:52:28', 'pending'),
(16, 5, 5999, 1174830722, 1, '2020-04-16 12:04:51', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(11, 5, 1697048467, 13, 1, 'pending'),
(12, 5, 2114489278, 16, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_qty` int(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img`, `product_img1`, `product_img2`, `product_price`, `product_desc`, `product_qty`, `status`) VALUES
(5, 4, 3, '2020-04-05 15:42:53', 'Samsung Galaxy A10s (Black, 32 GB, 2 GB RAM)', '81e6XvJzKgL._SL1500_.jpg', '71wYBR-eIwL._SL1500_.jpg', '51BQsUXouEL._SL1500_.jpg', 9599, '13MP + 2MP rear camera | 8MP front facing camera\r\n15.79 centimeters (6.2-inch) HD+ capacitive touchscreen with 720 x 1560 pixels resolution 16M color support\r\nMemory, Storage & SIM: 2GB RAM | 32GB storage expandable up to 512GB | Dual nano SIM with dual standby (4G+4G)\r\nAndroid v9 Pie operating system with 2GHz + 1.5GHz MediaTek MT6762 octa core processor\r\n4000mAH lithium-ion battery\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nBox also includes: Travel Adapter, USB Cable and User Manual', 25, ''),
(6, 4, 10, '2020-04-05 15:46:24', 'OnePlus 7 Pro (Nebula Blue, 8GB RAM, Fluid AMOLED Display, 256GB Storage, 4000mAH Battery)', '51FwsSj8knL._SL1000_.jpg', '51TGQBCV+4L._SL1000_.jpg', '51YYAjTYadL._SL1000_.jpg', 53999, 'Rear Camera; 48MP (Primary)+ 8MP (Tele-photo)+16MP (ultrawide); Front Camera;16 MP POP-UP Camera; You will need to chargethe phone when you first get it or if you have not used it for a long time\r\n16.9 centimeters (6.67-inch) multi-touch capacitive touchscreen with 3120 x 1440 pixels resolution\r\nMemory, Storage and SIM: 8GB RAM | 256GB internal memory | Dual SIM dual-standby (4G+4G)\r\nAndroid Oxygen operating system with 2.84GHz Snapdragon 855 octa core processor\r\n4000mAH lithium-ion battery, Buttons: Gestures and on-screen navigation support; Alert Slider\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nBox also includes: Power Adapter, Type-C Cable (Support USB 2.0), Quick Start Guide, Welcome Letter, Safety Information and Warranty Card, Logo Sticker, Case, Screen Protector (pre-applied) and SIM Tray Ejector', 25, ''),
(7, 4, 4, '2020-04-05 15:49:11', 'Apple iPhone 7 (32GB) - Silver', '41ClQ3J0gjL._SL1000_.jpg', '51ItW0xgUDL._SL1000_.jpg', '51ItW0xgUDL._SL1000_.jpg', 36700, '4.7-inch Retina HD display\r\nIP67 water and dust resistant (maximum depth of 1 meter up to 30 minutes)\r\n12MP camera and 4K video\r\n7MP FaceTime HD camera with Retina Flash\r\nTouch ID for secure authentication\r\nA10 Fusion chip\r\niOS 12 with Screen Time, Group FaceTime, and even faster performance', 26, ''),
(9, 4, 4, '2020-04-05 15:52:22', 'Apple iPhone 7 (32GB) - Silver', '41ClQ3J0gjL._SL1000_.jpg', '51ItW0xgUDL._SL1000_.jpg', '51ItW0xgUDL._SL1000_.jpg', 36700, '4.7-inch Retina HD display\r\nIP67 water and dust resistant (maximum depth of 1 meter up to 30 minutes)\r\n12MP camera and 4K video\r\n7MP FaceTime HD camera with Retina Flash\r\nTouch ID for secure authentication\r\nA10 Fusion chip\r\niOS 12 with Screen Time, Group FaceTime, and even faster performance', 26, ''),
(10, 4, 14, '2020-04-05 15:58:43', 'Vivo Y91i (Fusion Black, 16 GB)  (2 GB RAM)', 'y91i-16-a-1820-vivo-2-original-imafegpdzevxhhn2.jpeg', 'y91i-16-a-1820-vivo-2-original-imafegpdqrpgbyzh.jpeg', 'y91i-16-a-1820-vivo-2-original-imafegpdt42gagap.jpeg', 7499, '2 GB RAM | 16 GB ROM | Expandable Upto 256 GB\r\n15.8 cm (6.22 inch) HD+ Display\r\n13MP Rear Camera | 5MP Front Camera\r\n4030 mAh Li-ion Battery\r\nMTK Helio P22 Processor\r\nThe Vivo Y91i smartphone is here to make your life simpler. Its Halo Fullview Display paves the way for an enhanced viewing experience. Its 13 MP rear camera and AI-powered 5 MP front camera, ensure that every picture you click is extremely likeable. With the presence of an impressive 4030 mAh battery, this phone will keep you engrossed, even when you are on the go.', 26, ''),
(11, 5, 15, '2020-04-06 04:35:03', 'Boat Bluetooth Headphones (Rockerz 410, Black)', 'Boat-Rockerz-400-On-Ear-Bluetooth-Headphones-Carbon-Black-B01J82IYLW-1000x1000h.jpg', 'Boat-Rockerz-400-On-Ear-Bluetooth-Headphones-Carbon-Black-B01J82IYLW-16-1000x1000h.jpg', 'Boat-Rockerz-400-On-Ear-Bluetooth-Headphones-Carbon-Black-B01J82IYLW-7-1000x1000.jpg', 1799, 'Key features\r\n\r\nBuilt-in Mic\r\nBuilt-in Noise Cancelling Mic\r\n300 mAh Battery Capacity\r\nStandby Time of 180 Hours\r\nBluetooth v4.1 Support\r\n', 25, ''),
(12, 5, 16, '2020-04-06 04:36:19', 'Amazon Fire TV Stick with Alexa Voice Remote (Black)', 'Amazon-Amazon-Fire-TV-Stick-SDL932198600-3-9ea73.jpg', '61WzGTJKl+L._AC_SX425_.jpg', '81h81fJ+C0L._SL1500_.jpg', 3999, 'Now enjoy amazing and extravagant television with the all-new Amazon Fire TV Stick with Alexa Voice Remote. Television viewing experience has evolved and has taken tremendous shape with the new age technology. Technology that has advanced and has made the television viewing experience hassle-free. The Fire TV Stick is easy to set up and comes pre-registered to your Amazon account so you can just plug it into your HDTV and enjoy favorite titles and personalized recommendations. The compact design of the fire stick makes it extremely easy to use and amazingly intuitive.', 25, ''),
(13, 5, 16, '2020-04-06 04:38:02', 'JBL Truly Wireless In-Ear Earphones (T100, Black)', '71BHppg0KhL._SL1500_.jpg', '71PtqzSTvtL._SL1500_.jpg', '710B8LN1f4L._SL1500_.jpg', 4999, 'Bluetooth 5.0 Connectivity\r\nNoise Isolation\r\nSiri, Google Assistant Support\r\n0.58 cm Driver Unit\r\nStereo Hands-free Call Support', 25, ''),
(14, 5, 16, '2020-04-06 04:39:56', 'Amazon Echo Dot 3rd Gen Bluetooth Speaker (Black)', '-1200Wx1200H-214741-300Wx300H.png', '-1200Wx1200H-214741-2-300Wx300H.png', '-1200Wx1200H-214741-1-300Wx300H.png', 4499, 'Key features\r\n\r\nAlexa App Controlled by Voice Command\r\nFantastic Voice Pickup\r\nControls Smart Bulbs and Smart Plugs\r\nRoutines to Control Multiple Devices at Scheduled Times\r\nHands-free Calling and Messaging', 10, ''),
(15, 5, 16, '2020-04-06 04:41:07', 'Saregama Carvaan Portable Digital Music Player (White)', 'saregama-carvaan-porcelain-white-original-imaexf2eczxdg5m6.jpeg', 'saregama-carvaan-porcelain-white-original-imaexffryytuzpbv.jpeg', 'saregama-carvaan-porcelain-white-original-imaeycjqyupxpj7f.jpeg', 5999, 'Key features\r\n\r\nUSB Connectivity\r\nBluetooth Connectivity\r\nRechargeable Battery With 5 Hours Playtime\r\nAccess To Local FM Channels\r\nComes With 3.5 mm Audio Jack', 26, ''),
(16, 3, 3, '2020-04-06 04:43:35', 'Samsung 80 cm (32 inch) HD Ready LED Smart TV (32N4300, Black)', '210216.png', '-1200Wx1200H-210216-4-300Wx300H.png', '210216.png', 19949, 'Key features\r\n\r\n40 W Speaker Output\r\n1366 x 768 HD Ready Resolution\r\nUSB and HDMI Connectivity\r\nA Plus Panel Type\r\nWi-Fi Connectivity', 15, ''),
(17, 3, 17, '2020-04-06 04:47:15', 'LG 81.28 cm (32 inch) HD Ready LED Smart TV (32LK628BPTF, Black)', '211276.png', '211276.png', '-1200Wx1200H-211276-3-300Wx300H.png', 22699, 'Key features\r\n\r\n3 x HDMI, 1x USB\r\nLG AI ThinQ\r\n35W Audio Output Power\r\nLAN And Wi-Fi Connectivity\r\nActive HDR\r\n', 20, ''),
(18, 3, 17, '2020-04-06 04:49:35', 'LG 81 cm (32 inch) HD LED TV (32LK536BPTB, Black)', '211276.png', '41ClQ3J0gjL._SL1000_.jpg', '-1200Wx1200H-211276-3-300Wx300H.png', 13499, 'Key features\r\n\r\n81 cm Screen Size\r\nIPS Display Panel\r\n20W Audio Output Power\r\nLAN And Wi-Fi Connectivity\r\nDTS Virtual: X', 16, ''),
(19, 3, 17, '2020-04-06 04:51:09', 'LG 81.28 cm (32 Inch) HD Ready LED Smart TV (32LM636B, Black)', '219148.png', '-1200Wx1200H-211276-3-300Wx300H.png', '-1200Wx1200H-210216-4-300Wx300H.png', 18033, 'Watch every colour get a life of its own with LG 81.28 cm (32 Inch) HD Ready LED Smart TV. With HD resolution and an IPS Panel, watching movies and diving into games becomes your favourite pastime. With a slim bezel and polished edges, this smart TV has a wider screen and neatly fits into the decor of your living space. To match the fine picture quality, with DTS Virtual:X and Dolby Audio, the built-in speakers of this TV deliver clear, multi-dimensional audio from every angle.', 30, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
