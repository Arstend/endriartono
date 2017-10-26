-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2017 pada 15.29
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `endriartono`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_14_151330_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `feature_img`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Selamat datang', 'https://www.phinisi-13.com/images/upload/2017/Tahun-Baru-Hijriah-1439-H.jpg', '<p>Segenap Staff dan Manajemen PT. Melia Sehat Sejahtera Mengucapkan :</p><p>Selamat Tahun Baru Hijriah<br><b>1 Muharram 1439 H (2017)</b></p>', '2017-10-15 06:28:22', '2017-10-15 06:28:22'),
(2, 'Tentang Agama Buddha di Indonesia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Borobudur_monks_1.jpg/250px-Borobudur_monks_1.jpg', '<p><b>Agama Buddha di Indonesia</b> memiliki sejarah panjang. Di <a href=\"/wiki/Indonesia\" title=\"Indonesia\">Indonesia</a> selama era administrasi <a href=\"/wiki/Orde_Baru\" title=\"Orde Baru\">Orde Baru</a>, terdapat lima agama resmi di Indonesia, menurut ideologi negara Pancasila, salah satunya termasuk <a href=\"/wiki/Agama_Buddha\" title=\"Agama Buddha\">Agama Buddha</a>. Presiden <a href=\"/wiki/Soeharto\" title=\"Soeharto\">Soeharto</a> telah menganggap <a href=\"/wiki/Agama_Buddha\" title=\"Agama Buddha\">agama Buddha</a> dan <a href=\"/wiki/Agama_Hindu\" title=\"Agama Hindu\">Hindu</a> sebagai agama klasik Indonesia.<sup class=\"noprint Inline-Template\"><span title=\"Kalimat yang diikuti tag ini membutuhkan rujukan.\" style=\"white-space: nowrap;\">[<i><a href=\"/wiki/Wikipedia:Kutip_sumber_tulisan\" title=\"Wikipedia:Kutip sumber tulisan\">butuh rujukan</a></i>]</span></sup></p><p><a href=\"/wiki/Agama_Buddha\" title=\"Agama Buddha\">Agama Buddha</a> merupakan salah satu agama tertua yang ada di dunia. Agama buddha berasal dari <a href=\"/wiki/India\" title=\"India\">India</a>, tepatnya <a href=\"/wiki/Nepal\" title=\"Nepal\">Nepal</a> sejak abad ke-6 SM dan tetap bertahan hingga sekarang. Agama Buddha berkembang cukup baik di daerah <a href=\"/wiki/Asia\" title=\"Asia\">Asia</a> dan telah menjadi agama mayoritas di beberapa negara, seperti <a href=\"/wiki/Taiwan\" title=\"Taiwan\">Taiwan</a>, <a href=\"/wiki/Thailand\" title=\"Thailand\">Thailand</a>, <a href=\"/wiki/Myanmar\" title=\"Myanmar\">Myanmar</a> dan lainnya. Agama Buddha kemudian juga masuk ke <a href=\"/wiki/Nusantara\" title=\"Nusantara\">nusantara</a> (sekarang Indonesia) dan menjadi salah satu agama tertua yang ada di <a href=\"/wiki/Indonesia\" title=\"Indonesia\">Indonesia</a> saat ini.</p><p>Buddhisme yang menyebar di nusantara pada awalnya adalah sebuah keyakinan <a href=\"/wiki/Intelektual\" class=\"mw-redirect\" title=\"Intelektual\">intelektual</a>, dan hanya sedikit berkaitan dengan <a href=\"/wiki/Supranatural\" class=\"mw-redirect\" title=\"Supranatural\">supranatural</a>. Namun dalam prosesnya, kebutuhan <a href=\"/wiki/Politik\" title=\"Politik\">politik</a>, dan keinginan emosional pribadi untuk terlindung dari bahaya-bahaya di dunia oleh sosok dewa yang kuat, telah menyebabkan modifikasi dalam agama Buddha. Dalam banyak hal, Buddhisme adalah sangat individualistis, yaitu semua individu, baik pria maupun wanita bertanggung jawab untuk <a href=\"/wiki/Spiritual\" class=\"mw-redirect mw-disambig\" title=\"Spiritual\">spiritualitas</a> mereka sendiri. Siapapun bisa bermeditasi sendirian; <a href=\"/wiki/Candi\" title=\"Candi\">candi</a> tidak diperlukan, dan tidak ada <a href=\"/wiki/Pendeta\" title=\"Pendeta\">pendeta</a> yang diperlukan untuk bertindak sebagai perantara. Masyarakat menyediakan <a href=\"/wiki/Pagoda\" title=\"Pagoda\">pagoda</a> dan <a href=\"/wiki/Kuil\" title=\"Kuil\">kuil</a>-kuil hanya untuk menginspirasi kerangka pikiran yang tepat untuk membantu umat dalam pengabdian dan <a href=\"/w/index.php?title=Kesadaran_diri&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Kesadaran diri (halaman belum tersedia)\">kesadaran diri</a> mereka.</p><p>Meskipun di Indonesia berbagai aliran melakukan pendekatan pada ajaran Buddha dengan cara-cara yang berbeda, fitur utama dari agama Buddha di Indonesia adalah pengakuan dari \"<a href=\"/wiki/Empat_Kebenaran_Mulia\" title=\"Empat Kebenaran Mulia\">Empat Kebenaran Mulia</a>\" dan \"<a href=\"/wiki/Jalan_Utama_Berunsur_Delapan\" title=\"Jalan Utama Berunsur Delapan\">Jalan Utama Berunsur Delapan</a>\". Empat Kebenaran Mulia melibatkan pengakuan bahwa semua <a href=\"/w/index.php?title=Keberadaan&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Keberadaan (halaman belum tersedia)\">keberadaan</a> dipenuhi <a href=\"/w/index.php?title=Penderitaan&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Penderitaan (halaman belum tersedia)\">penderitaan</a>; asal mula penderitaan adalah keinginan untuk objek <a href=\"/w/index.php?title=Duniawi&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Duniawi (halaman belum tersedia)\">duniawi</a>; penderitaan dihentikan pada saat keinginan berhenti; dan Jalan Utama Berunsur Delapan mengarah ke pencerahan. Jalan Utama Berunsur Delapan mendatangkan pandangan, penyelesaian, ucapan, perilaku, mata pencaharian, usaha, perhatian, dan konsentrasi yang sempurna.</p>', '2017-10-26 08:26:56', '2017-10-26 08:26:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@sekolahkasihmaitreya.sch.id', '$2y$10$ZHLDk9iwL9ilCXEIRRIOburVnr91ltoprHoXt/8b7ZkcdDek9YJPi', 'eAsAQUjxB60Vpnql3IESNPsrKe90R9zf4nKMZkNqT16A7SX9DSQL2doy3863', '2017-10-16 00:49:28', '2017-10-16 00:49:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
