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
include '../includes/menu.php';
renderMenu('vermisst');
?>
    <div class="grid">
        <main>
            <div class="tile tileBorder druckenNichtDarstellen">
                <a href="../index.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
                >
                <a class="disabled" draggable="false">Vermisst / Gefunden</a>
            </div>

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
        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>