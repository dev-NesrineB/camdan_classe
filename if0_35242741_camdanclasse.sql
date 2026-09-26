-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql307.byetcluster.com
-- Généré le :  mer. 18 oct. 2023 à 18:42
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_35242741_camdanclasse`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `size_selected` varchar(80) NOT NULL,
  `colored` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`, `size_selected`, `colored`) VALUES
(123, 0, 42, 'Chaussure italien', 10000, 1, 'IMG-322fb928cac59bdc7a5aa04d03f8f8d5-V.jpg', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`) VALUES
(6, 'tshirt', 'T-shirt', 'homeee33.png'),
(7, 'srawal', 'seawal', 'homeee33.png');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(100) NOT NULL,
  `wilaya` varchar(100) NOT NULL,
  `domicile` int(10) NOT NULL,
  `bureau` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `wilaya`, `domicile`, `bureau`) VALUES
(24, 'oueragla', 1000, 800),
(25, 'Alger', 400, 600),
(26, 'Oran', 800, 1000),
(27, 'Anaba', 900, 1200);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `size1` varchar(60) NOT NULL,
  `size2` varchar(60) NOT NULL,
  `size3` varchar(60) NOT NULL,
  `size4` varchar(60) NOT NULL,
  `size5` varchar(60) NOT NULL,
  `size6` varchar(60) NOT NULL,
  `color1` varchar(60) NOT NULL,
  `color2` varchar(60) NOT NULL,
  `category_id` int(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color3` varchar(60) NOT NULL,
  `color4` varchar(60) NOT NULL,
  `color5` varchar(60) NOT NULL,
  `color6` varchar(60) NOT NULL,
  `color7` varchar(255) NOT NULL,
  `color8` varchar(255) NOT NULL,
  `color9` varchar(255) NOT NULL,
  `color10` varchar(255) NOT NULL,
  `color11` varchar(255) NOT NULL,
  `color12` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`, `size1`, `size2`, `size3`, `size4`, `size5`, `size6`, `color1`, `color2`, `category_id`, `slug`, `color3`, `color4`, `color5`, `color6`, `color7`, `color8`, `color9`, `color10`, `color11`, `color12`) VALUES
(38, 'Chaussure ', 'Ø­Ø°Ø§Ø¡ Ø±Ø³Ù…ÙŠ ÙƒÙ„Ø§Ø³ÙŠÙƒÙŠ Ø§ÙŠØ·Ø§Ù„ÙŠ Ù„ÙˆÙ† Ø¨Ù†ÙŠ ØºØ§Ù…Ù‚  Ùˆ ÙŠÙˆØ¬Ø¯ Ù…Ù†Ù‡ Ø§Ù„Ø±Ù…Ø§Ø¯ÙŠ Ø¬Ù„Ø¯ Ø·Ø¨ÙŠØ¹ÙŠ Ø¬Ø¯ÙŠØ¯ØŒ Ø£Ø­Ø°ÙŠØ© Ø±Ø³Ù…ÙŠØ© Ù…ÙˆÙƒØ§Ø³ÙŠÙ†ØŒ Ø£Ù†Ø§Ù‚Ø© Ø¨Ø±Ø§Ø­Ø© Ù…Ø·Ù„Ù‚Ø©ØŒ Ø­Ø°Ø§Ø¡ Ø·Ø¨ÙŠ Ø¨ÙØ±Ø´ Ø®Ø§Øµ. Ù„Ù„ØªØ´ÙƒÙ„ Ø¨Ø´ÙƒÙ„ Ø¨Ø§Ø·Ù† Ø§Ù„Ù‚Ø¯Ù… Ù„ØªÙˆÙÙŠØ± Ø£ÙƒØ¨Ø± Ù‚Ø¯Ø± Ù…Ù† Ø§Ù„Ø±Ø§Ø­Ù‡ØŒ ÙŠÙ†ØµØ­ Ø¨Ù‡ Ù„Ù…Ø±Ø¶Ù‰ Ø§Ù„Ø³ÙƒØ±ÙŠ. ÙˆØ§Ù„Ø­Ø°Ø§Ø¡ Ù…Ø¨Ø·Ù† Ù…Ù† Ø§Ù„Ø¯Ø§Ø®Ù„ Ø¨Ø¬Ù„Ø¯ Ø·Ø¨ÙŠØ¹ÙŠ 100%', 9000, 'IMG-8cbb98532b3ed2d6b4d7d14826bd54be-V.jpg', 'IMG-50de28bcbe4b25b2468f4f5533de8dcd-V.jpg', 'IMG-8b0f3f876f46f8cb73e3e9b7929db6fb-V.jpg', '42', '43', '44', '39', '40', '41', '', 'Gris', 0, 'chaussures', 'Marron', '', '', '', '', '', '', '', '', ''),
(39, 'Tshirt', '', 8000, 'FB_IMG_16967963371257160.jpg', '', 'FB_IMG_16967963223516719.jpg', 'Xxxl', 'Xl', 'Xxl', 'S', 'L', 'M', 'Bleu ciel', 'Gris', 0, 't-shirts', 'Bleu', '', '', '', '', '', '', '', '', ''),
(41, 'Bascket', '', 10000, 'IMG-61f16edbfa25fc443c43534900311679-V.jpg', 'IMG-b58e7330e2f920e53789e3d5e3936ae7-V.jpg', 'IMG-8d5c095a5707573f1531182a77602547-V.jpg', '43', '42', '44', '39', '40', '41', '', '', 0, 'bascket', 'Gris', '', '', '', '', '', '', '', '', ''),
(42, 'Chaussure italien', '', 10000, 'IMG-322fb928cac59bdc7a5aa04d03f8f8d5-V.jpg', '', '', '', '', '44', '', '', '', '', '', 0, 'chaussures', 'Marron', '', '', '', '', '', '', '', '', ''),
(43, 'Veste', '', 9000, 'IMG-9d91194c9bbb8aa7267c89aaacab9a23-V.jpg', '', '', '', '', 'Xxl', '', '', '', '', '', 0, 'vestes', 'Noire', '', '', '', '', '', '', '', '', ''),
(44, 'Chaussur italian', '', 9500, 'IMG-20231016-WA0016.jpg', '', '', 'M', 'L', 'Xl', '', '', '', '', '', 0, 'chaussures', '', '', '', '', '', '', '', '', '', ''),
(45, 'Armani exchange', 'Ø­Ø°Ø§Ø¡ Ø£Ø±Ù…Ø§Ù†ÙŠ Ø¥ÙƒØ³ØªØ´ÙŠÙ†Ø¬ Ø§Ù„Ø±ÙŠØ§Ø¶ÙŠ - Ø§Ù„Ù…Ø±Ø¬Ø¹. XUX151-XV663-K001. Ù„ÙˆÙ† Ø§Ø³ÙˆØ¯. ØªÙØ§ØµÙŠÙ„. - Ø§Ù„Ø¬Ø²Ø¡ Ø§Ù„Ø¹Ù„ÙˆÙŠ Ù…Ù† Ø§Ù„Ø¬Ù„Ø¯ØŒ Ø´Ø¨ÙƒÙŠ. - Ø¥ØºÙ„Ø§Ù‚ Ø¨Ø§Ù„Ø¯Ø§Ù†ØªÙŠÙ„. - Ø³Ø­Ø§Ø¨ Ø®Ù„ÙÙŠ . - Ø´Ø¹Ø§Ø± Armani Exchange Ø¹Ù„Ù‰ Ø§Ù„Ù†Ø¹Ù„ Ø§Ù„Ø®Ø§Ø±Ø¬ÙŠ.', 10000, 'IMG-2694ccb8ced472ff08906056c39771da-V.jpg', 'IMG-743290c2779907506f0ff7adf56f33d3-V.jpg', 'IMG-7ba44d91fb3d0639f98240c05e741a29-V.jpg', '42', '41', '40', '', '43', '44', '', '', 0, 'bascket', 'Noire', '', '', '', '', '', '', '', '', ''),
(46, 'Chaussure noire', '', 7000, 'IMG-4aeb4cc0c8be1701bf33ddafe761db72-V.jpg', '', '', '', '', '40', '', '', '', '', '', 0, 'chaussures', 'Noire', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
