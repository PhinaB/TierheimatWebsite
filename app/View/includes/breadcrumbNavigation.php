<?php
function renderBreadcrumb ($currentPage): void {
    ?>

    <div class="tile tileBorder">
        <a <?php if ($currentPage != 'index') { echo 'href="../public/"'; } else { echo 'class="disabled"'; } ?>draggable="false">
            <i class="fa-solid fa-house"></i> Startseite</a>
        <?php
        if ($currentPage === 'Hunde' || $currentPage === 'Katzen' || $currentPage === 'Kleintiere' || $currentPage === 'Exoten') {
            echo ' > <a href="unsereTiere" draggable="false">Alle Tiere</a>';
        }

        if ($currentPage === 'Vermisste Tiere' || $currentPage === 'Gefundene Tiere') {
            echo ' > <a href="vermisstGefunden" draggable="false">Vermisste / Gefundene Tiere</a>';
        }

        if ($currentPage != 'index') {
            echo ' > <a class="disabled" draggable="false">'.$currentPage.'</a>';
        }
        ?>
    </div>
    <?php
}