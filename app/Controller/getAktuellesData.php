<?php

declare(strict_types=1);

namespace App\Controller;

header('Content-Type: application/json');

$categories = [
    ['id' => 1, 'name' => '15 Jahre Tierheimat'],
    ['id' => 2, 'name' => 'Sieger des Thüringer Tierheimwettbewerb'],
    ['id' => 3, 'name' => 'Wir begrüßen unsere neuen Veterinärstudenten']
];

$news = [
    1 => [
        ['title' => '15 Jahre Tierheimat', 'description' => 'Bla Bla Blub.'],
    ],
    2 => [
        ['title' => 'Sieger des Thüringer Tierheimwettbewerb', 'description' => 'Blub Blub Bla.'],
    ],
    3 => [
        ['title' => 'Wir begrüßen unsere neuen Veterinärstudenten', 'description' => 'Blub Bla Blub.'],
    ]
];

function jsonResponse(array $data, int $statusCode = 200): void
{
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);

switch ($type) {
    case 'categories':
        jsonResponse($categories);
        break;

    case 'news':
        if ($category !== false && isset($news[$category])) {
            jsonResponse($news[$category]);
        } else {
            jsonResponse(['error' => 'Ungültige Kategorie'], 400);
        }
        break;

    default:
        jsonResponse(['error' => 'Ungültiger Typ'], 400);
}
