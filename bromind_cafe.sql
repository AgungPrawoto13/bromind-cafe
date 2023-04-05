-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 02:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bromind_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 2, 4),
(12, 1, 3),
(14, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `no_cart` varchar(20) NOT NULL,
  `kd_user` varchar(6) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`no_cart`, `kd_user`, `product_id`, `qty`) VALUES
('CT00003', 'CTR003', 'PRK000', 4),
('CT01002', 'CTR002', 'PRK009', 2),
('CT01003', 'CTR003', 'PRK009', 2),
('CT02002', 'CTR002', 'PRK000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_address` varchar(30) NOT NULL,
  `no_hp` int(30) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `is_active` int(3) DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `no_hp`, `email`, `role_id`, `password`, `is_active`, `date_created`) VALUES
(2, 'mamangracing', 'gak tau', 12345678, 'huft@gmail.com', 3, 'huft123', 1, '2021-07-16'),
(3, 'cihuy', 'gak tau', 9877654, 'cihuy@gmail.com', 3, 'cihuy123', 1, '2021-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `product_id`) VALUES
(1, 17),
(2, 16),
(3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `menu_sidebar`
--

CREATE TABLE `menu_sidebar` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_sidebar`
--

INSERT INTO `menu_sidebar` (`id`, `menu`) VALUES
(1, 'Leader'),
(2, 'Casier'),
(4, 'Website');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` varchar(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `comment` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `comment`, `date_created`) VALUES
('MSG00', 'Rainhard', 'rainhardhiskia@gmail', 'Kopinya enak', '2021-07-17'),
('MSG01', 'Malik Ardhiansyah', 'malikardhi@gmail.com', 'pas banget ada promonya nih', '2021-07-18'),
('MSG02', 'Lidya Simanjuntak', 'lidya@gmail.com', 'kopi sama rotinya enak ada promo nya juga sering2 ya ngadain promo hehe', '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `no` int(10) NOT NULL,
  `link` varchar(20) DEFAULT NULL,
  `id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`no`, `link`, `id`) VALUES
(1, 'story', 'story'),
(2, 'menu', 'menu'),
(3, 'contact', 'contact'),
(4, 'yt', 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(6) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_type` varchar(20) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `product_img` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `description`, `price`, `product_img`) VALUES
('PRK000', 'Jus Alpukat', 'Baverage', 'Jus Alpukat', 15000, 'jus_alpukat.jpeg'),
('PRK001', 'Es Kopi', 'Baverage', 'Es kopi pake es\r\n', 10000, 'es_kopi.jpeg'),
('PRK002', 'Kopi Late', 'Baverage', 'kopi late', 15000, 'kopi_late.jpg'),
('PRK003', 'Teh Anget', 'Baverage', 'Teh Anget', 20000, 'teh_anget.jpeg'),
('PRK004', 'Kentang Goreng', 'Food', 'Extra Kentang', 20000, 'kentang_goreng.jpg'),
('PRK005', 'Pisang Coklat keju', 'Food', 'Pisang coklat dengan keju', 25000, 'pisang_bakar_coklat_keju.jpg'),
('PRK006', 'Es Coklat', 'Baverage', 'Extra coklat', 20000, 'es_coklat.jpeg'),
('PRK007', 'pisang bakar coklat', 'Food', 'Dengan extra coklat', 15000, 'pisang_bakar_coklat.jpg'),
('PRK008', 'Roti Bakar Coklat Keju', 'Food', 'Dengan extra keju', 30000, 'roti_bakar_coklat_keju.jpg'),
('PRK009', 'Roti Bakar Strobery', 'Food', 'Dengan extra selai', 15000, 'roti_bakar_stroberi.jpg'),
('PRK010', 'Roti Bakar Keju Kacang', 'Food', 'Dengan extra kacang', 25000, 'roti_bakar_keju_kacang.jpeg'),
('PRK011', 'Roti Bakar Coklat Kacang', 'Food', 'Dengan extra coklat dan kacang', 35000, 'roti_bakar_kacang_coklat.jpg'),
('PRK012', 'Pisang Bakar Keju', 'Food', 'Dengan extra keju', 20000, 'pisang_bakar_keju.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `promo_img` varchar(128) NOT NULL,
  `promo_name` varchar(128) NOT NULL,
  `promo_detail` varchar(256) NOT NULL,
  `period` varchar(128) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `promo_img`, `promo_name`, `promo_detail`, `period`, `status`) VALUES
(1, 'gopay.png', 'Promo GOPAY 5%', 'Setiap pembelian dengan menggunakan GOPAY, akan mendapat potongan harga subtotal sebesar 5%', '17 August - 30 Desember 2020', 1),
(2, 'ovo.png', 'Promo OVO 10%', 'Setiap pembelian dengan menggunakan OVO, akan mendapat potongan harga subtotal sebesar 10%', '17 August - 30 Desember 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` varchar(6) NOT NULL,
  `food` varchar(30) DEFAULT NULL,
  `baverg` varchar(30) DEFAULT NULL,
  `on_income` int(11) NOT NULL,
  `off_income` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `spending` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `food`, `baverg`, `on_income`, `off_income`, `income`, `spending`, `profit`, `date_created`) VALUES
('RPT00', 'Roti Bakar Coklat Keju', 'Kopi Late', 60000, 40000, 100000, 20000, 80000, '2021-07-17'),
('RPT01', 'Roti Bakar Coklat Keju', 'Kopi Late', 60000, 40000, 100000, 20000, 80000, '2021-07-18'),
('RPT02', 'Roti Bakar Coklat Keju', 'Kopi Late', 60000, 40000, 100000, 20000, 80000, '2021-07-20'),
('RPT03', 'Roti Bakar Coklat Keju', 'Kopi Late', 60000, 40000, 100000, 20000, 80000, '2021-07-25'),
('RPT04', 'Roti Bakar Strobery', 'Jus Alpukat', 100000, 20000, 120000, 1000, 119000, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Pemilik'),
(2, 'Kasir'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `p1` text NOT NULL,
  `p2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `image`, `p1`, `p2`) VALUES
(1, 'story.png', 'Ketika menjalin pertemanan, Anda dan sahabat mungkin memiliki hobi atau minat yang sama akan suatu hal. Salah satunya adalah minuman kopi yang memiliki rasa khas pahit dan manis ini. Sahabat yang telah setia berada di samping Anda dalam berbagai situasi memang perlu dijaga dan tidak boleh disia-siakan. Maka dari itu, ketika dia membutuhkan kehadiran Anda, sebisa mungkin Anda akan meluangkan waktu untuknya. Meskipun kadang pernah merasa kecewa, sepertinya perasaan itu adalah hal yang lumrah karena semua orang kemungkinan juga mengalaminya.	Namun, tak dapat dipungkiri bahwa dari pengalaman pahit yang pernah dirasakan, ada pelajaran yang Anda dapat. Dari situlah Tuhan melatih Anda untuk terus belajar dan berubah menjadi sosok yang lebih baik. Terkadang, Anda tidak mendapatkan balasan yang sama atas kebaikan yang telah Anda lakukan pada seseorang. Namun, hal itu bukan berarti menjadi alasan Anda untuk berhenti berbuat baik. Hangatnya minuman kopi dapat memberikan ketenangan kepada orang-orang yang menikmatinya. Selain itu, menenggak minuman berwarna gelap ini juga menjadi salah satu cara untuk mendapatkan inspirasi', 'Ketika dihadapkan dengan urusan pekerjaan yang berat, risiko terkena stres mungkin sulit untuk dihindari. Alhasil, Anda bisa saja lupa untuk menikmati hal-hal sederhana yang sebenarnya dapat menenangkan pikiran. Anda bisa saja menikmati Kopi untuk menenangkan pikiran anda sejenak. Ketika menghadapi kesulitan yang berat dalam hidup, pertanyaan seperti “apa salah saya?” mungkin pernah Anda tanyakan kepada Tuhan. Perasaan tidak adil dan tersakiti pun mungkin tidak dapat dihindari.Namun, Anda perlu percaya bahwa setelah kesulitan itu berlalu, Tuhan akan menggantikannya dengan sesuatu yang lebih baik. Layaknya kopi, pahit dan manis yang Anda rasakan ada untuk menyeimbangkan serta memberikan kenikmatan tersendiri dalam hidup. Hidup itu ibarat minum kopi , kadang rasanya pahit , tapi itu yang membuat mata terbuka , karena hidup itu tak semana mestinya manis yang kita inginkan , diperlukan juga adanya pengalaman pahit supaya kita bisa tahu bahwa kita perlu instropeksi kepada diri sendiri apa yang telah kita lakukan , apakah itu baik apa tidak ? Entah esok lusa atau nanti');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard Leader', 'leader', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard Admin', 'casier', 'fas fa-fw fa-tachometer-alt', 1),
(9, 4, 'Information', 'website', 'fas fa-fw fa-info-circle', 1),
(10, 4, 'Product', 'product', 'fas fa-fw fa-store', 1),
(11, 4, 'Story', 'website/story', 'fas fa-fw fa-hourglass-half', 1),
(12, 1, 'Message', 'website/message', 'fas fa-fw fa-comments', 1),
(13, 4, 'Promo', 'website/promo', 'fas fa-fw fa-percentage', 1),
(14, 4, 'Report', 'report', 'fas fa-fw fa-chart-line', 1),
(15, 1, 'Employees', 'leader/employees', 'fas fa-fw fa-users', 0),
(16, 1, 'My Profile', 'leader/profile', 'fas fa-fw fa-user', 1),
(17, 1, 'Edit Profile', 'leader/editprofile', 'fas fa-fw fa-user-edit', 1),
(18, 1, 'Change Password', 'leader/changepassword', 'fas fa-fw fa-key', 1),
(19, 2, 'My Profile', 'casier/profile', 'fas fa-fw fa-user', 1),
(20, 2, 'Edit Profile', 'casier/editprofile', 'fas fa-fw fa-user-edit', 1),
(21, 2, 'Change Password', 'casier/changepassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` varchar(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `address` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `date_created`, `address`, `no_hp`) VALUES
('KSR001', 'Evi', 'evi123@gmail.com', 'evi123', 'default.png', 2, 1, '2021-07-01', 'Jl Mampang Prapatan', '+6287678964598'),
('LDR001', 'Anton Mabruri', 'anton@gmail.com', 'anton123', 'default.png', 1, 1, '2021-07-01', 'Jl Buncit Raya', '+6287687655698');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `logo` varchar(128) NOT NULL,
  `head` varchar(128) NOT NULL,
  `loc_img` varchar(128) NOT NULL,
  `location` varchar(192) NOT NULL,
  `maps` varchar(128) NOT NULL,
  `fb` varchar(192) NOT NULL,
  `ig` varchar(192) NOT NULL,
  `yt` varchar(192) NOT NULL,
  `wa` varchar(192) NOT NULL,
  `senju` varchar(50) NOT NULL,
  `sabtu` varchar(50) NOT NULL,
  `weekend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `logo`, `head`, `loc_img`, `location`, `maps`, `fb`, `ig`, `yt`, `wa`, `senju`, `sabtu`, `weekend`) VALUES
(1, 'logo.png', 'BroMind Cafe', 'location.png', 'Jl. KSU Kebon Duren Kalimulya, Ruko Tran Depok Cyber Village No. R26, Kalimulya, Cilodong, Depok City, West Java 16413', 'https://goo.gl/maps/KF4tAYiX2G8HfpiQ8', 'https://web.facebook.com/ardhiansyah.marine', 'https://www.instagram.com/ardhiansyah_malik1200/', 'https://www.youtube.com/channel/UCzmTpFiq-0TBAto96lS5PoQ/', 'https://wa.me/message/4M42AXBU247XK1', '3 PM - 1 AM', '3 PM - 3 AM', '3 PM - 12 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`no_cart`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_sidebar`
--
ALTER TABLE `menu_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`),
  ADD UNIQUE KEY `kd_user` (`kd_user`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_sidebar`
--
ALTER TABLE `menu_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
