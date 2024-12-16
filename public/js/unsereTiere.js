document.addEventListener('DOMContentLoaded', function() {
    loadTiere();
});


function loadTiere () {
    let fehlerGesamt = document.querySelector('.fehlerLoading');
    fehlerGesamt.innerHTML = "";  // TODO: Fehlermeldung ausblenden, wenn etwas anderes gedrückt wurde

    // Ajax:
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                let response = JSON.parse(this.response);

                let counter = 0;
                let copyAlleTiereHere = document.querySelector('#copyAlleTiereHere');
                let aussenDiv;

                for (let i = 0; i < response.tiere.length; i++) {
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
                    clone.id = "";
                    let h3 = clone.getElementsByTagName('h3');
                    h3[0].innerHTML = response.tiere[i].Name;

                    let bildwechselA = clone.querySelector('.bildwechsel');

                    let tierbilder = response.tiere[i].Bilder;

                    tierbilder.forEach((bild) => {
                        if (bild.Hauptbild === "1") {
                            bildwechselA.style.setProperty('--before-image', "url('../img/"+bild.Bildadresse+"')");
                            bildwechselA.alt = bild.Alternativtext;
                        }
                        else if (bild.Hauptbild === "0") {
                            bildwechselA.style.setProperty('--after-image', "url('../img/"+bild.Bildadresse+"')");
                        }
                    });

                    let beschreibungBeginn = clone.querySelector('.beschreibungBeginn');
                    let beschreibungWorte = response.tiere[i].Beschreibung.split(' ');
                    beschreibungBeginn.innerHTML = beschreibungWorte.slice(0, 2).join(' ') + ' ...';

                    counter++;
                }

                document.querySelector('#page').classList.remove('hidden');
            }
            else {
                fehlerGesamt.innerHTML = "Die Tiere konnten nicht geladen werden!";
            }

            let spinner = document.getElementById('loading');
            spinner.classList.add('hidden');
        }
    }
    xhttp.open('POST', '../app/Service/serviceHandler.php?method=loadTiere');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
}