<?php

namespace app\Controller;

use app\model\UnsereTiereModel;
use Exception;
use InvalidArgumentException;

class UnsereTiereController
{
    private UnsereTiereModel $unsereTiereModel;

    public function __construct()
    {
        $this->unsereTiereModel = new UnsereTiereModel();
    }

    /**
     * @throws Exception
     */
    public function loadAllTiere(): array
    {
        http_response_code(201);

        try {
            if (isset($_POST['currentTierart']) && $_POST['currentTierart'] !== "") {
                $currentTierart = $_POST['currentTierart'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "currentTierart".');
            }

            if (isset($_POST['offset']) && $_POST['offset'] !== "") {
                $offset = $_POST['offset'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "offset".');
            }

            if (isset($_POST['rasse']) && $_POST['rasse'] !== "") {
                $rasse = $_POST['rasse'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "rasse".');
            }

            if (isset($_POST['geschlecht'])) {
                $geschlecht = $_POST['geschlecht'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "geschlecht".');
            }

            $countedAnimals = $this->unsereTiereModel->countAllAnimalsInThisCategory($currentTierart, $rasse, $geschlecht);

            $alleTiere = $this->unsereTiereModel->findAllTiere($currentTierart, $offset, $rasse, $geschlecht);

            $alleTierarten = $this->unsereTiereModel->findAllTierartenAndRassen();
            $alleGeschlechter = $this->unsereTiereModel->findAllGeschlechter();

            $response = [
                'tiere' => $alleTiere,
                'tierarten' => $alleTierarten,
                'geschlecht' => $alleGeschlechter,
                'countedAnimals' => $countedAnimals,
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