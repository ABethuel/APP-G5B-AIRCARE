<?php 
session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate_user'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['adress_email']) && 
        !empty($_POST['adress_email']) && !empty($_POST['password_user']) && !empty($_POST['confirm_password_user'])) 
        {
           return true ;
        }else{
            $errorMsg = "Veuillez compléter tous les champs" ;
        }
    }
?>