<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_index.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Acceuil</title>
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
        </section>

        <?php include_once('./Components/footer.php'); ?>
    </body>
</html>