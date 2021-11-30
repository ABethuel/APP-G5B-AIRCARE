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

            $updateUserOnDatabase = $database->prepare("UPDATE users SET user_firstname = :user_firstname, user_lastname= :user_lastname, user_email= :user_email, user_password= :user_password WHERE id= :id");
            $updateUserOnDatabase->execute([
                'user_firstname' => $user_firstname,
                'user_lastname' => $user_lastname,
                'user_email' => $user_newemail,
                'user_password' => $user_password,
                'id' => $id,
            ]);

            // On récupère les données de l'utilisateur (dont l'id) pour les stocker dans la session
            $getInfosUser = $database->prepare("SELECT id, first_name, last_name, email  FROM users WHERE id = ?");
            $getInfosUser->execute(array($id));
            
            $userInfos = $getInfosUser->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['first_name'] = $userInfos['first_name'];
            $_SESSION['last_name'] = $userInfos['last_name'];
            $_SESSION['email'] = $userInfos['email'];

            header('Location: index.php');

        }else{
            $errorMsg = "Les mots de passe ne correspondent pas";
        }

    } else{
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
?>