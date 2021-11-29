<?php 

session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

if(isset($_POST['change_user'])){
    // On vérifie que tout à été rempli
    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['new_email']) && 
        !empty($_POST['user_password']) && !empty($_POST['confirm_password'])) 
    {

        // On vérifie que le password_user et le confirm_password sont identiques
        if($_POST['user_password'] == $_POST['confirm_password']){

            $user_firstname = htmlspecialchars($_POST['first_name']);
            $user_lastname = htmlspecialchars($_POST['last_name']);
            $user_newemail = htmlspecialchars($_POST['new_email']);
            $user_confirm_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

            $checkUserExist = $database->prepare("SELECT id FROM users WHERE email = ?");
            $checkUserExist->execute(array($_SESSION['id']));

        }else{
            $errorMsg = "Les mots de passe ne correspondent pas";
        }


    } else{
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
?>