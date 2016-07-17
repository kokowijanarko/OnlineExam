-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2016 at 03:35 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_jawaban`
--

CREATE TABLE `detail_jawaban` (
  `detailjawaban_id` int(11) NOT NULL,
  `detailjawaban_score_id` int(11) DEFAULT NULL,
  `detailjawaban_soal_id` int(11) DEFAULT NULL,
  `detailjawaban_jawaban` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jawaban`
--

INSERT INTO `detail_jawaban` (`detailjawaban_id`, `detailjawaban_score_id`, `detailjawaban_soal_id`, `detailjawaban_jawaban`) VALUES
(21, 27, 11, 'c'),
(22, 27, 10, 'a'),
(23, 28, 13, 'a'),
(24, 28, 14, 'b'),
(25, 28, 15, 'b'),
(26, 28, 16, 'a'),
(27, 28, 17, 'b'),
(28, 29, 9, 'b'),
(29, 29, 8, 'c'),
(30, 29, 10, 'a'),
(31, 29, 11, 'c'),
(32, 29, 12, 'd'),
(33, 30, 18, 'c'),
(34, 30, 19, 'a'),
(35, 30, 20, 'b'),
(36, 30, 21, 'b'),
(37, 30, 22, 'a'),
(38, 31, 9, 'b'),
(39, 31, 8, 'a'),
(40, 31, 10, 'b'),
(41, 31, 11, 'b'),
(42, 31, 12, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_name` varchar(100) DEFAULT NULL,
  `mapel_pass_score` float DEFAULT NULL,
  `mapel_duration` int(11) DEFAULT NULL,
  `mapel_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapel_name`, `mapel_pass_score`, `mapel_duration`, `mapel_desc`) VALUES
(6, 'Bahasa Indonesia', 70, 1, 'Bahasa Indonesia'),
(7, 'Bahasa Inggris', 75, 1, 'Bahasa Inggris'),
(8, 'Agama', 80, 1, 'Agama');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `typeuser` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `nama`, `email`, `password`, `divisi`, `typeuser`) VALUES
(6, 'Gunawan Setiawan', 'admin@gmail.com', '290892', 'admin', 'admin'),
(7, 'admin', 'cok@jan.com', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mini_config`
--

CREATE TABLE `mini_config` (
  `id_config` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `site_keyword` varchar(255) NOT NULL DEFAULT '',
  `site_description` text NOT NULL,
  `site_author` varchar(255) NOT NULL DEFAULT '',
  `site_url` varchar(255) NOT NULL DEFAULT '',
  `site_reason` varchar(100) NOT NULL DEFAULT '',
  `site_email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mini_config`
--

INSERT INTO `mini_config` (`id_config`, `site_title`, `site_keyword`, `site_description`, `site_author`, `site_url`, `site_reason`, `site_email`) VALUES
(1, '.::Ujian Online Calon Siswa Baru::.', '.::Ujian Online Calon Siswa Baru::.', '.::Ujian Online Calon Siswa Baru::.', 'Ujian Online Calon Siswa Baru', 'http://localhost/ujianonline', '.::Ujian Online Calon Siswa Baru::.', 'webmaster@localhost.com');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` varchar(12) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `na` float NOT NULL,
  `na1` float NOT NULL,
  `na2` float NOT NULL,
  `tol` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pencacah`
--

CREATE TABLE `pencacah` (
  `skrip` char(65) COLLATE utf8_bin NOT NULL,
  `cacah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pencacah`
--

INSERT INTO `pencacah` (`skrip`, `cacah`) VALUES
('/pegawai/user/index.php', 5),
('/pegawai/index.php', 24),
('/pegawai/admin/index.php', 4);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` bigint(20) NOT NULL,
  `score_user_id` varchar(200) NOT NULL,
  `score_mapel_id` int(11) DEFAULT NULL,
  `score_score` int(11) DEFAULT NULL,
  `score_answer_false` int(11) DEFAULT NULL,
  `score_answer_true` int(11) DEFAULT NULL,
  `score_answer_empty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `score_user_id`, `score_mapel_id`, `score_score`, `score_answer_false`, `score_answer_true`, `score_answer_empty`) VALUES
(27, '86', 1, 100, 0, 2, 0),
(28, '87', 6, 40, 3, 2, 0),
(29, '87', 7, 40, 3, 2, 0),
(30, '87', 8, 60, 2, 3, 0),
(31, '87', 7, 20, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soalid` int(150) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(2000) NOT NULL,
  `pilihan_b` varchar(2000) NOT NULL,
  `pilihan_c` varchar(2000) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soalid`, `mapel_id`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 0, 'D', 'siapakah bapak dari penjual soto dekat perempatan?', 'kartono', 'sukarto', 'bejo', '2'),
(9, 7, 'B', 'If you to see my family next weekend, give ___ my best regards and don’t forget to bring the gifts', 'us', 'them', 'its', 'it'),
(6, 0, 'B', 'mnbjnbh', 'nm nb', 'vcvxfgcg', 'nmkjnhkj', 'b bvc vb'),
(8, 7, 'C', 'In spite of her friends’ complaints, he decided to live with ___ girl friend in Los Angeles', 'him', 'her', 'his', 'our'),
(10, 7, 'D', 'I can’t understand ___ when they speak Spain. They seem weird. They should study more', 'me', 'his', 'her', 'them'),
(11, 7, 'D', 'We can find the magazine in the library. is very complete. We can find various books there', 'my', 'we', 'they', 'it'),
(12, 7, 'B', 'Nana felt worried about the children, so she asked ___ husband not to go abroad for the job', 'his', 'her', 'their', 'its'),
(13, 6, 'B', 'Di bawah ini adalah bagian – bagian yang harus ada pada surat dinas, Kecuali . . .', 'Kop Surat', 'Tembusan', 'Nomor Surat', 'Lampiran'),
(14, 6, 'C', 'Manakah di bawah ini yang merupakan kata baku ?', 'tekhnik', 'Organization', 'Kwitansi', 'kuitansi'),
(15, 6, 'B', 'Kalimat di bawah ini yang merupakan kalimat majemuk rapatan adalah ?', 'Ibu memarahi adik karena berbuat kenakalan', 'Paman datang dari kampung dengan membawa buah duku, rambutan, dan pisang.', 'Budi rajin belajar sehingga dia menjadi anak yang pintar.', 'Jeni memberikan adiknya uang supaya dia tidak menceritakan masalahnya kepada ayah.'),
(16, 6, 'A', 'Kalimat yang mengandung majas hiperbola adalah ?', 'Hutang Budi telah menumpuk hingga menjadi gunung.', 'Waktu terus berjalan tanpa henti.', 'Silahkan diterima pemberian kecil ini.', 'Indonesia meraih juara umum di kejuaraan bulu tangkis tingkat dunia'),
(17, 6, 'A', 'Kata lemari merupakan kata serapan dari bahasa ?', 'Arab', 'Belanda', 'Inggris', 'Spanyol'),
(18, 8, 'C', 'Bukit Tursina adalah tempat Nabi Musa AS menerima kitab dari ALLAH SWT untuk kaum:', 'Nasrani', 'Mayusi', 'Yahudi', 'Qurais'),
(19, 8, 'B', 'Potongan ayat atau kalimat yang berarti “kami telah menciptakan” adalah...', 'Al Amin', 'Kholakna', 'Laqod', 'Al Insyana'),
(20, 8, 'C', 'Perintah yang terdapat dalam QS Al Insyirah ayat 7 (tujuh) berarti didikan untuk bersikap:', 'Tegas dan berani', 'Percaya diri', 'Disiplin', 'Optimis'),
(21, 8, 'B', 'Suroh At Tin merupakan suroh:', 'Madaniyah', 'Makkiyah', 'Suroh yang terakhir', 'Hasanah'),
(22, 8, 'A', 'Batas antara alam dunia dengan alam akhirat disebut:', 'Alam barzah', 'Yaumul hisab', 'Yaumul ba’as', 'Yaumul mahsyar');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tlp` char(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jurusan` varchar(100) DEFAULT NULL,
  `nomor_peserta` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `nama`, `username`, `email`, `tlp`, `password`, `tanggal`, `jurusan`, `nomor_peserta`) VALUES
(85, 'koko wijanarko', 'koko', '', '0987678', '37f525e2b6fc3cb4abd882f708ab80eb', '2016-06-30 13:37:03', 'IPA', '12345'),
(83, 'Rere Juliansasi', 'rere', '', '098765543', '2a17731826edd7111390deae84b4c604', '2016-06-28 18:10:20', NULL, NULL),
(84, 'ceking aja', 'test', '', '0987654323456', '098f6bcd4621d373cade4e832627b4f6', '2016-06-30 04:14:54', NULL, NULL),
(86, 'surya wijanarko', 'surya', '', '0987656789', 'aff8fbcbf1363cd7edc85a1e11391173', '2016-06-30 13:43:56', 'IPA', '2014.0001'),
(87, 'heru', 'Heru M', '', '0876767787', '6aeef7a743b6ec9fdf4566e72694316a', '2016-06-30 09:23:37', 'IPS', '001'),
(88, 'badu', 'badu', '', '087739876578', '6aeef7a743b6ec9fdf4566e72694316a', '2016-07-07 18:20:02', 'IPS', '002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_jawaban`
--
ALTER TABLE `detail_jawaban`
  ADD PRIMARY KEY (`detailjawaban_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `mini_config`
--
ALTER TABLE `mini_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `pencacah`
--
ALTER TABLE `pencacah`
  ADD PRIMARY KEY (`skrip`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_jawaban`
--
ALTER TABLE `detail_jawaban`
  MODIFY `detailjawaban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mini_config`
--
ALTER TABLE `mini_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soalid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
