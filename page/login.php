<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/menu.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/formulare.css" />

    <link rel="stylesheet" href="../fontawesome-6.5.2/css/all.min.css">

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
$currentPage = 'Login';

include '../includes/menu.php';
renderMenu($currentPage);
?>
<div class="grid">
    <main>
        <?php
        include '../includes/breadcrumbNavigation.php';
        renderBreadcrumb($currentPage);
        ?>
            <div class="loginAndRegristration">
                <div class="tileBorder tile">
                    <h2>Login</h2>
                    <hr class="underHeadline" />
                    <form method="post">
                        <label class="h3" for="email">E-Mail: <span class="redPflichtfeld">*</span></label>
                        <input type="email" name="email" id="email" required placeholder="email@beispiel.com" />
                        <label class="h3" for="password">Passwort: <span class="redPflichtfeld">*</span></label>
                        <input type="password" name="password" id="password" required placeholder="Passwort" />
                        <a href="../loginPage/indexLogin.html" class="button marginButton" draggable="false">Anmelden</a>
                        <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
                    </form>
                </div>
                <div class="tileBorder tile">
                    <h2>Registrierung</h2>
                    <hr class="underHeadline" />
                    <form method="post">
                        <label class="h3" for="emailReg">E-Mail: <span class="redPflichtfeld">*</span></label>
                        <input type="email" name="email" id="emailReg" required placeholder="email@beispiel.com" />
                        <label class="h3" for="passwordReg">Passwort: <span class="redPflichtfeld">*</span></label>
                        <input type="password" name="password" id="passwordReg" required placeholder="Passwort" />
                        <label class="h3" for="username">Nutzername: <span class="redPflichtfeld">*</span></label>
                        <input type="text" name="username" id="username" required placeholder="maxMustermann" maxlength="10" minlength="3" />
                        <button class="button marginButton" type="submit" value="absenden" title="Button absenden" draggable="false">Registrieren</button>
                        <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
                    </form>
                </div>
            </div>
        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>