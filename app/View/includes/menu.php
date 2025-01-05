<?php
function renderMenu ($currentPage): void {
    $baseDir = '../public/';
    ?>
    </head>
    <body>
        <header>
            <nav>
                <span class="linkLogo">
                    <a <?php if ($currentPage != 'index') { echo 'href="'.$baseDir.'"'; } ?> class="<?php if ($currentPage === 'index') { echo 'disabled'; } else { echo 'logo'; } ?>" draggable="false">
                        <img class="logoPicture" src="<?php echo $baseDir; ?>img/logo.jpg" alt="Logo" title="Logo <?php if ($currentPage != 'index') { echo ' - mit Linksklick geht\'s zur Startseite'; } ?>" draggable="false" />
                    </a>
                </span>

                <?php
                    session_start();

                    if(isset($_SESSION['user_logged_in'])&& $_SESSION['user_logged_in'] === true) {
                        echo '<span class ="user"><i class="fa-solid fa-user"></i>  ' . htmlspecialchars($_SESSION['username']) . ' </span>';
                    }
                ?>

                <div id="menuRight">
                    <a <?php if ($currentPage === 'index') { echo 'class="disabled"'; } else { echo 'href="'.$baseDir.'"'; } ?> draggable="false">
                        <i class="fa-solid fa-house menuIcon onlySmallMenu"></i>
                        Start
                    </a>
                    <div class="dropdown">
                        <a class="deactivate<?php if ($currentPage === 'Alle Tiere' || $currentPage === 'Hunde' || $currentPage === 'Katzen' || $currentPage === 'Kleintiere' || $currentPage === 'Exoten') { echo ' disabled'; } ?>" draggable="false">
                            <i class="fa-solid fa-paw menuIcon onlySmallMenu"></i>
                            Unsere <br class="onlySmallMenu" />Tiere
                        </a>
                        <div class="submenu smallWidthSubmenu">
                            <a <?php if ($currentPage === 'Alle Tiere') { echo 'class="disabled"'; } else { echo 'href="unsereTiere"'; } ?> draggable="false">Alle Tiere</a>
                            <a <?php if ($currentPage === 'Hunde') { echo 'class="disabled"'; } else { echo 'href="unsereHunde"'; } ?> draggable="false">Hunde</a>
                            <a <?php if ($currentPage === 'Katzen') { echo 'class="disabled"'; } else { echo 'href="unsereKatzen"'; } ?> draggable="false">Katzen</a>
                            <a <?php if ($currentPage === 'Kleintiere') { echo 'class="disabled"'; } else { echo 'href="unsereKleintiere"'; } ?> draggable="false">Kleintiere</a>
                            <a <?php if ($currentPage === 'Exoten') { echo 'class="disabled"'; } else { echo 'href="unsereExoten"'; } ?> draggable="false">Exoten</a>
                        </div>
                    </div>
                    <a <?php if ($currentPage === 'Aktuelles') { echo 'class="disabled"'; } else { echo 'href="aktuelles"'; } ?> draggable="false">
                        <i class="fa-solid fa-calendar menuIcon onlySmallMenu"></i>
                        Aktuelles
                    </a>
                    <div class="dropdown">
                        <a class="deactivate<?php if ($currentPage === 'Vermisste / Gefundene Tiere' || $currentPage === 'Vermisste Tiere' || $currentPage === 'Gefundene Tiere') { echo ' disabled'; } ?>" draggable="false">
                            <i class="fa-solid fa-magnifying-glass-location menuIcon onlySmallMenu"></i>
                            Vermisst/<br class="onlySmallMenu" />Gefunden
                        </a>
                        <div class="submenu bigWidthSubmenu">
                            <a <?php if ($currentPage === 'Vermisste / Gefundene Tiere') { echo 'class="disabled"'; } else { echo 'href="vermisstGefunden"'; } ?> draggable="false">Alle Tiere</a>
                            <a <?php if ($currentPage === 'Vermisste Tiere') { echo 'class="disabled"'; } else { echo 'href="vermisst"'; } ?> draggable="false">Vermisste Tiere</a>
                            <a <?php if ($currentPage === 'Gefundene Tiere') { echo 'class="disabled"'; } else { echo 'href="gefunden"'; } ?> draggable="false">Gefundene Tiere</a>
                        </div>
                    </div>
                    <a <?php if ($currentPage === 'Service / Infos') { echo 'class="disabled"'; } else { echo 'href="serviceInfos"'; } ?> draggable="false">
                        <i class="fa-solid fa-circle-info menuIcon onlySmallMenu"></i>
                        Service/<br class="onlySmallMenu" />Infos
                    </a>

                    <?php
                    if(isset($_SESSION['user_logged_in'])&& $_SESSION['user_logged_in'] === true) {
                        echo '<a href="logout"><i class="fa-solid fa-right-from-bracket menuIcon onlySmallMenu"></i> Logout</a>';
                    }
                    else {
                        if($currentPage === 'Login') {
                            echo '<a class="disabled" draggable="false"><i class="fa-solid fa-user menuIcon onlySmallMenu"></i>Login</a>';
                        }
                        else { echo '<a href="login"draggable="false"><i class="fa-solid fa-user menuIcon onlySmallMenu"></i>Login</a>'; }
                    }
                    ?>
                </div>
            </nav>
        </header>

    <?php
        if ($currentPage === 'index') { ?>
            <div class="gridIndex">
                <div id="startbilder">
                    <img src="../public/img/startbild-1.jpg" class="startbild" draggable="false" alt="Bild einer Ratte" title="Startbild der Seite Tierheimat" />
                    <img src="../public/img/startbild-5.jpg" class="startbild" draggable="false" alt="Bild eines Taggeckos" title="Startbild der Seite Tierheimat" />
                    <img src="../public/img/startbildHund.jpg" class="startbild" draggable="false" alt="Bild eines Hundes und einer Katze" title="Startbild der Seite Tierheimat" />
                </div>
       <?php }
        else { echo '<div class="grid">'; }
    ?>
        <main>
        <?php renderBreadcrumb($currentPage);
}