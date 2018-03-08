<?php


if(!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])){
$_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
//on a sauvegardé en session l'URL vers lequel l'utilisation voulait se diriger
    $_SESSION['notification']['message'] = 'Vous devez être connecté pour accéder à cette page';
    $_SESSION['notification']['type'] = 'danger';
    header('Location: ../../model/login.php'); // redirection
    exit();
}
?>