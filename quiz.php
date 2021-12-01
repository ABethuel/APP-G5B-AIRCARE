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
                
                    <div class = "content_text">
                        <div class ="border">
                            <h1 class="titre">Air et environnement</h1>
                            <p class = "text1">
                            La qualité de l'air peut être modifiée par des polluants qui peuvent être d’origine naturelle ou d’origine anthropique, c’est-à-dire liés à l’activité humaine. La pollution de l’air a des effets significatifs sur la santé et l’environnement, qui engendrent des coûts importants pour la société. Le droit européen fixe des valeurs limites pour certains polluants dans l’air à partir des études épidémiologiques, conduites notamment par l’Organisation mondiale de la santé. Malgré une tendance à l’amélioration de la qualité de l’air au cours des 20 dernières années, ces valeurs limites ne sont toujours pas respectées dans plusieurs zones.
                            </p>
                        </div>
                        <h1 class="titre2">Thématiques</h1>
                    </div>
                        
                    <div class="bouton_quiz">
                        <button class="button active1" onclick="window.location.href='quiz.php';">Enjeux</button>
                        <button class="button" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                        <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                        <button class="button" onclick="window.location.href='quiz4.php';">Effets santé</button>
                        <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
                    </div>

                    <div class="questions">
                        
                        <h3 class="question1">1 - De combien de morts annuelles la pollution de l'air est-elle responsable en France?</h3>
                        <img src="https://www.seneplus.com/sites/default/files/raw_photos/pollution-de-l-air-quelles-solutions-avons-nous-pour-l-eviter.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Plus de 70 000, comme le tabac</button>
                                <button class="reponse_question">Plus de 5O 000, comme l'alcool</button>
                                <button class="reponse_question">Plus de 40 000</button>
                                <button class="reponse_question">Environ 20 000</button>
                            </div>
                        
                        <h3 class="question2">2 - Quels sont les véhicules les plus polluants ?</h3>
                        <img src="https://cdn.futura-sciences.com/buildsv6/images/wide1920/f/6/b/f6b9eb4bb1_50160005_particules-ultrafines-voitures.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Les véhicules essence</button>
                                <button class="reponse_question">Les véhicules diesel</button>
                                <button class="reponse_question">Les véhicules électriques</button>
                                <button class="reponse_question">Je ne sais pas</button>
                            </div>
                        <h3 class="question3">3 - Certains constructeurs allemands ont tenté de prouver l'innocuité des Nox, les oxydes d'azote, avec des singes et des cobayes humains mais les moteurs diesel recrachent des substances encore plus nocives. Quelles sont-elles?</h3>
                        <img src="https://www.actu-environnement.com/images/illustrations/news/29349_large.jpg" width="600" height="300" class="center">
                            <div class="button_question">
                                <button class="reponse_question">Les Hap</button>
                                <button class="reponse_question">Les Hop</button>
                                <button class="reponse_question">Les Hip Hop</button>
                                <button class="reponse_question">Voulone vlaka</button>
                            </div>
                        <h3 class="question4">4 - Que faut-il privilégier pour diminuer la pollution de l'air ?</h3>
                        <img src="https://www.shbarcelona.fr/blog/fr/wp-content/uploads/2015/07/courir-rendrait-plus-intelligent-800x.jpg" width="600" height="300" class="center">
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