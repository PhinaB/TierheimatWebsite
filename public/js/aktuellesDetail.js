document.addEventListener('DOMContentLoaded', function () {
    // Extrahiere die News-ID aus der URL
    const urlParams = new URLSearchParams(window.location.search);
    const newsId = urlParams.get('newsId');

    if (!newsId) {
        alert('Keine Nachricht gefunden!');
        return;
    }

    // Spinner und Fehlerfeld
    const spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');
    const errorField = document.querySelector('.fehlermeldung');
    const detailPage = document.getElementById('news-detail');

    // AJAX Request für die Detailansicht
    fetch(`/load/article/detail?id=${newsId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Fehler beim Laden des Artikels!');
            }
            return response.json();
        })
        .then(article => {
            // Inhalte dynamisch setzen
            document.getElementById('article-title').innerText = article.Ueberschrift;
            document.getElementById('article-text').innerText = article.Text;
            document.getElementById('article-date').innerText = `Datum: ${article.Datum}`;

            const image = document.getElementById('article-image');
            image.src = "../public/img/" + article.Bildadresse;
            image.alt = article.Ueberschrift;

            // Spinner ausblenden, Inhalte anzeigen
            spinner.classList.add('hidden');
            detailPage.classList.remove('hidden');
        })
        .catch(error => {
            console.error(error);
            errorField.innerText = 'Fehler beim Laden des Artikels!';
            spinner.classList.add('hidden');
        });
});
