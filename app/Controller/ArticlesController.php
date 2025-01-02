<?php

namespace app\Controller;

use app\model\ArticlesModel;
use Exception;
use InvalidArgumentException;

class ArticlesController
{
    private ArticlesModel $articlesModel;

    public function __construct()
    {
        $this->articlesModel = new ArticlesModel();
    }

    public function loadAllArticles(): void
    {
        http_response_code(201);

        try {
            if (isset($_POST['offset']) && $_POST['offset'] !== "") {
                $offset = (int)$_POST['offset'];
            } else {
                throw new InvalidArgumentException('Invalid field "offset".');
            }

            $articles = $this->articlesModel->findAllArticles($offset);
            $articleCount = $this->articlesModel->countAllArticles();

            $response = [
                'artikel' => $articles,
                'countedArticles' => $articleCount,
            ];

            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            http_response_code(400);

            echo json_encode([
                'error' => true,
                'message' => 'Fehler beim Laden der Artikel: ' . $e->getMessage(),
            ]);
            exit;
        }
    }
}
