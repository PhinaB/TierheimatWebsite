<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/menu.css" />
    <link rel="stylesheet" href="../../../public/css/main.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" />
    <link rel="stylesheet" href="../../../public/css/aktuelles.css" />
    <link rel="stylesheet" href="../../../public/lib/fontawesome-6.5.2/css/all.min.css">

    <title>Aktuelles - Dynamisch</title>
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

<main>
    <div class="tile">
        <h2>Aktuelles</h2>
        <hr class="underHeadline" />

        <div id="loading">
            <p>Die Inhalte werden geladen...</p>
            <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
        </div>

        <div id="aktuelles-content" class="hidden">
            <label for="categorySelect">Kategorie: </label>
            <select id="categorySelect" onchange="updateContent()">
            </select>

            <div id="news-container">
            </div>
        </div>
    </div>
</main>

<script src="../../../public/js/aktuelles.js"></script>
</body>
</html>
