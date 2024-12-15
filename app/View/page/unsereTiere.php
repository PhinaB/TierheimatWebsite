<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Unsere Tiere';

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
                <h2>Unsere Tiere</h2>
                <hr class="underHeadline" />

                <div id="loading">
                    <p>Die Tiere werden geladen...</p>
                    <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
                </div>

                <p class="fehlermeldung fehlerLoading"></p>

                <div id="page" class="hidden">
                    <form class="formUnsereTiere" action="#" method="post">
                        <label for="tierartAuswählen"> Tierart: </label>
                            <select name="tierartAuswählen" id="tierartAuswählen">
                                <option value="tierartWählen">Tierart auswählen</option>
                                <option value="hunde">Hunde</option>
                                <option value="katzen">Katzen</option>
                                <option value="kleintiere">Kleintiere</option>
                                <option value="exoten">Exoten</option>
                            </select>
                            <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i>   Suchen</button>
                    </form>

                    <div id="copyAlleTiereHere"></div>

                    <div id="hiddenVorlageTier" class="hidden">
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechsel" title="" draggable="false">&nbsp;</a>
                        </div>
                        <h3></h3>
                        <p class="beschreibungBeginn"></p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <a href="" class="button" title="Button weitere Tiere anzeigen" draggable="false"><i class="fa-solid fa-plus"></i> Weitere Tiere anzeigen</a>
                </div>
            </div>
        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
    <script src="../public/js/unsereTiere.js"></script>
</body>
</html>