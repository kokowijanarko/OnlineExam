-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 04:11 PM
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
CREATE DATABASE IF NOT EXISTS `dbujian` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbujian`;

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
(3, 20, 2, 'd'),
(4, 20, 3, 'b'),
(5, 21, 2, 'a'),
(6, 21, 3, 'd'),
(7, 22, 2, 'c'),
(8, 22, 3, 'c'),
(9, 23, 2, 'a'),
(10, 23, 3, 'd'),
(13, 24, 2, 'd'),
(14, 24, 3, ''),
(15, 25, 2, ''),
(16, 25, 3, '');

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
(6, 'Bahasa Indonesia', 70, 90, 'Bahasa Indonesia'),
(7, 'Bahasa Inggris', 75, 90, 'Bahasa Inggris'),
(8, 'Agama', 80, 90, 'Agama');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id` varchar(20) NOT NULL,
  `kd_mp` varchar(30) NOT NULL,
  `nama_mp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id`, `kd_mp`, `nama_mp`) VALUES
('1', 'mp1', 'BAHASA INDONESIA'),
('2', 'mp2', 'BAHSA INGGRIS');

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
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` tinyint(4) NOT NULL,
  `q` text NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` bigint(20) NOT NULL,
  `score_nim` varchar(200) NOT NULL,
  `score_mapel_id` int(11) DEFAULT NULL,
  `score_score` int(11) DEFAULT NULL,
  `score_answer_false` int(11) DEFAULT NULL,
  `score_answer_true` int(11) DEFAULT NULL,
  `score_answer_empty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `score_nim`, `score_mapel_id`, `score_score`, `score_answer_false`, `score_answer_true`, `score_answer_empty`) VALUES
(1, '123', 2, 8, NULL, NULL, NULL),
(20, '1234', 2, 100, NULL, NULL, NULL),
(23, '1234', 2, 50, 1, 1, 0),
(22, '1234', 2, 0, NULL, NULL, NULL),
(21, '1234', 2, 50, NULL, NULL, NULL),
(24, '123', 2, 50, 0, 1, 0),
(25, '2014002', 2, 0, 0, 0, 0);

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
-- Table structure for table `tjawab`
--

CREATE TABLE `tjawab` (
  `nim` varchar(30) NOT NULL,
  `nilai` tinyint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab`
--

