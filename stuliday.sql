-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 sep. 2020 à 15:17
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stuliday`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `address_article` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `price` int(255) NOT NULL,
  `author_article` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `description`, `city`, `category`, `image_url`, `address_article`, `active`, `price`, `author_article`, `start_date`, `end_date`, `publish_date`) VALUES
(7, 'Loft Grd luxe sur Terra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', '1A Palais Impérial Terra', 'Logement Entier', '5f4df1396f11d_contemporary-home-theater.jpg', '256 Sanctus tower, Secteur 5', 1, 5000, 3, '2020-09-14', '2020-09-21', '2020-08-27 11:48:04'),
(8, 'Loft vue magnifique', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', '88995 Shaar Nada ', 'Chambre d\'hôtel', '5f4e0fea2b1c0_steampunk-apartment-new-york-city-3.jpg', '969 Arena Center', 1, 500, 8, '2020-09-28', '2020-10-05', '2020-08-28 12:24:25'),
(9, 'Magnifique appartement vue océan', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nostrum eos dicta, perspiciatis enim placeat doloribus natus asperiores unde tenetur quae rem, debitis aperiam aspernatur cupiditate veniam exercitationem quos cum.', '55555  Chemnos', 'Logement Entier', '5f4ca3b38488b_zaha-hadid-apartment-miami-beach_dezeen_hero.jpg', '6987 Phoenix Estate ', 1, 850, 7, '2020-08-31', '2020-09-06', '2020-08-31 07:16:03'),
(18, 'T3 vue panoramique sur old NY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', 'Megacity 00001, Terra', 'Logement Entier', '5f4e0d06ef5a7_Aria4seasons0271-1653-1080x540.png', '32865 Peach tree tower', 1, 650, 3, '2020-09-07', '2020-09-21', '2020-08-31 09:10:18'),
(19, 'T4 agréable et lumineux', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', '66666 Darken, Delivrance', 'Logement Entier', '5f4e0dd76502e_386120867.jpg', '555 Domaine de la confrerie du corbeau', 1, 450, 9, '2020-09-07', '2020-09-14', '2020-09-01 06:47:22'),
(20, 'T4 ombragé', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', '33333 Shell Bay, Kamino', 'Logement Entier', '5f4e0b646ce19_Taaffe-pool-C-1024x683.jpg', '500 beach drive', 1, 250, 3, '2020-09-14', '2020-09-21', '2020-09-01 08:50:44'),
(21, 'Appartement grd standing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel porta nulla. Pellentesque dignissim eu ante quis sagittis. Pellentesque interdum velit finibus massa tincidunt, id volutpat urna semper. Suspendisse porttitor rhoncus tellus, non mattis mauris consectetur nec. Nulla in lectus ut odio volutpat finibus ac at ante. In eget nisl ligula. In condimentum orci in metus commodo, eu blandit ipsum efficitur. Nulla diam enim, pretium et eleifend nec, vehicula id mi. Morbi ultrices hendrerit odio vel volutpat. ', '56543 Maccrage city, Maccrage', 'Logement Entier', '5f4e18f58f9e6_3BD_Living_Room_Dusk_46A_4K.0.jpg', '1001 Via Gloriosa, Secteur centre', 1, 875, 10, '2020-09-21', '2020-10-05', '2020-09-01 09:46:57');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `id_user`, `id_annonce`) VALUES
(1, 3, 8),
(2, 9, 7),
(3, 8, 18),
(8, 10, 21);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `userAddress`) VALUES
(1, 'manimanu@gmail.com', '$2y$10$dKX/qQ3Z9mOdujpHos5G0.j/z1VnM1lJxJ1ylVJvNXB', '', '', ''),
(2, 'vyper@vyper.com', '$2y$10$QYtz39XkQ28vbbMcbq8xBeh2G0U.1NX3f1YeStKtOAUct2JIUjpL6', '', '', ''),
(3, 'horus@gw.com', '$2y$10$HqaShxhxy4.0T3CTBCgG8evzcgTaju3jfFHEu.NNcZwNdsle9O1/O', 'Horus', 'Lupercal', '001 War Master Palace, Chtonia'),
(6, 'lorgar@gw.com', '$2y$10$34GKCkNRQPtaIWke4tKf1OKFbpfMMn34mdPD4xb6jo3hgI3NqU0bK', 'Lorgar', 'Aurelian', '1 Domaine Aurelius, Colchis'),
(7, 'fulgrim@gw.com', '$2y$10$8SgNxpMDTFYcTeGeAWKY3O/i0DdPuKCTvEt836dZPbPVBqUahzJkG', 'Fulgrim', 'Phoenician', '1000 Phoenix Plaza, Chemnos'),
(8, 'angron@gw.com', '$2y$10$CUybdomwoIgGFyKALevAvuuM2Pz/TEPF7NOiSzBRYcxidBEaG93Ny', 'Angron', 'De Nuceria', '999 Butcher Nail Arena, Nuceria'),
(9, 'corax@gw.com', '$2y$10$ZVm8LpLp0QuCcmHhkH43Reroyf0FzA0yViie.8coOaVQ6UVJUljnK', 'Corvus', 'Corax', '555 Forteresse du corbeau'),
(10, 'roboute@gw.com', '$2y$10$J2cSdc3NL30cuMoOOPOtiupmkp6bth/MvvAG.stgpnw/goRH6oDNe', 'Roboute', 'Guilliman', '001 Ultramar plaza, Maccrage city');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_article` (`author_article`) USING BTREE;

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_annonce` (`id_annonce`),
  ADD KEY `reservations_ibfk_2` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`author_article`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
