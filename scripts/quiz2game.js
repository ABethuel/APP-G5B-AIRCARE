const question = document.getElementById("question");
const choices = Array. from( document.getElementsByClassName('choice-text'));
const questionCounterText = document.getElementById('questionCounter');
const scoreText = document.getElementById('score');

let currentQuestion = {};
let acceptingAnswers = false; //ne peut pas repondre a la question avant que tout soit charge
let score = 0; 
let questionCounter = 0;
let availableQuestions = [];

let questions = [
    {
        question: "Quel effet a le vent sur les polluants de l'air ?",
        choice1: "Il les détruit",
        choice2: "Il les fait tomber sur le sol",
        choice3: "Il les disperse ou les déplace",
        choice4: "Il les tranforme en pluie",
        answer: 3
    },
    {
        question: "Sur 30 000 km de lignes ferroviaires exploitées par la SNCF, combien ne sont pas encore électrifiées ?",
        choice1: " Presque 2 000 kilomètres",
        choice2: "Presque 15 000 kilomètres",
        choice3: "0 kilomètres",
        choice4: "27 000 kilomètres",
        answer: 1
    },
    {
        question: "Combien de polluants sont nécessaires au calcul de l'indice ?",
        choice1: "Deux",
        choice2: "Quatre",
        choice3: "Six",
        choice4: "Cinq",
        answer: 2
    },
    {
        question: "Toutes les grandes villes de France doivent calculer un indice de qualité de l'air (Atmo). A quelle fréquence ?",
        choice1: "Tous les ans",
        choice2: "Tous les jours",
        choice3: "Chaque mois",
        choice4: "Tous les 2 ans",
        answer: 2
    },
    {
        question: "L'indice ATMO. A quels chiffres de l'indice correspond une très bonne qualité de l'air ?",
        choice1: "1-2",
        choice2: "5-6",
        choice3: "7-8",
        choice4: "9-10",
        answer: 1
    },
    {
        question: "La qualité de l'air en Hte-Normandie est marquée par le raffinage du pétrole et ses rejets de dioxyde de soufre (SO2). Qu'en est-il aujourd'hui ?",
        choice1: "Les niveaux de SO2 sont en baisse",
        choice2: "Les raffineries ne rejettent plus du tout de SO2",
        choice3: "La pollution par le SO2 est en hausse",
        choice4: "On ne sait pas encore",
        answer: 1
    },
    {
        question: "Qu'est-ce qui provoque la formation de l'ozone ?",
        choice1: "Le froid",
        choice2: "Le soleil et une température élevée",
        choice3: "Les feux",
        choice4: "La pluie",
        answer: 2
    },
    {
        question: "Quels moyens de transport propre sont à notre disposition pour les petits trajets (3 km) ?",
        choice1: "Les voitures",
        choice2: "Le tram",
        choice3: "Les métro",
        choice4: "La marche à pied et vélo",
        answer: 4
    },
    {
        question: "Quelles sont les sources naturelles de polluants dans l'air ?",
        choice1: "Les inondations et tremblements de terre",
        choice2: "Les éruptions volcaniques",
        choice3: "Les poissons",
        choice4: "Les pollens",
        answer: 2
    },
    {
        question: "Quels sont les principaux composants de l'air ?",
        choice1: "Diazote (N2) et dioxygène (O2)",
        choice2: "Le CO2 et le diazote",
        choice3: "CO2, dioxyde d'azote (NO2) et ozone",
        choice4: "Ozone (O3) et dioxyde de carbone (CO2)",
        answer: 1
    },
];


//CONSTANTES
const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 10;

startGame = () => {
    questionCounter = 0;
    score = 0;
    availableQuestions = [...questions];
    console.log(availableQuestions);
    getNewQuestion();
};





getNewQuestion = () => {
    if(availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS){
//renvoie a la page finale
localStorage.setItem("ScoreMade",score);
    return window.location.assign("/quiz2endgame.php");
    }
    
//mettre les questions au hasard
    questionCounter++;
    questionCounterText.innerText = questionCounter + "/" + MAX_QUESTIONS;

    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    question.innerText = currentQuestion.question;
//mettre les reponses au hasard
    choices.forEach(choice => {
        const number = choice.dataset["number"];
        choice.innerText = currentQuestion["choice" + number];
    });
//faire en sorte que les questions ne se repettent pas une fois etre choisies
    availableQuestions.splice(questionIndex, 1);
    console.log(availableQuestions);
    acceptingAnswers = true;
};

choices.forEach(choice => {
    choice.addEventListener("click", e => {
        if(!acceptingAnswers) return;

        acceptingAnswers = false;
        const selectedChoice = e.target;
        const selectedAnswer = selectedChoice.dataset["number"];

//Associer aux reponses les mots correct et incorrect par l'intermediaire de classes
    const classToApply = 
        selectedAnswer == currentQuestion.answer ? 'correct' : 'incorrect';

    
    
//Si la reponse est correcte, ajouter au score la valeur associee a CORRECT_BONUS (10)    
    if (classToApply === 'correct') {
        incrementScore(CORRECT_BONUS);
    }
    
//Si on clique sur une des reponses, associer (avec CSS) la bonne couleur (vert ou rouge)
    selectedChoice.parentElement.classList.add(classToApply);


//La question change quand on clique sur le boutton "Question suivante" et la couleur de la question selectionnée précédemment s'efface
const next_que = document.querySelector("footer .next_que");
next_que.onclick = ()=>{ 
    selectedChoice.parentElement.classList.remove(classToApply);
    getNewQuestion();
}

         
    });
});


incrementScore = num => {
    score += num;
    scoreText.innerText = score;


}
startGame();

