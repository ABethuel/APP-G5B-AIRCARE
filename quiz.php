<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_quiz.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Quiz</title>
    </head>

    <body>

            <?php include_once('./Components/header.php'); ?>
                
                    <!-- Box contenant l'introduction et les thématiques -->
                <div class = "partie1"> 
                
                <header>

                    <h1 class="titre11">Air et environnement</h1>
                    <p class = "text11">
                    La qualité de l'air peut être modifiée par des polluants qui peuvent être d’origine naturelle ou d’origine anthropique, c’est-à-dire liés à l’activité humaine. La pollution de l’air a des effets significatifs sur la santé et l’environnement, qui engendrent des coûts importants pour la société. Le droit européen fixe des valeurs limites pour certains polluants dans l’air à partir des études épidémiologiques, conduites notamment par l’Organisation mondiale de la santé. Malgré une tendance à l’amélioration de la qualité de l’air au cours des 20 dernières années, ces valeurs limites ne sont toujours pas respectées dans plusieurs zones.
                    </p>

                </header>   
                
                <section>
                    
                <h1 class="titre22">Thématiques</h1>
                  
                    <div class="boutonq_quiz">
                        <button class="button active1" onclick="window.location.href='quiz.php';">Enjeux</button>
                        <button class="button" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                        <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                        <button class="button" onclick="window.location.href='quiz4.php';">Effets santé</button>
                        <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
                    </div>

                </section>
                
                </div>

                    <div class="questions">
                        
                        <h3 class="question1">1 - Quelle est la ville la plus polluée du monde en 2021 ?</h3>
                        <img class="image_question" src="https://media.gqmagazine.fr/photos/5c76bb971109c51383975d1f/16:9/w_2560%2Cc_limit/GettyImages-927627552.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Paris (France)</button>
                                <button class="reponse_question">Lahore (Pakistan)</button>
                                <button class="reponse_question">Tokyo (Japon)</button>
                                <button class="reponse_question">Lima (Pérou)</button>
                            </div>
                        
                        <h3 class="question2">2 - Quels sont les véhicules les plus polluants ?</h3>
                        <img class="image_question" src="https://cdn.futura-sciences.com/buildsv6/images/wide1920/f/6/b/f6b9eb4bb1_50160005_particules-ultrafines-voitures.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Les véhicules utilisant de l'essence</button>
                                <button class="reponse_question">Les véhicules utilisant du gazole</button>
                                <button class="reponse_question">Les véhicules électriques</button>
                                <button class="reponse_question">Les véhicules hybrides</button>
                            </div>
                        <h3 class="question3">3 - Quelle est la qualité de l'air à Paris ?</h3>
                        <img class="image_question" src="https://cdn.wallpapersafari.com/61/56/QAKo6e.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Bonne</button>
                                <button class="reponse_question">Moyenne</button>
                                <button class="reponse_question">Dégradée</button>
                                <button class="reponse_question">Très mauvaise</button>
                            </div>
                        <h3 class="question4">4 - Que faut-il privilégier pour diminuer la pollution de l'air ?</h3>
                        <img class="image_question" src="https://www.shbarcelona.fr/blog/fr/wp-content/uploads/2015/07/courir-rendrait-plus-intelligent-800x.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">La marche</button>
                                <button class="reponse_question">La nage</button>
                                <button class="reponse_question">Le rampement</button>
                                <button class="reponse_question">Le vélo</button>
                            </div>

                        
                        <div class="resultats1">
                        <button class="resultats_quiz1">Voir les résultats</button>
                        </div>
                    </div>
            
            <?php include_once('./Components/footer.php'); ?>

    <body>

</html>