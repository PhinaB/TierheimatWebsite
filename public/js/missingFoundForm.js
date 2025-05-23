function initializeFormEventListeners() {
    const form = document.getElementById('missingFoundForm');
    if (!form) {
        return;
    }
    document.querySelector('input[name=ort]').addEventListener('keyup', function (event) {
        validateTextField(3, 20, event, document.getElementById('ortError'));
    });

    document.querySelector('textarea[name=tierbeschreibung]').addEventListener('keyup', function (event) {
        validateTextField(6, 500, event, document.getElementById('beschreibungError'));
    });

    document.querySelector('.tierbild-upload').addEventListener('click', function () {
        document.querySelector('#tierbild-upload').click();
    });

    document.querySelector('#tierbild-upload').addEventListener('change', function () {
        if (validateFileUpload('tierbild-upload', 'fileError')) {
            document.getElementById('fileSuccess').textContent = 'Upload war erfolgreich!';
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (form.querySelector('input[id=editMode]').value === 'true') {
            sendMissingFoundForm('true');
        }
        else {
            sendMissingFoundForm('false');
        }
    });

    form.addEventListener('reset', function () {
        resetMissingFoundForm();
    });
}


function validateTextField (min, max, event, errorField) {
    let textField = event.target;
    let field = textField.value.trim();

    if (field.length > max) {
        setErrorFieldInnerHTML(textField, errorField, "Gib maximal "+ max +" Zeichen ein!");
        return false;
    }
    else if (field.length < min) {
        setErrorFieldInnerHTML(textField, errorField, "Gib mindestens "+ min +" Zeichen ein!");
        return false;
    }
    else {
        removeErrorField(textField, errorField);
        return true;
    }
}

function validateTextFieldOnSubmit (min, max, fieldId, errorId) {
    const textInput = document.getElementById(fieldId);
    const errorInput = document.getElementById(errorId);

    let fieldValue = textInput.value.trim();

    if (fieldValue.length > max) {
        setErrorFieldInnerHTML(textInput, errorInput, "Gib maximal "+ max +" Zeichen ein!");
        return false;
    }
    else if (fieldValue.length < min) {
        setErrorFieldInnerHTML(textInput, errorInput, "Gib mindestens "+ min +" Zeichen ein!");
        return false;
    }
    else {
        removeErrorField(textInput, errorInput);
        return true;
    }
}

function validateSelectField(selectId, errorId, errorMessage){
    const selectInput = document.getElementById(selectId);
    const errorInput = document.getElementById(errorId);
    if(selectInput.value === ''){
        setErrorFieldInnerHTML(selectInput,errorInput, errorMessage);
        return false;
    }
    else {
        removeErrorField(selectInput, errorInput);
        return true;
    }
}

function validateRadioButtons(){
    const selectedButton = document.querySelector('input[name="kontaktaufnahme"]:checked');
    const errorElement = document.getElementById('kontaktaufnahmeError');

    if (!selectedButton) {
        setErrorFieldInnerHTMLNoOutline (errorElement, 'Wählen Sie eine Art der Kontaktaufnahme aus.')
        return false;
    }
    else{
        removeErrorFieldNoOutline(errorElement);
        return true;
    }
}

function validateDateField(dateId, errorId){
    const dateInput= document.getElementById(dateId);
    const errorInput = document.getElementById(errorId);
    const dateValue = dateInput.value;
    const currentDate = new Date();


    currentDate.setHours(0,0,0,0);

    if (!dateValue){
        setErrorFieldInnerHTML(dateInput, errorInput, 'Wählen Sie ein Datum aus');
        return false;
    }
    else{
        const selectedDate = new Date(dateValue);
        selectedDate.setHours(0, 0, 0, 0);

         if (selectedDate > currentDate){
            setErrorFieldInnerHTML(dateInput, errorInput, 'Datum darf nicht in der Zukunft liegen');
            return false;
         }
         else {
             removeErrorField(dateInput, errorInput);
         }
    }
     return true;
}

function validateFileUpload(fileId, errorId){
    const fileInput = document.getElementById(fileId);
    const errorInput = document.getElementById(errorId);
    const file = fileInput.files[0];

    if(!file){
        return true;
    }

    if (file){
        const fileName = file.name;
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (!['jpg', 'jpeg', 'png'].includes(fileExtension)){
            setErrorFieldInnerHTMLNoOutline (errorInput, 'Nur .jpg, .jpeg und .png Dateien sind erlaubt.');
            return false;
        }

        const allowedMimeTypes = ['image/jpeg', 'image/png'];
        if (!allowedMimeTypes.includes(file.type)) {
            setErrorFieldInnerHTMLNoOutline(errorInput, 'Nur .jpg, .jpeg und .png Dateien sind erlaubt.');
            return false;
        }

        if (fileInput.files.length > 1){
            setErrorFieldInnerHTMLNoOutline (errorInput, 'Es darf nur eine Datei hochgeladen werden.')
            return false;
        }
    }
    removeErrorFieldNoOutline(errorInput);
    return true;
}

function setErrorFieldInnerHTML (element, errorField, innerHTML) {
    element.classList.add('falseInputOrTextarea');
    errorField.classList.remove('hidden');
    errorField.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> <b>Hinweis:</b> "+innerHTML;
}

function setErrorFieldInnerHTMLNoOutline (errorField, innerHTML) {
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

function removeErrorFieldNoOutline (errorField) {
    if (errorField) {
        errorField.classList.add('hidden');
    }
}

function sendMissingFoundForm(editMode){
    disableFormFields();

    let anliegen = document.getElementById('anliegenVermisstGefunden').value;
    let tierart = document.getElementById('tierart').value;
    let datum = document.getElementById('datum').value;
    let ort = document.getElementById('ort').value;
    let beschreibung = document.getElementById('tierbeschreibung').value;
    let tierbild = document.getElementById('tierbild-upload').files[0] || null;
    let kontakt = document.querySelector('input[name="kontaktaufnahme"]:checked').value;

    let id = document.getElementById('animalId').value;

    let isValid =
        validateSelectField('anliegenVermisstGefunden', 'anliegenError', 'Wählen Sie ein Anliegen aus.') &&
        validateSelectField('tierart','tierartError', 'Wählen Sie eine Tierart aus.') &&
        validateDateField('datum', 'datumError')&&
        validateTextFieldOnSubmit(3, 20, 'ort', 'ortError') &&
        validateTextFieldOnSubmit(3, 500, 'tierbeschreibung', 'beschreibungError') &&
        (tierbild ? validateFileUpload('tierbild-upload', 'fileError') : true) &&
        validateRadioButtons();

    if(!isValid){
        document.getElementById('errorSubmit').textContent = 'Füllen Sie alle Pflichtfelder korrekt aus.';
        enableFormFields();
        return;
    }

    let formData = new FormData();
    formData.append('anliegenVermisstGefunden', anliegen);
    formData.append('tierart', tierart);
    formData.append('datum', datum);
    formData.append('ort', ort);
    formData.append('tierbeschreibung', beschreibung);

    if (tierbild){
        formData.append('tierbild', tierbild);
    }
    if (id !== ''){
        formData.append('tierId', id);
    }

    formData.append('kontaktaufnahme', kontakt);
    formData.append('editMode', editMode);

    fetch('../public/animal/report', {method: 'POST', body: formData})
        .then(response => {
            if (!response.ok) {
                document.getElementById('errorSubmit').textContent = 'Ein Fehler ist aufgetreten.';
                return Promise.reject('Fehler beim Abrufen der Antwort');
            }
            return response.json();
        })
        .then (data => {
            if (data.success) {
                resetMissingFoundForm();

                const successMessage = document.getElementById('successfulSubmit');
                successMessage.innerHTML = 'Daten wurden erfolgreich verarbeitet. <b>Laden Sie die Seite neu.</b>';
                successMessage.classList.remove('hidden');

                const form = document.getElementById('missingFoundForm');
                form.querySelector('input[id=editMode]').value = 'false';

                setTimeout(()=>{
                    successMessage.classList.add('hidden');},
                    10000);
            } else {
            if(data.errors && data.errors.length > 0){
                document.getElementById('errorSubmit').textContent = 'Füllen Sie alle Pflichtfelder aus.';
            }
            }
        })

        .catch (() => {
            document.getElementById('errorSubmit').textContent = 'Ein Fehler ist aufgetreten.';
        })
        .finally (()=>{
            enableFormFields();
        });

}

function disableFormFields(){
    const formElements = document.querySelectorAll('#missingFoundForm select #missingFoundForm input #missingFoundForm select, #missingFoundForm textarea, #missingFoundForm button');
    formElements.forEach(function(element) {element.disabled = true});
}

function enableFormFields(){
    const formElements = document.querySelectorAll('#missingFoundForm select #missingFoundForm input #missingFoundForm select, #missingFoundForm textarea, #missingFoundForm button');
    formElements.forEach(function(element) {element.disabled = false;});
}

function resetMissingFoundForm(){
    document.querySelectorAll('.fehlermeldung').forEach(element =>element.textContent = '');

    document.getElementById('anliegenVermisstGefunden').value = '';
    document.getElementById('tierart').value = '';
    document.getElementById('datum').value = '';
    document.getElementById('ort').value = '';
    document.getElementById('tierbeschreibung').value = '';
    document.getElementById('fileSuccess').innerHTML = '';

    const fileInput = document.getElementById('tierbild-upload');

    if (fileInput){
        fileInput.value= '';
    }

    const kontaktRadios = document.querySelectorAll('input[name="kontaktaufnahme"]')
    kontaktRadios.forEach(radio => radio.checked=false);
}