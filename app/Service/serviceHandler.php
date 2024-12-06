<?php
include_once __DIR__ . '/../Controller/ServiceHelfenController.php';
include_once __DIR__ . '/../Model/ServiceInfoModel.php';
include_once __DIR__ . '/../../core/Connection.php';

use app\Controller\ServiceHelfenController;

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