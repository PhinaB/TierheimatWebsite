<!DOCTYPE html>
<html lang="de">
<head>
    <?php include '../includes/mainStylesheets.php'; ?>

    <link rel="stylesheet" href="../../../public/css/unsereTiere.css" />
    <link rel="stylesheet" href="../../../public/css/bildwechselBilder.css" />
</head>
<body>
<?php
$currentPage = 'Unsere Katzen';

include '../includes/menu.php';
renderMenu($currentPage);
?>
<div class="grid">
    <main>
        <?php
        include '../includes/breadcrumbNavigation.php';
        renderBreadcrumb($currentPage);
        ?>

            <div class="tile">
                <h2>Unsere Katzen</h2>
                <hr class="underHeadline" />
               
                <div class="box-containerUnsereTiere tile">
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselLilly bildwechsel" title="Bild eines Hundes" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Lilly</h3>
                        <p>3 Jahre alt, Hündin...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselTigerpython bildwechsel" title="Bild einer Tigerpython" draggable="false">&nbsp;</a>
                        </div>                        
                        <h3>Tiger</h3>
                        <p>3 Jahre alt, Python...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselGreta bildwechsel" title="Bild einer Ratte" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Greta</h3>
                        <p>1 Jahr alt, weiblich...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselLora bildwechsel" title="Bild eines Sittichs" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Lora</h3>
                        <p>5 Jahre alt, Sittich...</p>
                        <a href="" class="button"  title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>
                </div>
                <div class="box-containerUnsereTiere tile">
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselSimba bildwechsel" title="Bild eines Katers" draggable="false">&nbsp;</a>
                        </div>                        
                        <h3>Simba</h3>
                        <p>3 Jahre alt, Kater...</p>
                        <a href="" class="button"  title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselBella bildwechsel" title="Bild eines Hundes" draggable="false">&nbsp;</a>
                        </div>                         
                        <h3>Bella</h3>
                        <p>5 Jahre alt, Hündin...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div id="rocky">
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselRocky bildwechsel" title="Bild eines Hundes" draggable="false">&nbsp;</a>
                        </div>                         
                        <h3>Rocky</h3>
                        <p>2 Jahre alt, Rüde...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselFluffy bildwechsel" title="Bild eines Kaninchens" draggable="false">&nbsp;</a>
                        </div>                         
                        <h3>Fluffy</h3>
                        <p>1 Jahr alt, Kaninchen...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>
                </div>
                <div class="box-containerUnsereTiere tile">
                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselWellensittiche bildwechsel" title="Bild von Wellensittichen" draggable="false">&nbsp;</a>
                        </div>
                        <h3>Wellensittiche</h3>
                        <p>1 Jahre alt,Wellens...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselKornnatter bildwechsel" title="Bild einer Kornnatter" draggable="false">&nbsp;</a>
                        </div>                        
                        <h3>Natti</h3>
                        <p>2 Jahre alt, Kornnatter...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper"></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselRosa bildwechsel" title="Bild einer Prachtrosella" draggable="false">&nbsp;</a>
                        </div>                           
                        <h3>Rosa</h3>
                        <p>2 Jahre alt, Prachtros...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper" ></i>  Weiterlesen</a>
                    </div>

                    <div>
                        <div class="aussenboxBildwechselKlein">
                            <a class="bildwechselHoppel bildwechsel" title="Bild eines Kaninchens" draggable="false">&nbsp;</a>
                        </div>                        
                        <h3>Hoppel</h3>
                        <p>1 Jahr alt, Kaninchen...</p>
                        <a href="" class="button" title="Button Weiterlesen" draggable="false"><i class="fa-solid fa-newspaper" ></i>  Weiterlesen</a>
                    </div>
                </div>
                <a href="" class="button" title="Button weitere Tiere anzeigen" draggable="false"><i class="fa-solid fa-plus"></i> Weitere Tiere anzeigen</a>
            </div>
        </main>
        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="../../../fontawesome-6.5.2/js/all.js" crossorigin="anonymous"></script>
</body>
</html>