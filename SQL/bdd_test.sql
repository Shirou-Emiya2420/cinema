-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `personne_id` int DEFAULT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `FK_acteur_personne` (`personne_id`),
  CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.acteur : ~6 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `personne_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7);

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `acteur_id` int DEFAULT NULL,
  `film_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  KEY `FK_casting_acteur` (`acteur_id`),
  KEY `FK_casting_film` (`film_id`),
  KEY `FK_casting_role` (`role_id`),
  CONSTRAINT `FK_casting_acteur` FOREIGN KEY (`acteur_id`) REFERENCES `acteur` (`id_acteur`) ON DELETE CASCADE,
  CONSTRAINT `FK_casting_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  CONSTRAINT `FK_casting_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.casting : ~10 rows (environ)
INSERT INTO `casting` (`acteur_id`, `film_id`, `role_id`) VALUES
	(1, 1, 3),
	(2, 2, 1),
	(3, 6, 1),
	(4, 5, 5),
	(5, 1, 6),
	(6, 4, 3),
	(3, 7, 2),
	(6, 1, 5),
	(2, 1, 4);

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `annee_sortie` date NOT NULL,
  `duree` int NOT NULL DEFAULT '0',
  `resume` text COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `realisateur_id` int DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_film_realisateur` (`realisateur_id`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`realisateur_id`) REFERENCES `realisateur` (`id_realisateur`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.film : ~7 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `resume`, `note`, `image_url`, `realisateur_id`) VALUES
	(1, 'LaDoubleLoserQ', '2024-05-23', 120, 'AJAEZG', '4', 'http://127.0.0.1:5500/index.html', 3),
	(2, 'Parasite', '2019-05-30', 132, 'Les quatre membres de la famille Ki-taek sont proches, mais sont au chômage et ont un avenir sombre. Le fils, Ki-woo, est recommandé par son ami pour un emploi de tuteur bien rémunéré, faisant naître l\'espoir d\'un revenu régulier. Portant les attentes de toute sa famille, il passe une entrevue. En arrivant chez M. Park, propriétaire d\'une société informatique internationale, Ki-woo rencontre Yeon-kyo, la belle demoiselle de la maison. Une série d\'incidents imparables les attend.', '4.5', 'https://esprit.presse.fr/prod/file/esprit_presse/article/img_resize/42185_large.jpg', 2),
	(3, 'La La Land', '2016-12-09', 128, 'Au coeur de Los Angeles, une actrice en devenir prénommée Mia sert des cafés entre des auditions. De son côté, Sebastian, passionné de jazz, joue du piano dans des clubs miteux pour assurer sa subsistance. Tous deux sont bien loin de la vie rêvée à laquelle ils aspirent, mais ils développent des sentiments amoureux l\'un pour l\'autre.', '4.2', 'https://musicimage.xboxlive.com/catalog/video.movie.8D6KGWX8QZKM/image?locale=fr-fr&mode=crop&purposes=BoxArt&q=90&h=300&w=200&format=jpg', 3),
	(4, 'The Grand Budapest Hotel', '2014-03-06', 99, 'Zero Mustafa, jeune réfugié politique venu de Salim-al-Jabat, réussit à se faire engager comme lobby boy au Grand Budapest Hotel, une institution située dans les montagnes de la république de Zubrowka. Le concierge de l\'établissement, l\'élégant M. Gustave, qui veille sur ce mythique palace, le prend sous son aile. Ensemble, ils se rendent au domicile de Mme D., une habituée du Grand Budapest.', '4.2', 'https://i.ebayimg.com/images/g/WIcAAOSwP3FghuOw/s-l960.webp', NULL),
	(5, 'Django Unchained', '2012-12-25', 165, 'Deux ans avant la Guerre civile, un ancien esclave du nom de Django s\'associe avec un chasseur de primes d\'origine allemande qui l\'a libéré: il accepte de traquer avec lui des criminels recherchés. En échange, il l\'aidera à retrouver sa femme perdue depuis longtemps et esclave elle aussi.', '4.5', 'https://m.media-amazon.com/images/I/81nVf+3Z5JL._SY466_.jpg', 1),
	(6, 'Mad Max: Fury Road', '2015-05-15', 120, 'Hanté par un lourd passé, Mad Max estime que le meilleur moyen de survivre est de rester seul. Cependant, il se retrouve embarqué par une bande qui parcourt la Désolation à bord d\'un véhicule militaire piloté par l\'Imperator Furiosa. Ils fuient la Citadelle où sévit le terrible Immortan Joe qui s\'est fait voler un objet irremplaçable. Enragé, ce Seigneur de guerre envoie ses hommes pour traquer les rebelles impitoyablement.', '4.2', 'https://static.wikia.nocookie.net/madmax/images/7/7c/Mad-Max_Fury-Road_Poster_006.jpg/revision/latest?cb=20210321201648&path-prefix=fr', 3),
	(7, 'The Social Network', '2010-10-01', 120, 'Une soirée bien arrosée d\'octobre 2003. Mark Zuckerberg, un étudiant qui vient de se faire plaquer par sa petite amie, pirate le système informatique de l\'Université de Harvard pour créer une base de données de toutes les filles du campus. Le succès est instantané : l\'information se diffuse à la vitesse de l\'éclair et le site devient viral, détruisant tout le système de Harvard et générant une controverse sur le campus. C\'est pourtant à ce moment que naît ce qui deviendra Facebook.', '4', 'https://lesmistons.typepad.com/.a/6a00e5517d7b728833013488b3f2b2970c-800wi', 2);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.genre : ~3 rows (environ)
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'science-fiction'),
	(2, 'action'),
	(3, 'aventure');

-- Listage de la structure de table cinema. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `genre_id` int DEFAULT NULL,
  `film_id` int DEFAULT NULL,
  KEY `FK__film` (`film_id`),
  KEY `FK__genre` (`genre_id`),
  CONSTRAINT `FK__film` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  CONSTRAINT `FK__genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.genre_film : ~8 rows (environ)
