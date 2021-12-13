const start_btn = document.querySelector(".start_btn button");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");



start_btn.onclick = ()=>{
    quiz_box.classList.add("activeQuiz");
}
