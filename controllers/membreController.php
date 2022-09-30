<?php

// Traitement des requetes



$documents = $db->documents();
$reservations = $db->reservationsMembre($_SESSION['user']->code);
$prets = $db->pretsMembre($_SESSION['user']->code);



// Redirection des pages
if($_GET['page'] == "pret membre"){
    require_once("views/membre/pret.php");
}elseif($_GET['page'] == "reservation membre"){

    require_once("views/membre/reservation.php");
}else{
    require_once("views/membre/document.php");
}