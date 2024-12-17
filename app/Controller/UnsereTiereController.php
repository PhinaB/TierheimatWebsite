<?php

namespace app\Controller;

use app\model\UnsereTiereModel;
use Exception;

class UnsereTiereController
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function loadAllTiere(): array
    {
        http_response_code(201);

        try {
            $unsereTiereModel = new UnsereTiereModel();
            $alleTiere = $unsereTiereModel->findAllTiere();

            // TODO: lade alle Tierarten, Rassen & Geschlecht für Filter
            $alleTierarten = $unsereTiereModel->findAllTierartenAndRassen();
            $alleGeschlechter = $unsereTiereModel->findAllGeschlechter();

            $response = [
                'tiere' => $alleTiere,
                'tierarten' => $alleTierarten,
                'geschlecht' => $alleGeschlechter,
            ];

            echo json_encode($response);
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