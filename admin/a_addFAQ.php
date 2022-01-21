<?php

// On importe l'initialisaton de la database
require('./config/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['reponse']) && !empty($_POST['question'])) 
        {

            // On crée les variables contenant les données de l'utilisateur
            $faq_reponse = htmlspecialchars($_POST['reponse']);
            $faq_question = htmlspecialchars($_POST['question']);

            $addfaqOnDatabase = $database->prepare("INSERT INTO faq(answer, question)VALUES(?, ?)");
            $addfaqOnDatabase->execute(array($faq_reponse, $faq_question ));
        }
        
    else{
        $errorMsg = "Veuillez compléter tous les champs" ;
    }
}
?>