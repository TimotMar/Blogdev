<?php
session_start();
include('../controller/filter/guest_filter.php'); //seul le visiteur peut voir activation.php
require ('model/config/database.php');
require ('../controller/includes/functions.php');

if(!empty($_GET['p']) && is_already_in_use('pseudo', $_GET['p'], 'users') && !empty($_GET['token'])) //si getp existe et qu'il existe dans la BDD : on continue
{
 $pseudo = $_GET['p'];
 $token = $_GET['token'];

 $q = $db->prepare('SELECT email, password FROM users WHERE pseudo = ?');
 $q->execute([$pseudo]);



 $data = $q->fetch(PDO::FETCH_OBJ); // on récupere les information de la requete sous forme d'objet

    $token_verif = sha1($pseudo.$data->email.$data->password);
if($token == $token_verif){
    $q = $db->prepare("UPDATE users SET active = '1' WHERE pseudo = ?");
    $q->execute([$pseudo]);

    redirect('model/login.php');

} else {
    set_flash('Paramètres invalides', 'danger');
    redirect('../index.php');
}

} else {
    redirect('../index.php');
}