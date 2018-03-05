<?php
session_start(); //tant que la session n'a pas demarré, on ne pourra pas utiliser $session
//var_dump($_SESSION);
//die();
include('filter/guest_filter.php');//seul guest peut voir register
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');

// si formulaire soumis
if(isset($_POST['register']))
{
    //si tous les champs ont été remplis
    if(not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])){
        $errors = []; // tableau contenant les erreurs

        extract($_POST); //acces a $postname avec name...

        if(mb_strlen($pseudo) < 3){
            $errors[] = "Pseudo trop court ! (Minimum 3 caractères)";
        }

        if(! filter_var($email, FILTER_VALIDATE_EMAIL)) //constante de php
        {
            $errors[] = "Adresse email invalide!";
        }
        if(mb_strlen($password) < 6)
        {
            $errors[] = "Mot de passe trop court !(minimum 6 caractères)";
        } else {
            if($password != $password_confirm)
            {
                $errors[] = "Les deux mots de passe ne concordent pas";
            }
        }
        if(is_already_in_use('pseudo', $pseudo, 'users'))//verifie unicité pseudo
        {
            $errors[] = "Pseudo déjà utilisé";
        }
        if(is_already_in_use('email', $email, 'users'))
        {
            $errors[] = "Adresse email déjà utilisée";
        }

        if(count($errors) == 0)
        {
            //envoi email activation
            $to = $email;
            $subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";
            $password = sha1($password);
            $token = sha1($pseudo.$email.$password);

            ob_start();
            require('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();
            //tt ce qu'on fait sera gardé en memoire tampon mais pas affiché

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($to, $subject, $content, $headers);

            //informer user pr verif boite de reception
            set_flash ("Mail d'activation envoyé", "danger");

            $q = $db->prepare('INSERT INTO users (name, pseudo, email, password) VALUES (:name, :pseudo, :email, :password)');
            $q ->execute([
                'name' => $name,
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password

            ]);




            redirect ('index.php');
            exit();
        } else {
            save_input_data(); //sauve les infos mais besoin d'une fonction pr les récup

        }

    } else {
$errors[] = "Veuillez remplir tous les champs";
save_input_data();
    }
} else {
    clear_input_data();
}
?>


<?php
require('views/register.view.php');
?>
