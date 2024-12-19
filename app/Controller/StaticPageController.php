<?php

namespace app\Controller;

class StaticPageController
{
    public function indexAction(): void
    {
        //$data = ['title' => 'Willkommen auf der Startseite'];
        include_once '../app/View/home.php';
    }

    public function loadUnsereTiereAction($category): void
    {
        $allowedCategories = ['Hunde', 'Katzen', 'Kleintiere', 'Exoten', 'Alle Tiere'];

        if (!in_array($category, $allowedCategories)) {
            $this->pageNotFoundAction();
            return;
        }

        $currentPage = $category;

        include_once '../app/View/page/unsereTiere.php';
    }

    public function loadAktuellesAction(): void
    {
        include_once '../app/View/page/aktuelles.php';
    }

    public function loadVermisstGefundenAction(): void
    {
        include_once '../app/View/page/vermisstGefunden.php';
    }

    public function loadVermisstAction(): void
    {
        include_once '../app/View/page/vermisst.php';
    }

    public function loadGefundenAction(): void
    {
        include_once '../app/View/page/gefunden.php';
    }

    public function loadServiceInfosAction(): void
    {
        include_once '../app/View/page/serviceInfos.php';
    }

    public function loadLoginAction(): void
    {
        include_once '../app/View/page/login.php';
    }

    public function loadImpressumAction(): void
    {
        include_once '../app/View/page/impressum.php';
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
        include_once '../app/View/page/404Template.php';
    }
}