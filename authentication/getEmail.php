<?php 
require('../config/database.php');

$email = strtolower($_POST['email']);

//test du nom de domaine
$dns = explode('@', $email); 
if (!checkdnsrr($dns[1], "MX")) {
    die('1');
}

//On cherche si l'email est déjà présent dans la base de données pour
$checkUserExist = $database->prepare('SELECT * FROM users WHERE email = ?');
$checkUserExist->execute(array($email));

if($checkUserExist->rowCount() == 0) {
    die('2');
}

die('0');

?>