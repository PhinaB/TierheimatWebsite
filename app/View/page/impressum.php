<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Impressum';

    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>

    <link rel="stylesheet" href="../public/css/impressum.css" />
</head>
<body>
<?php
include __DIR__ . '/../includes/menu.php';
renderMenu($currentPage);
?>
<div class="grid">
    <main>
        <?php
        include __DIR__ . '/../includes/breadcrumbNavigation.php';
        renderBreadcrumb($currentPage);
        ?>
            <h1>Impressum</h1>
            <hr class="underHeadline" />
            <div class="tile tileBorder">
                <h2>Dokumentation</h2>
                <hr class="underHeadline" />
                <p>Die Dokumentation wurde eigenhändig von den Projektgruppenmitgliedern erstellt:</p>
                <a href="dokuGWP" class="button" draggable="false"><i class="fa-solid fa-book"></i> Zur Dokumentation GWP</a>
                <br />
                <a href="dokuDWP1" class="button" draggable="false"><i class="fa-solid fa-book"></i> Zur Dokumentation DWP</a>


                <h2>Bildnachweis</h2>
                <hr class="underHeadline" />
                <p>Einige Bilder wurden selbst fotografiert. Die Quellen aller anderen Bilder sind in der Dokumentation zu finden.</p>
            </div>
            <div class="tile tileBorder">
                <h2>Webdesign und Redaktionssystem</h2>
                <hr class="underHeadline" />
                <dl>
                    <dt>Projektgruppe PfotenDesign</dt>
                    <dd>Stephanie Wachs</dd>
                    <dd>Josephina Burger</dd>
                    <dd>Lucas-Manfred Herpe</dd>
                    <dt>Adresse</dt>
                    <dd>Fachhochschule Erfurt</dd>
                    <dd>Altonaer Straße 25</dd>
                    <dd>99085 Erfurt</dd>
                    <dt>Geschäftsadresse</dt>
                    <dd>Tierheimat GmbH</dd>
                    <dd>Musterstraße 2</dd>
                    <dd>12345 Musterhausen</dd>
                    <dt>E-Mail</dt>
                    <dd><a href="mailto:stephanie.wachs@fh-erfurt.de" draggable="false">stephanie.wachs@fh-erfurt.de</a></dd>
                    <dd><a href="mailto:josephina.burger@fh-erfurt.de" draggable="false">josephina.burger@fh-erfurt.de</a></dd>
                    <dd><a href="mailto:lucas.herpe@fh-erfurt.de" draggable="false">lucas.herpe@fh-erfurt.de</a></dd>
                </dl>

                <h2>Haftungsausschuss</h2>
                <hr class="underHeadline" />
                <p>
                    Alle Angaben unseres Webprojekts wurden sorgfältig geprüft. Wir bemühen uns, dieses Informationsangebot aktuell und inhaltlich richtig sowie vollständig anzubieten. Dennoch ist das Auftreten von Fehlern nicht völlig auszuschließen. Eine Garantie für die Vollständigkeit, Richtigkeit und letzte Aktualität kann daher nicht übernommen werden. Die Projektgruppe PfotenDesign behält es sich vor, dieses Informationsangebot nach eigenem Ermessen jederzeit ohne Ankündigung verändern und/oder dessen Betrieb einzustellen. Sie ist nicht verpflichtet, Inhalte dieses Informationsangebotes zu aktualisieren.
                </p>
                <p>
                    Der Zugang und die Benutzung dieses Informationsangebotes geschehen auf eigene Gefahr des Benutzers. Die Projektgruppe PfotenDesign ist nicht verantwortlich und übernimmt keinerlei Haftung für Schäden, unter anderem für direkte, indirekte, zufällige, vorab konkret zu bestimmende oder Folgeschäden, die angeblich durch den oder in Verbindung mit dem Zugang und/oder der Benutzung dieses Internetangebotes aufgetreten sind.
                </p>
                <p>
                    Die Dokumentation enthält externe Links auf die Internetseiten Dritter. Auf den Inhalt dieser Seiten haben wir keinen Einfluss und übernehmen für die Inhalte auch keine Gewähr. Die Projektgruppe PfotenDesign übernimmt keine Verantwortung für die Inhalte und die Verfügbarkeit von Internetseiten Dritter, die über externe Links dieses Informationsangebotes erreicht werden. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Die Projektgruppe PfotenDesign distanziert sich ausdrücklich von allen Inhalten, die möglicherweise straf- oder haftungsrechtlich relevant sind oder gegen die guten Sitten verstoßen.
                </p>

                <h2>Datenschutz</h2>
                <hr class="underHeadline" />
                <p>In diesem Webprojekt werden keine Cookies verwendet und keine Nutzerdaten erfasst. Die Forderungen der europaweit geltenden Datenschutz-Grundverordnung (DSGVO) werden eingehalten. </p>
            </div>
        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>