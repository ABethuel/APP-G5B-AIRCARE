<?php
include('./contact/addMessageAction.php');

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_contact.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <title>Contact</title>
    </head>

    <body>

        <?php include_once('./Components/header.php'); ?>

        <div class="contact_content">
            <h1>Nous contacter</h1>
            <div class="form_contact">

                <!-- Formulaire de contact --> 
                <form action="" method="post">

                    <label for="email">Adresse email (obligatoire)</label> <!-- Texte au dessus du champ de saisie -->
                    <input class="input_contact" type="text" id="email" name="adress_email" placeholder="Saisir votre adresse email">

                    <label for="title">Sujet</label> 
                    <input class="input_contact" type="text" id="title" name="title" placeholder="Saisir votre adresse email">

                    <label for="description">Votre message</label>
                    <textarea name="description" id="description" cols="6" rows="10" placeholder="Détailler votre message à votre guise"></textarea>
                    
                    <input type="submit" value="Envoyer" name="validate">
                </form>
            </div>
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>
</html>