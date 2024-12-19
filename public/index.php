<?php
use core\Route;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/Controller/StaticPageController.php';
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
$router->add('/', 'StaticPageController', 'indexAction', "");
$router->add('/unsereTiere',  'StaticPageController', 'loadUnsereTiereAction', "Alle Tiere");
$router->add('/unsereHunde', 'StaticPageController', 'loadUnsereTiereAction', "Hunde");
$router->add('/unsereKatzen', 'StaticPageController', 'loadUnsereTiereAction', "Katzen");
$router->add('/unsereKleintiere', 'StaticPageController', 'loadUnsereTiereAction', "Kleintiere");
$router->add('/unsereExoten', 'StaticPageController', 'loadUnsereTiereAction', "Exoten");
$router->add('/aktuelles', 'StaticPageController', 'loadAktuellesAction', "");
$router->add('/vermisstGefunden', 'StaticPageController', 'loadVermisstGefundenAction', "");
$router->add('/vermisst', 'StaticPageController', 'loadVermisstAction', "");
$router->add('/gefunden', 'StaticPageController', 'loadGefundenAction', "");
$router->add('/serviceInfos', 'StaticPageController', 'loadServiceInfosAction', "");
$router->add('/login', 'StaticPageController', 'loadLoginAction', "");
$router->add('/impressum', 'StaticPageController', 'loadImpressumAction', "");
$router->add('/dokuGWP', 'StaticPageController', 'loadDokuGWPAction', "");
$router->add('/dokuDWP1', 'StaticPageController', 'loadDokuDWP1Action', "");
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