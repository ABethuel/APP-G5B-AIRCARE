<?php

// On importe l'initialisaton de la database
require('./config/database.php');

// On vérifie que le formulaire d'inscription est rempli
if(isset($_POST['validate'])){

    if(!empty($_POST['titre']) && !empty($_POST['image']) && !empty($_POST['description'])
        && !empty($_POST['lien'])) 
        {

            // On crée les variables contenant les données de l'utilisateur
            $actu_title = htmlspecialchars($_POST['titre']);
            $actu_image = htmlspecialchars($_POST['image']);
            $actu_description = htmlspecialchars($_POST['description']);
            $actu_link = htmlspecialchars($_POST['lien']);

            $addActuOnDatabase = $database->prepare("INSERT INTO news(image, title, description,link)VALUES(?, ?, ?, ?)");
            $addActuOnDatabase->execute(array($actu_image, $actu_title,$actu_description, $actu_link ));

            $errorMsg = "valide";
        }
        
    else{
        $errorMsg = "Veuillez compléter tous les champs" ;
    }
}
?>