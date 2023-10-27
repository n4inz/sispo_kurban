-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2023 at 05:25 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdrive_sispo_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_meetings`
--

CREATE TABLE `agenda_meetings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `narasumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` time NOT NULL,
  `pengisi_acara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `sertifikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` bigint DEFAULT NULL,
  `niy_nigk` bigint DEFAULT NULL,
  `nuptk` bigint DEFAULT NULL,
  `jenis_ptk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_pengangkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_pengangkatan` date DEFAULT NULL,
  `lembaga_pengangkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_cpns` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_pns` date DEFAULT NULL,
  `sumber_gaji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_pegawai` int DEFAULT NULL,
  `kartu_suami` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_istri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` bigint DEFAULT NULL,
  `kk` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `status_pegawai`, `alamat`, `nip`, `niy_nigk`, `nuptk`, `jenis_ptk`, `sk_pengangkatan`, `tmt_pengangkatan`, `lembaga_pengangkatan`, `sk_cpns`, `tmt_pns`, `sumber_gaji`, `kartu_pegawai`, `kartu_suami`, `kartu_istri`, `ktp`, `kk`, `created_at`, `updated_at`) VALUES
('0c1e96d2-d552-3686-954e-d0890e87c403', 'Trevor Gutkowski', 'PNS Depang', NULL, 4882503, 926818, 6127, 'Kepala Sekolah', '024119', '1985-02-21', 'Komite Sekolah', '41211293', '2019-10-26', 'APBN', 132207346, '106112516', '320100300', NULL, NULL, '2023-03-24 23:41:35', '2023-03-24 23:41:35'),
('76dbc9b3-ec6e-31b8-a687-33480305c039', 'Chanelle Heller', 'Guru Honor', NULL, 9431318, 790455, 21189, 'Guru Magang', '471485', '2002-04-12', 'Pemerintah Kota', '69834409', '1996-11-24', 'APBN', 713799823, '104426384', '600282395', NULL, NULL, '2023-03-24 23:41:36', '2023-03-24 23:41:36'),
('9b07aa15-5055-3503-bf09-0f439b00837e', 'Anibal Doyle', 'PTT Kab Kota', NULL, 7754888, 718587, 99956, 'Guru Kelas', '500184', '1980-08-15', 'Pemerintah Provinsi', '89737909', '2021-11-12', 'APBN', 789809715, '516804149', '102121578', NULL, NULL, '2023-03-24 23:41:35', '2023-03-24 23:41:35'),
('a7e10593-ee2f-33e5-8db5-3c2654efc2f9', 'Verna Becker', 'PTT Kab Kota', NULL, 8932828, 311797, 35919, 'Tenaga Administrasi Sekolah', '100740', '2011-07-12', 'Ketua Yayasan', '57639772', '1984-03-02', 'Yayasan', 327935282, '613660859', '720404530', NULL, NULL, '2023-03-24 23:41:33', '2023-03-24 23:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_activities`
--

CREATE TABLE `employee_activities` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kegiatan` date DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hewan_kurbans`
--

CREATE TABLE `hewan_kurbans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `harga_per_orang` int NOT NULL,
  `jumlah_peserta` int NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hewan_kurbans`
--

