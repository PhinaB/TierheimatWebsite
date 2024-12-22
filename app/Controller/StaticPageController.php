<?php

namespace app\Controller;

class StaticPageController
{
    public function indexAction(): void
    {
        $stylesheets = ['index.css', 'bildwechselBilder.css'];
        $js = [];

        $this->renderPage($stylesheets, 'index', $js, 'home');
    }

    public function loadUnsereTiereAction($category): void
    {
        $allowedCategories = ['Hunde', 'Katzen', 'Kleintiere', 'Exoten', 'Alle Tiere'];

        if (!in_array($category, $allowedCategories)) {
            $this->pageNotFoundAction();
            return;
        }

        $currentPage = $category;

        $stylesheets = ['unsereTiere.css', 'bildwechselBilder.css', 'weiterlesen.css'];
        $js = ['unsereTiere.js'];

        $this->renderPage($stylesheets, $currentPage, $js, 'unsereTiere');
    }

    public function loadAktuellesAction(): void
    {
        $stylesheets = ['aktuelles.css'];
        $js = [];

        $this->renderPage($stylesheets, 'Aktuelles', $js, 'aktuelles');
    }

    public function loadVermisstGefundenAction(): void
    {
        $stylesheets = ['vermisstGefundenLogin.css', 'vermisstGefunden.css', 'unsereTiere.css', 'formulare.css', 'vermisstGefundenPrint.css'];
        $js = ['validation.js'];

        $this->renderPage($stylesheets, 'Vermisste / Gefundene Tiere', $js, 'vermisstGefunden');
    }

    public function loadVermisstAction(): void
    {
        $stylesheets = ['vermisstGefundenLogin.css', 'vermisstGefunden.css', 'unsereTiere.css', 'formulare.css', 'vermisstGefundenPrint.css'];
        $js = ['validation.js'];

        $this->renderPage($stylesheets, 'Vermisste Tiere', $js, 'vermisst');
    }

    public function loadGefundenAction(): void
    {
        $stylesheets = ['vermisstGefundenLogin.css', 'vermisstGefunden.css', 'unsereTiere.css', 'formulare.css', 'vermisstGefundenPrint.css'];
        $js = ['validation.js'];

        $this->renderPage($stylesheets, 'Gefundene Tiere', $js, 'gefunden');
    }

    public function loadServiceInfosAction(): void
    {
        $stylesheets = ['serviceInfosHelfenlogin.css', 'serviceInfo.css', 'formulare.css'];
        $js = ['serviceHelfenFormular.js'];

        $this->renderPage($stylesheets, 'Service / Infos', $js, 'serviceInfos');
    }

    public function loadLoginAction(): void
    {
        $stylesheets = ['login.css', 'formulare.css'];
        $js = [];

        $this->renderPage($stylesheets, 'Login', $js, 'login');
    }

    public function loadImpressumAction(): void
    {
        $stylesheets = ['impressum.css'];
        $js = [];

        $this->renderPage($stylesheets, 'Impressum', $js, 'impressum');
    }

    public function loadDokuGWPAction(): void
    {
        include_once '../app/View/dokumentation/dokumentationGWP.php';
    }

    public function loadDokuDWP1Action(): void
    {
        include_once '../app/View/dokumentation/dokumentationDWP1.php';
    }

    public function pageNotFoundAction(): void
    {
        $stylesheets = [];
        $js = [];

        $this->renderPage($stylesheets, '404 - Seite nicht gefunden', $js, '404Template');
    }

    private function renderPage($stylesheets, $currentPage, $js, $pageName): void
    {
        include '../app/View/includes/allIncludes.php';
        allIncludes($stylesheets, $currentPage);

        include_once '../app/View/page/'.$pageName.'.php';

        renderFooter($js);
    }
}