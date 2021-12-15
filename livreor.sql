-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 déc. 2021 à 00:37
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(9, 'Salut à tous et à toutes. Voici un livre d\'or.', 2, '2021-12-14 21:58:18'),
(10, 'Je vas', 2, '2021-12-14 21:58:31'),
(11, 'Je vais pas trop le flood, j\'écris juste plusieurs messages pour vérifier que cela fonctionne comme il faut, même avec grands textes.', 2, '2021-12-14 21:59:04'),
(12, 'Voici , un poème de Paul Verlaine (ne faîtes pas attention aux fautes svp). Je fais souvent ce rêve étrange et pénétrant, d\'une femme inconnue et que j\'aime et qui m\'aime, et qui n\'ait chaque fois ni tous à fait la même, ni tous à fait une autre et m\'aimes et me comprend. Car elle me comprend et mon coeur transparent, pour elle seule, hélas cesse d\'être un problème, pour elle seule et les moiteurs de mon front blème, elle seule les sait rafraichir en pleurant. Est-elle brune, blonde ou rousse? Je l\'ignore. Son nom, je me souviens qu\'il est doux et sonore, comme ceux des aimés que la vie exila. Son regard est pareil au regard des statues et pour sa voix lointaine et calme et grave, elle a l\'inflexion des voix chères qui se sont tues. Mon rêve familer - Paul Verlaine', 2, '2021-12-14 22:02:49'),
(13, 'Le recueil c\'est les poèmes saturniens si intéréssé ', 2, '2021-12-14 22:03:56');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'sami', '$2y$10$spm5z5y1ZgoWRxyiPljz3uxwSP8T0wi2zkgRdf67KpyFQAMQvXQba'),
(2, 'test', '$2y$10$m2khxzI5bgPgE/b0eH6l9ur0Y4Ia2Dz/vJf7qYFmNs7ow5C1bPAIK'),
(3, 'tarik', '$2y$10$6or82oEIQ3./lIB03rKxXe3kog6cuivQUVdyaVnV5aYhVQJPt4OL6'),
(4, 'fa', '$2y$10$ehAh4IFJeNwsQ54eUPGha.NFKg7afYTlPrKWdGdPWZ6CxXEgkuJuK'),
(5, 'cc', '$2y$10$LH6MwNQd3cZPCJWL1.ZeJ.x/5OtnlB4ta6Ffk86Z1IhJjX3m/8oW.'),
(6, 'dd', '$2y$10$qCojpp8jcUKswXP3i4Xkw.atYAmTwZNOwKACBJNHE0oJY1htVEMKi'),
(7, 'sam', '$2y$10$bLd4QYutkZsUtTGe5xt96.QvzLC3m5r0tNP1HzlYEot2BqK/oCj1O'),
(8, 'si', '$2y$10$BH62kx20seU0nAGae7ueQ.jcFa7MPkwPVzrQDgY4wjXcLYfWqeSc6'),
(9, 'sa', '$2y$10$DuvlcDPVrXc5aYi2.4CYTuLNK89kvvV.qL2kyVee5RnM.u08Re8y.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
