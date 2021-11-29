<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_connexion_inscription.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <title>Connexion</title>
    </head>

    <body>

        <main>  <!-- On place le contenu de la page connexion/inscription dans le header-->
            <div class="wrapper">
                <h1 class="aircare">AirCare</h1> <!-- Titre de page -->
                <div class="content"> <!-- Contenu du bloc de connexion/inscription -->
                    <h1 class="connexion">Connexion</h1>

                    <div class="form_connexion">
                        <form action=""> <!-- Donnés à saisir pour connexion -->
                            <label for="email">Adresse email</label> <!-- Texte au dessus du champ de saisie -->
                            <input type="text" id="email" name="adress_email" placeholder="Saisir votre adresse email">

                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password_user" placeholder="Saisir votre mot de passe">

                            <input type="submit" value="Se connecter"> <!-- Bouton se connecter -->

                            <div class="remember_help">
                                <!-- Bouton se souvenir de moi -->
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label class="remember_user" for="chekbox">Se souvenir de moi</label>
                                </div>
                                <a href="#" class="help">Besoin d'aide ?</a>
                            </div>
                        
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