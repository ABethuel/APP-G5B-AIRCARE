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
            


<!-- Box du quiz -->
    
    <div class="quiz_box"> 
            
        <header>
            <h2 id ="question">Quelle est la ville la plus polluée du monde en 2021?</h2>
        </header>
        
        <section>
            <div class="choice-container">
                <p class="choice-text" data-number="1">Choice 1</p>
            </div>
            <div class="choice-container">
                <p class="choice-text" data-number="2">Choice 2</p>
            </div>
            <div class="choice-container">
                <p class="choice-text" data-number="3">Choice 3</p>
            </div>
            <div class="choice-container">
                <p class="choice-text" data-number="4">Choice 4</p>
            </div>
            
        </section>
                    
        <footer>
            <div id = "hud">
                <div id = "hut-item">
                    <p class = "hud-prefix">
                        Question
                    </p>
                    <h1 class = "hud-main-text" id="questionCounter">
                    </h1>
                </div>
                <div id = "hut-item">
                    <p class = "hud-prefix">
                        Score
                    </p>
                    <h1 class = "hud-main-text" id="score">
                        0
                    </h1>
                </div>
            </div>
        </footer>
                    
    </div>

    
    
    <?php include_once('./Components/footer.php'); ?>
    
    <script src="./scripts/quiz4game.js"></script>
<body>

</html>