document.addEventListener('DOMContentLoaded', function() {
    loadAnimals();
    document.querySelector('input[name=offset]').value = '0';

    document.querySelector('a[id=weitereTiereAnzeigen]').addEventListener('click', function() {
        let offset = document.querySelector('input[name=offset]');
        offset.value = parseInt(offset.value) + 8;
        loadAnimals();
    });
});

let animalSpeciesWithBreed = {};

function loadAnimals () {
    document.querySelector('#weitereTiereAnzeigen').classList.add('hidden');

    let spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    let errorGeneral = document.querySelector('.fehlerLoading');
    errorGeneral.innerHTML = "";  // TODO: Fehlermeldung ausblenden, wenn etwas anderes gedrückt wurde

    let currentSpecies = document.querySelector('#currentTierart').value;
    let offset = document.querySelector('input[name=offset]').value;
    let speciesFromSelect = document.querySelector('select[name=tierartAuswählen]').value;
    let breed = document.querySelector('select[name=rasseAuswählen]').value;
    let gender = document.querySelector('select[name=geschlechtAuswählen]').value;

    let species = currentSpecies;
    if (currentSpecies !== speciesFromSelect && speciesFromSelect !== "") {
        species = speciesFromSelect;
    }

    // Ajax:
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                let response = JSON.parse(this.response);

                if (response.tiere.length === 0) {
                    errorGeneral.innerHTML = "Wir haben leider gerade kein Tier mit diesen Einstellungen!";
                }
                else {
                    setAnimalsToPage(response.tiere);

                    if (species === "Alle Tiere") {
                        let selectTierart = document.querySelector('select[id=tierartAuswählen]');
                        let selectGeschlecht = document.querySelector('select[id=geschlechtAuswählen]');
                        addFilteroptionToSelect(selectTierart, response.tierarten);
                        addFilteroptionToSelect(selectGeschlecht, response.geschlecht);
                    }

                    animalSpeciesWithBreed = response.tierarten;
                    if (response.countedAnimals > (offset + 8)) {
                        document.querySelector('#weitereTiereAnzeigen').classList.remove('hidden');
                    }
                }

                document.querySelector('#page').classList.remove('hidden');
            }
            else {
                errorGeneral.innerHTML = "Die Tiere konnten nicht geladen werden!";
            }

            spinner.classList.add('hidden');
        }
    }
    xhttp.open('POST', '../public/load/alle/unsere/tiere');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('currentTierart='+species+'&offset='+offset+'&rasse='+breed+'&geschlecht='+gender);
}

function search () {
    let speciesInput = document.querySelector('select[name=tierartAuswählen]');
    let breedInput = document.querySelector('select[name=rasseAuswählen]');
    let genderInput = document.querySelector('select[name=geschlechtAuswählen]');

    let errorField = document.querySelector('.fehlerFilter');
    errorField.innerHTML = '';

    if (speciesInput.value === '0' && breedInput.value === '0' && genderInput.value === '0') {
        errorField.innerHTML = 'Wähle mindestens eine Sache (Tierart / Tierart und Rasse / Geschlecht) aus!';
        return;
    }

    document.querySelector('#page').classList.add('hidden');
    document.querySelector('input[name=offset]').value = "0";
    let copyAllAnimalsHere = document.querySelector('#copyAlleTiereHere');
    copyAllAnimalsHere.innerHTML = "";

    loadAnimals();
}

