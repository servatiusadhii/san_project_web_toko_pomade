-- Adminer 4.8.1-dev MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1,	'Smith Shine Pomade',	'Smith Fine Shine Pomade Terbuat dari Material Premium yang ada di Indonesia. Pomade ini cocok untuk anda yang botak sejak dini',	'Pomade Local',	150000,	50,	'smith-local.jpg'),
(2,	'American Crew Pomade',	'American Crew Pomade merupakan pomade buatan USA dengan High Quality Ingredients Pomade, coock untuk rambut lurus seperti Elvis Presley',	'Pomade Interlocal',	300000,	25,	'crew-inter.jpg'),
(3,	'Murrays Nu Nile Pomade',	'Murray Nu Nile Pomade merupakan Pomade Legendaris dari Murrays di USA. Pomade ini Shine and Glossy cocok untuk rambut ikal seperti Zacky Vengeance',	'Pomade Interlocal',	350000,	25,	'nunile-inter1.jpg'),
(4,	'Barber Hair Pomade',	'Barber Hair Pomade merupakan pomade buatan Indonesia. Pomade ini diclaim menggunakan produk asli dalam negeri, yang cocok digunakan oleh tukang cukur',	'Pomade Local',	95000,	65,	'barber-pomade1.jpg'),
(5,	'The King Pomade',	'King Pomade Merupakan Pomade Besutan Indonesia dan menjadi Produk Terlaris pada tahun 2008, Mempunyai ciri Medium Hold Cocok untuk rambut keras seperti Dedy Corbuzer',	'Pomade Local',	95000,	45,	'king-local.jpg'),
(6,	'Hanz de Fuko Pomade',	'Hanz de Fuko Pomade merupakan Pomade Buatan Prancis dan sebagai Merk Terbaik Tahun ini, Terbuat dari High Expensive Material cocok untuk rambut bergelombang seperti Charlie Chaplin',	'Pomade Interlocal',	515000,	85,	'hanz-inter.jpg');

DROP TABLE IF EXISTS `tb_invoice`;
CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(205) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1,	'Budi Bayu',	'Jalan Merbabu IV',	'2021-04-15 20:47:05',	'2021-04-16 20:47:05');

DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilihan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1,	1,	1,	'Smith Shine Pomade',	1,	150000,	'');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1,	'admin',	'admin',	'admin',	1),
(2,	'Beny',	'Beny',	'Beny',	2);

-- 2021-04-16 14:36:11
