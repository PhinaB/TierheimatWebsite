document.addEventListener('DOMContentLoaded', function() {
    loadTiere();
    document.querySelector('input[name=offset]').value = '0';

    document.querySelector('a[id=weitereTiereAnzeigen]').addEventListener('click', function() {
        let offset = document.querySelector('input[name=offset]');
        offset.value = parseInt(offset.value) + 8;
        loadTiere();
    });
});

let tierartenMitRassen = {};

function loadTiere () {
    document.querySelector('#weitereTiereAnzeigen').classList.add('hidden');

    let spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    let fehlerGesamt = document.querySelector('.fehlerLoading');
    fehlerGesamt.innerHTML = "";  // TODO: Fehlermeldung ausblenden, wenn etwas anderes gedrückt wurde

    let currentTierart = document.querySelector('#currentTierart').value;
    let offset = document.querySelector('input[name=offset]').value;
    let tierartFromSelect = document.querySelector('select[name=tierartAuswählen]').value;
    let rasse = document.querySelector('select[name=rasseAuswählen]').value; // TODO: selects dürfen dann nicht geleert sein
    let geschlecht = document.querySelector('select[name=geschlechtAuswählen]').value;

    let tierart = currentTierart;
    if (currentTierart !== tierartFromSelect && tierartFromSelect !== "") {
        tierart = tierartFromSelect;
    }

    // Ajax:
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                let response = JSON.parse(this.response);

                if (response.tiere.length === 0) {
                    fehlerGesamt.innerHTML = "Wir haben leider gerade kein Tier mit diesen Einstellungen!";
                }
                else {
                    setTiereToPage(response.tiere);

                    if (tierart === "Alle Tiere") {
                        let selectTierart = document.querySelector('select[id=tierartAuswählen]');
                        let selectGeschlecht = document.querySelector('select[id=geschlechtAuswählen]');
                        addFilteroptionToSelect(selectTierart, response.tierarten);
                        addFilteroptionToSelect(selectGeschlecht, response.geschlecht);
                    }

                    tierartenMitRassen = response.tierarten;
                    if (response.countedAnimals > (offset + 8)) {
                        document.querySelector('#weitereTiereAnzeigen').classList.remove('hidden');
                    }
                }

                document.querySelector('#page').classList.remove('hidden');
            }
            else {
                fehlerGesamt.innerHTML = "Die Tiere konnten nicht geladen werden!";
            }

            spinner.classList.add('hidden');
        }
    }
    xhttp.open('POST', '../public/load/alle/unsere/tiere');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('currentTierart='+tierart+'&offset='+offset+'&rasse='+rasse+'&geschlecht='+geschlecht);
}

