<?php
session_start();

include('../controller/filter/user_filter.php'); // on affiche la page si et suelement si l'user est connecté
require('config/database.php');
require("../controller/includes/functions.php");
require('../controller/includes/constants.php');


if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')){
    //recup info user en BDD en utilisant identifiant
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('../index.php');
    }
}else {
    redirect('profile.php?id='.get_session('user_id')); // redirection avec le bon id
}


if(isset($_POST['update'])) {
    $errors = [];
    //si tous les champs ont été remplis
    if (not_empty(['name', 'city', 'country', 'sex', 'bio'])) {

        extract($_POST); //permet d'avoir acces a tte les variables contenues dans le post

        $q = $db->prepare("UPDATE users SET name = :name, city = :city, country = :country, sex = :sex, twitter = :twitter, github = :github, facebook = :facebook, available_for_hiring = :available_for_hiring, bio = :bio WHERE id = :id");
        $q->execute([
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'sex' => $sex,
            'twitter' => $twitter,
            'github' => $github,
            'facebook' => $facebook,
            'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0', //Si pas empty : coché, donc valeur 1, sinon 0
            'bio' => $bio,
            'id' => get_session('user_id')
        ]);
        set_flash("Votre profil a été mis à jour");
        redirect('profile.php?id='.get_session('user_id'));
    } else {
        save_input_data();
        $errors[] = "Veuillez remplir tous les champs marqués d'un *";
    }


} else {
    clear_input_data();
}

require("../views/edit_user.view.php");