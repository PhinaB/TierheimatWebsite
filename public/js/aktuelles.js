document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('categorySelect');
    const newsContainer = document.getElementById('current-content'); // Geändert zu 'current-content'
    const loading = document.getElementById('spinner'); // Geändert zu 'spinner'
    const content = document.getElementById('current-content'); // Geändert zu 'current-content'

    // Lade die Kategorien dynamisch, hoffe das klappt
    fetch('/current/getData?type=categories')
        .then(response => response.json())
        .then(categories => {
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });

            // Lade die Inhalte der ersten Kategorie
            updateContent();
        })
        .catch(error => {
            console.error('Fehler beim Laden der Kategorien:', error);
        });

    // Aktualisiere Inhalte
    window.updateContent = function () {
        loading.style.display = 'block'; // Spinner anzeigen
        content.classList.add('hidden');

        fetch(`/current/getData?type=news&category=${categorySelect.value}`) // URL aktualisiert
            .then(response => response.json())
            .then(news => {
                newsContainer.innerHTML = '';
                news.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'news-item';
                    div.innerHTML = `<h3>${item.title}</h3><p>${item.description}</p>`;
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
