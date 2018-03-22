<?php
session_start(); //as long as the session is not started, we can't use $session
//var_dump($_SESSION);
//die();
include_once('../controller/includes/constants.php');
include_once('../controller/filter/user_filter.php'); // only guest will see login

require_once('../model/config/database.php');
require_once('../controller/includes/functions.php');
//managing of the micropost system. Not functionnal in here, used for the social network system
if (isset($_POST['publish'])) {
    if (!empty($_POST['content'])) {
        extract($_POST);
        $q = $db->prepare('INSERT INTO microposts(contenu, created_at, pseudopost, user_id) 
VALUES (:content, NOW(), :pseudopost, :user_id)');
        $q->execute([
            'contenu' => $contenu,
            'pseudopost' => $pseudopost,
            'user_id' => get_session('user_id')
        ]);

        set_flash('Votre article a été posté');
    }
}

require_once('../views/micropost.view.php');
