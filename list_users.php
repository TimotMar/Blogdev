<?php
session_start();

require('config/database.php');
require("includes/functions.php");
require('includes/constants.php');

$q = $db->query("SELECT id, pseudo, email FROM users WHERE active='1' ORDER BY pseudo");
$users = $q->fetchAll(PDO::FETCH_OBJ);



require("views/list_users.view.php");