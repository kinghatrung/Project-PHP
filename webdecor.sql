-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2024 lúc 09:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdecor`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbl_nhanvien`
--

CREATE TABLE `dbl_nhanvien` (
  `id_nhanvien` int(11) NOT NULL,
  `manv` char(255) NOT NULL,
  `tennv` varchar(255) NOT NULL,
  `email` char(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbl_nhanvien`
--

INSERT INTO `dbl_nhanvien` (`id_nhanvien`, `manv`, `tennv`, `email`, `phone`, `address`) VALUES
(1, 'Nv1', 'Nguyễn Minh Huyên', 'huyen@gmail.com', '0998177221', 'Hà Nội'),
(8, 'Nv2', 'Phạm Thị Điền', 'dien@gmail.com', '09991818822', 'Bắc Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbl_nhathietke`
--

CREATE TABLE `dbl_nhathietke` (
  `id_ntk` int(11) NOT NULL,
  `mantk` char(255) NOT NULL,
  `tenntk` varchar(255) NOT NULL,
  `email` char(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbl_nhathietke`
--

INSERT INTO `dbl_nhathietke` (`id_ntk`, `mantk`, `tenntk`, `email`, `phone`, `address`) VALUES
(1, 'Ntk1', 'Nguyễn Minh Huyên', 'huyen@gmai.com', '0989717176262', 'Hà Nội'),
(5, 'Ntk2', 'Nông Văn Vạ', 'va@gmail.com', '09818128381', 'Thái Bình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbl_sanpham`
--

CREATE TABLE `dbl_sanpham` (
  `masp` varchar(255) NOT NULL,
  `giasp` char(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbl_sanpham`
--

INSERT INTO `dbl_sanpham` (`masp`, `giasp`, `img`) VALUES
('Pk1', '100.000.000', 'anh1.jpg'),
('Pk2', '120.000.000', 'anh2.jpg'),
('Pk3', '140.000.000', 'anh3.jpg'),
('Pk4', '160.000.000', 'anh4.jpg'),
('Pk5', '180.000.000', 'anh5.jpg'),
('Pk6', '200.000.000', 'anh6.jpg'),
('Pk7', '220.000.000', 'anh7.jpg'),
('Pk8', '240.000.000', 'anh8.jpg'),
('Pk9', '260.000.000', 'anh9.jpg'),
('Plv1', '100.000.000', 'anh1.jpg'),
('Plv2', '120.000.000', 'anh2.jpg'),
('Plv3', '130.000.000', 'anh3.jpg'),
('Plv4', '160.000.000', 'anh4.jpg'),
('Plv5', '180.000.000', 'anh5.jpg'),
('Plv6', '200.000.000', 'anh6.jpg'),
('Plv7', '220.000.000', 'anh7.jpg'),
('Plv8', '240.000.000', 'anh8.jpg'),
('Plv9', '260.000.000', 'anh9.jpg'),
('Pn1', '100.000.000', 'anh1.jpg'),
('Pn10', '280.000.000', 'anh10.jpg'),
('Pn2', '120.000.000', 'anh2.jpg'),
('Pn3', '140.000.000', 'anh3.jpg'),
('Pn4', '160.000.000', 'anh4.jpg'),
('Pn5', '180.000.000', 'anh5.jpg'),
('Pn6', '200.000.000', 'anh6.jpg'),
('Pn7', '220.000.000', 'anh7.jpg'),
('Pn8', '240.000.000', 'anh8.jpg'),
('Pn9', '260.000.000', 'anh9.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbl_user`
--

CREATE TABLE `dbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbl_user`
--

INSERT INTO `dbl_user` (`id`, `name`, `email`, `phone`, `address`, `pass`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '09182726711', 'Hà Nội', 'admin', 1),
(2, 'Nguyễn Minh Huyên', 'huyen@gmail.com', '0818177221', 'Hà Nội', 'huyen', 2),
(17, 'Nguyễn Văn Ka', 'ka@gmail.com', '09181726221', 'Vĩnh Phúc', '123', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dbl_nhanvien`
--
ALTER TABLE `dbl_nhanvien`
  ADD PRIMARY KEY (`id_nhanvien`);

--
-- Chỉ mục cho bảng `dbl_nhathietke`
--
ALTER TABLE `dbl_nhathietke`
  ADD PRIMARY KEY (`id_ntk`);

--
-- Chỉ mục cho bảng `dbl_sanpham`
--
ALTER TABLE `dbl_sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `dbl_user`
--
ALTER TABLE `dbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dbl_nhanvien`
--
ALTER TABLE `dbl_nhanvien`
  MODIFY `id_nhanvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dbl_nhathietke`
--
ALTER TABLE `dbl_nhathietke`
  MODIFY `id_ntk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dbl_user`
--
ALTER TABLE `dbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