INSERT INTO `hewan_kurbans` (`id`, `nama_hewan`, `jenis`, `harga`, `harga_per_orang`, `jumlah_peserta`, `ket`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sapi', 'Beatae', 830000, 120000, 19, 'Tempora dolore qui q', 0, '2023-10-21 03:40:00', '2023-10-20 23:47:31', '2023-10-21 03:40:00'),
(2, 'Sapi', 'Deserunt non qui dol', 60, 59, 73, 'Libero libero ut eli', 0, NULL, '2023-10-21 03:34:41', '2023-10-21 03:34:41'),
(3, 'Sapi', 'Fuga Architecto qui', 13, 26, 43, 'Et aut dolor dolorem', 0, NULL, '2023-10-21 03:40:07', '2023-10-21 03:40:07'),
(4, 'Sapi', 'Minus ipsum beatae e', 9, 80, 31, 'Alias accusantium is', 0, NULL, '2023-10-21 03:40:12', '2023-10-21 03:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `ijazah`
--

CREATE TABLE `ijazah` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int NOT NULL,
  `nisn` bigint NOT NULL,
  `no_peserta_un` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hewans`
--

CREATE TABLE `jenis_hewans` (
  `id` bigint UNSIGNED NOT NULL,
  `hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_hewans`
--

INSERT INTO `jenis_hewans` (`id`, `hewan`, `jenis`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Belum Selesai', 'Beatae doloremque el', NULL, '2023-10-20 23:47:31', '2023-10-20 23:47:31'),
(2, 'Sapi', 'Deserunt non qui dol', NULL, '2023-10-21 03:34:41', '2023-10-21 03:34:41'),
(3, 'Sapi', 'Fuga Architecto qui', NULL, '2023-10-21 03:40:07', '2023-10-21 03:40:07'),
(4, 'Sapi', 'Minus ipsum beatae e', NULL, '2023-10-21 03:40:12', '2023-10-21 03:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date DEFAULT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `pengirim`, `jenis`, `no_surat`, `tgl_surat`, `tgl_terima`, `perihal`, `sifat`, `lampiran`, `created_at`, `updated_at`) VALUES
('c6e69d99-5c52-42fb-a151-7bbc5b4f7dfd', 'Non quasi et sint vo', 'Surat Masuk', 'Voluptatem ut sint d', '2015-03-09', '1999-07-10', 'Non labore maxime pe', 'Biasa', 'In quia excepteur cu', '2023-10-20 13:39:41', '2023-10-20 13:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `letter_dispositions`
--

CREATE TABLE `letter_dispositions` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `respon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notula_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pimpinan_rapat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_hadir` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_02_21_032203_create_employees_table', 1),
(4, '2022_02_21_032656_create_employee_activities_table', 1),
(5, '2022_02_22_060449_create_certificates_table', 1),
(6, '2022_02_22_093629_create_meetings_table', 1),
(7, '2022_02_22_093901_create_agenda_meetings_table', 1),
(8, '2022_02_22_094133_create_notulas_table', 1),
(9, '2022_02_22_094956_create_visit_letters_table', 1),
(10, '2022_02_22_100752_create_visit_documentations_table', 1),
(11, '2022_03_08_191400_create_letters_table', 1),
(12, '2022_04_18_101812_create_ijazah_table', 1),
(13, '2022_06_02_092212_create_students_table', 1),
(14, '2022_06_03_132306_letter_dispositions', 1),
(15, '2023_10_21_013440_alter_column_email_on_table_users', 2),
(16, '2023_10_21_073347_create_hewan_kurbans_table', 3),
(17, '2023_10_21_074330_create_jenis_hewans_table', 4),
(18, '2023_10_21_075827_alter_column_status_on_table_hewan_kurbans', 5),
(19, '2023_10_21_091506_alter_column_harga_per_orang_on_table_hewan_kurbans', 6),
(20, '2023_10_21_212856_alter_coulum_cupon_on_table_users', 7),
(21, '2023_10_21_215906_create_user_paket_kurbans_table', 8),
(22, '2023_10_22_023219_later_colum_alamat_on_table_users', 9),
(23, '2023_10_22_061706_alter_colum_status_paid_on_table_user_paket_kurbans', 10),
(24, '2023_10_22_083413_alter_column_bukti_img_on_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notulas`
--

CREATE TABLE `notulas` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `presensi` int NOT NULL,
  `pembukaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan_rapat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penutup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pokok_pembahasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_pembahasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` bigint NOT NULL,
  `nis` int NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userable_id`, `email`, `name`, `username`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `cupon`, `alamat`) VALUES
('0f0fae7a-a253-44e4-ae96-2517d23bceb0', '6c13cf83-2ee4-41f1-959f-b3f353daedd5', 'gewydiq@mailinator.com', 'Vel est architecto', 'vel2033', '$2y$10$jJRb.tPkwQqouU.gjhluBeHh0tcc6pL/wWJXZDT6Xmd/EGQCa3Wwe', 'STUDENT', 1, NULL, '2023-10-21 18:40:05', '2023-10-21 18:40:05', 'vel2033', 'Culpa magna corporis'),
('130498be-3f7b-498a-a782-9392c527bcd1', '7c2e4d1d-9f0b-44e5-be1a-70a5ee7ba131', 'tedibig@mailinator.com', 'Magna voluptatem ani', 'magna7359', '$2y$10$fhlECR2x7nQm3k4/WgVRoueCE6D9QYFXSLH9/9CbTLBf2e6fW/U0a', 'STUDENT', 1, NULL, '2023-10-21 14:34:26', '2023-10-21 14:34:26', '$2y$10$dPo.aynx9Zghj.rOPJeadek01.MznQNamOta9.PaDMO3mLneVMQ2u', NULL),
('1eb27308-9497-37f8-9e94-1120faf02a0e', '9b07aa15-5055-3503-bf09-0f439b00837e', 'panitia@gmail.com', 'Anibal Doyle', 'panitia', '$2y$10$rN0aLB1TVI/Je0zk5AisCuSxBwU5VJs39EqGPwIwQNfu/R5vr2aza', 'EMPLOYEE', 1, NULL, '2023-03-24 23:41:35', '2023-03-24 23:41:35', NULL, NULL),
('1fcece5f-e231-4b35-b532-493c64f8ab87', '6ddf19f1-41fb-498d-a452-11a1f48b649a', 'nujyne@mailinator.com', 'Aut vero explicabo', 'aut8672', '$2y$10$VUfziMsd4qePxSwt7pnQJOtOow94dGjntcy3KPpHATvMO1rSSwgP6', 'STUDENT', 1, NULL, '2023-10-21 15:23:32', '2023-10-21 15:23:32', 'aut8672', NULL),
('2e5618cd-5b9b-45b9-b623-2c79a43ebeec', 'fc99a2ac-1f7a-4a20-9f9e-a1df2130575b', 'kibuce@mailinator.com', 'Nemo nisi ut officia', 'nemo1004', '$2y$10$swsb5jYp40LY0iaeRArx3uyGyMwVqs7cPx4exKFSk7AkoTOHPtJmG', 'STUDENT', 1, NULL, '2023-10-21 17:44:50', '2023-10-21 17:44:50', 'nemo1004', NULL),
('41de9d8f-8008-4106-9c30-bbb9422232d1', '7f180355-d29d-44cb-9930-e3f10fe79d30', 'kezarinivu@mailinator.com', 'Quae delectus sunt', 'quae5665', '$2y$10$vAKGM9q6DQHezwLAXsPXx.ORLje9.ZzfAVm2FA2/0txpDCS9BCEZS', 'STUDENT', 1, NULL, '2023-10-21 15:31:27', '2023-10-21 15:31:27', 'quae5665', NULL),
('552ff1c9-8fb0-465e-855d-a3504324a6f1', 'a80c10d4-31b6-4c03-b669-31c1171de7e4', 'qefuzy@mailinator.com', 'Ea excepturi non rer', 'ea1223', '$2y$10$awvCCWEchNxTTSkNySAbj.y.GTEdRxHUB.fM9HzKNuY4cgiW4QjsW', 'STUDENT', 1, NULL, '2023-10-21 17:40:11', '2023-10-21 17:40:11', 'ea1223', NULL),
('8e1629ae-fbea-447b-aaf1-8aac711e0f29', 'a273e913-fa52-4ddc-b8e1-439c54b7a94a', 'syqocy@mailinator.com', 'Cillum sint minus mo', 'cillum5199', '$2y$10$wm9YwyoLzhy1QD9uGQN0ReyVG6uPtv24vVjXDjMMOkwBa55QuJvIO', 'STUDENT', 1, NULL, '2023-10-21 15:30:53', '2023-10-21 15:30:53', 'cillum5199', NULL),
('b9ee0e82-9d72-45d0-8069-e58ace87c6f8', '168ffedc-903d-4852-a5e2-d64cc71d7f17', 'syfuxotycy@mailinator.com', 'Quo voluptas assumen', 'quo4763', '$2y$10$a4islF4ss544ACB5K2WrVOODlSOjq/tk0QruxbIRF1V/0n1QU5/oi', 'STUDENT', 1, NULL, '2023-10-21 17:41:56', '2023-10-21 17:41:56', 'quo4763', NULL),
('bcf84e82-e633-3a6c-b707-e252a4e5a171', '76dbc9b3-ec6e-31b8-a687-33480305c039', 'user@gmail.com', 'Chanelle Heller', 'user', '$2y$10$rN0aLB1TVI/Je0zk5AisCuSxBwU5VJs39EqGPwIwQNfu/R5vr2aza', 'STUDENT', 1, NULL, '2023-03-24 23:41:36', '2023-03-24 23:41:36', NULL, NULL),
('e622c53d-dfac-34a4-acd3-7bdabf07e649', 'a7e10593-ee2f-33e5-8db5-3c2654efc2f9', 'admin@gmail.com', 'Verna Becker', 'admin', '$2y$10$rN0aLB1TVI/Je0zk5AisCuSxBwU5VJs39EqGPwIwQNfu/R5vr2aza', 'ADMIN', 1, NULL, '2023-03-24 23:41:33', '2023-03-24 23:41:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_paket_kurbans`
--

CREATE TABLE `user_paket_kurbans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hewan_kurbans_id` bigint NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_paid` int NOT NULL DEFAULT '0',
  `jumlah_bayar` int DEFAULT NULL,
  `resi_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_paket_kurbans`
--

INSERT INTO `user_paket_kurbans` (`id`, `user_id`, `hewan_kurbans_id`, `deleted_at`, `created_at`, `updated_at`, `status_paid`, `jumlah_bayar`, `resi_img`) VALUES
(3, '1fcece5f-e231-4b35-b532-493c64f8ab87', 4, '2023-10-24 14:04:35', '2023-10-21 15:23:32', '2023-10-24 14:04:35', 0, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg'),
(4, '8e1629ae-fbea-447b-aaf1-8aac711e0f29', 4, NULL, '2023-10-21 15:30:53', '2023-10-22 13:30:02', 1, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg'),
(5, '41de9d8f-8008-4106-9c30-bbb9422232d1', 2, '2023-10-24 14:04:41', '2023-10-21 15:31:27', '2023-10-24 14:04:41', 0, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg'),
(6, '552ff1c9-8fb0-465e-855d-a3504324a6f1', 3, NULL, '2023-10-21 17:40:11', '2023-10-23 15:13:56', 1, 200000, '1698101730_56ae1e7facc52.jpeg'),
(7, 'b9ee0e82-9d72-45d0-8069-e58ace87c6f8', 2, NULL, '2023-10-21 17:41:56', '2023-10-23 15:12:49', 2, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg'),
(8, '2e5618cd-5b9b-45b9-b623-2c79a43ebeec', 2, NULL, '2023-10-21 17:44:50', '2023-10-21 17:44:50', 2, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg'),
(9, '0f0fae7a-a253-44e4-ae96-2517d23bceb0', 3, NULL, '2023-10-21 18:40:05', '2023-10-24 14:03:23', 0, 200000, '1698010202_312806603_2517484821738645_4013354508290473486_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visit_documentations`
--

CREATE TABLE `visit_documentations` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_letters`
--

CREATE TABLE `visit_letters` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_peserta` int NOT NULL,
  `dokumentasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_meetings`
--
ALTER TABLE `agenda_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_activities`
--
ALTER TABLE `employee_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hewan_kurbans`
--
ALTER TABLE `hewan_kurbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_hewans`
--
ALTER TABLE `jenis_hewans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_dispositions`
--
ALTER TABLE `letter_dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notulas`
--
ALTER TABLE `notulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_paket_kurbans`
--
ALTER TABLE `user_paket_kurbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_documentations`
--
ALTER TABLE `visit_documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_letters`
--
ALTER TABLE `visit_letters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hewan_kurbans`
--
ALTER TABLE `hewan_kurbans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_hewans`
--
ALTER TABLE `jenis_hewans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_paket_kurbans`
--
ALTER TABLE `user_paket_kurbans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
