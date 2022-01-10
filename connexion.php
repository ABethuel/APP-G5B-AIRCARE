<?php 
require('./authentication/login_action.php');
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_connexion_inscription.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <script src="./scripts/authentification.js" ></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Connexion</title>
    </head>

    <body>

        <main>  <!-- On place le contenu de la page connexion/inscription dans le header-->
            <div class="wrapper">
                <h1 class="aircare">AirCare</h1> <!-- Titre de page -->
                <div class="content"> <!-- Contenu du bloc de connexion/inscription -->
                    <h1 class="connexion">Connexion</h1>

                    <div class="form_connexion">
                        <form id="form_connect" action="" method="POST"> <!-- Donnés à saisir pour connexion -->
                            <label for="email">Adresse email</label> <!-- Texte au dessus du champ de saisie -->
                            <input type="email" id="email" name="adress_email" placeholder="Saisir votre adresse email">

                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password_user" placeholder="Saisir votre mot de passe">

                            <input type="submit" value="Se connecter" name="validate_user" onclick="displayErrorConnexion()" /> <!-- Bouton se connecter -->

                            <div class="remember_help">
                                <!-- Bouton se souvenir de moi -->
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label class="remember_user" for="chekbox">Se souvenir de moi</label>
                                </div>
                                <a href="#" class="help">Besoin d'aide ?</a>
                            </div>

                            <p class="error_msg" id="error"></p>

                            <!-- Si le formulaire envoyé n'est pas correctement rempli, alors on affiche un message d'erreur-->
                            <?php  if(isset($errorMsg)) {
                                ?>
                                <p class="error_msg" ><?php echo $errorMsg ?></p>
                                <?php
                            } ?> 
                        
                        </form>
                    </div> 

                    <!-- Texte sous le formulaire -->
                    <div class="text_under">
                        <p class="no_account">Pas encore de compte ?</br> 
                        <a href="inscription.php" class="inscription_link">Inscrivez vous</a>
                        </br>Ou</br>
                        <a href="index.php" class="inscription_link">Consulter sans compte</a></p> 
                    </div>

                </div>
            </div>
        </main>

    </body>

</html>