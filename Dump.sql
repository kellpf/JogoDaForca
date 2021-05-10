-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.21 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para hangman_game
CREATE DATABASE IF NOT EXISTS `hangman_game` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hangman_game`;

-- Copiando estrutura para tabela hangman_game.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.group_of_words
CREATE TABLE IF NOT EXISTS `group_of_words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.group_of_words: 12 rows
/*!40000 ALTER TABLE `group_of_words` DISABLE KEYS */;
INSERT INTO `group_of_words` (`id`, `group`, `created_at`, `updated_at`) VALUES
	(1, 'Nomes Próprios', '2021-04-17 18:52:23', '2021-04-17 18:52:24'),
	(2, 'Países', '2021-04-17 18:52:37', '2021-04-17 18:52:38'),
	(3, 'Animais', '2021-04-17 18:52:37', '2021-04-17 18:52:38'),
	(4, 'Frutas', '2021-04-17 18:52:37', '2021-04-17 18:52:38'),
	(6, 'Bandas', '2021-05-09 20:30:24', '2021-05-09 20:30:25'),
	(11, 'Mitologia', NULL, NULL);
/*!40000 ALTER TABLE `group_of_words` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.migrations: 11 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2021_04_11_204938_create_sessions_table', 1),
	(7, '2021_04_11_210218_create_roles_table', 1),
	(8, '2021_04_11_211531_create_players_table', 1),
	(9, '2021_04_11_213247_create_group_of_words_table', 2),
	(10, '2021_04_11_213300_create_words_table', 2),
	(11, '2021_04_11_213321_create_tips_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.personal_access_tokens: 0 rows
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.players
CREATE TABLE IF NOT EXISTS `players` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_tips` smallint NOT NULL,
  `group_of_words_id` bigint DEFAULT NULL,
  `punctuation` smallint NOT NULL,
  `roles_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.players: 122 rows
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.players_words
CREATE TABLE IF NOT EXISTS `players_words` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `player_id` bigint DEFAULT NULL,
  `word_id` bigint DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `L1` char(1) DEFAULT NULL,
  `L2` char(1) DEFAULT NULL,
  `L3` char(1) DEFAULT NULL,
  `L4` char(1) DEFAULT NULL,
  `L5` char(1) DEFAULT NULL,
  `L6` char(1) DEFAULT NULL,
  `L7` char(1) DEFAULT NULL,
  `L8` char(1) DEFAULT NULL,
  `L9` char(1) DEFAULT NULL,
  `L10` char(1) DEFAULT NULL,
  `L11` char(1) DEFAULT NULL,
  `L12` char(1) DEFAULT NULL,
  `L13` char(1) DEFAULT NULL,
  `L14` char(1) DEFAULT NULL,
  `L15` char(1) DEFAULT NULL,
  `L16` char(1) DEFAULT NULL,
  `L17` char(1) DEFAULT NULL,
  `L18` char(1) DEFAULT NULL,
  `L19` char(1) DEFAULT NULL,
  `L20` char(1) DEFAULT NULL,
  `L21` char(1) DEFAULT NULL,
  `L22` char(1) DEFAULT NULL,
  `L23` char(1) DEFAULT NULL,
  `L24` char(1) DEFAULT NULL,
  `L25` char(1) DEFAULT NULL,
  `L26` char(1) DEFAULT NULL,
  `L27` char(1) DEFAULT NULL,
  `L28` char(1) DEFAULT NULL,
  `L29` char(1) DEFAULT NULL,
  `L30` char(1) DEFAULT NULL,
  `L31` char(1) DEFAULT NULL,
  `L32` char(1) DEFAULT NULL,
  `L33` char(1) DEFAULT NULL,
  `L34` char(1) DEFAULT NULL,
  `L35` char(1) DEFAULT NULL,
  `L36` char(1) DEFAULT NULL,
  `L37` char(1) DEFAULT NULL,
  `L38` char(1) DEFAULT NULL,
  `L39` char(1) DEFAULT NULL,
  `L40` char(1) DEFAULT NULL,
  `L41` char(1) DEFAULT NULL,
  `L42` char(1) DEFAULT NULL,
  `L43` char(1) DEFAULT NULL,
  `L44` char(1) DEFAULT NULL,
  `L45` char(1) DEFAULT NULL,
  `L46` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK1_player_word_id` (`player_id`),
  KEY `FK2_player_word_id` (`word_id`)
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela hangman_game.players_words: 158 rows
/*!40000 ALTER TABLE `players_words` DISABLE KEYS */;
/*!40000 ALTER TABLE `players_words` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.roles: 2 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2021-04-11 18:19:07', '2021-04-11 18:19:08'),
	(2, 'Player', '2021-04-18 13:06:34', '2021-04-18 13:06:35');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.sessions: 1 rows
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('lnddZmxkcQ4acEHXkNlMnZE7Wp6uyc76g1CgaDpr', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiTXh0ZWNFa2dRY1dEdEh5RmZ2RnR5UDB1dEo0V3ZhWTh1OHFOTjdraiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9nYW1lL3N0YXJ0LzE2Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDlmS2NRVnJEZzV4aGR0dnZlSDAuLmV4NGpnVy9KTmNhUmFuSEdjSy9CSTMycXZucWQzRlZXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5ZktjUVZyRGc1eGhkdHZ2ZUgwLi5leDRqZ1cvSk5jYVJhbkhHY0svQkkzMnF2bnFkM0ZWVyI7czo4OiJwbGF5ZXJJZCI7czoyOiIxNiI7czo4OiJuaWNrTmFtZSI7czo3OiJwbGF5ZXI5Ijt9', 1618791583);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.tips
CREATE TABLE IF NOT EXISTS `tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.tips: 5 rows
/*!40000 ALTER TABLE `tips` DISABLE KEYS */;
INSERT INTO `tips` (`id`, `tip`, `word_id`, `created_at`, `updated_at`) VALUES
	(1, 'Princesa do Brasil', 1, NULL, NULL),
	(2, 'Maior escritor brasileiro', 9, NULL, NULL),
	(3, 'É um país da Europa', 2, NULL, NULL),
	(4, 'É uma fruta', 4, NULL, NULL),
	(5, 'Tem pés diferentes', 12, NULL, NULL),
	(6, 'Morava em um labirinto', 13, NULL, NULL),
	(7, 'Não tem uma perna', 14, NULL, NULL),
	(8, 'Banda beijo', 15, NULL, NULL),
	(9, 'Felino doméstico', 16, NULL, NULL),
	(10, 'É azedo e  vermelho', 17, NULL, NULL),
	(11, 'fsfsfs', 18, NULL, NULL);
