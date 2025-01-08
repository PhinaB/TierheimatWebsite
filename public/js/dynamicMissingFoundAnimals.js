document.addEventListener("DOMContentLoaded", async function() {
    await checkLoginStatus();

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
            if(type === "Vermisste / Gefundene Tiere") {
                displayAnimals(data.missingAnimals, "Vermisste Tiere");
                displayAnimals(data.foundAnimals, "Gefundene Tiere");
            }
            else {
                displayAnimals(data.animals, type);
            }

        })
        .catch(error => console.error('Fehler beim Laden der Tiere:', error));
    // TODO: Fehler für Nutzer ausgeben
}

function displayAnimals(animals, type) {
    if (type === "Vermisste Tiere") {
        container = document.querySelector('#missingAnimals');
        template = document.querySelector('#hiddenTemplateMissingAnimals');
        firstAnimalTemplate = document.querySelector('#hiddenFirstMissingAnimalTemplate');
        heading = "Vermisst";
        subheading = "Verschwunden";
    } else if (type === "Gefundene Tiere") {
        container = document.querySelector('#foundAnimals');
        template = document.querySelector('#hiddenTemplateFoundAnimals');
        firstAnimalTemplate = document.querySelector('#hiddenFirstFoundAnimalTemplate');
        heading = "Gefunden";
        subheading = "Aufgetaucht";
    }

    if (animals.length > 0) {
        container.classList.remove('hidden');

        container.querySelector('.heading').innerHTML = type;
        container.querySelector('.underHeadline').classList.remove('hidden')

        //------------Breites Feld für missingFoundAnimal------------------------------
        let cloneFirstAnimal = firstAnimalTemplate.cloneNode(true);
        const copyFirstAnimalHere = document.getElementById(`copyFirst${type==="Vermisste Tiere" ? 'Missing' : 'Found'}AnimalHere`);
        copyFirstAnimalHere.appendChild(cloneFirstAnimal);

        cloneFirstAnimal.id="";
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

        //Überprüft Rechte und NutzerID
        displayEditDelete(animals[0].ZuletztGeaendertNutzerID, cloneFirstAnimal);
        //----------Dynamisches Anlegen der maximal vier Tiere ------------------------
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
            const imageUrl = animals[i].Bildadresse || '../public/img/defaultImage.jpg'; // Wenn keine Bildadresse vorhanden ist, wird das alternative Bild verwendet
            imageElement.src = imageUrl;

            clone.getElementsByTagName('h3')[0].innerHTML = heading;
            clone.querySelector('.animalSubheading').innerHTML = '<span class="boldText">' + subheading + '</span>';
            clone.querySelector('.animalDate').innerHTML = '<span class="boldText">am: </span>' + formatDate(animals[i].Datum);
            clone.querySelector('.animalPlace').innerHTML = '<span class="boldText">in: </span>' + animals[i].Ort;

            const descriptionStart = clone.querySelector('.animalDescriptionBeginning');
            const descriptionWords = animals[i].Beschreibung.split(' ');
            descriptionStart.innerHTML = '<span class="boldText">Beschreibung: </span>' + descriptionWords.slice(0, 2).join(' ') + ' ...';

            clone.querySelector('#hiddenContact').value = animals[0].Kontaktaufnahme;

            //Überprüft Rechte und NutzerID
            creatorID= animals[i].ZuletztGeaendertNutzerID;
            displayEditDelete(creatorID, clone);
            //--------------------Weiterlesen-------------------------------------------------------------------
            let allAElements = clone.getElementsByTagName('a');
            for (let i = 0; i < allAElements.length; i++) {
                if (allAElements[i].classList.contains('weiterlesen')) {
                    allAElements[i].setAttribute('onclick', 'openWeiterlesenField(this)');
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
            cloneReadMore.getElementsByTagName('a')[0].setAttribute('onclick', 'closeWeiterlesenField(this)');

            counter++;
        }

        document.querySelector('#loading').classList.add('hidden');

    } else {
        document.querySelector('#loading').classList.add('hidden');

        container.querySelector('.heading').innerHTML = type;
        container.querySelector('.underHeadline').classList.remove('hidden')
        document.querySelector('#missingAnimals').classList.remove('hidden');
        if(document.querySelector('#selectAnimalStatus')) {
            document.querySelector('#selectAnimalStatus').classList.remove('hidden');
        }
        document.querySelector(`#error${type === 'Vermisste Tiere' ? 'Missing' : 'Found'}Animals`).innerHTML =  type + ' nicht vorhanden.';
    }
}

function displayEditDelete(creatorId, clone){
    if(userRoles) {
        if(createdAnimal(creatorId) && canEditAndDeleteOwn(creatorId) || canDeleteAll(creatorId)){
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

    clone.getElementsByTagName('h3')[0].appendChild(deleteButton);
}

function createdAnimal(creatorId) {
    return userId === creatorId;
}

function canDeleteAll(){
    return userRoles.kannAllesLoeschen;
}

function canEditAndDeleteOwn(){
    return userRoles.kannEigenesBearbeitenUndLoeschen;
}

async function checkLoginStatus() {
    try {
        const response = await fetch('../public/checkLogin');
        const data = await response.json();

        if (data.loggedIn) {
            userId=data.userId;
            userRoles = data.userRoles;
            document.getElementById('formContainer').innerHTML = data.formMissing;
            initializeFormEventListeners();
        } else {
            document.getElementById('reportContainer').innerHTML= data.report;
        }
    } catch (error) {
        document.getElementById('errorContainer').textContent = 'Ein Fehler ist aufgetreten';
    }
}

function formatDate(dateString){
    const [year, month, day] = dateString.split(" ")[0].split("-")
    return `${day}.${month}.${year}`;
}

function searchType(){ // TODO: wird das benötigt
    const typeInput = document.querySelector('select[name=tierstatusAuswählen]')
}

function closeWeiterlesenField (buttonElement) {
    let thisDiv = findExplicitParentElement(buttonElement, 'completeWeiterlesen');
    thisDiv.classList.add('hidden');

    let allAnimals = document.querySelectorAll('.completeAnimal');
    for (let i = 0; i < allAnimals.length; i++) {
        allAnimals[i].style.opacity = 1;
    }

    setCapacityStyle(1);
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

    setCapacityStyle(0.4);

    let thisDiv = findExplicitParentElement(buttonElement, 'completeAnimal');
    thisDiv.nextSibling.classList.remove('hidden');

    window.scrollTo({left: 0, top: 0, behavior: 'smooth'});
}

function findExplicitParentElement (element, searchedClassName) {
    while ((element = element.parentElement) && !element.classList.contains(searchedClassName));
    return element;
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

    // this is the small field -> else is the big field
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