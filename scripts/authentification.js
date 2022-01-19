// script js gérant les formulaires d'inscription et de connexion


// erreur de connexion
function displayErrorConnexion(){

    const form = document.getElementById('form_connect');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const error = document.getElementById('error');

    form.addEventListener('submit', (e) => {
        let messages = [];
        if (email.value === '' || email.value == null || password.value === '' || password.value === null) {
            messages.push('Veuillez compléter tous les champs');
        }

        if (email.value.length > 0){
            $.ajax({
                type:'POST',
                url: './authentication/getEmail.php',
                data: { 
                    email: $('#email').val() 
                },
        
                success: function(response){
                    console.log(response)
                    if (response == 1){
                        e.preventDefault();

                        messages.push("Le nom de domaine de l'email saisi n'existe pas");
                        console.log(messages)
                    }
                    if (response == 2){
                        e.preventDefault();

                        messages.push("L'email saisi n'est lié à aucun compte");
                        console.log(messages)
                    }
                }
                
            })
        }

        if (messages.length > 0) {
            e.preventDefault();
            error.innerHTML = messages.join(', ')
        }
    })
}

// erreur d'inscription
function displayErrorInscription(){
    
    const form = document.getElementById('form_connect');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const remember = document.getElementById('remember');
    const error = document.getElementById('error');

    form.addEventListener('submit', (e) => {
        let messages=[];
        
        if (email.value === '' || email.value == null || password.value === '' || password.value === null
            || confirm_password.value === '' || confirm_password.value == null ||
            fname.value === '' || fname.value == null || lname.value === '' || lname.value == null) {

            messages.push('Veuillez compléter tous les champs');
        }

        else if (!remember.checked) {
            messages.push("Veuillez lire et acceptez les conditions générales d'utilisation");
        }

        else if (password.value != confirm_password.value){
            messages.push("Les mots de passe ne correspondent pas")
        }

        else if (password.value.match( /[0-9]/g) && password.value.match( /[A-Z]/g) && 
            password.value.match( /[a-z]/g) && password.value.match( /[^a-zA-Z\d]/g) && password.value.length >= 8){

            return true;

        } else{
            messages.push('Votre mot de passe doit comporter une minuscule, une majuscule, un nombre et un caractère spécial')
            error.innerHTML = messages.join(', ')

            form.addEventListener('submit', (e) => {
                
                e.preventDefault();
                
        })

        }

        if (messages.length > 0) {
            e.preventDefault();
            error.innerHTML = messages.join(', ')
        }
    })
}




