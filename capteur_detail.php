<?php
require('./captors/showDetailCaptorAction.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_detailcaptor.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>
            <?php
                if (isset($captor_title)){
                    echo $captor_title;
                }else{
                    echo 'Détail du capteur';
                }
            ?>
        </title>
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
                                        <div class="padding_bloc">
                                            <div class="name_composant">
                                                <p>Dioxyde d'azote</p>
                                            </div>
                                            <div class="value">
                                                <p class><?php echo $nitrogen_percentage; ?></p>
                                                <p class="sign_percent">%</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="percentage">
                                        <div class="padding_bloc">
                                            <div class="name_composant">
                                                <p>Monoxyde de carbone</p>
                                            </div>
                                            <div class="value">
                                                <p><?php echo $monoxide_percentage; ?></p>
                                                <p class="sign_percent">%</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="percentage">
                                        <div class="padding_bloc">
                                            <div class="name_composant">
                                                <p>Particules fines</p>
                                            </div>
                                            <div class="value">
                                                <p><?php echo $particle_percentage; ?></p>
                                                <p class="sign_percent">%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    if(isset($air_quality)){
                                        ?>
                                            <div class="quality_bloc">
                                                <div class="quality_text">
                                                    <p class="text_before_quality">Qualité de l'air :&nbsp</p>
                                                    <p class="text_quality"><?php echo $air_quality; ?></p>
                                                </div>
                                                <p class="disclaimer">Les données sont exprimées en % de la valeur de référence</p>
                                            </div>
                                        <?php
                                    } 
                                ?>
                                    
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

                <!-- Bloc contenant le graphique d'évolution de la qualité de l'air --> 

                <div class="graph_bloc">
                    <div class="content_data">
                        <h1>Evolution de la qualité de l'air en fonction du temps</h1>
                        <?php 
                            if (isset($allAirInfos)){
                                ?>
                                    <div class="graph">
                                        <canvas id="airChart" width="500" height="250"></canvas>
                                        <script src="./scripts/graph_captor.js"></script>

                                    </div>


                                <?php
                            }else{
                                ?>
                                    <p class="error_msg">Le capteur n'a pas fourni suffisemment de données pour tracer le graphique</p>
                                <?php
                            }                                 
                        ?>
                    </div>
                </div>

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