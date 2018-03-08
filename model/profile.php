<?php
session_start();

require('../controller/includes/constants.php');
require("../controller/includes/functions.php");
include('../controller/filter/user_filter.php'); // on affiche la page si et suelement si l'user est connecté
require('model/config/database.php');




if(!empty($_GET['id'])){
        //recup info user en BDD en utilisant identifiant
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('../index.php');
    } else {
        $q = $db->prepare('SELECT contenu, created_at FROM microposts WHERE user_id = :user_id ORDER BY created_at DESC');
        $q->execute([
            'user_id' => get_session('user_id')
        ]);
        $microposts = $q->fetchAll(PDO::FETCH_OBJ);
    }
}else {
    redirect('model/profile.php?id='.get_session('user_id')); // redirection avec le bon id
}

require("../views/profile.view.php");


