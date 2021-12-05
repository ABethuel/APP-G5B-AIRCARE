<?php
include('./forum/publishTopicAction.php');

function displayTopics(){
    require("./config/database.php") ;

    $sqlQuery = "SELECT * FROM topics ORDER BY id DESC";
    $topicsStatement = $database->prepare($sqlQuery);
    $topicsStatement->execute();

    $topics = $topicsStatement->fetchAll();
    foreach ($topics as $topic){
        ?>
        <a class="link_topic"  href='#'> 
            <div class="topic_bloc" >
                <h1 class="title_topic"><?php echo $topic['title']; ?></h1>
                <h2 class="date_topic"><?php echo 'Par ' . $topic['user_name'] . ' le ' . $topic['date']; ?></h2>
            </div>
        </a>
    <?php
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_forum.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Forum</title>
    </head>

    <body>
        <?php include_once('./Components/header.php'); ?>

        <div class="content">
            <h1>Liste des sujets</h1>
            <div class="topics">
                <?php displayTopics(); ?>
            </div>

            <h1 class="create">Créer un sujet</h1>

            <!-- Formulaire d'ajout de sujet dans le forum --> 
            <form action="" method="POST">

                <label for="topic">Sujet</label> <!-- Texte au dessus du champ de saisie -->
                <input type="text" id="topic" name="topic" placeholder="Saisir votre sujet">

                <label for="message">Message</label>
                <textarea name="message" id="message" cols="6" rows="8" placeholder="Saisir votre message"></textarea>
                
                <input type="submit" value="Publier" name="validate">

                <?php  
                    if(isset($errorMsg)) {
                        ?>
                        <p class="error_msg"><?php echo $errorMsg ?></p>
                    <?php
                } ?> 
            </form>
        </div>

        <?php include_once('./Components/footer.php'); ?>
    </body>

</html>