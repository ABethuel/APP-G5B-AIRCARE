<?php 
require('./authentication/change_action.php')
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_change_profile.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <title>Modifier son profil</title>
    </head>

    <body>

        <div class="change_content">
            <h1>Modifier son profil</h1>
            <div class="form_change">

                <!-- Formulaire de contact --> 
                <form action="" method="POST">

                    <label for="first_name">Nouveau prénom</label> 
                    <input class="input_change" type="text" id="first_name" name="first_name" value=<?php echo $_SESSION['first_name']?>>
                    
                    <label for="last_name">Nouveau nom</label> 
                    <input class="input_change" type="text" id="last_name" name="last_name" value=<?php echo $_SESSION['last_name']?>>

                    <label for="new_email">Nouvelle adresse email</label> <!-- Texte au dessus du champ de saisie -->
                    <input class="input_change" change type="new_email" id="new_email" name="new_email" value=<?php echo $_SESSION['email']?>>

                    <label for="user_password">Nouveau mot de passe</label>
                    <input class="input_change" type="password" id="user_password" name="user_password" placeholder="Saisir votre nouveau mot de passe">

                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input class="input_change" type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe">
                    
                    <input type="submit" value="Modifier" name="change_user">
                    <!-- Si le formulaire envoyé n'est pas correctement rempli, alors on affiche un message d'erreur-->
                    <?php  if(isset($errorMsg)) {
                        ?>
                        <p class="error_msg"><?php echo $errorMsg ?></p>
                        <?php
                    } ?> 
                </form>
            </div>
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>
</html>