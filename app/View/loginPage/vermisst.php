<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/menu.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/main.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/footer.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/loggedInPage.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/vermisstGefundenLogin.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/vermisstGefunden.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/unsereTiere.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/formulare.css" media="all"/>
    <link rel="stylesheet" href="../../../public/css/vermisstGefundenPrint.css" media="print" />

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
                <a href="aktuelles.html" draggable="false">
                    <i class="fa-solid fa-calendar menuIcon onlySmallMenu"></i>
                    Aktuelles
                </a>
                <div class="dropdown colorGreen">
                    <a class="deactivate disabled" draggable="false">
                        <i class="fa-solid fa-magnifying-glass-location menuIcon onlySmallMenu"></i>
                        Vermisst/<br class="onlySmallMenu" />Gefunden
                    </a>
                    <div class="submenu bigWidthSubmenu">
                        <a href="vermisstGefunden.html">Alle Tiere</a>
                        <a class="disabled">Vermisste Tiere</a>
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
            <div class="tile tileBorder druckenNichtDarstellen">
                <a href="indexLogin.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
                >
                <a class="disabled" draggable="false">Vermisst / Gefunden</a>
            </div>

            <div class="tileBorder tile druckenNichtDarstellen">
                <div class="kopfelementFormular">
                    <h2>Vermisst / Gefunden melden</h2>
                    <hr class="underHeadline" />
                    <p class="spaltenText">
                        Sie haben ein Tier gefunden oder wollen Ihr Tier als vermisst melden?
                        Füllen Sie zunächst das folgende Formular aus.
                        Wir werden Ihre Meldung sichtbar auf unserer Website ausschreiben.
                        Sobald wir jegliche Informationen erhalten haben, werden wir uns bei Ihnen melden
                        und unser bestmögliches tun, um Ihnen bei der Suche nach dem Besitzer bzw. dem Tier
                        behilflich zu sein.
                    </p>
                </div>

                <form action="#" method="post" class="flex-containerVermisstefundenmelden">
                    <div class="flex-item1">
                        <div class="flex-itemAnliegen">
                            <label for="anliegenVermisstGefunden" class="h3">Anliegen: <span class="redPflichtfeld">*</span></label>

                            <select name="anliegenVermisstGefunden" id="anliegenVermisstGefunden" class="eingabe" required>
                                <option value="" disabled selected hidden>Bitte wählen...</option>
                                <option value="vermisstMelden">Vermisst melden</option>
                                <option value="gefundenMelden">Gefunden melden</option>
                            </select>
                        </div>

                        <div class="flex-itemTierart">
                            <label for="tierart" class="h3">Um welche Tierart handelt es sich? <span class="redPflichtfeld">*</span></label>

                            <select name="tierart" id="tierart" class="eingabe" required>
                                <option value="" disabled selected hidden>Bitte wählen...</option>
                                <option value="Katze">Katze</option>
                                <option value="Hund">Hund</option>
                                <option value="Vogel">Vogel</option>
                                <option value="Sonstiges">Sonstiges</option>
                            </select>

                        </div>

                        <div class="flex-itemDatum">
                            <label for="datum" class="h3">Datum des Verschwindens / Datum des Fundes: <span class="redPflichtfeld">*</span></label>

                            <input type="date" name="datum" id="datum" class="eingabe feldBreite" required />
                        </div>

                        <div class="flex-itemOrt">
                            <label for="ort" class="h3">Ort des Verschwindens / Fundort: <span class="redPflichtfeld">*</span></label>

                            <input type="text" name="ort" id="ort" class="eingabe feldBreite" placeholder="Ort" minlength="1" maxlength="20" required />
                        </div>
                    </div>

                    <div class="flex-item2">
                        <div class="flex-itemTierbeschreibung">
                            <label for="tierbeschreibung" class="h3">Beschreibung des Tieres: <span class="redPflichtfeld">*</span></label>

                            <textarea name="tierbeschreibung" id="tierbeschreibung" class="eingabe" rows="4" cols="20" minlength="1" maxlength="500" placeholder="Beschreibung des Tieres..." required></textarea>
                        </div>

                        <div class="flex-itemTierbild">
                            <label for="tierbild-upload" class="h3 tierbild">Bild vom Tier (nur .jpg .jpeg .png):</label>
                            <label for="tierbild-upload" class="tierbild-upload button">
                                <span><i class="fa-solid fa-upload"></i>  Datei laden</span>
                            </label>
                            <input type="file" accept="image/*" name="tierbild" id="tierbild-upload" class="eingabe feldBreite" />
                        </div>

                        <div class="flex-itemKontaktaufnahme">
                            <label class="h3">Art der Kontaktaufnahme: <span class="redPflichtfeld">*</span></label>
                            <div class="eingabe">
                                <input id="radio_email" type="radio" name="kontaktaufnahme" value="email" class="eingabe" required />
                                <label for="radio_email">E-Mail</label>
                                <br />
                                <input id="radio_telefon" type="radio" name="kontaktaufnahme" value="telefon" class="eingabe" required />
                                <label for="radio_telefon">Telefon</label>
                            </div>
                        </div>
                    </div>

                    <div class="fusselementFormular">
                        <button class="button" type="submit" value="absenden" title="Button absenden" draggable="false"><i class="fa-regular fa-paper-plane"></i>  Absenden</button>
                        <button class="button" type="reset" value="zurücksetzen" title="Button zurücksetzen" draggable="false"> <i class="fa-solid fa-arrow-rotate-left"></i>  Zurücksetzen</button>
                    </div>
                </form>
                <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
            </div>

           
            <div class="tile druckenOhneSeitenumbruch">
               
                <h2>Vermisste Tiere</h2>
                <hr class="underHeadline" />

                <div class="box-containerVermisstGefundenMelden tileBorder">
                    <div>
                        <img src="../../../public/img/pablo.jpg" alt="Bild eines Hundes" title="Bild Hund Pablo" draggable="false" />
                    </div>
                    <div class="vermisstGefundenText">
                        <h3 class="headlineWithButtons">
                            Pablo
                            <a href="" title="Anzeige löschen" class="delete" draggable="false">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <a href="" title="Anzeige bearbeiten" class="edit" draggable="false">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </h3>
                        <p><span class="boldText">Verschwunden am:</span> 01.06.2024 </p>
                        <p><span class="boldText">Verschwunden in:</span> Weimar </p>
                        <p class="boldText">Beschreibung:</p>
                        <p>
                            Wir waren am Samstag Abend mit Pablo in Weimar am Park an der Ilm spazieren und haben ihn nur
                            kurz aus den Augen gelassen. Wir vermissen ihn sehr.
                            Jeder Hinweis könnte uns bei der Suche helfen.
                        </p>
                        <br />
                        <p class="kursivText">
                            Bitte kontaktieren Sie das Tierheim per Email, wenn Sie Hinweise haben oder das Tier gefunden haben:
                        </p>
                        <br />

                        <a href="mailto:tiere@tierheimat.de" class="button" title="Button E-Mail" draggable="false"><i class="fa-solid fa-envelope"></i>  E-Mail schreiben</a>
                    </div>
                </div>

                <div class="box-containerUnsereTiere">
                    <div>
                        <img src="../../../public/img/luke.jpg" alt="Bild eines Degu" title="Bild Degu Luke" draggable="false" />
                        <h3>Luke</h3>

                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"><span class="boldText">am:</span> 13.01.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Vieselbach</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Luke ist...</p>

                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../../../public/img/lotta.jpg" alt="Bild einer Katze" title="Bild Katze Lotta" draggable="false" />
                        <h3 class="headlineWithButtons">
                            Lotta
                            <a href="" title="Anzeige löschen" class="delete" draggable="false">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <a href="" title="Anzeige bearbeiten" class="edit" draggable="false">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"><span class="boldText">am:</span> 02.06.2023</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Erfurt</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Lotta ist...</p>

                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../../../public/img/raspun.jpg" alt="Bild einer Schildkröte" title="Bild Schildkröte Raspun" draggable="false" />
                        <h3>Raspun</h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"><span class="boldText">am:</span> 05.02.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Erfurt</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Raspun ist...</p>

                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../../../public/img/drako.jpg" alt="Bild einer Katze" title="Bild Katze Drakp" draggable="false" />
                        <h3>Drako</h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"> <span class="boldText">am:</span> 09.03.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Stotternheim</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Drako ist...</p>

                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
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
        <div class="underFooter"><a href="impressum.html" draggable="false">Impressum</a> | &copy; 2024 Tierheimat e.V.</div>
    </div>

    <script src="../../../public/lib/fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>