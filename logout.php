<?php
session_start();
session_destroy();

$_SESSION = []; // tableau vide pr bien valider qu'on a plus les infos

header('Location: login.php');

?>
