<?php
session_start(); //tant que la session n'a pas demarré, on ne pourra pas utiliser $session
//var_dump($_SESSION);
//die();
include('../controller/filter/user_filter.php'); // seul visiteur va voir login
require('../controller/includes/functions.php');
require('model/config/database.php');
require('../controller/includes/constants.php');

if(!empty($_GET['id'])){
   $data = find_code_by_id($_GET['id']);

        if(!$data) { //si pas de contenu : on redirige
            redirect('model/share_code.php');
        }
} else{ // si pas d'id, on redirige
    redirect('model/share_code.php');
}



?>
<?php
require('../views/show_code.view.php');
?>