<?php

namespace Controller;
use Model\Connect;


if(isset($_POST["nom_role"])){
    $pdo = Connect::seConnecter();
    $connect = $pdo->prepare("INSERT INTO role (libelle) VALUES (:nom_role)");
    $connect->execute(['nom_role' => $_POST['nom_role']]);

    header("Location: index.php?action=panneauConfig");
    exit;
}


?>