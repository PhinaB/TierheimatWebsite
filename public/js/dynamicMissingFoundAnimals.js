document.addEventListener("DOMContentLoaded", function(){
    checkLoginStatus();
    loadMissingAnimalsToPage();

})

function loadMissingAnimalsToPage(){
    const missingAnimalContainer = document.getElementById('missingAnimals')

    fetch ("../public/loadMissingAnimals")
        .then(response => response.json())
        .then(data => {
            if(data.message){
                missingAnimalContainer.innerHTML = `<p class="fehlermeldung">${data.message}</p>`;
            }
            else {
                if (!data.animals || data.animals.length === 0) {
                    missingAnimalContainer.innerHTML = `<p class="fehlermeldung">Keine Tiere gefunden.</p>`;
                    return;
                }
                setMissingAnimalsToPage(data.animals);
            }
        })
}

function setMissingAnimalsToPage(animals){
    const missingAnimalContainer = document.getElementById('missingAnimals')
    const hiddenFirstMissingAnimal = document.getElementById('hiddenFirstMissingAnimal');

   if (animals.length > 0) {
      missingAnimalContainer.classList.remove('hidden');
   }
   
   //------------Breites Feld für missingFoundAnimal------------------------------
    document.getElementById('animalId').innerHTML = animals[0].VermisstGefundenTierID;
    document.getElementById('animalImage').src= animals[0].Bildadresse;
    document.getElementById('animalDate').innerHTML='<span class="boldText animalDate">Verschwunden am: </span> ' + animals[0].Datum;
    document.getElementById('animalPlace').innerHTML='<span class="boldText">Verschwunden in: </span>' + animals[0].Ort;
    document.getElementById('animalDescription').innerHTML=animals[0].Beschreibung;

    hiddenFirstMissingAnimal.classList.remove('hidden');

    //----------Dynamisches Anlegen der maximal vier Tiere ------------------------
    let counter = 0;
    const copyAllMissingAnimalsHere = document.getElementById('copyAllMissingAnimalsHere')
    let outsideDiv;

    for(let i= 1; i < animals.length; i++){
        if(counter % 4 === 0){
            outsideDiv = document.createElement('div');
            outsideDiv.classList.add('box-containerUnsereTiere');
            outsideDiv.classList.add('tile');
            copyAllMissingAnimalsHere.appendChild(outsideDiv);
        }
        const hiddenAnimalDiv = document.getElementById('hiddenTemplateMissingAnimals');

        let clone = hiddenAnimalDiv.cloneNode(true);
        outsideDiv.appendChild(clone);

        clone.classList.remove('hidden');
        clone.classList.add('completeAnimal');
        clone.id = "";

        clone.setAttribute('data-animal-id', animals[i].VermisstGefundenTierID);

        const imageElement = clone.querySelector('.animalImage');
        const imageUrl = animals[i].Bildadresse || '../public/img/defaultImage.jpg'; // Wenn keine Bildadresse vorhanden ist, wird das alternative Bild verwendet
        imageElement.src = imageUrl;
        
        clone.querySelector('.animalDate').innerHTML= '<span class="boldText">am: </span>' + animals[i].Datum;
        clone.querySelector('.animalPlace').innerHTML= '<span class="boldText">in: </span>' + animals[i].Ort;

        let descriptionStart = clone.querySelector('.animalDescriptionBeginning');
        let descriptionWords = animals[i].Beschreibung.split(' ');
        descriptionStart.innerHTML = '<span class="boldText">Beschreibung: </span>' + descriptionWords.slice(0, 2).join(' ') + ' ...';

        counter++;
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