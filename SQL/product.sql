-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 23:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom1_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `img_url`, `description`) VALUES
(1, 'Fellowes Base De Sup', 20, 54, '../img_shop/first.png', 'Fellowes Base De Support Pour ordinateur portable'),
(2, '3M Filtre de confide', 31, 283, '../img_shop/second.png', '3M Filtre de confidentialite noir'),
(5, 'ordi', 3, 955, '../img_shop/ordi.jpg', 'ordinateur performant'),
(13, 'Dell ordinateur', 10, 899, '../img_shop/third.png', 'Ordinateur portable Dell Inspiron 3520 15.6\" '),
(14, 'Cart Memo', 100, 25, '../img_shop/fourth.png', 'Proflash Carte MEmoir Secure digital'),
(15, 'Souris', 19, 32, '../img_shop/fifth.png', 'Verbatim Souris Sans Fil a 6 boutons'),
(16, 'Pc portable Dell Vos', 10, 1000, '../img_shop/sixth.png', 'Pc portable Dell Vostro 7620 16\" '),
(17, 'InteKview', 33, 200, '../img_shop/seventh.png', 'InteKview Support pour deuxx ecrants'),
(18, 'Clavier / souris', 9, 121, '../img_shop/eleventh.png', 'Logitech clavier et souris sans fil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