function setAnimalsToPage (animals) {
    let counter = 0;
    let copyAllAnimalsHere = document.querySelector('#copyAlleTiereHere');
    let outsideDiv;

    for (let i = 0; i < animals.length; i++) {
        if (counter % 4 === 0) {
            outsideDiv = document.createElement('div');
            outsideDiv.classList.add('box-containerUnsereTiere');
            outsideDiv.classList.add('tile');
            copyAllAnimalsHere.appendChild(outsideDiv);
        }

        let hiddenAnimalDiv = document.querySelector('#hiddenVorlageTier');

        let clone = hiddenAnimalDiv.cloneNode(true);
        outsideDiv.appendChild(clone);

        clone.classList.remove('hidden');
        clone.classList.add('completeAnimal');
        clone.id = "";
        clone.getElementsByTagName('h3')[0].innerHTML = animals[i].Name;
        let allAElements = clone.getElementsByTagName('a');
        for (let i = 0; i < allAElements.length; i++) {
            if (allAElements[i].classList.contains('weiterlesen')) {
                allAElements[i].setAttribute('onclick', 'openWeiterlesenField(this)');
            }
        }

        let descriptionStart = clone.querySelector('.beschreibungBeginn');
        let descriptionWords = animals[i].Beschreibung.split(' ');
        descriptionStart.innerHTML = descriptionWords.slice(0, 2).join(' ') + ' ...';

        let hiddenTemplateReadMore = document.querySelector('#hiddenVorlageWeiterlesen');

        let cloneReadMore = hiddenTemplateReadMore.cloneNode(true);
        outsideDiv.appendChild(cloneReadMore);

        let currentYear = new Date().getFullYear(); // Aktuelles Jahr
        let age = currentYear - animals[i].Geburtsjahr;

        cloneReadMore.id = "";
        cloneReadMore.getElementsByTagName('h3')[0].innerHTML = animals[i].Name;
        cloneReadMore.querySelector('.name').innerHTML = '<span class="boldText">Name:</span> ' + animals[i].Name;
        cloneReadMore.querySelector('.alter').innerHTML = '<span class="boldText">Alter:</span> ' + age + ' Jahr/e alt';
        cloneReadMore.querySelector('.beiUnsSeit').innerHTML = '<span class="boldText">In der Tierheimat seit:</span> ' + animals[i].Datum;
        cloneReadMore.querySelector('.charakter').innerHTML = '<span class="boldText">Charaktereigenschaften:</span> ' + animals[i].Charakter;
        cloneReadMore.querySelector('.beschreibung').innerHTML = animals[i].Beschreibung;
        cloneReadMore.getElementsByTagName('a')[0].setAttribute('onclick', 'closeWeiterlesenField(this)');

        // Bilder:
        let imageChangeBlock = clone.querySelector('.bildwechsel');

        let animalPictures = animals[i].Bilder;

        animalPictures.forEach((picture) => {
            if (picture.Hauptbild === "1") {
                imageChangeBlock.style.setProperty('--before-image', "url('../img/"+picture.Bildadresse+"')");
                imageChangeBlock.alt = picture.Alternativtext;

                // Bild für weiterlesen Feld:
                let weiterlesenBild = cloneReadMore.querySelector('.hohesBild');
                weiterlesenBild.src = "../public/img/" + picture.Bildadresse;
                weiterlesenBild.alt = picture.Alternativtext;
            }
            else if (picture.Hauptbild === "0") {
                imageChangeBlock.style.setProperty('--after-image', "url('../img/"+picture.Bildadresse+"')");
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
    let allFields = document.querySelectorAll('.completeWeiterlesen');
    for (let i = 0; i < allFields.length; i++) {
        allFields[i].classList.add('hidden');
    }

    let allAnimals = document.querySelectorAll('.completeAnimal');
    for (let i = 0; i < allAnimals.length; i++) {
        allAnimals[i].style.opacity = 0.4;
    }
    document.querySelector('#weitereTiereAnzeigen').style.opacity = 0.4;

    let thisDiv = findExplicitParentElement(buttonElement, 'completeAnimal');
    thisDiv.nextSibling.classList.remove('hidden');

    window.scrollTo({left: 0, top: 0, behavior: 'smooth'});
}

function closeWeiterlesenField (buttonElement) {
    let thisDiv = findExplicitParentElement(buttonElement, 'completeWeiterlesen');
    thisDiv.classList.add('hidden');

    let allAnimals = document.querySelectorAll('.completeAnimal');
    for (let i = 0; i < allAnimals.length; i++) {
        allAnimals[i].style.opacity = 1;
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
    let species = document.querySelector('select[id=tierartAuswählen]').value;
    let breedSelect = document.querySelector('select[id=rasseAuswählen]');

    let options = breedSelect.querySelectorAll('option');
    for (let i = breedSelect.length - 1; i >= 0; i--) {
        if (options[i].value !== '0') {
            breedSelect.removeChild(options[i]);
        }
    }

    if (species !== "0") {
        breedSelect.removeAttribute('disabled');
        for (let i = 0; i < animalSpeciesWithBreed.length; i++) {
            if (animalSpeciesWithBreed[i].name === species) {
                addFilteroptionToSelect(breedSelect, animalSpeciesWithBreed[i].rassen);
            }
        }

        breedSelect.style.cursor = "pointer";
    }
    else {
        breedSelect.setAttribute('disabled', 'disabled');
        breedSelect.style.cursor = "default";
    }
}