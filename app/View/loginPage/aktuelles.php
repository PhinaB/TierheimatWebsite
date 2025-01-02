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

    <title>Tierheimat</title>
    <style>
        .onlySmallMenu {
            display: none;
        }

        @media only screen and (max-width: 900px) {
            .onlySmallMenu {
                display: inline;
            }
        }
    </style>
</head>
<body>
<header>
    <nav>
        <span class="linkLogo">
            <a href="indexLogin.html" class="logo" draggable="false">
                <img class="logoPicture" src="../../../public/img/logo.jpg" alt="Logo" title="Logo - mit Linksklick geht's zur Startseite" draggable="false" />
            </a>
        </span>
        <span class="user">
            <i class="fa-solid fa-user"></i> Nutzername
        </span>

        <div id="menuRight">
            <a href="indexLogin.html" draggable="false">
                <i class="fa-solid fa-house menuIcon onlySmallMenu"></i>
                Start
            </a>
            <a class="disabled" draggable="false">
                <i class="fa-solid fa-calendar menuIcon onlySmallMenu"></i>
                Aktuelles
            </a>
        </div>
    </nav>
</header>
<div class="grid">
    <main>
        <!-- Breadcrumb Navigation -->
        <div class="tile tileBorder">
            <a href="indexLogin.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
            >
            <a class="disabled" draggable="false">Aktuelles</a>
        </div>

        <!-- Überschrift -->
        <div class="tile">
            <h2>Neues aus dem Tierheim</h2>
            <hr class="underHeadline" />
            <div class="flexWir tileBorder">
                <img src="../../../public/img/ausbauTierheim.jpg" alt="Lageplan Tierheim" title="Lageplan Tierheim" draggable="false" />
                <div class="text">
                    <p>
                        Sehr geehrte Unterstützer und Freunde unseres Tierheims,
                    </p><br />
                    <p>
                        wir freuen uns sehr, Ihnen mitteilen zu können, dass die bauliche Erweiterung unseres Tierheims erfolgreich begonnen hat.
                    </p>
                    <br />
                    <a href="aktuellesWeiterlesenAusbauTierheim.html" draggable="false" class="button">
                        <i class="fa-solid fa-newspaper"></i> Zum Artikel
                    </a>
                </div>
            </div>
        </div>

        <!-- Dynamische Artikel -->
        <div class="tile">
            <h2>Weitere Artikel</h2>
            <hr class="underHeadline" />

            <!-- Container für dynamisch geladene Artikel -->
            <div id="articlesContainer" class="box-container"></div>

            <!-- Ladeanimation -->
            <div id="loading" class="hidden">Laden...</div>
            <input type="hidden" name="offset" value="0" />
            <div class="fehlerLoading"></div>
        </div>
    </main>

    <!-- Footer -->
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
    </footer>
</div>

<script src="../../../public/lib/fontawesome-6.5.2/js/all.js"></script>
<script src="../../../public/js/aktuelles.js"></script>
</body>
</html>
