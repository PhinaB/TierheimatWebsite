document.addEventListener('DOMContentLoaded', function() {
    loadTiere();
});

let tierartenMitRassen = {};

function loadTiere () {
    let fehlerGesamt = document.querySelector('.fehlerLoading');
    fehlerGesamt.innerHTML = "";  // TODO: Fehlermeldung ausblenden, wenn etwas anderes gedrückt wurde

    // Ajax:
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                let response = JSON.parse(this.response);

                setTiereToPage(response.tiere);

                let selectTierart = document.querySelector('select[id=tierartAuswählen]');
                let selectRasse = document.querySelector('select[id=rasseAuswählen]');
                let selectGeschlecht = document.querySelector('select[id=geschlechtAuswählen]');
                addFilteroptionToSelect(selectTierart, response.tierarten);
                //addFilteroptionToSelect(selectRasse, response.rasse); // TODO: Rassen erst befüllen, wenn Tierart befüllt
                addFilteroptionToSelect(selectGeschlecht, response.geschlecht);

                tierartenMitRassen = response.tierarten;

                document.querySelector('#page').classList.remove('hidden');
            }
            else {
                fehlerGesamt.innerHTML = "Die Tiere konnten nicht geladen werden!";
            }

            let spinner = document.getElementById('loading');
            spinner.classList.add('hidden');
        }
    }
    xhttp.open('POST', '../public/load/alle/unsere/tiere');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

function setTiereToPage (tiere) {
    let counter = 0;
    let copyAlleTiereHere = document.querySelector('#copyAlleTiereHere');
    let aussenDiv;

    for (let i = 0; i < tiere.length; i++) {
        if (counter % 4 === 0) {
            aussenDiv = document.createElement('div');
            aussenDiv.classList.add('box-containerUnsereTiere');
            aussenDiv.classList.add('tile');
            copyAlleTiereHere.appendChild(aussenDiv);
        }

        let hiddenTierDiv = document.querySelector('#hiddenVorlageTier');

        let clone = hiddenTierDiv.cloneNode(true);
        aussenDiv.appendChild(clone);

        clone.classList.remove('hidden');
        clone.id = "";
        let h3 = clone.getElementsByTagName('h3');
        h3[0].innerHTML = tiere[i].Name;

        let bildwechselA = clone.querySelector('.bildwechsel');

        let tierbilder = tiere[i].Bilder;

        tierbilder.forEach((bild) => {
            if (bild.Hauptbild === "1") {
                bildwechselA.style.setProperty('--before-image', "url('../img/"+bild.Bildadresse+"')");
                bildwechselA.alt = bild.Alternativtext;
            }
            else if (bild.Hauptbild === "0") {
                bildwechselA.style.setProperty('--after-image', "url('../img/"+bild.Bildadresse+"')");
            }
        });

        let beschreibungBeginn = clone.querySelector('.beschreibungBeginn');
        let beschreibungWorte = tiere[i].Beschreibung.split(' ');
        beschreibungBeginn.innerHTML = beschreibungWorte.slice(0, 2).join(' ') + ' ...';

        counter++;
    }
}

function addFilteroptionToSelect (select, options) {
    for(let i = 0; i <= options.length; i++) {
        let option;
        if (i === 0) {
            option = new Option('Bitte wählen', i);
        }
        else {
            option = new Option(options[i-1].name, options[i-1].name);
        }

        select.options[i] = option;
    }
}

function changeRasseSelect() {
    let tierart = document.querySelector('select[id=tierartAuswählen]').value;
    let rasseSelect = document.querySelector('select[id=rasseAuswählen]');

    let options = rasseSelect.querySelectorAll('option');
    for (let i = rasseSelect.length - 1; i >= 0; i--) {
        if (options[i].value !== '0') {
            rasseSelect.removeChild(options[i]);
        }
    }

    if (tierart !== "0") {
        rasseSelect.removeAttribute('disabled');
        for (let i = 0; i < tierartenMitRassen.length; i++) {
            if (tierartenMitRassen[i].name === tierart) {
                addFilteroptionToSelect(rasseSelect, tierartenMitRassen[i].rassen);
            }
        }
    }
    else {
        rasseSelect.setAttribute('disabled', 'disabled');
    }
}