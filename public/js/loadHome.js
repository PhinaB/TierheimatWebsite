document.addEventListener('DOMContentLoaded', function() {
    loadAllForHome();
});

function loadAllForHome () {
    const spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    const page = document.getElementById('page');

    const errorGeneral = document.querySelector('.errorGeneral');
    errorGeneral.innerHTML = "";  // TODO: Fehlermeldung ausblenden, wenn etwas anderes gedrückt wurde

    // Ajax:
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                const response = JSON.parse(this.response);

                setAnimalsToPage(response.tiere);

                page.classList.remove('hidden');
            }
            else {
                errorGeneral.innerHTML = "Die Tiere konnten nicht geladen werden!";
            }

            spinner.classList.add('hidden');
        }
    }
    xhttp.open('POST', '../public/load/all/for/home');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

function setAnimalsToPage(animals) {
    const copyAllAnimalsHere = document.querySelector('#copyAllAnimalsHere');
    let hiddenAnimal = document.querySelector('#hiddenAnimal');

    for (let i = 0; i < animals.length; i++) {
        let clone = hiddenAnimal.cloneNode(true);
        copyAllAnimalsHere.appendChild(clone);

        clone.classList.remove('hidden');
        clone.id = "";
        clone.getElementsByTagName('h3')[0].innerHTML = animals[i].Name;

        let descriptionStart = clone.querySelector('.beschreibungBeginn');
        let descriptionWords = animals[i].Beschreibung.split(' ');
        descriptionStart.innerHTML = descriptionWords.slice(0, 4).join(' ') + ' ...';

        let imageChangeBlock = clone.querySelector('.bildwechsel');

        let animalPictures = animals[i].Bilder;

        animalPictures.forEach((picture) => {
            if (picture.Hauptbild === "1") {
                imageChangeBlock.style.setProperty('--before-image', "url('../img/" + picture.Bildadresse + "')");
                imageChangeBlock.alt = picture.Alternativtext;
            } else if (picture.Hauptbild === "0") {
                imageChangeBlock.style.setProperty('--after-image', "url('../img/" + picture.Bildadresse + "')");
            }
        });
    }
}

function goToAnimalPage (button) {

}