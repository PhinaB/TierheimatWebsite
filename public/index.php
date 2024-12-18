<?php
use core\Route;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/Controller/RouteController.php';
require_once __DIR__ . '/../app/Controller/VermisstGefundenTierController.php';

require_once __DIR__ . '/../core/Connection.php';
require_once __DIR__ . '/../app/Model/Tierart.php';
require_once __DIR__ . '/../app/Model/VermisstGefundenTier.php';
require_once __DIR__ . '/../app/Model/AbstractModel.php';
require_once __DIR__ . '/../app/Model/VermisstGefundenTierModel.php';

include_once __DIR__ . '/../app/Controller/ServiceHelfenController.php';
include_once __DIR__ . '/../app/Controller/UnsereTiereController.php';
include_once __DIR__ . '/../app/Model/ServiceInfoModel.php';
include_once __DIR__ . '/../app/Model/UnsereTiereModel.php';

$router = new Route();

// alle Routen anlegen, die wir haben/brauchen:
$router->add('/', 'RouteController', 'indexAction', "");
$router->add('/unsereTiere',  'RouteController', 'loadUnsereTiereAction', "Alle Tiere");
$router->add('/unsereHunde', 'RouteController', 'loadUnsereTiereAction', "Hunde");
$router->add('/unsereKatzen', 'RouteController', 'loadUnsereTiereAction', "Katzen");
$router->add('/unsereKleintiere', 'RouteController', 'loadUnsereTiereAction', "Kleintiere");
$router->add('/unsereExoten', 'RouteController', 'loadUnsereTiereAction', "Exoten");
$router->add('/aktuelles', 'RouteController', 'loadAktuellesAction', "");
$router->add('/vermisstGefunden', 'RouteController', 'loadVermisstGefundenAction', "");
$router->add('/vermisst', 'RouteController', 'loadVermisstAction', "");
$router->add('/gefunden', 'RouteController', 'loadGefundenAction', "");
$router->add('/serviceInfos', 'RouteController', 'loadServiceInfosAction', "");
$router->add('/login', 'RouteController', 'loadLoginAction', "");
$router->add('/impressum', 'RouteController', 'loadImpressumAction', "");
$router->add('/dokuGWP', 'RouteController', 'loadDokuGWPAction', "");
$router->add('/dokuDWP1', 'RouteController', 'loadDokuDWP1Action', "");
$router->add('/tier/melden', 'VermisstGefundenTierController', "addVermisstGefundenTier", '');
$router->add('/load/alle/unsere/tiere', 'UnsereTiereController', "loadAllTiere", '');
$router->add('/add/helfen', 'ServiceHelfenController', "addServiceInfo", '');
$router->add('/load/alles/serviceInfo', 'ServiceHelfenController', "loadAllServiceInfo", '');


// aus URL filtern, welche Seite aufgerufen werden muss:
$baseUrl = str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME']);
$baseUrl = dirname($baseUrl);
$url = str_replace($baseUrl, '', $_SERVER['REQUEST_URI']);

// Seite aufrufen:
$router->match($url);