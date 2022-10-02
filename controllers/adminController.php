<?php


// ajout employe
if (isset($_POST['addEmploye']) || isset($_POST['addMembre'])) {
    extract($_POST);
    
    if (not_empty(['prenom', 'nom', 'adresse', 'courriel', 'ville', 'province', 'code', 'mdp', 'tel', 'type'])) {
        $existingCode = $db->codeAlreadyGet($code);
        if ((isset($_GET['code']) && $existingCode && $existingCode->codeDoc != $_GET['code']) || (!isset($_GET['code']) && $existingCode) ) {
            set_flash("Ce code existe déjà");
        } else {
            $user = new User($code,$prenom, $nom, $adresse, $type, $tel, $courriel, $mdp, $ville, $codePostal, $province);
            if(isset($_GET['code'])){
                if ($db->editUser($user,$_GET['code'])) {
                    set_flash("Edition utilisateur avec succès", "success");
                    clear_input_data();
                }else{
                    set_flash("Erreur d'édition");
                }
            }elseif ($db->addUser($user)) {
                set_flash("Ajout avec succès", "success");
                return $_GET['page'] == 'membres' ? header('Location: ?page=membres') : header('Location: ?page=employe');
            } else {
                set_flash("Erreur d'ajout");
            }
            clear_input_data();
            
        }
        
    }else{
        set_flash("Veuillez remplir tous les champs");
    }
    save_input_data();
}


if (isset($_POST['addDocument'])) {
    extract($_POST);
    save_input_data();
    if (not_empty(['codeDoc', 'titre', 'auteur', 'anneePub', 'genre', 'type', 'description', 'categorie'])) {
        if ($categorie == "Roman" && empty($isbn)) {
            set_flash("Veuillez saisir le champ isbn");
        } else {
            $existingCode = $db->docCodeAlreadyGet($codeDoc);
            if ((isset($_GET['codeDoc']) && $existingCode && $existingCode->codeDoc != $_GET['codeDoc']) || (!isset($_GET['codeDoc']) && $existingCode) ) {
                set_flash("Le code du document existe déjà");
            } else {
                $doc = new Document($codeDoc, $titre, $auteur, $anneePub, $categorie, $type, $genre, $description, $isbn);
                if(isset($_GET['codeDoc'])){
                    if ($db->editDocument($doc,$_GET['codeDoc'])) {
                        set_flash("Edition document avec succès", "success");
                        clear_input_data();
                    }else{
                        set_flash("Erreur d'édition");
                    }
                }elseif ($db->addDocument($doc)) {
                    set_flash("Ajout document avec succès", "success");
                    clear_input_data();
                }else{
                    set_flash("Erreur d'ajout");
                }
            }
        }
        
    } else {
        set_flash("Veuillez remplir tous les champs");
    }
}


if (isset($_POST['addReservation'])) {
    extract($_POST);
    save_input_data();
    if (not_empty(['codeDoc', 'codeMembre', 'dateReserv'])) {
        $reserv = new Reservation($codeMembre, $codeDoc, $dateReserv);
        if(isset($_GET['id'])){
            if ($db->editReservation($reserv, $_GET['id'])) {
                set_flash("Edition reservation avec succès", "success");
            }else{
                set_flash("Erreur d'édition");
            }
        }elseif ($db->addReservation($reserv)) {
            set_flash("Ajout reservation avec succès", "success");
        }else{
            set_flash("Erreur d'ajout");
        }
        clear_input_data();
        
    } else {
        set_flash("Veuillez remplir tous les champs");
    }

}

if (isset($_POST['addPret'])) {
    extract($_POST);
    save_input_data();
    if (not_empty(['codeDoc', 'codeMembre', 'datePret', 'dateRetour'])) {
        $pret = new Pret($codeMembre, $codeDoc, $datePret, $dateRetour);
        if(isset($_GET['id'])){
            if ($db->editPret($pret, $_GET['id'])) {
                set_flash("Edition prêt avec succès", "success");
            }else{
                set_flash("Erreur de prêt");
            }
        }elseif ($db->addPret($pret)) {
            set_flash("Ajout prêt avec succès", "success");
        }else{
            set_flash("Erreur d'ajout");
        }
        clear_input_data();
        
    } else {
        set_flash("Veuillez remplir tous les champs");
    }
}

// informtion des differents tableaux 
if (isset($_GET['edit'])) {
    if ($_GET['edit'] == "doc") {
        $doc = $db->docCodeAlreadyGet($_GET['codeDoc']);
    }else if ($_GET['edit'] == "reservation") {
        $r = $db->getReservationById($_GET['id']);
    }else if ($_GET['edit'] == "pret") {
        $p = $db->getPretById($_GET['id']);
    }else if ($_GET['edit'] == "employe") {
        $em = $db->codeAlreadyGet($_GET['code']);
    }else if ($_GET['edit'] == "membre") {
        $m = $db->codeAlreadyGet($_GET['code']);
    }
}

// informtion des differents tableaux 
if (isset($_GET['info'])) {
    if ($_GET['info'] == "doc") {
        $doc = $db->docCodeAlreadyGet($_GET['codeDoc']);
    }else if ($_GET['info'] == "reservation") {
        $r = $db->getReservationById($_GET['id']);
    }else if ($_GET['info'] == "pret") {
        $p = $db->getPretById($_GET['id']);
    }else if ($_GET['info'] == "employe") {
        $em = $db->codeAlreadyGet($_GET['code']);
    }else if ($_GET['info'] == "membre") {
        $em = $db->codeAlreadyGet($_GET['code']);
    }
       
}

// suppression des enregistrements 
if (isset($_GET['delete'])) {
    if($_GET['delete'] == 'doc'){
        if ($db->removeDocument($_GET['codeDoc'])) {
            set_flash("Suppression de document avec succès", "success");
            return header("Location:?page=document");
        }else{
            set_flash("Erreur de suppression de document");
        }
    }

    if($_GET['delete'] == 'membre' || $_GET['delete'] == 'employe'){
        if ($db->removeUser($_GET['code'])) {
            set_flash("Suppression de l'utilisateur avec succès", "success");
        }else{
            set_flash("Erreur de suppression de l'utilisateur");
        }
    }

    if($_GET['delete'] == 'pret'){
        if ($db->removePret($_GET['id'])) {
            set_flash("Suppression de prêt avec succès", "success");
        }else{
            set_flash("Erreur de suppression de prêt");
        }
    }

    if($_GET['delete'] == 'reservation'){
        if ($db->removeReservation($_GET['id'])) {
            set_flash("Suppression de reservation avec succès", "success");
        }else{
            set_flash("Erreur de suppression de reservation");
        }
    }
}



$employes = $db->employesAndAdmins();
$membres = $db->membres();
$documents = $db->documents();
$reservations = $db->reservations();
$prets = $db->prets();



if($_GET['page'] == "membres"){
    require_once("views/admin/membre.php");
}elseif($_GET['page'] == "employes"){
    require_once("views/admin/employe.php");
}elseif($_GET['page'] == "pret"){
    require_once("views/admin/pret.php");
}elseif($_GET['page'] == "reservation"){
    require_once("views/admin/reservation.php");
}else{
    require_once("views/admin/document.php");
}