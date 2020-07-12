-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 12, 2020 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhocsinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diems`
--

CREATE TABLE `diems` (
  `MaDiem` int(10) UNSIGNED NOT NULL,
  `MaHocSinh` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `MaHocKy` int(11) NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `MaLoaiDiem` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `Diem` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_viens`
--

CREATE TABLE `giao_viens` (
  `MaGiaoVien` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `DienThoai` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giao_viens`
--

INSERT INTO `giao_viens` (`MaGiaoVien`, `HoTen`, `GioiTinh`, `NgaySinh`, `DiaChi`, `DienThoai`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Thị Như Ý', 0, '1975-01-01', 'Kon Tum', '0362243247', NULL, NULL),
(2, 'Trần Ngọc Giang Châu', 1, '1985-02-02', 'Đà Nẵng', '0988776655', NULL, NULL),
(3, 'Nguyễn Văn Bênh', 1, '1974-03-03', 'TT Đăk Hà - Đăk Hà - Kon Tum', '0999887766', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_kys`
--

CREATE TABLE `hoc_kys` (
  `MaHocKy` int(10) UNSIGNED NOT NULL,
  `TenHocKy` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_sinhs`
--

CREATE TABLE `hoc_sinhs` (
  `MaHocSinh` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NoiSinh` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `DanToc` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `MaLop` int(10) NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_sinhs`
--

INSERT INTO `hoc_sinhs` (`MaHocSinh`, `HoTen`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `DanToc`, `MaLop`, `MaNamHoc`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Công Hưng', 1, '1996-02-15', 'Kon Tum', 'Kinh', 6, 1, NULL, NULL),
(2, 'Trương Vô Kỵ', 1, '2020-09-07', 'Núi Võ Đang', 'Hoa', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoi_lops`
--

CREATE TABLE `khoi_lops` (
  `MaKhoiLop` int(10) UNSIGNED NOT NULL,
  `TenKhoiLop` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoi_lops`
--

INSERT INTO `khoi_lops` (`MaKhoiLop`, `TenKhoiLop`) VALUES
(1, 'Khối 10'),
(2, 'Khối 11'),
(3, 'Khối 12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_diems`
--

CREATE TABLE `loai_diems` (
  `MaLoaiDiem` int(10) UNSIGNED NOT NULL,
  `TenLoaiDiem` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `HeSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nguoi_dungs`
--

CREATE TABLE `loai_nguoi_dungs` (
  `MaLoaiNguoiDung` int(10) UNSIGNED NOT NULL,
  `LoaiNguoiDung` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lops`
--

CREATE TABLE `lops` (
  `MaLop` int(10) UNSIGNED NOT NULL,
  `TenLop` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `MaKhoiLop` int(11) NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `SiSo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lops`
--

INSERT INTO `lops` (`MaLop`, `TenLop`, `MaKhoiLop`, `MaNamHoc`, `SiSo`, `created_at`, `updated_at`) VALUES
(1, 'Lớp 10A1', 1, 1, 35, NULL, NULL),
(2, 'Lớp 10A2', 1, 1, 34, NULL, NULL),
(3, 'Lớp 10A3', 1, 1, 35, NULL, NULL),
(4, 'Lớp 11A1', 2, 1, 40, NULL, NULL),
(5, 'Lớp 11A2', 2, 1, 38, NULL, NULL),
(6, 'Lớp 11A3', 2, 1, 34, NULL, NULL),
(7, 'Lớp 12A1', 3, 1, 37, NULL, NULL),
(8, 'Lớp 12A2', 3, 1, 39, NULL, NULL),
(9, 'Lớp 12A3', 3, 1, 40, NULL, NULL);

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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_07_08_024028_create_hoc_sinhs_table', 1),
(3, '2020_07_08_032233_create_giao_viens_table', 2),
(4, '2020_07_08_032306_create_lops_table', 2),
(5, '2020_07_08_032329_create_khoi_lops_table', 2),
(6, '2020_07_08_032351_create_diems_table', 2),
(7, '2020_07_08_032406_create_loai_diems_table', 2),
(8, '2020_07_08_032433_create_nam_hocs_table', 2),
(9, '2020_07_08_032452_create_hoc_kies_table', 2),
(10, '2020_07_08_032513_create_mon_hocs_table', 2),
(11, '2020_07_08_032531_create_nguoi_dungs_table', 2),
(12, '2020_07_08_032549_create_loai_nguoi_dungs_table', 2),
(13, '2020_07_08_032604_create_phan_congs_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hocs`
--

CREATE TABLE `mon_hocs` (
  `MaMonHoc` int(10) UNSIGNED NOT NULL,
  `TenMonHoc` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `SoTiet` int(11) NOT NULL,
  `HeSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam_hocs`
--

CREATE TABLE `nam_hocs` (
  `MaNamHoc` int(10) UNSIGNED NOT NULL,
  `TenNamHoc` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nam_hocs`
--

INSERT INTO `nam_hocs` (`MaNamHoc`, `TenNamHoc`) VALUES
(1, '2020-2021'),
(2, '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `MaNguoiDung` int(10) UNSIGNED NOT NULL,
  `TenDangNhap` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `MatKhau` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `TenNguoiDung` varchar(150) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `MaLoaiNguoiDung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_congs`
--

CREATE TABLE `phan_congs` (
  `MaPhanCong` int(10) UNSIGNED NOT NULL,
  `MaNamHoc` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `MaGiaoVien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diems`
--
ALTER TABLE `diems`
  ADD PRIMARY KEY (`MaDiem`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giao_viens`
--
ALTER TABLE `giao_viens`
  ADD PRIMARY KEY (`MaGiaoVien`);

--
-- Chỉ mục cho bảng `hoc_kys`
--
ALTER TABLE `hoc_kys`
  ADD PRIMARY KEY (`MaHocKy`);

--
-- Chỉ mục cho bảng `hoc_sinhs`
--
ALTER TABLE `hoc_sinhs`
  ADD PRIMARY KEY (`MaHocSinh`);

--
-- Chỉ mục cho bảng `khoi_lops`
--
ALTER TABLE `khoi_lops`
  ADD PRIMARY KEY (`MaKhoiLop`);

--
-- Chỉ mục cho bảng `loai_diems`
--
ALTER TABLE `loai_diems`
  ADD PRIMARY KEY (`MaLoaiDiem`);

--
-- Chỉ mục cho bảng `loai_nguoi_dungs`
--
ALTER TABLE `loai_nguoi_dungs`
  ADD PRIMARY KEY (`MaLoaiNguoiDung`);

--
-- Chỉ mục cho bảng `lops`
--
ALTER TABLE `lops`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `nam_hocs`
--
ALTER TABLE `nam_hocs`
  ADD PRIMARY KEY (`MaNamHoc`);

--
-- Chỉ mục cho bảng `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `phan_congs`
--
ALTER TABLE `phan_congs`
  ADD PRIMARY KEY (`MaPhanCong`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diems`
--
ALTER TABLE `diems`
  MODIFY `MaDiem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giao_viens`
--
ALTER TABLE `giao_viens`
  MODIFY `MaGiaoVien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoc_kys`
--
ALTER TABLE `hoc_kys`
  MODIFY `MaHocKy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoc_sinhs`
--
ALTER TABLE `hoc_sinhs`
  MODIFY `MaHocSinh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoi_lops`
--
ALTER TABLE `khoi_lops`
  MODIFY `MaKhoiLop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loai_diems`
--
ALTER TABLE `loai_diems`
  MODIFY `MaLoaiDiem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_nguoi_dungs`
--
ALTER TABLE `loai_nguoi_dungs`
  MODIFY `MaLoaiNguoiDung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lops`
--
ALTER TABLE `lops`
  MODIFY `MaLop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `mon_hocs`
--
ALTER TABLE `mon_hocs`
  MODIFY `MaMonHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nam_hocs`
--
ALTER TABLE `nam_hocs`
  MODIFY `MaNamHoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `MaNguoiDung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phan_congs`
--
ALTER TABLE `phan_congs`
  MODIFY `MaPhanCong` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
