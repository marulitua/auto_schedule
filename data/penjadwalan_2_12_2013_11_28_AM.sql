-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2013 at 05:27 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjadwalan`
--
CREATE DATABASE IF NOT EXISTS `penjadwalan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `penjadwalan`;

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE IF NOT EXISTS `atribut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `atribut` (`atribut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `atribut`) VALUES
(55, 'CISCO'),
(53, 'MAC'),
(52, 'meja gambar'),
(54, 'ORACLE');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `NI` varchar(50) NOT NULL,
  `batas_lantai` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NI` (`NI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `full_name`, `NI`, `batas_lantai`) VALUES
(1, 'Hira Meidia, B.Eng., Ph.D.', '1080018', 6),
(2, 'Aryaning Arya Kresna', '110006', NULL),
(3, 'Dipl.-Inform. Nofriyadi Nurdam, M.Kom.', '410059', NULL),
(4, 'Dr. Ir. A. A. N. Ananda Kusuma', '409019', NULL),
(5, 'Ir. I Made Astawa, M.Kom.', '409020', NULL),
(6, 'Ford Lumban Gaol', '103443', NULL),
(7, 'Eka Gautama, M.Sc.', '409086', NULL),
(8, 'Theresia A Riana The', '409018', NULL),
(9, ' Alexander Aur, S.S.', '409047', NULL),
(10, 'Drs. Widia Nursianto, M.Sc.', '34343', NULL),
(11, 'Aemy Widiati, S.E., M.Si.', '410031', NULL),
(12, 'Yulius Aris Widiantoro, S.Th., M.Hum.', '410062', NULL),
(13, 'Ang Yencie Hendrawan', '53635656', NULL),
(14, 'Tan Thing Heng, MStat', '410068', NULL),
(15, 'Adhitio Satyo Bayangkari Karno, S.Si., M.T.I.', '411062', NULL),
(16, 'Agatha Maisie Tjandra, S.Sn.', '113036', NULL),
(18, 'Agus Kustiwa, S.Sos.', '413002', NULL),
(19, 'Agus Salim, S.Si., M.M.', '413015', NULL),
(20, 'Agustinus Eko Rahardjo, S.Sos.', '412051', NULL),
(21, 'Ambang Priyonggo, S.S., M.A.', '109017', NULL),
(22, 'Ananta Hari Noorsasetya, S.Sn.', '412077', NULL),
(23, 'Andreas, S.Sn., M.Ds.', '412071', NULL),
(24, 'Ardiles Akyuwen, S.Sn.', '409065', NULL),
(25, 'Ardyansyah, S.Sn., M.M.', '408015', NULL),
(26, ' Ari Dina Krestiawan, S.Sos.', '411107', NULL),
(27, 'Ari Santosa, S.Sn.', '408049', NULL),
(28, 'Aris Rahmansyah, S.Sn., M.Ds.', '413030', NULL),
(29, 'Asrarul Rahman, S.ST., Akt., MBIS (Prof), CFE', '413023', NULL),
(30, ' Bian Harnansa, S.Sos', '409022', NULL),
(31, 'Bonifasius Hendar Putranto, S.S, M. HUM', '108023', NULL),
(32, 'Christo Wahyudi Rahardjo, S.Sn', '410077', NULL),
(33, 'Clemens Felix Setiyawan, S.Sn.', '412002', NULL),
(34, 'Cosmas Gatot Haryono, S.Sos., M.Si.', '410057', NULL),
(35, 'Darfi Rizkavirwan, S.Sn., M.Ds.', '411050', NULL),
(36, 'Desy Sandrayani H., S.Sn', '411032', NULL),
(37, ' Dian Anggraeni, S.S., M.Si.', '410013', NULL),
(38, 'Dippy Diviantoro Wijayanto, S.Sn.', '410033', NULL),
(39, 'Dr. Jefri Audi Wempi, S.Sn., M.Si', '411040', NULL),
(40, 'Dr. Matius Ali, S.Sn., M.Hum.', '412090', NULL),
(41, 'Edy Chandra, S.Sn., M.IKom ', '410048', NULL),
(42, 'Eko Nugroho, S.Sos., M.Si.', '412055', NULL),
(43, 'Erwin Alfian, S.Sn., M.Ds ', '411051', NULL),
(44, 'F.X. Lilik Dwi Mardjianto, S.S., M.A. ', '112019', NULL),
(45, 'Ferdy Tanumihardjo, S.Sn, M.Ds', '410074', NULL),
(46, 'Gratianus Aditya, S.Sn., M.M. ', '408047', NULL),
(47, 'Greysia Susilo, S.E., S.Sn., M.Hum. ', '413033', NULL),
(48, 'Gustina Romaria, S.Sos., M.Si. ', '412022', NULL),
(49, 'Hanif Suranto, S.Sos. ', '412057', NULL),
(50, 'Harifa Ali Albar Siregar, S.Sos., M.Ds. ', '412031', NULL),
(51, 'Hariyani, S.Sos', '411037', NULL),
(52, 'Hendri Prasetya, S.Sos., M.Si.', '411099', NULL),
(53, 'Heri Budianto, S.Sos., M.Si.', '412024', NULL),
(54, 'Ignasius Tommy Febrian, S.Sn ', '411059', NULL),
(55, 'Iqbal Maimun Umar, S.Sn ', '410078', NULL),
(56, 'Jeffri Kusumajaya, S.Sn.', '108018', NULL),
(57, 'Johan Hartomo, S.Sn. ', '413034', NULL),
(58, 'Joni Nur Budi Kawulur, S.Sn., M.Ds. ', '113033', NULL),
(59, 'Juliana Moa, S.Sos., M.A. ', '412086', NULL),
(60, 'Kartika Aryani, S.Sos., M.I.Kom. ', '413003', NULL),
(61, 'Leonardo Adi Dharma Widya, S.Sn ', '410075', NULL),
(62, 'Liesna Sri Sulistiowati, S.Sn., M.Ds. ', '410108', NULL),
(63, 'M. V. Santi Hendrawati Lukianto, S.Sos., M. Hum. N', '110010', NULL),
(64, 'Martin Suryajaya, S.S., M.Hum. ', '413027', NULL),
(65, 'Mediana Handayani, S.Sos., M.Si. ', '410103', NULL),
(66, 'Mochammad Kresna Noer, S.Sos., M.Si.', '413029', NULL),
(67, 'Muhamad Ramdhan Dwiputra, S.S. ', '413009', NULL),
(68, 'Naldo Yanuar Heryanto, S.Sn., M.T. ', '410029', NULL),
(69, 'Ramdhani Mangku Alam, S.Sn. ', '413010', NULL),
(70, 'Ratna Cahaya Rina Wirawan Putri, S.Sos., M.Ds.', '111003', NULL),
(71, 'Salima Hakim, S.Sn., M.Hum. ', '411045', NULL),
(72, 'Santa Margaretha Niken Restaty, S.Sos., M.Si', '411098', NULL),
(73, 'Santo Tjhin, S.Sn., M.M.', '410030', NULL),
(74, 'Syarifah Amelia, S.Sos, M.Si. ', '113004', NULL),
(75, 'Vonny Ratna Indah, S.Sn. ', '411054', NULL),
(76, 'Wagiman, S.S., S.H., M.H. ', '411109', NULL),
(77, 'Wira Munggana, S.Si., M.Sc. ', '108007', NULL),
(78, 'Yassir Rusdi Malik, S.Sn., M.A. ', '411018', NULL),
(79, 'A. Yudhie Setiawan, S.E., M.Si. ', '409042', NULL),
(80, 'Adhi Kusnadi, M.Si ', '410093', NULL),
(81, 'Aditiyawan, S.Komp., M.Si. ', '410004', NULL),
(83, 'Affan Abdullah Alamudi, S.E., M.Sc.', '413007', NULL),
(84, 'Albertus Fani Prasetyawan, S.E., Ak., M.Sc.', '113029', NULL),
(85, 'Anna Riana Putriya, S.E., M.Si. ', '107006', NULL),
(86, 'Ariadi Diannegara, S.E., M.Sc. ', '412094', NULL),
(87, 'Benny Siga Butarbutar, M.Si.', '410083', NULL),
(88, 'Cita Ichtiara, S.T., M.Sc.', '413020', NULL),
(90, 'Dani Miftahul Akhyar, S.T, M.Si', '410036', NULL),
(91, 'Dennis Andika Suryawijaya, S.Kom., M.Sc.', '410064', NULL),
(94, 'Dr. Rajab Ritonga, M.Si.', '413004', NULL),
(95, 'Dr. Waluyo, M.Sc., Ak.', '410043', NULL),
(96, 'Dr. Zaroni, S.E., M.Si.', '112023', NULL),
(97, 'Dra. Bherta Sri Eko Murtiningsih, M.Si.', '106004', NULL),
(98, 'Dra. Joice Caroll Siagian, M.Si.', '109027', NULL),
(99, 'Dra. Mathilda Agnes Maria Wowor, M.Si.', '41203', NULL),
(100, 'Dra. Ratnawati Kurnia, Ak., M.Si., CPA', '10800', NULL),
(101, 'Drs. Amin Sar Manihuruk, M.SI.', '412082', NULL),
(102, 'Drs. Indiwan Seto Wahjuwibowo, M.Si.', '110026', NULL),
(103, 'Drs. Zain Saifullah, M.Sc.', '411117', NULL),
(104, 'Drs. Zulham, M.Si.', '411088', NULL),
(105, 'Ebnu Yufriadi, S.IP., M.Si.', '413005', NULL),
(106, 'Eduard Depari, M.A, M.Sc', '408012', NULL),
(109, 'F. Anthon Pangruruk, M.Si.', '408041', NULL),
(110, 'Faizal Yan Aulia, S.Fil., M.Sc.', ' 412058', NULL),
(111, 'Ferdian, S.T., M.Sc., PD.Eng.', '412095', NULL),
(112, 'Friska Melani, S.Hum., M.Si.', '411103', NULL),
(113, 'Gun Gun Heryanto, S.Ag., M.Si.', '412053', NULL),
(115, 'Hargyo Tri Nugroho Ignatius, S.Kom., M.Sc.', '111019', NULL),
(117, 'Henny Wirianata, S.E., M.Si., Ak.', '412012', NULL),
(119, 'Iding Rosyidin, S.Ag., M.Si.', '412050', NULL),
(120, 'Inco Hary Perdana, S.Ikom., M.Si.', '112022', NULL),
(121, 'Ir. Andrey Andoko, M.Sc.', '001898', NULL),
(122, 'Ir. Andrey Andoko, M.Sc.', '93004', NULL),
(123, 'Ir. Aziz Luthfi, M.Sc.', '411069', NULL),
(124, 'Ir. Joko Santosa, M.Sc.', '408036', NULL),
(125, 'Iwan Adhicandra, S.T., M.Sc., Ph.D.', '112003', NULL),
(126, 'Januar Wahjudi, S.Kom., M.Sc.', '108015', NULL),
(127, 'Jemmi Sutiono, S.E., S.H., S.Akt., M.M., M.Si.', '412039', NULL),
(128, 'M.S. Gumelar, M.A.', '107005', NULL),
(130, 'Michell Suharli, S.E., M.Si., Ak.', '409011', NULL),
(132, 'Mochammad Riyadh Rizky Adam, S.T., M.S.M.', '112025', NULL),
(133, 'Mohamad Subekti, B.E., M.Sc.', '411065', NULL),
(134, 'Muh. Arief Effendi, S.E., M.Si., Ak., QIA, CPMA', '412017', NULL),
(135, 'Nosami Rikadi, S.E., M.Si', '410116', NULL),
(136, 'Novita Damayanti, M.Si.', '409009', NULL),
(137, 'Panata Bangar Hasioan Sianipar, S.E., Ak., M.Si.', '412040', NULL),
(138, 'Purnamaningsih, S.E., M.S.M.', '112032', NULL),
(139, 'Rene Johannes, M.Si., M.M., M.Si., Ak.', '41008', NULL),
(140, 'Rikip Ginanjar, M.Sc.', '410096', NULL),
(141, ' Rinaningsih, S.E. Ak., M.Si', '411025', NULL),
(142, 'Rony Agustino Siahaan, M.Si', '111009', NULL),
(144, 'Siauw Yohanes Darmawan, S.Kom., M.Sc.', '111018', NULL),
(145, 'Sigit Widodo, S.T., M.Si.', '410072', NULL),
(146, 'Sunarya Djajaprawira, M.Sc.', '411067', NULL),
(148, 'Toufiq Panji Wisesa, S.Ds., M.Sn.', '410110', NULL),
(149, 'Willyanto Tjatur Setyotomo, S.Kom., M.Sc.', '611001', NULL),
(150, 'Yani Prabowo, S.Kom., M.Si', '411010', NULL),
(154, 'Ir. Arief Pramuhanto, MBA', '410097', NULL),
(158, 'Ir. Puji Satyawan Eko Putranto, M.M., M.Min.', '411071', NULL),
(159, 'Ir. Raymond Sunardi Oetama, MCIS', '111001', NULL),
(160, 'Ir. Sasotya Pratama, M.T.E.', '413031', NULL),
(161, 'Ir. Susilo Suhardjo, S.E., M.M.', '412066', NULL),
(162, 'Ir. Widodo, M.M.', '412007', NULL),
(163, 'Ir. Y. Budi Susanto, M.M.', '000928', NULL),
(164, 'Ir. Y. Budi Susanto, M.M.', '88093', NULL),
(166, 'Agus Sulaiman, S.Kom., M.M.', '409074', NULL),
(167, 'David Solichin, S.Kom.', '409071', NULL),
(169, 'Djon Irwanto, S.Kom., M.M.', '411113', NULL),
(170, 'Dodick Zulaimi Sudirman, S.Kom, B.App.Sc., M.T.I N', '110024', NULL),
(171, 'Dr. P M Winarno, M.Kom.', '85201', NULL),
(173, 'Dwi Kristiawan Ms, S.Kom.', '109012', NULL),
(175, 'Hadi Hemanda, S.Kom., M.M.', '409024', NULL),
(177, 'Harijanto Pangestu, S.Kom., M.Kom.', '410065', NULL),
(180, ' Iwan Kurniawan Widjaya, S.Kom., M.Kom., M.T.', '411068', NULL),
(181, 'Johan Setiawan, S.Kom., M.M., M.B.A.', '109023', NULL),
(183, 'Maria Irmina Prasetiyowati, S.Kom., M.T.', '108012', NULL),
(184, 'Markus Fresnel, S.Kom., M.M.', '412049', NULL),
(185, 'Maukar, S.I.Kom., M.M.T.', '410003', NULL),
(186, 'Nanang Krisdianto, S.T., M.Kom.', '410067', NULL),
(187, 'Santo Fernandi Wijaya, S.Kom., M.M.', '408038', NULL),
(191, 'Yonatan, S.Kom', ']410086', NULL),
(192, 'Yustinus Eko Soelistio, S. Kom., M.M.', '113026', NULL),
(195, 'suharto', '235sf', NULL),
(196, 'Eko S.Kom', '345345', NULL),
(198, 'I.Z. Pane Skom', '234800asdf', NULL),
(199, 'Ranny', '23542sd', NULL),
(200, 'Ananda S.Kom', '353jh', NULL),
(201, 'Wirawan S.Kom', '345jsdf23', NULL),
(202, 'Hansun S.Kom', '324sd23', NULL),
(203, 'Andreas P.A. S.Kom', '231dsr', NULL),
(204, 'Wira', '234s', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE IF NOT EXISTS `gedung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gedung` char(50) NOT NULL,
  `max_lantai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `gedung`, `max_lantai`) VALUES
(1, 'A', 9),
(2, 'B', 6),
(3, 'C', 12);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) NOT NULL,
  `mata_kuliah_id` int(10) NOT NULL,
  `dosen_id` int(10) NOT NULL,
  `ruang_kelas_id` int(10) NOT NULL,
  `jam_mulai` int(2) NOT NULL,
  `jam_selesai` int(2) NOT NULL,
  `hari_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jadwal_periode` (`periode_id`),
  KEY `FK_jadwal_mata_kuliah` (`mata_kuliah_id`),
  KEY `FK_jadwal_dosen` (`dosen_id`),
  KEY `FK_jadwal_ruang_kelas` (`ruang_kelas_id`),
  KEY `FK_jadwal_hari` (`hari_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3803 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `periode_id`, `mata_kuliah_id`, `dosen_id`, `ruang_kelas_id`, `jam_mulai`, `jam_selesai`, `hari_id`) VALUES
