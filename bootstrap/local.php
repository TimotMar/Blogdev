<?php

$authorized_languages = ['fr', 'en']; //initialisation de deux tableaux
  if(!empty($_GET['lang']) && in_array($_GET['lang'], $authorized_languages)){//definition langue ou non
$_SESSION['local'] = $_GET['lang'];
} else{
      if(empty($_SESSION['local'])){
          $_SESSION['local'] = $authorized_languages[0];//si pas de langue en session : [0] donc fr. Sinon, tu mets la langue qui est en session
      }

  }

  require'locals/menu.php';