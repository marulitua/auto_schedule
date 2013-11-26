-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2013 at 04:35 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `atribut`) VALUES
(5, 'GKA'),
(2, 'komputer'),
(3, 'mac'),
(1, 'meja design'),
(51, 'meja makan kecil'),
(4, 'oracle');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `full_name`, `NI`, `batas_lantai`) VALUES
(1, 'Hira Meidia, B.Eng., Ph.D.', '1080018', NULL),
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
(172, 'Dr. P.M. Winarno, M.Kom.', '000632', NULL),
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
(195, 'suharto', '235sf', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

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
(32, 'Sistem Operasi', 'TI405', 0, 3),
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
(81, 'Pemrograman Sistem Mobile', 'TI735P', 1, 1),
(82, 'Jaringan Komputer', 'SK430', 0, 3),
(83, 'Jaringan Komputer', 'SK430P', 1, 1),
(84, 'Pengantar Teknologi Internet', 'TI330', 0, 2),
(85, 'Pengantar Teknologi Internet', 'TI330P', 1, 1),
(86, 'Sistem Basis Data', 'TI403', 0, 3),
(87, 'Sistem Basis Data', 'TI403P', 1, 1),
(88, 'Struktur Data', 'TI202', 0, 3),
(89, 'Struktur Data', 'TI202P', 1, 1),
(91, 'Grafika Komputer dan Animasi', 'TI624', 0, 2),
(92, 'Grafika Komputer dan Animasi', 'TI624P', 1, 1),
(93, 'Pemrograman Lanjutan 1', 'TI533', 0, 2),
(94, 'Pemrograman Lanjutan 1', 'TI533P', 1, 1),
(96, 'Pemrograman Berorientasi Objek', 'TI331', 0, 2),
(97, 'Pemrograman Berorientasi Objek', 'TI331P', 1, 1),
(98, 'Pemograman Web', 'TI532', 0, 2),
(99, 'Pemograman Web', 'TI532P', 1, 1),
(100, 'Database Lanjutan', 'SI541', 0, 2),
(101, 'Database Lanjutan', 'SI541P', 1, 1),
(102, 'Analisis Perancangan dan Algoritma', 'TI507', 0, 3),
(103, 'Pemrograman Lanjutan 2', 'TI634', 0, 2),
(104, 'Pemrograman Lanjutan 2', 'TI634P', 1, 1),
(105, 'Technopreneurship', 'EM604', 0, 2),
(106, 'Administrasi Database 2', 'SI744', 0, 2),
(107, 'Administrasi Database 2', 'SI744P', 1, 1),
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
(126, 'Komunikasi Nirkabel', 'SK653', 0, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `tahun_ajar`, `semester_id`, `create_time`, `finished_time`) VALUES
(2, '2011-2012', 1, '2011-05-24 18:17:37', '2011-05-26 18:00:00'),
(10, '2011-2012', 2, '2011-12-23 18:22:37', '2011-12-29 22:05:00'),
(11, '2012-2013', 1, '2012-05-23 18:23:43', '2012-05-24 22:00:00'),
(12, '2012-2013', 2, '2012-11-23 18:24:31', '2012-11-29 19:18:00'),
(23, '2013-2014', 1, '2013-11-23 14:11:30', '2013-11-23 20:11:42'),
(28, '2013-2014', 2, '2013-11-24 01:06:59', '2013-11-26 01:10:39'),
(29, '2014-2015', 1, '2013-11-25 19:19:08', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273 ;

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
(75, 0, 'C201', 3, 2),
(76, 0, 'C202', 3, 2),
(77, 0, 'C203', 3, 2),
(78, 0, 'C204', 3, 2),
(81, 0, 'C205', 3, 2),
(82, 0, 'C206', 3, 2),
(83, 0, 'C207', 3, 2),
(84, 0, 'C208', 3, 2),
(85, 0, 'C209', 3, 2),
(86, 0, 'C210', 3, 2),
(87, 0, 'C211', 3, 2),
(88, 0, 'C212', 3, 2),
(89, 0, 'C213', 3, 2),
(90, 0, 'C214', 3, 2),
(91, 0, 'C215', 3, 2),
(92, 0, 'C216', 3, 2),
(93, 0, 'C217', 3, 2),
(94, 0, 'C218', 3, 2),
(95, 0, 'C219', 3, 2),
(96, 0, 'C220', 3, 2),
(97, 0, 'C301', 3, 3),
(98, 0, 'C302', 3, 3),
(99, 0, 'C303', 3, 3),
(100, 0, 'C304', 3, 3),
(101, 0, 'C305', 3, 3),
(102, 0, 'C306', 3, 3),
(103, 0, 'C307', 3, 3),
(104, 0, 'C308', 3, 3),
(105, 0, 'C309', 3, 3),
(106, 0, 'C310', 3, 3),
(107, 0, 'C311', 3, 3),
(108, 0, 'C312', 3, 3),
(109, 0, 'C313', 3, 3),
(110, 0, 'C314', 3, 3),
(111, 0, 'C315', 3, 3),
(112, 0, 'C316', 3, 3),
(113, 0, 'C317', 3, 3),
(114, 0, 'C318', 3, 3),
(115, 0, 'C319', 3, 3),
(116, 0, 'C320', 3, 3),
(157, 0, 'C403', 3, 4),
(175, 0, 'C404', 3, 4),
(176, 0, 'C405', 3, 4),
(177, 0, 'C406', 3, 4),
(178, 0, 'C407', 3, 4),
(179, 0, 'C408', 3, 4),
(180, 0, 'C409', 3, 4),
(181, 0, 'C410', 3, 4),
(182, 0, 'C411', 3, 4),
(183, 0, 'C412', 3, 4),
(184, 0, 'C413', 3, 4),
(185, 0, 'C414', 3, 4),
(186, 0, 'C415', 3, 4),
(187, 0, 'C416', 3, 4),
(188, 0, 'C417', 3, 4),
(189, 0, 'C418', 3, 4),
(190, 0, 'C419', 3, 4),
(191, 0, 'C420', 3, 4),
(192, 0, 'C501', 3, 5),
(193, 0, 'C502', 3, 5),
(194, 0, 'C503', 3, 5),
(195, 0, 'C504', 3, 5),
(196, 0, 'C505', 3, 5),
(197, 0, 'C506', 3, 5),
(198, 0, 'C507', 3, 5),
(199, 0, 'C508', 3, 5),
(200, 0, 'C509', 3, 5),
(201, 0, 'C510', 3, 5),
(202, 0, 'C511', 3, 5),
(203, 0, 'C512', 3, 5),
(204, 0, 'C513', 3, 5),
(205, 0, 'C514', 3, 5),
(206, 0, 'C515', 3, 5),
(207, 0, 'C516', 3, 5),
(208, 0, 'C517', 3, 5),
(209, 0, 'C518', 3, 5),
(210, 0, 'C519', 3, 5),
(211, 0, 'C520', 3, 5),
(212, 0, 'C601', 3, 6),
(213, 0, 'C602', 3, 6),
(214, 0, 'C603', 3, 6),
(215, 0, 'C604', 3, 6),
(216, 0, 'C605', 3, 6),
(217, 0, 'C606', 3, 6),
(218, 0, 'C607', 3, 6),
(219, 0, 'C608', 3, 6),
(220, 0, 'C609', 3, 6),
(221, 0, 'C610', 3, 6),
(222, 0, 'C611', 3, 6),
(223, 0, 'C612', 3, 6),
(224, 0, 'C613', 3, 6),
(225, 0, 'C614', 3, 6),
(226, 0, 'C615', 3, 6),
(227, 0, 'C616', 3, 6),
(228, 0, 'C617', 3, 6),
(229, 0, 'C618', 3, 6),
(230, 0, 'C619', 3, 6),
(231, 0, 'C620', 3, 6),
(252, 0, 'C701', 3, 7),
(253, 0, 'C702', 3, 7),
(254, 0, 'C703', 3, 7),
(255, 0, 'C704', 3, 7),
(256, 0, 'C705', 3, 7),
(257, 0, 'C706', 3, 7),
(258, 0, 'C707', 3, 7),
(259, 0, 'C708', 3, 7),
(260, 0, 'C709', 3, 7),
(261, 0, 'C710', 3, 7),
(262, 0, 'C711', 3, 7),
(263, 0, 'C712', 3, 7),
(264, 0, 'C713', 3, 7),
(265, 0, 'C714', 3, 7),
(266, 0, 'C715', 3, 7),
(267, 0, 'C716', 3, 7),
(268, 0, 'C717', 3, 7),
(269, 0, 'C718', 3, 7),
(270, 0, 'C719', 3, 7),
(271, 0, 'C720', 3, 7),
(272, 0, 'B778', 2, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

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
(64, 18, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

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
(112, 19, 1),
(113, 19, 2),
(116, 20, 3),
(117, 20, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(15, 29, 1, 5),
(16, 29, 7, 5),
(17, 29, 93, 4),
(18, 29, 94, 4),
(19, 29, 10, 6),
(20, 29, 3, 6),
(21, 29, 16, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `trx_pengajar`
--

INSERT INTO `trx_pengajar` (`id`, `periode_id`, `dosen_id`) VALUES
(7, 28, 1),
(8, 28, 2),
(9, 29, 1),
(10, 29, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `trx_pengajar_mata_kuliah`
--

INSERT INTO `trx_pengajar_mata_kuliah` (`id`, `pengajar_id`, `mata_kuliah_id`) VALUES
(13, 7, 14),
(14, 8, 14),
(16, 9, 1),
(17, 9, 93),
(18, 9, 10),
(19, 9, 3),
(20, 9, 16),
(21, 10, 93),
(22, 10, 94);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `trx_pengajar_waktu`
--

INSERT INTO `trx_pengajar_waktu` (`id`, `pengajar_id`, `hari_id`, `start`, `end`) VALUES
(7, 7, 1, 11, 14),
(8, 7, 2, 8, 16),
(9, 9, 1, 9, 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `trx_ruang_atribut`
--

INSERT INTO `trx_ruang_atribut` (`id`, `ruang_kelas_id`, `atribut_id`) VALUES
(101, 5, 2),
(103, 4, 5),
(104, 4, 3),
(106, 7, 5),
(108, 7, 1),
(109, 7, 51),
(112, 5, 1),
(117, 3, 1),
(118, 4, 2),
(125, 6, 2),
(130, 9, 2),
(131, 9, 5),
(137, 10, 1),
(138, 10, 2),
(139, 13, 5),
(141, 13, 2),
(142, 13, 1),
(143, 13, 51),
(145, 5, 3),
(148, 3, 3),
(149, 3, 51),
(152, 4, 1),
(153, 4, 4),
(155, 6, 51),
(156, 6, 1),
(158, 7, 2),
(160, 7, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

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
(71, 19, 8),
(72, 19, 9),
(73, 19, 10),
(78, 20, 4),
(79, 20, 10),
(80, 20, 11),
(81, 20, 113);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `FK_periode_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Constraints for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD CONSTRAINT `FK_ruang_kelas_gedung` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`);

--
-- Constraints for table `trx_atribut_kurikulum`
--
ALTER TABLE `trx_atribut_kurikulum`
  ADD CONSTRAINT `FK_trx_atribut_kurikulum_atribut` FOREIGN KEY (`atribut_id`) REFERENCES `atribut` (`id`),
  ADD CONSTRAINT `FK_trx_atribut_kurikulum_trx_kurikulum` FOREIGN KEY (`kurikulum_id`) REFERENCES `trx_kurikulum` (`id`);

--
-- Constraints for table `trx_hari_kurikulum`
--
ALTER TABLE `trx_hari_kurikulum`
  ADD CONSTRAINT `FK_trx_hari_kurikulum_hari` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `FK_trx_hari_kurikulum_trx_kurikulum` FOREIGN KEY (`kurikulum_id`) REFERENCES `trx_kurikulum` (`id`);

--
-- Constraints for table `trx_kurikulum`
--
ALTER TABLE `trx_kurikulum`
  ADD CONSTRAINT `FK_trx_kurikulum_mata_kuliah` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `FK_trx_kurikulum_periode` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`);

--
-- Constraints for table `trx_pengajar`
--
ALTER TABLE `trx_pengajar`
  ADD CONSTRAINT `FK_trx_pengajar_dosen` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `FK_trx_pengajar_periode` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`);

--
-- Constraints for table `trx_pengajar_mata_kuliah`
--
ALTER TABLE `trx_pengajar_mata_kuliah`
  ADD CONSTRAINT `FK_trx_pengajar_mata_kuliah_mata_kuliah` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `FK_trx_pengajar_mata_kuliah_trx_pengajar` FOREIGN KEY (`pengajar_id`) REFERENCES `trx_pengajar` (`id`);

--
-- Constraints for table `trx_pengajar_waktu`
--
ALTER TABLE `trx_pengajar_waktu`
  ADD CONSTRAINT `FK_trx_pengajar_waktu_hari` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `FK_trx_pengajar_waktu_trx_pengajar` FOREIGN KEY (`pengajar_id`) REFERENCES `trx_pengajar` (`id`);

--
-- Constraints for table `trx_ruang_atribut`
--
ALTER TABLE `trx_ruang_atribut`
  ADD CONSTRAINT `FK__atribut` FOREIGN KEY (`atribut_id`) REFERENCES `atribut` (`id`),
  ADD CONSTRAINT `FK__ruang_kelas` FOREIGN KEY (`ruang_kelas_id`) REFERENCES `ruang_kelas` (`id`);

--
-- Constraints for table `trx_ruang_kurikulum`
--
ALTER TABLE `trx_ruang_kurikulum`
  ADD CONSTRAINT `FK_trx_ruang_kurikulum_ruang_kelas_2` FOREIGN KEY (`ruang_kelas_id`) REFERENCES `ruang_kelas` (`id`),
  ADD CONSTRAINT `FK_trx_ruang_kurikulum_trx_kurikulum` FOREIGN KEY (`kurikulum_id`) REFERENCES `trx_kurikulum` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
