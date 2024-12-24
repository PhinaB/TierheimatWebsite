<?php

namespace app\Controller;

use app\Model\MissingFoundModel;
use app\Model\MissingFoundAnimal;
use app\Model\Species;
use DateTime;
use Exception;

class missingFoundAnimalController
{
    private MissingFoundModel $vermisstGefundenTierModel;

    public function __construct()
    {
        $this->vermisstGefundenTierModel = new MissingFoundModel();
    }

    /**
     * @throws Exception
     */
    public function addVermisstGefundenTier(): void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $anliegenVermisstGefunden = $_POST['anliegenVermisstGefunden'] ?? null;
            $tierartName = $_POST['tierart'] ?? null;
            $datum = $_POST['datum'] ?? null;
            $ort = $_POST['ort'] ?? null;
            $tierbeschreibung = $_POST['tierbeschreibung'] ?? null;
            $tierbild = $_POST['tierbild'] ?? null; // TODO: wo wird Bild abgespeichert
            $kontaktaufnahme = $_POST['kontaktaufnahme'] ?? null;

            //Pflichtfelder
            if (!$anliegenVermisstGefunden || !$tierartName || !$datum || !$ort || !$tierbeschreibung || !$kontaktaufnahme) {
                throw new Exception("Füllen Sie die Pflichtfelder aus!");
            }

           $datumFormatiert = new DateTime($datum);
           $datumFormatiert = $datumFormatiert->format('Y-m-d');

            //Instanz der Klasse Species mit String (Hund, Katze, ...)
            $tierart = new Species ($tierartName);

            $zuletztGeanderterNutzerID = 1; //TODO: NutzerID auslesen
            $geloescht = 0;
            $zuletztGeandertet = date('Y-m-d H:i:s'); //erstellt aktuelles Datum; Alternative über SQL: DATE DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

            // Konstruktor ohne Fremdschlüssel, da diese erst im Model generiert werden. Dort werden sie dann gesetzt
            $vermisstGefundenTier = new MissingFoundAnimal($zuletztGeanderterNutzerID, $anliegenVermisstGefunden, $datumFormatiert, $ort, $tierbeschreibung, $kontaktaufnahme, $tierbild, $geloescht, $zuletztGeandertet);


            try {
                $this->vermisstGefundenTierModel->insertVermisstGefundenTiere($vermisstGefundenTier, $tierart);
            }
            catch (Exception $exception) {
                throw new Exception("Fehler beim Einfügen der Daten: " . $exception->getMessage());
            }

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function loadAllVermisstTiere(): array
    {
        try {
            $vermisstOrGefunden = "vermisst";
            return $this->vermisstGefundenTierModel->findAllVermisstOrGefundenTiere($vermisstOrGefunden);
        } catch (Exception $e) {
            return [
                'error' => true, //TODO: zu bearbeiten
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }

    public function loadAllGefundenTiere(): array
    {
        try {
            $vermisstOrGefunden = "gefunden";
            return $this->vermisstGefundenTierModel->findAllVermisstOrGefundenTiere($vermisstOrGefunden);
        } catch (Exception $e) {
            return [
                'error' => true, //TODO: zu bearbeiten
                'message' => 'Es ist ein Fehler aufgetreten: ' . $e->getMessage(),
            ];
        }
    }

}