function search () {
    let tierartInput = document.querySelector('select[name=tierartAuswählen]');
    let rasseInput = document.querySelector('select[name=rasseAuswählen]');
    let geschlechtInput = document.querySelector('select[name=geschlechtAuswählen]');

    let fehlerfeld = document.querySelector('.fehlerFilter');
    fehlerfeld.innerHTML = '';

    if (tierartInput.value === '0' && rasseInput.value === '0' && geschlechtInput.value === '0') {
        fehlerfeld.innerHTML = 'Wähle mindestens eine Sache (Tierart / Tierart und Rasse / Geschlecht) aus!';
        return;
    }

    document.querySelector('#page').classList.add('hidden');
    document.querySelector('input[name=offset]').value = "0";
    let copyAlleTiereHere = document.querySelector('#copyAlleTiereHere');
    copyAlleTiereHere.innerHTML = "";

    loadTiere();
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
        clone.classList.add('completeAnimal');
        clone.id = "";
        clone.getElementsByTagName('h3')[0].innerHTML = tiere[i].Name;
        let allAElements = clone.getElementsByTagName('a');
        for (let i = 0; i < allAElements.length; i++) {
            if (allAElements[i].classList.contains('weiterlesen')) {
                allAElements[i].setAttribute('onclick', 'openWeiterlesenField(this)');
            }
        }

        let beschreibungBeginn = clone.querySelector('.beschreibungBeginn');
        let beschreibungWorte = tiere[i].Beschreibung.split(' ');
        beschreibungBeginn.innerHTML = beschreibungWorte.slice(0, 2).join(' ') + ' ...';

        let hiddenVorlageWeiterlesen = document.querySelector('#hiddenVorlageWeiterlesen');

        let cloneWeiterlesen = hiddenVorlageWeiterlesen.cloneNode(true);
        aussenDiv.appendChild(cloneWeiterlesen);

        const currentYear = new Date().getFullYear(); // Aktuelles Jahr
        const alter = currentYear - tiere[i].Geburtsjahr;

        cloneWeiterlesen.id = "";
        cloneWeiterlesen.getElementsByTagName('h3')[0].innerHTML = tiere[i].Name;
        cloneWeiterlesen.querySelector('.name').innerHTML = '<span class="boldText">Name:</span> ' + tiere[i].Name;
        cloneWeiterlesen.querySelector('.alter').innerHTML = '<span class="boldText">Alter:</span> ' + alter + ' Jahr/e alt';
        cloneWeiterlesen.querySelector('.beiUnsSeit').innerHTML = '<span class="boldText">In der Tierheimat seit:</span> ' + tiere[i].Datum;
        cloneWeiterlesen.querySelector('.charakter').innerHTML = '<span class="boldText">Charaktereigenschaften:</span> ' + tiere[i].Charakter;
        cloneWeiterlesen.querySelector('.beschreibung').innerHTML = tiere[i].Beschreibung;
        cloneWeiterlesen.getElementsByTagName('a')[0].setAttribute('onclick', 'closeWeiterlesenField(this)');

        // Bilder:
        let bildwechselA = clone.querySelector('.bildwechsel');

        let tierbilder = tiere[i].Bilder;

        tierbilder.forEach((bild) => {
            if (bild.Hauptbild === "1") {
                bildwechselA.style.setProperty('--before-image', "url('../img/"+bild.Bildadresse+"')");
                bildwechselA.alt = bild.Alternativtext;

                // Bild für weiterlesen Feld:
                let weiterlesenBild = cloneWeiterlesen.querySelector('.hohesBild');
                weiterlesenBild.src = "../public/img/" + bild.Bildadresse;
                weiterlesenBild.alt = bild.Alternativtext;
            }
            else if (bild.Hauptbild === "0") {
                bildwechselA.style.setProperty('--after-image', "url('../img/"+bild.Bildadresse+"')");
            }
        });

        counter++;
    }
}

function findExplicitParentElement (element, searchedClassName) {
    while ((element = element.parentElement) && !element.classList.contains(searchedClassName));
    return element;
}

function openWeiterlesenField (buttonElement) {
    let allFelder = document.querySelectorAll('.completeWeiterlesen');
    for (let i = 0; i < allFelder.length; i++) {
        allFelder[i].classList.add('hidden');
    }

    let allTiere = document.querySelectorAll('.completeAnimal');
    for (let i = 0; i < allTiere.length; i++) {
        allTiere[i].style.opacity = 0.4;
    }
    document.querySelector('#weitereTiereAnzeigen').style.opacity = 0.4;

    let thisDiv = findExplicitParentElement(buttonElement, 'completeAnimal');
    thisDiv.nextSibling.classList.remove('hidden');

    window.scrollTo({left: 0, top: 0, behavior: 'smooth'});
}

function closeWeiterlesenField (buttonElement) {
    let thisDiv = findExplicitParentElement(buttonElement, 'completeWeiterlesen');
    thisDiv.classList.add('hidden');

    let allTiere = document.querySelectorAll('.completeAnimal');
    for (let i = 0; i < allTiere.length; i++) {
        allTiere[i].style.opacity = 1;
    }
    document.querySelector('#weitereTiereAnzeigen').style.opacity = 1;
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

        rasseSelect.style.cursor = "pointer";
    }
    else {
        rasseSelect.setAttribute('disabled', 'disabled');
        rasseSelect.style.cursor = "default";
    }
}