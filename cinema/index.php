<?php 

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
if(isset($_GET["action"]) || isset($_GET["id"])){
    switch($_GET["action"]){
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($_GET["id"]); break;
        case "detailActeur" : $ctrlCinema->detailActeur($_GET["id"]); break;
        case "detailReaslisateur" : $ctrlCinema->detailRealisateur($_GET["id"]); break;
        case "panneauConfig" : $ctrlCinema->panneauConfig(); break;

        case "addRole" : $ctrlCinema->addRole(); break;
        case "addActeur" : $ctrlCinema->addActeur(); break;
        case "addRealisateur" : $ctrlCinema->addRealisateur(); break;
        case "addFilm" : $ctrlCinema->addFilm(); break;
        case "addGenre" : $ctrlCinema->addGenre(); break;

        case "modifGenre" : $ctrlCinema->modifGenre(); break;
        case "modifRole" : $ctrlCinema->modifRole(); break;
        case "modifPersonne" : $ctrlCinema->modifPersonne(); break;
        case "modifFilm" : $ctrlCinema->modifFilm(); break;

        case "suprGenre" : $ctrlCinema->suprGenre(); break;
        case "suprRole" : $ctrlCinema->suprRole(); break;
        case "suprPersonne" : $ctrlCinema->suprPersonne(); break;
        case "suprFilm" : $ctrlCinema->suprFilm(); break;
        //case "listActeurs" : $ctrlCinema->listActeurs(); break;
        default : $ctrlCinema->listFilms(); break;
    }
}else{
    $ctrlCinema->listFilms();
}

?>