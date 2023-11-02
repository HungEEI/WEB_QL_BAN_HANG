-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 04:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ismart`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(120) NOT NULL,
  `image_name` varchar(120) NOT NULL,
  `image_size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_title` varchar(120) NOT NULL,
  `page_slug` varchar(120) NOT NULL,
  `page_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `page_title`, `page_slug`, `page_content`, `created_at`, `updated_at`) VALUES
(13, 1, 'Giới Thiệu', 'gioi-thieu', '<p><strong>1. Về ch&uacute;ng t&ocirc;i :</strong></p>\r\n\r\n<p>Trong những năm qua, x&atilde; hội ph&aacute;t triển, kinh tế tăng trưởng đồng thời l&agrave; chất lượng cuộc sống của người d&acirc;n ng&agrave;y c&agrave;ng được n&acirc;ng cao nhiều trung t&acirc;m thương mại, nh&agrave; cao tầng, biệt thự được mọc ra k&egrave;m theo đấy l&agrave; nhu cầu mua sắm c&aacute;c thiết bị phục vụ nhu cầu cuộc sống h&agrave;ng ng&agrave;y như TV, Tủ lạnh, Điện gia dụng....</p>\r\n\r\n<p>Sự kiện ng&agrave;y 25 th&aacute;ng 09 năm 2003. Si&ecirc;u thị điện m&aacute;y Eco Shop ch&iacute;nh thức tham gia v&agrave;o lĩnh vực kinh doanh b&aacute;n lẻ điện m&aacute;y, tạo ra một phong c&aacute;ch mua sắm ho&agrave;n to&agrave;n mới với người d&acirc;n th&agrave;nh thị , th&ocirc;ng qua c&aacute;c sản phẩm v&agrave; dịch vụ tới người ti&ecirc;u d&ugrave;ng. ph&aacute;t huy quyền chủ động hội nhập của c&aacute;c doanh nghiệp,được vị tr&iacute; tr&ecirc;n thị trường v&agrave; t&acirc;m tr&iacute; người ti&ecirc;u d&ugrave;ng, khẳng định sự ph&aacute;t triển ổn định.</p>\r\n\r\n<p><strong>2. Những thế mạnh v&agrave; định hướng của c&ocirc;ng ty :</strong></p>\r\n\r\n<p>Với kim chỉ nam l&agrave; &ldquo; Lu&ocirc;n mang niềm vui tới mọi nh&agrave; &rdquo;, Si&ecirc;u thị điện m&aacute;y đ&atilde; quy tụ được Ban L&atilde;nh đạo c&oacute; bề d&agrave;y kinh nghiệm trong c&aacute;c lĩnh vực điện m&aacute;y kh&ocirc;ng chỉ mạnh về kinh doanh m&agrave; c&ograve;n mạnh về c&ocirc;ng nghệ c&oacute; nhiều tiềm năng ph&aacute;t triển, kết hợp với đội ngũ nh&acirc;n vi&ecirc;n trẻ, năng động v&agrave; chuy&ecirc;n nghiệp tạo n&ecirc;n thế mạnh n&ograve;ng cốt của c&ocirc;ng ty để thực hiện tốt c&aacute;c mục ti&ecirc;u đề ra.</p>\r\n\r\n<p>Hơn nữa, tr&ecirc;n cơ sở nguồn lực của c&ocirc;ng ty v&agrave; nhu cầu của x&atilde; hội, Si&ecirc;u thị điện m&aacute;y lựa chọn ph&aacute;t triển kinh doanh c&aacute;c sản phẩm Điện m&aacute;y, c&aacute;c sản phẩm c&ocirc;ng nghệ ...phục vụ nhu cầu thiết yếu của người d&acirc;n với c&aacute;c sản phẩm đa dạng phong ph&uacute; mang lại gi&aacute; trị gia tăng cho người ti&ecirc;u d&ugrave;ng th&ocirc;ng qua c&aacute;c dịch vụ sau b&aacute;n h&agrave;ng.</p>\r\n\r\n<p><strong>3. Những cam kết của c&ocirc;ng ty :</strong></p>\r\n\r\n<p>Cam kết với đối t&aacute;c: Trở th&agrave;nh đối t&aacute;c chiến lược tr&ecirc;n cơ sở &quot; Hợp t&aacute;c ph&aacute;t triển bền vững &quot; hợp t&aacute;c to&agrave;n diện l&acirc;u d&agrave;i</p>\r\n\r\n<p>Cam kết với kh&aacute;ch h&agrave;ng : Lu&ocirc;n lu&ocirc;n l&agrave;m kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng về c&aacute;c sản phẩm v&agrave; dịch vụ do Si&ecirc;u thị điện m&aacute;y cung cấp. Sự th&agrave;nh c&ocirc;ng h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng l&agrave; thước đo uy t&iacute;n hiệu quả của doanh nghiệp</p>\r\n\r\n<p><strong>4. Những mục ti&ecirc;u tương lai :</strong></p>\r\n\r\n<p>Đ&oacute;n đ&acirc;̀u v&agrave; ph&aacute;t huy lợi thế từ mọi cơ h&ocirc;̣i, Si&ecirc;u thị điện m&aacute;y kh&ocirc;ng ngừng nghi&ecirc;n cứu, ph&aacute;t tri&ecirc;̉n th&ecirc;m c&aacute;c sản phẩm, dịch vụ gia tăng đ&aacute;p ứng hi&ecirc;̣u quả mọi nhu cầu của kh&aacute;ch h&agrave;ng như b&aacute;n h&agrave;ng Online, b&aacute;n h&agrave;ng qua điện thoại, d&ugrave;ng thử trước khi mua, tăng thời gian bảo h&agrave;nh, b&aacute;n h&agrave;ng trả g&oacute;p.. C&ugrave;ng với sự đa dạng h&oacute;a sản ph&acirc;̉m dịch vụ, Si&ecirc;u thị điện m&aacute;y cũng đ&atilde; ho&agrave;n thi&ecirc;̣n những quy tr&igrave;nh quản trị, quy tr&igrave;nh điều h&agrave;nh, quản l&yacute; rủi ro, kh&ocirc;ng ngừng nghi&ecirc;n cứu, học hỏi từ những m&ocirc; h&igrave;nh Điện m&aacute;y th&agrave;nh c&ocirc;ng tr&ecirc;n thế giới để &aacute;p dụng m&ocirc;̣t c&aacute;ch s&aacute;ng tạo, khoa học v&agrave;o kinh doanh của Si&ecirc;u thị điện m&aacute;y đảm bảo hi&ecirc;̣u quả cũng như sự ph&aacute;t triển bền vững cả trong hi&ecirc;̣n tại l&acirc;̃n tương lai...</p>\r\n\r\n<p>Sự đầu tư chiến lược trong ho&agrave;n cảnh kh&oacute; khăn hiện nay sẽ l&agrave; nh&acirc;n tố ph&acirc;n biệt với c&aacute;c Si&ecirc;u thị điện m&aacute;y kh&aacute;c v&agrave; tạo ra bước ngoặt trong sự ph&aacute;t triển của trong những năm sắp tới. Nếu như v&agrave;i năm trước, kh&ocirc;ng c&oacute; nhiều người tin rằng sẽ trở th&agrave;nh một trong những Si&ecirc;u thị điện m&aacute;y h&agrave;ng đầu về chất lượng, phục vụ th&igrave; giờ đ&acirc;y đ&oacute; l&agrave; điều được mọi người phải thừa nhận v&agrave; như th&ecirc;́ vững tin chỉ v&agrave;i năm tới, kh&aacute;t vọng đưa &quot; Si&ecirc;u thị điện m&aacute;y c&oacute; chất lượng phục vụ tốt nhất tại miền bắc sẽ kh&ocirc;ng c&ograve;n l&agrave; mục ti&ecirc;u xa vời.</p>\r\n', '2023-10-18 16:10:10', '2023-10-18 16:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `post_title` varchar(120) DEFAULT NULL,
  `post_slug` varchar(120) DEFAULT NULL,
  `post_except` varchar(200) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `post_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(120) DEFAULT NULL,
  `category_slug` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`post_category_id`, `user_id`, `parent_id`, `category_name`, `category_slug`, `created_at`) VALUES
(51, 1, 0, 'Công nghệ', 'cong-nghe', '2023-10-28 15:39:44'),
(52, 1, 51, 'Điện thoại', 'dien-thoai', '2023-10-29 09:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(120) DEFAULT NULL,
  `product_slug` varchar(120) NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_discount` int(12) NOT NULL,
  `stock_quantity` int(12) NOT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `product_detail` text DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `product_category_id`, `product_code`, `product_name`, `product_slug`, `product_price`, `product_discount`, `stock_quantity`, `product_desc`, `product_detail`, `is_featured`, `created_at`, `updated_at`) VALUES
(2, 1, 7, 0, 'Iphone 15', 'iphone-15', 24000000, 22000000, 0, '<p>iphone tr&ugrave;m</p>\r\n', '<p>iphone ok</p>\r\n', 1, '2023-10-29 15:10:48', '2023-10-29 15:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(120) DEFAULT NULL,
  `category_slug` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `user_id`, `parent_id`, `category_name`, `category_slug`, `created_at`) VALUES
(3, 1, 0, 'Điện thoại', 'dien-thoai', '2023-10-29 14:03:33'),
(4, 1, 0, 'Laptop', 'lap-top', '2023-10-29 14:03:47'),
(5, 1, 3, 'Iphone', 'i-phone', '2023-10-29 14:04:11'),
(7, 1, 5, 'Iphone 15', 'iphone-15', '2023-10-29 14:04:54'),
(8, 1, 4, 'Acer', 'a-cer', '2023-10-29 14:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Hùng', 'vanhung', 'c2d10e24cd98cb8f8409ef0a9b9e40c5', 'vanhung@gmail.com', '2023-10-18 13:28:05', '2023-10-18 13:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_categoty_id` (`post_category_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`post_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`post_category_id`),
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
