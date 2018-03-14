<?php
session_start();
session_destroy();

$_SESSION = []; // emptying the array

header('Location: model/login.php');

?>
