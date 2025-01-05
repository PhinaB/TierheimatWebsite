<?php
/**
 * @var string $currentPage
 */
?>
<div id="formContainer">
    <!-- Je nach Login-Status wird hier entweder das Formular oder der Verweis zum Login angezeigt (siehe dynamicMissingFoundAnimals)-->
</div>
<div id="reportContainer" class="tile druckenNichtDarstellen"></div>
<p id="errorContainer" class="fehlermeldung"></p>



<input type="hidden" id="currentMissingOrFound" name="type" value="<?php echo $currentPage; ?>">
<div id="page" >
    <?php if ($currentPage === "Vermisste / Gefundene Tiere") { ?>
        <div class="druckenOhneSeitenumbruch">
            <form class="formTiereAuswaehlen druckenNichtDarstellen" action="#" method="post">
                <label for="tierstatusAuswählen"> Welche Tiere anzeigen: </label>
                <select name="tierstatusAuswählen" id="tierstatusAuswählen">
                    <option value="alle">Alle</option>
                    <option value="vermisst">Vermisste Tiere</option>
                    <option value="gefunden">Gefundene Tiere</option>
                </select>
                <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
            </form>
        </div>
    <?php } ?>
</div>

<?php if ($currentPage === "Vermisste Tiere" || $currentPage === "Vermisste / Gefundene Tiere" ) { ?>
<div id="missingAnimals" class="tile druckenOhneSeitenumbruch hidden">
    <h2 class ="heading"></h2>
    <hr class="underHeadline" />
    <div id="hiddenFirstMissingAnimal" class="hidden relativePosition box-containerVermisstGefundenMelden tileBorder">
        <div class="animalImageContainer">
            <img src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" class="firstAnimalImage" draggable="false" />
        </div>
        <div class="vermisstGefundenText">
            <h3></h3>
            <p class="firstAnimalId hidden"></p>
            <p class="firstAnimalDate"></p>
            <p class="firstAnimalPlace"></p>
            <p class="boldText">Beschreibung:</p>
            <p class="firstAnimalDescription"></p>
            <br />
            <p class="kursivText">
                Bitte kontaktieren Sie das Tierheim per Email, wenn Sie Hinweise haben oder das Tier gefunden haben:
            </p>
            <br />
            <a href="mailto:tiere@tierheimat.de" class="button" title="Button E-Mail" draggable="false"><i class="fa-solid fa-envelope"></i>  E-Mail schreiben</a>
        </div>

    </div>
    <div id ="copyAllMissingAnimalsHere"></div>

    <div id="hiddenTemplateMissingAnimals" class="hidden relativePosition ">
        <img class="animalImage" src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" draggable="false" />
        <h3></h3>

        <p class="absatzfrei animalSubheading"></p>
        <p class="absatzfrei animalDate"></p>
        <p class="absatzfrei animalPlace"></p>
        <p class="absatzfrei animalDescriptionBeginning"></p>

        <a class="button weiterlesen" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
    </div>

</div>
<?php } ?>

