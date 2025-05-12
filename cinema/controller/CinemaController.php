<?php
namespace Controller;
use Model\Connect;

class CinemaController {
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, id_film, annee_sortie
        FROM film
        ");
        require "view/listFilms.php";
    }
    public function detailFilm($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT titre, annee_sortie, duree, note, resume
        FROM film
        WHERE id_film = :id
        ");
        $requete->execute(['id' => $id]);
        
        $requete2 = $pdo->prepare("
        SELECT nom pn, prenom pp, id_personne
        FROM personne p
        INNER JOIN acteur a ON a.personne_id = p.id_personne
        INNER JOIN casting j ON j.acteur_id = a.id_acteur
        WHERE j.film_id = :id");
        $requete2->execute(['id' => $id]);

        $requete3 = $pdo->prepare("
        SELECT nom pn, prenom pp, p.id_personne
        FROM personne p
        INNER JOIN realisateur a ON a.personne_id = p.id_personne
        INNER JOIN film j ON j.realisateur_id = a.id_realisateur
        WHERE j.id_film = :id");
        $requete3->execute(['id' => $id]);

        require "view/detailFilm.php";
    }
    public function detailActeur($id){
        $pdo = Connect::seConnecter();
        $requete2 = $pdo->prepare("
        SELECT p.nom, p.prenom, sexe, p.date_naissance
        FROM personne p
        INNER JOIN acteur a ON a.personne_id = p.id_personne
        INNER JOIN casting j ON j.acteur_id = a.id_acteur
       
        WHERE p.id_personne = :id
        ");
        $requete2->execute(['id' => $id]);

        $requete3 = $pdo->prepare("
        SELECT  f.titre, f.annee_sortie, f.id_film
        FROM personne p
        INNER JOIN acteur a ON a.personne_id = p.id_personne
        INNER JOIN casting j ON j.acteur_id = a.id_acteur
        INNER JOIN film f ON j.film_id = f.id_film
        WHERE p.id_personne = :id
        ORDER BY f.annee_sortie DESC");
        $requete3->execute(['id' => $id]);
        require "view/detailActeur.php";
    }

    public function detailRealisateur($id){
        $pdo = Connect::seConnecter();
        $requete3 = $pdo->prepare("
        SELECT p.nom, p.prenom, sexe, p.date_naissance
        FROM personne p
        INNER JOIN realisateur r ON r.personne_id = p.id_personne
        WHERE p.id_personne = :id
        ");
        $requete3->execute(['id' => $id]);

        $requete4 = $pdo->prepare("
        SELECT f.titre, f.annee_sortie, f.id_film
        FROM personne p
        INNER JOIN realisateur r ON r.personne_id = p.id_personne
        INNER JOIN film f ON f.realisateur_id = r.id_realisateur
        WHERE p.id_personne = :id
        ");
        $requete4->execute(['id' => $id]);

        require "view/detailRealisateur.php";
    }

    public function panneauConfig(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT libelle
        FROM role");
        require "view/panneau.php";
    }


    public function addRole(){
        $pdo = Connect::seConnecter();

        $role = filter_input(INPUT_POST,"nom_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(empty($role)){

        }else{
        $stmt = $pdo->prepare("INSERT INTO role (libelle) VALUES (:nom_role)");
        $stmt->execute(['nom_role' => $role]);
        header("Location: index.php?action=panneauConfig");
        }
    }
    public function addActeur(){
        $pdo = Connect::seConnecter();

        $prenom = filter_input(INPUT_POST,"prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST,"nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST,"sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date_naissance = $_POST['date_naissance']/* filter_input(INPUT_POST,"date_naissance", FILTER_SANITIZE_FULL_SPECIAL_Datatypes) */;
        /* ^([0][1-9]|[12][0-9]|3[01])/([0][1-9]|1[0-2])/[0-9]{4}$ */
        /* $date = $_POST['date'] ?? '';
        if (preg_match('#^([0][1-9]|[12][0-9]|3[01])/([0][1-9]|1[0-2])/[0-9]{4}$#', $date)) {
            // Format valide
        } else {
            // Format invalide
        } */
        $stmt = $pdo->prepare("INSERT INTO personne (nom, prenom, sexe, date_naissance) 
                       VALUES (:nom, :prenom, :sexe, :date_naissance)");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'date_naissance' => $date_naissance
        ]);

        $personne_id = $pdo->lastInsertId(); 
        $stmt2 = $pdo->prepare("INSERT INTO acteur (personne_id) VALUES (:pid)");
        $stmt2->execute(['pid' => $personne_id]);
        header("Location: index.php?action=panneauConfig");
    }
}


?>