(3420, 29, 14, 80, 5, 15, 18, 1),
(3421, 29, 14, 80, 5, 13, 16, 6),
(3422, 29, 14, 80, 5, 10, 13, 1),
(3423, 29, 14, 80, 5, 8, 11, 6),
(3424, 29, 1, 1, 5, 9, 12, 2),
(3425, 29, 1, 1, 10, 11, 14, 1),
(3426, 29, 1, 1, 10, 14, 17, 1),
(3427, 29, 1, 2, 8, 8, 11, 1),
(3428, 29, 1, 2, 8, 11, 14, 1),
(3429, 29, 1, 1, 10, 8, 11, 1),
(3430, 29, 59, 84, 14, 13, 15, 3),
(3431, 29, 59, 84, 29, 10, 12, 3),
(3432, 29, 59, 84, 3, 8, 10, 3),
(3433, 29, 57, 14, 16, 11, 15, 4),
(3434, 29, 57, 90, 55, 12, 16, 5),
(3435, 29, 57, 14, 16, 10, 14, 3),
(3436, 29, 57, 49, 27, 11, 15, 1),
(3437, 29, 57, 49, 67, 11, 15, 4),
(3438, 29, 23, 79, 20, 10, 13, 4),
(3439, 29, 23, 16, 10, 10, 13, 3),
(3440, 29, 23, 94, 71, 13, 16, 2),
(3441, 29, 23, 79, 32, 11, 14, 3),
(3442, 29, 23, 16, 5, 12, 15, 4),
(3443, 29, 23, 94, 4, 12, 15, 3),
(3444, 29, 23, 16, 69, 9, 12, 1),
(3445, 29, 23, 16, 61, 10, 13, 2),
(3446, 29, 23, 94, 32, 10, 13, 2),
(3447, 29, 23, 16, 29, 13, 16, 3),
(3448, 29, 23, 79, 23, 13, 16, 4),
(3449, 29, 60, 21, 3, 10, 13, 2),
(3450, 29, 60, 21, 15, 13, 16, 5),
(3451, 29, 60, 21, 18, 10, 13, 5),
(3452, 29, 60, 21, 25, 12, 15, 3),
(3453, 29, 60, 90, 272, 11, 14, 4),
(3454, 29, 60, 21, 74, 9, 12, 1),
(3455, 29, 60, 21, 14, 13, 16, 2),
(3456, 29, 43, 69, 25, 15, 18, 5),
(3457, 29, 43, 83, 4, 9, 12, 4),
(3458, 29, 43, 69, 74, 13, 16, 3),
(3459, 29, 43, 69, 32, 14, 17, 4),
(3460, 29, 43, 13, 67, 10, 13, 3),
(3461, 29, 43, 83, 29, 14, 17, 4),
(3462, 29, 43, 69, 61, 11, 14, 5),
(3463, 29, 43, 13, 55, 11, 14, 1),
(3464, 29, 43, 13, 8, 15, 18, 1),
(3465, 29, 43, 13, 17, 9, 12, 4),
(3466, 29, 28, 23, 18, 10, 13, 1),
(3467, 29, 28, 78, 58, 9, 12, 4),
(3468, 29, 28, 14, 7, 9, 12, 2),
(3469, 29, 28, 5, 15, 11, 14, 2),
(3470, 29, 28, 23, 68, 15, 18, 1),
(3471, 29, 28, 78, 58, 12, 15, 1),
(3472, 29, 28, 5, 59, 14, 17, 3),
(3473, 29, 28, 78, 69, 12, 15, 4),
(3474, 29, 28, 5, 6, 8, 11, 2),
(3475, 29, 28, 5, 30, 10, 13, 3),
(3476, 29, 28, 14, 19, 11, 14, 1),
(3477, 29, 28, 14, 24, 8, 11, 4),
(3478, 29, 7, 77, 66, 13, 16, 2),
(3479, 29, 7, 52, 18, 13, 16, 5),
(3480, 29, 7, 77, 56, 11, 14, 3),
(3481, 29, 7, 77, 61, 11, 14, 4),
(3482, 29, 7, 52, 55, 12, 15, 4),
(3483, 29, 7, 10, 74, 11, 14, 4),
(3484, 29, 7, 10, 66, 10, 13, 1),
(3485, 29, 7, 52, 32, 10, 13, 5),
(3486, 29, 7, 10, 72, 13, 16, 2),
(3487, 29, 7, 77, 31, 8, 11, 4),
(3488, 29, 3, 81, 19, 10, 13, 4),
(3489, 29, 3, 10, 18, 10, 13, 2),
(3490, 29, 3, 81, 26, 11, 14, 1),
(3491, 29, 3, 81, 58, 13, 16, 4),
(3492, 31, 9, 15, 56, 8, 11, 2),
(3493, 31, 9, 15, 10, 12, 15, 2),
(3494, 31, 13, 14, 272, 9, 12, 5),
(3495, 31, 13, 14, 23, 12, 15, 5),
(3524, 44, 5, 2, 32, 12, 15, 1),
(3525, 44, 5, 2, 60, 8, 11, 1),
(3526, 44, 5, 2, 10, 15, 18, 1),
(3527, 44, 14, 7, 63, 13, 16, 1),
(3528, 44, 23, 32, 13, 15, 18, 1),
(3529, 44, 22, 1, 57, 9, 12, 3),
(3530, 44, 22, 1, 70, 11, 14, 1),
(3531, 44, 22, 1, 63, 12, 15, 3),
(3532, 44, 22, 1, 16, 8, 11, 1),
(3737, 46, 131, 134, 37, 15, 17, 4),
(3738, 46, 131, 134, 52, 8, 10, 4),
(3739, 46, 131, 134, 36, 11, 13, 2),
(3740, 46, 128, 200, 49, 10, 12, 5),
(3741, 46, 128, 200, 33, 14, 16, 5),
(3742, 46, 128, 5, 51, 9, 11, 5),
(3743, 46, 128, 5, 40, 14, 16, 4),
(3744, 46, 103, 134, 73, 9, 11, 2),
(3745, 46, 103, 134, 67, 11, 13, 4),
(3746, 46, 103, 134, 25, 16, 18, 2),
(3747, 46, 135, 201, 34, 11, 15, 4),
(3748, 46, 87, 199, 36, 15, 17, 1),
(3749, 46, 87, 199, 46, 11, 13, 3),
(3750, 46, 87, 133, 44, 10, 12, 3),
(3751, 46, 87, 199, 43, 15, 17, 2),
(3752, 46, 87, 199, 51, 8, 10, 3),
(3753, 46, 32, 5, 24, 12, 14, 4),
(3754, 46, 32, 5, 57, 13, 15, 5),
(3755, 46, 32, 200, 26, 8, 10, 5),
(3756, 46, 32, 5, 11, 11, 13, 5),
(3757, 46, 133, 3, 49, 13, 15, 4),
(3758, 46, 133, 3, 40, 10, 12, 2),
(3759, 46, 133, 201, 36, 14, 16, 2),
(3760, 46, 89, 167, 273, 11, 13, 5),
(3761, 46, 89, 167, 36, 12, 14, 4),
(3762, 46, 89, 167, 43, 8, 10, 5),
(3763, 46, 89, 81, 39, 8, 10, 3),
(3764, 46, 57, 80, 12, 11, 15, 3),
(3765, 46, 57, 80, 18, 9, 13, 5),
(3766, 46, 57, 80, 12, 12, 16, 4),
(3767, 46, 92, 202, 43, 15, 17, 4),
(3768, 46, 92, 170, 39, 13, 15, 5),
(3769, 46, 92, 202, 47, 12, 14, 1),
(3770, 46, 86, 199, 65, 12, 15, 4),
(3771, 46, 86, 199, 16, 9, 12, 4),
(3772, 46, 86, 199, 20, 12, 15, 5),
(3773, 46, 109, 183, 16, 9, 12, 1),
(3774, 46, 109, 183, 17, 14, 17, 2),
(3775, 46, 109, 186, 60, 13, 16, 4),
(3776, 46, 125, 81, 69, 15, 17, 3),
(3777, 46, 125, 80, 21, 14, 16, 1),
(3778, 46, 125, 81, 60, 13, 15, 3),
(3779, 46, 88, 81, 24, 14, 17, 2),
(3780, 46, 88, 7, 20, 12, 15, 4),
(3781, 46, 88, 167, 59, 8, 11, 3),
(3782, 46, 88, 167, 9, 11, 14, 3),
(3783, 46, 132, 3, 72, 10, 12, 5),
(3784, 46, 132, 3, 6, 13, 15, 5),
(3785, 46, 132, 3, 20, 15, 17, 4),
(3786, 46, 118, 204, 67, 11, 14, 1),
(3787, 46, 118, 171, 14, 8, 11, 5),
(3788, 46, 118, 204, 24, 14, 17, 1),
(3789, 46, 129, 170, 11, 12, 13, 4),
(3790, 46, 91, 202, 56, 10, 12, 1),
(3791, 46, 91, 202, 72, 15, 17, 2),
(3792, 46, 91, 170, 73, 15, 17, 3),
(3793, 46, 74, 171, 7, 12, 14, 2),
(3794, 46, 74, 171, 16, 9, 11, 2),
(3795, 46, 74, 171, 7, 11, 13, 4),
(3796, 46, 30, 185, 32, 9, 12, 2),
(3797, 46, 30, 3, 63, 14, 17, 1),
(3798, 46, 30, 183, 56, 13, 16, 4),
(3799, 46, 30, 183, 73, 10, 13, 4),
(3800, 46, 30, 145, 12, 12, 15, 1),
(3801, 46, 30, 145, 56, 14, 17, 3),
(3802, 46, 30, 185, 26, 11, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_fail`
--

CREATE TABLE IF NOT EXISTS `jadwal_fail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) NOT NULL,
  `mata_kuliah_id` int(10) NOT NULL,
  `sks` int(2) NOT NULL,
  `praktek` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jadwal_fail_periode` (`periode_id`),
  KEY `FK_jadwal_fail_mata_kuliah` (`mata_kuliah_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2030 ;

