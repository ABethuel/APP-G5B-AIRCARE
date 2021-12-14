<?php 

// On importe l'initialisaton de la database
require('./config/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    $idTopic = $_GET['id'];

    $checkIfTopicExists = $database->prepare("SELECT * FROM topics WHERE id = ?");
    $checkIfTopicExists->execute(array($idTopic));

    if ($checkIfTopicExists->rowCount() > 0){

        $topicInfos = $checkIfTopicExists->fetch();

        $topic_title = $topicInfos['title'];
        $topic_author = $topicInfos['user_name'];
        $topic_id_author = $topicInfos['user_id'];
        $topic_message = $topicInfos['message'];
        $topic_date = $topicInfos['date'];


    }else{
        $errorMsg = "Ce topic existe pas frr";
    }

}else{
    $errorMsg =  "Erreur frr";
}

?>