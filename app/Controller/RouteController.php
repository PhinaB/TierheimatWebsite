<?php

namespace app\Controller;

class RouteController
{
    public function indexAction() {
        //$data = ['title' => 'Willkommen auf der Startseite'];
        include_once '../app/View/home.php';
    }

    public function loadUnsereTiereAction() {
        include_once '../app/View/page/unsereTiere.php';
    }

    public function loadUnsereHundeAction() {
        include_once '../app/View/page/unsereHunde.php';
    }

    public function loadUnsereKatzenAction() {
        include_once '../app/View/page/unsereKatzen.php';
    }

    public function loadUnsereKleintiereAction() {
        include_once '../app/View/page/unsereKleintiere.php';
    }

    public function loadUnsereExotenAction() {
        include_once '../app/View/page/unsereExoten.php';
    }

    public function loadAktuellesAction() {
        include_once '../app/View/page/aktuelles.php';
    }

    public function loadVermisstGefundenAction() {
        include_once '../app/View/page/vermisstGefunden.php';
    }

    public function loadVermisstAction() {
        include_once '../app/View/page/vermisst.php';
    }

    public function loadGefundenAction() {
        include_once '../app/View/page/gefunden.php';
    }

    public function loadServiceInfosAction() {
        include_once '../app/View/page/serviceInfos.php';
    }

    public function loadLoginAction() {
        include_once '../app/View/page/login.php';
    }

    public function loadImpressumAction() {
        include_once '../app/View/page/impressum.php';
    }

    public function loadDokuGWPAction() {
        include_once '../app/View/dokumentation/dokumentationGWP.php';
    }

    public function loadDokuDWP1Action() {
        include_once '../app/View/dokumentation/dokumentationDWP1.php';
    }
}