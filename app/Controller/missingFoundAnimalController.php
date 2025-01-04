<?php

declare(strict_types=1);

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
            $response = ['success'=> false, 'errors' => []];

            $anliegenVermisstGefunden = $_POST['anliegenVermisstGefunden'] ?? null;
            $tierartName = $_POST['tierart'] ?? null;
            $datum = $_POST['datum'] ?? null;
            $ort = $_POST['ort'] ?? null;
            $tierbeschreibung = $_POST['tierbeschreibung'] ?? null;
            $kontaktaufnahme = $_POST['kontaktaufnahme'] ?? null;

            //Pflichtfelder
            if (!$anliegenVermisstGefunden || !$tierartName || !$datum || !$ort || !$tierbeschreibung || !$kontaktaufnahme) {
                $response['errors']['general']="Alle Pflichtfelder müssen ausgefüllt werden!";
            }

            //Bildvalidierung und -speicherung
            $tierbildAdresse= null; //defualt Wert, wenn kein Bild hochgeladen wird
            if (isset($_FILES['tierbild']) && $_FILES['tierbild']['error'] === UPLOAD_ERR_OK) {
                $tierbildAdresse = $this->speichereBild($_FILES['tierbild'], $tierartName);
            }

           $datumFormatiert = new DateTime($datum);
           $datumFormatiert = $datumFormatiert->format('Y-m-d');

            //Instanz der Klasse Species mit String (Hund, Katze, ...)
            $tierart = new Species ($tierartName);

            $zuletztGeanderterNutzerID = 1; //TODO: NutzerID auslesen
            $geloescht = false;
            $zuletztGeandertet = date('Y-m-d H:i:s'); //erstellt aktuelles Datum; Alternative über SQL: DATE DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

            // Konstruktor ohne Fremdschlüssel, da diese erst im Model generiert werden. Dort werden sie dann gesetzt
            $vermisstGefundenTier = new MissingFoundAnimal($zuletztGeanderterNutzerID, $anliegenVermisstGefunden, $datumFormatiert, $ort, $tierbeschreibung, $kontaktaufnahme, $tierbildAdresse, $geloescht, $zuletztGeandertet);

            try {
                $this->vermisstGefundenTierModel->insertVermisstGefundenTiere($vermisstGefundenTier, $tierart, $tierbildAdresse);
                $response['success']=true;
            }
            catch (Exception $exception) {
               $response['errors']['general']="Fehler beim Einfügen der Daten" . $exception->getMessage();
            }

            echo json_encode($response);
            exit();
        }
    }

    public function loadAllMissingAnimals()
    {
        $type = $_GET['type'] ?? 'vermisst';
        try {

            $missingFoundAnimalModel = new MissingFoundModel();
            $missingAnimals = $missingFoundAnimalModel->getAllMissingOrFoundAnimals($type);

            if(empty($missingAnimals)){
                echo json_encode(['message' => 'Keine Tiere gefunden.']);
                return;
            }

            echo json_encode(['animals' => $missingAnimals]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['errors'=> $e->getMessage()]);
        }
    }

    public function loadAllFoundAnimals()
    {
        $type = $_GET['type'] ?? 'gefunden';
        try {
            $missingFoundAnimalModel = new MissingFoundModel();
            $foundAnimals = $missingFoundAnimalModel->getAllMissingOrFoundAnimals($type);

            if(empty($foundAnimals)){
                echo json_encode(['message' => 'Keine Tiere gefunden.']);
                return;
            }

            echo json_encode(['animals' => $foundAnimals]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['errors'=> $e->getMessage()]);
        }
    }

    /**
     * @throws Exception
     */
    private function speichereBild(array $tierbild, string $tierartName): string
    {
        // Zielordner für die Bilder
        $zielOrdner =  '../public/uploads/';
        if (!is_dir($zielOrdner)) {
            mkdir($zielOrdner, 0755, true);
        }

        // Dateiname und -pfad
        $dateiName = uniqid('', true) . '_' . $tierartName;
        $targetFile = $zielOrdner . $dateiName;
        $imageFileType = strtolower(pathinfo($tierbild['name'], PATHINFO_EXTENSION));

        // Erlaubte Formate
        $erlaubteFormate = ['jpg', 'jpeg', 'png'];

        // Validierung des Bildes
        $check = getimagesize($tierbild['tmp_name']);
        if ($check === false) {
            throw new Exception('Die Datei ist kein gültiges Bild.');
        }

        if (!in_array($imageFileType, $erlaubteFormate)) {
            throw new Exception('Ungültiges Bildformat. Erlaubt sind nur JPG, JPEG und PNG.');
        }

        if (file_exists($targetFile . '.' . $imageFileType)) {
            throw new Exception('Die Datei existiert bereits.');
        }

        if ($tierbild['size'] > 500000) { // Max. 500 KB
            throw new Exception('Die Datei ist zu groß. Maximal erlaubt: 500 KB.');
        }

        // Datei speichern
        $zielPfad = $targetFile . '.' . $imageFileType;
        if (!move_uploaded_file($tierbild['tmp_name'], $zielPfad)) {
            throw new Exception('Fehler beim Speichern der Datei.');
        }

        return $zielPfad;
    }
}