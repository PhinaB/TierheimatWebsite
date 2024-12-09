<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Gefundene Tiere';

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

        include __DIR__ . '/../includes/gefundeneTiere.php';
        ?>

        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
</body>
</html>