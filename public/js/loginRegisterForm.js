document.addEventListener("DOMContentLoaded", function(){
    //--------------------Login----------------------------------------------------
    document.querySelector('input[name=email]').addEventListener('keyup', function(event){
        validateEmailField(event, document.querySelector('#emailError'));
    });

    document.querySelector('input[name=password]').addEventListener('keyup', function(event){
        validatePasswordField(6, 30, event, document.querySelector('#passwordError'));
    });

    document.querySelector('#loginForm').addEventListener('submit', function(event){
        event.preventDefault();
        handleLogin();
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
        event.preventDefault();
        handleRegistration();
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
    if (field) {
        field.classList.remove('falseInputOrTextarea');
    }

    if (errorField) {
        errorField.classList.add('hidden');
    }
}

function validateEmailFieldOnSubmit (inputField, errorField){
    let fieldValue = inputField.value.trim();

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(fieldValue)) {
        setErrorFieldInnerHTML(inputField, errorField, "Gib eine gültige Email-Adresse ein!");
        return false;
    } else {
        removeErrorField(inputField, errorField);
        return true;
    }
}

function validatePasswordFieldOnSubmit (min, max, inputField, errorField){
    let fieldValue = inputField.value.trim();

    if (fieldValue.length > max) {
        this.setErrorFieldInnerHTML(inputField, errorField, "Gib maximal "+ max +" Zeichen ein!");
        return false;
    }
    else if (fieldValue.length < min) {
        this.setErrorFieldInnerHTML(inputField, errorField, "Gib mindestens "+ min +" Zeichen ein!");
        return false;
    }
    else {
        this.removeErrorField(inputField, errorField);
        return true;
    }
}

function validateUsernameFieldOnSubmit(min, max, inputField, errorField){
    let fieldValue = inputField.value.trim();

    if(fieldValue.length > max){
        this.setErrorFieldInnerHTML(inputField, errorField, "Gib maximal "+ max +" Zeichen ein!");
        return false;
    }
    if (fieldValue.length < min){
        this.setErrorFieldInnerHTML(inputField, errorField, "Gib mindestens "+ min +" Zeichen ein!")
    }
    else {
        this.removeErrorField(inputField, errorField);
        return true;
    }
}

function disableFormFields(){
    const formElements = document.querySelectorAll('#loginForm input, #loginForm button, #registerForm input, #registerForm button');
    formElements.forEach(function(element) {element.disabled = true});
}

function enableFormFields(){
    const formElements = document.querySelectorAll('#loginForm input, #loginForm button, #registerForm input, #registerForm button');
    formElements.forEach(function(element) {element.disabled = false;});
}

function handleLogin(){
    disableFormFields();

    const emailInput = document.querySelector('input[name=email]');
    const passwordInput = document.querySelector('input[name=password]');
    let email = document.querySelector('input[name=email]').value.trim();
    let password = document.querySelector('input[name=password]').value.trim();

    if (validateEmailFieldOnSubmit(emailInput, document.querySelector('#emailError')) &&
        validatePasswordFieldOnSubmit(6, 30, passwordInput, document.querySelector('#passwordError'))){

        let formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        formData.append('type', 'login');

        fetch('../public/user/login', {method: 'POST', body: formData})
            .then(response => {
                if (!response.ok) {
                    alert('Fehler beim Abrufen der Antwort: '+ response.status);
                    return Promise.reject('Fehler beim Abrufen der Antwort');
                }
                return response.json();
            })
            .then (data => {
                if(data.success){
                    window.location.href='../public/'
                }
                else {
                    if (data.errors.email) {
                        setErrorFieldInnerHTML(document.querySelector('input[name=email]'), document.querySelector('#emailError'), data.errors.email);
                    }
                    if (data.errors.password) {
                        setErrorFieldInnerHTML(document.querySelector('input[name=password]'), document.querySelector('#passwordError'), data.errors.password);
                    }
                    if(data.errors.general) {
                        document.getElementById('loginError').textContent ='Login fehlgeschlagen.';
                    }
                }
            })
            .catch(error=>{
                alert('Fehler beim Login ' + error);
            })
            .finally (()=>{
                enableFormFields();
            })
    }
    else {
        document.getElementById('loginError').textContent = 'Füllen Sie alle Pflichtfelder aus.'
        enableFormFields();
    }
}



function handleRegistration(){
    disableFormFields();
    const emailRegInput = document.querySelector('input[name=emailReg]');
    const passwordRegInput = document.querySelector('input[name=passwordReg]');
    const usernameRegInput = document.querySelector('input[name=usernameReg]');
    let emailReg = document.querySelector('input[name=emailReg]').value.trim();
    let passwordReg = document.querySelector('input[name=passwordReg]').value.trim();
    let usernameReg = document.querySelector('input[name=usernameReg]').value.trim();

    if (validateEmailFieldOnSubmit(emailRegInput, document.querySelector('#emailRegError')) &&
        validatePasswordFieldOnSubmit(6, 30, passwordRegInput, document.querySelector('#passwordRegError'))&&
        validateUsernameFieldOnSubmit(3, 10, usernameRegInput, document.querySelector('#usernameRegError')))
    {
        let formData = new FormData();
        formData.append('emailReg', emailReg);
        formData.append('passwordReg', passwordReg);
        formData.append('usernameReg', usernameReg);
        formData.append('type', 'register');

        fetch('../public/user/register', { method: 'POST', body: formData })
            .then(response => {
                return response.text();
            })
            .then(data => {
                try {
                    const jsonData = JSON.parse(data);
                    if (jsonData.success) {
                        resetRegistration();

                        const successMessage = document.getElementById('successfulRegistration');
                        successMessage.textContent = 'Registrierung war erfolgreich';
                        successMessage.classList.remove('hidden');

                        setTimeout(()=>{
                                successMessage.classList.add('hidden');},
                            5000);
                    } else {
                        if (jsonData.errors.emailReg) {
                            setErrorFieldInnerHTML(document.querySelector('input[name=emailReg]'), document.querySelector('#emailRegError'), jsonData.errors.emailReg);
                        }
                        if (jsonData.errors.passwordReg) {
                            setErrorFieldInnerHTML(document.querySelector('input[name=passwordReg]'), document.querySelector('#passwordRegError'), jsonData.errors.passwordReg);
                        }
                        if (jsonData.errors.usernameReg) {
                            setErrorFieldInnerHTML(document.querySelector('input[name=usernameReg]'), document.querySelector('#usernameRegError'), jsonData.errors.usernameReg);
                        }
                        if (jsonData.errors.general) {
                            document.getElementById('errorRegistration').textContent = 'Nutzer existiert bereits.'
                        }
                    }
                } catch (e) {
                    alert('Fehler beim Parsen der JSON-Antwort: '+e);
                }
            })
            .catch(error => {
                alert('Fehler:'+ error);})
            .finally (()=>{
                enableFormFields();
            })
    }
    else {
        document.getElementById('errorRegistration').textContent = 'Füllen Sie alle Pflichtfelder aus.';
        enableFormFields();
    }
}

function resetLogin() {
    document.querySelectorAll('.fehlermeldung').forEach(element =>element.textContent = '');

    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
}

function resetRegistration() {
    document.querySelectorAll('.fehlermeldungReg').forEach(element =>element.textContent = '');

    document.getElementById('emailReg').value = '';
    document.getElementById('passwordReg').value = '';
    document.getElementById('username').value = '';
}



