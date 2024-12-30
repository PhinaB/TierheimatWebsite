document.addEventListener("DOMContentLoaded", function(){

    //--------------------Login----------------------------------------------------
    document.querySelector('input[name=email]').addEventListener('keyup', function(event){
        validateEmailField(event, document.querySelector('#emailError'));
    });

    document.querySelector('input[name=password]').addEventListener('keyup', function(event){
        validatePasswordField(6, 30, event, document.querySelector('#passwordError'));
    });

    document.querySelector('#loginForm').addEventListener('submit', function(event){
        event.preventDefault(); //für Ajax, verhindert normales Absenden des Formulars
        handleLogin(); //Absenden des Formulars mit Ajax
    })

    //--------------------Registrierung----------------------------------------------------
    document.querySelector('input[name=emailReg]').addEventListener('keyup', function(event){
        validateEmailField(event, document.querySelector('#emailRegError'));
    });

    document.querySelector('input[name=passwordReg]').addEventListener('keyup', function(event){
        validatePasswordField(6, 30, event, document.querySelector('#passwordRegError'));
    });

    document.querySelector('input[name=usernameReg]').addEventListener('keyup', function(event){
        validateUsernameField(3, 10, event, document.querySelector('#usernameRegError'));
    });

    document.querySelector('#registerForm').addEventListener('submit', function(event){
        event.preventDefault(); //für Ajax, verhindert normales Absenden des Formulars
        handleRegistration(); //Absenden des Formulars mit Ajax
    })
})

function validateEmailField(event, errorField){
    let textField = event.target;
    let fieldValue = textField.value.trim();
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

    if (!emailRegex.test(fieldValue)){
        this.setErrorFieldInnerHTML(textField, errorField, "Gib eine gültige Email-Adresse ein!");
        return false;
    }
    else {
        this.removeErrorField(textField, errorField);
        return true;
    }
}

function validatePasswordField(min, max, event, errorField){
    let textField = event.target;
    let fieldValue= textField.value.trim();

    if (fieldValue.length > max) {
        this.setErrorFieldInnerHTML(textField, errorField, "Gib maximal "+ max +" Zeichen ein!");
        return false;
    }
    else if (fieldValue.length < min) {
        this.setErrorFieldInnerHTML(textField, errorField, "Gib mindestens "+ min +" Zeichen ein!");
        return false;
    }
    else {
        this.removeErrorField(textField, errorField);
        return true;
    }
}

function validateUsernameField(min, max, event, errorField){
    let textField = event.target;
    let fieldValue = textField.value.trim();
    
    if(fieldValue.length > max){
        this.setErrorFieldInnerHTML(textField, errorField, "Gib maximal "+ max +" Zeichen ein!"); 
        return false; 
    }
    if (fieldValue.length < min){
        this.setErrorFieldInnerHTML(textField, errorField, "Gib mindestens "+ min +" Zeichen ein!")
    }
    else {
        this.removeErrorField(textField, errorField);
        return true;
    }
}

function setErrorFieldInnerHTML (textElm, errorField, innerHTML) {
    textElm.classList.add('falseInputOrTextarea');
    errorField.classList.remove('hidden');
    errorField.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> <b>Hinweis:</b> "+innerHTML;
}

function removeErrorField (field, errorField) {
    field.classList.remove('falseInputOrTextarea');
    errorField.classList.add('hidden');
}

//------Ajax---------------


function handleLogin(){
    let email = document.querySelector('input[name=email]').value.trim();
    let password = document.querySelector('input[name=password]').value.trim();

    //{target: ... simuliert Event
    if (validateEmailField({target: {value: email}}, document.querySelector('#emailError')) &&
    validatePasswordField(6, 30, {target: {value: password}}, document.querySelector('#passwordError'))){

        let formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        formData.append('type', 'login');

        fetch('../../app/Controller/UserController', {method: 'POST', body: formData})

        .then(response => response.json())
        .then (data =>{
            if(data.success){
                window.location.href='http://127.0.0.1/ws2425_dwp_wachs_herpe_burger/public/'
            }
            else {
                if (data.errors.email) {
                    setErrorFieldInnerHTML(document.querySelector('input[name=email]'), document.querySelector('#emailError'), data.errors.email);
                }
            }
        })
        //TODO: beenden, auch im Controller notwendige Änderungen vornehmen

    }
}

function handleRegistration(){
    let email = document.querySelector('input[name=emailReg]').value.trim();
    let password = document.querySelector('input[name=passwordReg]').value.trim();
    let username = document.querySelector('input[name=usernameReg]').value.trim();

    if (validateEmailField({target: {value: email}}, document.querySelector('#emailRegError')) &&
        validatePasswordField(6, 30, {target: {value: password}}, document.querySelector('#passwordRegError'))&&
        validateUsernameField(3, 10, {target: {value: email}}, document.querySelector('#usernameRegError')))
        {
            let formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);
            formData.append('username', username);
            formData.append('type', 'register');

            fetch('../../app/Controller/UserController', {method: 'POST', body: formData})
                .then(response => response.json());
            // TODO: beenden, auch im Controller notwendige änderungen vornhemen
        }



    }



