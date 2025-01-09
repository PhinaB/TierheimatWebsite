document.addEventListener('DOMContentLoaded', () => {
    const articlesContainer = document.getElementById('articles-container');
    let offset = 0;

    const loadArticles = () => {
        fetch('/load/all/articles', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ offset }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                data.forEach(article => {
                    const articleDiv = document.createElement('div');
                    articleDiv.classList.add('articlePreview');
                    articleDiv.innerHTML = `
                        <h3>${article.Ueberschrift}</h3>
                        <p>${article.Text.substring(0, 500)}...</p> <!--anzuzeigender text-->
                        <button class="detailsButton" data-article-id="${article.ArtikelID}">Zum Artikel</button>
                    `;
                    articlesContainer.appendChild(articleDiv);
                });

                offset += 8;

                if (data.length < 8) {
                    loadMoreButton.classList.add('hidden');
                }
            })
            .catch(error => console.error('Fehler beim Laden der Artikel:', error));
    };

    articlesContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('detailsButton')) {
            const articleId = event.target.getAttribute('data-article-id');
            window.location.href = `/aktuellesDetail.php?articleId=${articleId}`;
        }
    });

});





/*

document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('categorySelect');
    const newsContainer = document.getElementById('current-content');
    const loading = document.getElementById('spinner');
    const content = document.getElementById('current-content');

    // Lade Kategorien beim Start
    fetch('/current/getData?type=categories')
        .then(response => response.json())
        .then(categories => {
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });

            // Lade Inhalte für die erste Kategorie
            updateContent();
        })
        .catch(error => {
            console.error('Fehler beim Laden der Kategorien:', error);
        });

    // Inhalte für ausgewählte Kategorie laden
    window.updateContent = function () {
        loading.style.display = 'block'; // Spinner anzeigen
        content.classList.add('hidden');

        fetch(`/current/getData?type=news&category=${categorySelect.value}`)
            .then(response => response.json())
            .then(news => {
                newsContainer.innerHTML = ''; // Vorherigen Inhalt leeren
                news.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'news-item completeArticle tileBorder';

                    // Bild und Button hinzufügen (wie bei "Unsere Tiere")
                    div.innerHTML = `
                        <div class="relativePosition">
                            <i class="fa-solid fa-heart heartForLike" 
                                title="Klicke, um dem Artikel ein Like zu geben!" 
                                onclick="setCookie(this, true);">
                            </i>
                            <div class="aussenboxBildwechselKlein">
                                <a href="aktuellesDetail.php?newsId=${item.id}" 
                                   class="bildwechsel" title="${item.title}" draggable="false">&nbsp;</a>
                            </div>
                            <h3>${item.title}</h3>
                            <p class="beschreibungBeginn">${item.description}</p>
                            <a href="aktuellesDetail.php?newsId=${item.id}" 
                               class="button" draggable="false">
                                <i class="fa-solid fa-newspaper"></i> Weiterlesen
                            </a>
                        </div>
                    `;
                    newsContainer.appendChild(div);
                });

                loading.style.display = 'none'; // Spinner ausblenden
                content.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Fehler beim Laden der Inhalte:', error);
                loading.style.display = 'none';
            });
    };
});

 */
