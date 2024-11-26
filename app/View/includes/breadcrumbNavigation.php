<?php
function renderBreadcrumb ($currentPage): void {
    $page = "page/";
    $baseDir = str_contains($_SERVER['PHP_SELF'], '/'.$page) ? '../' : '';
    $pageDir = str_contains($_SERVER['PHP_SELF'], '/'.$page) ? '' : $page;
    ?>

    <div class="tile tileBorder">
        <a <?php if ($currentPage != 'index') { echo 'href="'.$baseDir.'index.php"'; } else { echo 'class="disabled"'; } ?>draggable="false">
            <i class="fa-solid fa-house"></i> Startseite</a>
        <?php
        if ($currentPage === 'Unsere Hunde' || $currentPage === 'Unsere Katzen' || $currentPage === 'Unsere Kleintiere' || $currentPage === 'Unsere Exoten') {
            echo ' > <a href="'.$pageDir.'unsereTiere.php" draggable="false">Unsere Tiere</a>';
        }

        if ($currentPage === 'Vermisste Tiere' || $currentPage === 'Gefundene Tiere') {
            echo ' > <a href="'.$pageDir.'vermisstGefunden.php" draggable="false">Vermisste / Gefundene Tiere</a>';
        }

        if ($currentPage != 'index') {
            echo ' > <a class="disabled" draggable="false">'.$currentPage.'</a>';
        }
        ?>
    </div>
    <?php
}