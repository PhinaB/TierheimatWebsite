document.addEventListener('DOMContentLoaded', function () {
    loadArticles();
    document.querySelector('input[name=offset]').value = '0';

    document.querySelector('#weitereArtikelAnzeigen').addEventListener('click', function () {
        let offset = document.querySelector('input[name=offset]');
        offset.value = parseInt(offset.value) + 6; // Lade 6 weitere Artikel
        loadArticles();
    });
});

function loadArticles() {
    let spinner = document.getElementById('loading');
    spinner.classList.remove('hidden');

    let offset = document.querySelector('input[name=offset]').value;

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status === 200) {
                let response = JSON.parse(this.response);

                if (response.artikel.length > 0) {
                    setArticlesToPage(response.artikel);
                } else {
                    document.querySelector('.fehlerLoading').innerText = "Keine weiteren Artikel vorhanden!";
                }

                if (response.countedArticles > parseInt(offset) + 6) {
                    document.querySelector('#weitereArtikelAnzeigen').classList.remove('hidden');
                }
            } else {
                document.querySelector('.fehlerLoading').innerText = "Fehler beim Laden der Artikel!";
            }

            spinner.classList.add('hidden');
        }
    };

    xhttp.open('POST', '../public/load/all/articles');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('offset=' + offset);
}

function setArticlesToPage(articles) {
    let container = document.querySelector('#articlesContainer');

    articles.forEach(article => {
        let articleDiv = document.createElement('div');
        articleDiv.classList.add('article-box');

        let img = document.createElement('img');
        img.src = "../public/img/" + article.Bildadresse;
        img.alt = article.Ueberschrift;

        let title = document.createElement('h3');
        title.innerText = article.Ueberschrift;

        let description = document.createElement('p');
        description.innerText = article.Text.substring(0, 100) + '...';

        let button = document.createElement('a');
        button.href = 'aktuellesWeiterlesen.html?id=' + article.ArtikelID;
        button.classList.add('button');
        button.innerHTML = '<i class="fa-solid fa-newspaper"></i> Zum Artikel';

        articleDiv.appendChild(img);
        articleDiv.appendChild(title);
        articleDiv.appendChild(description);
        articleDiv.appendChild(button);

        container.appendChild(articleDiv);
    });
}
