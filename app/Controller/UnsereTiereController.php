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
        $service = new UnsereTiereModel();
        return $service->findAllTiere();
    }

}