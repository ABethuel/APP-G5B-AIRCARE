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
                        <button class="button " onclick="window.location.href='quiz.php';">Thématique1</button>
                        <button class="button active2" onclick="window.location.href='quiz2.php';">Thématique2</button>
                        <button class="button" onclick="window.location.href='quiz3.php';">Thématique3</button>
                        <button class="button" onclick="window.location.href='quiz4.php';">Thématique4</button>
                        <button class="button" onclick="window.location.href='quiz5.php';">Thématique5</button>  
                </div>

                <h2 class="Questions">Question 1</h2>
                <p class="text_q1">
                Phasellus sodales id odio in rutrum. Mauris eget cursus justo, facilisis venenatis enim ?
                </p>
            
                </div>
            
        
        <?php include_once('./Components/footer.php'); ?>

    <body>

</html>