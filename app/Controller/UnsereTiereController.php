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
            $service = new UnsereTiereModel();
            $response = $service->findAllTiere();

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