<?php

require('./captors/showDetailCaptorAction.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_detailcaptor.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Capteurs</title>
    </head>

    <body>
        
        <?php include_once('./Components/header.php'); ?>
        
        <div class="content">

            <?php  
                if (isset($captor_image)){
                    ?>
                    <div class="captor_bloc" >
                        <div class="image_captor">
                            <img src=<?php echo $captor_image ?> alt="image capteur" class="img_captor" />
                        </div>
                        <div class="text_content">
                            <div class="right_content">
                                <div class="top_right">
                                    <h1 class="title_captor"><?php echo $captor_title ?></h1>
                                </div>
                                <div class="description_captor">
                                    <p><?php echo $captor_description ?></p>
                                    <h2 class="user_captor"><?php echo 'Par ' . $captor_author . ' le ' . $captor_date . ' à ' . $captor_place ; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($nitrogen_percentage)){
                            ?>
                            <div class="data_bloc">
                                <div class="content_data">
                                    <h1>Données sur les trois dernières heures</h1>
                                    <div class="bloc_percentage">
                                        <div class="percentage">
                                            <p><?php echo $nitrogen_percentage; ?></p>
                                        </div>
                                        <div class="percentage">
                                            <p><?php echo $monoxide_percentage; ?></p>
                                        </div>
                                        <div class="percentage">
                                            <p><?php echo $particle_percentage; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    ?>

                    <?php  
                        // Message d'erreur au niveau des données des capteurs
                        if(isset($errorMsg)) {
                            ?>
                            <p class="error_msg"><?php echo $errorMsg ?></p>
                        <?php
                    } ?> 
            
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