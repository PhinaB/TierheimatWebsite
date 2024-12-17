<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>
    
    <link rel="stylesheet" href="../public/css/unsereTiere.css" />
    <link rel="stylesheet" href="../public/css/bildwechselBilder.css" />
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

            <div class="tile">
                <input type="hidden" id="currentTierart" value="<?php echo $currentPage; ?>">
                <h2>Unsere
                    <?php if ($currentPage === "Alle Tiere") { echo 'Tiere'; }
                    else { echo $currentPage; } ?>
                </h2>
                <hr class="underHeadline" />

                <div id="loading">
                    <p>Die Tiere werden geladen...</p>
                    <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
                </div>

                <p class="fehlermeldung fehlerLoading"></p>

                <div id="page" class="hidden">
                    <?php if ($currentPage === "Alle Tiere") { ?>
                            <div class="tile">
                                <form class="formUnsereTiere" action="#" method="post">
                                    <div>
                                        <label for="tierartAuswählen"> Tierart: </label>
                                        <select name="tierartAuswählen" id="tierartAuswählen" onchange="changeRasseSelect()">
                                        </select>
                                    </div><div>
                                        <label for="rasseAuswählen"> Rasse: </label>
                                        <select name="rasseAuswählen" id="rasseAuswählen" disabled style="cursor: default;">
                                            <option value="rasseWählen">Bitte auswählen</option>
                                        </select>
                                    </div><div>
                                        <label for="geschlechtAuswählen"> Geschlecht: </label>
                                        <select name="geschlechtAuswählen" id="geschlechtAuswählen">
                                        </select>
                                    </div><div>
                                        <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
                                    </div>
                                </form>
                                <p class="fehlermeldung fehlerFiler"></p>
                            </div>
                    <?php } ?>

                    <div id="copyAlleTiereHere"></div>

                    <div id="hiddenVorlageTier" class="hidden">
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechsel" title="" draggable="false">&nbsp;</a>
                        </div>
                        <h3></h3>
                        <p class="beschreibungBeginn"></p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <a href="" class="button hidden" id="weitereTiereAnzeigen" title="Button weitere Tiere anzeigen" draggable="false"><i class="fa-solid fa-plus"></i> Weitere Tiere anzeigen</a>
                </div>
            </div>
        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
    <script src="../public/js/unsereTiere.js"></script>
</body>
</html>