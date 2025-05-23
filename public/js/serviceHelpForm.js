document.addEventListener('DOMContentLoaded', function() {
    checkLoginStatus();
});

function loadContentToPage () {
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                const response = JSON.parse(this.response);

                let copyHereTypeOfHelpInputs = document.querySelector('#artDerHilfeInputs');
                for (let i = 0; i < response.alleHilfearten.length; i++) {
                    let output = response.alleHilfearten[i].artDerHilfe
                        .split(" ")
                        .map((word, index) =>
                            index === 0
                                ? word.toLowerCase()
                                : word.charAt(0).toUpperCase() + word.slice(1)
                        )
                        .join("");

                    let input = document.createElement('input');
                    input.type = "radio";
                    input.name = "unterstützungsart";
                    input.setAttribute('aria-describedby', 'unterstuetzungError');
                    input.setAttribute('onclick', 'validateUnterstuetzung()');
                    input.value = response.alleHilfearten[i].artDerHilfe;
                    input.id = output;
                    copyHereTypeOfHelpInputs.appendChild(input);

                    let label = document.createElement('label');
                    label.innerHTML = response.alleHilfearten[i].artDerHilfe;
                    label.classList.add('helfenUnterpunkt');
                    label.setAttribute('for', output);
                    copyHereTypeOfHelpInputs.appendChild(label);

                    let br = document.createElement('br');
                    copyHereTypeOfHelpInputs.appendChild(br);
                }
            }
        }
    }
    xhttp.open('POST', '../public/load/all/serviceInfo');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

function reset() {
    let tableBody = document.getElementById('newWeekDayCopyHere');
    for (let i = tableBody.children.length - 1; i >= 0; i--) {
        tableBody.removeChild(tableBody.children[i]);
    }

    let tableNewDayCopyHere = document.getElementById('newDayCopyHere');
    for (let i = tableNewDayCopyHere.children.length - 1; i >= 0; i--) {
        tableNewDayCopyHere.removeChild(tableNewDayCopyHere.children[i]);
    }

    document.querySelector('.erfolgsnachricht').innerHTML = "";

    reloadingPage();
}

function reloadingPage () {
    addNewWeekday();
    addNewDay();

    const formular = document.querySelector('#formular');
    const formularButtons = formular.querySelectorAll('button');
    const formularInputs = formular.querySelectorAll('input');
    const formularSelects = formular.querySelectorAll('select');
    const errorFields = formular.querySelectorAll('.fehlermeldung');

    for (let i = 0; i < formularButtons.length; i++) {
        formularButtons[i].removeAttribute('disabled');
        formularButtons[i].classList.remove('disabledButton');
        formularButtons[i].classList.add('button');
    }
    for (let i = 0; i < formularInputs.length; i++) {
        if (formularInputs[i].type === 'radio') {
            formularInputs[i].checked = false;
        }
        else {
            formularInputs[i].value = "";
        }
        formularInputs[i].removeAttribute('disabled');
    }
    for (let i = 0; i < formularSelects.length; i++) {
        formularSelects[i].value = "0";
        formularSelects[i].removeAttribute('disabled');
    }
    for (let i = 0; i < errorFields.length; i++) {
        errorFields[i].classList.add('hidden');
    }
}

function validateUnterstuetzung () {
    let radioInputs = document.querySelector('.unterstützungsart').querySelectorAll('input[type=radio]');
    for (let i = 0; i < radioInputs.length; i++) {
        radioInputs[i].removeAttribute('aria-invalid');
    }
    let errorField = document.querySelector('#unterstuetzungError');
    errorField.innerHTML = "";
}

function validateDateOrTime (elem) {
    if (elem.value) {
        valTime(elem, 'fehlerTag');
    }
}

function validateWeekday (elem) {
    if (elem.value !== "0") {
        valTime(elem, 'fehlerWochentag');
    }
}

function validateWeekdayTime (elem) {
    if (elem.value) {
        valTime(elem, 'fehlerWochentag');
    }
}

