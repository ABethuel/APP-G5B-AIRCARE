<?php

// On importe l'initialisaton de la database
require('./config/database.php');

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate'])){

    if(!empty($_POST['titre']) && !empty($_POST['image']) && !empty($_POST['description'])
        && !empty($_POST['lien'])) 
        {

            // On crée les variables contenant les données de l'utilisateur
            $actu_titre = htmlspecialchars($_POST['titre']);
            $actu_image = htmlspecialchars($_POST['image']);
            $actu_description = htmlspecialchars($_POST['description']);
            $actu_lien = htmlspecialchars($_POST['lien']);


                $addActuOnDatabase = $database->prepare("INSERT INTO news(image, link, title, description)VALUES(?, ?, ?, ?)");
                $addActuOnDatabase->execute(array($actu_titre, $actu_image,$actu_description, $actu_lien ));

                header('Location: index.php');
                }
            }
        else{
            $errorMsg = "Veuillez compléter tous les champs" ;
        }




?>