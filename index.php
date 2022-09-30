<?php

    session_start();

    // les models ou classes
    require_once("models/Database.php");
    require_once("models/Document.php");
    require_once("models/Pret.php");
    require_once("models/Reservation.php");
    require_once("models/User.php");


    //connexion globale a la base de donnees la variable db est globale
    $db = new Database("biblio");
    require_once('views/includes/_fonctions.php');

    // routeur et corps du site
    if (isset($_GET['page']) && $_GET['page'] != null) {
        // restriction des utilisateurs
        if (isset($_SESSION['user']) && $_SESSION['user']->type == 'employe') {
            if($_GET['page'] == 'employes'){
                return header('Location:?page=document');
            }
        } else if (isset($_SESSION['user']) && $_SESSION['user']->type == 'membre'){
            if($_GET['page'] == 'document' || $_GET['page'] == 'employes' || $_GET['page'] == 'membres' || $_GET['page'] == 'reservation' || $_GET['page'] == 'pret'){
                return header('Location:?page=document membre');
            }
        }else if (isset($_SESSION['user']) && ($_SESSION['user']->type == 'admin' || $_SESSION['user']->type == 'membre')){
            if($_GET['page'] == 'document membre'|| $_GET['page'] == 'reservation membre' || $_GET['page'] == 'pret membre'){
                return header('Location:?page=document');
            }
        }
        
         // entête de page du site
         require_once("views/includes/_header.php");   

        // routeur
        switch ($_GET['page']) {
            case 'document':
                require_once('controllers/adminController.php');
                break;
            case 'employes':
                require_once('controllers/adminController.php');
                break;
            case 'membres':
                require_once('controllers/adminController.php');
                break;
            case 'reservation':
                require_once('controllers/adminController.php');
                break;
            case 'pret':
                require_once('controllers/adminController.php');
                break;
            case 'document membre':
                require_once('controllers/membreController.php');
                break;
            case 'reservation membre':
                require_once('controllers/membreController.php');
                break;
            case 'pret membre':
                require_once('controllers/membreController.php');
                break;
            case 'logout':
                require_once('controllers/logoutController.php');
                break;
            default:
                require_once('controllers/loginController.php');
        }
        // pied de page du site
    }else{
        require_once("views/includes/_enteteLogin.php");
        
        clear_input_data();
        require_once('controllers/loginController.php');
    }
    require_once("views/includes/_footer.php");


    