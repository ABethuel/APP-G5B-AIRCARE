<?php 

session_start();
// On importe l'initialisaton de la database
require('./config/database.php');
$_SESSION['auth'] = false;

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate_user'])){

    if(!empty($_POST['adress_email']) && !empty($_POST['password_user'])) {

        // On crée les variables contenant les données de l'utilisateur
        $user_email = htmlspecialchars($_POST['adress_email']);
        $user_password = htmlspecialchars($_POST['password_user']);

        // On cherche l'utilisateur avec le mail saisi dans le formulaire
        $checkUserExist = $database->prepare('SELECT * FROM users WHERE email = ?');
        $checkUserExist->execute(array($user_email));

        if($checkUserExist->rowCount() > 0) {

            $userInfos = $checkUserExist->fetch();
            if(password_verify($user_password, $userInfos['password'])){

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['first_name'] = $userInfos['first_name'];
                $_SESSION['last_name'] = $userInfos['last_name'];
                $_SESSION['email'] = $userInfos['email'];
                $_SESSION['role'] = $userInfos['role'];

                header('Location: index.php');

            }else{
               $errorMsg = "Mot de passe incorrect"; 
            }

        }else{
            $errorMsg = "Aucun compte n'est associé à l'adresse email " . $user_email;
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs" ;
    }
}
    
?>