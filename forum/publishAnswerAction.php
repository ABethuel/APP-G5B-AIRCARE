<?php 

session_start();
// On importe l'initialisaton de la database
require('./config/database.php');

if (isset($_POST['validate_answer'])){

    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $answer_date = date('d/m/Y à H:i');
        $user_id = $_SESSION['id'];
        $user_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
        $topic_id = $_GET['id'];

        $insertAnswerOnDb = $database->prepare('INSERT INTO message(content, date, user_id, user_name, topic_id) VALUES(?, ?, ?, ?, ?)');
        $insertAnswerOnDb->execute(array($user_answer, $answer_date, $user_id, $user_name, $topic_id));
        
    }else{
        $errorMsgAnswer = "Veuillez saisir une réponse";
    }
}
?>