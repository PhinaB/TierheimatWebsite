<footer>
    <div>
        <h4>KONTAKT</h4>
        <p>
            Adresse: Musterstraße 2<br />
            12345 Musterhausen<br />
            E-Mail: <a href="mailto:muster@tierheimat.de" draggable="false">muster@tierheimat.de</a><br />
            Telefon: <a href="tel:01234567892" draggable="false">0123 4567892</a>
        </p>
    </div>
    <div class="secondFooterChild">
        <h4>ÖFFNUNGSZEITEN</h4>
        <p>
            Mo - Fr: 10 - 18 Uhr<br />
            Sa: 8 - 18 Uhr
        </p>
    </div>
    <div>
        <h4>UNSER SPENDENKONTO</h4>
        <p>
            Tierheimat GmbH<br />
            Tierheimbank Erfurt<br />
            IBAN: DE12 3456 7890 1234 1234 55<br />
            BIC: ABCDEFGH
        </p>
    </div>
</footer>
<div class="underFooter"><a
        <?php
        if (!str_contains($_SERVER['PHP_SELF'], 'impressum')) {
            echo 'href="impressum"';
        }
        else { // wenn man sich beim Impressum befindet
            echo 'class="disabled" title="Sie befinden sich bereits beim Impressum"';
        }
        ?>
        draggable="false">Impressum</a> | &copy; <?php echo date("Y"); ?> Tierheimat e.V.</div>