--
-- Dumping data for table `jadwal_fail`
--

INSERT INTO `jadwal_fail` (`id`, `periode_id`, `mata_kuliah_id`, `sks`, `praktek`) VALUES
(1633, 29, 25, 3, 0),
(1634, 29, 25, 3, 0),
(1635, 29, 25, 3, 0),
(1636, 29, 25, 3, 0),
(1637, 29, 25, 3, 0),
(1638, 29, 25, 3, 0),
(1639, 29, 25, 3, 0),
(1640, 29, 25, 3, 0),
(1641, 29, 25, 3, 0),
(1642, 29, 25, 3, 0),
(1643, 29, 58, 4, 0),
(1644, 29, 58, 4, 0),
(1645, 29, 58, 4, 0),
(1646, 29, 58, 4, 0),
(1647, 29, 58, 4, 0),
(1648, 29, 58, 4, 0),
(1649, 29, 58, 4, 0),
(1650, 29, 58, 4, 0),
(1651, 29, 58, 4, 0),
(1652, 29, 58, 4, 0),
(1653, 29, 47, 3, 0),
(1654, 29, 47, 3, 0),
(1655, 29, 47, 3, 0),
(1656, 29, 47, 3, 0),
(1657, 29, 47, 3, 0),
(1658, 29, 47, 3, 0),
(1659, 29, 47, 3, 0),
(1660, 29, 47, 3, 0),
(1661, 29, 118, 3, 0),
(1662, 29, 118, 3, 0),
(1663, 29, 118, 3, 0),
(1664, 29, 118, 3, 0),
(1665, 29, 118, 3, 0),
(1666, 29, 118, 3, 0),
(1667, 29, 118, 3, 0),
(1668, 29, 118, 3, 0),
(1669, 29, 118, 3, 0),
(1670, 29, 118, 3, 0),
(1671, 29, 118, 3, 0),
(1672, 29, 118, 3, 0),
(1673, 29, 118, 3, 0),
(1674, 29, 118, 3, 0),
(1675, 29, 118, 3, 0),
(1676, 29, 118, 3, 0),
(1677, 29, 118, 3, 0),
(1678, 29, 118, 3, 0),
(1679, 29, 118, 3, 0),
(1680, 29, 118, 3, 0),
(1681, 29, 118, 3, 0),
(1682, 29, 118, 3, 0),
(1683, 29, 118, 3, 0),
(1684, 29, 118, 3, 0),
(1685, 29, 118, 3, 0),
(1686, 29, 118, 3, 0),
(1687, 29, 118, 3, 0),
(1688, 29, 118, 3, 0),
(1689, 29, 118, 3, 0),
(1690, 29, 118, 3, 0),
(1691, 29, 118, 3, 0),
(1692, 29, 118, 3, 0),
(1693, 29, 118, 3, 0),
(1694, 29, 118, 3, 0),
(1695, 29, 118, 3, 0),
(1696, 29, 118, 3, 0),
(1697, 29, 118, 3, 0),
(1698, 29, 118, 3, 0),
(1699, 29, 118, 3, 0),
(1700, 29, 118, 3, 0),
(1701, 29, 118, 3, 0),
(1702, 29, 118, 3, 0),
(1703, 29, 118, 3, 0),
(1704, 29, 118, 3, 0),
(1705, 29, 118, 3, 0),
(1706, 29, 118, 3, 0),
(1707, 29, 118, 3, 0),
(1708, 29, 118, 3, 0),
(1709, 29, 118, 3, 0),
(1710, 29, 118, 3, 0),
(1711, 29, 97, 1, 1),
(1712, 29, 97, 1, 1),
(1713, 29, 97, 1, 1),
(1714, 29, 97, 1, 1),
(1715, 29, 97, 1, 1),
(1716, 29, 14, 3, 0),
(1717, 29, 14, 3, 0),
(1718, 29, 59, 2, 0),
(1719, 29, 59, 2, 0),
(1720, 29, 59, 2, 0),
(1721, 29, 59, 2, 0),
(1722, 29, 59, 2, 0),
(1723, 29, 59, 2, 0),
(1724, 29, 59, 2, 0),
(1725, 29, 23, 3, 0),
(1726, 29, 23, 3, 0),
(1727, 29, 23, 3, 0),
(1728, 29, 28, 3, 0),
(1729, 29, 28, 3, 0),
(1730, 29, 28, 3, 0),
(1731, 29, 28, 3, 0),
(1732, 29, 28, 3, 0),
(1733, 29, 28, 3, 0),
(1734, 29, 28, 3, 0),
(1735, 29, 28, 3, 0),
(1736, 29, 28, 3, 0),
(1737, 29, 28, 3, 0),
(1738, 29, 28, 3, 0),
(1739, 29, 28, 3, 0),
(1740, 29, 28, 3, 0),
(1741, 29, 28, 3, 0),
(1742, 29, 28, 3, 0),
(1743, 29, 28, 3, 0),
(1744, 29, 28, 3, 0),
(1745, 29, 28, 3, 0),
(1746, 29, 28, 3, 0),
(1747, 29, 28, 3, 0),
(1748, 29, 28, 3, 0),
(1749, 29, 28, 3, 0),
(1750, 29, 28, 3, 0),
(1751, 29, 28, 3, 0),
(1752, 29, 28, 3, 0),
(1753, 29, 28, 3, 0),
(1754, 29, 28, 3, 0),
(1755, 29, 28, 3, 0),
(1756, 29, 28, 3, 0),
(1757, 29, 28, 3, 0),
(1758, 29, 28, 3, 0),
(1759, 29, 28, 3, 0),
(1760, 29, 28, 3, 0),
(1761, 29, 28, 3, 0),
(1762, 29, 28, 3, 0),
(1763, 29, 28, 3, 0),
(1764, 29, 28, 3, 0),
(1765, 29, 28, 3, 0),
(1766, 31, 1, 3, 0),
(1767, 31, 1, 3, 0),
(1768, 31, 1, 3, 0),
(1769, 31, 1, 3, 0),
(1770, 31, 1, 3, 0),
(1771, 31, 9, 3, 0),
(1772, 31, 9, 3, 0),
(1773, 31, 9, 3, 0),
(1774, 31, 9, 3, 0),
(1775, 31, 13, 3, 0),
(1776, 31, 13, 3, 0),
(1777, 31, 13, 3, 0),
(1778, 31, 13, 3, 0),
(1779, 31, 13, 3, 0),
(1780, 31, 13, 3, 0),
(1781, 31, 13, 3, 0),
(1782, 31, 13, 3, 0),
(1783, 31, 13, 3, 0),
(1784, 31, 13, 3, 0),
(1961, 44, 10, 3, 0),
(1962, 44, 10, 3, 0),
(1963, 44, 10, 3, 0),
(1964, 44, 10, 3, 0),
(1965, 44, 10, 3, 0),
(1966, 44, 10, 3, 0),
(1967, 44, 3, 3, 0),
(1968, 44, 3, 3, 0),
(1969, 44, 3, 3, 0),
(1970, 44, 3, 3, 0),
(1971, 44, 3, 3, 0),
(1972, 44, 5, 3, 0),
(1973, 44, 5, 3, 0),
(1974, 44, 5, 3, 0),
(1975, 44, 34, 3, 0),
(1976, 44, 34, 3, 0),
(1977, 44, 34, 3, 0),
(1978, 44, 34, 3, 0),
(1979, 44, 34, 3, 0),
(1980, 44, 37, 3, 0),
(1981, 44, 37, 3, 0),
(1982, 44, 37, 3, 0),
(1983, 44, 37, 3, 0),
(1984, 44, 37, 3, 0),
(1985, 44, 37, 3, 0),
(1986, 44, 32, 3, 0),
(1987, 44, 32, 3, 0),
(1988, 44, 32, 3, 0),
(1989, 44, 32, 3, 0),
(1990, 44, 32, 3, 0),
(1991, 44, 32, 3, 0),
(1992, 44, 32, 3, 0),
(1993, 44, 21, 3, 0),
(1994, 44, 21, 3, 0),
(1995, 44, 21, 3, 0),
(1996, 44, 21, 3, 0),
(1997, 44, 21, 3, 0),
(1998, 44, 21, 3, 0),
(1999, 44, 21, 3, 0),
(2000, 44, 36, 3, 0),
(2001, 44, 36, 3, 0),
(2002, 44, 36, 3, 0),
(2003, 44, 36, 3, 0),
(2004, 44, 4, 3, 0),
(2005, 44, 4, 3, 0),
(2006, 44, 4, 3, 0),
(2007, 44, 4, 3, 0),
(2008, 44, 4, 3, 0),
(2009, 44, 4, 3, 0),
(2010, 44, 4, 3, 0),
(2011, 44, 15, 3, 0),
(2012, 44, 15, 3, 0),
(2013, 44, 15, 3, 0),
(2014, 44, 15, 3, 0),
(2015, 44, 15, 3, 0),
(2016, 44, 15, 3, 0),
(2017, 44, 28, 3, 0),
(2018, 44, 28, 3, 0),
(2019, 44, 28, 3, 0),
(2020, 44, 28, 3, 0),
(2021, 44, 28, 3, 0),
(2022, 44, 28, 3, 0),
(2023, 44, 14, 3, 0),
(2024, 44, 14, 3, 0),
(2025, 44, 14, 3, 0),
(2026, 44, 14, 3, 0),
(2027, 44, 14, 3, 0),
(2028, 44, 23, 3, 0),
(2029, 44, 23, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `variable_size` int(2) NOT NULL,
  `execute_time` double NOT NULL,
  `min_domain` int(2) NOT NULL,
  `max_domain` int(2) NOT NULL,
  `solved` int(2) NOT NULL,
  `unsolved` int(2) NOT NULL,
  `n_backtracking` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `variable_size`, `execute_time`, `min_domain`, `max_domain`, `solved`, `unsolved`, `n_backtracking`) VALUES
