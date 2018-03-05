<?php
session_start(); //tant que la session n'a pas demarré, on ne pourra pas utiliser $session
//var_dump($_SESSION);
//die();
include_once('includes/constants.php');
include_once('filter/user_filter.php'); // seul visiteur va voir login

require_once('config/database.php');
require_once('includes/functions.php');

if(isset($_POST['publish'])){
    if(!empty($_POST['content'])){
        extract($_POST);
        $q = $db->prepare('INSERT INTO microposts(contenu, created_at, pseudopost, user_id) VALUES (:content, NOW(), :pseudopost, :user_id)');
        $q->execute([
            'contenu' => $contenu,
            'pseudopost' => $pseudopost,
            'user_id' => get_session('user_id')
        ]);

        set_flash('Votre article a été posté');
    }
}

require_once('views/micropost.view.php');