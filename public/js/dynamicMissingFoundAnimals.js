document.addEventListener("DOMContentLoaded", function() {
    checkLoginStatus();

    const type = document.getElementById('currentMissingOrFound').value;
    loadMissingFoundAnimalsToPage(type);

    if(document.querySelector('#selectAnimalStatus')) {
        document.querySelector('#selectAnimalStatus').addEventListener('submit', function (event) {
            event.preventDefault();
            let formSubmitted = true;

            const selectType = document.querySelector('#tierstatusAuswählen').value;

            loadMissingFoundAnimalsToPage(selectType);

            if (!formSubmitted) {
                const type = document.getElementById('currentMissingOrFound').value;
                loadMissingFoundAnimalsToPage(type);
            }

        })
    }
})

let userRoles = null;
let userId= null;

function setBack() {
    document.querySelector('#errorGeneral').innerHTML = "";

    const copyAllFoundAnimalsHere = document.querySelector('#copyAllFoundAnimalsHere');
    if (copyAllFoundAnimalsHere) {
        copyAllFoundAnimalsHere.innerHTML = "";
    }
    const copyAllMissingAnimalsHere = document.querySelector('#copyAllMissingAnimalsHere');
    if (copyAllMissingAnimalsHere) {
        copyAllMissingAnimalsHere.innerHTML = "";
    }

    const headingMissingAnimals = document.querySelector('#headingMissingAnimals');
    if (headingMissingAnimals){
        headingMissingAnimals.innerHTML= "";
        document.querySelector('#missingUnderHeadline').classList.add('hidden');
    }

    const headingFoundAnimals = document.querySelector('#headingFoundAnimals');
    if (headingFoundAnimals){
        headingFoundAnimals.innerHTML= "";
        document.querySelector('#foundUnderHeadline').classList.add('hidden');
    }

    const copyFirstFoundAnimalHere = document.querySelector('#copyFirstFoundAnimalHere');
    if(copyFirstFoundAnimalHere){
        copyFirstFoundAnimalHere.innerHTML="";
    }
    const copyFirstMissingAnimalHere = document.querySelector('#copyFirstMissingAnimalHere');
    if(copyFirstMissingAnimalHere){
        copyFirstMissingAnimalHere.innerHTML="";
    }

    const errorMissingAnimals = document.querySelector('#errorMissingAnimals');
    if (errorMissingAnimals){
        errorMissingAnimals.innerHTML ="";
    }

    const errorFoundAnimals = document.querySelector('#errorFoundAnimals');
    if (errorFoundAnimals){
        errorFoundAnimals.innerHTML ="";
    }
}

function loadMissingFoundAnimalsToPage(type){
    setBack();

    let formData= new FormData();
    formData.append('type', type)

    fetch ('../public/loadMissingFoundAnimals', {
        method: 'POST',
        body:formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.loginData.loggedIn){
                userRoles = data.loginData.userRoles;
                userId = data.loginData.userId;
            }

            if(type === "Vermisste / Gefundene Tiere") {
                displayAnimals(data.missingAnimals, "Vermisste Tiere");
                displayAnimals(data.foundAnimals, "Gefundene Tiere");
            }
            else {
                displayAnimals(data.animals, type);
            }

        })
        .catch(() => {
            document.querySelector('#errorGeneral').innerHTML = "Die Tiere konnten nicht geladen werden!";
        })
        .finally( () => {
            document.querySelector('#loading').classList.add('hidden');
        });
}

