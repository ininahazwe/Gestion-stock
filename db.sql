-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 27 oct. 2020 à 16:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `agpi_db2`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
                            `category_id` int(11) NOT NULL,
                            `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Mobiles'),
(2, 'Computers'),
(3, 'Clothing'),
(4, 'Beauty Item'),
(5, 'Sports Item'),
(6, 'Toys Item'),
(7, 'Books'),
(8, 'Entertainment Item');

-- --------------------------------------------------------

--
-- Structure de la table `clavier`
--

CREATE TABLE `clavier` (
                           `id` int(11) NOT NULL,
                           `ref` varchar(255) NOT NULL,
                           `type` varchar(255) NOT NULL,
                           `marque` varchar(255) NOT NULL,
                           `salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clavier`
--

INSERT INTO `clavier` (`id`, `ref`, `type`, `marque`, `salle_Id`) VALUES
(1, 'ref-cla01', 'cla-filaire01', 'Asus', 1),
(2, 'ref-cla02', 'cla-wireless0', 'Asus', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ecran`
--

CREATE TABLE `ecran` (
                         `id` int(11) NOT NULL,
                         `ref` varchar(255) NOT NULL,
                         `type` varchar(255) NOT NULL,
                         `modele` varchar(255) NOT NULL,
                         `hdmi` varchar(10) NOT NULL,
                         `vga` int(10) NOT NULL,
                         `dvi` int(10) NOT NULL,
                         `display_port` int(10) NOT NULL,
                         `salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecran`
--

INSERT INTO `ecran` (`id`, `ref`, `type`, `modele`, `hdmi`, `vga`, `dvi`, `display_port`, `salle_Id`) VALUES
(5, 'ref-123470', 'Ecran-LCD-80', 'Shell', 'oui', 16, 12, 28, 2),
(6, 'ref-123457', 'Ecran-LCD-20', 'Assus-Rog-Screen2', 'oui', 76, 9789, 99, 1),
(7, 'ref-12490', 'Ecran-LCD-22', 'Shell2002', 'oui', 70, 9789, 88, 2),
(8, 'jkfjklf', 'klkd,l', 'kdkld,l', 'kldlkd', 5, 555, 68, 1);

-- --------------------------------------------------------

--
-- Structure de la table `imprimante`
--

CREATE TABLE `imprimante` (
                              `id` int(11) NOT NULL,
                              `ref` varchar(255) NOT NULL,
                              `type` int(20) NOT NULL,
                              `marque` varchar(255) NOT NULL,
                              `modele` varchar(255) NOT NULL,
                              `salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `login_user`
--

CREATE TABLE `login_user` (
                              `id` int(11) NOT NULL,
                              `identifiant` varchar(255) NOT NULL,
                              `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login_user`
--

INSERT INTO `login_user` (`id`, `identifiant`, `mdp`) VALUES
(1, 'Cedric', 'Phil'),
(2, 'Vince', 'Popo'),
(3, 'yves', 'yves');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

CREATE TABLE `ordinateur` (
                              `id` int(11) NOT NULL,
                              `ref` varchar(255) NOT NULL,
                              `type` varchar(255) NOT NULL,
                              `marque` varchar(255) NOT NULL,
                              `modele` varchar(255) NOT NULL,
                              `systeme` varchar(255) NOT NULL,
                              `processeur` varchar(255) NOT NULL,
                              `ram` int(12) NOT NULL,
                              `session` varchar(255) NOT NULL,
                              `mdp` varchar(255) NOT NULL,
                              `ip_fixe` varchar(255) NOT NULL,
                              `office_365` varchar(255) NOT NULL,
                              `logiciel` varchar(255) NOT NULL,
                              `etat` varchar(10) NOT NULL,
                              `salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordinateur`
--

INSERT INTO `ordinateur` (`id`, `ref`, `type`, `marque`, `modele`, `systeme`, `processeur`, `ram`, `session`, `mdp`, `ip_fixe`, `office_365`, `logiciel`, `etat`, `salle_Id`) VALUES
(2, '12', 'PC', 'Shell', 'Kh1', 'kllmdkdlm', 'kldkdl', 2, 'klfflkl', 'kflkf', 'klmfklf', 'kldklflf', 'kflflkf', 'fklfkf', 2),
(3, '12', 'PC', 'Shell', 'Kh1', 'Windows', 'Mh2', 2, 'djj', 'kdkld', '122929', 'oui', 'dkdlk', 'bon', 1),
(5, 'M-666', 'Ecran-LCD-20', 'Dell', 'Assus-Rog-Screen2', 'Hhdh', 'jkdjlkd', 25, '52', '78373', '89330', 'oui', 'oui', 'bon', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
                           `id` int(11) NOT NULL,
                           `category` int(11) NOT NULL,
                           `name` varchar(250) NOT NULL,
                           `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category`, `name`, `price`) VALUES
(1, 1, 'Save on BLU Advance 5.5 HD', 74.99),
(2, 2, 'Dell Inspiron 15.6\" Gaming Laptop', 860.00),
(3, 3, 'Women\'s Slim Sleeveless', 69.00),
(4, 4, 'Andis 1875-Watt Fold-N-Go Ionic Hair Dryer', 17.00),
(5, 5, 'GM Ripple Cricket Grip, Set Of 3', 66.00),
(6, 6, 'Barbie Fashions and Accessories', 12.00),
(7, 7, 'The Ministry of Utmost Happiness', 6.00),
(8, 8, 'The Great Gatsby (3D)', 8.00),
(9, 1, 'iVooMi Me 1+', 49.00),
(10, 2, 'Apple MacBook Air MQD32HN/A 13.3-inch Laptop 2017', 896.00),
(11, 3, 'Balenzia Premium Mercerised Cotton Loafer Socks', 5.00),
(12, 4, 'Organix Mantra Lemon Cold Pressed Essential Oil', 4.50),
(13, 5, 'SpeedArm Cricket Ball Thrower', 15.00),
(14, 6, 'Mattel Bounce Off Game, Multi Color', 10.00),
(15, 7, 'Seven Days With Her Boss', 5.00),
(16, 8, 'Supernatural Season 1-9 DVD', 22.00),
(17, 1, 'InFocus Turbo 5', 189.00),
(18, 2, 'HP 15-bg008AU 15.6-inch Laptop , Jack Black', 350.00),
(19, 3, 'Seven Rocks Men\'s V-Neck Cotton Tshirt', 12.00),
(20, 4, 'Exel Elixir Sublime Antioxidant Serum Cream', 55.00),
(21, 5, 'Gray Nicolls Bat Repair Kit', 9.00),
(22, 6, 'Think Fun Rush Hour, Multi Color', 22.00),
(23, 7, 'Pregnancy Notes: Before, During & After', 5.00),
(24, 8, 'Sherlock Season - 4', 15.00),
(25, 1, 'Vivo Y53', 105.00),
(26, 2, 'Dell Inspiron 15-3567 15.6-inch Laptop', 356.00),
(27, 3, 'Fastrack Sport Sunglasses (Black) (P222GR1)', 14.00),
(28, 4, 'Exel Lotion with stabilized Tea Tree Oil', 28.00),
(29, 5, 'Burn Vinyl Hexagonal Dumbbell', 45.00),
(30, 6, 'Cup Cake Surprise Princess', 8.00),
(31, 7, 'Word Power Made Easy', 2.00),
(32, 8, 'Star Wars: The Force Awakens', 5.00),
(33, 1, 'Lenovo Vibe K5 (Gold, VoLTE update)', 65.00),
(34, 2, 'Lenovo 110 -15ACL 15.6-inch Laptop , Black', 225.00),
(35, 3, 'Zacharias Ankle Socks Pack of 12 Pair', 5.00),
(36, 4, 'Exel SUNSCREEN Broad Spectrum UVA & UVB', 26.00),
(37, 5, 'Burn 500124 Inter Lock Mat (Black)', 24.00),
(38, 6, 'Toyshine Devis Boy 9', 10.00),
(39, 7, 'Think and Grow Rich', 2.50),
(40, 8, 'The Jungle Book', 10.00);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
                         `id` int(11) NOT NULL,
                         `nom` varchar(255) NOT NULL,
                         `localisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`, `localisation`) VALUES
(1, 'Amazone 21', 'Bat-41'),
(2, 'Jaco', 'Bat-43'),
(7, 'Polo', '37 Evry'),
(8, 'Nouvelle Salle', '41');

-- --------------------------------------------------------

--
-- Structure de la table `salle_detail`
--

CREATE TABLE `salle_detail` (
                                `id` int(11) NOT NULL,
                                `T_Ordinateur_Id` int(11) NOT NULL,
                                `T_Ecran_Id` int(11) NOT NULL,
                                `T_Imprimante_Id` int(11) NOT NULL,
                                `T_Clavier_Id` int(11) NOT NULL,
                                `T_Souris_Id` int(11) NOT NULL,
                                `T_Salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `souris`
--

CREATE TABLE `souris` (
                          `id` int(11) NOT NULL,
                          `ref` varchar(255) NOT NULL,
                          `type` varchar(20) NOT NULL,
                          `marque` varchar(255) NOT NULL,
                          `salle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souris`
--

INSERT INTO `souris` (`id`, `ref`, `type`, `marque`, `salle_Id`) VALUES
(2, 'M-004', 'wireless', 'Asus', 2),
(3, 'M-667', 'Wireless', 'Dell', 8),
(4, 'M-66', 'Wireless', 'Dell', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `username` varchar(50) NOT NULL,
                         `email` varchar(50) NOT NULL,
                         `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'yves', 'ininahazwe@yahoo.fr', '1234'),
(2, 'jean', 'jean@gmail.com', '1234'),
(3, 'maurice', '1234', 'maurice@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `clavier`
--
ALTER TABLE `clavier`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_SalleClavier` (`salle_Id`);

--
-- Index pour la table `ecran`
--
ALTER TABLE `ecran`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_SalleEcran` (`salle_Id`);

--
-- Index pour la table `imprimante`
--
ALTER TABLE `imprimante`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_SalleImprimante` (`salle_Id`);

--
-- Index pour la table `login_user`
--
ALTER TABLE `login_user`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_SalleOrdinateur` (`salle_Id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salle_detail`
--
ALTER TABLE `salle_detail`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_T_Ordinateur_Id` (`T_Ordinateur_Id`),
    ADD KEY `FK_T_Ecran_Id` (`T_Ecran_Id`),
    ADD KEY `FK_T_Imprimante_Id` (`T_Imprimante_Id`),
    ADD KEY `FK_T_Clavier_Id` (`T_Clavier_Id`),
    ADD KEY `FK_T_Souris_Id` (`T_Souris_Id`),
    ADD KEY `FK_T_Salle_Id` (`T_Salle_Id`);

--
-- Index pour la table `souris`
--
ALTER TABLE `souris`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_SalleSouris` (`salle_Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
    MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `clavier`
--
ALTER TABLE `clavier`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ecran`
--
ALTER TABLE `ecran`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `imprimante`
--
ALTER TABLE `imprimante`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login_user`
--
ALTER TABLE `login_user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `salle_detail`
--
ALTER TABLE `salle_detail`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `souris`
--
ALTER TABLE `souris`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clavier`
--
ALTER TABLE `clavier`
    ADD CONSTRAINT `FK_SalleClavier` FOREIGN KEY (`salle_Id`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `ecran`
--
ALTER TABLE `ecran`
    ADD CONSTRAINT `FK_SalleEcran` FOREIGN KEY (`salle_Id`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `imprimante`
--
ALTER TABLE `imprimante`
    ADD CONSTRAINT `FK_SalleImprimante` FOREIGN KEY (`salle_Id`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
    ADD CONSTRAINT `FK_SalleOrdinateur` FOREIGN KEY (`salle_Id`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `salle_detail`
--
ALTER TABLE `salle_detail`
    ADD CONSTRAINT `FK_T_Clavier_Id` FOREIGN KEY (`T_Clavier_Id`) REFERENCES `clavier` (`id`),
    ADD CONSTRAINT `FK_T_Ecran_Id` FOREIGN KEY (`T_Ecran_Id`) REFERENCES `ecran` (`id`),
    ADD CONSTRAINT `FK_T_Imprimante_Id` FOREIGN KEY (`T_Imprimante_Id`) REFERENCES `imprimante` (`id`),
    ADD CONSTRAINT `FK_T_Ordinateur_Id` FOREIGN KEY (`T_Ordinateur_Id`) REFERENCES `ordinateur` (`id`),
    ADD CONSTRAINT `FK_T_Salle_Id` FOREIGN KEY (`T_Salle_Id`) REFERENCES `salle` (`id`),
    ADD CONSTRAINT `FK_T_Souris_Id` FOREIGN KEY (`T_Souris_Id`) REFERENCES `souris` (`id`);

--
-- Contraintes pour la table `souris`
--
ALTER TABLE `souris`
    ADD CONSTRAINT `FK_SalleSouris` FOREIGN KEY (`salle_Id`) REFERENCES `salle` (`id`);
