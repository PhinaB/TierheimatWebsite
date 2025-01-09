<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/menu.css" />
    <link rel="stylesheet" href="../../../public/css/main.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" />
    <link rel="stylesheet" href="../../../public/css/current.css" />

    <link rel="stylesheet" href="../../../public/lib/fontawesome-6.5.2/css/all.min.css">

    <title>Aktuelles</title>
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
            <a class="disabled" draggable="false">Aktuelles</a>
        </div>

        <div class="tile">
            <h2>Aktuelles</h2>
            <hr class="underHeadline" />

            <div id="loading">
                <p>Die Inhalte werden geladen...</p>
                <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
            </div>

            <div id="articles-container" class="hidden">

                //hier sollten die Atrikel dynamisch eingefügt werden

            </div>

            <button id="load-more-articles" class="button hidden">
                <i class="fa-solid fa-plus"></i> Weitere Artikel anzeigen
            </button>
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
    <div class="underFooter"><a href="impressum.html" draggable="false">Impressum</a> | &copy; 2024 Tierheimat e.V.</div> // footer kopiert, sieht aber anders aus beim @ Zeichen
</div>

<script src="../../../public/js/aktuelles.js"></script>
<script src="../../../public/lib/fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>




<!--<!DOCTYPE html>
                <html lang="de">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                    <link rel="stylesheet" href="../../../public/css/menu.css" />
                    <link rel="stylesheet" href="../../../public/css/main.css" />
                    <link rel="stylesheet" href="../../../public/css/footer.css" />
                    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" />
                    <link rel="stylesheet" href="../../../public/css/current.css" />

                    <link rel="stylesheet" href="../../../public/lib/fontawesome-6.5.2/css/all.min.css">

                    <title>Aktuelles</title>
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
                            <a class="disabled" draggable="false">Aktuelles</a>
                        </div>

                        <div class="tile">
                            <h2>Aktuelles</h2>
                            <hr class="underHeadline" />

                            <div id="loading">
                                <p>Die Inhalte werden geladen...</p>
                                <img class="spinnerGifHeight" alt="loading..." src="../../../public/img/spinner.gif">
                            </div>

                            <p class="fehlermeldung fehlerLoading"></p>

                            <div id="page" class="hidden">
                                <div id="copyAllArticlesHere" class="box-container box-container-button"></div>
                                <div id="hiddenArticleTemplate" class="hidden completeArticle">
                                    <div class="relativePosition">
                                        <i class="fa-solid fa-heart heartForLike" title="Klicke, um dem Artikel ein Like zu geben!" onclick="setCookie(this, true);"></i>
                                        <div class="aussenboxBildwechselKlein">
                                            <a class="bildwechsel" title="" draggable="false">&nbsp;</a>
                                        </div>
                                        <h3></h3>
                                        <p class="beschreibungBeginn"></p>
                                        <a class="button weiterlesen" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                                    </div>
                                </div>

                                <a class="button hidden" id="weitereArtikelAnzeigen" title="Weitere Artikel anzeigen" draggable="false">
                                    <i class="fa-solid fa-plus"></i> Weitere Artikel anzeigen
                                </a>
                                <input type="hidden" value="0" name="offset">
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
                    <div class="underFooter"><a href="impressum.html" draggable="false">Impressum</a> | &copy; 2024 Tierheimat e.V.</div>
                </div>

                <script src="../../../public/js/aktuellesDetail.js"></script>
                <script src="../../../public/lib/fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
                </body>
                </html>
