-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `anime`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id_admin_roles` int(11) NOT NULL,
  `admin_admin_id` int(10) UNSIGNED NOT NULL,
  `roles_id_roles` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id_admin_roles`, `admin_admin_id`, `roles_id_roles`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_14_095254_create_tbl_movie', 1),
(6, '2021_09_14_095500_create_tbl_admin', 1),
(7, '2021_09_14_095725_create_tbl_genre_movie', 1),
(8, '2021_09_14_095934_create_tbl_category_movie', 1),
(9, '2021_09_14_123624_create_tbl_seri_movie', 1),
(10, '2021_09_16_085613_create_tbl_customers', 1),
(11, '2021_09_16_090023_create_tbl_banner', 1),
(12, '2021_09_20_092916_create_tbl_comment', 1),
(13, '2021_09_20_094012_create_tbl_news', 1),
(14, '2021_09_20_100544_create_tbl_roles', 2),
(15, '2021_09_20_100627_create_tbl_admin_roles', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` int(11) NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_name`, `admin_phone`, `admin_password`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'Nguyễn Tuấn Ngọc', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL),
(2, 'moderator@gmail.com', 'NTN author', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL),
(3, 'user@gmail.com', 'NTN user', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL),
(4, 'ngocanh555x8@gmail.com', 'test', 375904348, 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-29 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(10) UNSIGNED NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_name`, `banner_url`, `banner_images`, `banner_status`, `created_at`, `updated_at`) VALUES
(3, 'hàng hóa', 'https://xemphimz.net/xem-phim/Tro-Choi-Con-Muc-tap-2-0d391779.aspx', 'mau-banner-thoi-trang-nam618.jpg', 1, NULL, NULL),
(4, 'Phim Trò chơi con mực', 'https://xemphimz.net/xem-phim/Tro-Choi-Con-Muc-tap-2-0d391779.aspx', '—Pn_4204736545.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_movie`
--

CREATE TABLE `tbl_category_movie` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_movie`
--

INSERT INTO `tbl_category_movie` (`category_id`, `category_name`, `category_slug`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Hài hước', 'hai-huoc', 'Thể loại hài hước', 1, NULL, NULL),
(2, 'Hoạt hình', 'hoat-hinh', 'Thể loại hoạt hình', 1, NULL, NULL),
(3, 'Phiêu liêu', 'phieu-lieu', 'Thể loại phiêu liêu', 1, NULL, NULL),
(4, 'Thám tử', 'tham-tu', 'Thể loại thám tử', 1, NULL, NULL),
(5, 'Tâm lý - Tình cảm', 'tam-ly-tinh-cam', 'Tâm lý - Tình cảm', 1, NULL, NULL),
(6, 'Hành động', 'hanh-dong', 'Tâm lý - Tình cảm', 1, NULL, NULL),
(7, 'TV Show', 'tv-show', 'VTV Money Weekly là những sản phẩm số mới của VTV Digital. ', 1, NULL, NULL),
(8, 'Hoạt hình - Anime', 'hoat-hinh-anime', 'VTV Money Weekly là những sản phẩm số mới của VTV Digital. ', 1, NULL, NULL),
(9, 'Ngôn tình', 'ngon-tinh', 'phim ngôn tình', 1, NULL, NULL),
(10, 'Khoa học - viễn tường', 'khoa-hoc-vien-tuong', 'phim ngôn tình', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `seri_id` int(10) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_movie_rating` int(11) DEFAULT NULL,
  `comment_parent_comment` int(11) DEFAULT NULL,
  `comment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `seri_id`, `customer_name`, `comment_content`, `comment_movie_rating`, `comment_parent_comment`, `comment_status`, `created_at`, `updated_at`) VALUES
(1, 13, 'Nguyễn Tuấn Ngọc', 'Bộ phim rất hay, test.', NULL, 0, 1, '2021-10-06 08:49:11', NULL),
(2, 12, 'Nguyễn Tuấn Ngọc', 'phim diễn viên xinh.', NULL, 0, 0, '2021-10-06 02:46:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tuấn Ngọc', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '09090909', 1, NULL, NULL),
(2, 'Nguyễn Tuấn Ngọc', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '09090909', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_genre_movie`
--

CREATE TABLE `tbl_genre_movie` (
  `genre_id` int(10) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_genre_movie`
--

INSERT INTO `tbl_genre_movie` (`genre_id`, `genre_name`, `genre_slug`, `genre_desc`, `genre_status`, `created_at`, `updated_at`) VALUES
(1, 'Phim lẻ', 'phim-le', 'Phim lẻ', 1, NULL, NULL),
(2, 'Phim bộ', 'phim-bo', 'Phim ác quỷ', 1, NULL, NULL),
(3, 'Phim hoạt hình', 'phim-hoat-hinh', 'Phim lẻ', 1, NULL, NULL),
(4, 'Phim xem nhiều', 'phim-xem-nhieu', 'Phim ác quỷ', 1, NULL, NULL),
(5, 'Tin tức', 'tin-tuc', 'VTV Money Weekly là những sản phẩm số mới của VTV Digital. ', 1, NULL, NULL),
(6, 'Phim chiếu rạp', 'phim-chieu-rap', 'VTV Money Weekly là những sản phẩm số mới của VTV Digital. ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `movie_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_id` int(10) UNSIGNED NOT NULL,
  `movie_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `movie_name`, `movie_slug`, `seri_id`, `movie_desc`, `movie_image`, `movie_url`, `movie_status`, `created_at`, `updated_at`) VALUES
(1, 'Mắt diếc', '', 6, 'phim chiếu rạp 2020', 'banner-nguoi-tinh-xa-la510.jpg', 'https://bitly.com.vn/i7eff5', 1, '2021-09-30 02:23:57', NULL),
(2, 'Qúa nhanh quá nguy hiểm', 'qua-nhanh-qua-nguy-hiem-p9', 8, 'qua-nhanh-a', 'Thor82.jpg', 'https://bitly.com.vn/khzv26', 1, '2021-09-30 02:25:02', NULL),
(3, 'Trò Chơi Con Mực [Tập 1]', 'tro-choi-con-muc-tap-1', 7, 'Bộ phim Trò Chơi Con Mực thuộc thể loại phim Cờ Bạc Xã Hội Đen của Hàn Quốc. Trò Chơi Con Mực (Squid Game) là bộ phim lừa đảo cờ bạc, câu chuyện về những người tham gia một trò chơi sinh tồn bí ẩn để nhận được một giải thưởng lớn, họ chấp nhận một lời mời kỳ lạ: thi đấu trong các trò chơi trẻ con. Đón chờ họ là một giải thưởng hấp dẫ, và những rủi ro chết người. họ phải liều mạng để trở thành người chiến thắng cuối cùng..', 'tro-choi-con-muc842.jpg', 'https://bitly.com.vn/ff5br5', 1, '2021-09-30 07:15:31', NULL),
(4, 'Trò Chơi Con Mực [Tập 2]', 'tro-choi-con-muc-tap-2', 7, 'Bộ phim Trò Chơi Con Mực thuộc thể loại phim Cờ Bạc Xã Hội Đen của Hàn Quốc. Trò Chơi Con Mực (Squid Game) là bộ phim lừa đảo cờ bạc, câu chuyện về những người tham gia một trò chơi sinh tồn bí ẩn để nhận được một giải thưởng lớn, họ chấp nhận một lời mời kỳ lạ: thi đấu trong các trò chơi trẻ con. Đón chờ họ là một giải thưởng hấp dẫ, và những rủi ro chết người. họ phải liều mạng để trở thành người chiến thắng cuối cùng', 'tro-choi-con-muc415.jpg', 'https://bitly.com.vn/k7nzuh', 1, '2021-09-30 07:16:20', NULL),
(5, 'Trò Chơi Con Mực [Tập 3]', 'tro-choi-con-muc-tap-3', 7, 'Bộ phim Trò Chơi Con Mực thuộc thể loại phim Cờ Bạc Xã Hội Đen của Hàn Quốc. Trò Chơi Con Mực (Squid Game) là bộ phim lừa đảo cờ bạc, câu chuyện về những người tham gia một trò chơi sinh tồn bí ẩn để nhận được một giải thưởng lớn, họ chấp nhận một lời mời kỳ lạ: thi đấu trong các trò chơi trẻ con. Đón chờ họ là một giải thưởng hấp dẫ, và những rủi ro chết người. họ phải liều mạng để trở thành người chiến thắng cuối cùng.', 'tro-choi-con-muc975.jpg', 'https://bitly.com.vn/j68qv1', 1, '2021-09-30 07:17:05', NULL),
(6, 'Money Weekly 48 Thật Không Thể Tin Nổi  Vtv24 1080p', 'tro-choi-con-muc-tap-4', 9, 'Money Weekly 48 Thật Không Thể Tin Nổi  Vtv24 1080p', 'tải xuống397.jpg', 'https://cdn.jwplayer.com/manifests/X2Oyt56U.m3u8', 1, '2021-10-01 00:42:21', NULL),
(7, 'Trò Chơi Con Mực [Tập 4]', 'tro-choi-con-muc-tap-4', 7, 'phim chiếu rạp 2020', 'tro-choi-con-muc576.jpg', 'https://bitly.com.vn/yjqxcb', 1, '2021-10-02 07:54:52', NULL),
(8, 'Trò Chơi Con Mực [Tập 5]', 'tro-choi-con-muc-tap-5', 7, '123', 'tro-choi-con-muc900.jpg', 'https://bitly.com.vn/ar2q2i', 1, '2021-10-02 07:56:11', NULL),
(9, 'Trò Chơi Con Mực [Tập 6]', 'tro-choi-con-muc-tap-6', 7, '123', 'tro-choi-con-muc173.jpg', 'https://bitly.com.vn/aggcxa', 1, '2021-10-02 07:56:53', NULL),
(10, 'Trò Chơi Con Mực [Tập 7]', 'tro-choi-con-muc-tap-7', 7, '123', 'tro-choi-con-muc898.jpg', 'https://bitly.com.vn/1qgcxn', 1, '2021-10-02 07:57:26', NULL),
(11, 'Trò Chơi Con Mực [Tập 8]', 'tro-choi-con-muc-tap-8', 7, '123', 'tro-choi-con-muc19.jpg', 'https://bitly.com.vn/1fhtgv', 1, '2021-10-02 07:58:03', NULL),
(12, 'Trò Chơi Con Mực [Tập 9]', 'tro-choi-con-muc-tap-9', 7, '123', 'tro-choi-con-muc353.jpg', 'https://bitly.com.vn/yfvwfa', 1, '2021-10-02 07:58:39', NULL),
(13, 'Tap-1', 'co-nang-tinh-nghich-tap-1', 10, 'Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường.', 'kaen-kaew-200x300379.jpg', 'https://bitly.com.vn/6we9jv', 1, '2021-10-02 20:06:58', NULL),
(14, 'Tap-2', 'co-nang-tinh-nghich-tap-2', 10, 'Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường.', 'kaen-kaew-200x300719.jpg', 'https://bitly.com.vn/k702kw', 1, '2021-10-02 20:07:57', NULL),
(15, 'Tap-3', 'co-nang-tinh-nghich-tap-3', 10, 'Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường.', 'kaen-kaew-200x300982.jpg', 'https://bitly.com.vn/8fobas', 1, '2021-10-02 20:08:39', NULL),
(16, 'Tap-4', 'co-nang-tinh-nghich-tap-4', 10, 'Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường.', 'kaen-kaew-200x300143.jpg', 'https://bitly.com.vn/zh767s', 1, '2021-10-02 20:09:26', NULL),
(17, 'Tap-9', 'co-nang-tinh-nghich-tap-9', 10, 'Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường.', 'kaen-kaew-200x30025.jpg', 'https://bitly.com.vn/lh4n52', 1, '2021-10-02 20:12:43', NULL),
(18, 'Tap-8', 'co-nang-tinh-nghich-tap-8', 10, '1234', 'kaen-kaew-200x300218.jpg', 'https://bitly.com.vn/k0orh6', 1, '2021-10-02 20:13:37', NULL),
(19, 'Tap-7', 'co-nang-tinh-nghich-tap-7', 10, '123', 'kaen-kaew-200x300141.jpg', 'https://bitly.com.vn/ans7si', 1, '2021-10-02 20:15:34', NULL),
(20, 'Nữ Thanh Tra Tài Ba [Tập 1]', 'nu-thanh-tra-tai-ba-tap-1', 11, 'Bộ phim Nữ Thanh Tra Tài Ba thuộc thể loại phim Hành động Hài Hước của Hàn Quốc 2. Bộ phim Nữ Thanh Tra Tài Ba là câu chuyện của một nữ thám tử khó tính và bất hảo, một ngày nọ mất hết trí nhớ. Con dâu của tập đoàn tài phiệt và một nữ công tố viên có khuôn mặt giống nhau, do mất trí nhớ họ đã hoán đổi cuộc sống cho nhau. Jo Yeon Joo là một công tố viên và là con gái duy nhất của kẻ hành động trong một nhóm xã hội đen.(Nữ Thanh Tra Tài Ba) .', 'nu-thanh-tra-tai-ba912.jpg', 'https://bitly.com.vn/urs43s', 1, '2021-10-02 20:24:37', NULL),
(21, 'Nữ Thanh Tra Tài Ba [Tập 2]', 'nu-thanh-tra-tai-ba-tap-2', 11, '123', 'nu-thanh-tra-tai-ba768.jpg', 'https://bitly.com.vn/11v802', 1, '2021-10-02 20:25:19', NULL),
(22, 'Nữ Thanh Tra Tài Ba [Tập 3]', 'nu-thanh-tra-tai-ba-tap-3', 11, '123', 'nu-thanh-tra-tai-ba266.jpg', 'https://bitly.com.vn/aywpyk', 1, '2021-10-02 20:25:53', NULL),
(23, 'Nữ Thanh Tra Tài Ba [Tập 4]', 'nu-thanh-tra-tai-ba-tap-4', 11, '123', 'nu-thanh-tra-tai-ba412.jpg', 'https://bitly.com.vn/qpzptw', 1, '2021-10-02 20:26:34', NULL),
(24, 'Mặt Trời Đen [Tập 1]', 'mat-troi-den-tap-1', 12, 'Bộ phim Mặt Trời Đen thuộc thể loại phim Hành Động của Hàn Quốc. Bộ phim Mặt Trời Đen (The Veil ) xoay quanh Han Ji Hyuk, một đặc vụ hiện trường ưu tú tại NIS (Cục Tình báo Quốc gia). Anh nổi tiếng vì vô cùng nhanh nhạy, thông thạo nhiều ngôn ngữ, có kỹ năng bắn súng và chiến đấu vô song. Sau khi mất tích một năm vì làm nhiệm vụ loại bỏ một tổ chức tội phạm, Han Ji Hyuk trở lại để tìm kiếm kẻ phản bội đã đẩy anh xuống địa ngục...', 'mat-troi-den342.jpg', 'https://bitly.com.vn/w68vhh', 1, '2021-10-03 00:30:56', NULL),
(25, 'Mặt Trời Đen [Tập 2]', 'mat-troi-den-tap-2', 12, '[Tập 2] Mặt Trời Đen\r\nBộ phim Mặt Trời Đen thuộc thể loại phim Hành Động của Hàn Quốc', 'mat-troi-den372.jpg', 'https://bitly.com.vn/iuehf5', 1, '2021-10-03 00:32:56', NULL),
(26, 'Mặt Trời Đen [Tập 3]', 'mat-troi-den-tap-3', 12, '1213', 'mat-troi-den265.jpg', 'https://bitly.com.vn/jkq2in', 1, '2021-10-03 00:33:44', NULL),
(27, 'Mặt Trời Đen [Tập 4]', 'mat-troi-den-tap-4', 12, '123', 'mat-troi-den522.jpg', 'https://bitly.com.vn/ev7wx0', 1, '2021-10-03 00:34:36', NULL),
(28, 'Mặt Trời Đen [Tập 5]', 'mat-troi-den-tap-5', 12, '123', 'mat-troi-den665.jpg', 'https://bitly.com.vn/8xseqr', 1, '2021-10-03 00:35:14', NULL),
(29, 'Mặt Trời Đen [Tập 6]', 'mat-troi-den-tap-6', 12, '123', 'mat-troi-den41.jpg', 'https://bitly.com.vn/wjq6so', 1, '2021-10-03 00:36:34', NULL),
(30, 'Mặt Trời Đen [Tập 7]', 'mat-troi-den-tap-7', 12, '134', 'mat-troi-den478.jpg', 'https://bitly.com.vn/pxcfht', 1, '2021-10-03 00:37:27', NULL),
(31, 'Mặt Trời Đen [Tập 8]', 'mat-troi-den-tap-8', 12, '123', 'mat-troi-den685.jpg', 'https://bitly.com.vn/bz5a3y', 1, '2021-10-03 00:38:10', NULL),
(32, 'Mặt Trời Đen [Tập 9]', 'mat-troi-den-tap-9', 12, '34', 'mat-troi-den179.jpg', 'https://bitly.com.vn/il4v1w', 1, '2021-10-03 00:38:42', NULL),
(33, 'Mặt Trời Đen [Tập 10]', 'mat-troi-den-tap-10', 12, '123', 'mat-troi-den614.jpg', 'https://bitly.com.vn/uoj00v', 1, '2021-10-03 00:39:16', NULL),
(34, 'Mặt Trời Đen [Tập 11]', 'mat-troi-den-tap-11', 12, 'dsfasdf', 'mat-troi-den249.jpg', 'https://bitly.com.vn/041d79', 1, '2021-10-03 00:39:56', NULL),
(35, 'Mặt Trời Đen [Tập 12]', 'mat-troi-den-tap-12', 12, 'qưer', 'mat-troi-den899.jpg', 'https://bitly.com.vn/uohwuw', 1, '2021-10-03 00:40:31', NULL),
(36, 'Lập Trình Viên Đáng Yêu ( Tập 1)', 'lap-trinh-vien-dang-yeu-tap-1', 13, 'Bộ phim Lập Trình Viên Đáng Yêu', 'lap-trinh-vien-dang-yeu767.jpg', 'https://bitly.com.vn/26l9no', 1, '2021-10-03 06:56:08', NULL),
(37, 'Lập Trình Viên Đáng Yêu ( Tập 2)', 'lap-trinh-vien-dang-yeu-tap-2', 13, 'Phim', 'lap-trinh-vien-dang-yeu392.jpg', 'https://bitly.com.vn/x28j56', 1, '2021-10-03 06:57:19', NULL),
(38, 'Lập Trình Viên Đáng Yêu ( Tập 3)', 'lap-trinh-vien-dang-yeu-tap-3', 13, '123', 'lap-trinh-vien-dang-yeu134.jpg', 'https://bitly.com.vn/g6egla', 1, '2021-10-03 06:58:15', NULL),
(39, 'Lập Trình Viên Đáng Yêu ( Tập 4)', 'lap-trinh-vien-dang-yeu-tap-4', 13, '4', 'lap-trinh-vien-dang-yeu760.jpg', 'https://bitly.com.vn/h0o09i', 1, '2021-10-03 06:59:08', NULL),
(40, 'Lập Trình Viên Đáng Yêu ( Tập 5)', 'lap-trinh-vien-dang-yeu-tap-5', 13, '5', 'lap-trinh-vien-dang-yeu671.jpg', 'https://bitly.com.vn/h06hpp', 1, '2021-10-03 07:00:10', NULL),
(41, 'Lập Trình Viên Đáng Yêu ( Tập 6)', 'lap-trinh-vien-dang-yeu-tap-6', 13, '6', 'lap-trinh-vien-dang-yeu646.jpg', 'https://bitly.com.vn/slwk2e', 1, '2021-10-03 07:00:56', NULL),
(42, 'Lập Trình Viên Đáng Yêu ( Tập 8)', 'lap-trinh-vien-dang-yeu-tap-8', 13, '1', 'lap-trinh-vien-dang-yeu751.jpg', 'https://bitly.com.vn/frii2p', 1, '2021-10-03 07:03:43', NULL),
(43, 'Lập Trình Viên Đáng Yêu ( Tập 10)', 'lap-trinh-vien-dang-yeu-tap-10', 13, '10', 'lap-trinh-vien-dang-yeu427.jpg', 'https://bitly.com.vn/hm2vm7', 1, '2021-10-03 07:05:36', NULL),
(44, 'Đẳng Cấp Thượng Lưu [Tập 1]', 'dang-cap-thuong-luu-tap-1', 14, 'Thuyết minh và vietsub bộ phim (dang cap thuong luu), lồng tiếng hay, bản đẹp Full HD.', 'dang-cap-thuong-luu867.jpg', 'https://bitly.com.vn/4gijms', 1, '2021-10-03 18:53:55', NULL),
(45, 'Đẳng Cấp Thượng Lưu [Tập 2]', 'dang-cap-thuong-luu-tap-2', 14, '123', 'dang-cap-thuong-luu217.jpg', 'https://bitly.com.vn/mpb99s', 1, '2021-10-03 18:54:40', NULL),
(46, 'Đẳng Cấp Thượng Lưu [Tập 3]', 'dang-cap-thuong-luu-tap-3', 14, '1233', 'dang-cap-thuong-luu221.jpg', 'https://bitly.com.vn/h1ic7i', 1, '2021-10-03 18:55:28', NULL),
(47, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 1]', 'khi-tinh-yeu-gap-nha-khoa-hoc-tap-1', 15, 'Khi Tình Yêu Gặp Nhà Khoa Học', '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc994.jpg', 'https://bitly.com.vn/tzgdfa', 1, '2021-10-06 03:30:53', NULL),
(48, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 2]', 'khi-tinh-yeu-gap-nha-khoa-hoc-tap-2', 15, 'Khi Tình Yêu Gặp Nhà Khoa Học', '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc189.jpg', 'https://bitly.com.vn/f7ihjy', 1, '2021-10-06 03:31:31', NULL),
(49, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 3]', 'khi-tinh-yeu-gap-nha-khoa-hoc-tap-3', 15, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 3]', '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc187.jpg', 'https://bitly.com.vn/f6dcwv', 1, '2021-10-06 03:32:09', NULL),
(50, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 4]', 'khi-tinh-yeu-gap-nha-khoa-hoc-tap-4', 15, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 3]', '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc514.jpg', 'https://bit.ly/3BiVTWa', 1, '2021-10-06 03:34:17', NULL),
(51, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 5]', 'khi-tinh-yeu-gap-nha-khoa-hoc-tap-5', 15, 'Khi Tình Yêu Gặp Nhà Khoa Học [Tập 5]', '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc473.jpg', 'https://bitly.com.vn/y7myzx', 1, '2021-10-06 03:35:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_view` int(11) NOT NULL,
  `comment_parent_comment` int(11) NOT NULL,
  `comment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_roles` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_roles`, `name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_seri_movie`
--

CREATE TABLE `tbl_seri_movie` (
  `seri_id` int(10) UNSIGNED NOT NULL,
  `seri_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `seri_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_duration` int(11) NOT NULL,
  `seri_quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_year` int(11) NOT NULL,
  `seri_number` int(11) NOT NULL,
  `seri_old` int(11) NOT NULL,
  `seri_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_views` int(255) DEFAULT NULL,
  `seri_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_seri_movie`
