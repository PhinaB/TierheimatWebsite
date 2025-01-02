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
            <div class="dropdown">
                <a class="deactivate" draggable="false">
                    <i class="fa-solid fa-paw menuIcon onlySmallMenu"></i>
                    Unsere <br class="onlySmallMenu" />Tiere
                </a>
                <div class="submenu smallWidthSubmenu">
                    <a href="unsereTiere.html">Alle Tiere</a>
                    <a href="unsereHunde.html">Hunde</a>
                    <a href="unsereKatzen.html">Katzen</a>
                    <a href="unsereKleintiere.html">Kleintiere</a>
                    <a href="unsereExoten.html">Exoten</a>
                </div>
            </div>
            <a class="disabled" draggable="false">
                <i class="fa-solid fa-calendar menuIcon onlySmallMenu"></i>
                Aktuelles
            </a>
            <div class="dropdown">
                <a class="deactivate" draggable="false">
                    <i class="fa-solid fa-magnifying-glass-location menuIcon onlySmallMenu"></i>
                    Vermisst/<br class="onlySmallMenu" />Gefunden
                </a>
                <div class="submenu bigWidthSubmenu">
                    <a href="vermisstGefunden.html">Alle Tiere</a>
                    <a href="vermisst.html">Vermisste Tiere</a>
                    <a href="gefunden.html">Gefundene Tiere</a>
                </div>
            </div>
            <a href="serviceInfos.html" draggable="false">
                <i class="fa-solid fa-circle-info menuIcon onlySmallMenu"></i>
                Service/<br class="onlySmallMenu" />Infos
            </a>
            <a href="../index.html" draggable="false">
                <i class="fa-solid fa-right-from-bracket menuIcon onlySmallMenu"></i>
                Logout
            </a>
        </div>
    </nav>
</header>
<div class="grid">
    <main>
        <div class="tile tileBorder">
            <a href="indexLogin.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
            >
            <a class="disabled" draggable="false">Aktuelles</a>
        </div>

        <div class="tile">
            <h2>Neues aus dem Tierheim</h2>
            <hr class="underHeadline" />
            <div class="flexWir tileBorder">
                <img src="../../../public/img/ausbauTierheim.jpg" alt="Lageplan Tierheim" title="Lageplan Tierheim" draggable="false" />
                <div class="text">
                    <p>
                        Sehr geehrte Unterstützer und Freunde unseres Tierheims,
                    </p><br /><p>
                        wir freuen uns sehr, Ihnen mitteilen zu können, dass die bauliche Erweiterung unseres Tierheims erfolgreich begonnen hat.
                    </p>

                    <div class="hiddenOnSmallScreen">
                        <p>
                            Dank Ihrer großzügigen Spenden und Unterstützung konnten wir neue Unterkünfte und moderne Einrichtungen für unsere Tiere schaffen.
                        </p><br /><p>
                            Diese Erweiterung ermöglicht es uns noch mehr Tieren in Not zu helfen und ihnen ein vorübergehendes Zuhause zu bieten.
                            Ein herzliches Dankeschön an alle Spender, freiwilligen Helfer und Partner, die dieses Projekt möglich gemacht haben.
                        </p>
                    </div>
                    <div class="hiddenOnBigScreen">
                        <p>Dank Ihrer großzügigen Spenden und ... </p>
                        <br />
                        <a href="aktuellesWeiterlesenAusbauTierheim.html" draggable="false" class="button">
                            <i class="fa-solid fa-newspaper"></i> Zum Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tile">
            <h2>Weitere Artikel</h2>
            <hr class="underHeadline" />
            <div id="articlesContainer" class="box-container"></div>

            <a id="weitereArtikelAnzeigen" class="button hidden">
                Weitere Artikel anzeigen
            </a>

            <div id="loading" class="hidden">Laden...</div>
            <input type="hidden" name="offset" value="0" />
            <div class="fehlerLoading"></div>
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
    </footer>
</div>

<script src="../../../public/lib/fontawesome-6.5.2/js/all.js"></script>
<script src="../../../public/js/aktuelles.js"></script>
</body>
</html>
