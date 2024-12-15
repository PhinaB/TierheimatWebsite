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
        try {
            $service = new UnsereTiereModel();
            return $service->findAllTiere();
        } catch (Exception $e) {
            return [
                'error' => true,
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }

}