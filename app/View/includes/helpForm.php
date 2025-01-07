<div class="tileBorder tile" role="form" aria-labelledby="formTitle">
    <div class="kopfelementFormular">
        <h2 id="formTitle">Helfen</h2>
        <hr class="underHeadline" />
        <p>
            Sie wollen uns Ihre Untersützung anbieten? Füllen Sie zunächst das folgende Formular aus.
            Sobald wir Ihre Informationen verarbeitet haben, werden wir uns bei Ihnen melden.
        </p>
    </div>

    <div id="formular" class="flex-containerFormularHelfen">
        <div class="unterstützungsart">
            <label class="h3">Art der Hilfe: <span class="redPflichtfeld">*</span></label>
            <div id="artDerHilfeInputs">
            </div>
            <p id="unterstuetzungError" class="fehlermeldung fehlerUnterstuetzung"></p>
        </div>

        <div class="tabelle1">
            <label class="h3">Ich kann an folgenden Terminen:</label>
            <table>
                <tbody id="newDayCopyHere">
                </tbody>
            </table>

            <template class="hidden" id="hiddenDay">
                <tr>
                    <th class="linkeSpalte">Datum</th>
                    <th class="rechteSpalte">Zeit</th>
                </tr>
                <tr>
                    <td class="linkeSpalte"><label>
                            <input type="date" name="Datum" disabled="disabled" oninput="validateDateOrTime(this)" aria-describedby="dayError" />
                        </label></td>
                    <td class="rechteSpalte"><label>
                            <input type="time" name="Zeit" disabled="disabled" oninput="validateDateOrTime(this)" aria-describedby="dayError" />
                        </label></td>
                </tr>
            </template>

            <p id="dayError" class="fehlermeldung fehlerTag"></p>

            <button id="newDay" type="button" class="disabledButton center" title="Button weiteren Termin hinzufügen" disabled="disabled"><i class="fa-solid fa-plus"></i> Weiteren Termin hinzufügen</button>
        </div>

        <div class="tabelle2">
            <label class="h3">Ich habe wöchentlich Zeit:</label>
            <table>
                <tbody id="newWeekDayCopyHere">
                </tbody>
            </table>

            <template class="hidden" id="hiddenWeekday">
                <tr>
                    <th class="linkeSpalte">Wochentag</th>
                    <th class="rechteSpalte">Zeit</th>
                </tr>
                <tr>
                    <td class="linkeSpalte">
                        <label>
                            <select name="wochentag" disabled="disabled" aria-describedby="weekdayError" onchange="validateWeekday(this)">
                                <option value="0">Bitte wählen</option>
                                <option value="montag">Montag</option>
                                <option value="dienstag">Dienstag</option>
                                <option value="mittwoch">Mittwoch</option>
                                <option value="donnerstag">Donnerstag</option>
                                <option value="freitag">Freitag</option>
                                <option value="samstag">Samstag</option>
                                <option value="sonntag">Sonntag</option>
                            </select>
                        </label>
                    </td>
                    <td class="rechteSpalte">
                        <label>
                            <input type="time" name="zeit" disabled="disabled" aria-describedby="weekdayError" oninput="validateWeekdayTime(this)" />
                        </label>
                    </td>
                </tr>
            </template>

            <p id="weekdayError" class="fehlermeldung fehlerWochentag"></p>

            <button id="newWeekDay" class="disabledButton" title="Button weiteren Wochentag hinzufügen" type="button" disabled="disabled"><i class="fa-solid fa-plus"></i> Weiteren Wochentag hinzufügen</button>
        </div>
        <div class="fusselementFormular">
            <p class="fehlermeldung fehlerKomplett"></p>
            <button class="disabledButton" type="submit" value="absenden" title="Formular absenden" disabled="disabled"> <i class="fa-regular fa-paper-plane"></i>  Absenden</button>
            <button class="disabledButton" type="reset" value="zurücksetzen" title="zurücksetzen noch nicht möglich" disabled="disabled"> <i class="fa-solid fa-arrow-rotate-left"></i>  Zurücksetzen</button>
        </div>

        <div>
            <p class="erfolgsnachricht"></p>
        </div>
    </div>
    <p class="redPflichtfeld borderTopPflichtfeld">* Pflichtfelder</p>
</div>
