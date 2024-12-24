<?php
function allIncludes($stylesheets, $currentPage): void
{
    include __DIR__ . '/../includes/mainStylesheets.php';   // TODO Vererbungshierarchie -> s. wholie (wie da die view gebaut ist)
    include __DIR__ . '/../includes/menu.php';
    include __DIR__ . '/../includes/breadcrumbNavigation.php';
    include __DIR__ . '/../includes/footer.php';

    foreach ($stylesheets as $s) {
        if ($s === "missingFoundPrint.css") {
            echo '<link rel="stylesheet" media="print" href="../public/css/' . $s . '" />';
        } else {
            echo '<link rel="stylesheet" media="all" href="../public/css/' . $s . '" />';
        }
    }

    renderMenu($currentPage);
}
