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
                        <button class="button" onclick="window.location.href='quiz.php';">Enjeux</button>
                        <button class="button" onclick="window.location.href='quiz2.php';">Air extérieur</button>
                        <button class="button" onclick="window.location.href='quiz3.php';">Air intérieur</button>
                        <button class="button active4" onclick="window.location.href='quiz4.php';">Effets santé</button>
                        <button class="button" onclick="window.location.href='quiz5.php';">Engagements</button>  
                    </div>

                </section>
                
                </div>

            <!-- Button commencer le quiz -->
                <div class="start_btn"> 
                    <button>Commencer le Quiz</button>
                </div>

            <!-- Box du quiz -->
                <div class="quiz_box"> 
                    <header>
                        <div class="title">1 - Quelle est la ville la plus polluée du monde en 2021 ?</div>
                    </header>
                    <section>
                    <img class="image_questionquiz"src="https://cdn.futura-sciences.com/buildsv6/images/wide1920/f/6/b/f6b9eb4bb1_50160005_particules-ultrafines-voitures.jpg" >
                        <div class="option_list">
                            <div class="option">
                                <span>Paris (France)</span>
                            </div>
                            <div class="option">
                                <span>Lahore (Pakistan)</span>
                            </div>
                            <div class="option">
                                <span>Tokyo (Japon)</span>
                            </div>
                            <div class="option">
                                <span>Lima (Pérou)</span>
                            </div>
                        </div>
                    </section>
                    <footer>
                        <div class="num_que">
                            <span>1 sur 4 questions</span>
                        </div>
                        <div class="next_que"> 
                            <button>
                                <span>Question Suivante</span>
                            </button>
                        </div>
                    </footer>
                </div>
        
        <?php include_once('./Components/footer.php'); ?>

    <body>

</html>