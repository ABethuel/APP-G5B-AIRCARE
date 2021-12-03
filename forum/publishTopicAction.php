<?php 

session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

if (isset($_POST['validate'])){

    if(!empty($_POST['topic']) && !empty($_POST['message'])){

        $topic = htmlspecialchars($_POST['topic']);
        $message = nl2br(htmlspecialchars($_POST['message']));
        $date = date('Y-m-d H:i:');
        $id_author_topic = $_SESSION['id'];

        $insertTopicOnDb = $database->prepare('INSERT INTO topics(title, date, user_id) VALUES (?, ?, ?)');
        $insertTopicOnDb->execute(array($topic, $date, $id_author_topic));

    }else{
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
?>