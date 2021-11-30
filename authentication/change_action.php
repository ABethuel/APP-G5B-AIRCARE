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
            $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
            $id = $_SESSION['id'];

            // On crée une variable qui va chercher s'il existe déjà un utilisateur avec l'email saisi
            $checkUserExist = $database->prepare("SELECT email FROM users WHERE email = ?");
            $checkUserExist->execute(array($id));

            if($checkUserExist->rowCount() == 0){

                // On met à jour l'utilisateur
                $updateUserOnDatabase = $database->prepare("UPDATE users SET first_name =  ?, last_name = ?, email = ?, password = ? WHERE id = ?");
                $updateUserOnDatabase->execute(array($user_firstname, $user_lastname, $user_newemail, $user_password, $id));

                // On récupère les données de l'utilisateur (dont l'id) pour les stocker dans la session
                $getInfosUser = $database->prepare("SELECT id, first_name, last_name, email  FROM users WHERE email = ?");
                $getInfosUser->execute(array($user_newemail));
                
                $userInfos = $getInfosUser->fetch();

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['first_name'] = $userInfos['first_name'];
                $_SESSION['last_name'] = $userInfos['last_name'];
                $_SESSION['email'] = $userInfos['email'];

                header('Location: index.php');

            }else{
                $errorMsg = "L'email saisi correspond déjà à un utilisateur";
            }

        }else{
            $errorMsg = "Les mots de passe ne correspondent pas";
        }

    } else{
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
?>