<?php
use core\Route;

require_once '../config/config.php';
require_once '../core/Route.php';
require_once '../app/Controller/RouteController.php';

$router = new Route();

// alle Routen anlegen, die wir haben/brauchen:
$router->add('/', 'indexAction');
$router->add('/unsereTiere',  'loadUnsereTiereAction');
$router->add('/unsereHunde', 'loadUnsereHundeAction');
$router->add('/unsereKatzen', 'loadUnsereKatzenAction');
$router->add('/unsereKleintiere', 'loadUnsereKleintiereAction');
$router->add('/unsereExoten', 'loadUnsereExotenAction');
$router->add('/aktuelles', 'loadAktuellesAction');
$router->add('/vermisstGefunden', 'loadVermisstGefundenAction');
$router->add('/vermisst', 'loadVermisstAction');
$router->add('/gefunden', 'loadGefundenAction');
$router->add('/serviceInfos', 'loadServiceInfosAction');
$router->add('/login', 'loadLoginAction');
$router->add('/impressum', 'loadImpressumAction');
$router->add('/dokuGWP', 'loadDokuGWPAction');
$router->add('/dokuDWP1', 'loadDokuDWP1Action');

// aus URL filtern, welche Seite aufgerufen werden muss:
$baseUrl = str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME']);
$baseUrl = dirname($baseUrl);
$url = str_replace($baseUrl, '', $_SERVER['REQUEST_URI']);

// Seite aufrufen:
$router->match($url);