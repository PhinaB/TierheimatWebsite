<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/menu.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/aktuelles.css" />

    <link rel="stylesheet" href="../fontawesome-6.5.2/css/all.min.css">

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
renderMenu('aktuelles');
?>
    <div class="grid">
        <main>
            <div class="tile tileBorder">
                <a href="../index.html" draggable="false"><i class="fa-solid fa-house"></i> Startseite</a>
                >
                <a class="disabled" draggable="false">Aktuelles</a>
            </div>

            <div class="tile">
                <h2>Neues aus dem Tierheim</h2>
                <hr class="underHeadline" />
                <div class="flexWir tileBorder">
                    <img src="../img/ausbauTierheim.jpg"  alt="Lageplan Tierheim" title="Lageplan Tierheim" draggable="false" />
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
                                Ihr Engagement und Ihre Großzügigkeit sind ein bedeutender Beitrag zu unserem gemeinsamen Ziel, den Tieren in unserer Obhut das bestmögliche Leben zu ermöglichen.
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
                <div class="box-container box-container-button">
                    <div>
                        <img src="../img/tierheimFest.jpg" alt="Bild eines Hundes mit dem Schriftzug 'Tierheimfest'" title="Bild eines Hundes mit dem Schriftzug 'Tierheimfest'" draggable="false" />
                        <h3>15 Jahre Tierheimat</h3>
                        <p>
                            Unser Tierheim feiert dieses Jahr sein 15-jähriges Bestehen und blickt auf eine bewegte Geschichte zurück.
                            Seit unserer Gründung ...
                        </p>
                        <a href="aktuellesWeiterlesen.html" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                    <div>
                        <img src="../img/pokal.jpg" alt="Bild eines Pokals" title="Bild eines Pokals" draggable="false" />
                        <h3>Sieger des Thüringer Tierheimwettbewerb</h3>
                        <p>
                            Wir freuen uns außerordentlich, bekannt zu geben, dass unser Tierheim den Thüringer Tierheimwettbewerb gewonnen hat.
                        </p><p>
                            Diese Auszeichnung ist ein Beweis für ...
                        </p>
                        <a href="" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                    <div>
                        <img src="../img/tierarztStudent.jpg" alt="Bild eines Tierarztes, der einen Hund untersucht" title="Bild eines Tierarztes, der einen Hund untersucht" draggable="false" />
                        <h3>Wir begrüßen unsere neuen Veterinärstudenten</h3>
                        <p>
                            Wir heißen einen neuen Veterinärstudenten in unserem Team herzlich willkommen.
                        </p><p>
                            Seine frischen Kenntnisse und ...
                        </p>
                        <a href="" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                    <div>
                        <img src="../img/friedhof.jpg" alt="Bild eines Friedhofs" title="Bild eines Friedhofs" draggable="false" />
                        <h3>Erneuerung der Ruhestätte</h3>
                        <p>
                            Mit großem Respekt und Hingabe haben wir die Ruhestätte unseres Tierheims erneuert.
                        </p><p>
                            Dieser Ort bietet ...
                        </p>
                        <a href="" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                    <div id="tiervermittlung">
                        <img src="../img/glücklicheKatze.jpg" alt="Bild einer glücklichen Katze" title="Bild einer glücklichen Katze" draggable="false" />
                        <h3>Erfolgreiche Tiervermittlung</h3>
                        <p>
                            In den letzten Monaten konnten wir zahlreiche Tiere erfolgreich in liebevolle Zuhause vermitteln.
                        </p><p>
                            Dank der intensiven Betreuung und Pflege ...
                        </p>
                        <a href="" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                    <div>
                        <img src="../img/tierschutzLogo.jpg" alt="Bild von Pfoten und menschlichen Händen, die sich festhalten" title="Bild von Pfoten und menschlichen Händen, die sich festhalten" draggable="false" />
                        <h3>Erfolgreiche Spendenaktion</h3>
                        <p>
                            Unsere jüngste Spendenaktion war ein großer Erfolg! Dank der Großzügigkeit unserer Unterstützer konnten wir eine beträchtliche Summe sammeln, die direkt in ...
                        </p>
                        <a href="" class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum Artikel</a>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>
