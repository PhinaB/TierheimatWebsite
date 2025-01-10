document.addEventListener('DOMContentLoaded', function() {
    loadAnimals();
    document.querySelector('input[name=offset]').value = '0';

    document.querySelector('a[id=weitereTiereAnzeigen]').addEventListener('click', function() {
        const offset = document.querySelector('input[name=offset]');
        offset.value = parseInt(offset.value) + 8;
        loadAnimals();
    });
});

let animalSpeciesWithBreed = {};

function loadAnimals () {
    document.querySelector('#weitereTiereAnzeigen').classList.add('hidden');

    const spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    const errorGeneral = document.querySelector('.fehlerLoading');
    errorGeneral.innerHTML = "";

    const currentSpecies = document.querySelector('#currentTierart').value;
    const offset = document.querySelector('input[name=offset]').value;

    let breed = "0";
    let gender = "0";
    let species = currentSpecies;

    if (currentSpecies === "Alle Tiere") {
        let speciesFromSelect = document.querySelector('select[name=tierartAuswählen]').value;
        breed = document.querySelector('select[name=rasseAuswählen]').value;
        gender = document.querySelector('select[name=geschlechtAuswählen]').value;

        if (currentSpecies !== speciesFromSelect && speciesFromSelect !== "") {
            species = speciesFromSelect;
        }
    }

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                const response = JSON.parse(this.response);

                if (response.tiere.length === 0) {
                    errorGeneral.innerHTML = "Wir haben leider gerade kein Animal mit diesen Einstellungen!";
                }
                else {
                    setAnimalsToPage(response.tiere);
                    setEventForCookiesLike();

                    if (species === "Alle Tiere") {
                        const selectTierart = document.querySelector('select[id=tierartAuswählen]');
                        const selectGeschlecht = document.querySelector('select[id=geschlechtAuswählen]');
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
    xhttp.open('POST', '../public/load/all/our/animals');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('currentTierart='+species+'&offset='+offset+'&rasse='+breed+'&geschlecht='+gender);
}

function search () {
    const speciesInput = document.querySelector('select[name=tierartAuswählen]');
    const breedInput = document.querySelector('select[name=rasseAuswählen]');
    const genderInput = document.querySelector('select[name=geschlechtAuswählen]');

    const errorField = document.querySelector('.fehlerFilter');
    errorField.innerHTML = '';

    if (speciesInput.value === '0' && breedInput.value === '0' && genderInput.value === '0') {
        errorField.innerHTML = 'Wähle mindestens eine Sache (Species / Species und Breed / Geschlecht) aus!';
        return;
    }

    document.querySelector('#page').classList.add('hidden');
    document.querySelector('input[name=offset]').value = "0";
    const copyAllAnimalsHere = document.querySelector('#copyAlleTiereHere');
    copyAllAnimalsHere.innerHTML = "";

    loadAnimals();
}

function setAnimalsToPage (animals) {
    let counter = 0;
    const copyAllAnimalsHere = document.querySelector('#copyAlleTiereHere');
    let outsideDiv;

    for (let i = 0; i < animals.length; i++) {
        if (counter % 4 === 0) {
            outsideDiv = document.createElement('div');
            outsideDiv.classList.add('box-containerUnsereTiere');
            outsideDiv.classList.add('tile');
            copyAllAnimalsHere.appendChild(outsideDiv);
        }

        const hiddenAnimalDiv = document.querySelector('#hiddenVorlageTier');

        let clone = hiddenAnimalDiv.cloneNode(true);
        outsideDiv.appendChild(clone);

        clone.classList.remove('hidden');
        clone.classList.add('completeAnimal');
        clone.id = "";
        clone.setAttribute('data-animal-id', animals[i].TierID);
        clone.getElementsByTagName('h3')[0].innerHTML = animals[i].Name;
        let allAElements = clone.getElementsByTagName('a');
        for (let i = 0; i < allAElements.length; i++) {
            if (allAElements[i].classList.contains('weiterlesen')) {
                allAElements[i].setAttribute('onclick', 'openWeiterlesenAnimalField(this)');
            }
        }

        clone.querySelector('.fa-heart').classList.add('heartForLike');

        let descriptionStart = clone.querySelector('.beschreibungBeginn');
        let descriptionWords = animals[i].Beschreibung.split(' ');
        descriptionStart.innerHTML = descriptionWords.slice(0, 2).join(' ') + ' ...';

        let hiddenTemplateReadMore = document.querySelector('#hiddenVorlageWeiterlesen');

        let cloneReadMore = hiddenTemplateReadMore.cloneNode(true);
        outsideDiv.appendChild(cloneReadMore);

        const currentYear = new Date().getFullYear();
        let age = currentYear - animals[i].Geburtsjahr;

        cloneReadMore.id = "";
        cloneReadMore.getElementsByTagName('h3')[0].innerHTML = animals[i].Name;
        cloneReadMore.querySelector('.name').innerHTML = '<span class="boldText">Name:</span> ' + animals[i].Name;
        cloneReadMore.querySelector('.alter').innerHTML = '<span class="boldText">Alter:</span> ' + age + ' Jahr/e alt';
        cloneReadMore.querySelector('.beiUnsSeit').innerHTML = '<span class="boldText">In der Tierheimat seit:</span> ' + animals[i].Datum;
        cloneReadMore.querySelector('.charakter').innerHTML = '<span class="boldText">Charaktereigenschaften:</span> ' + animals[i].Charakter;
        cloneReadMore.querySelector('.beschreibung').innerHTML = animals[i].Beschreibung;
        cloneReadMore.getElementsByTagName('a')[0].setAttribute('onclick', 'closeWeiterlesenAnimalField(this)');

        let imageChangeBlock = clone.querySelector('.bildwechsel');

        const animalPictures = animals[i].Bilder;

        animalPictures.forEach((picture) => {
            if (picture.Hauptbild === "1") {
                imageChangeBlock.style.setProperty('--before-image', "url('../img/"+picture.Bildadresse+"')");
                imageChangeBlock.alt = picture.Alternativtext;

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

function openWeiterlesenAnimalField (buttonElement) {
    document.querySelector('#weitereTiereAnzeigen').style.opacity = 0.4;

    openWeiterlesenField(buttonElement, 'completeAnimal');
}

function closeWeiterlesenAnimalField (buttonElement) {
    document.querySelector('#weitereTiereAnzeigen').style.opacity = 1;

    closeWeiterlesenField(buttonElement, 'completeAnimal');
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

function setEventForCookiesLike () {
    document.querySelectorAll('.heartForLike').forEach(heart => {
        const completeAnimal = findExplicitParentElement(heart, 'completeAnimal');
        const animalId = completeAnimal.getAttribute('data-animal-id');

        if (getCookie('liked_animal_'+animalId) === 'true') {
            heart.classList.add('liked');
        }
    });
}

function setCookie(element, bool) {
    const completeAnimal = findExplicitParentElement(element, 'completeAnimal');
    const animalId = completeAnimal.getAttribute('data-animal-id');

    if (element.classList.contains('liked')) {
        element.classList.remove('liked');

        document.cookie = 'liked_animal_' + animalId + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC;';
    }
    else {
        element.classList.add('liked');

        let date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        document.cookie = 'liked_animal_' + animalId + '=' + bool + ';expires=' + date.toUTCString() + ';';
    }
}

function getCookie(name) {
    let cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [key, value] = cookie.split('=');
        if (key === name) return value;
    }
    return null;
}
