<div class="tileBorder tile druckenNichtDarstellen">
    <div class="kopfelementFormular">
        <h2>Vermisst / Gefunden melden</h2>
        <hr class="underHeadline" />
        <p class="spaltenText">
            Sie haben ein Tier gefunden oder wollen Ihr Tier als vermisst melden?
            Füllen Sie zunächst das folgende Formular aus.
            Wir werden Ihre Meldung sichtbar auf unserer Website ausschreiben.
            Sobald wir jegliche Informationen erhalten haben, werden wir uns bei Ihnen melden
            und unser bestmögliches tun, um Ihnen bei der Suche nach dem Besitzer bzw. dem Tier
            behilflich zu sein.
        </p>
    </div>

    <form action="#" method="post" class="flex-containerVermisstGefundenmelden">
        <div class="flex-item1">
            <div class="flex-itemAnliegen">
                <label for="anliegenVermisstGefunden" class="h3">Anliegen: <span class="redPflichtfeld">*</span></label>

                <select name="anliegenVermisstGefunden" class="eingabe" id="anliegenVermisstGefunden" required>
                    <option value="" disabled selected hidden>Bitte wählen...</option>
                    <option value="vermisstMelden">Vermisst melden</option>
                    <option value="gefundenMelden">Gefunden melden</option>
                </select>
            </div>

            <div class="flex-itemTierart">
                <label for="tierart" class="h3">Um welche Tierart handelt es sich? <span class="redPflichtfeld">*</span></label>

                <select name="tierart" id="tierart" class="eingabe" required>
                    <option value="" disabled selected hidden>Bitte wählen...</option>
                    <option value="Katze">Katze</option>
                    <option value="Hund">Hund</option>
                    <option value="Vogel">Vogel</option>
                    <option value="Sonstiges">Sonstiges</option>
                </select>

            </div>

            <div class="flex-itemDatum">
                <label for="datum" class="h3">Datum des Verschwindens / Datum des Fundes: <span class="redPflichtfeld">*</span></label>

                <input type="date" name="datum" id="datum" class="eingabe feldBreite" required />
            </div>

            <div class="flex-itemOrt">
                <label for="ort" class="h3">Ort des Verschwindens / Fundort: <span class="redPflichtfeld">*</span></label>

                <input type="text" name="ort" id="ort" class="eingabe feldBreite" placeholder="Ort" minlength="1" maxlength="20" required />
                <p class="fehlerOrt fehlermeldung"></p>
            </div>
        </div>

        <div class="flex-item2">
            <div class="flex-itemTierbeschreibung">
                <label for="tierbeschreibung" class="h3">Beschreibung des Tieres: <span class="redPflichtfeld">*</span></label>

                <textarea name="tierbeschreibung" id="tierbeschreibung" class="eingabe" rows="4" cols="20" minlength="1" maxlength="500" placeholder="Beschreibung des Tieres..." required></textarea>
                <p class="fehlerBeschreibung fehlermeldung"></p>
            </div>

            <div class="flex-itemTierbild">
                <label for="tierbild-upload" class="h3 tierbild">Bild vom Tier (nur .jpg .jpeg .png):</label>
                <label for="tierbild-upload" class="tierbild-upload button">
                    <span><i class="fa-solid fa-upload"></i>  Datei laden</span>
                </label>
                <input type="file" accept="image/*" name="tierbild" id="tierbild-upload" class="eingabe feldBreite" />
            </div>

            <div class="flex-itemKontaktaufnahme">
                <div class="h3">Art der Kontaktaufnahme: <span class="redPflichtfeld">*</span></div>
                <div class="eingabe">
                    <input id="radio_email" type="radio" name="kontaktaufnahme" value="email" class="eingabe" required />
                    <label for="radio_email">E-Mail</label>
                    <br />
                    <input id="radio_telefon" type="radio" name="kontaktaufnahme" value="telefon" class="eingabe" required />
                    <label for="radio_telefon">Telefon</label>
                </div>
            </div>
        </div>

        <div class="fusselementFormular">
            <button class="button" type="submit" value="absenden" title="Button absenden" draggable="false"><i class="fa-regular fa-paper-plane"></i>  Absenden</button>
            <button class="button" type="reset" value="zurücksetzen" title="Button zurücksetzen" draggable="false"> <i class="fa-solid fa-arrow-rotate-left"></i>  Zurücksetzen</button>
        </div>
    </form>
    <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
</div>