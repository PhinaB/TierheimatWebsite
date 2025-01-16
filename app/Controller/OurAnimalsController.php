<?php

declare(strict_types=1);

namespace app\Controller;

use app\model\OurAnimalsModel;
use Exception;
use InvalidArgumentException;

class OurAnimalsController
{
    private OurAnimalsModel $unsereTiereModel;

    public function __construct()
    {
        $this->unsereTiereModel = new OurAnimalsModel();
    }

    /**
     * @throws Exception
     */
    public function loadAllAnimals(): array
    {
        http_response_code(201);

        try {
            if (isset($_POST['currentTierart']) && $_POST['currentTierart'] !== "") {
                $currentSpecies = $_POST['currentTierart'];
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
                $breed = $_POST['rasse'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "rasse".');
            }

            if (isset($_POST['geschlecht'])) {
                $gender = $_POST['geschlecht'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "geschlecht".');
            }

            $countedAnimals = $this->unsereTiereModel->countAllAnimalsInThisCategory($currentSpecies, $breed, $gender);

            $allAnimals = $this->unsereTiereModel->findAllAnimals($currentSpecies, $offset, $breed, $gender);

            $allSpecies = $this->unsereTiereModel->findAllSpeciesAndBreeds();
            $allGender = $this->unsereTiereModel->findAllGender();

            $response = [
                'tiere' => $allAnimals,
                'tierarten' => $allSpecies,
                'geschlecht' => $allGender,
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