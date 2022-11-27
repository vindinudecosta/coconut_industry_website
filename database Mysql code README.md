# coconut_industry_website

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 05:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coconutindustry_dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_ip_address` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `contact_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_image`, `admin_ip_address`, `company_name`, `company_address`, `contact_no`) VALUES
(2, ' janedoe', 'janedoe@gmail.com', '$2y$10$ylFzSBGQGivPx0lOFRrA2umzwg560MpOJa6sd0HXA4T2MQG.iWWVi', 'tim-bogdanov-4uojMEdcwI8-unsplash.jpg', '::2', 'renuka foods', ' colombo2', 1234569809);

-- --------------------------------------------------------

--
-- Table structure for table `biproducts`
--

CREATE TABLE `biproducts` (
  `Biproduct_id` int(11) NOT NULL,
  `BiproductName` varchar(100) NOT NULL,
  `catergory_id` int(11) NOT NULL,
  `Biproduct_Description` varchar(500) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  `product_img1` varchar(100) NOT NULL,
  `product_img2` varchar(100) NOT NULL,
  `product_img3` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biproducts`
--

INSERT INTO `biproducts` (`Biproduct_id`, `BiproductName`, `catergory_id`, `Biproduct_Description`, `brand_id`, `product_keyword`, `product_img1`, `product_img2`, `product_img3`, `price`, `date`, `status`, `stocks`) VALUES
(1, 'Wellsley Farms organic', 14, 'Wellsley Farms organic unrefined virgin coconut oil is a healthy alternative to traditional olive oil. This product contains 54 oz. of Wellsley Farms ...', 4, 'coconut oil, wellsley farms, organic food', 'img098.PNG', 'img890.PNG', '03.jpg', 250, '2022-11-16 21:17:44', '1', 27000),
(2, 'organic virgin coconut oil ', 14, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 6, 'coconut oil, organic virgin, ', 'img134.PNG', 'img134.PNG', 'img76.PNG', 500, '2022-11-16 22:04:47', '1', 26000),
(3, 'Raw coconut water', 15, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 8, 'coconut water, raw', 'img6.PNG', 'img09.PNG', 'img6.PNG', 1000, '2022-11-16 22:05:41', '1', 23000),
(4, 'Pure coconut water', 14, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 7, 'coconut water', 'img6.PNG', 'img8.PNG', 'img09.PNG', 2000, '2022-11-16 21:28:25', '1', 78952),
(5, 'foco organics water', 15, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 6, 'water, coconut water', 'img8.PNG', 'organic-coconut-water-all.png', 'img6.PNG', 600, '2022-11-16 21:37:13', '1', 560000),
(6, 'shirley coconut', 3, 'Wellsley Farms organic unrefined virgin coconut oil is a healthy alternative to traditional olive oil. This product contains 54 oz. of Wellsley Farms ...', 10, 'biscuit, coconut biscuit', 'img5.PNG', 'img0.PNG', 'img0.PNG', 150, '2022-11-16 21:40:38', '1', 500000),
(7, 'coconut cookies', 3, 'Wellsley Farms organic unrefined virgin coconut oil is a healthy alternative to traditional olive oil. This product contains 54 oz. of Wellsley Farms ...', 8, 'cookies, biscuits', 'img0.PNG', 'Capture.PNG', 'img5.PNG', 200, '2022-11-16 21:42:46', '1', 89000),
(8, 'super coconut', 17, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 7, 'coconut flour, flour', 'coconut-flour.jpg', 'creamed-coconut.jpg', '03.jpg', 230, '2022-11-16 22:02:24', '1', 60000),
(9, 'Nice', 2, 'Purchase our organic virgin coconut oil today! Pressed within four days of being harvested by hand, its taste and texture are unmatched.', 9, 'syrup, coconut', 'img890.PNG', '1042662.jpg', 'Capture.PNG', 100, '2022-11-16 22:07:19', '1', 10000),
(10, 'Coconut crips', 3, 'Shirley Biscuits have been a Caribbean classic for over 60 years. Nothing else in the world quite matches up to their unique, creamy taste; they continue to be a favourite snack today.', 8, 'biscuits', 'Capture.PNG', 'img5.PNG', '1042662.jpg', 100, '2022-11-17 07:51:38', '1', 123000),
(11, 'organic coconut butter', 16, 'Organic coconut butter derived from fresh organic dried coconuts without subjecting into any chemical modifications produced from grinding desiccated coconuts to the consistency of a creamy soft paste. Organic coconut butter has a rich, sweet and nutty flavor Organic coconut butter also called as organic creamed coconut', 12, 'coconut butter, butter, coconut', 'img097.PNG', 'creamed-coconut.jpg', '03.jpg', 250, '2022-11-17 13:42:37', '1', 100000),
(12, 'organic coconut butter', 16, 'Special title treatment With supporting text below as a natural lead-in to additional content.', 7, 'butter', 'img3.PNG', 'img134.PNG', 'img09.PNG', 100, '2022-11-17 17:15:57', '1', 123544),
(13, 'coconut cream', 16, 'With supporting text below as a natural lead-in to additional content.', 8, 'butter , cream,coconut', '1042662.jpg', 'img098.PNG', 'organic-coconut-water-all.png', 1000, '2022-11-21 01:05:15', '1', 256321),
(14, 'lanka coconut oil', 14, 'With supporting text below as a natural lead-in to additional content.\r\nCoconut oil obtained from coconut milk is called virgin coconut oil. Traditional and modern methods are available for the manufacture of virgin coconut oil. In the traditional method, milk extracted from grated coconut kernel is boiled to get oil. Of late, the traditional method has been partially mechanized using a bridge press and mechanical grater. The modern method of extracting oil from fresh coconut kernel is known as ', 9, 'coconut oil, oil, best oil', 'img96.PNG', 'img134.PNG', 'img.45.PNG', 500, '2022-11-21 18:57:05', '1', 5000000),
(15, 'Kist Magic Coconut ', 4, 'PURE ORGANIC COCONUT ALTERNATIVE TO TRADITIONAL CHOCOLATE: Indulge guiltlessly with our rich, chocolatey coconut spread made from pure organic raw ingredients of the highest quality.\r\nVEGAN and SUGAR CANE-FREE: Only ingredients are organic coconut butter, organic cacao nibs and organic coconut sugar. No additives. Does not contain peanut, gluten, dairy, preservatives, added oils, GMOs, salt and pesticides.\r\nHANDMADE USING A TEMPERATURE CONTROLLED PROCESS: Using the most careful attention to deta', 7, 'chocolate, coconut nuts', 'coconut-flour.jpg', 'Capture.PNG', 'img0.PNG', 2000, '2022-11-23 21:24:45', '1', 202727),
(16, 'coconu butter', 5, '	\r\nWellsley Farms organic unrefined virgin coconut oi...', 26, 'butter', 'img890.PNG', '03.jpg', 'creamed-coconut.jpg', 2350, '2022-11-25 09:05:14', '1', 245685),
(17, 'coconu butter', 5, '	\r\nWellsley Farms organic unrefined virgin coconut oi...', 26, 'butter', 'img890.PNG', '03.jpg', 'creamed-coconut.jpg', 2350, '2022-11-25 09:05:19', '1', 245685),
(22, 'chocolate biscuit', 3, 'Coconut biscuits are ready to eat snack products p...', 28, 'biscuits. coconut', 'img0.PNG', 'img5.PNG', 'Capture.PNG', 250, '2022-11-25 19:51:12', '1', 253251);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL,
  `brand_description` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`, `brand_description`, `company_name`) VALUES
(3, 'sanmik foods', 'Established in 2007, Sanmik is proudly Australian owned and possesses a wealth of experience in supp', 'SANMIK FOOD PVT LTD'),
(4, 'silver mill', 'n 1913 young Anthony Silva arrived in Giriulla, and little did he know that he will start one of the', 'SILVERMILL NATURAL BEVERAGES PVT LTD'),
(5, 'kap', 'KAP is one of the most technologically advanced, organic coconut-based product manufacturers in Sri ', 'KANDETIYA AGRO PRODUCTS PVT LTD'),
(6, 'renuka foods', 'RENUKA HOLDINGS PLC is a diversified conglomerate listed on the Colombo Stock Exchange. It is the ho', 'RENUKA AGRI FOODS PLC'),
(8, 'cocomate', 'NDC Exports (pvt) Ltd is a leading manufacturer and exporter and established as a recognized company', 'NDC EXPORTS PVT LTD'),
(9, 'AFGO', 'The company is a planter, manufacturer, processor, local supplier and exporter of Organic based Ceyl', 'AFGO International Pvt. Limited'),
(10, 'nutrikokos', 'Asian Agro Products (Pvt) Ltd is a family owned business of supplying Coconut kernel based products ', 'ASIAN AGRO PRODUCTS (PVT) LTD'),
(13, 'cococna', 'afsfafas', ' cococnaAGRI FOODS PLC'),
(14, 'cocobana', 'asdsdas asasdas', 'cocobana EXPORTS PVT LTD'),
(26, 'abc brand', 'Admin can view company statics,user orders and user details here .', 'RENUKA AGRI FOODS PLC'),
(27, 'abc234 brand', 'Admin can view company statics,user orders and user details here .', 'NESTLE LANKA PLC'),
(28, 'cocona brands', 'Coconut biscuits are ready to eat snack products p...', 'NESTLE LANKA PLC'),
(29, 'coconut flour', 'Coconut biscuits are ready to eat snack products p...', 'renuka foods'),
(30, 'coco flour', 'Admin can add, edit or delete company products,', 'renuka foods'),
(33, 'cvb flour', 'af afaf hgs afgy eha gdgs ', 'renuka foods');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_biproductID` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Biproduct_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catergory_id` int(11) NOT NULL,
  `catergory_name` varchar(100) NOT NULL,
  `category_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catergory_id`, `catergory_name`, `category_description`) VALUES
(3, 'Coconut Biscuits', 'Coconut biscuits are ready to eat snack products prepared from maida and coconut powder. It can be prepared in different varieties through addition of cocoa, butter; ginger etc. The product has a shelf life of three months under ambient conditions. It is mainly consumed as a snack item. Coconut biscuits are highly nutritious and delicious with low calories and high fiber content and is one of the healthiest snack items which is quite popular and is in great demand in Asia and Pacific countries, USA, European countries, Middle East and African countries.'),
(5, 'Coconut Shell Powder', 'Coconut shells free from contamination of coir pith, etc., are broken into small pieces and fed into a pulveriser. The powder from the pulveriser is fed into a cyclone and the parallel product is collected in bag filters. The shell powder is then fed into a vibrating sieving machine and packed according to mesh size requirements for various end uses. The rejects from the sieving machine can be recycled in the pulverizer for size reduction. The main requirements for consistent good quality of coconut shell powder are proper selection of shell of proper stage of maturity and efficient machinery.'),
(15, 'coconut milk', 'Mostly known for its wide use in the preparation of food, coconut milk from Sri Lanka is a product of the coconut kernel that enjoys a high demand in the world market. Coconut milk is produced by pressing grated fresh coconut kernel to extract its white concentrated liquid with a creamy flavor and tropical aroma.\r\n\r\nCoconut milk is available in undiluted and diluted form in the market and is available in liquid, skimmed and spray dried powder form. Coconut skimmed milk is made by separating the fat from the extracted coconut milk through centrifugal separation. Skimmed milk is a good source of quality protein suitable for the preparation of many useful food products.\r\n\r\nAlthough traditionally used in cooking, with the current global trends such as vegan & Gluten-free and Soy-free foods coconut milk has gained recent popularity as a substitute for dairy milk. Accordingly, today a wide range of flavored and unflavored drinking coconut milk is being manufactured and exported from Sri Lank'),
(16, 'coconut butter', 'Coconut butter is made by grinding up white coconut meat. Coconut butter does not share the same smoothness as other dairy ingredients, or fruit-based butter types. It contains small flakes of ground coconut meat. The product contains a lot of nutrients that support its consumers with their good health.\r\n\r\nSimilar to coconut oil, coconut butter is known for aiding weight loss, boosting immunity, and many more but unlike coconut oil, it also contains higher amounts of saturated fat and dietary fiber.'),
(17, 'coconut flour', 'Coconut flour is made from dried and ground coconut kernel and is mostly produced as a by-product of coconut milk production.\r\n\r\nFree of Gluten, coconut flour is a white or off-white flour commonly used in the food industry as a substitute for wheat flour. Since coconut flour is thicker than wheat flour and retains more liquid recipes has to be adjusted when producing food products with coconut flour for specialized diet requirements.\r\n\r\nDespite its anomalies, coconut flour has more fat, protein, and fibre. Iron is the primary mineral present in coconut flour, making it a good source of iron for people on vegan or vegetarian diets.');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip_address` varchar(100) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_username`, `user_email`, `user_password`, `user_image`, `user_ip_address`, `user_mobile`, `user_address`) VALUES
(1, ' kenuka', 'kenukadeco@gmail.com', '$2y$10$WPJKKNHRYHz/R1tTx9U/xup5gfpIc2Baog91Ua2XLs.qJfhABv8Oi', 'boris-m-_CiyeM2kvqs-unsplash.jpg', '::1', '0704455482', 'colombo4'),
(7, ' naruto', 'naruto@gmail.com', '$2y$10$yKHooB3X9xcpM5ip0M3ycekPTjqhNmiW3V0CCmdldNdv3CERqNnxW', 'img1.jpg', '::2', '0702136542', 'colombo7');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `BiproductID` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `BiproductID`, `Quantity`, `order_date`, `order_status`) VALUES
(3, 1, 300, 716088942, 10, 3, '2022-11-25 12:31:25', 'pending'),
(4, 1, 5000, 716088942, 14, 10, '2022-11-25 12:31:25', 'pending'),
(14, 1, 3500, 285971222, 2, 7, '2022-11-25 19:48:10', 'pending'),
(15, 1, 450, 47890382, 6, 3, '2022-11-25 19:48:34', 'pending'),
(16, 1, 2000, 1644996822, 22, 8, '2022-11-25 19:51:34', 'pending'),
(17, 1, 500, 764708702, 2, 1, '2022-11-26 07:59:40', 'pending'),
(20, 1, 500, 295627938, 2, 1, '2022-11-26 14:24:48', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `biproducts`
--
ALTER TABLE `biproducts`
  ADD PRIMARY KEY (`Biproduct_id`) USING BTREE;

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_biproductID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catergory_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biproducts`
--
ALTER TABLE `biproducts`
  MODIFY `Biproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_biproductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catergory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
