<?php ob_start();?>

<div class="uk-container uk-margin-large-top">
    <div class="uk-card uk-card-default uk-card-body uk-width-1-3@m uk-margin-auto">
        <h3 class="uk-card-title">Ajouter un rôle</h3>
        <form action="index.php?action=addRole" method="POST" class="uk-form-stacked">
            
            <div class="uk-margin">
                <label class="uk-form-label" for="nom_role">Nom du rôle</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="nom_role" name="nom_role" type="text" required>
                </div>
            </div>
            <input type="hidden" name="action" value="addRole">
            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>
<form method="GET" action="index.php" class="uk-form-horizontal uk-margin">
    <div class="uk-margin">
        <label class="uk-form-label" for="role">Choisir un rôle</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="role" name="role">
                <?php foreach ($requete->fetchAll() as $r): ?>
                    <option value="<?= htmlspecialchars($r['libelle']) ?>">
                        <?= htmlspecialchars($r['libelle']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="uk-margin">
        <button class="uk-button uk-button-primary" type="submit">Valider</button>
    </div>
</form>

<div class="uk-container uk-margin-large-top">
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <h3 class="uk-card-title">Ajouter un Acteur</h3>
        <form action="index.php?action=addActeur" method="POST" class="uk-form-stacked">

            <div class="uk-margin">
                <label class="uk-form-label" for="prenom">Prénom</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="prenom" name="prenom" type="text" required>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="nom">Nom</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="nom" name="nom" type="text" required>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="sexe">Sexe</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="sexe" name="sexe" required>
                        <option value="">-- Sélectionnez --</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="date_naissance">Date de naissance</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="date_naissance" name="date_naissance" type="date" required>
                </div>
            </div>

            <div class="uk-margin uk-text-center">
                <button class="uk-button uk-button-primary" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>



<?php 
$titre = "Panneau de Configuration";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>