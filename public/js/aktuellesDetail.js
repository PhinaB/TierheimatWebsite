document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const newsId = urlParams.get('newsId');

    if (!newsId) {
        alert('Keine Nachricht gefunden!');
        return;
    }

    const spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    const errorField = document.querySelector('.fehlermeldung');
    const detailPage = document.getElementById('news-content');

    // AJAX Request für die Detailansicht
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status >= 200 && xhttp.status < 300) {
                const article = JSON.parse(this.response);

                document.getElementById('news-title').innerText = article.Ueberschrift;
                document.getElementById('news-description').innerText = article.Text;
                const image = document.getElementById('news-image');
                image.src = "../public/img/" + article.Bildadresse;
                image.alt = article.Ueberschrift;

                spinner.classList.add('hidden');
                detailPage.classList.remove('hidden');
            } else {
                errorField.innerText = 'Fehler beim Laden des Artikels!';
                spinner.classList.add('hidden');
            }
        }
    };

    xhttp.open('POST', '../load/article/detail');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('newsId=' + newsId);
});
