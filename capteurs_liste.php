<?php

session_start();

function displayCaptors(){
    require("./config/database.php");

    $sqlQuery = "SELECT * FROM captors ORDER BY id DESC";
    $captorStatement = $database->prepare($sqlQuery);
    $captorStatement->execute();

    $captors = $captorStatement->fetchAll();

    // On cherche à savoir si l'input search est saisi
    if (isset($_GET['search']) && !empty($_GET['search'])){
        $userSearch = $_GET['search'];

        $captorStatement = $database->prepare('SELECT * FROM captors WHERE title LIKE "%'.$userSearch.'%" ORDER BY id DESC');
        $captorStatement->execute();
        
        $captors = $captorStatement->fetchAll();

        // Si aucun topic ne correspond à ce qu'a saisi l'utilisateur, on affiche un erreur
        if ($captorStatement->rowCount() == 0) {
            echo "Aucun capteur ne correspond à cette recherche";
        
        // Sinon on affiche ce qu'à demandé l'utilisateur
        }else{ 
            foreach ($captors as $captor){
                ?>
                <a class="link_captor"  href='capteur_detail.php?id=<?php echo $captor['id']; ?>'> 
                    <div class="captor_bloc" >
                        <div class="image_captor">
                            <img src=<?php echo $captor['image'] ?> alt="image capteur" class="img_captor" />
                        </div>
                        <div class="right_content">
                            <div class="top_right">
                                <h1 class="title_captor"><?php echo $captor['title'] ?></h1>
                                <h2 class="user_captor"><?php echo 'Par ' . $captor['user_name'] . ' le ' . $captor['date'] . ' à ' . $captor['place']; ; ?></h2>
                            </div>
                            <div class="description_captor">
                                <p><?php echo $captor['description'] ?></p>
                            </div>

                        </div>
                    </div>
                </a>
            <?php
            }
        }

    // Si le search est vide, on affiche tous les sujet
    }else{
        foreach ($captors as $captor){
            ?>
            <a class="link_captor"  href='capteur_detail.php?id=<?php echo $captor['id']; ?>'> 
                <div class="captor_bloc" >
                    <div class="image_captor">
                        <img src=<?php echo $captor['image'] ?> alt="image capteur" class="img_captor" />
                    </div>
                    <div class="right_content">
                        <div class="top_right">
                            <h1 class="title_captor"><?php echo $captor['title'] ?></h1>
                            <h2 class="user_captor"><?php echo 'Par ' . $captor['user_name'] . ' le ' . $captor['date'] . ' à ' . $captor['place']; ; ?></h2>
                        </div>
                        <div class="description_captor">
                            <p><?php echo $captor['description'] ?></p>
                        </div>

                    </div>
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
        <link rel="stylesheet" href="style_capteurs.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Capteurs</title>
    </head>

    <body>

        <?php include_once('./Components/header.php'); ?>

        <div class="content">
            <div class="top">
                <h1>Capteurs</h1>
                <form method="GET" action="">
                    <div class="input">
                        <input type="search" name="search" placeholder="Rechercher"/>
                        <input type="submit" style="display: none" name="submit"/>
                    </div>
                </form>
            </div>

            <div class="captors">
                <?php displayCaptors(); ?>
            </div>

            <h1>Ajouter un capteur</h1>

            <!-- Formulaire d'ajout de capteur --> 
            <form action="" method="POST">

                <label for="title">Nom</label> <!-- Texte au dessus du champ de saisie -->
                <input type="text" id="title" name="title" placeholder="Nom de votre capteur">

                <label for="description">Description</label>
                <textarea name="description" id="description" cols="6" rows="8" placeholder="Saisir une description du capteur"></textarea>
                
                <label for="image">Image</label> <!-- Texte au dessus du champ de saisie -->
                <input type="text" id="image" name="image" placeholder="Rentrer une image">

                <input type="submit" value="Ajouter" name="validate">

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