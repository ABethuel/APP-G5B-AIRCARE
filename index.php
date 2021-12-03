<?php
session_start();
require("./actuality/add_actuality.php");


function display_actu(){

    require("./config/database.php") ;
    

    $sqlQuery = 'SELECT * FROM news';
    $newsStatement = $database->prepare($sqlQuery);
    $newsStatement->execute();
    
    
    $news = $newsStatement->fetchAll();
    foreach ($news as $actu){
    ?>
       <a class="bloc" target="_blank" href=<?php echo $actu['link'];?>> 
            <div class="bloc_actu" >
                <h1 class="title_actu"><?php echo $actu['title']; ?></p>
                <h2 class="description_actu"><?php echo $actu['description']; ?></p>
                <!--<h3 class="link_actu"><?//php echo $actu['link']; ?></p>-->
                <img class="image_actu" src=<?php echo $actu['image']; ?>>
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
        <link rel="stylesheet" href="style_index.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Accueil</title>
    </head>

    <body>

        <?php include_once('./Components/header.php'); ?>

        <section class="first_section">
            <div class="wrapper">
                <div class="text_index">
                    <h3 class="text_project">INNOVER POUR VOTRE PROJET</h3>
                    <h2 class="text_success">INNOVER POUR VOTRE SUCCES</h2>
                    <h1 class="text_aircare">INNOVER AVEC AIRCAIRE</h1>
                </div>
                <hr>
                <h4 class= "text_index2" >
                Pour en savoir plus sur la qualité de l'air environnant.
                </h4>
                <div class="bouton">
                    <a href="information.php">Comment ca marche ?</a>
                </div>
    
                </div>
            </div>
        </section>

        <section class="second_section">
            <div class="content_news">
                <h1>Actualités : </h1>
                <div class="news">
                    <?php display_actu(); ?>
                </div>
            </div>
            <div class="bloc_form">
                <h1 class="ajouter une actu"> Ajouter une actualité </h1>

                <!-- Formulaire de publication d'actualité --> 
                <form action="" method="POST">

                    <label for="titre">Titre </label> <!-- Texte au dessus du champ de saisie -->
                    <input class="input_public" type="text" id="titre" name="titre" placeholder="Saisir un titre">

                    <label for="description">Description</label>
                    <textarea class="public_desc" name="description" id="description" cols="6" rows="8" placeholder="Détailler l'actualité"></textarea>
                    
                    <label for="image">Image </label> <!-- Texte au dessus du champ de saisie -->
                    <input class="input_public" type="url" id="image" name="image" placeholder="Saisir une image">

                    <label for="lien">Lien </label> 
                    <input class="input_public" type="url" id="lien" name="lien" placeholder="Saisir votre lien">

                    <input type="submit" value="Publier" name="validate">

                    <?php  if(isset($errorMsg)) {
                                ?>
                                <p class="error_msg"><?php echo $errorMsg ?></p>
                                <?php
                            } ?> 
                </form>
            </div>
        </section>

        <?php include_once('./Components/footer.php'); ?>

    </body>
</html>