<div class="loginAndRegristration">
    <div class="tileBorder tile">
        <h2>Login</h2>
        <hr class="underHeadline" />
        <form method="post" id="loginForm">
            <!--erster Input legt fest: Registrieren oder Login -->
            <input type="hidden" name="type" value="login">
            <label class="h3" for="email">E-Mail: <span class="redPflichtfeld">*</span></label>
            <input type="email" name="email" id="email" required placeholder="email@beispiel.com" />
            <p id= "emailError" class="fehlermeldung fehlerTag"></p>

            <label class="h3" for="password">Passwort: <span class="redPflichtfeld">*</span></label>
            <input type="password" name="password" id="password" required placeholder="Passwort" minlength="6" maxlength="30"/>
            <p id= "passwordError" class="fehlermeldung fehlerTag"></p>

            <p id= "loginError" class="fehlermeldung fehlerTag"></p>
            <button class="button marginButton" type="submit" value="absenden" title="Button absenden" draggable="false">Anmelden</button>
            <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>

        </form>
    </div>
    <div class="tileBorder tile">
        <h2>Registrierung</h2>
        <hr class="underHeadline" />
        <form method="post" id="registerForm">
            <input type="hidden" name="type" value="register">
            <label class="h3" for="emailReg">E-Mail: <span class="redPflichtfeld">*</span></label>
            <input type="email" name="emailReg" id="emailReg" required placeholder="email@beispiel.com" />
            <p id= "emailRegError" class="fehlermeldungReg fehlerTag"></p>

            <label class="h3" for="passwordReg">Passwort: <span class="redPflichtfeld">*</span></label>
            <input type="password" name="passwordReg" id="passwordReg" required placeholder="Passwort" minlength="6" maxlength="30"/>
            <p id= "passwordRegError" class="fehlermeldungReg fehlerTag"></p>

            <label class="h3" for="usernameReg">Nutzername: <span class="redPflichtfeld">*</span></label>
            <input type="text" name="usernameReg" id="username" required placeholder="maxMustermann" maxlength="10" minlength="3" />
            <p id= "usernameRegError" class="fehlermeldungReg fehlerTag"></p>

            <p id= "errorRegistration" class="fehlermeldungReg fehlerTag"></p>
            <p id= "successfulRegistration" class="greenColor"></p>
            <button class="button marginButton" type="submit" value="absenden" title="Button absenden" draggable="false">Registrieren</button>
            <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
        </form>
    </div>
</div>
