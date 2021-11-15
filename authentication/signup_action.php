<?php 

// On importe l'initialisaton de la database
require('./config/database.php');

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate_user'])){

    if(!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['adress_email'])
        && !empty($_POST['password_user']) && !empty($_POST['confirm_password_user'])) 
        {

            // On vérifier que l'utilisateur a bien validé les CGU 
            if(isset($_POST['remember'])){

                // On vérifie que le password_user et le confirm_password sont identiques
                if($_POST['confirm_password_user'] == $_POST['password_user']){

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

                        // On récupère les données de l'utilisateur (dont l'id) pour les stocker dans la session
                        $getInfosUser = $database->prepare("SELECT id, first_name, last_name, email, role  FROM users WHERE email = ?");
                        $getInfosUser->execute(array($user_email));

                        $userInfos = $getInfosUser->fetch();

                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['first_name'] = $userInfos['first_name'];
                        $_SESSION['last_name'] = $userInfos['last_name'];
                        $_SESSION['email'] = $userInfos['email'];
                        $_SESSION['role'] = $userInfos['role'];

                        header('Location: index.php');

                    }else{
                        $errorMsg = "L'email saisi est déjà lié à un compte existant";
                    }

                }else{
                    $errorMsg = "Les mots de passe ne correspondent pas";
                }

            }else{
                $errorMsg = "Veuillez lire et acceptez les conditions générales d'utilisation";
            }

        }else{
            $errorMsg = "Veuillez compléter tous les champs" ;
        }
    }
?>