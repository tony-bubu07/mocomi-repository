-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023-08-24 01:46:58
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mocomi3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE `books` (
  `id` int(35) NOT NULL COMMENT '本のID',
  `title` varchar(255) NOT NULL COMMENT '本のタイトル',
  `cover_path` varchar(255) NOT NULL COMMENT '本の表紙',
  `author` varchar(255) NOT NULL COMMENT '本の作者',
  `price` int(35) NOT NULL COMMENT '本の価格',
  `book_kinds_id` int(35) NOT NULL COMMENT '本の分野別ID',
  `book_evaluation_id` int(35) DEFAULT NULL COMMENT '本の評価ID',
  `created_at` datetime NOT NULL COMMENT '本の登録日',
  `updated_at` datetime NOT NULL COMMENT '本の更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='本の情報';

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `title`, `cover_path`, `author`, `price`, `book_kinds_id`, `book_evaluation_id`, `created_at`, `updated_at`) VALUES
(27, '川の流れ', 'storage/cover_image/vE5EbkzFw48UlDbWM4hCl5MqE4fQw9RdkNNMOJJf.jpg', 'KAWA', 490, 1, NULL, '2023-08-19 14:54:33', '2023-08-19 14:54:33'),
(28, 'あまのがわ', 'storage/cover_image/enVkCiWwRsz5oPWZxyQp7A6CLLL9f8hcqCHQnA3V.jpg', 'あまの', 470, 2, NULL, '2023-08-19 15:18:45', '2023-08-19 15:18:45'),
(29, '冬の森', 'storage/cover_image/6QVIjY2zNCcUoN1CCFPRXQAibaJkans5Ni5vEdXV.jpg', 'ふゆの', 510, 2, NULL, '2023-08-19 15:20:13', '2023-08-19 15:20:13'),
(30, 'わたしだけ', 'storage/cover_image/sLLGn9MZKCGour6aWmxMdmnKIzEvyebG5QyHJ3py.jpg', 'わたわた', 490, 1, NULL, '2023-08-19 15:27:56', '2023-08-19 15:27:56'),
(31, 'けしき', 'storage/cover_image/opcYaj4UmUMr7B4bRnoRguZhBHXcCKfUltDnmHFc.jpg', 'KESHI', 530, 1, NULL, '2023-08-19 15:29:13', '2023-08-19 15:29:13'),
(32, 'かえりみち', 'storage/cover_image/idDjX8pp3UwlV8pAFQi7Qb0AJTECwPPn3aMyguH8.jpg', 'Kae', 540, 1, NULL, '2023-08-19 15:29:59', '2023-08-19 15:29:59'),
(33, '星空の夜にあの木の下で', 'storage/cover_image/oKJq3mS8PZMmIXPLRYH5qrXs6St5qBtuE9Ktd9ko.jpg', 'ほしの', 450, 2, NULL, '2023-08-19 15:31:22', '2023-08-19 15:31:22'),
(34, 'あの神社の名前をまだ知らない', 'storage/cover_image/3Vwia8HOGqQUX6c7iEqEsm52b1kCnM2951BiIFu2.jpg', 'くらの', 590, 2, NULL, '2023-08-19 15:32:23', '2023-08-19 15:32:23'),
(35, '国境の夕暮れ', 'storage/cover_image/lyH4GxYh7ytY509aeivjJ9KT5c0lA8Rtv6OCWEEv.jpg', 'こくあ', 610, 2, NULL, '2023-08-19 15:33:04', '2023-08-19 15:33:04'),
(36, '並木道でまた会おう', 'storage/cover_image/neIYcpqzHB8slRebcjFG2OkLCyAzZz0xkjrSnhFV.jpg', 'なみき', 580, 2, NULL, '2023-08-19 15:33:43', '2023-08-19 15:33:43'),
(37, 'この先にあるのは楽園か', 'storage/cover_image/MW4PAwW1nAdNJ59z3G4lbVl1S0oQdjGlgWm6bvFp.jpg', 'くの70', 650, 1, NULL, '2023-08-19 15:34:34', '2023-08-19 15:34:34'),
(38, '夏に戻る', 'storage/cover_image/fufMLRRgNn9aNvhkxA1NsZwZUvaPbB7qSOUolcPh.jpg', 'なつみ', 610, 1, NULL, '2023-08-19 15:35:24', '2023-08-19 15:35:24'),
(39, '線香花火', 'storage/cover_image/nRj8fpCRfICAFJTlev9LboERTqnzWfSkwFqYNrqv.jpg', 'せん', 680, 1, NULL, '2023-08-19 15:35:57', '2023-08-19 15:35:57'),
(40, 'きれいな青空', 'storage/cover_image/no6K9aZlpmlbhTeqL4RovJvLBjm9z6f2i0FQ8Mbq.jpg', 'きらり', 670, 1, NULL, '2023-08-19 15:47:34', '2023-08-19 15:47:34'),
(41, '線路の先', 'storage/cover_image/tLJGkU5840lBz4D3bnzBSa4yqSdF3W8yBjrcaUZi.png', 'さんろう', 780, 2, NULL, '2023-08-19 15:48:42', '2023-08-19 15:48:42'),
(42, '故郷の電車', 'storage/cover_image/bLlxcYhzOBjmWaTs9Aq5w93x9uv6CfkMN3A7TwZX.jpg', 'こきょ', 680, 2, NULL, '2023-08-19 15:49:31', '2023-08-19 15:49:31'),
(43, '夕暮れの波の音', 'storage/cover_image/wsnvfVTxn0KFGbthbe1AKpAbRbQSHF65znQqw2h4.jpg', 'ゆうぐ', 710, 1, NULL, '2023-08-19 15:50:11', '2023-08-19 15:50:11'),
(44, '駅', 'storage/cover_image/ORt1nJEJvwDAfulegUtsR6ZsBJO1n7dwKtMbQdLH.jpg', 'そのかみる', 660, 2, NULL, '2023-08-19 15:50:52', '2023-08-19 15:50:52'),
(45, '塩湖', 'storage/cover_image/nZ0fwtSvRVz0KDAl1AWxknl0jPmoLLK03qEvJoMN.jpg', 'えん', 720, 1, NULL, '2023-08-19 15:51:21', '2023-08-19 15:51:21'),
(46, '花束', 'storage/cover_image/rvGeEpGpGCIMsMI6iBzzOECTcy3F1J5P2BncpgJz.jpg', 'たばたば', 640, 2, NULL, '2023-08-19 15:51:50', '2023-08-19 15:51:50'),
(47, '夏の島', 'storage/cover_image/hNU51DWdK2RSxe4SCgXK3diPFUOslS2FvUF2Qmdk.jpg', 'しまるまん', 670, 1, NULL, '2023-08-19 15:52:41', '2023-08-19 15:52:41'),
(48, '外国の街', 'storage/cover_image/VyDKJQg3p8Me00gyYSnbYEbPwki3XpuUZeOkkzkN.jpg', 'がいが', 550, 2, NULL, '2023-08-19 15:53:22', '2023-08-19 15:53:22'),
(49, '横断2000', 'storage/cover_image/0O7wYkzmuZ7z1Sv1TmkANqzMKXo8fPoWlx9vMMc9.jpg', 'くまの50', 460, 1, NULL, '2023-08-19 15:54:47', '2023-08-19 15:54:47'),
(50, '夕暮れの駅', 'storage/cover_image/vSqR5F4yRULuEZHgTZ7MImQqRNywFqWHLU9zkp8f.png', 'ゆうぐな', 630, 2, NULL, '2023-08-19 15:55:33', '2023-08-19 15:55:33'),
(51, 'いつもいってたあの丘で', 'storage/cover_image/v76lXr75OcPwb3lMQF9V2xfESKi3kmYcpdZG0suj.jpg', 'いつ', 690, 1, NULL, '2023-08-19 15:56:40', '2023-08-19 15:56:40'),
(52, '天空のまち', 'storage/cover_image/KfJZ0EGxpKpVJWmRpJNy01BqNxkqEyZTso96Dbx1.jpg', 'てんく', 740, 2, NULL, '2023-08-19 15:57:23', '2023-08-19 15:57:23'),
(53, 'symmetry', 'storage/cover_image/4OoDVA6ZlLlrFkhTWdGsQp8dX4PjBpINq2NSmUB7.jpg', 'しんめ', 750, 1, NULL, '2023-08-19 15:58:53', '2023-08-19 15:58:53'),
(54, 'わかれみち', 'storage/cover_image/wLiioyJFDwcqjXyweHBFfseREZuufohmOwRDLeFU.png', 'わかすの', 790, 2, NULL, '2023-08-19 15:59:43', '2023-08-19 15:59:43'),
(55, '海中回廊', 'storage/cover_image/m5NKsD0h6LEaIUsAacfqSpPygOYocGNObpdyA9gz.jpg', 'かのみらの', 780, 1, NULL, '2023-08-19 16:00:37', '2023-08-19 16:00:37');

