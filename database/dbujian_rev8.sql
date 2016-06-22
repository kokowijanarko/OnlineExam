/*
SQLyog Ultimate v10.41 
MySQL - 5.5.5-10.1.9-MariaDB : Database - dbujian
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbujian` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbujian`;

/*Table structure for table `detail_jawaban` */

DROP TABLE IF EXISTS `detail_jawaban`;

CREATE TABLE `detail_jawaban` (
  `detailjawaban_id` int(11) NOT NULL AUTO_INCREMENT,
  `detailjawaban_score_id` int(11) DEFAULT NULL,
  `detailjawaban_soal_id` int(11) DEFAULT NULL,
  `detailjawaban_jawaban` char(2) DEFAULT NULL,
  PRIMARY KEY (`detailjawaban_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `detail_jawaban` */

insert  into `detail_jawaban`(`detailjawaban_id`,`detailjawaban_score_id`,`detailjawaban_soal_id`,`detailjawaban_jawaban`) values (3,20,2,'d'),(4,20,3,'b'),(5,21,2,'a'),(6,21,3,'d'),(7,22,2,'c'),(8,22,3,'c'),(9,23,2,'a'),(10,23,3,'d'),(13,24,2,'d'),(14,24,3,''),(15,25,2,''),(16,25,3,'');

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_name` varchar(100) DEFAULT NULL,
  `mapel_pass_score` float DEFAULT NULL,
  `mapel_duration` int(11) DEFAULT NULL,
  `mapel_desc` text,
  PRIMARY KEY (`mapel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `mapel` */

insert  into `mapel`(`mapel_id`,`mapel_name`,`mapel_pass_score`,`mapel_duration`,`mapel_desc`) values (1,'IPA',80,120,'Ilmu pengetahuan Alam'),(2,'cek',75,90,'cek'),(5,'Geografi',75,90,'Geografi');

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
  `score_nim` varchar(200) NOT NULL,
  `score_mapel_id` int(11) DEFAULT NULL,
  `score_score` int(11) DEFAULT NULL,
  `score_answer_false` int(11) DEFAULT NULL,
  `score_answer_true` int(11) DEFAULT NULL,
  `score_answer_empty` int(11) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `score` */

insert  into `score`(`score_id`,`score_nim`,`score_mapel_id`,`score_score`,`score_answer_false`,`score_answer_true`,`score_answer_empty`) values (1,'123',2,8,NULL,NULL,NULL),(20,'1234',2,100,NULL,NULL,NULL),(23,'1234',2,50,1,1,0),(22,'1234',2,0,NULL,NULL,NULL),(21,'1234',2,50,NULL,NULL,NULL),(24,'123',2,50,0,1,0),(25,'2014002',2,0,0,0,0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `soal` */

insert  into `soal`(`soalid`,`mapel_id`,`jawaban`,`pertanyaan`,`pilihan_a`,`pilihan_b`,`pilihan_c`,`pilihan_d`) values (1,0,'D','siapakah bapak dari penjual soto dekat perempatan?','kartono','sukarto','bejo','2'),(2,2,'D','siapa nama saya','kartono','sukarto','bejo','mahmud'),(3,2,'D','siapa nama saya','kartono','sukarto','bejo','mahmud'),(4,6,'C','soal 1 ?','cek','ceking','hanya cek','cek aja');

/*Table structure for table `tuser` */

DROP TABLE IF EXISTS `tuser`;

CREATE TABLE `tuser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tlp` char(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `nim` (`nim`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

/*Data for the table `tuser` */

insert  into `tuser`(`id`,`nim`,`nama`,`kelas`,`tlp`,`password`,`tanggal`) values (82,'2014002','koko wijanarko','IPS','0974646356','koko','2016-06-22 00:19:33'),(80,'2014001','surya wijanarko','IPA','0812344757','surya','2016-06-22 00:15:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
