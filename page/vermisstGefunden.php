<!DOCTYPE html>
<html lang="de">
<head>
    <?php include '../includes/mainStylesheets.php'; ?>

    <link rel="stylesheet" href="../css/vermisstGefundenLogin.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefunden.css" media="all" />
    <link rel="stylesheet" href="../css/unsereTiere.css" media="all"/>
    <link rel="stylesheet" href="../css/formulare.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefundenPrint.css" media="print"/>
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

        include '../includes/vermisstGefundenFormular.php'; // TODO: entweder Formular, wenn angemeldet oder Hinweis zum Formular
        include '../includes/vermisstGefundenMelden.php';
        ?>

            <div class="druckenOhneSeitenumbruch">
                <form class="formTiereAuswaehlen druckenNichtDarstellen" action="#" method="post">
                    <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
                    <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                        <option value="tierartWählen">Alle</option>
                        <option value="vermissteTiere">Vermisste Tiere</option>
                        <option value="gefundeneTiere">Gefundene Tiere</option>
                    </select>
                    <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
                </form>
            </div>

        <?php
        include '../includes/vermissteTiere.php';
        echo '<br />';
        include '../includes/gefundeneTiere.php';
        ?>

        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
    <script src="../js/validation.js"></script>
</body>
</html>