function valTime (elem, errorClass) {
    elem.removeAttribute('aria-invalid');
    elem.classList.remove('falseInputOrTextarea');

    document.querySelector('.'+errorClass).innerHTML = "";

    const errorComplete = document.querySelector('.fehlerKomplett');
    if (!errorComplete.classList.contains('hidden')) {
        errorComplete.innerHTML = "";
        errorComplete.classList.add('hidden');
    }
}

function addNewWeekday () {
    let tableBody = document.getElementById('newWeekDayCopyHere');
    const template = document.getElementById('hiddenWeekday');

    if (tableBody.children.length >= 14) {
        return;
    }

    let clone = template.content.cloneNode(true);
    tableBody.appendChild(clone);

    if (tableBody.children.length >= 14) {
        let button = document.querySelector('#newWeekDay');
        button.classList.add('disabledButton');
        button.classList.remove('button');

        button.setAttribute('title', 'Es kann kein weiterer Wochentag hinzugefügt werden');
        button.setAttribute('disabled', 'disabled');
    }

    removeDisableInputs(tableBody);

    let select = document.querySelector('#formular').querySelectorAll('select');
    select[select.length - 1].value = "0";
    select[select.length - 1].removeAttribute('disabled');
}

function addNewDay () {
    let tableBodyNewDay = document.getElementById('newDayCopyHere');
    let templateNewDay = document.getElementById('hiddenDay');

    let clone = templateNewDay.content.cloneNode(true);
    tableBodyNewDay.appendChild(clone);

    removeDisableInputs(tableBodyNewDay);
}

function removeDisableInputs (element) {
    let inputs = element.querySelectorAll('input');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute('disabled');
    }
}

function removeTableTr (field) {
    const row = field.closest('tr');

    if (row) {
        let parentTbody = row.parentElement;
        let headerRow = row.previousElementSibling;

        parentTbody.removeChild(row);

        if (headerRow && headerRow.tagName === 'TR') {
            parentTbody.removeChild(headerRow);
        }
    }
}

function setErrorField(field, errorField, innerHTML) {
    field.classList.add('falseInputOrTextarea');
    errorField.classList.remove('hidden');
    errorField.innerHTML = innerHTML;

    field.setAttribute('aria-invalid', 'true');

    let offset = window.scrollY + field.getBoundingClientRect().top;
    window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
}

