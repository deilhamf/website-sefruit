-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2024 pada 05.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sefruit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `overview` text NOT NULL,
  `desc` text NOT NULL,
  `tahun` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `overview`, `desc`, `tahun`, `image`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(3, 'Sefruit', 'Freshness by Nature, Sefruit by Choice', '<p>Selamat datang di SeFruit.com, destinasi terbaik untuk menikmati kelezatan buah-buahan segar dengan kualitas terbaik. Sejak berdiri, kami berkomitmen untuk memberikan pengalaman berbelanja online yang memuaskan, menghadirkan berbagai pilihan buah-buahan premium langsung dari petani terpercaya.</p>', '<p>SeFruit.com lahir dari keinginan kami untuk menjembatani kesenjangan antara kebutuhan akan buah-buahan berkualitas tinggi dan keterbatasan akses. Sebagai pencinta buah, kami memahami pentingnya merasakan kelezatan buah segar setiap hari. Dengan semangat ini, kami memulai perjalanan kami untuk menciptakan platform yang memudahkan setiap orang mendapatkan buah-buahan terbaik, tanpa repot pergi ke toko tradisional.</p><p>Kualitas adalah nilai inti kami. Kami menjalin kemitraan erat dengan petani yang mempraktikkan pertanian berkelanjutan dan menjaga standar kualitas tinggi. Dari buah-buahan tropis eksotis hingga yang biasa, setiap produk di SeFruit.com dipilih dengan teliti untuk memastikan rasa, aroma, dan kelezatannya tidak tertandingi.</p>', '5', 'KqzPX8RgqseWbkGtwGD1.jpg', 'zNG0fML0FxBf2Ud1pYUu.jpg', 'pI7LYTof9lF3MLpq4RVt.png', '2024-01-20 18:27:55', '2024-01-25 06:36:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` text NOT NULL,
  `judul` text NOT NULL,
  `desk` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `image`, `image2`, `judul`, `desk`, `created_at`, `updated_at`) VALUES
(2, 'surendran-mp-QIW4IkjxP-w-unsplash.jpg', 'Qf4fJoHQn83XcyyxsPJL.png', '100% asli', 'Buah Asli dari Petani Buah Ahli!', '2024-01-24 07:20:58', '2024-02-01 02:17:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `view_count` text NOT NULL,
  `overview` text NOT NULL,
  `desc` text NOT NULL,
  `keyword` text NOT NULL,
  `tags` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `view_count`, `overview`, `desc`, `keyword`, `tags`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 'CE93OBKucUpMFZYiQUMP.jpg', 'Cara memilih buah-buahan yang sehat', 'cara-memilih-buah-buahan-yang-sehat', '34', 'Buah-buahan merupakan bagian penting dari pola makan sehat dan seimbang. Namun, untuk mendapatkan manfaat maksimal, penting untuk memilih buah-buahan yang segar dan berkualitas tinggi.', '<p><strong>Panduan Memilih Buah yang Sehat untuk Kesehatan Optimal</strong></p><p><strong>Pendahuluan:</strong> Buah-buahan merupakan bagian penting dari pola makan sehat dan seimbang. Namun, untuk mendapatkan manfaat maksimal, penting untuk memilih buah-buahan yang segar dan berkualitas tinggi. Dalam artikel ini, kita akan membahas beberapa tips tentang cara memilih buah yang sehat untuk mendukung kesehatan Anda.</p><p><strong>1. Pilih Buah yang Segar:</strong></p><ul><li><strong>Warna dan Kilauan:</strong> Pilih buah dengan warna yang cerah dan kilauan alami. Warna yang kaya menandakan kandungan nutrisi yang lebih tinggi.</li><li><strong>Tekstur:</strong> Sentuh buah untuk memastikan teksturnya kencang dan tahan. Buah yang terlalu lembek atau berkerut mungkin sudah tidak segar lagi.</li><li><strong>Aroma:</strong> Bau yang segar dan wangi menandakan bahwa buah masih dalam kondisi baik. Hindari buah yang memiliki bau yang tidak sedap.</li></ul><p><strong>2. Perhatikan Musim Buah:</strong></p><ul><li><strong>Buah Musiman:</strong> Lebih baik memilih buah-buahan yang sedang musim. Buah musiman cenderung lebih segar, lebih murah, dan memiliki kandungan nutrisi yang lebih tinggi.</li><li><strong>Lihat Asal Usul Buah:</strong> Pilih buah yang tumbuh di daerah setempat jika memungkinkan. Buah lokal seringkali lebih segar karena belum melalui proses pengiriman yang panjang.</li></ul><p><strong>3. Pilih Buah Organik:</strong></p><ul><li><strong>Tanpa Pestisida:</strong> Buah organik cenderung memiliki lebih sedikit residu pestisida. Ini dapat membantu mengurangi risiko paparan bahan kimia yang tidak diinginkan.</li><li><strong>Lebih Nutritif:</strong> Beberapa studi menunjukkan bahwa buah organik dapat memiliki kandungan nutrisi yang lebih tinggi.</li></ul><p><strong>4. Perhatikan Tanda Kematangan:</strong></p><ul><li><strong>Tanda Kematangan:</strong> Kenali tanda-tanda kematangan buah yang ingin Anda beli. Misalnya, apakah buah tersebut matang saat ditekan atau memiliki warna kulit yang sesuai.</li></ul><p><strong>5. Hindari Buah yang Rusak atau Cacat:</strong></p><ul><li><strong>Lihat Permukaan Kulit:</strong> Hindari memilih buah yang memiliki goresan, lecet, atau tanda-tanda kerusakan lainnya pada kulitnya.</li><li><strong>Periksa Bagian Bawah:</strong> Beberapa buah mungkin terlihat baik dari atas, tetapi memiliki kerusakan di bagian bawahnya.</li></ul><p><strong>6. Perhatikan Ukuran dan Berat:</strong></p><ul><li><strong>Berat yang Sesuai:</strong> Pilih buah yang terasa berat untuk ukurannya. Ini menandakan bahwa buah tersebut mungkin lebih berair dan penuh dengan nutrisi.</li></ul><p><strong>Kesimpulan:</strong> Memilih buah yang sehat bukan hanya tentang rasa, tetapi juga tentang kandungan nutrisi dan keamanan. Dengan memperhatikan kriteria-kriteria di atas, Anda dapat memastikan bahwa buah yang Anda pilih mendukung kesehatan Anda dan memberikan manfaat optimal bagi tubuh Anda. Ingatlah untuk selalu mencoba memasukkan berbagai jenis buah dalam pola makan harian Anda untuk mendapatkan beragam nutrisi yang diperlukan tubuh.</p>', 'buah, sayur, sehat, tips', 'buah, sayur, sehat, tips', '2024-01-29 18:19:13', '2024-02-02 01:16:13'),
