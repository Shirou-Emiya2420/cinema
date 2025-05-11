-- Genres
INSERT INTO genre (nom_genre) VALUES 
('Action'), ('Drame'), ('Science-fiction'), ('Comédie'), ('Horreur'), ('Aventure');

-- Rôles
INSERT INTO role (nom_role) VALUES 
('Héros'), ('Méchant'), ('Secondaire'), ('Support'), ('Victime'), ('Leader');

-- Personnes
INSERT INTO personne (prenom, nom, sexe, dateDeNaissance) VALUES
('Alice', 'Moreau', 'Femme', '1985-06-01'),
('Thomas', 'Girard', 'Homme', '1978-11-23'),
('Emma', 'Bernard', 'Femme', '1992-03-14'),
('Julien', 'Robert', 'Homme', '1983-08-05'),
('Sophie', 'Lemoine', 'Femme', '1987-12-17'),
('Marc', 'Leclerc', 'Homme', '1990-09-30'),
('Claire', 'Durand', 'Femme', '1975-01-22'),
('Luc', 'Valentin', 'Homme', '1968-10-09'),
('Eva', 'Martin', 'Femme', '1980-02-28');

-- Réalisateurs
INSERT INTO realisateur (id_personne) VALUES (7), (8), (9);

-- Acteurs
INSERT INTO acteur (id_personne) VALUES (1), (2), (3), (4), (5), (6);

-- Films
INSERT INTO film (titre, anneeSortieFr, duree, synopsis, note, afficheFilm, id_realisateur) VALUES
('L’Éveil du Chaos', '2021-04-10', 110, 'Une force ancienne menace la paix.', 7, 'affiches/chaos.jpg', 1),
('Les Ombres du Passé', '2020-11-05', 95, 'Un thriller psychologique haletant.', 8, 'affiches/ombres.jpg', 2),
('Mission Titan', '2022-07-20', 130, 'Des astronautes face à l’inconnu.', 9, 'affiches/titan.jpg', 3),
('Rire ou Mourir', '2019-06-12', 100, 'Comédie noire explosive.', 6, 'affiches/rire.jpg', 1),
('L’Île Interdite', '2018-09-18', 105, 'Une expédition vire au cauchemar.', 7, 'affiches/ile.jpg', 2),
('Connexion Fatale', '2023-02-03', 97, 'Une IA s’éveille…', 8, 'affiches/ia.jpg', 3),
('Sous la Pluie', '2021-01-15', 112, 'Drame romantique bouleversant.', 9, 'affiches/pluie.jpg', 1),
('Chasseurs Nocturnes', '2017-12-24', 115, 'Traque sanglante dans une ville corrompue.', 7, 'affiches/chasseurs.jpg', 2),
('Dernier Signal', '2020-03-28', 108, 'Un mystère scientifique global.', 8, 'affiches/signal.jpg', 3),
('Révolte 2099', '2024-05-01', 125, 'Une révolution cybernétique.', 9, 'affiches/revolte.jpg', 1);

-- Jouer
INSERT INTO jouer (id_film, id_acteur, id_role) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 1),
(2, 4, 2),
(3, 5, 1),
(3, 6, 2),
(4, 1, 1), 
(4, 3, 4),
(5, 2, 1),
(5, 5, 3),
(6, 6, 1),
(6, 4, 2),
(7, 3, 1),
(7, 1, 4),
(8, 2, 1),
(8, 6, 5),
(9, 4, 1),
(9, 5, 2),
(10, 1, 1),
(10, 2, 2);

-- Définis
INSERT INTO definis (id_film, id_genre) VALUES
(1, 1), (1, 3),
(2, 2),
(3, 3),
(4, 4),
(5, 6), (5, 5),
(6, 3),
(7, 2),
(8, 1), (8, 5),
(9, 3),
(10, 1), (10, 3);


-- Ajout de personnes (acteurs + réalisateurs)
INSERT INTO personne (prenom, nom, sexe, dateDeNaissance) VALUES
('Luc', 'Martin', 'Homme', '1970-03-15'),
('Claire', 'Dubois', 'Femme', '1980-07-22'),
('Jean', 'Durand', 'Homme', '1965-12-11'),
('Sophie', 'Moreau', 'Femme', '1975-06-09'),
('Marc', 'Petit', 'Homme', '1985-01-01'),
('Alice', 'Garnier', 'Femme', '1990-02-14'),
('Paul', 'Bertrand', 'Homme', '1978-04-05'),
('Emma', 'Lemoine', 'Femme', '1982-11-27');

-- Réalisateurs (liés aux personnes)
INSERT INTO realisateur (id_personne) VALUES (1), (3), (5), (7);

-- Acteurs (liés aux personnes)
INSERT INTO acteur (id_personne) VALUES (2), (4), (6), (8);

-- Films (8 au total, durées > 135 min)
INSERT INTO film (titre, anneeSortieFr, duree, synopsis, note, afficheFilm, id_realisateur) VALUES
('Film Test 1', '2018-12-19', 176, 'Synopsis du Film Test 1.', 3, 'https://example.com/poster1.jpg', 1),
('Film Test 2', '2013-02-24', 136, 'Synopsis du Film Test 2.', 6, 'https://example.com/poster2.jpg', 1),
('Film Test 3', '2011-09-04', 152, 'Synopsis du Film Test 3.', 9, 'https://example.com/poster3.jpg', 2),
('Film Test 4', '2007-11-14', 158, 'Synopsis du Film Test 4.', 3, 'https://example.com/poster4.jpg', 2),
('Film Test 5', '2015-12-15', 154, 'Synopsis du Film Test 5.', 7, 'https://example.com/poster5.jpg', 3),
('Film Test 6', '2001-08-29', 138, 'Synopsis du Film Test 6.', 7, 'https://example.com/poster6.jpg', 3),
('Film Test 7', '2006-10-19', 137, 'Synopsis du Film Test 7.', 8, 'https://example.com/poster7.jpg', 4),
('Film Test 8', '2009-04-15', 164, 'Synopsis du Film Test 8.', 2, 'https://example.com/poster8.jpg', 4);

-- Rôles
INSERT INTO role (nom_role) VALUES ('Héros'), ('Second rôle');

-- Lien acteur <-> rôle <-> film
INSERT INTO jouer (id_film, id_acteur, id_role) VALUES
(1, 1, 1), (1, 2, 2),
(2, 3, 1), (2, 4, 2),
(3, 1, 1), (3, 4, 2),
(4, 2, 1), (4, 3, 2),
(5, 3, 1), (5, 4, 2),
(6, 1, 1), (6, 2, 2),
(7, 2, 1), (7, 3, 2),
(8, 4, 1), (8, 1, 2);

-- Genres
INSERT INTO genre (nom_genre) VALUES ('Drame'), ('Action');

-- Lien film <-> genre
INSERT INTO definis (id_film, id_genre) VALUES
(1, 1), (2, 2), (3, 1), (4, 1),
(5, 2), (6, 1), (7, 2), (8, 1);
