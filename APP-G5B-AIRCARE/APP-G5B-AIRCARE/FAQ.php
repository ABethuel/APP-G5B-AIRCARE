<?php 

require("./config/database.php") ;
$recupFAQ = $database->query('SELECT * FROM faq');
?>
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
            <h1>FAQ</h1>
            <?php
                            
                            while($faq = $recupFAQ->fetch()){
                                ?>
                                <div class="FAQ">
                                    <h1><?= $faq['question']; ?></h1>
                                    <br>
                                    <p><?= $faq['reponse']; ?></p>
                                    <br>
                                    
                                    
                                </div>
                        <?php
                            }
                        ?>
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>    

</html>