-- --------------------------------------------------------

--
-- テーブルの構造 `bookshelfs`
--

CREATE TABLE `bookshelfs` (
  `id` int(35) NOT NULL COMMENT '本棚ID',
  `user_id` int(35) NOT NULL COMMENT 'ユーザーID',
  `book_id` int(35) NOT NULL COMMENT '本ID',
  `created_at` datetime NOT NULL COMMENT '本棚への追加日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='本棚の情報';

--
-- テーブルのデータのダンプ `bookshelfs`
--

INSERT INTO `bookshelfs` (`id`, `user_id`, `book_id`, `created_at`) VALUES
(1, 30, 55, '2023-08-20 18:25:28'),
(2, 30, 53, '2023-08-20 23:03:32'),
(3, 30, 54, '2023-08-21 14:03:15'),
(4, 36, 46, '2023-08-21 17:42:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `id` int(35) NOT NULL COMMENT 'カートID',
  `user_id` int(35) NOT NULL COMMENT 'ユーザーID',
  `book_id` int(35) NOT NULL COMMENT '本ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='カートの情報';

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_08_010537_create_member_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2023_08_09_035206_create_admins_table', 4),
(8, '2023_08_09_072723_create_admin_users_table', 5),
(9, '2023_08_10_093222_add_column_role_users_table', 6),
(10, '2023_08_19_122124_add_remember_token_to_users_table', 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('kamimura@co.jp', '$2y$10$HKEi8KA6O8I2n5XXyy.O1uLBFjoHOEQjgPfn6apATMbmOFlv0LLOm', '2023-08-21 09:56:59'),
('tony.tony.chopper.butadori@gmail.co.jp', '$2y$10$O6L6ylgMlE5nrJAhw.VWJOAeFowQJ/q9yo9atoEXt0WcPqn7Pom/C', '2023-08-16 14:56:44');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(35) UNSIGNED NOT NULL COMMENT 'ユーザーID',
  `name` varchar(255) NOT NULL COMMENT 'ユーザーネーム',
  `email` varchar(255) NOT NULL COMMENT 'ユーザーアドレス',
  `password` varchar(255) NOT NULL COMMENT 'ユーザーパスワード',
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'ユーザーの種類',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'ユーザーイメージ（アイコン）',
  `browsing_history_id` int(35) DEFAULT NULL COMMENT '本の評価ID',
  `favorite_id` int(35) DEFAULT NULL COMMENT '本のお気にいりID',
  `bookshelf_id` int(35) DEFAULT NULL COMMENT '本棚のID',
  `purchase_history_id` int(35) DEFAULT NULL COMMENT '本の購入履歴',
  `cart_id` int(35) DEFAULT NULL COMMENT 'カートID',
  `created_at` datetime NOT NULL COMMENT 'アカウント作成日',
  `updated_at` datetime NOT NULL COMMENT 'アカウント更新日',
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `image_path`, `browsing_history_id`, `favorite_id`, `bookshelf_id`, `purchase_history_id`, `cart_id`, `created_at`, `updated_at`, `remember_token`) VALUES
(29, 'ぶぶたん', 'bubutann@ne.jp', '$2y$10$9aQQ7xPi6UjnFcudxLdXAu2SoSnadeXBSR.QegzdfBWPLOkBrJe7e', 1, 'storage/sample/O5NsdvVsJ4IKrDzwuCbZh0hJAnUV5Ut4xTh0Vddr.jpg', NULL, NULL, NULL, NULL, NULL, '2023-08-10 17:15:48', '2023-08-18 15:01:07', NULL),
(30, 'きのたん', 'kinotann@ne.jp', '$2y$10$lPcMI38E/CzQyVXTWzUY7OCzPtyDcS6aAbuGGWI97l/.jaVxhlXKa', 2, 'storage/sample/pJOc2tdISxSFMbGn4gZGjFke1VudQX7Hn9W94gVj.jpg', NULL, NULL, NULL, NULL, NULL, '2023-08-10 18:13:32', '2023-08-23 23:13:54', 'lfuQW73fD1afmA1e5IvqeXpmP3go9kTcjpZCgz2pyJwBll5jFlrn6dAK8zb1'),
(32, '神村', 'kamimura@co.jp', '$2y$10$28EZ229trrEHqLfyOqHiTeCKOOPFTv0UjYzydKmYHn7ovU7DVOvwe', 0, 'storage/sample/34b31VkMmOihNHKROCDjoPDExGJBr5ot2OYZPrLc.png', NULL, NULL, NULL, NULL, NULL, '2023-08-15 17:57:42', '2023-08-15 18:39:04', NULL),
(34, '園山', 'sonoyama@co.jp', '$2y$10$Y5w19jZ0nAa5Ujv.egMazeX0CX/E5yFENRv8QuOZyo9ggYio0NxKq', 0, 'storage/sample/mZZAoVY4gE5SuUeu8hXjyukjEQwg90yKTkw4xMll.png', NULL, NULL, NULL, NULL, NULL, '2023-08-17 02:08:18', '2023-08-17 02:09:07', NULL),
(35, '篠原', 'shinohara@co.jp', '$2y$10$nVd9lZlqDd54NAXKqO8uluvfdjDy9nQpbf8tzr.0zB7iWFHsysx3S', 1, 'storage/sample/BvHQ7CWaGy32psLvBWY30v6ZKXp30W0Tt5q275CB.jpg', NULL, NULL, NULL, NULL, NULL, '2023-08-17 14:15:06', '2023-08-18 10:45:39', NULL),
(36, '堤玲己', 'tony.tony.chopper.butadori@gmail.com', '$2y$10$cEeIabGvByXbAeb7fsEALuqxWgfPSDGO0UEe4ibHnVWmUZTviXztG', 0, 'storage/sample/qBRtNdT0XTSC0FrvVVDuHbIWcodeo9RbPXPDdUCX.jpg', NULL, NULL, NULL, NULL, NULL, '2023-08-21 13:58:08', '2023-08-22 01:58:22', 'P1ppBPGJTh5Q4SAu6bgJWBCdzxM8gHVFy6NCWUzingWHGUzTr0f4zj91l5aV'),
(37, 'GeneralUser', 'General@co.jp', '$2y$10$4TWSpwO/1Pf8HRCyl8wKe.3bf6HwlxDzbxTwT/LptN39uJFvSK4/m', 0, 'storage/sample/jLWHPAszh7neNdA5auKJYCeKFe7iAHOMfCHwyP5a.png', NULL, NULL, NULL, NULL, NULL, '2023-08-23 14:45:11', '2023-08-24 00:53:55', NULL),
(38, 'PostUser', 'Post@co.jp', '$2y$10$N1C0JFu4swVXiWzSRI1NF..dJEZUCSR/6Mg/1hbXtIsKahUIlCPXa', 1, 'storage/sample/SVKp2Q4YNSx2i3i8NMEtGjwDS6G5XTRSJ7swB4zr.png', NULL, NULL, NULL, NULL, NULL, '2023-08-23 15:07:06', '2023-08-24 00:51:12', NULL),
(39, 'AdministratorUser', 'Admin@co.jp', '$2y$10$SKbJYHWBGdMi88.IC1RiouvQrkN.EPC7o2h2rqtmfePWTwmN8A2O6', 2, 'storage/sample/3CkEEmLIutXd3Lg0I5SWNqJaaY2iE2uca3ESq1Ej.png', NULL, NULL, NULL, NULL, NULL, '2023-08-24 00:04:04', '2023-08-24 00:07:23', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- テーブルのインデックス `bookshelfs`
--
ALTER TABLE `bookshelfs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`book_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `browsing_history_id` (`browsing_history_id`,`favorite_id`,`bookshelf_id`,`purchase_history_id`,`cart_id`),
  ADD KEY `index_role` (`role`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT COMMENT '本のID', AUTO_INCREMENT=56;

--
-- テーブルの AUTO_INCREMENT `bookshelfs`
--
ALTER TABLE `bookshelfs`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT COMMENT '本棚ID', AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT COMMENT 'カートID';

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(35) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ユーザーID', AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
