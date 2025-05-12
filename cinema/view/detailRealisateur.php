<?php ob_start();?>

<?php
$realisateur = $requete3->fetch(); // un seul réalisateur
?>

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
    <h3 class="uk-card-title"><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></h3>
    <ul class="uk-list uk-list-divider">
        <li><strong>Sexe :</strong> <?= ucfirst($realisateur["sexe"]) ?></li>
        <li><strong>Date de naissance :</strong> <?= date('d/m/Y', strtotime($realisateur["date_naissance"])) ?></li>
    </ul>

    <h4 class="uk-heading-line"><span>Film(s) réalisé(s)</span></h4>
    <ul class="uk-list uk-list-striped">
        <?php
        foreach ($requete4->fetchAll() as $film): ?>
            <li><a href="?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"] ?></a> (<?= $film["annee_sortie"] ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>


<?php 
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
?>