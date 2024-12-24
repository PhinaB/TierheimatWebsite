<?php
include __DIR__ . '/../includes/missingFoundForm.php'; // TODO: entweder Formular, wenn angemeldet oder Hinweis zum Formular
include __DIR__ . '/../includes/missingFoundReport.php';
?>

    <div class="druckenOhneSeitenumbruch">
        <form class="formTiereAuswaehlen druckenNichtDarstellen" action="#" method="post">
            <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
            <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                <option value="tierartWählen">Alle</option>
                <option value="vermisst">Vermisste Tiere</option>
                <option value="gefunden">Gefundene Tiere</option>
            </select>
            <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
        </form>
    </div>

<?php
include __DIR__ . '/../includes/missingAnimals.php';
echo '<br />';
include __DIR__ . '/../includes/foundAnimals.php';
?>