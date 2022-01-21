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
        question: "A quoi est due principalement la pollution de l'air en France, hormis les phénomènes naturels ?",
        choice1: "Les transports en ville",
        choice2: "L'ensemble des industries",
        choice3: "Les déplacements sur le territoire national  ",
        choice4: "L'agriculture",
        answer: 2
    },
    {
        question: "Quels sont les véhicules les plus polluants ?",
        choice1: "Les véhicules utilisant de l'essence",
        choice2: "Les véhicules électriques",
        choice3: "Les véhicules diesel",
        choice4: "Les véhicules hybrides",
        answer: 3
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
        question: "Quelle est la ville la plus polluée du monde en 2021?",
        choice1: "Paris (France)",
        choice2: "Lahore (Pakistan)",
        choice3: "Lima (Pérou)",
        choice4: "Tokyo (Japon)",
        answer: 3
    },
    {
        question: "Quelle perte de rendement la pollution atmosphérique peut-elle occasionner dans l'agriculture ?",
        choice1: "80 à 100 % ",
        choice2: " Moins de 5 % ",
        choice3: "5 à 20 % ",
        choice4: "Environ 50%",
        answer: 3
    },
    {
        question: "D’où provient la pollution atmosphérique ?",
        choice1: "Par les phénomènes naturels",
        choice2: "Par des centrales thermiques",
        choice3: "circulation de véhicules",
        choice4: "De plusieurs facteurs",
        answer: 4 
    },
    {
        question: "Le dioxyde de soufre et les oxydes d’azote sont responsables ",
        choice1: "des pluies acides",
        choice2: "de la désertification",
        choice3: "du réchauffement climatique",
        choice4: "des pluies acides et de l'altération des écosystèmes",
        answer: 4 
    },
    {
        question: "Les polluants, comme le gaz carbonique, ",
        choice1: "sont responsables pluies acides",
        choice2: "contribuent à accroître l’effet de serre ",
        choice3: "sont responsables des feux en amazonies",
        choice4: "sont responsables d'aure chose",
        answer: 2 
    },
    {
        question: "Les processus naturels d'altération des murs et des bâtiments sont essentiellement dus ",
        choice1: "aux conditions climatiques",
        choice2: "à la mauvaise structure",
        choice3: "à la mauvaise qualité des matériaux utilisés",
        choice4: "aux activité humaines du quotidien",
        answer: 1 
    },
    {
        question: "Quelle est la ville de France où l'air est le plus pollué en 2018 ?",
        choice1: "Lyon",
        choice2: " Grenoble",
        choice3: "Paris",
        choice4: "Marseille",
        answer: 3 
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

//renvoie a la page finale avec le score
    if(availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS){
        localStorage.setItem("ScoreMade",score);
    return window.location.assign("/quizendgame.php");
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

