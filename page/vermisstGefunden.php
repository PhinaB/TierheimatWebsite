<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/menu.css" media="all"/>
    <link rel="stylesheet" href="../css/main.css" media="all"/>
    <link rel="stylesheet" href="../css/footer.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefunden.css" media="all" />
    <link rel="stylesheet" href="../css/unsereTiere.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefundenPrint.css" media="print"/>

    <link rel="stylesheet" href="../fontawesome-6.5.2/css/all.min.css" >

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
<?php
$currentPage = 'Vermisste / Gefundene Tiere';

include '../includes/menu.php';
renderMenu($currentPage);
?>
<div class="grid">
    <main>
        <?php
        include '../includes/breadcrumbNavigation.php';
        renderBreadcrumb($currentPage);
        ?>

            <div class="tile druckenNichtDarstellen">
                <h2>Tiere vermisst / gefunden melden</h2>
                <hr class="underHeadline" />
                <div class="box-containerVermisstGefundenMelden">
                    <div class="vermisstGefundenText zentriert">
                        <p>Sie haben ein Tier gefunden oder wollen Ihr Tier als vermisst melden?</p>
                        <p>
                            Klicken Sie auf den folgenden Button, um sich anzumelden oder zu
                            registrieren und anschließend das gefundene Tier zu melden oder
                            Ihr Tier als vermisst zu melden.
                        </p>
                        <br />
                        <a href="/login.html" class="button" title="Button zum Login" draggable="false"><i class="fa-solid fa-right-to-bracket"></i>  Zum Login</a>
                    </div>
            
                    <div>
                        <img class="verschwindendesBild schattenBild" src="../img/vermisstGefunden.jpg" alt="Hund auf einer Strasse" title="Hund auf einer Strasse" draggable="false"/>
                    </div>
                </div>
            </div>

            <div class="tile druckenOhneSeitenumbruch">
                <form class="formTiereAuswaehlen druckenNichtDarstellen" action="#" method="post">
                    <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
                    <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                        <option value="tierartWählen">Alle</option>
                        <option value="vermissteTiere">Vermisste Tiere</option>
                        <option value="gefundeneTiere">Gefundene Tiere</option>
                    </select>
                    <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
                </form>

                <h2>Vermisste Tiere</h2>
                <hr class="underHeadline" />

                <div class="box-containerVermisstGefundenMelden tileBorder">
                    <div>
                        <img src="../img/pablo.jpg" alt="Bild eines Hundes" title="Bild Hund Pablo" draggable="false" />
                    </div>
                    <div class="vermisstGefundenText">
                        <h3>Pablo</h3>
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
                        <img src="../img/luke.jpg" alt="Bild eines Degu" title="Bild Degu Luke" draggable="false" />
                        <h3>Luke</h3>
                        
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>    
                        <p class="absatzfrei"><span class="boldText">am:</span> 13.01.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Vieselbach</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Luke ist...</p>
                        
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>
                    
                    <div>
                        <img src="../img/lotta.jpg" alt="Bild einer Katze" title="Bild Katze Lotta" draggable="false" />
                        <h3>Lotta</h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"><span class="boldText">am:</span> 02.06.2023</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Erfurt</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Lotta ist...</p>
                    
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../img/raspun.jpg" alt="Bild einer Schildkröte" title="Bild Schildkröte Raspun" draggable="false" />
                        <h3>Raspun</h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"><span class="boldText">am:</span> 05.02.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Erfurt</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Raspun ist...</p>

                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../img/drako.jpg" alt="Bild einer Katze" title="Bild Katze Drakp" draggable="false" />
                        <h3>Drako</h3>
                        <p class="absatzfrei"><span class="boldText">Verschwunden </span></p>
                        <p class="absatzfrei"> <span class="boldText">am:</span> 09.03.2024</p>
                        <p class="absatzfrei"><span class="boldText">in:</span> Stotternheim</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Drako ist...</p>
                        
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>                    
                    </div>
                </div>
            </div>
        <br />
            <div class="tile druckenMitSeitenumbruch">
                <h2>Gefundene Tiere</h2>
                <hr class="underHeadline" />

                <div class="box-containerVermisstGefundenMelden tileBorder">
                    <div>
                        <img src="../img/gefundeneKatze.jpg" alt="Bild einer Katze" title="Bild Katze" draggable="false"/>
                    </div>
    
                    <div class="vermisstGefundenText">
                        <p><span class="boldText">Funddatum:</span> 19.06.2024 </p>
                        <p><span class="boldText">Fundort:</span> Erfurt </p>
                        <p class="boldText">Beschreibung:</p>
                        <p>
                            Ich habe die Katze am Mittwoch Abend in Erfurt an der Altonaer Straße gefunden.
                            Sie wirkte verschreckt, abgemagert und hatte Flöhe. Ich habe sie mit nach Hause genommen
                            und sie wieder aufgepäppelt. Jetzt geht es ihr wieder besser.
                        </p>
                        <br />
                        <p class="kursivText">
                            Bitte kontaktieren Sie das Tierheim per Email, wenn Sie annehmen das Tier zu kennen:
                        </p>
                        <br />
                        <a href="mailto:tiere@tierheimat.de" class="button" title="E-Mail schreiben" draggable="false"><i class="fa-solid fa-envelope"></i>   E-Mail schreiben</a>

                    </div>  
                </div>

                <div class="box-containerUnsereTiere marginTopFirstElement">
                    <div>
                        <img src="../img/max.jpg" alt="Bild eines Hundes" title="Bild Hund" draggable="false" />
                        <p class="absatzfrei"><span class="boldText">Funddatum:</span> 23.05.2024</p>
                        <p class="absatzfrei"><span class="boldText">Fundort:</span> Erfurt</p>
                        <p class="absatzfrei"><span class="boldText">Kontakt: </span>0123 4567892</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Hund...</p>
                    
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../img/flo.jpg" alt="Bild einer Katze" title="Bild Katze" draggable="false" />
                        <p class="absatzfrei"><span class="boldText">Funddatum: </span>27.09.2023</p>
                        <p class="absatzfrei"><span class="boldText">Fundort:</span> Weimar</p>
                        <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Die Katze...</p>
                        
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../img/nick.jpeg" alt="Bild eines Hundes" title="Bild Hund" draggable="false" />
                        <p class="absatzfrei"><span class="boldText">Funddatum:</span> 25.02.2024</p>
                        <p class="absatzfrei"><span class="boldText">Fundort:</span> Arnstadt</p>
                        <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Hund...</p>
                            
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <img src="../img/stan.jpg" alt="Bild einer Katze" title="Bild Katze" draggable="false" />
                        <p class="absatzfrei"><span class="boldText">Funddatum: </span>24.06.2024</p>
                        <p class="absatzfrei"><span class="boldText">Fundort:</span> Hohenfelden</p>
                        <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                        <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Kater...</p>
                        
                        <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>