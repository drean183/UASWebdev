-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 08:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--
CREATE DATABASE IF NOT EXISTS `a_wisata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `a_wisata`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Andre', 'andre@gmail.com', '1234'),
('A002', 'andre2', '1234', 'd93591bdf7860e1e4ee2fca799911215'),
('A003', 'Andre3', 'andre2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `kabupatenKODE`) VALUES
('A001', 'AREA 12', 'area12', 'di area 12', 'K004'),
('AR01', 'Lembang', 'Bandung Utara', '', 'K001'),
('AR02', 'Ledeng', 'Bandung Utara', '', 'K001'),
('AR03', 'Dago', 'Bandung Utara', '', 'K001'),
('AR04', 'Pantai Selatan Jawa', 'Gunung Kidul', '', 'K001'),
('AR05', 'Patuk', 'Gunung Kidul', '', 'K001'),
('AR07', 'AREA 7', 'AREA 7', 'DI AREA ', 'K001');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('B001', 'berita ', 'ini berita ', 'saya', 'saya', '2022-11-29', 'WS03'),
('B002', 'berita 2', 'ini berita 2', 'saya 2', 'saya 2', '2022-11-29', 'WS04'),
('B003', 'Pemprov Aceh Bantah Cabut Izin Acara Anies karena Politik ', 'Banda Aceh, CNN Indonesia -- Dinas Kebudayaan dan Pariwisata Provinsi Aceh membantah ada motif politik dibalik pencabutan izin pakai Taman Ratu Safiatuddin untuk acara silaturahmi Anies Baswedan. Kepala Disbudpar Aceh, Almuniza Kamal mengatakan agenda silaturahmi Anies dengan warga bertepatan dengan renovasi sehingga Taman Ratu Safiatuddin tak bisa dipakai.  \"Bukan (terkait politik). Tidak ada niat kita untuk ke sana. Ini murni karena ada renovasi di bagian panggung utama,\" kata Almuniza Kamal saat dikonfirmasi, Kamis (1/12).   Powered by GliaStudio Lihat Juga : NasDem Dapat Kabar Izin Lokasi Acara Anies di Riau Juga Dicabut Sebelumnya, Partai NasDem mengajukan izin pemakaian Taman Ratu Safiatuddin melalui UPTD Taman Seni dan Budaya.  Kemudian pada tanggal 25 November 2022, surat izin pemakaian taman itu dikeluarkan oleh UPTD Taman Seni dan Budaya.  Namun, tiga hari berselang surat izin keluar, pihak UPTD kembali mencabut izin tersebut dengan surat baru dengan tanggal 28 November 2022.', 'CNN', 'CNN', '2022-12-13', 'WS03'),
('B004', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quaerat optio, nesciunt deserunt corrupti molestias.    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quaerat optio, nesciunt deserunt corrupti molestias.', 'John', 'CNN', '2022-12-13', 'WS01');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Dago Pakar Bandung', 'Jl. Geger Kalong Hilir Bandung Utara', 'KW02', 'AR01'),
('WS02', 'TEST', 'test', 'KW03', 'AR02'),
('WS03', 'test', 'test', 'KW02', 'AR02'),
('WS04', 'Pantai Krakals', 'Jl. Pantai Selatan Jawsss', 'KW03', 'AR04'),
('WS06', 'Dago', 'di sana', 'KW02', 'AR02'),
('WS07', 'Destinasi 2 2', 'di situu', 'KW01', 'AR07');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F101', 'Dagos', 'WS03', '1.jpg'),
('F102', 'Pant', 'WS04', '2.jpg'),
('F103', 'asd', 'WS01', '3.jpg'),
('F104', 'Pantai2', 'WS04', '4.jpg'),
('F106', 'Test2', 'WS04', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('H001', 'Hotel 1', 'Jl mangga', '                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati expedita ut repudiandae. Dolore, eum eius? Fuga vitae consequuntur non nobis exercitationem consequatur, excepturi aspernatur voluptatibus consectetur! Perspiciatis reiciendis rem inventore!', 'vojtech-bruzek-Yrxr3bsPdS0-unsplash.jpg', 'AR03'),
('H002', 'Hotel 2', 'Jl Jeruk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed suscipit cum nulla mollitia fugiat eligendi labore quod aut accusantium nesciunt.', 'boxed-water-is-better-X5UrOwSCYYI-unsplash.jpg', 'AR01'),
('H003', 'Hotel Jeruk', 'Jl Jeruk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quaerat optio, nesciunt deserunt corrupti molestias.', 'ciudad-maderas-MXbM1NrRqtI-unsplash.jpg', 'AR05'),
('H004', 'Hotel Apel', 'Jl Apel', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quaerat optio, nesciunt deserunt corrupti molestias.', 'edvin-johansson-rlwE8f8anOc-unsplash.jpg', 'AR02'),
('H005', 'Hotel Durian', 'Jl Durian', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quaerat optio, nesciunt deserunt corrupti molestias.', 'manuel-moreno-DGa0LQ0yDPc-unsplash.jpg', 'AR01');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` char(60) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`) VALUES
('K001', 'Kabupaten Aceh Barat', 'Aceh', 'ada di acehs', 'Mesjid_Taqwa.jpg', ''),
('K003', 'test', 'test', 'tsese', 'Kanto_Bupati_abdya_2020.jpg', 'icon aceh'),
('K004', 'tres', 'sds', 'tesdd', 'Kanto_Bupati_abdya_2020.jpg', 'ico'),
('K006', 'Aceh Timur', 'aceh', 'di aceh', 'Kanto_Bupati_abdya_2020.jpg', 'icon aceh timurrrr'),
('K007', 'test 77', 'test 777', '-', 'test.jpg', 'icon 77');

-- --------------------------------------------------------

--
-- Table structure for table `kategori2`
--

CREATE TABLE `kategori2` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori2`
--

