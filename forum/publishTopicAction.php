<?php 

session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

if (isset($_POST['validate'])){

    if(!empty($_POST['topic']) && !empty($_POST['message'])){

        $topic = htmlspecialchars($_POST['topic']);
        $message = nl2br(htmlspecialchars($_POST['message']));
        $date = date('d/m/Y à H:i');
        $id_author_topic = $_SESSION['id'];
        $author_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];

        $insertTopicOnDb = $database->prepare('INSERT INTO topics(title, date, user_id, user_name, message) VALUES (?, ?, ?, ?, ?)');
        $insertTopicOnDb->execute(array($topic, $date, $id_author_topic, $author_name, $message));

    }else{
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
?>