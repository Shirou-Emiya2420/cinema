<?php ob_start();?>
<!-- Ajour -->
<div class="uk-container uk-margin-large-top">

    <h2 class="uk-heading-line uk-text-center uk-margin-large-bottom"><span>Formulaires d'ajout</span></h2>

    <!-- Ajout d'un Rôle -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Ajouter un rôle</h3>
        <form method="POST" action="index.php?action=addRole" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="nom_role">Nom du rôle</label>
                <input class="uk-input" type="text" id="nom_role" name="nom_role" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
        </form>
    </div>

    <!-- Ajout d'un Réalisateur -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Ajouter un réalisateur</h3>
        <form method="POST" action="index.php?action=addRealisateur" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="prenom">Prénom</label>
                <input class="uk-input" type="text" name="prenom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nom">Nom</label>
                <input class="uk-input" type="text" name="nom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="sexe">Sexe</label>
                <select class="uk-select" name="sexe" required>
                    <option value="">-- Choisir --</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="date_naissance">Date de naissance</label>
                <input class="uk-input" type="date" name="date_naissance" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
        </form>
    </div>

    <!-- Ajout d'un Acteur (identique à réalisateur) -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Ajouter un acteur</h3>
        <form method="POST" action="index.php?action=addActeur" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="prenom">Prénom</label>
                <input class="uk-input" type="text" name="prenom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nom">Nom</label>
                <input class="uk-input" type="text" name="nom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="sexe">Sexe</label>
                <select class="uk-select" name="sexe" required>
                    <option value="">-- Choisir --</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="date_naissance">Date de naissance</label>
                <input class="uk-input" type="date" name="date_naissance" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
        </form>
    </div>

    <!-- Ajout d'un Film -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Ajouter un film</h3>
        <form method="POST" action="index.php?action=addFilm" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="titre">Titre</label>
                <input class="uk-input" type="text" name="titre" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="annee_sortie">Date de sortie</label>
                <input class="uk-input" type="date" id="annee_sortie" name="annee_sortie" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="duree">Durée (min)</label>
                <input class="uk-input" type="number" name="duree" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="note">Note</label>
                <input class="uk-input" type="number" name="note" step="0.1" min="0" max="10">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="resume">Résumé</label>
                <textarea class="uk-textarea" name="resume" rows="4"></textarea>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
        </form>
    </div>

    <!-- Ajout d'un Genre -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Ajouter un genre</h3>
        <form method="POST" action="index.php?action=addGenre" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="nom_genre">Nom du genre</label>
                <input class="uk-input" type="text" id="nom_genre" name="nom_genre" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
        </form>
    </div>