function send () {
    const form = document.querySelector('#formular');

    let inputsSupportType = form.querySelectorAll('input[name=unterstützungsart]');
    let supportType;
    let counter = 0;
    for (let i = 0; i < inputsSupportType.length; i++) {
        if (inputsSupportType[i].checked) {
            supportType = inputsSupportType[i].value;
            break;
        }
        counter++;
    }
    if (counter === inputsSupportType.length) {
        const errorFieldSupport = form.querySelector('.fehlerUnterstuetzung');

        for (let i = 0; i < inputsSupportType.length; i++) {
            setErrorField(inputsSupportType[i], errorFieldSupport, "Gib eine Hilfe an");
            inputsSupportType[i].setAttribute('aria-invalid', 'true');
        }

        return;
    }

    let dateFields = document.querySelectorAll('#newDayCopyHere input[type="date"]');
    let timeFields = document.querySelectorAll('#newDayCopyHere input[type="time"]');
    const errorFieldDay = form.querySelector('.fehlerTag');

    let weekdayFields = document.querySelectorAll('#newWeekDayCopyHere select[name="wochentag"]');
    let timeWeekdayFields = document.querySelectorAll('#newWeekDayCopyHere input[type="time"]');
    const errorFieldWeekdays = form.querySelector('.fehlerWochentag');

    let hasFilledRow = false;
    for (let i = dateFields.length - 1; i >= 0 ; i--) {
        if (dateFields[i].value === '' && timeFields[i].value === '') {
            if (i === 0 && !hasFilledRow) {
                break;
            }
            removeTableTr(dateFields[i]);
        }
        else {
            hasFilledRow = true;
        }
    }

    let combinations = [];

    for (let i = 0; i < dateFields.length; i++) {
        if (dateFields[i].value && timeFields[i].value) {
            let combination = dateFields[i].value + ' ' + timeFields[i].value;

            if (combinations.includes(combination)) {
                removeTableTr(dateFields[i]);
            }

            combinations.push(combination);
        }
    }

    hasFilledRow = false;
    for (let i = weekdayFields.length - 1; i >= 0 ; i--) {
        if (weekdayFields[i].value === '0' && timeWeekdayFields[i].value === '') {
            if (i === 0 && !hasFilledRow) {
                break;
            }
            removeTableTr(weekdayFields[i]);
        }
        else {
            hasFilledRow = true;
        }
    }

    let combinationsWeekday = [];

    for (let i = 0; i < weekdayFields.length; i++) {
        if (weekdayFields[i].value && timeWeekdayFields[i].value) {
            let combinationWeekday = weekdayFields[i].value + ' ' + timeWeekdayFields[i].value;

            if (combinationsWeekday.includes(combinationWeekday)) {
                removeTableTr(weekdayFields[i]);
            }

            combinationsWeekday.push(combinationWeekday);
        }
    }

    let newDateFields = document.querySelectorAll('#newDayCopyHere input[type="date"]');
    let newTimeFields = document.querySelectorAll('#newDayCopyHere input[type="time"]');
    let newWeekdayFields = document.querySelectorAll('#newWeekDayCopyHere select[name="wochentag"]');
    let newTimeWeekdayFields = document.querySelectorAll('#newWeekDayCopyHere input[type="time"]');

    const errorComplete = form.querySelector('.fehlerKomplett');

    const dateTimeEmpty = Array.from(newDateFields).every(field => field.value === '') &&
                                Array.from(newTimeFields).every(field => field.value === '');

    const weekdayTimeEmpty = Array.from(newWeekdayFields).every(field => field.value === '0') &&
                                   Array.from(newTimeWeekdayFields).every(field => field.value === '');

    const dateTimeALittleBitFilled = Array.from(newDateFields).every(field => field.value !== '') ||
                                Array.from(newTimeFields).every(field => field.value !== '');

    const weekdayTimeALittleBitFilled = Array.from(newWeekdayFields).every(field => field.value !== '0') ||
                                   Array.from(newTimeWeekdayFields).every(field => field.value !== '');

    if (dateTimeEmpty && weekdayTimeEmpty) {
        errorComplete.classList.remove('hidden');
        errorComplete.innerHTML = "Fülle eine Kombination aus Datum & Uhrzeit oder Wochentag & Uhrzeit aus (das Formular darf nicht leer sein)";

        for (let i = 0; i < newDateFields.length; i++) {
            newDateFields[i].setAttribute('aria-invalid', 'true');
            newTimeFields[i].setAttribute('aria-invalid', 'true');
        }

        for (let i = 0; i < newWeekdayFields.length; i++) {
            newWeekdayFields[i].setAttribute('aria-invalid', 'true');
            newTimeWeekdayFields[i].setAttribute('aria-invalid', 'true');
        }
        return;
    }

    if (weekdayTimeEmpty || dateTimeALittleBitFilled) {
        const now = new Date();
        const currentDate = now.toISOString().split('T')[0];
        const currentTime = now.toTimeString().split(' ')[0];

        for (let i = 0; i < newDateFields.length; i++) {
            if (newDateFields[i].value === '') {
                setErrorField(newDateFields[i], errorFieldDay, "Fülle dieses Feld");
                return;
            }

            if (newTimeFields[i].value === '') {
                setErrorField(newTimeFields[i], errorFieldDay, "Fülle dieses Feld");
                return;
            }

            const dateValid = new Date(newDateFields[i].value) > now;
            const timeValid = (newDateFields[i].value === currentDate && newTimeFields[i].value > currentTime) || (newDateFields[i].value > currentDate);

            if (!(dateValid && timeValid)) {
                setErrorField(newDateFields[i], errorFieldDay, "Datum und Zeit muss in der Zukunft liegen");
                newTimeFields[i].classList.add('falseInputOrTextarea');
                return;
            }
        }
    }

    if (dateTimeEmpty || weekdayTimeALittleBitFilled) {
        for (let i = 0; i < newWeekdayFields.length; i++) {
            if (newWeekdayFields[i].value === '0') {
                setErrorField(newWeekdayFields[i], errorFieldWeekdays, "Fülle dieses Feld");
                return;
            }

            if (newTimeWeekdayFields[i].value === '') {
                setErrorField(newTimeWeekdayFields[i], errorFieldWeekdays, "Fülle dieses Feld");
                return;
            }
        }
    }

    const formButtons = form.querySelectorAll('button');
    const formInputs = form.querySelectorAll('input');
    const formSelects = form.querySelectorAll('select');

    let submitButton = null;

    for (let i = 0; i < formButtons.length; i++) {
        formButtons[i].setAttribute('disabled', 'disabled');
        formButtons[i].classList.add('disabledButton');
        formButtons[i].classList.remove('button');

        if (formButtons[i].type === "submit") {
            submitButton = formButtons[i];
        }
    }
    for (let i = 0; i < formInputs.length; i++) {
        formInputs[i].setAttribute('disabled', 'disabled');
    }
    for (let i = 0; i < formSelects.length; i++) {
        formSelects[i].setAttribute('disabled', 'disabled');
    }

    if (submitButton !== null) {
        submitButton.innerHTML = "<i class=\"fa-solid fa-rotate\"></i>  Es lädt ...";
    }

    let data = {
        unterstuetzungsart: supportType,
        dates: Array.from(newDateFields).map(field => field.value),
        times: Array.from(newTimeFields).map(field => field.value),
        weekdays: Array.from(newWeekdayFields).map(field => field.value),
        weekdayTimes: Array.from(newTimeWeekdayFields).map(field => field.value)
    };

    const jsonData = JSON.stringify(data);
    let successMessage = form.querySelector('.erfolgsnachricht');
    successMessage.classList.remove('redColor');
    successMessage.classList.remove('greenColor');
    successMessage.innerHTML = "";

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (submitButton !== null) {
                submitButton.innerHTML = "<i class=\"fa-regular fa-paper-plane\"></i>  Absenden";
            }

            if (xhttp.status >= 200 && xhttp.status < 300) {
                successMessage.classList.add('greenColor');
                reset();
                successMessage.innerHTML = "Die Daten wurden erfolgreich übertragen.";

                setTimeout(function () {
                    successMessage.innerHTML = "";
                }, 5000);
            }
            else {
                for (let i = 0; i < formButtons.length; i++) {
                    formButtons[i].removeAttribute('disabled');
                    formButtons[i].classList.remove('disabledButton');
                    formButtons[i].classList.add('button');
                }
                for (let i = 0; i < formInputs.length; i++) {
                    formInputs[i].removeAttribute('disabled');
                }
                for (let i = 0; i < formSelects.length; i++) {
                    formSelects[i].removeAttribute('disabled');
                }

                successMessage.classList.add('redColor');
                successMessage.innerHTML = "Etwas ist beim Speichern schiefgelaufen! Versuche es nochmal.";
            }
        }
    }
    xhttp.open('POST', '../public/add/help');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(jsonData);
}

function checkLoginStatus() {
    fetch('../public/checkLogin')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                document.getElementById('formContainer').innerHTML = data.formHelp;

                reloadingPage();
                loadContentToPage();

                document.getElementById('newWeekDay').addEventListener('click', function() {
                    addNewWeekday();
                });

                document.getElementById('newDay').addEventListener('click', function() {
                    addNewDay();
                });

                document.querySelector('button[type=submit]').addEventListener('click', function() {
                    send();
                });

                document.querySelector('button[type=reset]').addEventListener('click', function() {
                    reset();
                });
            }
            else{
                document.getElementById('formContainer').innerHTML= data.reportHelp;
            }
        })
        .catch(error =>{
            document.getElementById('errorContainer').textContent = 'Ein Fehler ist aufgetreten';
        });
}