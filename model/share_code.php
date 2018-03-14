<?php
session_start(); //as long as the session is not started, we can't use $session
//var_dump($_SESSION);
//die();
//this page is used for the share code system, not used in here yet
include('../controller/filter/user_filter.php'); // onyl guest can see login
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

    // if form submitted
if(isset($_POST['save'])) {
   if (not_empty(['code'])) {

extract($_POST);

$q = $db->prepare("INSERT INTO codes(code) VALUES(?)");
$success = $q->execute([$code]);

if($success){
    //displlay src code
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