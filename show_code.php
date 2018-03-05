<?php
session_start(); //tant que la session n'a pas demarré, on ne pourra pas utiliser $session
//var_dump($_SESSION);
//die();
include('filter/user_filter.php'); // seul visiteur va voir login
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');

if(!empty($_GET['id'])){
   $data = find_code_by_id($_GET['id']);

        if(!$data) { //si pas de contenu : on redirige
            redirect('share_code.php');
        }
} else{ // si pas d'id, on redirige
    redirect('share_code.php');
}



?>
<?php
require('views/show_code.view.php');
?>