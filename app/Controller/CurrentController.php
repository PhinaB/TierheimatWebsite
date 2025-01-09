<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\CurrentModel;
use Exception;

class CurrentController
{
    private CurrentModel $currentModel;

    public function __construct()
    {
        $this->currentModel = new CurrentModel();
    }

    /**
     * Lädt alle Artikel mit Limit und Offset
     * @throws Exception
     */
    public function loadAllArticles(): void
    {
        try {
            $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
            $articles = $this->currentModel->findAllArticles($offset);
            echo json_encode($articles);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Fehler beim Laden der Artikel.']);
        }
    }

    /**
     * Lädt Details eines einzelnen Artikels
     * @throws Exception
     */
    public function loadArticleDetail(): void
    {
        try {
            $articleId = isset($_GET['id']) ? (int)$_GET['id'] : null;
            if (!$articleId) {
                http_response_code(400);
                echo json_encode(['error' => 'Keine Artikel-ID angegeben.']);
                return;
            }

            $article = $this->currentModel->findArticleById($articleId);
            if (!$article) {
                http_response_code(404);
                echo json_encode(['error' => 'Artikel nicht gefunden.']);
                return;
            }

            echo json_encode($article);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Fehler beim Laden der Artikeldetails.']);
        }
    }
}




/*

declare(strict_types=1);

namespace app\Controller;

use app\Model\ArticleModel;
use Exception;

class ArticleController
{
    private ArticleModel $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    /**
     * Lädt alle Artikel mit Limit und Offset
     * @throws Exception
     */
/* public function loadAllArticles(): void
{
    try {
        // Standardwert für Offset also nummerierung
        $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
        $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 8; // Optionales Limit für die Anzahl der Artikel

        // Artikel aus der Datenbank laden
        $articles = $this->articleModel->findAllArticles($offset, $limit);


        echo json_encode($articles);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Fehler beim Laden der Artikel.', 'message' => $e->getMessage()]);
    }
}

/**
 * Lädt Details eines einzelnen Artikels
 * @throws Exception
 */
 /* public function loadArticleDetail(): void
{
    try {
        $articleId = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if (!$articleId) {
            http_response_code(400);
            echo json_encode(['error' => 'Keine Artikel-ID angegeben.']);
            return;
        }

        // Artikel-Details aus der Datenbank laden
        $article = $this->articleModel->findArticleById($articleId);

        if (!$article) {
            http_response_code(404);
            echo json_encode(['error' => 'Artikel nicht gefunden.']);
            return;
        }

        echo json_encode($article);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Fehler beim Laden der Artikeldetails.', 'message' => $e->getMessage()]);
    }
}
}

