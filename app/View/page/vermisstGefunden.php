<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Vermisste / Gefundene Tiere';

    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>

    <link rel="stylesheet" href="../public/css/vermisstGefundenLogin.css" media="all"/>
    <link rel="stylesheet" href="../public/css/vermisstGefunden.css" media="all" />
    <link rel="stylesheet" href="../public/css/unsereTiere.css" media="all"/>
    <link rel="stylesheet" href="../public/css/formulare.css" media="all"/>
    <link rel="stylesheet" href="../public/css/vermisstGefundenPrint.css" media="print"/>
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

        include __DIR__ . '/../includes/vermisstGefundenFormular.php'; // TODO: entweder Formular, wenn angemeldet oder Hinweis zum Formular
        include __DIR__ . '/../includes/vermisstGefundenMelden.php';
        ?>

            <div class="druckenOhneSeitenumbruch">
                <form class="formTiereAuswaehlen druckenNichtDarstellen" action="#" method="post">
                    <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
                    <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                        <option value="tierartWählen">Alle</option>
                        <option value="vermisst">Vermisste Tiere</option>
                        <option value="gefunden">Gefundene Tiere</option>
                    </select>
                    <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
                </form>
            </div>

        <?php
        include __DIR__ . '/../includes/vermissteTiere.php';
        echo '<br />';
        include __DIR__ . '/../includes/gefundeneTiere.php';
        ?>

        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
    <script src="../public/js/validation.js"></script>
</body>
</html>