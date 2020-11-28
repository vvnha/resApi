-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2020 lúc 12:57 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `res`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `cmID` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mess` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime DEFAULT NULL,
  `foodID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`cmID`, `userID`, `userName`, `mess`, `time`, `foodID`, `created_at`, `updated_at`) VALUES
(1, 1, 'Võ Văn Nhã', 'Món này thì ngon', '2020-11-26 10:44:52', 1, NULL, NULL),
(2, 2, 'Trần Văn Quý', 'Món này cũng được', '2020-11-26 10:44:52', 1, NULL, NULL),
(3, 2, 'Trần Văn Quý', 'Món này cũng được, oke', '2020-11-26 10:44:52', 2, '2020-11-27 08:05:01', '2020-11-27 08:05:01'),
(4, 1, 'Võ Văn Nhã', 'Món này thì ngon', '2020-11-26 10:44:52', 1, NULL, NULL),
(5, 2, 'Trần Văn Quý', 'Món này cũng được', '2020-11-26 10:44:52', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `mess` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`contactID`, `userID`, `mess`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Oke la', '2020-11-26 10:44:52', NULL, NULL),
(2, 1, 'Oke ngon', '2020-11-26 10:44:52', NULL, NULL),
(3, 1, 'Oke tam duoc', '2020-11-26 10:44:52', '2020-11-27 08:01:34', '2020-11-27 08:01:34'),
(4, 1, 'Oke la', '2020-11-26 10:44:52', NULL, NULL),
(5, 1, 'Oke ngon', '2020-11-26 10:44:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `foods`
--

CREATE TABLE `foods` (
  `foodID` int(10) UNSIGNED NOT NULL,
  `foodName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(40,2) NOT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `ingres` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `foods`
--

INSERT INTO `foods` (`foodID`, `foodName`, `img`, `price`, `rating`, `hits`, `ingres`, `parentID`, `created_at`, `updated_at`) VALUES
(1, 'Bánh xèo', 'food1.jpg', 200000.00, 4.90, 5, 'Cá, thịt', 1, NULL, NULL),
(2, 'Bánh Canh', 'food2.jpg', 300000.00, 4.90, 5, 'Giá, thịt', 1, NULL, NULL),
(3, 'Banh bao', 'food3.jpg', 200000.00, 4.90, 5, 'Cá, thịt', 1, '2020-11-27 07:54:59', '2020-11-27 07:54:59'),
(4, 'Bánh xèo', 'food1.jpg', 200000.00, 4.90, 5, 'Cá, thịt', 1, NULL, NULL),
(5, 'Bánh Canh', 'food2.jpg', 300000.00, 4.90, 5, 'Giá, thịt', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kindoffoods`
--

CREATE TABLE `kindoffoods` (
  `parentID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kindoffoods`
--

INSERT INTO `kindoffoods` (`parentID`, `name`, `img`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'food', '', '', NULL, NULL),
(2, 'drink', '', '', NULL, NULL),
(3, 'other', '', '', NULL, NULL),
(4, 'food', '', '', NULL, NULL),
(5, 'drink', '', '', NULL, NULL),
(6, 'other', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(276, '2020_11_26_061810_create_food_table', 1),
(277, '2020_11_26_062129_create_kindOfFood_table', 1),
(278, '2020_11_26_062759_create_user_table', 1),
(279, '2020_11_26_063132_create_position_table', 1),
(280, '2020_11_26_063235_create_contact_table', 1),
(281, '2020_11_26_063543_create_comment_table', 1),
(282, '2020_11_26_063814_create_orderTable_table', 1),
(283, '2020_11_26_064135_create_orderDetail_table', 1),
(284, '2020_11_26_082430_update__foods_table', 1),
(285, '2020_11_26_084136_update__orderdetail_table', 1),
(286, '2020_11_26_084622_update__user_table', 1),
(287, '2020_11_27_122709_create_session_user_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detailID` int(10) UNSIGNED NOT NULL,
  `orderID` int(10) UNSIGNED NOT NULL,
  `foodID` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` double(40,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`detailID`, `orderID`, `foodID`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 200000.00, NULL, NULL),
(2, 2, 2, 2, 200000.00, NULL, '2020-11-27 07:50:18'),
(3, 1, 1, 1, 200000.00, NULL, NULL),
(4, 1, 1, 1, 200000.00, NULL, NULL),
(5, 2, 2, 2, 300000.00, NULL, NULL),
(6, 1, 1, 1, 200000.00, NULL, NULL),
(7, 1, 1, 1, 200000.00, NULL, NULL),
(8, 3, 2, 1, 200000.00, NULL, NULL),
(9, 3, 1, 1, 200000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordertables`
--

CREATE TABLE `ordertables` (
  `orderID` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `total` double(40,2) NOT NULL,
  `orderDate` datetime NOT NULL,
  `perNum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateClick` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordertables`
--

INSERT INTO `ordertables` (`orderID`, `userID`, `total`, `orderDate`, `perNum`, `service`, `dateClick`, `created_at`, `updated_at`) VALUES
(1, 1, 2000000.00, '2020-11-26 10:44:52', '4,5', NULL, '2020-11-26 10:44:52', NULL, NULL),
(2, 2, 6000000.00, '2020-11-26 10:44:52', '4,5', NULL, '2020-11-26 10:44:52', NULL, NULL),
(3, 1, 2000000.00, '2020-11-26 10:44:52', '4,5', NULL, '2020-11-26 10:44:52', NULL, NULL),
(4, 2, 6000000.00, '2020-11-26 10:44:52', '4,5', NULL, '2020-11-26 10:44:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `positionID` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`positionID`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'manager', NULL, NULL),
(3, 'user', NULL, NULL),
(4, 'staff', NULL, NULL),
(5, 'admin', NULL, NULL),
(6, 'manager', NULL, NULL),
(7, 'user', NULL, NULL),
(8, 'staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessionusers`
--

CREATE TABLE `sessionusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expried` datetime NOT NULL,
  `refresh_token_expried` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessionusers`
--

INSERT INTO `sessionusers` (`id`, `token`, `refresh_token`, `token_expried`, `refresh_token_expried`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'N1X9JIsx5yzROFFflOLJkkEFA5FQng6KZplqphEl', 'M7sbnslkHqkmsR2EnuE0fTw2pvyjk0DyZK1yaWro', '2020-12-27 14:15:04', '2021-11-22 14:15:04', 4, '2020-11-27 07:15:04', '2020-11-27 07:15:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `positionID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `positionID`, `created_at`, `updated_at`) VALUES
(1, 'Võ Văn Nhã', 'nhavo14@gmail.com', '0905903902', '123', 1, NULL, NULL),
(2, 'Trần Văn Quý', 'quytran@gmail.com', '0905903902', '123', 1, NULL, NULL),
(3, 'Nguyễn Văn Tuyên', 'tuyen1@gmail.com', '0905903902', '123', 2, NULL, NULL),
(4, 'test1', 'test@vku.udn.vn', '123', '$2y$10$azFMFtGi5JadIp1LvPVMWuqUmli4Y9CHlET4WVoy7qDeMRNmK1wpW', 1, '2020-11-27 07:03:02', '2020-11-27 07:03:02'),
(5, 'Võ Văn Nhã', 'nhavo14@gmail.com', '0905903902', '123', 1, NULL, NULL),
(6, 'Trần Văn Quý', 'quytran@gmail.com', '0905903902', '123', 1, NULL, NULL),
(7, 'Nguyễn Văn Tuyên', 'tuyen1@gmail.com', '0905903902', '123', 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmID`),
  ADD KEY `comments_userid_foreign` (`userID`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `contacts_userid_foreign` (`userID`);

--
-- Chỉ mục cho bảng `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `foods_parentid_foreign` (`parentID`);

--
-- Chỉ mục cho bảng `kindoffoods`
--
ALTER TABLE `kindoffoods`
  ADD PRIMARY KEY (`parentID`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `orderdetails_orderid_foreign` (`orderID`),
  ADD KEY `orderdetails_foodid_foreign` (`foodID`);

--
-- Chỉ mục cho bảng `ordertables`
--
ALTER TABLE `ordertables`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `ordertables_userid_foreign` (`userID`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`positionID`);

--
-- Chỉ mục cho bảng `sessionusers`
--
ALTER TABLE `sessionusers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_positionid_foreign` (`positionID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `cmID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `foods`
--
ALTER TABLE `foods`
  MODIFY `foodID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `kindoffoods`
--
ALTER TABLE `kindoffoods`
  MODIFY `parentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detailID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ordertables`
--
ALTER TABLE `ordertables`
  MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `positionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sessionusers`
--
ALTER TABLE `sessionusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_parentid_foreign` FOREIGN KEY (`parentID`) REFERENCES `kindoffoods` (`parentID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_foodid_foreign` FOREIGN KEY (`foodID`) REFERENCES `foods` (`foodID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_orderid_foreign` FOREIGN KEY (`orderID`) REFERENCES `ordertables` (`orderID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ordertables`
--
ALTER TABLE `ordertables`
  ADD CONSTRAINT `ordertables_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_positionid_foreign` FOREIGN KEY (`positionID`) REFERENCES `positions` (`positionID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
