<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'index';

    include 'includes/mainStylesheets.php';
    ?>
    
    <link rel="stylesheet" href="../public/css/index.css" />
    <link rel="stylesheet" href="../public/css/bildwechselBilder.css" />
</head>
<body>
<?php

include 'includes/menu.php';
renderMenu($currentPage);
?>

    <div class="gridIndex">
        <div id="startbilder">
            <img src="../public/img/startbild-1.jpg" class="startbild" draggable="false" alt="Bild einer Ratte" title="Startbild der Seite Tierheimat" />
            <img src="../public/img/startbild-5.jpg" class="startbild" draggable="false" alt="Bild eines Taggeckos" title="Startbild der Seite Tierheimat" />
            <img src="../public/img/startbildHund.jpg" class="startbild" draggable="false" alt="Bild eines Hundes und einer Katze" title="Startbild der Seite Tierheimat" />
        </div>
        <main>
            <?php
            include 'includes/breadcrumbNavigation.php';
            renderBreadcrumb($currentPage);
            ?>

            <div class="tile">
                <h2>Aktuelles</h2>
                <hr class="underHeadline" />

                <div class="box-container box-container-button">
                    <div>
                        <img src="../public/img/ausbauTierheim.jpg" alt="Lageplan des Tierheims Tierheimat" title="Lageplan des Tierheims Tierheimat" draggable="false" />
                        <h3>Erweiterung des Tierheims</h3>
                        <p>
                            Dank Ihrer großzügigen Spenden und Unterstützung konnten wir neue Unterkünfte und moderne Einrichtungen für unsere Tiere schaffen.
                        </p><p>
                            Diese Erweiterung ermöglicht es uns ...
                        </p>
                        <a href="page/aktuellesWeiterlesenAusbauTierheim.php" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                    <div>
                        <img src="../public/img/tierheimFest.jpg" alt="Werbebild für das Tierheimfest" title="Werbebild für das Tierheimfest" draggable="false" />
                        <h3>15 Jahre Tierheimat</h3>
                        <p>
                            Unser Tierheim feiert dieses Jahr sein 15-jähriges Bestehen und blickt auf eine bewegte Geschichte zurück. Seit unserer Gründung  ...
                        </p>
                        <a href="page/aktuellesWeiterlesen.php" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                    <div>
                        <img src="../public/img/glücklicheKatze.jpg" alt="Bild einer glücklichen Katze" title="Bild einer glücklichen Katze" draggable="false" />
                        <h3>Erfolgreiche Tiervermittlung</h3>
                        <p>
                            In den letzten Monaten konnten wir zahlreiche Tiere erfolgreich in liebevolle Zuhause vermitteln.
                        </p><p>
                            Wir sind stolz auf die Fortschritte, die ...
                        </p>
                        <a href="page/aktuelles.php#tiervermittlung" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                </div>
            </div>
            <div class="tile">
                <h2 class="marginTopH2">Unser Team</h2>
                <hr class="underHeadline" />
                <div class="flexWir">
                    <div class="aussenboxBildwechsel">
                        <a class="bildwechsel bildwechselWir" draggable="false">&nbsp;</a>
                    </div>
                    <div>
                        <p>
                            Unsere Leidenschaft für den Tierschutz und die Liebe zu Tieren haben uns, Josephina Burger, Lucas-Manfred Herpe und Stephanie Wachs, dazu inspiriert,
                            die Website "Tierheimat" zu entwickeln.
                        </p><p>
                            Unser Ziel ist es, bedürftigen Tieren ein neues Zuhause zu vermitteln.
                        </p><p>
                            Mit "Tierheimat" möchten wir Tierfreunden und potenziellen Adoptanten eine benutzerfreundliche Plattform bieten, die es ihnen ermöglicht, schnell und einfach ihren neuen tierischen Begleiter zu
                            finden.
                        </p><p>
                            Ein zentrales Ziel von "Tierheimat" ist es, die Zahl der Tieradoptionen zu erhöhen und somit das Leben vieler Tiere zu verbessern.
                        </p>
                    </div>
                </div>
            </div>
            <div class="tile">
                <h2 class="marginTopH2">Unsere Anlage</h2>
                <hr class="underHeadline" />
                <div class="flexWir">
                    <img src="../public/img/anlage.jpg" alt="Bild der Anlage des Tierheimes" title="Bild der Anlage des Tierheimes" draggable="false" />

                    <div>
                        <p>
                            Willkommen in unserer liebevoll gestalteten Tierheimanlage!
                        </p><p>
                            Unsere Anlage bietet eine sichere und behagliche Zuflucht für Tiere in Not. 
                            Unsere Außengehege sind mit verschiedenen Spiel- und Klettermöglichkeiten ausgestattet, 
                            die für abwechslungsreiche Beschäftigung und artgerechte Bewegung sorgen.
                        </p><p>
                            Unsere Innenbereiche sind gemütlich und warm eingerichtet, sodass sich alle Tiere bei uns wie zu Hause fühlen können. 
                            Die Unterkünfte bieten Rückzugsmöglichkeiten und Ruhe, 
                            die besonders wichtig für das Wohlbefinden unserer Vierbeiner sind.
                            Kommen Sie uns gerne besuchen, um sich selbst ein Bild über unsere Anlage zu machen. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="tile">
                <h2 class="marginTopH2">Unsere Tiere</h2>
                <hr class="underHeadline" />

                <div class="box-container">
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselLila bildwechsel" title="Bild eines Hundes" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Lila</h3>
                        <p>4 Jahre alt, Hündin ...</p>
                        <a href="page/unsereTiereWeiterlesen.php" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselLora bildwechsel" title="Bild eines Sittichs" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Lora</h3>
                        <p>5 Jahre alt, Sittich ...</p>
                        <a href="page/unsereTiere.php" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselRocky bildwechsel" title="Bild eines Hundes" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Rocky</h3>
                        <p>2 Jahre alt, Rüde ...</p>
                        <a href="page/unsereTiere.php#rocky" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Weiterlesen</a>
                    </div>
                </div>
                <a href="page/unsereTiere.php" class="button marginTopButton" draggable="false"><i class="fa-solid fa-plus"></i> Weitere Tiere ansehen</a>
            </div>
        </main>
        <?php include 'includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>