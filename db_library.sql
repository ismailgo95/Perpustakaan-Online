-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Inang: sql109.epizy.com
-- Waktu pembuatan: 07 Mei 2019 pada 23.47
-- Versi Server: 5.6.41-84.1
-- Versi PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `epiz_23857109_db_library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `anggota_id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_jk` enum('L','P') NOT NULL,
  `anggota_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`anggota_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_nama`, `anggota_alamat`, `anggota_jk`, `anggota_telp`) VALUES
(1, 'Muhammad Ismail', 'Jl.wkwkw Land', 'L', '081818181'),
(2, 'wahid ', 'jl.wkwkw land', 'L', '0818181818'),
(3, 'suhud', 'jl.wkwkw to', 'P', '082828282'),
(4, 'Wanto', 'jl.wkwkwkw land', 'P', '2323232323'),
(6, 'Syarif', 'wkwkw land', 'L', '082181818181');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `buku_id` int(11) NOT NULL AUTO_INCREMENT,
  `buku_judul` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `buku_deskripsi` text NOT NULL,
  `buku_jumlah` int(11) NOT NULL,
  `buku_cover` varchar(100) NOT NULL,
  PRIMARY KEY (`buku_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_judul`, `kategori_id`, `buku_deskripsi`, `buku_jumlah`, `buku_cover`) VALUES
(3, 'C++', 1, 'Buku Lorem Ipsum ', 4, 'download.jpg'),
(4, 'Kejahatan', 7, 'Buku Bla bla bla', 12, 'Cover-Buku-Jurusanku-FINAL152c65f4f603de.png'),
(5, 'Belajar WEB', 1, 'bababab', 5, 'cover5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Pemrograman'),
(2, 'Biologis'),
(4, 'Sains'),
(7, 'Hukum'),
(8, 'Perkebunan'),
(9, 'Pendidikan Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE IF NOT EXISTS `kembali` (
  `kembali_id` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL,
  PRIMARY KEY (`kembali_id`),
  KEY `pinjam_id` (`pinjam_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`kembali_id`, `pinjam_id`, `tgl_kembali`, `denda`) VALUES
(17, 6, '2019-05-04', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `petugas_id` int(11) NOT NULL AUTO_INCREMENT,
  `petugas_nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`petugas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `pinjam_id` int(11) NOT NULL AUTO_INCREMENT,
  `buku_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  PRIMARY KEY (`pinjam_id`),
  KEY `buku_id` (`buku_id`),
  KEY `anggota_id` (`anggota_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `buku_id`, `anggota_id`, `tgl_pinjam`, `tgl_jatuh_tempo`) VALUES
(6, 4, 2, '2019-12-12', '2020-12-12'),
(7, 5, 2, '2019-12-12', '2020-12-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