<?php if ($currentPage === "Gefundene Tiere" || $currentPage === "Vermisste / Gefundene Tiere" ) { ?>
    <div id="foundAnimals" class="tile druckenOhneSeitenumbruch hidden">
        <h2 class="heading"></h2>
        <hr class="underHeadline" />
        <div id="hiddenFirstFoundAnimal" class="hidden relativePosition box-containerVermisstGefundenMelden tileBorder">
            <div class="animalImageContainer">
                <img src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" class="firstAnimalImage" draggable="false" />
            </div>
            <div class="vermisstGefundenText">
                <h3></h3>
                <p class="firstAnimalId hidden"></p>
                <p class="firstAnimalDate"></p>
                <p class="firstAnimalPlace"></p>
                <p class="boldText">Beschreibung:</p>
                <p class="firstAnimalDescription"></p>
                <br />
                <p class="kursivText">
                    Bitte kontaktieren Sie das Tierheim per Email, wenn Sie Hinweise haben oder das Tier gefunden haben:
                </p>
                <br />
                <a href="mailto:tiere@tierheimat.de" class="button" title="Button E-Mail" draggable="false"><i class="fa-solid fa-envelope"></i>  E-Mail schreiben</a>
            </div>

        </div>
        <div id ="copyAllFoundAnimalsHere"></div>

        <div id="hiddenTemplateFoundAnimals" class="hidden relativePosition ">
            <img class="animalImage" src="" alt="Bild eines vermissten Tieres" title="Bild eines vermissten Tieres" draggable="false" />
            <h3></h3>

            <p class="absatzfrei animalSubheading"></p>
            <p class="absatzfrei animalDate"></p>
            <p class="absatzfrei animalPlace"></p>
            <p class="absatzfrei animalDescriptionBeginning"></p>

            <a class="button weiterlesen" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
        </div>

    </div>


    <!--<h2>Gefundene Tiere</h2>
    <hr class="underHeadline" />
    <div id="foundAnimals" class="tile druckenMitSeitenumbruch">


        <div class="box-containerVermisstGefundenMelden tileBorder">
            <div>
                <img src="" alt="Bild eines gefundenen Tieres" title="Bild eines gefundenen Tieres" draggable="false"/>
            </div>

            <div class="vermisstGefundenText">
                <p><span class="boldText">Funddatum:</span> 19.06.2024 </p>
                <p><span class="boldText">Fundort:</span> Erfurt </p>
                <p class="boldText">Beschreibung:</p>
                <p>
                    Ich habe die Katze am Mittwoch Abend in Erfurt an der Altonaer Straße gefunden.
                    Sie wirkte verschreckt, abgemagert und hatte Flöhe. Ich habe sie mit nach Hause genommen
                    und sie wieder aufgepäppelt. Jetzt geht es ihr wieder besser.
                </p>
                <br />
                <p class="kursivText">
                    Bitte kontaktieren Sie das Tierheim per Email, wenn Sie annehmen das Tier zu kennen:
                </p>
                <br />
                <a href="mailto:tiere@tierheimat.de" class="button" title="E-Mail schreiben" draggable="false"><i class="fa-solid fa-envelope"></i>   E-Mail schreiben</a>

            </div>
        </div>

        <div class="box-containerUnsereTiere marginTopFirstElement">
            <div class="completeAnimal">
                <img src="../public/img/max.jpg" alt="Bild eines Hundes" title="Bild Hund" draggable="false" />
                <p class="absatzfrei"><span class="boldText">Funddatum:</span> 23.05.2024</p>
                <p class="absatzfrei"><span class="boldText">Fundort:</span> Erfurt</p>
                <p class="absatzfrei"><span class="boldText">Kontakt: </span>0123 4567892</p>
                <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Hund...</p>

                <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
            </div>

            <div class="completeAnimal">
                <img src="../public/img/flo.jpg" alt="Bild einer Katze" title="Bild Katze" draggable="false" />
                <p class="absatzfrei"><span class="boldText">Funddatum: </span>27.09.2023</p>
                <p class="absatzfrei"><span class="boldText">Fundort:</span> Weimar</p>
                <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Die Katze...</p>

                <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
            </div>

            <div class="completeAnimal">
                <img src="../public/img/nick.jpeg" alt="Bild eines Hundes" title="Bild Hund" draggable="false" />
                <p class="absatzfrei"><span class="boldText">Funddatum:</span> 25.02.2024</p>
                <p class="absatzfrei"><span class="boldText">Fundort:</span> Arnstadt</p>
                <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Hund...</p>

                <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
            </div>

            <div class="completeAnimal">
                <img src="../public/img/stan.jpg" alt="Bild einer Katze" title="Bild Katze" draggable="false" />
                <p class="absatzfrei"><span class="boldText">Funddatum: </span>24.06.2024</p>
                <p class="absatzfrei"><span class="boldText">Fundort:</span> Hohenfelden</p>
                <p class="absatzfrei"><span class="boldText">Kontakt:</span> 0123 4567892</p>
                <p class="absatzfrei"><span class="boldText">Beschreibung:</span> Der Kater...</p>

                <a href="" class="button" title="Button weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
            </div>
        </div>
    </div> -->
<?php } ?>