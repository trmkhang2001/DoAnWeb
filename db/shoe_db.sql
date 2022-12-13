-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th12 13, 2022 lúc 12:32 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `shoe_color` varchar(255) NOT NULL,
  `shoe_size` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `shoe_id`, `shoe_color`, `shoe_size`, `status`) VALUES
(25, 15, 26, 'hồng', 23, 2),
(27, 18, 26, 'hồng', 23, 3),
(28, 18, 25, 'hồng', 23, 3),
(29, 18, 23, 'xanh', 23, 3),
(30, 18, 15, 'xanh', 23, 3),
(31, 18, 24, 'xanh', 3, 3),
(33, 19, 26, 'hồng', 23, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids'),
(4, 'nike'),
(5, 'adidas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `date`) VALUES
(19, 27, '2022-06-03'),
(20, 28, '2022-06-03'),
(21, 29, '2022-06-03'),
(22, 30, '2022-06-03'),
(23, 31, '2022-06-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoe`
--

CREATE TABLE `shoe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shoe`
--

INSERT INTO `shoe` (`id`, `name`, `price`, `sale`, `size`, `category_id`, `color`, `review`) VALUES
(10, '44354', 45435, 4, '4', 2, 'xanh,vàng,cam,hồng cánh sen,trắng,đỏ,tím,đen', 'khong co gt'),
(28, 'Giày chạy bộ nam ARHS009-4', 1659273, 2, '39', 1, 'Steel Blue', 'Giày chạy bộ giảm sốc, sử dụng cách phối màu đơn giản.Giày chạy được thiết kế mục đích là đệm sự ổn định của gót chân và giữ cho bàn chân được bảo vệ, để người chạy có thể tập trung vào từng bước chạy. Đế giữa sử dụng công nghệ LINING CLOUD, mềm mại và có hiệu suất đệm tuyệt vời.  Phần trên sử dụng vật liệu bề mặt có hiệu suất hỗ trợ hiệu quả cho việc thắt chặt, đồng thời kết hợp khéo léo giữa hỗ trợ động và độ vừa vặn mềm mại.  Li Ningyun PLUS  Li Ningyun PLUS dựa trên công nghệ đế giữa được nâ'),
(29, 'Nike Lebron Lebron Soldier ', 3250000, 1, '42,43', 4, 'While Red', 'Dòng giày bóng rổ phụ của Lebron James là Nike Lebron Soldier với mức giá rẻ hơn so với dòng chính nhưng vẫn có những chất liệu hạng sang và công nghệ hỗ trợ bàn chân rất tiên tiến, đã được tiếp tục sản xuất sang mẫu thứ 14. Thương hiệu giày bóng rổ Lebron Soldier trước nay vẫn nổi tiếng với bộ dây đeo ở phần thân trên nay đã được lược bỏ và thay đổi với bộ mặt sang trọng hơn rất nhiều.'),
(30, 'Giày Thể Thao Adidas ULTRA4D ', 4200000, 1, '40,41,42', 5, 'While Blue', 'Công nghệ Đế khối (hay được gọi là Wedge) đươc tạo nên trên nền tảng đế Microwobbleboard độc quyền của Fitflop, với các điểm độc đáo: • Lớp đệm cứng ở gót chân giúp phân bổ đều áp lực lên bàn chân, không bị gián đoạn, tăng cường sự thăng bằng khi di chuyển. • Thiết kế đệm giữa giúp nâng đỡ và chỉnh hình vòm chân, tăng tính linh hoạt cho bàn chân, giảm thiểu việc đau mỏi các dây chằn, gân do áp lưc quá tải lên lòng bàn chân. • Đệm trước ở phần ngón chân tạo sự thoải mái hoàn toàn, không gây khó c'),
(31, 'FITFLOP - Giày Thể Thao Nam Arken', 165, 2, '40,39', 2, 'Black', 'Công nghệ Đế khối (hay được gọi là Wedge) đươc tạo nên trên nền tảng đế Microwobbleboard độc quyền của Fitflop, với các điểm độc đáo: • Lớp đệm cứng ở gót chân giúp phân bổ đều áp lực lên bàn chân, không bị gián đoạn, tăng cường sự thăng bằng khi di chuyển. • Thiết kế đệm giữa giúp nâng đỡ và chỉnh hình vòm chân, tăng tính linh hoạt cho bàn chân, giảm thiểu việc đau mỏi các dây chằn, gân do áp lưc quá tải lên lòng bàn chân. • Đệm trước ở phần ngón chân tạo sự thoải mái hoàn toàn, không gây khó c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoe_image`
--

CREATE TABLE `shoe_image` (
  `id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `link_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shoe_image`
--

INSERT INTO `shoe_image` (`id`, `shoe_id`, `link_image`) VALUES
(38, 28, 'imageShoe/anh1.jpg'),
(39, 29, 'imageShoe/nike1.jpg'),
(40, 30, 'imageShoe/adidasdibo.jpg'),
(41, 31, 'imageShoe/fifo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `dob`, `address`, `role`, `gender`, `email`, `phone`) VALUES
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Trần Minh Khang', '2022-12-16', '5 Nghĩa Thục, Phường 6, Quận 5', 1, 1, 'jclove.comehere@gmail.com', '0935713289');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoe_image`
--
ALTER TABLE `shoe_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `shoe`
--
ALTER TABLE `shoe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `shoe_image`
--
ALTER TABLE `shoe_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