function displayAnimals(animals, type) {
    let template = document.querySelector('#hiddenTemplateAnimals');
    let firstAnimalTemplate = document.querySelector('#hiddenFirstAnimalTemplate');
    let container;
    let heading;
    let subheading;

    if (type === "Vermisste Tiere") {
        container = document.querySelector('#missingAnimals');
        heading = "Vermisst";
        subheading = "Verschwunden";
    } else if (type === "Gefundene Tiere") {
        container = document.querySelector('#foundAnimals');
        heading = "Gefunden";
        subheading = "Aufgetaucht";
    }

    let creatorID;
    if (animals.length > 0) {
        container.classList.remove('hidden');

        container.querySelector('.heading').innerHTML = type;
        container.querySelector('.underHeadline').classList.remove('hidden')

        let cloneFirstAnimal = firstAnimalTemplate.cloneNode(true);
        const copyFirstAnimalHere = document.getElementById(`copyFirst${type === "Vermisste Tiere" ? 'Missing' : 'Found'}AnimalHere`);
        copyFirstAnimalHere.appendChild(cloneFirstAnimal);

        cloneFirstAnimal.id = "";
        cloneFirstAnimal.getElementsByTagName('h3')[0].innerHTML = heading;
        cloneFirstAnimal.setAttribute('data-animal-id', animals[0].VermisstGefundenTiereID);
        cloneFirstAnimal.querySelector('.firstAnimalImage').src = animals[0].Bildadresse;
        cloneFirstAnimal.querySelector('.firstAnimalDate').innerHTML = '<span class="boldText animalDate">am: </span> ' + formatDate(animals[0].Datum);
        cloneFirstAnimal.querySelector('.firstAnimalPlace').innerHTML = '<span class="boldText">in: </span>' + animals[0].Ort;
        cloneFirstAnimal.querySelector('.firstAnimalDescription').innerHTML = animals[0].Beschreibung;

        cloneFirstAnimal.querySelector('#hiddenSpecies').value = animals[0].Tierart;
        cloneFirstAnimal.querySelector('#hiddenContact').value = animals[0].Kontaktaufnahme;

        cloneFirstAnimal.classList.add('completeAnimalForEdit');
        cloneFirstAnimal.classList.remove('hidden');

        displayEditDelete(animals[0].ZuletztGeaendertNutzerID, cloneFirstAnimal);

        let counter = 0;
        const copyHere = document.getElementById(`copyAll${type === "Vermisste Tiere" ? 'Missing' : 'Found'}AnimalsHere`)
        let outsideDiv;

        for (let i = 1; i < animals.length; i++) {
            if (counter % 4 === 0) {
                outsideDiv = document.createElement('div');
                outsideDiv.classList.add('box-containerUnsereTiere');
                outsideDiv.classList.add('tile');
                copyHere.appendChild(outsideDiv);
            }

            let clone = template.cloneNode(true);
            outsideDiv.appendChild(clone);

            clone.classList.remove('hidden');
            clone.classList.add('completeAnimal');
            clone.classList.add('completeAnimalForEdit');
            clone.id = "";
            clone.setAttribute('data-animal-id', animals[i].VermisstGefundenTiereID);


            const imageElement = clone.querySelector('.animalImage');
            imageElement.src = animals[i].Bildadresse || '../public/img/defaultImage.jpg'; // Wenn keine Bildadresse vorhanden ist, wird das alternative Bild verwendet

            clone.getElementsByTagName('h3')[0].innerHTML = heading;
            clone.querySelector('.animalSubheading').innerHTML = '<span class="boldText">' + subheading + '</span>';
            clone.querySelector('.animalDate').innerHTML = '<span class="boldText">am: </span>' + formatDate(animals[i].Datum);
            clone.querySelector('.animalPlace').innerHTML = '<span class="boldText">in: </span>' + animals[i].Ort;

            const descriptionStart = clone.querySelector('.animalDescriptionBeginning');
            const descriptionWords = animals[i].Beschreibung.split(' ');
            descriptionStart.innerHTML = '<span class="boldText">Beschreibung: </span>' + descriptionWords.slice(0, 2).join(' ') + ' ...';

            clone.querySelector('#hiddenContact').value = animals[0].Kontaktaufnahme;

            creatorID = animals[i].ZuletztGeaendertNutzerID;
            displayEditDelete(creatorID, clone);

            let allAElements = clone.getElementsByTagName('a');
            for (let i = 0; i < allAElements.length; i++) {
                if (allAElements[i].classList.contains('weiterlesen')) {
                    allAElements[i].setAttribute('onclick', 'openAnimalReadMoreField(this)');
                }
            }

            let hiddenTemplateReadMore = document.querySelector('#hiddenTemplateWeiterlesen');

            let cloneReadMore = hiddenTemplateReadMore.cloneNode(true);
            outsideDiv.appendChild(cloneReadMore);

            cloneReadMore.id = "";
            cloneReadMore.getElementsByTagName('h3')[0].innerHTML = heading;
            cloneReadMore.querySelector('.hohesBild').src = animals[i].Bildadresse || '../public/img/defaultImage.jpg';
            cloneReadMore.querySelector('.date').innerHTML = '<span class="boldText">' + subheading + ' am: </span> ' + formatDate(animals[i].Datum);
            cloneReadMore.querySelector('.place').innerHTML = '<span class="boldText">' + subheading + ' in: </span> ' + animals[i].Ort;
            cloneReadMore.querySelector('.species').innerHTML = '<span class="boldText">Tierart: </span> ' + animals[i].Tierart;
            cloneReadMore.querySelector('.description').innerHTML = animals[i].Beschreibung;
            cloneReadMore.getElementsByTagName('a')[0].setAttribute('onclick', 'closeAnimalReadMoreField(this)');

            counter++;
        }
    } else {
        container.querySelector('.heading').innerHTML = type;
        container.querySelector('.underHeadline').classList.remove('hidden')
        document.querySelector('#missingAnimals').classList.remove('hidden');
        if (document.querySelector('#selectAnimalStatus')) {
            document.querySelector('#selectAnimalStatus').classList.remove('hidden');
        }
        document.querySelector(`#error${type === 'Vermisste Tiere' ? 'Missing' : 'Found'}Animals`).innerHTML = type + ' nicht vorhanden.';
    }
}

