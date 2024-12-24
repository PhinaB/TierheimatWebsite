<?php

namespace app\Controller;

use app\model\OurAnimalsModel;
use Exception;

class HomeController
{
    private OurAnimalsModel $unsereTiereModel;

    public function __construct()
    {
        $this->unsereTiereModel = new OurAnimalsModel();
    }

    public function loadAllForHome(): void
    {
        try {
            $allAnimals = $this->unsereTiereModel->findThreeRandomAnimals();

            $response = [
                'tiere' => $allAnimals,
            ];

            echo json_encode($response);
            exit;
        } catch (Exception) {
            http_response_code(400);

            echo json_encode(false);
            exit;
        }
    }
}