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
        question: "De combien de morts annuelles la pollution de l'air est-elle responsable en France?",
        choice1: "Plus de 70 000, comme le tabac",
        choice2: "Plus de 5O 000, comme l'alcool",
        choice3: "Plus de 40 000",
        choice4: "20 000 environ",
        answer: 3
    },
    {
        question: "Les émissions de gaz du transport maritime provoquent des milliers de décès prématurés par an dans l'Union européenne. Combien ?",
        choice1: "100 000",
        choice2: "60 000",
        choice3: "5000",
        choice4: "10 000",
        answer: 2
    },
    {
        question: "La pollution atmosphérique a des conséquences néfastes sur la santé. Quelle maladie entraîne-t-elle sur le cerveau ?",
        choice1: "Paranoïa",
        choice2: "Schizoprénie",
        choice3: "L’épilepsie",
        choice4: "Maladies neurodégénératives",
        answer: 4
    },
    {
        question: "Combien de substances dangereuses la fumée de tabac contient-elle ?",
        choice1: "Entre 10 et 20",
        choice2: "Entre 100 et 250",
        choice3: "Plus de 3000",
        choice4: "500",
        answer: 3
    },
    {
        question: "La pollution de l'air tue plusieurs millions de personnes par an dans le monde. Combien ?",
        choice1: "2 millions",
        choice2: "5 millions",
        choice3: "10 millions",
        choice4: "7 millions",
        answer: 4
    },
    {
        question: "Quelle quantité d'air consommons-nous chaque jour ?",
        choice1: "14 millions de litres",
        choice2: "100 litres",
        choice3: "14 000 litres",
        choice4: "4 000 litres",
        answer: 3
    },
    {
        question: "Quels sont les effets de l'ozone sur la santé ?",
        choice1: "Des démangeaisons",
        choice2: " La diarrhée",
        choice3: "Des irritations des yeux, du nez et des voies respiratoires",
        choice4: "Cancer",
        answer: 3
    },
    {
        question: "Quel est le gaz le plus important pour l'homme ?",
        choice1: "Le dioxygène",
        choice2: "L'ozone",
        choice3: "Le dioxyde d'azote",
        choice4: "Le CO2",
        answer: 1
    },
    {
        question: "Quelles sont les personnes les plus sensibles à la pollution de l'air ?",
        choice1: "Les personnes vivant dans des pays chauds",
        choice2: "Les enfants",
        choice3: "Les chauffeurs de bus",
        choice4: "Les asthmatiques",
        answer: 4
    },
    {
        question: "Quel président a baissé la fiscalité sur le gas oil alors que des études démontraient déjà son extême nocivité ?",
        choice1: "Valérie Giscard d'Estaing",
        choice2: "Jacques Chirac",
        choice3: "François Mitterrand",
        choice4: "François Hollande",
        answer: 3
    }
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

