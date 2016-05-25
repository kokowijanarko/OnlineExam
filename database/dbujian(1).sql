-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2016 at 08:10 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--
--CREATE IF NOT EXISTS dbujian;

CREATE TABLE IF NOT EXISTS `matkul` (
  `id` varchar(20) NOT NULL,
  `kd_mp` varchar(30) NOT NULL,
  `nama_mp` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_mp`),
  KEY `id` (`id`)
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

CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `typeuser` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `nama`, `email`, `password`, `divisi`, `typeuser`) VALUES
(6, 'Gunawan Setiawan', 'admin@gmail.com', '290892', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mini_config`
--

CREATE TABLE IF NOT EXISTS `mini_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `site_keyword` varchar(255) NOT NULL DEFAULT '',
  `site_description` text NOT NULL,
  `site_author` varchar(255) NOT NULL DEFAULT '',
  `site_url` varchar(255) NOT NULL DEFAULT '',
  `site_reason` varchar(100) NOT NULL DEFAULT '',
  `site_email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mini_config`
--

INSERT INTO `mini_config` (`id_config`, `site_title`, `site_keyword`, `site_description`, `site_author`, `site_url`, `site_reason`, `site_email`) VALUES
(1, '.::Ujian Online Calon Siswa Baru::.', '.::Ujian Online Calon Siswa Baru::.', '.::Ujian Online Calon Siswa Baru::.', 'Ujian Online Calon Siswa Baru', 'http://localhost/ujianonline', '.::Ujian Online Calon Siswa Baru::.', 'webmaster@localhost.com');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
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

CREATE TABLE IF NOT EXISTS `pencacah` (
  `skrip` char(65) COLLATE utf8_bin NOT NULL,
  `cacah` int(11) NOT NULL,
  PRIMARY KEY (`skrip`)
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

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `q` text NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tjawab`
--

CREATE TABLE IF NOT EXISTS `tjawab` (
  `nim` varchar(30) NOT NULL,
  `nilai` tinyint(20) NOT NULL,
  PRIMARY KEY (`nim`)
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

CREATE TABLE IF NOT EXISTS `tjawab1` (
  `nim` varchar(30) NOT NULL,
  `nilai1` varchar(20) NOT NULL,
  PRIMARY KEY (`nim`)
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

CREATE TABLE IF NOT EXISTS `tjawab2` (
  `nim` varchar(30) NOT NULL,
  `nilai2` varchar(20) NOT NULL,
  PRIMARY KEY (`nim`)
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

CREATE TABLE IF NOT EXISTS `tsoal` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(2000) NOT NULL,
  `pilihan_b` varchar(2000) NOT NULL,
  `pilihan_c` varchar(2000) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL,
  PRIMARY KEY (`soalid`)
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

CREATE TABLE IF NOT EXISTS `tsoal1` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(150) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(200) NOT NULL,
  `pilihan_b` varchar(200) NOT NULL,
  `pilihan_c` varchar(200) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL,
  PRIMARY KEY (`soalid`)
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

CREATE TABLE IF NOT EXISTS `tsoal2` (
  `soalid` int(150) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `pertanyaan` varchar(2000) NOT NULL,
  `pilihan_a` varchar(50) NOT NULL,
  `pilihan_b` varchar(50) NOT NULL,
  `pilihan_c` varchar(50) NOT NULL,
  `pilihan_d` varchar(50) NOT NULL,
  PRIMARY KEY (`soalid`)
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

CREATE TABLE IF NOT EXISTS `tuser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tlp` char(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `nim` (`nim`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `nim`, `nama`, `kelas`, `tlp`, `password`, `tanggal`) VALUES
(9, '201126067', 'Steven Gerrard', 'Teknik Informatika', '08123456678', 'rahasia', '2014-06-14'),
(10, '201426375', 'Ilham Hamdani', 'Office Management', '085659623926', '5513', '2014-06-14'),
(11, '201426331', 'heru gunawan', 'Teknik Informatika', '085294234078', '112233', '2014-06-14'),
(12, '201426023', 'novi hendriyana', 'Teknik Informatika', '085310377339', 'novihendriyana', '2014-06-14'),
(57, '201426333', 'Rahmat Darmawan', 'Teknik Otomotif', '081221454004', 'rahmat', '2014-06-14'),
(77, '2015.2', 'Rahel', 'IPA', '08779823334', '123456', '2016-02-06'),
(76, '2015.1', 'Sahmad', 'IPA', '08654783333', '123456', '2016-02-06'),
(75, '8', 'Lolita', 'IPA', '08976856234', '12345678', '2016-02-06'),
(74, '6', 'Gery', 'IPA', '087738538077', '123456', '2016-02-05'),
(73, '5', 'Rasih', 'IPA', '087720045416', '290892', '2016-02-05'),
(72, '4', 'Gangga', 'IPA', '087720045416', '290892', '2016-02-04'),
(71, '3', 'Hengky', 'IPA', '087720045416', '290892', '2016-02-03'),
(70, '2', 'Rangga', 'IPS', '087720045416', '290892', '2016-02-03'),
(69, '1', 'Rasty', 'IPA', '087720045416', '290892', '2016-02-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