</div>
<!-- Modification -->
<div class="uk-container uk-margin-large-top">

    <h2 class="uk-heading-line uk-text-center uk-margin-large-bottom"><span>Modifications</span></h2>

    <!-- Modifier un rôle -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Modifier un rôle</h3>
        <form method="POST" action="index.php?action=modifRole" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="role">Sélectionner un rôle</label>
                <select class="uk-select" name="id_role" required>
                    <?php foreach ($requete->fetchAll() as $r): ?>
                        <option value="<?= $r['id_role'] ?>"><?= htmlspecialchars($r['libelle']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_libelle">Nouveau nom</label>
                <input class="uk-input" type="text" name="nouveau_libelle" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Modifier</button>
        </form>
    </div>

    <!-- Modifier un genre -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Modifier un genre</h3>
        <form method="POST" action="index.php?action=modifGenre" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="genre">Sélectionner un genre</label>
                <select class="uk-select" name="id_genre" required>
                    <?php foreach ($requete1->fetchAll() as $g): ?>
                        <option value="<?= $g['id_genre'] ?>"><?= htmlspecialchars($g['libelle']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_genre">Nouveau nom</label>
                <input class="uk-input" type="text" name="nouveau_genre" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Modifier</button>
        </form>
    </div>

<!-- Modifier un film -->
<div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Modifier un film</h3>
        <form method="POST" action="index.php?action=modifFilm" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="film">Sélectionner un film</label>
                <select class="uk-select" name="id_film" required>
                    <?php foreach ($requete2->fetchAll() as $f): ?>
                        <option value="<?= $f['id_film'] ?>"><?= htmlspecialchars($f['titre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_titre">Nouveau titre</label>
                <input class="uk-input" type="text" name="nouveau_titre" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_annee">Nouvelle année de sortie</label>
                <input class="uk-input" type="date" name="nouvelle_annee" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_duree">Nouvelle durée (min)</label>
                <input class="uk-input" type="number" name="nouvelle_duree" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_resume">Nouveau résumé</label>
                <textarea class="uk-textarea" name="nouveau_resume" rows="3"></textarea>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_note">Nouvelle note</label>
                <input class="uk-input" type="number" step="0.1" min="0" max="10" name="nouvelle_note">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_image">URL de l'image</label>
                <input class="uk-input" type="text" name="nouvelle_image">
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="id_genre">Genre</label>
                <select class="uk-select" name="id_genre" required>
                    <?php foreach ($requete7->fetchAll() as $g): ?>
                        <option value="<?= $g['id_genre'] ?>"><?= htmlspecialchars($g['libelle']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="id_realisateur">Réalisateur</label>
                <select class="uk-select" name="id_realisateur" required>
                    <?php foreach ($requete8->fetchAll() as $r): ?>
                        <option value="<?= $r['id_realisateur'] ?>">
                            <?= htmlspecialchars($r['prenom'] . ' ' . $r['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="uk-button uk-button-primary" type="submit">Modifier</button>
        </form>
    </div>

    <!-- Modifier une personne -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Modifier une personne</h3>
        <form method="POST" action="index.php?action=modifPersonne" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="personne">Sélectionner une personne</label>
                <select class="uk-select" name="id_personne" required>
                    <?php foreach ($requete3->fetchAll() as $p): ?>
                        <option value="<?= $p['id_personne'] ?>">
                            <?= htmlspecialchars($p['prenom'] . ' ' . $p['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_nom">Nouveau nom</label>
                <input class="uk-input" type="text" name="nouveau_nom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_prenom">Nouveau prénom</label>
                <input class="uk-input" type="text" name="nouveau_prenom" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_date">Nouvelle date de naissance</label>
                <input class="uk-input" type="date" name="nouvelle_date" required>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouveau_sexe">Nouveau sexe</label>
                <select class="uk-select" name="nouveau_sexe" required>
                    <option value="">-- Choisir --</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="nouvelle_image">URL de l'image</label>
                <input class="uk-input" type="text" name="nouvelle_image">
            </div>
            <button class="uk-button uk-button-primary" type="submit">Modifier</button>
        </form>
    </div>

</div>
<!-- Supression -->
<div class="uk-container uk-margin-large-top">

<h2 class="uk-heading-line uk-text-center uk-margin-large-bottom"><span>Suppressions</span></h2>

<!-- Supprimer un film -->
<div class="uk-card uk-card-danger uk-card-body uk-margin-bottom">
    <h3 class="uk-card-title">Supprimer un film</h3>
    <form method="POST" action="index.php?action=suprFilm" class="uk-form-stacked">
        <div class="uk-margin">
            <label class="uk-form-label">Sélectionner un film</label>
            <select class="uk-select" name="id_film" required>
                <?php foreach ($requete5->fetchAll() as $f): ?>
                    <option value="<?= $f['id_film'] ?>"><?= htmlspecialchars($f['titre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="uk-button uk-button-danger" type="submit">Supprimer</button>
    </form>
</div>

<!-- Supprimer une personne -->
<div class="uk-card uk-card-danger uk-card-body uk-margin-bottom">
    <h3 class="uk-card-title">Supprimer une personne</h3>
    <form method="POST" action="index.php?action=suprPersonne" class="uk-form-stacked">
        <div class="uk-margin">
            <label class="uk-form-label">Sélectionner une personne</label>
            <select class="uk-select" name="id_personne" required>
                <?php foreach ($requete6->fetchAll() as $p): ?>
                    <option value="<?= $p['id_personne'] ?>">
                        <?= htmlspecialchars($p['prenom'] . ' ' . $p['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="uk-button uk-button-danger" type="submit">Supprimer</button>
    </form>
</div>

<!-- Supprimer un genre -->
<div class="uk-card uk-card-danger uk-card-body uk-margin-bottom">
    <h3 class="uk-card-title">Supprimer un genre</h3>
    <form method="POST" action="index.php?action=suprGenre" class="uk-form-stacked">
        <div class="uk-margin">
            <label class="uk-form-label">Sélectionner un genre</label>
            <select class="uk-select" name="id_genre" required>
                <?php foreach ($requete4->fetchAll() as $g): ?>
                    <option value="<?= $g['id_genre'] ?>"><?= htmlspecialchars($g['libelle']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="uk-button uk-button-danger" type="submit">Supprimer</button>
    </form>
</div>

<!-- Supprimer un rôle -->
<div class="uk-card uk-card-danger uk-card-body uk-margin-bottom">
    <h3 class="uk-card-title">Supprimer un rôle</h3>
    <form method="POST" action="index.php?action=suprRole" class="uk-form-stacked">
        <div class="uk-margin">
            <label class="uk-form-label">Sélectionner un rôle</label>
            <select class="uk-select" name="id_role" required>
                <?php foreach ($requete0->fetchAll() as $r): ?>
                    <option value="<?= $r['id_role'] ?>"><?= htmlspecialchars($r['libelle']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="uk-button uk-button-danger" type="submit">Supprimer</button>
    </form>
</div>

</div>

<?php 
$titre = "Panneau de Configuration";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>