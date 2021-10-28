SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `p_tok` text COLLATE utf32_bin NOT NULL,
  `cart_tok` text COLLATE utf32_bin NOT NULL,
  `showsizes` tinyint(4) NOT NULL,
  `title` varchar(100) COLLATE utf32_bin NOT NULL,
  `product_badge` varchar(100) COLLATE utf32_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `sizes` text COLLATE utf32_bin NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` varchar(100) COLLATE utf32_bin NOT NULL,
  `total` bigint(20) NOT NULL,
  `image1` varchar(100) COLLATE utf32_bin NOT NULL,
  `image2` varchar(100) COLLATE utf32_bin NOT NULL,
  `image3` varchar(100) COLLATE utf32_bin NOT NULL,
  `user_ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `published` tinyint(2) NOT NULL,
  `name` varchar(100) COLLATE utf32_bin NOT NULL,
  `description` text COLLATE utf32_bin NOT NULL,
  `token` text COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `published`, `name`, `description`, `token`, `created_at`) VALUES
(1, 1, 'hoodie', 'excellentcollection', 'cfff736cfbf463ab2bb9', '2021-03-04 18:14:08'),
(2, 1, 'sneakers', 'passionforfashion', '85a765f909860a42453c', '2021-03-05 11:09:40'),
(3, 1, 'furnitures', 'beautifyingyourhomeisthebest', '2a93239c517ff6f4f242', '2021-03-05 11:13:20'),
(4, 1, 'magazine', 'showtheworldyourskills', 'b17783d463dd94280039', '2021-03-05 11:17:11'),
(5, 1, 'footwear', 'footwears', 'c696f1f657b69b07b64a', '2021-03-05 11:22:07'),
(6, 1, 'underwears', 'beclean', '12ea431c28c9b7822bb0', '2021-03-05 11:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `subscribe` tinyint(2) NOT NULL,
  `firstName` varchar(100) COLLATE utf32_bin NOT NULL,
  `email` varchar(150) COLLATE utf32_bin NOT NULL,
  `subject` varchar(255) COLLATE utf32_bin NOT NULL,
  `message` text COLLATE utf32_bin NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `saveinfo` tinyint(2) NOT NULL,
  `paid` tinyint(2) NOT NULL,
  `pending` tinyint(2) NOT NULL,
  `inputcount` tinyint(4) NOT NULL,
  `firstname_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `lastname_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `email_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `country_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `town_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `state_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `telephone_invoice` varchar(100) COLLATE utf32_bin NOT NULL,
  `company_invoice` text COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `address_invoice` text COLLATE utf32_bin NOT NULL,
  `firstname_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `lastname_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `email_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `company_shipping` text COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `country_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `state_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `town_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `address_shipping` text COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `telephone_shipping` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `user_ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL,
  `cart_token` text COLLATE utf32_bin NOT NULL,
  `paid_token` text COLLATE utf32_bin NOT NULL,
  `cart_code` text COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `authorised` tinyint(4) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `showsizes` tinyint(4) NOT NULL,
  `checksizeint` tinyint(4) NOT NULL,
  `checksizestring` tinyint(4) NOT NULL,
  `p_tok` text COLLATE utf32_bin NOT NULL,
  `sku` tinyint(20) NOT NULL,
  `title` varchar(255) COLLATE utf32_bin NOT NULL,
  `product_badge` varchar(255) COLLATE utf32_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `sizes` text COLLATE utf32_bin NOT NULL,
  `discount` int(11) NOT NULL,
  `tags` varchar(255) COLLATE utf32_bin NOT NULL,
  `body` text COLLATE utf32_bin NOT NULL,
  `image1` varchar(100) COLLATE utf32_bin NOT NULL,
  `image2` varchar(100) COLLATE utf32_bin NOT NULL,
  `image3` varchar(100) COLLATE utf32_bin NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `published`, `authorised`, `category_id`, `showsizes`, `checksizeint`, `checksizestring`, `p_tok`, `sku`, `title`, `product_badge`, `amount`, `sizes`, `discount`, `tags`, `body`, `image1`, `image2`, `image3`, `created`) VALUES
(1, 1, 1, 1, 1, 0, 1, '3b51cdf2529995307e7c39e4b4412e', 127, 'Grey Pendant Bell Lamp', 'sale', 5000, 'SM,M,LG,XLG,XSM', 0, 'Hoodie,Beautiful,Lovely,Best', '&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp;&amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614937744-165520426274594062.jpg', 'SI_1614938114-758197766080207365.jpg', 'SI_1614938119-793952349376136865.jpg', '2021-03-05 10:57:18'),
(2, 1, 1, 2, 1, 1, 0, '33d2336d0492887f77cbc2e67153c7', 127, 'Peach Low Curve Iceman Trimix Sneakers', 'fresh', 1000, '67,58,24,97', 0, 'Sneakers,Footwears,Perfect', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614941482-484496788358143711.jpg', 'SI_1614941486-102246909910458520.jpg', 'SI_1614941493-215614591062973133.jpg', '2021-03-05 11:11:31'),
(3, 1, 1, 3, 0, 0, 0, 'fc43209116a98f98d20bf37e000650', 127, 'Dark Stained NY11 Dining Chair', 'stock', 30000, 'empty', 0, 'Furnitures,Home,Beauty', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614939275-135932652171671248.jpg', 'SI_1614939281-826502960122100099.jpg', 'SI_1614939286-415296347670790060.jpg', '2021-03-05 11:14:49'),
(4, 1, 1, 4, 1, 1, 0, '1690910646f2b555fcd198ad90c53b', 127, 'Red Analog Magazine Rack', 'sale', 20000, '47,85,22,58,27,29,94,63,11', 0, 'Magazine,World,Fashion,Beautify', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614939588-957868602701175449.jpg', 'SI_1614939597-356011444075287430.jpg', 'SI_1614939614-835600922146224364.jpg', '2021-03-05 11:20:18'),
(5, 1, 1, 5, 1, 1, 0, 'b3092bbf2ede0801252b57d33562fd', 127, 'Black Chadwick Sandals', 'stock', 7000, '19,42,22,92,35,74,57,84', 0, 'Footwears,Beautify,Sandals,Fashion', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614939955-613515342346059643.jpg', 'SI_1614939964-963754615886278000.jpg', 'SI_1614939980-547434108835006751.jpg', '2021-03-05 11:26:35'),
(6, 1, 1, 6, 1, 0, 1, 'a1aee936898228d0f3cabf0eab03a8', 127, 'Fawn Cotton Underwear', 'empty', 2000, 'SM,M,LG,XSM,XLG', 0, 'underwears,Beauty', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'SI_1614940369-874059315493643188.jpg', 'SI_1614940380-770817075525439321.jpg', 'SI_1614940385-434090161902206503.jpg', '2021-03-05 11:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_token` text COLLATE utf32_bin NOT NULL,
  `approval` tinyint(2) NOT NULL,
  `approved` tinyint(2) NOT NULL,
  `reviewname` varchar(100) COLLATE utf32_bin NOT NULL,
  `reviewemail` varchar(100) COLLATE utf32_bin NOT NULL,
  `reviewrating` int(6) NOT NULL,
  `reviewtext` text COLLATE utf32_bin NOT NULL,
  `ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `paid` tinyint(2) NOT NULL,
  `verified` tinyint(2) NOT NULL,
  `progress` tinyint(2) NOT NULL,
  `cancelled` tinyint(2) NOT NULL,
  `status` varchar(20) COLLATE utf32_bin NOT NULL,
  `order_code` text COLLATE utf32_bin NOT NULL,
  `customer_code` text COLLATE utf32_bin NOT NULL,
  `ch` varchar(100) COLLATE utf32_bin NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `paid_at` text COLLATE utf32_bin NOT NULL,
  `carts` text COLLATE utf32_bin NOT NULL,
  `first_name` varchar(100) COLLATE utf32_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf32_bin NOT NULL,
  `email` varchar(100) COLLATE utf32_bin NOT NULL,
  `phone_number` varchar(100) COLLATE utf32_bin NOT NULL,
  `address` text COLLATE utf32_bin NOT NULL,
  `city` varchar(100) COLLATE utf32_bin NOT NULL,
  `state` varchar(100) COLLATE utf32_bin NOT NULL,
  `zip_code` bigint(20) NOT NULL,
  `company` text COLLATE utf32_bin NOT NULL,
  `country` varchar(100) COLLATE utf32_bin NOT NULL,
  `user_ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `transaction_token` text COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `terms` tinyint(4) NOT NULL,
  `subscribe` tinyint(4) NOT NULL,
  `firstname` varchar(100) COLLATE utf32_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf32_bin NOT NULL,
  `username` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `email` varchar(150) COLLATE utf32_bin NOT NULL,
  `address` text COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `state` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `country` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `company` text COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `phone_number` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `city` varchar(100) COLLATE utf32_bin NOT NULL DEFAULT 'empty',
  `zip_code` bigint(20) NOT NULL,
  `password` text COLLATE utf32_bin NOT NULL,
  `ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `auth` text COLLATE utf32_bin NOT NULL,
  `token` text COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `p_tok` text COLLATE utf32_bin NOT NULL,
  `wish_tok` text COLLATE utf32_bin NOT NULL,
  `title` varchar(100) COLLATE utf32_bin NOT NULL,
  `product_badge` varchar(100) COLLATE utf32_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `sizes` text COLLATE utf32_bin NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` varchar(100) COLLATE utf32_bin NOT NULL,
  `total` bigint(20) NOT NULL,
  `image1` text COLLATE utf32_bin NOT NULL,
  `image2` text COLLATE utf32_bin NOT NULL,
  `image3` text COLLATE utf32_bin NOT NULL,
  `user_ip` varchar(50) COLLATE utf32_bin NOT NULL,
  `device` varchar(50) COLLATE utf32_bin NOT NULL,
  `os` varchar(50) COLLATE utf32_bin NOT NULL,
  `browser` varchar(50) COLLATE utf32_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
