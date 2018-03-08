<?php

if(!function_exists('e')){
    function e($string){
        if($string){
            return htmlspecialchars($string);
        }
    }
}

//redirection vers la page dem andée
if(!function_exists('redirect_intent_or')){
    function redirect_intent_or($default_url){
        if($_SESSION['forwarding_url']){
            $url = $_SESSION['forwarding_url'];//on redirige vers la page demandée (URL)
        } else {
            $url = $default_url;
        }
        $_SESSION['forwarding_url'] = null;//évite une redirection en boucle
        redirect($url);
    }
}


if(!function_exists('get_session')){
    function get_session($key){
        if($key){
            return !empty($_SESSION[$key]) ? e($_SESSION[$key]) : null;
// en ternaire : return !empty($_SESSION['input'][$key]) ? $_SESSION['input'][$key] : null;
        }
        }
    }
//récupération de la langue locale
if(!function_exists('get_current_local')) {
    function get_current_local()
    {
        return $_SESSION['local'];
    }
}

//check if user is logged
if(!function_exists('is_logged_in()')){
    function is_logged_in(){
        return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']); //booleen : true or false. SI un des deux bon : true
    }
}

//get_avatar_url
    if(!function_exists('get_avatar_url')){
    function get_avatar_url($email, $size = 25){
        return "http://fr.gravatar.com/avatar/".md5(strtolower(e(trim($email))))."?s=".$size;//le trim sert à supprimer les espace
        }
    }


    //find_user_by_id
if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
        global $db;

        $q = $db->prepare('SELECT name, pseudo, email, city, country, twitter, github, facebook, sex, available_for_hiring, bio FROM users WHERE id=?');
    $q->execute([$id]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    $q->closeCursor();
    return $data;
    }
}
//find_code_by_id
if(!function_exists('find_code_by_id')){
    function find_code_by_id($id){
        global $db;

        $q = $db->prepare('SELECT code FROM codes WHERE id = ?');
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();
        return $data;
    }
}


if(!function_exists('not_empty')){ //defined verifie l'existence d'une constante et non l'existence d'une fonction
function not_empty($fields = []){
    if(count($fields) !=0){
        foreach($fields as $field)
        {
            if(empty($_POST [$field]) || trim($_POST[$field]) == ""){ //trim enleve les espaces, donc si vide : false
                return false;
            }
        }
        return true ; //tt les champs remplis
    }
    }
    }

if(!function_exists('is_already_in_use'))
{
    function is_already_in_use($field, $value, $table){
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?"); // ex si $field est l'email : ? = email
        $q->execute([$value]);

        $count = $q->rowCount();
        $q->closeCursor();
        return $count; //0 si valeur existe pas, donc false, 1 si existe DONC TRUE.
    }
}

if(!function_exists('set_flash')){
    function set_flash($message, $type = 'info'){

        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
if(!function_exists('redirect')){
    function redirect($page){

        header('Location: '.$page);
        exit();
    }
}

if(!function_exists('save_input_data')){ // sauvegarde les premieres infos écrites
    function save_input_data(){
foreach($_POST as $key => $value){//key : name, password... et value : valeur du champ
 //sauvegarde des données dans un tableau associatif en session
    if(strpos($key, 'password') === false) {//dans key : tu vas rechercher password. Si false : valeur non trouvée
        $_SESSION['input'][$key] = $value;
    }
}

    }
}

if(!function_exists('get_input')){ // sauvegarde les premieres infos écrites
    function get_input($key){
        if(!empty($_SESSION['input'][$key])){
            return e($_SESSION['input'][$key]);
        } else {
            return null;
        }
// en ternaire : return !empty($_SESSION['input'][$key]) ? $_SESSION['input'][$key] : null;
    }
}

if(!function_exists('clear_input_data')){ // sauvegarde les premieres infos écrites
    function clear_input_data()
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}
//gere l'état actif de nos différents liens
if(!function_exists('set_active')){
    function set_active($file, $class = 'active'){
        $page = array_pop (explode('/', $_SERVER['SCRIPT_NAME']));
        //array_pop récup le dernier élément de l'array.
        //on décompose ici le chemin présent en script name grace au $_SERVER qui nous indique les différentes maniere de récup le path
        //explode sert a la décomposition avec pour attribut / en délimiteur
        //donc chaque élément compris entre deux / seront une ligne de l'array
        //le dernier de l'array sera donc par ex : test.php

        if($page == $file.'.php')//car dans le nav on n'a pas indiqué le .php
        {
            return $class;
        } else {
            return "";
        }
    }
}