(1, 62, 22.563688918, 16, 4116, 62, 89, 5266),
(2, 66, 21.548272829, 16, 4116, 66, 85, 4698),
(3, 77, 22.12909108, 16, 4116, 77, 123, 3154),
(4, 72, 35.250175006, 16, 4116, 72, 133, 5118),
(5, 4, 2.396515737, 294, 294, 4, 19, 355),
(6, 4, 2.22103453, 49, 240, 4, 20, 462),
(7, 6, 2.920477007, 49, 480, 6, 18, 108),
(8, 9, 7.482026896, 392, 872, 9, 69, 1053),
(9, 9, 6.455491984, 392, 872, 9, 69, 1592),
(10, 9, 5.604707086, 392, 872, 9, 69, 1053),
(11, 5, 3.662443324, 7, 294, 5, 52, 16),
(12, 5, 3.999503678, 7, 294, 5, 52, 16),
(13, 64, 8.410592225, 420, 7644, 64, 0, 65),
(14, 65, 4.561713972, 420, 7644, 65, 0, 66),
(15, 65, 5.531553093, 378, 7644, 65, 0, 66),
(16, 66, 5.031611282, 378, 7644, 66, 0, 67);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mata_kuliah` varchar(50) NOT NULL,
  `mata_kuliah_code` varchar(50) NOT NULL,
  `praktek` int(1) NOT NULL,
  `sks` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mata_kuliah_code` (`mata_kuliah_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `mata_kuliah`, `mata_kuliah_code`, `praktek`, `sks`) VALUES
(1, 'Pengantar Akuntansi 1', 'EA100', 0, 3),
(2, 'Pengantar Akuntansi 2', 'EA201', 0, 3),
(3, 'Ekonomi Mikro', 'EM170 ', 0, 3),
(4, 'Ekonomi Makro', 'EM270', 0, 3),
(5, 'Dasar-dasar Bisnis', 'EM100', 0, 3),
(6, 'Dasar-dasar Manajemen', 'EM201', 0, 3),
(7, 'Statistik Bisnis 1', 'EM281', 0, 3),
(9, 'Statistik Bisnis 2', 'EM382', 0, 3),
(10, 'Manajemen Keuangan 1', 'EM330', 0, 3),
(11, 'Manajemen Keuangan 2', 'EM431', 0, 3),
(12, 'Matematika Bisnis', 'EM180', 0, 3),
(13, 'Manajemen Pemasaran', 'EM320', 0, 3),
(14, 'Kalkulus 1', 'SK101', 0, 3),
(15, 'Kalkulus 2', 'SK201', 0, 3),
(16, 'Aljabar Linear', 'SK202', 0, 3),
(17, 'Sistem Digital', 'SK211', 0, 3),
(18, 'Probabilitas dan Multimedia Statistika', 'SK304', 0, 3),
(21, 'Keamanan Komputer dan Jaringan', 'SK532', 0, 3),
(22, 'Sistem Terdistribusi', 'SK734', 0, 3),
(23, 'Manajemen Operasional', 'SI214', 0, 3),
(24, 'Sistem Informasi Manajemen', 'SI301', 0, 3),
(25, 'Konsep Sistem Operasi', 'SI325', 0, 3),
(28, 'Algoritma dan Pemrograman', 'TI100', 0, 3),
(29, 'Pengantar Teknologi Multimedia', 'TI110', 0, 3),
(30, 'Metode Perancangan Program', 'TI220', 0, 3),
(32, 'Sistem Operasi', 'TI405', 0, 2),
(33, 'Pengantar Ilmu Komunikasi', 'IK100', 0, 3),
(34, 'Critical & Creative Thinking', 'IK112', 0, 3),
(35, 'Teori Komunikasi', 'IK201', 0, 3),
(36, 'Perkembangan Teknologi Komunikasi', 'IK202', 0, 3),
(37, 'Komunikasi Antar Pribadi', 'IK203', 0, 3),
(38, 'Multimedia Laboratory', 'IK214', 0, 3),
(39, 'Pengantar Public Relations', 'PR210', 0, 3),
(40, 'Creative Writing', 'IK354', 0, 3),
(41, 'Komunikasi Interpersonal', 'IK402', 0, 3),
(42, 'Drawing Principles', 'DA110', 0, 3),
(43, 'Illustration', 'DA213', 0, 3),
(44, 'West Art History', 'DV113', 0, 3),
(45, 'East & Indonesian Art History', 'DV132', 0, 3),
(46, 'Academic Writing', 'DA501', 0, 3),
(47, 'Traditional Sculpting', 'DA211', 0, 3),
(48, 'Digital Publishing – II', 'DG200', 0, 3),
(49, '3D Digital Visualization', 'DA311', 0, 3),
(50, 'Psychology in Art and Design', 'DA321', 0, 3),
(53, 'Sociology in Art and Design', 'DV200', 0, 3),
(55, 'Pendidikan Kewarganegaraan', 'UM160', 0, 3),
(57, 'Rekayasa Piranti Lunak', 'TI421', 0, 4),
(58, 'Algoritma dan Pemrograman', ' TI100 ', 0, 4),
(59, 'Bahasa Inggris 1', 'UM121', 0, 2),
(60, 'Agama', 'UM151', 0, 3),
(64, 'Arsitektur dan Organisasi Komputer', 'SK320', 0, 3),
(69, 'Matematika Diskrit', 'TI101', 0, 3),
(70, 'Pengantar Manajemen & Bisnis', 'EM190', 0, 3),
(74, 'Riset Teknologi Informasi', 'TI728', 0, 2),
(80, 'Pemrograman Sistem Mobile', 'TI735', 0, 2),
(81, 'Pemrograman Sistem Mobile (Praktek)', 'TI735P', 1, 1),
(82, 'Jaringan Komputer', 'SK430', 0, 3),
(83, 'Jaringan Komputer (Praktek)', 'SK430P', 1, 1),
(84, 'Pengantar Teknologi Internet', 'TI330', 0, 2),
(85, 'Pengantar Teknologi Internet (Praktek)', 'TI330P', 1, 1),
(86, 'Sistem Basis Data', 'TI403', 0, 3),
(87, 'Sistem Basis Data (Praktek)', 'TI403P', 1, 1),
(88, 'Struktur Data', 'TI202', 0, 3),
(89, 'Struktur Data (Praktek)', 'TI202P', 1, 1),
(91, 'Grafika Komputer dan Animasi', 'TI624', 0, 2),
(92, 'Grafika Komputer dan Animasi (Praktek)', 'TI624P', 1, 1),
(93, 'Pemrograman Lanjutan 1', 'TI533', 0, 2),
(94, 'Pemrograman Lanjutan 1 (Praktek)', 'TI533P', 1, 1),
(96, 'Pemrograman Berorientasi Objek', 'TI331', 0, 2),
(97, 'Pemrograman Berorientasi Objek (Praktek)', 'TI331P', 1, 1),
(98, 'Pemograman Web', 'TI532', 0, 2),
(99, 'Pemograman Web (Praktek)', 'TI532P', 1, 1),
(100, 'Database Lanjutan', 'SI541', 0, 2),
(101, 'Database Lanjutan (Praktek)', 'SI541P', 1, 1),
(102, 'Analisis Perancangan dan Algoritma', 'TI507', 0, 3),
(103, 'Pemrograman Lanjutan 2', 'TI634', 0, 2),
(104, 'Pemrograman Lanjutan (Praktek)', 'TI634P', 1, 1),
(105, 'Technopreneurship', 'EM604', 0, 2),
(106, 'Administrasi Database 2', 'SI744', 0, 2),
(107, 'Administrasi Database 2 (Praktek)', 'SI744P', 1, 1),
(108, 'Komputer dan Masyarakat', 'TI311', 0, 2),
(109, 'Interaksi Manusia dan Komputer', 'TI423', 0, 3),
(111, 'Intelegensia Semu', 'TI508', 0, 3),
(113, 'Konsep Bahasa Pemrograman', 'TI506', 0, 3),
(114, 'Bahasa Indonesia', 'UM141', 0, 3),
(116, 'Analisis dan Perancangan Sistem', 'TI336', 0, 3),
(117, 'Manajemen Proyek Piranti Lunak', 'TI726', 0, 3),
(118, 'Seminar ICT', 'TI751', 0, 3),
(119, 'Magang Kerja', 'TI727', 0, 4),
(122, 'Bahasa Inggris 2', 'UM222', 0, 2),
(125, 'Teori Bahasa dan Otomata', 'TI608', 0, 2),
(126, 'Komunikasi Nirkabel', 'SK653', 0, 3),
(128, 'Sistem Operasi (Praktek)', 'TI405P', 1, 1),
(129, 'Pilihan 2 Game Programming & Development', 'TI564', 0, 1),
(130, 'Pemrograman Lanjutan 2', 'TI365', 0, 2),
(131, 'Pemrograman Lanjutan 2 (Praktek)', 'TI365P', 1, 1),
(132, 'Sistem Multimedia', 'TI563', 0, 2),
(133, 'Sistem Multimedia (Praktek)', 'TI563P', 1, 1),
(135, 'Pilihan 2 Game Programming & Development (Praktek)', 'TI564P', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tahun_ajar` varchar(50) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finished_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tahun_ajar_semester_id` (`tahun_ajar`,`semester_id`),
  KEY `FK_periode_semester` (`semester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `tahun_ajar`, `semester_id`, `create_time`, `finished_time`) VALUES
