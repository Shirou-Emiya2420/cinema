<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> films</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($requete->fetchAll() as $film){ ?>
            <tr>
                <td><a href="?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["annee_sortie"] ?></td>
            </tr>
       <?php } ?>

    </tbody>
</table>

<?php 
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
?>