--

INSERT INTO `tbl_seri_movie` (`seri_id`, `seri_name`, `seri_name_slug`, `category_id`, `genre_id`, `seri_desc`, `seri_country`, `seri_duration`, `seri_quality`, `seri_year`, `seri_number`, `seri_old`, `seri_image`, `seri_views`, `seri_status`, `created_at`, `updated_at`) VALUES
(1, 'yêu me là mãi mãi', 'yeu-me-la-mai-mai', 3, 4, 'yêu me là mãi mãi', 'Åland Islands', 160, 'FullHD', 1998, 2, 18, 'img39.jpg', 0, 1, NULL, NULL),
(2, 'yêu em Hương', 'yeu-em-huong', 3, 3, 'maiux yêu', 'Algeria', 160, 'FullHD', 2010, 1, 16, '43d7d21ef365274189c736149d11af6f768.jpg', 0, 1, NULL, NULL),
(3, 'yêu em nào thế', 'yeu-em-nao-the', 3, 3, 'yêu', 'American Samoa', 160, 'HD', 1998, 5, 18, '43d7d21ef365274189c736149d11af6f205.jpg', 0, 1, NULL, NULL),
(6, 'Mắt biếc 202', 'mat-biec-202', 1, 1, 'Mắt biếc (còn được biết đến với tên tiếng Anh: Dreamy Eyes) là phim điện ảnh chính kịch lãng mạn của Việt Nam năm 2019 do Victor Vũ đạo diễn, kiêm đảm nhiệm phần kịch bản cùng với nhóm biên kịch A Type Machine. Đây là phiên bản chuyển thể điện ảnh từ tiểu thuyết cùng tên phát hành năm 1990 của nhà văn Nguyễn Nhật Ánh,[2] đồng thời cũng là phim điện ảnh thứ hai của Victor Vũ chuyển thể dựa trên tác phẩm của nhà văn sau thành công của Tôi thấy hoa vàng trên cỏ xanh (2015). Tác phẩm do hai hãng Galaxy Media & Entertainment và November Films hợp tác sản xuất, với sự tham gia của dàn diễn viên gồm Trần Nghĩa, Trúc Anh, Trần Phong, Khánh Vân và Thảo Tâm. Nội dung của phim đi qua từng bước trưởng thành của Ngạn cùng mối tình đơn phương của cậu với Hà Lan – cô bạn thân xinh đẹp sở hữu đôi \"mắt biếc\". Victor Vũ bắt đầu quá trình tuyển chọn diễn viên cho dự án từ tháng 11 năm 2018. Phim bắt đầu được khởi quay vào giữa tháng 3 năm 2019 và đóng máy vào cuối tháng 5 tại Quảng Nam và Thừa Thiên Huế. Mắt biếc được khởi chiếu tại rạp vào ngày 20 tháng 12 năm 2019. Giới chuyên môn đưa ra nhiều lời khen ngợi cho tác phẩm, đặc biệt nhấn mạnh vào phần diễn xuất, kỹ thuật sản xuất, hình ảnh, âm nhạc và sự trung thành với tinh thần của nguyên tác gốc. Phim đạt thành công lớn về mặt doanh thu khi đem về 180 tỷ VND. Mắt biếc là phim điện ảnh đại diện Việt Nam được gửi đi dự sơ tuyển cho hạng mục Phim ngoại ngữ hay nhất tại Giải Oscar lần thứ 93 nhưng bị loại khỏi danh sách đề cử rút gọn.', 'Viet Nam', 117, 'HD', 2019, 1, 16, 'matbiec888.jpg', 0, 1, NULL, NULL),
(7, 'Trò chơi con mực (Squid Game 2021)', 'tro-choi-con-muc-squid-game-2021', 5, 2, 'Trò Chơi Con Mực (Squid Game) là bộ phim lừa đảo cờ bạc, câu chuyện về những người tham gia một trò chơi sinh tồn bí ẩn để nhận được một giải thưởng lớn, họ chấp nhận một lời mời kỳ lạ: thi đấu trong các trò chơi trẻ con. Đón chờ họ là một giải thưởng hấp dẫ, và những rủi ro chết người. họ phải liều mạng để trở thành người chiến thắng cuối cùng.', 'Korea', 50, 'FullHD', 2021, 9, 16, 'tro-choi-con-muc735.jpg', 534, 1, NULL, NULL),
(8, 'Quá Nhanh Quá Nguy Hiểm 9', 'qua-nhanh-qua-nguy-hiem-9', 3, 6, 'Quá Nhanh Quá Nguy Hiểm 9 là phim bom tấn chiếu rạp. Dominic Toretto đang có một cuộc sống yên tĩnh ngoài lưới điện với Letty và con trai của anh ta, cậu bé Brian, nhưng họ biết rằng nguy hiểm luôn rình rập ngay phía chân trời yên bình của họ. Lần này, mối đe dọa đó sẽ buộc Dom phải đối mặt với tội lỗi trong quá khứ của mình nếu anh ấy định cứu những người anh ấy yêu thương nhất.', 'United States', 135, 'HD', 2021, 1, 16, 'qua-nhanh-qua-nguy-hiem-9433.jpg', 6, 1, NULL, NULL),
(9, 'Money Weekly 48 Thật Không Thể Tin Nổi', 'money-weekly-48-that-khong-the-tin-noi-vtv24-1080p', 7, 5, 'VTV Money Weekly là những sản phẩm số mới của VTV Digital. Đây là những chuyên mục vừa kết hợp được thế mạnh của truyền hình vừa có cách thể hiện sáng tạo đang được ưu tiên phát triển tại VTV Digital. Vẫn dựa trên sản phẩm chủ lực được khán giả yêu thích lâu nay là các chương trình truyền hình, cách thức tiếp cận và phân phối nội dung trên các hạ tầng khác nhau đã chuyển biến theo hướng tích cực với sự điều phối hiệu quả của tòa soạn hội tụ và hỗ trợ tốt về hạ tầng.', 'Viet Nam', 10, 'HD', 2020, 1, 13, 'money-weekend12.jpg', 3, 1, NULL, NULL),
(10, 'Cô Nàng Tinh Nghịch', 'co-nang-tinh-nghich', 5, 2, 'Bộ phim Cô Nàng Tinh Nghịch thuộc thể loại phim Tình Cảm của Thái Lan. Bộ phim Thái Lan Cô Nàng Tinh Nghịch (My Little Saucy Girl) kể về Lukkaew là một cô gái luôn nuôi trong mình mơ ước xây dựng buôn làng theo phương pháp canh tác bền vững thân thiện với môi trường. Câu chuyện tình thú vị bắt đầu khi Saran – Trạm trưởng Trạm kiểm lâm Thung Chang San cùng với người bạn thân Thanu chuyển đến làm việc tại đây.', 'Thailand', 45, 'HD', 2021, 20, 16, 'kaen-kaew-200x300582.jpg', NULL, 1, NULL, NULL),
(11, 'Nữ Thanh Tra Tài Ba', 'nu-thanh-tra-tai-ba', 4, 2, 'Bộ phim Nữ Thanh Tra Tài Ba thuộc thể loại phim Hành động Hài Hước của Hàn Quốc 2. Bộ phim Nữ Thanh Tra Tài Ba là câu chuyện của một nữ thám tử khó tính và bất hảo, một ngày nọ mất hết trí nhớ. Con dâu của tập đoàn tài phiệt và một nữ công tố viên có khuôn mặt giống nhau, do mất trí nhớ họ đã hoán đổi cuộc sống cho nhau. Jo Yeon Joo là một công tố viên và là con gái duy nhất của kẻ hành động trong một nhóm xã hội đen.(Nữ Thanh Tra Tài Ba) ..', 'Korea', 60, 'HD', 2021, 4, 13, 'nu-thanh-tra-tai-ba289.jpg', 3, 1, NULL, NULL),
(12, 'Mặt Trời Đen', 'mat-troi-den', 6, 2, 'Bộ phim Mặt Trời Đen thuộc thể loại phim Hành Động của Hàn Quốc. Bộ phim Mặt Trời Đen (The Veil ) xoay quanh Han Ji Hyuk, một đặc vụ hiện trường ưu tú tại NIS (Cục Tình báo Quốc gia). Anh nổi tiếng vì vô cùng nhanh nhạy, thông thạo nhiều ngôn ngữ, có kỹ năng bắn súng và chiến đấu vô song. Sau khi mất tích một năm vì làm nhiệm vụ loại bỏ một tổ chức tội phạm, Han Ji Hyuk trở lại để tìm kiếm kẻ phản bội đã đẩy anh xuống địa ngục...', 'Korea', 31, 'FullHD', 2021, 12, 16, 'mat-troi-den822.jpg', 21, 1, NULL, NULL),
(13, 'Lập Trình Viên Đáng Yêu', 'lap-trinh-vien-dang-yeu', 9, 2, 'Bộ phim Lập Trình Viên Đáng Yêu thuộc thể loại phim Tình Cảm của Trung Quốc. Bộ phim Lập Trình Viên Đáng Yêu được chuyển thể từ bộ truyện tranh \"Lập Trình Viên Sao Mà Đáng Yêu Thế\". Câu chuyện tình thanh xuân vườn trường của cặp đôi Khương Dật Thành và Lục Ly. Vì mục tiêu cuộc đời mà họ liều mình nắm bắt tất cả cơ hội để kí hợp đồng hôn nhân một năm, và mọi chuyện dở khóc, dở cười bắt đầu từ đây.(Lập Trình Viên Đáng Yêu) .', 'China', 45, 'HD', 2021, 30, 13, 'lap-trinh-vien-dang-yeu501.jpg', 5, 1, NULL, NULL),
(14, 'Đẳng Cấp Thượng Lưu', 'dang-cap-thuong-luu', 5, 2, 'Bộ phim Đẳng Cấp Thượng Lưu thuộc thể loại phim Tình Cảm của Hàn Quốc. Bộ phim Đẳng Cấp Thượng Lưu (High Class) là cuộc chiến của những bà mẹ quyền lực, một drama huyền bí lột tả bộ mặt giả dối đằng sau bức tranh hoàn hảo về cuộc sống của những phụ nữ nằm trong top 0.1% dân số Hàn. Bắt đầu từ vụ án giết chồng của Song Yeo Wool (Jo Yeo Jeong thủ vai), dù không phải là hung thủ nhưng cô lại bị buộc tội vô cớ. Vốn là cựu luật sư nhưng cô lại mất đi tất cả chỉ sau một đêm bị buộc tội giết chồng.', 'Korea', 70, 'HD', 2021, 8, 13, 'dang-cap-thuong-luu685.jpg', NULL, 1, NULL, NULL),
(15, 'Khi Tình Yêu Gặp Nhà Khoa Học', 'khi-tinh-yeu-gap-nha-khoa-hoc', 9, 2, 'Bộ phim Khi Tình Yêu Gặp Nhà Khoa Học thuộc thể loại phim Tình Cảm của Trung Quốc. Bộ phim Khi Tình Yêu Gặp Nhà Khoa Học kể về chuyện tình giữa giáo sư Dương Lam Hàng (Lưu Dĩ Hào) và cô học trò nhỏ Bạch Lăng Lăng (Châu Vũ Đồng). Cả hai vô tình quen và yêu nhau qua mạng. Vì tình yêu này, Dương Lam Hàng từ nước Mỹ xa xôi quay về Trung Quốc làm việc để tìm Bạch Lăng Lăng. Thế nhưng, cả hai lại đối diện với nhau trong cương vị thầy giáo và học trò.', 'China', 45, 'HD', 2021, 18, 13, '500_668_996725_khi-tinh-yeu-gap-nha-khoa-hoc198.jpg', NULL, 1, NULL, NULL);

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
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id_admin_roles`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `tbl_category_movie`
--
ALTER TABLE `tbl_category_movie`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_genre_movie`
--
ALTER TABLE `tbl_genre_movie`
  ADD PRIMARY KEY (`genre_id`);

--
-- Chỉ mục cho bảng `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `seri_id` (`seri_id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Chỉ mục cho bảng `tbl_seri_movie`
--
ALTER TABLE `tbl_seri_movie`
  ADD PRIMARY KEY (`seri_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id_admin_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_category_movie`
--
ALTER TABLE `tbl_category_movie`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_genre_movie`
--
ALTER TABLE `tbl_genre_movie`
  MODIFY `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_seri_movie`
--
ALTER TABLE `tbl_seri_movie`
  MODIFY `seri_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
