document.addEventListener("DOMContentLoaded", function(){
    checkLoginStatus();
    loadMissingFoundAnimalsToPage();

})

function loadMissingFoundAnimalsToPage(){

    const type = document.getElementById('currentMissingOrFound').value;

    const missingAnimalContainer = document.getElementById('missingAnimals');

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
            
            if(type === "Vermisst / Gefundene Tiere"){
                displayAnimals(data.missingAnimals, "Vermisste Tiere");
                displayAnimals(data.foundAnimals, "Gefundene Tiere");
            }
            else {
                displayAnimals(data.animals, type);
            }

        })
        .catch(error => console.error('Fehler beim Laden der Tiere:', error));
}

function displayAnimals(animals, type){
     if (!Array.isArray(animals)) {
         console.error('Die übergebenen Tiere sind kein Array:', animals);
         let container, template, heading, subheading, firstAnimalContainer;
         return;
        }
     console.log(animals);
     
     if (type === "Vermisste Tiere"){
        container = document.querySelector('#missingAnimals');
        template = document.querySelector('#hiddenTemplateMissingAnimals');
        firstAnimalContainer = document.querySelector('#hiddenFirstMissingAnimal'); 
        heading = "Vermisst";
        subheading = "Verschwunden";
    } else if (type === "Gefundene Tiere") {
        container = document.querySelector('#foundAnimals');
        template = document.querySelector('#hiddenTemplateFoundAnimals');
        firstAnimalContainer = document.querySelector('#hiddenFirstFoundAnimal');
        heading = "Gefunden";
        subheading = "Aufgetaucht";

    }

   if (animals.length > 0) {
      container.classList.remove('hidden');

       container.querySelector('.heading').innerHTML = type;

       //------------Breites Feld für missingFoundAnimal------------------------------
        firstAnimalContainer.getElementsByTagName('h3')[0].innerHTML = heading;
        firstAnimalContainer.querySelector('.firstAnimalId').innerHTML = animals[0].VermisstGefundenTierID;
        firstAnimalContainer.querySelector('.firstAnimalImage').src= animals[0].Bildadresse;
        firstAnimalContainer.querySelector('.firstAnimalDate').innerHTML='<span class="boldText animalDate">am: </span> ' + formatDate(animals[0].Datum);
        firstAnimalContainer.querySelector('.firstAnimalPlace').innerHTML='<span class="boldText">in: </span>' + animals[0].Ort;
        firstAnimalContainer.querySelector('.firstAnimalDescription').innerHTML=animals[0].Beschreibung;

        firstAnimalContainer.classList.remove('hidden');

        //----------Dynamisches Anlegen der maximal vier Tiere ------------------------
        let counter = 0;
        const copyHere = document.getElementById(`copyAll${type === "Vermisste Tiere" ? 'Missing' : 'Found'}AnimalsHere`)
        let outsideDiv;

        for(let i= 1; i < animals.length; i++) {
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

function headers(type){

    if (type ==="Vermisste Tiere"){
        return ["Vermisst", "Verschwunden"];
    } else if (type === "Gefundene Tiere"){
        return ["Gefunden", "Aufgetaucht"];
    } else {
        return ["Unbekannter Typ", "Unbekannter Typ"]
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