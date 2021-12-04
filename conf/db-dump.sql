--
-- Table structure for table `emails_changes`
--

DROP TABLE IF EXISTS `emails_changes`;
CREATE TABLE `emails_changes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `new_email` varchar(64) NOT NULL,
  `requested_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `emails_changes`
--

LOCK TABLES `emails_changes` WRITE;
/*!40000 ALTER TABLE `emails_changes` DISABLE KEYS */;
INSERT INTO `emails_changes` VALUES (3,14,'8KSTaCcmIERjuRGm','testchng@mail1.com','2021-10-22 11:21:03'),(4,1,'2NKEpvrMZKgpnoSL','testchng@mail2.com','2021-10-22 11:21:04');
/*!40000 ALTER TABLE `emails_changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails_verifications`
--

DROP TABLE IF EXISTS `emails_verifications`;
CREATE TABLE `emails_verifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `emails_verifications`
--

LOCK TABLES `emails_verifications` WRITE;
/*!40000 ALTER TABLE `emails_verifications` DISABLE KEYS */;
INSERT INTO `emails_verifications` VALUES (3,3,'testemail@tochka.ru','1YNCaMuTI4ckamxO'),(4,4,'testemail1@tochka.ru','J1kiRaatsDsxr7l7'),(5,5,'email1@yandex.ru','Eo9iE5k0i8OIDUjc'),(6,6,'ema3432432423432234234324233243243242343243223il1@yandex.ru','9IIt7qGlgE0XoG53'),(7,7,'ema34324324234322342343242332432432423432432f3il1@yandex.ru','ziBrLKIKVBRvsvrn'),(8,8,'em34321@yandex.ru','O58Y7JYI6ZbXIRb6'),(9,9,'dfd@yandex.ru','ezLv6Ehp0Rbec11b'),(10,10,'emasil5@yandex.ru','A4KcV62kPacb9bMu'),(11,11,'emaisl3s@yandex.ru','XoFZtz47NkgHzjWW'),(12,12,'emaxzcil1@yandex.ru','UGZZ5jEgbL5Yto5V');
/*!40000 ALTER TABLE `emails_verifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `full_links`
--

DROP TABLE IF EXISTS `full_links`;
CREATE TABLE `full_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_in_list` int(11) NOT NULL,
  `href` varchar(2048) NOT NULL,
  `protocol` varchar(16) NOT NULL,
  `origin` varchar(256) NOT NULL,
  `host` varchar(256) NOT NULL,
  `hostname` varchar(512) NOT NULL,
  `pathname` varchar(512) NOT NULL,
  `search` varchar(512) DEFAULT NULL,
  `hash` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `full_links`
--

LOCK TABLES `full_links` WRITE;
/*!40000 ALTER TABLE `full_links` DISABLE KEYS */;
INSERT INTO `full_links` VALUES (5,5,'https://vk.com/im?sel=1','https:','https://vk.com','vk.com','vk.com','/im','?sel=1',NULL),(10,10,'https://www.sports.ru/','https:','https://www.sports.ru','www.sports.ru','www.sports.ru','/','',NULL),(11,11,'https://vk.com/im','https:','https://vk.com','vk.com','vk.com','/im','',NULL),(12,12,'https://github.com/russsiq/laravel-docs-ru','https:','https://github.com','github.com','github.com','/russsiq/laravel-docs-ru','',NULL),(13,13,'https://github.com/russsiq/laravel-docs-ru','https:','https://github.com','github.com','github.com','/russsiq/laravel-docs-ru','',NULL),(16,16,'https://yandex.ru/news/?utm_source=main_stripe_big','https:','https://yandex.ru','yandex.ru','yandex.ru','/news/','?utm_source=main_stripe_big',NULL),(17,17,'http://localhost/gqgS17','http:','http://localhost','localhost','localhost','/gqgS17','',NULL),(18,18,'http://localhost/gqgS17','http:','http://localhost','localhost','localhost','/gqgS17','',NULL),(19,19,'http://localhost/gqgS17','http:','http://localhost','localhost','localhost','/gqgS17','',NULL),(20,20,'http://localhost/BkPbH9','http:','http://localhost','localhost','localhost','/BkPbH9','',NULL),(21,21,'http://localhost/BkPbH9','http:','http://localhost','localhost','localhost','/BkPbH9','',NULL),(22,22,'https://www.youtube.com/','https:','https://www.youtube.com','www.youtube.com','www.youtube.com','/','',NULL),(23,23,'http://macnotes.ru/post/vhosts-apache','http:','http://macnotes.ru','macnotes.ru','macnotes.ru','/post/vhosts-apache','',NULL),(24,24,'https://yandex.ru/','https:','https://yandex.ru','yandex.ru','yandex.ru','/','',NULL),(25,25,'https://vk.com/im','https:','https://vk.com','vk.com','vk.com','/im','',NULL);
/*!40000 ALTER TABLE `full_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links_list`
--

DROP TABLE IF EXISTS `links_list`;
CREATE TABLE `links_list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `short_url` varchar(64) NOT NULL,
  `redirect_count` int(11) NOT NULL,
  `creator_ip` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` date NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `links_list`
--

LOCK TABLES `links_list` WRITE;
/*!40000 ALTER TABLE `links_list` DISABLE KEYS */;
INSERT INTO `links_list` VALUES (5,'https://vk.com/im?sel=1','MFFGDA',1,2130706433,NULL,1,'2021-10-16 17:04:33','2021-10-16 17:04:41','2021-10-26'),(10,'https://www.sports.ru/','mm5MkB',2,2130706433,1,1,'2021-10-18 16:06:22','2021-10-20 05:15:58','2021-11-19'),(11,'https://vk.com/im','Z4majM',1,2130706433,NULL,1,'2021-10-19 13:31:49','2021-10-20 04:57:58','2021-10-29'),(12,'https://github.com/russsiq/laravel-docs-ru','9qjL7K',0,2130706433,NULL,1,'2021-10-19 13:40:40','2021-10-19 13:40:40','2021-10-29'),(13,'https://github.com/russsiq/laravel-docs-ru','BkPbH9',0,2130706433,NULL,1,'2021-10-19 13:54:22','2021-10-19 13:54:22','2021-10-29'),(16,'https://yandex.ru/news/?utm_source=main_stripe_big','gqgS17',0,2130706433,NULL,1,'2021-10-22 08:37:47','2021-10-22 08:37:47','2021-11-01'),(17,'http://localhost/gqgS17','EtGiP7',0,2130706433,NULL,1,'2021-10-22 08:37:51','2021-10-22 08:37:51','2021-11-01'),(18,'http://localhost/gqgS17','bighZL',0,2130706433,NULL,1,'2021-10-22 08:38:18','2021-10-22 08:38:18','2021-11-01'),(19,'http://localhost/gqgS17','WW2mQ2',0,2130706433,NULL,1,'2021-10-22 08:39:47','2021-10-22 08:39:47','2021-11-01'),(20,'http://localhost/BkPbH9','mwTHQW',0,2130706433,NULL,1,'2021-10-22 08:40:50','2021-10-22 08:40:50','2021-11-01'),(21,'http://localhost/BkPbH9','lc9fI1',0,2130706433,NULL,1,'2021-10-22 08:41:17','2021-10-22 08:41:17','2021-11-01'),(22,'https://www.youtube.com/','ObXXr5',0,2130706433,NULL,1,'2021-10-22 16:45:06','2021-10-22 16:45:06','2021-11-01'),(23,'http://macnotes.ru/post/vhosts-apache','Lkz5bt',0,2130706433,NULL,1,'2021-10-23 06:15:06','2021-10-23 06:15:06','2021-11-02'),(24,'https://yandex.ru/','h1KBe7',1,0,NULL,1,'2021-10-23 06:25:47','2021-10-23 06:27:01','2021-11-02'),(25,'https://vk.com/im','4qyfin',7,0,NULL,1,'2021-10-23 06:27:18','2021-10-23 06:28:24','2021-11-02');
/*!40000 ALTER TABLE `links_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2021_10_12_181305_users',1),(3,'2021_10_15_122952_full_links',1),(4,'2021_10_15_125055_links_list',1),(5,'2021_10_16_142231_verify_emails',2),(6,'2021_10_16_143254_emails_verifications',3),(9,'2021_10_16_191635_passwords_changes',4),(10,'2021_10_17_070748_passwords_resets',4),(11,'2021_10_18_155436_emails_changes',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwords_changes`
--

DROP TABLE IF EXISTS `passwords_changes`;
CREATE TABLE `passwords_changes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `new_password` varchar(64) NOT NULL,
  `requested_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `passwords_changes`
--

LOCK TABLES `passwords_changes` WRITE;
/*!40000 ALTER TABLE `passwords_changes` DISABLE KEYS */;
INSERT INTO `passwords_changes` VALUES (4,14,'H2imsObiD4lYzaou','$2y$04$4GkLqFdVTiTnTp2FABl70.r5P0x35SXzXNYFGyo.Vv.cMgW2vjv56','2021-10-22 13:33:39');
/*!40000 ALTER TABLE `passwords_changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwords_resets`
--

DROP TABLE IF EXISTS `passwords_resets`;
CREATE TABLE `passwords_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `requested_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `passwords_resets`
--

LOCK TABLES `passwords_resets` WRITE;
/*!40000 ALTER TABLE `passwords_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `passwords_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
);

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `ip` int(10) unsigned NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'testchng@mail2.com','$2y$04$ao/F1bfZ4Ikt7I9kEbUyyuvCaCyb4NzsQPtLVagORgDaVLPxAfqRS','oXdtCPIm5dqiU9BNC446KGp4faIYIAdzAP7WCKrkJK7xLA7IRAg9r3Pqu2lK',2130706433,'2021-10-15 16:12:38','2021-10-15 13:12:08','2021-10-22 10:40:44'),(2,'gigisarri@rambler.ru','$2y$10$qt7Qn/YxcqwGGuy8aMoX2uuuWSkIJ70sxVMEvfkRjOnAl1bgLPmqq',NULL,2130706433,'2021-10-19 09:19:34','2021-10-19 06:18:48','2021-10-19 06:19:34'),(3,'testemail@tochka.ru','$2y$04$wrS.y7eLcSml.GZ49yzR0uCk0d2sZRSX2mXzLkgo1l3bBTajhr0GK',NULL,2130706433,NULL,'2021-10-19 09:36:11','2021-10-19 09:36:11'),(4,'testemail1@tochka.ru','$2y$04$0PlpcFLrz7JKYrBuMkIoUeUYu52Q9oyEV9penSzwg5KTu62fNQYry',NULL,2130706433,NULL,'2021-10-19 09:39:35','2021-10-19 09:39:35'),(5,'email1@yandex.ru','$2y$04$9uml323RhFf2bcPezbSvSupcmjWvHM784PXy7LOIi7IG//fvx2X1q',NULL,2130706433,NULL,'2021-10-19 09:50:46','2021-10-19 09:50:46'),(6,'ema3432432423432234234324233243243242343243223il1@yandex.ru','$2y$04$np/jmE0BTokD2m8L0U7fRO9jEmFEN5xn7usmpKx8Y10ha7Lq9PRkm',NULL,2130706433,NULL,'2021-10-19 09:50:46','2021-10-19 09:50:46'),(7,'ema34324324234322342343242332432432423432432f3il1@yandex.ru','$2y$10$9n5x/.mK/L8Bk8WI7AlsZ.GNtDsWUrMoM5n4YGRVrqjUcM0fSmMO.',NULL,2130706433,NULL,'2021-10-19 09:51:47','2021-10-19 09:51:47'),(8,'em34321@yandex.ru','$2y$04$RKpir9Axp6uHpJwZFPAfcOpQZBHcgi1L5KqNRPdl9mxYTb0fJE.8i',NULL,2130706433,NULL,'2021-10-19 10:16:34','2021-10-19 10:16:34'),(9,'dfd@yandex.ru','$2y$04$lWES3Odbzs3CjzJqEWIT6OR86W0uS4Z9z0e26nem/2GXUQmyM/As2',NULL,2130706433,NULL,'2021-10-19 10:16:35','2021-10-19 10:16:35'),(10,'emasil5@yandex.ru','$2y$04$kzGqmyxvqnyla6v.VnpoUuQS44yX.I2KZHGw.pbk.EcP6k1H/1kxq',NULL,2130706433,NULL,'2021-10-19 10:16:35','2021-10-19 10:16:35'),(11,'emaisl3s@yandex.ru','$2y$04$fSvM5/KpcY7OSPHCiCTFwOjiRY8jf9Um5QM5ewfTYYv4sMKPyGfAW',NULL,2130706433,NULL,'2021-10-19 10:16:35','2021-10-19 10:16:35'),(12,'emaxzcil1@yandex.ru','$2y$04$tLjMstngn1AJQxTq2bzsaOQex7Sjwmu8EoF0RrzK5Enxkc18Oe6b6',NULL,2130706433,NULL,'2021-10-19 10:16:35','2021-10-19 10:16:35'),(13,'xcvc4@yandex.ru','$2y$04$ZENphGpr6K/VqiR66ffBYuEP9hmf/H22yvcV5EqA198.rB2C1IH8e',NULL,2130706433,NULL,'2021-10-19 10:24:57','2021-10-20 12:37:08'),(14,'testchng@mail1.com','$2y$04$cy8FQja4zGU2EiCbuShWeeI.xSQ7PcpqJ4NJZNmSdZHs.OjuxGpcS',NULL,2130706433,NULL,'2021-10-19 10:34:30','2021-10-22 07:22:42'),(15,'ddddfd@dfdf.ru','$2y$10$CY9VPqqw5lHsVxtK7ROA0u/GxCmgN9oS8Zmx9N9Kz6qfYIRONh9Qy',NULL,2130706433,'2021-10-22 10:28:04','2021-10-22 07:27:57','2021-10-22 07:28:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;