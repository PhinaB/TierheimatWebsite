<?php
header('Content-Type: application/json');

// Beispiel-Daten zum Testen
$categories = [
    ['id' => 1, 'name' => 'Events'],
    ['id' => 2, 'name' => 'News'],
    ['id' => 3, 'name' => 'Ankündigungen']
];

$news = [
    1 => [
        ['title' => 'Weihnachtsfest', 'description' => 'Feiern Sie mit uns das Weihnachtsfest im Tierheim.'],
        ['title' => 'Sommerfest', 'description' => 'Große Veranstaltung im Juli!']
    ],
    2 => [
        ['title' => 'Neuer Hund angekommen', 'description' => 'Ein neuer Hund wurde aufgenommen.'],
        ['title' => 'Katzenbaby gerettet', 'description' => 'Wir haben ein Katzenbaby ausgesetzt gefunden.']
    ],
    3 => [
        ['title' => 'Umbauarbeiten', 'description' => 'Das Tierheim wird renoviert.'],
        ['title' => 'Spendenaktion', 'description' => 'Unterstützen Sie uns mit Ihrer Spende!']
    ]
];

$type = $_GET['type'] ?? '';
$category = $_GET['category'] ?? '';

if ($type === 'categories') {
    echo json_encode($categories);
} elseif ($type === 'news' && isset($news[$category])) {
    echo json_encode($news[$category]);
} else {
    echo json_encode([]);
}

