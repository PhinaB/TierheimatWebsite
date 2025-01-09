<?php
/**
 * @var string $currentPage
 */
?>

<div id="loading">
    <p>Es wird geladen...</p>
    <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
</div>

<div id="formContainer">
    <!-- Je nach Login-Status wird hier entweder das Formular oder der Verweis zum Login angezeigt (siehe dynamicMissingFoundAnimals)-->
</div>
<div id="reportContainer" class="tile druckenNichtDarstellen"></div>
<p id="errorContainer" class="fehlermeldung"></p>

<input type="hidden" id="currentMissingOrFound" name="type" value="<?php echo $currentPage; ?>">

<div id="page" >
    <?php if ($currentPage === "Vermisste / Gefundene Tiere") { ?>
        <div class="druckenOhneSeitenumbruch">
            <form id="selectAnimalStatus" class="selectAnimal formTiereAuswaehlen druckenNichtDarstellen" method="post">
                <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
                <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                    <option value="Vermisste / Gefundene Tiere">Alle</option>
                    <option value="Vermisste Tiere">Vermisste Tiere</option>
                    <option value="Gefundene Tiere">Gefundene Tiere</option>
                </select>
                <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
            </form>
        </div>
    <?php } ?>
</div>

<?php if ($currentPage === "Vermisste Tiere" || $currentPage === "Vermisste / Gefundene Tiere" ) { ?>
<div id="missingAnimals" class="tile druckenOhneSeitenumbruch hidden">
    <h2 id="headingMissingAnimals" class ="heading"></h2>
    <hr id="missingUnderHeadline" class="underHeadline" />

    <p id="errorMissingAnimals" class="fehlermeldung"></p>
    <div id="copyFirstMissingAnimalHere"></div>

    <div id="hiddenFirstMissingAnimalTemplate" class="hidden relativePosition box-containerVermisstGefundenMelden tileBorder">
        <div class="animalImageContainer">
            <img src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" class="firstAnimalImage" draggable="false" />
        </div>
        <div class="vermisstGefundenText">

            <h3 class="headlineWithButtons"> </h3>
            <p class="firstAnimalId hidden"></p>
            <p class="firstAnimalDate animalDate"></p>
            <p class="firstAnimalPlace animalPlace"></p>
            <p class="boldText">Beschreibung:</p>
            <p class="firstAnimalDescription"></p>
            <br />
            <p class="kursivText">
                Bitte kontaktieren Sie das Tierheim per Email, wenn Sie Hinweise haben oder das Tier gefunden haben:
            </p>
            <br />
            <a href="mailto:tiere@tierheimat.de" class="button" title="Button E-Mail" draggable="false"><i class="fa-solid fa-envelope"></i>  E-Mail schreiben</a>

            <input type="hidden" id="hiddenSpecies">
            <input type="hidden" id="hiddenContact">
        </div>

    </div>
    <div id ="copyAllMissingAnimalsHere"></div>

    <div id="hiddenTemplateMissingAnimals" class="hidden relativePosition ">
        <img class="animalImage" src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" draggable="false" />
        <h3 class="headlineWithButtons"></h3>
        <p class="absatzfrei animalSubheading"></p>
        <p class="absatzfrei animalDate"></p>
        <p class="absatzfrei animalPlace"></p>
        <p class="absatzfrei animalDescriptionBeginning"></p>

        <input type="hidden" id="hiddenContact">

        <a class="button weiterlesen" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
    </div>
</div>
<?php } ?>

<?php if ($currentPage === "Gefundene Tiere" || $currentPage === "Vermisste / Gefundene Tiere" ) { ?>
<div id="foundAnimals" class="tile druckenOhneSeitenumbruch hidden">
    <h2 id="headingFoundAnimals" class="heading"></h2>
    <hr id="foundUnderHeadline" class="underHeadline" />

    <p id="errorFoundAnimals" class="fehlermeldung"></p>

    <div id="copyFirstFoundAnimalHere"></div>

    <div id="hiddenFirstFoundAnimalTemplate" class="hidden relativePosition box-containerVermisstGefundenMelden tileBorder">
        <div class="animalImageContainer">
            <img src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" class="firstAnimalImage" draggable="false" />
        </div>
        <div class="vermisstGefundenText">
            <h3 class="headlineWithButtons"></h3>
            <p class="firstAnimalId hidden"></p>
            <p class="firstAnimalDate animalDate"></p>
            <p class="firstAnimalPlace animalPlace"></p>
            <p class="boldText">Beschreibung:</p>
            <p class="firstAnimalDescription"></p>
            <br />
            <p class="kursivText">
                Bitte kontaktieren Sie das Tierheim per Email, wenn Sie Hinweise haben oder das Tier gefunden haben:
            </p>
            <br />
            <a href="mailto:tiere@tierheimat.de" class="button" title="Button E-Mail" draggable="false"><i class="fa-solid fa-envelope"></i>  E-Mail schreiben</a>

            <input type="hidden" id="hiddenSpecies">
            <input type="hidden" id="hiddenContact">
        </div>
    </div>

    <div id ="copyAllFoundAnimalsHere"></div>

    <div id="hiddenTemplateFoundAnimals" class="hidden relativePosition "> <!-- TODO: nur ein template für beide Arten! -->
        <img class="animalImage" src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" draggable="false" />
        <h3 class="headlineWithButtons"></h3>
        <p class="absatzfrei animalSubheading"></p>
        <p class="absatzfrei animalDate"></p>
        <p class="absatzfrei animalPlace"></p>
        <p class="absatzfrei animalDescriptionBeginning"></p>

        <input type="hidden" id="hiddenContact">

        <a class="button weiterlesen" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
    </div>
</div>
<?php } ?>

<div class="hidden completeWeiterlesen" id="hiddenTemplateWeiterlesen">
    <div class="box-absolute zIndex">
        <div class="kopfelement">
            <h3 class="inline"></h3>
            <a title="Button Abbrechen" draggable="false">
                <i class="fa-solid fa-circle-xmark"></i>
            </a>
            <br />
        </div>
        <div class="flexWeiterlesen">
            <div class="unterelement bildWeiter">
                <img src="" class="hohesBild" alt="" draggable="false" />
            </div>
            <div class="unterelement scrollbar">
                <p class="date"></p>
                <p class="place"></p>
                <p class="species"></p>
                <br />
                <p class="textTrennung description"></p>

                <div class="unterelementScrollbar"></div>
            </div>
        </div>
    </div>
</div>