INSERT INTO `genre_film` (`genre_id`, `film_id`) VALUES
	(2, 1),
	(3, 2),
	(2, 3),
	(3, 4),
	(1, 5),
	(1, 6),
	(2, 7),
	(2, 1);

-- Listage de la structure de table cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.personne : ~12 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `date_naissance`, `sexe`, `image`) VALUES
	(1, 'Murphy', 'Cillian', '1976-05-25', 'Homme', 'https://www.parismatch.com/lmnr/f/webp/r/960,640,FFFFFF,forcex,center-middle/img/var/pm/public/styles/paysage/public/media/image/2024/03/06/16/pm-cillian-murphy.jpg?VersionId=oMcyh2U_rxsEFPYrPStc5piayhEPT8VH'),
	(2, 'Gordon-Levitt', 'Joseph', '1981-02-17', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Joseph_Gordon-Levitt_2013.jpg/399px-Joseph_Gordon-Levitt_2013.jpg'),
	(3, 'Hardy', 'Tom', '1977-09-15', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Tom_Hardy_by_Gage_Skidmore.jpg/260px-Tom_Hardy_by_Gage_Skidmore.jpg'),
	(4, 'Cotillard', 'Marion', '1975-09-30', 'Femme', 'https://fr.web.img5.acsta.net/c_310_420/pictures/16/05/17/11/00/419951.jpg'),
	(5, 'Watabe', 'Ken', '1959-10-21', 'Homme', 'https://i.vgt.vn/2022/4/18/ken-watabe---danh-hai-ngoai-tinh-voi-182-nguoi-van-noi-yeu-vo-nhat-mat-ca-su-nghiep-cung-cha-oan-fef-6407692.jpg'),
	(6, 'Talulah', 'Riley', '1985-09-26', 'Femme', 'https://static.standard.co.uk/s3fs-public/thumbnails/image/2012/01/03/09/talulah-riley-3001-489x512.jpg?crop=8:5,smart&quality=75&auto=webp&width=1000'),
	(7, 'Nolan', 'Christopher', '1970-07-30', 'Homme', 'https://i1.wp.com/www.iletaitunefoislecinema.com/wp-content/uploads/2023/07/nolanimage.jpg?fit=870%2C580&ssl=1'),
	(8, 'Bong', 'Joon-Ho', '1969-09-14', 'Homme', 'https://deadline.com/wp-content/uploads/2019/12/michael-buckner.jpg?crop=0px%2C2px%2C1000px%2C560px&resize=681%2C383'),
	(9, 'Chazelle', 'Damien', '1985-01-19', 'Homme', 'https://resizing.flixster.com/HbRSHLHSWbxzLyDNfq2mcaoaIw4=/218x280/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/586751_v9_bb.jpg'),
	(17, 'Bobin', 'PA', '2003-02-20', 'autre', NULL);

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `personne_id` int DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `FK_realisateur_personne` (`personne_id`),
  CONSTRAINT `FK_realisateur_personne` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.realisateur : ~4 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `personne_id`) VALUES
	(1, 7),
	(2, 8),
	(3, 9),
	(8, 17);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table cinema.role : ~6 rows (environ)
INSERT INTO `role` (`id_role`, `libelle`) VALUES
	(1, 'batman'),
	(2, 'spiderman'),
	(3, 'Robert Fischern Jr.'),
	(4, 'Arthur'),
	(5, 'La Blonde'),
	(6, 'Saito'),
	(7, 'Journaliste'),
	(18, 'Journaliste');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
