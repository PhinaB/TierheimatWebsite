<?php

declare(strict_types=1);

namespace app\Controller;

class StaticPageController
{
    public function homeAction(): void
    {
        $stylesheets = ['home.css', 'imageChange.css'];
        $js = ['loadHome.js'];

        $this->renderPage($stylesheets, 'index', $js, 'home');
    }

    public function loadOurAnimalsAction($category): void
    {
        $allowedCategories = ['Hunde', 'Katzen', 'Kleintiere', 'Exoten', 'Alle Tiere'];

        if (!in_array($category, $allowedCategories)) {
            $this->pageNotFoundAction();
            return;
        }

        $currentPage = $category;

        $stylesheets = ['ourAnimals.css', 'imageChange.css', 'readMore.css'];
        $js = ['ourAnimals.js', 'readMore.js', 'findParent.js'];

        $this->renderPage($stylesheets, $currentPage, $js, 'ourAnimals');
    }

    public function loadCurrentPageAction(): void
    {
        $stylesheets = ['current.css', 'readMore.css'];
        $js = ['current.js', 'readMore.js', 'findParent.js'];

        $this->renderPage($stylesheets, 'Aktuelles', $js, 'current');
    }

    public function loadMissingFoundAction($categoryMissingFound): void
    {
        $allowedCategories = ['Gefundene Tiere', 'Vermisste Tiere', 'Vermisste / Gefundene Tiere'];

        if (!in_array($categoryMissingFound, $allowedCategories)) {
            $this->pageNotFoundAction();
            return;
        }

        $currentPage = $categoryMissingFound;

        $stylesheets = ['missingFoundLogin.css', 'missingFound.css', 'ourAnimals.css', 'form.css', 'missingFoundPrint.css', 'readMore.css'];
        $js = ['dynamicMissingFoundAnimals.js', 'missingFoundForm.js', 'readMore.js', 'findParent.js'];

        $this->renderPage($stylesheets, $currentPage, $js, 'missingFound');
    }

    public function loadServiceInfoAction(): void
    {
        $stylesheets = ['serviceInfoHelpLogin.css', 'serviceInfo.css', 'form.css'];
        $js = ['serviceHelpForm.js'];

        $this->renderPage($stylesheets, 'Service / Infos', $js, 'serviceInfos');
    }

    public function loadLoginAction(): void
    {
        $stylesheets = ['login.css', 'form.css'];
        $js = ['loginRegisterForm.js'];

        $this->renderPage($stylesheets, 'Login', $js, 'login');
    }

    public function loadImpressumAction(): void
    {
        $stylesheets = ['impressum.css'];
        $js = [];

        $this->renderPage($stylesheets, 'Impressum', $js, 'impressum');
    }

    public function loadDocumentationGWPAction(): void
    {
        include_once '../app/View/documentation/documentationGWP.php';
    }

    public function loadDocumentationDWP1Action(): void
    {
        include_once '../app/View/documentation/documentationDWP1.php';
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