(2, 3, 7, 'tfcHSWeURvMANJFUfwUc.jpg', 'Pola Hidup Sehat: Kunci Kesejahteraan dan Kualitas Hidup', 'pola-hidup-sehat-kunci-kesejahteraan-dan-kualitas-hidup', '24', 'Dalam blog ini, kita akan menjelajahi pentingnya pola hidup sehat, langkah-langkah praktis untuk mencapainya, serta dampak positif yang dapat dirasakan secara menyeluruh.', '<p><strong>Pola Hidup Sehat: Kunci Kesejahteraan dan Kualitas Hidup yang Optimal</strong></p><p><strong>Pendahuluan:</strong> Pola hidup sehat bukan sekadar tren sementara, tetapi merupakan investasi jangka panjang untuk kesejahteraan dan kualitas hidup yang optimal. Dalam blog ini, kita akan menjelajahi pentingnya pola hidup sehat, langkah-langkah praktis untuk mencapainya, serta dampak positif yang dapat dirasakan secara menyeluruh.</p><p><strong>1. Gizi Seimbang: Asupan Nutrisi yang Mendukung Kesehatan Tubuh</strong></p><p>Pentingnya makan dengan gizi seimbang tidak dapat diabaikan dalam menciptakan pola hidup sehat. Memasukkan berbagai jenis makanan yang kaya akan vitamin, mineral, protein, dan serat akan memberikan dukungan optimal untuk fungsi tubuh. Menghindari kelebihan gula, garam, dan lemak jenuh juga menjadi kunci penting dalam mencapai keseimbangan nutrisi.</p><p><strong>2. Aktivitas Fisik: Gerakan yang Membangkitkan Energi dan Kesehatan</strong></p><p>Tubuh manusia diciptakan untuk bergerak, dan aktivitas fisik adalah elemen penting dari pola hidup sehat. Olahraga rutin tidak hanya membantu menjaga berat badan yang sehat, tetapi juga meningkatkan sirkulasi darah, memperkuat otot dan tulang, serta meningkatkan mood dan kualitas tidur.</p><p><strong>3. Manajemen Stres: Keseimbangan Emosional untuk Kesehatan Mental</strong></p><p>Stres dapat memiliki dampak negatif pada kesehatan fisik dan mental. Menerapkan teknik manajemen stres seperti meditasi, yoga, atau kegiatan relaksasi lainnya dapat membantu menciptakan keseimbangan emosional. Memberikan waktu untuk diri sendiri dan menghindari terlalu banyak tekanan adalah langkah penting dalam menjaga kesehatan mental.</p><p><strong>4. Tidur yang Cukup: Pemulihan Tubuh dan Pikiran</strong></p><p>Tidur yang cukup adalah elemen kunci dalam pola hidup sehat. Selama tidur, tubuh melakukan proses pemulihan, baik secara fisik maupun mental. Kekurangan tidur dapat menyebabkan penurunan konsentrasi, peningkatan risiko penyakit, dan pengaruh negatif pada kesehatan mental.</p><p><strong>5. Hindari Kebiasaan Berbahaya: Rokok, Alkohol, dan Narkoba</strong></p><p>Menghindari kebiasaan berbahaya seperti merokok, konsumsi alkohol yang berlebihan, dan penggunaan narkoba adalah langkah penting dalam menciptakan pola hidup sehat. Kebiasaan ini dapat menyebabkan berbagai masalah kesehatan serius dan mempengaruhi kualitas hidup secara keseluruhan.</p><p><strong>Penutup: Membangun Pola Hidup Sehat untuk Masa Depan yang Lebih Baik</strong></p><p>Pola hidup sehat bukanlah tantangan yang sulit, tetapi merupakan perjalanan menuju kesejahteraan dan kualitas hidup yang optimal. Dengan menggabungkan gizi seimbang, aktivitas fisik, manajemen stres, tidur yang cukup, dan menghindari kebiasaan berbahaya, kita dapat menciptakan fondasi yang kuat untuk masa depan yang lebih baik. Mari bersama-sama menjalani pola hidup sehat dan meraih kesejahteraan yang selalu kita idamkan.</p>', 'pola makan, olahraga, sehat, kuat, bergizi', 'pola makan, olahraga, sehat, kuat, bergizi', '2024-01-31 21:10:09', '2024-02-02 00:46:14'),
(3, 3, 6, 'xhpUXZV4mFCuS5mUsD77.jpg', 'Musim yang tepat untuk memanem Durian', 'musim-yang-tepat-untuk-memanem-durian', '4', 'Dalam blog ini, kita akan menjelajahi kelezatan musim durian, keunikan buah ini, serta bagaimana orang-orang di berbagai daerah merayakan musim durian.', '<p><strong>Menikmati Kelezatan Musim Durian: Surga Buah Tropis di Musim Panas</strong></p><p><strong>Pendahuluan:</strong> Musim durian selalu menjadi waktu yang dinanti-nantikan oleh para pecinta buah tropis di berbagai belahan dunia. Buah berduri ini bukan hanya sekadar makanan lezat, tetapi juga menjadi budaya dan tradisi di beberapa negara Asia Tenggara. Dalam blog ini, kita akan menjelajahi kelezatan musim durian, keunikan buah ini, serta bagaimana orang-orang di berbagai daerah merayakan musim durian.</p><p><strong>1. Durian: Buah Berduri Penuh Kenikmatan</strong></p><p>Durian dikenal sebagai \"raja buah\" di Asia, bukan hanya karena ukurannya yang besar tetapi juga karena aroma kuat dan rasa khasnya. Kulit durian berduri tajam, tetapi di dalamnya tersembunyi daging buah yang lembut dan kaya akan nutrisi. Meskipun beberapa orang mungkin terintimidasi oleh baunya yang kuat, bagi para pencinta durian, aroma itu adalah salah satu daya tarik utama buah ini.</p><p><strong>2. Musim Durian: Waktu Tunggu yang Panjang</strong></p><p>Musim durian biasanya terjadi pada musim panas di berbagai negara tropis seperti Malaysia, Indonesia, Thailand, dan Filipina. Pada saat ini, pasar-pasar buah dan pedagang kaki lima menjadi penuh dengan durian segar. Para petani dan pedagang bersiap-siap untuk menawarkan berbagai jenis durian, yang masing-masing memiliki karakteristik unik, mulai dari rasa manis hingga rasa pahit yang kuat.</p><p><strong>3. Jenis Durian yang Menarik: Montong, Musang King, dan lainnya</strong></p><p>Dalam musim durian, kita dapat menemukan berbagai jenis durian dengan karakteristik rasa yang berbeda. Durian Montong dikenal dengan rasa manis dan tekstur lembutnya, sementara Musang King memiliki rasa yang kuat dan daging yang tebal. Pemilihan durian menjadi kegiatan yang menarik, di mana para pembeli mencoba mencari durian yang paling matang dan memiliki rasa terbaik.</p><p><strong>4. Budaya Durian: Festival dan Tradisi</strong></p><p>Musim durian juga menjadi waktu untuk merayakan buah ini melalui festival dan tradisi khas. Di beberapa daerah, festival durian diadakan dengan berbagai kegiatan, seperti lomba makan durian, kontes pemilihan durian terbaik, dan pertunjukan seni lokal. Tradisi seperti ini tidak hanya memperkaya pengalaman makan durian, tetapi juga menjadi wadah untuk mempererat hubungan antar komunitas.</p><p><strong>5. Resep dan Kreativitas Dalam Menyajikan Durian</strong></p><p>Selain dimakan langsung, durian juga diolah menjadi berbagai hidangan lezat. Dari es durian hingga pancake durian, kreativitas kuliner semakin berkembang dalam menyajikan buah ini. Dalam blog ini, kita juga akan membahas beberapa resep unik yang dapat dicoba untuk menghadirkan kelezatan durian dalam berbagai varian.</p><p><strong>Penutup: Menyambut Kelezatan Musim Durian</strong></p><p>Musim durian bukan hanya tentang menikmati buah lezat ini tetapi juga menghargai keunikan budaya dan tradisi di sekitarnya. Dengan aroma khasnya dan rasa yang memukau, durian menjadi buah yang layak dinanti-nantikan setiap tahunnya. Apakah Anda seorang pencinta durian atau belum pernah mencoba, musim durian adalah waktu yang tepat untuk memahami kenikmatan buah tropis yang satu ini. Selamat menikmati musim durian!</p>', 'buah, raja buah, durian, musim', 'buah, raja buah, durian, musim', '2024-02-01 02:30:50', '2024-02-01 20:00:39'),
(4, 3, 8, 'Ud4239KHWJP6ffBByCTU.jpg', 'Tips memilih Makanan yang sehat', 'tips-memilih-makanan-yang-sehat', '6', 'Dalam blog ini, kita akan membahas beberapa tips makan sehat yang dapat membantu Anda membentuk gaya hidup sehat untuk kesejahteraan jangka panjang.', '<p><strong>Membangun Gaya Hidup Sehat: Tips Makan Sehat untuk Kesejahteraan Anda</strong></p><p><strong>Pendahuluan</strong></p><p>Dalam dunia yang serba cepat dan padat, menjaga kesehatan menjadi semakin penting. Salah satu cara utama untuk mencapai kesehatan optimal adalah dengan menjaga pola makan. Dalam blog ini, kita akan membahas beberapa tips makan sehat yang dapat membantu Anda membentuk gaya hidup sehat untuk kesejahteraan jangka panjang.</p><p><strong>1. Pilihlah Makanan Bernutrisi</strong></p><p>Makanan yang Anda konsumsi seharusnya bukan hanya mengisi perut, tetapi juga memberikan nutrisi yang dibutuhkan oleh tubuh. Pilihlah makanan yang kaya akan vitamin, mineral, protein, dan serat. Sayuran, buah-buahan, sumber protein tanpa lemak, dan biji-bijian utuh adalah contoh makanan bernutrisi yang perlu diintegrasikan dalam pola makan sehari-hari.</p><p><strong>2. Hindari Makanan Olahan dan Tinggi Gula</strong></p><p>Makanan olahan seringkali mengandung tambahan gula, garam, dan lemak trans yang dapat membahayakan kesehatan. Cobalah untuk menghindari makanan yang dikemas secara instan dan lebih memilih makanan segar serta alami. Reduksi konsumsi gula dapat membantu mengendalikan berat badan dan mencegah penyakit kronis seperti diabetes.</p><p><strong>3. Ukuran Porsi yang Sesuai</strong></p><p>Kontrol porsi makanan adalah kunci penting dalam menjaga kesehatan. Terlalu banyak makan bahkan makanan sehat pun dapat menyebabkan kelebihan kalori. Belajar mengenali ukuran porsi yang sesuai untuk kebutuhan tubuh Anda adalah langkah penting dalam mencapai dan mempertahankan berat badan yang sehat.</p><p><strong>4. Perbanyak Konsumsi Air Putih</strong></p><p>Air merupakan bagian penting dari kehidupan dan memiliki peran besar dalam menjaga kesehatan tubuh. Minumlah setidaknya 8 gelas air putih sehari untuk menjaga tubuh tetap terhidrasi. Air membantu mengeluarkan racun dari tubuh, menjaga kulit tetap segar, dan mendukung fungsi organ-organ tubuh.</p><p><strong>5. Bersyukur dan Nikmati Makanan dengan Kesadaran Penuh</strong></p><p>Berkatilah atas makanan yang Anda miliki dan nikmatilah setiap suapannya dengan penuh kesadaran. Hindari makan sambil terburu-buru atau di depan layar gadget. Dengan makan dengan penuh kesadaran, Anda dapat lebih mudah mengontrol asupan makanan dan menghargai rasa setiap hidangan.</p><p><strong>6. Rutin Berolahraga</strong></p><p>Makan sehat seharusnya diimbangi dengan aktivitas fisik yang cukup. Lakukan olahraga secara teratur, sesuai dengan kemampuan fisik Anda. Olahraga bukan hanya membantu menjaga berat badan, tetapi juga meningkatkan kesehatan jantung, kekuatan tulang, dan kesehatan mental.</p><p><strong>Penutup</strong></p><p>Dengan mengikuti tips-tips makan sehat di atas, Anda dapat membangun dasar yang kuat untuk gaya hidup sehat dan kesejahteraan jangka panjang. Ingatlah bahwa kesehatan bukan hanya tentang penampilan fisik, tetapi juga tentang bagaimana kita merawat tubuh kita dari dalam. Mulailah perubahan kecil hari ini untuk mendapatkan manfaat besar untuk kesehatan Anda di masa depan. Semoga tips-tips ini membantu Anda mencapai tujuan kesehatan yang diinginkan!</p>', 'makanan, sehat, tips, diet, kuat', 'makanan, sehat, tips, diet, kuat', '2024-02-01 20:41:07', '2024-02-02 01:08:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 8, 5, '2024-02-29 00:30:06', '2024-02-29 01:31:43'),
(2, 9, 1, '2024-02-29 01:28:40', '2024-02-29 01:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `breadcrumb` varchar(255) NOT NULL,
  `copyright1` text NOT NULL,
  `copyright2` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `configs`
--

INSERT INTO `configs` (`id`, `title`, `logo`, `subtitle`, `favicon`, `breadcrumb`, `copyright1`, `copyright2`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 'SeFruit - Toko Buah Online', 'abA4dklkLPF3VlO6E5Wz.png', 'Freshness by Nature, Sefruit by Choice', 'aZvZc2QrePxlg26JtNQL.png', '5vATld64rNjaiTdSrKrC.png', 'Sefruit.com', 'Deilham Fachrezi', '<p>buah segar, buah sehat, buah berkualitas, toko buah online, belanja buah, buah-buahan segar online</p>', '<p>Selamat datang di SeFruit, destinasi utama untuk menemukan berbagai buah segar dan berkualitas tinggi secara online. Jelajahi pilihan buah-buahan terbaik kami, ditanam dengan cinta dan perhatian untuk memberikan pengalaman buah yang tak terlupakan. SeFruit adalah sumber terpercaya bagi Anda yang menghargai kesehatan dan kelezatan buah-buahan.</p>', '2024-01-16 00:30:57', '2024-02-01 00:32:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `telp` text NOT NULL,
  `email` text NOT NULL,
  `map` text NOT NULL,
  `jam_kerja` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `alamat`, `telp`, `email`, `map`, `jam_kerja`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Bukit Asam Ujung 1, No. 15, Laladon, Ciomas, Bogor', '6288299049193', 'deiluminiare@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2734.120592451391!2d106.75411473146042!3d-6.588670751656714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4e212de05cb%3A0x981820a425f6a53e!2sJl.%20Bukit%20Asam%20Ujung%201%20No.15%2C%20Laladon%2C%20Kec.%20Ciomas%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat%2016610!5e0!3m2!1sen!2sid!4v1705891790245!5m2!1sen!2sid', '<p>08.00 AM s/d 05.00 PM. Senin - Jum\'at (Sabtu Minggu Libur)</p>', '2024-01-15 23:42:19', '2024-01-24 06:53:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `desk` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'ok?', 'ya ok', '2024-01-23 07:54:49', '2024-01-23 07:54:49'),
(3, '1 + 1 = ?', '6', '2024-01-25 07:09:15', '2024-01-25 07:09:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `footers`
--

INSERT INTO `footers` (`id`, `image`, `title`, `subtitle`, `desc`, `fb`, `ig`, `created_at`, `updated_at`) VALUES
(1, 'AfFRXKzwtipXtrNoWoGu.png', 'Sefruit', 'Freshness by Nature, Sefruit by Choice', '<p>Selamat datang di SeFruit.com, destinasi terbaik untuk menikmati kelezatan buah-buahan segar dengan kualitas terbaik. Sejak berdiri, kami berkomitmen untuk memberikan pengalaman berbelanja online yang memuaskan, menghadirkan berbagai pilihan buah-buahan premium langsung dari petani terpercaya.</p>', 'https://www.facebook.com/deiiilll', 'https://www.instagram.com/deiiilll/', '2024-01-21 20:31:10', '2024-01-27 07:38:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heading_benefits`
--

CREATE TABLE `heading_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `desc` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heading_benefits`
--

INSERT INTO `heading_benefits` (`id`, `title`, `subtitle`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kenapa harus memilih toko kami?', 'Kenapa Harus Sefruit?', '<p>Manfaat yang kamu dapat ketika memesan buah dan sayur di Sefruit.com</p>', 'HgqAbIuzE4aukOaI7iX7.png', '2024-01-21 23:31:14', '2024-01-29 04:50:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heading_testimonials`
--

CREATE TABLE `heading_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `desc` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heading_testimonials`
--

INSERT INTO `heading_testimonials` (`id`, `title`, `subtitle`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Komentar Pelanggan', 'Testimoni', '<p>Kami sangat mengapresiasi semua komentar dari para pelanggan!</p>', 'lYZEenyYc7GVd6BiBPyj.png', '2024-01-21 21:36:28', '2024-01-29 04:48:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_blogs`
--

CREATE TABLE `kategori_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_blogs`
--

INSERT INTO `kategori_blogs` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Buah & Sayur', 'buah-sayur', '2024-01-23 00:00:57', '2024-01-23 00:07:01'),
(7, 'Tips Hidup Sehat', 'tips-hidup-sehat', '2024-01-23 00:01:05', '2024-01-23 00:01:05'),
(8, 'Pola Makan Sehat', 'pola-makan-sehat', '2024-01-23 00:01:23', '2024-01-23 00:01:23'),
(9, 'Olahraga Sehat', 'olahraga-sehat', '2024-01-23 00:01:33', '2024-01-23 00:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_products`
--

CREATE TABLE `kategori_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `icon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_products`
--

INSERT INTO `kategori_products` (`id`, `title`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Buah', 'buah', 'y7cNYgw1qK47LBUN9X5S.png', '2024-01-20 04:11:41', '2024-02-01 00:46:48'),
(2, 'Sayur Mayur', 'sayur-mayur', 'nN6GOpmWVsH8iiwGbJiZ.png', '2024-01-22 06:38:55', '2024-02-01 00:20:28'),
(3, 'Bumbu', 'bumbu', 'lu8u63tgsYUzp3NT0A2n.png', '2024-01-24 07:24:06', '2024-02-01 00:14:05'),
(4, 'Produk Hewani', 'produk-hewani', 'rj8EHcUR9Y5LOVzMZV80.png', '2024-02-01 00:14:59', '2024-02-01 00:14:59'),
(5, 'Daging & Ikan', 'daging-ikan', 'bgv6xHaWBhtT63csubZm.png', '2024-02-01 00:22:46', '2024-02-01 00:22:46'),
(6, 'Teh & Kopi', 'teh-kopi', 'DQ2MAPhAV12zTnQt9yWU.png', '2024-02-01 00:23:55', '2024-02-01 00:23:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_services`
--

CREATE TABLE `kategori_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_services`
--

INSERT INTO `kategori_services` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pengiriman', 'pengiriman', '2024-01-18 23:53:09', '2024-01-23 00:21:43'),
(2, 'Tips', 'tips', '2024-01-23 00:22:14', '2024-01-23 00:22:14'),
(3, 'Gratis Ongkir', 'gratis-ongkir', '2024-01-23 00:23:51', '2024-01-23 00:23:51'),
(4, 'Membership', 'membership', '2024-01-23 00:28:16', '2024-01-23 00:28:16'),
(5, 'Komunitas', 'komunitas', '2024-01-23 00:52:38', '2024-01-23 00:52:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keunggulans`
--

CREATE TABLE `keunggulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `desk` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keunggulans`
--

INSERT INTO `keunggulans` (`id`, `judul`, `image`, `desk`, `created_at`, `updated_at`) VALUES
(1, 'Produk Berkualitas', 'premium.png', '<p>100% berkualitas</p>', '2024-01-15 23:40:19', '2024-01-29 03:26:10'),
(3, '100% Refund', 'cashback.png', '<p>Produk rusak = Uang kembali</p>', '2024-01-20 18:11:31', '2024-01-29 03:25:40'),
(4, 'Tanpa bahan kimia', 'non-toxic.png', '<p>alami tanpa pestisida kimia.</p>', '2024-01-20 18:12:04', '2024-01-29 03:24:57'),
(5, 'Pelayanan Responsif', 'customer-service.png', '<p>Pelayanan 24/7 dari CS kami.</p>', '2024-01-21 06:36:16', '2024-01-29 03:22:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_24_081125_create_visitors_table', 1),
(6, '2023_11_27_020937_create_products_table', 1),
(7, '2023_11_27_040447_create_sliders_table', 1),
(8, '2023_11_27_060607_create_abouts_table', 1),
(9, '2023_11_27_070029_create_partners_table', 1),
(10, '2023_11_27_072652_create_service_table', 1),
(11, '2023_11_28_025241_create_contacts_table', 1),
(12, '2023_11_28_042923_create_banners_table', 1),
(13, '2023_11_29_033327_create_keunggulans_table', 1),
(14, '2023_11_29_063904_create_discounts_table', 1),
(15, '2023_12_27_021947_create_testimonials_table', 1),
(16, '2024_01_02_031649_create_configs_table', 1),
(18, '2024_01_17_020410_create_kategori_blogs_table', 2),
(19, '2024_01_17_020430_create_blogs_table', 2),
(21, '2024_01_18_103814_create_kategori_services_table', 3),
(22, '2024_01_18_103832_create_services_table', 3),
(23, '2024_01_19_081528_create_footers_table', 4),
(24, '2024_01_20_103953_create_kategori_products_table', 5),
(25, '2024_01_20_104225_create_products_table', 5),
(26, '2024_01_22_020018_create_works_table', 6),
(27, '2024_01_22_041528_create_heading_testimonials_table', 7),
(28, '2024_01_22_061516_create_heading_benefits_table', 8),
(29, '2024_01_23_094701_create_faqs_table', 9),
(30, '2024_01_24_023951_create_terms_table', 10),
(31, '2024_01_24_061525_create_privacies_table', 11),
(32, '2024_02_13_022915_create_carts_table', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Indomaret', 'pngegg (1).png', '2024-01-21 05:05:35', '2024-01-21 05:05:35'),
(2, 'Grab', 'pngegg (4).png', '2024-01-21 23:13:27', '2024-01-21 23:13:27'),
(3, 'Tokopedia', 'pngegg (2).png', '2024-02-01 00:34:43', '2024-02-01 00:34:43'),
(4, 'Indo Fresh', 'image.png', '2024-02-01 00:36:23', '2024-02-01 00:36:23'),
(5, 'Unilever', 'pngwing.com (13).png', '2024-02-01 00:36:40', '2024-02-01 00:36:40'),
(6, 'Indofood', 'Indofood_logo-id.png', '2024-02-01 00:37:15', '2024-02-01 00:37:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `privacies`
--

INSERT INTO `privacies` (`id`, `title`, `subtitle`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Privacy & Policy', 'Freshness by Nature, Sefruit by Choice', '<p><strong>Kebijakan Privasi SeFruit.com</strong></p><p>Selamat datang di SeFruit.com, situs web kami yang menyediakan berbagai jenis buah-buahan segar dan berkualitas. Kami sangat menghargai kepercayaan Anda kepada kami, dan kami berkomitmen untuk melindungi privasi informasi pribadi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, mengungkapkan, dan melindungi informasi pribadi Anda saat Anda mengakses dan menggunakan situs web kami.</p><p><strong>Informasi yang Kami Kumpulkan:</strong></p><p><strong>Informasi Pribadi:</strong></p><ul><li>Kami dapat mengumpulkan informasi pribadi seperti nama, alamat, nomor telepon, dan alamat email saat Anda melakukan pemesanan atau mendaftar di situs kami.</li></ul><p><strong>Informasi Non-Pribadi:</strong></p><ul><li>Kami juga dapat mengumpulkan informasi non-pribadi, seperti data demografis atau informasi tentang preferensi pengguna, untuk meningkatkan layanan kami.</li></ul><p><strong>Informasi Otomatis:</strong></p><ul><li>Kami menggunakan teknologi seperti cookies untuk mengumpulkan informasi otomatis yang membantu meningkatkan pengalaman pengguna dan layanan kami.</li></ul><p><strong>Penggunaan Informasi:</strong></p><p><strong>Penggunaan Layanan:</strong></p><ul><li>Informasi yang kami kumpulkan digunakan untuk memproses pemesanan, menyediakan layanan pelanggan, dan memastikan pengalaman pengguna yang optimal.</li></ul><p><strong>Pemasaran dan Promosi:</strong></p><ul><li>Dengan izin Anda, kami dapat menggunakan informasi untuk memberi tahu Anda tentang promosi, penawaran khusus, dan pembaruan produk kami.</li></ul><p><strong>Analisis dan Perbaikan:</strong></p><ul><li>Kami menggunakan informasi untuk menganalisis tren, mengukur efektivitas kampanye, dan meningkatkan layanan kami.</li></ul><p><strong>Berbagi Informasi:</strong></p><ol><li><strong>Pihak Ketiga:</strong><ul><li>Kami tidak akan menjual, menyewakan, atau menukar informasi pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali diperlukan untuk penyediaan layanan atau jika diwajibkan oleh hukum.</li></ul></li></ol><p><strong>Keamanan Informasi:</strong></p><p>Kami mengambil langkah-langkah keamanan yang sesuai untuk melindungi informasi pribadi Anda dari akses yang tidak sah, pengungkapan, perubahan, dan penghancuran yang tidak sah.</p><p><strong>Perubahan pada Kebijakan Privasi:</strong></p><p>Kami berhak untuk mengubah Kebijakan Privasi ini setiap saat. Perubahan tersebut akan diberlakukan segera setelah diperbarui di situs web. Kami mendorong Anda untuk secara berkala meninjau kebijakan ini untuk tetap up-to-date dengan praktik kami.</p><p><strong>Kontak:</strong></p><p>Jika Anda memiliki pertanyaan atau kekhawatiran tentang Kebijakan Privasi kami, silakan hubungi kami melalui email yg tersedia di bawah.</p><p>Dengan menggunakan situs web SeFruit.com, Anda menyetujui dan mengetahui Kebijakan Privasi ini. Terima kasih atas kepercayaan dan dukungan Anda terhadap layanan kami.</p>', '2024-01-23 23:23:59', '2024-01-23 23:23:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `view_count` text NOT NULL,
  `overview` text NOT NULL,
  `desc` text NOT NULL,
  `price` varchar(200) NOT NULL,
  `keyword` text NOT NULL,
  `tags` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `title`, `slug`, `view_count`, `overview`, `desc`, `price`, `keyword`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2cUA7qrfMMhCyPhO8aqg.png', 'Stroberi', 'stroberi', '6', 'Stroberi atau tepatnya stroberi kebun (juga dikenal dengan nama arbei, dari bahasa Belanda aardbei) adalah sebuah varietas stroberi yang paling banyak dikenal di dunia. Seperti spesies lain dalam genus Fragaria (stroberi), buah ini berada dalam keluarga Rosaceae.', '<p>Secara umum buah ini bukanlah <a href=\"https://id.wikipedia.org/wiki/Buah\">buah</a>, melainkan <a href=\"https://id.wikipedia.org/wiki/Buah_aksesori\">buah semu</a>,<a href=\"https://id.wikipedia.org/wiki/Stroberi_kebun#cite_note-1\">[1]</a> artinya daging buahnya tidak berasal dari ovari tanaman (<i>achenium</i>) tetapi dari bagian bawah <a href=\"https://id.wikipedia.org/w/index.php?title=Hypanthium&amp;action=edit&amp;redlink=1\">hypanthium</a> yang berbentuk mangkuk<a href=\"https://id.wikipedia.org/wiki/Stroberi_kebun#cite_note-2\">[2]</a> tempat ovari tanaman itu berada.<a href=\"https://id.wikipedia.org/wiki/Stroberi_kebun#cite_note-3\">[3]</a><a href=\"https://id.wikipedia.org/wiki/Stroberi_kebun#cite_note-4\">[4]</a></p><p>Buah stroberi berwarna hijau keputihan ketika sedang berkembang, dan pada kebanyakan spesies berubah menjadi <a href=\"https://id.wikipedia.org/wiki/Merah\">merah</a> ketika masak. Namanya berasal dari <a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris_kuno\">bahasa Inggris kuno</a> <i>streawberige</i> yang merupakan gabungan dari <i>streaw</i> atau \"straw\" dan <i>berige</i> atau \"berry\". Alasan pemberian nama ini masih tidak jelas. Beberapa spesies <a href=\"https://id.wikipedia.org/wiki/Lepidoptera\">Lepidoptera</a> mengambil sumber makanannya dari tumbuhan stroberi, menjadikan spesies ini hama utama tanaman stroberi.</p>', '65000', 'Segar, Buah, stroberi', 'Segar, Buah, stroberi', 1, '2024-01-20 04:36:29', '2024-02-01 20:06:24'),
(2, 2, 'zR0EQc6LDLhGOG4uFyGP.png', 'Asparagus', 'asparagus', '3', 'Asparagus atau akar parsi (Asparagus officinalis) dalam pengertian umum adalah suatu jenis sayuran dari satu spesies tumbuhan genus Asparagus. Asparagus merupakan jenis tanaman perenial dioecious[1]', '<p>Asparagus telah digunakan sejak lama sebagai <a href=\"https://id.wikipedia.org/wiki/Bahan_makanan\">bahan makanan</a> karena rasanya yang sedap dan sifat <a href=\"https://id.wikipedia.org/wiki/Diuretik\">diuretiknya</a>. Dengan adanya sifat diuretik tersebut, asparagus berkhasiat untuk memperlancar saluran urin sehingga mampu memperbaiki kinerja ginjal. Asparagus merupakan sumber terbaik <a href=\"https://id.wikipedia.org/wiki/Asam_folat\">asam folat</a> nabati, sangat rendah <a href=\"https://id.wikipedia.org/wiki/Kalori\">kalori</a>, tidak mengandung <a href=\"https://id.wikipedia.org/wiki/Lemak\">lemak</a> atau <a href=\"https://id.wikipedia.org/wiki/Kolesterol\">kolesterol</a>, serta mengandung sangat sedikit <a href=\"https://id.wikipedia.org/wiki/Natrium\">natrium</a>. Tumbuhan ini juga merupakan sumber <a href=\"https://id.wikipedia.org/w/index.php?title=Rutin&amp;action=edit&amp;redlink=1\">rutin</a>, suatu senyawa yang dapat memperkuat dinding <a href=\"https://id.wikipedia.org/w/index.php?title=Kapiler&amp;action=edit&amp;redlink=1\">kapiler</a>.</p>', '21000', 'Sayur, Hijau', 'Sayur, Hijau', 1, '2024-01-22 06:56:25', '2024-01-31 21:47:39'),
(3, 1, 'CrAwcRToZBNazcZdMDRw.png', 'Buah Naga', 'buah-naga', '4', 'Buah naga (Inggris: Pitaya) adalah buah dari beberapa jenis kaktus dari genus Hylocereus dan Selenicereus.', '<p>Buah ini berasal dari <a href=\"https://id.wikipedia.org/wiki/Meksiko\">Meksiko</a>, <a href=\"https://id.wikipedia.org/wiki/Amerika_Tengah\">Amerika Tengah</a> dan <a href=\"https://id.wikipedia.org/wiki/Amerika_Selatan\">Amerika Selatan</a> namun sekarang juga dibudidayakan di negara-negara <a href=\"https://id.wikipedia.org/wiki/Asia\">Asia</a> seperti <a href=\"https://id.wikipedia.org/wiki/Taiwan\">Taiwan</a>, <a href=\"https://id.wikipedia.org/wiki/Vietnam\">Vietnam</a>, <a href=\"https://id.wikipedia.org/wiki/Filipina\">Filipina</a>, <a href=\"https://id.wikipedia.org/wiki/Indonesia\">Indonesia</a> dan <a href=\"https://id.wikipedia.org/wiki/Malaysia\">Malaysia</a>. Buah ini juga dapat ditemui di <a href=\"https://id.wikipedia.org/wiki/Okinawa\">Okinawa</a>, <a href=\"https://id.wikipedia.org/wiki/Israel\">Israel</a>, <a href=\"https://id.wikipedia.org/wiki/Australia\">Australia</a> utara dan <a href=\"https://id.wikipedia.org/wiki/Tiongkok\">Tiongkok</a> selatan. <i>Hylocereus</i> hanya mekar pada malam hari.</p><p>Pada tahun <a href=\"https://id.wikipedia.org/wiki/1870\">1870</a> tanaman ini dibawa orang <a href=\"https://id.wikipedia.org/wiki/Prancis\">Prancis</a> dari <a href=\"https://id.wikipedia.org/wiki/Guyana\">Guyana</a> ke Vietnam sebagai tanaman hias. Oleh orang Vietnam dan orang Cina buahnya dianggap membawa berkah. Oleh sebab itu, buah ini selalu diletakkan di antara dua ekor <a href=\"https://id.wikipedia.org/wiki/Patung\">patung</a> <a href=\"https://id.wikipedia.org/wiki/Naga\">naga</a> berwarna <a href=\"https://id.wikipedia.org/wiki/Hijau\">hijau</a> di atas meja altar. Warna merah buah terlihat mencolok di antara warna naga-naga yang hijau. Kebiasaan inilah yang membuat buah tersebut di kalangan <a href=\"https://id.wikipedia.org/wiki/Vietnam\">orang Vietnam</a> yang sangat terpengaruh budaya Cina dikenal sebagai <i>Thang Loy</i> (Buah Naga). Istilah <i>Thang Loy</i> kemudian diterjemahkan di <a href=\"https://id.wikipedia.org/wiki/Eropa\">Eropa</a> dan negara lain yang berbahasa Inggris sebagai <i>Dragon Fruit</i> (Buah Naga).</p>', '20000', 'buah, pink, sehat, manis, organik', 'buah, pink, sehat, manis, organik', 1, '2024-01-23 07:08:52', '2024-02-01 21:01:50'),
(4, 3, 'wxpS0qjtkqZSQmFloAfm.png', 'Kecap', 'kecap', '6', 'Kecap adalah bumbu dapur atau penyedap makanan yang berupa cairan berwarna hitam yang rasanya manis atau asin. Bahan dasar pembuatan kecap umumnya adalah kedelai atau kedelai hitam. Namun ada juga kecap yang dibuat dari bahan dasar air kelapa yang umumnya berasa asin.', '<p>Kecap manis biasanya bertekstur kental dan terbuat dari <a href=\"https://id.wikipedia.org/wiki/Kedelai\">kedelai</a>, sementara kecap asin bertekstur lebih cair dan terbuat dari <a href=\"https://id.wikipedia.org/wiki/Kedelai\">kedelai</a> dengan komposisi <a href=\"https://id.wikipedia.org/wiki/Garam\">garam</a> yang lebih banyak, atau bahkan <a href=\"https://id.wikipedia.org/wiki/Ikan_laut\">ikan laut</a>. Selain berbahan dasar kedelai atau kedelai hitam bahkan air kelapa, kecap juga dapat dibuat dari ampas padat dari pembuatan <a href=\"https://id.wikipedia.org/wiki/Tahu\">tahu</a>.</p>', '46500', 'hitam, manis, kental, fermentasi', 'hitam, manis, kental, fermentasi', 1, '2024-01-24 07:25:08', '2024-01-31 23:22:09'),
(5, 1, 'GO9CRleiY4y3rlahEFOv.png', 'Nanas Madu', 'nanas-madu', '5', 'Nanas[2][3] (Ananas comosus) adalah tumbuhan tropis dengan buah yang dapat dimakan dan tumbuhan yang paling penting secara ekonomi dalam famili Bromeliaceae.[4] Nanas adalah tumbuhan asli Amerika Selatan, dan telah dibudidayakan disana selama berabad-abad. Pengenalan nanas ke Eropa pada abad ke-17 menjadikannya ikon budaya kemewahan yang signifikan.', '<p>Sejak tahun 1820-an, nanas telah ditanam secara komersial di rumah kaca dan banyak perkebunan tropis. Selain itu, nanas merupakan buah tropis terpenting ketiga dalam produksi dunia. Pada abad ke-20, Hawaii adalah penghasil nanas yang dominan, terutama untuk AS; namun, pada tahun 2016, <a href=\"https://id.wikipedia.org/wiki/Kosta_Rika\">Kosta Rika</a>, <a href=\"https://id.wikipedia.org/wiki/Brasil\">Brasil</a>, dan <a href=\"https://id.wikipedia.org/wiki/Filipina\">Filipina</a> menyumbang hampir sepertiga dari produksi nanas dunia. <a href=\"https://id.wikipedia.org/wiki/Nanas#cite_note-faostat16-5\">[5]</a></p><p>Nanas tumbuh sebagai semak kecil. Bunga individu dari tanaman yang tidak diserbuki menyatu untuk membentuk buah yang banyak. Tanaman biasanya diperbanyak dari mahkota yang berada di bagian atas buah,<a href=\"https://id.wikipedia.org/wiki/Nanas#cite_note-Morton_1987-2\">[2]</a><a href=\"https://id.wikipedia.org/wiki/Nanas#cite_note-PWG-6\">[6]</a> atau dari tunas samping, dan biasanya berbuah lebih cepat dibandingkan dengan yang dari mahkota.<a href=\"https://id.wikipedia.org/wiki/Nanas#cite_note-PWG-6\">[6]</a><a href=\"https://id.wikipedia.org/wiki/Nanas#cite_note-7\">[7]</a></p>', '206000', 'buah, kuning, segar, sehat', 'buah, kuning, segar, sehat', 1, '2024-01-27 07:43:25', '2024-01-31 22:58:55'),
(6, 2, 'avLfGJhMdV3pouvUXoMV.png', 'Kentang', 'kentang', '10', 'Kentang, ubi kentang, ubi belanda, atau ubi benggala adalah tanaman dari suku Solanaceae yang memiliki umbi batang yang dapat dimakan dan disebut \"kentang\". Umbi kentang sekarang telah menjadi salah satu makanan pokok penting di Eropa walaupun pada awalnya didatangkan dari Amerika Selatan.', '<p>Penjelajah <a href=\"https://id.wikipedia.org/wiki/Spanyol\">Spanyol</a> dan <a href=\"https://id.wikipedia.org/wiki/Portugal\">Portugis</a> pertama kali membawa ke Eropa dan mengembangbiakkan tanaman ini.</p><p>Tanaman kentang asalnya dari Amerika Selatan dan telah dibudidayakan oleh penduduk di sana sejak ribuan tahun silam. Tanaman ini merupakan <a href=\"https://id.wikipedia.org/wiki/Herba\">herba</a> (tanaman pendek tidak berkayu) semusim dan menyukai iklim yang sejuk. Di daerah tropis cocok ditanam di dataran tinggi.</p><p><a href=\"https://id.wikipedia.org/wiki/Bunga\">Bunga</a> sempurna dan tersusun majemuk. Ukuran cukup besar, dengan diameter sekitar 3 <a href=\"https://id.wikipedia.org/wiki/Meter\">cm</a>. Warnanya berkisar dari ungu hingga putih.</p>', '19500', 'sayur, kentang, karbohidrat', 'sayur, kentang, karbohidrat', 1, '2024-01-27 07:44:53', '2024-01-30 21:43:02'),
(7, 2, 'kVdKOTsoDjCPFNoi30AN.png', 'Kubis', 'kubis', '10', 'Kubis atau kol (terdiri dari beberapa kelompok kultivar dari Brassica oleracea) adalah biennial atau annual berdaun hijau atau ungu yang ditanam sebagai sayuran untuk kepala padat berdaunnya[1]. Erat kaitannya dengan tanaman cole lainnya, seperti brokoli, kembang kol, dan kubis brussel, itu diturunkan dari B. oleracea var. oleracea, kubis lapangan liar.', '<p>Kepala kubis umumnya berkisar 05 hingga 4 kilogram (10 hingga 9&nbsp;pon), dan dapat berwarna hijau, ungu dan putih. Kubis hijau berkepala keras berdaun halus adalah yang paling umum, dengan kubis merah berdaun halus dan <a href=\"https://id.wikipedia.org/wiki/Kubis_savoy\">kubis savoy</a> berdaun <i>crinkle</i> dari kedua warna terlihat lebih jarang. Kubis adalah sayuran yang berlapis-lapis. Dalam kondisi hari diterangi matahari panjang seperti yang ditemukan di garis lintang utara di musim panas, kubis dapat tumbuh jauh lebih besar. Beberapa rekor dibahas pada akhir bagian sejarah.</p>', '19000', 'hijau, sayur, kubis', 'hijau, sayur, kubis', 1, '2024-01-27 07:46:29', '2024-02-01 19:57:52'),
(8, 4, 'c8KcoLlML9GqWLskLVBy.jpg', 'Susu Murni', 'susu-murni', '8', 'Susu adalah cairan bergizi berwarna putih yang dihasilkan oleh kelenjar susu mamalia, salah satunya manusia. Susu adalah sumber gizi utama bagi bayi sebelum mereka dapat mencerna makanan padat. Susu binatang (biasanya sapi) juga diolah menjadi berbagai produk seperti mentega, yogurt, es krim, keju, susu kental manis, susu bubuk dan lain-lainnya untuk konsumsi manusia.', '<p>Dewasa ini, susu memiliki banyak fungsi dan manfaat. Untuk umur produktif, susu membantu pertumbuhan mereka.<a href=\"https://id.wikipedia.org/wiki/Susu#cite_note-1\">[1]</a> Sementara itu, untuk orang yang lanjut usia, susu membantu menopang tulang agar tidak keropos. Susu secara alami mengandung <a href=\"https://id.wikipedia.org/wiki/Nutrisi\">nutrisi</a> penting, seperti bermacam-macam <a href=\"https://id.wikipedia.org/wiki/Vitamin\">vitamin</a>, <a href=\"https://id.wikipedia.org/wiki/Protein\">protein</a>, <a href=\"https://id.wikipedia.org/wiki/Kalsium\">kalsium</a>, <a href=\"https://id.wikipedia.org/wiki/Magnesium\">magnesium (Mg)</a>, <a href=\"https://id.wikipedia.org/wiki/Fosforus\">fosforus (P)</a>, dan <a href=\"https://id.wikipedia.org/wiki/Seng\">seng (Zn)</a>, pendapat lain menambahkan bahwa susu mengandung <a href=\"https://id.wikipedia.org/wiki/Mineral\">mineral</a> dan <a href=\"https://id.wikipedia.org/wiki/Lemak\">lemak</a>.<a href=\"https://id.wikipedia.org/wiki/Susu#cite_note-2\">[2]</a> Oleh karena itu, setiap orang dianjurkan untuk meminum susu. Sekarang banyak susu yang dikemas dalam bentuk yang unik. Tujuannya agar orang tertarik untuk membeli dan minum susu. Ada juga susu yang berbentuk fermentasi.</p>', '60000', 'susu, sehat, putih, kalsium', 'susu, sehat, putih, kalsium', 1, '2024-02-01 01:05:19', '2024-02-02 01:04:07'),
(9, 6, '25yzugF9iEfwJUSMOTxY.jpg', 'Teh Celup', 'teh-celup', '6', 'Istilah \"teh\" juga digunakan untuk minuman yang dibuat dari buah, rempah-rempah atau tanaman obat lain yang diseduh, misalnya teh rosehip, camomile, krisan, dan jiaogulan. Teh yang tidak mengandung daun teh disebut teh herbal.', '<p><strong>Teh</strong> (<a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris\">bahasa Inggris</a>: <i><strong>tea</strong></i>, <a href=\"https://id.wikipedia.org/wiki/Bahasa_Belanda\">bahasa Belanda</a>: <i><strong>thee</strong></i>) (<a href=\"https://id.wikipedia.org/wiki/Hanzi_tradisional\">Hanzi</a>: 茶; <a href=\"https://id.wikipedia.org/wiki/Pinyin\">Pinyin</a>: <i>chá</i>; <a href=\"https://id.wikipedia.org/wiki/Pe%CC%8Dh-%C5%8De-j%C4%AB\">Pe̍h-ōe-jī</a>: <i>tê</i>) adalah <a href=\"https://id.wikipedia.org/wiki/Minuman\">minuman</a> yang mengandung <a href=\"https://id.wikipedia.org/wiki/Kafeina\">kafeina</a>, sebuah <a href=\"https://id.wikipedia.org/w/index.php?title=Infusi&amp;action=edit&amp;redlink=1\">infusi</a> yang dibuat dengan cara menyeduh <a href=\"https://id.wikipedia.org/wiki/Daun\">daun</a>, pucuk daun, atau tangkai <a href=\"https://id.wikipedia.org/wiki/Daun\">daun</a> yang dikeringkan dari tanaman <a href=\"https://id.wikipedia.org/wiki/Camellia_sinensis\"><i>Camellia sinensis</i></a> dengan air panas.<a href=\"https://id.wikipedia.org/wiki/Teh#cite_note-1\">[1]</a> Teh yang berasal dari tanaman teh dibagi menjadi empat kelompok: <a href=\"https://id.wikipedia.org/wiki/Teh_hitam\">teh hitam</a>, <a href=\"https://id.wikipedia.org/wiki/Teh_oolong\">teh oolong</a>, <a href=\"https://id.wikipedia.org/wiki/Teh_hijau\">teh hijau</a>, dan <a href=\"https://id.wikipedia.org/wiki/Teh_putih\">teh putih</a>.</p><p>Teh merupakan sumber alami kafeina, <a href=\"https://id.wikipedia.org/w/index.php?title=Teofilin&amp;action=edit&amp;redlink=1\">teofilin</a>, dan <a href=\"https://id.wikipedia.org/wiki/Antioksidan\">antioksidan</a> dengan kadar lemak, <a href=\"https://id.wikipedia.org/wiki/Karbohidrat\">karbohidrat</a> atau <a href=\"https://id.wikipedia.org/wiki/Protein\">protein</a> mendekati nol persen. Cita rasa agak pahit dari teh merupakan kenikmatan tersendiri dari teh.</p><p>Teh bunga dengan campuran kuncup bunga <a href=\"https://id.wikipedia.org/wiki/Melati\">melati</a> yang disebut <a href=\"https://id.wikipedia.org/wiki/Teh_melati\">teh melati</a> atau teh wangi melati merupakan jenis teh yang paling populer di Indonesia.<a href=\"https://id.wikipedia.org/wiki/Teh#cite_note-2\">[2]</a> Konsumsi teh di Indonesia sebesar 0,8 kilogram per kapita per tahun, masih jauh di bawah negara-negara lain di dunia, walaupun Indonesia merupakan negara penghasil teh terbesar nomor lima di dunia.<a href=\"https://id.wikipedia.org/wiki/Teh#cite_note-3\">[3]</a></p>', '35000', 'teh, sehat, tawar, wangi', 'teh, sehat, tawar, wangi', 1, '2024-02-01 01:10:02', '2024-02-29 23:34:17'),
(10, 3, '8vUJuSVZ6lxUoGx5K0TC.jpg', 'Garam', 'garam', '2', 'Garam dapur adalah sejenis mineral yang dapat membuat rasa asin. Biasanya garam dapur yang tersedia secara umum adalah Natrium klorida (NaCl) yang dihasilkan oleh air laut. Garam dalam bentuk alaminya adalah mineral kristal yang dikenal sebagai batu garam atau halite.', '<p>Garam sangat diperlukan tubuh, tetapi bila dikonsumsi secara berlebihan dapat menyebabkan berbagai penyakit, termasuk <a href=\"https://id.wikipedia.org/wiki/Tekanan_darah_tinggi\">tekanan darah tinggi</a> (hipertensi).<a href=\"https://id.wikipedia.org/wiki/Garam_dapur#cite_note-1\">[1]</a> Selain itu garam juga digunakan untuk <a href=\"https://id.wikipedia.org/wiki/Pengawetan_makanan\">mengawetkan makanan</a> dan sebagai <a href=\"https://id.wikipedia.org/wiki/Bumbu_dapur\">bumbu</a>. Untuk mencegah penyakit <a href=\"https://id.wikipedia.org/wiki/Gondok\">gondok</a>, garam dapur juga sering ditambahi <a href=\"https://id.wikipedia.org/wiki/Yodium\">yodium</a>.<a href=\"https://id.wikipedia.org/wiki/Garam_dapur#cite_note-2\">[2]</a></p>', '7500', 'garam, asin, bumbu, laut', 'garam, asin, bumbu, laut', 1, '2024-02-01 01:20:12', '2024-02-02 00:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `icon` text NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `view_count` text NOT NULL,
  `overview` text NOT NULL,
  `desc` text NOT NULL,
  `keyword` text NOT NULL,
  `tags` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `category_id`, `image`, `icon`, `title`, `slug`, `view_count`, `overview`, `desc`, `keyword`, `tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'zweoopJkcvGbEOu4nVly.jpg', '1Z0NfSQoUFCs0po3mtsz.png', 'Pengiriman Langsung', 'pengiriman-langsung', '0', 'Nikmati kualitas terbaik tanpa perlu keluar rumah!', '<p>Layanan ini memudahkan pengguna untuk memesan berbagai jenis buah organik secara online dan mengantarkan langsung ke pintu rumah mereka. Nikmati kualitas terbaik tanpa perlu keluar rumah!</p>', 'gratis, tanpa pajak, no ongkir', 'gratis, tanpa pajak, no ongkir', '2024-01-19 00:23:11', '2024-01-23 00:27:35'),
(2, 4, 'KTEwIITBeeESbdLqYVVQ.jpg', 'FeiYolc8TM2lvJAl4LJa.png', 'Langganan Kotak Buah Mingguan', 'langganan-kotak-buah-mingguan', '0', 'nikmati kejutan rasa dari berbagai buah berkualitas tinggi yang dipilih secara cermat.', '<p>Dengan layanan ini, pelanggan dapat berlangganan kotak buah mingguan yang berisi pilihan buah-buahan segar dan organik. Setiap minggu, nikmati kejutan rasa dari berbagai buah berkualitas tinggi yang dipilih secara cermat.</p>', 'member, langganan, anggota, membership', 'member, langganan, anggota, membership', '2024-01-23 00:32:01', '2024-01-23 00:32:01'),
(3, 2, '6WchqJhclgZVQZAVrwUe.jpg', 'WPj4rdZyqp1gfgdg3cyj.png', 'Panduan Pertanian Organik', 'panduan-pertanian-organik', '0', 'Pelajari cara menanam buah-buahan Anda sendiri dengan metode organik dan dapatkan tips serta trik dari para ahli pertanian.', '<p>Sebuah fitur informatif yang memberikan panduan lengkap tentang pertanian organik. Pelajari cara menanam buah-buahan Anda sendiri dengan metode organik dan dapatkan tips serta trik dari para ahli pertanian.</p>', 'panduan, tips, trik, bertani', 'panduan, tips, trik, bertani', '2024-01-23 00:35:24', '2024-01-23 00:35:25'),
(4, 2, 'ghIisYl3wC5JuaMomh8q.jpg', 'x5hfzigC0EqJP5sKK2J6.png', 'Rencana Diet Organik Personal', 'rencana-diet-organik-personal', '0', 'Dengan dukungan nutrisi yang tinggi, rencana ini membantu Anda mencapai gaya hidup sehat dengan mudah.', '<p>Layanan ini menawarkan rencana diet khusus yang didesain untuk memanfaatkan keberagaman buah-buahan organik. Dengan dukungan nutrisi yang tinggi, rencana ini membantu Anda mencapai gaya hidup sehat dengan mudah.</p>', 'sehat, diet, bugar, tips', 'sehat, diet, bugar, tips', '2024-01-23 00:43:30', '2024-01-23 00:43:30'),
(5, 2, 'PiZfXmyE2y6v0VBAIMe4.jpg', 'OzaZORyHVbPgBMfNfBKi.png', 'Kelas Memasak Organik Online', 'kelas-memasak-organik-online', '0', 'Tingkatkan keterampilan memasak Anda dengan kesenangan dan rasa yang tak terlupakan.', '<p>Ikuti kelas memasak interaktif yang dipandu oleh koki berpengalaman. Pelajari cara memasak hidangan lezat dan sehat menggunakan buah-buahan organik sebagai bahan utama. Tingkatkan keterampilan memasak Anda dengan kesenangan dan rasa yang tak terlupakan.</p>', 'masak, online, organik, sehat', 'masak, online, organik, sehat', '2024-01-23 00:49:15', '2024-01-23 00:49:15'),
(6, 5, 'vo1jEMgjrhHtwzFGvisN.jpg', 'PASxNFUZB6omNuXIozsy.png', 'Komunitas Pecinta Buah Organik', 'komunitas-pecinta-buah-organik', '0', 'Bergabunglah dalam komunitas ini untuk terhubung dengan sesama pecinta buah, mendapatkan inspirasi, dan bertukar ide tentang gaya hidup organik.', '<p>Sebuah platform yang memungkinkan para penggemar buah organik berbagi pengalaman, resep, dan tips. Bergabunglah dalam komunitas ini untuk terhubung dengan sesama pecinta buah, mendapatkan inspirasi, dan bertukar ide tentang gaya hidup organik.</p>', 'komunitas, organik, sehat, community', 'komunitas, organik, sehat, community', '2024-01-23 00:57:09', '2024-01-23 00:57:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'pngwing.com (15).png', 'Best Seller Products!', 'Freshness by Nature, Sefruit by Choice', '2024-01-08 21:46:02', '2024-01-23 00:09:22'),
(2, 'pngwing.com (14).png', 'Buah Organik', 'Freshness by Nature, Sefruit by Choice', '2024-01-15 20:27:37', '2024-01-23 00:09:08'),
(3, 'pngwing.com (16).png', 'Sayuran Organik', 'Freshness by Nature, Sefruit by Choice', '2024-01-23 00:09:41', '2024-01-23 00:09:41'),
(4, 'pngwing.com (17).png', 'Sayur Organik untuk menu Salad-mu', 'Freshness by Nature, Sefruit by Choice', '2024-01-23 00:10:10', '2024-01-23 00:10:10'),
(5, 'pngwing.com (18).png', 'Produk 100% Berkualitas', 'Di panen oleh para petani ahli!', '2024-01-23 00:10:52', '2024-01-23 00:10:52'),
(6, 'logo (7).png', 'Sefruit', 'Freshness by Nature, Sefruit by Choice', '2024-01-26 00:14:07', '2024-01-26 00:14:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `terms`
--

INSERT INTO `terms` (`id`, `title`, `subtitle`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'Freshness by Nature, Sefruit by Choice', '<p><strong>Syarat dan Ketentuan Penggunaan untuk sefruit.com</strong></p><p>Selamat datang di sefruit.com. Dengan mengakses dan menggunakan situs web ini, Anda setuju untuk tunduk pada syarat dan ketentuan berikut. Jika Anda tidak setuju dengan syarat dan ketentuan ini, harap segera tinggalkan situs web kami.</p><p><strong>Penerimaan Ketentuan</strong></p><ul><li>Dengan menggunakan situs web sefruit.com, Anda secara otomatis menyetujui dan terikat oleh syarat dan ketentuan ini.</li></ul><p><strong>Ketentuan Penggunaan</strong></p><ul><li>Anda hanya diperkenankan menggunakan situs web ini untuk tujuan yang sah. Dilarang keras untuk menggunakan situs ini dengan cara yang dapat merugikan, mengganggu, atau menciptakan beban berlebihan pada situs atau layanan terkait.</li></ul><p><strong>Informasi Pengguna</strong></p><ul><li>Saat menggunakan situs web kami, Anda mungkin diminta untuk memberikan informasi pribadi. Anda menjamin bahwa informasi yang Anda berikan adalah akurat, lengkap, dan terkini.</li></ul><p><strong>Keamanan Akun</strong></p><ul><li>Setelah mendaftar di situs kami, Anda bertanggung jawab untuk menjaga keamanan akun Anda, termasuk kata sandi Anda. Anda setuju untuk memberi tahu kami segera tentang penggunaan yang tidak sah atau akses yang tidak sah ke akun Anda.</li></ul><p><strong>Pembelian dan Pembayaran</strong></p><ul><li>Jika Anda melakukan pembelian melalui situs web kami, Anda setuju untuk memberikan informasi pembayaran yang akurat dan lengkap. Kami tidak bertanggung jawab atas kesalahan dalam proses pembayaran yang disebabkan oleh informasi yang tidak valid atau tidak lengkap.</li></ul><p><strong>Hak Kekayaan Intelektual</strong></p><ul><li>Konten situs web ini, termasuk tetapi tidak terbatas pada teks, grafik, logo, dan gambar, dilindungi oleh hak cipta dan hak kekayaan intelektual lainnya. Penggunaan tanpa izin dapat melanggar hukum yang berlaku.</li></ul><p><strong>Perubahan pada Situs dan Layanan</strong></p><ul><li>Kami berhak untuk mengubah, memodifikasi, atau menutup situs web atau layanan kapan saja tanpa pemberitahuan sebelumnya.</li></ul><p><strong>Penghentian Akses</strong></p><ul><li>Kami berhak untuk mengakhiri atau memblokir akses Anda ke situs web ini tanpa pemberitahuan jika kami menganggap bahwa Anda melanggar syarat dan ketentuan ini.</li></ul><p><strong>Hukum yang Berlaku</strong></p><ul><li>Syarat dan ketentuan ini tunduk pada hukum yang berlaku di wilayah tempat kami beroperasi.</li></ul><p>Dengan menggunakan sefruit.com, Anda setuju untuk mematuhi semua syarat dan ketentuan ini. Kami menyarankan Anda membaca syarat dan ketentuan ini secara seksama sebelum menggunakan situs web kami.</p>', '2024-01-23 19:50:23', '2024-01-23 19:50:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `profesi` varchar(255) NOT NULL,
  `testimoni` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `nama`, `image`, `profesi`, `testimoni`, `created_at`, `updated_at`) VALUES
(1, 'Narco Varga', 'BCS_S3_Nacho.png', 'Preman', '<p>WTF</p>', '2024-01-15 23:49:57', '2024-01-24 07:16:56'),
(2, 'Jesse Pinkman', 'Jesse_Pinkman_S5B.png', 'Enterpreneur', '<p>Let Him Cook.</p>', '2024-01-21 04:28:32', '2024-01-21 04:28:32'),
(3, 'Hank Schrader', 'Hank_Schrader_S5B.png', 'DEA', '<p>holy moly</p>', '2024-01-23 07:13:49', '2024-01-23 07:13:49'),
(4, 'Tony Stark', '71JpPdKSEAL._AC_UY1100_.jpg', 'Scientist', '<p>Mantap</p>', '2024-02-01 21:01:30', '2024-02-01 21:01:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$eph33Y8eRhNUPpkxZsFEVOqJowMrvMfkVtHD7nv7w0c5SBBmQXhnm', NULL, 1, '2024-01-08 21:43:46', '2024-01-08 21:43:46'),
(2, 'Admin', 'gate@admin.com', NULL, '$2y$10$jifvvuRpup4MgXTM4/9R2e0LrdWx1Lj1Wo5q97SdDz8cB3Pvljl2G', NULL, 1, '2024-01-15 20:27:15', '2024-01-15 20:27:15'),
(3, 'Deil', 'deilham@sefruit.com', NULL, '$2y$10$h3bIpsW111sHCo5v42nE3OysCAeHqwx3WH1.q2oM2Kt1Pmjwd.mv6', NULL, 2, '2024-01-31 20:51:54', '2024-01-31 20:51:54'),
(4, 'Faatih Hadil Ulya Wibowo', 'faatihhadil@gmail.com', NULL, '$2y$10$gdDP5THSnGfVe4BYHTH3OOsjZCClThrxBYqREtGyQYKDDzlOMOASy', NULL, 2, '2024-02-29 01:44:40', '2024-02-29 01:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visitors`
--

INSERT INTO `visitors` (`id`, `count`, `created_at`, `updated_at`) VALUES
(1, 7304, '2024-01-08 21:40:09', '2024-03-27 06:50:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `works`
--

INSERT INTO `works` (`id`, `icon`, `image`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'NkdxarvnD5sxNlfWzeFc.png', 'iBZUetMDGyLllD8J7EVF.jpg', 'Pilih Produk', '<p>Kunjungi <a href=\"https://www.sefruit.com/\">SeFruit.com</a> untuk melihat koleksi buah-buahan segar kami. Pilih buah yang Anda inginkan.</p>', '2024-01-21 19:57:25', '2024-01-29 18:38:48'),
(2, 'pyfeO2jIU2rjG9LuwIm4.png', 'Q3Gb4136p3wY5uMGlA6t.jpg', 'Catat Nama Produk', '<p>Catat nama produk dari halaman detail produk.</p>', '2024-01-21 20:04:39', '2024-01-29 18:39:00'),
(3, 'a46vLKD9tqXG0v3rDZWO.png', 'z2vojf6Qkw1GqrhkZtDt.jpg', 'Hubungi Kami di WhatsApp', '<p>Kirimi kami pesan di WhatsApp dengan meng-klik tombol “Order via WhatsApp”.</p>', '2024-01-21 20:05:57', '2024-01-29 18:39:12'),
(4, 'j1Da7Eki8qcJTYVoiOBm.png', '1OKFnhyzeSfKUXezIkav.jpg', 'Verifikasi Pesanan', '<p>Tim kami akan segera merespons pesanan Anda, memberikan total harga dan informasi pembayaran.</p>', '2024-01-22 23:50:51', '2024-01-29 18:39:24'),
(5, 'wJmn0VZD85A6VOsAlR3V.png', 'SHKRQCoH1GdoYNwUlmpg.jpg', 'Pembayaran', '<p>Lakukan pembayaran sesuai dengan petunjuk yang diberikan. Setelah pembayaran dikonfirmasi, pesanan Anda akan segera diproses.</p>', '2024-01-22 23:52:08', '2024-01-29 18:39:35'),
(6, 'yndCwfKrEt2Y2zeMC7hZ.png', '8meli2knYJ3t1SBqVPPE.jpg', 'Pengiriman', '<p>Pesanan Anda akan segera dikirimkan ke alamat yang Anda berikan. Pantau nomor resi pengiriman untuk melacak status pesanan.</p><p>Selamat menikmati buah segar dari SeFruit.com! 🍍🚚</p>', '2024-01-29 05:01:05', '2024-01-29 18:39:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `heading_benefits`
--
ALTER TABLE `heading_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `heading_testimonials`
--
ALTER TABLE `heading_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_blogs`
--
ALTER TABLE `kategori_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_products`
--
ALTER TABLE `kategori_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_services`
--
ALTER TABLE `kategori_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keunggulans`
--
ALTER TABLE `keunggulans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `heading_benefits`
--
ALTER TABLE `heading_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `heading_testimonials`
--
ALTER TABLE `heading_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_blogs`
--
ALTER TABLE `kategori_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_products`
--
ALTER TABLE `kategori_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_services`
--
ALTER TABLE `kategori_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keunggulans`
--
ALTER TABLE `keunggulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kategori_blogs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kategori_products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kategori_services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
