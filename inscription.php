<?php 
require('./authentication/signup_action.php');
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_connexion_inscription.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <title>Inscription</title>
    </head>

    <body>

        <main>  <!-- On place le contenu de la page connexion/inscription dans le header-->
            <div class="wrapper">
                <h1 class="aircare2">AirCare</h1> <!-- Titre de page -->
                <div class="content_inscription"> <!-- Contenu du bloc de connexion/inscription -->
                    <h1 class="inscription">Inscription</h1>

                    <div class="form_connexion">
                        <form action="" method="POST"> <!-- Donnés à saisir pour connexion -->

                            <div class="name">
                                <div>
                                    <label class="inscription_label" for="lname">Nom</label> <!-- Texte au dessus du champ de saisie -->
                                    <input type="text" id="lname" name="last_name" placeholder="Saisir votre nom">
                                </div>
                                <div>
                                    <label class="inscription_label" for="fname">Prénom</label> <!-- Texte au dessus du champ de saisie -->
                                    <input type="text" id="fname" name="first_name" placeholder="Saisir votre prénom">
                                </div>
                            </div>

                            <label class="inscription_label" for="email">Adresse email</label> <!-- Texte au dessus du champ de saisie -->
                            <input type="email" id="email" name="adress_email" placeholder="Saisir votre adresse email">

                            <label class="inscription_label" for="password">Mot de passe</label>
                            <input type="password" id="password" name="password_user" placeholder="Saisir votre mot de passe">

                            <label class="inscription_label" for="confirm_password">Confirmer le mot de passe</label>
                            <input type="password" id="confirm_password" name="confirm_password_user" placeholder="Confirmer votre mot de passe">
                            
                            <div>
                                <input type="checkbox" id="remember" name="remember">
                                <label class="cgu" for="chekbox">J'ai lu et j'accepte les <a href="cgu.php" target="_blank" class="cgu_link">conditions générales d'utilisation</a></label>
                            </div>

                            <input type="submit" value="S'inscrire" name="validate_user"> <!-- Bouton se connecter -->
                        
                            <?php  if(isset($errorMsg)) {
                                ?>
                                <p class="error_msg"><?php echo $errorMsg ?></p>
                                <?php
                            } 
                            ?> <!-- Si le formulaire envoyé n'est pas correctement rempli, alors on affiche un message d'erreur-->

                        </form>
                    </div> 

                    <!-- Texte sous le formulaire -->
                    <div class="text_under">
                        <p class="no_account">Déjà inscrit(e) ? <a href="connexion.php" class="inscription_link">Connectez vous</a>
                    </div>

                </div>
            </div>
        </main>

    </body>

</html>