function displayEditDelete(creatorId, clone){
    if(userRoles && userId) {
        if(userId === creatorId && userRoles.kannEigenesBearbeitenUndLoeschen || userRoles.kannAllesLoeschen){
            displayDelete(creatorId, clone);
            displayEdit(creatorId, clone);
        }
    }
}

function displayEdit(creatorId, clone) {
    const editButton = document.createElement('a');
    editButton.title = "Anzeige bearbeiten";
    editButton.className = "edit";
    editButton.draggable = false;
    editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';
    editButton.style.cursor = "pointer";
    editButton.setAttribute('onclick', 'openEditField(this)');

    clone.getElementsByTagName('h3')[0].appendChild(editButton);
}

function displayDelete(creatorId, clone) {
    const deleteButton = document.createElement('a');
    deleteButton.href = "";
    deleteButton.title = "Anzeige löschen";
    deleteButton.className = "delete";
    deleteButton.draggable = false;
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';

    deleteButton.addEventListener('click', function (event) {
        event.preventDefault();

        const animalElement = deleteButton.closest('[data-animal-id]');
        const animalID = animalElement.getAttribute('data-animal-id');

        if (animalID) {
            deleteMissingOrFoundAnimal(animalID);
        }
    });

    clone.getElementsByTagName('h3')[0].appendChild(deleteButton);
}

function checkLoginStatus() {
    fetch('../public/checkLogin')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                document.getElementById('formContainer').innerHTML = data.formMissing;
                initializeFormEventListeners();
            } else {
                document.getElementById('reportContainer').innerHTML = data.report;
            }
        })
        .catch(error => {
            document.getElementById('errorContainer').textContent = 'Ein Fehler ist aufgetreten';
        });
}

function deleteMissingOrFoundAnimal(animalID){
    if(confirm('Möchten Sie das Tier wirklich löschen?')){
        let formData = new FormData();
        formData.append('animalID', animalID)

        fetch ('../public/deleteMissingFoundAnimals',
            {method: 'POST', body: formData,})
       .then (response=>response.json())
            .then(data => {
                if (data.success){
                    document.querySelector(`[data-animal-id = "${animalID}"]`).remove();
                    alert('Das Tier wurde erfolgreich gelöscht.');
                } else {
                    alert('Fehler: ' + data.errors.join(', '));
                }
            })
            .catch(error=>{
                alert('Es gab einen Fehler beim Löschen des Tieres ' + error);
            });
    }
}

function formatDate(dateString){
    const [year, month, day] = dateString.split(" ")[0].split("-")
    return `${day}.${month}.${year}`;
}

function closeAnimalReadMoreField (buttonElement) {
    closeWeiterlesenField(buttonElement, 'completeAnimal');
    setCapacityStyle(1);
}

function openAnimalReadMoreField (buttonElement) {
    openWeiterlesenField(buttonElement, 'completeAnimal');
    setCapacityStyle(0.4);
}

