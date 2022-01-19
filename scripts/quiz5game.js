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
        question: "poso malakas eisai agori mou?",
        choice1: "Poli",
        choice2: "Ligo",
        choice3: "Etsi kai etsi",
        choice4: "Asto kalitera",
        answer: 1
    },
    {
        question: "Quels sont les véhicules les plus polluants?",
        choice1: "Les véhicules utilisant de l'essence",
        choice2: "Les véhicules hybrides",
        choice3: "Les véhicules utlisant du gazole",
        choice4: "Les véhicules éléctriques",
        answer: 1
    },
    {
        question: "Quelle est la qualité de l'air à Paris?",
        choice1: "Bonne",
        choice2: "Moyenne",
        choice3: "Dégradée",
        choice4: "Très mauvaise",
        answer: 2 
    },
    {
        question: "Que faut-il privilégier pour diminuer la pollution de l'air?",
        choice1: "La marche",
        choice2: "Le métro",
        choice3: "Les transports en commun",
        choice4: "Le vélo",
        answer: 4
    }
];


//CONSTANTES
const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 4;

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
    return window.location.assign("/quiz4endgame.php");
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

