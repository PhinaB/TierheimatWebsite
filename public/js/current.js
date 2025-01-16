document.addEventListener('DOMContentLoaded', function() {
    loadArticles();
});

function loadArticles() {
    const spinner = document.getElementById('loading');

    const errorGeneral = document.querySelector('.fehlerLoading');
    errorGeneral.innerHTML = "";

    fetch('../public/load/articles', {
        method: 'POST',
    })
        .then(response => response.json())
        .then(data => {
            displayAllArticles(data);
        })
        .catch(error => errorGeneral.innerHTML = 'Fehler beim Laden der Artikel:'+error)
        .finally (()=>{
            spinner.classList.add('hidden');
        });
}

function displayAllArticles(articles) {
    const firstArticleHere = document.querySelector('#firstArticleHere');
    firstArticleHere.classList.remove('hidden');
    firstArticleHere.getElementsByTagName('h2')[0].innerHTML = articles[0].Ueberschrift;

    let cloneImg = firstArticleHere.getElementsByTagName('img')[0];
    cloneImg.src = "../public/img/"+articles[0].Bildadresse;
    cloneImg.alt = "Bild des Artikels '"+articles[0].Ueberschrift+"'";
    cloneImg.title = "Bild des Artikels '"+articles[0].Ueberschrift+"'";

    let textDiv = firstArticleHere.querySelector('.text');
    let textSeenEverytime = textDiv.querySelector('.textSeenEverytime');
    let textSeenOnBigScreen = textDiv.querySelector('.hiddenOnSmallScreen');
    let descriptionWords = articles[0].Text.split(' ');
    textSeenEverytime.innerHTML = descriptionWords.slice(0, 10).join(' ');
    textSeenOnBigScreen.innerHTML = descriptionWords.slice(10).join(' ');
    firstArticleHere.getElementsByTagName('a')[0].setAttribute('onclick', 'openReadMoreFirstArticleField()');

    for (let i = 1; i < articles.length; i++) {
        const copyArticlesHere = document.querySelector('#copyArticlesHere');
        const hiddenArticleDiv = document.querySelector('#hiddenArticle');
        let clone = hiddenArticleDiv.cloneNode(true);
        copyArticlesHere.appendChild(clone);

        clone.classList.remove('hidden');
        clone.classList.add('completeArticle');
        clone.id = "";
        clone.setAttribute('data-article-id', articles[i].ArtikelID);
        clone.getElementsByTagName('h3')[0].innerHTML = articles[i].Ueberschrift;
        let descriptionStart = clone.querySelector('.text');
        let descriptionWords = articles[i].Text.split(' ');
        descriptionStart.innerHTML = descriptionWords.slice(0, 10).join(' ') + ' ...';

        let cloneImg = clone.getElementsByTagName('img')[0];
        cloneImg.src = "../public/img/"+articles[i].Bildadresse;
        cloneImg.alt = "Bild des Artikels '"+articles[i].Ueberschrift+"'";
        cloneImg.title = "Bild des Artikels '"+articles[i].Ueberschrift+"'";

        clone.getElementsByTagName('a')[0].setAttribute('onclick', 'openWeiterlesenArticleField(this)');

        let hiddenTemplateReadMore = document.querySelector('#hiddenTemplateReadMore');
        let cloneReadMore = hiddenTemplateReadMore.cloneNode(true);
        copyArticlesHere.appendChild(cloneReadMore);

        cloneReadMore.id = "";
        cloneReadMore.getElementsByTagName('h3')[0].innerHTML = articles[i].Ueberschrift;
        cloneReadMore.querySelector('.beschreibung').innerHTML = articles[i].Text;
        cloneReadMore.getElementsByTagName('a')[0].setAttribute('onclick', 'closeWeiterlesenArticleField(this)');

        let readMoreImg = cloneReadMore.querySelector('.hohesBild');
        readMoreImg.src = "../public/img/" + articles[i].Bildadresse;
        readMoreImg.alt = "Bild des Artikels '"+articles[i].Ueberschrift+"'";
        readMoreImg.title = "Bild des Artikels '"+articles[i].Ueberschrift+"'";
    }
}

function openReadMoreFirstArticleField () {
    let firstArticle = document.querySelector('#firstArticleHere');

    firstArticle.querySelector('.hiddenOnBigScreenInline').innerHTML = "";
    firstArticle.querySelector('.hiddenOnBigScreen').classList.add('hidden');
    firstArticle.querySelector('.hiddenOnBigScreen').classList.remove('hiddenOnBigScreen');
    firstArticle.querySelector('.hiddenOnSmallScreen').classList.remove('hiddenOnSmallScreen');
}

function openWeiterlesenArticleField (buttonElement) {
    document.querySelector('#firstArticleHere').style.opacity = 0.4;

    openWeiterlesenField(buttonElement, 'completeArticle');
}

function closeWeiterlesenArticleField (buttonElement) {
    document.querySelector('#firstArticleHere').style.opacity = 1;

    closeWeiterlesenField(buttonElement, 'completeArticle');
}