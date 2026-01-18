-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: interchange.proxy.rlwy.net    Database: railway
-- ------------------------------------------------------
-- Server version	9.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_edit_logs`
--

DROP TABLE IF EXISTS `campaign_edit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_edit_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `edit_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_edit_logs_campaign_id_foreign` (`campaign_id`),
  KEY `campaign_edit_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `campaign_edit_logs_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `campaign_edit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_edit_logs`
--

LOCK TABLES `campaign_edit_logs` WRITE;
/*!40000 ALTER TABLE `campaign_edit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_edit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_faqs`
--

DROP TABLE IF EXISTS `campaign_faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint unsigned NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_faqs_campaign_id_foreign` (`campaign_id`),
  CONSTRAINT `campaign_faqs_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_faqs`
--

LOCK TABLES `campaign_faqs` WRITE;
/*!40000 ALTER TABLE `campaign_faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_updates`
--

DROP TABLE IF EXISTS `campaign_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_updates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_updates_campaign_id_foreign` (`campaign_id`),
  CONSTRAINT `campaign_updates_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_updates`
--

LOCK TABLES `campaign_updates` WRITE;
/*!40000 ALTER TABLE `campaign_updates` DISABLE KEYS */;
INSERT INTO `campaign_updates` VALUES (1,5,'Add new book collection!','Halo #OrangBaik,\r\n\r\nKabar gembira dari Nusa Tenggara! 👋\r\n\r\nAlhamdulillah/Puji Syukur, berkat bantuan teman-teman semua, koleksi buku baru untuk perpustakaan mini kami akhirnya telah tiba! 📚✨\r\n\r\nSeperti yang terlihat pada foto, buku-buku ini meliputi buku cerita bergambar, ensiklopedia anak, dan buku pelajaran. Tak sabar rasanya melihat adik-adik di desa berebut memilih buku bacaan baru mereka nanti sore.\r\n\r\nTambahan koleksi ini sangat berarti untuk membuka jendela dunia bagi mereka di sini. Terima kasih banyak karena telah menjadi bagian dari perjalanan literasi mereka.\r\n\r\nSalam hangat🙏','campaign-updates/Le5yfoie3ZZujg8itRqoqKInuMpFqZpq7EBksObO.jpg','2025-12-09 14:57:39','2025-12-09 14:58:52'),(3,12,'tes update1','tes update',NULL,'2025-12-14 10:59:52','2025-12-14 11:00:00');
/*!40000 ALTER TABLE `campaign_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_goal` text COLLATE utf8mb4_unicode_ci,
  `target_amount` decimal(15,2) NOT NULL,
  `current_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `deadline` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','pending','active','funded','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `last_edit_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faq_fund_usage` text COLLATE utf8mb4_unicode_ci,
  `faq_timeline` text COLLATE utf8mb4_unicode_ci,
  `faq_custom_1_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_custom_1_answer` text COLLATE utf8mb4_unicode_ci,
  `faq_custom_2_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_custom_2_answer` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaigns_slug_unique` (`slug`),
  KEY `campaigns_user_id_foreign` (`user_id`),
  KEY `campaigns_category_id_foreign` (`category_id`),
  CONSTRAINT `campaigns_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `campaigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (1,7,2,'Warung Makan Padang Bu Siti - Ekspansi Cabang Ketiga','warung-makan-padang-bu-siti','Warung makan Padang yang telah berdiri 10 tahun ingin membuka cabang kedua. Dana akan digunakan untuk sewa tempat, renovasi, peralatan dapur, dan modal awal. Target pembukaan 6 bulan ke depan.','Tujuan kami adalah...',100000000.00,45000000.00,'2025-12-12','images/campaigns/Campaign1WarungBusiti.jpeg',NULL,'cancelled',NULL,'2025-12-03 19:37:08','2025-12-06 02:15:47','Dana akan digunakan untuk...','Campaign akan terealisasi dalam...',NULL,NULL,NULL,NULL),(2,7,1,'Pengrajin Batik Tulis Yogyakarta - Mesin Modern','pengrajin-batik-tulis-yogyakarta','Usaha batik tulis tradisional membutuhkan mesin modern untuk meningkatkan produksi tanpa mengurangi kualitas. Dana untuk mesin pewarna otomatis dan pelatihan karyawan.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',75000000.00,75000000.00,'2026-12-12','images/campaigns/Campaign2BatikTulis.jpeg',NULL,'funded',NULL,'2025-12-03 19:37:08','2025-12-09 23:37:09','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(3,7,2,'Kedai Kopi Lokal - Roasting Equipment','kedai-kopi-lokal-roasting','Kedai kopi yang menjual biji kopi lokal Gayo membutuhkan mesin roasting profesional untuk meningkatkan kualitas dan kapasitas produksi. Target: 50kg/hari.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',85000000.00,63000000.00,'2026-12-12','images/campaigns/Campaign3KedaiKopi.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2025-12-08 00:35:39','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(4,3,3,'Aplikasi Pembelajaran Bahasa Daerah untuk Anak SD','aplikasi-pembelajaran-bahasa-daerah','Mengembangkan aplikasi mobile untuk pembelajaran bahasa daerah (Jawa, Sunda, Bali) dengan metode gamifikasi. Dana untuk development, ilustrasi, dan testing.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',120000000.00,38250000.00,'2026-04-04','images/campaigns/Campaign4NusantaraApp.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2026-01-18 05:42:22','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(5,2,4,'Perpustakaan Mini untuk Desa Terpencil Nusa Tenggara','perpustakaan-mini-desa-terpencil','Membangun perpustakaan mini dengan 1000 buku untuk anak-anak di desa terpencil. Termasuk rak buku, meja baca, dan program literasi mingguan selama 1 tahun.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',50000000.00,49000000.00,'2025-12-25','images/campaigns/Campaign5PerpustakaanMini.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2025-12-07 17:44:15','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(6,3,5,'Posyandu Mobile untuk Daerah Pegunungan','posyandu-mobile-pegunungan','Mobil posyandu keliling untuk melayani ibu hamil dan balita di daerah pegunungan. Dilengkapi alat kesehatan dasar, obat-obatan, dan tenaga medis terlatih.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',150000000.00,89000000.00,'2026-02-04','images/campaigns/Campaign6PosyanduMobile.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2025-12-06 02:16:39','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(7,2,6,'Bank Sampah Digital - Aplikasi Pengelolaan Sampah','bank-sampah-digital','Sistem digital untuk bank sampah di 10 kelurahan. Warga bisa tracking sampah yang disetorkan, mendapat poin reward, dan edukasi pengelolaan sampah yang benar.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',99000000.00,35000000.00,'2026-03-04','images/campaigns/Campaign7BankSampah.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2025-12-12 13:27:13','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(8,3,1,'Kerajinan Anyaman Bambu - Ekspor Pasar Eropa','kerajinan-anyaman-bambu-ekspor','Pengrajin anyaman bambu tradisional ingin ekspansi ke pasar Eropa. Dana untuk sertifikasi produk, branding, packaging ramah lingkungan, dan marketing online.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',80000000.00,55000000.00,'2026-12-23','images/campaigns/Campaign8KerajinanBambu.jpeg',NULL,'funded',NULL,'2025-12-03 19:37:08','2025-12-12 13:11:55','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(9,2,2,'Brand Fashion Lokal \"Nusantara Wear\" - Online Store','brand-fashion-nusantara-wear','Brand fashion berbahan kain tradisional Indonesia ingin launching online store. Dana untuk fotografi produk, website e-commerce, inventory awal, dan digital marketing 6 bulan.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',110000000.00,73150000.00,'2026-01-25','images/campaigns/Campaign9NusantaraWear.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2026-01-18 05:21:16','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(10,3,3,'Smart Farming IoT untuk Petani Sayuran Organik','smart-farming-iot-organik','Sistem monitoring tanaman otomatis dengan sensor kelembaban, suhu, dan nutrisi tanah. Data real-time via smartphone untuk 20 petani sayuran organik di Bandung.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',135000000.00,18000000.00,'2026-04-04','images/campaigns/Campaign10SmartFarmingIOT.jpeg',NULL,'active',NULL,'2025-12-03 19:37:08','2025-12-06 02:16:39','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(11,2,2,'Toko Roti & Kue Tradisional - Oven Industrial','toko-roti-kue-tradisional','Alhamdulillah campaign sudah tercapai! Terima kasih para donatur. Oven industrial sudah dibeli dan produksi meningkat 3x lipat.','Tujuan utama campaign ini adalah untuk mengembangkan usaha dan meningkatkan kualitas produk/layanan agar dapat melayani lebih banyak pelanggan.',60000000.00,65000000.00,'2025-11-04','images/campaigns/Campaign11OvenIndustrial.jpeg',NULL,'funded',NULL,'2025-12-03 19:37:08','2025-12-06 02:16:39','Dana yang terkumpul akan digunakan untuk: 50% renovasi dan perluasan tempat, 30% pembelian peralatan baru, 20% modal operasional dan promosi.','Setelah campaign selesai, kami akan mulai realisasi dalam 2-4 minggu. Progress akan dilaporkan secara berkala kepada semua backers.',NULL,NULL,NULL,NULL),(12,7,2,'Warung Kopi Pak Budi Berkembang','warung-kopi-pak-budi-berkembang','Warung kopi Pak Budi ini sudah berdiri sejak 1998 di daerah Cibubur. Dengan pelanggan setia dan kualitas kopi yang baik, kami ingin mengembangkan usaha dengan menambah peralatan dan memperluas tempat duduk. Dana yang terkumpul akan digunakan untuk renovasi dan pembelian mesin kopi profesional.','Tujuan utamanya adalah mengembangkan warung kopi dengan menambah kapasitas tempat duduk dan meningkatkan kualitas dengan mesin kopi profesional.',500000.00,0.00,'2028-06-12','images/campaigns/1764999870_campaign12.png',NULL,'active',NULL,'2025-12-05 22:44:30','2025-12-14 13:15:41','70% untuk renovasi dan perluasan tempat duduk\r\n30% untuk mesin kopi espresso profesional\r\n10% untuk peralatan pendukung lainnya','Renovasi akan dimulai 3 minggu setelah target tercapai dan selesai dalam 1-2 bulan. Progress akan dilaporkan setiap minggu.','Apa yang membedakan warung kopi ini?','Kami menggunakan biji kopi lokal langsung dari petani Jawa timur dan menyajikan dengan resep tradisional turun temurun.',NULL,NULL),(15,19,6,'Membantu membangun rumah ibadah','membantu-membangun-rumah-ibadah','donasi untuk membangun rumah ibadah si sekitar Jakarta untuk masyarakat sekitar di area Jakarta Barat, Jakarta Timur, Jakarta Selatan, Jakarta Utara untuk membangun komunitas agama yang dapat lebih rajin beribadah di kehidupan sehari hari.',NULL,100000000.00,0.00,'2027-06-18','images/campaigns/1768666645_wooden-building-11zon.jpg',NULL,'pending',NULL,'2026-01-17 16:17:25','2026-01-17 16:17:25',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Seni & Budaya','seni-budaya','Campaign untuk seni, musik, film, teater, dan budaya lokal',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06'),(2,'UMKM','umkm','Campaign untuk usaha mikro, kecil, dan menengah',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06'),(3,'Teknologi','teknologi','Campaign untuk inovasi teknologi dan startup',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06'),(4,'Pendidikan','pendidikan','Campaign untuk program pendidikan dan pelatihan',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06'),(5,'Kesehatan','kesehatan','Campaign untuk kesehatan dan kesejahteraan',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06'),(6,'Lingkungan','lingkungan','Campaign untuk pelestarian lingkungan dan sustainability',NULL,'active','2025-12-03 19:37:06','2025-12-03 19:37:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disbursements`
--

DROP TABLE IF EXISTS `disbursements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disbursements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` bigint unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `platform_fee` decimal(15,2) NOT NULL DEFAULT '0.00',
  `net_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `creator_notes` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `disbursements_campaign_id_foreign` (`campaign_id`),
  CONSTRAINT `disbursements_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disbursements`
--

LOCK TABLES `disbursements` WRITE;
/*!40000 ALTER TABLE `disbursements` DISABLE KEYS */;
INSERT INTO `disbursements` VALUES (1,2,75000000.00,3750000.00,71250000.00,'BCA - Bank Central Asia','1234567890','John carter','approved','saya ingin tarik uang saya','okee gan','2025-12-09 23:41:07','2025-12-09 23:42:49','2025-12-09 23:42:49'),(2,11,65000000.00,3250000.00,61750000.00,'Bank Jago','1234567890','Siti nurbayah','approved','saya mau melakukan penarikan uang dari campaign saya yg sudah terkumpul.','oke, uang sudah kami transfer ke bank bersangkutan.','2025-12-12 13:15:36','2025-12-12 13:18:57','2025-12-12 13:18:57');
/*!40000 ALTER TABLE `disbursements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `campaign_id` bigint unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment_method` enum('transfer_bank','e_wallet','midtrans') COLLATE utf8mb4_unicode_ci DEFAULT 'transfer_bank',
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `va_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transaction_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `donations_transaction_code_unique` (`transaction_code`),
  KEY `donations_user_id_foreign` (`user_id`),
  KEY `donations_campaign_id_foreign` (`campaign_id`),
  CONSTRAINT `donations_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,1,12,15000.00,'midtrans',NULL,NULL,'947eec3d-0809-4edc-8e02-c46550a7899f',NULL,'pending','DN17650663846734','semangat pak budi','2025-12-06 17:13:04','2025-12-06 17:13:04'),(2,1,6,10000.00,'midtrans',NULL,NULL,'ed162fcc-cd81-44c6-a2a3-85fbcb43ba95',NULL,'pending','DN17650669545954','semangat','2025-12-06 17:22:34','2025-12-06 17:22:35'),(3,1,6,10000.00,'midtrans',NULL,NULL,'5df9cbb9-fa65-49bc-9014-66ea230d7e37',NULL,'pending','DN17650670811774','semangat','2025-12-06 17:24:41','2025-12-06 17:24:41'),(4,1,9,50000.00,'midtrans',NULL,NULL,NULL,NULL,'confirmed','DN17650785659653','semangat','2025-12-06 20:36:05','2025-12-06 20:36:05'),(5,1,5,1000000.00,'midtrans',NULL,NULL,NULL,NULL,'confirmed','DN17651546558045','LANJUTKAN GAN','2025-12-07 17:44:15','2025-12-07 17:44:15'),(6,2,3,1000000.00,'midtrans',NULL,NULL,NULL,NULL,'confirmed','DN17651793396269','keren euy','2025-12-08 00:35:39','2025-12-08 00:35:39'),(7,2,4,12000000.00,'midtrans',NULL,NULL,NULL,NULL,'confirmed','DN17651795933096','semangat ges!','2025-12-08 00:39:53','2025-12-08 00:39:53'),(8,4,9,1000000.00,'midtrans',NULL,NULL,NULL,NULL,'confirmed','DN17653298485371',NULL,'2025-12-09 18:24:08','2025-12-09 18:24:08'),(11,4,9,100000.00,'transfer_bank',NULL,NULL,NULL,NULL,'confirmed','DN17687136761790',NULL,'2026-01-18 05:21:16','2026-01-18 05:21:16'),(12,4,4,1150000.00,'transfer_bank',NULL,NULL,NULL,NULL,'confirmed','DN17687137013794',NULL,'2026-01-18 05:21:41','2026-01-18 05:21:41'),(13,4,4,100000.00,'transfer_bank',NULL,NULL,NULL,NULL,'confirmed','DN17687149427668',NULL,'2026-01-18 05:42:22','2026-01-18 05:42:22');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_12_02_040704_create_categories_table',1),(5,'2025_12_02_040818_create_campaigns_table',1),(6,'2025_12_02_041047_create_donations_table',1),(7,'2025_12_02_041133_create_campaign_updates_table',1),(8,'2025_12_02_041243_create_campaign_faqs_table',1),(9,'2025_12_02_041408_create_disbursements_table',1),(10,'2025_12_03_003627_add_address_to_users_table',1),(11,'2025_12_06_051500_add_faq_to_campaigns_table',2),(12,'2025_12_06_234324_add_snap_token_to_donations_table',3),(13,'2025_12_07_001203_add_midtrans_to_payment_method_enum',4),(14,'2025_12_10_010656_create_notifications_table',5),(15,'2025_12_10_061433_update_disbursements_table_add_admin_note',6),(16,'2025_12_10_062308_add_platform_fee_to_disbursements_table',7),(17,'2025_12_12_130126_add_status_to_users_table',8),(18,'2025_12_12_140712_add_bank_and_va_to_donations_table',8),(19,'2025_12_12_145315_add_edit_reason_to_campaigns_table',9),(20,'2025_12_12_150243_create_campaign_edit_logs_table',9),(21,'2026_01_08_100533_add_midtrans_to_payment_method_enum',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_is_read_index` (`user_id`,`is_read`),
  KEY `notifications_created_at_index` (`created_at`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notifications_chk_1` CHECK (json_valid(`data`))
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,2,'new_donation','💰 New Donation Received!','Ahmad Wijaya just donated Rp 1.000.000 to your campaign: Brand Fashion Lokal \"Nusantara Wear\" - Online Store','{\"donation_id\":8,\"campaign_id\":\"9\",\"amount\":\"1000000.00\",\"donor_name\":\"Ahmad Wijaya\"}',1,'2025-12-12 13:13:27','2025-12-09 18:24:08','2025-12-12 13:13:27'),(2,4,'donation_success','✅ Donation Successful!','Your donation of Rp 1.000.000 to Brand Fashion Lokal \"Nusantara Wear\" - Online Store was successful. Thank you for your support!','{\"donation_id\":8,\"campaign_id\":\"9\",\"campaign_slug\":\"brand-fashion-nusantara-wear\",\"amount\":\"1000000.00\"}',0,NULL,'2025-12-09 18:24:08','2025-12-09 18:24:08'),(3,1,'new_withdrawal_request','💰 New Withdrawal Request','John Creator has requested withdrawal for campaign \"Pengrajin Batik Tulis Yogyakarta - Mesin Modern\"','{\"disbursement_id\":1,\"campaign_id\":2,\"amount\":71250000}',1,'2025-12-09 23:43:00','2025-12-09 23:41:07','2025-12-09 23:43:00'),(4,7,'withdrawal_approved','✅ Withdrawal Request Approved','Your withdrawal request for campaign \"Pengrajin Batik Tulis Yogyakarta - Mesin Modern\" has been approved. The amount of Rp 71.250.000 will be transferred to your bank account within 3-5 business days.','{\"disbursement_id\":1,\"campaign_id\":2,\"amount\":\"71250000.00\"}',1,'2025-12-09 23:43:24','2025-12-09 23:42:49','2025-12-09 23:43:24'),(5,8,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":8}',0,NULL,'2025-12-11 01:21:16','2025-12-11 01:21:16'),(6,9,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":9}',0,NULL,'2025-12-12 00:46:23','2025-12-12 00:46:23'),(7,10,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":10}',0,NULL,'2025-12-12 02:07:24','2025-12-12 02:07:24'),(8,11,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":11}',0,NULL,'2025-12-12 02:10:32','2025-12-12 02:10:32'),(9,1,'new_withdrawal_request','💰 New Withdrawal Request','Ibu Siti has requested withdrawal for campaign \"Toko Roti & Kue Tradisional - Oven Industrial\"','{\"disbursement_id\":2,\"campaign_id\":11,\"amount\":61750000}',1,'2025-12-12 13:16:33','2025-12-12 13:15:36','2025-12-12 13:16:33'),(10,2,'withdrawal_approved','✅ Withdrawal Request Approved','Your withdrawal request for campaign \"Toko Roti & Kue Tradisional - Oven Industrial\" has been approved. The amount of Rp 61.750.000 will be transferred to your bank account within 3-5 business days.','{\"disbursement_id\":2,\"campaign_id\":11,\"amount\":\"61750000.00\"}',1,'2025-12-12 13:20:09','2025-12-12 13:18:57','2025-12-12 13:20:09'),(11,2,'campaign_approved','✅ Campaign Approved!','Great news! Your campaign \'Bank Sampah Digital - Aplikasi Pengelolaan Sampah\' has been approved and is now live!','{\"campaign_id\":7,\"campaign_slug\":\"bank-sampah-digital\"}',0,NULL,'2025-12-12 13:27:13','2025-12-12 13:27:13'),(12,12,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":12}',1,'2025-12-12 15:18:56','2025-12-12 14:18:32','2025-12-12 15:18:56'),(13,12,'campaign_approved','✅ Campaign Approved!','Great news! Your campaign \'UMKM Cafe Kopi Mbak siti\' has been approved and is now live!','{\"campaign_id\":13,\"campaign_slug\":\"umkm-cafe-kopi-mbak-siti\"}',0,NULL,'2025-12-12 17:10:38','2025-12-12 17:10:38'),(14,7,'campaign_approved','✅ Campaign Approved!','Great news! Your campaign \'tes kampanye\' has been approved and is now live!','{\"campaign_id\":14,\"campaign_slug\":\"tes-kampanye\"}',0,NULL,'2025-12-14 13:21:33','2025-12-14 13:21:33'),(15,13,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":13}',0,NULL,'2025-12-17 02:28:55','2025-12-17 02:28:55'),(16,14,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":14}',0,NULL,'2026-01-01 01:53:14','2026-01-01 01:53:14'),(17,15,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":15}',0,NULL,'2026-01-01 02:25:13','2026-01-01 02:25:13'),(18,16,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":16}',0,NULL,'2026-01-02 08:30:51','2026-01-02 08:30:51'),(19,17,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":17}',0,NULL,'2026-01-15 06:20:20','2026-01-15 06:20:20'),(20,18,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":18}',0,NULL,'2026-01-15 18:03:34','2026-01-15 18:03:34'),(21,19,'welcome','🎉 Welcome to DanaKarya!','Thank you for joining DanaKarya. Start exploring campaigns or create your own!','{\"user_id\":19}',0,NULL,'2026-01-17 15:44:06','2026-01-17 15:44:06'),(22,2,'new_donation','💰 New Donation Received!','Ahmad Wijaya just donated Rp 100.000 to your campaign: Brand Fashion Lokal \"Nusantara Wear\" - Online Store','{\"donation_id\":11,\"campaign_id\":\"9\",\"amount\":\"100000.00\",\"donor_name\":\"Ahmad Wijaya\"}',0,NULL,'2026-01-18 05:21:16','2026-01-18 05:21:16'),(23,4,'donation_success','✅ Donation Successful!','Your donation of Rp 100.000 to Brand Fashion Lokal \"Nusantara Wear\" - Online Store was successful. Thank you for your support!','{\"donation_id\":11,\"campaign_id\":\"9\",\"campaign_slug\":\"brand-fashion-nusantara-wear\",\"amount\":\"100000.00\"}',0,NULL,'2026-01-18 05:21:16','2026-01-18 05:21:16'),(24,3,'new_donation','💰 New Donation Received!','Ahmad Wijaya just donated Rp 1.150.000 to your campaign: Aplikasi Pembelajaran Bahasa Daerah untuk Anak SD','{\"donation_id\":12,\"campaign_id\":\"4\",\"amount\":\"1150000.00\",\"donor_name\":\"Ahmad Wijaya\"}',0,NULL,'2026-01-18 05:21:41','2026-01-18 05:21:41'),(25,4,'donation_success','✅ Donation Successful!','Your donation of Rp 1.150.000 to Aplikasi Pembelajaran Bahasa Daerah untuk Anak SD was successful. Thank you for your support!','{\"donation_id\":12,\"campaign_id\":\"4\",\"campaign_slug\":\"aplikasi-pembelajaran-bahasa-daerah\",\"amount\":\"1150000.00\"}',0,NULL,'2026-01-18 05:21:41','2026-01-18 05:21:41'),(26,3,'new_donation','💰 New Donation Received!','Ahmad Wijaya just donated Rp 100.000 to your campaign: Aplikasi Pembelajaran Bahasa Daerah untuk Anak SD','{\"donation_id\":13,\"campaign_id\":\"4\",\"amount\":\"100000.00\",\"donor_name\":\"Ahmad Wijaya\"}',0,NULL,'2026-01-18 05:42:22','2026-01-18 05:42:22'),(27,4,'donation_success','✅ Donation Successful!','Your donation of Rp 100.000 to Aplikasi Pembelajaran Bahasa Daerah untuk Anak SD was successful. Thank you for your support!','{\"donation_id\":13,\"campaign_id\":\"4\",\"campaign_slug\":\"aplikasi-pembelajaran-bahasa-daerah\",\"amount\":\"100000.00\"}',0,NULL,'2026-01-18 05:42:22','2026-01-18 05:42:22');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('mG45YH2LoFNlutZvvOjqFVaqHno1jkxMV60n0r4V',7,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:145.0) Gecko/20100101 Firefox/145.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOTc1NnhWTFdhOWR0VmtwRGFtb2xkWm5pOFQwTE1Dd01ob21aT0tLRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jcmVhdG9yL2Rpc2J1cnNlbWVudHMiO3M6NToicm91dGUiO3M6Mjc6ImNyZWF0b3IuZGlzYnVyc2VtZW50cy5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7czo2OiJsb2NhbGUiO3M6MjoiaWQiO30=',1765352443),('XXjMBK2GfzZ0gh07Z037K1HiZA3E9j6NsEWX7uzC',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:145.0) Gecko/20100101 Firefox/145.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSFVwWk1SNE9FRExlTU9LVGxRRlJ6V1BTSXhCcnI3dTNuaDVROWRjbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2NyZWF0b3IvZGlzYnVyc2VtZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1765370401);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','creator','backer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin DanaKaryaaa','admin@danakarya.com',NULL,'$2y$12$DlhqzT52WTRu2l58L0Hewe0sZAIhsyv4EyhwHwDlM.92SEibl9DJO','admin','active',NULL,'Administrator platform DanaKarya',NULL,NULL,'tc567D2YW26EKjdqgQ2olXAAQz2k9Ztc0Pq0QScY9s8x9wnSEg8i9u2y6ZHz','2025-12-03 19:37:06','2026-01-18 06:17:52'),(2,'Ibu Siti','siti@example.com',NULL,'$2y$12$YT6YNesLwTCCO/QHmMtj1e.waWjtud4FSkOCkLn/J0tuUfJYTQDnW','creator','active',NULL,'Pemilik Warung Makan Padang Ibu Siti','081234567890',NULL,NULL,'2025-12-03 19:37:06','2025-12-03 19:37:06'),(3,'Budi Santoso','budi@example.com',NULL,'$2y$12$MdTS5K1UkECs8i0ToKWqzOcFQApG.Z76/MxWavZ0RDBEF0j3M4k6S','creator','active',NULL,'Pengrajin batik tulis dari Solo','081234567891',NULL,NULL,'2025-12-03 19:37:07','2025-12-03 19:37:07'),(4,'Ahmad Wijaya','ahmad@example.com',NULL,'$2y$12$dYBfxiM2wOsxWls/pgpAMezu3cwyXfnqIgwDP9EOZurU.Jfn.ut0S','backer','active',NULL,'Mahasiswa yang suka support UMKM lokal dan seni budaya',NULL,NULL,NULL,'2025-12-03 19:37:07','2025-12-15 03:50:48'),(5,'Rina Kusuma','rina@example.com',NULL,'$2y$12$gSxLx3VTuuxFe0cycRZHRObQDcHmdQb1Pw2ifbQFAYsuZcOYRjJsC','backer','active',NULL,NULL,NULL,NULL,NULL,'2025-12-03 19:37:07','2025-12-03 19:37:07'),(6,'Dimas Prasetyo','dimas@example.com',NULL,'$2y$12$9R6JwfXhHH9lMpuBjNzWYO4.LEydnkKcIKPe5Fat1jztt0bC3mzGq','backer','active',NULL,NULL,NULL,NULL,NULL,'2025-12-03 19:37:08','2025-12-03 19:37:08'),(7,'John Creator','creator@danakarya.com',NULL,'$2y$12$c5VI0lwbxRKapOoAw/q15uVNbLtigwm5GacAHWevlkq95Xvunufda','creator','active',NULL,NULL,NULL,NULL,NULL,'2025-12-05 21:36:31','2026-01-18 06:21:15'),(8,'izzabasyara','kimay@gmail.com',NULL,'$2y$12$Z4gQuPdUAFLqpC8n8bL/ju6bOTqri.RbgMtPGQJyFF67ZHJ9z6Vsm','backer','active',NULL,NULL,'628556767',NULL,NULL,'2025-12-11 01:21:16','2025-12-11 01:21:16'),(9,'Keane','keane11@gmail.com',NULL,'$2y$12$VBB0ELoCvD4AD5m4dpzLUeM5AO6DvVPPVjyiAbj7PnL877Cym5VdG','backer','active',NULL,NULL,'08982395496',NULL,NULL,'2025-12-12 00:46:23','2025-12-12 00:46:23'),(10,'miko','miko@gmail.com',NULL,'$2y$12$Rt/NUDIbvWnSKxNpGPAReecNm9RYV75KhEOec2dSFTMmdvoehuHnS','creator','active',NULL,NULL,'08123456789',NULL,NULL,'2025-12-12 02:07:24','2025-12-12 02:07:24'),(11,'marcel','marcel@gmail.com',NULL,'$2y$12$Fzru9MArIktATrGRs/G/buHlgZ6alA9FPionqvB8DpMRXZeYSIb6S','backer','active',NULL,NULL,'08222222222',NULL,NULL,'2025-12-12 02:10:32','2025-12-12 02:10:32'),(12,'creator3','creator3@gmail.com',NULL,'$2y$12$Vc.PJfsyKl4TnhjVaVqbWeHxMRI/VjcLlPHuGoqRgCHyTio17nRf6','creator','active',NULL,NULL,'629876121',NULL,NULL,'2025-12-12 14:18:32','2025-12-12 17:18:35'),(13,'Miko p gul','miko11@gmail.com',NULL,'$2y$12$jPSKHE426sFbD8DxTja5ZuTEcwt7uTWwePKa2.W7D65HF3dYtqUjm','backer','active',NULL,NULL,'0812345678',NULL,NULL,'2025-12-17 02:28:54','2025-12-17 02:28:54'),(14,'budi','budiman@gmail.com',NULL,'$2y$12$JMQYjNe3vPVU/1tOtNwlMuysD1bE1XGMcABx9solWnIrs5M8oOszC','creator','active',NULL,NULL,'08123456789',NULL,NULL,'2026-01-01 01:53:14','2026-01-01 01:53:14'),(15,'test','test@danakarya.com',NULL,'$2y$12$5Yd5orHQT8lkG4VGYjqgoeJDI2GE8Vq.QSZN0ps70uS00UWEsa152','creator','active',NULL,NULL,'08123456789',NULL,NULL,'2026-01-01 02:25:13','2026-01-01 02:25:13'),(16,'Banana','banana@gmail.com',NULL,'$2y$12$5VpD5CpGE6Tk2NN8hX41TOfW/h61gd43peBN06QauZydFrA0cOPb.','backer','active',NULL,NULL,'1234567890',NULL,NULL,'2026-01-02 08:30:51','2026-01-02 08:30:51'),(17,'Dio','dio@gmail.com',NULL,'$2y$12$c55iFfYbQ8f..LIrUt/e9uKgk.rLnWKs7VJXat4jy.UTZSOno0ujS','backer','active',NULL,NULL,'+62888888888',NULL,NULL,'2026-01-15 06:20:20','2026-01-15 06:20:20'),(18,'Dioo','dioo@gmail.com',NULL,'$2y$12$LjzTBjum7qsCuzyjWzoIueAQ5cizieUbM6ZQ786ys5j07MbFMKURq','backer','active',NULL,NULL,'08888888888',NULL,NULL,'2026-01-15 18:03:34','2026-01-15 18:03:34'),(19,'diooo','diooo@gmail.com',NULL,'$2y$12$xU4VrIkjS5DL/WKKH5IQb.e40eJFFi0m.gR6.Y9P2qT/HZF.bX.GW','creator','active',NULL,NULL,'08999999999',NULL,NULL,'2026-01-17 15:44:06','2026-01-17 15:44:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-18 17:48:01
