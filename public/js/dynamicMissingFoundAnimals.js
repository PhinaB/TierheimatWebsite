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

    console.log(formData); 

    fetch ('../public/loadMissingFoundAnimals', {
        method: 'POST',
        body:formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log('Serverantwort:', data);
            
            if(type === "Vermisste / Gefundene Tiere") {
                displayAnimals(data.missingAnimals, "Vermisste Tiere");
                displayAnimals(data.foundAnimals, "Gefundene Tiere");
            }
            else {
                displayAnimals(data.animals, type);
            }

        })
        .catch(error => console.error('Fehler beim Laden der Tiere:', error));
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
        console.log(`copyFirst${type==="Vermisste Tiere" ? 'Missing' : 'Found'}AnimalHere`)
        copyFirstAnimalHere.appendChild(cloneFirstAnimal);

        cloneFirstAnimal.id="";
        cloneFirstAnimal.getElementsByTagName('h3')[0].innerHTML = heading;
        cloneFirstAnimal.setAttribute('data-animal-id', animals[0].VermisstGefundenTiereID);
        cloneFirstAnimal.querySelector('.firstAnimalImage').src = animals[0].Bildadresse;
        cloneFirstAnimal.querySelector('.firstAnimalDate').innerHTML = '<span class="boldText animalDate">am: </span> ' + formatDate(animals[0].Datum);
        cloneFirstAnimal.querySelector('.firstAnimalPlace').innerHTML = '<span class="boldText">in: </span>' + animals[0].Ort;
        cloneFirstAnimal.querySelector('.firstAnimalDescription').innerHTML = animals[0].Beschreibung;

        cloneFirstAnimal.classList.remove('hidden');

        //Überprüft Rechte und NutzerID
        $creatorID= animals[0].ZuletztGeaendertNutzerID;
        displayDelete($creatorID, cloneFirstAnimal);
        displayEdit($creatorID, cloneFirstAnimal);
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
            clone.id = "";
            clone.setAttribute('data-animal-id', animals[i].VermisstGefundenTiereID);
            console.log(clone.querySelector('#data-animal-id'));

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

            //Überprüft Rechte und NutzerID
            $creatorID= animals[i].ZuletztGeaendertNutzerID;
            displayDelete($creatorID, clone);
            displayEdit($creatorID, clone);
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

function displayEdit(creatorId, clone) {

    if (userId === creatorId){
        const editButton = document.createElement('a');
        editButton.href = "";
        editButton.title = "Anzeige bearbeiten";
        editButton.className = "edit";
        editButton.draggable = false;
        editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';

        clone.getElementsByTagName('h3')[0].appendChild(editButton);
    }
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

function checkLoginStatus() {
    fetch('../public/checkLogin')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                document.getElementById('formContainer').innerHTML = data.form;
                initializeFormEventListeners();
            }
            else{
                document.getElementById('reportContainer').innerHTML= data.report;
            }
        })
        .catch(error =>{
            document.getElementById('errorContainer').textContent = 'Ein Fehler ist aufgetreten';
        });
}

function formatDate(dateString){
    const [year, month, day] = dateString.split(" ")[0].split("-")
    return `${day}.${month}.${year}`;
}

function searchType(){
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