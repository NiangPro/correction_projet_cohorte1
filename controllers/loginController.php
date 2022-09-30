<?php

$_SESSION['user'] = null;

if (isset($_POST['login'])) {
    extract($_POST);
    $user = $db->login($code, $mdp);

    if ($user) {
        clear_input_data();
        $_SESSION['user'] = $user;
        if($user->type === "admin" || $user->type === "employe"){
            // page admin et employe
            return header('Location:?page=document');
        }else{
            // page membre
            return header('Location:?page=document membre');
        }
    }else{
        set_flash("Code ou Mot de passe incorrect");
    }
    save_input_data();
}
require_once("views/login.php");
