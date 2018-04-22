-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2018 pada 17.17
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bayar`
--

CREATE TABLE IF NOT EXISTS `jenis_bayar` (
  `th_pelajaran` char(9) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`th_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`th_pelajaran`, `tingkat`, `jumlah`) VALUES
('2015/2016', 'XII', 200000),
('2016/2017', 'XI', 250000),
('2017/2018', 'X', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tapel`
--

CREATE TABLE IF NOT EXISTS `tapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tapel` char(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tapel`
--

INSERT INTO `tapel` (`id`, `tapel`) VALUES
(1, '2012/2013'),
(2, '2017/2018'),
(3, '2016/2017'),
(4, '2015/2016'),
(5, '2013/2014'),
(6, '2011/2012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `kd_jurusan` varchar(5) NOT NULL,
  `nm_jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kd_jurusan`, `nm_jurusan`) VALUES
('1', 'TKJ (Teknik Komputer Jaringan)'),
('2', 'Akuntansi'),
('3', 'Farmasi'),
('4', 'TSM (Teknik Sepeda Motor)'),
('5', 'TKR (Teknik Kendaraan Ringan)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kelas` varchar(5) NOT NULL,
  `th_pelajaran` char(9) NOT NULL,
  `nis` varchar(20) NOT NULL,
  PRIMARY KEY (`kelas`),
  UNIQUE KEY `th_pelajaran` (`th_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas`, `th_pelajaran`, `nis`) VALUES
('5P43', '2016/2017', '15.240.0181'),
('5P44', '2017/2018', '15.240.0141');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` varchar(20) NOT NULL,
  `nm_siswa` varchar(30) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nm_siswa`, `kd_jurusan`) VALUES
('15.240.0141', 'Retno Muninggar', '1'),
('15.240.0181', 'Rieke Pinasthi', '2'),
('15.240.0182', 'Khusnul Khotimah', '3'),
('15.240.0207', 'Masfaatun', '4'),
('15.240.0212', 'Nani Mustiatun', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `kelas` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `bulan` varchar(45) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kelas`, `nis`, `bulan`, `tgl_transaksi`, `jumlah`) VALUES
('5P43', '15.240.0181', 'January', '2018-03-11', 100000),
('5P44', '15.240.0141', 'January', '2018-03-11', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(1, 'admin', 'bbe9047444895de971dcc65fe7f9504f', 1, 'Administrator'),
(2, 'petugas', '535ab76633d94208236a2e829ea6d888', 0, 'Petugas Tata Usaha'),
(3, 'siswa', '1412', 0, 'Siswa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
