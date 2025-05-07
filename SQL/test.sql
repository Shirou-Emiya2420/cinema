-- 1. Voir tous les films avec leur réalisateur
SELECT f.titre, p.prenom, p.nom
FROM film f
JOIN realisateur r ON f.id_realisateur = r.id_realisateur
JOIN personne p ON r.id_personne = p.id_personne;

-- 2. Voir les acteurs d’un film donné
SELECT f.titre, pe.prenom, pe.nom, r.nom_role
FROM jouer j
JOIN film f ON j.id_film = f.id_film
JOIN acteur a ON j.id_acteur = a.id_acteur
JOIN personne pe ON a.id_personne = pe.id_personne
JOIN role r ON j.id_role = r.id_role
WHERE f.titre = 'L’Éveil du Chaos';

-- 3. Lister les films par genre
SELECT g.nom_genre, f.titre
FROM definis d
JOIN genre g ON d.id_genre = g.id_genre
JOIN film f ON d.id_film = f.id_film
ORDER BY g.nom_genre;

-- 4. Lister les acteurs ayant joué plusieurs rôles
SELECT pe.prenom, pe.nom, COUNT(*) as nb_roles
FROM jouer j
JOIN acteur a ON j.id_acteur = a.id_acteur
JOIN personne pe ON a.id_personne = pe.id_personne
GROUP BY pe.id_personne
HAVING nb_roles > 1;

-- 5. Moyenne des notes par réalisateur
SELECT p.prenom, p.nom, AVG(f.note) as moyenne
FROM film f
JOIN realisateur r ON f.id_realisateur = r.id_realisateur
JOIN personne p ON r.id_personne = p.id_personne
GROUP BY r.id_realisateur;
