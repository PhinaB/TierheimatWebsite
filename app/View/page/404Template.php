<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = '404 - Seite nicht gefunden';

    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>
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

        <div class="tile tileBorder notFoundTile">
            <h2>404 - Seite nicht gefunden</h2>
            <hr class="underHeadline" />
            <p style="text-align: center; padding: 20px 0;">Diese Seite existiert nicht! Gib eine andere Seite an - oder navigiere durch das Menü</p>
        </div>

    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
</body>
</html>