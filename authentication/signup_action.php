<?php 
session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate_user'])){
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['adress_email'])
        && !empty($_POST['password_user']) && !empty($_POST['confirm_password_user'])) 
        {

            // On crée les variables contenant les données de l'utilisateur
            $user_firstname = htmlspecialchars($_POST['first_name']);
            $user_lastname = htmlspecialchars($_POST['last_name']);
            $user_email = htmlspecialchars($_POST['adress_email']);
            $user_password = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
            $user_role = 'user';

            // On crée une variable qui va chercher s'il existe déjà un utilisateur avec l'email saisi
            $checkUserExist = $database->prepare("SELECT email FROM users WHERE email = ?");
            $checkUserExist->execute(array($user_email));

            if($checkUserExist->rowCount() == 0){
               
                $addUserOnDatabase = $database->prepare("INSERT INTO users(first_name, last_name, email, password, role)VALUES(?, ?, ?, ?, ?)");
                $addUserOnDatabase->execute(array($user_firstname, $user_lastname, $user_email, $user_password, $user_role ));
            
            }else{
                $errorMsg = "L'email saisi est déjà lié à un compte existant";
            }

        }else{
            $errorMsg = "Veuillez compléter tous les champs" ;
        }
    }
?>