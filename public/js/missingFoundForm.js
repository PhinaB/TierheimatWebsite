function initializeFormEventListeners() {
    const form = document.getElementById('missingFoundForm');
    if (!form) {
        console.log('Nutzer ist nicht angemeldet.')
        return;
    }
    document.querySelector('input[name=ort]').addEventListener('keyup', function (event) {
        validateTextField(3, 20, event, document.getElementById('ortError'));
    });

    document.querySelector('textarea[name=tierbeschreibung]').addEventListener('keyup', function (event) {
        validateTextField(1, 500, event, document.getElementById('beschreibungError'));
    });

    document.querySelector('.tierbild-upload').addEventListener('click', function () {
        document.querySelector('#tierbild-upload').click();
    });

    document.querySelector('#tierbild-upload').addEventListener('change', function (event) {
        if (validateFileUpload('tierbild-upload', 'fileError')) {
            document.getElementById('fileSuccess').textContent = 'Upload war erfolgreich!'
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Verhindert den normalen Seitenwechsel
        sendMissingFoundForm(); //Absenden des Formulars mit Ajax
    });

    form.addEventListener('reset', function (event) {
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


    currentDate.setHours(0,0,0,0); //um nur Datum zu vergleichen

    if (!dateValue){
        setErrorFieldInnerHTML(dateInput, errorInput, 'Wählen Sie ein Datum aus');
        return false;
    }
    else{
        const selectedDate = new Date(dateValue);

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
        const fileName = file.name; //wählt aus dem File-Objekt den Namen
        const fileExtension = fileName.split('.').pop().toLowerCase(); //extrahiert Dateiendung

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

//für Radio-Button und Datei-Upload
function setErrorFieldInnerHTMLNoOutline (errorField, innerHTML) {
    errorField.classList.remove('hidden');
    errorField.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> <b>Hinweis:</b> "+innerHTML;
}


function removeErrorField (field, errorField) {
    if (field) {
        field.classList.remove('falseInputOrTextarea');
    } else {
        console.error('Field element not found:', field);
    }

    if (errorField) {
        errorField.classList.add('hidden');
    } else {
        console.error('Error field element not found:', errorField);
    }
}

//für Radio-Button und Datei-Upload
function removeErrorFieldNoOutline (errorField) {
    if (errorField) {
        errorField.classList.add('hidden');
    } else {
        console.error('Error field element not found:', errorField);
    }
}

function sendMissingFoundForm(){
    disableFormFields();

    let anliegen = document.getElementById('anliegenVermisstGefunden').value;
    let tierart = document.getElementById('tierart').value;
    let datum = document.getElementById('datum').value;
    let ort = document.getElementById('ort').value;
    let beschreibung = document.getElementById('tierbeschreibung').value;
    let tierbild = document.getElementById('tierbild-upload').files[0] || null;
    let kontakt = document.querySelector('input[name="kontaktaufnahme"]:checked').value;

    let isValid =
        validateSelectField('anliegenVermisstGefunden', 'anliegenError', 'Wählen Sie ein Anliegen aus.') &&
        validateSelectField('tierart','tierartError', 'Wählen Sie eine Tierart aus.') &&
        validateDateField('datum', 'datumError')&&
        validateTextFieldOnSubmit(3, 20, 'ort', 'ortError') &&
        validateTextFieldOnSubmit(3, 500, 'tierbeschreibung', 'beschreibungError') &&
        (tierbild ? validateFileUpload('tierbild-upload', 'fileError') : true) && // Validierung nur bei vorhandenem Bild
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

        formData.append('kontaktaufnahme', kontakt);
        fetch('../public/animal/report', {method: 'POST', body: formData})

            .then(response => {
                if (!response.ok) {
                    console.error('Fehler beim Abrufen der Antwort:', response.status);
                    return Promise.reject('Fehler beim Abrufen der Antwort');
                }
                return response.json();
            })
            .then (data => {
                console.log(data);
                if (data.success) {
                    resetMissingFoundForm();

                    const successMessage = document.getElementById('successfulSubmit');
                    successMessage.textContent = 'Daten wurden erfolgreich verarbeitet';
                    successMessage.classList.remove('hidden');

                    setTimeout(()=>{
                        successMessage.classList.add('hidden');},
                        5000);
                } else {
                if(data.errors && data.errors.length > 0){
                    document.getElementById('errorSubmit').textContent = 'Füllen Sie alle Pflichtfelder aus.';
                }
                }
            })

            .catch (error => {
                console.error('Fehler beim Login:', error);
                document.getElementById('errorSubmit').textContent = 'Ein Fehler ist aufgetreten.';
            })
            .finally (()=>{
                enableFormFields();
            })

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

    const fileInput = document.getElementById('tierbild-upload');

    if (fileInput){
        fileInput.value= '';
    }

    const kontaktRadios = document.querySelectorAll('input[name="kontaktaufnahme"]')
    kontaktRadios.forEach(radio => radio.checked=false);


    console.log('Formular zurückgesetzt.')
}