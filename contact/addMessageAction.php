<?php  
session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

if (isset($_POST['validate'])){
    if(!empty($_POST['adress_email']) && !empty($_POST['description']) && !empty($_POST['title']) ){

        $subject = htmlspecialchars($_POST['title']);
        $message = htmlspecialchars($_POST['description']);
        $email = htmlspecialchars($_POST['adress_email']);
        $status = 'unseen';

        $insertContactOnDb = $database->prepare("INSERT INTO email(email, sujet, message, status) VALUES (?, ?, ?, ?)");
        $insertContactOnDb->execute(array($email, $subject, $message, $status));

    }else{
        $errorMsg = "Veuillez compléter tous les champs";
    }
}

?>
