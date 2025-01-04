document.addEventListener('DOMContentLoaded', function () {
    const newsContainer = document.getElementById('current-content');
    const loading = document.getElementById('spinner');
    const content = document.getElementById('current-content');

    // Inhalte laden
    function updateContent() {
        loading.style.display = 'block'; // Spinner anzeigen
        content.classList.add('hidden');

        fetch(`/current/getData?type=news`)
            .then(response => response.json())
            .then(news => {
                newsContainer.innerHTML = '';
                news.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'news-item';

                    // Dynamisch erzeugte Artikel
                    div.innerHTML = `
                        <h3>${item.title}</h3>
                        <p>${item.description}</p>
                        <a href="/current/detail/${item.id}" class="button" draggable="false">
                            <i class="fa-solid fa-newspaper"></i> Zum Artikel
                        </a>
                    `;
                    newsContainer.appendChild(div);
                });

                loading.style.display = 'none';
                content.classList.remove('hidden');
            })
            .catch(error => {
                console.error('Fehler beim Laden der Inhalte:', error);
                loading.style.display = 'none';
            });
    }

    // Lade die Inhalte beim Start
    updateContent();
});
