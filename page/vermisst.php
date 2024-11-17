<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/menu.css" media="all"/>
    <link rel="stylesheet" href="../css/main.css" media="all"/>
    <link rel="stylesheet" href="../css/footer.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefundenLogin.css" media="all"/>
    <link rel="stylesheet" href="../css/vermisstGefunden.css" media="all" />
    <link rel="stylesheet" href="../css/unsereTiere.css" media="all"/>
    <link rel="stylesheet" href="../css/formulare.css" media="all"/>
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
$currentPage = 'Vermisste Tiere';

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

        include '../includes/vermissteTiere.php';
        ?>

        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>