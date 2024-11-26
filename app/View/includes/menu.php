<?php
function renderMenu ($currentPage): void {
    $page = "page/";
    $baseDir = str_contains($_SERVER['PHP_SELF'], '/'.$page) ? '../' : '';
    $pageDir = str_contains($_SERVER['PHP_SELF'], '/'.$page) ? '' : $page;
    ?>
    <header>
        <nav>
            <span class="linkLogo">
                <a <?php if ($currentPage != 'index') { echo 'href="'.$baseDir.'index.php"'; } ?> class="<?php if ($currentPage === 'index') { echo 'disabled'; } else { echo 'logo'; } ?>" draggable="false">
                    <img class="logoPicture" src="<?php echo $baseDir; ?>img/logo.jpg" alt="Logo" title="Logo <?php if ($currentPage != 'index') { echo ' - mit Linksklick geht\'s zur Startseite'; } ?>" draggable="false" />
                </a>
            </span>

            <div id="menuRight">
                <a <?php if ($currentPage === 'index') { echo 'class="disabled"'; } else { echo 'href="'.$baseDir.'index.php"'; } ?> draggable="false">
                    <i class="fa-solid fa-house menuIcon onlySmallMenu"></i>
                    Start
                </a>
                <div class="dropdown">
                    <a class="deactivate<?php if ($currentPage === 'Unsere Tiere' || $currentPage === 'Unsere Hunde' || $currentPage === 'Unsere Katzen' || $currentPage === 'Unsere Kleintiere' || $currentPage === 'Unsere Exoten') { echo ' disabled'; } ?>" draggable="false">
                        <i class="fa-solid fa-paw menuIcon onlySmallMenu"></i>
                        Unsere <br class="onlySmallMenu" />Tiere
                    </a>
                    <div class="submenu smallWidthSubmenu">
                        <a <?php if ($currentPage === 'Unsere Tiere') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'unsereTiere.php"'; } ?> draggable="false">Alle Tiere</a>
                        <a <?php if ($currentPage === 'Unsere Hunde') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'unsereHunde.php"'; } ?> draggable="false">Hunde</a>
                        <a <?php if ($currentPage === 'Unsere Katzen') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'unsereKatzen.php"'; } ?> draggable="false">Katzen</a>
                        <a <?php if ($currentPage === 'Unsere Kleintiere') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'unsereKleintiere.php"'; } ?> draggable="false">Kleintiere</a>
                        <a <?php if ($currentPage === 'Unsere Exoten') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'unsereExoten.php"'; } ?> draggable="false">Exoten</a>
                    </div>
                </div>
                <a <?php if ($currentPage === 'Aktuelles') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'aktuelles.php"'; } ?> draggable="false">
                    <i class="fa-solid fa-calendar menuIcon onlySmallMenu"></i>
                    Aktuelles
                </a>
                <div class="dropdown">
                    <a class="deactivate<?php if ($currentPage === 'Vermisste / Gefundene Tiere' || $currentPage === 'Vermisste Tiere' || $currentPage === 'Gefundene Tiere') { echo ' disabled'; } ?>" draggable="false">
                        <i class="fa-solid fa-magnifying-glass-location menuIcon onlySmallMenu"></i>
                        Vermisst/<br class="onlySmallMenu" />Gefunden
                    </a>
                    <div class="submenu bigWidthSubmenu">
                        <a <?php if ($currentPage === 'Vermisste / Gefundene Tiere') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'vermisstGefunden.php"'; } ?> draggable="false">Alle Tiere</a>
                        <a <?php if ($currentPage === 'Vermisste Tiere') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'vermisst.php"'; } ?> draggable="false">Vermisste Tiere</a>
                        <a <?php if ($currentPage === 'Gefundene Tiere') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'gefunden.php"'; } ?> draggable="false">Gefundene Tiere</a>
                    </div>
                </div>
                <a <?php if ($currentPage === 'Service / Infos') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'serviceInfos.php"'; } ?> draggable="false">
                    <i class="fa-solid fa-circle-info menuIcon onlySmallMenu"></i>
                    Service/<br class="onlySmallMenu" />Infos
                </a>
                <a <?php if ($currentPage === 'Login') { echo 'class="disabled"'; } else { echo 'href="'.$pageDir.'login.php"'; } ?> draggable="false">
                    <i class="fa-solid fa-user menuIcon onlySmallMenu"></i>
                    Login
                </a>
            </div>
        </nav>
    </header>
    <?php
}