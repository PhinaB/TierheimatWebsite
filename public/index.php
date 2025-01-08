<?php
use core\Route;

require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/Controller/StaticPageController.php';
require_once __DIR__ . '/../app/Controller/missingFoundAnimalController.php';
require_once __DIR__ . '/../app/Controller/AuthorizeLoginController.php';

require_once __DIR__ . '/../core/Connection.php';
require_once __DIR__ . '/../app/Model/Species.php';
require_once __DIR__ . '/../app/Model/MissingFoundAnimal.php';
require_once __DIR__ . '/../app/Model/AbstractModel.php';
require_once __DIR__ . '/../app/Model/MissingFoundModel.php';
require_once __DIR__ . '/../app/Model/UserModel.php';
require_once __DIR__ . '/../app/Model/UserRoleModel.php';
require_once __DIR__ . '/../app/Model/User.php';
require_once __DIR__ . '/../app/Model/UserRole.php';

include_once __DIR__ . '/../app/Controller/ServiceHelpController.php';
include_once __DIR__ . '/../app/Controller/OurAnimalsController.php';
include_once __DIR__ . '/../app/Controller/HomeController.php';
include_once __DIR__ . '/../app/Controller/UserController.php';
include_once __DIR__ . '/../app/Model/ServiceInfoModel.php';
include_once __DIR__ . '/../app/Model/OurAnimalsModel.php';

$router = new Route();

// all Routes for page:
$router->add('/', 'StaticPageController', 'homeAction', "");
$router->add('/unsereTiere',  'StaticPageController', 'loadOurAnimalsAction', "Alle Tiere");
$router->add('/unsereHunde', 'StaticPageController', 'loadOurAnimalsAction', "Hunde");
$router->add('/unsereKatzen', 'StaticPageController', 'loadOurAnimalsAction', "Katzen");
$router->add('/unsereKleintiere', 'StaticPageController', 'loadOurAnimalsAction', "Kleintiere");
$router->add('/unsereExoten', 'StaticPageController', 'loadOurAnimalsAction', "Exoten");
$router->add('/aktuelles', 'StaticPageController', 'loadCurrentPageAction', "");
$router->add('/vermisstGefunden', 'StaticPageController', 'loadMissingFoundAction', "Vermisste / Gefundene Tiere");
$router->add('/vermisst', 'StaticPageController', 'loadMissingFoundAction', "Vermisste Tiere");
$router->add('/gefunden', 'StaticPageController', 'loadMissingFoundAction', "Gefundene Tiere");
$router->add('/serviceInfos', 'StaticPageController', 'loadServiceInfoAction', "");
$router->add('/login', 'StaticPageController', 'loadLoginAction', "");
$router->add('/impressum', 'StaticPageController', 'loadImpressumAction', "");
$router->add('/dokuGWP', 'StaticPageController', 'loadDocumentationGWPAction', "");
$router->add('/dokuDWP1', 'StaticPageController', 'loadDocumentationDWP1Action', "");

// all Routes for js:
$router->add('/animal/report', 'missingFoundAnimalController', "addVermisstGefundenTier", '');
$router->add('/loadMissingFoundAnimals', 'missingFoundAnimalController', "loadAllMissingFoundAnimals", '');
$router->add('/deleteMissingFoundAnimals', 'missingFoundAnimalController', "deleteMissingOrFoundAnimal", '');
$router->add('/checkLogin', 'AuthorizeLoginController', 'checkLogin', '');
$router->add('/load/all/our/animals', 'OurAnimalsController', "loadAllAnimals", '');
$router->add('/add/help', 'ServiceHelpController', "addServiceInfo", '');
$router->add('/load/all/serviceInfo', 'ServiceHelpController', "loadAllServiceInfo", '');
$router->add('/load/all/for/home', 'HomeController', "loadAllForHome", '');
$router->add('/user/login', 'UserController', 'login', '');
$router->add('/logout', 'UserController', 'logout', '');
$router->add('/user/register', 'UserController', 'register', '');
$router->add('/load/article/detail', 'CurrentController', "loadArticleDetail", '');


// get URL - which page to open:
$baseUrl = str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME']);
$baseUrl = dirname($baseUrl);
$url = str_replace($baseUrl, '', $_SERVER['REQUEST_URI']);

// open page:
$router->match($url);