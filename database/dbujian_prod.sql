/*
SQLyog Ultimate v10.41 
MySQL - 5.5.5-10.1.9-MariaDB : Database - db_gun_123
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_gun_123` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_gun_123`;

/*Table structure for table `detail_jawaban` */

DROP TABLE IF EXISTS `detail_jawaban`;

CREATE TABLE `detail_jawaban` (
  `detailjawaban_id` int(11) NOT NULL AUTO_INCREMENT,
  `detailjawaban_score_id` int(11) DEFAULT NULL,
  `detailjawaban_soal_id` int(11) DEFAULT NULL,
  `detailjawaban_jawaban` char(2) DEFAULT NULL,
  PRIMARY KEY (`detailjawaban_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `detail_jawaban` */

insert  into `detail_jawaban`(`detailjawaban_id`,`detailjawaban_score_id`,`detailjawaban_soal_id`,`detailjawaban_jawaban`) values (21,27,11,'c'),(22,27,10,'a'),(23,28,13,'c'),(24,28,14,'c'),(25,28,15,'d'),(26,28,16,'a'),(27,28,17,'c'),(28,29,15,'d'),(29,29,13,'c'),(30,29,16,'b'),(31,29,14,'c'),(32,29,17,'b'),(33,30,14,'b'),(34,30,17,'b'),(35,30,13,'b'),(36,30,16,'c'),(37,30,15,'b'),(38,31,10,'b'),(39,31,11,'c'),(40,31,8,'c'),(41,31,12,'c'),(42,31,9,'b'),(43,32,17,'d'),(44,32,14,'d'),(45,32,16,'c'),(46,32,13,'b'),(47,32,15,'b');

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_name` varchar(100) DEFAULT NULL,
  `mapel_pass_score` float DEFAULT NULL,
  `mapel_duration` int(11) DEFAULT NULL,
  `mapel_desc` text,
  PRIMARY KEY (`mapel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mapel` */

insert  into `mapel`(`mapel_id`,`mapel_name`,`mapel_pass_score`,`mapel_duration`,`mapel_desc`) values (6,'Bahasa Indonesia',70,1,'Bahasa Indonesia'),(7,'Bahasa Inggris',75,90,'Bahasa Inggris'),(8,'Agama',80,90,'Agama');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `typeuser` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `member` */

insert  into `member`(`Id`,`nama`,`email`,`password`,`divisi`,`typeuser`) values (6,'Gunawan Setiawan','admin@gmail.com','290892','admin','admin'),(7,'admin','cok@jan.com','admin','admin','admin');

/*Table structure for table `mini_config` */

DROP TABLE IF EXISTS `mini_config`;

CREATE TABLE `mini_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) NOT NULL DEFAULT '',
  `site_keyword` varchar(255) NOT NULL DEFAULT '',
  `site_description` text NOT NULL,
  `site_author` varchar(255) NOT NULL DEFAULT '',
  `site_url` varchar(255) NOT NULL DEFAULT '',
  `site_reason` varchar(100) NOT NULL DEFAULT '',
  `site_email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `mini_config` */

insert  into `mini_config`(`id_config`,`site_title`,`site_keyword`,`site_description`,`site_author`,`site_url`,`site_reason`,`site_email`) values (1,'.::Ujian Online Calon Siswa Baru::.','.::Ujian Online Calon Siswa Baru::.','.::Ujian Online Calon Siswa Baru::.','Ujian Online Calon Siswa Baru','http://localhost/ujianonline','.::Ujian Online Calon Siswa Baru::.','webmaster@localhost.com');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` varchar(12) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `na` float NOT NULL,
  `na1` float NOT NULL,
  `na2` float NOT NULL,
  `tol` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `nilai` */

/*Table structure for table `pencacah` */

DROP TABLE IF EXISTS `pencacah`;

CREATE TABLE `pencacah` (
  `skrip` char(65) COLLATE utf8_bin NOT NULL,
  `cacah` int(11) NOT NULL,
  PRIMARY KEY (`skrip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pencacah` */

insert  into `pencacah`(`skrip`,`cacah`) values ('/pegawai/user/index.php',5),('/pegawai/index.php',24),('/pegawai/admin/index.php',4);

/*Table structure for table `score` */

DROP TABLE IF EXISTS `score`;

CREATE TABLE `score` (
  `score_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `score_user_id` varchar(200) NOT NULL,
  `score_mapel_id` int(11) DEFAULT NULL,
  `score_score` int(11) DEFAULT NULL,
  `score_answer_false` int(11) DEFAULT NULL,
  `score_answer_true` int(11) DEFAULT NULL,
  `score_answer_empty` int(11) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `score` */

insert  into `score`(`score_id`,`score_user_id`,`score_mapel_id`,`score_score`,`score_answer_false`,`score_answer_true`,`score_answer_empty`) values (32,'85',6,40,3,2,0),(31,'89',7,40,3,2,0),(29,'86',6,60,4,1,0),(30,'89',6,40,3,2,0),(28,'86',6,71,3,2,0);

/*Table structure for table `soal` */

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
  `soalid` int(150) NOT NULL AUTO_INCREMENT,
  `mapel_id` int(11) NOT NULL,
  `jawaban` varchar(500) NOT NULL,
  `pertanyaan` varchar(5000) NOT NULL,
  `pilihan_a` varchar(2000) NOT NULL,
  `pilihan_b` varchar(2000) NOT NULL,
  `pilihan_c` varchar(2000) NOT NULL,
  `pilihan_d` varchar(2000) NOT NULL,
  PRIMARY KEY (`soalid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `soal` */

insert  into `soal`(`soalid`,`mapel_id`,`jawaban`,`pertanyaan`,`pilihan_a`,`pilihan_b`,`pilihan_c`,`pilihan_d`) values (9,7,'B','If you to see my family next weekend, give ___ my best regards and don’t forget to bring the gifts','us','them','its','it'),(8,7,'C','In spite of her friends’ complaints, he decided to live with ___ girl friend in Los Angeles','him','her','his','our'),(10,7,'D','I can’t understand ___ when they speak Spain. They seem weird. They should study more','me','his','her','them'),(11,7,'D','We can find the magazine in the library. is very complete. We can find various books there','my','we','they','it'),(12,7,'B','Nana felt worried about the children, so she asked ___ husband not to go abroad for the job','his','her','their','its'),(13,6,'B','Di bawah ini adalah bagian – bagian yang harus ada pada surat dinas, Kecuali . . .','Kop Surat','Tembusan','Nomor Surat','Lampiran'),(14,6,'C','Manakah di bawah ini yang merupakan kata baku ?','tekhnik','Organization','Kwitansi','kuitansi'),(15,6,'B','Kalimat di bawah ini yang merupakan kalimat majemuk rapatan adalah ?','Ibu memarahi adik karena berbuat kenakalan','Paman datang dari kampung dengan membawa buah duku, rambutan, dan pisang.','Budi rajin belajar sehingga dia menjadi anak yang pintar.','Jeni memberikan adiknya uang supaya dia tidak menceritakan masalahnya kepada ayah.'),(16,6,'A','Kalimat yang mengandung majas hiperbola adalah ?','Hutang Budi telah menumpuk hingga menjadi gunung.','Waktu terus berjalan tanpa henti.','Silahkan diterima pemberian kecil ini.','Indonesia meraih juara umum di kejuaraan bulu tangkis tingkat dunia'),(17,6,'A','Kata lemari merupakan kata serapan dari bahasa ?','Arab','Belanda','Inggris','Spanyol'),(18,8,'C','Bukit Tursina adalah tempat Nabi Musa AS menerima kitab dari ALLAH SWT untuk kaum:','Nasrani','Mayusi','Yahudi','Qurais'),(19,8,'B','Potongan ayat atau kalimat yang berarti “kami telah menciptakan” adalah...','Al Amin','Kholakna','Laqod','Al Insyana'),(20,8,'C','Perintah yang terdapat dalam QS Al Insyirah ayat 7 (tujuh) berarti didikan untuk bersikap:','Tegas dan berani','Percaya diri','Disiplin','Optimis'),(21,8,'B','Suroh At Tin merupakan suroh:','Madaniyah','Makkiyah','Suroh yang terakhir','Hasanah'),(22,8,'A','Batas antara alam dunia dengan alam akhirat disebut:','Alam barzah','Yaumul hisab','Yaumul ba’as','Yaumul mahsyar');

/*Table structure for table `tuser` */

DROP TABLE IF EXISTS `tuser`;

CREATE TABLE `tuser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tlp` char(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jurusan` varchar(100) DEFAULT NULL,
  `nomor_peserta` varchar(100) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

/*Data for the table `tuser` */

insert  into `tuser`(`id`,`nama`,`username`,`email`,`tlp`,`password`,`tanggal`,`jurusan`,`nomor_peserta`) values (85,'koko wijanarko','koko','','0987678','37f525e2b6fc3cb4abd882f708ab80eb','2016-06-30 20:37:03','IPA','12345'),(83,'Rere Juliansasi','rere','','098765543','2a17731826edd7111390deae84b4c604','2016-06-29 01:10:20',NULL,NULL),(84,'ceking aja','test','','0987654323456','098f6bcd4621d373cade4e832627b4f6','2016-06-30 11:14:54',NULL,NULL),(86,'surya wijanarko','surya','','0987656789','aff8fbcbf1363cd7edc85a1e11391173','2016-06-30 20:43:56','IPA','2014.0001');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
