<?php
namespace app\Controller;

use app\Model\ServiceInfoModel;
use Exception;
use InvalidArgumentException;

class ServiceHelfenController // extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function addServiceInfo(): void
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);


        // TODO: aus ArtDerHilfe -> prüfen, ob existiert
        if (isset($data['unterstuetzungsart']) && $data['unterstuetzungsart'] !== "") {
            $unterstuetzungsart = 1;
        }
        else {
            throw new InvalidArgumentException('Invalid field "Unterstützungsart".');
        }

        if ((isset($data['dates'][0]) && $data['dates'][0] !== "" && isset($data['times'][0]) && $data['times'][0] !== "") ||
            (isset($data['weekdays'][0]) && $data['weekdays'][0] !== "" && isset($data['weekdayTimes'][0]) && $data['weekdayTimes'][0] !== "")) {
            $service = new ServiceInfoModel();
            $service->saveServiceInfo($unterstuetzungsart, $data['dates'], $data['times'], $data['weekdays'], $data['weekdayTimes']);
        } else {
            throw new InvalidArgumentException('You have to fill the fields "Datum" and "Zeit" or "Wochentag" and "Zeit".');
        }
    }
}