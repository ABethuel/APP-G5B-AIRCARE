<!DOCTYPE html>
<html>      

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style_quiz.css">
    <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
    <title>Resultats quiz 4</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

<?php include_once('./Components/header.php'); ?>

<div class = "Resultats">
    
        <i class='fas fa-crown' ></i>
        <h2 class = "scorefinalText"> Bravo! <p>Le quiz est terminé</p></h2>
        <h1 class = "scorefinal" id = "finalScore"></h1>
        <button class="EndButton" onclick="window.location.href='/quiz.php';">Rejouer</button>
        <button class="EndButton" onclick="window.location.href='/index.php';">Quitter</button>
    
   

</div>



<?php include_once('./Components/footer.php'); ?>
    
    <script src="./scripts/quizendgame.js"></script>
<body>

</html>