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
                    if (response == "1"){
                        messages.push("Le nom de domaine de l'email saisi n'existe pas");
                    }
                    if (response == "2"){
                        messages.push("L'email saisi n'est lié à aucun compte");
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
}

