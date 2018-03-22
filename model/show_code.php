<?php
session_start(); //as long as the session is not started, we can't use $session
//var_dump($_SESSION);
//die();
include('../controller/filter/user_filter.php'); // only guest can see login
require('../controller/includes/functions.php');
require('../model/config/database.php');
require('../controller/includes/constants.php');

if (!empty($_GET['id'])) {
    $data = find_code_by_id($_GET['id']);

    if (!$data) { //if no content : redirection
            redirect('../model/share_code.php');
    }
} else { // if no id : redirection
    redirect('../model/share_code.php');
}



?>
<?php
require('../views/show_code.view.php');
