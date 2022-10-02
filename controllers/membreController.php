<?php

// Traitement des requetes
if (isset($_POST['addReservation'])) {
    extract($_POST);
    save_input_data();
    if (not_empty(['codeDoc', 'dateReserv'])) {
        $reserv = new Reservation($_SESSION['user']->code, $codeDoc, $dateReserv);
        if ($db->addReservation($reserv)) {
            set_flash("Ajout reservation avec succès", "success");
            supprimer([$_GET['add']]);

        }else{
            set_flash("Erreur d'ajout");
        }
        clear_input_data();
        
    } else {
        set_flash("Veuillez remplir tous les champs");
    }

}

// informtion des differents sections du sidebar 
if (isset($_GET['info'])) {
    if ($_GET['info'] == "doc") {
        $doc = $db->docCodeAlreadyGet($_GET['codeDoc']);
    }else if ($_GET['info'] == "reservation") {
        $r = $db->getReservationById($_GET['id']);
    }else if ($_GET['info'] == "pret") {
        $p = $db->getPretById($_GET['id']);
    }
       
}


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