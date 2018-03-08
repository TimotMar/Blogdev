<?php
session_start();

require('config/database.php');
require("../controller/includes/functions.php");
require('../controller/includes/constants.php');

$q = $db->query("SELECT id, pseudo, email FROM users WHERE active='1' ORDER BY pseudo");
$users = $q->fetchAll(PDO::FETCH_OBJ);



require("../views/list_users.view.php");