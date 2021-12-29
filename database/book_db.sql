-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 05:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` char(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `order_notes` varchar(255) NOT NULL,
  `agree_terms_conditions` char(3) NOT NULL COMMENT 'yes/no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Ain Maisarah'),
(2, 'Bestseller Agama'),
(3, 'Icon'),
(4, 'Jemputan Haji'),
(5, 'Kelab Penulis Muda'),
(6, 'Keluarga'),
(7, 'Komik M'),
(8, 'Motivasi Umum'),
(9, 'Novel Islamik'),
(10, 'Novel Sejarah'),
(11, 'Pustaka Ilmiah'),
(12, 'Raikan Kasih Rasulullah'),
(13, 'Resepi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` char(22) NOT NULL,
  `buyer_id` char(15) NOT NULL,
  `transaction_id` char(23) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `cart_total_price` decimal(7,2) NOT NULL,
  `shipping_fee` decimal(5,2) NOT NULL,
  `order_final_amount` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` char(22) NOT NULL,
  `item_id` int(12) NOT NULL,
  `quantity` int(3) NOT NULL,
  `subtotal_price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `cat_id` int(12) NOT NULL COMMENT 'category id',
  `title` varchar(200) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `title`, `price`, `description`, `image_name`) VALUES
(1, 1, 'ANA PARI-PARI AQUA', '12.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 ANA PARI-PARI AQUA\r\n📖 keluaran ANA MUSLIM BOOKS\r\n🎀🎀 Harga : RM12.90\r\nSINOPSIS 🎗🎗\r\n“Kak Ana, Man takut. Air dah semakin tinggi, kak…” Man semakin panik.\r\n“ Biar Kak Ana dukung Man, ya…” Banjir besar yang melanda kampung Ana telah memisahkan Ana dan adik-adiknya serta ibu mereka. Apabila Ana menemui Man, Ana berusaha untuk membawa Man ke tempat yang selamat. Namun, air naik dengan pantas. Tenaga Ana pula semakin lemah. Tapi, Ana tahu, dialah satu-satunya harap', 'ainmaisarah_1_img.jpg'),
(2, 2, 'KEMBALI KEPADA JAWI : PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM', '5.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 KEMBALI KEPADA JAWI : PANDAI MEMBACA DAN MENULIS JAWI DALAM MASA 20 JAM\r\n📖 oleh USTAZ SHAMSUDDIN B. HAJI ABDULLAH\r\n🎀🎀 Harga : RM5\r\nINFO BUKU :\r\n🎗Mengandungi kaedah ejaan baru yang paling lengkap.\r\n🎗Terbitan pustaka shakirah.', 'bestseller_agama.jpg'),
(3, 3, 'Nota Padat UPKK : Edisi Lengkap Terkini 2021', '14.50', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Nota Padat UPKK : Edisi Lengkap Terkini 2021\r\n📖 Tahun 3, 4 dan 5\r\n📖 terbitan FARGOES\r\n🎀🎀 Harga : RM14.50\r\nSINOPSIS 🎗🎗\r\nBuku ini merangkumi semua subjek UPKK iaitu Adab, Lughatul Quran, Ulum Syariyyah, Sirah dan Pelajaran Jawi dan disusun berdasarkan sukatan terbaru dibawah JAKIM. Disediakan juga panduan markah yang jelas untuk semakan ibu bapa dan murid-murid. Kunci soalan disediakan untuk memudahkan murid-murid mengingati isi-isi penting dengan apa yang tel', 'icon.jpg'),
(4, 5, 'IMTIYAZ UPKK LATIH TUBI : JAWI DAN KHAT', '6.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 IMTIYAZ UPKK LATIH TUBI : JAWI DAN KHAT\r\n📖 oleh IBNU HUSSIN AL HAJ\r\n📖 terbitan TELAGA BIRU\r\n🎀🎀 Harga : RM6.90\r\nINFO BUKU :\r\n🎗Nota ekspress\r\n🎗Latih tubi padat\r\n🎗Jawapan disediakan\r\n🎗Berdasarkan sukatan JAKIM terkini', 'kelab_penulis_muda.jpg'),
(5, 6, 'Success KSSM PT3 MATEMATIK TINGKATAN 1, 2 DAN 3', '37.70', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Success KSSM PT3 MATEMATIK TINGKATAN 1, 2 DAN 3\r\n📖 keluaran OXFORD FAJAR\r\n🎀🎀 Harga : RM37.70\r\nBOOK INFO :\r\nSuccess PT3 MATEMATIK is an effective that is based on the Dokumen Standard Kurikulum dan Pentaksiran (DSKP) Science Forms 1, 2 & 3. This book supplies comprehensive notes and a plethora of questions including higher order thinking skills questions.', 'keluarga.png'),
(6, 7, 'Filosofi Rerama', '28.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Filosofi Rerama\r\n📖 oleh Anie-Alja\r\n📖 terbitan Rimbunan Publishing House Sdn Bhd\r\n🎀🎀 Harga : RM28\r\nSINOPSIS :\r\nSebagai seorang remaja, saya selalu tertanya-tanya kenapa aku lebih matang daripada orang lain? Bunyinya macam berlagak, kan? Tapi itulah yang saya rasa. Saya kecewa apabila kawan-kawan lain tidak berfikiran sama seperti saya. Saya dan abang akhirnya ambil jalan mudah, apa lagi kalau bukan salahkan ibu kami, Ini semua salah umi.” Bukan mudah untuk me', 'Komik_M.jpg'),
(7, 8, 'Etika Profesionalisme – SIRI KOLEJ VOKASIONAL', '21.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Etika Profesionalisme – SIRI KOLEJ VOKASIONAL :\r\n📖 keluaran OXFORD FAJAR\r\n📖 oleh HASNAH HUSSIIN DAN RASHIDI ABBAS\r\n🎀🎀 Harga : RM21.90', 'motivasi_umum.jpg'),
(8, 10, 'Rahsia Misteri Besi Kersani', '29.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Rahsia Misteri Besi Kersani\r\n🎀🎀 Harga : RM29.90\r\nSINOPSIS :\r\nKekuatan besi kersani turut dicatatkan dalam bahan-bahan bertulis seperti Bustanus Salatin, Syair Hamzah Fansuri dan lagu nyanyian M. Nasir, Mentera Semerah Padi. Namun demikian, sukar diterangkan bentuk mahupun rupa sebenar besi kersani. Teori atau penjelasan tentang besi tersebut lazimnya bercanggah. Tidak kurang pula teori-teori yang sukar diterima akal. Dalam hal ini, bergantung kepada daerah d', 'novel_sejarah.png'),
(9, 11, '101 KARANGAN CONTOH BAHASA MELAYU SPM', '28.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 101 KARANGAN CONTOH BAHASA MELAYU SPM\r\n📖 KARANGAN BERKUALITI A+\r\n🎀🎀 Harga : RM28.90\r\nBOOK INFO :\r\n– Disertakan Rangka Karangan\r\n– 64 Karangan Contoh Bahagian B\r\n– Bahagian A berdasarkan konsep GCP\r\n– Rujukan terbaik persediaan untuk SPM.\r\n– Setiap latihan disediakan skema jawapan\r\n– Bahagian B berdasarkan konsep 1 2 3 4 5\r\n– Setiap konsep dibincangkan secara terperinci\r\n– Setiap karangan contoh disediakan rangka karangan\r\n– Setiap contoh karangan disisipkan ', 'Bahasa_Melayu_SPM.jpg'),
(11, 11, '24 Jam Belajar Sunah Nabi', '18.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 24 Jam Belajar Sunah Nabi\r\n📖 oleh Romy Hernadi & Assyifa S.Arum\r\n📖 terbitan Rimbunan Publishing House Sdn Bhd\r\n🎀🎀 Harga : RM18\r\nSINOPSIS :\r\nSunah yang diajarkan oleh Rasulullah SAW begitu lengkap. merangkumi aktiviti harian kita dan boleh diamalkan pada bila-bila masa dan di mana jua.Malah, dunia perubatan moden membuktikan amalan sunah sangat bermanfaat kepada kesihatan kita.Tahukah anda, pusat saraf yang paling peka dalam tubuh kita terdapat pada anggota w', 'belajar_sunah_Nabi.jpg'),
(12, 11, '400 Adab Komunikasi Di Media Sosial', '10.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 400 Adab Komunikasi Di Media Sosial\r\n📖 oleh Aina Umairah Ansari\r\n🎀🎀 Harga : RM10\r\nSINOPSIS🎗\r\nBuku ini menceritakan 400 adab komunikasi media sosial. Pada setiap bab, dihimpunkan 5 perkara yang patut diamalkan dan 5 perkara yang perlu dihindarkan di dalam perkembangan media sosial pada masa kini. Pada setiap bab juga didatangkan dalil yang sahih daripada Al-Quran dan hadith bagi menguatkan lagi adab yang dibawa.', 'adab_komunikasi.jpg'),
(13, 11, 'BUKU SIFIR MATEMATIK', '1.60', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 BUKU SIFIR MATEMATIK\r\n📖 ASAS DAN RUMUS MATEMATIK\r\n🎀🎀 Harga : RM1.60\r\nINFO BUKU :\r\n🎗Buku bersaiz mini sahaja.\r\n🎗Sesuai untuk sekolah rendah kebangsaan ( SRK ) dan sekolah jenis kebangsaan ( SRJK )', 'buku_sifir.jpg'),
(14, 11, 'Essay Writing Made Easy SPM (2020)', '15.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Essay Writing Made Easy SPM (2020)\r\n📖 BESTARI KARANGKRAF\r\n🎀🎀 Harga : RM15.90\r\nBOOK INFO :\r\n1. Margin notes.\r\n2. Practices for each type of composition.\r\n3. Word whizz and idiomatic expressions to increase vocabulary.', 'essay_SPM.jpg'),
(15, 11, 'Islam Kata Isteri Bukan Bibik', '20.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Islam Kata Isteri Bukan Bibik\r\n📖 oleh Ahmad Sarwat\r\n🎀🎀 Harga : RM20\r\nSINOPSIS🎗\r\nMenjadi stigma dalam kalangan masyarakat kita, posisi seorang isteri adalah menjadi seorang pembantu bagi sebuah rumah tangga. Secara tidak sedar, kita menganggap semua itu bersumberkan dari ajaran agama Islam. Seolah-olah kita mengatakan Islam mewajibkan setiap isteri untuk melakukan banyak pekerjaan rumah tangga, layaknya seorang bibik.\r\nIsteri harus menyapu, mengemop, mencuci,', 'islam_kata_isteri_bukan_bibik.png'),
(16, 11, 'KOLEKSI UPSR 2021 TAHUN 4, 5 DAN 6', '2.95', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 KOLEKSI UPSR 2021 TAHUN 4, 5 DAN 6\r\n📖 MATEMATIK KERTAS 2 – DWIBAHASA\r\n🎀🎀 Harga : RM2.95\r\nINFO BUKU :\r\n🎗Jawapan disediakan.\r\n🎗Mengikut format terkini.\r\n🎗Setiap set boleh dileraikan.\r\nREADY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 KOLEKSI UPSR 2021 TAHUN 4, 5 DAN 6\r\n📖 MATEMATIK KERTAS 2 – DWIBAHASA\r\n🎀🎀 Harga : RM2.95\r\nINFO BUKU :\r\n🎗Jawapan disediakan.\r\n🎗Mengikut format terkini.\r\n🎗Setiap set boleh dileraikan.', 'koleksi_UPSR.jpg'),
(17, 11, 'NOTA MENGGAPAI 8A UPKK', '17.90', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 NOTA MENGGAPAI 8A UPKK\r\n📖 UJIAN PENILAIAN KELAS KAFA\r\n🎀🎀 Harga : RM17.90\r\nINFO BUKU :\r\n🎗Peta minda\r\n🎗Nota padat dan lengkap\r\n🎗Contoh contoh soalan menjurus peperiksaan\r\n🎗merangkumi sukatan pelajaran tahun 3,4 dan 5\r\n🎗Aktiviti disusun mengikut topik dan bentuk soalan UPKK\r\n🎗Berdasarkan kurikulum kelas al quran dan fardhu ain KAFA', 'nota_UPKK.jpg'),
(18, 11, 'Pada Suatu Hari', '25.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Pada Suatu Hari\r\n📖 oleh Reyna Ibrahim\r\n📖 terbitan Rimbunan Publishing House Sdn Bhd\r\n🎀🎀 Harga : RM25\r\nSINOPSIS :\r\nPada suatu hari..\r\nPasti ada pertemuan, perpisahan dan peristiwa yang berlaku\r\ndi sepanjang jalan kehidupan.\r\nLalu kita mula mempersoalkan segalanya. Kenapa begitu?\r\nKenapa begini? Sebenarnya kita lupa..\r\nHidup ini bukan untuk kita\r\nmengharap memiliki semua.\r\nHidup ini untuk kita bersyukur menerima\r\napa adanya selepas gigih berusaha.\r\nKita cender', 'pada_suatu_hari.jpg'),
(19, 11, 'PRACTICAL ENGLISH USAGE', '11.50', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 PRACTICAL ENGLISH USAGE\r\n📖 ENGLISH AS A SECOND LANGUAGE : BOOK 2\r\n🎀🎀 Harga : RM11.50\r\nSUMMARY🎗\r\nThis book is a suggested recommendation on how the books may be used. Student will learn something about nouns, pronouns, verbs, present, past and future', 'practical_eng.jpg'),
(20, 11, 'Seni Mengubah Nasib', '15.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Seni Mengubah Nasib\r\n📖 oleh Charles Saputra\r\n🎀🎀 Harga : RM15\r\nSINOPSIS🎗\r\nSesiapa pun boleh berubah dalam hidupnya; daripada bodoh menjadi genius, daripada miskin menjadi kaya, atau daripada hina menjadi terhormat. Syaratnya adalah perlu menjalani proses yang sepatutnya dan berusaha keras untuk mencapai perubahan yang diinginkan. Semua perkara dapat diubah. Namun ada satu perkara yang tidak boleh berubah, iaitu perubahan itu sendiri.\r\nBuku Seni Mengubah Nasib', 'seni_mengubah_nasib.jpg'),
(21, 11, 'Ubah Patah Hati Jadi Prestasi', '40.00', 'READY STOCK ‼‼\r\nPOS SETIAP HARI 🔮🔮\r\n📖 Ubah Patah Hati Jadi Prestasi\r\n📖 oleh Addien Abdul Kadir & Dwi Suwiknyo\r\n🎀🎀 Harga : RM40\r\nSINOPSIS🎗\r\nUrusan hati adalah antara urusan yang paling susah untuk difahami. Kerana pada seketul hati ada sebuah kitaran kejam yang manusia sering terikat tanpa sudah. Hati yang kecewa cenderung membawa kepada prestasi yang negatif. Manakala prestasi yang negatif akan menambah kedukaan hati. Namun sebaliknya, jika kita berjaya mengubah sebuah kekecewaan menjadi hati po', 'ubah_patah_hati_jadi_prestasi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`,`transaction_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`buyer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