INSERT INTO `kategori2` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('KW01', 'Alam', 'Wisata Alam', 'Buku'),
('KW02', 'Kuliner', 'Wisata Kuliner', 'Buku'),
('KW03', 'Pantai', 'Wisata pinggir laut', 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `kulinerID` char(4) NOT NULL,
  `kulinernama` varchar(30) NOT NULL,
  `kulinerketerangan` varchar(255) NOT NULL,
  `kulinerfoto` text NOT NULL,
  `provinsiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`kulinerID`, `kulinernama`, `kulinerketerangan`, `kulinerfoto`, `provinsiID`) VALUES
('K001', 'Kuah Pilek', 'Ini adalah makanan khas Aceh yang paling disukai masyarakatnya terutama yang berada di daerah Timur Aceh, Aceh Pidie dan sekitarnya.', 'Makanan_khas_ACEH_1.width-1000.jpg', 'P001'),
('K002', 'Asam Keueng', 'Kuah Asam Keueng ini merupakan masakan ikan. Biasanya orang-orang Aceh menggunaan ikan tongkol, lele atau lainnya, yang diolah dengan rasa khas Asam Keueng.', 'Makanan_khas_ACEH_2.width-1000.jpg', 'P001'),
('K003', 'Masak Mirah', 'Masak mirah merupakan makanan khas Aceh yang banyak ditemukan di pesta perkawinan atau kenduri lainnya, bahkan pada hari menyambut bulan puasa atau menjelang Ramadan.', 'Makanan_khas_ACEH_3.width-1000.jpg', 'P001'),
('K004', 'Masak Puteh', 'Makanan khas Aceh yaitu Masak Puteh juga menggunakna daging sapi atau lembu. Tapi tak jarang bebek pun digunakan.', 'Makanan_khas_Aceh_4.width-1000.jpg', 'P001'),
('K005', 'Mie Gomak', 'Makanan khas Sumatera Utara selanjutnya adalah Mie Gomak. Mie ini terbuat dari mie yang sering disebut Mie Lidi atau dikenal oleh orang Batak sebagai Mie Besar. Masyarakat Batak menyebut makanan ini sebagai Mie Gomak karena cara pembuatannya digomak-gomak', '012984800_1591175807-mie-gomak-medan.jpg', 'P002'),
('K006', 'Tekwan', 'Inilah makanan khas Palembang yang jadi kebanggaan warganya! Tekwan adalah sup bakso ikan yang segar dan mengangatkan tubuh. Adonan tekwan sendiri mirip dengan pempek. Bedanya adalah tekwan menggunakan lebih banyak ikan dan disajikan dalam bentuk bola-bol', 'tekwan-768x512.jpg', 'P006'),
('sdfs', 'fsdfsdf', 'sdfsdfsd', 'test.jpg', 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(4) NOT NULL,
  `provinsinama` varchar(30) NOT NULL,
  `provinsiketerangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsiketerangan`) VALUES
('P001', 'Aceh', '-'),
('P002', 'Sumatra Utara', '-'),
('P003', 'Sumatra Barat', '-'),
('P004', 'Riau', '-'),
('P005', 'Jambi', '-'),
('P006', 'Sumatra Selatan', '-'),
('P007', 'Bengkulu', '-'),
('P008', 'DKI Jakarta', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rumahadat`
--

CREATE TABLE `rumahadat` (
  `rumahID` char(4) NOT NULL,
  `namarumahadat` varchar(30) NOT NULL,
  `keteranganrumahadat` varchar(255) NOT NULL,
  `fotorumahadat` text NOT NULL,
  `provinsiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumahadat`
--

INSERT INTO `rumahadat` (`rumahID`, `namarumahadat`, `keteranganrumahadat`, `fotorumahadat`, `provinsiID`) VALUES
('R001', 'Rumah Adat Karo', 'Dibandingkan dengan rumah adat lain, rumah ini kemudian termasuk rumah adat paling besar. Tingginya mencapai 12 meter dan dibangun tanpa menggunakan paku, pada setiap bagiannya kemudian dililit menggunakan kayu. Rumah adat Karo atau dikenal juga dengan', 'karo.jpeg', 'P002'),
('R002', 'Rumoh Aceh', 'Konon, Rumoh Aceh didesain sedemikian rupa karena berkaitan dengan kepercayaan masyarakat Aceh pada zaman dahulu. Bagi masyarakat Aceh, Rumoh Aceh ini bukan sekadar hunian biasa. Rumoh Aceh juga merepresentasikan keyakinan masyraakat terhadap Tuhan dan al', '61c9c7c8b527b.jpg', 'P001'),
('R003', 'Padang Gonjong Ampek Baanjuang', 'Rumah adat ini merupakan rumah adat Padang yang wajib didirikan di daerah Luhak Nan Tigo. Rumah adat Ampek Baanjuang merupakan tanda adat bagi masyarakat setempat. Sesuai namanya ‘ampek’ yang berarti empat, bangunan rumah adat ini memiliki 4 buah gojong d', 'Gonjong-Ampek-Baanjuang.jpg', 'P003'),
('R004', 'Gonjong Anam', 'Rumah adat ini adalah rumah adat Padang. Bentuk bangunannya mirip seperti Rumah Gadang Gajah Maharam, tetapi rumah adat ini sudah dimodifikasi dengan penambahan ukiran-ukiran khas Minangkabau sehingga menjadi bangunan beranjung. Rumah adat Gonjong Anam pu', 'Gonjong-Anam.jpg', 'P003'),
('R005', 'Rumah Adat Selaso Jatuh Kembar', 'Rumah adat Selaso Jatuh Kembar sebagai rumah resmi Provinsi Riau yang umumnya disebut rumah, karena kebanyakan masyarakat Riau adalah Suku Melayu.', '61ee103036b57.jpeg', 'P001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`),
  ADD KEY `kabupatenKODE` (`kabupatenKODE`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`),
  ADD KEY `destinasiID` (`destinasiID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`),
  ADD KEY `kategoriID` (`kategoriID`),
  ADD KEY `areaID` (`areaID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`),
  ADD KEY `destinasiID` (`destinasiID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`),
  ADD KEY `areaID` (`areaID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indexes for table `kategori2`
--
ALTER TABLE `kategori2`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`kulinerID`),
  ADD KEY `provinsiID` (`provinsiID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indexes for table `rumahadat`
--
ALTER TABLE `rumahadat`
  ADD PRIMARY KEY (`rumahID`),
  ADD KEY `provinsiID` (`provinsiID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_fk_kabupaten` FOREIGN KEY (`kabupatenKODE`) REFERENCES `kabupaten` (`kabupatenKODE`);

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`destinasiID`) REFERENCES `destinasi` (`destinasiID`);

--
-- Constraints for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `destinasi_ibfk_1` FOREIGN KEY (`kategoriID`) REFERENCES `kategori2` (`kategoriID`),
  ADD CONSTRAINT `destinasi_ibfk_2` FOREIGN KEY (`areaID`) REFERENCES `area` (`areaID`);

--
-- Constraints for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD CONSTRAINT `fotodestinasi_ibfk_1` FOREIGN KEY (`destinasiID`) REFERENCES `destinasi` (`destinasiID`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`areaID`) REFERENCES `area` (`areaID`);

--
-- Constraints for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD CONSTRAINT `kuliner_ibfk_1` FOREIGN KEY (`provinsiID`) REFERENCES `provinsi` (`provinsiID`);

--
-- Constraints for table `rumahadat`
--
ALTER TABLE `rumahadat`
  ADD CONSTRAINT `rumahadat_ibfk_1` FOREIGN KEY (`provinsiID`) REFERENCES `provinsi` (`provinsiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
