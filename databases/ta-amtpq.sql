-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2019 pada 12.16
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta-amtpq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id` int(2) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(2) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jilid`
--

CREATE TABLE `jilid` (
  `id` int(3) NOT NULL,
  `jilid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jilid`
--

INSERT INTO `jilid` (`id`, `jilid`) VALUES
(1, 'Pemula'),
(2, '1 (Satu)'),
(3, '2 (Dua)'),
(5, '3 (Tiga)'),
(6, '4 (Empat)'),
(7, '5 (Lima)'),
(8, '6 (Enam)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katsyah`
--

CREATE TABLE `katsyah` (
  `id` int(2) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katsyah`
--

INSERT INTO `katsyah` (`id`, `kategori`, `nominal`) VALUES
(1, 'Tunggal', 20000),
(2, 'Bersaudara', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(3) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id` int(4) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `tempat_lahir_ayah` varchar(100) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `id_pend_ayah` int(3) NOT NULL,
  `id_pkj_ayah` int(4) NOT NULL,
  `telp_ayah` int(13) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tempat_lahir_ibu` varchar(100) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `id_pend_ibu` int(3) NOT NULL,
  `id_pkj_ibu` int(4) NOT NULL,
  `telp_ibu` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `id_pend_ayah`, `id_pkj_ayah`, `telp_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `id_pend_ibu`, `id_pkj_ibu`, `telp_ibu`) VALUES
(5, 'Nakula', 'Jakarta', '2019-08-20', 6, 3, 1234567876, 'Dewi', 'Lampung', '2019-08-14', 5, 2, 128372843),
(6, 'Ahmad', 'Indramayu', '1987-05-05', 5, 5, 2147483647, 'Yosika', 'Indramayu', '1989-07-31', 5, 2, 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(4) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Guru'),
(2, 'Ibu Rumah Tangga'),
(3, 'PNS'),
(4, 'Petani'),
(5, 'Pedagang'),
(6, 'Wiraswasta'),
(7, 'Buruh Tani'),
(8, 'TNI/Polisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_registrasi` int(3) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `biaya_pendftr` int(10) DEFAULT NULL,
  `biaya_jilid` int(10) DEFAULT NULL,
  `biaya_bukuprestasi` int(10) DEFAULT NULL,
  `biaya_bukurapot` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_registrasi`, `tanggal_daftar`, `nama`, `biaya_pendftr`, `biaya_jilid`, `biaya_bukuprestasi`, `biaya_bukurapot`, `total`) VALUES
(14, '2019-09-12', 'Ismatul', 20000, 20000, 20000, 20000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(3) NOT NULL,
  `pendidikan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'TK'),
(3, 'SD'),
(4, 'SMP'),
(5, 'SMA'),
(6, 'D3'),
(7, 'S1'),
(8, 'S2'),
(9, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_jk` int(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pend` int(3) NOT NULL,
  `id_pkj` varchar(4) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` int(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama`, `nip`, `id_jk`, `tempat_lahir`, `tanggal_lahir`, `id_pend`, `id_pkj`, `alamat`, `telepon`, `email`, `foto`, `id_kelas`) VALUES
(12, 'Astri Larasati', 19010003, 2, 'Indramayu', '1996-09-09', 5, '2', 'Indramayu', 812345797, 'astrilarasati@gmail.com', 'Astri Larasatiaulyaaa.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantar_tes`
--

CREATE TABLE `pengantar_tes` (
  `id` int(11) NOT NULL,
  `id_thnajaran` int(4) NOT NULL,
  `tanggal_tes` date NOT NULL,
  `id_santri` int(4) NOT NULL,
  `id_jilid` int(3) NOT NULL,
  `kelancaran` int(3) NOT NULL,
  `kefasihan` int(3) NOT NULL,
  `makhroj` int(3) NOT NULL,
  `tajwid` int(3) NOT NULL,
  `saran` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id` int(4) NOT NULL,
  `id_no_registrasi` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama_l` varchar(255) NOT NULL,
  `nama_p` varchar(20) NOT NULL,
  `id_jk` int(2) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `anak_ke` int(2) DEFAULT NULL,
  `id_pend` int(3) DEFAULT NULL,
  `id_ortu` int(4) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `id_jilid` int(3) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_katsyah` int(3) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id`, `id_no_registrasi`, `nis`, `nama_l`, `nama_p`, `id_jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `anak_ke`, `id_pend`, `id_ortu`, `tanggal_masuk`, `id_jilid`, `id_kelas`, `id_katsyah`, `foto`, `id_status`) VALUES
(5, 14, 190902014, 'Ismatul Maula', 'Isma', 2, 'Indramayu', '1998-09-06', 'Tukdana', 2, 2, 5, '2019-09-12', 1, 1, 1, 'Ismatul Maula_aulyaaa.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `syahriyah`
--

CREATE TABLE `syahriyah` (
  `id` int(11) NOT NULL,
  `id_santri` int(4) NOT NULL,
  `id_katsyah` int(2) NOT NULL,
  `id_bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syahriyah`
--

INSERT INTO `syahriyah` (`id`, `id_santri`, `id_katsyah`, `id_bulan`, `tahun`, `tanggal_bayar`, `nominal`) VALUES
(1, 1, 1, 1, 2019, '2019-08-21', 20000),
(2, 1, 1, 2, 2019, '2019-09-03', 20000),
(3, 3, 2, 2, 2019, '2019-09-11', 15000),
(4, 4, 1, 1, 2019, '2019-01-10', 20000),
(5, 4, 1, 2, 2019, '2019-02-05', 20000),
(6, 4, 1, 3, 2019, '2019-03-04', 20000),
(7, 4, 1, 4, 2019, '2019-04-04', 20000),
(8, 4, 1, 5, 2019, '2019-05-04', 20000),
(9, 4, 1, 6, 2019, '2019-06-09', 20000),
(10, 4, 1, 7, 2019, '2019-07-08', 20000),
(11, 4, 1, 9, 2019, '2019-09-08', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(3) NOT NULL,
  `thn_ajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `thn_ajaran`) VALUES
(1, '1440 H / 2019 M'),
(2, '1441 H / 2019 M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pengajar` int(11) DEFAULT '0',
  `id_user_role` int(11) DEFAULT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_pengajar`, `id_user_role`, `token`) VALUES
(1, 'admintpq', '$2y$13$FGL3krGPnm7FDiuOnl7iNe58Zc1RW8HZnG1YdbwnJeJlzylzM.kLW', 0, 1, 'r9OYL2vGKGNfN1ixavk2b1SZeVRTQm4FIKXO1rJ8U2XF8zZIrR'),
(20, '19010003', '$2y$13$OQ9bNTjnreuxU9bFMeO5Q.JSirbBx3L9Qal9d.poN0Aj0JmWSvX1K', 12, 2, 'iIef7SrAenvhxQ6wa-v9gEAa9g4ej5Ltp-h0270KqSpJpuOQZ9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Pengajar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jilid`
--
ALTER TABLE `jilid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `katsyah`
--
ALTER TABLE `katsyah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengantar_tes`
--
ALTER TABLE `pengantar_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `syahriyah`
--
ALTER TABLE `syahriyah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jilid`
--
ALTER TABLE `jilid`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `katsyah`
--
ALTER TABLE `katsyah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_registrasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengantar_tes`
--
ALTER TABLE `pengantar_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `syahriyah`
--
ALTER TABLE `syahriyah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
