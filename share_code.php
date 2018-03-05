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
    redirect('show_code.php?id='.$id);
} else{
    set_flash("Erreur lors de l'ajout du code source, veuillez réessayer SVP");
    redirect("share_code.php");
}
        } else {
            redirect("share_code.php");
        }
    }



?>
<?php
require('views/share_code.view.php');
?>