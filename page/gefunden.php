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
$currentPage = 'Gefundene Tiere';

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

        include '../includes/gefundeneTiere.php';
        ?>

        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>