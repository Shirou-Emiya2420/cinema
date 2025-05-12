<?php ob_start(); 
$film = $requete->fetch()
?>


<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-width-1-2@m uk-margin-auto">
    <h3 class="uk-card-title"><?= $film["titre"] ?></h3>
    <ul class="uk-list uk-list-divider">
        <li><strong>Année :</strong> <?= $film["annee_sortie"] ?></li>
        <li><strong>Durée :</strong> <?= $film["duree"] ?> min</li>
        <li><strong>Note :</strong> <?= $film["note"] ?>/10</li>
    </ul>
    <h4 class="uk-heading-line"><span>Résumé</span></h4>
    <p><?= $film["resume"] ?? 'Aucun résumé disponible.' ?></p>
    <h4 class="uk-heading-line"><span>Réalisateur</span></h4>
    <ul class="uk-list uk-list-bullet">
        <?php foreach ($requete3->fetchAll() as $real) : ?>
            <li><a href="?action=detailReaslisateur&id=<?= $real["id_personne"]?>"><?= $real["pp"] ?> <?= $real["pn"] ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h4 class="uk-heading-line"><span>Acteurs</span></h4>
    <ul class="uk-list uk-list-striped">
        <?php foreach ($requete2->fetchAll() as $acteur) : ?>
            <li><a href="?action=detailActeur&id=<?= $acteur["id_personne"]?>"><?= $acteur["pp"] ?> <?= $acteur["pn"] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>



<?php 
$titre = $film["titre"];
$titre_secondaire = " ";
$contenu = ob_get_clean();
require "view/template.php";
?>