function setCapacityStyle(capacity){
    if (document.querySelector('#formContainer')){
        document.querySelector('#formContainer').style.opacity = capacity;
    }
    if (document.querySelector('#reportContainer')){
        document.querySelector('#reportContainer').style.opacity=capacity;
    }
    if (document.querySelector('#copyFirstMissingAnimalHere')){
        document.querySelector('#copyFirstMissingAnimalHere').style.opacity = capacity;
    }
    if (document.querySelector('#copyFirstFoundAnimalHere')){
        document.querySelector('#copyFirstFoundAnimalHere').style.opacity=capacity;
    }
    if (document.querySelector('#selectAnimalStatus')){
        document.querySelector('#selectAnimalStatus').style.opacity=capacity;
    }
    if (document.querySelector('#headingMissingAnimals')){
        document.querySelector('#headingMissingAnimals').style.opacity=capacity;
    }
    if (document.querySelector('#missingUnderHeadline')){
        document.querySelector('#missingUnderHeadline').style.opacity=capacity;
    }
    if (document.querySelector('#headingFoundAnimals')){
        document.querySelector('#headingFoundAnimals').style.opacity=capacity;
    }
    if (document.querySelector('#foundUnderHeadline')){
        document.querySelector('#foundUnderHeadline').style.opacity=capacity;
    }
}

function openEditField(editButton) {
    let animal = findExplicitParentElement(editButton, 'completeAnimalForEdit');

    let place = animal.querySelector('.animalPlace');
    let textOnlyPlace = place.textContent.replace(place.querySelector('span').textContent, '').trim();

    let issue = animal.querySelector('.headlineWithButtons');
    let textOnlyIssue = issue.textContent.replace(issue.querySelector('a').textContent, '').trim().toLowerCase();

    let date = animal.querySelector('.animalDate');
    let textOnlyDate = date.textContent.replace(date.querySelector('span').textContent, '').trim();
    let [day, month, year] = textOnlyDate.split(".");
    let isoDate = `${year}-${month}-${day}`;

    let imgSrc = animal.getElementsByTagName('img')[0].src.split('/').pop();
    let animalId = animal.getAttribute('data-animal-id');
    let contact = animal.querySelector('#hiddenContact').value;

    if (imgSrc === "null") {
        imgSrc = "kein Bild vorhanden";
    }

    let description = '';
    let species = '';

    if (animal.classList.contains('completeAnimal')) {
        let animalReadMoreField = animal.nextSibling;
        description = animalReadMoreField.querySelector('.description').innerHTML;

        let specie = animalReadMoreField.querySelector('.species');
        species = specie.textContent.replace(specie.querySelector('span').textContent, '').trim();
    }
    else {
        description = animal.querySelector('.firstAnimalDescription').innerHTML;
        species = animal.querySelector('#hiddenSpecies').value;
    }

    let form = document.querySelector('#formContainer');
    let issueInForm = form.querySelector('select[id=anliegenVermisstGefunden]');
    let speciesInForm = form.querySelector('select[id=tierart]');
    let dateInForm = form.querySelector('input[id=datum]');
    let placeInForm = form.querySelector('input[id=ort]');
    let descriptionInForm = form.querySelector('textarea[id=tierbeschreibung]');
    let emailContactInForm = form.querySelector('input[value=email]');
    let telefonContactInForm = form.querySelector('input[value=telefon]');
    let successMessageImage = form.querySelector('#fileSuccess');

    let animalIdInForm = form.querySelector('input[id=animalId]');
    form.querySelector('input[id=editMode]').value = true;

    let offset = window.scrollY + form.getBoundingClientRect().top;
    window.scrollTo({left: 0, top: offset - 250, behavior: 'smooth'});

    if (contact === "email") {
        emailContactInForm.checked = true;
    }
    if (contact === "telefon") {
        telefonContactInForm.checked = true;
    }

    issueInForm.value = textOnlyIssue;
    speciesInForm.value = species;
    dateInForm.value = isoDate;
    placeInForm.value = textOnlyPlace;
    descriptionInForm.value = description;
    successMessageImage.innerHTML = 'hochgeladenes Foto: '+ imgSrc;
    animalIdInForm.value = animalId;
}