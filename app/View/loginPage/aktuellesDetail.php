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

<!--

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

         Ladeanzeige
<div id="loading" class="center">
    <p>Der Artikel wird geladen...</p>
    <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
</div>

Artikel-Detail-Anzeige
<div id="news-detail" class="hidden box-absolute zIndex">
    <div class="kopfelement">
        <h3 class="inline" id="article-title"></h3>
        <a href="aktuelles.php" title="Zurück" draggable="false">
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

<footer>
    <div>
        <h4>KONTAKT</h4>
        <p>
            Adresse: Musterstraße 2<br />
            12345 Musterhausen<br />
            E-Mail: <a href="mailto:muster@tierheimat.de" draggable="false">muster@tierheimat.de</a><br />
            Telefon: <a href="tel:01234567892" draggable="false">0123 4567892</a>
        </p>
    </div>
    <div class="secondFooterChild">
        <h4>ÖFFNUNGSZEITEN</h4>
        <p>
            Mo - Fr: 10 - 18 Uhr<br />
            Sa: 8 - 18 Uhr
        </p>
    </div>
    <div>
        <h4>UNSER SPENDENKONTO</h4>
        <p>
            Tierheimat e.V.<br />
            Tierheimbank Erfurt<br />
            IBAN: DE12 3456 7890 1234 1234 55<br />
            BIC: ABCDEFGH
        </p>
    </div>
</footer>
<div class="underFooter">
    <a href="impressum.html" draggable="false">Impressum</a> | &copy; 2024 Tierheimat e.V.
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const articleId = urlParams.get('articleId');

        if (!articleId) {
            alert('Kein Artikel gefunden!');
            return;
        }

        // Lade Artikel-Daten vom Server
        fetch(`/load/article/detail?id=${articleId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Artikel konnte nicht geladen werden.');
                }
                return response.json();
            })
            .then(data => {
                // Ladeanzeige ausblenden und Inhalte anzeigen
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('news-detail').classList.remove('hidden');

                // Artikel-Daten in die Seite einfügen
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


-->

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
