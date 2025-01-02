document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('categorySelect');
    const newsContainer = document.getElementById('news-container');
    const loading = document.getElementById('loading');
    const content = document.getElementById('aktuelles-content');

    // Lade die Kategorien dynamisch
    fetch('../../../app/Controller/getAktuellesData.php?type=categories')
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
        });

    // Aktualisiere Inhalte basierend auf der ausgewählten Kategorie
    window.updateContent = function () {
        loading.style.display = 'block';
        content.classList.add('hidden');

        fetch(`../../../app/Controller/getAktuellesData.php?type=news&category=${categorySelect.value}`)
            .then(response => response.json())
            .then(news => {
                newsContainer.innerHTML = '';
                news.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'news-item';
                    div.innerHTML = `<h3>${item.title}</h3><p>${item.description}</p>`;
                    newsContainer.appendChild(div);
                });

                loading.style.display = 'none';
                content.classList.remove('hidden');
            });
    };
});
