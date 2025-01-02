document.addEventListener("DOMContentLoaded", function () {
    const articlesContainer = document.getElementById("articlesContainer");
    const loading = document.getElementById("loading");

    // Lade Artikel dynamisch
    function loadArticles() {
        loading.classList.remove("hidden");

        fetch("getArticles.php") // PHP-Datei aufrufen
            .then(response => response.json())
            .then(articles => {
                loading.classList.add("hidden");

                articles.forEach(article => {
                    const articleDiv = document.createElement("div");
                    articleDiv.classList.add("flexWir", "tileBorder");

                    articleDiv.innerHTML = `
                        <img src="${article.image}" alt="${article.title}" draggable="false">
                        <div class="text">
                            <h3>${article.title}</h3>
                            <p>${article.excerpt}</p>
                            <a href="${article.link}" draggable="false" class="button">
                                <i class="fa-solid fa-newspaper"></i> Zum Artikel
                            </a>
                        </div>
                    `;

                    articlesContainer.appendChild(articleDiv);
                });
            })
            .catch(error => {
                console.error("Fehler beim Laden der Artikel:", error);
                loading.innerText = "Fehler beim Laden der Artikel.";
            });
    }

    // Initial Artikel laden
    loadArticles();
});
