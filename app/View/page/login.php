<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Login';

    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>

    <link rel="stylesheet" href="../public/css/login.css" />
    <link rel="stylesheet" href="../public/css/formulare.css" />
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
            <div class="loginAndRegristration">
                <div class="tileBorder tile">
                    <h2>Login</h2>
                    <hr class="underHeadline" />
                    <form method="post" action="../../Controller/NutzerController.php">
                        <!--erster Input legt fest: Registrieren oder Login -->
                        <input type="hidden" name="type" value="login>"
                        <label class="h3" for="email">E-Mail: <span class="redPflichtfeld">*</span></label>
                        <input type="email" name="email" id="email" required placeholder="email@beispiel.com" />
                        <label class="h3" for="password">Passwort: <span class="redPflichtfeld">*</span></label>
                        <input type="password" name="password" id="password" required placeholder="Passwort" />
                        <a href="../loginPage/indexLogin.php" class="button marginButton" draggable="false">Anmelden</a>
                        <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
                    </form>
                </div>
                <div class="tileBorder tile">
                    <h2>Registrierung</h2>
                    <hr class="underHeadline" />
                    <form method="post" action="../../Controller/NutzerController.php">
                        <input type="hidden" name="type" value="register">
                        <label class="h3" for="emailReg">E-Mail: <span class="redPflichtfeld">*</span></label>
                        <input type="email" name="emailReg" id="emailReg" required placeholder="email@beispiel.com" />
                        <label class="h3" for="passwordReg">Passwort: <span class="redPflichtfeld">*</span></label>
                        <input type="password" name="passwordReg" id="passwordReg" required placeholder="Passwort" />
                        <label class="h3" for="usernameReg">Nutzername: <span class="redPflichtfeld">*</span></label>
                        <input type="text" name="usernameReg" id="username" required placeholder="maxMustermann" maxlength="10" minlength="3" />
                        <button class="button marginButton" type="submit" value="absenden" title="Button absenden" draggable="false">Registrieren</button>
                        <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
                    </form>
                </div>
            </div>
        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
</body>
</html>