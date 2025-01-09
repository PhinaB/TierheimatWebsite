<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\MissingFoundModel;
use app\Model\MissingFoundAnimal;
use app\Model\Species;
use app\model\UserModel;
use app\model\UserRoleModel;
use DateTime;
use Exception;
use InvalidArgumentException;

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
            $editMode = $_POST['editMode'] ?? null;
            $tierId = $_POST['tierId'] ?? null;

            if (!$anliegenVermisstGefunden || !$tierartName || !$datum || !$ort || !$tierbeschreibung || !$kontaktaufnahme) {
                $response['errors']['general']="Alle Pflichtfelder müssen ausgefüllt werden!";
            }

            //Bildvalidierung und -speicherung
            $tierbildAdresse= null;
            if (isset($_FILES['tierbild']) && $_FILES['tierbild']['error'] === UPLOAD_ERR_OK) {
                $tierbildAdresse = $this->speichereBild($_FILES['tierbild'], $tierartName);
            }

            $datumFormatiert = new DateTime($datum);
            $datumFormatiert = $datumFormatiert->format('Y-m-d');

            session_start();
            $zuletztGeanderterNutzerID = $_SESSION['nutzer_id']??null; // TODO: PRüfung, ob Nutzer das darf
            if(!$zuletztGeanderterNutzerID){
                throw new Exception('Keine gültige User-ID gefunden. Bitte einloggen.');
            }
            $zuletztGeaendert = date('Y-m-d H:i:s');

            $vermisstGefundenTier = new MissingFoundAnimal($zuletztGeanderterNutzerID, $anliegenVermisstGefunden, $datumFormatiert, $ort, $tierbeschreibung, $kontaktaufnahme, $tierbildAdresse, false, $zuletztGeaendert);

            if ($editMode) {
                $vermisstGefundenTier->setVermisstGefundenTierID((int)$tierId);
            }

            try {
                $this->vermisstGefundenTierModel->insertVermisstGefundenTiere($vermisstGefundenTier, $tierartName, (bool)$editMode);
                $response['success']=true;
            }
            catch (Exception $exception) {
               $response['errors']['general']="Fehler beim Einfügen der Daten" . $exception->getMessage();
            }

            echo json_encode($response);
            exit();
        }
    }

    public function loadAllMissingFoundAnimals(): void
    {
        $type = $_POST['type'];

        if ($type === 'Vermisste Tiere') {
            $type = 'vermisst';
        } elseif ($type === 'Gefundene Tiere') {
            $type = 'gefunden';
        }

        try {

            $missingFoundAnimalModel = new MissingFoundModel();

            //mit den Tieren müssen auch die aktuelle NutzerID und Rollenrechte übergeben werden, um delete und edit Buttons zu setzen
            $userRoleModel = new UserRoleModel();
            $loginData = $userRoleModel->checkLoginRolesUserIDWithSession();

            if ($type === 'Vermisste / Gefundene Tiere') {

                $missingAnimals = $missingFoundAnimalModel->getAllMissingOrFoundAnimals('vermisst');
                $foundAnimals = $missingFoundAnimalModel->getAllMissingOrFoundAnimals('gefunden');

                echo json_encode([
                    'missingAnimals' => $missingAnimals,
                    'foundAnimals' => $foundAnimals,
                    'loginData' => $loginData,
                ]);
            } else {
                $animals = $missingFoundAnimalModel->getAllMissingOrFoundAnimals($type);

                echo json_encode(['animals' => $animals, 'loginData' => $loginData]);
            }

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

    public function deleteMissingOrFoundAnimal(){

        $animalID = $_POST['animalID'];
        $animalID = intval($animalID);
        $response = ['success'=> false, 'errors' => []];
        try {
            //Aktueller Session Nutzer
            $userModel = new UserModel();
            $currentUserID = $userModel->getCurrentUserIdWithSession();

            //ZuletzGeandertNutzerID
            $missingFoundModel = new MissingFoundModel();
            $missingFoundAnimalObject = $missingFoundModel->getMissingFoundAnimalById($animalID);
            $animalCreator = $missingFoundAnimalObject['ZuletztGeaendertNutzerID'];

            //Rechte
            $userRoleModel = new UserRoleModel();
            $userRolesArray = $userRoleModel->getUserRoles($animalCreator);
            $canDeleteAndEditOwn = $userRolesArray['kannEigenesBearbeitenUndLoeschen'];
            $canDeleteAll =$userRolesArray['kannAllesLoeschen'];

            if($currentUserID === $animalCreator && $canDeleteAndEditOwn || $canDeleteAll){
                $missingFoundModel->deleteMissingFoundAnimal($animalID);
                $response = ['success'=> true, 'errors' => [], ];
            }else {
                $response = ['success'=> false, 'errors' => ['Keine Berechtigung zum Löschen']];
            }
        }
        catch(InvalidArgumentException|Exception $e){
            $response = ['success' => false, 'errors' => $e->getMessage()];
        }
        echo json_encode($response);
    }
}