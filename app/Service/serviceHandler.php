<?php
include_once __DIR__ . '/../Controller/ServiceHelfenController.php';
include_once __DIR__ . '/../Controller/UnsereTiereController.php';
include_once __DIR__ . '/../Model/ServiceInfoModel.php';
include_once __DIR__ . '/../Model/UnsereTiereModel.php';
include_once __DIR__ . '/../../core/Connection.php';

use app\Controller\ServiceHelfenController;
use app\Controller\UnsereTiereController;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['method'] === 'addServiceInfo') {
    http_response_code(201);

    try {
        $service = new ServiceHelfenController();
        $service->addServiceInfo();
    } catch (InvalidArgumentException | Exception $e) {
        // $errorMessage = $e->getMessage(); // TODO: nur fürs debuggen
        http_response_code(400);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['method'] === 'loadTiere') {
    http_response_code(201);

    try {
        $tiere = new UnsereTiereController();
        $response = $tiere->loadAllTiere();

        echo json_encode($response);
        exit;
    } catch (InvalidArgumentException | Exception $e) {
        http_response_code(400);

        echo json_encode([
            'error' => true,
            'message' => $e->getMessage()
        ]);
        exit;
    }
}