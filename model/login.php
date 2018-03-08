<?php
session_start(); //tant que la session n'a pas demarré, on ne pourra pas utiliser $session
//var_dump($_SESSION);
//die();
include('../controller/filter/guest_filter.php'); // seul visiteur va voir login
require('../controller/includes/functions.php');
require('model/config/database.php');
require('../controller/includes/constants.php');

// si formulaire soumis
if(isset($_POST['login'])) {
    //si tous les champs ont été remplis
    if (not_empty(['identifiant', 'password'])) {

            extract($_POST); //permet d'avoir acces a tte les variables contenues dans le post

            $q = $db->prepare("SELECT id, pseudo, email FROM users 
                                        WHERE (pseudo = :identifiant OR email = :identifiant) 
                                        AND password = :password AND active = '1'");
            $q->execute([
                'identifiant' => $identifiant,
                'password' => sha1($password)
            ]);
            //si tu trouves id : utilisateur, dis moi combien tu en as trouvé
            $userHasBeenFound = $q->rowCount();

            if($userHasBeenFound){
                //on peut récupérer données car on a un session start
                $user = $q->fetch(PDO::FETCH_OBJ);

                $_SESSION['user_id'] = $user->id; //stockage de l'id
                $_SESSION['pseudo'] = $user->pseudo;
                $_SESSION['email'] = $user->email;// permet l'affichage de l'image gravatar
                //on garde ça tant que la session est active. user connecté que si id et pseudo existent
                redirect_intent_or('model/profile.php?id='.$user->id);
            } else {
                set_flash('Combinaison Identifiant/Password incorrecte', 'danger');
                save_input_data();
            }


    } else {
        clear_input_data();
    }
}
?>


<?php
require('../views/login.view.php');
?>
