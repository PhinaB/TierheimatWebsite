<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/menu.css" />
    <link rel="stylesheet" href="../../../public/css/main.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" />
    <link rel="stylesheet" href="../../../public/css/readMore.css" />

    <link rel="stylesheet" href="../../../public/lib/fontawesome-6.5.2/css/all.min.css">

    <title>Aktuelles - Details</title>
</head>
<body>
<header>
    <nav>
        <span class="linkLogo">
            <a href="indexLogin.php" class="logo" draggable="false">
                Tierheimat
            </a>
        </span>
    </nav>
</header>

<div class="grid">
    <main>
        <div class="tile tileBorder">
            <a href="indexLogin.php" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
            >
            <a href="aktuelles.php" draggable="false">Aktuelles</a>
            >
            <a class="disabled" draggable="false">Details</a>
        </div>

        <div id="loading">
            <p>Der Artikel wird geladen...</p>
            <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
        </div>

        <div id="news-detail" class="hidden box-absolute zIndex">
            <div class="kopfelement">
                <h3 class="inline" id="article-title"></h3>
                <a href="aktuelles.php" title="Schließen" draggable="false">
                    <i class="fa-solid fa-circle-xmark"></i>
                </a>
                <br />
            </div>
            <div class="flexWeiterlesen">
                <div class="unterelement bildWeiter">
                    <img id="article-image" class="hohesBild" alt="" draggable="false" />
                </div>
                <div class="unterelement scrollbar">
                    <p id="article-date" class="boldText"></p>
                    <p id="article-text" class="textTrennung"></p>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const articleId = urlParams.get('articleId');

        if (!articleId) {
            alert('Kein Artikel gefunden!');
            return;
        }

        fetch(`/load/article/detail?id=${articleId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('news-detail').classList.remove('hidden');

                document.getElementById('article-title').innerText = data.Ueberschrift;
                document.getElementById('article-date').innerText = `Datum: ${data.Datum}`;
                document.getElementById('article-text').innerText = data.Text;
                document.getElementById('article-image').src = `../../../public/img/${data.Bildadresse}`;
                document.getElementById('article-image').alt = data.Ueberschrift;
            })
            .catch(error => {
                console.error('Fehler beim Laden des Artikels:', error);
                alert('Fehler beim Laden des Artikels!');
            });
    });
</script>

</body>
</html>



<!--<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/menu.css" />
    <link rel="stylesheet" href="../../../public/css/main.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" />
    <link rel="stylesheet" href="../../../public/css/readMore.css" />

    <link rel="stylesheet" href="../../../public/lib/fontawesome-6.5.2/css/all.min.css">

    <title>Aktuelles - Details</title>
</head>
<body>
<header>
    <nav>
        <span class="linkLogo">
            <a href="indexLogin.html" class="logo" draggable="false">
                Tierheimat
            </a>
        </span>
    </nav>
</header>

<div class="grid">
    <main>
        <div class="tile tileBorder">
            <a href="indexLogin.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
            >
            <a href="aktuelles.html" draggable="false">Aktuelles</a>
            >
            <a class="disabled" draggable="false">Details</a>
        </div>

        <div id="loading">
            <p>Der Artikel wird geladen...</p>
            <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
        </div>

        <div id="news-detail" class="hidden box-absolute zIndex">
            <div class="kopfelement">
                <h3 class="inline" id="article-title"></h3>
                <a href="aktuelles.html" title="Schließen" draggable="false">
                    <i class="fa-solid fa-circle-xmark"></i>
                </a>
                <br />
            </div>
            <div class="flexWeiterlesen">
                <div class="unterelement bildWeiter">
                    <img id="article-image" class="hohesBild" alt="" draggable="false" />
                </div>
                <div class="unterelement scrollbar">
                    <p id="article-date" class="boldText"></p>
                    <p id="article-text" class="textTrennung"></p>
                </div>
            </div>
        </div>
    </main>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const articleId = urlParams.get('newsId');

        if (!articleId) {
            alert('Kein Artikel gefunden!');
            return;
        }

        fetch(`../load/article/detail?id=${articleId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('news-detail').classList.remove('hidden');

                document.getElementById('article-title').innerText = data.Ueberschrift;
                document.getElementById('article-date').innerText = `Datum: ${data.Datum}`;
                document.getElementById('article-text').innerText = data.Text;
                document.getElementById('article-image').src = "../../../public/img/" + data.Bildadresse;
                document.getElementById('article-image').alt = data.Ueberschrift;
            })
            .catch(error => {
                console.error('Fehler beim Laden des Artikels:', error);
                alert('Fehler beim Laden des Artikels!');
            });
    });
</script>

</body>
</html>
