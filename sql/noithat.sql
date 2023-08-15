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

INSERT INTO `orders` (`id`, `user_id`, `email`, `name`, `phone`, `address`, `total`, `pay_method`, `status`, `created_at`, `updated_at`, `confirmed_at`, `shipped_at`, `delivered_at`, `cancelled_at`) VALUES
(1, 2, 'ngoclan123@gmail.com', 'Phạm Ngọc Lan', '(84) 325-933-9645', 'Hà Nội', 68240000, 'COD', -1, '2023-08-06 21:00:43', '2023-08-06 14:04:07', NULL, NULL, NULL, '2023-08-06 07:04:07'),
(2, 3, 'thuphuong123@gmail.com', 'Thu Phương', '(84) 325-933-9645', 'Hà Nội', 22490000, 'Credit Card', 1, '2023-08-07 10:00:00', '2023-08-07 10:00:00', NULL, NULL, NULL, NULL),
(3, 7, 'hoai.pham@gmail.com', 'Phạm Hoài', '(84) 123-456-789', 'Hà Nội', 5100000, 'COD', 3, '2023-08-07 12:00:00', '2023-08-07 12:00:00', '2023-08-07 13:00:00', '2023-08-07 14:00:00', NULL, NULL),
(4, 9, 'xvt@gmail.com', 'Vũ Thị Xuân', '+1 (111) 222-3333', 'Hà Nội', 41630000, 'Credit Card', 4, '2023-08-07 13:00:00', '2023-08-07 13:00:00', '2023-08-07 14:00:00', '2023-08-07 15:00:00', '2023-08-07 16:00:00', NULL),
(5, 10, 'huy.trinh@gmail.com', 'Trịnh Quốc Huy', '+1 (444) 555-6666', 'Hà Nội', 16390000, 'PayPal', 1, '2023-08-07 14:00:00', '2023-08-07 14:00:00', NULL, NULL, NULL, NULL),
(6, 5, 'viethoang123@gmail.com', 'Việt Hoàng', '(84) 777-888-9999', 'Hà Nội', 16114000, 'COD', 2, '2023-08-07 15:00:00', '2023-08-07 15:00:00', '2023-08-07 16:00:00', NULL, NULL, NULL),
(7, 4, 'quangtruong123@gmail.com', 'Quang Trường', '(84) 999-888-7777', 'Hà Nội', 5100000, 'Credit Card', 3, '2023-08-07 16:00:00', '2023-08-07 16:00:00', '2023-08-07 17:00:00', '2023-08-07 18:00:00', NULL, NULL),
(8, 1, 'hoa48@gmail.com', 'Mai Hoa', '(84) 222 111-0000', 'Hà Nội', 12000000, 'COD', 4, '2023-08-07 17:00:00', '2023-08-07 17:00:00', '2023-08-07 18:00:00', '2023-08-07 19:00:00', '2023-08-07 20:00:00', NULL),
(9, 9, 'xvt@gmail.com', 'Vũ Thị Xuân', '+1 (333) 444-5555', '707 Pine St, Beach', 250000000, 'COD', 1, '2023-08-07 18:00:00', '2023-08-07 18:00:00', NULL, NULL, NULL, NULL),
(10, 8, 'dvc@gmail.com', 'Đinh Văn Công', '+1 (555) 444-3333', 'Hà Nội', 7000000, 'Cash', 2, '2023-08-07 19:00:00', '2023-08-07 19:00:00', '2023-08-07 20:00:00', NULL, NULL, NULL);

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

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 68240000, 'brown', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(2, 2, 3, 1, 22490000, 'green', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(3, 3, 6, 2, 19540000, 'yellow', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(4, 4, 7, 1, 41630000, 'nature', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(5, 5, 8, 3, 16390000, 'black', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(6, 6, 2, 1, 16114000, 'brown', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(7, 7, 4, 1, 5100000, 'beige', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(8, 8, 8, 2, 16390000, 'white', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(9, 9, 9, 1, 31290000, 'brown', '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(10, 10, 10, 3, 44970000, 'white', '2023-08-06 21:00:43', '2023-08-06 21:00:43');

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


INSERT INTO `products` (`id`, `category_id`, `active`, `name`, `description`, `quantity`, `price`, `thumbnail`, `colors`, `avg_rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sofa Coastal 1 chỗ vải vàng', '<p>Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic</p>', 1, 15900000, '3.jpg', 'yellow', 4, '2023-08-04 14:39:34', '2023-08-04 14:39:34'),
(2, 1, 0, 'Sofa limited dura góc phải + gối da cognac', '<p></p>', 111, 161140000, '2.jpg', 'Brown', NULL, '2023-08-06 06:02:48', '2023-08-06 06:02:48'),
(3, 1, 1, 'Armchair Paradise', '<p>Nhờ phần vải bọc được lấy cảm hứng từ những khu vườn thiên đường nhiệt đới đầy hoa lá và tràn ngập sức sống, armchair Paradise sẽ mang lại cho phòng khách làn gió mới mẻ và tươi mát thật như tên gọi của nó.</p>', 1, 22490000, '1.jpg', 'green', 4, '2023-08-06 07:42:16', '2023-08-06 07:42:16'),
(4, 2, 1, 'Bàn bên Ringar hoa hồng lớn', '<p></p>', 2, 5100000, '5.jpg', 'beige', NULL, '2023-08-06 12:37:35', '2023-08-06 12:37:35'),
(5, 2, 1, 'Bàn nước bar 200×75 75167K', '<p>Chưa có bài viết </p>', 3, 68240000, 'thumbnail6.jpg', 'brown', 4.5, '2023-08-04 14:39:34', '2023-08-04 14:39:34'),
(6, 2, 1, 'Console Mirror Curve Art 84839K', '<p></p>', 5, 19540000, 'thumbnail2.jpg', 'yellow, brown', 3.8, '2023-08-06 06:02:48', '2023-08-06 06:02:48'),
(7, 4, 1, 'Tủ tivi Bridge Gỗ 1m5 – Màu Tự nhiên', '<p>Từng đường nét bo tròn và xử lý tinh tế tạo nên một sản phẩm hoàn hảo cho không gian phòng khách.</p>', 2, 41630000, 'thumbnail3.jpg', 'Brown, Nature', 4.2, '2023-08-06 07:42:16', '2023-08-06 07:42:16'),
(8, 4, 1, 'Kệ kim loại đen 6 tầng', '<p></p>', 8, 16390000, 'thumbnail4.jpg', 'black, white', 3.5, '2023-08-06 12:37:35', '2023-08-06 12:37:35'),
(9, 3, 1, 'Giường ngủ Miami 1m8 bọc vải Dolce 150', '<p>Nhờ vào tone ấm của gỗ, giường Miami mang đến một sự hài hòa, đặc trưng của phong cách nội thất Bắc Âu.</p>', 6, 31290000, 'thumbnail5.jpg', 'brown, yellow', 4.1, '2023-08-06 14:20:20', '2023-08-06 14:20:20'),
(10, 5, 1, 'Bàn ăn Peak hiện đại mặt Ceramic vân mây', '<p>Mặt Ceramic có khả năng chịu nhiệt tốt với họa tiết vân mây tinh xảo tạo cảm giác vừa vững chắc, vừa uyển chuyển.</p>', 4, 44970000, 'thumbnail6.jpg', 'white', 4, '2023-08-06 15:30:45', '2023-08-06 15:30:45'),
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

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `content`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, 'Xuất sắc!', 1, '2023-08-06 21:00:43', '2023-08-06 21:00:43'),
(2, 2, 3, 5, 'Tuyệt vời!', 1, '2023-08-05 09:17:38', '2023-08-05 21:20:37'),
(3, 2, 3, 3, 'hehee', 1, '2023-08-05 09:17:52', '2023-08-05 22:31:32'),
(4, 2, 3, 1, 'tệ', 0, '2023-08-05 10:11:41', '2023-08-05 22:32:44'),
(5, 2, 3, 5, 'đẹp', 0, '2023-08-06 03:24:53', '2023-08-05 21:15:35'),
(6, 3, 5, 5, 'Wonderfull!', 1, '2023-08-06 08:00:00', '2023-08-06 08:00:00'),
(7, 4, 6, 4, 'Magnificent!', 1, '2023-08-06 09:00:00', '2023-08-06 09:00:00'),
(8, 5, 7, 5, 'Significant!', 1, '2023-08-06 10:00:00', '2023-08-06 10:00:00'),
(9, 6, 8, 3, 'World class', 0, '2023-08-06 11:00:00', '2023-08-06 11:00:00'),
(10, 7, 9, 1, 'Tệ', 0, '2023-08-06 12:00:00', '2023-08-06 12:00:00');


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

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mai Hoa', 'hoa48@gmail.com', '12345678', '2023-08-03 00:01:41', '2023-08-03 00:01:41'),
(2, 'Phạm Ngọc Lan', 'ngoclan123@gmail.com', '12345678', '2023-08-03 22:19:13', '2023-08-03 22:19:13'),
(3, 'Thu Phương', 'thuphuong123@gmail.com', '12345678', '2023-08-07 10:00:00', '2023-08-07 10:00:00'),
(4, 'Quang Trường', 'quangtruong123@gmail.com', '12345678', '2023-08-07 11:00:00', '2023-08-07 11:00:00'),
(5, 'Việt Hoàng', 'viethoang123@gmail.com', '12345678', '2023-08-07 12:00:00', '2023-08-07 12:00:00'),
(6, 'Trương Minh', 'tmtruong@gmail.com', '12345678', '2023-08-07 13:00:00', '2023-08-07 13:00:00'),
(7, 'Phạm Hoài', 'hoai.pham@gmail.com', '12345678', '2023-08-07 14:00:00', '2023-08-07 14:00:00'),
(8, 'Đinh Văn Công', 'dvc@gmail.com', '12345678', '2023-08-07 15:00:00', '2023-08-07 15:00:00'),
(9, 'Vũ Thị Xuân', 'xvt@gmail.com', '12345678', '2023-08-07 16:00:00', '2023-08-07 16:00:00'),
(10, 'Trịnh Quốc Huy', 'huy.trinh@gmail.com', '12345678', '2023-08-07 17:00:00', '2023-08-07 17:00:00');


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
