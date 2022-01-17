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
                        <button class="button" onclick="window.location.href='quiz4.php';">Effets santé</button>
                        <button class="button active5" onclick="window.location.href='quiz5.php';">Engagements</button>  
                    </div>

                </section>
                
                </div>

            <!-- Button commencer le quiz -->
                
                <div class ="container">
                    <button class="startbutton" onclick="window.location.href='/quiz5game.php';">Commencer le Quiz</button>
                </div>

                          

        <?php include_once('./Components/footer.php'); ?>

    <body>

</html>