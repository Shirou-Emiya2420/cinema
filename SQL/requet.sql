/* a */
SELECT titre t, anneeSortieFr asf, DATE_FORMAT(SEC_TO_TIME(duree * 60), '%H:%i') d, prenom pre, nom nom
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE id_film = 1;

/* b */
SELECT titre t, duree d
FROM film f
WHERE duree > 135
ORDER BY duree DESC;

/* c */
SELECT titre t, anneeSortieFr asf
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE id_realisateur = 1;

/* d */
SELECT nom_genre ng, COUNT(f.id_film) AS tt_film
FROM film f
INNER JOIN definis d ON d.id_film = f.id_film
INNER JOIN genre g ON g.id_genre = d.id_genre
GROUP BY nom_genre;

/* e */
SELECT nom, prenom, COUNT(f.id_film) AS tt_film
FROM film f
INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
GROUP BY f.id_realisateur DESC;

/* f */
SELECT nom, prenom, sexe
FROM film f
INNER JOIN jouer j ON j.id_film = f.id_film
INNER JOIN acteur a ON a.id_acteur = j.id_acteur
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE f.id_film = 1;

/* g */
SELECT titre t, anneeSortieFr asf, nom_role nr
FROM film f
INNER JOIN jouer j ON j.id_film = f.id_film
INNER JOIN role r ON r.id_role = j.id_role
INNER JOIN acteur a ON a.id_acteur = j.id_acteur
WHERE a.id_acteur = 1;

/* h */
SELECT p.id_personne, p.prenom, p.nom
FROM personne p
INNER JOIN acteur a ON a.id_personne = p.id_personne
INNER JOIN realisateur r ON r.id_personne = p.id_personne;

/* i */
SELECT *
FROM film f
WHERE anneeSortieFr >= DATE_SUB(CURDATE(), INTERVAL 5 YEAR)
ORDER BY anneeSortieFr DESC;

/* j */
SELECT sexe s, COUNT(*) AS total
FROM personne p
JOIN acteur a ON a.id_personne = p.id_personne
GROUP BY s;

/* k */
SELECT p.id_personne, p.prenom, p.nom, TIMESTAMPDIFF(YEAR, p.dateDeNaissance, CURDATE()) AS age
FROM personne p
JOIN acteur a ON a.id_personne = p.id_personne
WHERE TIMESTAMPDIFF(YEAR, p.dateDeNaissance, CURDATE()) > 50;

/* i */
SELECT p.id_personne, p.prenom, p.nom, COUNT(j.id_film) AS nb_films
FROM personne p
JOIN acteur a ON a.id_personne = p.id_personne
JOIN jouer j ON j.id_acteur = a.id_acteur
GROUP BY p.id_personne
HAVING COUNT(j.id_film) >= 3;
