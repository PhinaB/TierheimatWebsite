<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\ServiceInfoModel;
use Exception;
use InvalidArgumentException;

class ServiceHelpController
{
    private ServiceInfoModel $serviceInfoModel;

    public function __construct()
    {
        $this->serviceInfoModel = new ServiceInfoModel();
    }

    /**
     * @throws Exception
     */
    public function addServiceInfo(): void
    {
        http_response_code(201);

        try {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);

            if (isset($data['unterstuetzungsart']) && $data['unterstuetzungsart'] !== "") {
                $unterstuetzungsart = $this->serviceInfoModel->findOneHilfeArtenByName($data['unterstuetzungsart'])['ArtID'];
            }
            else {
                throw new InvalidArgumentException('Invalid field "Unterstützungsart".');
            }

            if ((isset($data['dates'][0]) && $data['dates'][0] !== "" && isset($data['times'][0]) && $data['times'][0] !== "") ||
                (isset($data['weekdays'][0]) && $data['weekdays'][0] !== "" && isset($data['weekdayTimes'][0]) && $data['weekdayTimes'][0] !== "")) {
                $this->serviceInfoModel->saveServiceInfo($unterstuetzungsart, $data['dates'], $data['times'], $data['weekdays'], $data['weekdayTimes']);

                echo json_encode(true);
                exit;
            } else {
                throw new InvalidArgumentException('You have to fill the fields "Datum" and "Zeit" or "Wochentag" and "Zeit".');
            }

        } catch (InvalidArgumentException | Exception $e) {
            // $errorMessage = $e->getMessage(); // TODO: nur fürs debuggen
            http_response_code(400);

            echo json_encode(false);
            exit;
        }
    }

    /**
     * @throws Exception
     */
    public function loadAllServiceInfo(): void
    {
        try {
            $alleHilfearten = $this->serviceInfoModel->findAllHilfearten();

            $response = [
                'alleHilfearten' => $alleHilfearten,
            ];

            echo json_encode($response);
            exit;
        } catch (InvalidArgumentException | Exception $e) {
            // $errorMessage = $e->getMessage(); // TODO: nur fürs debuggen
            http_response_code(400);

            echo json_encode(false);
            exit;
        }
    }
}