<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $currentPage = 'Service / Infos';

    include __DIR__ . '/../includes/mainStylesheets.php';
    ?>

    <link rel="stylesheet" href="../public/css/serviceInfosHelfenlogin.css" />
    <link rel="stylesheet" href="../public/css/serviceInfo.css">
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
                        <input type="radio" id="spazierenGehen" name="unterstützungsart" value="spazierenGehen" disabled="disabled" aria-describedby="unterstuetzungError" onclick="validateUnterstuetzung()" />
                        <label for="spazierenGehen" class="helfenUnterpunkt">Spazieren gehen</label>
                        <br />
                        <input type="radio" id="kleintiersitting" name="unterstützungsart" value="kleintiersitting" disabled="disabled" aria-describedby="unterstuetzungError" onclick="validateUnterstuetzung()" />
                        <label for="kleintiersitting" class="helfenUnterpunkt">Kleintiersitting</label>
                        <br />
                        <input type="radio" id="tiereFüttern" name="unterstützungsart" value="uiereFüttern" disabled="disabled" aria-describedby="unterstuetzungError" onclick="validateUnterstuetzung()" />
                        <label for="tiereFüttern" class="helfenUnterpunkt">Tiere füttern</label>
                        <br />
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

            <div class="tile">
                <h2>Helfen</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo zentrierterButton">
                    <div>
                        <img src="../public/img/spaziereGehen.jpg" class="schattenBild" alt="Bild eines Hundes der im Wald spazieren geht" title="Bild eines Hundes der im Wald spazieren geht" draggable="false"/>
                    </div>

                    <div>
                        <h3>spazieren gehen, füttern, spielen</h3>
                        <p class="textTrennung">
                            Sie möchten mit unseren Hunden spazieren gehen oder sich um unsere Katzen, Kaninchen oder andere Tiere kümmern?
                            Dann registieren Sie sich oder melden sich an und geben anschließend in unserem Formular an, wie Sie
                            helfen wollen und wann Sie zeitlich verfügbar sind.
                        </p>
                        <br />
                        <a href="login.php" class="button" title="ButtonZum Login" draggable="false"><i class="fa-solid fa-right-to-bracket"></i>   Zum Login</a>
                    </div>
                </div>
            </div>
            <div class="tile">
                <h2>Spenden</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo">
                    <div>
                        <img src="../public/img/helfenSpenden3.jpg" class="hohesBild  schattenBild" alt="Bild einer spielenden Katze" draggable="false"/>
                        <img src="../public/img/helfenspeden2.jpg" class="quadratischesBild  schattenBild" alt="Bild einer spielenden Katze" draggable="false"/>
                    </div>

                    <div>
                        <h3> Sie möchten uns unterstützen mit einer Spende?</h3>
                        <div class="textTrennung">
                            <p> Egal ob Sach- (Futter, Decken, Spielzeug für Hunde und Katzen, Kratzbäume, Kuschelhöhlen oder Körbchen)
                                oder Geldspenden, wir freuen uns über jedliche Art von Spenden.</p>
                            <p>Der Tierheimverein Tierheimat e.V. ist vom Finanzamt Musterstadt als gemeinnützig anerkannt.
                                Die Spenden sind somit steuerlich absetzbar.</p>
                            <p>Für Sachspenden kontaktieren Sie uns gerne per <a class="verweisText" href="mailto:spende@tierheimat.de" title="Link E-Mail" draggable="false">E-Mail</a>.</p>
                            <p >Geldspenden können Sie auf folgendes Konto überweisen:</p>
                            <br />
                            <p class="spendenkontoAngaben">Tierheimat e.V.</p>
                            <p class="spendenkontoAngaben">Tierheimbank Erfurt</p>
                            <p class="spendenkontoAngaben">IBAN: DE12 3456 7890 1234 1234 55</p>
                            <p class="spendenkontoAngaben">BIC: ABCDEFGH</p>
                        </div>          
                    </div>
                </div>
            </div>
                
            <div class="tile">
                <h2>Informationen zum Vermittlungsablauf</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo zentrierterButton">
                    <div>
                        <img src="../public/img/vermittlungsablauf.jpg" class="schattenBild" alt="Bild eines Hundes der im Wald spazieren geht" title="Bild eines Hundes der im Wald spazieren geht" draggable="false"/>
                    </div>

                    <div>
                        <h3>Sie möchten eins unserer Tiere adoptieren?</h3>
                        <p class="textTrennung">
                            Wir freuen uns über Ihr Interesse an der Adoption eines Tieres aus unserem Tierheim. 
                            Der Vermittlungsprozess beginnt mit einer ersten Kontaktaufnahme Ihrerseits per 
                            <a class="verweisText" href="tel:+49123456789" title="Link Telefonnummer" draggable="false">Telefon</a> oder 
                            <a class="verweisText" href="mailto:spende@tierheimat.de" title="Link E-Mail" draggable="false">E-Mail</a>, 
                            um Fragen zu klären und einen Besuchstermin zu vereinbaren. 
                            Bei Ihrem Besuch können Sie das Tier persönlich kennenlernen und 
                            wir führen ein Beratungsgespräch durch, 
                            um sicherzustellen, dass das Tier gut zu Ihnen passt.
                            Wenn Sie sich für die Adoption entscheiden, füllen Sie einen Vermittlungsantrag aus. 
                            In einigen Fällen führen wir eine Vorkontrolle durch, um sicherzustellen, 
                            dass das neue Zuhause geeignet ist. Nach erfolgreicher Prüfung der Unterlagen und 
                            der Vorkontrolle erfolgt die Adoption und wir erstellen einen Adoptionsvertrag. Auch nach der Vermittlung bleiben wir in Kontakt,
                            um sicherzustellen, dass sich das Tier gut eingewöhnt.
                            Vielen Dank für Ihr Interesse und Ihre Unterstützung. Gemeinsam können wir vielen Tieren ein liebevolles Zuhause bieten!
                        </p>
                    </div>
                </div>
            </div>

            <div class="tile">
                <h2>Tierpension</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo zentrierterButton">
                    <div>
                        <img src="../public/img/tierpension.jpg" class="schattenBild" alt="Bild eines Hundes der im Wald spazieren geht" title="Bild eines Hundes der im Wald spazieren geht" draggable="false"/>
                    </div>

                    <div>
                        <h3>Sie möchten Ihre Tiere während Ihrer Urlaubszeit in sicheren Händen wissen?</h3>
                        <p class="textTrennung">
                            Seit einiger Zeit bieten wir nun auch eine umfassende Betreuung in unserer Tierpension an.
                            Wir kümmern uns liebevoll und professionell um Ihre Tiere, 
                            während Sie sorgenfrei Ihre Auszeit genießen können.
                            Unsere Tierpension bietet eine komfortable Umgebung für Hunde, Katzen und Kleintiere. 
                            Jedes Tier erhält eine individuelle Betreuung. Wir bieten geräumige Unterkünfte, 
                            tägliche Spaziergänge und Spielzeiten, damit sich Ihr Haustier wohlfühlt.
                            Kontaktieren Sie uns per
                            <a class="verweisText" href="mailto:spende@tierheimat.de" title="Link E-Mail" draggable="false">E-Mail</a>
                            oder 
                            <a class="verweisText" href="tel:+49123456789" title="Link Telefonnummer" draggable="false">Telefon</a>,
                            um Fragen zu klären und um für Ihr Tier einen Platz zu reservieren. 
                            Beim Einchecken bringen Sie Ihr Haustier zu uns und wir führen ein kurzes Aufnahmegespräch.
                            Anschließend werden sich unsere Mitarbeiter liebevoll um das Wohlergehen Ihres Tieres kümmern.
                            Am vereinbarten Tag holen Sie Ihr Haustier wieder bei uns ab und erhalten einen kurzen Bericht über den Aufenthalt.
                            Sie können sich darauf verlassen, dass Ihr Haustier bei uns bestens versorgt wird.
                        </p>
                    </div>
                </div>
            </div>

            <div class="tile">
                <h2>Tiere an die Tierheimat abgeben</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo zentrierterButton">
                    <div>
                        <img src="../public/img/tierAbgeben.jpg" class="schattenBild" alt="Bild eines Hundes der im Wald spazieren geht" title="Bild eines Hundes der im Wald spazieren geht" draggable="false"/>
                    </div>

                    <div>
                        <p class="textTrennung">
                            Für Tiere ist es oft traurig und nicht verständlich warum ihre Besitzer sie abgeben. Deswegen sind wir interessiert daran, 
                            dass Tiere bei ihren Besitzern bleiben und wir beraten Sie gerne, wenn Sie Sorgen oder Bedenken 
                            haben Ihren Tieren nicht gerecht werden zu können. Sollte das Wohlergehen Ihres Tieres gefährdet sein oder sollte es keinen 
                            anderen Weg geben, kontakieren Sie uns bitte umgehend per
                            <a class="verweisText" href="mailto:spende@tierheimat.de" title="Link E-Mail" draggable="false">E-Mail</a>
                            oder 
                            <a class="verweisText" href="tel:+49123456789" title="Link Telefonnummer" draggable="false">Telefon</a>.
                            Anschließend werden wir die Kapazitäten unserer Tierheimat prüfen. Sollte kein Platz für das Tier 
                            in der Tierheimat frei sein, werden wir Sie an ein anderes Tierheim verweisen. Sollte ein Platz für Ihr Tier vorhanden sein 
                            werden wir ein Aufnahmegespräch führen und das Tier anchließend bei uns aufnehmen, 
                            für sein/ihr Wohlergehen sorgen und versuchen ihn/sie an eine neue liebende Familie zu vermitteln. 
                           
                        </p>
                    </div>
                </div>
            </div>  
            
            <div class="tile">
                <h2>Katzenkastrationspflicht</h2>
                <hr class="underHeadline" />
                <div class="box-containerserviceInfo zentrierterButton">
                    <div>
                        <img src="../public/img/kastrationspflicht.jpg" class="schattenBild" alt="Bild einer Katze beim Tierartzt" title="Bild einer Katze beim Tierartzt" draggable="false"/>
                    </div>

                    <div>
                        <h3>Seit 2017 gilt in Erfurt eine Katzenkastrationspflicht</h3>
                        <p class="textTrennung">
                            Seit 2017 gilt in Erfurt die neue Katzenschutzverordnung. 
                            Diese besagt, dass alle freilaufenden Katzen und Kater kastriert, 
                            gechippt und registriert sein müssen. Die Verordnung richtet sich an alle Katzenhalter, 
                            die eine oder mehrere Freigängerkatzen besitzen. Sie gilt auch für Personen, die freilebende Katzen füttern.
                            Freilebende Katzen sind oft entlaufene, ausgesetzte oder zurückgelassene Hauskatzen oder deren Nachkommen. 
                            Ohne menschliche Hilfe können sie häufig nicht überleben und erleben oft erhebliche Schmerzen oder Leiden. 
                            Zudem leiden sie häufig unter chronischen oder ansteckenden Krankheiten wie Katzenschnupfen, Parasitenbefall, 
                            Hautpilzen, schwer heilenden Verletzungen und Unterernährung.
                            Aufgrund des großen Leids dieser Katzen wurde in Erfurt die Katzenschutzverordnung erlassen, 
                            um präventiv dieses Leid zu verhindern.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </div>

    <?php include __DIR__ . '/../includes/generalJS.php'; ?>
    <script src="../public/js/serviceHelfenFormular.js"></script>
</body>
</html>