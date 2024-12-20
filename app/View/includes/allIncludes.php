<?php
function allIncludes($stylesheets, $currentPage)
{
    include __DIR__ . '/../includes/mainStylesheets.php';   // TODO Vererbungshierarchie -> s. wholie (wie da die view gebaut ist)
    include __DIR__ . '/../includes/menu.php';
    include __DIR__ . '/../includes/breadcrumbNavigation.php';
    include __DIR__ . '/../includes/footer.php';

    foreach ($stylesheets as $s) {
        echo '<link rel="stylesheet" href="../public/css/' . $s . '" />';
    }

    renderMenu($currentPage);
}