(29, '2012-2013', 1, '2013-11-25 19:19:08', '2013-12-01 12:39:40'),
(31, '2012-2013', 2, '2013-12-01 02:36:58', '2013-12-01 07:00:05'),
(44, '2013-2014', 1, '2013-12-01 07:07:40', '2013-12-01 12:20:26'),
(46, '2013-2014', 2, '2013-12-01 13:37:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kelas`
--

CREATE TABLE IF NOT EXISTS `ruang_kelas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `praktek` int(10) NOT NULL,
  `number` varchar(50) NOT NULL,
  `gedung_id` int(11) DEFAULT NULL,
  `lantai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_floor` (`number`),
  KEY `FK_ruang_kelas_room_type` (`praktek`),
  KEY `FK_ruang_kelas_gedung` (`gedung_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=274 ;

--
-- Dumping data for table `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id`, `praktek`, `number`, `gedung_id`, `lantai`) VALUES
(3, 0, 'B202', 2, 2),
(4, 0, 'B203', 2, 2),
(5, 0, 'B201', 2, 2),
(6, 0, 'B204', 2, 2),
(7, 0, 'B205', 2, 2),
(8, 0, 'B206', 2, 2),
(9, 0, 'B207', 2, 2),
(10, 0, 'B208', 2, 2),
(11, 0, 'B301', 2, 3),
(12, 0, 'B302', 2, 3),
(13, 0, 'B303', 2, 3),
(14, 0, 'B304', 2, 3),
(15, 0, 'B305', 2, 3),
(16, 0, 'B306', 2, 3),
(17, 0, 'B307', 2, 3),
(18, 0, 'B308', 2, 3),
(19, 0, 'B309', 2, 3),
(20, 0, 'B310', 2, 3),
(21, 0, 'B311', 2, 3),
(23, 0, 'B312', 2, 3),
(24, 0, 'B313', 2, 3),
(25, 0, 'B314', 2, 3),
(26, 0, 'B315', 2, 3),
(27, 0, 'B316', 2, 3),
(29, 0, 'B317', 2, 3),
(30, 0, 'B318', 2, 3),
(31, 0, 'B319', 2, 3),
(32, 0, 'B320', 2, 3),
(33, 1, 'B501', 2, 5),
(34, 1, 'B502', 2, 5),
(35, 1, 'B503', 2, 5),
(36, 1, 'B504', 2, 5),
(37, 1, 'B505', 2, 5),
(38, 1, 'B506', 2, 5),
(39, 1, 'B507', 2, 5),
(40, 1, 'B508', 2, 5),
(41, 1, 'B509', 2, 5),
(42, 1, 'B510', 2, 5),
(43, 1, 'B511', 2, 5),
(44, 1, 'B512', 2, 5),
(46, 1, 'B513', 2, 5),
(47, 1, 'B514', 2, 5),
(48, 1, 'B515', 2, 5),
(49, 1, 'B516', 2, 5),
(50, 1, 'B517', 2, 5),
(51, 1, 'B518', 2, 5),
(52, 1, 'B519', 2, 5),
(53, 1, 'B520', 2, 5),
(54, 0, 'B601', 2, 6),
(55, 0, 'B602', 2, 6),
(56, 0, 'B603', 2, 6),
(57, 0, 'B604', 2, 6),
(58, 0, 'B605', 2, 6),
(59, 0, 'B606', 2, 6),
(60, 0, 'B607', 2, 6),
(61, 0, 'B608', 2, 6),
(63, 0, 'B609', 2, 6),
(64, 0, 'B610', 2, 6),
(65, 0, 'B611', 2, 6),
(66, 0, 'B612', 2, 6),
(67, 0, 'B613', 2, 6),
(68, 0, 'B614', 2, 6),
(69, 0, 'B615', 2, 6),
(70, 0, 'B616', 2, 6),
(71, 0, 'B617', 2, 6),
(72, 0, 'B618', 2, 6),
(73, 0, 'B619', 2, 6),
(74, 0, 'B620', 2, 6),
(272, 0, 'B778', 2, 7),
(273, 1, 'B666', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `trx_atribut_kurikulum`
--

CREATE TABLE IF NOT EXISTS `trx_atribut_kurikulum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kurikulum_id` int(10) NOT NULL,
  `atribut_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_atribut_kurikulum_trx_kurikulum` (`kurikulum_id`),
  KEY `FK_trx_atribut_kurikulum_atribut` (`atribut_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `trx_atribut_kurikulum`
--

INSERT INTO `trx_atribut_kurikulum` (`id`, `kurikulum_id`, `atribut_id`) VALUES
(49, 10, 1),
(50, 10, 51),
(58, 11, 3),
(59, 11, 51),
(60, 13, 1),
(61, 13, 51),
(62, 14, 1),
(63, 14, 51),
(84, 26, 2),
(85, 28, 2),
(86, 34, 3),
(87, 34, 1),
(90, 24, 5),
(91, 24, 2),
(92, 45, 53);

-- --------------------------------------------------------

--
-- Table structure for table `trx_hari_kurikulum`
--

CREATE TABLE IF NOT EXISTS `trx_hari_kurikulum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kurikulum_id` int(10) NOT NULL,
  `hari_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_hari_kurikulum_trx_kurikulum` (`kurikulum_id`),
  KEY `FK_trx_hari_kurikulum_hari` (`hari_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=227 ;

--
-- Dumping data for table `trx_hari_kurikulum`
--

INSERT INTO `trx_hari_kurikulum` (`id`, `kurikulum_id`, `hari_id`) VALUES
(69, 9, 1),
(70, 9, 2),
(71, 9, 3),
(72, 9, 4),
(98, 10, 1),
(99, 10, 2),
(100, 10, 3),
(101, 10, 4),
(108, 11, 2),
(109, 11, 3),
(110, 14, 1),
(111, 14, 3),
(208, 23, 1),
(209, 23, 2),
(210, 23, 6),
(214, 24, 1),
(215, 24, 6),
(216, 36, 5),
(217, 37, 1),
(218, 38, 2),
(219, 38, 3),
(220, 38, 4),
(221, 42, 1),
(222, 42, 2),
(223, 42, 5),
(224, 46, 2),
(225, 46, 3),
(226, 46, 4);

-- --------------------------------------------------------

--
-- Table structure for table `trx_kurikulum`
--

CREATE TABLE IF NOT EXISTS `trx_kurikulum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) NOT NULL,
  `mata_kuliah_id` int(10) NOT NULL,
  `jumlah_kelas` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_kurikulum_periode` (`periode_id`),
  KEY `FK_trx_kurikulum_mata_kuliah` (`mata_kuliah_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `trx_kurikulum`
--

INSERT INTO `trx_kurikulum` (`id`, `periode_id`, `mata_kuliah_id`, `jumlah_kelas`) VALUES
(9, 28, 1, 6),
(10, 28, 3, 6),
(11, 28, 7, 6),
(12, 28, 14, 4),
(13, 28, 16, 6),
(14, 28, 4, 6),
(23, 29, 1, 6),
(24, 29, 14, 6),
(25, 29, 3, 4),
(26, 29, 25, 10),
(27, 29, 28, 50),
(28, 29, 58, 10),
(29, 29, 43, 10),
(30, 29, 7, 10),
(31, 29, 23, 14),
(32, 29, 59, 10),
(33, 29, 60, 7),
(34, 29, 47, 8),
(35, 29, 57, 5),
(36, 29, 118, 50),
(37, 29, 97, 5),
(38, 31, 1, 5),
(39, 31, 9, 6),
(40, 31, 13, 6),
(41, 31, 13, 6),
(42, 44, 14, 6),
(43, 44, 22, 4),
(44, 44, 23, 3),
(45, 44, 10, 6),
(46, 44, 3, 5),
(47, 44, 5, 6),
(48, 44, 34, 5),
(49, 44, 37, 6),
(50, 44, 32, 7),
(51, 44, 21, 7),
(52, 44, 36, 4),
(53, 44, 4, 7),
(54, 44, 15, 6),
(55, 44, 28, 6),
(58, 46, 88, 4),
(59, 46, 89, 4),
(60, 46, 30, 7),
(61, 46, 57, 3),
(62, 46, 86, 3),
(63, 46, 87, 5),
(64, 46, 109, 3),
(66, 46, 32, 4),
(67, 46, 128, 4),
(68, 46, 129, 1),
(69, 46, 125, 3),
(71, 46, 103, 3),
(72, 46, 131, 3),
(73, 46, 91, 3),
(74, 46, 92, 3),
(75, 46, 74, 3),
(76, 46, 132, 3),
(77, 46, 133, 3),
(78, 46, 118, 3),
(79, 46, 135, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trx_pengajar`
--

CREATE TABLE IF NOT EXISTS `trx_pengajar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) NOT NULL,
  `dosen_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_pengajar_periode` (`periode_id`),
  KEY `FK_trx_pengajar_dosen` (`dosen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `trx_pengajar`
--

INSERT INTO `trx_pengajar` (`id`, `periode_id`, `dosen_id`) VALUES
(7, 28, 1),
(8, 28, 2),
(26, 29, 1),
(27, 29, 2),
(28, 29, 5),
(29, 29, 16),
(30, 29, 10),
(31, 29, 14),
(32, 29, 49),
(33, 29, 68),
(34, 29, 81),
(35, 29, 75),
(36, 29, 59),
(37, 29, 91),
(38, 29, 21),
(39, 29, 97),
(40, 29, 83),
(41, 29, 78),
(42, 29, 80),
(43, 29, 94),
(44, 29, 13),
(45, 29, 64),
(46, 29, 77),
(47, 29, 90),
(48, 29, 69),
(49, 29, 23),
(50, 29, 100),
(51, 29, 52),
(52, 29, 79),
(53, 29, 84),
(54, 29, 121),
(55, 29, 154),
(56, 31, 76),
(57, 31, 14),
(58, 31, 15),
(59, 44, 1),
(60, 44, 7),
(61, 44, 6),
(62, 44, 32),
(63, 44, 2),
(66, 46, 81),
(67, 46, 7),
(68, 46, 146),
(69, 46, 167),
(70, 46, 183),
(71, 46, 196),
(72, 46, 185),
(73, 46, 145),
(74, 46, 3),
(75, 46, 80),
(76, 46, 198),
(77, 46, 199),
(78, 46, 133),
(79, 46, 186),
(80, 46, 5),
(81, 46, 200),
(82, 46, 170),
(83, 46, 201),
(84, 46, 134),
(85, 46, 202),
(86, 46, 171),
(87, 46, 203),
(88, 46, 204);

-- --------------------------------------------------------

--
-- Table structure for table `trx_pengajar_mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `trx_pengajar_mata_kuliah` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pengajar_id` int(10) NOT NULL,
  `mata_kuliah_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_pengajar_mata_kuliah_trx_pengajar` (`pengajar_id`),
  KEY `FK_trx_pengajar_mata_kuliah_mata_kuliah` (`mata_kuliah_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `trx_pengajar_mata_kuliah`
--

INSERT INTO `trx_pengajar_mata_kuliah` (`id`, `pengajar_id`, `mata_kuliah_id`) VALUES
(13, 7, 14),
(14, 8, 14),
(54, 26, 1),
(55, 27, 1),
(56, 27, 58),
(57, 28, 3),
(58, 28, 28),
(59, 28, 58),
(60, 29, 3),
(61, 29, 58),
(62, 29, 23),
(63, 30, 3),
(64, 30, 58),
(65, 30, 7),
(66, 31, 28),
(67, 31, 57),
(68, 32, 3),
(69, 32, 57),
(70, 33, 58),
(71, 34, 3),
(72, 35, 25),
(73, 36, 25),
(74, 37, 25),
(75, 37, 47),
(76, 38, 60),
(77, 39, 58),
(78, 39, 47),
(79, 40, 43),
(80, 41, 3),
(81, 41, 28),
(82, 42, 1),
(83, 42, 14),
(84, 43, 25),
(85, 43, 23),
(86, 44, 3),
(87, 44, 43),
(88, 45, 25),
(89, 45, 47),
(90, 46, 58),
(91, 46, 7),
(92, 47, 60),
(93, 47, 57),
(94, 48, 14),
(95, 48, 43),
(96, 49, 28),
(97, 50, 58),
(98, 51, 14),
(99, 51, 7),
(100, 52, 23),
(101, 52, 47),
(102, 53, 59),
(103, 53, 60),
(104, 54, 118),
(105, 55, 97),
(106, 56, 1),
(107, 57, 13),
(108, 58, 9),
(111, 59, 22),
(112, 59, 10),
(114, 60, 14),
(115, 60, 3),
(116, 61, 3),
(117, 62, 23),
(118, 63, 14),
(119, 63, 22),
(120, 63, 23),
(121, 63, 10),
(122, 63, 3),
(123, 63, 5),
(124, 63, 34),
(125, 63, 37),
(126, 63, 32),
(127, 63, 21),
(128, 63, 36),
(129, 63, 4),
(130, 63, 15),
(131, 63, 28),
(136, 67, 88),
(137, 67, 89),
(138, 68, 88),
(139, 68, 89),
(140, 69, 88),
(141, 69, 89),
(142, 70, 30),
(143, 70, 109),
(144, 71, 30),
(145, 72, 30),
(146, 73, 30),
(147, 74, 30),
(148, 74, 132),
(149, 74, 133),
(150, 75, 57),
(151, 75, 125),
(152, 76, 57),
(153, 77, 86),
(154, 77, 87),
(155, 78, 86),
(156, 78, 87),
(157, 79, 109),
(158, 80, 32),
(159, 80, 128),
(160, 81, 32),
(161, 81, 128),
(166, 66, 88),
(167, 66, 89),
(168, 66, 125),
(169, 84, 103),
(170, 84, 131),
(176, 85, 91),
(177, 85, 92),
(178, 85, 74),
(180, 87, 132),
(181, 87, 133),
(182, 86, 74),
(183, 86, 118),
(184, 88, 118),
(185, 82, 129),
(186, 82, 91),
(187, 82, 92),
(188, 82, 135),
(189, 83, 129),
(190, 83, 132),
(191, 83, 133),
(192, 83, 135);

-- --------------------------------------------------------

--
-- Table structure for table `trx_pengajar_waktu`
--

CREATE TABLE IF NOT EXISTS `trx_pengajar_waktu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pengajar_id` int(10) NOT NULL,
  `hari_id` int(10) NOT NULL,
  `start` int(2) NOT NULL,
  `end` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pengajar_id_hari_id` (`pengajar_id`,`hari_id`),
  KEY `FK_trx_pengajar_waktu_hari` (`hari_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `trx_pengajar_waktu`
--

INSERT INTO `trx_pengajar_waktu` (`id`, `pengajar_id`, `hari_id`, `start`, `end`) VALUES
(7, 7, 1, 11, 14),
(8, 7, 2, 8, 16),
(44, 26, 1, 8, 18),
(45, 26, 2, 8, 13),
(46, 26, 3, 9, 18),
(47, 26, 4, 10, 15),
(48, 27, 1, 8, 14),
(49, 27, 3, 10, 17),
(50, 27, 5, 8, 14),
(51, 28, 2, 8, 14),
(52, 28, 3, 10, 17),
(53, 29, 1, 8, 14),
(54, 29, 3, 8, 17),
(55, 29, 4, 10, 16),
(56, 29, 2, 10, 15),
(57, 30, 1, 9, 14),
(58, 30, 2, 9, 17),
(59, 30, 4, 10, 15),
(60, 31, 1, 10, 14),
(61, 31, 2, 9, 14),
(62, 31, 4, 8, 15),
(63, 31, 3, 10, 14),
(64, 32, 1, 11, 17),
(65, 32, 4, 11, 17),
(66, 32, 3, 11, 14),
(67, 33, 1, 10, 16),
(68, 33, 2, 9, 14),
(69, 33, 5, 8, 15),
(70, 34, 1, 9, 14),
(71, 34, 2, 9, 16),
(72, 34, 4, 9, 16),
(73, 35, 1, 11, 17),
(74, 35, 4, 9, 16),
(75, 35, 3, 9, 16),
(76, 36, 1, 11, 16),
(77, 36, 3, 14, 16),
(78, 37, 1, 11, 17),
(79, 37, 2, 9, 17),
(80, 37, 3, 8, 15),
(81, 37, 4, 11, 18),
(82, 38, 1, 9, 17),
(83, 38, 2, 8, 16),
(84, 38, 3, 11, 17),
(85, 38, 5, 9, 16),
(86, 39, 1, 11, 15),
(87, 39, 2, 8, 11),
(88, 40, 2, 13, 17),
(89, 40, 4, 9, 18),
(90, 41, 1, 11, 17),
(91, 41, 4, 8, 16),
(92, 43, 3, 10, 16),
(93, 43, 2, 10, 18),
(94, 44, 1, 10, 18),
(95, 44, 4, 9, 15),
(96, 44, 3, 9, 14),
(97, 42, 4, 10, 17),
(98, 42, 3, 8, 16),
(99, 42, 5, 11, 14),
(100, 45, 2, 9, 16),
(101, 45, 3, 10, 16),
(102, 45, 4, 9, 16),
(103, 46, 4, 8, 16),
(104, 46, 2, 12, 17),
(105, 46, 3, 8, 17),
(106, 47, 4, 9, 15),
(107, 47, 5, 10, 17),
(108, 48, 3, 12, 17),
(109, 48, 4, 12, 17),
(110, 48, 5, 10, 18),
(111, 49, 1, 9, 18),
(112, 48, 2, 11, 16),
(113, 50, 2, 11, 17),
(114, 50, 3, 10, 18),
(115, 50, 4, 11, 16),
(116, 51, 4, 10, 17),
(117, 51, 3, 10, 17),
(118, 51, 5, 10, 16),
(119, 52, 3, 9, 15),
(120, 52, 4, 10, 16),
(121, 53, 3, 8, 16),
(122, 54, 1, 8, 18),
(123, 42, 1, 8, 18),
(124, 42, 6, 8, 18),
(125, 55, 2, 10, 18),
(126, 56, 1, 8, 17),
(127, 57, 5, 8, 16),
(128, 58, 2, 8, 16),
(129, 59, 1, 8, 15),
(130, 60, 1, 13, 16),
(131, 61, 5, 8, 17),
(132, 62, 1, 13, 18),
(133, 59, 3, 9, 16),
(134, 63, 1, 8, 18),
(137, 84, 2, 8, 18),
(138, 84, 4, 8, 18),
(139, 66, 2, 13, 17),
(140, 66, 3, 8, 17),
(141, 72, 1, 8, 17),
(142, 72, 2, 8, 17),
(143, 72, 3, 8, 17),
(144, 78, 3, 8, 17),
(145, 78, 4, 8, 17),
(146, 80, 4, 8, 17),
(147, 80, 5, 8, 17),
(148, 76, 5, 8, 12),
(149, 79, 3, 8, 17),
(150, 79, 4, 8, 17),
(151, 74, 1, 13, 17),
(152, 74, 2, 8, 17),
(153, 74, 3, 8, 17),
(154, 74, 4, 8, 17),
(155, 74, 5, 8, 17),
(156, 69, 1, 8, 17),
(157, 69, 2, 8, 17),
(158, 69, 3, 8, 17),
(159, 69, 4, 8, 17),
(160, 69, 5, 8, 17),
(161, 68, 2, 8, 12),
(162, 68, 3, 8, 12),
(163, 67, 4, 8, 18),
(164, 87, 3, 8, 12),
(165, 81, 5, 8, 17),
(166, 83, 1, 8, 17),
(167, 83, 2, 8, 17),
(168, 83, 4, 8, 17),
(169, 70, 1, 8, 17),
(170, 70, 2, 8, 17),
(171, 70, 3, 8, 17),
(172, 70, 4, 8, 17),
(173, 70, 5, 8, 17),
(174, 71, 1, 8, 17),
(175, 71, 2, 8, 17),
(176, 71, 3, 8, 17),
(177, 71, 4, 8, 17),
(178, 71, 5, 8, 17),
(179, 73, 1, 8, 17),
(180, 73, 2, 8, 17),
(181, 73, 3, 8, 17),
(182, 73, 4, 8, 17),
(183, 73, 5, 8, 17),
(184, 75, 1, 8, 17),
(185, 75, 2, 8, 17),
(186, 75, 3, 8, 17),
(187, 75, 4, 8, 17),
(188, 75, 5, 8, 17),
(189, 77, 1, 8, 17),
(190, 77, 2, 8, 17),
(191, 77, 3, 8, 17),
(192, 77, 4, 8, 17),
(193, 77, 5, 8, 17),
(194, 82, 1, 8, 17),
(195, 82, 2, 8, 17),
(196, 82, 3, 8, 17),
(197, 82, 4, 8, 17),
(198, 82, 5, 8, 17),
(199, 85, 1, 8, 17),
(200, 85, 2, 8, 17),
(201, 85, 3, 8, 17),
(202, 85, 4, 8, 17),
(203, 85, 5, 8, 17),
(204, 86, 1, 8, 17),
(205, 86, 2, 8, 17),
(206, 86, 3, 8, 17),
(207, 86, 4, 8, 17),
(208, 86, 5, 8, 17),
(209, 88, 1, 8, 17),
(210, 88, 2, 8, 17),
(211, 88, 3, 8, 17),
(212, 88, 4, 8, 17),
(213, 88, 5, 8, 17);

-- --------------------------------------------------------

--
-- Table structure for table `trx_ruang_atribut`
--

CREATE TABLE IF NOT EXISTS `trx_ruang_atribut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruang_kelas_id` int(11) NOT NULL,
  `atribut_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__ruang_kelas` (`ruang_kelas_id`),
  KEY `FK__atribut` (`atribut_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trx_ruang_atribut`
--

INSERT INTO `trx_ruang_atribut` (`id`, `ruang_kelas_id`, `atribut_id`) VALUES
(1, 33, 54);

-- --------------------------------------------------------

--
-- Table structure for table `trx_ruang_kurikulum`
--

CREATE TABLE IF NOT EXISTS `trx_ruang_kurikulum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kurikulum_id` int(10) NOT NULL,
  `ruang_kelas_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_ruang_kurikulum_trx_kurikulum` (`kurikulum_id`),
  KEY `FK_trx_ruang_kurikulum_ruang_kelas_2` (`ruang_kelas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `trx_ruang_kurikulum`
--

INSERT INTO `trx_ruang_kurikulum` (`id`, `kurikulum_id`, `ruang_kelas_id`) VALUES
(50, 9, 5),
(51, 9, 3),
(52, 9, 7),
(53, 9, 8),
(66, 10, 9),
(67, 10, 10),
(68, 14, 5),
(69, 14, 4),
(70, 14, 8),
(124, 23, 5),
(125, 23, 8),
(126, 23, 10),
(127, 24, 5),
(128, 46, 8),
(129, 46, 9),
(130, 46, 11),
(131, 46, 37);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_dosen` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `FK_jadwal_hari` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `FK_jadwal_mata_kuliah` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `FK_jadwal_periode` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `FK_jadwal_ruang_kelas` FOREIGN KEY (`ruang_kelas_id`) REFERENCES `ruang_kelas` (`id`);

--
-- Constraints for table `jadwal_fail`
--
ALTER TABLE `jadwal_fail`
  ADD CONSTRAINT `FK_jadwal_fail_mata_kuliah` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `FK_jadwal_fail_periode` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
