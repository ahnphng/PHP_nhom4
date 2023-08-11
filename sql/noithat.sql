-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:8889
-- Thời gian đã tạo: Th8 07, 2023 lúc 01:36 AM
-- Phiên bản máy phục vụ: 5.7.34
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `noithat`
--
CREATE DATABASE IF NOT EXISTS `noithat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `noithat`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) 
VALUES
(1, 'Phuong Anh', 'phgah1144@gmail.com', '12345678', '2023-03-07 21:01:40', '2023-08-02 16:31:45'),
(2, 'Phuong Chinh', 'luuphuongchinh19@gmail.com', '12345678', '2023-03-07 21:01:40', '2023-08-02 16:31:45'),
(3, 'Mai Yen', 'daoly75921@gmail.com', '12345678', '2023-03-07 21:01:40', '2023-08-02 16:31:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `active`, `created_at`, `updated_at`) 
VALUES
(1, 'Sofa & Armchair', 1, '2023-08-02 21:16:01', '2023-08-02 21:16:01'),
(2, 'Bàn ghế', 1, '2023-08-02 21:07:44', '2023-08-02 16:13:30'),
(3, 'Giường ngủ', 1, '2023-08-02 21:07:44', '2023-08-02 16:13:30'),
(4, 'Tủ và kệ', 1, '2023-08-02 21:07:44', '2023-08-02 16:13:30'),
(5, 'Bếp', 1, '2023-08-02 21:07:44', '2023-08-02 16:13:30'),
(6, 'Hàng trang trí', 1, '2023-08-02 21:07:44', '2023-08-02 16:13:30'),
(7, 'Ngoại thất', 1, '2023-08-02 21:16:01', '2023-08-02 21:16:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1, đơn được tạo\r\n2, đơn đã xác nhận\r\n3, đơn đã được gửi\r\n4, đơn giao thành công\r\n-1, đơn bị huỷ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL
);

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `email`, `name`, `phone`, `address`, `total`, `pay_method`, `status`, `created_at`, `updated_at`, `confirmed_at`, `shipped_at`, `delivered_at`, `cancelled_at`) 
VALUES
(1, 2, 'dypetunad@mailinator.com', 'Rose Peterson', '+1 (978) 933-9645', 'Aut tenetur quas sit est', 100001, 'COD', -1, '2023-08-06 21:00:43', '2023-08-06 14:04:07', NULL, NULL, NULL, '2023-08-06 07:04:07'), 
(2, 3, 'order4@example.com', 'John Doe', '+1 (123) 456-7890', '123 Main St, City', 200000, 'Credit Card', 1, '2023-08-07 10:00:00', '2023-08-07 10:00:00', NULL, NULL, NULL, NULL), 
(3, 7, 'order6@example.com', 'Michael Johnson', '+1 (555) 555-5555', '789 Oak St, Village', 75000, 'COD', 3, '2023-08-07 12:00:00', '2023-08-07 12:00:00', '2023-08-07 13:00:00', '2023-08-07 14:00:00', NULL, NULL), 
(4, 9, 'order7@example.com', 'Emily Brown', '+1 (111) 222-3333', '101 Pine St, Suburb', 300000, 'Credit Card', 4, '2023-08-07 13:00:00', '2023-08-07 13:00:00', '2023-08-07 14:00:00', '2023-08-07 15:00:00', '2023-08-07 16:00:00', NULL), 
(5, 11, 'order8@example.com', 'William Davis', '+1 (444) 555-6666', '202 Maple St, Countryside', 60000, 'PayPal', 1, '2023-08-07 14:00:00', '2023-08-07 14:00:00', NULL, NULL, NULL, NULL), 
(6, 13, 'order9@example.com', 'Linda Wilson', '+1 (777) 888-9999', '303 Birch St, Rural', 180000, 'COD', 2, '2023-08-07 15:00:00', '2023-08-07 15:00:00', '2023-08-07 16:00:00', NULL, NULL, NULL), 
(7, 15, 'order10@example.com', 'David Martinez', '+1 (999) 888-7777', '505 Cedar St, Outskirts', 90000, 'Credit Card', 3, '2023-08-07 16:00:00', '2023-08-07 16:00:00', '2023-08-07 17:00:00', '2023-08-07 18:00:00', NULL, NULL), 
(8, 17, 'order11@example.com', 'Sarah Anderson', '+1 (222) 111-0000', '606 Oak St, Mountains', 120000, 'PayPal', 4, '2023-08-07 17:00:00', '2023-08-07 17:00:00', '2023-08-07 18:00:00', '2023-08-07 19:00:00', '2023-08-07 20:00:00', NULL), 
(9, 19, 'order12@example.com', 'Christopher Taylor', '+1 (333) 444-5555', '707 Pine St, Beach', 250000, 'COD', 1, '2023-08-07 18:00:00', '2023-08-07 18:00:00', NULL, NULL, NULL, NULL), 
(10, 21, 'order13@example.com', 'Amanda White', '+1 (555) 444-3333', '808 Elm St, Desert', 70000, 'Credit Card', 2, '2023-08-07 19:00:00', '2023-08-07 19:00:00', '2023-08-07 20:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color`, `created_at`, `updated_at`) 
VALUES
(1, 1, 5, 1, 1, 'blue', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(2, 2, 3, 1, 100000, 'blue', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(3, 3, 6, 2, 50000, 'red', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(4, 4, 7, 1, 75000, 'green', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(5, 5, 8, 3, 200000, 'blue', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(6, 6, 2, 1, 50000, 'yellow', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(7, 7, 4, 1, 80000, 'green', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(8, 8, 1, 2, 150000, 'red', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(9, 9, 9, 1, 30000, 'blue', '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(10, 10, 10, 3, 100000, 'black', '2023-08-06 21:00:43', '2023-08-06 21:00:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `description` longtext,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` bigint(20) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Đang đổ dữ liệu cho bảng `products`
--


INSERT INTO `products` (`id`, `category_id`, `active`, `name`, `description`, `quantity`, `price`, `thumbnail`, `colors`, `avg_rating`, `created_at`, `updated_at`) 
VALUES
(1,1,1,'sản phẩm 1', '<p>xin chao</p>', 1, 100000, '842b4ed6da10c1d753d48837a463b5ed.jpg', 'blue,red', 4, '2023-08-04 14:39:34', '2023-08-04 14:39:34'),
(2,1,1, '1111', '<p>111</p>', 111, 111, '83eaba25831dee1679b696bf9638137a.jpg', NULL, NULL, '2023-08-06 06:02:48', '2023-08-06 06:02:48'),
(3,1,1,'2', '<p>1</p>', 1, 1, '088fd5a243e1525733ea8403cb1fa0c2.jpg', 'blue,yellow', NULL, '2023-08-06 07:42:16', '2023-08-06 07:42:16'),
(4, 2, 1, '22222', '<p>2</p>', 2, 2, 'ce908ccaf3d320e028efd0eb0791e67a.jpg', 'green', NULL, '2023-08-06 12:37:35', '2023-08-06 12:37:35'),
(5, 2, 1, 'Product 1', '<p>Hello</p>', 3, 50000, 'thumbnail1.jpg', 'blue,red', 4.5, '2023-08-04 14:39:34', '2023-08-04 14:39:34'), 
(6, 3, 1, 'Product 2', '<p>Good product</p>', 5, 75000, 'thumbnail2.jpg', 'green,yellow', 3.8, '2023-08-06 06:02:48', '2023-08-06 06:02:48'), 
(7, 3, 1, 'Product 3', '<p>Test description</p>', 2, 60000, 'thumbnail3.jpg', 'blue', 4.2, '2023-08-06 07:42:16', '2023-08-06 07:42:16'), 
(8, 3, 1, 'Product 4', '<p>Another description</p>', 8, 90000, 'thumbnail4.jpg', 'red,yellow', 3.5, '2023-08-06 12:37:35', '2023-08-06 12:37:35'),
(9, 4, 1, 'Product 5', '<p>Yet another description</p>', 6, 80000, 'thumbnail5.jpg', 'green,blue', 4.1, '2023-08-06 14:20:20', '2023-08-06 14:20:20'), 
(10, 4, 1, 'Product 6', '<p>More descriptions</p>', 4, 70000, 'thumbnail6.jpg', 'yellow', 3.9, '2023-08-06 15:30:45', '2023-08-06 15:30:45'),
(11, 4, 1, 'Product 7', '<p>More descriptions</p>', 7, 85000, 'thumbnail7.jpg', 'blue,green', 4.7, '2023-08-06 18:10:22', '2023-08-06 18:10:22'), 
(12, 4, 1, 'Product 8', '<p>More descriptions</p>', 3, 95000, 'thumbnail8.jpg', 'red', 4.6, '2023-08-06 19:45:11', '2023-08-06 19:45:11'),
(13, 5, 1, 'Product 15', '<p>More descriptions</p>', 3, 67000, 'thumbnail15.jpg', 'red', 3.8, '2023-08-07 04:55:10', '2023-08-07 04:55:10'), 
(14, 6, 1, 'Product 16', '<p>More descriptions</p>', 7, 82000, 'thumbnail16.jpg', 'yellow', 4.6, '2023-08-07 06:10:25', '2023-08-07 06:10:25'), 
(15, 7, 1, 'Product 17', '<p>More descriptions</p>', 5, 75000, 'thumbnail17.jpg', 'blue,green', 3.9, '2023-08-07 07:25:40', '2023-08-07 07:25:40'), 
(16, 6, 1, 'Product 18', '<p>More descriptions</p>', 9, 89000, 'thumbnail18.jpg', 'red', 4.1, '2023-08-07 08:40:55', '2023-08-07 08:40:55'), 
(17, 5, 1, 'Product 19', '<p>More descriptions</p>', 2, 61000, 'thumbnail19.jpg', 'green,blue', 3.5, '2023-08-07 09:55:10', '2023-08-07 09:55:10'), 
(18, 6, 1, 'Product 20', '<p>More descriptions</p>', 6, 84000, 'thumbnail20.jpg', 'yellow', 4.3, '2023-08-07 11:10:25', '2023-08-07 11:10:25'), 
(19, 4, 1, 'Product 21', '<p>More descriptions</p>', 4, 72000, 'thumbnail21.jpg', 'green,red', 3.6, '2023-08-07 12:25:40', '2023-08-07 12:25:40'), 
(20, 7, 1, 'Product 22', '<p>More descriptions</p>', 8, 96000, 'thumbnail22.jpg', 'blue,yellow', 4.2, '2023-08-07 13:40:55', '2023-08-07 13:40:55');



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `content`, `active`, `created_at`, `updated_at`) 
VALUES
(1, 1, 4, 4, 'Great product!', 1, '2023-08-06 21:00:43', '2023-08-06 21:00:43'), 
(2, 2, 3, 5, '123', 1, '2023-08-05 09:17:38', '2023-08-05 21:20:37'), 
(3, 2, 3, 3, 'hehee', 1, '2023-08-05 09:17:52', '2023-08-05 22:31:32'), 
(4, 2, 3, 1, 'tệ', 0, '2023-08-05 10:11:41', '2023-08-05 22:32:44'), 
(5, 2, 3, 5, 'đẹp', 0, '2023-08-06 03:24:53', '2023-08-05 21:15:35'), 
(6, 3, 5, 4, 'Good product!', 1, '2023-08-06 08:00:00', '2023-08-06 08:00:00'), 
(7, 4, 6, 2, 'Not recommended.', 1, '2023-08-06 09:00:00', '2023-08-06 09:00:00'), 
(8, 5, 7, 5, 'Excellent!', 1, '2023-08-06 10:00:00', '2023-08-06 10:00:00'),
(9, 6, 8, 3, 'Average.', 0, '2023-08-06 11:00:00', '2023-08-06 11:00:00'), 
(10, 7, 9, 4, 'Pretty good.', 0, '2023-08-06 12:00:00', '2023-08-06 12:00:00');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) 
VALUES
(1, 'Phương Anh', 'phgah1144@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-08-03 00:01:41', '2023-08-03 00:01:41'),
(2, 'Phương Chinh', 'luuphuongchinh19@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-08-03 22:19:13', '2023-08-03 22:19:13'),
(3, 'Mai Yến', 'daoly75921@example.com', 'e99a18c428cb38d5f260853678922e03', '2023-08-07 10:00:00', '2023-08-07 10:00:00'), 
(4, 'Lê Thị Hoa', 'hoale@example.com', '7c6a180b36896a0a8c02787eeafb0e4c', '2023-08-07 11:00:00', '2023-08-07 11:00:00'), 
(5, 'Nguyễn Văn B', 'bvnguyen@example.com', 'a3b9a48c8ff9d987da5e92b7bd61b6c3', '2023-08-07 12:00:00', '2023-08-07 12:00:00'), 
(6, 'Trương Minh', 'tmtruong@example.com', 'a906449d5769fa7361d7ecc6aa3f6d28', '2023-08-07 13:00:00', '2023-08-07 13:00:00'), 
(7, 'Phạm Hoài', 'hoai.pham@example.com', '7d793037a0760186574b0282f2f435e7', '2023-08-07 14:00:00', '2023-08-07 14:00:00'), 
(8, 'Đinh Văn C', 'dvc@example.com', '9a1158154dfa42caddbd410c39c1d6e0', '2023-08-07 15:00:00', '2023-08-07 15:00:00'), 
(9, 'Vũ Thị D', 'dvt@example.com', '9a1158154dfa42caddbd410c39c1d6e0', '2023-08-07 16:00:00', '2023-08-07 16:00:00'), 
(10, 'Nguyễn Văn E', 'e.nguyen@example.com', '7d793037a0760186574b0282f2f435e7', '2023-08-07 17:00:00', '2023-08-07 17:00:00');


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng 
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
