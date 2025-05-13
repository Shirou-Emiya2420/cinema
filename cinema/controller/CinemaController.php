<?php
namespace Controller;
use Model\Connect;

class CinemaController {
        /* Affiche la liste des films */
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
        /* Affiche le détail d'un acteur */
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
        /* Affiche le détail d'un réalisateur */
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
        /* Fait toutes les requets necessaire à l'affichage du panneau de configuration */
    public function panneauConfig(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT libelle, id_role
        FROM role");
        $requete1 = $pdo->query("
        SELECT libelle, id_genre
        FROM genre");
        $requete2 = $pdo->query("
        SELECT titre, id_film
        FROM film");
        $requete3 = $pdo->query("
        SELECT nom, prenom, id_personne
        FROM personne");


        $requete0 = $pdo->query("
        SELECT libelle, id_role
        FROM role");
        $requete4 = $pdo->query("
        SELECT libelle, id_genre
        FROM genre");

        $requete5 = $pdo->query("
        SELECT titre, id_film
        FROM film");
        $requete6 = $pdo->query("
        SELECT nom, prenom, id_personne
        FROM personne");

        $requete7 = $pdo->query("
        SELECT libelle, id_genre
        FROM genre");
        $requete8 = $pdo->query("
        SELECT nom, prenom, id_personne, id_realisateur
        FROM personne p
        INNER JOIN realisateur r ON r.personne_id = p.id_personne");

        require "view/panneau.php";
    }

    
    
    
    /* Supprime des elements */
        /* Supprime un genre dans la tableau genre */
    public function suprGenre() {
        $pdo = Connect::seConnecter();
        $id = filter_input(INPUT_POST, 'id_genre', FILTER_VALIDATE_INT);
    
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM genre WHERE id_genre = :id");
            $stmt->execute(['id' => $id]);
        }
    
        header("Location: index.php?action=panneauConfig");
    }
        /* Supprime un role dans la table role */
    public function suprRole() {
        $pdo = Connect::seConnecter();
        $id = filter_input(INPUT_POST, 'id_role', FILTER_VALIDATE_INT);
    
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM role WHERE id_role = :id");
            $stmt->execute(['id' => $id]);
        }
    
        header("Location: index.php?action=panneauConfig");
    }
        /* Supprime un film dans la table film */
    public function suprFilm() {
        $pdo = Connect::seConnecter();
        $id = filter_input(INPUT_POST, 'id_film', FILTER_VALIDATE_INT);
    
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM film WHERE id_film = :id");
            $stmt->execute(['id' => $id]);
        }
    
        header("Location: index.php?action=panneauConfig");
    }
        /* Supprime une perosnne dans la table personne */
    public function suprPersonne() {
        $pdo = Connect::seConnecter();
        $id = filter_input(INPUT_POST, 'id_personne', FILTER_VALIDATE_INT);
    
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM personne WHERE id_personne = :id");
            $stmt->execute(['id' => $id]);
        }
    
        header("Location: index.php?action=panneauConfig");
    }
    
    /* Modifie des elements */
        /* Modifie un genre dans la table genre */
    public function modifGenre(){
        $pdo = Connect::seConnecter();

        $genre = filter_input(INPUT_POST,"nouveau_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_genre = filter_input(INPUT_POST,"id_genre", FILTER_VALIDATE_INT);

        if(empty($genre)){
            header("Location: index.php");
        }else{
            $stmt = $pdo->prepare("UPDATE genre SET libelle = :nom WHERE id_genre = :id");
            $stmt->execute([
                'nom' => $genre,
                'id' => $id_genre
            ]);            
        header("Location: index.php?action=panneauConfig");
        }
    }
        /* Modifie un role dans la table role */
    public function modifRole(){
        $pdo = Connect::seConnecter();

        $role = filter_input(INPUT_POST,"nouveau_libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_role = filter_input(INPUT_POST,"id_role", FILTER_VALIDATE_INT);

        if(empty($genre)){
            header("Location: index.php");
        }else{
            $stmt = $pdo->prepare("UPDATE genre SET nom_genre = :nom WHERE id_genre = :id");
            $stmt->execute([
                'nom' => $role,
                'id' => $id_role
            ]);            
        header("Location: index.php?action=panneauConfig");
        }
    }
        /* Modifie un film dans la table film */
    public function modifFilm() {
        $pdo = Connect::seConnecter();
    
        $id = filter_input(INPUT_POST, "id_film", FILTER_VALIDATE_INT);
        $titre = filter_input(INPUT_POST, "nouveau_titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $annee = $_POST["nouvelle_annee"] ?? null;
        $duree = filter_input(INPUT_POST, "nouvelle_duree", FILTER_VALIDATE_INT);
        $resume = filter_input(INPUT_POST, "nouveau_resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, "nouvelle_note", FILTER_VALIDATE_FLOAT);
        $image = filter_input(INPUT_POST, "nouvelle_image", FILTER_SANITIZE_URL);
        $id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_VALIDATE_INT);
        $id_genre = filter_input(INPUT_POST, "id_genre", FILTER_VALIDATE_INT);
    
        if (!$id || !$titre || !$annee || !$duree || !$id_realisateur || !$id_genre) {
            header("Location: index.php");
            exit;
        }
    
        // Mise à jour du film
        $stmt = $pdo->prepare("UPDATE film 
                               SET titre = :titre, annee_sortie = :annee, duree = :duree, resume = :resume, 
                                   note = :note, image_url = :image, realisateur_id = :realisateur 
                               WHERE id_film = :id");
        $stmt->execute([
            'titre' => $titre,
            'annee' => $annee,
            'duree' => $duree,
            'resume' => $resume,
            'note' => $note,
            'image' => $image,
            'realisateur' => $id_realisateur,
            'id' => $id
        ]);
    
        // Ajout du nouveau genre
        $pdo->prepare("INSERT INTO genre_film (film_id, genre_id) VALUES (:film, :genre)")
            ->execute([
                'film' => $id,
                'genre' => $id_genre
            ]);
    
        header("Location: index.php?action=panneauConfig");
    }
        /* modifi une personne dans la table personne */
    public function modifPersonne() {
        $pdo = Connect::seConnecter();
    
        $id = filter_input(INPUT_POST, "id_personne", FILTER_VALIDATE_INT);
        $nom = filter_input(INPUT_POST, "nouveau_nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, "nouveau_prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, "nouveau_sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date_naissance = $_POST["nouvelle_date"] ?? null;
        $image = filter_input(INPUT_POST, "nouvelle_image", FILTER_SANITIZE_URL);
    
        if (!$id || !$nom || !$prenom || !$sexe || !$date_naissance) {
            header("Location: index.php");
            exit;
        }
    
        $stmt = $pdo->prepare("UPDATE personne SET nom = :nom, prenom = :prenom, sexe = :sexe, date_naissance = :date, image = :image WHERE id_personne = :id");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'date' => $date_naissance,
            'image' => $image,
            'id' => $id
        ]);
    
        header("Location: index.php?action=panneauConfig");
    }


    /* Ajoute des elements */
        /* Ajoute un nouveau rôle dans la table rôle  */
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
        /* Ajoute un nouvel acteur dans la table acteur */
    public function addActeur(){
        $pdo = Connect::seConnecter();

        $prenom = filter_input(INPUT_POST,"prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST,"nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST,"sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $date_naissance = $_POST['date_naissance'] ?? '';
        $date_valid = \DateTime::createFromFormat('Y-m-d', $date_naissance);
        if (!$date_valid || $date_valid->format('Y-m-d') !== $date_naissance) {
            header("Location: index.php?action=panneauConfig");
            exit;
        }
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
        /* Ajoute un nouveau realisateur dans la table realisateur */
    public function addRealisateur() {
        $pdo = Connect::seConnecter();
    
        $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $date_naissance = $_POST['date_naissance'] ?? '';
        $date_valid = \DateTime::createFromFormat('Y-m-d', $date_naissance);
        if (!$date_valid || $date_valid->format('Y-m-d') !== $date_naissance) {
            header("Location: index.php?action=panneauConfig");
            exit;
        }
    
        $stmt = $pdo->prepare("INSERT INTO personne (nom, prenom, sexe, date_naissance)
                               VALUES (:nom, :prenom, :sexe, :date_naissance)");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'date_naissance' => $date_naissance
        ]);
    
        $personne_id = $pdo->lastInsertId();
        $stmt2 = $pdo->prepare("INSERT INTO realisateur (personne_id) VALUES (:pid)");
        $stmt2->execute(['pid' => $personne_id]);
    
        header("Location: index.php?action=panneauConfig");
    }
        /* Ajoute un nouveau genre dans la table genre */
    public function addGenre() {
        $pdo = Connect::seConnecter();
    
        $nom_genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        if (!$nom_genre) {
            header("Location: index.php?action=panneauConfig");
            exit;
        }
    
        $stmt = $pdo->prepare("INSERT INTO genre (libelle) VALUES (:nom)");
        $stmt->execute(['nom' => $nom_genre]);
    
        header("Location: index.php?action=panneauConfig");
    }
        /* Ajoute un nouveau film dans la table film */
    public function addFilm() {
        $pdo = Connect::seConnecter();
    
        $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
        $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_FLOAT);
        $resume = filter_input(INPUT_POST, "resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $annee = $_POST['annee_sortie'] ?? '';
        $date_valid = \DateTime::createFromFormat('Y-m-d', $annee);
        if (!$date_valid || $date_valid->format('Y-m-d') !== $annee) {
            header("Location: index.php?action=listFilms");
            exit;
        }

        if (!$titre || !$duree || !$annee) {
            header("Location: index.php?action=listFilms");
            exit;
        }else{
            $stmt = $pdo->prepare("INSERT INTO film (titre, annee_sortie, duree, note, resume)
            VALUES (:titre, :annee, :duree, :note, :resume)");
            $stmt->execute([
            'titre' => $titre,
            'annee' => $annee,
            'duree' => $duree,
            'note' => $note ?: null,
            'resume' => $resume
            
            ]);
            header("Location: index.php?action=panneauConfig");
        }
    

    }
    
}


?>