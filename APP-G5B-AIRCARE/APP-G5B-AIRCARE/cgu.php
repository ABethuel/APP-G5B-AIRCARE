
<!DOCTYPE html>
<html lang="">
    
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_cgu.css">
        <link rel="icon" href="./Assets/images/logo.ico"/> <!-- icone du site onglet du navigateur -->
        <title>CGU</title>
    </head>

    <body>

        <?php include_once('./Components/header.php'); ?>

        <div class="cgu_content">
            <h1>Conditions générales d'utilisation</h1>
            <?php 
                // Algoithme générant aléatoirement un lorem ipsum pour chaque partie des CGU
                
                // Ici on décide de créer 8 parties ayant un titre 'lorem ipsum'
                for ($i = 1; $i <= 8; $i++) {
                    ?>
                    <h2>Lorem Ipsum</h2>
                    <?php
                        // on génère aléatoirement une partie contenant entre 2 et 6 paragraphes grâce ç l'API loripsum.api
                    try {
                        $content = 'http://loripsum.net/api/' . random_int(2, 6) . '/medium';
                        echo file_get_contents($content); // on affiche les paragraphes
                    } catch (Exception $e) {
                        echo 'error lorem ipsum';
                    }
                    }
            ?>
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>    

</html>