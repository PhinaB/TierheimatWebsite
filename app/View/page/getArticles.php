<?php
// Simulierte Artikeldaten (ersetzbar durch Datenbankabfrage)
$articles = [
    [
        "title" => "Bauliche Erweiterung des Tierheims",
        "excerpt" => "Die bauliche Erweiterung unseres Tierheims hat begonnen...",
        "link" => "aktuellesWeiterlesenAusbauTierheim.html",
        "image" => "../../../public/img/ausbauTierheim.jpg"
    ],
    [
        "title" => "Erfolgreiche Spendenaktion",
        "excerpt" => "Dank großzügiger Spenden konnten wir wichtige Projekte umsetzen...",
        "link" => "aktuellesWeiterlesenSpendenaktion.html",
        "image" => "../../../public/img/spendenaktion.jpg"
    ],
    [
        "title" => "Neuer Hundezwinger eröffnet",
        "excerpt" => "Unser neuer Hundezwinger bietet Platz für weitere Tiere...",
        "link" => "aktuellesWeiterlesenHundezwinger.html",
        "image" => "../../../public/img/hundezwinger.jpg"
    ],
];

header('Content-Type: application/json');
echo json_encode($articles);
?>
