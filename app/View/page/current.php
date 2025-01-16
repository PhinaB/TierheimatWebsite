<div id="loading">
    <p>Die Artikel werden geladen...</p>
    <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
</div>

<p class="fehlermeldung fehlerLoading"></p>

<div class="tile hidden" id="firstArticleHere">
    <h2></h2>
    <hr class="underHeadline" />
    <div class="flexWir tileBorder">
        <img src="" alt="" draggable="false" />
        <div class="text">
            <span class="textSeenEverytime"></span><span class="hiddenOnBigScreenInline">...</span>

            <span class="hiddenOnSmallScreen"></span>
            <div class="hiddenOnBigScreen">
                <br />
                <a draggable="false" class="button">
                    <i class="fa-solid fa-newspaper"></i> Weiterlesen
                </a>
            </div>
        </div>
    </div>
</div>

<div class="tile">
    <h2>Weitere Artikel</h2>
    <hr class="underHeadline" />

    <div class="box-container" id="copyArticlesHere">
    </div>

    <div class="hidden" id="hiddenArticle">
        <img src="" alt="" draggable="false" />
        <h3></h3>
        <p class="text"></p>
        <a class="button" draggable="false"><i class="fa-solid fa-newspaper"></i> Zum kompletten Artikel</a>
    </div>

    <div class="hidden completeWeiterlesen box-absolute zIndex" id="hiddenTemplateReadMore">
        <div>
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
                    <p class="textTrennung beschreibung"></p>

                    <div class="unterelementScrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</div>