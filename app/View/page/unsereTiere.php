<?php
/**
 * @var string $currentPage
 */
?>

<div class="tile">
    <input type="hidden" id="currentTierart" value="<?php echo $currentPage; ?>">
    <h2>Unsere
        <?php if ($currentPage === "Alle Tiere") { echo 'Tiere'; }
        else { echo $currentPage; } ?>
    </h2>
    <hr class="underHeadline" />

    <div id="loading">
        <p>Die Tiere werden geladen...</p>
        <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
    </div>

    <p class="fehlermeldung fehlerLoading"></p>

    <div id="page" class="hidden">
        <?php if ($currentPage === "Alle Tiere") { ?>
                <div class="tile">
                    <form class="formUnsereTiere" action="#" method="post">
                        <div>
                            <label for="tierartAuswählen"> Tierart: </label>
                            <select name="tierartAuswählen" id="tierartAuswählen" onchange="changeRasseSelect()">
                            </select>
                        </div><div>
                            <label for="rasseAuswählen"> Rasse: </label>
                            <select name="rasseAuswählen" id="rasseAuswählen" disabled style="cursor: default;">
                                <option value="rasseWählen">Bitte auswählen</option>
                            </select>
                        </div><div>
                            <label for="geschlechtAuswählen"> Geschlecht: </label>
                            <select name="geschlechtAuswählen" id="geschlechtAuswählen">
                            </select>
                        </div><div>
                            <button class="button" type="submit" title="Button Suchen" draggable="false"><i class="fa fa-search"></i> Suchen</button>
                        </div>
                    </form>
                    <p class="fehlermeldung fehlerFiler"></p>
                </div>
        <?php } ?>

        <div id="copyAlleTiereHere"></div>

        <div id="hiddenVorlageTier" class="hidden">
            <div class="aussenboxBildwechselKlein">
                <a class="bildwechsel" title="" draggable="false">&nbsp;</a>
            </div>
            <h3></h3>
            <p class="beschreibungBeginn"></p>
            <a class="button weiterlesen" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
        </div>

        <div class="hidden completeWeiterlesen" id="hiddenVorlageWeiterlesen">
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
                        <p class="name"></p>
                        <p class="alter"></p>
                        <p class="beiUnsSeit"></p>
                        <p class="charakter"></p>
                        <br />
                        <p class="textTrennung beschreibung"></p>

                        <div class="unterelementScrollbar"></div>
                    </div>
                </div>
            </div>
        </div>

        <a class="button hidden" id="weitereTiereAnzeigen" title="Button weitere Tiere anzeigen" draggable="false">
            <i class="fa-solid fa-plus"></i> Weitere Tiere anzeigen
        </a>
        <input type="hidden" value="0" name="offset">
    </div>
</div>