/*!40000 ALTER TABLE `tips` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `roles_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', 'admin@jogodaforca.com', NULL, '$2y$10$3F74jzK/ABNROPk9LxFXTunQC9xLmvUs6Mrd2i7lmHEZlFY90YRiS', NULL, NULL, 'SObq8qpjc5yylvbH9qGXagL5mRfMFmggcHzgxPa8nxlgtraveHVT9BxxmWjf', 1, NULL, '2021-04-11 21:27:46', '2021-04-11 21:27:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela hangman_game.words
CREATE TABLE IF NOT EXISTS `words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `word_tip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela hangman_game.words: 12 rows
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` (`id`, `word`, `group_id`, `word_tip`, `created_at`, `updated_at`) VALUES
	(1, 'Isabel', 1, 'Nome de princesa', '2021-04-17 18:53:15', '2021-04-18 17:43:16'),
	(2, 'Alemanha', 2, 'É um país da Europa', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(3, 'Cachorro', 3, 'Animal de estimação', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(5, 'Elefante', 3, 'É um animal grande', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(7, 'Maça', 4, 'Fruta Vermelha', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(8, 'Leão', 3, 'É um felino', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(9, 'Machado', 1, 'Escritor brasileiro', '2021-04-17 18:53:15', '2021-04-18 17:43:16'),
	(10, 'Uruguai', 2, 'É um país da Sul Americano', '2021-04-17 18:53:15', '2021-04-18 17:44:16'),
	(11, 'Arthur', 1, 'Nome de rei', '2021-04-17 18:53:15', '2021-04-18 17:43:16'),
	(12, 'Curupira', 11, 'Tem pés diferentes', NULL, NULL),
	(13, 'Minotauro', 1, 'Morava em um labirinto', NULL, NULL),
	(14, 'Saci', 1, 'Não tem uma perna', NULL, NULL),
	(15, 'Kiss', 6, 'Banda beijo', NULL, NULL),
	(16, 'Gato', 3, 'Felino doméstico', NULL, NULL),
	(17, 'Morango', 4, 'É azedo e  vermelho', NULL, NULL);
/*!40000 ALTER TABLE `words` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