INSERT INTO `tjawab` (`nim`, `nilai`) VALUES
('201426386', 64),
('201426401', 64),
('201426360', 48),
('201426379', 52),
('201426366', 52),
('201426375', 52),
('201426332', 60),
('201426373', 56),
('201426349', 56),
('201426335', 60),
('201426356', 80),
('201426357', 68),
('201426307', 48),
('201426304', 72),
('201426368', 60),
('201426355', 44),
('201426377', 60),
('201426374', 60),
('201426261', 60),
('201426378', 52),
('201426282', 64),
('201426380', 56),
('201426363', 56),
('201426345', 40),
('201426323', 52),
('201426334', 48),
('201426330', 52),
('201426333', 44),
('201426389', 52),
('201426364', 68),
('201426288', 48),
('201426342', 52),
('201426367', 52),
('201426339', 48),
('201426348', 52),
('201426283', 64),
('201426351', 60),
('201426116', 52),
('201426376', 52),
('201426402', 44),
('201426352', 48),
('201426400', 48),
('201426394', 48),
('2014263472', 44),
('201426392', 56),
('2014263666', 68),
('201426023', 48),
('201426331', 48),
('201426341', 56),
('201426358', 70),
('201426382', 72),
('201426396', 72),
('201426370', 52),
('1', 4),
('3', 4),
('2015.2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tjawab1`
--

CREATE TABLE `tjawab1` (
  `nim` varchar(30) NOT NULL,
  `nilai1` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab1`
--

INSERT INTO `tjawab1` (`nim`, `nilai1`) VALUES
('201426386', '96'),
('201426401', '88'),
('201426373', '76'),
('201426356', '88'),
('201426357', '92'),
('201426377', '80'),
('201426349', '72'),
('201426335', '84'),
('201426378', '80'),
('201426360', '60'),
('201426366', '76'),
('201426375', '96'),
('201426332', '92'),
('201426307', '56'),
('201426379', '84'),
('201426396', '88'),
('201426400', '88'),
('201426342', '76'),
('201426304', '76'),
('201426382', '72'),
('201426368', '52'),
('201426363', '64'),
('2014263472', '28'),
('201426394', '36'),
('201426370', '68'),
('201426282', '80'),
('201426334', '36'),
('201426330', '36'),
('201426374', '76'),
('201426283', '56'),
('201426339', '32'),
('201426116', '48'),
('201426389', '68'),
('201426355', '44'),
('201426323', '80'),
('201426380', '80'),
('201426352', '76'),
('201426393', '92'),
('201426023', '92'),
('201426331', '84'),
('201426341', '88'),
('201426358', '70'),
('201426376', '54'),
('201426261', '72'),
('201426351', '72'),
('201426367', '80'),
('201426288', '60'),
('201426348', '68'),
('201426364', '80'),
('201426345', '68'),
('2014263666', '80'),
('201426392', '64'),
('201426402', '80'),
('201426333', '72'),
('1', '0'),
('3', '4'),
('2015.2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tjawab2`
--

CREATE TABLE `tjawab2` (
  `nim` varchar(30) NOT NULL,
  `nilai2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjawab2`
--

INSERT INTO `tjawab2` (`nim`, `nilai2`) VALUES
('201426373', '40'),
('201426386', '48'),
('201426375', '32'),
('2014263472', '28'),
('201426330', '28'),
('201426334', '28'),
('201426282', '36'),
('201426355', '32'),
('201426394', '24'),
('201426370', '36'),
('201426379', '28'),
('201426345', '20'),
('201426331', '20'),
('201426023', '32'),
('201426393', '36'),
('201426392', '28'),
('2014263666', '20'),
('201426401', '55'),
('201426368', '56'),
('201426307', '60'),
('201426358', '74'),
('201426349', '52'),
('201426335', '68'),
('201426304', '78'),
('201426382', '68'),
('201426366', '60'),
('201426332', '68'),
('201426360', '54'),
('201426400', '60'),
('201426396', '84'),
('201426356', '88'),
('201426357', '88'),
('201426352', '60'),
('201426376', '60'),
('201426261', '72'),
('201426339', '56'),
('201426342', '72'),
('201426116', '60'),
('201426351', '68'),
('201426367', '68'),
('201426288', '68'),
('201426348', '68'),
('201426364', '88'),
('201426380', '84\\'),
('201426323', '84'),
('201426363', '72'),
('201426283', '72'),
('201426341', '68'),
('201426374', '76'),
('201426402', '56'),
('201426333', '56'),
('1', '4'),
('3', '4'),
('2015.2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal`
--

CREATE TABLE `tsoal` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(2000) NOT NULL,
  `pilihan_b` varchar(2000) NOT NULL,
  `pilihan_c` varchar(2000) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal`
--

INSERT INTO `tsoal` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'c', 'Semua donor harus berbadan sehat. Sebagian donor darah memiliki golongan darah O, jadi ...', 'Sebagian orang yang bergolongan darah O dan menjadi donor darah berbadan sehat.', 'Semua donor harus memiliki golongan darah O dan berbadan sehat.', 'Semua donor darah yang memiliki golongan darah O harus berbadan sehat.', 'Yang berbadan sehat adalah yang memiliki golongan darah O dan menjadi donor darah.'),
(2, 'a', 'Hanya jika berbakat dan bekerja keras, seorang atlet dapat sukses sebagai atlet profesional. Berikut adalah kesimpulan yang secara logis dapat ditarik dari pernyataan di atas:', 'Jika seorang atlet berbakat dan bekerja keras, maka ia akan sukses sebagai atlet profesional.', 'Jika seorang atlet tidak sukses sebagai atlet profesional, maka ia tidak berbakat.', 'Jika seorang atlet tidak sukses sebagai atlet profesional, maka ia bukan pekerja keras.', 'Jika seorang atlet tidak berbakat atau tidak bekerja keras, maka ia tidak akan sukses sebagai atlet profesional.'),
(3, 'b', 'Murid yang pandai dalam matematika lebih mudah belajar bahasa. Orang yang tinggal di negara asing lebih lancar berbicara dalam bahasa yang dipakai di negara tersebut. Tati lancar berbicara dalam bahasa Inggris. Jadi :', 'Mungkin Tati bisu.', 'Mungkin Tati tidak pernah tinggal diluar negeri.', 'Tidak mungkin Tati pernah tinggal di luar negeri.', 'mungkin Tati pandai dalam matematik.'),
(4, 'd', 'Sarjana yang lulus dengan predikat cum laude harus memiliki indeks prestasi di atas 3,5. Beberapa mahasiswa yang menjadi sarjana lulus dengan indeks prestasi di bawah 3,5. Kesimpulan pernyataan di atas adalah :', 'Semua mahasiswa tidak lulus dengan predikat cum laude.', 'Semua mahasiswa yang menjadi sarjana lulus dengan predikat cum laude.', 'Semua mahasiswa yang menjadi sarjana memiliki indeks prestasi di atas 3,5', 'Beberapa mahasiswa yang menjadi sarjana lulus dengan predikat cum laude.');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal1`
--

CREATE TABLE `tsoal1` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(150) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(200) NOT NULL,
  `pilihan_b` varchar(200) NOT NULL,
  `pilihan_c` varchar(200) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal1`
--

INSERT INTO `tsoal1` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'A', 'Dalam pembagian raport semester ganjil beberapa bulan yang lalu, Upin meraih ranking pertama di kelasnya, sementara Dadan teman sebangkunya tidak termasuk dalam sepuluh besar. Setelah mengetahui Dadan tidak masuk 10 besar, sikap Upin berubah, ia tidak mau duduk sebangku lagi dengan Dadan karena menganggapnya anak bodoh. Sikap Upin termasuk sikap takabur, sikap yang seharusnya ditunjukkan oleh Upin adalah …', 'tetap duduk dengan Dadan dan memberikan motivasi untuk lebih berprestasi', 'pindah tempat duduk untuk menjuhi Dadan karena tidak termasuk 10 besar', 'mencari teman yang pintar yang sama-sama termasuk tingkat 10 besar', 'membicarakan mengenai kekurangan prestasi Dadan kepada orang lain'),
(2, 'B', 'Ketika Hafidz pulang sekolah, secara tidak sengaja kakinya dijilat seekor anjing. Tindakan yang harus dilakukun oleh Hafidz sesuai dengan syariat Islam adalah…', 'membiarkan saja karena anjing tersebut, karena anjing sama-sama makhluk Allah', 'mencuci kaki yang terkena najis 7 kali dan salah satunya dengan menggunakan tanah', 'cukup membersihkannya dengan memakai diterjen di bagian kaki yang terkena najis', 'mencuci dengan air bagian kaki yang terkena najis sampai bersih'),
(3, 'D', 'Sultan Agung Tirtayasa adalah Sultan Banten ke-5, yang selama 31 tahun memimpin rakyat Banten mempertahankan wilayah Banten dan melawan VOC. Beliau kemudian digantikan oleh putranya bernama Sultan Haji yang lemah dan menjadi boneka Belanda untuk melawan ayahnya sendiri, sehingga akhirnya wilayah Banten takluk kepada Belanda. Dari cuplikan sejarah di atas dapat diambil pelajaran yang baik adalah...', 'hasil karya kesultanan Islam di Indonesia merupakan sumber yang sangat berharga', 'senantiasa bersikap ramah kepada siapapun yang datang kepada kita', 'harus melakukan perbuatan yang bermanfaat bagi orang lain', 'berusaha menjaga persatuan dan kesatuan bangsa dari ancaman bangsa lain'),
(4, 'B', 'Langkah pertama yang dilakukan Rasulullah SAW dalam perjuangannya membangun kota Madinah adalah …', 'mendirikan istana', 'mendirikan masjid', 'mendirikan pasar', 'mendirikan panti asuhan'),
(5, 'B', 'Muhammad SAW sebagai pembawa ajaran Islam tidak hanya membawa masyarakat Arab keluar dari sifat jahiliyah, namun seluruh umat manusia di dunia dapat menuju ketauhidan, kemanusiaan dan keluhuran akhlak mulia. Hal itu menunjukan bahwa Rasulullah diutus sebagai….', 'uswatun hasanah', 'rahmatan lil’alamin 13', 'pembawa ajaran Islam', 'pembebas bangsa Arab');

-- --------------------------------------------------------

--
-- Table structure for table `tsoal2`
--

CREATE TABLE `tsoal2` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `pertanyaan` varchar(2000) NOT NULL,
  `pilihan_a` varchar(50) NOT NULL,
  `pilihan_b` varchar(50) NOT NULL,
  `pilihan_c` varchar(50) NOT NULL,
  `pilihan_d` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsoal2`
--

INSERT INTO `tsoal2` (`soalid`, `jawaban`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'd', 'Amin : Hi, Rais. I wish the eartquake had not hurt your family at all. Rais : Alhamdulilllah, not a', 'it''s okay', 'I don''t care', 'How lucky you are', 'I''m sorry to hear that'),
(2, 'c', 'Andi : I never see you so nervous like this. What happened to you? Malarangeng: I have to do', 'uncertainly', 'dissatisfaction', 'incapability', 'disagreement'),
(3, 'c', 'Zein : Let''s to see Mr. Ruiffi Ronny : ... I also want to see him.', 'Oh you are right', 'I don''t think I can', 'That''s a good idea', 'I like him very much'),
(4, 'd', 'Mila : Will you go with me to the movie Tonight? Euis : I''d love to but I don''t think I can. There', 'accepting ah offer', 'stating agreement', 'asking for permission', 'refusing an Invitation');

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
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `nama`, `username`, `email`, `tlp`, `password`, `tanggal`) VALUES
(82, 'koko wijanarko', 'koko', NULL, '0974646356', 'koko', '2016-06-28 17:41:04'),
(80, 'surya wijanarko', 'surya', NULL, '0812344757', 'surya', '2016-06-28 17:41:08'),
(83, 'Rere Juliansasi', 'rere', '', '098765543', '2a17731826edd7111390deae84b4c604', '2016-06-28 18:10:20');

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
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_mp`),
  ADD KEY `id` (`id`);

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
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tjawab`
--
ALTER TABLE `tjawab`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tjawab1`
--
ALTER TABLE `tjawab1`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tjawab2`
--
ALTER TABLE `tjawab2`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tsoal`
--
ALTER TABLE `tsoal`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tsoal1`
--
ALTER TABLE `tsoal1`
  ADD PRIMARY KEY (`soalid`);

--
-- Indexes for table `tsoal2`
--
ALTER TABLE `tsoal2`
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
  MODIFY `detailjawaban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soalid` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
