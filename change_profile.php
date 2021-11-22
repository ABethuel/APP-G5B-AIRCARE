<?php 
session_start();
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
                <form action="">

                    <label for="first_name">Prénom</label> 
                    <input class="input_change" type="text" id="first_name" name="first_name" placeholder=<?php echo $_SESSION['first_name']?>>
                    
                    <label for="last_name">Nom</label> 
                    <input class="input_change" type="text" id="last_name" name="last_name" placeholder=<?php echo $_SESSION['last_name']?>>

                    <label for="email">Adresse email</label> <!-- Texte au dessus du champ de saisie -->
                    <input class="input_change" change type="email" id="email" name="adress_email" placeholder=<?php echo $_SESSION['email']?>>

                    <label for="actual_password">Mot de passe actuel</label>
                    <input class="input_change" type="password" id="actual_password" name="actual_password" placeholder="Saisir votre mot de passe actuel">

                    <label for="new_password">Nouveau mot de passe</label>
                    <input class="input_change" type="password" id="new_password" name="new_password" placeholder="Saisir votre nouveau mot de passe">
                    
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>
</html>