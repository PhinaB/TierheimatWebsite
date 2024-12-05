document.addEventListener('DOMContentLoaded', function() {
    reloadingPage();

    document.getElementById('newWeekDay').addEventListener('click', function() {
        addNewWeekday();
    });

    document.getElementById('newDay').addEventListener('click', function() {
        addNewDay();
    });

    document.querySelector('button[type=submit]').addEventListener('click', function() {
        absenden();
    });

    document.querySelector('button[type=reset]').addEventListener('click', function() {
        reset();
    });

    // TODO: Fehler bei radio buttons / inputfeldern und selects wird angezeigt -> Fehlerbox entfernen, wenn etwas eingegeben wird
});

function reset() {
    let tableBody = document.getElementById('newWeekDayCopyHere');
    for (let i = tableBody.children.length - 1; i >= 0; i--) {
        tableBody.removeChild(tableBody.children[i]);
    }

    let tablenewDayCopyHere = document.getElementById('newDayCopyHere');
    for (let i = tablenewDayCopyHere.children.length - 1; i >= 0; i--) {
        tablenewDayCopyHere.removeChild(tablenewDayCopyHere.children[i]);
    }

    document.querySelector('.erfolgsnachricht').innerHTML = "";

    reloadingPage();
}

function reloadingPage () {
    addNewWeekday();
    addNewDay();

    let formular = document.querySelector('#formular');
    let formularButtons = formular.querySelectorAll('button');
    let formularInputs = formular.querySelectorAll('input');
    let formularSelects = formular.querySelectorAll('select');
    let fehlermeldungen = formular.querySelectorAll('.fehlermeldung');

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
    for (let i = 0; i < fehlermeldungen.length; i++) {
        fehlermeldungen[i].classList.add('hidden');
    }
}

function addNewWeekday () {
    let tableBody = document.getElementById('newWeekDayCopyHere');
    let template = document.getElementById('hiddenWeekday');

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
    let row = field.closest('tr');

    if (row) {
        let parentTbody = row.parentElement;
        let headerRow = row.previousElementSibling;

        parentTbody.removeChild(row);

        if (headerRow && headerRow.tagName === 'TR') {
            parentTbody.removeChild(headerRow);
        }
    }
}

