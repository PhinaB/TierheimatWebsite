<?php

namespace app\Controller;

use core\Connection;

class CurrentController
{
    public function loadAllArticles(): void
    {
        header('Content-Type: application/json');

        $offset = $_POST['offset'] ?? 0;
        $limit = 8;

        $db = Connection::connect();

        $query = "SELECT ArtikelID, Ueberschrift, SUBSTRING(Text, 1, 150) AS VorschauText, Bildadresse, Datum 
                  FROM Artikel 
                  ORDER BY Datum DESC 
                  LIMIT :limit OFFSET :offset";

        $statement = $db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        $articles = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $countQuery = "SELECT COUNT(*) FROM Artikel";
        $countStatement = $db->prepare($countQuery);
        $countStatement->execute();
        $totalArticles = $countStatement->fetchColumn();

        echo json_encode([
            'articles' => $articles,
            'count' => $totalArticles
        ]);
    }

    public function loadArticleDetail(): void
    {
        header('Content-Type: application/json');

        // ID über POST statt GET empfangen
        $newsId = $_POST['newsId'] ?? null;

        if (!$newsId) {
            http_response_code(400);
            echo json_encode(['error' => 'Keine ID angegeben.']);
            return;
        }

        $db = Connection::connect();

        $query = "SELECT Ueberschrift, Text, Bildadresse, Datum 
                  FROM Artikel 
                  WHERE ArtikelID = :newsId";
        $statement = $db->prepare($query);
        $statement->bindValue(':newsId', $newsId, \PDO::PARAM_INT);
        $statement->execute();

        $article = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($article) {
            echo json_encode($article);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Artikel nicht gefunden.']);
        }
    }
}
