<?php
/**
 * @var array $article
 */
?>
<div id="loading">
    <p>Der Artikel wird geladen...</p>
    <img class="spinnerGifHeight" alt="loading..." src="../public/img/spinner.gif">
</div>

<div id="page" class="hidden">
    <div class="tile">
        <h2 class="marginTopH2"><?php echo htmlspecialchars($article['title']); ?></h2>
        <hr class="underHeadline" />
        <div class="flexWir">
            <div class="aussenboxBildwechsel">
                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="Bild zum Artikel" draggable="false" />
            </div>
            <div>
                <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            </div>
        </div>
    </div>
</div>
