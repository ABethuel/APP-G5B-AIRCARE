<?php
include('./forum/publishTopicAction.php');

// test git  tyurty
function displayTopics(){
    require("./config/database.php") ;

    $sqlQuery = "SELECT * FROM topics ORDER BY id DESC";
    $topicsStatement = $database->prepare($sqlQuery);
    $topicsStatement->execute();

    $topics = $topicsStatement->fetchAll();

    if (isset($_GET['search']) && !empty($_GET['search'])){
        $userSearch = $_GET['search'];

        $topicsStatement = $database->prepare('SELECT * FROM topics WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');
        $topicsStatement->execute();

        $topics = $topicsStatement->fetchAll();

        if ($topicsStatement->rowCount() == 0) {
            echo "Aucun sujet ne correspond à cette recherche";
        }else{
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

    }else{
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
            <div class="top">
                <h1>Liste des sujets</h1>
                <form method="GET" action="">
                    <div class="input">
                        <input type="search" name="search" placeholder="Rechercher"/>
                        <input type="submit" style="display: none" name="submit"/>
                    </div>
                </form>

            </div>
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