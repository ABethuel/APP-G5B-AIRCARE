<?php

include('./forum/showMessageTopic.php');
include('./forum/publishAnswerAction.php');


function displayAnswerTopics(){
    require("./config/database.php") ;

    $id = $_GET["id"];
    $answersStatement = $database->prepare("SELECT * FROM messages WHERE topic_id = ?");
    $answersStatement->execute(array($id));

    $answers = $answersStatement->fetchAll();

    if ($answersStatement->rowCount() >= 0) {
        foreach ($answers as $answer){
            ?>
                <div class="answer">
                    <div class="left_message">
                        <p class="author"><?php echo $answer['user_name']; ?></p>
                        <center><img class="profile_image" src="./Assets/images/profile_image.png" /></center>
                    </div>
                    <div class="right_message">
                        <p class="date">Le <?php echo $answer['date']; ?></p>
                        <p class="message_content"><?php echo $answer['content']; ?></p>
                    </div>
                </div>
            <?php
        }
    }else{
        echo 'test de fonctionnement';
        echo $id;
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

            <?php  
                if (isset($topic_date)){
                    ?>
                    <h1><?php echo $topic_title ?></h1>
                    <div class="message">
                        <div class="left_message">
                            <p class="author"><?php echo $topic_author ?></p>
                            <center><img class="profile_image" src="./Assets/images/profile_image.png" /></center>
                        </div>
                        <div class="right_message">
                            <p class="date">Le <?php echo $topic_date ?></p>
                            <p class="message_content"><?php echo $topic_message ?></p>
                        </div>
                    </div>

                    <div class="topics">
                        <?php displayAnswerTopics(); ?>
                    </div>

                    </br>
                    </br>
                    </br>
                    <form action="" method="POST">

                        <label for="answer">Répondre</label>
                        <textarea name="answer" id="answer" cols="6" rows="6" placeholder="Saisir votre réponse"></textarea>
                        
                        <input type="submit" value="Publier" name="validate_answer">

                        <?php  
                            if(isset($errorMsgAnswer)) {
                                ?>
                                <p class="error_msg"><?php echo $errorMsgAnswer ?></p>
                            <?php
                        } ?> 

                    </form>
                    <?php
                }
                else if (isset($errorMsg)) {
                    ?>
                    <p class="error_msg"><?php echo $errorMsg ?></p>
                <?php
            } ?> 
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>

</html>