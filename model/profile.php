<?php
session_start();

require('../controller/includes/constants.php');
require("../controller/includes/functions.php");
include('../controller/filter/user_filter.php'); // we see page only if user is logged in
require('config/database.php');




if (!empty($_GET['id'])) {
        //recovering of the user data in DB using Id
    $user = find_user_by_id($_GET['id']);

    if (!$user) {
        redirect('../index.php');
    } else {
        $q = $db->prepare('SELECT contenu, created_at FROM microposts WHERE user_id = :user_id ORDER BY created_at DESC');
        $q->execute([
            'user_id' => get_session('user_id')
        ]);
        $microposts = $q->fetchAll(PDO::FETCH_OBJ);
    }
} else {
    redirect('profile.php?id='.get_session('user_id')); // redirection with correct id
}

require("../views/profile.view.php");
