<?php

namespace app\Controller;

use app\Model\VermisstGefundenTierModel;
use app\Model\VermisstGefundenTier;
use app\Model\Tierart;
use Exception;

class VermisstGefundenTierController
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function addVermisstGefundenTier(): void {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST ['absenden'])) {

                $anliegenVermisstGefunden = $_POST['anliegenVermisstGefunden'] ?? null;
                $tierartName = $_POST['tierart'] ?? null;
                $datum = $_POST['datum'] ?? null;
                $ort = $_POST['ort'] ?? null;
                $tierbeschreibung = $_POST['tierbeschreibung'] ?? null;
                $tierbild = $_POST['tierbild'] ?? null;
                $kontaktaufnahme = $_POST['kontaktaufnahme'] ?? null;

                //Pflichtfelder
                if (!$anliegenVermisstGefunden || !$tierartName || !$datum || !$ort || !$tierbeschreibung || !$kontaktaufnahme) {
                    throw new Exception("Füllen Sie die Pflichtfelder aus!");
                }

                //Instanz der Klasse Tierart mit String (Hund, Katze, ...)
                $tierart = new Tierart ($tierartName);

                $zuletztGeanderterNutzerID = 1; //TODO: NutzerID auslesen
                $geloescht = 0;
                $zuletztGeandertet = date('Y-m-d'); //erstellt aktuelles Datum; Alternative über SQL: DATE DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

                // Konstruktor ohne Fremdschlüssel, da diese erst im Model generiert werden. Dort werden sie dann gesetzt
                $vermisstGefundenTier = new VermisstGefundenTier($zuletztGeanderterNutzerID, $anliegenVermisstGefunden, $datum, $ort, $tierbeschreibung, $kontaktaufnahme, $geloescht, $zuletztGeandertet);


                try {
                    $model = new VermisstGefundenTierModel();
                    $model->insertVermisstGefundenTiere($vermisstGefundenTier, $tierart);
                }
                catch (Exception $exception) {
                    throw new Exception("Fehler beim Einfügen der Daten: " . $exception->getMessage());
                }
            }
        }
    }

    public static function loadAllVermisstTiere(): array
    {
        try {
            $model = new VermisstGefundenTierModel();
            $vermisstOrGefunden = "vermisst";
            return $model->findAllVermisstOrGefundenTiere($vermisstOrGefunden);
        } catch (Exception $e) {
            return [
                'error' => true, //TODO: zu bearbeiten
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }

    public static function loadAllGefundenTiere(): array
    {
        try {
            $model = new VermisstGefundenTierModel();
            $vermisstOrGefunden = "gefunden";
            return $model->findAllVermisstOrGefundenTiere($vermisstOrGefunden);
        } catch (Exception $e) {
            return [
                'error' => true, //TODO: zu bearbeiten
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }

}