function absenden () {
    let formular = document.querySelector('#formular');

    let inputsUnerstuetzung = formular.querySelectorAll('input[name=unterstützungsart]');
    let unterstuetzungsart;
    let counter = 0;
    for (let i = 0; i < inputsUnerstuetzung.length; i++) {
        if (inputsUnerstuetzung[i].checked) {
            unterstuetzungsart = inputsUnerstuetzung[i].value;
            break;
        }
        counter++;
    }
    if (counter === inputsUnerstuetzung.length) {
        let fehlerFeldUnterstuetzung = formular.querySelector('.fehlerUnterstuetzung');
        fehlerFeldUnterstuetzung.classList.remove('hidden');
        fehlerFeldUnterstuetzung.innerHTML = "Gib eine Hilfe an";

        let offset = window.scrollY + inputsUnerstuetzung[0].getBoundingClientRect().top;
        window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
        return;
    }

    let dateFields = document.querySelectorAll('#newDayCopyHere input[type="date"]');
    let timeFields = document.querySelectorAll('#newDayCopyHere input[type="time"]');
    let fehlerFeldDay = formular.querySelector('.fehlerTag');

    let weekdayFields = document.querySelectorAll('#newWeekDayCopyHere select[name="wochentag"]');
    let timeWeekdayFields = document.querySelectorAll('#newWeekDayCopyHere input[type="time"]');
    let fehlerFeldWeekday = formular.querySelector('.fehlerWochentag');

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

    let combinations = []; // Array zum Speichern der Kombinationen

    for (let i = 0; i < dateFields.length; i++) {
        if (dateFields[i].value && timeFields[i].value) {
            let combination = dateFields[i].value + ' ' + timeFields[i].value;

            // Prüfen, ob die Kombination bereits im Array existiert
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

    let combinationsWeekday = []; // Array zum Speichern der Kombinationen

    for (let i = 0; i < weekdayFields.length; i++) {
        if (weekdayFields[i].value && timeWeekdayFields[i].value) {
            let combinationWeekday = weekdayFields[i].value + ' ' + timeWeekdayFields[i].value;

            // Prüfen, ob die Kombination bereits im Array existiert
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

    let fehlerFeldKomplett = formular.querySelector('.fehlerKomplett');

    let dateTimeEmpty = Array.from(newDateFields).every(field => field.value === '') &&
                                Array.from(newTimeFields).every(field => field.value === '');

    let weekdayTimeEmpty = Array.from(newWeekdayFields).every(field => field.value === '0') &&
                                   Array.from(newTimeWeekdayFields).every(field => field.value === '');

    let dateTimeALittleBitFilled = Array.from(newDateFields).every(field => field.value !== '') ||
                                Array.from(newTimeFields).every(field => field.value !== '');

    let weekdayTimeALittleBitFilled = Array.from(newWeekdayFields).every(field => field.value !== '0') ||
                                   Array.from(newTimeWeekdayFields).every(field => field.value !== '');

    if (dateTimeEmpty && weekdayTimeEmpty) {
        fehlerFeldKomplett.classList.remove('hidden');
        fehlerFeldKomplett.innerHTML = "Fülle eine Kombination aus Datum & Uhrzeit oder Wochentag & Uhrzeit aus (das Formular darf nicht leer sein)";
        return;
    }

    if (weekdayTimeEmpty || dateTimeALittleBitFilled) {
        let now = new Date();
        let currentDate = now.toISOString().split('T')[0]; // Datum im Format 'YYYY-MM-DD'
        let currentTime = now.toTimeString().split(' ')[0]; // Zeit im Format 'HH:MM:SS'

        // day Felder:
        for (let i = 0; i < newDateFields.length; i++) {
            if (newDateFields[i].value === '') {
                newDateFields[i].classList.add('falseInputOrTextarea');
                fehlerFeldDay.classList.remove('hidden');
                fehlerFeldDay.innerHTML = "Fülle dieses Feld";

                let offset = window.scrollY + newDateFields[i].getBoundingClientRect().top;
                window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
                return;
            }

            if (newTimeFields[i].value === '') {
                newTimeFields[i].classList.add('falseInputOrTextarea');
                fehlerFeldDay.classList.remove('hidden');
                fehlerFeldDay.innerHTML = "Fülle dieses Feld";

                let offset = window.scrollY + newTimeFields[i].getBoundingClientRect().top;
                window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
                return;
            }

            let dateValid = new Date(newDateFields[i].value) > now;
            let timeValid = (newDateFields[i].value === currentDate && newTimeFields[i].value > currentTime) || (newDateFields[i].value > currentDate);

            if (!(dateValid && timeValid)) {
                newDateFields[i].classList.add('falseInputOrTextarea');
                newTimeFields[i].classList.add('falseInputOrTextarea');
                fehlerFeldDay.classList.remove('hidden');
                fehlerFeldDay.innerHTML = "Datum muss in der Zukunft sein";

                let offset = window.scrollY + newDateFields[i].getBoundingClientRect().top;
                window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
                return;
            }
        }
    }

    if (dateTimeEmpty || weekdayTimeALittleBitFilled) {
        // weekday Felder:
        for (let i = 0; i < newWeekdayFields.length; i++) {
            if (newWeekdayFields[i].value === '0') {
                newWeekdayFields[i].classList.add('falseInputOrTextarea');
                fehlerFeldWeekday.classList.remove('hidden');
                fehlerFeldWeekday.innerHTML = "Fülle dieses Feld";

                let offset = window.scrollY + newWeekdayFields[i].getBoundingClientRect().top;
                window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
                return;
            }

            if (newTimeWeekdayFields[i].value === '') {
                newTimeWeekdayFields[i].classList.add('falseInputOrTextarea');
                fehlerFeldWeekday.classList.remove('hidden');
                fehlerFeldWeekday.innerHTML = "Fülle dieses Feld";

                let offset = window.scrollY + newTimeWeekdayFields[i].getBoundingClientRect().top;
                window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});
                return;
            }
        }
    }

    let formularButtons = formular.querySelectorAll('button');
    let formularInputs = formular.querySelectorAll('input');
    let formularSelects = formular.querySelectorAll('select');

    let submitButton = null;

    for (let i = 0; i < formularButtons.length; i++) {
        formularButtons[i].setAttribute('disabled', 'disabled');
        formularButtons[i].classList.add('disabledButton');
        formularButtons[i].classList.remove('button');

        if (formularButtons[i].type === "submit") {
            submitButton = formularButtons[i];
        }
    }
    for (let i = 0; i < formularInputs.length; i++) {
        formularInputs[i].setAttribute('disabled', 'disabled');
    }
    for (let i = 0; i < formularSelects.length; i++) {
        formularSelects[i].setAttribute('disabled', 'disabled');
    }

    if (submitButton !== null) {
        submitButton.innerHTML = "<i class=\"fa-solid fa-rotate\"></i>  Es lädt ...";
    }

    let data = {
        unterstuetzungsart: unterstuetzungsart,
        dates: Array.from(newDateFields).map(field => field.value),
        times: Array.from(newTimeFields).map(field => field.value),
        weekdays: Array.from(newWeekdayFields).map(field => field.value),
        weekdayTimes: Array.from(newTimeWeekdayFields).map(field => field.value)
    };

    let jsonData = JSON.stringify(data);

    console.log(jsonData);

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (submitButton !== null) {
                submitButton.innerHTML = "<i class=\"fa-regular fa-paper-plane\"></i>  Absenden";
            }

            if (xhttp.status >= 200 && xhttp.status < 300) {
                let erfolgsnachricht = formular.querySelector('.erfolgsnachricht');
                erfolgsnachricht.classList.add('greenColor');
                erfolgsnachricht.innerHTML = "Die Daten wurden erfolgreich übertragen.";

                setTimeout(function () {
                    reset();
                }, 5000);
            }
            else {
                for (let i = 0; i < formularButtons.length; i++) {
                    formularButtons[i].removeAttribute('disabled');
                    formularButtons[i].classList.remove('disabledButton');
                    formularButtons[i].classList.add('button');
                }
                for (let i = 0; i < formularInputs.length; i++) {
                    formularInputs[i].removeAttribute('disabled');
                }
                for (let i = 0; i < formularSelects.length; i++) {
                    formularSelects[i].removeAttribute('disabled');
                }

                let erfolgsnachricht = formular.querySelector('.erfolgsnachricht');
                erfolgsnachricht.classList.add('redColor');
                erfolgsnachricht.innerHTML = "Etwas ist beim Speichern schiefgelaufen! Versuche es nochmal.";
            }
        }
    }
    xhttp.open('POST', '../../Controller/ServiceHelfenController.php'); // TODO
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(jsonData);
}