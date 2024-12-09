document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('input[name=ort]').addEventListener('keyup', function(event) {
        validateTextField(3, 20, event, document.querySelector('.fehlerOrt'));
    });

    document.querySelector('textarea[name=tierbeschreibung]').addEventListener('keyup', function(event) {
        validateTextField(1, 500, event, document.querySelector('.fehlerBeschreibung'));
    });
});

function validateTextField (min, max, event, errorField) {
    let textField = event.target;
    let field = textField.value.trim();

    if (field.length > max) {
        this.setFehlerFeldInnerHTML(textField, errorField, "Gib maximal "+ max +" Zeichen ein!");
    }
    else if (field.length < min) {
        this.setFehlerFeldInnerHTML(textField, errorField, "Gib mindestens "+ min +" Zeichen ein!");
    }
    else {
        this.removeFehlerfeld(textField, errorField);
    }
}

function setFehlerFeldInnerHTML (textElm, fehlerFeld, innerHTML) {
    textElm.classList.add('falseInputOrTextarea');
    fehlerFeld.classList.remove('hidden');
    fehlerFeld.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> <b>Hinweis:</b> "+innerHTML;
}

function removeFehlerfeld (field, fehlerFeld) {
    field.classList.remove('falseInputOrTextarea');
    fehlerFeld.classList.add('hidden');
}