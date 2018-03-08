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

        if(!$data){
            $code = "";
        } else {
            $code = $data->code;
        }

} else {
    $code = "";
}

    // si formulaire soumis
if(isset($_POST['save'])) {
   if (not_empty(['code'])) {

extract($_POST);

$q = $db->prepare("INSERT INTO codes(code) VALUES(?)");
$success = $q->execute([$code]);

if($success){
    //afficher code source
    $id = $db->lastInsertId();
    redirect('model/show_code.php?id='.$id);
} else{
    set_flash("Erreur lors de l'ajout du code source, veuillez réessayer SVP");
    redirect("model/share_code.php");
}
        } else {
            redirect("model/share_code.php");
        }
    }



?>
<?php
require('../views/share_code.view.php');
?>