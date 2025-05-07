CREATE DATABASE cinemaCLINDECKE;
USE cinemaCLINDECKE;


CREATE TABLE role(
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(50)
);
CREATE TABLE genre(
    id_genre INT AUTO_INCREMENT PRIMARY KEY,
    nom_genre VARCHAR(50)
);
CREATE TABLE personne(
    id_personne INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50),
    nom VARCHAR(50),
    sexe VARCHAR(50),
    dateDeNaissance DATE
);

CREATE TABLE realisateur(
    id_realisateur INT AUTO_INCREMENT PRIMARY KEY,
    id_personne INT,
    FOREIGN KEY (id_personne) REFERENCES personne(id_personne)
);
CREATE TABLE film(
    id_film INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    anneeSortieFr DATE,
    duree INT,
    synopsis TEXT,
    note INT,
    afficheFilm VARCHAR(200),
    id_realisateur INT,
    FOREIGN KEY (id_realisateur) REFERENCES realisateur(id_realisateur)
);
CREATE TABLE acteur(
    id_acteur INT AUTO_INCREMENT PRIMARY KEY,
    id_personne INT,
    FOREIGN KEY (id_personne) REFERENCES personne(id_personne)
);

CREATE TABLE jouer(
    id_film INT,
    id_acteur INT,
    id_role INT,
    FOREIGN KEY (id_film) REFERENCES film(id_film),
    FOREIGN KEY (id_acteur) REFERENCES acteur(id_acteur),
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);

CREATE TABLE definis(
    id_film INT,
    id_genre INT,
    FOREIGN KEY (id_film) REFERENCES film(id_film),
    FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
);
