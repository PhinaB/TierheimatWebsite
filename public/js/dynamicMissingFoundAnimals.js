document.addEventListener("DOMContentLoaded", function() {
    checkLoginStatus();

    const type = document.getElementById('currentMissingOrFound').value;
    loadMissingFoundAnimalsToPage(type);

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
})

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
                console.log('Missing ANimals:', data.missingAnimals); // Gibt das missingAnimals-Array aus
                console.log('Found Anials:', data.foundAnimals);
            }
            else {
                displayAnimals(data.animals, type);
            }

        })
        .catch(error => console.error('Fehler beim Laden der Tiere:', error));
}

function displayAnimals(animals, type) {
    if (!Array.isArray(animals)) {
        console.error('Die übergebenen Tiere sind kein Array:', animals);
        let container, template, heading, subheading, firstAnimalContainer;
        return;
    }
    console.log(animals);

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

        cloneFirstAnimal.getElementsByTagName('h3')[0].innerHTML = heading;
        cloneFirstAnimal.querySelector('.firstAnimalId').innerHTML = animals[0].VermisstGefundenTierID;
        cloneFirstAnimal.querySelector('.firstAnimalImage').src = animals[0].Bildadresse;
        cloneFirstAnimal.querySelector('.firstAnimalDate').innerHTML = '<span class="boldText animalDate">am: </span> ' + formatDate(animals[0].Datum);
        cloneFirstAnimal.querySelector('.firstAnimalPlace').innerHTML = '<span class="boldText">in: </span>' + animals[0].Ort;
        cloneFirstAnimal.querySelector('.firstAnimalDescription').innerHTML = animals[0].Beschreibung;

        cloneFirstAnimal.classList.remove('hidden');

        cloneFirstAnimal.id="";
        cloneFirstAnimal.setAttribute('data-firstAnimal-id', animals[0].VermisstGefundenTierID);

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


            clone.setAttribute('data-animal-id', animals[i].VermisstGefundenTierID);

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

            counter++;
        }
    } else {
        displayErrorMessage(type, "Keine Tiere gefunden.");
    }
}

function checkLoginStatus(){
    fetch('../public/checkLogin')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn){
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