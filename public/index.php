<?php
use core\Route;

require_once '../config/config.php';
require_once '../core/Route.php';
require_once '../app/Controller/RouteController.php';

$router = new Route();

// alle Routen anlegen, die wir haben/brauchen:
$router->add('/', 'RouteController', 'indexAction');
$router->add('/unsereTiere', 'RouteController', 'loadUnsereTiereAction');
$router->add('/unsereHunde', 'RouteController', 'loadUnsereHundeAction');
$router->add('/unsereKatzen', 'RouteController', 'loadUnsereKatzenAction');
$router->add('/unsereKleintiere', 'RouteController', 'loadUnsereKleintiereAction');
$router->add('/unsereExoten', 'RouteController', 'loadUnsereExotenAction');
$router->add('/aktuelles', 'RouteController', 'loadAktuellesAction');
$router->add('/vermisstGefunden', 'RouteController', 'loadVermisstGefundenAction');
$router->add('/vermisst', 'RouteController', 'loadVermisstAction');
$router->add('/gefunden', 'RouteController', 'loadGefundenAction');
$router->add('/serviceInfos', 'RouteController', 'loadServiceInfosAction');
$router->add('/login', 'RouteController', 'loadLoginAction');
$router->add('/impressum', 'RouteController', 'loadImpressumAction');
$router->add('/dokuGWP', 'RouteController', 'loadDokuGWPAction');
$router->add('/dokuDWP1', 'RouteController', 'loadDokuDWP1Action');



// aus URL filtern, welche Seite aufgerufen werden muss:
$baseUrl = str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME']);
$baseUrl = dirname($baseUrl);
$url = str_replace($baseUrl, '', $_SERVER['REQUEST_URI']);

// Seite aufrufen:
$router->match($url);