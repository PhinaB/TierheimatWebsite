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
     * @throws Exception
     */
    public function loadAllArticles()
    {
        http_response_code(201);

        try {
            $articles = $this->currentModel->findAllArticles();

            echo json_encode($articles);
            exit;
        } catch (Exception $e) {
            http_response_code(400);

            return [
                'error' => true,
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }
}