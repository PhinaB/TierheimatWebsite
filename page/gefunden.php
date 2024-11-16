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
$currentPage = 'Gefundene Tiere';

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